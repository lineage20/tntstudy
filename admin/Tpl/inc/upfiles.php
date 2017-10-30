<div id="divCover" style="width:160px;height:100px;overflow:hidden;margin-top:5px;margin-right:10px;cursor:pointer" onclick="$('#upfile').click()">
    <img src="/assets/img/wait.gif" class="wait" style="position:absolute;z-index:99999;margin:35px auto auto 65px;display:none;"/>
    <img src="/assets/img/defaultcover.png" class="imgcover" id="imgCover" onclick="$('#upfile').click()" style="height:100px;"/>
                        
    <a class="bt_submit" style="display:none; " onclick="$('#upfile').click()">上传</a> 
               
</div>

<div style="display:none">
    <form id="frmCover" action="/upfiles" enctype="multipart/form-data" accept-charset="utf-8" method="post">
        <input type="file" name="upfile" id="upfile" /><br>
        <input type="text" name="folder" id="folder" value="sr" />
        <input type="submit" value="上传" id="btnSubmit" />
    </form>
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

                    var path = d.Msg.full_path.substr(d.Msg.full_path.indexOf('/upload/'));
                                        
                    if (/\.mp3$/i.test(path))
                    {
                        $("#imgCover").attr("src", "/assets/img/mp3.png");
                    }
                    else if (/\.mp4$/i.test(path))
                    {
                        $("#imgCover").attr("src", "/assets/img/mp4.png");
                    }
                    else
                    {
                        $("#imgCover").attr("src", path);
                    }
                    
                    $("#txtUrl").val(path);
                }
                else
                {
                    alert("文件上传失败，请联系管理员");
                }
            }
        };
                
        $("#upfile").change(function(){
            $(".wait").show();
            $('#frmCover').ajaxSubmit(options);        
        });
            
    });
</script>