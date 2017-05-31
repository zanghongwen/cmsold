<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/Users/mac/Documents/mamp/cms/application/user/view/index/info.html";i:1492091694;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>会员信息</title>  
    <link rel="stylesheet" href="__PUBLIC__/user/css/pintuer.css">
    <link rel="stylesheet" href="__PUBLIC__/user/css/style.css">
    <script src="__PUBLIC__/user/js/jquery.js"></script> 
    <script src="__PUBLIC__/user/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 个人信息</strong></div>
  <div class="body-content">
    
     <table width="50%" border="0" style="font-size:16px; line-height:35px;">
  <tr>
    <td width="20%" align="right">上次登录时间:</td>
    <td>&nbsp;&nbsp;<?php echo date('Y-m-d H:i:s',\think\Session::get('fivecms_user_lasttime')); ?></td>
  </tr>
  <tr>
    <td align="right">上次登录IP:</td>
    <td>&nbsp;&nbsp;<?php echo \think\Session::get('fivecms_user_lastip'); ?></td>
  </tr>
  <tr>
    <td align="right">用户名:</td>
    <td>&nbsp;&nbsp;<?php echo $info['username']; ?></td>
  </tr>
  <tr>
    <td align="right">昵称:</td>
    <td>&nbsp;&nbsp;<?php echo $info['nickname']; ?></td>
  </tr>
  <tr>
    <td align="right">邮箱:</td>
    <td>&nbsp;&nbsp;<?php echo $info['email']; ?></td>
  </tr>
  <tr>
    <td align="right">积分:</td>
    <td>&nbsp;&nbsp;<font color=red><?php echo $info['point']; ?></font></td>
  </tr>
  <tr>
    <td align="right">余额:</td>
    <td>&nbsp;&nbsp;<font color=red><?php echo $info['money']; ?></font></td>
  </tr>
  <tr>
    <td align="right">等级:</td>
    <td>&nbsp;&nbsp;<?php echo get_groupname($info['groupid']); ?></td>
  </tr>
</table>

     
  </div>
</div>
</body></html>