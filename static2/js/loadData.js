
var $_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();

//console.log($_GET);

var gids,skuid;
var goodsData;
function getGoodsInfo(id,sid,issku) {

    if(id == undefined || sid == undefined){
       id = $_GET['id'];
       sid = $_GET['sid'];
    }
    if(issku == undefined){
        issku = 0
    }
    var load = layer.load();
    $.ajax({
        type: "post",
        url:"/ajax/index/getGoodsInfo.html",
        dataType: "json",
        data:{"sid":sid,"id":id,"issku":issku},
        success: function (json) {
            layer.closeAll();
            layer.close(load);
            if(json.code != 1){
                layer.msg(json.msg);
                return;
            }
            var data = json.data;
            goodsData = data;
            var skus = data.sku;
            gids = data.gids;
            $(".goods_image_index").attr("src",data.images);
            $(".goods_image").attr("src",data.skuImages);
            $("#goods_title").text(data.title);
            $(".goods_price").text("¥ "+data.price);
            $("#freight").text(data.freight);
            $(".goods_cs1").text(data.weight+"Kg");
            $(".goods_cs2").text(data.minbuy+data.unit);
            $(".goods_cs3").text(data.maxbuy==0?"不限制":data.maxbuy+data.unit);
            $(".goods_cs4").text(data.restrict);
            $("#details").html(data.details);
            $(".kuc").html("库存<font id='goodskucun'>"+data.kucun+"</font>"+data.unit);
            if(data.kucun == 0){
                $("#buyGoods").hide();
                $("#buyGoods0").show();
            }else{
                $("#buyGoods").show();
                $("#buyGoods0").hide();
            }

            $("#goods_tags").html("");
            if(data.tags.length > 0){
                $("#goods_tags").html("<span>"+data.tags.join(' | ')+"</span>");
            }

            var skuHtml = "";
            for (var i=0;i<skus.length;i++){
                var sku = skus[i];
                skuHtml += '<div class="size2_1 skusList skus_'+i+'"><p class="tit">'+sku.name+'</p>';
                var list = sku.list;
                for(var k=0;k<list.length;k++){
                    var item = list[k];
                    skuHtml += '<a href="javascript:changeSku('+i+','+item.id+','+skus.length+')" data-id="'+item.id+'" class="sku_'+i+' '+(item.flag==1?"on":"")+'">'+item.name+'</a>';
                }
                skuHtml += '</div>';
            }
            var inputHtml = inputs(data.inputs);
            $("#user_input_list").html(inputHtml);
            layui.form.render();
            $(".skuList").html(skuHtml);

        },
        error: function () {
            layer.close(load);
            layer.msg('商品数据加载异常');
        }
    })
}
function inputs(inputs){
    if(inputs.length == 0){
        return "";
    }
    var inputHtml = "";
    for (var i = 0; i < inputs.length ;i++){
        var input = inputs[i];
        if(input[1] == "select"){
            inputHtml += input_radio(input[0],input[2]);
        }else{
            inputHtml += input_text(input[0],input[1],input[2],"");
        }
    }
    return  inputHtml;
}

