<?php if (!defined('THINK_PATH')) exit(); include('./admin/Tpl/inc/header.php') ; ?>
<?php include('./admin/Tpl/inc/jsreference.php'); ?>

<table id="tbList"></table>

<div style="display:none;">
    <div id="tb" style="height:auto;padding:10px;">

        <?php foreach($data as $vo):?>
            <?php echo $vo;?>
        <?php endforeach;?>
        <!-- <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add'" id="btnAdd">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-edit'" id="btnEdit">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" id="btnDel">删除</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-key'" id="btnUpdatePwd">修改密码</a> -->

    </div>

    <div id="dialogAdd1">
        <ul class="ulform">
            <li>
                <label>登录名<b>*</b>:</label>
                <input id="txtUserName" type="text"/>
            </li>
            <li id="user_pwd">
                <label>密码<b>*</b>:</label>
                <input id="userpassword" type="password"/>
            </li>
            <li>
                <label>姓名<b>*</b>:</label>
                <input id="txtFullName" type="text"/>
            </li>
            <li>
                <label>账户状态<b>*</b>:</label>
                <input id="ddlStatus"
                       class="easyui-combobox"
                       data-options="
                            data:[
	                            {'id':1,'text':'启用',selected:true},
	                            {'id':0,'text':'禁用'}
                            ],
                            valueField:'id',
                            textField:'text',
                            multiple:false,
                            editable:false,
                            width:120,
                            panelHeight:'auto'
                " />
            </li> 
            <li>
                <label>角色<b>*</b>:</label>
                <span>
                    <input class="easyui-combobox cbbx"
                           id="ddlRoles"
                           data-options="
                                url:'/pms/roles/ddl',
								valueField:'id',
								textField:'text',
								multiple:false,
								panelHeight:'auto',
                                editable:false,
						" />
                </span>
            </li>
            <li>
                    <label>所属地区<b>*</b>:</label>
                    
                    <input id="ddlprovince" class="easyui-combobox" data-options="width:85"/>
                    <input id="ddlcity" class="easyui-combobox" data-options="width:85"/>
                </li>

        </ul>

    </div>
    <div id="dialogUpdatePwd">
        <ul class="ulform">
            <li>
                <label>登录名</label>
                <span id="spanUserName"></span>
            </li>
            <li>
                <label>姓名</label>
                <span id="spanFullName"></span>
            </li> 
            <li>
                <label>新密码</label>
                <input id="txtPassword" type="password"/>               
            </li> 
            <li>
                <label>确认密码</label>
                <input id="txtPasswordCfm" type="password"/>               
            </li> 

        </ul>

    </div>

