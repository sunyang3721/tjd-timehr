<?php
class UpfileAction extends CommonAction {
    public function index(){
		$this->display();
	}
	public function upfile(){
		import('ORG.Util.Crop');
		$id = $this->_session('id');
		$file_name = 'sunyang';
		$crop = new CropAvatar($_POST['avatar_src'], $_POST['avatar_data'], $_FILES['avatar_file'],$id);

		$response = array(
		  'state'  => 200,
		  'message' => $crop -> getMsg(),
		  'result' => $crop -> getResult()
		  
		);

		echo json_encode($response);
		//$this->redirect('User/index');
		/*
		$path = APP_PATH."avatar/";
		$id = $this->_session('id');
		$file_src = "src.png";
		$filename162 = $id.".png";
		$filename48 = $id."_2.png";
		$filename20 = $id."_3.png";

		$src=base64_decode($_POST['pic']);
		$pic1=base64_decode($_POST['pic1']);
		$pic2=base64_decode($_POST['pic2']);
		$pic3=base64_decode($_POST['pic3']);

		if($src) {
		file_put_contents($file_src,$src);
		}

		file_put_contents($path.$filename162,$pic1);
		file_put_contents($path.$filename48,$pic2);
		file_put_contents($path.$filename20,$pic3);

		$rs['status'] = 1;

		echo json_encode($rs);
		*/
	}
}