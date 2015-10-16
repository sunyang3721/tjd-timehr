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
		/*
			$(document).ready(function(){
			$('select[name=listpdf]').change(function(){
				var v = $(this).val();
				//alert(v);
				location.href="__APP__/Lsku/sae/status/"+v;
			});
	});
	});
	*/
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
        <h4>员工审核管理</h4>
      </div>
      <!-- End .content-box-header -->
<div id="ajax" class="notification" style="width:20%;margin-left:22%; position: absolute;top:10%;background-color:#99ff00;display:none;position:fixed;z-index:1000;">
      
    </div>
<div class="content-box-content">
        <!-- <div class="tab-content default-tab">
			 <div class="notification information">
			  <div>
						<form method="post" action="<?php echo U('Lsku/index');?>">
							<div id="soso"><b style="font-size:16px;">公司名称或行业</b>
							<input type="text" name="text" value="<?php echo ($text); ?>">
							<input type="submit" value="开始搜索">
						</div>
						</form>
			 </div>
		</div> -->
          <table border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
				<th>员工编号</th>
                <th>员工姓名</th>
				<th>移动电话</th>
				<th>座机电话</th>
				<th>权限状态</th>
				<th>操作处理</th>
              </tr>
            </thead>
             <tfoot>
              <tr>
                <td colspan="9">
                  <div class="bulk-actions align-left">
				  </div>
                  <div class="pagination"> <a href="#" class="number current"><?php echo ($page); ?></a>
				  </div>
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><form method="post"  action="__URL__/sae">
			<INPUT type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
              <tr>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["yourname"]); ?></td>
				<td><?php echo ($vo["ihone"]); ?></td>
				<td><?php echo ($vo["homeihone"]); ?></td>
				<td>
						<?php switch($vo["listpdf"]): case "0": ?><b style="color:#00ff00">没有授权</b><?php break;?>
							<?php case "1": ?><b style="color:#00ff00">已申请，正在审核中</b><?php break;?>
							<?php case "2": ?><b style="color:#99cc33">授权只查看权限</b><?php break;?>
							<?php case "3": ?><b style="color:#0000ff">授权查看，创建，修改等权限</b><?php break;?>
							<?php case "4": ?><b style="color:#cc0000">授权管理员权限</b><?php break;?>
							<?php default: ?>异常出错<?php endswitch;?></td>
				<td> 
					<select name="listpdf"  style="height:25px;font-size:14px;font-family:'Microsoft YaHei',Arial,sans-serif;">
						<option value="1" selected="selected">授权处理</option>
						<option value="0">取消任何授权</option>
						<option value="2">授权只查看权限</option>
						<option value="3">授权查看，创建，修改等权限</option>
						<option value="4">授权管理员权限</option>
					</select>
					<input type="submit" value="确定提交" style="height:25px;font-size:14px;font-family:'Microsoft YaHei',Arial,sans-serif;">
				</td>
              </tr>
			  </form><?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- End .content-box-content -->
    </div>
    
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
<!-- End #body-wrapper-->
</body>
</html>