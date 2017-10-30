<?php if (!defined('THINK_PATH')) exit(); include('./admin/Tpl/inc/header.php') ; ?>
<?php include('./admin/Tpl/inc/jsreference.php'); ?>


<table id="tbList"></table>

<div style="display:none;">
    <div id="tb" style="height:auto;padding:10px;">

        <?php foreach($data as $vo):?>
            <?php echo $vo;?>
        <?php endforeach;?>
       <!--  <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add'" id="btnAdd">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-edit'" id="btnEdit">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" id="btnDel">删除</a> -->

    </div>

    <div id="dialogAdd">
        <ul class="ulform">
             <li>
                <label>父功能：</label>
                <span>
                    <input class="easyui-combotree cbbx"
                           id="ddlPFunction"
                           data-options="
                                 url:'/admin.php/pms/functions_ddl',
								panelHeight:300,editable:false
						" />
                </span>
            </li>

            <li>
                <label>功能名称</label>
                <input id="txtName" type="text" style="width: 189px" />
            </li>
            <li>
                <label>排序</label>
                <input id="txtSort" type="text" style="width: 189px" />
            </li>            
            <li>
                <label>样式</label>
                <input id="txtStyle" type="text" style="width: 189px" />
            </li>
            <li>
                <label>URL</label>
                <input id="txtUrl" type="text" style="width: 189px" />
            </li>
            <li>
                <label>备注</label>
                <textarea id="txtRemark"></textarea>
            </li>
            
        </ul>
    </div>
</div>


    <script type="text/javascript">
        var dg;

        $(function ()
        {
            dg = new FCore.TreeGrid("tbList", loadData);

            dg.options.columns = [[
                 { field: 'id', title: 'Id', width: 60 },
                 { field: 'text', title: '功能名称', width: 200 },
                 { field: 'fsort', title: '排序', width: 50 },
                 { field: 'fstyle', title: '样式', width: 100 },
                 { field: 'furl', title: 'URL', width: 200 },
                 { field: 'fremark', title: '备注', width: 300 }                 
            ]];

            dg.options.title = "";
            dg.options.toolbar = "#tb";
            dg.options.treeField = "text";
            dg.options.onClickCell = function () { };
            dg.options.idField = "id";

            dg.init();
            dg.load();

            $("#btnAdd").click(btnAdd_Click);
            $("#btnEdit").click(btnEdit_Click);
            $("#btnDel").click(btnDel_Click);

        });

        function loadData()
        {
            FCore.Ajax.Post("/admin.php/pms/functions_getlist", null, function (data)
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
        // function btnDel_Click(){
        //     openAddDialog("del");//
        // }

        function openAddDialog(type)
        {
            var sel, title;
            $("#txtName,#txtRemark,#txtSort,#txtStyle,#txtSort").val("");
            //$("#ddlPFunction").combotree("setValue", "");
            title = "新增";

            if (type == "edit")
            {
                try
                {
                    sel = dg.getSelected();
                }
                catch(e)
                {
                   jQuery.messager.alert('提示:','请选择要编辑的行!','info'); 
                return; 
                }
                

                title = "编辑";

                console.log(JSON.stringify(sel));

                $("#txtName").val(sel.text);
                $("#txtSort").val(sel.fsort);
                $("#txtStyle").val(sel.fstyle);
                $("#txtUrl").val(sel.furl);
                $("#txtRemark").val(sel.fremark);
                $("#ddlPFunction").combotree("setValue", sel.parentid);                              
            }
            // if(type=="del"){
            //      try
            //     {
            //         sel = dg.getSelected();
            //     }
            //     catch(e)
            //     {
            //        jQuery.messager.alert('提示:','请选择要删除的行!','info'); 
            //     return; 
            //     }
            //      $.messager.confirm("删除", "确定要删除吗？", function (r)
            //     {
            //         if (r)
            //         {
            //             FCore.Ajax.Post("/pms/functions/delete/" + parms.id, null, function (d)
            //             {
            //                 if (d.Ok)
            //                 {
            //                     loadData();
            //                 }
            //                 else
            //                 {
            //                     FCore.Alert.Error(d.Msg);
            //                 }
            //             });
            //         }

            //     });

            // }


            $("#dialogAdd").dialog({
                //closed: true,
                iconCls: "icon-" + type,
                modal: true,
                resizable: true,
                title: title,
                width: 500,//document.documentElement.clientWidth,
                height: 300,//document.documentElement.clientHeight,
                buttons: [{
                    text: "确定",
                    iconCls: 'icon-ok',
                    handler: function ()
                    {
                        //确定 按钮事件
                        //收集提交数据

                        var parms = {
                            fid: type == "edit" ? sel.id : 0,
                            fname: $("#txtName").val(),
                            fsort: $("#txtSort").val(),
                            fstyle: $("#txtStyle").val(),
                            furl: $("#txtUrl").val(),
                            fremark: $("#txtRemark").val(),
                            fparentid: $("#ddlPFunction").combotree("getValue") || 0
                        };
                           
                        if (!parms.fparentid)
                        {
                            jQuery.messager.alert('提示:','请选择父功能!','info'); 
                            return false;
                        }
                        else if (!parms.fname)
                        {
                            jQuery.messager.alert('提示:','请选择功能名称!','info'); 
                            return false;
                        }
                        else
                        {                     
                            FCore.Ajax.Post("/admin.php/pms/functions_save", parms, function (d)
                            {
                                if (d.Ok)
                                {
                                    $("#dialogAdd").dialog("close");
                                    loadData();
                                }
                                else
                                {
                                    alert(d.Msg);
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


        function GetId(node)
        {
            var ids = [];

            $.each(node, function (i, e)
            {
                ids.push(e.id);
                if (e.children)
                {
                    ids.concat(GetId(e.children))
                }
            });

            return ids;
        }




        function btnDel_Click()
        {          
            // var parms = dg.getSelected();
            try{
                var parms = dg.getSelected();
            }catch(e){
                $.messager.alert('提示', '请选择要删除的行!', 'info')
                return;
            }
             if (parms)
             {
                $.messager.confirm("删除", "确定要删除吗？", function (r)
                {
                    if (r)
                    {
                        FCore.Ajax.Post("/admin.php/pms/functions_delete/id/" + parms.id, null, function (d)
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
            // else
            // {
            //     $.messager.alert('提示', '请选择删除的行!', 'info')
            // }
        }



    </script>









<?php include('./Tpl/inc/footer.php'); ?>