<?php
global $DB, $mao;
require '../../Mao/common.php';
if ($islogin == 1) {
} else exit("<script language='javascript'>window.location.href='login.php';</script>");
if ($_SERVER['HTTP_REFERER'] == "") {
    exit('404');
}

$sql = " M_id='{$mao['id']}' and zt = '0'";
$rs = $DB->query("SELECT * FROM mao_shop WHERE {$sql}");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $mao['title'] ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
                        <legend>添加评价</legend>
                    </fieldset>
                </div>
                <div class="layui-card-body">
                    <form class="layui-form layui-form-pane" action="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品</label>
                            <div class="layui-input-block">
                                <select id="M_sp">
                                    <option value="">请选择商品</option>
                                    <?php
                                    while ($res = $DB->fetch($rs)) {
                                        ?>
                                        <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">用户名称</label>
                            <div class="layui-input-block">
                                <input type="text" id="user_name" autocomplete="off" placeholder="如：张三、李四"
                                       class="layui-input" value="<?php echo $cha_1['user_name'] ?>">
                            </div>
                        </div>
                        <div class="layui-form-item" id="user_img_url">
                            <label class="layui-form-label">用户头像</label>
                            <div class="layui-input-inline">
                                <input type="text" id="user_img" placeholder="请上传用户头像！" class="layui-input"
                                       value="<?php echo $cha_1['user_img'] ?>">
                            </div>
                            <button type="button" class="layui-btn layui-btn-danger" id="user_img_upload"><i
                                        class="layui-icon"></i>上传图片
                            </button>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">评价标签</label>
                            <div class="layui-input-block">
                                <input type="text" id="tags" autocomplete="off"
                                       placeholder="如：质量好,物流快.多个使用英文逗号(,)隔开" class="layui-input"
                                       value="<?php echo $cha_1['tags'] ?>">
                            </div>
                        </div>
                        <div class="layui-form-item" id="pj_img_url">
                            <label class="layui-form-label">评价图片</label>
                            <div class="layui-input-inline">
                                <input type="text" id="pj_img" placeholder="请上传评价图片！" class="layui-input"
                                       value="<?php echo $cha_1['pj_img'] ?>">
                            </div>
                            <button type="button" class="layui-btn layui-btn-danger" id="pj_img_upload"><i
                                        class="layui-icon"></i>上传图片
                            </button>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">评价图片数量</label>
                            <div class="layui-input-block">
                                <input type="number" id="pj_img_cot" autocomplete="off" placeholder=""
                                       class="layui-input" value="<?php echo $cha_1['pj_img_cot'] ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">评价内容</label>
                            <textarea id="pj_text" cols="60" rows="5"
                                      placeholder="评价内容"><?php echo $cha_1['pj_text'] ?></textarea>
                        </div>
                    </form>
                    <button class="layui-btn site-demo-layedit" data-type="add"><i class="layui-icon"></i> 添 加 商 品
                    </button>
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
            elem: '#user_img_upload'
            , url: '/api/api.php?mod=upload&type=1'
            , done: function (res) {
                if (res.code == 0) {
                    $('#user_img_url').html('<label class="layui-form-label">上传成功</label><div class="layui-input-block"><input type="text" id="user_img" class="layui-input layui-disabled" value="' + res.name + '" disabled></div>');
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

        var upload2 = layui.upload
            , layedit2 = layui.layedit;
        upload2.render({
            elem: '#pj_img_upload'
            , url: '/api/api.php?mod=upload&type=1'
            , done: function (res) {
                if (res.code == 0) {
                    $('#pj_img_url').html('<label class="layui-form-label">上传成功</label><div class="layui-input-block"><input type="text" id="pj_img" class="layui-input layui-disabled" value="' + res.name + '" disabled></div>');
                } else {
                    layer.msg(a.msg);
                }
            }
        });
        layedit2.set({
            uploadImage: {
                url: '/api/api.php?mod=upload&type=1'
                , type: 'post'
            }
        });
        var active = {
            add: function () {
                var loading = layer.load();
                $.ajax({
                    url: '/Mao_admin/api.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        mod: "add_evaluate",
                        id: "<?php echo $cha_1['id']?>",
                        M_sp: $('#M_sp').val(),
                        user_name: $('#user_name').val(),
                        user_img: $('#user_img').val(),
                        pj_img: $('#pj_img').val(),
                        tags: $('#tags').val(),
                        pj_img_cot: $('#pj_img_cot').val(),
                        pj_text: $('#pj_text').val()
                    },
                    success: function (a) {
                        layer.close(loading);
                        if (a.code == 0) {
                            layer.msg(a.msg);
                        } else {
                            layer.msg(a.msg);
                        }
                    },
                    error: function () {
                        layer.close(loading);
                        layer.msg('~连接服务器失败！', {icon: 5});
                    }
                });
            }
        };
        $('.site-demo-layedit').on('click', function () {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>
</body>
</html>