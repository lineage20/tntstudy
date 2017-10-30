<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理系统</title>
    <link href="/assets/lib/jquery-easyui-1.3.6/themes/default/easyui.css" rel="stylesheet" />
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
    <!-- <script language="JavaScript" src="/assets/js/jquery.js"></script> -->
    <script src='/assets/lib/jquery-1.8.0.js' type="text/javascript"></script> 
    <script src='/assets/lib/jquery-easyui-1.3.6/jquery.easyui.min.js' type="text/javascript"></script>
    <script src='/assets/lib/jquery-easyui-1.3.6/locale/easyui-lang-zh_CN.js' type="text/javascript"></script>
    <script src='/assets/lib/jquery-easyui-1.3.6/linkButtonOverrride.js' type="text/javascript"></script>
    <script src='/assets/lib/jquery.form.js' type="text/javascript"></script>    
    <script src='/assets/lib/fcore/fcore.js' type="text/javascript"></script>  
    <script src="/assets/js/cloud.js" type="text/javascript"></script>

    <script language="javascript">
       $(function(){
        $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
        $(window).resize(function(){  
            $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
        })  
    });  
</script> 
<style>
* {
            padding: 0;
            margin: 0;
        }

        body {
            color: #FFF;
            font-family: "Microsoft Yahei";
            background: url("/assets/rgraph/bg.png") no-repeat center center;
            background-size: 100% ;
            overflow: hidden;
            width: 100%;
            height: 100%;
        }

        .container {
            width: 960px;
            margin: 135px auto 0;
        }

        .clearfix {
            display: block;
        }

        .clearfix:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        .container .secL {
            float: left;
            font-weight: bold;
            clear: both;
            margin: 90px 0 0 104px;
        }

        .container .secR {
            float: right;
            position: relative;
            padding: 40px 35px 40px 45px;
            width: 270px;
            height: 330px;
        }

        .container .secL h2 {
            font-size: 26px;
        }

        .container .secL p {
            font-size: 16px;
            line-height: 40px;
            margin-top: 30px;
        }

        .box-bg {
            position: absolute;
            top: 0;
            left: 0;
            opacity: .8;
            filter: alpha(opacity=80);
            width: 100%;
            height: 100%;
            background-color: #141924;
        }

        .form {
            position: absolute;
        }

        .form h1 {
            font-size: 18px;
        }

        .form p {
            font-size: 14px;
            color: #e9e9e9;
            margin-top: 15px;
        }

        p {
            display: block;
        }

        .form .item {
            margin-top: 20px;
            width: 255px;
        }

        .clearfix:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        .form .item label {
            width: 44px;
            height: 44px;
            background: #aaabab url("/assets/rgraph/icologin.png") center 10px no-repeat;
            border: none;
            display: block;
            float: left;
        }

        label {
            cursor: default;
        }

        .form .item input {
            width: 210px;
            height: 30px;
            padding: 7px 0;
            border: none;
            outline: none;
            font-size: 14px;
            line-height: 30px;
            text-indent: .5em;
            float: left;
            color: #333;
            font-weight: bold;
        }

        .form .itempass label {
            background-position: center -28px;
        }

        img[Attributes] {
            width: 75px;
            height: 30px;
        }

        .form .validatepic input {
            width: 100px;
            margin: 0 10px;
            height: 16px;
            line-height: 16px;
            font-size: 14px;
            float: none;
        }

        .form .validatepic a.changepic {
            color: #e0e0e0;
        }

        a {
            text-decoration: none;
            cursor: pointer;
        }

        .form .itemRadio a {
            color: #e0e0e0;
            width: 68px;
            margin: 2px 0px;
            height: 25px;
            line-height: 16px;
            font-size: 14px;
            float: none;
        }

        .form .item button {
            width: 255px;
            height: 46px;
            background: url("/assets/rgraph/loginbtn.png") left top no-repeat;
            border: none;
            cursor: pointer;
            text-align: center;
            line-height: 46px;
            font-size: 16px;
            font-weight: bold;
            color: #FFF;
        }
