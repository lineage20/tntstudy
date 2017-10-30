/**
 * Created by tomtang on 2015/6/15.
 * Modify by tomtang on 2015/10/29
 */

(function($){
    $.fn.scrollText = function(options){
        var defaults = {
            speed: 50,    //Ĭ�϶�ù���һ��;
            rowHeight: 30,    //Ĭ�Ϲ������и�;
            type: 1,
            move: 500    //Ĭ�Ϲ����ٶ�;
        };
        var settings = $.extend({}, defaults, options), intId = [];
        function autoScroll(obj, rowHeight, type, move) {    //��������;
            switch (type)
            {
                case 1:
                    obj.find('ul').animate({
                        marginTop: -rowHeight
                    }, move, function () {
                        //������󣬰�ul�е�һ��li������е�ul����棬ͬʱ����ul�Ķ�����߾�Ϊ0;
                        $(this).css('marginTop', '0').find('li:first').appendTo($(this));
                    });
                    break;
                case 2:
                    obj.find('ul').animate({
                        marginTop: '-=1'    //ÿ�ι���1�ľ���;
                    }, 0, function () {
                        var s = Math.abs(parseInt($(this).css('marginTop')));    //ȡ��������;
                        if (s >= rowHeight) {
                            //�������������ڻ�����и�����е�ul����棬ͬʱ����ul�Ķ�����߾�Ϊ0;
                            $(this).css('marginTop', '0').find('li:first').appendTo($(this));
                        }
                    });
                    break;
            }
        }
        return this.each(function(i){    //�������ж�Ӧ�Ķ��󣬵�������ul;
            var rowHeight = settings.rowHeight, speed = settings.speed, type = settings.type, move = settings.move, _this = $(this);
            intId[i] = setInterval(function(){
                if (_this.find('ul').height() <= _this.height()) {    //���ul����С�ڶ��������ĸ߶��򲻹���;
                    clearInterval(intId[i]);
                }else{
                    autoScroll(_this,rowHeight,type, move);
                }
            },speed) ;
            _this.hover(function(){    //����ȥ����������ƿ����ӹ���;
                clearInterval(intId[i]);
            },function(){
                intId[i] = setInterval(function(){
                    if (_this.find('ul').height() <= _this.height()) {
                        clearInterval(intId[i]);
                    }else{
                        autoScroll(_this,rowHeight,type, move);
                    }
                },speed);
            });
        });
    };
})(jQuery);