<?php if (!defined('THINK_PATH')) exit(); include('./admin/Tpl/inc/header.php') ; ?>
<?php include('./admin/Tpl/inc/jsreference.php'); ?>
<?php include('./admin/Tpl/inc/editor.php'); ?>
<script type="text/javascript">var ue = UE.getEditor('editor');</script>
<style>
    #dialogMap {background: #438EB9 none repeat scroll 0% 0%; position: absolute; width: 800px; height: 600px; margin: auto; top: 10px; z-index: 9999; border-radius: 20px; padding: 20px; display: none; border-width: 1px 5px 5px 1px; border-style: solid; border-color: #CCC; font-size: 14px; color:#fff; }
    .textstyle {width: 750px; height: 130px; max-width: 1000px; font-size: 14px; }
    b {color:red; }
</style>
<table id="tbList"></table>
<div style="display:none;">
    <div id="tb" style="height:auto;padding:10px;">
     <fieldset>
         <legend>过滤</legend> 
         <?php foreach($data as $vo):?>
            <?php echo $vo;?>
        <?php endforeach;?>
         <label style="margin-left: 20px;">设备SN：</label>
         <input id="ssn" type="text" class="txtinput" placeholder="设备SN" value="" autocomplete="off" style="width:120px"/>
         <label style="margin-left: 20px;">设备型号:</label>
         <input class="easyui-combobox cbbx" id="smodel"/>
         <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search'" onclick="loadData()" style="margin-left: 20px;">查询</a>
     </fieldset>
 </div>

    <div id="dialogAdd">
        <div style="height:auto;">
            <ul class="ulform" style="height:auto;float:left;width:400px;border:none;">   
                <li>
                    <label>文章类型<b>*</b>:</label>
                    <input id="type" type="text" class="easyui-combobox" />
                </li>
                <li>
                    <label>文章标题<b>*</b>:</label>
                    <input id="title" type="text" class="txtinput" />
                </li> 
                <li>
                    <label>文章摘要<b>*</b>:</label>
                    <input id="remark" type="text" class="txtinput" />
                </li>
                 <li>
                    <label>文章内容:</label>
                    <div id="myEditor">
                    <script id="editor"  name="editorValue" type="text/plain" style="width:90%;height:40px;">
                     
                    </script>
                  </div>
                </li>               
            </ul>
            <div style="clear:both"></div>
        </div>


      
    </div>

    </div>

    <script type="text/javascript">
        var dg;
        var defaultcover = "/assets/img/defaultcover.png";
        $(function ()
        {
              dg = new FCore.DataGrid("tbList", loadData);
              dg.options.singleSelect = false;
              dg.options.columns = [[
              { field: 'id', title: '设备SN码', width: 100,align:'center',sortable:'true',checkbox: true },
              { field: 'type', title: '设备SN码', width: 100,align:'center',sortable:'true' },
              { field: 'title', title: '设备组名称', width: 100,align:'center',sortable:'true' },
              { field: 'remark', title: '设备型号', width: 100,align:'center' ,sortable:'true'},
              // { field: 'content', title: '安装信息', width: 70,align:'center',sortable:'true'},
              { field: 'images', title: '标签信息', width: 70,align:'center',sortable:'true'},
              { field: 'hits', title: '经度', width: 150,align:'center' ,sortable:'true'},
              { field: 'time', title: '纬度', width: 120,align:'center' ,sortable:'true'},
              { field: 'href', title: '室内坐标X', width: 70,align:'center',sortable:'true'},
            ]];

             dg.options.pageSize = 30;
             dg.options.title = "";
             dg.options.toolbar = "#tb";
             dg.init();
             dg.load();

            $('#model').combobox({
                  url:'/sniff/control/getmodel',   
                  editable:false, //不可编辑状态  
                  cache: false,  
                  panelHeight:'auto',
                  valueField:'text',     
                  textField:'text',
            });
            $('#smodel').combobox('select',"全部");
            $("#btnAdd").click(btnAdd_Click);
            $("#btnEdit").click(btnEdit_Click);
            $("#btnDel").click(btnDel_Click);
        });

        function loadData()
        {
            var parms = {
                sn:$("#ssn").val(),
                model:$("#smodel").combobox("getValue"),
                PageIndex: dg.getPageIndex(),
                PageSize: dg.getPageSize()
        };

        FCore.Ajax.Post("/admin.php/sniff/control_getlist", parms, function (data)
          {
            dg.update(data);
          });
        }

        function btnAdd_Click()
        {
          openAddDialog("add");
        }


        function btnEdit_Click()
        {
            openAddDialog("edit");
        }
        function openAddDialog(type)
        {
            var sel, title;
            $("#sn,#model,#longitude,#latitude,#coordx,#coordy,#address,#installinfo,#signinfo,#createperson,#installtime,#province,#city,#area,#createperson,#txtcoordinate").val("");

            title = "新增";

            $("#ddlprovince").combobox("clear");
            $("#ddlcity").combobox("clear");
            $("#ddlarea").combobox("clear");
            $("#model").combobox("clear");
            $("#group").combobox("clear");
            $("#createperson").combobox("clear"); 
            $("#installinfo").combobox("clear");
            $("#installtime").datetimebox("clear");

            if (type == "edit")
            {
                sel = dg.getSelected();
                if (!sel)
                {
                    $.messager.alert('提示', '请选择要编辑的行!', 'info')
                    return;
                }
                title = "编辑";

                $("#title").val(sel.title);
                $("#remark").val(sel.remark);
                $("#type").combobox("setValue",sel.type);
                // KindEditor.html('#v_content',sel.content);  
                $("#editor").val(sel.content)

            }
            $("#dialogAdd").dialog({
                iconCls: "icon-add",
                modal: true,
                resizable: true,
                title: title,
                width: 880,
                height: 350,  
                buttons: [{
                    text: "确定",
                    iconCls: 'icon-ok',
                    handler: function ()
                    {
                        //确定 按钮事件
                        //收集提交数据
                        var parms = {
                            id: type == "edit" ? sel.id : 0,
                            sn: $("#sn").val(),
                            model: $("#model").combobox("getValue"),
                            longitude: $("#longitude").val(),
                            latitude: $("#latitude").val(),
                            coordx:$("#coordx").val(),
                            coordy:$("#coordy").val(),
                            address:$("#address").val(),
                            installinfo: $("#installinfo").combobox("getValue"),
                            signinfo: $("#signinfo").val(),
                            createperson: $("#createperson").combobox("getValue"),
                            installtime:$("#installtime").datetimebox("getValue"),
                            ddlprovince: $("#ddlprovince").combobox("getValue")||0,
                            ddlcity: $("#ddlcity").combobox("getValue")||0,
                            ddlarea: $("#ddlarea").combobox("getValue")||0,
                            createperson: $("#createperson").combobox("getValue")||0,
                            coordinate: $("#txtcoordinate").val(),
                            company_id:$("#group").combobox("getValue"),
                        };
                        
                        if (!parms.sn)
                        {
                            jQuery.messager.alert('提示:','请填写设备sn!','info'); 
                            return false;
                        }
                        if (!parms.company_id)
                        {
                            jQuery.messager.alert('提示:','请选择设备组!','info'); 
                            return false;
                        }
                        else if(!parms.model)
                        {
                            jQuery.messager.alert('提示:','请选择设备型号!','info'); 
                            return false;
                        }
                        else if (!parms.ddlprovince)
                        {
                             jQuery.messager.alert('提示:','请选择省份!','info'); 
                            return false;
                        }
                        else if (!parms.ddlcity)
                        {
                             jQuery.messager.alert('提示:','请选择城市!','info'); 
                            return false;
                        }
                        else if (!parms.ddlarea)
                        {
                             jQuery.messager.alert('提示:','请选择县/区!','info'); 
                            return false;
                        }
                        else if (!parms.address)
                        {
                             jQuery.messager.alert('提示:','请填写地址','info'); 
                            return false;
                        }
                        else if (!parms.coordinate)
                        {
                             jQuery.messager.alert('提示:','请点击地图定位经纬度坐标','info'); 
                            return false;
                        }
                        else
                        {
                            FCore.Ajax.Post("/sniff/control/save", parms, function (d)
                            {
                                if (d.Ok)
                                {
                                    $("#dialogAdd").dialog("close");
                                    loadData();
                                }
                                else
                                {
                                    jQuery.messager.alert('提示:',d.Msg,'info'); 
                                    return false;
                                }
                            });
                        }

                    }
                }, {
                    text: "取消", iconCls: 'icon-cancel',
                    handler: function ()
                    {
                        //取消 按钮事件
                        $("#dialogAdd").dialog("close");
                    }
                }]

            });

        }

        function btnDel_Click()
        {
            var parms = dg.getSelections();


            if (parms&&parms.length >0)
            {
                $.messager.confirm("删除", "确定要删除吗？", function (r)
                {
                    if (r)
                    {
                        var ids = [];
                         $.each(parms, function (i,e)
                         {
                             ids.push(e.id);
                         });
                        FCore.Ajax.Post("/sniff/control/delete" ,{ids:ids.join()}, function (d)
                        {
                            if (d.Ok)
                            {
                                loadData();
                            }
                            else
                            {
                                FCore.Alert.Error(d.Msg);
                            }
                        });
                    }

                });

            }
            else
            {
                $.messager.alert('提示', '请选择删除的行!', 'info')
            }
        }
</script>     

<?php include('./Tpl/inc/footer.php'); ?>