function input_text(title,placeholder,required,value){
    var randid = Math.ceil(Math.random()*1000);
    var html = ' <div class="layui-form-item">' +
        '                    <label class="layui-form-label">'+title+'</label>' +
        '                    <div class="layui-input-block">' +
        '                        <input value="'+value+'" req="'+required+'" id="input_'+randid+'" type="text" name="input['+title+']" autocomplete="off" placeholder="'+placeholder+'" class="layui-input userInput">' +
        (required=="address"||title=="收货地址"?'<span  onclick="getCity(\'input_'+randid+'\',0,0)"  class="layui-btn layui-btn-xs layui-btn-normal">快速获取地址</span>':'')+
        '                    </div>' +
        '                </div>';
    return html;
}
function input_radio(title,item){
    var html = ' <div class="layui-form-item" pane="">' +
        '                    <label class="layui-form-label">'+title+'</label>'+
        '                    <div class="layui-input-block">';
    for(var i = 0; i < item.length; i++){
        var val = item[i];
        html += '<input '+(i==0?"checked":"")+' type="radio" name="input['+title+']" value="'+val+'" title="'+val+'">';
    }
    html += '</div> </div>';
    return html;
}
/*商品页面操作*/
$(".KuCun0_BuyBtn").click(function () {
    layer.msg("商品库存不足");
})
$(".goodsBuyNum0").click(function () {
    var goodsBuyNum = parseInt($(".goodsBuyNum").text());
    if(goodsBuyNum > 1){
        goodsBuyNum = goodsBuyNum -1;
    }
    $(".goodsBuyNum").text(goodsBuyNum)
})
$(".goodsBuyNum1").click(function () {

    var goodsBuyNum = parseInt($(".goodsBuyNum").text());
    var goodskucun = goodsData.kucun;
    if(goodskucun > goodsBuyNum){
        goodsBuyNum = goodsBuyNum + 1;
    }else{
        layer.msg("已达到最大库存数");
    }
    $(".goodsBuyNum").text(goodsBuyNum)
})
//商品下单
$("#buyGoods").click(function () {
    var action = $("#buyGoods").text();
    var goodsBuyNum = parseInt($(".goodsBuyNum").text());
    if("加入购物车" == action){
        var url = "/ajax/order/addCart.html";
    }else{
        var url = "/ajax/order/Createorder.html";
    }
    var sku = getSkuId();
    var skuid = 0;
    var skustr = "";
    if(Array.isArray(sku)){
        skuid = sku[0];
        skustr = sku[1];
    }else if(sku == 0 && goodsData.skutype != 1){
        layer.msg("商品规格数据异常");
        return;
    }else if(sku == -1){
        layer.msg("请先选择商品规格数据");
        return;
    }else if( goodsData.skutype == 1){
        skuid = $_GET['sid'];
    }else{
        skustr = "无规格数据";
    }
    var input = $("#user_input_list").serialize();
    var frm_data = "skuid="+skuid+"&skustr="+skustr+"&goodsid="+goodsData.id+"&number="+goodsBuyNum+"&"+input;
    var load = layer.load();
    $.ajax({
        type: "post",
        url:url,
        dataType: "json",
        data:frm_data,
        success: function (json) {
            layer.close(load);
            if(json.code == 1){
                var order = json.order;
                window.location.href = "/home/order/confirm?order="+order.out_tradeno
            }else if(json.code == 2){
                //询问框
                layer.confirm('加入购物车成功,是否去结算？', {
                    btn: ['立即结算','再逛逛'] //按钮
                }, function(){
                    window.location.href = "/home/order/cart.html"
                }, function(){
                    window.location.reload();
                });
            }else{
                layer.msg(json.msg);
            }


        },
        error: function () {
            layer.close(load);
            layer.msg('商品数据加载异常');
        }
    })
})
function changeSku(index,id,skus_len) {
    if(gids == ""){
        layer.alert("数据为空");
        return;
    }
    var checkedstr = "";
    for (var i=0;i<skus_len;i++){
        if(index == i){
            var skulist = $(".sku_"+i);
            $(".sku_"+i).removeClass("on");
            $.each(skulist,function (eindex,e) {
                var this_id = $(e).attr("data-id");
                if(id == this_id){
                    $(e).addClass("on");
                }

            })
            if(checkedstr != "") checkedstr += ",";
            checkedstr += id;
        }else{
            var skulist = $(".sku_"+i);
            $.each(skulist,function (eindex,e) {
                if($(e).hasClass("on")){
                    if(checkedstr != "") checkedstr += ",";
                    var id = $(e).attr("data-id");
                    checkedstr += id;
                }
            })
        }
    }

    var sid = gids[checkedstr];
    if(sid != undefined){
        getGoodsInfo($_GET['id'],sid,1);
    }

   // getGoodsInfo($_GET['id'],sid);
    //var url = "/index/goods.html?id="+$_GET['id']+"&sid="+sid;
   // window.location.href = url;
}

function getSkuId() {
    //console.log($(".skusList").length);
    var skus_len = $(".skusList").length;
    if(skus_len<=0){
        console.log("无sku数据")
        return 0;
    }
    var checkedstr = "";
    var skustr = "";
    for (var i=0;i<skus_len;i++){
        var skulist = $(".sku_"+i);
        $.each(skulist,function (eindex,e) {
            if($(e).hasClass("on")){
                if(checkedstr != "") checkedstr += ",";
                if(skustr != "") skustr += ";";
                var id = $(e).attr("data-id");
                checkedstr += id;
                skustr += $(e).text();
            }
        })
    }
    var sid = gids[checkedstr];
    if(sid != undefined){
        return new Array(sid,skustr);
    }else{
        return -1;
    }
}

