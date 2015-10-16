<?php
class XiangceAction extends CommonAction {
   public function index(){
	    $xiangce = M('xiangce');
	    import('ORG.Util.Page');
	    $count = $xiangce->count();
		$page = new Page($count,3);
		$show = $page->show();
		$list = $xiangce->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
        $this->display();
   }
   public function Upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Upload/home/';// 设置附件上传目录
		$upload->saveRule = time(); //起名用时间目录
		$upload->thumb = true;
		$upload->thumbMaxWidth = '900';
		$upload->thumbMaxHeight = '900';
		$upload->thumbPrefix = 'm_';
		$upload->thumbRemoveOrigin = true;
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$xiangce = M('xiangce');
		$imgs['imgpath'] = $info['0']['savename'];
		$imgs['imgtitle'] = $this->_post('imgtitle');
		$imgs['date'] = time();
		$list = $xiangce->add($imgs);
		if($list){
			$this->success('上传成功！');
		}else{
			$this->error('上传失败！');
		}
   }
   public function del(){
		$id = $this->_param('2');
		$xiangce = M('xiangce');
		$list = $xiangce->find($id);
			if($list!=''){
				$xiangce->delete($id);
				$url = './Upload/home/m_'.$list['imgpath'];
				unlink($url);
				$this->success('删除成功！');
			}else{
				$this->error('删除失败！');
			}
   }
}
