<?php
require './Mao/common.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $mao['title'] ?></title>
    <link rel="stylesheet" type="text/css" href="/static/css/Fn.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/style.css">
    <link rel="stylesheet" type="text/css" href="/static/css/Fn.diy.css">
    <link rel="stylesheet" type="text/css" href="/static/css/iconfont.css">
    <script src="/static/js/jquery-2.1.1.min.js"></script>
    <script src="/static/js/layer2.js"></script>
    <script src="/static/js/Fn.js"></script>
</head>
<body>
<iframe id="mainFrame" src="https://www.xznkf.cn/aa/1?appid=9705&yzm=3dc43tcsst&zy=1"
        style="border-width: 0px;width: 100vw;height: 92vh;overflow:visible;">
</iframe>
<div class="fui-navbar">
    <a href="index.php" class="external nav-item">
        <span class="icon icon-home"></span>
        <span class="label">首页</span>
    </a>
    <a href="list.php" class="external nav-item ">
        <span class="icon icon-list"></span>
        <span class="label">全部商品</span>
    </a>
    <a href="/kefu.php" class="external nav-item active">
        <span class="icon icon-person2"></span>
        <span class="label">联系客服</span>
    </a>
    <a href="/user/index.php" class="external nav-item ">
        <span class="icon icon-daifukuan1"></span>
        <span class="label">订单查询</span>
    </a>
</div>
</body>
</html>
