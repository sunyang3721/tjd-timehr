<?php
class LoginAction extends Action {
    public function index(){
		$getIP = $this->getIP();
		$this->assign('getIP',$getIP);
		$this->display();
	 }
	public function getIP(){
		if (@$_SERVER["HTTP_X_FORWARDED_FOR"])
			$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			else if (@$_SERVER["HTTP_CLIENT_IP"])
			$ip = $_SERVER["HTTP_CLIENT_IP"];
			else if (@$_SERVER["REMOTE_ADDR"])
			$ip = $_SERVER["REMOTE_ADDR"];
			else if (@getenv("HTTP_X_FORWARDED_FOR"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
			else if (@getenv("HTTP_CLIENT_IP"))
			$ip = getenv("HTTP_CLIENT_IP");
			else if (@getenv("REMOTE_ADDR"))
			$ip = getenv("REMOTE_ADDR");
			else
			$ip = "Unknown";
			return $ip;
	}
	public function doing(){
		/*
		//$checkbox = $this->_post('checkbox');
		//生成认证条件
		$map = array();
		// 支持使用绑定帐号登录
		$map['username']	= $this->_post('username');
		if($map['username']==''){
			$this->error('用户名不能为空！');
		}
		import ( 'ORG.Util.RBAC' );
		$authInfo = RBAC::authenticate($map);
		//使用用户名、密码和状态的方式进行认证
		if(false === $authInfo) {
			$this->error('此帐号不存在!');
		}else {
			if($authInfo['password'] != md5($this->_post('password'))) {
				$this->error('密码不正确！');
			}
			$_SESSION[C('USER_AUTH_KEY')]	=	$authInfo['id'];
			if($authInfo['username']=='admin') {
				$_SESSION['administrator']		=	true;  //最高权限登录
			}
			if($authInfo['status']!=1){
				$this->error('此帐号已禁用!');
			}
			$get['last_ip']	=	$this->_post('last_ip');
			$get['last_time']	=	time();
			$user = M('user');
			$user->where('id='.$authInfo['id'])->data($get)->save();
			//$user->where('id='.$authInfo['id'])->setInc('login_count');
			$_SESSION['id'] = $authInfo['id'];
			$_SESSION['username'] = $authInfo['username'];
			$_SESSION['yourname'] = $authInfo['yourname'];
			//记住用户名
			cookie('name',$authInfo['username'],10);
			RBAC::saveAccessList();
			$url = Cookie('admin_url');
			if($url!='__INFO__' and $url!=''){
			$this->redirect($url);
			}else{
			$this->redirect('Job/index');
			}
		}
		*/
		$username = $this->_get('username');
		$password = $this->_get('password');
		$user = M('User');
		$where['username'] = $username;
		$where['password'] = md5($password);
		$arr = $user->where($where)->find();
		if($arr){
			session('username',$username);
			session(C('USER_AUTH_KEY'),$arr['id']);
			$_SESSION['yourname'] = $arr['yourname'];
			if($_SESSION['username'] == C('RBAC_SUPERADMIN')){
				session(C('ADMIN_AUTH_KEY'),true);
			}
			//RBAC
			import('ORG.Util.RBAC');
			RBAC::saveAccessList();
//			$url = Cookie('admin_url');
//			if($url!='__INFO__' and $url!=''){
//			$this->redirect($url);
//			}else{
			$this->redirect('Job/index');
			//}
		}else{

			$this->error('密码错误');
		}
	}
	public function loginout(){
				$this->_out();//退出并清空session
				$this->success('退出成功',U('Login/index'));
		}
	public function _out(){
			if(isset($_SESSION[C('USER_AUTH_KEY')])) {
					unset($_SESSION[C('USER_AUTH_KEY')]);
					unset($_SESSION);
					session_destroy();  //将重置 session，您将失去所有已存储的 session 数据
					$this->assign("jumpUrl",__URL__);
				}else {
					$this->error('已经退出登录！',U('Login/index'));
				}
				if(isset($_COOKIE[session_name()])){
					setcookie(session_name(),'',time()-1,'/');
				}
				//cookie('name',null);
	}
}