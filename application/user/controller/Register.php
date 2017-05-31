<?php
namespace app\user\controller;

use think\Controller;
use think\Db;
class Register extends Controller
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
            $password_r = input('password_r');
            $email = input('email');
            $code = input('code');
            $check_data = ['username' => $username,'password_r' => $password_r,  'password' => $password, 'code' => $code, 'email' => $email];
            $validate = validate('Register');
            if (!$validate->check($check_data)) {
                $this->error($validate->getError());
            }
            $captcha = new \org\Captcha();
            if (!$captcha->check($code)) {
                $this->error('验证码错误');
            }
            $username = $this->username_check($username);
            $email = $this->email_check($email);
            if ($password != $password_r) {
                $this->error('密码与重复密码不一致');
            }
            $encrypt = five_random_str();
            $password = five_password($password, $encrypt);
            $regpoint = db('system')->where('id', 1)->value('regpoint');
            $data = ['username' => $username, 'point' => $regpoint, 'nickname' => $username, 'password' => $password, 'encrypt' => $encrypt, 'email' => $email, 'regip' => request()->ip(), 'regtime' => request()->time(), 'lastip' => request()->ip(), 'lasttime' => request()->time()];
            $userid = db('user')->insertGetId($data);
            if (!$userid) {
                return FALSE;
            }
            $this->success('注册成功', 'Login/index');
        }
    }
    private function username_check($username)
    {
        $r1 = db('admin')->where('username', $username)->find();
        $r2 = db('user')->where('username', $username)->find();
        if ($r1 || $r2) {
            $this->error('用户名已存在');
        }
        return $username;
    }
    private function email_check($email)
    {
        $r = db('user')->where('email', $email)->find();
        if ($r) {
            $this->error('邮箱已存在');
        }
        return $email;
    }
}