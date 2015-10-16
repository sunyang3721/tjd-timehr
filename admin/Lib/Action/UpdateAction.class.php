<?php
class UpdateAction extends CommonAction {
    public function index(){
	$web = M('web');
	$list = $web->select();
	$this->assign('list',$list);
	$this->display();
    }
	public function edit(){
	$id['id'] = $this->_param('2');
	$web = M('web');
	$list = $web->where($id)->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function add(){
	$list['id'] = $this->_post('id');
	$list['content'] = $this->_post('editorValue',stripslashes);
	$list['last_date'] = date('Y-m-d');
	if($list['content']!=''){
		$web = M('web');
		$content = $web->save($list);
		if($content){
			$this->success('修改成功！',U('Update/index'));
		}else{
			$this->error('修改失败');
			}
	}else{
		$this->error('内容不能为空！');
		}
	}
}