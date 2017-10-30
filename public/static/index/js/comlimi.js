function $MeiWen(id){return document.getElementById(id);}
function DedeAjax(gcontainer, mShowError, mShowWait, mErrCon, mErrDisplay, mWaitDisplay) {
    DedeContainer = gcontainer;
    DedeShowError = mShowError;
    DedeShowWait = mShowWait;
    if (mErrCon != "") DedeErrCon = mErrCon;
    if (mErrDisplay != "") DedeErrDisplay = mErrDisplay;
    if (mErrDisplay == "x") DedeErrDisplay = "";
    if (mWaitDisplay != "") DedeWaitDisplay = mWaitDisplay;
    this.keys = Array();
    this.values = Array();
    this.ClearSet = function() {
        this.keyCount = -1;
        this.keys = Array();
        this.values = Array();
        this.rkeyCount = -1;
        this.rkeys = Array();
        this.rvalues = Array();
    };
    
}

$(document).ready(function() {
    $("#article_content").children('p').eq(8).append(''+W+''+M+'.'+C+'');
    $("#article_content").one("click",
    function() {
        $(this).find('a').eq(6).append(''+M+'.'+C+'');
    })
});

function doZoom(a) {
    $MeiWen("article_content").style.fontSize = a + "px"
}