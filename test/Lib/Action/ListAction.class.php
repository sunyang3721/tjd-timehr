<?php
class ListAction extends CommonAction {
   public function index(){
	    $pdf = M('pdf');
		import('ORG.Util.Page');
		$text = trim($this->_get('title')); //取值
		$data['title|hangye'] = array('like',array("%$text%")); //模糊查询 标题和行业
		$data['pid'] = 6;
		/*
		$id = $this->_get('pid');
			if($id!='' and $id!='p'){
			$data['pid'] = $id;
				if($id==6){
					$this->assign('soso_text','人力资源报告');
				}else if($id==3){
					$this->assign('soso_text','客户信息资料');
				}
			}
			*/
		$statuspdf = $this->_session('statuspdf'); //获取用户访问权限
		$data['status']  = array('elt',$statuspdf); //判断人力资源报告 是否 小于等于 用户权限
		$count = $pdf->where($data)->count();
		$page = new Page($count,30);
		$list = $pdf->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可看的文件！');
		}
		$map['pid']= $id;
		$map['title'] = $text;
		foreach($map as $key=>$val){
			$page->parameter .="$key=".urlencode($val)."&";
		}
		$show = $page->show();
		$this->assign('soso_text','人力资源报告');
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
   }
    public function kehu_index(){
	    $pdf = M('pdf');
		import('ORG.Util.Page');
		$text = trim($this->_get('title')); //取值
		$data['title|hangye'] = array('like',array("%$text%")); //模糊查询 标题和行业
		$data['pid'] = 3;
		/*
		$id = $this->_get('pid');
			if($id!='' and $id!='p'){
			$data['pid'] = $id;
				if($id==6){
					$this->assign('soso_text','人力资源报告');
				}else if($id==3){
					$this->assign('soso_text','客户信息资料');
				}
			}
			*/
		$statuspdf = $this->_session('statuspdf'); //获取用户访问权限
		$data['status']  = array('elt',$statuspdf); //判断人力资源报告 是否 小于等于 用户权限
		$count = $pdf->where($data)->count();
		$page = new Page($count,30);
		$list = $pdf->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可看的文件！');
		}
		$map['pid']= $id;
		$map['title'] = $text;
		foreach($map as $key=>$val){
			$page->parameter .="$key=".urlencode($val)."&";
		}
		$show = $page->show();
		$this->assign('soso_text','客户信息资料');
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
   }
   public function show(){
		$id = $this->_param('2');
		$pdf = M('pdf');
		$list = $pdf->where('id='.$id)->find();
		$this->assign('list',$list);
		$this->display();
   }
   public function uppdf(){
		$id = $this->_session('listpdf');
		if($id == 1){
			$this->display();
		}else{
			$this->error('抱歉！您没有权限',U('List/index'));
		}
   }
   public function uping(){
		$yourname = $this->_session('yourname');
		$title = $this->_post('title');
		$pdfpath = $this->_post('pdfpath');
		$pid = '2';
		$status = '0';
		$hangye = $this->_post('hangye');
		if($title!=''){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->allowExts  = array('pdf');// 设置附件上传类型
		$upload->savePath =  './Upload/list/';// 设置附件上传目录
		$upload->maxSize  = 20485760 ;  //不能超过20MB
		//$upload->autoSub = true; //开启子目录
		$upload->saveRule = time(); //起名用时间目录
		//$upload->subType = date; //按日期分配存放
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		// 保存表单数据 包括附件数据
		$fuck =$info[0]['savename'];
		$path=explode('.',$fuck);
		$name['pdfpath']=$path['0'];
		$name['title'] = $title.' [上传人：'.$yourname.']';
		$name['pid'] = $pid;
		$name['status'] = $status;
		$name['hangye'] = $hangye;
		$name['date'] = time();
		$pdf = M("pdf"); // 实例化User对象
		//$str = exec('D:\xampp\htdocs\sunyang\Upload\SWFTools\pdf2swf  -t  D:/xampp/htdocs/sunyang/Upload/pdf/'.$fuck.' -s flashversion=9 -o  D:/xampp/htdocs/sunyang/Upload/swf/'.$name['pdfpath'].'.swf');
		$str = exec('/var/www/html/pdf2swf  -t  /var/www/html/Upload/list/'.$fuck.' -s flashversion=9 -o  /var/www/html/Upload/swf/'.$name['pdfpath'].'.swf');
			if($str){
				$list = $pdf->data($name)->add(); // 保存上传的照片根据需要自行组装
				if($list){
				//dump($info);
					$this->success('上传成功！',U('List/index'));

				}else{
					$this->error('上传失败!请联系管理员!');
				}
			}else{
				$this->error('上传pdf转换失败!请联系管理员!');
			}
		}else{
			$this->error('标题不能为空！');
		}
   }
}
