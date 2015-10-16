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
  <div id="main-content">
    <!-- Page Head -->
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="__APP__/News/add"><span><img src="__PUBLIC__/admin/images/icons/paper_content_pencil_48.png"><br/>新增</span></a></li>
	  <li><a class="shortcut-button" href="__APP__/News/delhome"><span><img src="__PUBLIC__/admin/images/icons/10.png"><br/>回收站</span></a></li>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h4>新闻动态管理</h4>
      </div>
      <!-- End .content-box-header -->
<script type="text/javascript">
		$(document).ready(function(){
				$('select[name=classif]').val('<?php echo ($classif); ?>');
				$('.status').bind('click',function(){
						var numid = $(this).attr("num");
				$.post('__URL__/status/'+numid,function(jdata){
						//if(confirm("<?php echo $confirm?>")){
						if(jdata.status==1){
										if(jdata.data!=''){
												$('#ajax').show().animate({'margin-top':'5px'}).html('<div><b>'+jdata.info+'</b></div>').delay(100).animate({'margin-top':'-5px'}).fadeOut(500);
												$('.status[num='+numid+']').html(jdata.data);
										}else{
											alert('数据有误，请联系管理员！');
										}
								}else{
												$('#ajax').show().animate({'margin-top':'5px'}).html('<div><b>'+jdata.info+'</b></div>').delay(100).animate({'margin-top':'-5px'}).fadeOut(500);
												$('.status[num='+numid+']').html(jdata.data);
										}
						//}
				});
		});
				$('.del').bind('click',function(){
					if(confirm("确定删除到回收站吗？")){
						var numid = $(this).attr("delnum");
				$.post('__URL__/del/'+numid,function(jdata){
						//if(confirm("<?php echo $confirm?>")){
						if(jdata.status==3){
										if(jdata.data!=''){
												$('#ajax').show().animate({'margin-top':'5px'}).html('<div><b>'+jdata.info+'</b></div>').delay(300).animate({'margin-top':'-5px'}).fadeOut(500);
												$('tr[delnum='+numid+']').remove();
										}else{
											alert('数据有误，请联系管理员！');
										}
								}else{
												$('#ajax').show().animate({'margin-top':'5px'}).html('<div><b>'+jdata.info+'</b></div>').delay(300).animate({'margin-top':'-5px'}).fadeOut(500);
												//$('<?php echo $button?>[num='+numid+']').html(jdata.data);
										}
						//}
				});
					} //confirm end
		});
		
				$('.overtext').each(function(){
					var maxwidth=20;
					 if($(this).text().length>maxwidth){   
						$(this).text($(this).text().substring(0,maxwidth));    
						$(this).html($(this).html()+'...');    
						}    
				});

		});
</script>
<div id="ajax" class="notification" style="width:20%;margin-left:22%; position: absolute;top:10%;background-color:#99ff00;display:none;position:fixed;z-index:1000;">
      
    </div>
<div class="content-box-content">
        <div class="tab-content default-tab">
         <div class="notification information">
      <div>
				<form method="post" action="__APP__/News">
					<div id="soso">
                    <select name="classif">
                      <option value="0">&nbsp;&nbsp;&nbsp;全&nbsp;部</option>
                      <option value="1">公司要闻</option>
                      <option value="2">最新动态</option>
					  <option value="3">专题活动</option>
					  <option value="4">有关媒体与机构报道</option>
					  <option value="5">公司公告</option>
                    </select>
					<input type="text" name="text" value="<?php echo ($soso); ?>">
					<input type="submit" value="开始搜索">
                    <!-- <a class="button">开始搜索</a>  -->
				</div>
				</form>
	 </div>
    </div>
          <table>
            <thead>
              <tr>
                <th>
                  编号
                </th>
                <th>标题</th>
                <th>负责人</th>
                <th>发布日期</th>
				<th>分类</th>
				<th>状态</th>
				<th>备注</th>
				<th>操作</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
						<!-- <button id="submit">批量删除</button> -->
				  </div>
                  <div class="pagination"><a href="#" class="number current"><?php echo ($page); echo ($empty); ?></a> 
				  </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr delnum="<?php echo ($vo["id"]); ?>">
                <td>
                  <!-- <input type="checkbox" value="<?php echo ($vo["id"]); ?>" name='id[]'/> --><?php echo ($vo["id"]); ?>
                </td>
                <td><a href="__ROOT__/News/index_show/<?php echo ($vo["id"]); ?>"  target="_blank" class="overtext"><?php echo ($vo["title"]); ?></a></td>
                <td><?php echo ($vo["yourname"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["last_time"])); ?></td>
				<td>
					<?php switch($vo["classif"]): case "1": ?>【公司要闻】<?php break;?>
						<?php case "2": ?>【最新动态】<?php break;?>
						<?php case "3": ?>【专题活动】<?php break;?>
						<?php case "4": ?>【有关媒体与机构报道】<?php break;?>
						<?php case "5": ?>【公司公告】<?php break; endswitch;?>
					</td>
				<td><?php switch($vo["status"]): case "1": ?><span class="status" num="<?php echo ($vo["id"]); ?>" style="color:#33cc00;cursor: pointer;">发布中<?php break;?>
						<?php case "2": ?><span style="color:#808080;cursor: pointer;" class="status" num="<?php echo ($vo["id"]); ?>">关闭发布</span><?php break; endswitch;?></td>
				<td><?php echo ($vo["remark"]); ?></td>
                <td>
                  <a href="__APP__/News/edit/<?php echo ($vo["id"]); ?>" title="编辑用户"><img src="__PUBLIC__/admin/images/icons/pencil.png" alt="Edit" /></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" class="del" delnum="<?php echo ($vo["id"]); ?>"><img src="__PUBLIC__/admin/images/icons/cross.png" alt="Delete" /></a> </td>
              </tr><?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- End .content-box-content -->
    </div>
    <div id="footer"> <small>
      &#169;腾驹达后台 2013| Powered by <a href="#">admin</a> | <a href="#">Top</a> </small> 
	  </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
<!-- End #body-wrapper-->
</body>
</html>