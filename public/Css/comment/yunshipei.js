var oUrl = location.href;
function getUrl()
{
var shortUrl;
if(oUrl.indexOf('top.chinadaily.com.cn') !== -1){shortUrl = 'top' ; return shortUrl;}
else if(oUrl.indexOf('cn.chinadaily.com.cn') !== -1){shortUrl = 'cn' ; return shortUrl;}
else if(oUrl.indexOf('china.chinadaily.com.cn') !== -1){shortUrl = 'china' ; return shortUrl;}
else if(oUrl.indexOf('world.chinadaily.com.cn') !== -1){shortUrl = 'world' ; return shortUrl;}
else if(oUrl.indexOf('cnews.chinadaily.com.cn') !== -1){shortUrl = 'cnews' ; return shortUrl;}
else if(oUrl.indexOf('caijing.chinadaily.com.cn') !== -1){shortUrl = 'caijing' ; return shortUrl;}
else if(oUrl.indexOf('finance.chinadaily.com.cn') !== -1){shortUrl = 'finance' ; return shortUrl;}
else if(oUrl.indexOf('fashion.chinadaily.com.cn') !== -1){shortUrl = 'fashion' ; return shortUrl;}
else if(oUrl.indexOf('ent.chinadaily.com.cn') !== -1){shortUrl = 'ent' ; return shortUrl;}
else if(oUrl.indexOf('pic.chinadaily.com.cn') !== -1){shortUrl = 'pic' ; return shortUrl;}
}
var lastUrl = getUrl(oUrl);
document.write('<script type=\"text/javascript\" src=\"http://www.chinadaily.com.cn/js/2016/yunshipei_' + lastUrl + '.js\"></script>');
