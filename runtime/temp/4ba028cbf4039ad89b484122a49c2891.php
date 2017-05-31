<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/Users/mac/Documents/mamp/cms/application/admin/view/database/import.html";i:1488787900;s:71:"/Users/mac/Documents/mamp/cms/application/admin/view/public/header.html";i:1493279924;}*/ ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">数据还原</span></div>
        </div>
        
        <div class="result-wrap">
           
                <div class="result-title">
                    <div class="result-list">
                        <a   href="<?php echo url('Database/index',['type'=>'export']); ?>"><i class="icon-font"></i>备份数据库</a>
                    </div>
                </div>
                <div class="result-content">
                
                <table class="result-tab" width="100%" >
                    <thead>
                    <tr>
                       
                        <th>备份名称</th>
                        <th>卷数</th>
                        <th>压缩</th>
                        <th>数据大小</th>
                        <th>备份时间</th>
                        <th>操作</th>     
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr align="center">
                        
                        <td><?php echo date('Ymd-His',$vo['time']); ?></td>
                        <td><?php echo $vo['part']; ?></td>
                        <td><?php echo $vo['compress']; ?></td>
                        <td><?php echo format_bytes($vo['size']); ?></td>
                        <td><?php echo $key; ?></td>
                        <td>
                            <a href="<?php echo url('Database/import',['time'=>$vo['time']]); ?>" ><button type="button" class="btn btn-w-m btn-info">还原</button></a>
                            <a href="<?php echo url('Database/delete',['time'=>$vo['time']]); ?>" ><button type="button" class="btn btn-w-m btn-danger">删除</button></a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>

                    </table>
                   
                </div>
           
        </div>
    </div>
   
</div>
</body>
</html>