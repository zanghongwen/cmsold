<?php
namespace app\admin\controller;

use think\Controller;
use think\Validate;
use think\Config;
use think\Db;
class Attachment extends Common
{
    public function index()
    {
        $list = db('attachment')->order('id desc')->paginate(10);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
    }
    public function delete()
    {
        $data = input('param.');
        if (!isset($data['id']) || empty($data['id'])) {
            $this->error('参数错误');
        }
        if (is_array($data['id'])) {
            foreach ($data['id'] as $v) {
                $v = intval($v);
                $file = db('attachment')->where('id', $v)->value('filepath');
                db('attachment')->where('id', $v)->delete();
                @unlink($file);
            }
            $this->success('删除成功');
        } else {
            $id = intval($data['id']);
            if (!$id) {
                $this->error('非法参数');
            }
            $file = db('attachment')->where('id', $id)->value('filepath');
            db('attachment')->where('id', $id)->delete();
            @unlink($file);
            $this->success('删除成功');
        }
        $this->success('删除成功');
    }
}