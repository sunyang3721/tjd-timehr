<?php
class XunfangAction extends CommonAction {
    public function index(){
    	//$str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
		//echo $this->base_de($str);
		//$sunyang = '0170';
		//echo $this->base_en($sunyang);
    	$id = $this->_get('id');
    	$this->id = $this->base_de($id);
    	$user = M('user');
    	$user_id = $user->find($this->id);
    	$this->yourname = $user_id['yourname'];
		$this->display();
    }
    public function user_xunfang(){
    	$xunfang = new XunfangViewModel();
        import('ORG.Util.Page');
        $data['shenhe'] = 1;
        $count = $xunfang->where($data)->count();
        $page = new Page($count,30);
        $this->list = $xunfang->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->show = $page->show();
    	//$this->list = $xunfang->where()->select();
    	$this->display();
    }
    public function my_xunfang(){
        $xunfang = new XunfangViewModel();
        $user_id = $this->_session('id');
        import('ORG.Util.Page');
        $count = $xunfang->where('user_id='.$user_id)->order('date desc')->count();
        $page = new Page($count,30);
        $this->list = $xunfang->where('user_id='.$user_id)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->show = $page->show();
        $this->display();
    }
    public function admin_shenhe_xunfang(){
        $xunfang = new XunfangViewModel();
        import('ORG.Util.Page');
        $data['shenhe'] = 0;
        $count = $xunfang->where($data)->count();
        $page = new Page($count,30);
        $this->list = $xunfang->where($data)->order('shenhe asc,date desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->show = $page->show();
        $this->display();
    }
    public function no_xunfang(){
        $xunfang = new XunfangViewModel();
        $data['shenhe'] = array('in',array('2,3'));
        import('ORG.Util.Page');
        $count = $xunfang->where($data)->order('date desc')->count();
        $page = new Page($count,30);
        $this->list = $xunfang->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->show = $page->show();
        $this->display();
    }
    public function admin_do_xunfang(){
        $data['id'] = (int)$this->_param('id');
        $data['shenhe'] = (int)$this->_param('shenhe');
        //echo $post_shenhe;
        $xunfang = M('xunfang');
        $user_username = $this->_session('username');
        $xunfang_admin = C(XUNFANG_ADMIN);
       // echo $user_username;
        if(in_array($user_username, $xunfang_admin)){
           // echo '有权限';
            $list = $xunfang->save($data);
            if($list){
                $this->success('审核成功!');
            }else{
                $this->error('审核失败!');
            }
        }else{
            $this->error('抱歉,您没有权限处理!');
        }
    }
} 