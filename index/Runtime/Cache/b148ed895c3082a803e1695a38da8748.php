<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns:wb="http://open.weibo.com/wb"><head><meta http-equiv="content-type" content="text/html; charset=UTF-8"/><meta name="baidu-site-verification" content="YSJ9mJB7HA" /><Meta name="Keywords" Content="腾驹达,猎头顾问,景素奇,万达,合作,招聘"><Meta name="Description" Content="腾驹达猎头公司由知名人力资源专家景素奇先生于2003年创办，自成立之始，一改传统的猎头销售服务模式，走出了一条与众不同的成长发展之路。"><Meta name="Robots" Content="All"><title>公司要闻</title><link rel="stylesheet" href="__PUBLIC__/css/body.css" type="text/css" media="screen" /><link rel="stylesheet" href="__PUBLIC__/css/header.css" type="text/css" media="screen" /><link rel="stylesheet" href="__PUBLIC__/css/footer.css" type="text/css" media="screen" /><script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script><!--弹窗提示--><link rel="stylesheet" href="__PUBLIC__/css/reveal.css"><script type="text/javascript" src="__PUBLIC__/js/jquery.reveal.js"></script><!--弹窗提示 end--><body><div id="nav-h26" class="w960 margin"><span>腾驹达网站群： 
				<!-- <a href="http://edu.timehr.com"  target="_blank">腾驹达商学院</a> |  --><a href="http://www.timehr.com"  target="_blank">国际人力资本网</a></span><span class="align-right header-top"><img src="__PUBLIC__/images/user-1.png" width="15" height="15" border="0" alt="" ><a href="__ROOT__/test.php/Login/index.html">员工中心</a>&nbsp;&nbsp; <!-- | <img src="__PUBLIC__/images/text.png" width="15" height="15" border="0" alt=""><a href="#"  data-reveal-id="myModal">留言反馈</a> --></span><span class="clear"></span></div><div id="myModal" class="reveal-modal"><div id="sunyang"><ul><h2>留言反馈</h2><p>待开发......</p></ul></div><a class="close-reveal-modal">&#215;</a></div><div id="nav-h82"><div class="w960 margin"><a href="<?php echo (C("Index")); ?>"><img src="__PUBLIC__/images/logo.png" width="135" height="82" border="0" alt=""></a><div class="align-right" id="nav-bottom"><ul><li><a href="<?php echo (C("Index")); ?>">首页</a></li><li><a href="__APP__/News">新闻动态</a></li><li><a href="__APP__/Enter">企业服务</a></li><li><a href="__APP__/Person">人才服务</a></li><li><a href="__APP__/Headhun">猎头在线</a></li><li><a href="__APP__/Benefit">公益活动</a></li><li><a href="__APP__/Join">加入我们</a></li><li><a href="__APP__/About">关于腾驹达</a></li></ul></div></div></div><script type="text/javascript">$(function(){
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

</script><link rel="stylesheet" href="__PUBLIC__/css/news/news.css" type="text/css" media="screen" /><script type="text/javascript" src="__PUBLIC__/js/smohan.fixednav.js"></script><script type="text/javascript">$(document).ready(function(e) {
 $('#mynav').smohanfixednav(-6,999);  
 $('.overtext').each(function(){
			var maxwidth=30;
			 if($(this).text().length>maxwidth){   
				$(this).text($(this).text().substring(0,maxwidth));    
				$(this).html($(this).html()+'......');    
				}    
		});
});
</script><div class="w960 margin"><div class="title"><span class="size28">新闻动态</span><span class="lianjie">首页 > 新闻动态 > 公司要闻</span></div></div><div class="w960 margin bg-left"><div class="left-nav align-left" id="mynav"><ul><li class="btn"><a href="<?php echo (C("News")); ?>">公司要闻</a></li><li><a href="<?php echo (C("News_dt")); ?>">最新动态</a></li><li><a href="<?php echo (C("News_hd")); ?>">专题活动</a></li><li><a href="<?php echo (C("News_bd")); ?>">有关媒体与机构报道</a></li></ul></div><div class="right-nav align-right"><h1>公司要闻</h1><div class="con"><div class="warp"><ul><?php if(is_array($list)): foreach($list as $key=>$vo): ?><a href="__APP__/News/index_show/<?php echo ($vo["id"]); ?>"  target="_blank"><li><span class="overtext"><?php echo ($vo["title"]); ?></span><span class="align-right"><?php echo (date("Y-m-d",$vo["last_time"])); ?></span></li></a><?php endforeach; endif; ?></ul><hr/><div class="center"><?php echo ($page); ?></div></div></div></div><div class="clear"></div></div><div id="footer"><div>人才招聘 Email:liangyanqin@timehr.com 个人求职 Email:hrm@timehr.com 或垂询:010-82659228/29<br/>		京ICP备13013083号 京公网安备11010802015690号 猎头资质号：RC0501191 <br/>		©2013 国际人力资本网版权所有
		</div></div></body></html>