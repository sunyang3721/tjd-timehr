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
    </div>
  </div>
  <!-- End #sidebar -->

<script type="text/javascript" src="__PUBLIC__/admin/scripts/jquery-ui-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/jquery-ui.css" media="all">
<script type="text/javascript">
$(function(){
	$("#date_2").datepicker({
			//navigationAsDateFormat: true,
			dateFormat: 'yy年mm月dd日'
		});
});
</script>
  <div id="main-content">
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h4><a href="<?php echo U('Ziliao/index');?>">返回资料管理</a></h4>
      </div>
      <!-- End .content-box-header -->
<div class="content-box-content" style="font-size:16px;">
		<form method="post" action="__URL__/save">
		<input type="hidden" name="id" value="<?php echo ($list["uid"]); ?>">
		<div class="tab-content default-tab" style="width:720px;margin:0 auto;">
				<span style="display:block;margin-bottom:5px;padding:5px;"><b>员工编号：<?php echo ($list["username"]); ?></b></span>
				<span style="display:block;margin-bottom:5px;padding:5px;"><b>员工姓名：<?php echo ($list["yourname"]); ?></b></span>
				<span style="display:block;margin-bottom:5px;padding:5px;"><b>所属导师组：</b><input type="text" name="tuandui" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["tuandui"]); ?>">例如：第4组</span>
				<span style="display:block;margin-bottom:5px;padding:5px"><b>擅长行业：</b><input type="text"name="hangye" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["hangye"]); ?>"></span>
				<span style="display:block;margin-bottom:5px;padding:5px;"><b>主做职位：</b><input type="text" name="markjob" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["markjob"]); ?>"></span>
				<span style="display:block;margin-bottom:5px;padding:5px"><b>座机电话：</b><input type="text"name="homeihone" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["homeihone"]); ?>"></span>
				<span style="display:block;margin-bottom:5px;padding:5px;"><b>移动电话：</b><input type="text" name="ihone" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["ihone"]); ?>"></span>
				<span style="display:block;margin-bottom:5px;padding:5px"><b>腾讯 QQ：</b><input type="text"name="qq" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["qq"]); ?>"></span>
				<span style="display:block;margin-bottom:5px;padding:5px"><b> E-Mail：  </b><input type="text"name="mail" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["mail"]); ?>"></span>
				<span style="display:block;margin-bottom:5px;padding:5px"><b>其他：</b><input type="text"name="other" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["other"]); ?>"></span>
				<span style="display:block;margin-bottom:5px;padding:5px"><b>入职日期：</b><input type="text"name="indate" style="font-family:'微软雅黑';font-size:16px;" value="<?php echo ($list["indate"]); ?>"  id="date_2" readonly />
				</span>

		</div>
			<div class="tab-content default-tab" style="width:460px;margin:0 auto;">
				<input type="submit" value="确定提交" style="font-size:18px;">
			</div>
		</form>
</div>
      </div>
    </div>
  </div>
</div>
</body>
</html>