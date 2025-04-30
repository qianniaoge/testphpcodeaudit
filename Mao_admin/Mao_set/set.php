<?php
require '../../Mao/common.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='login.php';</script>");
if( $_SERVER['HTTP_REFERER'] == "" ){
    exit('404');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $mao['title']?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="../layui/css/layui.css" media="all">
    <link rel="stylesheet" href="../css/admin.css" media="all">
    <script src="/Mao_Public/js/jquery-2.1.1.min.js"></script>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md2"></div>
        <div class="layui-col-md8">
            <div class="layui-card">
                <div class="layui-card-header">
                    <fieldset class="layui-elem-field layui-field-title">
                        <img id="shop_logo_show" src="<?php echo $mao['shop_logo'] ?>" alt="<?php echo $mao['shop_logo'] ?>" style="float: right; width: 60px; height: 60px;">
                        <legend>系统设置</legend>
                    </fieldset>
                </div>
                <div class="layui-card-body">
                    <form class="layui-form layui-form-pane" action="">
                        <div class="layui-form-item" id="shop_logo_url">
                            <label class="layui-form-label">网站LOGO</label>
                            <div class="layui-input-inline">
                                <input type="text" id="shop_logo" placeholder="请上传网站LOGO！" class="layui-input"
                                       value="<?php echo $mao['shop_logo'] ?>">
                            </div>
                            <button type="button" class="layui-btn layui-btn-danger" id="shop_logo_upload"><i
                                        class="layui-icon"></i>上传图片
                            </button>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站标题</label>
                            <div class="layui-input-block">
                                <input type="text" id="title" autocomplete="off" placeholder="如：某某商城" class="layui-input" value="<?php echo $mao['title']?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">店铺名称</label>
                            <div class="layui-input-block">
                                <input type="text" id="shop_name" autocomplete="off" placeholder="如：某某商城" class="layui-input" value="<?php echo $mao['shop_name']?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">店铺平分</label>
                            <div class="layui-input-block">
                                <input type="text" id="shop_bisect" autocomplete="off" placeholder="如：4.5,5.0" class="layui-input" value="<?php echo $mao['shop_bisect']?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">站长Q Q</label>
                            <div class="layui-input-block">
                                <input type="text" id="qq" autocomplete="off" placeholder="请输入站长QQ号" class="layui-input" value="<?php echo $mao['qq']?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">站长微信</label>
                            <div class="layui-input-block">
                                <input type="text" id="wx" autocomplete="off" placeholder="请输入站长微信号" class="layui-input" value="<?php echo $mao['wx']?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">站长手机</label>
                            <div class="layui-input-inline">
                                <input type="text" id="sj" autocomplete="off" placeholder="请输入站长手机号" class="layui-input" value="<?php echo $mao['sj']?>">
                            </div>
                            <div class="layui-form-mid layui-word-aux">部分短信功能需要用到</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">滚动公告</label>
                            <div class="layui-input-block">
                                <input type="text" id="gd" autocomplete="off" placeholder="如：欢迎使用某某商城" class="layui-input" value="<?php echo $mao['gd_gg']?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">首页总销量</label>
                            <div class="layui-input-block">
                                <input type="text" id="total_sales" autocomplete="off" placeholder="如：已售5万" class="layui-input" value="<?php echo $mao['total_sales']?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">友盟ID</label>
                            <div class="layui-input-block">
                                <input type="text" id="ym_id" autocomplete="off" placeholder="不设置为空即可" class="layui-input" value="<?php echo $mao['ym_id']?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">登陆密码</label>
                            <div class="layui-input-block">
                                <input type="text" id="pass" autocomplete="off" placeholder="不修改为空" class="layui-input">
                            </div>
                        </div>
                    </form>
                    <button class="layui-btn" onclick="set()"><i class="layui-icon"></i> 保 存</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../layui/layui.js"></script>
<script>
    layui.config({
        base: '../' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'form', 'upload', 'layedit'], function () {
        var upload = layui.upload
            , layedit = layui.layedit;
        upload.render({
            elem: '#shop_logo_upload'
            , url: '/api/api.php?mod=upload&type=1'
            , done: function (res) {
                if (res.code == 0) {
                    $('#shop_logo_show').attr('src', res.name);
                    $('#shop_logo_show').attr('alt', res.name);
                    $('#shop_logo_url').html('<label class="layui-form-label">网站LOGO</label><div class="layui-input-inline"><input type="text" id="shop_logo" class="layui-input layui-disabled" value="' + res.name + '" disabled></div>');
                } else {
                    layer.msg(a.msg);
                }
            }
        });
        layedit.set({
            uploadImage: {
                url: '/api/api.php?mod=upload&type=1'
                , type: 'post'
            }
        });
    });

    function set(){
        var loading = layer.load();
        $.ajax({
            url: '/Mao_admin/api.php',
            type: 'POST',
            dataType: 'json',
            data: {
                mod: "set",
                title: $('#title').val(),
                qq: $('#qq').val(),
                wx: $('#wx').val(),
                sj: $('#sj').val(),
                gd: $('#gd').val(),
                pass: $('#pass').val(),
                ym_id: $('#ym_id').val(),
                total_sales: $('#total_sales').val(),
                shop_logo: $('#shop_logo').val(),
                shop_name: $('#shop_name').val(),
                shop_bisect: $('#shop_bisect').val()
            },
            success: function (a) {
                layer.close(loading);
                if (a.code == 0) {
                    layer.msg(a.msg);
                } else if(a.code == 1){
                    layer.msg(a.msg, function() {
                        window.open("/Mao_admin/login.php", "_self");
                    });
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
