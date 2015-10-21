<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="baidu-site-verification" content="YSJ9mJB7HA" />
<Meta name="Keywords" Content="腾驹达,猎头顾问,景素奇,万达,合作,招聘">
<Meta name="Description" Content="腾驹达猎头公司由知名人力资源专家景素奇先生于2003年创办，自成立之始，一改传统的猎头销售服务模式，走出了一条与众不同的成长发展之路。">
<Meta name="Robots" Content="All">
<title>腾驹达猎头首页</title>
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
		<span>腾驹达网站群： 
				<!-- <a href="http://edu.timehr.com"  target="_blank">腾驹达商学院</a> |  --><a href="http://www.timehr.com"  target="_blank">国际人力资本网</a>
		</span>
		 <span class="align-right header-top"><img src="__PUBLIC__/images/user-1.png" width="15" height="15" border="0" alt="" ><a href="__ROOT__/test.php/Login/index.html">员工中心</a>&nbsp;&nbsp; <!-- | <img src="__PUBLIC__/images/text.png" width="15" height="15" border="0" alt=""><a href="#"  data-reveal-id="myModal">留言反馈</a> --></span><span class="clear"></span>
</div>
<div id="myModal" class="reveal-modal">
			<div id="sunyang">
				<ul>
					<h2>留言反馈</h2>
					<p>待开发......</p>
				</ul>
			</div>
			<a class="close-reveal-modal">&#215;</a>
</div>
<div id="nav-h82">
		<div class="w960 margin">
				<a href="<?php echo (C("Index")); ?>"><img src="__PUBLIC__/images/logo.png" width="135" height="82" border="0" alt=""></a>
				<div class="align-right" id="nav-bottom">
						<ul>
								<li><a href="<?php echo (C("Index")); ?>">首页</a></li>
								<li><a href="__APP__/News">新闻动态</a></li>
								<li><a href="__APP__/Enter">企业服务</a></li>
								<li><a href="__APP__/Person">人才服务</a></li>
								<li><a href="__APP__/Headhun">猎头在线</a></li>
								<li><a href="__APP__/Benefit">公益活动</a></li>
								<li><a href="__APP__/Join">加入我们</a></li>
								<li><a href="__APP__/About">关于腾驹达</a></li>
						</ul>
				</div>
		</div>
</div>
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
<!-- 首页效果图 -->
<script src="__PUBLIC__/js/jquery.seven.min.js"></script>
<script src="__PUBLIC__/js/jquery.easing.min.js"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<link href="__PUBLIC__/css/sevenslider.css" rel="stylesheet" />
<link href="__PUBLIC__/css/skins/clean.css" rel="stylesheet" />
<!-- 首页效果图 end -->
<!--首页右边 tab选项卡-->
<script src="__PUBLIC__/js/tab.js"></script>
<!---首页右边 tab选项卡end-->
<link rel="stylesheet" href="__PUBLIC__/css/index.css" type="text/css" media="screen" />
<script type="text/javascript" language="javascript">
//首页效果图js
	$(document).ready(function(){
		var tb=$(".seven_container").sevenslider({
			width:954,
			height:380,
			fullwidth:false,animation:3,automation:true,autointerval:4,progress:false,progresstype:"linear",bullet:true,carousel:false,circular:true,responsive:true,swipe:true,keyboard:false,skin:"clean",lightbox:true});
			
			$('.overtext').each(function(){
				var maxwidth=18;
				 if($(this).text().length>maxwidth){   
					$(this).text($(this).text().substring(0,maxwidth));    
					$(this).html($(this).html()+'...');    
					}    
			});
			
	});
</script>   
<!-- 首页效果图 -->
<div class="seven_container">
            <div id="seven_viewport">
                <div class="seven_slider">
					<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "1": switch($vo["status"]): case "1": ?><div class="seven_slide"><a class="seven_slide_title"></a><img src="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" /></div><?php break; endswitch; break; endswitch; endforeach; endif; ?>
                    
                </div>
            </div>
            <a id="left_btn" class="seven_nav">上一图</a>
            <a id="right_btn" class="seven_nav right_btn">下一图</a>
