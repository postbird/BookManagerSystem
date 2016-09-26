<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--meta:vp 响应式布局-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<!--meta:compat IE7兼容-->
	<meta http-equiv="X-UA-Compatible" content="IE=7"/>
	<link rel="stylesheet" href="/BookManagerSystem/Public/css/bootstrap.css">
	<link rel="stylesheet" href="/BookManagerSystem/Public/css/font-awesome.min.css">
	<link rel="stylesheet" href="/BookManagerSystem/Public/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="/BookManagerSystem/Public/css/animate.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/BookManagerSystem/Public/css/all.css">
	<script src="/BookManagerSystem/Public/js/jquery.min.js"></script>
	<script src="/BookManagerSystem/Public/js/bootstrap.min.js"></script>
	<script src="/BookManagerSystem/Public/js/bootstrap-datepicker.js"></script>
	<script src="/BookManagerSystem/Public/js/wow.min.js"></script>
	<script src="/BookManagerSystem/Public/js/jquery.goup.min.js"></script>
	<script src="/BookManagerSystem/Public/js/all.js"></script>
	
<title>后台管理 | BMS</title>
<script>
	$(document).ready(function(){
		new WOW().init();
	});
     $(document).ready(function () {
            $.goup({
                trigger: 100,
                bottomOffset: 150,
                locationOffset: 100,
                titleAsText: true
            });
        });
</script>
</head>
<body style="padding-top:100px;">
<div class="width-100">
    <nav class="navbar  navbar-inverse navbar-fixed-top"  role="navigation">
    <!--顶部导航-->
    <div class="width-100" style="background-color: #fff;">
        <div class="container text-center">
            <div class="col-md-6 col-xs-12 text-left">
                <h3 class="hidden-xs"><i class="fa fa-book fa-2x"></i>  BMS | 后台管理系统</h3>
                <h4 class="visible-xs"><i class="fa fa-book fa-2x"></i> BookManagerSystem</h4>
            </div>
            
        </div>
    </div>
    <div class="container">
      <div class="container-fluid no-padding-left">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand " href="/BookManagerSystem/Home/Admin/">首页</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav" >
                <li><a href="/BookManagerSystem/Home/Admin/book/">书籍管理</a></li>
                <li><a href="/BookManagerSystem/Home/Admin/notice">公告</a></li>
                <li><a href="/BookManagerSystem/Home/Admin/comments">留言</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-ul">
                <li style="float:right"><a href="/BookManagerSystem " target="_blank" class="btn btn-primary">前台首页</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </div>
      </div><!-- /.container-fluid -->
    </nav>
</div>
<div class="width-100" style="min-height:700px;margin-top:60px;">
    
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="confirmModalLabel">提示信息</h4>
      </div>
      <div class="modal-body">
       	<p class="text-danger">
       		<h4 class="text-danger modal-text"></h4>
       	</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <a href="#"class="btn btn-danger modal-action-btn"><i class="fa fa-trash"></i> 删除</a>
      </div>
    </div>
  </div>
</div>

<div class="container">
	<div class="col-md-12">
		<div class="col-sm-2">
			<img src="/BookManagerSystem/Public/uploads/book/<?php echo ($book["image"]); ?>" alt="<?php echo ($book["title"]); ?>封面" height="100px">
		</div>
		<div class="col-sm-6">
			<h2><?php echo ($book["title"]); ?></h2>
		</div>
		<div class="col-sm-4">
			<h2>
				<a href="/BookManagerSystem/Home/Admin/update/book/<?php echo ($book["guid"]); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;修改</a>
				<a href="javascript:;"class="btn btn-danger btn-sm" onclick="showDeleteModal(this,'确认删除书籍?操作不可逆!');" GUID="/BookManagerSystem/Home/Admin/deleteBook/book/<?php echo ($book["guid"]); ?>"><i class="fa fa-trash"></i>&nbsp;&nbsp;删除</a>
			</h2>
		</div>
	</div>
	<div class="col-md-12 margin-top-px">
		<div class="col-sm-3">
			<h3><small>作者：<?php echo ($book["author"]); ?></small></h3>
		</div>
		<div class="col-sm-3">
			<h3><small>出版：<?php echo ($book["book_time_date"]); ?></small></h3>
		</div>
		<div class="col-sm-5">
			<h3><small>收录：<?php echo ($book["reg_time_date"]); ?></small></h3>
		</div>
	</div>
	<div class="col-md-12 margin-top-px">
		<div class="col-sm-12 well">
			<p class="text-indent"><?php echo ($book["description"]); ?></p>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-sm-12 ">
			<p class="text-indent"><?php echo ($book["content"]); ?></p>
		</div>
	</div>
</div>


</div>
</body>
<div  style="padding:20px;background-color: #333;min-height:100px;margin-top:100px;">
		<div class="container">
			<div class="col-md-6 col-xs-12">
				<h4 class="white-font"><i class="fa fa-copyright"></i> 2016&nbsp;|&nbsp;BookManagerSystem  All rights reserved.</h4>
				<h4 class="white-font">Powered by Postbird.</h4>
				<h4 ><a style="color:#fdfdfd"href="/BookManagerSystem/Home/Admin/" target="_blank" title="管理">Admin</a></h4>
			</div>
			<div class="col-md-6 col-xs-12">
				<h4 class="white-font">Links</h4>
				<p><a href="http://www.dhu.edu.cn"  class="white-font">http://www.dhu.edu.cn</a></p>
				<p><a href="http://library.dhu.edu.cn"  class="white-font">http://library.dhu.edu.cn</a></p>
			</div>
		</div>
	</div>	
</body>