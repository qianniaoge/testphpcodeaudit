<?php
require './Mao/common.php';
$mod = isset($_GET['mod']) ? $_GET['mod'] :1;
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>订单查询-<?php echo $mao['title']?></title>
		<meta name="keywords" content="抖音电商 直播基地">
		<meta name="description" content="抖音电商 直播基地">

		<link rel="stylesheet" type="text/css" href="static2/css/layui.css">
		<link rel="stylesheet" href="static2/css/main.css">
		<link rel="stylesheet" href="static2/css/other.css">
		<link type="text/css" rel="stylesheet" href="static2/css/style.css">
		<script type="text/javascript" src="static2/js/jquery-1.8.1.min.js"></script>
		    <script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
		       <script src="/Mao_Public/js/jquery-2.1.1.min.js"></script>
    <script src="/Mao_Public/layer/layer.js"></script>
    <script src="/Mao_Public/js/Mao.js"></script>
	
	</head>
	<body>



		<div class="main">
			<div class="layui-row">
				<div class="layui-col-md8 layui-col-md-offset2 layui-col-sm12">
					<div class="main-box" style="padding: 20px 20px;min-height: 500px;">
						<div class="pay-title" style="padding-bottom: 14px;">

							订单查询
						</div>

						<div style="text-align: center;">
							<input type="hidden" name="search_type" value="voucher">
							<div class="entry">
								<label class="input">
								
									<input type="text" name="searchkey" id="sjh" required="" lay-verify="required" placeholder="请输入： 手机号 或 订单编号 或 商户单号" autocomplete="off">
								</label>
								  <input type="text" class="fui-input" id="code" value="123456" style="display:none;">
							</div>
							<div class="btn">
							    	<a  id="login" data-appid="2047155482" data-cbfn="login">
								<button onclick="searchOrder()" style="cursor: pointer">
								
								
                     
                            <p>马上查询</p>
                        </div>
               
								</button>
								     </a>
							</div>
						


							<br>
							<br>
							<hr>
							<div style="padding-top: 30px;">
								<small>
									<div id="edit">
										<p>
											<span style="font-size: 18pt;">
												<span style="color: #e03e2d;">
													<strong>温馨提示：</strong>
												</span>
											</span>
											<strong>
												<span style="font-size: 18pt;">手机号查询为近期最近的订单，历史订单可用付款记录内的商户单号查询</span>
											</strong>
										</p>
										<p>
											<span style="font-size: 18pt;">
												<span style="color: #e03e2d;">
													<span style="color: #000000;">专柜门店</span>
												</span>发货时间一般是12小时内，物流单号一般24小时内填写
											</span>
										</p>
										<p>
											<span style="color: #e67e23;">
												<strong>
													<span style="font-size: 18pt;">七天无理由退换货，送运费险</span>
												</strong>
											</span>
										</p>
										<p>
											<span style="font-size: 18pt;">
												<strong>亲，我们竭诚为您服务，如您在我们官方旗舰店购物过程中遇到困难，请及时和我们客服联系，您不要着急，客服看见就会尽快处理</strong>！
											</span>
										</p>
										<p>
											<span style="font-size: 18pt;">&nbsp;</span>
										</p>
										<p>
											<strong style="color: #000000; font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;">&nbsp;</strong>
										</p>
									</div>
								</small>
							</div>


						</div>

					</div>
				</div>
			</div>



			<div class="footbox">
				<div class="footer">
					<ul>
						<li>
							<a href="/index.php">
								<img src="static2/picture/f01.png">
								<p>首页</p>
							</a>
						</li>
						<li class="on">
							<a href="/login.php">
								<img src="static2/picture/f2.png">
								<p>查单</p>
							</a>
						</li>
						<li>
							<a href="/kefu.php">
								<img src="static2/picture/f04.png">
								<p>客服</p>
							</a>
						</li>
					</ul>
				</div>
			</div>

		</div>


	
		<div class="layui-layer-move"></div>





		








 <script>
                    $(function(){
                        new TencentCaptcha(document.getElementById('login'));
                    });
                    window.getcode = function(res){
                        if(res.ret === 0){
                            var loading = layer.load();
                            $.ajax({
                                url: '/api/api.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {mod: "getcode", shouji: $('#sjh').val(), ticket: res.ticket, randstr: res.randstr},
                                success: function (a) {
                                    layer.close(loading);
                                    if (a.code == 0) {
                                        var validCode=true;
                                        var time=60;
                                        if (validCode) {
                                            validCode=false;
                                            var t=setInterval(function  () {
                                                time--;
                                                $('#yzm').html('<a type="button" class="layui-btn layui-btn-xs layui-btn-disabled jb">'+time+"秒"+'</a>');
                                                if (time==0) {
                                                    clearInterval(t);
                                                    $('#yzm').html('<a type="button" class="layui-btn layui-btn-xs jb" id="TencentCaptcha" data-appid="<?php echo $tx_app_id?>" data-cbfn="getcode">发送验证码</a>');
                                                    validCode=true;
                                                }
                                            },1000)
                                        }

                                        layer.msg(a.msg);
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
                    }
                    window.login = function(res){
                        if(res.ret === 0){
                            var loading = layer.load();
                            $.ajax({
                                url: '/api/api.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {mod: "login", type: 1, shouji: $('#sjh').val(), code: $('#code').val(), ticket: res.ticket, randstr: res.randstr},
                                success: function (a) {
                                    layer.close(loading);
                                    if (a.code == 0) {
                                        layer.msg(a.msg, {icon: 1}, function(){window.open("/user/index.php", "_self");});
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
                    }
                </script>




	</body>
</html>