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
	
<title>BMS | 管理员登陆</title>
<script>
	function showLoginPanel(){
		$(".login-message-hidden").hide();
		$(".login-message").slideDown();
	}
	function hideLoginPanel(){
		$(".login-message-hidden").show();
		$(".login-message").slideUp();
	}
</script>
</head>
<body class="black-body">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div hidden class="jumbotron login-message">
			  <p><i class="fa fa-book"></i>  <strong>BookManagerSystem 登录须知</strong></p>
			  <p>默认管理员账户:admin</p>
			  <p>默认管理员密码:123456</p>
			  <button class="login-up-message-btn-up pull-right btn  "onclick="hideLoginPanel();">收起  <i class="fa fa-angle-double-up"></i></button>
			</div>
		</div>
		<div class="col-md-12">
			<div  class=" jumbotron login-message-hidden">
			  <p>
		 	    <i class="fa fa-book"></i>  <strong>BookManagerSystem 登录须知</strong>
			    <button class="login-up-message-btn-down pull-right btn  " onclick="showLoginPanel()">展开  <i class="fa fa-angle-double-down"></i></button>
			  </p>
			  
			</div>
		</div>
	</div>
</div>
<div class="container white-font">
			<div class="row col-md-12">

					<h3 class="text-center"><strong><i class="fa fa-user-secret"></i>  管理员登录</strong><small></small></h3><hr>
					<form action="/BookManagerSystem/Home/Login/loginCheck" method="post">
						<div class="form-group col-md-12 col-xs-12">
							<div class="col-sm-4 text-center col-xs-4">
								<h4><label for="adminname">账户：</label></h4>
							</div>
							<div class="col-sm-8 col-xs-8">
								<input type="text" name="adminname" id="adminname"value="" class="form-control" placeholder="请输入账户">
							</div>	
						</div>
						<div class="form-group col-md-12  col-xs-12">
							<div class="col-sm-4 text-center  col-xs-4">
								<h4><label for="adminpassword">密码：</label></h4>
							</div>
							<div class="col-sm-8  col-xs-8">
								<input type="password" name="adminpassword" id="adminpassword"value=""  class="form-control" placeholder="请输入密码">
							</div>	
						</div>
						<div class="form-group">
							<div class="col-xs-6 text-right">
								<input type="submit"  value="登录"  class="btn btn-primary ">
							</div>
							<div class="col-xs-6 text-left">
								<input type="reset"  value="重置"  class="btn btn-danger ">
							</div>	
							
						</div>
					</form>
			</div>
			<div class="row col-md-12">
				
			</div>
	</div>
</body>