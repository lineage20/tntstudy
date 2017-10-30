<?php if (!defined('THINK_PATH')) exit(); include('./admin/Tpl/inc/header.php') ; ?>
<?php include('./admin/Tpl/inc/jsreference.php'); ?>


<table id="tbList"></table>

<div id="tb" style="height:auto;padding:10px;">

</div>



    <script type="text/javascript">
        var dg;

        $(function ()
        {
            dg = new FCore.DataGrid("tbList", loadData);

            dg.options.columns = [[
                 
                 { field: 'adm_id', title: '登录名', width: 100 },
                 { field: 'adm_name', title: '姓名', width: 100 },
                 { field: 'os', title: '系统', width: 100 },
                 { field: 'browser', title: '浏览器', width: 100 },
                 { field: 'ip', title: 'IP', width: 100 },
                 { field: 'source', title: '操作', width: 180 },
                 { field: 'cdate', title: '操作时间', width: 140 },

            ]];
            dg.options.pageSize = 30;
            dg.options.title = "";
            dg.options.toolbar = "#tb";

            dg.init();
            dg.load();

        });

        function loadData()
        {
            var parms = {
                PageIndex: dg.getPageIndex(),
                PageSize: dg.getPageSize()
            };

            FCore.Ajax.Post("/admin.php/pms/syslog_getlist", parms, function (data)
            {
                dg.update(data);
            });
        }





    </script>




<?php include('./Tpl/inc/footer.php'); ?>