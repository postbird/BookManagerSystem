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


<div class="container "style="margin-top:30px; ">
	<div class="col-md-12 ">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>查询&nbsp;&nbsp;共计 <?php echo ($count); ?> 册</h4>
			</div>
				<div class="panel-body">
						<div class="col-md-3">
							<input type="text" class="form-control" id="content"name="content"placeholder="查询内容..." value="<?php echo ($content); ?>">
						</div>
						<div class="col-md-2">
						<?php if($type == 1): ?><select name="type" class="form-control" id="type">
								<option value="title" >书名</option>
								<option value="tag">标签</option>
								<option value="author">作者</option>
							</select><?php endif; ?>
						<?php if($type == 2): ?><select name="type" class="form-control" id="type">
								<option value="title" >书名</option>
								<option value="tag" selected="selected">标签</option>
								<option value="author">作者</option>
							</select><?php endif; ?>
						<?php if($type == 3): ?><select name="type" class="form-control" id="type">
								<option value="title" >书名</option>
								<option value="tag">标签</option>
								<option value="author"selected="selected">作者</option>
							</select><?php endif; ?>	
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-primary "  KEY="NONE" VALUE="0"onclick="searchBook(this);"><i class='fa fa-search'></i>  查询</button>
						</div>
				</div>
				<div hidden class="alert alert-danger alert-dismissible alert-error  col-md-12 text-center" role="alert">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  <strong>ERROR!</strong> <span class="alert-error-msg"></span>.
				</div>
				<div class="panel-footer">
					<button class="btn btn-default btn-sm " KEY="BOOK" VALUE="1"onclick="searchBook(this);">出版时间&nbsp;&nbsp;<i class=" fa fa-arrow-up"></i></button>
					<button class="btn btn-default btn-sm " KEY="BOOK" VALUE="0"onclick="searchBook(this);">出版时间&nbsp;&nbsp;<i class=" fa fa-arrow-down"></i></button>
					<button class="btn btn-default btn-sm " KEY="REG" VALUE="1"onclick="searchBook(this);">收录时间&nbsp;&nbsp;<i class=" fa fa-arrow-up"></i></button>
					<button class="btn btn-default btn-sm " KEY="REG" VALUE="0"onclick="searchBook(this);">收录时间&nbsp;&nbsp;<i class=" fa fa-arrow-down"></i></button>
				</div>
		</div>
	</div>
	
	<div class="col-md-12">
		<hr>
	</div>
</div><!--container-->
<div>
	<div class="container" style="margin-left:auto;margin-right: auto;">
	<?php if($count == 0): ?><h4 class="text-center red-font"><i class="fa fa-warning"></i>&nbsp;&nbsp;&nbsp;&nbsp;未查询到任何书籍!</h4>
	<?php else: ?>
		<?php if(is_array($books)): $i = 0; $__LIST__ = $books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><div class="col-md-2 book-item-box wow fadeIn" onmouseover="showBookDescription(this);" onmouseleave="hideBookDescription(this);">
				<div class="bottom-box" style="">
					<div class="book-item-img">
						<img src="/BookManagerSystem/Public/uploads/book/<?php echo ($book["image"]); ?>" alt="<?php echo ($book["title"]); ?>封面">
					</div>
					<hr>
					<div class="book-item-info">
						<h5><?php echo ($book["title"]); ?></h5>
						<h5>作者：<?php echo ($book["author"]); ?></h5>
						<h5>标签：<?php echo ($book["tag"]); ?></h5>
					</div>
				</div>
				<div hidden class="top-box"style="">
					<div class="book-item-description ">
						<p class="text-indent"><?php echo ($book["description"]); ?></p>
						<a href="/BookManagerSystem/Home/Index/view/book/<?php echo ($book["guid"]); ?>" target="_blank"class="btn btn-primary btn-lg center-block">查看</a>
					</div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
	</div>
</div>
<div class="container">
	<div class="col-md-12 ">
		<hr>
		  <ul class="pager">
		    <?php echo ($show); ?>
		  </ul>
	</div>
</div><!--container-->



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