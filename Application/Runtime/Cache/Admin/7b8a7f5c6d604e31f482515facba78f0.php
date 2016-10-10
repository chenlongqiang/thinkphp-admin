<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo ($title); ?></title>

    <!-- jQuery -->
    <script src="https://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
    <!--<script src="/Public/static/admin/jquery.min.js"></script>-->

    <!-- jquery-cookie -->
    <script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!--<link href="/Public/static/admin/bootstrap.min.css" rel="stylesheet">-->
    <!--<script src="/Public/static/admin/bootstrap.min.js"></script>-->

    <!-- MetisMenu 抽屉式导航 -->
    <link href="https://cdn.bootcss.com/metisMenu/1.1.3/metisMenu.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/metisMenu/1.1.3/metisMenu.min.js"></script>
    <!--<link href="/Public/static/admin/metisMenu.min.css" rel="stylesheet">-->
    <!--<script src="/Public/static/admin/metisMenu.min.js"></script>-->

    <!-- Validator 前端验证 -->
    <link href="https://cdn.bootcss.com/nice-validator/1.0.6/jquery.validator.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/nice-validator/1.0.6/jquery.validator.min.js"></script>
    <script src="https://cdn.bootcss.com/nice-validator/1.0.6/local/zh-CN.min.js"></script>

    <!-- 自定义字体 -->
    <link href="https://cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!--<link href="/Public/static/admin/font-awesome.min.css" rel="stylesheet">-->

    <!-- 自定义css,js -->
    <link href="/Public/static/admin/css/sb_admin_2.css" rel="stylesheet">
    <script src="/Public/static/admin/js/sb_admin_2.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand navbar-title" href="#">鲸鱼活动系统后台</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
            <li>
                <a href="#">
                    <div>
                        <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                    <em>Yesterday</em>
                                </span>
                    </div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                    <em>Today</em>
                                </span>
                    </div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                </a>
            </li>
        </ul>
        <!-- /.dropdown-messages -->
    </li>
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="<?php echo U('Passport/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-head">
                <p>
                    <img src="/Public/static/admin/img/logo.png" style="width:150px;">
                </p>
            </li>

            <li>
                <a href="<?php echo U('Index/index');?>"><i class="fa fa-dashboard fa-fw"></i> 首页</a>
            </li>

            <?php if(R('Passport/getAdminIdInSession') == 1): ?><li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> 系统设置<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo U('System/menuList');?>">菜单管理</a>
                        </li>
                        <li>
                            <a href="<?php echo U('System/roleList');?>">角色管理</a>
                        </li>
                        <li>
                            <a href="<?php echo U('System/adminList');?>">后台用户管理</a>
                        </li>
                    </ul>
                </li><?php endif; ?>

            <?php if(is_array($__menu)): $i = 0; $__LIST__ = $__menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value_first): $mod = ($i % 2 );++$i;?><li>
                    <a href="<?php echo U($value_first[path]);?>"><i class="fa <?php echo ($value_first["icon"]); ?> fa-fw"></i> <?php echo ($value_first["name"]); if(!empty($value_first[sub])): ?><span class="fa arrow"></span><?php endif; ?></a>
                    <?php if(!empty($value_first[sub])): ?><ul class="nav nav-second-level">
                            <?php if(is_array($value_first[sub])): $i = 0; $__LIST__ = $value_first[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value_second): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U($value_second[path]);?>"><?php echo ($value_second["name"]); if(!empty($value_second[sub])): ?><span class="fa arrow"></span><?php endif; ?></a>
                                    <?php if(!empty($value_second[sub])): ?><ul class="nav nav-third-level">
                                            <?php if(is_array($value_second[sub])): $i = 0; $__LIST__ = $value_second[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value_third): $mod = ($i % 2 );++$i;?><li>
                                                    <a href="<?php echo U($value_third[path]);?>"><?php echo ($value_third["name"]); ?></a>
                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul><?php endif; ?>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
<!--todo 根据url写js-->

