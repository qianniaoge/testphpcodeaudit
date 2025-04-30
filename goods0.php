<!DOCTYPE html>
<?php
require './Mao/common.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$cha_1 = $DB->get_row("select * from mao_shop where M_id='{$mao['id']}' and id='{$id}' limit 1");
if ($cha_1['type'] == 1) {
    $bt = "天猫优选";
} elseif ($cha_1['type'] == 2) {
    $bt = "超值捡漏";
} elseif ($cha_1['type'] == 3) {
    $bt = "人气销量";
}
if (!$cha_1) {
    sysmsg("商品不存在！");
}

$sql = "M_id='{$mao['id']}' and M_sp='{$id}'";
$numrows = $DB->count("SELECT count(*) from mao_evaluate WHERE {$sql} ");
if ($numrows >= 1) {
    $evaluate = $DB->get_row("SELECT * FROM mao_evaluate WHERE {$sql} order by id desc limit 1");
}
?>
<html>
<head>

    <meta name="description" itemprop="description" content="￥<?php echo $cha_1['price'] ?>">
    <link href="<?php echo $cha_1['img'] ?>" rel="shortcut icon">
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

    <script src="static/js/jquery-2.1.1.min.js"></script>
    <script src="/static/layui-v2.9.17/layui.js"></script>
    <script src="static/js/Mao.js"></script>

    <style type="text/css">
        .layui-layer-setwin {
            right: 27px;
        }
    </style>
