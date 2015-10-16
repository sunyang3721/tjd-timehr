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
  <script type="text/javascript">
	$(document).ready(function(){
			//$('select[name=classif]').val(<?php echo ($classif); ?>);
	});
</script>
  <div id="main-content">
    <!-- Page Head -->
     <ul class="shortcut-buttons-set">
	   <li><a class="shortcut-button" href="<?php echo U('Lsku/index');?>"><span><img src="__PUBLIC__/admin/images/icons/8.png"><br/>摸排库列表</span></a></li>
	   <li><a class="shortcut-button" href="<?php echo U('Lsku/huishou');?>"><span><img src="__PUBLIC__/admin/images/icons/8.png"><br/>摸排回收站</span></a></li>
	   <li><a class="shortcut-button" href="<?php echo U('Lsku/user_list');?>"><span><img src="__PUBLIC__/admin/images/icons/19.png"><br/>员工审核</span></a></li>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h4>摸排库列表</h4>
      </div>
      <!-- End .content-box-header -->
<div id="ajax" class="notification" style="width:20%;margin-left:22%; position: absolute;top:10%;background-color:#99ff00;display:none;position:fixed;z-index:1000;">
      
    </div>
<div class="content-box-content">
        <div class="tab-content default-tab">
         <div class="notification information">
      <div>
				<form method="post" action="<?php echo U('Lsku/index');?>">
					<div id="soso"><b style="font-size:16px;">公司名称或行业</b>
					<input type="text" name="text" value="<?php echo ($text); ?>">
					<input type="submit" value="开始搜索">
				</div>
				</form>
	 </div>
    </div>
          <table border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
				<th>编号</th>
                <th>集团名称+总或分公司名称</th>
				<th>上传者</th>
				<th>所属行业</th>
				<th>地点</th>
				<th>更新日期</th>
				<th>操作处理</th>
              </tr>
            </thead>
             <tfoot>
              <tr>
                <td colspan="9">
                  <div class="bulk-actions align-left">
				  </div>
                  <div class="pagination"> <a href="#" class="number current"><?php echo ($page); echo ($empty); ?></a>
				  </div>
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><a href="<?php echo U('Lsku/show_list',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></td>
				<td><?php echo ($vo["yourname"]); ?></td>
				<td><?php echo ($vo["hangye"]); ?></td>
				<td><?php echo ($vo["address"]); ?></td>
                <td><?php echo (date('Y-m-d',$vo["date"])); ?></td>
				<td>
					<span style="color:#33cc00;"><!-- <a href="<?php echo U('Kehu/img',array('id'=>$vo['id']));?>">修改图片</a> |  --><a href="<?php echo U('Lsku/modify',array('id'=>$vo['id']));?>" title="编辑客户信息"><img src="__PUBLIC__/admin/images/icons/pencil.png" alt="Edit" />修改</a> | <a href="<?php echo U('Lsku/del',array('id'=>$vo['id']));?>" onclick="return confirm('确定要删除?')"><img src="__PUBLIC__/admin/images/icons/cross.png">删除</a></span>
				</td>
              </tr><?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- End .content-box-content -->
    </div>
    <div id="footer"> 
		<small>
		  &#169;腾驹达后台 2013| Powered by <a href="#">admin</a> | <a href="#">Top</a> 
		</small> 
	  </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
<!-- End #body-wrapper-->
</body>
</html>