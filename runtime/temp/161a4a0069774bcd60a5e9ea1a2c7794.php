<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:36:"template/default/guestbook_list.html";i:1494694162;s:30:"./template/default/header.html";i:1494751252;s:30:"./template/default/footer.html";i:1494685868;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div class="weizhi-1">当前位置： <a href="__ROOT__">首页</a> > 留言列表</div>
<div class="main1">
	<div class="left-3 fl">
      	<ul class="g-list">
        	 <?php if(is_array($guestbook_list) || $guestbook_list instanceof \think\Collection || $guestbook_list instanceof \think\Paginator): $i = 0; $__LIST__ = $guestbook_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li>
            	<h3><?php echo $vo['title']; ?></h3>
                <p><?php echo date("Y-m-d H:i:s",$vo['addtime']); ?></p>
                <p><?php echo $vo['content']; ?></p>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>  
         <?php echo $page; ?>
    </div>
    <div class="right-1 fr">
    	<div class="g-box8">
            <div class="t-2">推荐文章</div>
            <ul>
            	<?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                    <p><a href="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></p>
                    <div class="dis_pi">
                        <a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>"  /></a>
                        <span class="pic_r"><?php echo str_cut($vo['description'],60,''); ?><a href="<?php echo $vo['url']; ?>">[详细]</a></span>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <script type="text/javascript">jQuery(".g-box8").slide({ titCell:"li",triggerTime:0 });	</script>
        <div class="ad-250"><img src="__PUBLIC__/style2017/default/images/ad2.jpg" width="250" height="250" alt="广告位" /></div>
    	<div class="g-box3 u-3">
        	<div class="t-1">热点阅读</div>
            <ul class="b-box2">
            	<?php $__LIST__ = db('hits')->alias('h')->join('__ARTICLE__ a','h.contentid= a.id')->field('h.*,a.title,a.url,a.inputtime,a.keywords,a.description,a.username')->order("views desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],50,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="ad-250"><img src="__PUBLIC__/style2017/default/images/ad2.jpg" width="250" height="250" alt="广告位" /></div>
        <div class="g-box9">
        	<div class="t-2">随机内容</div>
            <ul class="b-box10">
                <?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(6)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><p><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],50,''); ?></a></p><a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>"  /></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="cl"></div>
            </ul>
            <ul class="b-box7">
            	<?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(6)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo str_cut($vo['title'],50,''); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
	<div class="cl"></div>
</div>
<div class="footer">
	<p>© 2017 fivecms</p>
</div>
</body>
</html>

