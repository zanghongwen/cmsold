<?php
namespace app\admin\controller;

use think\Controller;
use think\Validate;
use think\Config;
use think\Db;
class Category extends Common
{
    public function index()
    {
        $list = model('category')->getTreeList();
        foreach ($list as $k => $v) {
            $list[$k]['article_number'] = db('article')->where('catid', $v['catid'])->count();
        }
        $this->assign('list', $list);
        return $this->fetch();
    }
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data = $this->data_check($data);
            $catid = db('category')->insertGetId($data);
            if ($catid > 0) {
                $url = __ROOT__ . '/index.php/category/lists.html?catid=' . $catid;
                db('category')->where('catid', $catid)->update(['url' => $url]);
                $this->success('添加成功', 'Category/index');
            } else {
                $this->error('添加失败');
            }
        } else {
            $catid = input('catid');
            $this->assign('list', model('category')->getTreeList());
            $this->assign('catid', intval($catid));
            return $this->fetch();
        }
    }
    public function batch()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data = $this->data_check($data);
            if (strpos($data['catname'], "\n") === false) {
                $data['catname'] = str_cut($data['catname'], 32);
                $catid = db('category')->insertGetId($data);
                $url = __ROOT__ . '/index.php/category/lists.html?catid=' . $catid;
                db('category')->where('catid', $catid)->update(['url' => $url]);
                $this->success('添加成功', 'Category/index');
            } else {
                $cat_arr = explode("\n", $data['catname']);
                foreach ($cat_arr as $key => $val) {
                    $val = trim($val);
                    if (!$val) {
                        continue;
                    }
                    $data['catname'] = str_cut($val, 32);
                    $catid = db('category')->insertGetId($data);
                    $url = __ROOT__ . '/index.php/category/lists.html?catid=' . $catid;
                    db('category')->where('catid', $catid)->update(['url' => $url]);
                }
                $this->success('添加成功', 'Category/index');
            }
        } else {
            $this->assign('list', model('category')->getTreeList());
            return $this->fetch();
        }
    }
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data = $this->data_check($data);
            $catid = intval($data['catid']);
            db('category')->where('catid', $catid)->update($data);
            $this->success('修改成功', 'Category/index');
        } else {
            $catid = input('catid');
            if (!$catid) {
                $this->error('参数错误');
            }
            $detail = db('category')->where('catid', $catid)->find();
            $this->assign('list', model('category')->getTreeList());
            $this->assign('detail', $detail);
            return $this->fetch();
        }
    }
    public function listorder()
    {
        if (request()->isPost()) {
            $data = input('post.');
            foreach ($data['listorder'] as $key => $val) {
                db('category')->where('catid', $key)->update(['listorder' => intval($val)]);
            }
            $this->success('排序成功');
        }
    }
    public function delete()
    {
        $catid = input('catid');
        if (!$catid) {
            $this->error('参数错误');
        }
        db('category')->where('catid', 'in', catid_str($catid))->delete();
        db('article')->where('catid', 'in', catid_str($catid))->delete();
        $this->success('删除成功');
    }
    private function data_check($data)
    {
        $check_data = ['catname' => $data['catname'], 'category' => $data['category'], 'list' => $data['list'], 'show' => $data['show']];
        $validate = validate('Category');
        if (!$validate->check($check_data)) {
            $this->error($validate->getError());
        }
        if (isset($data['content'])) {
            $data['content'] = auto_save_image($data['content']);
        }
        return $data;
    }
}