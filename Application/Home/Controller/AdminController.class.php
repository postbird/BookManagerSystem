<?php
namespace Home\Controller;
use Think\Controller;

// strtoupper(to_guid_string(time()))
// 得到GUID的函数
class AdminController extends AclController {
	private $bmsDB;
	//进行数据库的变量初始化
	public function newDBConstruct(){
		$this->bmsDB=new \Think\Model();
	}
	// test_val($NoticeData);
    public function index(){
    	$this->newDBConstruct();
    	
    	//查询最新公告 time_stamp最大的先查出来
    	$sql="SELECT * FROM bms_notice ORDER BY time_stamp desc LIMIT 0,1";
    	$noticeData=array();
    	$noticeData=$this->bmsDB->query($sql);
    	$noticeData=$noticeData[0];
    	$noticeData['content']=htmlspecialchars_decode($noticeData['content']);
    	// test_val($noticeData);
    	//查询所有未审核留言
		$sql="SELECT * FROM bms_comments WHERE ischeck=0 ORDER BY time_stamp desc ";
    	$commentsData=array();
    	$commentsData=$this->bmsDB->query($sql);
		// test_val($commentsData);
    	//输出
    	$this->assign("notice",$noticeData);
    	$this->assign("comments",$commentsData);
    	if(count($commentsData)==0){
    		$this->assign("commentFlag",0);
    	}else{
    		$this->assign("commentFlag",1);
    	}
        $this->display("index");
    }
    //书籍罗列
    public function book(){
		$this->newDBConstruct();

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
		$sql="SELECT guid,title,author,reg_time_date,description,image,tag FROM bms_book ORDER BY reg_time_stamp DESC  LIMIT ".$page->firstRow.",".$page->listRows." ";
		$bookData=array();
		$bookData=$this->bmsDB->query($sql);
		// test_val($sql);
		// test_val($show);
		//输出复赋值
		$this->assign("count",$count);
		$this->assign('books',$bookData);// 赋值数据集
		$this->assign('show',$show);// 赋值分页输出
    	$this->display("book");
    }
    
