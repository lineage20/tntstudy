<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>后台管理平台</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=config-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="/assets/lib/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/assets/lib/fontawesome/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		
        

		<!-- fonts -->
        
        <link rel="stylesheet" href="/assets/css/open-sans-fonts.css" />
		<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->

		<!-- ace styles -->

		<link rel="stylesheet" href="/assets/lib/ace/ace.min.css" />
		<link rel="stylesheet" href="/assets/lib/ace/ace-rtl.min.css" />
		<link rel="stylesheet" href="/assets/lib/ace/ace-skins.min.css" />
		<link rel="shortcut icon" href="/public/images/favicon.ico">
	    <meta name="baidu_union_verify" content="1f4bf8fb796d8702f9dcff06a09ed8ff">
	    <meta name="keywords" content="刘宁,个人网站,宁静致远,php,技术博客" />
	    <meta name="description" content="刘宁个人博客，是记录博主学习和成长的一个自媒体博客。关注于web前端技术和PHP技术的学习研究,同时博客免费提供了各种技术学习资源（带源码）下载学习！" />
	    <meta name="generator" content="Discuz! X3.2" />
	    <meta name="author" content="Discuz! Team and Comsenz UI Team" />
	    <meta name="copyright" content="2001-2013 Comsenz Inc." />
	    <meta name="MSSmartTagsPreventParsing" content="True" />
	    <meta http-equiv="MSThemeCompatible" content="Yes" />
	    <meta name="application-name" content="宁静致远" />
	    <meta name="msapplication-tooltip" content="宁静致远" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/assets/lib/ace/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

        <style>
            .page-content {
                padding: 8px 20px 0px;
            }
            .ace-settings-container {
                top: 0px;
            }

            .nav-list>li> a>.fa {
                display: inline-block;
                vertical-align: middle;
                min-width: 30px;
                text-align: center;
                font-size: 18px;
                font-weight: normal;
                margin-right: 2px;
            }


            .nav-list > li .submenu > li a > .fa {
                display: none;
                font-size: 12px;
                font-weight: normal;
                width: 18px;
                height: auto;
                line-height: 12px;
                text-align: center;
                position: absolute;
                left: 10px;
                top: 11px;
                z-index: 1;
                background-color: #FFF;
            }
            
            .nav-list>li .submenu>li.active>a>.fa,.nav-list>li .submenu>li:hover>a>.fa {
	            display:inline-block
            }
            .nav-list>li .submenu>li.active>a>.fa {
	            color:#c86139
            }
