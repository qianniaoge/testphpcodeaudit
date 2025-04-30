<?php
require './Mao/common.php';
$ratingValue = isset($mao['shop_bisect']) ? $mao['shop_bisect'] : 5;
if ($ratingValue < 3.0) {
    $ratingString = "低";
} elseif ($ratingValue <= 4.0 && $ratingValue >= 3.0) {
    $ratingString = "中";
} elseif ($ratingValue > 4.0) {
    $ratingString = "高";
} else {
    $ratingString = "高";
}
$shopName = isset($mao['shop_name']) ? $mao['shop_name'] : "商品严选";
$shopLogo = isset($mao['shop_logo']) ? $mao['shop_logo'] : "/static/picture/logo.png";
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $mao['title'] ?></title>
    <link rel="stylesheet" type="text/css" href="static/layui-v2.9.17/css/layui.css">
    <link rel="stylesheet" type="text/css" href="static/css/Mao.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
    <link rel="stylesheet" type="text/css" href="static/css/Mao.diy.css">
    <link rel="stylesheet" type="text/css" href="static/css/iconfont.css">

    <link rel="stylesheet" type="text/css" href="static/css/details.css?v1.0">
    <link rel="stylesheet" type="text/css" href="static/css/uni.css?v1.0">
    <link rel="stylesheet" type="text/css" href="static/css/Tags.css?v1.0">
    <link rel="stylesheet" type="text/css" href="static/css/Tabs.css?v1.0">
    <link rel="stylesheet" type="text/css" href="static/css/lobster.css?v1.0">

    <script src="static/js/jquery-2.1.1.min.js"></script>
    <script src="/static/layui-v2.9.17/layui.js"></script>
    <script src="static/js/Mao.js"></script>


    <link rel="stylesheet" type="text/css" href="static/css/index.css">
    <script src="static/js/zepto.js"></script>
    <script src="static/js/bui.js"></script>
    <script src="static/js/isPc.js"></script>

</head>
<body>
<div class="fui-page-group">
    <div class="fui-page  fui-page-current " style="top: 0; background-color: #fafafa;">
        <div class="fui-content navbar" style="background-color: #ffffff; padding-bottom: 0px;">
            <div class="fui-notice" style="background: #cccccc47; border-color: ; margin-bottom: 0px;" data-speed="4">
                <ul class="bui-list bui-list-thumbnail">
                    <li class="bui-btn bui-box">
                        <div class="tx"><img width="100%" height="100%" src="<?php echo $shopLogo; ?>" alt=""></div>
                        <div class="span1">
                            <h3 class="item-title"
                                style="font-weight: bolder;font-size:14px;color:#333;margin-bottom: 0.1rem;">
                                <?php echo $shopName; ?></h3>
                            <div class="item-text" style="display:flex;justify-content: space-between">
                                <div style="color: #ff0057;font-size:13px;float:left"><?php echo $ratingValue; ?><span class="dj"><?php echo $ratingString; ?></span>
                                    <div id="rating" class="bui-rating" style="float:left"></div>
                                </div>

                                <p style="color:#666;font-size:12px;padding:2px;"><?php echo $mao['total_sales'] ?></p>
                            </div>
                            <div class="icon_content">
                                <div class="icon_item"><img src="static/picture/zijin.png"> <span>已缴纳保证金<?php echo $mao['user']; ?></span>
                                </div>
                                <div class="icon_item"><img src="static/picture/zizhi.png"> <span>商家资质</span></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="fui-cell-group top-position-sticky">
                <div class="Tabs artistic-text">
                    <div class="Tabs-item Tabs-item_active" style="width: 25%;">综合</div>
                    <div class="Tabs-item" style="width: 25%;">销量</div>
                    <div class="Tabs-item" style="width: 25%;">新品</div>
                    <div class="Tabs-item" style="width: 25%;">
                        价格
                        <div class="Tabs-sorts">
                            <div class="Tabs-sorts_item Tabs-sorts_up"
                                 style="background-image: url(/static/image/top1.png); background-position: center center; background-size: contain;">
                            </div>
                            <div class="Tabs-sorts_item Tabs-sorts_down"
                                 style="background-image: url(/static/image/top1.png); background-position: center center; background-size: contain;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fui-cell-group">
                <div class="fui-cell" style="border-bottom: 1px solid #eee; height: 20px;">
                    <div class="fui-cell-info" style="border-left: 5px solid #fb375b;padding-left: 5px;">
                        <span id="index_title">最新商品</span>
                        <a style="float:right" href="list.php">更多</a>
                    </div>
                </div>
                <div id="index_list" class="fui-goods-group block three" style="background: ;">
                </div>
            </div>
        </div>
    </div>
    <div id="footer" class="fui-navbar">
        <a href="index.php" class="external nav-item active">
            <span class="icon icon-home"></span>
            <span class="label" style="color: #000000;font-family: cursive;">首页</span>
        </a>
        <a href="list.php" class="external nav-item ">
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
    // 展示
    window.uiRating = bui.rating({
        id: "#rating",
        disabled: true,
        value: 5
    });
    window.uiRating.show(<?php echo $ratingValue; ?>);

    function goPAGE() {
        if ((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))) {
            /*window.location.href="你的手机版地址";*/
        } else {
            /*window.location.href="你的电脑版地址";
            window.location.href="isPc.html";*/
            document.getElementsByTagName("body")[0].style.width = '750px';
            document.getElementsByTagName("body")[0].style.margin = '0 auto';
            // document.getElementsByTagName("footer")[0].style.width = '750px';
            // $('body').addClass("fui-navbar");
            $('#footer').attr('style', 'max-width: 750px; position: sticky;');
        }
    }

    let jgSorts = "";
    $(document).ready(function() {
        goPAGE();
        $('.Tabs-item').click(function() {
            $('.Tabs-item').removeClass('Tabs-item_active');

            $(this).addClass('Tabs-item_active');
            var data = $(this).html().length >= 10 ? "价格" : $(this).html();
            $("#index_title").html(data + "商品");
            if (data !== "价格") {
                resetTabs();
            }
            query(data);
        });
        query("综合");
        $("#index_title").html("综合商品");

        // 点击 Tabs-sorts_up 时的处理函数
        $('.Tabs-sorts_up').click(function() {
            // 替换背景图片
            $('.Tabs-sorts_down').css('background-image', 'url(/static/image/top1.png)');
            $(this).css('background-image', 'url(/static/image/top2.png)');
            jgSorts = "desc";
        });

        // 点击 Tabs-sorts_down 时的处理函数
        $('.Tabs-sorts_down').click(function() {
            // 替换背景图片
            $('.Tabs-sorts_up').css('background-image', 'url(/static/image/top1.png)');
            $(this).css('background-image', 'url(/static/image/top2.png)');
            jgSorts = "asc";
        });
    });

    function resetTabs() {
        $('.Tabs-sorts_up').css('background-image', 'url(/static/image/top1.png)');
        $('.Tabs-sorts_down').css('background-image', 'url(/static/image/top1.png)');
        jgSorts = "";
    }


    var loading = '<div class="infinite-loading"><span class="fui-preloader"></span><span class="text"> 正在加载...</span></div>';
    function query(tabs){
        $("#index_list").html(loading);
        Mao.postData('../api/data.php?mod=index_list&tabs=' + tabs + '&sorts=' + jgSorts, function (d) {
            $("#index_list").html(d);
            return false
        }, function (error) {
            $("#index_list").html(error);
            return false
        });
    }

</script>
</body>
</html>
