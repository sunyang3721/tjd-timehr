<?php
class IndexAction extends CommonAction {
    public function index(){
		$img = M('img');
		$list = $img->select();
		$this->assign('list',$list);
		$this->display();
    }
	//删除图片
	public function del(){
		$data['id'] = $this->_param('2');
		$data['status'] = 0;
		$img = M('img');
		$list = $img->data($data)->save();
		if($list){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}

	}
	//删除图片到回收站
	public function _delface(){
		$img = M('img');
		$list = $img->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function delface_one(){
		$this->_delface();
	}
	public function delface_two(){
		$this->_delface();
	}
	public function delface_there(){
		$this->_delface();
	}
	public function delface_four(){
		$this->_delface();
	}
	public function delface_five(){
		$this->_delface();
	}
	public function delface_six(){
		$this->_delface();
	}
	public function delface_seven(){
		$this->_delface();
	}
	//主页效果图上传
	public function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$img = M('img');
		$imgs['imgpath'] = $info['0']['savename'];
		$imgs['pid'] = 1;
		$imgs['status'] = 1;
		$list = $img->add($imgs);
		if($list){
			$this->success('上传成功！');
		}else{
			$this->error('上传失败！');
		}
	}
	//主页图片恢复
	public function huifu_one(){
		$data['id'] = $this->_param('2');
		$data['status'] = 1;
		$img = M('img');
		$list = $img->data($data)->save();
		if($list){
			$this->success('恢复成功！');
		}else{
			$this->error('恢复失败！');
		}
	}
	//最新关注
	public function upload_two(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$img = M('img');
		$data['status'] = 0;
		$img->where('pid=2 and status=1')->data($data)->save();
		$imgs['imgpath'] = $info['0']['savename'];
		$imgs['pid'] = 2;
		$imgs['status'] = 1;
		$imgs['href'] = $this->_post('href');
		$list = $img->add($imgs);
		if($list){
			$this->success('上传成功！');
		}else{
			$this->error('上传失败！');
		}
	}
	public function huifu_two(){
		$data['id'] = $this->_param('2');
		$data['status'] = 1;
		$img = M('img');
		$other['status'] = 0;
		$img->where('pid=2 and status=1')->data($other)->save();
		$list = $img->data($data)->save();
		if($list){
			$this->success('恢复成功！');
		}else{
			$this->error('恢复失败！');
		}
	}
	public function upload_there(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$img = M('img');
		$data['status'] = 0;
		$img->where('pid=3 and status=1')->data($data)->save();
		$imgs['imgpath'] = $info['0']['savename'];
		$imgs['pid'] = 3;
		$imgs['status'] = 1;
		$imgs['href'] = $this->_post('href');
		$list = $img->add($imgs);
		if($list){
			$this->success('上传成功！');
		}else{
			$this->error('上传失败！');
		}
	}
	public function huifu_there(){
		$data['id'] = $this->_param('2');
		$data['status'] = 1;
		$img = M('img');
		$other['status'] = 0;
		$img->where('pid=3 and status=1')->data($other)->save();
		$list = $img->data($data)->save();
		if($list){
			$this->success('恢复成功！');
		}else{
			$this->error('恢复失败！');
		}
	}
	public function upload_four(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$img = M('img');
		$data['status'] = 0;
		$img->where('pid=4 and status=1')->data($data)->save();
		$imgs['imgpath'] = $info['0']['savename'];
		$imgs['pid'] = 4;
		$imgs['status'] = 1;
		$imgs['href'] = $this->_post('href');
		$list = $img->add($imgs);
		if($list){
			$this->success('上传成功！');
		}else{
			$this->error('上传失败！');
		}
	}
	public function huifu_four(){
		$data['id'] = $this->_param('2');
		$data['status'] = 1;
		$img = M('img');
		$other['status'] = 0;
		$img->where('pid=4 and status=1')->data($other)->save();
		$list = $img->data($data)->save();
		if($list){
			$this->success('恢复成功！');
		}else{
			$this->error('恢复失败！');
		}
	}
	public function upload_five(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$img = M('img');
		$data['status'] = 0;
		$img->where('pid=5 and status=1')->data($data)->save();
		$imgs['imgpath'] = $info['0']['savename'];
		$imgs['pid'] = 5;
		$imgs['status'] = 1;
		$imgs['href'] = $this->_post('href');
		$list = $img->add($imgs);
		if($list){
			$this->success('上传成功！');
		}else{
			$this->error('上传失败！');
		}
	}
	public function huifu_five(){
		$data['id'] = $this->_param('2');
		$data['status'] = 1;
		$img = M('img');
		$other['status'] = 0;
		$img->where('pid=5 and status=1')->data($other)->save();
		$list = $img->data($data)->save();
		if($list){
			$this->success('恢复成功！');
		}else{
			$this->error('恢复失败！');
		}
	}
	public function upload_six(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$img = M('img');
		$data['status'] = 0;
		$img->where('pid=6 and status=1')->data($data)->save();
		$imgs['imgpath'] = $info['0']['savename'];
		$imgs['pid'] = 6;
		$imgs['status'] = 1;
		$imgs['href'] = $this->_post('href');
		$list = $img->add($imgs);
		if($list){
			$this->success('上传成功！');
		}else{
			$this->error('上传失败！');
		}
	}
	public function huifu_six(){
		$data['id'] = $this->_param('2');
		$data['status'] = 1;
		$img = M('img');
		$other['status'] = 0;
		$img->where('pid=6 and status=1')->data($other)->save();
		$list = $img->data($data)->save();
		if($list){
			$this->success('恢复成功！');
		}else{
			$this->error('恢复失败！');
		}
	}
	public function upload_seven(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$img = M('img');
		$data['status'] = 0;
		$img->where('pid=7 and status=1')->data($data)->save();
		$imgs['imgpath'] = $info['0']['savename'];
		$imgs['pid'] = 7;
		$imgs['status'] = 1;
		$list = $img->add($imgs);
		if($list){
			$this->success('上传成功！');
		}else{
			$this->error('上传失败！');
		}
	}
	public function huifu_seven(){
		$data['id'] = $this->_param('2');
		$data['status'] = 1;
		$img = M('img');
		$other['status'] = 0;
		$img->where('pid=7 and status=1')->data($other)->save();
		$list = $img->data($data)->save();
		if($list){
			$this->success('恢复成功！');
		}else{
			$this->error('恢复失败！');
		}
	}
}