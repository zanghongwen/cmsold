<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/Users/mac/Documents/mamp/cms/application/user/view/index/detail.html";i:1492002346;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>会员信息</title>  
    <link rel="stylesheet" href="__PUBLIC__/user/css/pintuer.css">
    <link rel="stylesheet" href="__PUBLIC__/user/css/style.css">
    <script src="__PUBLIC__/user/js/jquery.js"></script> 
    <script src="__PUBLIC__/user/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo url('Index/detail'); ?>">
     
    
      <div class="form-group">
        <div class="label">
          <label>昵称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="nickname" value="<?php echo $info['nickname']; ?>" style="width:25%; float:left;" />
           </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>邮箱：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="email" value="<?php echo $info['email']; ?>" style="width:25%; float:left;" />
           </div>
      </div>
      
       <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
    </form>
  </div>
</div>
</body></html>