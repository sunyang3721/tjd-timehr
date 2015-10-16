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
		<li><a class="shortcut-button" href="__APP__/User/add"><span><img src="__PUBLIC__/admin/images/icons/1.png"><br/>注册员工</span></a>
		</li>
		<li><a class="shortcut-button" href="__APP__/User/index"><span><img src="__PUBLIC__/admin/images/icons/5.png"><br/>查询员工</span></a>
		</li>
		<li><a class="shortcut-button" href="__APP__/User/zaizhi"><span><img src="__PUBLIC__/admin/images/icons/20.png"><br/>在职员工</span></a>
		</li>
		<li>
		<a class="shortcut-button" href="__APP__/User/lizhi">
			<span><img src="__PUBLIC__/admin/images/icons/19.png"><br/>离职员工</span></a>
		</li>
		<li>
		<a class="shortcut-button" href="__APP__/User/delhome">
			<span><img src="__PUBLIC__/admin/images/icons/10.png"><br/>回收站</span></a>
		</li>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h4>用户管理</h4>
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
		$('.openjob').bind('click',function(){
						var numid = $(this).attr("num");
				$.post('__URL__/openjob/'+numid,function(jdata){
						//if(confirm("<?php echo $confirm?>")){
						if(jdata.status==1){
										if(jdata.data!=''){
												$('#ajax').show().animate({'margin-top':'5px'}).html('<div><b>'+jdata.info+'</b></div>').delay(100).animate({'margin-top':'-5px'}).fadeOut(500);
												$('.openjob[num='+numid+']').html(jdata.data);
										}else{
											alert('数据有误，请联系管理员！');
										}
								}else{
												$('#ajax').show().animate({'margin-top':'5px'}).html('<div><b>'+jdata.info+'</b></div>').delay(100).animate({'margin-top':'-5px'}).fadeOut(500);
												$('.openjob[num='+numid+']').html(jdata.data);
										}
						//}
				});
		});
		$('.listpdf').bind('click',function(){
						var numid = $(this).attr("num");
				$.post('__URL__/listpdf/'+numid,function(jdata){
						//if(confirm("<?php echo $confirm?>")){
						if(jdata.status==1){
										if(jdata.data!=''){
												$('#ajax').show().animate({'margin-top':'5px'}).html('<div><b>'+jdata.info+'</b></div>').delay(100).animate({'margin-top':'-5px'}).fadeOut(500);
												$('.listpdf[num='+numid+']').html(jdata.data);
										}else{
											alert('数据有误，请联系管理员！');
										}
								}else{
												$('#ajax').show().animate({'margin-top':'5px'}).html('<div><b>'+jdata.info+'</b></div>').delay(100).animate({'margin-top':'-5px'}).fadeOut(500);
												$('.listpdf[num='+numid+']').html(jdata.data);
										}
						//}
				});
		});
				$('.del').bind('click',function(){
					if(confirm("注意！删除后设备统计和资料也会同时删除！确定删除到回收站吗？")){
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
				$('.hide<?php echo (session('id')); ?>').hide();
		});
</script>
<div id="ajax" class="notification" style="width:20%;margin-left:22%; position: absolute;top:10%;background-color:#99ff00;display:none;position:fixed;z-index:50;"></div>
<div class="content-box-content">
        <div class="tab-content default-tab">
         <div class="notification information">
      <div>
				<form method="post" action="__APP__/User/<?php echo ($moshu); ?>">
					<div id="soso">
                    <select name="classif">
                      <option value="0">&nbsp;全&nbsp;部</option>
					  <option value="1">员工账号</option>
                      <option value="2">员工姓名</option>
                    </select>
					<input type="text" name="text" value="<?php echo ($soso); ?>">
					<input type="submit" value="开始搜索">
				</div>
				</form>
	 </div>
    </div>
          <table border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th>员工编号</th>
                <th>员工姓名</th>
				<th>猎头等级</th>
                <th>IP登录</th>
				<th>最后一次登录</th>
				<th>状态</th>
				<th>发布职位</th>
				<!-- <th>List上传</th> -->
				<th>所属用户组</th>
				<th>操作处理</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
				  </div>
                  <div class="pagination"><a href="#" class="number current"><?php echo ($page); echo ($empty); ?></a> 
				  </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr delnum="<?php echo ($vo["id"]); ?>" class="hide<?php echo ($vo["id"]); ?>">
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["yourname"]); ?></td>
				<td>
						<?php switch($vo["statuspdf"]): case "0": ?>入门<?php break;?>
							<?php case "1": ?>中级<?php break;?>
							<?php case "2": ?>高级<?php break;?>
							<?php case "3": ?>资深<?php break; endswitch;?>
				</td>
                <td><?php echo ($vo["last_ip"]); ?></td>
				<td><?php echo (date('Y-m-d',$vo["last_time"])); ?></td>
			    <td><?php switch($vo["status"]): case "1": ?><span class="status" num="<?php echo ($vo["id"]); ?>" style="color:#33cc00;cursor: pointer;">启用（在职）<?php break;?>
						<?php case "2": ?><span style="color:#808080;cursor: pointer;" class="status" num="<?php echo ($vo["id"]); ?>">禁用（离职）</span><?php break; endswitch;?></td>
				 <td><?php switch($vo["openjob"]): case "1": ?><span class="openjob" num="<?php echo ($vo["id"]); ?>" style="color:#33cc00;cursor: pointer;">允许<?php break;?>
						<?php case "0": ?><span style="color:#808080;cursor: pointer;" class="openjob" num="<?php echo ($vo["id"]); ?>">禁用</span><?php break; endswitch;?></td>
				<!-- <td><?php switch($vo["listpdf"]): case "1": ?><span class="listpdf" num="<?php echo ($vo["id"]); ?>" style="color:#33cc00;cursor: pointer;">允许<?php break;?>
						<?php case "0": ?><span style="color:#808080;cursor: pointer;" class="listpdf" num="<?php echo ($vo["id"]); ?>">禁用</span><?php break; endswitch;?></td> -->
				<td><?php if(empty($vo['Role'][0]['name'])): ?>未分组<?php else: ?> <?php echo ($vo['Role'][0]['name']); endif; ?> </td>
                <td>
                  <a href="__APP__/User/username/<?php echo ($vo["id"]); ?>" title="修改姓名"><img src="__PUBLIC__/admin/images/icons/pencil.png" alt="Edit" />修改姓名</a>&nbsp;&nbsp;| <a href="__APP__/User/edit/<?php echo ($vo["id"]); ?>" title="修改密码"><img src="__PUBLIC__/admin/images/icons/pencil.png" alt="Edit" />修改密码</a>&nbsp;&nbsp;| <a href="__APP__/User/editpdf/<?php echo ($vo["id"]); ?>" title="修改权限"><img src="__PUBLIC__/admin/images/icons/pencil.png" alt="Edit" />修改等级</a>&nbsp;&nbsp;| <a href="__APP__/User/editRole/<?php echo ($vo["id"]); ?>" title="修改用户组"><img src="__PUBLIC__/admin/images/icons/pencil.png" alt="Edit" />修改用户组</a>&nbsp;&nbsp;<?php if($vo['status'] == 2 ): ?><a href="#" class="del" delnum="<?php echo ($vo["id"]); ?>"><img src="__PUBLIC__/admin/images/icons/cross.png" alt="Delete" />删除</a> <?php else: endif; ?></td>
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