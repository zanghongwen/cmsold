<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"/Users/mac/Documents/mamp/cms/application/user/view/index/index.html";i:1492062186;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>会员中心</title>  
    <link rel="stylesheet" href="__PUBLIC__/user/css/pintuer.css">
    <link rel="stylesheet" href="__PUBLIC__/user/css/style.css">
    <script src="__PUBLIC__/user/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="<?php echo $headpic; ?>" class="radius-circle rotate-hover" height="50" alt="" />会员中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="__ROOT__" target="_blank"><span class="icon-home"></span> 网站首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-home"></span> 个人空间</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo url('Index/logout'); ?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="<?php echo url('Index/info'); ?>" target="right"><span class="icon-caret-right"></span>个人信息</a></li>
    <li><a href="<?php echo url('Index/detail'); ?>" target="right"><span class="icon-caret-right"></span>修改信息</a></li>
    <li><a href="<?php echo url('Index/password'); ?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <li><a href="<?php echo url('Index/headpic'); ?>" target="right"><span class="icon-caret-right"></span>修改头像</a></li>  
    </ul>   
  <h2><span class="icon-pencil-square-o"></span>文章管理</h2>
  <ul>
    <li><a href="<?php echo url('Index/article_list'); ?>" target="right"><span class="icon-caret-right"></span>文章列表</a></li>
    <li><a href="<?php echo url('Index/article_add'); ?>" target="right"><span class="icon-caret-right"></span>添加文章</a></li>
    </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="javascript:;" target="right" class="icon-home"> 首页</a></li>
  <li><a href="javascript:;" id="a_leader_txt">个人信息</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo url('Index/info'); ?>" name="right" width="100%" height="100%"></iframe>
</div>

</body>
</html>