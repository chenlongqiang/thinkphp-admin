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
                        <h5>角色授权</h5>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="<?php echo U('System/roleMenuEdit');?>" method="post">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <td>角色名: </td>
                                        <td><?php echo ($input_data["name"]); ?></td>
                                        <input name="val[role_id]" type="hidden" value="<?php echo ($input_data["role_id"]); ?>">
                                    </tr>
                                    <tr>
                                        <td>权限: </td>
                                        <td>
                                            <!-- todo 全选,子菜单先择 js-->
                                            <?php if(is_array($menu_list)): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value_first): $mod = ($i % 2 );++$i;?><p>
                                                    <label>
                                                        <input name="val[menu_id][]" type="checkbox" value="<?php echo ($value_first["id"]); ?>" <?php echo (input_checked($menu_ids,$value_first[id])); ?>> <?php echo ($value_first["name"]); ?>
                                                    </label>
                                                </p>
                                                <?php if(is_array($value_first[sub])): $i = 0; $__LIST__ = $value_first[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value_second): $mod = ($i % 2 );++$i;?><p>
                                                        <label>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&nbsp;<input name="val[menu_id][]" type="checkbox" value="<?php echo ($value_second["id"]); ?>" <?php echo (input_checked($menu_ids,$value_second[id])); ?>> <?php echo ($value_second["name"]); ?>
                                                        </label>
                                                    </p>
                                                    <?php if(is_array($value_second[sub])): $i = 0; $__LIST__ = $value_second[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value_third): $mod = ($i % 2 );++$i;?><p>
                                                            <label>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&nbsp;<input name="val[menu_id][]" type="checkbox" value="<?php echo ($value_third["id"]); ?>" <?php echo (input_checked($menu_ids,$value_third[id])); ?>> <?php echo ($value_third["name"]); ?>
                                                            </label>
                                                        </p><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    <script>
        $(function(){
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