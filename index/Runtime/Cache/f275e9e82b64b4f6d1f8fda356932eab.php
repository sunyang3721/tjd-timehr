<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns:wb="http://open.weibo.com/wb"><head><meta http-equiv="content-type" content="text/html; charset=UTF-8"/><meta name="baidu-site-verification" content="YSJ9mJB7HA" /><Meta name="Keywords" Content="腾驹达,猎头顾问,景素奇,万达,合作,招聘"><Meta name="Description" Content="腾驹达猎头公司由知名人力资源专家景素奇先生于2003年创办，自成立之始，一改传统的猎头销售服务模式，走出了一条与众不同的成长发展之路。"><Meta name="Robots" Content="All"><title><?php echo (C("Person.2")); ?></title><link rel="stylesheet" href="__PUBLIC__/css/body.css" type="text/css" media="screen" /><link rel="stylesheet" href="__PUBLIC__/css/header.css" type="text/css" media="screen" /><link rel="stylesheet" href="__PUBLIC__/css/footer.css" type="text/css" media="screen" /><script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script><!--弹窗提示--><link rel="stylesheet" href="__PUBLIC__/css/reveal.css"><script type="text/javascript" src="__PUBLIC__/js/jquery.reveal.js"></script><!--弹窗提示 end--><body><div id="nav-h26" class="w960 margin"><span>腾驹达网站群： 
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

</script><link rel="stylesheet" href="__PUBLIC__/css/person/person.css" type="text/css" media="screen" /><script type="text/javascript" src="__PUBLIC__/js/smohan.fixednav.js"></script><script type="text/javascript">$(document).ready(function(e) {
 $('#mynav').smohanfixednav(-6,999);    
});
</script><script type="text/javascript">	$(document).ready(function(){
			$('#address').val(<?php echo ($address); ?>);
			$('#industry').val(<?php echo ($industry); ?>);
			$('#in').val(<?php echo ($in); ?>);
			$('#two').click(function(){
				$('form').submit();
			});
	});
