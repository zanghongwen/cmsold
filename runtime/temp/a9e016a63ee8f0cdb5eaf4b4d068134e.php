<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:28:"template/blueblog/index.html";i:1494757814;s:31:"./template/blueblog/header.html";i:1494759508;s:30:"./template/blueblog/right.html";i:1494757799;s:31:"./template/blueblog/footer.html";i:1494756692;}*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $seo['title']; ?></title>
<meta name="keywords" content="<?php echo $seo['keywords']; ?>">
<meta name="description" content="<?php echo $seo['description']; ?>">
<link href="__PUBLIC__/style2017/blueblog/style.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/style2017/blueblog/page.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    	
       <div id="site_title">
            <h1><a href="__ROOT__">
                <img src="__PUBLIC__/style2017/blueblog/images/templatemo_logo.png" alt="tripod blog" /></a>
                <span>free blog template</span>
            </h1>
        </div>
        
        <div id="templatemo_rss">
            <a href="#">SUBSCRIBE<br /><span>OUR FEED</span></a>
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
    
</div>



<div id="templatemo_main">
    	<div id="templatemo_content">
        
        	<div id="templatemo_slider">
                <div id="featuredslideshow">
                    <ul> 
                         <?php $__LIST__ = db('position_data')->alias('p')->join('__ARTICLE__ a','p.contentid= a.id')->field('p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username')->where("p.posid=1")->order("inputtime desc")->limit(5)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><img width="580" height="300"  src="<?php echo $vo['thumb']; ?>" /></li> 
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                       
                    </ul> 
                </div>
                <script type="text/javascript">
                     $("div#featuredslideshow").slideViewerPro({ 
                    thumbs: 4,  
                    thumbsPercentReduction: 15, 
                    galBorderWidth: 0, 
                    galBorderColor: "#666", 
                    thumbsTopMargin: 10, 
                    thumbsRightMargin: 10, 
                    thumbsBorderWidth: 1, 
                    thumbsActiveBorderColor: "#000", 
                    thumbsActiveBorderOpacity: 0.8, 
                    thumbsBorderOpacity: 0, 
                    buttonsTextColor: "#707070", 
                    autoslide: true,  
                    typo: true ,
					leftButtonInner: "<img src='__PUBLIC__/style2017/cityblog/images/larw.gif' />", 
			        rightButtonInner: "<img src='__PUBLIC__/style2017/cityblog/images/rarw.gif' />", 
                    });  	
                </script>
            </div>
            <?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="post_box">
        		<img src="<?php echo $vo['thumb']; ?>" />
                <div class="post_box_right">               
					<h2><?php echo $vo['title']; ?></h2>
				  <div class="post_meta"><strong>日期:</strong> <?php echo date("Y-m-d",$vo['inputtime']); ?> | <strong>浏览:</strong> <?php echo get_hits($vo['id']); ?></div>
                    <p><?php echo $vo['description']; ?>...</p>
                 <a href="<?php echo $vo['url']; ?>" class="more">更多详情</a><br />
                   <div class="category">分类: <a href="<?php echo get_caturl($vo['catid']); ?>"><?php echo get_catname($vo['catid']); ?></a></div>
    			</div>
                <div class="cleaner"></div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
           
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
