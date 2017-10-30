
$(function ()
{
    //语言选项
    $(".lang-select").hover(function () { $(".lang-select>div").show(); }, function () { $(".lang-select>div").hide(); });

});


//打开QQ客服
function callQQ()
{
    window.open('http://b.qq.com/webc.htm?new=0&sid=4009600198&o=livall.com&q=7', '_blank', 'height=502, width=644,toolbar=no,scrollbars=no,menubar=no,status=no');
}

//弹出微信二维码
function popWxQRcode()
{
    layer.open({
        type: 1,
        title: false,
        area: ['580px', '335px'],
        shade: 0.8,
        closeBtn: false,
        shadeClose: true,
        content: "<img src='/assets/img/cn/wxqrcode.png'/>"
    });
}

//弹出微信商城
function popWxShop()
{
    layer.open({
        type: 1,
        title: false,
        area: ['400px', '427px'],
        shade: 0.8,
        closeBtn: false,
        shadeClose: true,
        content: "<img src='/assets/img/wx.livall.com.png'/>"
    });
}
