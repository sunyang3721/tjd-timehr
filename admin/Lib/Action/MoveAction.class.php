<?php
class MoveAction extends CommonAction {
   public function index(){
		$move = M('move');
		import('ORG.Util.Page');
		$status = $this->_param('2');
		if($status!='' and $status!='p'){
		$data['status'] = $status;
		}
		$text = $this->_post('text');
		$data['title'] = array('like','%'.$text.'%');
	    $count = $move->where($data)->count();
		$page = new Page($count,20);
		$show = $page->show();
		$list = $move->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有搜索到数据！');
		}
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
        $this->display();
   }
   public function add(){
		$data['title'] = $this->_post('title');
		//$data['movepath'] = $this->_post('movepath',stripslashes);
		$data['movepath'] = $this->_post('movepath');
		//$data['password'] = $this->_post('password');
		$data['date'] = time();
		$data['status'] = $this->_post('status');
		if($data['title']!='' and $data['movepath']){
			$move = M('move');
			$list = $move->add($data);
			if($list){
				$this->success('视频添加成功！');
			}else{
				$this->error('视频添加失败！');
			}
		}else{
			$this->error('视频标题和视频代码都不能为空！');
		}
   }
   public function del(){
		$id = $this->_param('2');
		$move = M('move');
		$list = $move->delete($id);
		if($list){
			$this->ajaxReturn('3', '删除成功！', 3);
		}else{
			$this->error('删除失败！');
		}
   }
   public function edit(){
		$id = $this->_param('2');
		$move = M('move');
		$list = $move->find($id);
		$this->assign('list',$list);
		$this->display();
   }
	public function save(){
		$data['id'] = $this->_post('id');
		$data['title'] = $this->_post('title');
		$data['movepath'] = $this->_post('movepath',stripslashes);
		$data['password'] = $this->_post('password');
		$data['date'] = time();
		$data['status'] = $this->_post('status');
		if($data['title']!='' and $data['movepath']){
			$move = M('move');
			$list = $move->save($data);
			if($list){
				$this->success('修改成功！',U('index'));
			}else{
				$this->error('修改失败！');
			}
		}else{
			$this->error('视频标题和视频代码都不能为空！');
		}
	}
}
