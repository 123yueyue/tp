<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="/tp/Public/Admin/css/jquery.dialog.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/index.css" />
<title>软件学院综合实践积分管理系统</title>
</head>

<body>
<div id="container">
  <div id="hd">
    <div class="hd-wrap ue-clear">
      <div class="top-light"></div>
      <h1 class="logo"></h1>
      <div class="login-info ue-clear">
        <div class="welcome ue-clear"><span>当前用户 : </span><a href="javascript:;" class="user-name"><?php echo (session('tid')); ?></a></div>
        <div class="login-msg ue-clear"> <a href="<?php echo U('Email/recBox');?>" target="iframe" class="msg-txt">消息</a> <a href="<?php echo U('Email/recBox');?>" target="iframe" class="msg-num">0</a> </div>
      </div>
      <div class="toolbar ue-clear"> <a href="javascript:;" class="home-btn">首页</a> <a href="javascript:;" class="quit-btn exit"></a> </div>
    </div>
  </div>
  <div id="bd">
    <div class="wrap ue-clear">
      <div class="sidebar">
        <h2 class="sidebar-header">
          <p>功能导航</p>
        </h2>
        <ul class="nav">
          <li class="office current">
            <div class="nav-header"><a href="javascript:;" date-src="home.html" class="ue-clear"><span>软件学院</span><i class="icon"></i></a></div>
          </li>
          <li class="gongwen">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>学院管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/school_showList');?>">学院查询</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/school_add');?>">学院添加</a></li>
            </ul>
          </li>
          <li class="nav-info">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>专业管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/profession_showList');?>">专业列表</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/profession_add');?>">添加专业</a></li>
            </ul>
          </li>
          <li class="konwledge">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>班级管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/class_showList');?>">班级列表</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/class_add');?>">添加班级</a></li>
            </ul>
          </li>
          <li class="agency">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>学生管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/student_showList');?>">学生列表</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/student_test');?>">excel导入</a></li>
            </ul>
          </li>
          <li class="email">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>管理员信息</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/teacher_showList');?>">查看管理员</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/teacher_add');?>">添加管理员</a></li>
            </ul>
          </li>
          <li class="system">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>实践分审核</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/shenhe_student');?>">审核个人</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Teacher/shenhe_students');?>">审核班级</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="content">
        <!--
          http://1006.com/index.php/Admin/Index/index
          http://1006.com/index.php/Admin/Index/home
        -->
        <iframe name="iframe" src="<?php echo U('home');?>" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  <div id="ft" class="ue-clear">
    <div class="ft-left"> <span>软件学院</span> <em>数据库一班</em> </div>
    <div class="ft-right"> <span>安阳师范学院</span> <em>&nbsp;2018</em> </div>
  </div>
</div>
<div class="exitDialog">
  <div class="dialog-content">
    <div class="ui-dialog-icon"></div>
    <div class="ui-dialog-text">
      <p class="dialog-content">你确定要退出系统？</p>
      <p class="tips">如果是请点击“确定”，否则点“取消”</p>
      <div class="buttons">
        <input type="button" class="button long2 ok" value="确定" />
        <input type="button" class="button long2 normal" value="取消" />
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/tp/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/jquery.dialog.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/index.js"></script>
<script type="text/javascript">
//ajax请求方法
function getMsgCount(){
  //发送ajax请求
  $.get("<?php echo U('Email/getCount');?>", function(data) {
    //相应的处理代码
    $('.msg-num').html(data);
  });
}
//jQuery代码
$(function(){
  //定时器
  setInterval('getMsgCount()',3000);
});
</script>
</html>