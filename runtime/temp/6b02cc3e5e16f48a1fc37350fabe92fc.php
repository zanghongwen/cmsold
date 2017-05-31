<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/Users/mac/Documents/mamp/cms/application/user/view/index/article_list.html";i:1492073500;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>文章列表</title>
<link rel="stylesheet" href="__PUBLIC__/user/css/pintuer.css">
<link rel="stylesheet" href="__PUBLIC__/user/css/style.css">
<script src="__PUBLIC__/user/js/jquery.js"></script> 
<script src="__PUBLIC__/user/js/pintuer.js"></script>
</head>
<body>

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">文章列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
      <form method="get" action="<?php echo url('Index/article_list'); ?>" id="listform">
      <li>
        <select name="catid" class="input" style="width:200px; line-height:17px;" >
          <option value="0">选择栏目</option>
        <?php if(is_array($cate_list) || $cate_list instanceof \think\Collection || $cate_list instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <option value="<?php echo $vo['catid']; ?>" <?php if($vo['catid'] == $catid): ?>selected="selected"<?php endif; ?> ><?php echo str_repeat("&nbsp;└─&nbsp;",$vo['level']); ?><?php echo $vo['catname']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
      </li>
       
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="q" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <button class="button border-main icon-search" type="submit"> 搜索</button>
        </li>
       </form>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>缩略图</th>
        <th>标题</th>
        <th>栏目</th>
        <th>状态</th>
        <th width="10%">发布时间</th>
        <th width="200">操作</th>
      </tr>
      <?php if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
          <td width="10%"><?php if($vo['thumb']): ?><img src="<?php echo $vo['thumb']; ?>" alt="" width="70" height="50" /><?php endif; ?></td>
          <td><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a></td>
          <td><?php echo get_catname($vo['catid']); ?></td>
          <td><?php echo !empty($vo['status'])?'已审核':'<font color=red>未审核</font>'; ?></td>
          <td><?php echo date("Y-m-d",$vo['inputtime']); ?></td>
          <td><div class="button-group"> <a class="button border-main" href="<?php echo url('Index/article_edit',['id'=>$vo['id']]); ?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="<?php echo url('Index/article_delete',['id'=>$vo['id']]); ?>" onclick="return del()"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
   		<?php endforeach; endif; else: echo "" ;endif; ?>
      
      <tr>
        <td colspan="5"><?php echo $page; ?></td>
      </tr>
    </table>
  </div>

<script type="text/javascript">

function del(){
	if(confirm("您确定要删除吗?")){
		
	}
}

</script>
</body>
</html>