<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"D:\wamp64\www\fivecms\thinkphp\tpl\dispatch_jump.tpl";i:1482343590;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: "Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 16px; }
        .system-message{ padding-bottom:20px;text-align:center; border-radius:10px; color: #333; border:#0088cc solid 1px; margin:100px auto; width:400px;}
        .system-message h2{ font-size:18px; display: block; width:400px; background:#0088cc;border-radius:10px 10px 0 0; height:35px; color:#FFF; line-height:35px; margin:0 auto;}
		.system-message .jump{ padding-top: 10px; }
        .system-message .jump a{ color: #F00; text-decoration:none; }
        .system-message .success,.system-message .error{ line-height: 1.8em; font-size: 18px; }
        .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display: none; }
    </style>
</head>
<body>
    <div class="system-message">
    <h2>提示信息</h2>
        <?php switch ($code) {case 1:?>
            <p class="success"><?php echo(strip_tags($msg));?></p>
            <?php break;case 0:?>
            <p class="error"><?php echo(strip_tags($msg));?></p>
            <?php break;} ?>
        <p class="detail"></p>
        <p class="jump">
            页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
        </p>
    </div>
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>
