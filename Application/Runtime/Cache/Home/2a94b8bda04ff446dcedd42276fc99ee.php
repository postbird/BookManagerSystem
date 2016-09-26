<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--meta:vp 响应式布局-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<!--meta:compat IE7兼容-->
	<meta http-equiv="X-UA-Compatible" content="IE=7"/>
	<link rel="stylesheet" href="/bookmanagersystem/Public/css/bootstrap.css">
	<link rel="stylesheet" href="/bookmanagersystem/Public/css/font-awesome.min.css">
	<link rel="stylesheet" href="/bookmanagersystem/Public/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="/bookmanagersystem/Public/css/animate.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/bookmanagersystem/Public/css/all.css">
	<script src="/bookmanagersystem/Public/js/jquery.min.js"></script>
	<script src="/bookmanagersystem/Public/js/bootstrap.min.js"></script>
	<script src="/bookmanagersystem/Public/js/bootstrap-datepicker.js"></script>
	<script src="/bookmanagersystem/Public/js/wow.min.js"></script>
	<script src="/bookmanagersystem/Public/js/jquery.goup.min.js"></script>
	<script src="/bookmanagersystem/Public/js/all.js"></script>
	
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
		      <a class="navbar-brand " href="/bookmanagersystem">首页</a>
		    </div>
			<!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="/bookmanagersystem/Home/Index/book/">书籍</a></li>
		        <li><a href="/bookmanagersystem/Home/Index/notices/">公告</a></li>
		        <li><a href="/bookmanagersystem/Home/Index/comments/">留言</a></li>
		        <li><a href="/bookmanagersystem/Home/Index/about/">关于</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		</div>
	  </div><!-- /.container-fluid -->
	</nav>
</div>

	<div class="banner-box"style="background-image: url(/bookmanagersystem/Public/images/banner2.jpg);background-size: cover;" onmouseenter ="hideBannerMask();"onmouseleave="showBannerMask()";>
		<a href="/bookmanagersystem/Home/Index/notice/view/<?php echo ($notice["guid"]); ?>"><h2 class="banner-box-text wow bounceInDown"><i class="fa fa-bullhorn"></i> ：<?php echo ($notice["title"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<small><?php echo ($notice["time_date"]); ?></small></h2></a>
		<div class="container">
			<h2 class=" banner-box-text-number wow shake"  data-wow-delay="0.3s">当前图书共  <span class="wow flip  black-font"><?php echo ($bookCount); ?></span>  册</h2>
		</div>
		<div class="banner-box-mask" ></div>
	</div>
	<div style="margin-top:60px;padding-bottom: 60px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12 text-center">
					<h2 class="index-box-title" style="color:#278DDE;">Good creativity</h2>
				</div>
				<div class="col-md-12 col-xs-12" style="margin-top:50px;">
					
					<div class="col-md-4 col-xs-12">
						<div class="img-circle-div">
							<img class="center-block img-circle" src="/bookmanagersystem/Public/images/icon/jiandan.png" alt="简单" onmousemove="imgMouseMove(this);" onmouseout="imgMouseOut(this);">
						</div>
						<div class="img-circle-div-content text-center">
							<h2>简单</h2>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="img-circle-div">
							<img class="center-block img-circle" src="/bookmanagersystem/Public/images/icon/yiyong.png" alt="易用"onmousemove="imgMouseMove(this);" onmouseout="imgMouseOut(this);">
						</div>
						<div class="img-circle-div-content text-center">
							<h2>易用</h2>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="img-circle-div">
							<img class="center-block img-circle" src="/bookmanagersystem/Public/images/icon/kuaijie.png" alt="便捷"onmousemove="imgMouseMove(this);" onmouseout="imgMouseOut(this);">
						</div>
						<div class="img-circle-div-content text-center">
							<h2>快捷</h2>
						</div>
					</div>
				</div>
			</div><!--row-->	
		</div><!--container-->	
	</div>
	<div style="padding:20px;background-color: #278DDE;min-height:400px;padding-top:50px;margin-top:60px;width:100%;padding-bottom: 40px;">
		<div class="container ">
			<div class="row">
				<div class="col-md-12 col-xs-12 text-center wow fadeIn">
					<h4 class="index-box-title" style="color:#fff;">New Books	</h4>
				</div>
				<div class="col-md-12 book-content ">
					<?php if(is_array($books)): $i = 0; $__LIST__ = $books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><div class="col-md-3 book-item-box" style="background-color: #fff;"onmouseover="showBookDescription(this);" onmouseleave="hideBookDescription(this);">
							<div class="bottom-box" style="">
								<div class="book-item-img">
									<img src="/bookmanagersystem/Public/uploads/book/<?php echo ($book["image"]); ?>" alt="<?php echo ($book["title"]); ?>封面">
								</div>
								<hr>
								<div class="book-item-info">
									<h5>作者：<?php echo ($book["author"]); ?></h5>
									<h5>标签：<?php echo ($book["tag"]); ?></h5>
								</div>
							</div>
							<div hidden class="top-box"style="">
								<div class="book-item-description ">
									<p class="text-indent"><?php echo ($book["description"]); ?></p>
									<a href="/bookmanagersystem/Home/Index/view/book/<?php echo ($book["guid"]); ?>" class="btn btn-warning  center-block">查看</a>
								</div>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div><!--row-->
		</div><!--container-->	
	</div>
	<div style="padding:20px;background-color: #fdfdfd;min-height:400px;padding-top:40px;padding-bottom: 70px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12 text-center  wow fadeIn" >
					<h4 class="index-box-title" style="color:#278DDE;">Latest Comments</h4>
				</div>
				<div class="col-md-12 col-xs-12 " style="margin-top:40px;">
					<?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="col-md-4 col-xs-12  wow  slideInLeft no-padding index-comment-div ">
							<p><i class="fa fa-user"></i> ：<?php echo ($comment["name"]); ?></p>
							<p><i class="fa fa-clock-o"></i> ：<?php echo ($comment["time_date"]); ?></p>
							<hr>
							<p class="text-indent"><?php echo ($comment["content"]); ?></p>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div><!--row-->
		</div><!--container-->
	</div>


<div  style="padding:20px;background-color: #333;min-height:100px;margin-top:100px;">
		<div class="container">
			<div class="col-md-6 col-xs-12">
				<h4 class="white-font"><i class="fa fa-copyright"></i> 2016&nbsp;|&nbsp;BookManagerSystem  All rights reserved.</h4>
				<h4 class="white-font">Powered by Postbird.</h4>
				<h4 ><a style="color:#fdfdfd"href="/bookmanagersystem/Home/Admin/" target="_blank" title="管理">Admin</a></h4>
			</div>
			<div class="col-md-6 col-xs-12">
				<h4 class="white-font">Links</h4>
				<p><a href="http://www.dhu.edu.cn"  class="white-font">http://www.dhu.edu.cn</a></p>
				<p><a href="http://library.dhu.edu.cn"  class="white-font">http://library.dhu.edu.cn</a></p>
			</div>
		</div>
	</div>	
</body>