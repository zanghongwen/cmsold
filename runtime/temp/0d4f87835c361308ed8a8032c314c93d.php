<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:26:"template/redblog/list.html";i:1494755483;s:30:"./template/redblog/header.html";i:1494755457;s:30:"./template/redblog/footer.html";i:1492847586;}*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $seo['title']; ?></title>
<meta name="keywords" content="<?php echo $seo['keywords']; ?>">
<meta name="description" content="<?php echo $seo['description']; ?>">
<link href="__PUBLIC__/style2017/redblog/style.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/style2017/redblog/page.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="templatemo_top_wrapper">
	<div id="templatemo_top">
    
        <div id="templatemo_menu">
                    
            <ul>
                <li><a href="__ROOT__" class="current">Home</a></li>
                <?php $__CATEGORY__ = db('category')->where('pid',0)->where('ishidden',0)->order("listorder asc")->limit(3)->select();if(is_array($__CATEGORY__) || $__CATEGORY__ instanceof \think\Collection || $__CATEGORY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__CATEGORY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo $vo['catname']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>    	
        
        </div> <!-- end of templatemo_menu -->
        
        <div id="twitter">
        	<a href="#"></a>
        </div>
        
  </div>
</div>

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1><a href="#"><strong>Red Blog</strong><span>欢迎光临</span></a></h1>
        </div>
    
    </div>
</div>
<div id="templatemo_main_wrapper">
	<div id="templatemo_main">
		<div id="templatemo_main_top">
        
        	<div id="templatemo_content">
         <?php if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    		<div class="post_section">
           
            	<div class="post_date">
                	<?php echo date("d",$vo['inputtime']); ?><span><?php echo date("m",$vo['inputtime']); ?></span>
            	</div>
                <div class="post_content">
                                
                                    <h2><a href="<?php echo $vo['url']; ?>" style=" text-decoration:none;"><?php echo $vo['title']; ?></a></h2>
                
                                    <strong>作者:</strong> <?php echo $vo['username']; ?> | <strong>分类:</strong> <?php echo get_catname($vo['catid']); ?>
                                    
                                    <a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['thumb']; ?>" alt="<?php echo $vo['title']; ?>" /></a>
                                   <p><?php echo $vo['description']; ?></p>
                </div>
                <div class="cleaner"></div>
            </div>
             <?php endforeach; endif; else: echo "" ;endif; ?>   
            
              <?php echo $page; ?>
       	  </div>
            
          
          <div id="templatemo_sidebar">
            	
                <h4>日记分类</h4>
                <ul class="templatemo_list">
                 <?php $__CATEGORY__ = db('category')->where('pid',0)->where('ishidden',0)->order("catid desc")->limit(10)->select();if(is_array($__CATEGORY__) || $__CATEGORY__ instanceof \think\Collection || $__CATEGORY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__CATEGORY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo $vo['catname']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                
                <div class="cleaner_h40"></div>
                
                <h4>热门日记</h4>
                <ul class="templatemo_list">
                <?php $__LIST__ =db('article')->where("status=1")->order("id desc")->limit(10)->select();if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                
                <div id="ads">
                	<a href="#"><img src="__PUBLIC__/style2017/redblog/images/templatemo_200x100_banner.jpg" alt="banner 1" /></a>
                    
                    <a href="#"><img src="__PUBLIC__/style2017/redblog/images/templatemo_200x100_banner.jpg" alt="banner 2" /></a>
                </div>
                
            </div>
        
        	<div class="cleaner"></div>
            
        </div>
        
    </div>
    
    <div id="templatemo_main_bottom"></div>
    
</div>

<div id="templatemo_footer">

    Copyright © 2017 西瓜网络
    
</div>

</body>
</html>