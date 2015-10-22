<?php
class CommonAction extends Action {
   public function _initialize(){
		header('Content-Type: text/html; charset=UTF-8');
		$refer = __INFO__;
		//echo APP_TMPL_PATH.'<hr/>'.APP_NAME.'<hr/>'.MODULE_NAME.'<hr/>'.__SELF__;
		//$gourl = __SELF__;
		//echo $gourl;

		Cookie('refer', $refer);
		if(!isset($_SESSION['test']['username']) || $_SESSION['test']['username']==''){
			$this->error('只有登陆才能访问！',U('Login/index'));
		}
		if($_SESSION['status'] !=1){
			$this->_out();
			$this->error('您的账号已禁用！',U('Login/index'));
			}
   }
   public function _out(){
						$_SESSION=array();
						if(isset($_COOKIE[session_name()])){
						setcookie(session_name(),'',time()-1,'/');
							}
						cookie('pwd',null);
						session_destroy();  //将重置 session，您将失去所有已存储的 session 数据
			}
}