.ulform{margin:5px;border:1px solid #aaa;padding:5px;}
.ulform li{margin:5px 3px;}
.ulform li label{width:70px;display:inline-block;line-height:22px;text-align:right;margin-left:5px;vertical-align:top;font-size:12px;}
.ulform li input{display:inline-block;height:22px;line-height:22px;vertical-align: middle;}
.min-h-200{min-height:190px;}
.txtinput{width:250px;}
            
.ulform li label b{    
color: red;
margin-left: 3px;
}

.notice .notice-toggle.active {
    background-position: 0 -30px;
}

.notice ul li.active {
	display: block;
}
.notice {
	position: fixed;
	left: 0;
	bottom: 0;
	width: 187px;
	height: 290px;
	-webkit-transition: all .3s;
    transition: all .3s;
	margin-left:2px;
}
.notice .notice-title {
	position: relative;
	z-index: 1;
}
.notice .notice-title ul li.active {
	background-color: #dedede;
	background: -webkit-gradient(linear, 0 0, 0 100%, from(#fafafa),
		to(#ebebeb));
	background: -moz-linear-gradient(top, #fafafa, #ebebeb);
	background: -ms-linear-gradient(top, #fafafa, #ebebeb);
}

.notice .notice-title:after {
	content: '';
	display: block;
	height: 0;
	clear: both;
	visibility: hidden;
}
.notice .notice-toggle {
    position: absolute;
    top: -5px;
    left: 50%;
    margin-left: -15px;
    display: inline-block;
    width: 30px;
    height: 28px;
    background: url("/assets/img/zs_notice_onoff.png") no-repeat 0 0;
    cursor: pointer;
}
.notice .notice-toggle.active {
    background-position: 0 -30px;
}

.notice .notice-title ul li {
	float: left;
	width: 50%;
	height: 20px;
	line-height: 20px;
	text-align: center;
	border-top: 1px solid #b8b8b8;
	background-color: #eeeeee;
	cursor: pointer;
	list-style: none;
}
.notice .notice-box {
	position: absolute;
	left: 0;
	bottom: 0;
	width: 187px;
	height: 260px;
	overflow: hidden;
	background-color: #fff;
	
}

.notice .notice-box ul li {
	height: 130px;
	/*padding: 10px 3px;*/
	border-top: 1px dashed #b8b8b8;
	background-color: #fff;
	list-style: none;
	
}

.notice .notice-box ul li a {
	color: #7e7e7e;
}

.notice .notice-box.two ul li a {
	color: #9E4545;
}


        </style>




		<!-- ace settings handler -->

		<script src="/assets/lib/ace/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/assets/lib/html5shiv.js"></script>
		<script src="/assets/lib/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
	
	   
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
			    try { ace.settings.check('navbar', 'fixed') } catch (e) { }
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<img src="/assets/img/logo.png"  style="display:inline-block;height:30px;vertical-align:middle"/>
                            <!--  <span style="vertical-align:middle">公共场所wifi审计系统</span>-->
                            <span style="vertical-align:middle">设备管理平台</span>
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<!--<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-ok"></i>
									4 Tasks to complete
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Software Update</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:65%" class="progress-bar "></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Hardware Upgrade</span>
											<span class="pull-right">35%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:35%" class="progress-bar progress-bar-danger"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Unit Testing</span>
											<span class="pull-right">15%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:15%" class="progress-bar progress-bar-odeviceing"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Bug Fixes</span>
											<span class="pull-right">90%</span>
										</div>

										<div class="progress progress-mini progress-striped active">
											<div style="width:90%" class="progress-bar progress-bar-success"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See tasks with details
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-odeviceing-sign"></i>
									8 Notifications
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												New Comments
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-xs btn-primary icon-user"></i>
										Bob just signed up as an editor ...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
												Followers
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-envelope-alt"></i>
									5 Messages
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="inbox.html">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>-->

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/assets/img/user.jpg" alt="Photo" />
								<span class="user-info">
									<small>Welcome</small>									
									<?php echo $adm->fullname; ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
									<a href="/account/logout" onclick="return confirm('确定要退出吗?');">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
								<li>
									<a href="#" onclick="btnUpdatePwd_Click()">
										<i class="icon-off"></i>
										修改密码
									</a>
								</li>

								<!--<li>
									<a href="#">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>-->
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
			    try { ace.settings.check('main-container', 'fixed') } catch (e) { }
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					

					<!--<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-odeviceing">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-odeviceing"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div>-->
                    <!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
                        <li class="active">
							<a href="/home" class="alink">
								<i class="fa fa-dashboard"></i>
								<span class="menu-text"> 总览 </span>
							</a>
						</li>

                        <?php echo $menu; ?>


					</ul><!-- /.nav-list -->

					<!--屏幕切换  <div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>-->

					<script type="text/javascript">
					    try { ace.settings.check('sidebar', 'collapsed') } catch (e) { }
					</script>
				</div>
				
<!-- 				<div class="notice">
				<i class="notice-toggle"></i>
				<div class="notice-title">
					<ul style="margin-left: 0px;">
						<li class="one">离线报警</li>
						<li class="two">布控报警</li>
					</ul>
				</div>
				<div class="notice-box one" >
					<ul id="place" style="margin-left: 5px;">
					<?php  foreach ($offlineplaces as $palce) { $placecode = $palce['placeCode']; $cdate = date('Y-m-d H:i:s',$palce['cdate']); $caddress = $palce['province'].$palce['city'].$palce['area'].$palce['address']; echo "<li><a
							href='index.php?c=PlaceManage&a=HistoryState&PLACE_INFO=21010127000105'
							class='message' target='rightFrame'>场所：[$placecode]<br>事件：[离线]<br>时间：[$cdate]<br>地址：[$caddress]
						</a></li>"; } ?>
				</ul>
				</div>
				<div class="notice-box two" >
					<ul id='controll' style="margin-left: 5px;">
					<?php  foreach ($odeviceings as $odevice) { $placecode = $odevice['place']; $cname = $odevice['cname']; $cdate = date('Y-m-d H:i:s',$odevice['odeviceingtime']); $content = $odevice['content']; $caddress = $odevice['province'].$odevice['city'].$odevice['area'].$odevice['address']; echo "<li><a
							href='index.php?c=PlaceManage&a=HistoryState&PLACE_INFO=21010127000105'
							class='message' target='rightFrame'>场所：[$placecode]<br>布控名称：[$cname]<br>线索：[$content]<br>事件：[布控告警]<br>时间：[$cdate]<br>地址：[$caddress]
						</a></li>"; } ?>
					</ul>
				</div>
            </div> -->

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
						    try { ace.settings.check('breadcrumbs', 'fixed') } catch (e) { }
						</script>

						<ul class="breadcrumb" id="breadcrumb">
							<li>
								<i class="fa fa-home home-icon"></i>
								<a href="javascript:void(0)">首页</a>
							</li>
							<li class="active">总览</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<!--<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>-->
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

                                <iframe id="frameContent" name="frameContent" src="/home" scrolling="auto" frameborder="0" onload="this.height=document.documentElement.clientHeight-130" style="width:100%;overflow:auto;margin-top:5px;"></iframe> 

                                <script type="text/javascript">


                                    function resetIframeHeight()
                                    {
                                        var iframe = document.getElementById("frameContent");
                                        try
                                        {
                                            var bHeight = iframe.contentWindow.document.body.scrollHeight;
                                            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
                                            var height = Math.max(bHeight, dHeight);
                                            height = bHeight;
                                            iframe.height = height;
                                        } catch (ex) { }
                                    }

                                    //window.setInterval("reinitIframe()", 200);

                                </script> 



								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<!-- <div class="btn btn-app btn-xs btn-odeviceing ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>
					 -->

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<!--<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>-->

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<!--<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>-->
		</div><!-- /.main-container -->
		<div style="display:none;">



    <div id="dialogUpdatePwd">
        <ul class="ulform">
            <li style="list-style-type:none;">
                <label>登录名</label>
                <span id="spanUserName"></span>
            </li>
            <li style="list-style-type:none;">
                <label>姓名</label>
                <span id="spanFullName"></span>
            </li> 
            <li style="list-style-type:none;">
                <label>新密码</label>
                <input id="txtPassword" type="password"/>               
            </li> 
            <li style="list-style-type:none;">
                <label>确认密码</label>
                <input id="txtPasswordCfm" type="password"/>               
            </li> 

        </ul>

    </div>

</div>

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="/assets/lib/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="/assets/lib/jquery-1.10.2.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
		    window.jQuery || document.write("<script src='/assets/lib/jquery-2.0.3.min.js'>" + "<" + "/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/assets/lib/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
		    if ("ontouchend" in document) document.write("<script src='/assets/lib/jquery.mobile.custom.min.js'>" + "<" + "/script>");
		</script>
		<script src="/assets/lib/bootstrap/bootstrap.min.js"></script>
		<script src="/assets/lib/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->

		<script src="/assets/lib/ace/ace-elements.min.js"></script>
		<script src="/assets/lib/ace/ace.min.js"></script>

		<!-- inline scripts related to this page -->

        <script src='/assets/js/frame.js?1234567'></script>
</body>
</html>
<!-- page specific plugin styles -->
		
    <script src='/assets/lib/jquery-easyui-1.3.6/jquery.easyui.min.js' type="text/javascript"></script>
    <script src='/assets/lib/jquery.scrollText.js' type="text/javascript"></script>
    
    <script src='/assets/lib/fcore/fcore.js' type="text/javascript"></script>  
    <link href="/assets/lib/jquery-easyui-1.3.6/themes/icon.css" rel="stylesheet" />
    <link href="/assets/lib/jquery-easyui-1.3.6/themes/default/easyui.css" rel="stylesheet" />
    
<script type="text/javascript">


$(function(){

	$("span").removeClass("menu-text");

    $('.notice-box.one').scrollText({
       speed: 3000,
       rowHeight: 130,
       move: 1000
   });
   $('.notice-box.two').scrollText({
       speed: 3000,
       rowHeight: 130,
       move: 1000
   });
	 $('.notice-title').on('mouseenter', 'li', function(){
         var obj = $(this).attr('class');
         $(this).addClass('active').siblings('li').removeClass('active');
         $('.notice-box').css('zIndex','-1');
         $('.notice-box.'+obj).css('zIndex','1');
     });
     $('.notice-box.one').css('zIndex','1');
		
		$('.notice-toggle').on('click', function(){
         var nHeight = parseInt($('.notice').height());
         var status = $(this).hasClass('active');
         if (status) {
             $('.notice').css('bottom', -(nHeight-30));
             $(this).removeClass('active');
         }else{
             $('.notice').css('bottom', '0');
             $(this).addClass('active');
         }
     });

     function changeHeight () {
         var vHeight = $(window).height()-50;
         $("#leftFrame").height(vHeight);
         $(".side").children("a").height(vHeight);
         $("#rightFrame").height(vHeight);
			
			var mHeight = parseInt($('.left-menus').outerHeight(true));
         var nHeight = parseInt($('.notice').height());
         if ((nHeight + mHeight) > vHeight) {
             $('.notice').css('bottom', -(nHeight-30));
             $('.notice-toggle').removeClass('active');
         }else{
             $('.notice').css('bottom', '0');
             $('.notice-toggle').addClass('active');
         }
     }
     changeHeight();
     $(window).resize(changeHeight);
})
		
function btnUpdatePwd_Click()
{
    var sel;
    $("#spanUserName,#spanFullName").val("");
    $("#spanUserName").text('<?php echo $_COOKIE['adm_name'] ?>');
    $("#spanFullName").text('<?php echo $_COOKIE['adm_fullname']; ?>');
    var id = '<?php echo $_COOKIE['admid']; ?>';
    
    $("#dialogUpdatePwd").dialog({
        iconCls: "icon-key",
        modal: true,
        resizable: true,
        title: "修改密码",
        width: 400,//document.documentElement.clientWidth-50,
        height: 230,//document.documentElement.clientHeight - 50,
        buttons: [{
            text: "确定",
            iconCls: 'icon-ok',
            handler: function ()
            {
                var pwd = $("#txtPassword").val();
                var pwdcfm = $("#txtPasswordCfm").val();

                if (!pwd)
                {
                    jQuery.messager.alert('提示:','请填写新密码!','info'); 
                    return false;
                }
                else if (!pwdcfm)
                {
                    jQuery.messager.alert('提示:','请填写确认密码!','info'); 
                    return false;
                }
                else if (pwd != pwdcfm)
                {
                    jQuery.messager.alert('提示:','两次输入的密码不一致!','info'); 
                    return false;
                }
                else
                {
                    pwd = FCore.Sha1.Encrypt(pwd);

                    FCore.Ajax.Post("/pms/sysadmin/updatepwd/" + id + "/" + pwd, null, function (d)
                    {
                        if (d.Ok)
                        {
                            $("#dialogUpdatePwd").dialog("close");
                            //loadData();
                            jQuery.messager.alert('提示:','密码修改成功!','info'); 
                        }
                        else
                        {
                            alert(d.Msg);
                        }

                    });
                }

            }
        }, {
            text: "取消", iconCls: 'icon-cancel',
            handler: function ()
            {
                //取消 按钮事件
                $("#dialogUpdatePwd").dialog("close");
            }
        }]

    });

}


</script>