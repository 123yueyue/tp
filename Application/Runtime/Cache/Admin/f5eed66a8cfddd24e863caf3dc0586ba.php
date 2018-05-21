<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/info-reg.css" />
<title></title>
</head>

<body>
<div class="title"><h2>学生信息编辑</h2></div>
<form action="" method="post">
	<div class="main">
		<p class="short-input ue-clear">
	        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
	    </p>
	    <p class="short-input ue-clear">
	    	<label>学号：</label>
	        <input type="text" name="stid" value="<?php echo ($info["stid"]); ?>" placeholder="学号" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>密码：</label>
	        <input type="text" name="password" value="<?php echo ($info["password"]); ?>" placeholder="密码" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>姓名：</label>
	        <input type="text" name="stname" value="<?php echo ($info["stname"]); ?>" placeholder="姓名" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>所属班级：</label>
	        <select name="cname">
	            <option  value="<?php echo ($ccname); ?>"}><?php echo ($ccname); ?></option>
	            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["cname"]); ?>"><?php echo ($vol["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	        </select>
	    </p>
	</div>
	<div class="btn ue-clear">
		<a href="javascript:;" id="btnsubmit" class="confirm">确定</a>
	    <a href="javascript:;" id="btncancel" class="clear">清空内容</a>
	</div>
</form>
</body>
<script type="text/javascript" src="/tp/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});

showRemind('input[type=text], textarea','placeholder');

//jQuery代码
//
$(function(){
	//给确定按钮绑定点击事件
	$('.confirm').on('click',function(){
		$('form').submit();
	});
});
$(function(){
	//给清空按钮绑定点击事件
	$('.clear').on('click',function(){
		$('form')[0].reset();
	});

});
</script>
</html>