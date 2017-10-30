/// <reference path="../../jquery-1.11.1.min.js" />
/// <reference path="../FCode/101FCore.core.js" />
/// <reference path="../FCode/107.FCore.Sha1.js" />

$(function ()
{
    $(".alink").click(menuLinkClick);

    $(".dropdown-toggle").click(function ()
    {
        $(this).addClass("active").siblings().removeClass("active");

        //$("#breadcrumb").find("li:not(:first)").remove().end().append("<li class='active'>" + $(this).text() + "</li>")
        
        //$("#bigtitle").text($(this).text());
    });




});

//左边主菜单单击
function menuLinkClick()
{
    $(".nav .active").removeClass("active");
    
    $(this).parent().addClass("active").end().parent().parent().parent().addClass("open").addClass("active");
    
    $("#frameContent").attr("src", $(this).attr("href"));

    var prev = $(this).parent().parent().prev().text().replace(/\s/gi,"");
    //prev = prev ? "<li>" + prev + "</li>" : "";
    
    //$("#breadcrumb").find("li:not(:first)").remove().end().append(prev).append("<li class='active'>" + $(this).text() + "</li>")

    var d = [];
    if (prev) d.push({ text: prev });
    d.push({ text: $(this).text() });
    breadcrumbUpdate(d);

    $("#bigtitle").text($(this).text());

    return false;
}


function breadcrumbUpdate(d)
{
    var tem = [];

    $.each(d, function (i, e)
    {
        tem.push("<li class='active'>")
        if (e.url)
        {
            tem.push("<a href='" + e.url + "'>" + e.text + "</a>");
        }
        else
        {
            tem.push(e.text)
        }
        tem.push("</li>")
    });
    
    $("#breadcrumb").find("li:not(:first)").remove().end().append(tem.join(""));
}
