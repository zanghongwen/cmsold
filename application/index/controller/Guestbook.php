<?php
namespace app\index\controller;

use think\Controller;
class Guestbook extends Common
{
    
    public function guestbook_list()
    {
        $guestbook_list = db('guestbook')->where('status', 1)->paginate(10);
        $page = $guestbook_list->render();
        $this->assign('guestbook_list', $guestbook_list);
        $this->assign('page', $page);
        $seo = seo('在线留言-' . $this->seo['title'], $this->seo['keywords'], $this->seo['description']);
        $this->assign('seo', $seo);
        return $this->fetch($this->template.'guestbook_list.html');
    }
    public function guestbook()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $captcha = new \org\Captcha();
            if (!$captcha->check($data['code'])) {
                $this->error('验证码错误');
            }
            if ($data['name'] == "") {
                $this->error('姓名不能为空');
            }
            if (!preg_match('/^[1-9]*[1-9][0-9]*$/', $data['qq'])) {
                $this->error('QQ号格式不正确');
            }
            $email = $_POST['email'];
            if (!preg_match("/^[\\w\\-\\.]+@[\\w\\-\\.]+(\\.\\w+)+\$/", $data['email'])) {
                $this->error('邮箱格式不正确');
            }
            if (!preg_match('/^1([0-9]{10})$/', $data['telephone'])) {
                $this->error('手机号码格式不正确');
            }
            if ($data['title'] == "") {
                $this->error('标题不能为空');
            }
            $data['title'] = strip_tags($data['title']);
            $data['addtime'] = request()->time();
            if ($data['content'] == "") {
                $this->error('内容不能为空');
            }
            $id = db('guestbook')->insertGetId($data);
            if ($id > 0) {
                $this->success('留言成功');
            }
        } else {
            $seo = seo('在线留言-' . $this->seo['title'], $this->seo['keywords'], $this->seo['description']);
            $this->assign('seo', $seo);
            return $this->fetch($this->template.'guestbook.html');
        }
    }
   
}