</div>
<!-- 首页效果图 end -->
 <div class="w960 margin m-top" id="left">
		<div class="w465 align-left">
				<div class="w462 align-left">
						<h2><span>最新关注</span></h2>
						<div class="left-gg">
						<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "2": switch($vo["status"]): case "1": ?><a href="<?php if(empty($vo["href"])): ?>#<?php else: echo ($vo["href"]); endif; ?>"  target="_blank">
						<img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="0" alt="加载中...">
										</a><?php break; endswitch; break; endswitch; endforeach; endif; ?>
						
						</div>
				</div>
				<div class="w462 align-left">
						<h2><span>新闻动态</span><a href="__APP__/News" class="align-right"  target="_blank">更多</a></h2>
						<div class="left-gg">
						<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "3": switch($vo["status"]): case "1": ?><a href="<?php if(empty($vo["href"])): ?>#<?php else: echo ($vo["href"]); endif; ?>"  target="_blank">
						<img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="0" alt="加载中...">				</a><?php break; endswitch; break; endswitch; endforeach; endif; ?>
						</div>
				</div>
				<div class="w462 align-left">
						<ul class="ul">
						<?php if(is_array($new)): foreach($new as $key=>$vo): ?><li><?php switch($vo["classif"]): case "1": ?><a href="__APP__/News" style="color:#808080;"  target="_blank">【公司要闻】</a><?php break;?>
							<?php case "2": ?><a href="__APP__/News/news_dt" style="color:#808080;"  target="_blank">【最新动态】</a><?php break; endswitch;?>
							<a href="__APP__/News/index_show/<?php echo ($vo["id"]); ?>"  target="_blank" class="overtext"><?php echo ($vo["title"]); ?></a><span><?php echo (date('Y-m-d',$vo["last_time"])); ?></span></li><?php endforeach; endif; ?>
						</ul>
				</div>
				<div class="w462 align-left">
						<h2><span>专题活动</span><a href="__APP__/News/news_hd" class="align-right"  target="_blank">更多</a></h2>
						<div class="left-gg">
						<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "4": switch($vo["status"]): case "1": ?><a href="<?php if(empty($vo["href"])): ?>#<?php else: echo ($vo["href"]); endif; ?>"  target="_blank">
						<img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="0" alt="加载中...">				</a><?php break; endswitch; break; endswitch; endforeach; endif; ?>
						</div>
				</div>
				<div class="w462 align-left">
						<ul class="ul">
							<?php if(is_array($newthere)): foreach($newthere as $key=>$vo): ?><li>
							<a href="__APP__/News/index_show/<?php echo ($vo["id"]); ?>"  target="_blank" class="overtext"><?php echo ($vo["title"]); ?></a><span><?php echo (date('Y-m-d',$vo["last_time"])); ?></span></li><?php endforeach; endif; ?>
						</ul>
				</div>
				<div class="clear"></div>
	</div>
	<div id="right" class="w462 align-right">
				<h2><span>最新行业发布</span><a href="__APP__/Person/" class="align-right"  target="_blank">更多</a></h2>
				<div id="tab">
						<ul class="tabbtn">
								<li class="current" id="tab1" style="width:150px;">500万以上</li>
								<li id="tab2"  style="width:150px;">200万~500万</li>
								<li id="tab3"  style="width:150px;">100万~200万</li>
								<!-- <li id="tab4">30~50万</li>
								<li id="tab5">30万以下</li> -->
						</ul>
						<!--tab1-->
						<div class="tablist tab1" >
								<ul>
										<li class="one">
												<ul class="tablist-left">
														<li class="w150">最新职位</li><li class="w60">年薪</li><li class="w60">地点</li><li class="w110">发布日期</li>
												</ul>
										</li>
										<?php if(is_array($job)): foreach($job as $key=>$vo): ?><li class="two">
												<ul class="tablist-left">
														<li class="w150"><a href="__APP__/Person/job_show/<?php echo ($vo["id"]); ?>"  target="_blank"><?php echo ($vo["jobname"]); ?></a></li><li class="w60"><?php echo ($vo["moeny"]); ?>万</li><li class="w60">
														<?php switch($vo['address']): case "1": ?>北京<?php break;?>
																<?php case "2": ?>上海<?php break;?>
																<?php case "3": ?>天津<?php break;?>
																<?php case "4": ?>深圳<?php break;?>
																<?php case "5": ?>重庆<?php break;?>
																<?php case "6": ?>广州<?php break;?>
																<?php case "7": ?>广东省<?php break;?>
																<?php case "8": ?>江苏省<?php break;?>
																<?php case "9": ?>浙江省<?php break;?>
																<?php case "10": ?>安徽省<?php break;?>
																<?php case "11": ?>福建省<?php break;?>
																<?php case "12": ?>甘肃省<?php break;?>
																<?php case "14": ?>贵州省<?php break;?>
																<?php case "15": ?>海南省<?php break;?>
																<?php case "16": ?>河北省<?php break;?>
																<?php case "17": ?>河南省<?php break;?>
																<?php case "18": ?>黑龙江省<?php break;?>
																<?php case "19": ?>湖北省<?php break;?>
																<?php case "20": ?>湖南省<?php break;?>
																<?php case "21": ?>吉林省<?php break;?>
																<?php case "22": ?>江西省<?php break;?>
																<?php case "23": ?>辽宁省<?php break;?>
																<?php case "24": ?>青海省<?php break;?>
																<?php case "25": ?>山东省<?php break;?>
																<?php case "26": ?>陕西省<?php break;?>
																<?php case "27": ?>山西省<?php break;?>
																<?php case "28": ?>四川省<?php break;?>
																<?php case "29": ?>云南省<?php break;?>
																<?php case "30": ?>广西自治区<?php break;?>
																<?php case "31": ?>内蒙古自治区<?php break;?>
																<?php case "32": ?>宁夏自治区<?php break;?>
																<?php case "33": ?>西藏自治区<?php break;?>
																<?php case "34": ?>新疆自治区<?php break;?>
															<?php default: ?>其他<?php endswitch;?>
														</li><li class="w110"><?php echo (date("Y-m-d",$vo["time"])); ?></li>
												</ul>
										</li><?php endforeach; endif; ?>
											
										<li class="two">
												<ul class="tablist-left">
														<span><a href="#">查看更多转到国际资本网</a></span>
												</ul>
										</li>
								</ul>
						</div>
						<!--tab2-->
						<div class="tablist none tab2" >
								<ul>
										<li class="one">
												<ul class="tablist-left">
														<li class="w150">最新职位</li><li class="w60">年薪</li><li class="w60">地点</li><li class="w110">发布日期</li>
												</ul>
										</li>
										<?php if(is_array($jobone)): foreach($jobone as $key=>$vo): ?><li class="two">
												<ul class="tablist-left">
														<li class="w150"><a href="__APP__/Person/job_show/<?php echo ($vo["id"]); ?>"  target="_blank"><?php echo ($vo["jobname"]); ?></a></li><li class="w60"><?php echo ($vo["moeny"]); ?>万</li><li class="w60">
														<?php switch($vo['address']): case "1": ?>北京<?php break;?>
																<?php case "2": ?>上海<?php break;?>
																<?php case "3": ?>天津<?php break;?>
																<?php case "4": ?>深圳<?php break;?>
																<?php case "5": ?>重庆<?php break;?>
																<?php case "6": ?>广州<?php break;?>
																<?php case "7": ?>广东省<?php break;?>
																<?php case "8": ?>江苏省<?php break;?>
																<?php case "9": ?>浙江省<?php break;?>
																<?php case "10": ?>安徽省<?php break;?>
																<?php case "11": ?>福建省<?php break;?>
																<?php case "12": ?>甘肃省<?php break;?>
																<?php case "14": ?>贵州省<?php break;?>
																<?php case "15": ?>海南省<?php break;?>
																<?php case "16": ?>河北省<?php break;?>
																<?php case "17": ?>河南省<?php break;?>
																<?php case "18": ?>黑龙江省<?php break;?>
																<?php case "19": ?>湖北省<?php break;?>
																<?php case "20": ?>湖南省<?php break;?>
																<?php case "21": ?>吉林省<?php break;?>
																<?php case "22": ?>江西省<?php break;?>
																<?php case "23": ?>辽宁省<?php break;?>
																<?php case "24": ?>青海省<?php break;?>
																<?php case "25": ?>山东省<?php break;?>
																<?php case "26": ?>陕西省<?php break;?>
																<?php case "27": ?>山西省<?php break;?>
																<?php case "28": ?>四川省<?php break;?>
																<?php case "29": ?>云南省<?php break;?>
																<?php case "30": ?>广西自治区<?php break;?>
																<?php case "31": ?>内蒙古自治区<?php break;?>
																<?php case "32": ?>宁夏自治区<?php break;?>
																<?php case "33": ?>西藏自治区<?php break;?>
																<?php case "34": ?>新疆自治区<?php break;?>
															<?php default: ?>其他<?php endswitch;?>
														</li><li class="w110"><?php echo (date("Y-m-d",$vo["time"])); ?></li>
												</ul>
										</li><?php endforeach; endif; ?>
										<li class="two">
												<ul class="tablist-left">
														<span><a href="#">查看更多转到国际资本网</a></span>
												</ul>
										</li>
								</ul>
						</div>
						<!--tab3-->
						<div class="tablist none tab3" >
								<ul>
										<li class="one">
												<ul class="tablist-left">
														<li class="w150">最新职位</li><li class="w60">年薪</li><li class="w60">地点</li><li class="w110">发布日期</li>
												</ul>
										</li>
										<?php if(is_array($jobtwo)): foreach($jobtwo as $key=>$vo): ?><li class="two">
												<ul class="tablist-left">
														<li class="w150"><a href="__APP__/Person/job_show/<?php echo ($vo["id"]); ?>"  target="_blank"><?php echo ($vo["jobname"]); ?></a></li><li class="w60"><?php echo ($vo["moeny"]); ?>万</li><li class="w60">
														<?php switch($vo['address']): case "1": ?>北京<?php break;?>
																<?php case "2": ?>上海<?php break;?>
																<?php case "3": ?>天津<?php break;?>
																<?php case "4": ?>深圳<?php break;?>
																<?php case "5": ?>重庆<?php break;?>
																<?php case "6": ?>广州<?php break;?>
																<?php case "7": ?>广东省<?php break;?>
																<?php case "8": ?>江苏省<?php break;?>
																<?php case "9": ?>浙江省<?php break;?>
																<?php case "10": ?>安徽省<?php break;?>
																<?php case "11": ?>福建省<?php break;?>
																<?php case "12": ?>甘肃省<?php break;?>
																<?php case "14": ?>贵州省<?php break;?>
																<?php case "15": ?>海南省<?php break;?>
																<?php case "16": ?>河北省<?php break;?>
																<?php case "17": ?>河南省<?php break;?>
																<?php case "18": ?>黑龙江省<?php break;?>
																<?php case "19": ?>湖北省<?php break;?>
																<?php case "20": ?>湖南省<?php break;?>
																<?php case "21": ?>吉林省<?php break;?>
																<?php case "22": ?>江西省<?php break;?>
																<?php case "23": ?>辽宁省<?php break;?>
																<?php case "24": ?>青海省<?php break;?>
																<?php case "25": ?>山东省<?php break;?>
																<?php case "26": ?>陕西省<?php break;?>
																<?php case "27": ?>山西省<?php break;?>
																<?php case "28": ?>四川省<?php break;?>
																<?php case "29": ?>云南省<?php break;?>
																<?php case "30": ?>广西自治区<?php break;?>
																<?php case "31": ?>内蒙古自治区<?php break;?>
																<?php case "32": ?>宁夏自治区<?php break;?>
																<?php case "33": ?>西藏自治区<?php break;?>
																<?php case "34": ?>新疆自治区<?php break;?>
															<?php default: ?>其他<?php endswitch;?>
														</li><li class="w110"><?php echo (date("Y-m-d",$vo["time"])); ?></li>
												</ul>
										</li><?php endforeach; endif; ?>
										<li class="two">
												<ul class="tablist-left">
														<span><a href="#">查看更多转到国际资本网</a></span>
												</ul>
										</li>
								</ul>
						</div>
						<!--tab4-->
						<div class="tablist none tab4" >
								<ul>
										<li class="one">
												<ul class="tablist-left">
														<li class="w150">最新职位</li><li class="w60">年薪</li><li class="w60">地点</li><li class="w110">发布日期</li>
												</ul>
										</li>
										<?php if(is_array($jobthere)): foreach($jobthere as $key=>$vo): ?><li class="two">
												<ul class="tablist-left">
														<li class="w150"><a href="#"><?php echo ($vo["jobname"]); ?></a></li><li class="w60"><?php echo ($vo["moeny"]); ?>万</li><li class="w60">
														<?php switch($vo['address']): case "1": ?>北京<?php break;?>
																<?php case "2": ?>上海<?php break;?>
																<?php case "3": ?>天津<?php break;?>
																<?php case "4": ?>深圳<?php break;?>
																<?php case "5": ?>重庆<?php break;?>
																<?php case "6": ?>广州<?php break;?>
																<?php case "7": ?>广东省<?php break;?>
																<?php case "8": ?>江苏省<?php break;?>
																<?php case "9": ?>浙江省<?php break;?>
																<?php case "10": ?>安徽省<?php break;?>
																<?php case "11": ?>福建省<?php break;?>
																<?php case "12": ?>甘肃省<?php break;?>
																<?php case "14": ?>贵州省<?php break;?>
																<?php case "15": ?>海南省<?php break;?>
																<?php case "16": ?>河北省<?php break;?>
																<?php case "17": ?>河南省<?php break;?>
																<?php case "18": ?>黑龙江省<?php break;?>
																<?php case "19": ?>湖北省<?php break;?>
																<?php case "20": ?>湖南省<?php break;?>
																<?php case "21": ?>吉林省<?php break;?>
																<?php case "22": ?>江西省<?php break;?>
																<?php case "23": ?>辽宁省<?php break;?>
																<?php case "24": ?>青海省<?php break;?>
																<?php case "25": ?>山东省<?php break;?>
																<?php case "26": ?>陕西省<?php break;?>
																<?php case "27": ?>山西省<?php break;?>
																<?php case "28": ?>四川省<?php break;?>
																<?php case "29": ?>云南省<?php break;?>
																<?php case "30": ?>广西自治区<?php break;?>
																<?php case "31": ?>内蒙古自治区<?php break;?>
																<?php case "32": ?>宁夏自治区<?php break;?>
																<?php case "33": ?>西藏自治区<?php break;?>
																<?php case "34": ?>新疆自治区<?php break;?>
															<?php default: ?>其他<?php endswitch;?>
														</li><li class="w110"><?php echo (date("Y-m-d",$vo["time"])); ?></li>
												</ul>
										</li><?php endforeach; endif; ?>
										<li class="two">
												<ul class="tablist-left">
														<span><a href="#">查看更多转到国际资本网</a></span>
												</ul>
										</li>
								</ul>
						</div>
						<!--tab5-->
						<div class="tablist none tab5" >
								<ul>
										<li class="one">
												<ul class="tablist-left">
														<li class="w150">最新职位</li><li class="w60">年薪</li><li class="w60">地点</li><li class="w110">发布日期</li>
												</ul>
										</li>
										<?php if(is_array($jobfour)): foreach($jobfour as $key=>$vo): ?><li class="two">
												<ul class="tablist-left">
														<li class="w150"><a href="#"><?php echo ($vo["jobname"]); ?></a></li><li class="w60"><?php echo ($vo["moeny"]); ?>万</li><li class="w60">
														<?php switch($vo['address']): case "1": ?>北京<?php break;?>
																<?php case "2": ?>上海<?php break;?>
																<?php case "3": ?>天津<?php break;?>
																<?php case "4": ?>深圳<?php break;?>
																<?php case "5": ?>重庆<?php break;?>
																<?php case "6": ?>广州<?php break;?>
																<?php case "7": ?>广东省<?php break;?>
																<?php case "8": ?>江苏省<?php break;?>
																<?php case "9": ?>浙江省<?php break;?>
																<?php case "10": ?>安徽省<?php break;?>
																<?php case "11": ?>福建省<?php break;?>
																<?php case "12": ?>甘肃省<?php break;?>
																<?php case "14": ?>贵州省<?php break;?>
																<?php case "15": ?>海南省<?php break;?>
																<?php case "16": ?>河北省<?php break;?>
																<?php case "17": ?>河南省<?php break;?>
																<?php case "18": ?>黑龙江省<?php break;?>
																<?php case "19": ?>湖北省<?php break;?>
																<?php case "20": ?>湖南省<?php break;?>
																<?php case "21": ?>吉林省<?php break;?>
																<?php case "22": ?>江西省<?php break;?>
																<?php case "23": ?>辽宁省<?php break;?>
																<?php case "24": ?>青海省<?php break;?>
																<?php case "25": ?>山东省<?php break;?>
																<?php case "26": ?>陕西省<?php break;?>
																<?php case "27": ?>山西省<?php break;?>
																<?php case "28": ?>四川省<?php break;?>
																<?php case "29": ?>云南省<?php break;?>
																<?php case "30": ?>广西自治区<?php break;?>
																<?php case "31": ?>内蒙古自治区<?php break;?>
																<?php case "32": ?>宁夏自治区<?php break;?>
																<?php case "33": ?>西藏自治区<?php break;?>
																<?php case "34": ?>新疆自治区<?php break;?>
															<?php default: ?>其他<?php endswitch;?>
														</li><li class="w110"><?php echo (date("Y-m-d",$vo["time"])); ?></li>
												</ul>
										</li><?php endforeach; endif; ?>
										<li class="two">
												<ul class="tablist-left">
														<span><a href="#">查看更多转到国际资本网</a></span>
												</ul>
										</li>
								</ul>
						</div>
						<div class="clear"></div>
				</div>
				<div>
						<h2><span>服务过行业分类</span><!-- <a href="__APP__/Person/person_zx" class="align-right">更多</a> --><a href="http://www.timehr.cn/Person/person_zx" class="align-right" target="_blank">更多</a></h2>
						<div>
								<ul class="tabbtn">
										<!-- <a href="__APP__/Person/person_zx/industry/1"  target="_blank"><li>金融业</li></a>
										<a href="__APP__/Person/person_zx/industry/2"  target="_blank"><li>房地产</li></a>
										<a href="__APP__/Person/person_zx/industry/3"  target="_blank"><li>商业连锁</li></a>
										<a href="__APP__/Person/person_zx/industry/4"  target="_blank"><li>电子商务</li></a>
										<a href="__APP__/Person/person_zx/industry/6"  target="_blank"><li>文化产业</li></a> -->

										<a href="http://www.timehr.cn/Person/person_zx"><li>金融业</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li>房地产</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li>商业连锁</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li>电子商务</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li>文化产业</li></a>
								</ul>
								<div class="clear"></div>
						</div>
				</div>
				<div>
						<h2><span>服务过职位类别</span><!-- <a href="__APP__/Person/person_zx" class="align-right">更多</a> --><a href="http://www.timehr.cn/Person/person_zx" class="align-right" target="_blank">更多</a></h2>
						<div>
								<ul class="tabbtn">
										<!-- <a href="__APP__/Person/person_zx/jobname/CEO" target="_blank"><li>CEO</li></a>
										<a href="__APP__/Person/person_zx/jobname/COO" target="_blank"><li>COO</li></a>
										<a href="__APP__/Person/person_zx/jobname/CFO" target="_blank"><li>CFO</li></a>
										<a href="__APP__/Person/person_zx/jobname/CTO" target="_blank"><li>CTO</li></a>
										<a href="__APP__/Person/person_zx/jobname/CIO" target="_blank"><li>CIO</li></a> -->

										<a href="http://www.timehr.cn/Person/person_zx"><li>CEO</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li>COO</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li>CFO</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li>CTO</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li>CIO</li></a>
								</ul>
								<div class="clear"></div>
						</div>
				</div>
				<div>
						<h2><span>服务过年薪分类</span><!-- <a href="__APP__/Person/person_zx" class="align-right">更多</a> --><a href="http://www.timehr.cn/Person/person_zx" class="align-right" target="_blank">更多</a></h2>
						<div>
								<ul class="tabbtn">
										<!-- <a href="__APP__/Person/person_zx/moeny/500" target="_blank"><li class="current" id="tab1" style="width:150px;">500万以上</li></a>
										<a href="__APP__/Person/person_zx/moeny/200" target="_blank"><li id="tab2"  style="width:150px;">200万~500万</li></a>
										<a href="__APP__/Person/person_zx/moeny/100" target="_blank"><li id="tab3"  style="width:150px;">100万~200万</li></a> -->

										<a href="http://www.timehr.cn/Person/person_zx"><li class="current" id="tab1" style="width:150px;">500万以上</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li id="tab2"  style="width:150px;">200万~500万</li></a>
										<a href="http://www.timehr.cn/Person/person_zx"><li id="tab3"  style="width:150px;">100万~200万</li></a>
								</ul>
								<div class="clear"></div>
						</div>
				</div>
				<div class="img left-gg">
				<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "5": switch($vo["status"]): case "1": ?><a href="<?php if(empty($vo["href"])): ?>http://www.timehr.com<?php else: echo ($vo["href"]); endif; ?>"  target="_blank"><img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" style="border:solid #808080 1px;" alt="加载中..."></a><?php break; endswitch; break; endswitch; endforeach; endif; ?>
				</div>
				<div class="img left-gg">
				<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "6": switch($vo["status"]): case "1": ?><a href="<?php if(empty($vo["href"])): ?>#<?php else: echo ($vo["href"]); endif; ?>"  target="_blank">
						<img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" style="border:solid #808080 1px;" alt="加载中...">
											</a><?php break; endswitch; break; endswitch; endforeach; endif; ?>
				</div>
				<h2><span>董事长的个人信息</span></h2>
				<div class="img"><span class="boss align-left center">
				<?php if(is_array($list)): foreach($list as $key=>$vo): switch($vo["pid"]): case "7": switch($vo["status"]): case "1": ?><img src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/img/<?php echo ($vo["imgpath"]); ?>" border="0" alt="加载中..."><?php break; endswitch; break; endswitch; endforeach; endif; ?>
				<br/><center><wb:follow-button uid="1355262161" type="red_1" width="67" height="24" ></wb:follow-button></center></span>
				<span class="boss align-right">
						<ul>
								<li><a href="http://www.timehr.com"  target="_blank">* 国际人力资本网</a></li>
								<!-- <li><a href="#"  target="_blank">* 腾驹达商学院</a></li> -->
								<li><a href="http://weibo.com/u/1496811763"  target="_blank">* 卓越职场</a></li>
								<li><a href="http://weibo.com/u/2295944951"  target="_blank">* 职场大助手</a></li>
								<li><a href="http://weibo.com/timehr"  target="_blank">* 腾驹达的微博</a></li>
								<li><a href="http://blog.sina.com.cn/jingsuqi2008"  target="_blank">* 董事长的博客</a></li>
								<li><a href="http://weibo.com/jingsuqi"  target="_blank">* 董事长的微博</a></li>
								<li><a href="http://www.timehr.com/club"  target="_blank">* 奇正管理沙龙</a></li>
						</ul>
				</span>
				<div class="clear"></div>
				</div>
				<h2><span>关注二维码</span></h2>
				<div class="img">
						<span class="boss align-left center"><img width="200" height="200" src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/sxywx.jpg" border="0" alt="加载中..."><br/>
						关注商学院
						</span>
						<span class="boss align-right center"><img width="200" height="200" src="__PUBLIC__/images/loading.gif" truesrc="__PUBLIC__/images/wxtjd.jpg" border="0" alt="加载中..."><br/>
						关注腾驹达
						</span>
				<div class="clear"></div>
				</div>
	</div>
	<div class="clear"></div>
</div> 
<div id="footer">
		<div>人才招聘 Email:liangyanqin@timehr.com 个人求职 Email:hrm@timehr.com 或垂询:010-82659228/29<br/>
		京ICP备13013083号 京公网安备11010802015690号 猎头资质号：RC0501191 <br/>
		©2013 国际人力资本网版权所有<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1253888613'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1253888613%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
		</div>
</div>
</body>
</html>