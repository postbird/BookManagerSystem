<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//首页需要显示最新的公告
    	$Notice=M("bms_notice");
    	$noticeData=array();
    	$noticeData=$Notice->order("time_stamp desc")->limit(0,1)->select();
    	$noticeData=$noticeData[0];

    	//显示所有书籍的数目
    	$Book=M("bms_book");
    	$bookCount=$Book->count();
    	//显示最新的8本书 col-md-3
    	$bookData=array();
    	$bookData=$Book->order("reg_time_stamp desc")->limit(0,6)->getField("guid,reg_time_date,title,author,description,image,tag");
    	// test_val($bookData);
    	//显示最新的三条留言
    	$Comment=M("bms_comments");
    	$commentData=array();
    	$commentData=$Comment->where("ischeck = 1")->order("time_stamp desc")->limit(0,3)->select();

    	//输出
    	$this->assign("notice",$noticeData);
    	$this->assign("books",$bookData);
    	$this->assign("comments",$commentData);
    	$this->assign("bookCount",$bookCount);
        $this->display("index");
    }
    //书籍列表的  需要有查询的框子
    public function book(){
		$pageCount=16;	//设置每页显示个数
		$BMSBook = M('bms_book'); // 实例化User对象
		$count      = $BMSBook->count();// 查询满足要求的总记录数
		$page       = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$page->setConfig('prev','<i class="fa fa-chevron-left"></i>');
		$page->setConfig('next','<i class="fa fa-chevron-right"></i>');
		$page->setConfig("theme","<li class='pager-li'>%FIRST%</li> <li class='pager-li'>%UP_PAGE%</li> <li class='pager-li'>%LINK_PAGE%</li> <li class='pager-li'>%DOWN_PAGE%</li> <li class='pager-li'>%END%</li>");
		$show  = $page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		// $list = $BMSBook->where('status=1')->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		//将数据查询出来 列表不需要详细内容
		$bookData=array();
		$bookData=$BMSBook->order("reg_time_stamp desc")->limit($Page->firstRow.','.$Page->listRows)->getField("guid,reg_time_date,title,author,description,image,tag");
		// test_val($sql);
		// test_val($show);
		//输出复赋值
		$content="";
		$this->assign("count",$count);
		$this->assign("content",$content);
		$this->assign("type",1);
		$this->assign('books',$bookData);// 赋值数据集
		$this->assign('show',$show);// 赋值分页输出
    	$this->display("book");
    	//模板输出
    }
    //书籍搜索 
    //接受参数 content  type  time  order
    public function search(){
    	$content=trim($_REQUEST['content']);
    	$type=trim($_REQUEST['type']);
    	$time=trim($_REQUEST['time']);
    	$order=trim($_REQUEST['order']);

    	$Book=M("bms_book");
    	//将数据查询出来 列表不需要详细内容
		$bookData=array();
		$tmpStr= 'like "%'.$content.'%"';
		$tmpStr=$type." ".$tmpStr;
		$tmpOrder=$time." ".$order;
		$bookData=$Book->where($tmpStr)->order($tmpOrder)->getField("guid,reg_time_date,title,author,description,image,tag");
		// test_val($bookData);
    	//type tag 2 title 1 author 3
    	if($type=="tag"){
    		$this->assign("type",2);
    	}else if($type=="author"){
    		$this->assign("type",3);
    	}else{
    		$this->assign("type",1);
    	}
		$this->assign("count",count($bookData));
		$this->assign("content",$content);
		$this->assign('books',$bookData);// 赋值数据集
    	$this->display("search");
    	//模板输出
    }
     //根据id查询图书并进行查看
    //参数是id
    public function view(){
		$guid=$_REQUEST['book'];
		if(strlen(trim($guid))==0){
			$this->error("参数错误","book");
			exit();
		}
		$book=M("bms_book");
		$bookData=array();
		$bookData=$book->where("guid='".$guid."'")->find();
		if(count($bookData)==0){
			$this->redirect("book");
			exit();
		}
		$bookData["content"]=htmlspecialchars_decode($bookData["content"]);
		//数据库代码反解析
		// test_val($bookData);
		$this->assign("book",$bookData);
    	$this->display("view");
    }
    //公告列表
    public function notices(){
    	$Notice=M("bms_notice");
    	$noticeData=$Notice->order("time_stamp desc")->getField("guid,title,time_date,author");

    	$this->assign("notices",$noticeData);
    	$this->display("notices");
    }
    //查看公告内容
    //接受参数是 view==guid

    public function notice(){
    	$guid=$_REQUEST['view'];
    	$Notice=M("bms_notice");
    	$noticeData=$Notice->where("guid = '".$guid."'")->find();
    	if(count($noticeData)==0){
    		$this->redirect("notices");
    		exit();
    	}
    	$noticeData['content']=htmlspecialchars_decode($noticeData['content']);
    	// test_val(count($noticeData));
		$this->assign("notice",$noticeData);
		$this->display("notice");
    }
    //留言
    //直接显示所有的就行了
   	// 还是分页吧
    public function comments(){
    	$Commnet=M("bms_comments");
    	$commentData=array();
		$pageCount=10;	//设置每页显示个数
		$count      = $Commnet->where("ischeck = 1")->count();// 查询满足要求的总记录数
		$page       = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$page->setConfig('prev','<i class="fa fa-chevron-left"></i>');
		$page->setConfig('next','<i class="fa fa-chevron-right"></i>');
		$page->setConfig("theme","<li class='pager-li'>%FIRST%</li> <li class='pager-li'>%UP_PAGE%</li> <li class='pager-li'>%LINK_PAGE%</li> <li class='pager-li'>%DOWN_PAGE%</li> <li class='pager-li'>%END%</li>");
		$show  = $page->show();// 分页显示输出
		$commentData=$Commnet->where("ischeck = 1")->order("time_stamp desc")->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("count",$count);
		$this->assign("show",$show);
		$this->assign("comments",$commentData);
		$this->display("comments");
    }
    //添加留言
    // post :  name email content'
    // name 和 email可以为空
    public function addComment(){

    	$name=trim($_POST['name']);
    	$email=trim($_POST['email']);
    	$content=trim($_POST['content']);

    	if(strlen($content)==0){
    		$this->error("内容不能为空",U('Index/comments'));
    		exit();
    	}
    	if(strlen($name==0)){
    		$name="匿名用户";
    	}
    	if(strlen($email)==0){
    		$email="匿名邮箱";
    	}
    	$guid=strtoupper(to_guid_string(time()));
		// 得到GUID
    	$Comment=M("bms_comments");
    	$data['name']=$name;
    	$data['email']=$email;
    	$data['content']=$content;
    	$data['time_stamp']=time();
    	$data['time_date']=date("Y-m-d H:m:s",$data['time_stamp']);
    	$data['guid']=$guid;
    	if($Comment->add($data)){
    		$this->success("提交成功,等待审核!",U('Index/comments'));
    	}else{
    		$this->error("添加失败,系统错误!",U('Index/comments'));
    	}
    }
    //关于页面
    public function about(){
    	$this->display("about");
    }
}