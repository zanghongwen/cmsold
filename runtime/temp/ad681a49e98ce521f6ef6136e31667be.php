<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:27:"template/default/index.html";i:1494759647;s:30:"./template/default/header.html";i:1494754851;s:30:"./template/default/footer.html";i:1494689466;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $seo['title']; ?></title>
<meta name="keywords" content="<?php echo $seo['keywords']; ?>">
<meta name="description" content="<?php echo $seo['description']; ?>">
<link  rel="stylesheet" href="__PUBLIC__/style2017/default/style.css" type="text/css" />
<link  rel="stylesheet" href="__PUBLIC__/style2017/default/page.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/style2017/default/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/style2017/default/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/style2017/default/js/gotoTop.js"></script>
<script type="text/javascript">
$(function(){
	$(".backToTop").goToTop();
	$(window).bind('scroll resize',function(){
		$(".backToTop").goToTop({
			pageWidth:960,
			duration:0
		});
	});
});
</script>
</head>
<body>
<div class="top">
	<span>
        <a href="__ROOT__/user.php/login/index.html" target="_blank">登录</a>
        <a href="__ROOT__/user.php/register/index.html" target="_blank">注册</a>
        <a href=""onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('__ROOT__');">设为首页</a> - 
        <a href="javascript:window.external.AddFavorite('__ROOT__','<?php echo $seo['title']; ?>')">加入收藏</a>
    </span>
    360仿站，专注仿站！ 
</div>
<div class="head">
	<div class="logo fl"><a href="__ROOT__"><img src="__PUBLIC__/style2017/default/images/logo.jpg" /></a></div>
    <div class="tagso fr">
        <div class="serach fl">
            <form action="__ROOT__/index.php/search/search.html" name="get">
                <input name="q" type="text" class="search-keyword fl" id="search-keyword" value="站内搜索" onfocus="if(this.value=='站内搜索'){this.value='';}"  onblur="if(this.value==''){this.value='站内搜索';}"/>
                <button type="submit" class="search-submit fl">搜索</button>
            </form>
        </div>
        热搜：<?php $__LIST__ = db('tag')->order("rand()")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a style="color:#<?php echo random_color(); ?>; font-size:<?php echo rand(12,18); ?>px;" href='__ROOT__/index.php/tag/tag.html?tag=<?php echo urlencode($vo['tag']); ?>'><?php echo $vo['tag']; ?></a> <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="cl"></div>
