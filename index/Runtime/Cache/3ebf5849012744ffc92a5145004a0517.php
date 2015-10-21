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
<STYLE type="text/css">
	#nav-h26 span img{position:relative;top:2px;}
</STYLE>
<link rel="stylesheet" href="__PUBLIC__/css/enter/enter_ys.css" type="text/css" media="screen" />
<script type="text/javascript" src="__PUBLIC__/js/smohan.fixednav.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
 $('#mynav').smohanfixednav(-6,999);    
});
</script>
 <div class="w960 margin">
		<div class="title"><h4><a href="#"><b>back</b></a></h4></div>
</div> 
 <div class="w960 margin bg-left">
		<div class="left-nav align-left" id="mynav">
				<ul>
						<li><a href="<?php echo U('Timehr/index');?>">Individual Resume</a></li>
						<li  class="btn"><a href="<?php echo U('Timehr/company');?>">company introduction</a></li>
						<li><a href="<?php echo (C("Join_ztc.1")); ?>">&nbsp;</a></li>
						<!-- <li><a href="<?php echo (C("Join_ts.1")); ?>"><?php echo (C("Join_ts.2")); ?></a></li> -->
				</ul>
		</div>
		<div class="right-nav align-right">
				<h1>company introduction</h1>
				<div class="con">
						<div class="warp">
								<p><b>Strategy of Enterprise:</b> Be the most reliable executive search corporation</p>
								<p><b>Spirit of Enterprise: </b>Moderate, Persistent, Passionate, Exceed</p>
								<p><b>Code of Conduct: </b>Open, Direct, Collaborate, Effective</p>
								<p><b>Ideas of Operation:</b> Make life and career coordinate, Make individual and society concord.</p>
								<p><b>Essence of Business：</b>Cultivate the promising, Assist the serendipitous.</p>
								<p><b>The TimeHR Executive Search Co, Ltd </b>was founded by Mr. Jing Suqi, who is known as one of the best experts in human resources field, in 2003. The corporation has explored a new path which unique to other peers ever since it stepped into this industry.</p>
								<p><b>Ideas of Operation: </b>TimeHR bears the philosophy of “Make life and career coordinate, Make individual and society concord” as the core value, and targeting to be “the most reliable executive search corporation”. The organization has established a stable and sustainable relationship of cooperation with multiple leading enterprises, most of which are listed in the Top 500 of the world. TimeHR is now recognized as a mature brand in the hi-end executive search service.</p>
								<p><b>Professionalism: </b>“Moderate, Persistent, Passionate, Exceed”. All consultants and assistants in TimeHR bear these mottos as their creed and execute them through all the process of service. People in TimeHR endeavored to explore the new limits of service in efficiency, accuracy, and other dimensions. The company developed Globehero system, its own talent pool, as the platform to search candidates globally and instantly. This software also integrated various practical functions, such as interview, evaluate, and investigate. With this advanced tool, TimeHR recruit consultant teams in different fields like finance, real estate, and pharmaceutical industry. TimeHR has became the executive search corporation that cover the most industries, response in shortest time and provide the best candidate.</p>
								<p><b>Teamwork: </b>Every team is build on individuals. In TimeHR, every individual is a unit which can present incredible performance. A team which made up by individuals can concentrate advantages in resource, channel, and other related things to achieve the goal in impressive time. This aggressive and effective style of work earned TimeHR the reputation of “accuracy, quickness, and efficiency” among the partners of the company.</p>
								<p><b>Public-sprit: </b>Inspired by Mr. Jing Suqi, founder of TimeHR, the organization puts innumerous time and energy into non-profit social service. Qizheng Management Club, which attached to TimeHR, has held over 400 issues of public salon that intended to offer career plan service and event discussion to graduates and managers. Social media like weibo and wechat are also used to share thoughts and advices from the success. Universities like the Ivy League and G5 Group developed a reliable corporate relationship with TimeHR in recruit, employment, and other fields.</p>
						</div>
				</div>
		</div>
		<div class="clear"></div>
</div>