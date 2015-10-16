<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>后台管理</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="__PUBLIC__/admin/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="__PUBLIC__/admin/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="__PUBLIC__/admin/css/invalid.css" type="text/css" media="screen" /> 
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
<!-- jQuery Configuration 主要 -->
<script type="text/javascript" src="__PUBLIC__/admin/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin 弹窗-->
<script type="text/javascript" src="__PUBLIC__/admin/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG编辑器 -->
<script type="text/javascript" src="__PUBLIC__/admin/scripts/jquery.wysiwyg.js"></script>
</head>
<script type="text/javascript" src="__PUBLIC__/admin/scripts/jQuery.autoIMG.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".content-box").autoIMG();
	
	var w = $(".content-box").width();
	$(".content-box img").each(function(){
		var img_w = $(this).width();
	    var img_h = $(this).height();
		if(img_w>w){
			var height = (w*img_h)/img_w;
			$(this).css({"width":w,"height":height});
		}
	});
});
</script>
<style type="text/css">
	.spanimg{
		padding:10px 0px 0px 10px;
		display:block;
	}
	.spanimg img{
		width:400px;
		border:1px solid #808080;
	}
	.spanimg p{
	padding-left:10px;
	}
	hr{border:3px solid #808080;}
</style>
<body>
<div id="body-wrapper">
  <div id="sidebar">
    <div id="sidebar-wrapper">
		<script language=JavaScript>
function logout(){
	if (confirm("您确定要退出吗？"))
	top.location = "__APP__/Login/loginout";
	return false;
}

   
$(function(){
    showimg();//加载第一屏
    $(window).scroll(function(){
        showimg();//显示当前滚动位置一下两屏且没有被加载的图片
    });
});
function showimg(){
    var vtop=$(document).scrollTop();//滚动条滚动的距离
    var wheight=$(window).height();//窗口高度　
    $("img").each(function(){var truesrc=$(this).attr("truesrc");
        if(truesrc&&$(this).offset().top<=(wheight+vtop)){			//如果truesrc存在且有值的时候加载。
            $(this).attr("src",truesrc).removeAttr("truesrc"),
			$(this).fadeOut(0).fadeIn(1000);			//赋值真实图片地址并移除truesrc属性防止重复加载。
        }
    });
}
</script>
 <a href="__APP__/"><img id="logo" src="__PUBLIC__/admin/images/logo.png" alt="Simpla Admin logo" /></a>
        <br />
 <ul id="main-nav">
        <!-- Accordion Menu -->
		<li> <a href="__APP__/Job" class="nav-top-item"> 职位管理 </a></li>
        <li> <a href="__APP__" class="nav-top-item no-submenu"> 主页图片管理 </a></li>
        <li> <a href="__APP__/Userdata" class="nav-top-item"> 猎头在线 </a></li>
        <li> <a href="__APP__/News" class="nav-top-item"> 新闻与公告管理 </a></li>
		<li> <a href="__APP__/Update" class="nav-top-item"> 前台更新 </a></li>
		<li> <a href="__APP__/Tousu" class="nav-top-item"> 留言反馈 </a></li>
	    <li> <a href="__APP__/Jianli" class="nav-top-item"> 简历统计 </a></li>
		<!-- <li> <a href="__APP__/Xinxi" class="nav-top-item"> 职位信息 </a></li> -->
		<li> <a href="__APP__/Jobtitle" class="nav-top-item"> 工作指南 </a></li>
		<li> <a href="__APP__/User" class="nav-top-item"> 用户管理 </a></li>
		<li> <a href="__APP__/Ziliao" class="nav-top-item"> 资料管理 </a></li>
		<li> <a href="__APP__/Rbac/addRole" class="nav-top-item"> 授权管理 </a></li>
		<li> <a href="__APP__/Shebei" class="nav-top-item"> 设备管理 </a></li>
		<!-- <li> <a href="__APP__/Notice" class="nav-top-item"> 更新通知 </a></li> -->
		<li> <a href="__APP__/Xiangce" class="nav-top-item"> 公司相册 </a></li>
		<li> <a href="__APP__/Move" class="nav-top-item"> 视频管理 </a></li>
		<li> <a href="__APP__/Pdf" class="nav-top-item"> PDF管理 </a></li>
		<li> <a href="__APP__/Kehu" class="nav-top-item"> 客户资料 </a></li>
		<li> <a href="__APP__/Lsku" class="nav-top-item"> 人才信息库管理 </a></li>
		
        <!--<li> <a href="#" class="nav-top-item"> 系统设置 </a></li> -->
		<li> <a href="#" onClick="logout();" class="nav-top-item">退出登录</a></li>
      </ul>

<!-- <script type="text/javascript" src="__PUBLIC__/js/smohan.fixednav.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
 $('#main-nav').smohanfixednav(10,999);    
});
</script> -->
      <!-- End #main-nav -->
