<?php
class LoginAction extends Action {
    public function index(){
		$getIP = $this->getIP();
		$this->assign('getIP',$getIP);
		$this->display();
    }
	Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify('4','2','png','50','30');
	}
	public function login(){
		$doverify =  md5(strtoupper($this->_post('verify')));
		//$verify = $this->_session('verify');
		$login['username'] = $this->_post('username');
		$login['password'] = md5($this->_post('password'));
		//if($doverify==$verify){
			$user = M('user');
			$list = $user->where($login)->find();
			if(!$user->getByUsername($login['username'])){
				$this->error('您输入的编号：'.$login['username'].'<br/>未注册，请联系人事部：010-62609527');
			}
				if($list!=''){
					$data['id'] = $list['id'];
					$data['last_time'] = time();
					$data['last_ip'] = $this->_post('last_ip');
					$user->data($data)->save();
					$_SESSION['id'] = $data['id'];
					$_SESSION['test']['username'] = $list['username'];
					$_SESSION['username'] = $list['username'];
					$_SESSION['yourname'] = $list['yourname'];
					$_SESSION['status'] = $list['status'];
					$_SESSION['statuspdf'] = $list['statuspdf'];
					$_SESSION['listpdf'] = $list['listpdf'];
					$url = Cookie('refer');
					if($url!='__INFO__' and $url!=''){
						$this->redirect($url);
						}else{
						$this->redirect('Kehu/index');
						}
				}else{
					$this->error('密码错误！');
				}

		//}else{
		//	$this->error('验证码不正确！');
		//}

	}
	public function loginout(){
		$_SESSION=array();
		if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-1,'/');
			}
		cookie('pwd',null);
		session_destroy();  //将重置 session，您将失去所有已存储的 session 数据
		$this->success('退出成功！',U('Login/index'));
	}
	//获取IP地址
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
}