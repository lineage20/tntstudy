/// <reference path="../../lib/fcore/fcore.js" />



var ROOT = "";

//common function

var dgFormatter = {

    date: function (val, row)
    {
        return val ? val.substring(0, 10) : "";
    },


    yesNo: function (val, row)
    {
        return "<span style='color:#" + (val == "1" ? "080'>是" : "888'>否") + "</span>";
    },

    money: function (val, row)
    {
        return "<div style='text-align:right'>" + (val ? val.format("N", 2) : "0.00") + "</div>";
    },


    moneySymbol: function (val, row)
    {
        return "<div style='text-align:right'>" + (val ? val.format("N", 2, true) : "0.00") + "</div>";
    },


    enabled: function (val, row)
    {
        //return val == "1" ? "启用" : "禁用";
        return "<span style='color:#" + (val == "1" ? "080'>已启用" : "F00'>已禁用") + "</span>";
    },

    language: function (val, row)
    {
        switch (val)
        {
            case "cn":
                return "简体中文";
                break;
            case "tw":
                return "繁體中文";
                break;
            case "en":
                return "English";
                break;
        }
    },
    intToDate: function (val, row)
    {
        return FCore.Date.Format(FCore.Convert.ToDate(val), "yyyy-MM-dd");
    },
    intToDateTime: function (val, row)
    {
        return FCore.Date.Format(FCore.Convert.ToDate(val), "yyyy-MM-dd hh:mm:ss");
    },
    img: function (val, row)
    {
        return "<img src='" + val + "' style='height:50px;' />";
    }

};




//日期控件格式
function datetimeboxFormatter(date)
{
    var y = date.getFullYear();
    var m = date.getMonth() + 1;
    var d = date.getDate();
    var h = date.getHours();
    var mi = date.getMinutes();
    return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d) + ' ' + (h < 10 ? ('0' + h) : h) + ':' + (mi < 10 ? ('0' + mi) : mi);
}
function datetimeboxParser(s)
{
    if (!s) return new Date();
    var ss = (s.split(' '));
    var D = (ss[0].split('-'));
    var T = (ss[1].split(':'));
    var y = parseInt(D[0], 10);
    var m = parseInt(D[1], 10);
    var d = parseInt(D[2], 10);

    var h = parseInt(T[0], 10);
    var mi = parseInt(T[1], 10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d) && !isNaN(h) && !isNaN(mi))
    {
        return new Date(y, m - 1, d, h, mi);
    } else
    {
        return new Date();
    }
}


function checkeURL(URL){
	var str=URL;
	//在JavaScript中，正则表达式只能使用"/"开头和结束，不能使用双引号
	//判断URL地址的正则表达式为:http(s)?://([\w-]+\.)+[\w-]+(/[\w- ./?%&=]*)?
	//下面的代码中应用了转义字符"\"输出一个字符"/"
	var Expression=/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
	return true;
	}else{
	return false;
	}
	if(URL.indexOf("http")>0)
	{
		return false;
	}
	
	} 

function checkMAC(URL){
		var temp = /[A-Fa-f0-9]{2}:[A-Fa-f0-9]{2}:[A-Fa-f0-9]{2}:[A-Fa-f0-9]{2}:[A-Fa-f0-9]{2}:[A-Fa-f0-9]{2}/;
		if (!temp.test(URL))
		{
		     return false;
		}
	} 

function macFormCheck(mac)
{   
    var macs = new Array();
    macs = mac.split(":");

 
    if(macs.length != 6){
        jQuery.messager.alert('提示:','输入的mac地址格式不正确!','info'); 
        return false;
    }

 
    for (var s=0; s<6; s++) {
        var temp = parseInt(macs[s],16);

        if(isNaN(temp))
        {
        	jQuery.messager.alert('提示:','输入的mac地址格式不正确!','info');  
         return false;   
        }

 
           if(temp < 0 || temp > 255){
        	   jQuery.messager.alert('提示:','输入的mac地址格式不正确!','info');   
         return false;   
     }
    }

 
    return true;
}


function isIP(ip)  
{  
    var reSpaceCheck = /^(\d+)\.(\d+)\.(\d+)\.(\d+)$/;  
    if (reSpaceCheck.test(ip))  
    {  
        ip.match(reSpaceCheck);  
        if (RegExp.$1<=255&&RegExp.$1>=0  
          &&RegExp.$2<=255&&RegExp.$2>=0  
          &&RegExp.$3<=255&&RegExp.$3>=0  
          &&RegExp.$4<=255&&RegExp.$4>=0)  
        {  
            return true;   
        }else  
        {  
            return false;  
        }  
    }else  
    {  
        return false;  
    }  
}
//验证组织机构合法性方法  
function CheckOrgCode(code) {
    //机构代码
    var ws = [3, 7, 9, 10, 5, 8, 4, 2];
    var str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var reg = /^([0-9A-Z]){8}-[0-9|X]$/;// /^[A-Za-z0-9]{8}-[A-Za-z0-9]{1}$/
    var sum = 0;
    for (var i = 0; i < 8; i++){
        sum += str.indexOf(code.charAt(i)) * ws[i];
    }
    var c9 = 11 - (sum % 11);
    c9 = c9 == 10 ? 'X' : c9
    if (!reg.test(code) || c9 == code.charAt(9)) {
        return false;
    }
    return true;
} 


$(function ()
{
    $(".input-numeric").keydown(function (e)
    {
        var c = e.keyCode;
        if ((c >= 48 && c <= 57) || (c >= 96 && c <= 105) || c == 110 || c == 190 || c == 8 || c == 46)
        {
            if ((c == 110 || c == 190) && $(this).val().indexOf('.') > 0)
            {
                e.preventDefault();
            }
        }
        else
        {
            e.preventDefault(); //取消
        }

    }).keyup(function (e)
    {
        var numstr = $(this).val();
        if (numstr.substring(0, 1) == '0')
        {
            $(this).val(parseFloat(numstr));
        }
    });


});
