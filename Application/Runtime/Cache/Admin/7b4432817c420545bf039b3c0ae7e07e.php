<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/info-reg.css" />
<title>软件学院综合实践积分管理系统</title>
</head>

<body>
<div class="title"><h2>修改密码</h2></div>
<form action="" method="post">
	<div class="main">
	    <p class="short-input ue-clear">
	    	<label>您的职工号：</label>
	        <input type="text" name="tid" placeholder="职工号" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>初始密码：</label>
	        <input type="password" name="password" placeholder="初始密码" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>新密码：</label>
	        <input type="password" name="newpassword1" placeholder="新密码" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>确认新密码：</label>
	        <input type="password" name="newpassword2" placeholder="再次输入新密码" />
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
});
$(function(){
	//给清空内容按钮绑定一个点击事件
	$('.clear').on('click',function(){
		//事件的处理程序
		$('form')[0].reset();
	});
});
</script>
</html>