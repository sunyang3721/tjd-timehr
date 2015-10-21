<?php
class IndexAction extends CommonAction {
    public function index(){
		//图片管理
		$img = M('img');
		$list = $img->select();
		//新闻动态--公司要闻，最新动态
		$news = M('news');
		$data['status'] = 1;
		$data['classif'] =array(array('eq',1),array('eq',2),'or');
		$new = $news->where($data)->field('id,title,last_time,classif')->order('last_time desc,id desc')->limit(0,12)->select();
		//新闻动态--专题活动
		$datathere['status'] = 1;
		$datathere['classif'] = 3;
		$newthere = $news->where($datathere)->field('id,title,last_time,classif')->order('last_time desc,id desc')->limit(0,12)->select();
		//职位信息500万以上
		$job = M('job');
		$datafour['status'] = 1;
		$datafour['moeny'] = array('gt',500);
		$job = $job->where($datafour)->field('id,jobname,moeny,time,address,status')->order('time desc,id desc')->limit(0,7)->select();
		//职位信息200-500
		$jobs = M('job');
		$datafive['status'] = 1;
		$datafive['moeny'] = array('between','200,500');
		$jobone = $jobs->where($datafive)->field('id,jobname,moeny,time,address,status')->order('time desc,id desc')->limit(0,7)->select();
		//职位信息100-200
		$datafive['status'] = 1;
		$datafive['moeny'] = array('between','100,200');
		$jobtwo = $jobs->where($datafive)->field('id,jobname,moeny,time,address,status')->order('time desc,id desc')->limit(0,7)->select();
		//职位信息30-50
		//$datafive['status'] = 1;
		//$datafive['moeny'] = array('between','30,50');
		//$jobthere = $jobs->where($datafive)->field('id,jobname,moeny,time,address,status')->order('time desc,id desc')->limit(0,7)->select();
		//职位信息30以下
		//$datafive['status'] = 1;
		//$datafive['moeny'] = array('between','0,30');
		//$jobfour = $jobs->where($datafive)->field('id,jobname,moeny,time,address,status')->order('time desc,id desc')->limit(0,7)->select();
		$this->assign('list',$list);
		$this->assign('new',$new);
		$this->assign('newthere',$newthere);
		$this->assign('job',$job);
		$this->assign('jobone',$jobone);
		$this->assign('jobtwo',$jobtwo);
		//$this->assign('jobthere',$jobthere);
		//$this->assign('jobfour',$jobfour);
		$this->display();
    }
	public function test(){
		$str = new TestModel();
		echo $str->index();
	}
}