</script><div class="w960 margin"><div class="title"><span class="size28">人才服务</span><span class="lianjie">首页 > 人才服务 ><?php echo (C("Person.2")); ?></span></div></div><div class="w960 margin bg-left"><div class="left-nav align-left" id="mynav"><ul><li class="btn"><a href="<?php echo (C("Person.1")); ?>"><?php echo (C("Person.2")); ?></a></li><li><a href="<?php echo (C("person_zx.1")); ?>"><?php echo (C("person_zx.2")); ?></a></li><li><a href="<?php echo (C("Person_lt.1")); ?>"><?php echo (C("Person_lt.2")); ?></a></li><li><a href="<?php echo (C("Person_rc.1")); ?>"><?php echo (C("Person_rc.2")); ?></a></li><li><a href="<?php echo (C("person_fw.1")); ?>"><?php echo (C("person_fw.2")); ?></a></li><li><a href="<?php echo (C("person_jl.1")); ?>"><?php echo (C("person_jl.2")); ?></a></li><li><a href="<?php echo (C("Person_gh.1")); ?>"><?php echo (C("Person_gh.2")); ?></a></li><li><a href="<?php echo (C("Person_ztc.1")); ?>"><?php echo (C("Person_ztc.2")); ?></a></li></ul></div><div class="right-nav align-right"><h1><?php echo (C("Person.2")); ?><span style="float:right;font-size:14px;color:#808080;"><a href="http://www.timehr.com/position-index"  target="_blank">更多转到人力资本网</a></span><div class="clear"></div></h1><div class="con"><div class="warp"><form method="post" action="__URL__"><div id="soso"><span class="align-left"><h1 style="display:block;width:80px;float:left;">行业分类：</h1><select name="industry" id="industry" style="border:1px solid #ccc;color:#005BAC;font-size:18px;width:340px;float:left;"><option value="0" selected>不限
									<option value="1">金融业
									<option value="2">房地产
									<option value="3">商业连锁
									<option value="4">IT/互联网/电子商务
									<option value="5">制药/医疗
									<option value="6">文化产业
									<option value="7">广告/媒体
									<option value="8">加工制造/仪表设备
									<option value="9">交通/物流/运输
									<option value="10">教育/培训
									<option value="11">旅游/酒店/餐饮/休闲
									<option value="12">能源/采掘/化工/环保
									<option value="13">政府/农林牧渔/其他
									<option value="14">消费品/贸易/批发/零售
						</select><div class="clear"></div><h1 style="display:block;width:80px;float:left;">工作地点：</h1><select name="address" id="address" style="border:1px solid #ccc;color:#005BAC;font-size:18px;width:120px;float:left;"><option value="0" selected>不限
									<option value="1">北京
									<option value="2">上海
									<option value="3">天津
									<option value="4">深圳
									<option value="5">重庆
									<option value="6">广州
									<option value="7">广东省
									<option value="8">江苏省
									<option value="9">浙江省
									<option value="10">安徽省
									<option value="11">福建省
									<option value="12">甘肃省
									<option value="14">贵州省
									<option value="15">海南省
									<option value="16">河北省
									<option value="17">河南省
									<option value="18">黑龙江省
									<option value="19">湖北省
									<option value="20">湖南省
									<option value="21">吉林省
									<option value="22">江西省
									<option value="23">辽宁省
									<option value="24">青海省
									<option value="25">山东省
									<option value="26">陕西省
									<option value="27">山西省
									<option value="28">四川省
									<option value="29">云南省
									<option value="30">广西自治区
									<option value="31">内蒙古自治区
									<option value="32">宁夏自治区
									<option value="33">西藏自治区
									<option value="34">新疆自治区
						</select><h1 style="display:block;width:100px;float:left;">&nbsp;&nbsp;&nbsp;发布时间：</h1><select name="in" id="in" style="border:1px solid #ccc;color:#005BAC;font-size:18px;width:120px;float:left;"><option value="1">不限
							<option value="2">一天内
							<option value="3">三天内
							<option value="4">一周内
							<option value="5" selected>一月内
						</select><div class="clear"></div><h1 style="display:block;width:80px;float:left;">职位名称：</h1><input type="text" name="title" value="<?php echo ($soso); ?>" style="border:1px solid #ccc;color:#005BAC;font-size:18px;width:338px;float:left;"><div class="clear"></div><div id="two" class="center"><span>搜索职位</span></div></span><span class="align-right"><img src="__PUBLIC__/images/job.jpg" width="220" height="120" border="0"></span><div class="clear"></div></div></form><?php if(is_array($list)): foreach($list as $key=>$vo): ?><a href="__URL__/job_show/<?php echo ($vo["id"]); ?>"  target="_blank"><div class="job"><h2><?php echo ($vo["jobname"]); ?></h2><ul><li>所属行业：
								<?php switch($vo['industry']): case "1": ?>金融业<?php break; case "2": ?>房地产<?php break; case "3": ?>商业连锁<?php break; case "4": ?>IT/互联网/电子商务<?php break; case "5": ?>制药/医疗<?php break; case "6": ?>文化产业<?php break; case "7": ?>广告/媒体<?php break; case "8": ?>加工制造/仪表设备<?php break; case "9": ?>交通/物流/运输<?php break; case "10": ?>教育/培训<?php break; case "11": ?>旅游/酒店/餐饮/休闲<?php break; case "12": ?>能源/采掘/化工/环保<?php break; case "13": ?>政府/农林牧渔/其他<?php break; case "14": ?>消费品/贸易/批发/零售<?php break; default: ?>其他行业<?php endswitch;?></li><li>地点：
								<?php switch($vo['address']): case "1": ?>北京<?php break; case "2": ?>上海<?php break; case "3": ?>天津<?php break; case "4": ?>深圳<?php break; case "5": ?>重庆<?php break; case "6": ?>广州<?php break; case "7": ?>广东省<?php break; case "8": ?>江苏省<?php break; case "9": ?>浙江省<?php break; case "10": ?>安徽省<?php break; case "11": ?>福建省<?php break; case "12": ?>甘肃省<?php break; case "14": ?>贵州省<?php break; case "15": ?>海南省<?php break; case "16": ?>河北省<?php break; case "17": ?>河南省<?php break; case "18": ?>黑龙江省<?php break; case "19": ?>湖北省<?php break; case "20": ?>湖南省<?php break; case "21": ?>吉林省<?php break; case "22": ?>江西省<?php break; case "23": ?>辽宁省<?php break; case "24": ?>青海省<?php break; case "25": ?>山东省<?php break; case "26": ?>陕西省<?php break; case "27": ?>山西省<?php break; case "28": ?>四川省<?php break; case "29": ?>云南省<?php break; case "30": ?>广西自治区<?php break; case "31": ?>内蒙古自治区<?php break; case "32": ?>宁夏自治区<?php break; case "33": ?>西藏自治区<?php break; case "34": ?>新疆自治区<?php break; default: ?>其他<?php endswitch;?></li><li>更新日期：<?php echo (date('Y-m-d',$vo["time"])); ?></li><li>年薪：<?php echo ($vo["moeny"]); ?>万</li></ul><div class="clear"></div></div></a><?php endforeach; endif; ?><br><div class="center"><?php echo ($page); echo ($empty); ?></div></div></div></div><div class="clear"></div></div><div id="footer"><div>人才招聘 Email:liangyanqin@timehr.com 个人求职 Email:hrm@timehr.com 或垂询:010-82659228/29<br/>		京ICP备13013083号 京公网安备11010802015690号 猎头资质号：RC0501191 <br/>		©2013 国际人力资本网版权所有
		</div></div></body></html>