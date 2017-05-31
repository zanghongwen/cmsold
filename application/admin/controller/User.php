<?php
namespace app\admin\controller;

use think\Controller;
use think\Validate;
use think\Config;
use think\Db;
class User extends Common
{
    public function index()
    {
        $islock = intval(input('islock'));
        if ($islock) {
            $map['islock'] = intval($islock);
        }
        if (!isset($map)) {
            $map = 1;
        }
        $list = db('user')->where($map)->order('point desc')->paginate(10, false, ['query' => ['islock' => $islock]]);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('islock', $islock);
        $this->assign('page', $page);
        return $this->fetch();
    }
    public function status()
    {
        $userid = intval(input('userid'));
        $islock = intval(input('islock'));
        $islock = $islock ? 0 : 1;
        db('user')->where('userid', $userid)->update(['islock' => $islock]);
        $this->success('操作成功');
    }
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['point'] = intval($data['point']);
            db('user')->where('userid', intval($data['userid']))->update($data);
            $this->success('修改成功');
        } else {
            $userid = intval(input('userid'));
            if (!$userid) {
                $this->error('非法参数');
            }
            $info = db('user')->where('userid', $userid)->find();
            if (!$info) {
                $this->error('会员不存在');
            }
            $list = db('user_group')->select();
            $this->assign('info', new_html_entity_decode($info));
            $this->assign('list', $list);
            return $this->fetch();
        }
    }
    public function delete()
    {
        $userid = intval(input('userid'));
        if (!$userid) {
            $this->error('非法参数');
        }
        db('user')->where('userid', $userid)->delete();
        $username = db('user')->where('userid', $userid)->value('username');
        db('article')->where('username', $username)->delete();
        $this->success('删除成功');
    }
    public function group_add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['point'] = intval($data['point']);
            $groupid = db('user_group')->insertGetId($data);
            if (!$groupid) {
                return FALSE;
            }
            $this->success('添加成功', 'User/group_list');
        } else {
            return $this->fetch();
        }
    }
    public function group_list()
    {
        $list = db('user_group')->order('listorder desc')->select();
        $this->assign('list', $list);
        return $this->fetch();
    }
    public function group_listorder()
    {
        $data = input('post.');
        if (!$data) {
            $this->error('参数错误');
        }
        foreach ($data['listorder'] as $k => $v) {
            $k = intval($k);
            db('user_group')->where('groupid', $k)->update(['listorder' => $v]);
        }
        $this->success('更新成功');
    }
    public function group_delete()
    {
        $groupid = intval(input('groupid'));
        if (!$groupid) {
            $this->error('非法参数');
        }
        db('user_group')->where('groupid', $groupid)->delete();
        $this->success('删除成功');
    }
    public function group_edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['point'] = intval($data['point']);
            db('user_group')->where('groupid', intval($data['groupid']))->update($data);
            $this->success('修改成功', 'User/group_list');
        } else {
            $groupid = intval(input('groupid'));
            if (!$groupid) {
                $this->error('非法参数');
            }
            $info = db('user_group')->where('groupid', $groupid)->find();
            if (!$info) {
                $this->error('会员组不存在');
            }
            $this->assign('info', new_html_entity_decode($info));
            return $this->fetch();
        }
    }
}