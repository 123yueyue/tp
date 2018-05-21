<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/WdatePicker.css" />
<title>软件学院综合实践积分管理系统</title>
</head>

<body>
<div class="title"><h2>管理员信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">修改密码</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">职工号</th>
                <th class="name">姓名</th>
                <th class="process">所属学院</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            	<td class="num"><?php echo ($vol["tid"]); ?></td>
                <td class="name"><?php echo ($vol["tname"]); ?></td>
                <td class="num"><?php echo ($vol["id"]); ?></td>
                <td class="operate">
                <input type="checkbox" value="<?php echo ($vol["ttid"]); ?>"/>
                <a href="/tp/index.php/Admin/Teacher/teacher_edit/id/<?php echo ($vol["ttid"]); ?>">编辑</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/tp/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');

//jQuery代码
$(function(){
	//给删除按钮绑定点击事件
	$('.del').on('click',function(){
		//事件处理程序
		var idObj = $(':checkbox:checked');	//获取全部已经被选中的checkbox
		var id = '';	//接收处理后的部门id值，组成id1,id2,id3...
		//循环遍历idObj对象，获取其中的每一个值
		for (var i = 0; i < idObj.length; i++) {
			id += idObj[i].value + ',';
		}
		//去掉最后逗号
		id = id.substring(0,id.length - 1);
		//判断id
		if(id == ''){
			return false;
		}
		//带着参数跳转到del方法
		window.location.href = '/tp/index.php/Admin/Teacher/teacher_del/id/' + id;
	});
});

$(function(){
	//给添加按钮绑定点击事件
	$('.add').on('click',function(){
		window.location.href = '/tp/index.php/Admin/Teacher/teacher_add';
	});
});
$(function(){
	//给编辑按钮绑定点击事件
	$('.edit').on('click',function(){
		window.location.href = '/tp/index.php/Admin/Teacher/teacher_update';
	});
});

</script>
</html>