//获取购物车列表
function init_CartList() {
    var load = layer.load();
    $.ajax({
        type: "post",
        url:"/ajax/order/getCartList.html",
        dataType: "json",
        data:{},
        success: function (json) {
            layer.close(load);
            var index = parent.layer.getFrameIndex(window.name);
            parent.layer.close(index);

            if(json.code != 1){
                layer.msg(json.msg);
                return;
            }
            $("#sumPrice").text(json.sumPrice);
            var data = json.data;
            $("#cartCount").text(data.length);
            var html = "";
            $.each(data,function (index,e) {
                html += ' <div class="gwcone">' +
                    '                <div class="go2"><a href=""><img src="'+e.cart_images+'" /></a></div>\n' +
                    '                <div class="go3">\n' +
                    '                    <div class="go3_1">\n' +
                    '                        <a href="xq.html"><p class="p1">'+e.cart_title+'</p></a>\n' +
                    '                    </div>\n' +
                    '                    <div class="go3_2">\n' +
                    '                        <p class="p3">'+e.cart_skuremark+'</p>\n' +
                    '                        <p class="p4">￥'+e.price+'</p>\n' +
                    '                    </div>\n' +
                    '                    <div class="go3_3">\n' +
                    '                        <span class="number-btn"> 数量 X '+e.cart_number+' </span> <span class="input-btn" onclick="updateInputs('+e.cart_id+')" >下单信息</span>\n' +
                    '                        <div class="del" onclick="delCartGoods('+e.cart_id+')" style="cursor: pointer" ><img src="/static/index/one/images/del.png" /></div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>';
            })
            $(".cartList").html(html);
            $("#tips").html(json.sumPriceTips);
        },
        error: function () {
            layer.close(load);
            layer.msg('购物车数据加载异常');
        }
    })
}
function delCartGoods(id) {
    layer.confirm('确定将商品要移出购物车吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        var load = layer.load();
        $.ajax({
            type: "post",
            url:"/ajax/order/deleteCartByid.html",
            dataType: "json",
            data:{"id":id},
            success: function (json) {
                layer.close(load);
                if(json.code == 1){
                    window.location.reload()
                }else{
                    layer.msg(json.msg);
                }
            },
            error: function () {
                layer.close(load);
                layer.msg('服务器处理异常');
            }
        })
    }, function(){

    });
}

function updateInputs(cartid) {
    layer.open({
        type: 2,
        title: '修改下单信息',
        shadeClose: true,
        shade: 0.8,
        area: ['360px', '300px'],
        content: '/home/order/updateInputs.html?cartid='+cartid
    });
}

