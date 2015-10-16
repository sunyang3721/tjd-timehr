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
  <div id="main-content" style="padding-top:30px;">
    <ul class="shortcut-buttons-set">
	<h4>企业服务</h4>
	<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["id"]): case "2": ?><li><a class="shortcut-button" href="__APP__/Update/edit/2"><span>品味猎头</span></a></li><?php break;?>
    <?php case "3": ?><li><a class="shortcut-button" href="__APP__/Update/edit/3"><span>擅长职位类别与级别</span></a></li><?php break;?>
	<?php case "4": ?><li><a class="shortcut-button" href="__APP__/Update/edit/4"><span>人才库数据</span></a></li><?php break;?>
    <?php case "5": ?><li><a class="shortcut-button" href="__APP__/Update/edit/5"><span>服务模式</span></a></li><?php break;?>
	<?php case "6": ?><li><a class="shortcut-button" href="__APP__/Update/edit/6"><span>直通车</span></a></li><?php break;?>
    <?php case "7": ?><li><a class="shortcut-button" href="__APP__/Update/edit/7"><span>投诉与建议</span></a></li><?php break; endswitch; endforeach; endif; ?>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
	<hr/>
	 <ul class="shortcut-buttons-set">
		<h4>人才服务</h4>
	<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["id"]): case "8": ?><li><a class="shortcut-button" href="__APP__/Update/edit/8"><span>品味猎头</span></a></li><?php break;?>
    <?php case "9": ?><li><a class="shortcut-button" href="__APP__/Update/edit/9"><span>人才为什么选择猎头</span></a></li><?php break;?>
	<?php case "10": ?><li><a class="shortcut-button" href="__APP__/Update/edit/10"><span>专业服务</span></a></li><?php break;?>
    <?php case "11": ?><!-- <li><a class="shortcut-button" href="__APP__/Update/edit/11"><span>更换猎头顾问服务</span></a></li> --><?php break;?>
	<?php case "12": ?><li><a class="shortcut-button" href="__APP__/Update/edit/12"><span>直通车</span></a></li><?php break; endswitch; endforeach; endif; ?>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
	<hr/>
	 <ul class="shortcut-buttons-set">
		<h4>公益活动</h4>
	<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["id"]): case "13": ?><li><a class="shortcut-button" href="__APP__/Update/edit/13"><span>奖学金</span></a></li><?php break;?>
    <?php case "14": ?><li><a class="shortcut-button" href="__APP__/Update/edit/14"><span>赞助校友会</span></a></li><?php break;?>
	<?php case "15": ?><li><a class="shortcut-button" href="__APP__/Update/edit/15"><span>捐助汶川地震</span></a></li><?php break;?>
    <?php case "16": ?><li><a class="shortcut-button" href="__APP__/Update/edit/16"><span>公益植树</span></a></li><?php break;?>
	<?php case "17": ?><li><a class="shortcut-button" href="__APP__/Update/edit/17"><span>义务大学生职业辅导</span></a></li><?php break; endswitch; endforeach; endif; ?>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
	<hr/>
	<ul class="shortcut-buttons-set">
		<h4>加入我们</h4>
	<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["id"]): case "18": ?><li><a class="shortcut-button" href="__APP__/Update/edit/18"><span>猎头顾问招聘</span></a></li><?php break;?>
    <?php case "19": ?><li><a class="shortcut-button" href="__APP__/Update/edit/19"><span>猎头助理招聘</span></a></li><?php break;?>
	<?php case "20": ?><li><a class="shortcut-button" href="__APP__/Update/edit/20"><span>直通车</span></a></li><?php break;?>
    <?php case "21": ?><!-- <li><a class="shortcut-button" href="__APP__/Update/edit/21"><span>投诉与建议</span></a></li> --><?php break; endswitch; endforeach; endif; ?>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
	<hr/>
	<ul class="shortcut-buttons-set">
		<h4>关于腾驹达</h4>
	<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["id"]): case "22": ?><li><a class="shortcut-button" href="__APP__/Update/edit/22"><span>公司简介</span></a></li><?php break;?>
    <?php case "23": ?><li><a class="shortcut-button" href="__APP__/Update/edit/23"><span>公司发展历程</span></a></li><?php break;?>
	<?php case "24": ?><!-- <li><a class="shortcut-button" href="__APP__/Update/edit/24"><span>组织架构</span></a></li> --><?php break;?>
    <?php case "25": ?><li><a class="shortcut-button" href="__APP__/Update/edit/25"><span>企业文化</span></a></li><?php break;?>
	<?php case "26": ?><li><a class="shortcut-button" href="__APP__/Update/edit/26"><span>公司荣誉</span></a></li><?php break;?>
    <?php case "27": ?><li><a class="shortcut-button" href="__APP__/Update/edit/27"><span>公司资质</span></a></li><?php break;?>
    <?php case "29": ?><li><a class="shortcut-button" href="__APP__/Update/edit/29"><span>联系我们</span></a></li><?php break; endswitch; endforeach; endif; ?>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
	<hr/>
    <!-- End .clear -->
    <!-- <div class="content-box"></div> -->

  </div>
  <!-- End #main-content -->
</div>
<!-- End #body-wrapper-->
</body>
</html>