</div>

    <script type="text/javascript">
        var dg;

        $(function ()
        {
            dg = new FCore.DataGrid("tbList", loadData);

            dg.options.columns = [[
                 { field: 'id', title: 'Id',hidden:true, width: 50 },
                 { field: 'adm_id', title: '登录名', width: 80 },
                 { field: 'adm_name', title: '姓名', width: 80 },
                 { field: 'address', title: '所属区域', width: 300,formatter: function (v, r)
                     {
                     if(r.provinceName!=null)
                     {
                    	 return r.provinceName+"-"+r.cityName;
                     }
                     else
                     {
                         return "";
                     }
                     
                 }},
                 { field: 'cdate', title: '创建日期', width: 100, formatter: dgFormatter.date },
                 { field: 'adm_status', title: '状态', width: 80, formatter: dgFormatter.enabled },
                 { field: 'RolesName', title: '角色', width: 300 }

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

        var area, province, city;
        function initCombobox()
        {
            $('#ddlprovince').combobox({
                url: '/admin.php/ddl/country',
                method: 'post',
                valueField: 'id',
                textField: 'text',
                multiple: false,
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
                        url: '/admin.php/ddl/province/id/' + newData,
                        method: 'post',
                        valueField: 'id',
                        textField: 'text',
                        multiple: false,
                        editable: false,
                        width: 85,
                        onLoadSuccess: function ()
                        {
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
                            }
                        }
                    });
                }
            });

        }

        function loadData()
        {
            var parms = {
                PageIndex: dg.getPageIndex(),
                PageSize: dg.getPageSize()
            };

            FCore.Ajax.Post("/admin.php/pms/sysadmin_getlist", parms, function (data)
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
            //txtUserName txtFullName ddlStatus
            $("#txtUserName,#txtFullName").val("");
            $("#userpassword").val("");
            $("#ddlStatus").combobox("setValue", "0");
            $("#ddlRoles").combobox("clear");
            $("#ddlprovince").combobox("clear");
            $("#ddlcity").combobox("clear");
            $("#user_pwd").show();
            title = "新增";

            if (type == "edit")
            {
                sel = dg.getSelected();
                data = "<?php echo $_COOKIE['role_id']?>";//角色权限的值
                dataname = "<?php echo $_COOKIE['adm_name']?>";//角色名称
                if (!sel)
                {
                    jQuery.messager.alert('提示:','请选择要编辑的行!','info'); 
                    return;
                }
                // if(parseInt(sel.froleid)<parseInt(data))
                // {
                //     jQuery.messager.alert('提示:','您没有权限修改!','info'); 
                //     return;
                // }
                // else if(parseInt(sel.froleid) = parseInt(data) && sel.adm_name!=dataname)
                // {
                //     jQuery.messager.alert('提示:','您没有权限修改!','info'); 
                //     return;
                // }
                title = "编辑";
                if(title == "编辑")
                {
                   $("#user_pwd").hide(); 
                }
                $("#txtUserName").val(sel.adm_id);
                $("#txtFullName").val(sel.adm_name);
                $("#userpassword").val(sel.adm_pwd);

                $("#ddlStatus").combobox("setValue", sel.adm_status);
                province = sel.province;
                city = sel.city;
                initCombobox();

                if (sel.Roles)
                {
                    $("#ddlRoles").combobox("setValues", sel.Roles.split(','));
                }

            }

            $("#dialogAdd1").dialog({
                //closed: true,
                iconCls: "icon-add",
                modal: true,
                resizable: true,
                title: title,
                width: 500,//document.documentElement.clientWidth-50,
                height: 280,//document.documentElement.clientHeight - 50,
                buttons: [{
                    text: "确定",
                    iconCls: 'icon-ok',
                    handler: function ()
                    {
                        //确定 按钮事件
                        // var str = $("#userpassword").val();
                        // if (!str) 
                        // {
                        //     jQuery.messager.alert('提示:','密码不能为空!','info');
                        //     return false;
                        // }
                        // var reg = new RegExp(/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/);
                        // if (!reg.test(str)) 
                        // {
                        //     jQuery.messager.alert('提示:','密码必须为字母加数字且长度不小于8位!','info');
                        //     return false;
                        // } 
                        //收集提交数据
                        password = FCore.Sha1.Encrypt($("#userpassword").val());
                        console.log(password);
                        var parms = {
                            id: type == "edit" ? sel.id : 0,
                            adm_name: $("#txtFullName").val(),
                            userpassword: password,
                            adm_id: stripscript($("#txtUserName").val()),
                            adm_status: $("#ddlStatus").combobox("getValue"),
                            province: $("#ddlprovince").combobox("getValue") || 0,
                            city: $("#ddlcity").combobox("getValue") || 0,
                            roles: $("#ddlRoles").combobox("getValues").join()
                        };

                        //如果前面有，号
                        if (parms.roles && parms.roles.indexOf(",") == 0)
                        {
                            parms.roles = parms.roles.substr(1);
                        }


                        if (!parms.adm_id)
                        {
                            jQuery.messager.alert('提示:','请填写登录名!','info'); 
                            return false;
                        }
                        //da39a3ee5e6b4b0d3255bfef95601890afd80709 值 是空的sha1值
                        else if (parms.userpassword == "da39a3ee5e6b4b0d3255bfef95601890afd80709")
                        {
                            jQuery.messager.alert('提示:','请填写密码!','info'); 
                            return false;
                        }
                        else if (!parms.adm_name)
                        {
                            jQuery.messager.alert('提示:','请填写姓名!','info'); 
                            return false;
                        }
                        else if (!parms.adm_status)
                        {
                            jQuery.messager.alert('提示:','请选择账户状态!','info'); 
                            return false;
                        }
                        else if (!parms.roles)
                        {
                            jQuery.messager.alert('提示:','请选择角色!','info'); 
                            return false;
                        }
                        else if (!parms.province)
                        {
                            jQuery.messager.alert('提示:','请选择省份!','info'); 
                            return false;
                        }
                        else if (!parms.city)
                        {
                            jQuery.messager.alert('提示:','请选择市!','info'); 
                            return false;
                        }
                        else
                        {
                            
                            FCore.Ajax.Post("/pms/sysadmin/save", parms, function (d)
                            {
                                if (d.Ok)
                                {
                                    $("#dialogAdd1").dialog("close");
                                    loadData();
                                }
                                else
                                {
                                    jQuery.messager.alert('提示:','登录名已存在','info');
                                }

                            });
                        }

                    }
                }, {
                    text: "取消", iconCls: 'icon-cancel',
                    handler: function ()
                    {
                        //取消 按钮事件
                        $("#dialogAdd1").dialog("close");
                    }
                }]

            });

        }

        function stripscript(s) 
        { 
        var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\[\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]") 
        var rs = ""; 
        for (var i = 0; i < s.length; i++) { 
        rs = rs+s.substr(i, 1).replace(pattern, ''); 
        } 
        return rs; 
        } 

        function btnUpdatePwd_Click()
        {
            var sel;
            $("#spanUserName,#spanFullName").val("");


            sel = dg.getSelected();
            if (!sel)
            {
                jQuery.messager.alert('提示:','请先选择用户!','info'); 
                return;
            }

            $("#spanUserName").text(sel.adm_id);
            $("#spanFullName").text(sel.adm_name);
            
            $("#dialogUpdatePwd").dialog({
                iconCls: "icon-key",
                modal: true,
                resizable: true,
                title: "修改密码",
                width: 350,//document.documentElement.clientWidth-50,
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
                        var reg = new RegExp(/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/);
                        
                        if (!pwd)
                        {
                            jQuery.messager.alert('提示:','请填写新密码!','info'); 
                            return false;
                        }
                        // else if(pwd == null || pwd.length <8)
                        // {
                        //     jQuery.messager.alert('提示:','密码不能为空或小于8位!','info');
                        //     return false;
                        // }
                        // else if(!reg.test(pwd))
                        // {
                        //     jQuery.messager.alert('提示:','密码必须为字母加数字且长度不小于8位!','info');
                        //     return false;
                        // }
                        else if (!pwdcfm)
                        {
                            jQuery.messager.alert('提示:','请填写确认密码!','info'); 
                            return false;
                        }
                        else if (pwd != pwdcfm)
                        {
                            jQuery.messager.alert('提示:','两次输入的密码不一致!','info'); 
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
                                    jQuery.messager.alert('提示:','密码修改成功!','info'); 
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
            var parms = dg.getSelected();

            if (parms)
            {
                $.messager.confirm("删除", "确定要删除吗？", function (r)
                {
                    if (r)
                    {
                        FCore.Ajax.Post("/pms/sysadmin/delete/" + parms.id, null, function (d)
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