<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\wamp64\www\fivecms/application/admin\view\flink\index.html";i:1492088448;s:63:"D:\wamp64\www\fivecms/application/admin\view\public\header.html";i:1493283523;}*/ ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">友情链接</span></div>
        </div>
       
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo url('Flink/add'); ?>"><i class="icon-font"></i>添加友情链接</a>
                        <a onclick="myform.action='<?php echo url('Flink/delete'); ?>';myform.submit();" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a onclick="myform.action='<?php echo url('Flink/listorder'); ?>';myform.submit();" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                        <a onClick="confirm_delete()" href="<?php echo url('Flink/deleteAll'); ?>"><i class="icon-font"></i>删除所有友情链接</a>
                    </div>
                 
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="20"><input class="allChoose" id="check_box" onclick="selectall('id[]');" type="checkbox"></th>
                            <th width="60">排序</th>
                            <th>标题</th>
                            <th width="200">图片</th>
                            <th width="60">操作</th>
                        </tr>
                        <?php if(is_array($flink_list) || $flink_list instanceof \think\Collection || $flink_list instanceof \think\Paginator): $i = 0; $__LIST__ = $flink_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr align="center">
                            <td class="tc"><input name="id[]" value="<?php echo $vo['id']; ?>" type="checkbox"></td>
                            <td>
                               <input class="common-input sort-input" name="listorder[<?php echo $vo['id']; ?>]" value="<?php echo $vo['listorder']; ?>" type="text">
                            </td>
                            <td align="left"><a target="_blank" href="<?php echo $vo['url']; ?>" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a>
                            </td>
                            <td>
                            <?php if(!(empty($vo['logo']) || (($vo['logo'] instanceof \think\Collection || $vo['logo'] instanceof \think\Paginator ) && $vo['logo']->isEmpty()))): ?>
                             <img src="<?php echo $vo['logo']; ?>" style="max-width:200px; max-height:60px;" />
                             <?php endif; ?>
                            </td>
                            <td>
                                <a class="link-update" href="<?php echo url('Flink/edit',['id'=>$vo['id']]); ?>">修改</a>
                                <a class="link-del" href="<?php echo url('Flink/delete',['id'=>$vo['id']]); ?>">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr><td colspan="9"><?php echo $page; ?></td></tr>
                    </table>
                   
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
