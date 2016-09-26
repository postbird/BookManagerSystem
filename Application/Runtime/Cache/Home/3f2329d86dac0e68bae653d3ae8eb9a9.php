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
            window.editor = K.create('textarea[name="bookcontent"]',{
                themeType : 'simple',
                allowFileUpload:false,
                resizeType:1,
                width:"100%",
                filterMode : false, //不会过滤HTML代码
                dialogAlignType:"page",
                afterChange:function (){
                    checkBookForm(this.text());
                },
                afterCreate:function() {
                    this.sync();
                    this.html($(".tmp-html-div").html());
                },
                afterBlur:function(){
                    this.sync();
                }       
            });
        });
</script>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>新书籍</h4>
		</div>
		<div class="panel-body ">
		<div class="col-md-12">
			<form action="/BookManagerSystem/Home/Admin/updateAction" method="post" enctype="multipart/form-data">
				<div class="form-group col-sm-12">
					<div class="col-sm-3 text-center">
						<label for="booktitle"><h4>书名</h4></label>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="booktitle" oninput="checkBookForm(editor.text())" placeholder="书籍的名称....."id="booktitle" value="<?php echo ($book["title"]); ?>">
					</div>
				</div>
				<div class="form-group col-sm-12">
					<div class="col-sm-3 text-center">
						<label for="bookauthor"><h4>作者</h4></label>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="bookauthor" oninput="checkBookForm(editor.text())" placeholder="书籍的作者....."id="bookauthor" value="<?php echo ($book["author"]); ?>">
					</div>
					<div class="col-sm-3 text-center">
						<label for="picBooktime"><h4>出版时间</h4></label>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control report-start-time" name="booktime"id="picBooktime"placeholder="书籍的出版时间...."oninput="checkBookForm(editor.text())" value="<?php echo ($book["book_time_date"]); ?>">
					</div>
					 <script>
	          		      // $('#picBooktime').val(new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+(new Date().getDate()*1-1));
	                      $('#picBooktime').datepicker({
	                          format: "yyyy-mm-dd",
	                          language: "cn",
	                          autoclose: true,
	                          todayHighlight: true
	                      });
	                  </script>
				</div>
				<div class="form-group col-sm-12">
					<div class="col-sm-3 text-center">
						<label for="booktag"><h4>标签</h4></label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="booktag" id="booktag"placeholder="请使用英文逗号( , )分开....."id="booktag"oninput="checkBookForm(editor.text())" value="<?php echo ($book["tag"]); ?>">
					</div>
				</div>
				<div class="form-group col-sm-12">
					<div class="col-sm-3 text-center">
						<label for="bookimage"><h4>封面</h4></label>
					</div>
					<div class="col-sm-9">
						<input type="file"name="bookimage" id="bookimage"  accept="image/*" oninput="checkBookForm(editor.text())">
						<p class="red-font"><small>* 如果封面图片未更改则不需要进行修改</small></p>
						<p class="red-font"><small>* 图片推荐 2:3 或者 3:4 比例,推荐最小尺寸为600px*400px</small></p>
					</div>
					<!-- 如果不上传就使用之前的 -->
					<input type="hidden" name="bookoldimage" value="<?php echo ($book["image"]); ?>">
					<input type="hidden" name="bookguid" value="<?php echo ($book["guid"]); ?>">
				</div>
				<div class="form-group col-sm-12">
					<div class="col-sm-3 text-center">
						<label for="bookdescription"><h4>介绍</h4></label>
					</div>
					<div class="col-sm-9">
						<textarea type="text" class="form-control" name="bookdescription"placeholder="书籍的简单描述....."id="bookdescription"oninput="checkBookForm(editor.text())"><?php echo ($book["description"]); ?>
						</textarea>
					</div>
				</div>
				<div class="form-group col-sm-12">
					<div class="col-sm-3 text-center">
						<label for="bookcontent"><h4>内容</h4></label>
					</div>
					<div class="col-sm-9">
					<div class="hidden tmp-html-div">
						<?php echo ($book["content"]); ?>
					</div>
						<textarea name="bookcontent" id="bookcontent" >
							
						</textarea>
					</div>
				</div>
		</div>

		</div>
		<div class="panel-footer text-right">
			<input id="bookSubmitBtn" type="submit"value="修改" disabled="true"class="btn btn-success disabled"title="所有信息都是必填信息">
		</div>
	</form>			
	</div>
	<div class="col-md-12">
		
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