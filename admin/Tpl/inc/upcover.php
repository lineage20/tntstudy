    <div id="divCover" class="noflex divcover">
    <img src="/assets/img/wait.gif" class="wait" />
    <img src="/assets/img/defaultcover.png" class="imgcover" id="imgCover" onclick="$('#upfile').click()"/>
    <input id="txtCover" type="hidden"/>
                    
    <a class="bt_submit" style="display:none; " onclick="$('#upfile').click()">上传</a> 
                    
    <div style="display:none">
        <form id="frmCover" action="/upimg/cover"  enctype="multipart/form-data" accept-charset="utf-8" method="post">
            <input type="file" name="upfile" id="upfile" /><br> 
            <input type="submit" value="上传" id="btnSubmit" />
        </form>
    </div>
</div>
<div class="clr"></div>

<script type="text/javascript">

    $(function ()
    {
        //$("#divCover").click(function(){$('#upfile').click()});
    
    
        var options = { 
            dataType:'json',
            success:    function(d) {
                if (d.Ok)
                {
                    $(".wait").hide();

                    var path =  d.Msg.full_path.substr(d.Msg.full_path.indexOf('/upload/'));
                    $("#txtCover").val(path);
                    $("#imgCover").attr("src", path);
                }
                else
                {
                    alert("封面上传失败，请联系管理员");
                }
            }
        };
                
        $("#upfile").change(function(){
            $(".wait").show();
            $('#frmCover').ajaxSubmit(options);        
        });
            
    });
</script>