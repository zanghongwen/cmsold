<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/Users/mac/Documents/mamp/cms/application/install/view/index/step3.html";i:1482318874;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>fivecms安装</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/install/css/install.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/bootstrap/css/bootstrap.min.css">
	<script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
	<script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background:#EBF0F5">
<div style="background:#228BB5;height:80px;line-height:80px;margin-bottom:10px"><span style="margin-left:50px;"><img src="__PUBLIC__/install/images/logo.png" alt=""></span></div>
	<div class="container" style="background:#EBF0F5">
<div class="row">
  <div class="col-md-10 col-md-offset-1" >
  		<div class="row">
  			<div class="col-md-3" >
  						<div class="left fl">
							<div class="title">安装步骤</div>
							<div><span>安装协议</span></div>
							<div><span>环境检测</span></div>
							<div><span>创建数据库</span></div>
							<div class="active"><span>安装</span></div>
							<div><span>完成</span></div>
						</div>
			</div>
			<div class="col-md-9 right" id="show-list">
				
				
			</div>
			<div class="col-md-9 col-md-offset-3 " style="text-align:center">
				<p><b style="color:green">正在安装程序，请稍后...</b></p>
			</div> 
			
		</div>
  </div>
</div>


	
</body>
<script type="text/javascript">
        var list   = document.getElementById('show-list');
        function showmsg(msg, classname){
            var li = document.createElement('p'); 
            li.innerHTML = msg;
            classname && li.setAttribute('class', classname);
            list.appendChild(li);
            list.scrollTop += 30;
        }
</script>
</html>