<!-- 主页效果图 GO！ -->
      <div id="messages" style="display: none">
			<h3>请选择要上传的图片(主页效果图)</h3><br>
			<div style="padding-left:30px;">
				<form method="post" action="__URL__/Upload" enctype="multipart/form-data">
					<input type="file" name="file" style="font-size:18px;"></br>
				<button style="font-size:18px;">确定上传</button>
				</form>
			</div>
      </div>
      <!-- End #messages -->
    </div>
  </div>
  <div id="main-content">
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo (C("Index")); ?>"  target="_blank"><span>主页效果图</span></a></li>
	  <li><a class="shortcut-button" href="__URL__/delface_one"><span>查看已删图片 </span></a></li>
	  <li><a class="shortcut-button" href="#messages" rel="modal"><span>新增图片 </span></a></li>
    </ul><p>图片大小为 宽954像素：高380像素</p>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
	<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "1": switch($vo["status"]): case "1": ?><span class="spanimg align-left">
						<img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="1">
						<p><a href="__URL__/del/<?php echo ($vo["id"]); ?>">删除图片</a></p>
					</span><?php break; endswitch; break; endswitch; endforeach; endif; ?>
	 <div class="clear"></div>
    </div>
	<hr/>

 <!-- 主页最新关注 GO！ -->
	<div id="upload_two" style="display: none">
			<h3>请选择要上传的图片(主页最新关注)</h3><br>
			<div style="padding-left:30px;">
				<form method="post" action="__URL__/upload_two" enctype="multipart/form-data">
					浏览文件：<input type="file" name="file" style="font-size:18px;"></br>
					链接URL：<input type="text" name="href" size="40" style="font-size:14px;" > 例如：http://www.timehr.cn<br/>
				<button style="font-size:18px;">确定上传</button>
				</form>
			</div>
      </div>
      <!-- End #messages -->

	<ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo (C("Index")); ?>"  target="_blank"><span>主页最新关注</span></a></li>
	  <li><a class="shortcut-button" href="__URL__/delface_two"><span>查看已删图片</span></a></li>
    </ul><p>图片大小为 宽454像素：高200像素</p>
    <div class="clear"></div>
	<div class="content-box">
	<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "2": switch($vo["status"]): case "1": ?><span class="spanimg"><img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="1"><p><a href="#upload_two" rel="modal">上传新图片</a></p></span><?php break; endswitch; break; endswitch; endforeach; endif; ?>
    </div>
	<hr/>

<!-- 主页新闻动态 go！ -->
		<div id="upload_there" style="display: none">
				<h3>请选择要上传的图片(主页新闻动态)</h3><br>
				<div style="padding-left:30px;">
					<form method="post" action="__URL__/upload_there" enctype="multipart/form-data">
					浏览文件：<input type="file" name="file" style="font-size:18px;"></br>
					链接URL：<input type="text" name="href" size="40" style="font-size:14px;" > 例如：http://www.timehr.cn<br/>
					<button style="font-size:18px;">确定上传</button>
					</form>
				</div>
		  </div>
      <!-- End #messages -->
	<ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo (C("Index")); ?>"  target="_blank"><span>主页新闻动态</span></a></li>
	  <li><a class="shortcut-button" href="__URL__/delface_there"><span>查看已删图片 </span></a></li>
    </ul><p>图片大小为 宽454像素：高150像素</p>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
	<div class="content-box">
	 <?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "3": switch($vo["status"]): case "1": ?><span class="spanimg"><img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="1"><p><a href="#upload_there" rel="modal">上传新图片</a></p></span><?php break; endswitch; break; endswitch; endforeach; endif; ?>
    </div>
	<hr/>

