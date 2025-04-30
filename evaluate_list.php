<?php
require './Mao/common.php';
$mod = isset($_GET['mod']) ? $_GET['mod'] : 0;
$sp_id = isset($_GET['sp_id']) ? $_GET['sp_id'] : 0;
if ($sp_id === 0) {
    sysmsg("商品不存在！");
} else {
    //查询评论
    $title = "评价";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $mao['title'] ?></title>
    <link rel="stylesheet" type="text/css" href="/static/layui-v2.9.17/css/layui.css" >
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/Mao.min.css">
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/Mao.diy.css">
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/iconfont.css">

    <link rel="stylesheet" type="text/css" href="static/css/details.css?v1.0">
    <link rel="stylesheet" type="text/css" href="static/css/uni.css?v1.0">
    <link rel="stylesheet" type="text/css" href="static/css/Tags.css?v1.0">

    <script src="/Mao_Public/js/jquery-2.1.1.min.js"></script>
    <script src="/static/layui-v2.9.17/layui.js"></script>
    <script src="/Mao_Public/js/Mao.js"></script>
</head>
<body>
<div class="fui-page-group">
    <div class="fui-page  fui-page-current " style="top: 0; background-color: #fafafa;">
        <div class="fui-header jb">
            <div class="fui-header-left">
                <a onclick="goBack()" class="back" style="color: #f7f7f7;"></a>
            </div>
            <div class="title" style="
             font-family: cursive;
             font-weight: bold;
             font-size: 20px;
             color: black;"><?php echo $title ?></div>
        </div>
        <div class="fui-content navbar" style="background-color: #ffffff; padding-bottom: 0;">
            <div class="fui-notice" style="background: #ffffff; border-color: ; margin-bottom: 0px;" data-speed="4">
                <div class="icon">
                    <i class="icon icon-notification1" style="font-size: 0.7rem; color: #fd5454;"></i>
                </div>
                <div class="text" style="color: #666666;">
                    <ul>
                        <li>
                            <a href="javascript:;" style="color: #666666;" data-nocache="true">
                                <marquee behavior="scroll" scrolldelay="100" scrollamount="5">
                                    <?php echo $mao['gd_gg'] ?>
                                </marquee>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="fui-cell-group">
                <div id="lazyComponent12" class="lazy-component lazy-component__image"
                     style="margin:0px;padding:0px;border:0px;font-family:-apple-system, BlinkMacSystemFont, &quot;font-size:16px;vertical-align:initial;color:#333333;background-color:#CEE6FD;">
                    <div class="cap-title cap-title--normal"
                         style="margin:0px;padding: 5px 10px;border:0px;font-style:inherit;font-weight:inherit;font-family:inherit;vertical-align:initial;background-color:#F8F8F8;">
                        <h2 class="cap-title__main"
                            style="font-style:inherit;font-weight:inherit;font-family:inherit;font-size:18px;vertical-align:initial;">
                            <span style="font-size: 16px; font-weight: 900; font-family: fangsong;">评价列表</span>
                            <span id="ts" style="float: right; font-size: 9px; font-family: fangsong; padding-top: 7px;">1</span>
                        </h2>

                    </div>
                </div>
                <div class="fui-goods-group block three" style="background: ;" id="evaluate_list">
                </div>
                <div id="page"></div>

            </div>

        </div>
    </div>
    <div class="fui-navbar">
        <a href="index.php" class="external nav-item ">
            <span class="icon icon-home"></span>
            <span class="label">首页</span>
        </a>
        <a href="list.php" class="external nav-item active">
            <span class="icon icon-list"></span>
            <span class="label">全部商品</span>
        </a>
        <a onclick="kefu()" class="external nav-item ">
            <span class="icon icon-person2"></span>
            <span class="label">联系客服</span>
        </a>
        <a href="/user/index.php" class="external nav-item ">
            <span class="icon icon-daifukuan1"></span>
            <span class="label">订单查询</span>
        </a>
    </div>
</div>
<script>
    var loading = '<div class="infinite-loading"><span class="fui-preloader"></span><span class="text"> 正在加载...</span></div>';
    $(function () {
        list(<?php echo $sp_id?>);
    });

    function list(sp_id) {
        $("#evaluate_list").html(loading);
        Mao.postData('../api/data.php?mod=evaluate_list&sp_id=' + sp_id, function (d) {
            $("#evaluate_list").html(d);
            return false
        }, function (error) {
            $("#evaluate_list").html(error);
            return false
        });
    }

    function page(lx, sp_id, page) {
        var loading = layer.load();
        Mao.postData('../api/data.php?mod=evaluate_list&sp_id=' + sp_id + '&page=' + page, '', function (d) {
            layer.close(loading);
            $("#evaluate_list").append(d);
            return false
        });
    }
</script>
</body>
</html>
