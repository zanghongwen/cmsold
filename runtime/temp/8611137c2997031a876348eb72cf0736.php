<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:27:"template/cityblog/list.html";i:1494758258;s:31:"./template/cityblog/header.html";i:1494756580;s:30:"./template/cityblog/right.html";i:1494757799;s:31:"./template/cityblog/footer.html";i:1494756692;}*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $seo['title']; ?></title>
<meta name="keywords" content="<?php echo $seo['keywords']; ?>">
<meta name="description" content="<?php echo $seo['description']; ?>">

<link href="__PUBLIC__/style2017/cityblog/style.css" rel="stylesheet" type="text/css" />

<link href="__PUBLIC__/style2017/cityblog/css/svwp_style.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/style2017/cityblog/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/style2017/cityblog/js/jquery.slideViewerPro.1.0.js" type="text/javascript"></script>
</head>
<body>

<div id="templatemo_wrapper">

    <div id="templatemo_header">
        <div id="site_title">
            <a href="#">
                <img src="__PUBLIC__/style2017/cityblog/images/templatemo_logo.png" alt="City Blog Template" />
                <span></span>
            </a>
        </div> 
    </div>

	<div id="templatemo_menu">
        <ul>
            <li><a href="__ROOT__" class="current">Home</a></li>
           <?php $__CATEGORY__ = db('category')->where('pid',0)->where('ishidden',0)->order("listorder asc")->limit(3)->select();if(is_array($__CATEGORY__) || $__CATEGORY__ instanceof \think\Collection || $__CATEGORY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__CATEGORY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo $vo['catname']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>    	
    </div> 
 
<div id="templatemo_main">
    	<div id="templatemo_content">
        
        	<h1><?php echo $category['catname']; ?></h1>
            <p></p>
                    
            <div class="cleaner h40"></div>
                
            <div id="gallery">
             <?php if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class="gallery_box">
					<a href="<?php echo $vo['url']; ?>" class="pirobox gallery_img image_wrapper" title="Project 1"><img src="<?php echo $vo['thumb']; ?>" width="240" height="160" /></a>
                    <div class="right">
                    	<h5><?php echo $vo['title']; ?></h5>
                        <p><?php echo $vo['description']; ?></p>
                        <a href="<?php echo $vo['url']; ?>" class="more float_r">查看详情</a>
					</div>
                    <div class="cleaner"></div>
				</div>
               <?php endforeach; endif; else: echo "" ;endif; ?> 
              <?php echo $page; ?>
            </div>
        
        </div> 
        
         <div id="templatemo_sidebar">
        
	        <div class="sidebar_box">
				<a href="#"><img src="__PUBLIC__/style2017/cityblog/images/templatemo_ads.jpg" alt="banner" /></a>
            </div>  
        	
            <div class="sidebar_box">
            	<h4>日记分类</h4>
                <ul class="tmo_list">  
                   	<?php $__CATEGORY__ = db('category')->where('pid',0)->where('ishidden',0)->order("catid desc")->limit(10)->select();if(is_array($__CATEGORY__) || $__CATEGORY__ instanceof \think\Collection || $__CATEGORY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__CATEGORY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo $vo['catname']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>                
                </ul>
            </div>
            
            <div class="sidebar_box">
            	<h4>热门日记</h4>
                <?php $__LIST__ = db('hits')->alias('h')->join('__ARTICLE__ a','h.contentid= a.id')->field('h.*,a.title,a.url,a.inputtime,a.keywords,a.description,a.username')->order("views desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="recent_comment_box">
                    <a href="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a>
                    <p><?php echo $vo['description']; ?></p>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
               
            </div>
        	
        </div>
    
    	<div class="cleaner"></div>
    </div>

</div> 


<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
			
        Copyright © 2048 西瓜网络
        
    	<div class="cleaner"></div>		
    </div>
</div>

</body>
</html>
