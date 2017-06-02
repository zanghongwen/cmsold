<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/Users/mac/Documents/mamp/cms/application/admin/view/article/index.html";i:1495934415;s:71:"/Users/mac/Documents/mamp/cms/application/admin/view/public/header.html";i:1496236530;}*/ ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="<?php echo url('Article/index'); ?>" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择栏目:</th>
                            <td>
                                 <select name="catid">
                                    <option value="0">选择栏目</option>
                                    <?php if(is_array($cate_list) || $cate_list instanceof \think\Collection || $cate_list instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['catid']; ?>" <?php if($vo['catid'] == $catid): ?>selected="selected"<?php endif; ?> ><?php echo str_repeat("&nbsp;└─&nbsp;",$vo['level']); ?><?php echo get_catname($vo['catid']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                             <th width="70">作者:</th>
                            <td><input class="common-text" placeholder="作者名" name="username" value="<?php echo !empty($username)?$username:''; ?>"  type="text"></td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="q" value="<?php echo !empty($q)?$q:''; ?>"  type="text"></td>
                            <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                            <td><input class="btn btn-primary btn2" value="清空" type="reset"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo url('Article/add'); ?>"><i class="icon-font"></i>添加文章</a>
                        <a onclick="myform.action='<?php echo url('Article/delete'); ?>';myform.submit();" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a onclick="myform.action='<?php echo url('Article/listorder'); ?>';myform.submit();" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                        <a onclick="myform.action='<?php echo url('Article/status'); ?>';myform.submit();" href="javascript:void(0)"><i class="icon-font"></i>更新状态</a>
                        <a onClick="confirm_delete()" href="<?php echo url('Article/deleteAll'); ?>"><i class="icon-font"></i>删除所有文章</a>
                        <a href="<?php echo url('Position/index'); ?>"><i class="icon-font"></i>推荐位管理</a>
                    </div>
                  
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="20"><input class="allChoose" id="check_box" onclick="selectall('id[]');" type="checkbox"></th>
                            <th width="60">排序</th>
                            <th>标题</th>
                            <th width="50">状态</th>
                            <th width="200">栏目</th>
                            <th width="100">作者</th>
                            <th width="80">操作</th>
                            <th width="120">创建时间</th>
                        </tr>
                        <?php if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr align="center">
                            <td class="tc"><input name="id[]" value="<?php echo $vo['id']; ?>" type="checkbox"></td>
                            <td>
                               <input class="common-input sort-input" name="listorder[<?php echo $vo['id']; ?>]" value="<?php echo $vo['listorder']; ?>" type="text">
                            </td>
                            <td align="left"><a target="_blank" href="<?php echo $vo['url']; ?>" title="<?php echo $vo['title']; ?>"><?php echo !empty($q)?str_replace($q, '<font color=red>'.$q.'</font>', $vo['title']):$vo['title']; ?></a>
                            </td>
                            <td><?php echo !empty($vo['status'])?'已审核':'<font color=red>未审核</font>'; ?></td>
                            <td><a target="_blank" href="<?php echo get_caturl($vo['catid']); ?>" title="<?php echo get_catname($vo['catid']); ?>"><?php echo get_catname($vo['catid']); ?></a></td>
                            <td><?php echo $vo['username']; ?></td>
                            <td>
                                <a class="link-update" href="<?php echo url('Article/edit',['id'=>$vo['id']]); ?>">修改</a>
                                <a class="link-del" href="<?php echo url('Article/delete',['id'=>$vo['id']]); ?>">删除</a>
                            </td>
                            <td>
                                <?php echo date('Y-m-d',$vo['inputtime']);; ?>
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
