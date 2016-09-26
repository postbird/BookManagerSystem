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
    
<script charset="utf-8" src="/BookManagerSystem/Public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/BookManagerSystem/Public/kindeditor/lang/zh_CN.js"></script>
<script>
        KindEditor.ready(function(K) {
            window.editor = K.create('textarea[name="noticecontent"]',{
                themeType : 'simple',
                allowFileUpload:false,
                resizeType:1,
                width:"100%",
                filterMode : false, //不会过滤HTML代码
                dialogAlignType:"page",
                afterChange:function (){
                    checkNoticeForm(this.text());
                },
                afterCreate:function() {
                    this.sync();
                },
                afterBlur:function(){
                    this.sync();
                }       
            });
        });
</script>

<div class="container">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>新公告</h4>
            </div>
            <form action="/BookManagerSystem/Home/Admin/addNotice" method="post">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-sm-3 text-center">
                            <h4><label for="noticetitle">标题</label></h4>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="noticetitle" id="noticetitle" placeholder="公告标题......" oninput="checkNoticeForm(editor.text());" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-sm-3 text-center">
                            <h4><label for="noticecontent">内容</label></h4>
                        </div>
                        <div class="col-md-9">
                            <textarea name="noticecontent" id="noticecontent"cols="30" rows="5" placeholder="填写公告......"class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <input type="submit" class="btn btn-success disabled" id="noticeBtn" disabled="true" title="内容不能为空...."value="增加">
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>历史公告</h4>                
            </div>
            <?php if(is_array($noticeArray)): $i = 0; $__LIST__ = $noticeArray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notice): $mod = ($i % 2 );++$i;?><div class="list-group-item">
                    <p>
                        <strong><?php echo ($notice["title"]); ?></strong>&nbsp;&nbsp;<i class="fa fa-clock-o"></i> ： <?php echo ($notice["time_date"]); ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="javascript:;" class="btn btn-default btn-xs notice-list-btn notice-list-btn-<?php echo ($notice["id"]); ?>" BTNSTATUS="no" GUID="notice-list-btn-<?php echo ($notice["id"]); ?>" onclick="showNoticeContent('<?php echo ($notice["id"]); ?>')">展开 <i class="fa fa-chevron-down"></i></a>
                    </p>
                    <div hidden class=" notice-list notice-list-<?php echo ($notice["id"]); ?>"><?php echo ($notice["content"]); ?></div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
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