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
	
<title>BMS 图书管理系统</title>
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
<body style="padding-top:125px;">

<div class="no-padding col-md-12">
	<nav class="navbar navbar-default navbar-blue navbar-fixed-top"  role="navigation">
	<!--顶部导航-->
	<div class="width-100" style="background-color: #fff;">
		<div class="container text-center">
			<div class="col-md-6 col-xs-12 text-left">
				<h3 class="hidden-xs"><span></span><i  style="color:#278DDE;"class="fa fa-book fa-2x"></i>  BMS | 图书在线管理系统</h3>
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
		      <a class="navbar-brand " href="/BookManagerSystem">首页</a>
		    </div>
			<!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="/BookManagerSystem/Home/Index/book/">书籍</a></li>
		        <li><a href="/BookManagerSystem/Home/Index/notices/">公告</a></li>
		        <li><a href="/BookManagerSystem/Home/Index/comments/">留言</a></li>
		        <li><a href="/BookManagerSystem/Home/Index/about/">关于</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		</div>
	  </div><!-- /.container-fluid -->
	</nav>
</div>

<div class="container" style="margin-top:30px;min-height: 600px;">
   <div class="row">
   <div class="col-md-12">
       <div class="panel panel-info">
           <div class="panel-heading">
               <h4>添加留言&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-comment-o"></i>：共  <?php echo ($count); ?>  条</h4>
           </div>
           <form action="/BookManagerSystem/Home/Index/addComment/" method="post">
               <div class="panel-body">
                   <div class="col-md-12">
                       <div class="col-md-2">
                           <h4><label for="name">姓名：</label></h4>
                       </div>
                       <div class="col-md-4">
                           <input type="text" class="form-control" name="name" placeholder="默认匿名..." id="name">        
                       </div>
                       <div class="col-md-2">
                           <h4><label for="email">邮箱：</label></h4>
                       </div>
                       <div class="col-md-4">
                           <input type="text" class="form-control" name="email" placeholder="默认匿名..." id="email">        
                       </div>
                   </div>
                   <div class="col-md-12">
                       <div class="col-md-2">
                           <h4><label for="content">内容：</label></h4>
                       </div>
                       <div class="col-md-10">
                           <textarea name="content"  rows="5" class="form-control" placeholder="不能为空..."></textarea>
                       </div>
                   </div>
               </div>
               <div class="panel-footer text-right">
                    <input type="submit" class="btn btn-primary" value="提交留言">
               </div>
           </form>
       </div>
   </div>
       <div class="col-md-12">
           <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="panel panel-default wow fadeIn">
                    <div class="panel-heading">
                        <h4><i class="fa fa-user"></i> &nbsp; ：&nbsp;<?php echo ($comment["name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> &nbsp; ：&nbsp;<?php echo ($comment["time_date"]); ?></h4>
                    </div>
                    <div class="panel-body">
                        <p class="comment-item-box">
                            <?php echo ($comment["content"]); ?>
                        </p>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>
       <div class="col-md-12">
           <hr>
           <ul class="pager">
               <?php echo ($show); ?>
           </ul>
       </div>
   </div>
</div>



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