<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/Users/mac/Documents/mamp/cms/application/user/view/index/article_add.html";i:1492091860;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>添加文章</title>
<link rel="stylesheet" href="__PUBLIC__/user/css/pintuer.css">
<link rel="stylesheet" href="__PUBLIC__/user/css/style.css">
<script src="__PUBLIC__/user/js/jquery.js"></script> 
<script src="__PUBLIC__/user/js/pintuer.js"></script>

<link href="__PUBLIC__/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/uploadify/uploadify.css"/>
<script type="text/javascript" src="__PUBLIC__/uploadify/jquery.uploadify.min.js"></script>
        
  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加文章</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo url('Index/article_add'); ?>">
    <div class="form-group">
        <div class="label">
          <label>栏目：</label>
        </div>
        <div class="field">
            <select name="catid" class="input w50">
             <option value="0">选择栏目</option>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $vo['catid']; ?>"><?php echo str_repeat("&nbsp;└─&nbsp;",$vo['level']); ?><?php echo $vo['catname']; ?>（<?php if($vo['issend']): ?>允许发表<?php else: ?>不允许发表<?php endif; ?>）</option>
             <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <div class="tips"></div>
          </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input"  name="title" id="title"  onBlur="$.post('__ROOT__/api.php/keyword/get_keywords.html?number=3&sid='+Math.random()*5, {data:$('#title').val()}, function(data){if(data && $('#keywords').val()=='') $('#keywords').val(data); })"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>关键词：</label>
        </div>
        <div class="field">
          <input type="text" class="input" id="keywords" name="keywords" style="width:30%;" />
          <div class="tips">多关键词之间用空格或者“,”隔开</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>缩略图：</label>
        </div>
        <div class="field">
        <input type="file"  id="thumb" />
        <script type="text/javascript">
			$("#thumb").uploadify({
				queueSizeLimit : 1,
				height          : 30,
				swf             : '__PUBLIC__/uploadify/uploadify.swf',
				fileObjName     : 'file',
				buttonText      : '上传图片',
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
							html += '<input type="hidden" name="thumb" value="'+data.url+'" /></span>';
							$('#thumb').after(html);
				} else {
					alert('上传出错，请稍后再试');
					return false;
				}
			}
			function delete_attachment(e){
				var $this = $(e);
				$this.parent('span').remove();
			}
			</script>
        </div>
      </div>     
      
     
      
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="description" style="height:90px;"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <?php echo form_editor('content'); ?>
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
  </div>
</div>

</body></html>