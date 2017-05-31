<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/Users/mac/Documents/mamp/cms/application/install/view/index/step2.html";i:1494428156;}*/ ?>
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
							<div class="active"><span>创建数据库</span></div>
							<div><span>安装</span></div>
							<div><span>完成</span></div>
						</div>
			</div>
			<div class="col-md-9 right" >
				
				<form class="form-horizontal" action="<?php echo url('index/step2'); ?>" id="form" method="post">
					<div class="page-header">
					 	<h3><b>数据库信息</b></h3>
					</div>
				  <div class="form-group">
				    <label for="input1" class="col-sm-3 control-label">数据库类型</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="db[]" id="input1" readonly value="mysql">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input2" class="col-sm-3 control-label">数据库地址</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" name="db[]" id="input2" value="localhost">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input3" class="col-sm-3 control-label">数据库名称</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="input3" name="db[]">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input4" class="col-sm-3 control-label">数据库账号</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="input4" name="db[]">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input5" class="col-sm-3 control-label">数据库密码</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="input5" name="db[]">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input6" class="col-sm-3 control-label">数据库端口</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="input6" name="db[]" value="3306">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input7" class="col-sm-3 control-label">数据表前缀</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="input7" name="db[]" value="five_">
				    </div>
				  </div>
				  	<div class="page-header">
					 	<h3><b>管理员信息</b></h3>
					</div>
				  <div class="form-group">
				    <label for="input8" class="col-sm-3 control-label">账号</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="input8" name="admin[]">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input9" class="col-sm-3 control-label">密码</label>
				    <div class="col-sm-6">
				      <input type="password" class="form-control" id="input9" name="admin[]">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input10" class="col-sm-3 control-label">确认密码</label>
				    <div class="col-sm-6">
				      <input type="password" class="form-control" id="input10" name="admin[]">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input11" class="col-sm-3 control-label">邮箱</label>
				    <div class="col-sm-6">
				      <input type="email" class="form-control" id="input11" name="admin[]">
				    </div>
				  </div>
				</form>
				
			</div>
			<div class="col-md-9 col-md-offset-3 footer" >
				<a class="btn btn-info" href="<?php echo url('index/step1'); ?>">上一步</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="button" id="but" class="btn btn-success">下一步</button>
			</div> 
			
		</div>
  </div>
</div>


	
</body>
<script src="__PUBLIC__/install/layer/layer.js"></script>
<script>
var index;
$(function(){

});

	$('#but').click(function(event) {
		index = layer.load(1, {
			offset: ['50%', '50%'],
			shade: [0.1,'#fff'] //0.1透明度的白色背景
		});
		// $('form').submit();
		$.ajax({
        cache:true,
        type :"POST",
        url  :'<?php echo url('index/step2'); ?>',
        data :$('#form').serialize(),
        async:false,
           success:function(data){
           	layer.close(index);
            if(data.code){
                location.href=data.url;
            } else {
              alert(data.msg);
            }
           },
           error:function(request){
           	layer.close(index);
            alert("数据库创建失败，请检查数据库信息是否填写正确");
           }
      }); 
	});
</script>
</html>