<?php
class CommonAction extends Action {
   public function _initialize(){
		header('Content-Type: text/html; charset=UTF-8');
		//echo MODULE_NAME.'---'.ACTION_NAME;
		$refer = __INFO__;
		Cookie('admin_url', $refer);
		if(!isset($_SESSION[C('USER_AUTH_KEY')]) || $_SESSION[C('USER_AUTH_KEY')]==''){
							$this->redirect('Login/index');   //登录失败或空 跳到登录页面
							}
		//RBAC认证
		import('ORG.Util.RBAC');
		if(!RBAC::AccessDecision()){
			$this->error('sorry！您没有权限');
		}
   }
}