<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/Users/mac/Documents/mamp/cms/application/admin/view/database/export.html";i:1482736254;s:71:"/Users/mac/Documents/mamp/cms/application/admin/view/public/header.html";i:1493279924;}*/ ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">数据备份</span></div>
        </div>
        
        <div class="result-wrap">
           
                <div class="result-title">
                    <div class="result-list">
                        <a  onclick="myform.action='<?php echo url('Database/export'); ?>';myform.submit();" href="javascript:void(0)" ><i class="icon-font"></i>备份数据库</a>
                        <a  onclick="myform.action='<?php echo url('Database/optimize'); ?>';myform.submit();" href="javascript:void(0)"><i class="icon-font"></i>优化表</a>
                        <a  onclick="myform.action='<?php echo url('Database/repair'); ?>';myform.submit();" href="javascript:void(0)"><i class="icon-font"></i>修复表</a>
                    </div>
                </div>
                <div class="result-content">
                    <form name="myform" id="export-form" method="post" action="<?php echo url('export'); ?>">
                    <table class="result-tab" width="100%">
                        <thead>
                            <tr>
                                <th width="48"><input id="check_box" onclick="selectall('tables[]');" checked="checked" type="checkbox" value=""></th>
                                <th>表名</th>
                                <th width="60">数据量</th>
                                <th width="60">引擎</th>
                                <th width="120">字符集</th>
                                <th width="120">数据大小</th>
                                <th width="160">创建时间</th>
                                <th width="160">更新时间</th>
                                <th width="60">状态</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td align="center">
                                        <input checked="checked"   type="checkbox" name="tables[]" value="<?php echo $vo['name']; ?>">
                                    </td>
                                    <td><?php echo $vo['name']; ?></td>
                                    <td align="center"><?php echo $vo['rows']; ?></td>
                                    <td align="center"><?php echo $vo['engine']; ?></td>
                                    <td align="center"><?php echo $vo['collation']; ?></td>
                                    <td><?php echo format_bytes($vo['data_length']); ?></td>
                                    <td align="center"><?php echo $vo['create_time']; ?></td>
                                    <td align="center"><?php echo $vo['update_time']; ?></td>
                                    <td align="center">未备份</td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </form>
                   
                </div>
           
        </div>
    </div>
    <!--/main-->
    
</div>
</body>
</html>