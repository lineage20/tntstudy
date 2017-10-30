
/// <reference path="../JsLib/jquery-1.8.0.min.js" />
/// <reference path="../JsLib/jquery-easyui-1.3.2/jquery.easyui.min.js" />

$(function ()
{
    resize();
});

window.onresize = resize;
function resize()
{
    var cw = document.documentElement.clientWidth; // 可见区域宽度
    var ch = document.documentElement.clientHeight - 10;  // 可见区域高度

    $("#" + DataGrid.id).datagrid("resize", {
        width: cw,
        height: ch
    });
}
