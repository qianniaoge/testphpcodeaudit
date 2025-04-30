<?php
require './Mao/common.php';
$mod = isset($_GET['mod']) ? $_GET['mod'] : 0;
if ($mod == 0) {
    $title = '全部商品';
} elseif ($mod == 1) {
    $title = '天猫优选';
} elseif ($mod == 2) {
    $title = '超值捡漏';
} elseif ($mod == 3) {
    $title = '人气销量';
} elseif ($mod == 4) {
    $title = '站长推荐';
} else {
    sysmsg("分类不存在！");
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
            <div class="fui-header-right" onclick="search()">
                <i class="icon icon-search"></i>
            </div>
        </div>
        <div id="fui-content" class="fui-content navbar" style="background-color: #ffffff; padding-bottom: 0;">
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
                         style="margin:0px;padding:10px;border:0px;font-style:inherit;font-weight:inherit;font-family:inherit;vertical-align:initial;background-color:#F8F8F8;">
                        <h2 class="cap-title__main"
                            style="font-style:inherit;font-weight:inherit;font-family:inherit;font-size:18px;vertical-align:initial;">
                            商品列表
                        </h2></div>
                </div>
                <div class="fui-goods-group block three" style="background: ;" id="shop_list">
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
            <span class="label" style="color: #000000;font-family: cursive;">全部商品</span>
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
    let isLoading = false;
    var loading = '<div class="infinite-loading"><span class="fui-preloader"></span><span class="text"> 正在加载...</span></div>';
    $(function () {
        list(<?php echo $mod?>);
    });

    function list(id) {
        $("#shop_list").html(loading);
        Mao.postData('../api/data.php?mod=list&lx=1&type=' + id, '', function (d) {
            $("#shop_list").html(d);
            return false
        });
    }

    function page(lx, id, page, search) {
        var loading = layer.load();
        Mao.postData('../api/data.php?mod=list&lx=' + lx + '&type=' + id + '&page=' + page + '&search=' + search, '', function (d) {
            layer.close(loading);
            $("#shop_list").append(d);
            isLoading = false;
            return false
        });
    }

    function search() {
        layer.prompt({title: '搜索商品', formType: 0}, function (name, index) {
            var loading = layer.load();
            Mao.postData('../api/data.php?mod=list&lx=2&search=' + name + '', '', function (d) {
                layer["closeAll"]();
                $("#shop_list").html(d);
                return false
            });
        });
    }

    function handleScroll() {
        const fuiContent = $('#fui-content');
        const scrollPosition = fuiContent.scrollTop() + fuiContent.innerHeight();
        const documentHeight = fuiContent[0].scrollHeight;

        if (!isLoading && scrollPosition >= documentHeight - 1) {
            isLoading = true;
            console.log($('#lx').val() + ", " + $('#type').val() + ", " + $('#next').val() + ", " + $('#search').val());
            page($('#lx').val(), $('#type').val(), $('#next').val(), $('#search').val());
        }
    }

    $(function () {
        // 监听滚动事件
        $('#fui-content').on('scroll', handleScroll);
    });
</script>
</body>
</html>
