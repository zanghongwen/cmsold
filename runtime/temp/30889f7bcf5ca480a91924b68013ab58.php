<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"/Users/mac/Documents/mamp/cms/application/admin/view/flink/add.html";i:1492090068;s:71:"/Users/mac/Documents/mamp/cms/application/admin/view/public/header.html";i:1493279924;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/main.css"/>
    <script type="text/javascript" src="__PUBLIC__/admin/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/admin/js/common.js"></script>
  
    <link href="__PUBLIC__/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/umeditor.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
   
  
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/uploadify/uploadify.css"/>
    <script type="text/javascript" src="__PUBLIC__/uploadify/jquery.uploadify.min.js"></script>
   
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo"><a href="<?php echo url('Index/index'); ?>" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="__ROOT__" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="<?php echo url('Common/cache'); ?>">清理缓存</a></li>
                <li><a href="<?php echo url('Admin/password'); ?>">修改密码</a></li>
                <li><a href="<?php echo url('Common/logout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo url('Article/index'); ?>"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="<?php echo url('Category/index'); ?>"><i class="icon-font">&#xe005;</i>栏目管理</a></li>
                        <li><a href="<?php echo url('Tag/index'); ?>"><i class="icon-font">&#xe005;</i>TAG管理</a></li>
                        <li><a href="<?php echo url('Flink/index'); ?>"><i class="icon-font">&#xe005;</i>友情链接</a></li>
                        <li><a href="<?php echo url('Guestbook/index'); ?>"><i class="icon-font">&#xe005;</i>留言管理</a></li>
                        <li><a href="<?php echo url('User/index'); ?>"><i class="icon-font">&#xe005;</i>会员管理</a></li>
                        <li><a href="<?php echo url('Attachment/index'); ?>"><i class="icon-font">&#xe005;</i>附件管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo url('System/set'); ?>"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="<?php echo url('Template/index'); ?>"><i class="icon-font">&#xe005;</i>模板风格</a></li>
                        <li><a href="<?php echo url('Database/index',['type'=>'export']); ?>"><i class="icon-font">&#xe005;</i>数据备份</a></li>
                        <li><a href="<?php echo url('Database/index',['type'=>'import']); ?>"><i class="icon-font">&#xe005;</i>数据还原</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->

<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo url('Flink/index'); ?>">友情链接</a><span class="crumb-step">&gt;</span><span>添加友情链接</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo url('Flink/add'); ?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%" border="1">
                        <tbody>
                       
                           
                            <tr>
                                <th>标题：</th>
                                <td>
                                    <input class="common-text" id="title" name="title"  type="text" >
                                </td>
                            </tr>
                            <tr>
                                <th>地址：</th>
                                <td>
                                    <input class="common-text" id="url" name="url"  style=" width:800px;" type="text" >
                                </td>
                            </tr>
                            <tr>
                                <th>图片：</th>
                                <td><?php echo form_image('logo'); ?></td>
                            </tr>
                            
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary  mr10"  value="保存后自动关闭" name="dosubmit"  type="submit">
                                    <input class="btn btn-primary  mr10"  value="保存并继续发表" name="dosubmit_continue" type="submit">
                                    <input class="btn" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
