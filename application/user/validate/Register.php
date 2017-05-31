<?php
namespace app\user\validate;

use think\Validate;
class Register extends Validate
{
    protected $rule = ['username' => 'require|is_username', 
	                   'password' => 'require|is_password',
					   'password_r' => 'require|is_password',
					   'email' => 'require|is_email',  
					   'code' => 'require|is_code'
					  ];
					  
    protected $message = ['username.require' => '用户名必须填写',
	                      'password.require' => '密码必须填写',
						  'password_r.require' => '重复密码必须填写',
						  'email.require' => '邮箱必须填写',  
						  'code.require' => '验证码必须填写'
						 ];
						 
    protected function is_username($value, $rule, $data)
    {
        if (!preg_match('/^[a-z0-9_-]{5,16}$/', $value)) {
            return '用户名格式错误';
        }
        return true;
    }
    protected function is_password($value, $rule, $data)
    {
        if (!preg_match('/^[a-z0-9_-]{5,16}$/', $value)) {
            return '密码格式错误';
        }
        return true;
    }
    protected function is_code($value, $rule, $data)
    {
        if (!preg_match('/^[a-z0-9]{4}$/', $value)) {
            return '验证码格式错误';
        }
        return true;
    }
   	
	protected function is_email($value, $rule, $data)
    {
        if (!preg_match('/^([a-z0-9_\\.-]+)@([\\da-z\\.-]+)\\.([a-z\\.]{2,6})$/', $value)) {
            return '邮箱格式错误';
        }
        return true;
    }
}