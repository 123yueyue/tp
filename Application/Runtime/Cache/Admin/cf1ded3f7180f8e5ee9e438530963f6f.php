<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/info-reg.css" />
<title>软件学院综合实践积分管理系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="" method="post">
	<div class="main">
	    <p class="short-input ue-clear">
	    	<label>专业编号：</label>
	        <input type="text" name="pid" placeholder="部门名称" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>专业名称：</label>
	        <input type="text" name="pname" placeholder="部门名称" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>所属学院：</label>
	        <input type="text" name="sid" placeholder="部门名称" />
	    </p>
	</div>
	<div class="btn ue-clear">
		<a href="javascript:;" class="confirm">确定</a>
	    <a href="javascript:;" class="clear">清空内容</a>
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
$(function(){
	//给确定按钮绑定一个点击事件
	$('.confirm').on('click',function(){
		//事件的处理程序
		$('form').submit();
	});

	//给清空内容按钮绑定一个点击事件
	$('.clear').on('click',function(){
		//事件的处理程序
		$('form')[0].reset();
	});
});
</script>
</html>