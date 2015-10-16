<?php
class PdfAction extends CommonAction {
   public function index(){
		$pdf = M('pdf');
		import('ORG.Util.Page');
		$status = $this->_param('2');
		if($status!='' and $status!='p'){
		$data['pid'] = $status;
		}
		$text = $this->_post('text');
		$data['title'] = array('like','%'.$text.'%');
		$count = $pdf->where($data)->count();
		$page = new Page($count,100);
		$show = $page->show();
		$list = $pdf->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可查询的PDF资料！');
		}
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
   }
   public function add(){
		$title = $this->_post('title');
		$pdfpath = $this->_post('pdfpath');
		$pid = $this->_post('pid');
		$status = $this->_post('status');
		$hangye = $this->_post('hangye');
		if($title!=''){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->allowExts  = array('pdf');// 设置附件上传类型
		$upload->savePath =  './Upload/pdf/';// 设置附件上传目录
		$upload->maxSize  = 30*1024*1024 ;  //不能超过30MB
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
		$name['title'] = $title;
		$name['pid'] = $pid;
		$name['status'] = $status;
		$name['hangye'] = $hangye;
		$name['date'] = time();
		$pdf = M("pdf"); // 实例化User对象
		//$str = exec('D:\xampp\htdocs\sunyang\Upload\SWFTools\pdf2swf  -t  D:/xampp/htdocs/sunyang/Upload/pdf/'.$fuck.' -s flashversion=9 -o  D:/xampp/htdocs/sunyang/Upload/swf/'.$name['pdfpath'].'.swf');
		$str = exec('/var/www/html/pdf2swf  -t  /var/www/html/Upload/pdf/'.$fuck.' -s flashversion=9 -o  /var/www/html/Upload/swf/'.$name['pdfpath'].'.swf');
			if($str){
				$list = $pdf->data($name)->add(); // 保存上传的照片根据需要自行组装
				if($list){
				//dump($info);
					$this->success('上传成功！',U('Pdf/index'));

				}else{
					$this->error('上传失败!请联系管理员!');
				}
			}else{
				$this->error('上传pdf转换失败!请联系管理员!');
			}
		}else{
			$this->error('期刊标题不能为空！');
		}
   }
   public function edit(){
		$id = $this->_param('2');
		$pdf = M('pdf');
		$list = $pdf->where('id='.$id)->find();
		$this->assign('list',$list);
		$this->display();
   }
   public function save(){
	   $id = $this->_post('id');
	   $title = $this->_post('title');
	   $pid = $this->_post('pid');
	   $status = $this->_post('status');
	   $hangye = $this->_post('hangye');
	   if($title!=''){
		    $data['id'] = $id;
			$data['title'] = $title;
			$data['pid'] = $pid;
			$data['status'] = $status;
			$data['hangye'] = $hangye;
			$pdf = M('pdf');
			$list = $pdf->data($data)->save();
			if($list){
				$this->success('修改成功！',U('index'));
			}else{
				$this->error('修改失败！');
			}
	   }else{
			$this->error('PDF标题不能为空！');
	   }

   }
   public function del(){
	   $id = $this->_param('2');
	   $pdf = M('pdf');
	   $list = $pdf->where('id='.$id)->find();
	   $file = './Upload/pdf/'.$list['pdfpath'].'.pdf'; //获取路径pdf
	   $file_swf = './Upload/swf/'.$list['pdfpath'].'.swf';//获取路径swf
	   @unlink ($file); //删除文件pdf
	   @unlink ($file_swf); //删除文件swfroot
	   $del = $pdf->delete($id);
	   if($del){
			$this->success('删除成功！',U('index'));
	   }else{
			$this->error('删除失败！');
	   }

   }
   public function show(){
		$id = $this->_param('2');
		$pdf = M('pdf');
		$list = $pdf->where('id='.$id)->find();
		$this->assign('list',$list);
		$this->display();
   }
   public function Rbac(){
	    $user = M('user');
	    import('ORG.Util.Page');
		$status = $this->_param('2'); //全部查询 离职查询 在职查询
		if($status!='' and $status!='p'){ //分页出现bug  利用判断来解决
		$data['status'] = $status;
		}
		$text = $this->_post('text');
		$data['yourname'] = array('like','%'.$text.'%');
		$count = $user->where($data)->count();
		$page = new Page($count,20);
		$show = $page->show();
		$list = $user->where($data)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可查询的数据！');
		}
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();

   }
   public function group(){
		$user = M('user');
	    import('ORG.Util.Page');
		$status = $this->_param('2'); //全部查询 离职查询 在职查询
		if($status!='' and $status!='p'){ //分页出现bug  利用判断来解决
		$data['statuspdf'] = $status;
		}
		$text = $this->_post('text');
		$data['yourname'] = array('like','%'.$text.'%');
		$data['status'] = 1;
		$count = $user->where($data)->count();
		$page = new Page($count,20);
		$show = $page->show();
		$list = $user->where($data)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可查询的数据！');
		}
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display('Rbac');
   }
   public function dengji(){
	   $id = $this->_param('3'); //获取 ID主键
	   $statuspdf = $this->_param('4'); //获取 权限的值
	   $user = M('user');
	   $data['id'] = $id;
	   $data['statuspdf'] = $statuspdf;
	   $list = $user->save($data);
	   if($list){
			$this->success('修改成功！');
			//$this->ajaxReturn('<span style="color:#33cc00;">启用（在职）</span>', '启用成功', 1);
	   }else{
			$this->error('修改失败！');
	   }

   }
}
