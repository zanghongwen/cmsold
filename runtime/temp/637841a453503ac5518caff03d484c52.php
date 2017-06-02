<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/Users/mac/Documents/mamp/cms/application/admin/view/article/edit.html";i:1496194101;s:71:"/Users/mac/Documents/mamp/cms/application/admin/view/public/header.html";i:1496236530;}*/ ?>
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
                        <li><a href="<?php echo url('Employee/index'); ?>"><i class="icon-font">&#xe005;</i>员工管理</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo url('Article/index'); ?>">文章管理</a><span class="crumb-step">&gt;</span><span>修改文章</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo url('Article/edit'); ?>" method="post" id="myform" name="myform" enctype="multipart/form-data" >
                 <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
                 <ul class="admin_tab">
                    <li><a class="active">常规选项</a></li>
                    <li><a>高级选项</a></li>
                    </ul>
                    <div class="admin_tab_cont" style="display:block;">
                    
                    <table class="insert-tab" width="100%">
                        <tbody>
                           <tr>
                                <th width="80">栏目：</th>
                                <td>
                                 <select name="catid">
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['catid']; ?>" <?php if($vo['catid'] == $result['catid']): ?>selected="selected"<?php endif; ?>><?php echo str_repeat("&nbsp;└─&nbsp;",$vo['level']); ?><?php echo $vo['catname']; ?></option>
                                     <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th width="80">推荐位：</th>
                                <td>
                                    <?php if(is_array($position_list) || $position_list instanceof \think\Collection || $position_list instanceof \think\Paginator): $i = 0; $__LIST__ = $position_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                   <input type="checkbox" name="posid[]" <?php foreach($result['posids'] as $v){if($v==$vo['posid']){ echo "checked";}} ?> value="<?php echo $vo['posid']; ?>" /><?php echo $vo['name']; endforeach; endif; else: echo "" ;endif; ?>
                                   
                                </td>
                            </tr>
                            <tr>
                                <th>标题：</th>
                                <td>
                                    <input class="common-text" id="title" name="title" style=" width:800px;" onBlur="$.post('__ROOT__/api.php/keyword/get_keywords.html?number=3&sid='+Math.random()*5, {data:$('#title').val()}, function(data){if(data && $('#keywords').val()=='') $('#keywords').val(data); })"  value="<?php echo $result['title']; ?>" type="text">
                                </td>
                            </tr>
                             <tr>
                                <th>关键词：</th>
                                <td>
                                    <input class="common-text" id="keywords" name="keywords" style=" width:400px;"  value="<?php echo $result['keywords']; ?>" type="text">多关键词之间用空格或者“,”隔开
                                </td>
                            </tr>
                                <tr>
                                <th>缩略图：</th>
                                <td><?php echo form_image('thumb',$result['thumb']); ?></td>
                            </tr>
                            
                               <tr>
                                <th>描述：</th>
                                <td><textarea name="description" class="common-textarea" id="description"  style="width:800px; height:100px;"><?php echo $result['description']; ?></textarea></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><?php echo form_editor('content',$result['content']); ?></td>
                            </tr>
                           
                        </tbody></table>
                        </div>
                   
                    
                     <div class="admin_tab_cont">
                    
                    <table class="insert-tab" width="100%" border="1">
                        <tbody>
                           <tr>
                                <th width="80">组图：</th>
                                <td><?php echo form_images('gallery',$result['gallery']); ?></td>
                            </tr>
                          
                        </tbody>
                        
                        </table>
                    
                    </div>
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <input class="btn btn-primary  mr10"  value="提交" name="dosubmit"  type="submit">
                                    <input class="btn" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
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