<!-- 主页公司活动 go！ -->
	<div id="upload_four" style="display: none">
				<h3>请选择要上传的图片(主页公司活动)</h3><br>
				<div style="padding-left:30px;">
					<form method="post" action="__URL__/upload_four" enctype="multipart/form-data">
					浏览文件：<input type="file" name="file" style="font-size:18px;"></br>
					链接URL：<input type="text" name="href" size="40" style="font-size:14px;" > 例如：http://www.timehr.cn<br/>
					<button style="font-size:18px;">确定上传</button>
					</form>
				</div>
		  </div>
      <!-- End #messages -->
	<ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo (C("Index")); ?>"  target="_blank"><span>主页公司活动</span></a></li>
	  <li><a class="shortcut-button" href="__URL__/delface_four"><span>查看已删图片 </span></a></li>
    </ul><p>图片大小为 宽454像素：高150像素</p>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
	<div class="content-box">
	 <?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "4": switch($vo["status"]): case "1": ?><span class="spanimg"><img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="1"><p><a href="#upload_four" rel="modal">上传新图片</a></p></span><?php break; endswitch; break; endswitch; endforeach; endif; ?>
    </div>
	<hr/>


<!-- 主页宣传图A GO! -->
	<div id="upload_five" style="display: none">
				<h3>请选择要上传的图片(主页宣传图A)</h3><br>
				<div style="padding-left:30px;">
					<form method="post" action="__URL__/upload_five" enctype="multipart/form-data">
					浏览文件：<input type="file" name="file" style="font-size:18px;"></br>
					链接URL：<input type="text" name="href" size="40" style="font-size:14px;" > 例如：http://www.timehr.cn<br/>
					<button style="font-size:18px;">确定上传</button>
					</form>
				</div>
		  </div>
      <!-- End #messages -->
	<ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo (C("Index")); ?>"  target="_blank"><span>主页宣传图A</span></a></li>
	  <li><a class="shortcut-button" href="__URL__/delface_five"><span>查看已删图片 </span></a></li>
    </ul><p>图片大小为 宽452像素：高77像素</p>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
	<div class="content-box">
	 <?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "5": switch($vo["status"]): case "1": ?><span class="spanimg"><img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="1"><p><a href="#upload_five" rel="modal">上传新图片</a></p></span><?php break; endswitch; break; endswitch; endforeach; endif; ?>
    </div>
	<hr/>

<!-- 主页宣传图B GO! -->
	<div id="upload_six" style="display: none">
				<h3>请选择要上传的图片(主页宣传图B)</h3><br>
				<div style="padding-left:30px;">
					<form method="post" action="__URL__/upload_six" enctype="multipart/form-data">
					浏览文件：<input type="file" name="file" style="font-size:18px;"></br>
					链接URL：<input type="text" name="href" size="40" style="font-size:14px;" > 例如：http://www.timehr.cn<br/>
					<button style="font-size:18px;">确定上传</button>
					</form>
				</div>
		  </div>
      <!-- End #messages -->
	<ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo (C("Index")); ?>"  target="_blank"><span>主页宣传图B</span></a></li>
	  <li><a class="shortcut-button" href="__URL__/delface_six"><span>查看已删图片 </span></a></li>
    </ul><p>图片大小为 宽452像素：高77像素</p>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
	<div class="content-box">
	 <?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "6": switch($vo["status"]): case "1": ?><span class="spanimg"><img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="1"><p><a href="#upload_six" rel="modal">上传新图片</a></p></span><?php break; endswitch; break; endswitch; endforeach; endif; ?>
    </div>
	<hr/>

<!-- 主页董事长头像 GO! -->
	<div id="upload_seven" style="display: none">
				<h3>请选择要上传的图片(主页董事长头像)</h3><br>
				<div style="padding-left:30px;">
					<form method="post" action="__URL__/upload_seven" enctype="multipart/form-data">
						<input type="file" name="file" style="font-size:18px;"></br>
					<button style="font-size:18px;">确定上传</button>
					</form>
				</div>
		  </div>
      <!-- End #messages -->
	<ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo (C("Index")); ?>"  target="_blank"><span>主页董事长头像</span></a></li>
	  <li><a class="shortcut-button" href="__URL__/delface_seven"><span>查看已删图片 </span></a></li>
    </ul><p>图片大小为 宽200像素：高200像素</p>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
	<div class="content-box">
	 <?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "7": switch($vo["status"]): case "1": ?><span class="spanimg"><img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="1"><p><a href="#upload_seven" rel="modal">上传新图片</a></p></span><?php break; endswitch; break; endswitch; endforeach; endif; ?>
    </div>
	<hr/>

    <div id="footer"> <small>
      &#169; 腾驹达猎头后台管理 2013 | <a href="#">Top</a> </small> 
	  </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
<!-- End #body-wrapper-->
</body>
</html>