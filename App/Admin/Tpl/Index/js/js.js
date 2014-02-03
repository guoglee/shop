//顶部导航更改
$(function () {
    $("div.nav div.l_menu a").click(function () {
        $("div.nav div.l_menu a").removeClass("action");
        $(this).addClass("action");
    })
})
//菜单缓存  parent顶级菜单   iframe 历史iframe标签  link子菜单
var menu_cache = {parent: {}, iframe: {}, link: {}};
//常用菜单缓存
menu_cache.parent[0] = true;
menu_cache.iframe[0] = true;
//点击头部导航，加载左侧菜单列表
$(function () {
    //初始化常用数据
    $("a.top_menu").click(function () {
        var menuid = $(this).attr("menuid");
        //读取缓存
        if (menu_cache.parent[menuid]) {
            //隐藏所有左侧菜单
            $("div.left_menu div").hide();
            //显示当前菜单
            $("div.left_menu div.menuid_" + menuid).show();
        } else {//缓存不存在
            $.ajax({
                type: "GET",
                url: APP + "&c=Menu&m=get_child_menu",
                data: {menuid: menuid},
                cache: false,
                success: function (html) {
                    menu_cache.parent[menuid] = true;
                    //隐藏所有左侧菜单
                    $("div.left_menu div").hide();
                    $("div.left_menu").append(html);
                }
            });
        }
    })
})

//左侧子导航点击
$(function () {
    $("div.left_menu dd a").live("click", function () {
        //改变样式
        $("div.main dd a").removeClass("action");
        $(this).addClass("action");
        //菜单menuid
        var menuid = $(this).attr('menuid');
        //读取缓存
        show_iframe(menuid);
        //添加历史导航
        add_menu_history(menuid, $(this).text());
        //更改位置
        favorite_menu_position(menuid);
    })
})
//显示iframe显示内容
function show_iframe(menuid) {
    //隐藏所有iframe
    $("div.content iframe").hide();
    if (menu_cache.iframe[menuid]) {
        $("iframe[menuid='" + menuid + "']").show();
    } else {
        //左侧链接a标签
        var obj = $("div.left_menu a[menuid='" + menuid + "']");
        var url = obj.attr("url");
        var html = '<iframe menuid="' + menuid + '" src="' + url + "&_=" + Math.random() + '"></iframe>';
        $("div.content").append(html);
        //压入缓存
        menu_cache.iframe[menuid] = true;
    }
}
//添加历史导航
function add_menu_history(menuid, title) {
    //不存在菜单时添加
    if ($("div.favorite_menu ul li a[menuid='" + menuid + "']").length == 0) {
        var html = "<li class='action' menuid='" + menuid + "'><a href='javascript:;' class='menu' menuid='" + menuid + "'>" + title + "</a>";
        html += "<a class='close' menuid='" + menuid + "'>x</a></li>";
        $("div.favorite_menu ul").append(html);
    }
    //更改当前点击样式
    $("div.favorite_menu li").removeClass("action");
    $("div.favorite_menu a.menu[menuid='" + menuid + "']").parent().addClass("action");
}
//历史导航点击
$(function () {
    $("div.favorite_menu a.menu").live("click", function () {
        //移除所有点击的样式
        $("div.favorite_menu li").removeClass("action");
        //当前点击的链接加action样式
        $(this).parent("li").addClass("action");
        var menuid=$(this).attr("menuid");
        favorite_menu_position(menuid);
        show_iframe(menuid);
    })
    //关闭历史导航
    $("div.favorite_menu ul li a.close").live("click", function () {
        var menuid = $(this).attr("menuid");
        //显示上一个iframe
        $("iframe[menuid='" + menuid + "']").prev("iframe").show();
        //删除关闭的iframe
        $("iframe[menuid='" + menuid + "']").remove();
        //移除li样式action
        $("div.favorite_menu ul li").removeClass("action");
        //更改上一个菜单样式
        $(this).parent().prev("li").addClass("action");
        //移除菜单
        $(this).parents("li").eq(0).remove();
        //清除缓存
        menu_cache.link[menuid] = undefined;
        menu_cache.iframe[menuid] = undefined;
    })
})

//更改历史导航位置
function favorite_menu_position(menuid) {
    //ul对象
    var ul_obj = $("div.favorite_menu ul");
    var ul_offset = ul_obj.offset();
    var ul_len = 0;
    $("li", ul_obj).each(function (i) {
        ul_len += parseInt($(this).outerWidth());
    })
    var ul_w = ul_obj.width(ul_len);
    //div
    var div_obj = $("div.menu_nav");
    var div_offset = div_obj.offset();
    var div_left = div_offset.left;
    var div_right = div_obj.outerWidth() + div_offset.left;

    //li对象
    var li_obj = $("div.favorite_menu ul li[menuid='" + menuid + "']");
    var li_offset = li_obj.offset();
    var li_left = li_offset.left;
    var li_right = li_left + li_obj.outerWidth();
    //修改ul宽度
    if (li_right > div_right) {
        var _s = li_right - div_right + 18;
        ul_obj.offset({left: ul_offset.left - _s});
    }
    if (li_left < div_left) {
        var _s = div_left - li_left + 18;
        ul_obj.offset({left: ul_offset.left + _s});
    }
    show_iframe(menuid);
}

//历史菜单左、右
$(function () {
    $("div.direction a.left").click(function () {
        //第一个li宽度
        var _li = $("div.favorite_menu li.action").prev();
        //前面没有了
        if (_li.length == 0)return;
        $("div.favorite_menu li").removeClass("action");
        _li.addClass("action");
        favorite_menu_position(_li.attr("menuid"));
        show_iframe(_li.attr("menuid"));
    })
    $("div.direction a.right").click(function () {
        //第一个li宽度
        var _li = $("div.favorite_menu li.action").next();
        //前面没有了
        if (_li.length == 0)return;
        $("div.favorite_menu li").removeClass("action");
        _li.addClass("action");
        favorite_menu_position(_li.attr("menuid"));
        show_iframe(_li.attr("menuid"));
    })
})



























