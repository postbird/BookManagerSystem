<?php
namespace Home\Controller;
use Think\Controller;
class AclController extends Controller {
      public function _initialize(){
		$sessionFlag=session("isLogin");
		if($sessionFlag!="ok"){
			$this->redirect("Login/index");
			exit();
		}
	}
}