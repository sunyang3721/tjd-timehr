<?php
class PersonAction extends CommonAction {
    public function index(){
		$title = trim($this->_post('title'));
		$industry = $this->_post('industry');
		$address = $this->_post('address');
		$in = $this->_post('in');
		/*
		$classif = $this->_post('classif');
		if($classif == 0){
					$data['jobname|yourname|id'] = array('like',array("%$title%"));
		}else if($classif==1){
			$data['id'] = array('like',array("%$title%")); //判断下拉列表是否选择
		}else if($classif == 2){
			$data['jobname'] = array('like',array("%$title%"));
		}else if($classif == 3){
			$data['yourname'] = array('like',array("%$title%"));
		}
		*/
		$data['jobname'] = array('like',array("%$title%"));
		if($industry !=0){
		$data['industry'] = $industry;
		}
		if($address !=0){
		$data['address'] = $address;
		}
		if($in == 2){
		//一天内
		$time = time();
		$timed = time()-3600*24;
		$data['time'] = array('between',"$timed,$time");
		}else if($in == 3){
		//三天内
		$time = time();
		$timed = time()-3600*24*3;
		$data['time'] = array('between',"$timed,$time");
		}else if($in == 4){
		//一周内
		$time = time();
		$timed = time()-3600*24*7;
		$data['time'] = array('between',"$timed,$time");
		}else if($in == 5){
		//一月内
		$time = time();
		$timed = time()-3600*24*30;
		$data['time'] = array('between',"$timed,$time");
		}
		$job = M('job');
		import('ORG.Util.Page');
		$data['status'] = 1;
		$count = $job->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $job->where($data)->order('time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		//$this->assign('classif',$classif);
		$this->assign('industry',$industry);
		$this->assign('address',$address);
		$this->assign('in',$in);
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
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
	public function person_jl(){
		$getIP = $this->getIP();
		$this->assign('getIP',$getIP);
		//上传简历模块
		$this->display();
	}
	public function upload(){
		$email = $this->_post('email');
		$ip = $this->_post('ip');
		$time = time();
		if($email==''){
		//$this->ajaxReturn('邮箱不能为空！','提示内容',0);
		$this->error('邮箱不能为空！');
		return false;
		}
		if (!ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+",$email)){
				//$this->ajaxReturn('邮箱格式不正确！','提示内容',1);
				$this->error('邮箱格式不正确！');
				return false;
				}
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 1048576 ;// 设置附件上传大小不高于1MB
		$upload->allowExts  = array('doc', 'docx', 'txt', 'xls');// 设置附件上传类型
		$upload->autoSub = false; //开启子目录
		$upload->subType = date; //子目录名字
		$upload->savePath =  './Upload/offer/';// 设置附件上传目录
		$upload->uploadReplace = true;
		$upload->saveRule = $email.'-'.date('Y-m-d');
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		//$this->ajaxReturn($upload->getErrorMsg(),'提示内容',2);
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		// 保存表单数据 包括附件数据
		$User = M("upload"); // 实例化User对象
		$data['email'] =$email; // 保存上传的照片根据需要自行组装
		$data['time'] = $time;
		$data['ip'] = $ip;
		$User->data($data)->add(); // 写入用户数据到数据库
		//$this->ajaxReturn('恭喜！上传简历成功!','关闭成功',3);
		$this->success('恭喜！上传简历成功！');
	}
	public function person_lt(){
		$web = M('web');
		$list = $web->where('id=8')->find();
		$this->assign('list',$list);
		$this->display();
	}
	public function person_rc(){
		$web = M('web');
		$list = $web->where('id=9')->find();
		$this->assign('list',$list);
		$this->display();
	}
	public function person_fw(){
		$web = M('web');
		$list = $web->where('id=10')->find();
		$this->assign('list',$list);
		$this->display();
	}
	public function person_gh(){
		$web = M('web');
		$list = $web->where('id=11')->find();
		$getIP = $this->getIP();
		$this->assign('getIP',$getIP);
		$this->assign('list',$list);
		$this->display();
	}
	public function person_ztc(){
		$web = M('web');
		$list = $web->where('id=12')->find();
		$this->assign('list',$list);
		$this->display();
	}
	public function person_zx(){
		$title = trim($this->_post('title'));
		$industry = $this->_post('industry');
		$address = $this->_post('address');
		$in = $this->_post('in');
		$data['jobname'] = array('like',array("%$title%"));
		// 首页分类行业 检索
		$index_industry = $this->_param('2');
		$industry_num = $this->_param('3');
		if($index_industry =='industry' and $industry_num!=''){
		$data['industry'] = $industry_num;
		}
		//首页分类职位 检索
		$index_jobname = $this->_param('2');
		$jobname_num = $this->_param('3');
		if($index_jobname == 'jobname' and $jobname_num!=''){
		$data['jobname'] = array('like',array("%$jobname_num%"));
		$title = $jobname_num;
		}
		//首页分类薪酬 检索
		$index_moeny = $this->_param('2');
		$moeny_num = $this->_param('3');
		if($index_moeny =='moeny' and $moeny_num!=''){
			if($moeny_num=='500'){
				$data['moeny'] = array('gt',500);
				$moeny_num ='500万以上';
			}else if($moeny_num=='200'){
				$data['moeny'] = array('between','200,500');
				$moeny_num ='200万~500万';
			}else if($moeny_num=='100'){
				$data['moeny'] = array('between','100,200');
				$moeny_num ='100万~200万';
			}
		}
		/*
		$classif = $this->_post('classif');
		if($classif == 0){
					$data['jobname|yourname|id'] = array('like',array("%$title%"));
		}else if($classif==1){
			$data['id'] = array('like',array("%$title%")); //判断下拉列表是否选择
		}else if($classif == 2){
			$data['jobname'] = array('like',array("%$title%"));
		}else if($classif == 3){
			$data['yourname'] = array('like',array("%$title%"));
		}
		*/
		if($industry !=0){
		$data['industry'] = $industry;
		}
		if($address !=0){
		$data['address'] = $address;
		}
		if($in == 2){
		//一天内
		$time = time();
		$timed = time()-3600*24;
		$data['time'] = array('between',"$timed,$time");
		}else if($in == 3){
		//三天内
		$time = time();
		$timed = time()-3600*24*3;
		$data['time'] = array('between',"$timed,$time");
		}else if($in == 4){
		//一周内
		$time = time();
		$timed = time()-3600*24*7;
		$data['time'] = array('between',"$timed,$time");
		}else if($in == 5){
		//一月内
		$time = time();
		$timed = time()-3600*24*30;
		$data['time'] = array('between',"$timed,$time");
		}
		$job = M('job');
		import('ORG.Util.Page');
		$data['status'] = 2;
		$count = $job->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $job->where($data)->order('time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		//$this->assign('classif',$classif);
		$this->assign('industry',$industry);
		$this->assign('industry',$industry_num);
		$this->assign('address',$address);
		$this->assign('in',$in);
		$this->assign('moeny_num',$moeny_num);
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
		$this->display();
	}
	public function job_show(){
		$id = $this->_param('2');
		$job = M('job');
		$list = $job->where('id='.$id)->find();
		$this->assign('list',$list);
		$this->display();
	}
}