</style>
    

</head>

<?php  ?>
<script>
    if(window !=top){  
        top.location.href=location.href;  
    }  

    
</script>
<style>
        * {
            padding: 0;
            margin: 0;
        }
        html{
            width: 100%;
            height: 100%;
        }
        body {
            color: #FFF;
            font-family: "Microsoft Yahei";
            background: url("/assets/rgraph/bg.png") no-repeat center center;
            background-size: 100% 100%;
            overflow: hidden;
        }

        .container {
            width: 960px;
            margin: 135px auto 0;
        }

        .clearfix {
            display: block;
        }

        .clearfix:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        .container .secL {
            float: left;
            font-weight: bold;
            clear: both;
            margin: 90px 0 0 104px;
        }

        .container .secR {
            float: right;
            position: relative;
            padding: 40px 35px 40px 45px;
            width: 270px;
            height: 330px;
        }

        .container .secL h2 {
            font-size: 26px;
        }

        .container .secL p {
            font-size: 16px;
            line-height: 40px;
            margin-top: 30px;
        }

        .box-bg {
            position: absolute;
            top: 0;
            left: 0;
            opacity: .8;
            filter: alpha(opacity=80);
            width: 100%;
            height: 100%;
            background-color: #141924;
        }

        .form {
            position: absolute;
        }

        .form h1 {
            font-size: 18px;
        }

        .form p {
            font-size: 14px;
            color: #e9e9e9;
            margin-top: 15px;
        }

        p {
            display: block;
        }

        .form .item {
            margin-top: 20px;
            width: 255px;
        }

        .clearfix:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        .form .item label {
            width: 44px;
            height: 44px;
            background: #aaabab url("/assets/rgraph/icologin.png") center 10px no-repeat;
            border: none;
            display: block;
            float: left;
        }

        label {
            cursor: default;
        }

        .form .item input {
            width: 210px;
            height: 30px;
            padding: 7px 0;
            border: none;
            outline: none;
            font-size: 14px;
            line-height: 30px;
            text-indent: .5em;
            float: left;
            color: #333;
            font-weight: bold;
        }

        .form .itempass label {
            background-position: center -28px;
        }

        img[Attributes] {
            width: 75px;
            height: 30px;
        }

        .form .validatepic input {
            width: 100px;
            margin: 0 10px;
            height: 16px;
            line-height: 16px;
            font-size: 14px;
            float: none;
        }

        .form .validatepic a.changepic {
            color: #e0e0e0;
        }

        a {
            text-decoration: none;
            cursor: pointer;
        }

        .form .itemRadio a {
            color: #e0e0e0;
            width: 68px;
            margin: 2px 0px;
            height: 25px;
            line-height: 16px;
            font-size: 14px;
            float: none;
        }

        .form .item button {
            width: 255px;
            height: 46px;
            background: url("/assets/rgraph/loginbtn.png") left top no-repeat;
            border: none;
            cursor: pointer;
            text-align: center;
            line-height: 46px;
            font-size: 16px;
            font-weight: bold;
            color: #FFF;
        }
    </style>
</head>

