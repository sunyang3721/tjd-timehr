<?php
class XunAction extends Action {
    public function index(){
    	//$str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
		//echo $this->base_de($str);
		//$sunyang = '0170';
		//echo $this->base_en($sunyang);
    	$id = $this->_get('id');
    	//$this->id = $this->base_de($id);
    	$user = M('user');
    	//$user_id = $user->where('uaername='.$id)->find();
    	$user_id = $user->getByusername($id);
    	$this->user_id=$user_id['id'];
    	$this->yourname = $user_id['yourname'];
		$this->display();
    }
    public function add(){
    	$xunfang = new XunfangModel('xunfang');
    	$data = $this->_post();
    	if(!$xunfang->create()){
			//$this->error($xunfang->getError());
			$this->ajaxReturn('',$xunfang->getError(),0);
		}else{
			$xunfang = M('xunfang');
			$list = $xunfang->data($data)->add();
			if($list){
				$this->ajaxReturn('','保存成功,1秒后跳转......',1);
			}else{
				$this->ajaxReturn('','提交失败！',1);
			}
		}
    	
    }
    
}