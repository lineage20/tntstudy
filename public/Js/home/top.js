function showtoup() {
    var scrollHeight = $(window).scrollTop();
    if(scrollHeight > 200){
        $("#toup").show();
    }else{
        $("#toup").hide();
    }
}

function goTop(acceleration, time) {
         acceleration = acceleration || 0.1;
         time = time || 10;

         var x1 = 0;
         var y1 = 0;
         var x2 = 0;
         var y2 = 0;
         var x3 = 0;
         var y3 = 0;

         if (document.documentElement) {
                 x1 = document.documentElement.scrollLeft || 0;
                 y1 = document.documentElement.scrollTop || 0;
         }
         if (document.body) {
                 x2 = document.body.scrollLeft || 0;
                 y2 = document.body.scrollTop || 0;
         }
         var x3 = window.scrollX || 0;
         var y3 = window.scrollY || 0;

         // 婊氬姩鏉″埌椤甸潰椤堕儴鐨勬按骞宠窛绂�
        var x = Math.max(x1, Math.max(x2, x3));
         // 婊氬姩鏉″埌椤甸潰椤堕儴鐨勫瀭鐩磋窛绂�
        var y = Math.max(y1, Math.max(y2, y3));

         // 婊氬姩璺濈 = 鐩墠璺濈 / 閫熷害, 鍥犱负璺濈鍘熸潵瓒婂皬, 閫熷害鏄ぇ浜� 1 鐨勬暟, 鎵€浠ユ粴鍔ㄨ窛绂讳細瓒婃潵瓒婂皬
        var speed = 1 + acceleration;
         window.scrollTo(Math.floor(x / speed), Math.floor(y / speed));

         // 濡傛灉璺濈涓嶄负闆�, 缁х画璋冪敤杩唬鏈嚱鏁�
        if(x > 0 || y > 0) {
                 var invokeFunction = "goTop(" + acceleration + ", " + time + ")";
                 window.setTimeout(invokeFunction, time);
         }
 }

// _attachEvent(window, 'scroll',
// function() {
//     showtoup()
// });
$(window).scroll(function () {
    showtoup();
});