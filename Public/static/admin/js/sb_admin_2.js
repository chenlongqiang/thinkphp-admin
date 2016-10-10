
//页面载入后执行
$(function() {

    //抽屉式导航
    $('#side-menu').metisMenu();
    
    //侧边导航样式添加
    //Loads the correct sidebar on window load,
    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    });
    if (element.length < 1) {
        //找不到时默认使用cookie中的dom来添加样式
        sidebar_menu_href = $.cookie('sidebar_menu_href');
        element = $('ul.nav a').filter(function() {
            return this.href == sidebar_menu_href
        });
    }else{
        $.cookie('sidebar_menu_href', element[0]);
    }
    element.addClass('active');
    element.parents('ul.nav').addClass('in');
    element.parents('li').addClass('active');
    
    //调整下拉菜单在table-responsive溢出隐藏
    $('.table-responsive').on('show.bs.dropdown', function () {
        $('.table-responsive').css("overflow", "inherit");
    });
    $('.table-responsive').on('hide.bs.dropdown', function () {
        $('.table-responsive').css("overflow", "auto" );
    });

    //自定义confirm,alert
    Common = {
        confirm: function(params) {
            modal = $("#common_confirm_modal");
            modal.find(".title").html(params.title);
            modal.find(".message").html(params.message);

            //每次都将监听先关闭，防止多次监听发生，确保只有一次监听
            modal.find(".cancel").off("click");
            modal.find(".ok").off("click");

            modal.find(".ok").on("click",function(){
                params.operate(true)
            });

            modal.find(".cancel").on("click",function(){
                params.operate(false)
            });
        },
        alert: function (params) {
            modal = $("#common_alert_modal");
            modal.modal('show');
            modal.find(".title").html(params.title);
            modal.find(".message").html(params.message);
        }
    };

    //nice validator 隐藏元素不检测 
    $('form').validator({
        ignore: ':hidden'
    });
});

$(function() {
    //collapses the sidebar on window resize.
    //Sets the min-height of #page-wrapper to window size
    /*
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });
    */
});
