<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wamp64\www\fivecms/application/admin\view\user\index.html";i:1492092778;s:63:"D:\wamp64\www\fivecms/application/admin\view\public\header.html";i:1493283523;}*/ ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">会员管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="<?php echo url('User/index'); ?>" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择状态:</th>
                            <td>
                                 <select name="islock">
                                    <option value="0" <?php if($islock == 0): ?>selected="selected"<?php endif; ?>>正常</option>
                                    <option value="1" <?php if($islock == 1): ?>selected="selected"<?php endif; ?>>锁定</option>
                                </select>
                                
                            </td>
                            <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                           
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo url('User/group_add'); ?>"><i class="icon-font"></i>添加会员组</a>
                        <a href="<?php echo url('User/group_list'); ?>"><i class="icon-font"></i>会员组管理</a>
                    </div>
                  
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th width="60">UID</th>
                            <th>用户名</th>
                            <th>昵称</th>
                            <th width="70">头像</th>
                            <th width="60">积分</th>
                            <th width="40">状态</th>
                            <th width="100">等级</th>
                            <th width="120">最近登录</th>
                            <th width="100">操作</th>
                        </tr>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr align="center">
                            <td><?php echo $vo['userid']; ?></td>
                            <td><?php echo $vo['username']; ?></td>
                            <td><?php echo $vo['nickname']; ?></td>
                            <td><?php if($vo['headpic']): ?><img src="<?php echo $vo['headpic']; ?>" width="60" height="60" /><?php endif; ?></td>
                            <td><?php echo $vo['point']; ?></td>
                            <td><a href="<?php echo url('User/status',['userid'=>$vo['userid'],'islock'=>$vo['islock']]); ?>"><?php echo !empty($vo['islock'])?'锁定':'正常'; ?></a></td>
                            <td><?php echo get_groupname($vo['groupid']); ?></td>
                            <td><?php echo date("Y-m-d H:i",$vo['lasttime']); ?></td>
                            <td>
                                <a class="link-update" href="<?php echo url('User/edit',['userid'=>$vo['userid']]); ?>">修改</a>
                                <a class="link-del" onClick="confirm_delete()" href="<?php echo url('User/delete',['userid'=>$vo['userid']]); ?>">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr><td colspan="9"><?php echo $page; ?></td></tr>
                    </table>
                   
                </div>
          
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
