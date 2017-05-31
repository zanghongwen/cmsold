<?php
namespace app\admin\controller;

use think\Controller;
use think\Validate;
use think\Config;
use think\Db;
class Position extends Common
{
    public function index()
    {
        $position_list = db('position')->order('listorder desc')->paginate(10);
        $page = $position_list->render();
        $this->assign('position_list', $position_list);
        $this->assign('page', $page);
        return $this->fetch();
    }
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data = $this->data_check($data);
            $posid = db('position')->insertGetId($data);
            if (!$posid) {
                return FALSE;
            }
            if (input('post.dosubmit')) {
                $this->success('添加成功', 'Position/index');
            } else {
                $this->success('添加成功');
            }
        } else {
            $this->assign('cate_list', model('category')->getTreeList());
            return $this->fetch();
        }
    }
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data = $this->data_check($data);
            $posid = intval($data['posid']);
            db('position')->where('posid', $posid)->update($data);
            $this->success('修改成功', 'Position/index');
        } else {
            $posid = intval(input('posid'));
            if (!$posid) {
                $this->error('非法参数');
            }
            $result = db('position')->where('posid', $posid)->find();
            if (!$result) {
                $this->error('友情链接不存在');
            }
            $this->assign('result', $result);
            $this->assign('cate_list', model('category')->getTreeList());
            return $this->fetch();
        }
    }
    public function delete()
    {
        $data = input('param.');
        if (!isset($data['posid']) || empty($data['posid'])) {
            $this->error('参数错误');
        }
        if (is_array($data['posid'])) {
            foreach ($data['posid'] as $v) {
                $v = intval($v);
                db('position')->where('posid', $v)->delete();
            }
            $this->success('删除成功');
        } else {
            $posid = intval($data['posid']);
            if (!$posid) {
                $this->error('非法参数');
            }
            db('position')->where('posid', $posid)->delete();
            db('position_data')->where('posid', $posid)->delete();
            $this->success('删除成功');
        }
        $this->success('删除成功');
    }
    public function deleteAll()
    {
        $config = Config::get('database');
        $prefix = $config['prefix'];
        Db::execute('truncate ' . $prefix . 'position');
        Db::execute('truncate ' . $prefix . 'position_data');
        $this->success('删除成功');
    }
    public function listorder()
    {
        $data = input('post.');
        if (!$data) {
            $this->error('参数错误');
        }
        foreach ($data['listorder'] as $k => $v) {
            $k = intval($k);
            db('position')->where('posid', $k)->update(['listorder' => $v]);
        }
        $this->success('更新成功');
    }
    private function data_check($data)
    {
        $check_data = ['name' => $data['name']];
        $validate = validate('Position');
        if (!$validate->check($check_data)) {
            $this->error($validate->getError());
        }
        $data['catid'] = intval($data['catid']);
        return $data;
    }
}