//获取分类列表
function init_Classify(){
    var load = layer.load();
    $.ajax({
        type: "post",
        url:"/ajax/index/getClassifyList.html",
        dataType: "json",
        data:{},
        success: function (json) {
            layer.close(load);
            var list = json.data;
            var li = "";
            var children_html = "";
            $.each(list,function (index) {
                var cla = list[index];
                index = index+1;
                li += '<li '+(index==1?"class='on'":"")+'><a onclick="showClaDiv('+index+')">'+cla['name']+'</a></li>';

                var children = cla['children'];
                for(var i=0;i<children.length;i++){
                    children_html += "<div class='mlist mlist"+index+"'>";
                    var children1 = children[i];
                    children_html += '<a name="m'+index+'"> <div class="box2"><p>'+children1['name']+'</p></div></a>';
                    var children2 = children1['children'];
                    if(children2.length == 0){
                        children_html += "</div>";
                        continue;
                    }
                    children_html += ' <div class="box3"><ul>';
                    for(var k=0;k<children2.length;k++){
                        var children3 = children2[k];
                        children_html+= '<li><a href="item.html?id='+children3['value']+'"> <img width="20px;" src="'+children3['image']+'" />  \n' +
                            '<p>'+children3['name']+'</p></a> </li>';
                    }
                    children_html += '</ul></div>';
                    children_html += "</div>";
                }
            })
            $(".shtypeLeft ul").html(li);
            $(".boxOne").html(children_html);

            $(".shtypeLeft ul li").click(function () {
                $('.shtypeLeft ul li').removeClass('on');
                $(this).addClass('on');
            })
            showClaDiv(1);


        },
        error: function () {
            layer.close(load);
            layer.msg('分类数据加载异常');
        }
    })
}
function showClaDiv(index) {
    $(".mlist").hide();
    $(".mlist"+index).show();
}
/*
  首页获取商品
* */
function loadIndexGoods() {
    var load = layer.load();
    $.ajax({
        type: "post",
        url:"/ajax/index/getGoodsList.html",
        dataType: "json",
        data:{},
        success: function (json) {
            var list = json.data;
            layer.close(load);
            var html = "";
            $.each(list,function (index) {
                var clarow = list[index];
                var goodsList = clarow['goodsList'];
                html += '  <div class="likeTit">\n' +
                    '        <img src="/static/index/one/images/heart.png" /><span>'+clarow['name']+'</span>' +
                    '    </div>' +
                    '    <ul>';
                $.each(goodsList,function (i) {
                    var goods = goodsList[i];
                    html +=  '<li>' +
                        '<a href="/home/goods.html?id='+goods['id']+'&sid='+goods['skuid']+'">\n' +
                        '<img src="'+goods['images']+'" class="proimg"/>' +
                        '<p class="tit">'+goods['name']+'</p>' +
                        '<p class="price">￥'+goods['price']+ '<spam class="tit">已售：' + goods['salesnum'] + '</p>'
                        '</a>\n' +
                        '</li>';
                })
                html +=  '</ul>';
            })
            $(".likebox").html(html);
        },
        error: function () {
            layer.close(load);
            layer.msg('商品数据加载异常');
        }
    })
}

/*
  首页分类商品
* */
function loadItemGoods() {
    var load = layer.load();
    $.ajax({
        type: "post",
        url:"/ajax/index/getGoodsList.html",
        dataType: "json",
        data:{"cid":$_GET['id']},
        success: function (json) {
            var list = json.data;
            layer.close(load);
            var html = "";
            $.each(list,function (index) {
                var clarow = list[index];
                var goodsList = clarow['goodsList'];
                html += '  <div class="likeTit">\n' +
                    '        <img src="/static/index/one/images/heart.png" /><span>'+clarow['name']+'</span>' +
                    '    </div>' +
                    '    <ul>';
                $.each(goodsList,function (i) {
                    var goods = goodsList[i];
                    html +=  '<li>' +
                        '<a href="/home/goods.html?id='+goods['id']+'&sid='+goods['skuid']+'">\n' +
                        '<img src="'+goods['images']+'" class="proimg"/>' +
                        '<p class="tit">'+goods['name']+'</p>' +
                        '<p class="price">￥'+goods['price']+'<span></span><img src="/static/index/one/images/f3.png" /></p>' +
                        '</a>\n' +
                        '</li>';
                })
                html +=  '</ul>';
            })
            if(html == ""){
                html = '<span style="padding: 30px;display: block;text-align: center;font-size: 18px;">该分类还没有商品>> </span>';
            }
            $(".likebox").html(html);
        },
        error: function () {
            layer.close(load);
            layer.msg('商品数据加载异常');
        }
    })
}

function jiesuan() {
    layer.confirm('确定要结算当前购物车的商品吗？', {
        btn: ['立即结算','再逛逛'] //按钮
    }, function(){
        var load = layer.load();
        $.ajax({
            type: "post",
            url:"/ajax/order/jiesuan.html",
            dataType: "json",
            data:{},
            success: function (json) {
                layer.close(load);
                if(json.code == 1){
                    var order = json.order;
                    window.location.href = "/home/order/confirm?order="+order.out_tradeno
                }else{
                    layer.msg(json.msg);
                }

            },
            error: function () {
                layer.close(load);
                layer.msg('商品数据加载异常');
            }
        })
    }, function(){

    });
}

function searchOrder() {
    var searchkey = $("#searchkey").val();

    var load = layer.load();
    $.ajax({
        type: "post",
        url:"/ajax/order/searchOrder.html",
        dataType: "json",
        data:{searchkey},
        success: function (json) {
            layer.close(load);
            if(json.code == 1){
                window.location.href = json.url;
            }else{
                layer.msg(json.msg);
            }


        },
        error: function () {
            layer.close(load);
            layer.msg('分类数据加载异常');
        }
    })

}