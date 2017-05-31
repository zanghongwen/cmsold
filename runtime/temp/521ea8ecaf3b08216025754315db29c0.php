<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/Users/mac/Documents/mamp/cms/application/user/view/index/headpic.html";i:1492090716;}*/ ?>
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
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改头像</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo url('Index/headpic'); ?>">
     
      <div class="form-group">
        <div class="label">
        </div>
        <div class="field">
          
        <img class="radius-circle rotate-hover" height="150" alt="" src="<?php echo $headpic; ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="label">
        </div>
        <div class="field">
          <input type="file"  id="headpic" />
        </div>
      </div>
      <link rel="stylesheet" type="text/css" href="__PUBLIC__/uploadify/uploadify.css"/>
      <script type="text/javascript" src="__PUBLIC__/uploadify/jquery.uploadify.min.js"></script>
      <script type="text/javascript">
			$("#headpic").uploadify({
				queueSizeLimit : 1,
				height          : 30,
				swf             : '__PUBLIC__/uploadify/uploadify.swf',
				fileObjName     : 'file',
				buttonText      : '上传头像',
				uploader        : "__ROOT__/api.php/upload/upimg.html",
				width           : 120,
				removeTimeout	  : 1,
				fileTypeExts	  : '*.jpg; *.png; *.gif;',
				fileSizeLimit   :2048,
				onUploadSuccess : uploadPicture,
				onFallback : function() {
					alert('未检测到兼容版本的Flash.');
				}
			});
			function uploadPicture(file, data){
				var data = $.parseJSON(data);
				if(data.status){           	
							var html = '<span>'+ '<img style="max-width:300px; max-height:100px;" src="'+data.url+'">' ;
							html += '<a href="javascript:void(0)" onclick="delete_attachment(this);">&nbsp;&nbsp;删除</a>';
							html += '<input type="hidden" name="headpic" value="'+data.url+'" /></span>';
							$('#headpic').after(html);
				} else {
					alert('上传出错，请稍后再试');
					return false;
				}
			}
			</script>
      
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