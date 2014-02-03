<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS免费内容管理系统--后盾网出品</title>
    <jquery/>
    <hdui/>
    <jsconst/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <base target="content"/>
</head>
<body>
<div class="nav">

    <div class="l_menu">
        <a href="javascript:;" >常用</a>
        <a href="__ROOT__" target="_blank">主页</a>
    </div>
    <!--头部左侧导航-->
 
    <div class="r_menu">
        您好！admin [{$hd.session.rname}]<span>|</span>
        <a href="{|U:'Login/out'}" target="_self">[退出]</a><span>|</span>
        <a href="#">站点首页</a><span>|</span>
        <a href="#">会员中心</a>
    </div>
    <!--头部右侧导航-->
</div>
<!--左侧导航-->
<div class="main">
    <!--主体左侧导航-->
    <div class="left_menu">
        <div class="menuid_0">
            <dl>
                <dt>商品管理</dt>
                    <dd>
                        <a href="{|U:'Admin/Goods/index'}">商品列表</a>
                        <a href="{|U:'Admin/Goods/add'}">添加商品</a>
                        <a href="{|U:'Admin/Category/index'}">商品栏目</a>
                        <a href="{|U:'Admin/GoodsType/index'}">商品类型</a>
                    </dd>
            </dl>
            <dl>
                <dt>品牌管理</dt>
                    <dd>
                        <a href="{|U:'Admin/Brand/index'}" menuid="{$m.menuid}">品牌列表</a>
                    </dd>
            </dl>
             <dl>
                <dt>网站配置</dt>
                    <dd>
                        <a href="{|U:'Admin/Config/edit_config'}" menuid="{$m.menuid}">配置管理</a>
                    </dd>
            </dl>
            <dl>
                <dt>订单管理</dt>
                    <dd>
                        <a href=#" menuid="{$m.menuid}">订单列表</a>
                        <a href=#" menuid="{$m.menuid}">订单查询</a>
                    </dd>
            </dl>
            <dl>
                <dt>用户管理</dt>
                    <dd>
                        <a href=#" menuid="{$m.menuid}">用户列表</a>
                        <a href=#" menuid="{$m.menuid}">添加新用户</a>
                    </dd>
            </dl>
        </div>
    </div>
    <!--主体左侧导航-->
    <!--内容显示区域-->
    
    <div class="content">
        <iframe src="{|U:welcome}" name="content"></iframe>
    </div>
    <!--内容显示区域-->
</div>
<!--左侧导航-->
</body>
</html>