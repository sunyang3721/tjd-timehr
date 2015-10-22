<?php
		function sumCount($id){
				$botalent = M('botalent');
				$count = $botalent->where('eid='.$id)->count();
				return $count;
		}
		function highlight($guanjianzi,$row){  //高亮显示关键字
			if($guanjianzi!=''){
			$result = array();
		$str = explode(' ',$guanjianzi);
			foreach($str as $key=>$value){ //遍历 带空格键分开执行
			$result[] = $value;
			}
			for($i=0;$i<=$key;$i++){
				if($result[$i]!=''){ //判断不是空格键,便执行
					$row=preg_replace("/$result[$i]/i", "<font color=blue><b>$result[$i]</b></font>", $row);
				}else{
					unset($result[$i]);   //如果多余空格键清除数组! 必须!
				}
			}
				if($row!=''){
					return $row;
				}else{
					return '<i>未填写</i>';
				}
			}else{ //关键字为空即显示输出
				if($row==''){
					return '<i>未填写</i>';
				}else{
					return $row;
				}
				
			}
		}
		   /**
		 * 系统邮件发送函数
		 * @param string $to    接收邮件者邮箱
		 * @param string $name  接收邮件者名称
		 * @param string $subject 邮件主题
		 * @param string $body    邮件内容
		 * @param string $attachment 附件列表
		 * @return boolean
		 */

		 function think_send_mail($to, $name, $subject = '', $body = '', $attachment = null){
			$config = C('THINK_EMAIL');
			vendor('Phpmailer.class#phpmailer'); //从PHPMailer目录导class.phpmailer.php类文件
			$mail             = new PHPMailer(); //PHPMailer对象
			$mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
			$mail->IsSMTP();  // 设定使用SMTP服务
			$mail->SMTPDebug  = 1;                     // 关闭SMTP调试功能
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
			$mail->SMTPSecure = '';                 // 使用安全协议
			$mail->Host       = $config['SMTP_HOST'];  // SMTP 服务器
			$mail->Port       = $config['SMTP_PORT'];  // SMTP服务器的端口号
			$mail->Username   = $config['SMTP_USER'];  // SMTP服务器用户名
			$mail->Password   = $config['SMTP_PASS'];  // SMTP服务器密码
			$mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
			$replyEmail       = $config['REPLY_EMAIL']?$config['REPLY_EMAIL']:$config['FROM_EMAIL'];
			$replyName        = $config['REPLY_NAME']?$config['REPLY_NAME']:$config['FROM_NAME'];
			$mail->AddReplyTo($replyEmail, $replyName);
			$mail->Subject    = $subject;
			$mail->MsgHTML($body);
			$mail->AddAddress($to, $name);
			if(is_array($attachment)){ // 添加附件
				foreach ($attachment as $file){
					is_file($file) && $mail->AddAttachment($file);
				}
			}
			return $mail->Send() ? true : $mail->ErrorInfo;
		 }
?>