</nav>


        <div id="page-wrapper">
            
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading form-inline clearfix">
                    <div class="form-group pull-left">
                        <label class="sr-only"></label>
                        <a href="#edit_menu_layer" data-toggle="modal" class="btn btn-outline btn-success" data-type="add_top">
                            <i class="fa fa-plus fa-fw"></i> 添加顶级菜单
                        </a>
                    </div>
                    <?php if(!empty($filter)): ?><div class="form-group pull-right">
                            <label class="sr-only"></label>
                            <a href="javascript:history.back(-1)" class="btn btn-outline btn-link">
                                返回
                            </a>
                        </div>
                        <div class="form-group pull-right">
                            <label class="sr-only"></label>
                            <a href="<?php echo U('System/menuList');?>" class="btn btn-outline btn-link">
                                回到顶级菜单
                            </a>
                        </div><?php endif; ?>
                </div>
                <div class="panel-heading clearfix">
                    <form class="form-inline pull-left" role="form" action="/Admin/System/menuList.html" id="form_filter" method="post">
                        <!--
                        <div class="form-group">
                            <label class="sr-only"></label>
                            <select name="filter[status]" class="form-control" onchange="$('#form_filter').submit();">
                                <option value="">状态</option>
                                <option value="1" <?php echo (option_selected($filter[status],1)); ?>>启用</option>
                                <option value="2" <?php echo (option_selected($filter[status],2)); ?>>禁用</option>
                            </select>
                        </div>
                        -->
                        <div class="form-group">
                            <label class="sr-only"></label>
                            <select class="form-control" name="filter[option]">
                                <option value="name" <?php echo (option_selected($filter[option],"name")); ?>>菜单名</option>
                                <option value="id" <?php echo (option_selected($filter[option],"id")); ?>>ID</option>
                            </select>
                        </div>
                        <div class="form-group" id="keyword">
                            <input type="text" class="form-control" name='filter[keyword]' value="<?php echo (hs($filter[keyword])); ?>" placeholder="全局菜单搜索">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search fa-fw"></i> 搜 索
                        </button>
                        <input type="hidden" id="reset" name="reset" value="0">
                        <input type="hidden" id="sub_menu" name="filter[pid]">
                        <button type="submit" class="btn btn-primary" onclick="$('#reset').val('1')">
                            <i class="fa fa-refresh fa-fw"></i> 重 置
                        </button>
                    </form>

                    <!--<div class="pull-right" style="margin-left: 5px;">-->
                        <!--<a href="<?php echo U('');?>" class="btn btn-danger">-->
                            <!--<span class="glyphicon glyphicon-export"></span> -->
                        <!--</a>-->
                    <!--</div>-->
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>菜单名</th>
                                    <th>状态</th>
                                    <th>菜单路径</th>
                                    <th>排序</th>
                                    <th>菜单图标</th>
                                    <th>层级</th>
                                    <th>父级菜单ID</th>
                                    <th style="text-align: center">操作</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
                                        <td><?php echo ($value["id"]); ?></td>
                                        <td><?php echo (hs($value["name"])); ?></td>
                                        <td><?php echo ($config[status][$value[status]]); ?></td>
                                        <td><?php echo (hs($value["path"])); ?></td>
                                        <td><?php echo ($value["sort"]); ?></td>
                                        <td><?php echo (hs($value["icon"])); ?></td>
                                        <td><?php echo ($value["level"]); ?></td>
                                        <td><?php echo ($value["pid"]); ?></td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                    更多 <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                    <!--<li role="presentation" class="dropdown-header">操作</li>-->
                                                    <li role="presentation">
                                                        <a href="#edit_menu_layer" data-toggle="modal" data-id="<?php echo ($value["id"]); ?>" data-status="<?php echo ($value["status"]); ?>" data-name="<?php echo (hs($value["name"])); ?>" data-path="<?php echo (hs($value["path"])); ?>" data-level="<?php echo ($value["level"]); ?>" data-pid="<?php echo ($value["pid"]); ?>" data-sort="<?php echo ($value["sort"]); ?>" data-icon="<?php echo (hs($value["icon"])); ?>" data-type="edit">编辑</a>
                                                    </li>

                                                    <li class="divider"></li>
                                                    <!--<li role="presentation" class="dropdown-header">子菜单</li>-->
                                                    <li role="presentation">
                                                        <a href="#" data-id="<?php echo ($value["id"]); ?>" data-level="<?php echo ($value["level"]); ?>" class="see_sub_menu">查看子菜单</a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#edit_menu_layer" data-toggle="modal" data-id="<?php echo ($value["id"]); ?>" data-status="<?php echo ($value["status"]); ?>" data-name="<?php echo (hs($value["name"])); ?>" data-path="<?php echo (hs($value["path"])); ?>" data-level="<?php echo ($value["level"]); ?>" data-pid="<?php echo ($value["pid"]); ?>" data-sort="<?php echo ($value["sort"]); ?>" data-icon="<?php echo (hs($value["icon"])); ?>" data-type="add_sub">添加子菜单</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <button type="button" data-href="<?php echo U('System/menuDelete', array('id' => $value[id]));?>" class="delete_confirm btn btn-xs btn-danger" data-toggle="modal" data-target="#common_confirm_modal">删除</button>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <!-- 分页 -->
                    <div class="pagination"><?php echo ($page); ?></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    <!-- 添加/编辑弹层 -->
    <div class="modal fade" id="edit_menu_layer" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <form action="<?php echo U('System/menuEdit');?>" class="form-horizontal" method="post">
                    <div class="modal-body">

                        <input class="form-control" name="val[id]" type="hidden">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">菜单名:</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="val[name]" type="text" data-rule="required;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">状态:</label>
                            <div class="col-sm-6">
                                <div class="btn-group" style="">
                                    <select class="table-filter form-control input-sm" name="val[status]" data-rule="required;">
                                        <option value="1">显示</option>
                                        <option value="2">隐藏</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">菜单路径:</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="val[path]" type="text" placeholder="如:System/menuList" data-rule="required;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">排序:</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="val[sort]" type="text" placeholder="数字" data-rule="integer[+0];required;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">菜单图标:</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="val[icon]" type="text" placeholder="fa-search">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">层级:</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="val[level]" type="text" data-rule="integer[+];required;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">父级菜单ID:</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="val[pid]" type="text" data-rule="integer[+0];required;" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary">确定</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            //查看子菜单
            //1. 清空其它过滤条件
            //2. 设置pid
            clean_filter = function(){
                $('#form_filter input[name="filter[keyword]"]').val('');
            };
            $('.see_sub_menu').on('click', function(){
                clean_filter();

                $level = $(this).data('level');
                if ($level == 3) {
                    Common.alert({
                        title: "提示",
                        message: "目前仅支持3级菜单!"
                    });
                    return false;
                }

                $id = $(this).data('id');
                $('#form_filter input[name="filter[pid]"]').val($id);
                $('#form_filter').submit();
            });

            //删除数据
            $('.delete_confirm').on('click', function(){
                $href = $(this).attr('data-href');

                Common.confirm({
                    title: "删除数据",
                    message: "确定删除吗?",
                    operate: function (result) {
                        if (result) {
                            window.location = $href;
                        } else {
                            console.log('false');
                        }
                    }
                })
            });

            //modal 事件定义
            edit_menu_layer = {
                bind:function(){
                    //添加/编辑数据
                    $("#edit_menu_layer").on("show.bs.modal", function(e) {

                        //modal init
                        edit_menu_layer.init();

                        // 这里的btn就是触发元素，即你点击的按钮
                        $btn = $(e.relatedTarget);
                        $type = $btn.data("type");

                        // title
                        switch ($type) {
                            case 'add_top':
                                $title = '添加顶级菜单';
                                $level = 1;
                                $pid = 0;
                                break;
                            case 'add_sub':
                                $title = '添加子菜单';
                                $level = $btn.data("level");
                                $id = $btn.data("id");
                                $level = $level + 1;
                                $pid = $id;

                                if ($level > 3) {
                                    Common.alert({
                                        title: "提示",
                                        message: "目前仅支持3级菜单!"
                                    });
                                    return false;
                                }

                                break;
                            case 'edit':
                                $title = '编辑';
                                $level = $btn.data("level");
                                $pid = $btn.data("pid");

                                $id = $btn.data("id");
                                $status = $btn.data("status");
                                $name = $btn.data("name");
                                $path = $btn.data("path");
                                $sort = $btn.data("sort");
                                $icon = $btn.data("icon");
                                $('#edit_menu_layer input[name="val[id]"]').val($id);
                                $('#edit_menu_layer select[name="val[status]"]').val($status);
                                $('#edit_menu_layer input[name="val[name]"]').val($name);
                                $('#edit_menu_layer input[name="val[path]"]').val($path);
                                $('#edit_menu_layer input[name="val[sort]"]').val($sort);
                                $('#edit_menu_layer input[name="val[icon]"]').val($icon);
                                break;
                        }

                        $('#edit_menu_layer .modal-title').html($title);
                        $('#edit_menu_layer input[name="val[level]"]').val($level);
                        $('#edit_menu_layer input[name="val[pid]"]').val($pid);

                    });
                },
                //modal数据初始化
                init:function(){
                    $('#edit_menu_layer input[name="val[id]"]').val('');
                    $('#edit_menu_layer input[name="val[name]"]').val('');
                    $('#edit_menu_layer select[name="val[status]"]').val('1');
                    $('#edit_menu_layer input[name="val[path]"]').val('');
                    $('#edit_menu_layer input[name="val[sort]"]').val('0');
                    $('#edit_menu_layer input[name="val[icon]"]').val('');
                }
            };

            //模态窗事件绑定
            edit_menu_layer.bind();

        });
    </script>

        </div>
        <!-- /#page-wrapper -->

        <!-- 自定义弹层 -->
        <!-- 自定义弹层 -->
<!-- 自定义confirm -->
<div id="common_confirm_modal" class="modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h5 class="modal-title"><i class="fa fa-exclamation-circle"></i> <span class="title"></span></h5>
            </div>
            <div class="modal-body small">
                <p ><span class="message"></span></p>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-primary ok" data-dismiss="modal">确认</button>
                <button type="button" class="btn btn-default cancel" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<!-- 自定义alert -->
<div id="common_alert_modal" class="modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h5 class="modal-title"><i class="fa fa-exclamation-circle"></i> <span class="title"></span></h5>
            </div>
            <div class="modal-body small">
                <p ><span class="message"></span></p>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-primary ok" data-dismiss="modal">确认</button>
            </div>
        </div>
    </div>
</div>
    </div>
    <!-- /#wrapper -->

    <!--<div id="footer" style="text-align: center;padding:10px 0">footer</div>-->
</body>

</html>