</head>
<body>
<div class="fui-page-group">
    <div class="fui-page fui-page-current page-goods-detail">

        <div class="fui-content basic-block pulldown ">
            <div class="fui-swipe goods-swipe">
                <div class="fui-swipe-wrapper">
                    <div class="fui-swipe-item"><img src="<?php echo $cha_1['img'] ?>"></div>
                </div>
            </div>
            <div class="fui-cell-group fui-detail-group"
                 style="margin-top: 0px; margin-bottom: 0px; background: #ffffff;">

                <div class="fui-cell goods-subtitle">
                    <span class="text-danger" style="color: #ef4f4f;">
                                            </span>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-text price">
                        <span class="text-danger" style="vertical-align: middle; color: #ef4f4f; ">
                            <span style="font-size:1rem;">
                                ￥</span></span><?php echo $cha_1['price'] ?> </span>
                    </div>
                    <span style="color: #999999;font-size: 12px;margin-top: 5px;">已售:  <?php echo $cha_1['xiaoliang'] ?></span>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-text name" style="color: #333333;font-size: 0.9rem;">
                        <img src="static/picture/bt.png" style="height: 18px;margin-right: 5px;">
                        <span style="margin-top:10px;"><?php echo $cha_1['name'] ?></span>
                    </div>
                </div>

                <div class="item-serve ">
                    <div><img src="static/picture/xq.png" style="height: 18px;margin-right: 6px;vertical-align:middle;">
                        <span style="color: #CB7947">基地甄选 · 品质保障 · 售后无忧</span></div>
                    <div class="baozhang">正品保障 · 损坏包赔 · 运费险· 七天无理由</div>

                    <div class="wuliu">物流 <span class="xianhuo">现货</span><span
                                class="songjian "> 闪电送检，24小时内发货，包邮</span>
                    </div>
                </div>

            </div>

            <?php
            if ($numrows <= 0) {
                ?>
                <div class="fui-cell-group">
                    <div class="pingjia"> 暂无评价 (0)</div>
                    <a href="#"><span class="details_label" style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <div class="icon-right right"></div>
                    </a>
                </div>
                <?php
            } else {
                ?>
                <div class="fui-cell-group">
                    <div class="pingjia">商品评价 (<?php echo $numrows ?>)</div>
                    <a href="/evaluate_list.php?sp_id=<?php echo $id ?>"><span class="details_label"
                                                                               style="color: #000000">查看全部</span>
                        <div class="icon-right right"></div>
                    </a>
                    <div class="details-main_evaluate__item">
                        <div class="details-main_evaluate__left">
                            <div class="details-main_evaluate__top">
                                <div class="details-main_other__more"
                                     style="background-image: url(<?php echo $evaluate['user_img'] ?>); background-position: 0% 0%; background-size: 100% 100%;">
                                    <span></span>
                                    <img src="" draggable="false">
                                </div>
                                <div class="details-main_evaluate__name"><?php echo $evaluate['user_name'] ?></div>
                            </div>
                            <div class="details-main_evaluate__bottom u-line-2">
                                <?php echo $evaluate['pj_text'] ?>
                            </div>
                            <div class="Tags">
                                <?php
                                $tags = $evaluate['tags'];
                                $tagsArray = explode(',', $tags);
                                foreach ($tagsArray as $tag) {
                                    $tag = trim($tag);
                                    ?>
                                    <div class="Tags-item"
                                         style="color: rgb(222, 171, 128); border: 0.03125rem solid rgb(222, 171, 128); background-color: rgb(255, 241, 238); padding: 0px 0.3125rem;">
                                        <?php echo $tag ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="details-main_evaluate__right">
                            <div class="details-main_evaluate__imgs"
                                 style="background-image: url(<?php echo $evaluate['pj_img'] ?>); background-position: 0% 0%; background-size: 100% 100%;">
                            </div>
                            <div class="details-main_evaluate__imgsNum"><?php echo $evaluate['pj_img_cot'] ?></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="fui-cell-group">
                <div class="fui-cell">
                    <div>商品详情</div>
                </div>
                <hr>
                <div class="content-block content-images" style="margin: 0.4rem 0.4rem;">
                    <?php
                    if ($cha_1['xq'] == "" || $cha_1['xq'] == null) {
                        echo '<p>该商品未设置详情内容~</p>';
                    } else {
                        echo $cha_1['xq'];
                    }
                    ?> </div>
            </div>
        </div>
    </div>
    <div class="fui-navbar bottom-buttons" style="background: #ffffff;">
        <a class="nav-item favorite-item " href="index.php">
            <span class="icon icon-shop"></span>
            <span class="label" style="color: #000000">店铺</span>
        </a>

        <a onclick="kefu()" class="external nav-item ">
            <span class="icon icon-service1" style="color: #000000"></span>
            <span class="label" style="color: #000000">客服</span>
        </a>


        <a class="nav-item btn buybtn jb" data-type="rb" onclick="aClick()" style="width:5%;">立即购买</a></div>
    <div style="display: none;" id="ceshi">
        <div class="fui-modal picker-modal in">
            <div class="option-picker ">
                <div class="option-picker-inner">
                    <div class="option-picker-cell goodinfo">

                        <div class="img" style="z-index: 9999;"><img class="thumb" src="<?php echo $cha_1['img'] ?>">
                        </div>

                        <div class="info info-price text-danger">
                            <span>
                                ￥<span class="price"><?php echo $cha_1['price'] ?></span>
                            </span>
                        </div>
                        <div style="color:#777;font-size:0.6rem;">
                            库存： 99999件
                        </div>
                        <div style="font-size:0.7rem;">
                            已选择：标配
                        </div>
                    </div>
                    <div class="option-picker-options">

                        <div class="fui-cell-group" style="margin-top:0">
                            <div class="fui-cell">
                                <div class="fui-cell-label">数量</div>
                                <div class="fui-cell-info"></div>
                                <div class="fui-cell-mask noremark">
                                    <div class="fui-number" style="width: 7rem;">
                                        <div class="minus2 disabled">-</div>
                                        <input class="num2" type="tel" name="buynum" value="1" id="goos_num2"
                                               onkeyup="if(isNaN(value))execCommand(&#39;undo&#39;)">
                                        <div class="plus2">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="fui-navbar  " style="display: block;">
            <a href="javascript:;" class="nav-item btn jb" style="" onclick="create();">确定</a>
        </div>
        <script type="text/javascript">
            let numInput;
            let minusButton;
            let plusButton;
            let quantity;

            // 更新按钮状态
            function updateButtonStates() {
                minusButton.toggleClass('disabled', quantity <= 1);
                plusButton.toggleClass('disabled', quantity >= 9999);
            }

            $(document).ready(function () {
                numInput = $('#goos_num');
                minusButton = $('.minus');
                plusButton = $('.plus');
                // 初始化数量
                quantity = parseInt(numInput.val(), 10);

                // 点击减号按钮
                minusButton.click(function () {
                    if (!minusButton.hasClass('disabled') && quantity > 1) {
                        quantity--;
                        numInput.val(quantity);
                        updateButtonStates();
                    }
                });

                // 点击加号按钮
                plusButton.click(function () {
                    if (!plusButton.hasClass('disabled') && quantity < 9999) {
                        quantity++;
                        numInput.val(quantity);
                        updateButtonStates();
                    }
                });


                // 输入框变化时更新数量
                numInput.on('input', function () {
                    const value = parseInt($(this).val(), 10);
                    if (!isNaN(value) && value >= 1 && value <= 9999) {
                        quantity = value;
                        updateButtonStates();
                    } else {
                        $(this).val(quantity); // 恢复之前的值
                    }
                });

                // 初始状态
                updateButtonStates();
            });

            function create() {
                var loading = layer.open({
                    type: 3
                    , content: '加载中'
                    , shade: 'background-color: rgba(0,0,0,.2)'
                    , shadeClose: false
                });
                $.ajax({
                    url: 'api/api.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        mod: "create",
                        id: "<?php echo $cha_1['id']?>",
                        num: $('#goos_num').val(),
                        // shouji: $("#lianxi").val()
                    },
                    success: function (a) {
                        layer.close(loading);
                        if (a.code == 0) {
                            window.location.href = "repair.php";
                        } else {
                            layer.open({
                                content: a.msg
                                , skin: 'msg'
                                , time: 2
                            });
                        }
                    },
                    error: function () {
                        layer.close(loading);
                        layer.open({
                            content: '~连接服务器失败！'
                            , skin: 'msg'
                            , time: 2
                        });
                    }
                });
            }
        </script>
    </div>
</div>
<script type="text/javascript">
    function aClick() {
        var html = $('#ceshi').html();
        html = html.replace(/lianxi2/g, "lianxi");
        html = html.replace(/num2/g, "num");
        html = html.replace(/closebtn2/g, "closebtn");
        html = html.replace(/goos_num2/g, "goos_num");
        html = html.replace(/minus2/g, "minus");
        html = html.replace(/plus2/g, "plus");
        layer.open({
            title: false,
            type: 1,
            content: html,
            anim: 'up',
            offset: 'b',
            area: '100%',
            skin: 'demo-class'

        });
    }

    function closebtn() {
        layer.closeAll();
    }
</script>


<div class="layui-layer-move"></div>
</body>
</html>
