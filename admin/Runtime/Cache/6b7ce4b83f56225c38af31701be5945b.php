<?php if (!defined('THINK_PATH')) exit(); include('./admin/Tpl/inc/header.php') ; ?>
<?php include('./admin/Tpl/inc/jsreference.php'); ?>

<table id="tbList"></table>

<div style="display:none;">
    <div id="tb" style="height:auto;padding:10px;">
     <fieldset>
        <legend>过滤</legend>
        <?php foreach($data as $vo):?>
            <?php echo $vo;?>
        <?php endforeach;?>
        <!-- <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add'" id="btnAdd">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-edit'" id="btnEdit">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" id="btnDel">删除</a> -->
        <label style="margin-left: 20px;">地址:</label>
        <input id="ddlprovince" class="easyui-combobox" data-options="width:85"/>
        <input id="ddlcity" class="easyui-combobox" data-options="width:85"/>
        <input id="ddlarea" class="easyui-combobox" data-options="width:85"/>
        <input id="address" class="txtinput" tyle="text" style="width:120px"/>
        &nbsp;
        <label>名称：</label>
        <input id="stxtName" type="text" class="txtinput" placeholder="请输入名称" value="" autocomplete="off" style="width:120px"/>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search'" onclick="loadData()" style="margin-left: 20px;">查询</a>
    </br>
</fieldset>
</div>
<div id="dialogAdd">
    <ul class="ulform">
        <li>
            <label>名称<b>*</b>:</label>
            <input id="txtName" type="text"/>
        </li>
        <li>
            <label>地区<b>*</b>:</label>
            <input id="ddlprovincetxt" class="easyui-combobox" data-options="width:85"/>
            <input id="ddlcitytxt" class="easyui-combobox" data-options="width:85"/>
            <input id="ddlareatxt" class="easyui-combobox" data-options="width:85"/>
        </li>
        <li>
            <label>地址<b>*</b>:</label>
            <input id="txtAddress" type="text"/>
        </li> 
        <li>
            <label>联系人<b>*</b>:</label>
            <input id="txtContact" type="text"/>
        </li> 
        <li>
            <label>联系电话<b>*</b>:</label>
            <input id="txtPhoneNum" type="text"/>
        </li> 
    </ul>

</div>

</div>

