<?php
namespace app\user\controller;

use think\Controller;
use think\Db;
class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function check()
    {
        if (request()->isPost()) {
            $username = input('username');
            $password = input('password');
            $code = input('code');
            $check_data = ['username' => $username, 'password' => $password, 'code' => $code];
            $validate = validate('Login');
            if (!$validate->check($check_data)) {
                $this->error($validate->getError());
            }
            $captcha = new \org\Captcha();
            if (!$captcha->check($code)) {
                $this->error('验证码错误');
            }
            $r = db('user')->where('username', $username)->find();
            if (!$r) {
                $this->error('用户名不存在');
            }
            if ($r['islock']) {
                $this->error('用户被锁定');
            }
            if ($r['password'] != five_password($password, $r['encrypt'])) {
                $this->error('密码错误');
            }
            session('fivecms_user_userid', $r['userid']);
            session('fivecms_user_username', $username);
            session('fivecms_user_lasttime', $r['lasttime']);
            session('fivecms_user_lastip', $r['lastip']);
            session('fivecms_user_logintime', request()->time());
            db('user')->where('username', $username)->update(['lastip' => request()->ip(), 'lasttime' => request()->time()]);
            if (date("Y-m-d", $r['lasttime']) != date("Y-m-d", request()->time())) {
                $daypoint = db('system')->where('id', 1)->value('daypoint');
                db('user')->where('username', $username)->setInc('point', $daypoint);
            }
            $this->success('登录成功', 'Index/index');
        }
    }
}