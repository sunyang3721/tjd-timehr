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
			$('select[name=classif]').val(<?php echo ($classif); ?>);
	});
</script>
  <div id="main-content">
    <!-- Page Head -->
     <ul class="shortcut-buttons-set">
      <!-- <li><a class="shortcut-button" href="__APP__/Shebei/add"><span><img src="__PUBLIC__/admin/images/icons/paper_content_pencil_48.png"><br/>新增员工</span></a></li> -->
	  <li><a class="shortcut-button" href="<?php echo U('Ziliao/index');?>"><span><img src="__PUBLIC__/admin/images/icons/34.png"><br/>全部员工资料</span></a></li>
	  <li><a class="shortcut-button" href="<?php echo U('Ziliao/UserImg');?>"><span><img src="__PUBLIC__/admin/images/icons/1.png"><br/>员工头像</span></a></li>
	  <!-- <li><a class="shortcut-button" href="#"><span><img src="__PUBLIC__/admin/images/icons/8.png"><br/>员工申请</span></a></li>
	  <li><a class="shortcut-button" href="#"><span><img src="__PUBLIC__/admin/images/icons/27.png"><br/>离职办理</span></a></li> -->
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h4>员工资料管理</h4>
      </div>
      <!-- End .content-box-header -->
<div id="ajax" class="notification" style="width:20%;margin-left:22%; position: absolute;top:10%;background-color:#99ff00;display:none;position:fixed;z-index:1000;">
      
    </div>
<div class="content-box-content">
        <div class="tab-content default-tab">
         <div class="notification information">
      <div>
				<form method="post" action="__APP__/Ziliao/<?php echo ($index); ?>">
					<div id="soso">
                    <select name="classif">
                      <option value="0">员工编号</option>
					  <option value="1">员工姓名</option>
                      <option value="2">所属团队</option>
                      <option value="3">联系方式</option>
                    </select>
					<input type="text" name="text" value="<?php echo ($text); ?>">
					<input type="submit" value="开始搜索"><span>&nbsp;&nbsp;<a href="<?php echo U('Ziliao/zaizhi');?>">在职员工</a>&nbsp;|&nbsp;<a href="<?php echo U('Ziliao/lizhi');?>">离职员工</a></span>
                    <!-- <a class="button">开始搜索</a>  -->
				</div>
				</form>
	 </div>
    </div>
          <table border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
				<th>员工编号</th>
                <th>员工姓名</th>
                <th width="380">所属团队</th>
				<th>工作状态</th>
				<th>联系方式</th>
				<th>入职日期</th>
				<th>操作日期</th>
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
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["yourname"]); ?></td>
                <td>团队名称：<?php echo ($vo["tuandui"]); ?><BR>擅长行业：<?php echo ($vo["hangye"]); ?><BR>主做职位：<?php echo ($vo["markjob"]); ?></td>
				<td>
					<?php switch($vo["status"]): case "1": ?><span style="color:#33cc00;">在职</span><?php break;?>
						<?php case "2": ?><span style="color:#808080;">已离职</span><?php break; endswitch;?>
				</td>
				<td>座机电话：<?php echo ($vo["homeihone"]); ?><BR>移动电话：<?php echo ($vo["ihone"]); ?><BR>腾讯 Q Q：<?php echo ($vo["qq"]); ?><BR>E-mail：<?php echo ($vo["mail"]); ?><BR>其他：<?php echo ($vo["other"]); ?></td>
				<td><?php echo ($vo["indate"]); ?></td>
				<td><?php echo (date('Y-m-d',$vo["date"])); ?></td>
                <td>
					<span style="color:#33cc00;"><a href="__APP__/Ziliao/edit/<?php echo ($vo["id"]); ?>" title="编辑职位"><img src="__PUBLIC__/admin/images/icons/pencil.png" alt="Edit" />修改</a></span>
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