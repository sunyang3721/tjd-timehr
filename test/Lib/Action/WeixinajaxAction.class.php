<?php
class WeixinajaxAction extends Action {
   //--------移动端 json输出处理---------------------------------------------------------------------------
   	public function userId(){  //输出员工资料
   		$id = $this->_get('id');
   		$user = M('testuser');
   		$list = $user->where('pid='.$id)->find();
   		$this->ajaxReturn($list);
   	}
   	public function home(){  //输出员工发布的职位列表
   		//$id = $this->_param('2');
   		//$this->ajaxReturn($id);
   		$pid = $this->_get('pid');
   		$weiJob = M('weijob');
   		$list = $weiJob->where(array('pid'=>$pid,'status'=>1))->order('date desc')->select();
   		$this->ajaxReturn($list);
   	}
   	public function user_img(){  //输出员工的二维码
   		$id = $this->_get('id');
   		$user = M('user');
   		$list = $user->find($id);
   		$this->ajaxReturn($list);
   	}
   	public function job_show(){
   		$id = $this->_get('id');
   		$weiJob = M('weijob');
   		$list = $weiJob->where('status=1')->find($id);
   		$this->ajaxReturn($list);
   	}
      public function userPost(){
         $book['pid'] = $this->_post('pid');
         $book['name'] = $this->_post('name');
         $book['ihone'] = $this->_post('ihone');
         $book['qq'] = $this->_post('qq');
         $book['mail'] = $this->_post('userEmail');
         $book['liuyan'] = $this->_post('wangzhi');
         $book['jobname'] = $this->_post('jobname');
         $book['date'] = time();
         $weipost = M('weipost');
         $list = $weipost->data($book)->add();
         if($list){
            $success['info'] = '恭喜您,提交成功!';
            $this->ajaxReturn($success);
         }else{
            $error['info'] = '请确定网络提交表单';
            $this->ajaxReturn($error);
         }
         
         
      }
}