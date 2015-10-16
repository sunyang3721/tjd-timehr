<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ width:500px; margin:0px auto;padding: 24px 48px;margin-top:150px; border:1px solid #c0c0c0;}
.system-message h1{  line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px ; width:500px;text-shadow:0px 1px 1px  #808080;}
.system-message .jump a{ color: #333;text-decoration: none;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px ;text-shadow:0px 1px 1px  #808080;}
.system-message .detail{ font-size: 24px; line-height: 20px; margin-top: 12px; display:none}
</style>
</head>
<body onkeydown="keyLogin();">
<div class="system-message">
<?php if(isset($message)): ?><h1><img src="__PUBLIC__/images/jump/true.jpg" border="0"alt=""></h1>
<p class="success"><?php echo($message); ?></p>
<?php else: ?>
<h1><img src="__PUBLIC__/images/jump/error.jpg" border="0"   alt=""></h1>
<p class="error"><?php echo($error); ?></p><?php endif; ?>
<p class="detail"></p>
<p class="jump">
页面自动跳转等待时间： <b id="wait"><?php echo($waitSecond); ?></b>秒&nbsp;&nbsp;&nbsp;
若不想等待请单击<a id="href" href="<?php echo($jumpUrl); ?>">-><span style="color:red;" id="input">确认返回</span></a> 
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
function keyLogin(){  
        if (event.keyCode==13)   //回车键的键值为13  
             document.getElementById("input").click(); //调用登录按钮的登录事件  
        }  
</script>
</body>
</html>