<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/Users/mac/Documents/mamp/cms/application/admin/view/category/batch.html";i:1492089600;s:71:"/Users/mac/Documents/mamp/cms/application/admin/view/public/header.html";i:1493279924;}*/ ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span>批量添加栏目</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">

                <form action="<?php echo url('Category/batch'); ?>" method="post"  id="form" enctype="multipart/form-data" >
                    
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120">上级栏目：</th>
                            <td>
                                <select name="pid">
                                    <option value="0">顶级栏目</option>
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"0,8");if($vo['level']>= $_RANGE_VAR_[0] && $vo['level']<= $_RANGE_VAR_[1]):?><option value="<?php echo $vo['catid']; ?>" ><?php echo str_repeat("└─",$vo['level']); ?><?php echo $vo['catname']; ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th>栏目名称：</th>
                                <td><textarea name="catname" class="common-textarea"  style="width: 50%;" rows="10"></textarea>一行代表一个可选值</td>
                            </tr>
                             
                           
                            <tr>
                                <th>隐藏栏目：</th>
                                <td><input type="radio" name="ishidden" value="1" >隐藏&nbsp;&nbsp;&nbsp; <input type="radio" name="ishidden" value="0" checked="checked" >显示  </td>
                            </tr>
                             <tr>
                                <th>栏目图片：</th>
                                <td><?php echo form_image('thumb'); ?></td>
                            </tr>

                             <tr>
                                <th>栏目属性：</th>
                                <td><input type="radio" name="ispart" value="0" checked="checked" >最终列表（允许发表文章） <input type="radio" name="ispart" value="1" >频道栏目（不允许发表文章） </td>
                            </tr>
                             <tr>
                                <th>会员发表：</th>
                                <td><input type="radio" name="issend" value="1" checked="checked" >允许发表文章 <input type="radio" name="issend" value="0" >不允许发表文章 </td>
                            </tr>
                             <tr>
                                <th>频道模板：</th>
                                <td>
                                    <input class="common-text"  name="category" size="50"  value="category.html"   type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>列表模板：</th>
                                <td>
                                    <input class="common-text"  name="list" size="50"  value="list.html"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>文章模板：</th>
                                <td>
                                    <input class="common-text"  name="show" size="50"  value="show.html"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
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