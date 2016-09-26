<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	private $bmsDB;
	public function newDBConstruct(){
		$this->bmsDB=new \Think\Model();
	}
    public function index(){
        $this->display("index");
    }
    public function loginCheck(){
    	$this->newDBConstruct();
    	$name=trim($_POST['adminname']);
    	$password=MD5(trim($_POST['adminpassword']));
    	$sql="SELECT * FROM bms_admin WHERE name='".$name."'";
    	$ansData=array();
    	$ansData=$this->bmsDB->query($sql);
    	$ansData=$ansData[0];
    	if(count($ansData)==0){
    		$this->error("账户或密码错误!",U('index'));
            exit();
    	}else{
    		if($ansData['password']==$password){
    			session("isLogin","ok");
    			$this->redirect("Admin/index");
    		}
    	}
    }

    public function logout(){
    	session(null);
    	$this->redirect("index");
    }

} 