    //添加书籍的界面
    public function addBook(){

    	$this->display("addBook");
    }
    //添加书籍的work
    public function addBookWork(){
    	$this->newDBConstruct();

    	//设置上传路径
    	$uploadUrl="./Public/uploads/book/";
    	// test_val($uploadUrl);

    	//接受参数
    	$title=$_POST['booktitle'];
    	$author=$_POST['bookauthor'];
    	$bookTimeDate=$_POST['booktime'];
    	$bookTimeStamp=time($bookTimeDate);//转换成时间戳
    	// test_val($bookTimeStamp);
    	$regTimeStamp=time();
    	$regTimeDate=date("Y-m-d H:m:s",$regTimeStamp);
    	$tag=$_POST['booktag'];
    	$image=$_POST['bookimage'];
    	$description=$_POST['bookdescription'];
    	$content=htmlspecialchars($_POST['bookcontent']);
    	$guid=strtoupper(to_guid_string(time()));
    	//得到GUID

    	//处理上传文件
    	$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','bmp','svg');// 设置附件上传类型
	    $upload->rootPath  =     $uploadUrl; // 设置附件上传根目录
	    $upload->saveName  =	 "b".time(); 
	    $upload->autoSub   =	 false;
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        //修改规则 如果上传失败或者没有上传，则使用默认名字
	        // $this->error($upload->getError(),"addBook");
	        $bookImage="book.png";
	    }else{// 上传成功类型
	    	//上传成功后保存 成功的信息 并写入数据库
	    	$bookImage=$info["bookimage"]['savename'];
	    	//写入数据库
	    }
	    $sql="INSERT INTO bms_book (title,author,guid,tag,book_time_date,book_time_stamp,reg_time_date,reg_time_stamp,description,content,image) VALUES('".$title."','".$author."','".$guid."','".$tag."','".$bookTimeDate."','".$bookTimeStamp."','".$regTimeDate."','".$regTimeStamp."','".$description."','".$content."','".$bookImage."')";
	    // test_val($sql);
	    if($this->bmsDB->execute($sql)){
	    	$this->success("成功添加新书","addBook");
	    }else{
	    	$this->error("添加新书失败，系统错误","addBook");
	    }

    }
    //根据id查询图书并进行查看
    //参数是id
    public function view(){
		$this->newDBConstruct();

		$guid=$_REQUEST['book'];
		if(strlen(trim($guid))==0){
			$this->error("参数错误","book");
			exit();
		}
		$book=M("bms_book");
		$bookData=array();
		$bookData=$book->where("guid='".$guid."'")->find();
		$bookData["content"]=htmlspecialchars_decode($bookData["content"]);
		//数据库代码反解析
		// test_val($bookData);
		$this->assign("book",$bookData);
    	$this->display("view");
    }
    //修改book
    //参数是book guid
    function update(){
    	$this->newDBConstruct();

		$guid=$_REQUEST['book'];
		if(strlen(trim($guid))==0){
			$this->error("参数错误","book");
			exit();
		}
		$book=M("bms_book");
		$bookData=array();
		$bookData=$book->where("guid='".$guid."'")->find();
		$bookData["content"]=htmlspecialchars_decode($bookData["content"]);
		//数据库代码反解析
		// test_val($bookData);
		$this->assign("book",$bookData);
	    $this->display("update");
    }
     //修改book
    //参数是book guid
    function updateAction(){
    	//设置上传路径
    	$uploadUrl="./Public/uploads/book/";
    	// test_val($uploadUrl);

    	//接受参数
    	$oldBookImage=$_POST['bookoldimage'];
    	$title=$_POST['booktitle'];
    	$author=$_POST['bookauthor'];
    	$bookTimeDate=$_POST['booktime'];
    	$bookTimeStamp=time($bookTimeDate);//转换成时间戳
    	// test_val($bookTimeStamp);
    	$tag=$_POST['booktag'];
    	$image=$_POST['bookimage'];
    	$description=$_POST['bookdescription'];
    	$content=htmlspecialchars($_POST['bookcontent']);
    	$guid=$_POST['bookguid'];
    	//得到GUID
    	if(strlen(trim($guid))==0){
    		$this->error("参数错误","book");
    	}

    	//处理上传文件
    	$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','bmp','svg');// 设置附件上传类型
	    $upload->rootPath  =     $uploadUrl; // 设置附件上传根目录
	    $upload->saveName  =	 "b".time(); 
	    $upload->autoSub   =	 false;
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        //修改规则 如果上传失败或者没有上传，则使用默认名字
	        // $this->error($upload->getError(),"addBook");
	        $bookImage=$oldBookImage;
	    }else{// 上传成功类型
	    	//上传成功后保存 成功的信息 并写入数据库
	    	$bookImage=$info["bookimage"]['savename'];
	    	//写入数据库
	    }
	    //使用THINKPHP的model
	    $Book=M("bms_book");
	    $data['title']=$title;
	    $data['author']=$author;
	    $data['book_time_date']=$bookTimeDate;
	    $data['book_time_stamp']=$bookTimeStamp;
	    $data['tag']=$tag;
	    $data['description']=$description;
	    $data['content']=$content;
	    $data['image']=$bookImage;
	    // test_val($sql);
	    if($Book->where("guid='".$guid."'")->save($data)){
	    	$this->success("修改成功","view/book/".$guid);
	    }else{
	    	$this->error("修改失败，系统错误","view/book/".$guid);
	    }
    }
    //删除图书
    //接受guid参数
    public function deleteBookt(){

    	//接受参数
    	$guid=trim($_REQUEST['book']);

    	//进行验证存在性
    	$Book=M("bms_book");
    	$tmpBook=array();
    	$tmpBook=$Book->where("guid='".$guid."'")->getField("guid");
    	// test_val($guid);
    	//判断是否存在
    	if(count($tmpBook)==0){
    		$this->error("书籍不存在");
    		exit();
    	}else{
    		$tmpBook=$tmpBook[0];
    	}
    	//删除
    	if($Book->where("guid='".$guid."'")->delete()){
			$this->redirect("book");
			exit();
    	}else{
			$this->error("操作失败,系统错误");
			exit();
    	}	
    }
    //显示公告
    public function notice(){
    	$this->newDBConstruct();

    	//将之前的公告按照时间顺序查询出来
    	$noticeData=array();
    	$sql="SELECT * FROM bms_notice ORDER BY time_stamp DESC";
    	$noticeData=$this->bmsDB->query($sql);
    	// test_val($noticeData);
    	//取出来的时候应当将html进行decode
    	for($i=0;$i<count($noticeData);$i++){
    		$noticeData[$i]["content"]=htmlspecialchars_decode($noticeData[$i]["content"]);
    	}
    	//发送
    	$this->assign("noticeArray",$noticeData);
    	$this->display("notice");
    }
    //公告的添加
    //参数 noticetitle  noticecontent 
    public function addNotice(){
    	$this->newDBConstruct();

    	$noticeTitle=trim($_POST['noticetitle']);
    	//进行html转义存储在数据库中，取出来的时候必须htmlspecialchars_decode
    	$noticeContent=htmlspecialchars(trim($_POST['noticecontent']));
    	// test_val($noticeContent);
    	//生成时间和时间戳
    	$time=time();
    	$date=date("Y-m-d H:m:s",$time);
    	// test_val($date);
    	$guid=strtoupper(to_guid_string(time()));
		// 得到GUID
    	if(strlen($noticeTitle)==0 || strlen($noticeContent)==0 ){
    		$this->error("内容填写错误,不能为空","notice");
    	}else{
    		$sql="INSERT INTO bms_notice (title,content,time_stamp,time_date,guid) VALUES('".$noticeTitle."','".$noticeContent."','".$time."','".$date."','".$guid."') ";
    		// test_val($sql);
    		if($this->bmsDB->execute($sql)){
    			$this->success("成功发布新公告","notice");
    		}else{
    			$this->error("发生系统错误","notice");
    		}
    	}
    }
    //显示留言
    public function comments(){
    	//放弃审核和未审核的分开的思想
    	//放到一起，方便分页操作
    	$commentsData=array();
    	$Comment=M("bms_comments");
    	//数据分页
    	$pageCount  =25;
    	$count      = $Comment->count();// 查询满足要求的总记录数
		$page       = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$page->setConfig('prev','<i class="fa fa-chevron-left"></i>');
		$page->setConfig('next','<i class="fa fa-chevron-right"></i>');
		$page->setConfig("theme","<li class='pager-li'>%FIRST%</li> <li class='pager-li'>%UP_PAGE%</li> <li class='pager-li'>%LINK_PAGE%</li> <li class='pager-li'>%DOWN_PAGE%</li> <li class='pager-li'>%END%</li>");
		$show       = $page->show();// 分页显示输出
    	$commentsData=$Comment->order("ischeck ,time_stamp desc")->limit($page->firstRow.','.$page->listRows)->select();

    	//模板输出
    	$this->assign("show",$show);
    	$this->assign("comments",$commentsData);
    	$this->display("comments");
    }
    //审核留言 -- 一个函数两种操作 
    // 通过数据库的查询进行判断吃否存在以及确定
    // 参数 request comment-guid
    public function check(){
    	//获取guid
    	$guid=$_REQUEST['comment'];
    	$Comment=M("bms_comments");
    	$tmpComment=array();
    	$tmpComment=$Comment->where("guid='".$guid."'")->select();
    	//判断是否存在
    	if(count($tmpComment)==0){
    		$this->error("留言不存在");
    		exit();
    	}else{
    		$tmpComment=$tmpComment[0];
    	}
    	// test_val($tmpComment);
    	//进行数据库操作
    	if($tmpComment['ischeck']==1){
    		$data['ischeck']=0;
    		if($Comment->where("guid='".$guid."'")->save($data)){
    			// $this->success("取消审核成功");
    			$this->redirect("comments");
    			exit();
    		}else{
    			$this->error("操作失败,系统错误");
    			exit();
    		}
    	}else{
			$data['ischeck']=1;
    		if($Comment->where("guid='".$guid."'")->save($data)){
    			// $this->success("通过审核成功");
    			$this->redirect("comments");
    			exit();
    		}else{
    			$this->error("操作失败,系统错误");
    			exit();
    		}
    	}
    }
    //删除留言
    //接受guid参数
    public function deleteComment(){

    	//接受参数
    	$guid=trim($_REQUEST['comment']);

    	//进行验证存在性
    	$Comment=M("bms_comments");
    	$tmpComment=array();
    	$tmpComment=$Comment->where("guid='".$guid."'")->select();
    	// test_val($guid);
    	//判断是否存在
    	if(count($tmpComment)==0){
    		$this->error("留言不存在");
    		exit();
    	}else{
    		$tmpComment=$tmpComment[0];
    	}
    	//删除
    	if($Comment->where("guid='".$guid."'")->delete()){
			$this->redirect("comments");
			exit();
    	}else{
			$this->error("操作失败,系统错误");
			exit();
    	}	
    }
} 	