<script type="text/javascript">
    var dg;

    $(function ()
    {
        dg = new FCore.DataGrid("tbList", loadData);
        dg.options.singleSelect = false;
        dg.options.columns = [[
            { field: 'id', title: '编号', width: 50,align:'center' ,sortable:'true',checkbox:true},
            { field: 'name', title: '名称', width: 150,align:'center',sortable:'true'},
            { field: 'address', title: '地址', width: 280,align:'center',sortable:'true',formatter: function (v, r)
                {
                    return r.provincename+" "+r.cityname+" "+r.areaname+" "+r.address;
                }
            },
            { field: 'contacts', title: '联系人', width: 80,align:'center' ,sortable:'true'},
            { field: 'contacts_phone', title: '联系电话', width: 80 ,align:'center',sortable:'true'},
            { field: 'createtime', title: '创建时间', width: 150,align:'center',sortable:'true' },

        ]];
        dg.options.pageSize = 30;
        dg.options.title = "";
        dg.options.toolbar = "#tb";

        dg.init();
        dg.load();
        initCombobox();
        $("#btnAdd").click(btnAdd_Click);
        $("#btnEdit").click(btnEdit_Click);
        $("#btnDel").click(btnDel_Click);

        $("#btnUpdatePwd").click(btnUpdatePwd_Click);
    });

    function loadData()
    {
        var parms = {
            name: $("#stxtName").val(),
            orgcode:$("#stxtOrgCode").val(),
            province:$("#ddlprovince").combobox("getValue") || 0,
            city:$("#ddlcity").combobox("getValue") || 0,
            area:$("#ddlarea").combobox("getValue") || 0,
            address:$("#address").val(),
            PageIndex: dg.getPageIndex(),
            PageSize: dg.getPageSize()
        };

        FCore.Ajax.Post("/groupmanagement/groupinfo/getList", parms, function (data)
        {
            dg.update(data);
        });
    }
    var area;
    var province;
    var city;
    function initCombobox()
    {
        $('#ddlprovince').combobox({
            url: '/ddl/country',
            editable:false, //不可编辑状态  
            cache: false,  
            method: 'post',
            valueField: 'id',
            textField: 'text',
            multiple: false,
            readonly:false,
            editable: false,
            width: 85,
            onLoadSuccess: function ()
            {
                $("#ddlcity").combobox("clear");
                if (province)
                {
                    $('#ddlprovince').combobox("setValue", province);
                    province = 0;
                }
            },
            onChange: function (newData, oldData)
            {
                $('#ddlcity').combobox({
                    url: '/ddl/province/' + newData,
                    method: 'post',
                    valueField: 'id',
                    textField: 'text',
                    multiple: false,
                    readonly:false,
                    editable: false,
                    width: 85,
                    onLoadSuccess: function ()
                    {
                        $("#ddlarea").combobox("clear");
                        if (city)
                        {
                            $('#ddlcity').combobox("setValue", city);
                            city = 0;
                        }
                    },
                    onChange: function (newData, oldData)
                    {
                        if (newData)
                        {
                            $('#ddlarea').combobox({
                                url: '/ddl/city/' + newData,
                                method: 'post',
                                valueField: 'id',
                                textField: 'text',
                                multiple: false,
                                editable: false,
                                width: 85,
                                onLoadSuccess: function ()
                                {
                                    if (area)
                                    {
                                        $('#ddlarea').combobox("setValue", area);
                                        area = 0;
                                    }
                                }
                            });
                        }
                    }
                });
            }
        });

    }
    var area;
    var province;
    var city;
    function initComboboxtxt()
    {
        $('#ddlprovincetxt').combobox({
            url: '/ddl/country',
            editable:false, //不可编辑状态  
            cache: false,  
            method: 'post',
            valueField: 'id',
            textField: 'text',
            multiple: false,
            readonly:false,
            editable: false,
            width: 85,
            onLoadSuccess: function ()
            {
                $("#ddlcitytxt").combobox("clear");
                
                if (province)
                {
                    $('#ddlprovincetxt').combobox("setValue", province);
                    province = 0;
                }
            },
            onChange: function (newData, oldData)
            {
                $("#ddlareatxt").combobox("clear");
                $('#ddlcitytxt').combobox({
                    url: '/ddl/province/' + newData,
                    method: 'post',
                    valueField: 'id',
                    textField: 'text',
                    multiple: false,
                    readonly:false,
                    editable: false,
                    width: 85,
                    onLoadSuccess: function ()
                    {
                        if (city)
                        {
                            $('#ddlcitytxt').combobox("setValue", city);
                            city = 0;

                        }
                    },
                    onChange: function (newData, oldData)
                    {
                        if (newData)
                        {
                            $('#ddlareatxt').combobox({
                                url: '/ddl/city/' + newData,
                                method: 'post',
                                valueField: 'id',
                                textField: 'text',
                                multiple: false,
                                editable: false,
                                width: 85,
                                onLoadSuccess: function ()
                                {
                                    if (area)
                                    {
                                        $('#ddlareatxt').combobox("setValue", area);
                                        area = 0;
                                    }
                                }
                            });
                        }
                    }
                });
            }
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
            //txtUserName txtFullName ddlStatus
            $("#txtName,#txtOrgCode,#txtAddress,#txtContact,#txtPhoneNum,#txtEmail").val("");


            $("#ddlcountrytxt").combobox("clear");
            $("#ddlprovincetxt").combobox("clear");
            $("#ddlcitytxt").combobox("clear");
            $("#ddlareatxt").combobox("clear");

            title = "新增";

            if (type == "edit")
            {
                sel = dg.getSelected();
                if (!sel)
                {
                    jQuery.messager.alert('提示:','请选择要编辑的行!','info'); 
                    return;
                }
                title = "编辑";

                $("#txtName").val(sel.name);
                $("#txtOrgCode").val(sel.compid);
                $("#txtAddress").val(sel.address);
                $("#txtContact").val(sel.contacts);
                $("#txtPhoneNum").val(sel.contacts_phone);

                area = sel.town_id;
                province = sel.province_id;
                city = sel.city_id;


            }
            initComboboxtxt();

            $("#dialogAdd").dialog({
                //closed: true,
                iconCls: "icon-add",
                modal: true,
                resizable: true,
                title: title,
                width: 500,//document.documentElement.clientWidth-50,
                height: 320,//document.documentElement.clientHeight - 50,
                buttons: [{
                    text: "确定",
                    iconCls: 'icon-ok',
                    handler: function ()
                    {
                        //确定 按钮事件

                        //收集提交数据

                        var parms = {
                            id: type == "edit" ? sel.id : 0,
                            name: $("#txtName").val(),
                            orgcode: $("#txtOrgCode").val(),
                            area: $("#ddlareatxt").combobox("getValue")||0,
                            province: $("#ddlprovincetxt").combobox("getValue") || 0,
                            city: $("#ddlcitytxt").combobox("getValue") || 0,
                            address: $("#txtAddress").val(),
                            contact: $("#txtContact").val(),
                            phonenum: $("#txtPhoneNum").val(),
                        };
                        if (!parms.name)
                        {
                            jQuery.messager.alert('提示:','请填写名称!','info'); 
                            return false;
                        }
                        else if (!parms.province)
                        {
                             jQuery.messager.alert('提示:','请选择省份!','info'); 
                            return false;
                        }
                        else if (!parms.city)
                        {
                             jQuery.messager.alert('提示:','请选择城市!','info'); 
                            return false;
                        }
                        else if (!parms.area)
                        {
                             jQuery.messager.alert('提示:','请选择县/区!','info'); 
                            return false;
                        }
                        else if (!parms.address)
                        {
                            jQuery.messager.alert('提示:','请填写地址','info'); 
                            return false;
                        }
                        else if (!parms.contact)
                        {
                            jQuery.messager.alert('提示:','请填写联系人','info'); 
                            return false;
                        } 
                        else if (!parms.phonenum)
                        {
                            jQuery.messager.alert('提示:','请填写联系电话!','info'); 
                            return false;
                        }
                        else
                        {
                            FCore.Ajax.Post("/groupmanagement/groupinfo/save", parms, function (d)
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

        function btnUpdatePwd_Click()
        {
            var sel;
            $("#spanUserName,#spanFullName").val("");


            sel = dg.getSelected();
            if (!sel)
            {
                alert("请先选择用户");
                return;
            }

            $("#spanUserName").text(sel.adm_id);
            $("#spanFullName").text(sel.adm_name);
            
            $("#dialogUpdatePwd").dialog({
                iconCls: "icon-key",
                modal: true,
                resizable: true,
                title: "修改密码",
                width: 300,//document.documentElement.clientWidth-50,
                height: 220,//document.documentElement.clientHeight - 50,
                buttons: [{
                    text: "确定",
                    iconCls: 'icon-ok',
                    handler: function ()
                    {
                        //确定 按钮事件

                        //收集提交数据

                        var id = sel.id;
                        var pwd = $("#txtPassword").val();
                        var pwdcfm = $("#txtPasswordCfm").val();

                        if (!pwd)
                        {
                            alert("请填写新密码");
                            return false;
                        }
                        else if (!pwdcfm)
                        {
                            alert("请填写确认密码");
                            return false;
                        }
                        else if (pwd != pwdcfm)
                        {
                            alert("两次输入的密码不一致");
                            return false;
                        }
                        else
                        {
                            pwd = FCore.Sha1.Encrypt(pwd);
                            
                            FCore.Ajax.Post("/pms/sysadmin/updatepwd/" + id + "/" + pwd, null, function (d)
                            {
                                if (d.Ok)
                                {
                                    $("#dialogUpdatePwd").dialog("close");
                                    //loadData();
                                    alert("密码修改成功");
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
                        $("#dialogUpdatePwd").dialog("close");
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
                        FCore.Ajax.Post("/groupmanagement/groupinfo/delete",{ids:ids.join()}, function (d)
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