<?php
class PublicAction extends Action {
	public function verify(){  //验证码
			import('ORG.Util.Image');
			Image::buildImageVerify(4,2);
	}

}
?>