<?php
class XinxiAction extends CommonAction {
   public function index(){
	   $jobtitle = M('jobtitle');
		$list = $jobtitle->find('2');
		$this->assign('list',$list);
		$this->display();
   }
   public function edit(){
			$id['id'] = $this->_param('2');
			$jobtitle = M('jobtitle');
			$list = $jobtitle->where($id)->find();
			$this->assign('list',$list);
			$this->display();
	}
	public function save(){
			$list['id'] = $this->_post('id');
			$list['title'] = $this->_post('editorValue',stripslashes);
			if($list['title']!=''){
				$jobtitle = M('jobtitle');
				$content = $jobtitle->save($list);
				if($content){
					$this->success('修改成功！',U('Xinxi/index'));
				}else{
					$this->error('修改失败');
					}
			}else{
				$this->error('内容不能为空！');
				}
	}
}