</div>
<div class="nav1">
	<ul class="n-box1">
    	<li class="u-1"><a href="__ROOT__/">首页</a></li>
        <?php $__CATEGORY__ = db('category')->where('pid',0)->where('ishidden',0)->order("catid desc")->limit(8)->select();if(is_array($__CATEGORY__) || $__CATEGORY__ instanceof \think\Collection || $__CATEGORY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__CATEGORY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      	<li><a href='<?php echo $vo['url']; ?>'><?php echo $vo['catname']; ?></a></li>
      	<?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<div class="ad-960"><img src="__PUBLIC__/style2017/default/images/ad1.jpg" width="960" alt="广告位" /></div>
<div class="main1">
	<div class="left-1 fl">
        <div id="slideBox" class="slideBox">
            <div class="hd">
                <ul>
                	<?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li></li>
                   <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                </ul>
            </div>
            <div class="bd">
                <ul>
                	<?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li><p><a href="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></p><a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <script type="text/javascript">jQuery(".slideBox").slide( { mainCell:".bd ul",effect:"left",autoPlay:true} );</script>
        <div class="g-box1">
        	<div class="t-1">特别推荐</div>
            <ul class="b-box1">
            	<?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(7)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
	</div>
    <div class="g-box2 fl">
    	<?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(0,1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    	<h1><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></h1>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <ul class="b-box1">
        	<?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(1,5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li><span><a href="<?php echo get_caturl($vo['catid']); ?>"><?php echo get_catname($vo['catid']); ?></a></span> | <a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(6,1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    	<h1><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></h1>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <ul class="b-box1">
        	<?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(7,5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li><span><a href="<?php echo get_caturl($vo['catid']); ?>"><?php echo get_catname($vo['catid']); ?></a></span> | <a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(8,1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    	<h1><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></h1>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <ul class="b-box1">
        	<?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(9,5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li><span><a href="<?php echo get_caturl($vo['catid']); ?>"><?php echo get_catname($vo['catid']); ?></a></span> | <a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="right-1 fr">
    	<div class="g-box3">
        	<div class="t-1">大家都在看</div>
            <ul class="b-box2">
            	<?php $__LIST__ = db('hits')->alias('h')->join('__ARTICLE__ a','h.contentid= a.id')->field('h.*,a.title,a.url,a.inputtime,a.keywords,a.description,a.username')->order("views desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="ad-250"><img src="__PUBLIC__/style2017/default/images/ad2.jpg" width="250" height="250" alt="广告位" /></div>
    </div>
	<div class="cl"></div>
</div>
<div class="ad-960"><img src="__PUBLIC__/style2017/default/images/ad1.jpg" width="960" alt="广告位" /></div>
<div class="main1">
	<div class="t-3">
    	<span> 
        	<?php $__CATEGORY__ = db('category')->where('pid',0)->where('ishidden',0)->order("catid desc")->limit(5)->select();if(is_array($__CATEGORY__) || $__CATEGORY__ instanceof \think\Collection || $__CATEGORY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__CATEGORY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> / <a href='<?php echo $vo['url']; ?>'><?php echo $vo['catname']; ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </span>
        <h3><a href="#">社会新闻</a></h3>
    </div>
    <div class="left-2 fl">
    	<div class="b-box3">
        	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <p><a href="{$vo.url]"><?php echo $vo['title']; ?></a></p><a href="<?php echo $vo['url']; ?>]"><img src="<?php echo $vo['thumb']; ?>" /></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
        <div class="g-box4">
        	<div class="t-2"><a href="#">湖南</a></div>
            <div class="pic">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            	<a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /></a>
                <p><a href="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></p>
               <?php echo str_cut($vo['description'],40,''); ?>...<a href="<?php echo $vo['url']; ?>">[详细]</a>
               <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(3)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="g-box4">
        	<div class="t-2"><a href="#">湖北</a></div>
            <ul class="b-box1">
                <?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="middle-1 fl">
    	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    	<h2><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></h2>
        <p><?php echo str_cut($vo['description'],100,'...'); ?><a href="<?php echo $vo['url']; ?>">[查看全文]</a></p>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <ul class="b-box4">
        	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(3)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li><a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="cl"></div>
        </ul>
        <div class="g-box5">
        	<div class="t-4 fl">
            	<span><a href="#">&raquo;更多</a></span>
            	<h3><a href="#">福建</a></h3>
            </div>
        	<div class="pic fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5-1 fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(4)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="cl"></div>
        </div>
        <div class="g-box5">
        	<div class="t-4 fl">
            	<span><a href="#">&raquo;更多</a></span>
            	<h3><a href="#">海南</a></h3>
            </div>
        	<div class="pic fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5-1 fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(4)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="cl"></div>
        </div>
    </div>
    <div class="right-2 fr">
    	<div class="g-box6">
        	<div class="t-2">热门文章</div>
            <ul class="b-box2">
            	<?php $__LIST__ = db('hits')->alias('h')->join('__ARTICLE__ a','h.contentid= a.id')->field('h.*,a.title,a.url,a.inputtime,a.keywords,a.description,a.username')->order("views desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="g-box6">
        	<div class="t-2"><a href="#">河北</a></div>
            <ul class="b-box6">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(2)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><p><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></p><a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="cl"></div>
            </ul>
            <ul class="b-box7">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="cl"></div>
</div>
<div class="ad-960"><img src="__PUBLIC__/style2017/default/images/ad1.jpg" width="960" alt="广告位" /></div>
<div class="main1">
	<div class="t-3">
    	<span> 
        	<?php $__CATEGORY__ = db('category')->where('pid',0)->where('ishidden',0)->order("catid desc")->limit(5)->select();if(is_array($__CATEGORY__) || $__CATEGORY__ instanceof \think\Collection || $__CATEGORY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__CATEGORY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> / <a href='<?php echo $vo['url']; ?>'><?php echo $vo['catname']; ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </span>
        <h3><a href="#">娱乐新闻</a></h3>
    </div>
    <div class="left-2 fl">
    	<div class="b-box3">
        	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <p><a href="{$vo.url]"><?php echo $vo['title']; ?></a></p><a href="<?php echo $vo['url']; ?>]"><img src="<?php echo $vo['thumb']; ?>" /></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
        <div class="g-box4">
        	<div class="t-2"><a href="#">湖南</a></div>
            <div class="pic">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            	<a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /></a>
                <p><a href="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></p>
               <?php echo str_cut($vo['description'],40,''); ?>...<a href="<?php echo $vo['url']; ?>">[详细]</a>
               <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(3)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="g-box4">
        	<div class="t-2"><a href="#">湖北</a></div>
            <ul class="b-box1">
                <?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="middle-1 fl">
    	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    	<h2><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></h2>
        <p><?php echo str_cut($vo['description'],100,'...'); ?><a href="<?php echo $vo['url']; ?>">[查看全文]</a></p>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <ul class="b-box4">
        	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(3)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li><a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="cl"></div>
        </ul>
        <div class="g-box5">
        	<div class="t-4 fl">
            	<span><a href="#">&raquo;更多</a></span>
            	<h3><a href="#">福建</a></h3>
            </div>
        	<div class="pic fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5-1 fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(4)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="cl"></div>
        </div>
        <div class="g-box5">
        	<div class="t-4 fl">
            	<span><a href="#">&raquo;更多</a></span>
            	<h3><a href="#">海南</a></h3>
            </div>
        	<div class="pic fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5-1 fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(4)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="cl"></div>
        </div>
    </div>
    <div class="right-2 fr">
    	<div class="g-box6">
        	<div class="t-2">热门文章</div>
            <ul class="b-box2">
            	<?php $__LIST__ = db('hits')->alias('h')->join('__ARTICLE__ a','h.contentid= a.id')->field('h.*,a.title,a.url,a.inputtime,a.keywords,a.description,a.username')->order("views desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="g-box6">
        	<div class="t-2"><a href="#">河北</a></div>
            <ul class="b-box6">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(2)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><p><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></p><a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="cl"></div>
            </ul>
            <ul class="b-box7">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="cl"></div>
</div>
<div class="ad-960"><img src="__PUBLIC__/style2017/default/images/ad1.jpg" width="960" alt="广告位" /></div>
<div class="main1">
	<div class="t-3">
    	<span> 
        	<?php $__CATEGORY__ = db('category')->where('pid',0)->where('ishidden',0)->order("catid desc")->limit(5)->select();if(is_array($__CATEGORY__) || $__CATEGORY__ instanceof \think\Collection || $__CATEGORY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__CATEGORY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> / <a href='<?php echo $vo['url']; ?>'><?php echo $vo['catname']; ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </span>
        <h3><a href="#">体育新闻</a></h3>
    </div>
    <div class="left-2 fl">
    	<div class="b-box3">
        	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <p><a href="{$vo.url]"><?php echo $vo['title']; ?></a></p><a href="<?php echo $vo['url']; ?>]"><img src="<?php echo $vo['thumb']; ?>" /></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
        <div class="g-box4">
        	<div class="t-2"><a href="#">湖南</a></div>
            <div class="pic">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            	<a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /></a>
                <p><a href="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></p>
               <?php echo str_cut($vo['description'],40,''); ?>...<a href="<?php echo $vo['url']; ?>">[详细]</a>
               <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(3)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="g-box4">
        	<div class="t-2"><a href="#">湖北</a></div>
            <ul class="b-box1">
                <?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="middle-1 fl">
    	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    	<h2><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></h2>
        <p><?php echo str_cut($vo['description'],100,'...'); ?><a href="<?php echo $vo['url']; ?>">[查看全文]</a></p>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <ul class="b-box4">
        	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(3)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li><a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="cl"></div>
        </ul>
        <div class="g-box5">
        	<div class="t-4 fl">
            	<span><a href="#">&raquo;更多</a></span>
            	<h3><a href="#">福建</a></h3>
            </div>
        	<div class="pic fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5-1 fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(4)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="cl"></div>
        </div>
        <div class="g-box5">
        	<div class="t-4 fl">
            	<span><a href="#">&raquo;更多</a></span>
            	<h3><a href="#">海南</a></h3>
            </div>
        	<div class="pic fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(1)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /><?php echo str_cut($vo['title'],40,''); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <ul class="b-box5-1 fl">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(4)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="cl"></div>
        </div>
    </div>
    <div class="right-2 fr">
    	<div class="g-box6">
        	<div class="t-2">热门文章</div>
            <ul class="b-box2">
            	<?php $__LIST__ = db('hits')->alias('h')->join('__ARTICLE__ a','h.contentid= a.id')->field('h.*,a.title,a.url,a.inputtime,a.keywords,a.description,a.username')->order("views desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="g-box6">
        	<div class="t-2"><a href="#">河北</a></div>
            <ul class="b-box6">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(2)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><p><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></p><a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" /></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="cl"></div>
            </ul>
            <ul class="b-box7">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],40,''); ?></a></li>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="cl"></div>
</div>

<div class="link">
	<div class="link-t">
    	<h4>友情链接</h4>
    	<span></span>
    </div>
    <ul>
       <?php $__LIST__ = db('flink')->where("logo  = ''")->order("id desc")->limit(20)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    	<li><a href="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="cl"></div>
    </ul>
</div>
<div class="footer">
	<p>© 2017 fivecms</p>
</div>
</body>
</html>