<body>
    <div class="container clearfix">
        <!-----------------页面左侧文字------------------>
       <!--  <div class="secL">
            <h2>设备管理平台</h2>
            <p>
                融合WIFI审计设备T2、室外三防型AP、<br>
                室内吸顶式AP、终端特征采集等<br>
                多种采集设备，实现不同环境无线网络覆盖解决方案<br> 
                精准营销，为广告投放提供精准导向；

            </p>
        </div> -->
        <!-----------------页面右侧表单------------------>
        <div class="secR">
            <!-----页面右侧透明背景----->
            <div class="box-bg"></div>
            <!--------表单内容------------>
            <form action="/platform/login.do" method="post" name="frmLogin" id="form1">
                <div class="form">
                    <h1>登录平台</h1>
                    <p>
                        &nbsp;<span class="f9c442"> &nbsp;&nbsp;</span>&nbsp;
                    </p>
                    <div class="item clearfix">
                        <label for="userNameIpt"></label>
                        <input type="text" tabindex="1" id="userNameIpt" name="dtoUserName" notnull="true" info="用户名" placeholder="请输入用户名">
                    </div>
                    <div class="item itempass clearfix">
                        <label for="password"></label>
                        <input type="password" tabindex="2" id="password" name="password" notnull="true" info="密码" autocomplete="off" placeholder="请输入密码">
                    </div>
                    <div class="item validatepic clearfix">
                        <img id="Code" src="/admin.php/account/captcha" width="75" height="30" style="display: inline; float: left;">
                        <input id="enter" name="dtoUserCode" tabindex="3" class="ipt ipt-y f_l" type="text" style="margin-right: 5px; display: inline;"
                            notnull="true" info="验证码" autocomplete="off" disableautocomplete="">
                        <a tabindex="4" class="changepic" id="forGetPassword" href="javascript:;" onclick="$('#Code').get(0).src='/admin.php/account/captcha?t='+Math.random()">换一张?</a>
                    </div>
                    <div class="item itemRadio clearfix">
                        <!--[if !IE]><!--><input type="checkbox" style="float: left;width:13px;height: 25px" id="radioPass" onclick="checkbox();">&nbsp;记住密码
                        <!--<![endif]-->
                        <!--[if IE]> 
                        <input  type="checkbox" style="float: left;width:13px;height: 13px" id="radioPass"  onclick="checkbox();">&nbsp;记住密码</input>
                        <![endif]-->
                        <a href="javascript:;" style="float: right;">忘记密码?</a>
                    </div>

                    <div class="item">
                        <button type="button" tabindex="5" id="submitbutton" onkeydown="javascript:if(event.keyCode==13){event.returnValue = false}">登&nbsp;&nbsp;录</button>
                        <!--                        <input tabindex="4" onclick="loginSubmit();" class="loginButton" id="btnSubmit" value="登 录" type="button" onkeydown="javascript:if(event.keyCode==13){event.returnValue = false}"/> -->
                    </div>
                </div>
            </form>
        </div>
       <!--  <div style="position: relative; top:250px;left:150px;text-align: center;float:left;padding-left: 200px;">
            <a target="_blank" id="beianpath" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010402000328" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;Cursor:default;">
                <p id="beianhaoma" style="font-size:13px;color:transparent;">沪公网安备 31010402000328号</p>
            </a>
        </div> -->
    </div>
</body>

</html>

<script type="text/javascript">


    $(function(){
        var pattern=/[`~!@#\$%\^\&\*\(\)_\+<>\?:"\{},.\/;'[]]/im;  
        $("#submitbutton").click(function(){

            if (!form1.dtoUserName.value)
            {
                //jQuery.messager.alert('提示:','请输入用户名','info'); 
                alert('请输入用户名');
                return false;
            }
            else if (!form1.password.value)
            {
                alert('请输入密码');
                //jQuery.messager.alert('提示:','请输入密码','info'); 
                return false;
            }
            else if (!form1.dtoUserCode.value)
            {
                alert('请输入验证码');
                //jQuery.messager.alert('提示:','请输入验证码','info'); 
                return false;
            } 
            else if(pattern.test(form1.dtoUserName.value))
            {
                alert('用户不存在');
                return false;
            }
            else if(pattern.test(form1.password.value))
            {
                alert('密码输入错误');
                return false;
            }


            var parms = {

                    txtName: form1.dtoUserName.value,
                    txtPwd: form1.password.value,
                    code:form1.dtoUserCode.value
                    
            
                };
            FCore.Ajax.Post("/admin.php/account/dologin", parms, function (d)
            {
                if (d.Ok)
                {
                    window.location.href="/admin.php/frame";
                }
                else
                {
                    //jQuery.messager.alert('提示:',d.Msg.error,'info'); 
                    alert(d.Msg.error);
                }
            }) 

        })
            
        })

    function onsubmit()
    {

        
        
    }
    // $("body").keydown(function() {
    //     if (event.keyCode == "13") 
    // });
</script>