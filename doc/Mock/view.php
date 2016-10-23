<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>内网api测试</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .bs-docs-header{
            margin-top: 50px;
            position: relative;
            padding: 30px 0;
            color: #cdbfe3;
            text-align: center;
            text-shadow: 0 1px 0 rgba(0,0,0,.1);
            background-color: #6f5499;
            background-image: -webkit-gradient(linear,left top,left bottom,from(#563d7c),to(#6f5499));
            background-image: -webkit-linear-gradient(top,#563d7c 0,#6f5499 100%);
            background-image: -o-linear-gradient(top,#563d7c 0,#6f5499 100%);
            background-image: linear-gradient(to bottom,#563d7c 0,#6f5499 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#563d7c', endColorstr='#6F5499', GradientType=0);
            background-repeat: repeat-x;
        }
        .var_dump{
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <!-- 登录弹层 -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form action="./index.php" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">登录</h4>
                    </div>
                    <div class="modal-body">
                        <input name="Command" value="1005" type="hidden">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">手机号</label>
                            <input name="key[]" value="mobile" type="hidden">
                            <input name="value[]" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">密码</label>
                            <input name="key[]" value="password" type="hidden">
                            <input name="value[]" type="password" class="form-control" id="message-text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">登录</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- 退出弹层 -->
    <div class="modal fade" id="login_out" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form action="./index.php" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">退出</h4>
                    </div>
                    <div class="modal-body">
                        <input name="Command" value="1039" type="hidden">
                        <h3>确定退出登录吗？</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">确定</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- register弹层 -->

    <!--  alert弹层  -->
    <div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">注意</h4>
                </div>
                <div class="modal-body">
                    <p class="alert_content"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">好的</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-fixed-top">
        <div class="container">
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" style="color:black">
                            <?php
                                $name = $_COOKIE['fullname'];
                                if ($name) {
                                    echo '['.$name.'] 您好!';
                                } else {
                                    echo '快去登录吧 ↖(^ω^)↗';
                                }
                            ?>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" data-toggle="modal" data-target="#login">登录</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#login_out">退出登录</a></li>
<!--                    <li><a href="#" data-toggle="modal" data-target="#register">注册</a></li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="bs-docs-header">
        <div class="container">
            <h1>小鱼模拟请求api页面</h1>
            <p>提供内网api测试</p>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="col-md-9">
            <form action="./index.php" method="post" class="form-horizontal" id="request">
                <hr/>
                <h3>header:</h3>
                <div class="form-group form-group-md">
                    <label class="col-md-3 control-label" for="Command">Command</label>
                    <div class="col-md-7">
                        <input class="form-control" id="Command" name="Command" type="text" value="<?php echo $ori_data['Command'] ?>" placeholder="Command">
                    </div>
                    <div class="col-md-2">
                        <!--<button type="button" class="btn btn-danger btn-block"></button>-->
                    </div>
                </div>
                <hr/>
                <div class="form-group">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block add_tpl">添加</button>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-default btn-block data_reset">数据重置</button>
                    </div>
                </div>
                <h3>body:</h3>
                <?php
                    $cnt = count($ori_data['key']);
                    if ($cnt >= 1) {
                        for ($i = 0; $i< $cnt; $i++) {
                            //uid在后端自动注入无需前端显示
                            if ($ori_data['key'][$i] == 'uid') {
                                continue;
                            }
                            ?>
                            <div class="form-group form-group-md key_value">
                                <div class="col-md-3">
                                    <input class="form-control input" name="key[]" type="text" value="<?php echo $ori_data['key'][$i] ?>" placeholder="key">
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control input" name="value[]" type="text" value="<?php echo $ori_data['value'][$i] ?>" placeholder="value">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger btn-block del_tpl">删除</button>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                <?php
                    } else {
                ?>
                    <div class="form-group form-group-md key_value">
                        <div class="col-md-3">
                            <input class="form-control input" name="key[]" type="text" placeholder="key">
                        </div>
                        <div class="col-md-7">
                            <input class="form-control input" name="value[]" type="text" placeholder="value">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-block del_tpl">删除</button>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <br/>
                <br/>
                <div class="form-group">
                    <div class="col-md-offset-9 col-md-3">
                        <button type="button" class="btn btn-success btn-block submit">提交</button>
                    </div>
                </div>
            </form>

            <hr/>
            <h3>result:</h3>

<!--            <div class="var_dump">-->
                <?php
                    echo '<pre>';
                    print_r($response);
                    echo '</pre>';
                    echo '<pre>';
                    echo json_encode($response);
                    echo '</pre>';
                ?>
<!--            </div>-->

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <h3>Notice:</h3>
            <div>
                <p>1. 登录后 body 中会自动注入加密的 uid , 无需手动添加 uid 字段;</p>
                <p>2. 手动添加 uid 将会被覆盖;</p>
            </div>

            <hr/>

            <h3>Command list:</h3>
            <ul class="list-group">
                <li class="list-group-item">1001</li>
            </ul>
        </div>
    </div>

    <!--  key-value模板  -->
    <div class="form-group form-group-md key_value tpl hidden">
        <div class="col-md-3">
            <input class="form-control input" name="key[]" type="text" placeholder="key">
        </div>
        <div class="col-md-7">
            <input class="form-control input" name="value[]" type="text" placeholder="value">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger btn-block del_tpl">删除</button>
        </div>
    </div>
</body>
<script>
    $(function(){
        //数据提交
        $('.submit').on('click', function(){
            $('#request').submit();
            return;
            //字段未填写限制 -目前不使用
            have_empty = false;
            $('#request .key_value .input').each(function(){
                input_object = $(this);
                input_value = input_object.val();
                if (input_value == '') {
                    have_empty = true;
                    input_object.addClass('empty').css({'border-color':'#c12e2a'});
                } else {
                    input_object.removeClass('empty').css({'border-color':'#ccc'});
                }
            });
            if (have_empty == false) {
                $('#request').submit();
            }
        });
        //添加元素
        $('.add_tpl').on('click', function(){
            tpl = $('.tpl').clone(true).removeClass('tpl').removeClass('hidden');
            $('#request .key_value:last').after(tpl);
        });
        //删除元素
        $('.del_tpl').on('click', function(){
            cnt_length = $('#request .key_value').length;
            if (cnt_length <= 1) {
                my_alert('至少要有一组键值对!');
            }else{
                self = $(this).parents('.key_value');
                self.remove();
            }
        });
        //数据重置
        $('.data_reset').on('click', function(){
            $('#Command').val('reset');
            $('#request').submit();
        });
        //我的alert
        function my_alert(content = ''){
            $('#alert .alert_content').html(content);
            $('#alert').modal('show')
        }
    });
</script>
</html>