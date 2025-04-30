<?php
require './Mao/common.php';
$cha_1 = $DB->get_row("select * from mao_dindan where M_id='{$mao['id']}' and ddh='{$_SESSION['ddh']}' limit 1");
$cha_2 = $DB->get_row("select * from mao_shop where M_id='{$mao['id']}' and id='{$cha_1['M_sp']}' limit 1");
if(!$cha_1 || !$cha_2 || $cha_1['zt'] != 1){
    sysmsg("订单或商品不存在！");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>补齐信息-<?php echo $mao['title']?></title>
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/Mao.min.css">
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/Mao.diy.css">
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/Mao_Public/css/dz.css">
    <link rel="stylesheet" href="/Mao_Public/layui/css/layui.css">
    <script src="/Mao_Public/js/jquery-2.1.1.min.js"></script>
    <script src="/Mao_Public/js/Mao.js"></script>
</head>
<body>
<div class="fui-page-group statusbar">
    <div class="fui-page fui-page-current order-pay-page">
        <div class="fui-header jb">
            <div class="fui-header-left">
                <a onclick="goBack()" class="back" style="color: #f7f7f7;"></a>
            </div>
            <div class="title" style="
             font-family: cursive;
             font-weight: bold;
             font-size: 20px;
             color: black;">补齐订单信息</div>
            <div class="fui-header-right">
            </div>
        </div>
        <div class="fui-content navbar" style="bottom: 0rem;padding-bottom: 0rem;">
            <div class="fui-cell-group">
                <div class="fui-cell">
                    <div class="fui-cell-label">收件人姓名</div>
                    <div class="fui-cell-info c000">
                        <input type="text" class="fui-input" id="xm" placeholder="请输入收件人姓名">
                    </div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">收件人手机</div>
                    <div class="fui-cell-info c000">
                       <input type="text" class="fui-input" id="shouji" placeholder="请输入收件人手机号">
                    </div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">收件人地址</div>
                    <div class="fui-cell-info c000">
                        <input type="text" class="fui-input" id="dz" placeholder="请选择收件地址">
                    </div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">详细地址</div>
                    <div class="fui-cell-info c000">
                        <input type="text" class="fui-input" id="xxdz" placeholder="请输入详细街道地址">
                    </div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">圈口</div>
                    <div class="fui-cell-info c000">
                        <input type="text" class="fui-input" id="ly" placeholder="可以为空">
                    </div>
                </div>
            </div>
            <?php
            if($cha_2['rwzl_zt'] == 0){
                ?>
                <div class="fui-cell-group">
                    <div class="fui-cell-title" style="height: 2.45rem;font-size:.7rem;color:#666;line-height: 1.425rem">补齐入网资料</div>
                    <div class="fui-cell">
                        <div class="fui-cell-label">机主姓名</div>
                        <div class="fui-cell-info c000">
                            <input type="text" class="fui-input" id="jzxm" placeholder="请输入机主姓名">
                        </div>
                    </div>
                    <div class="fui-cell">
                        <div class="fui-cell-label">身份证号</div>
                        <div class="fui-cell-info c000">
                            <input type="text" class="fui-input" id="sfzh" placeholder="请输入机主身份证号码">
                        </div>
                    </div>
                    <div class="fui-cell">
                        <div class="fui-cell-label">免冠照</div>
                        <div class="fui-cell-info c000">
                            <input type="text" class="fui-input" id="mgz" placeholder="请上传免冠照" disabled="disabled">
                        </div>
                        <div class="fui-cell-remark noremark">
                            <button type="button" class="layui-btn layui-btn-xs jb" id="test1">
                                <i class="layui-icon">&#xe67c;</i>上传
                            </button>
                        </div>
                    </div>
                    <div class="fui-cell">
                        <div class="fui-cell-label">身份证/正</div>
                        <div class="fui-cell-info c000">
                            <input type="text" class="fui-input" id="sfz1" placeholder="请上传身份证正面照" disabled="disabled">
                        </div>
                        <div class="fui-cell-remark noremark">
                            <button type="button" class="layui-btn layui-btn-xs jb" id="test2">
                                <i class="layui-icon">&#xe67c;</i>上传
                            </button>
                        </div>
                    </div>
                    <div class="fui-cell">
                        <div class="fui-cell-label">身份证/反</div>
                        <div class="fui-cell-info c000">
                            <input type="text" class="fui-input" id="sfz2" placeholder="请上传身份证反面照" disabled="disabled">
                        </div>
                        <div class="fui-cell-remark noremark">
                            <button type="button" class="layui-btn layui-btn-xs jb" id="test3">
                                <i class="layui-icon">&#xe67c;</i>上传
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="fui-cell-group" style="margin-top: 0">
                <div class="fui-cell">
                    <div class="fui-cell-label">商品名称</div>
                    <div class="fui-cell-info"></div>
                    <div class="fui-cell-remark noremark" style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;"><?php echo $cha_1['name']?></div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">订单编号</div>
                    <div class="fui-cell-info"></div>
                    <div class="fui-cell-remark noremark"><?php echo $cha_1['ddh']?></div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">购买数量</div>
                    <div class="fui-cell-info"></div>
                    <div class="fui-cell-remark noremark"><?php echo $cha_1['sl']?></div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">商品单价</div>
                    <div class="fui-cell-info"></div>
                    <div class="fui-cell-remark noremark"><span class="text-danger bigprice">￥<?php echo $cha_1['dj_price']?></span>
                    </div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">商品运费</div>
                    <div class="fui-cell-info"></div>
                    <div class="fui-cell-remark noremark"><span class="text-danger bigprice">￥<?php echo $cha_1['yf_price']?></span>
                    </div>
                </div>
                <div class="fui-cell">
                    <div class="fui-cell-label">需支付</div>
                    <div class="fui-cell-info"></div>
                    <div class="fui-cell-remark noremark"><span class="text-danger bigprice" style="font-size: 1.4rem;">￥<?php echo $cha_1['price']?></span>
                    </div>
                </div>
            </div>
            ​<div class="fui-list-group" style="margin-top:-15px;">
                <?php
                if($mao['yzf_type'] == 1){//跟随系统
                    if($mao_zz['zfb_zf'] == 0){
                        ?>
                        <div class="fui-list pay-btn" onclick="pay(3)">
                            <div class="fui-list-media">
                                <img src="/Mao_Public/img/zfb.png" alt="">
                            </div>
                            <div class="fui-list-inner">
                                <div class="title">
                                    支付宝扫码支付
                                </div>
                                <div class="subtitle c999 f24">
                                    <img src="/Mao_Public/img/safe.png" alt="" style="height: .8rem;vertical-align: text-bottom">支付宝安全支付
                                </div>
                            </div>
                            <div class="fui-list-angle"><span class="angle"></span></div>
                        </div>
                        <?php
                    }
                    if($mao_zz['qq_zf'] == 0){
                        ?>
                        <div class="fui-list pay-btn" onclick="pay(1)">
                            <div class="fui-list-media">
                                <img src="/Mao_Public/img/qq.png" alt="">
                            </div>
                            <div class="fui-list-inner">
                                <div class="title">
                                    QQ扫码支付
                                </div>
                                <div class="subtitle c999 f24">
                                    <img src="/Mao_Public/img/safe.png" alt="" style="height: .8rem;vertical-align: text-bottom">QQ安全支付
                                </div>
                            </div>
                            <div class="fui-list-angle"><span class="angle"></span></div>
                        </div>
                        <?php
                    }
                    if($mao_zz['wx_zf'] == 0){
                        ?>
                        <div class="fui-list pay-btn" onclick="pay(2)">
                            <div class="fui-list-media">
                                <img src="/Mao_Public/img/wx.png" alt="">
                            </div>
                            <div class="fui-list-inner">
                                <div class="title">
                                    微信扫码支付
                                </div>
                                <div class="subtitle c999 f24">
                                    <img src="/Mao_Public/img/safe.png" alt="" style="height: .8rem;vertical-align: text-bottom">微信安全支付
                                </div>
                            </div>
                            <div class="fui-list-angle"><span class="angle"></span></div>
                        </div>
                        <?php
                    }
                }else{
                    if($mao['zfb_zf'] == 0){
                        ?>
                        <div class="fui-list pay-btn" onclick="pay(3)">
                            <div class="fui-list-media">
                                <img src="/Mao_Public/img/zfb.png" alt="">
                            </div>
                            <div class="fui-list-inner">
                                <div class="title">
                                    支付宝扫码支付
                                </div>
                                <div class="subtitle c999 f24">
                                    <img src="/Mao_Public/img/safe.png" alt="" style="height: .8rem;vertical-align: text-bottom">支付宝安全支付
                                </div>
                            </div>
                            <div class="fui-list-angle"><span class="angle"></span></div>
                        </div>
                        <?php
                    }
                    if($mao['qq_zf'] == 0){
                        ?>
                        <div class="fui-list pay-btn" onclick="pay(1)">
                            <div class="fui-list-media">
                                <img src="/Mao_Public/img/qq.png" alt="">
                            </div>
                            <div class="fui-list-inner">
                                <div class="title">
                                    QQ扫码支付
                                </div>
                                <div class="subtitle c999 f24">
                                    <img src="/Mao_Public/img/safe.png" alt="" style="height: .8rem;vertical-align: text-bottom">QQ安全支付
                                </div>
                            </div>
                            <div class="fui-list-angle"><span class="angle"></span></div>
                        </div>
                        <?php
                    }
                    if($mao['wx_zf'] == 0){
                        ?>
                        <div class="fui-list pay-btn" onclick="pay(2)">
                            <div class="fui-list-media">
                                <img src="/Mao_Public/img/wx.png" alt="">
                            </div>
                            <div class="fui-list-inner">
                                <div class="title">
                                    微信扫码支付
                                </div>
                                <div class="subtitle c999 f24">
                                    <img src="/Mao_Public/img/safe.png" alt="" style="height: .8rem;vertical-align: text-bottom">微信安全支付
                                </div>
                            </div>
                            <div class="fui-list-angle"><span class="angle"></span></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!--<div class="fui-cell-group fui-cell-click transparent">
                <a class="fui-cell external btn-mao" onclick="submit()">
                    <div class="fui-cell-text jb" style="text-align: center;">
                        <p>保 存</p>
                    </div>
                </a>
            </div><br>-->
        </div>
    </div>
</div>
<script src="/Mao_Public/js/city.js"></script>
<script src="/Mao_Public/js/address.js"></script>
<script src="/static/layui-v2.9.17/layui.js"></script>
<script>
    layui.use('upload', function(){
        var upload = layui.upload;
        upload.render({
            elem: '#test1'
            ,url: '../api/api.php?mod=upload&type=1'
            ,done: function(res){
                layer.msg(res.msg, function(){
                    if(res.code == 0){
                        $('#mgz').val(res.name)
                    }
                });
            }
            ,error: function(){
                layer.msg('~连接服务器失败！', {icon: 5});
            }
        });
        upload.render({
            elem: '#test2'
            ,url: '../api/api.php?mod=upload&type=1'
            ,done: function(res){
                layer.msg(res.msg, function(){
                    if(res.code == 0){
                        $('#sfz1').val(res.name)
                    }
                });
            }
            ,error: function(){
                layer.msg('~连接服务器失败！', {icon: 5});
            }
        });
        upload.render({
            elem: '#test3'
            ,url: '../api/api.php?mod=upload&type=1'
            ,done: function(res){
                layer.msg(res.msg, function(){
                    if(res.code == 0){
                        $('#sfz2').val(res.name)
                    }
                });
            }
            ,error: function(){
                layer.msg('~连接服务器失败！', {icon: 5});
            }
        });
    });
    !function() {
        var $target = $('#dz');
        $target.citySelect();
        $target.on('click', function(event) {
            event.stopPropagation();
            $target.citySelect('open');
        });
        $target.on('done.ydui.cityselect', function(ret) {
            $(this).val(ret.provance + ' ' + ret.city + ' ' + ret.area);
        });
    }();


    function loadAddress() {
        let hostName = "<?php echo $_SERVER['SERVER_NAME'] ?>";
        const address = localStorage.getItem(hostName);
        if (address) {
            const data = JSON.parse(address);
            $('#xm').val(data.xm);
            $('#dz').val(data.dz);
            $('#shouji').val(data.shouji);
            $('#xxdz').val(data.xxdz);
            $('#ly').val(data.ly);
        }
    }

    function saveAddress() {
        let hostName = "<?php echo $_SERVER['SERVER_NAME'] ?>";
        const address = {
            xm: $("#xm").val(),
            dz: $("#dz").val(),
            xxdz: $("#xxdz").val(),
            ly: $("#ly").val(),
            shouji: $("#shouji").val()
        };
        localStorage.setItem(hostName, JSON.stringify(address))
    }

    $(function () {
        loadAddress();
    });

    function pay(type) {
        createOrder(type);
    }

    function createOrder(type) {
        var loading = layer.load();
        $.ajax({
            url: '../api/api.php',
            type: 'POST',
            dataType: 'json',
            data: {
                mod: "repair",
                ddh: "<?php echo $cha_1['ddh']?>",
                xm: $("#xm").val(),
                dz: $("#dz").val(),
                xxdz: $("#xxdz").val(),
                ly: $("#ly").val(),
                jzxm: $("#jzxm").val(),
                sfzh: $("#sfzh").val(),
                mgz: $("#mgz").val(),
                sfz1: $("#sfz1").val(),
                sfz2: $("#sfz2").val(),
                shouji: $("#shouji").val()
            },
            success: function (a) {
                layer.close(loading);
                if (a.code == 0) {
                    saveAddress();
                    OrderPay(type);
                } else {
                    layer.msg(a.msg);
                }
            },
            error: function() {
                layer.close(loading);
                layer.msg('~连接服务器失败！', {icon: 5});
            }
        });
    }

    function OrderPay(type) {
        var loading = layer.msg('正在转跳到支付.请稍后...', {icon: 16,shade: 0, time: 0});
        $.ajax({
            url: '../api/api.php',
            type: 'POST',
            dataType: 'json',
            data: {mod: "pay", type: type, ddh: "<?php echo $cha_1['ddh']?>"},
            success: function (a) {
                layer.close(loading);
                if (a.code == 0){
                    layer.msg(a.msg, {icon: 6}, function(){
                        window.location.href = "/index.php";
                    });
                } else if(a.code == 1){
                    window.location.href = "../api/pay_1.php?type=" + a.type + "&ddh=" + a.ddh + "";
                } else if(a.code == 2){
                    window.location.href = "../api/pay_2.php?type=" + a.type + "&ddh=" + a.ddh + "";
                } else {
                    layer.msg(a.msg);
                }
            },
            error: function() {
                layer.close(loading);
                layer.msg('~连接服务器失败！', {icon: 5});
            }
        });
    }
</script>
</body>
</html>
