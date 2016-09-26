
/*************************************************************通用效果js************************************************************************/
//public url

window.url="http://localhost/bookmanagersystem/Home/";

function imgMouseMove(obj){
	$(obj).addClass("animated tada");
}
function imgMouseOut(obj){
	$(obj).removeClass("animated tada");
}
//去掉字符串两边空格
String.prototype.trim=function() { return this.replace(/(^\s*)|(\s*$)/g, ""); }
//当前页面的active选项的添加  参数是css类名
/*************************************************************添加书籍************************************************************************/

//判断表单填写完整
function checkBookForm(content){
	if(($("#booktitle").val().trim().length>0 )&& ($("#bookauthor").val().trim().length>0 )&&($("#picBooktime").val().trim().length>0 ) &&($("#booktag").val().trim().length>0 ) &&($("#bookdescription").val().trim().length>0 )&&(content.trim().length>0)){
		$("#bookSubmitBtn").removeClass("disabled");
		$("#bookSubmitBtn").attr("disabled",false);
		$("#bookSubmitBtn").attr("title","点击添加新书");
	}else{
		$("#bookSubmitBtn").addClass("disabled");
		$("#bookSubmitBtn").attr("disabled",true);
		$("#bookSubmitBtn").attr("title","所有信息都是必填信息");
	}
}

//判断公告的表单是否正确
//传入参数是从kindedior获取的内容
function checkNoticeForm(content){
	if(($("#noticetitle").val().trim().length>0) &&(content.trim().length>0)){
		$("#noticeBtn").removeClass("disabled");
		$("#noticeBtn").attr("disabled",false);
		$("#noticeBtn").attr("title","点击添加新公告");
	}else{
		$("#noticeBtn").addClass("disabled");
		$("#noticeBtn").attr("disabled",true);
		$("#noticeBtn").attr("title","内容不能为空");
	}
}
//显示关注的内容
//先把所有的 notice-list隐藏 再把传入的id参数显示
function showNoticeContent(id){
	$(".notice-list-btn").html('展开  <i class="fa fa-chevron-down"></i>');
	if($(".notice-list-btn-"+id).attr("BTNSTATUS")=="no"){
		$(".notice-list").hide();
		$(".notice-list-"+id).slideDown();
		$(".notice-list-btn-"+id).html('收起  <i class="fa fa-chevron-up"></i>');
		$(".notice-list-btn").attr("BTNSTATUS","no");
		$(".notice-list-btn-"+id).attr("BTNSTATUS","ok");
	}else{
		$(".notice-list-btn-"+id).html('展开  <i class="fa fa-chevron-down"></i>');
		$(".notice-list-"+id).slideUp();
		$(".notice-list-btn-"+id).attr("BTNSTATUS","no");
	}
	
}
//书籍列表的描述信息的隐藏和显示
function showBookDescription(obj){
	$(obj).find(".top-box").show();
}
function hideBookDescription(obj){
	$(obj).find(".top-box").hide();
}
//显示删除留言或者是图书的时候的modal
function showDeleteModal(obj,msg){
	$(".modal-action-btn").attr("href",$(obj).attr("guid"));
	$(".modal-text").text(msg);
	$("#confirmModal").modal();
}
//显示或者隐藏banner的mask
function hideBannerMask(){
	$(".banner-box-mask").hide();
}
function showBannerMask(){
	$(".banner-box-mask").show();
}

// $(".add-consume-type-error-alert").fadeIn();
// 		setInterval(function(){$(".add-consume-type-error-alert").fadeOut();},3000);
//查询书籍的js控制
//通过button控制传递的内容 通过js进行判断
//之后进行post传递
//参数  如果KEY是none 表示进行内容的传值
//  如果 KEY 是 book  value = 1   表示按照出版时间升序
//  如果 KEY 是 book  value = 0   表示按照出版时间降序
//  如果 KEY 是 reg  value = 1   表示按照收录时间升序
//  如果 KEY 是 reg  value = 0   表示按照收录时间降序
function searchBook(obj){
	var content=$("#content").val().trim();
	var type=$("#type").val().trim();
	// console.log(content +" "+type);
	if(content.length==0 || type.length==0){
		$(".alert-error-msg").text("内容不能为空");
		$(".alert-error").fadeIn();
		return ;
	}
	var ur=url+"Index/search/"
	if($(obj).attr("KEY")=="NONE"){
		// $.post(ur,{
		// 	content:content,
		// 	type:type,
		// 	time:"reg_time_stamp",
		// 	order:"desc"
		// });
		var time="reg_time_stamp";
		var order="desc";
		window.location.href=ur+"content/"+content+"/type/"+type+"/time/"+time+"/order/"+order; 
	}else if($(obj).attr("KEY")=="BOOK"){
		var time="book_time_stamp";
		if($(obj).attr("VALUE")=="1"){
			var order="asc";
		}else{
			var order="desc";
		}
		// $.post(ur,{
		// 	content:content,
		// 	type:type,
		// 	time:time,
		// 	order:order
		// });
		window.location.href=ur+"content/"+content+"/type/"+type+"/time/"+time+"/order/"+order; 
	}else  if($(obj).attr("KEY")=="REG"){
		var time="reg_time_stamp";
		if($(obj).attr("VALUE")=="1"){
			var order="asc";
		}else{
			var order="desc";
		}
		// $.post(ur,{
		// 	content:content,
		// 	type:type,
		// 	time:time,
		// 	order:order
		// });
		window.location.href=ur+"content/"+content+"/type/"+type+"/time/"+time+"/order/"+order; 
		
	}else{
		$(".alert-error-msg").text("参数错误");
		$(".alert-error").fadeIn();
		return ;
	}


}