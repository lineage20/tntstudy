<script>


        var upfiles = {
            init: function (key)
            {
                $("#" + key).append("<form id='frm"+key+"' action='/upfiles' enctype='multipart/form-data' accept-charset='utf-8' method='post'><input type='file' name='upfile' id='up"+key+"' /></form>");
                
                $("#up" + key).change(function ()
                {
                    $("#" + key+" .wait").show();

                    $('#frm' + key).ajaxSubmit({
                        dataType: 'json',
                        success: function (d)
                        {
                            // $("#" + key + " .wait").hide();
                            if (d.Ok)
                            {
                                // var route = upfiles.getRoute(d.Msg);                                                                
                                // $("#img" + key).attr("src", route.cover);
                                // $("#txt" + key).val(route.path);
                                alert("文件上传成功");
                            }
                            else
                            {
                                alert("文件上传失败，请联系管理员");
                            }
                        }
                    });
                });
            },

            getRoute: function (d)
            {
                var rst = { path: "", cover: "" };
                rst.path = d.full_path.substr(d.full_path.indexOf('/upload/'));
                if (!rst.path) rst.cover= "/assets/img/defaultcover.png";

                if (!(/\.jpg$/i.test(rst.path) || /\.bmp$/i.test(rst.path) || /\.gif$/i.test(rst.path) || /\.png$/i.test(rst.path)))
                {
                    rst.cover = "/assets/img/" + d.file_ext.replace(".", "") + ".png";
                }
                else
                {
                    rst.cover=rst.path;
                }
                return rst;
            }

        }


         

</script>