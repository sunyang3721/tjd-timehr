<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="baidu-site-verification" content="YSJ9mJB7HA" />
<Meta name="Keywords" Content="腾驹达,猎头顾问,景素奇,万达,合作,招聘">
<Meta name="Description" Content="腾驹达猎头公司由知名人力资源专家景素奇先生于2003年创办，自成立之始，一改传统的猎头销售服务模式，走出了一条与众不同的成长发展之路。">
<Meta name="Robots" Content="All">
<title>company introduction</title>
<link rel="stylesheet" href="__PUBLIC__/css/body.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__PUBLIC__/css/header.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__PUBLIC__/css/footer.css" type="text/css" media="screen" />
<script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
<!--弹窗提示-->
<link rel="stylesheet" href="__PUBLIC__/css/reveal.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery.reveal.js"></script>
<!--弹窗提示 end-->
<body>
<div id="nav-h26" class="w960 margin">
   <script type="text/javascript">
   
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
<link rel="stylesheet" href="__PUBLIC__/css/enter/enter_ys.css" type="text/css" media="screen" />
<script type="text/javascript" src="__PUBLIC__/js/smohan.fixednav.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
 $('#mynav').smohanfixednav(-6,999);    
});
</script>
<STYLE type="text/css">
	#nav-h26 span img{position:relative;top:2px;}
	.left-nav ul li a{font-size:13px;}
</STYLE>
 <div class="w960 margin">
		<div class="title"><h4><a href="http://www.timehr.com"><b>back to home</b></a></h4></div>
</div> 
 <div class="w960 margin bg-left">
		<div class="left-nav align-left" id="mynav">
				<ul>
						<li ><a href="<?php echo U('Timehr/index');?>">TimeHR Executive Search</a></li>
						<li><a href="<?php echo U('Timehr/jobs');?>">Find Jobs</a></li>
						<li  class="btn"><a href="<?php echo U('Timehr/about');?>">Contact Us</a></li>
						<li><a href="<?php echo (C("Join_ztc.1")); ?>">&nbsp;</a></li>
						<!-- <li><a href="<?php echo (C("Join_ts.1")); ?>"><?php echo (C("Join_ts.2")); ?></a></li> -->
				</ul>
		</div>
		<div class="right-nav align-right">
				<h1>Contact Us</h1>
				<div class="con">
						<div class="warp">
								<p><b>Tel:</b>+86 10 82659228</p>
								<p><b>E-mail:</b><BR>zhaopin@timehr.com (Join us)<BR>tengjuda@timehr.com (Business cooperation)<BR>hrm@timehr.com (Career planning)</p>
								<p><b>Weibo: </b>腾驹达猎头（Sina Weibo）</p>
								<p><b>Wechat:  </b>tjd-gw</p>
						</div>
				</div>
		</div>
		<div class="clear"></div>
</div>