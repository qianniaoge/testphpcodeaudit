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
<html lang="en"
      style="font-size: 16px; --status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --tab-bar-height: 50px; --window-top: calc(0px + env(safe-area-inset-top)); --window-bottom: calc(0px + env(safe-area-inset-bottom));">
<head>

    <meta name="description" itemprop="description" content="￥<?php echo $cha_1['price'] ?>">
    <link href="<?php echo $cha_1['img'] ?>" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $mao['title'] ?></title>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <style type="text/css">


        @-webkit-keyframes animateErrorIcon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }
            to {
                -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
                opacity: 1
            }
        }

        @keyframes animateErrorIcon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }
            to {
                -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
                opacity: 1
            }
        }

        @-webkit-keyframes animateXMark {
            0% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }
            50% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }
            80% {
                -webkit-transform: scale(1.15);
                transform: scale(1.15);
                margin-top: -6px
            }
            to {
                -webkit-transform: scale(1);
                transform: scale(1);
                margin-top: 0;
                opacity: 1
            }
        }

        @keyframes animateXMark {
            0% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }
            50% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }
            80% {
                -webkit-transform: scale(1.15);
                transform: scale(1.15);
                margin-top: -6px
            }
            to {
                -webkit-transform: scale(1);
                transform: scale(1);
                margin-top: 0;
                opacity: 1
            }
        }


        @-webkit-keyframes pulseWarning {
            0% {
                border-color: #f8d486
            }
            to {
                border-color: #f8bb86
            }
        }

        @keyframes pulseWarning {
            0% {
                border-color: #f8d486
            }
            to {
                border-color: #f8bb86
            }
        }

        .swal-icon--success {
            border-color: #a5dc86
        }

        .swal-icon--success:after, .swal-icon--success:before {
            content: "";
            border-radius: 50%;
            position: absolute;
            width: 60px;
            height: 120px;
            background: #fff;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .swal-icon--success:before {
            border-radius: 120px 0 0 120px;
            top: -7px;
            left: -33px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 60px 60px;
            transform-origin: 60px 60px
        }

        .swal-icon--success:after {
            border-radius: 0 120px 120px 0;
            top: -11px;
            left: 30px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 0 60px;
            transform-origin: 0 60px;
            -webkit-animation: rotatePlaceholder 4.25s ease-in;
            animation: rotatePlaceholder 4.25s ease-in
        }

        .swal-icon--success__ring {
            width: 80px;
            height: 80px;
            border: 4px solid hsla(98, 55%, 69%, .2);
            border-radius: 50%;
            box-sizing: content-box;
            position: absolute;
            left: -4px;
            top: -4px;
            z-index: 2
        }

        .swal-icon--success__hide-corners {
            width: 5px;
            height: 90px;
            background-color: #fff;
            padding: 1px;
            position: absolute;
            left: 28px;
            top: 8px;
            z-index: 1;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .swal-icon--success__line {
            height: 5px;
            background-color: #a5dc86;
            display: block;
            border-radius: 2px;
            position: absolute;
            z-index: 2
        }

        .swal-icon--success__line--tip {
            width: 25px;
            left: 14px;
            top: 46px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-animation: animateSuccessTip .75s;
            animation: animateSuccessTip .75s
        }

        .swal-icon--success__line--long {
            width: 47px;
            right: 8px;
            top: 38px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-animation: animateSuccessLong .75s;
            animation: animateSuccessLong .75s
        }

        @-webkit-keyframes rotatePlaceholder {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
            to {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @keyframes rotatePlaceholder {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
            to {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @-webkit-keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px
            }
            54% {
                width: 0;
                left: 1px;
                top: 19px
            }
            70% {
                width: 50px;
                left: -8px;
                top: 37px
            }
            84% {
                width: 17px;
                left: 21px;
                top: 48px
            }
            to {
                width: 25px;
                left: 14px;
                top: 45px
            }
        }

        @keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px
            }
            54% {
                width: 0;
                left: 1px;
                top: 19px
            }
            70% {
                width: 50px;
                left: -8px;
                top: 37px
            }
            84% {
                width: 17px;
                left: 21px;
                top: 48px
            }
            to {
                width: 25px;
                left: 14px;
                top: 45px
            }
        }

        @-webkit-keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px
            }
            65% {
                width: 0;
                right: 46px;
                top: 54px
            }
            84% {
                width: 55px;
                right: 0;
                top: 35px
            }
            to {
                width: 47px;
                right: 8px;
                top: 38px
            }
        }

        @keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px
            }
            65% {
                width: 0;
                right: 46px;
                top: 54px
            }
            84% {
                width: 55px;
                right: 0;
                top: 35px
            }
            to {
                width: 47px;
                right: 8px;
                top: 38px
            }
        }

        .swal-icon--info {
            border-color: #c9dae1
        }

        .swal-icon--info:before {
            width: 5px;
            height: 29px;
            bottom: 17px;
            border-radius: 2px;
            margin-left: -2px
        }

        .swal-icon--info:after, .swal-icon--info:before {
            content: "";
            position: absolute;
            left: 50%;
            background-color: #c9dae1
        }

        .swal-icon--info:after {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -3px;
            top: 19px
        }

        .swal-icon {
            width: 80px;
            height: 80px;
            border-width: 4px;
            border-style: solid;
            border-radius: 50%;
            padding: 0;
            position: relative;
            box-sizing: content-box;
            margin: 20px auto
        }

        .swal-icon:first-child {
            margin-top: 32px
        }

        .swal-icon--custom {
            width: auto;
            height: auto;
            max-width: 100%;
            border: none;
            border-radius: 0
        }

        .swal-icon img {
            max-width: 100%;
            max-height: 100%
        }

        .swal-title {
            color: rgba(0, 0, 0, .65);
            font-weight: 600;
            text-transform: none;
            position: relative;
            display: block;
            padding: 13px 16px;
            font-size: 27px;
            line-height: normal;
            text-align: center;
            margin-bottom: 0
        }

        .swal-title:first-child {
            margin-top: 26px
        }

        .swal-title:not(:first-child) {
            padding-bottom: 0
        }

        .swal-title:not(:last-child) {
            margin-bottom: 13px
        }

        .swal-text {
            font-size: 16px;
            position: relative;
            float: none;
            line-height: normal;
            vertical-align: top;
            text-align: left;
            display: inline-block;
            margin: 0;
            padding: 0 10px;
            font-weight: 400;
            color: rgba(0, 0, 0, .64);
            max-width: calc(100% - 20px);
            overflow-wrap: break-word;
            box-sizing: border-box
        }

        .swal-text:first-child {
            margin-top: 45px
        }

        .swal-text:last-child {
            margin-bottom: 45px
        }

        .swal-footer {
            text-align: right;
            padding-top: 13px;
            margin-top: 13px;
            padding: 13px 16px;
            border-radius: inherit;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .swal-button-container {
            margin: 5px;
            display: inline-block;
            position: relative
        }

        .swal-button {
            background-color: #7cd1f9;
            color: #fff;
            border: none;
            box-shadow: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 24px;
            margin: 0;
            cursor: pointer
        }

        .swal-button:not([disabled]):hover {
            background-color: #78cbf2
        }

        .swal-button:active {
            background-color: #70bce0
        }

        .swal-button:focus {
            outline: none;
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(43, 114, 165, .29)
        }

        .swal-button[disabled] {
            opacity: .5;
            cursor: default
        }

        .swal-button::-moz-focus-inner {
            border: 0
        }

        .swal-button--cancel {
            color: #555;
            background-color: #efefef
        }

        .swal-button--cancel:not([disabled]):hover {
            background-color: #e8e8e8
        }

        .swal-button--cancel:active {
            background-color: #d7d7d7
        }

        .swal-button--cancel:focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(116, 136, 150, .29)
        }

        .swal-button--danger {
            background-color: #e64942
        }

        .swal-button--danger:not([disabled]):hover {
            background-color: #df4740
        }

        .swal-button--danger:active {
            background-color: #cf423b
        }

        .swal-button--danger:focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(165, 43, 43, .29)
        }

        .swal-content {
            padding: 0 20px;
            margin-top: 20px;
            font-size: medium
        }

        .swal-content:last-child {
            margin-bottom: 20px
        }

        .swal-content__input, .swal-content__textarea {
            -webkit-appearance: none;
            background-color: #fff;
            border: none;
            font-size: 14px;
            display: block;
            box-sizing: border-box;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, .14);
            padding: 10px 13px;
            border-radius: 2px;
            transition: border-color .2s
        }

        .swal-content__input:focus, .swal-content__textarea:focus {
            outline: none;
            border-color: #6db8ff
        }

        .swal-content__textarea {
            resize: vertical
        }

        .swal-button--loading {
            color: transparent
        }

        .swal-button--loading ~ .swal-button__loader {
            opacity: 1
        }

        .swal-button__loader {
            position: absolute;
            height: auto;
            width: 43px;
            z-index: 2;
            left: 50%;
            top: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            text-align: center;
            pointer-events: none;
            opacity: 0
        }

        .swal-button__loader div {
            display: inline-block;
            float: none;
            vertical-align: baseline;
            width: 9px;
            height: 9px;
            padding: 0;
            border: none;
            margin: 2px;
            opacity: .4;
            border-radius: 7px;
            background-color: hsla(0, 0%, 100%, .9);
            transition: background .2s;
            -webkit-animation: swal-loading-anim 1s infinite;
            animation: swal-loading-anim 1s infinite
        }

        .swal-button__loader div:nth-child(3n+2) {
            -webkit-animation-delay: .15s;
            animation-delay: .15s
        }

        .swal-button__loader div:nth-child(3n+3) {
            -webkit-animation-delay: .3s;
            animation-delay: .3s
        }

        @-webkit-keyframes swal-loading-anim {
            0% {
                opacity: .4
            }
            20% {
                opacity: .4
            }
            50% {
                opacity: 1
            }
            to {
                opacity: .4
            }
        }

        @keyframes swal-loading-anim {
            0% {
                opacity: .4
            }
            20% {
                opacity: .4
            }
            50% {
                opacity: 1
            }
            to {
                opacity: .4
            }
        }

        .swal-overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 0;
            overflow-y: auto;
            background-color: rgba(0, 0, 0, .4);
            z-index: 10000;
            pointer-events: none;
            opacity: 0;
            transition: opacity .3s
        }

        .swal-overlay:before {
            content: " ";
            display: inline-block;
            vertical-align: middle;
            height: 100%
        }

        .swal-overlay--show-modal {
            opacity: 1;
            pointer-events: auto
        }

        .swal-overlay--show-modal .swal-modal {
            opacity: 1;
            pointer-events: auto;
            box-sizing: border-box;
            -webkit-animation: showSweetAlert .3s;
            animation: showSweetAlert .3s;
            will-change: transform
        }

        .swal-modal {
            width: 478px;
            opacity: 0;
            pointer-events: none;
            background-color: #fff;
            text-align: center;
            border-radius: 5px;
            position: static;
            margin: 20px auto;
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            z-index: 10001;
            transition: opacity .2s, -webkit-transform .3s;
            transition: transform .3s, opacity .2s;
            transition: transform .3s, opacity .2s, -webkit-transform .3s
        }

        @media (max-width: 500px) {
            .swal-modal {
                width: calc(100% - 20px)
            }
        }

        @-webkit-keyframes showSweetAlert {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
            1% {
                -webkit-transform: scale(.5);
                transform: scale(.5)
            }
            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }
            to {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes showSweetAlert {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
            1% {
                -webkit-transform: scale(.5);
                transform: scale(.5)
            }
            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }
            to {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }
        
        .details-main_details__content{
            padding: 10px;
        }
        .details-main_details__content img{
            
            max-width: 100%;
        }
        
        </style>
  
 <link rel="stylesheet" href="./assets/uni.6ebadf31.css">
 
   <link rel="stylesheet" href="./static/layui-v2.9.17/css/layui.css">

  <link rel="stylesheet" href="./static/css/Mao.min4.css">

  <script src="static/js/jquery-2.1.1.min.js" charset="utf-8"></script>
    <script src='./assets/js/hammer.min.js'></script>
    <script src="./assets/js/slider.js" charset="utf-8"></script>
    <link rel="stylesheet" href="./assets/index-BXf8mhHn.css">
    <link rel="stylesheet" href="./assets/uni-app-CJ5qaJ0-.css">
    <link rel="stylesheet" href="./assets/u-empty-IaHt-AZ5.css">
    <link rel="stylesheet" href="./assets/Tags-Bn0DNFeY.css">
    <link rel="stylesheet" href="./assets/Shop-5Xe7mQGW.css">
    <link rel="stylesheet" href="./assets/Goods-CNUvOvFZ.css">
    <link rel="stylesheet" href="./assets/index-BriGyXtv.css">
    <link rel="stylesheet" href="./assets/Tabs-DxYMfpD1.css">
    <link rel="stylesheet" href="./assets/u-loading-icon-NP24FN7E.css">
    <link rel="stylesheet" href="./assets/u-status-bar-BvPNRoGV.css">
    <link rel="stylesheet" href="./assets/u-popup-BkBXq2bq.css">
    <link rel="stylesheet" href="./assets/details-Cx5dboid.css">
    <link rel="stylesheet" href="./assets/detail2.css">
    


    <script src="/static/layui-v2.9.17/layui.js"></script>
    <script src="static/js/Mao.js"></script>

  <style>
  
/**规格弹出*/
.option-picker {
    height: auto;
    width: 100%;
    padding-bottom: 2.5rem;
    z-index: 1001;


}
.option-picker.android{
    padding-bottom:0;
}
/*.option-picker.android .option-picker-inner{*/
/*position: absolute;*/
/*bottom: 0;*/
/*}*/
.option-picker .option-picker-cell {
    padding: .2rem .5rem .5rem .5rem;
}

.option-picker .option-picker-options {
    margin: 0;
    padding: 0;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
}

.option-picker .option-picker-cell.goodinfo {
    padding-left: 5.5rem;
    padding-top: 0.5rem;
    position: relative;
}

.option-picker .option-picker-cell.goodinfo:after {
    content: " ";
    position: absolute;
    bottom: 0;
    left: 0.5rem;
    right: 0.5rem;
    border-bottom: 1px solid #eee;
}

.option-picker .option-picker-cell.goodinfo .closebtn {
    width: 1.4rem;
    height: 1.4rem;
    position: absolute;
    top: 0.3rem;
    right: 0.3rem;
    text-align: center;
    line-height: 1.4rem;
    color: #999;
}

.option-picker .option-picker-cell.goodinfo .closebtn .icon {
    font-size: 1.1rem;
}

.option-picker .option-picker-cell.goodinfo .img {
    height: 4.5rem;
    width: 4.5rem;
    background: #fff;
    padding: 0.1rem;
    border: 1px solid #eee;
    border-radius: 2px;
    position: absolute;
    top: -0.4rem;
    left: 0.5rem;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
}

.option-picker .option-picker-cell.goodinfo .img img {
    height: 100%;
    width: 100%;
}

.option-picker .option-picker-cell.goodinfo .info {
    font-size: 0.7rem;
    height: 0.9rem;
    line-height: .9rem;
}

.option-picker .option-picker-cell.goodinfo .info-total {
    font-size: .65rem;
    color: #999;
}

.option-picker .option-picker-cell.goodinfo .info-name {
    font-size: 0.8rem;
    color: #353535;
}

.option-picker .option-picker-cell.goodinfo .info-price .price {
    font-size: 0.8rem;
}

.option-picker .option-picker-cell.goodinfo .info-titles {
    font-size: .65rem;
    color: #000;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}

.option-picker .option-picker-cell.option {
    position: relative;
}
.option-picker .option-picker-cell.option .title {
    font-size: 0.7rem;
    height: auto;
    overflow: hidden;
    color: #000;
    line-height: 1.95rem;
}
.option-picker .option-picker-cell.option .btn.btn-default{
    color: #000;
    height:1.25rem;
    line-height: 1.25rem;
    background: #f7f7f7;
    font-size:0.6rem;
}
.option-picker .option-picker-cell.option .btn.btn-danger{
    background: #ff5555;
    color: #fff;
    font-size:0.6rem;
}
.option-picker .option-picker-cell.option .select {
    font-size: 0.7rem;
    color: #000;
    height: auto;
    overflow: hidden;
}

.option-picker .option-picker-cell.option .select .nav {
    height: auto;
    width: auto;
    border: 0;
    float: left;
    margin: 0.4rem 0.5rem 0 0;
}

.option-picker .option-picker-cell.option:after {
    content: " ";
    position: absolute;
    bottom: 0;
    left: 0.5rem;
    right: 0.5rem;
    border-bottom: 1px solid #eee;
}

.option-picker .option-picker-cell .fui-number {
    float: right;
}

.option-picker .fui-navbar {
    text-shadow: none;

}

.option-picker .fui-navbar .btn {
    border: none;
    font-size: 0.75rem;
    color: #fff;
    border-radius: 0;
}

.option-picker .fui-navbar .cartbtn {
    background: #fe9402;
}

.option-picker .fui-navbar .buybtn, .option-picker .fui-navbar .confirmbtn {
    background: #fd5555;
}

.option-picker-inner {
    background: #fff;

}

.option-picker .fui-navbar .btn.disabled {
    color: #ccc;
    background: #ececec;
}

.option-picker .diyform-container:before {
    display: none;
}
  </style>
</head>


<body style="zoom: 1;" data-v-50c96da9="">
<div id="app" data-v-app="">
    <uni-app class="">
        <uni-page data-page="package_goods/pages/details" type="">
            <uni-page-wrapper>
                <uni-page-body data-v-50c96da9="">
                    <uni-view data-v-50c96da9="" class="details" id="18">

                        <div class='o-sliderContainer' id="pbSliderWrap0" style="margin-top:0;">
                            <div class='o-slider' id='pbSlider0'>
                                <div class="o-slider--item" data-image="<?php echo $cha_1['img'] ?>">
                                </div>

                            </div>
                        </div>


                        <uni-view data-v-50c96da9="" class="details-main" style="clear:both">
                            <uni-view data-v-50c96da9="" class="details-main_price">
                                <uni-view data-v-50c96da9="" class="details-main_price__normal">￥<?php echo $cha_1['price']?></uni-view>
                                <uni-view data-v-50c96da9="" class="details-main_price__sold">已售<?php echo $cha_1['xiaoliang'] ?></uni-view>
                            </uni-view>
                            <uni-view data-v-50c96da9="" class="details-main_name"><?php echo $cha_1['name'] ?></uni-view>
                            <uni-view data-v-50c96da9="" class="details-main_tags">
                                <uni-view data-v-ce68a9fa="" data-v-50c96da9="" class="Tags">
                                    <uni-view data-v-ce68a9fa="" class="Tags-item"
                                              style="color: rgb(222, 171, 128); border: 0.03125rem solid rgb(222, 171, 128); background-color: rgb(255, 241, 238); padding: 0px 0.3125rem;">
                                        运费险
                                    </uni-view>
                                    <uni-view data-v-ce68a9fa="" class="Tags-item"
                                              style="color: rgb(222, 171, 128); border: 0.03125rem solid rgb(222, 171, 128); background-color: rgb(255, 241, 238); padding: 0px 0.3125rem;">
                                        7天无理由退货
                                    </uni-view>
                                </uni-view>
                            </uni-view>
                        </uni-view>
                        <uni-view data-v-50c96da9="" class="details-main_other">
                            <uni-view data-v-50c96da9="" class="details-main_card">
                                <uni-view data-v-50c96da9="" class="details-main_other__item">
                                    <uni-image data-v-50c96da9="" class="details-main_other__image">
                                        <div style="background-image: url(./static/images/yunfei.png); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                        <span></span><img src="./static/images/yunfei.png" draggable="false">
                                    </uni-image>
                                    <uni-view data-v-50c96da9="" class="details-main_other__title u-line-1">
                                        运费险·七天无理由退款·急速退款
                                    </uni-view>
                                  
                                </uni-view>
                                <uni-view data-v-50c96da9="" class="details-main_other__item">
                                    <uni-image data-v-50c96da9="" class="details-main_other__image">
                                        <div style="background-image: url(./static/images/yunfei.png); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                        <span></span><img src="./static/images/yunfei.png" draggable="false">
                                    </uni-image>
                                    <uni-view data-v-50c96da9="" class="details-main_other__title u-line-1">
                                        现货·闪电送检·24小时内发货
                                    </uni-view>
                                  
                                </uni-view>
                                <uni-view data-v-50c96da9="" class="details-main_other__item">
                                    <uni-image data-v-50c96da9="" class="details-main_other__image">
                                        <div style="background-image: url(./static/images/canshu.png); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                        <span></span><img src="./static/images/canshu.png" draggable="false">
                                    </uni-image>
                                    <uni-view data-v-50c96da9="" class="details-main_other__title u-line-1">品牌·风格
                                    </uni-view>
                                   
                                </uni-view>
                            </uni-view>
                        </uni-view>
                      
                        <uni-view data-v-50c96da9="" class="details-main_evaluate">
                            <uni-view data-v-50c96da9="" class="details-main_card">
                                <uni-view data-v-50c96da9="" class="details-main_evaluate__title">商品评价(<?php echo $numrows ?>)
                                   <a href="/evaluate_list.php?sp_id=<?php echo $id ?>"> <div data-v-50c96da9="" class="details-main_evaluate__more">查看全部
                                        <uni-image data-v-50c96da9="" class="details-main_other__more">
                                            <div style="background-image: url(data:image/png;base64,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); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                            <span></span><img
                                                src="data:image/png;base64,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"
                                                draggable="false"></uni-image>
                                    </div></a>
                                </uni-view>
                                <uni-view data-v-50c96da9="" class="details-main_evaluate__item">
                                    <uni-view data-v-50c96da9="" class="details-main_evaluate__left">
                                        <uni-view data-v-50c96da9="" class="details-main_evaluate__top">
                                            <uni-image data-v-50c96da9="" class="details-main_evaluate__image">
                                                <div style="background-image: url(<?php echo $evaluate['user_img'] ?>); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                                <span></span><img
                                                    src="https://ankangceshi.oss-cn-beijing.aliyuncs.com/uploads/20240815/4bf6561eaa87f04b71f26238f7fc8eaa.webp"
                                                    draggable="false"></uni-image>
                                            <uni-view data-v-50c96da9="" class="details-main_evaluate__name">*****
                                            </uni-view>
                                        </uni-view>
                                        <uni-view data-v-50c96da9="" class="details-main_evaluate__bottom u-line-2">
                                            <?php echo $evaluate['pj_text'] ?>
                                        </uni-view>
                                        <uni-view data-v-ce68a9fa="" data-v-50c96da9="" class="Tags">
                                            <uni-view data-v-ce68a9fa="" class="Tags-item"
                                                      style="color: rgb(222, 171, 128); border: 0.03125rem solid rgb(222, 171, 128); background-color: rgb(255, 241, 238); padding: 0px 0.3125rem;">
                                                发货快
                                            </uni-view>
                                            <uni-view data-v-ce68a9fa="" class="Tags-item"
                                                      style="color: rgb(222, 171, 128); border: 0.03125rem solid rgb(222, 171, 128); background-color: rgb(255, 241, 238); padding: 0px 0.3125rem;">
                                                正品
                                            </uni-view>
                                            <uni-view data-v-ce68a9fa="" class="Tags-item"
                                                      style="color: rgb(222, 171, 128); border: 0.03125rem solid rgb(222, 171, 128); background-color: rgb(255, 241, 238); padding: 0px 0.3125rem;">
                                                质量好
                                            </uni-view>
                                        </uni-view>
                                    </uni-view>
                                    <uni-view data-v-50c96da9="" class="details-main_evaluate__right">
                                        <uni-image data-v-50c96da9="" class="details-main_evaluate__imgs">
                                            <div style="background-image: url(https://ankangceshi.oss-cn-beijing.aliyuncs.com/uploads/20240815/4397091eafa48d7269ccc4fc4eeb1c7d.png); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                            <span></span><img
                                                src="https://ankangceshi.oss-cn-beijing.aliyuncs.com/uploads/20240815/4397091eafa48d7269ccc4fc4eeb1c7d.png"
                                                draggable="false"></uni-image>
                                        <uni-view data-v-50c96da9="" class="details-main_evaluate__imgsNum">2</uni-view>
                                    </uni-view>
                                </uni-view>
                            </uni-view>
                        </uni-view>
                        <uni-view data-v-50c96da9="" class="details-main_details">
                            <uni-view data-v-50c96da9="" class="details-main_details__title"> ———— 商品详情 ————
                            </uni-view>
                            <uni-view data-v-50c96da9="" class="details-main_details__content">



                                <?php
                    if ($cha_1['xq'] == "" || $cha_1['xq'] == null) {
                        echo '<p>该商品未设置详情内容~</p>';
                                } else {
                                echo $cha_1['xq'];
                                }
                                ?>

                            </uni-view>
                        </uni-view>
                        <uni-view data-v-8d936b5c="" data-v-50c96da9="" class="Popups">
                            <uni-view data-v-fdccbf8b="" data-v-8d936b5c="" class="u-popup"><!----><!----></uni-view>
                        </uni-view>
                        
                        <style>
                            .details-nav_item a{
                                color: #000;
                            }
                            
                        </style>
                        
                        <uni-view data-v-50c96da9="" class="details-nav">
                            <uni-view data-v-50c96da9="" class="details-nav_item">
                                <a href="/">
                                <uni-image data-v-50c96da9="" class="details-nav_item__icon" style="height: 20px;">
                                    <div style="background-image: url(./static/images/home.png); background-size: 100% 100%;"></div>
                                    <uni-resize-sensor>
                                        <div>
                                            <div></div>
                                        </div>
                                        <div>
                                            <div></div>
                                        </div>
                                    </uni-resize-sensor>
                                    <img src="./static/images/home.png" draggable="false"></uni-image>
                                <uni-view data-v-50c96da9="" class="details-nav_item__name">首页</uni-view>
                                </a>
                            </uni-view>
                            <uni-view data-v-50c96da9="" class="details-nav_item">
                                    <a href="/kefu.php">
                                <uni-image data-v-50c96da9="" class="details-nav_item__icon" style="height: 20px;">
                                    <div style="background-image: url(./static/images/customer.png); background-size: 100% 100%;"></div>
                                    <uni-resize-sensor>
                                        <div>
                                            <div></div>
                                        </div>
                                        <div>
                                            <div></div>
                                        </div>
                                    </uni-resize-sensor>
                                    <img src="./static/images/customer.png" draggable="false"></uni-image>
                                <uni-view data-v-50c96da9="" class="details-nav_item__name">客服</uni-view></a>
                            </uni-view>
                            <uni-view data-v-50c96da9="" class="details-nav_item">
                                <a href="/login.php">
                                <uni-image data-v-50c96da9="" class="details-nav_item__icon" style="height: 20px;">
                                    
                                    <div style="background-image: url(./static/images/order.png); background-size: 100% 100%;"></div>
                                    <uni-resize-sensor>
                                        <div>
                                            <div></div>
                                        </div>
                                        <div>
                                            <div></div>
                                        </div>
                                    </uni-resize-sensor>
                                    <img src="./static/images/order.png" draggable="false"></uni-image> 
                                <uni-view data-v-50c96da9="" class="details-nav_item__name"> 订单</uni-view>
                              </a>
                            </uni-view>
                            <uni-view data-v-7e0b146c="" data-v-50c96da9="" class="Pay">
                                <a href="#" onclick="aClick()">
                                    <uni-view data-v-7e0b146c="" class="Pay-btn">立即购买</uni-view>
                                </a>
                                <uni-view data-v-fdccbf8b="" data-v-7e0b146c="" class="u-popup"><!---->
                                    <!----></uni-view>
                            </uni-view>
                        </uni-view>
                    </uni-view>
                </uni-page-body>
            </uni-page-wrapper>
        </uni-page>
        <uni-tabbar class="uni-tabbar-bottom" style="display: none;">
            <div class="uni-tabbar" style="background-color: rgb(255, 255, 255); backdrop-filter: none;">
                <div class="uni-tabbar-border" style="background-color: rgba(0, 0, 0, 0.33);"></div>
                <div class="uni-tabbar__item">  <a href="/">
                    <div class="uni-tabbar__bd" style="height: 50px;">
                      
                        <div class="uni-tabbar__icon uni-tabbar__icon__diff" style="width: 24px; height: 24px;"><img
                                src="./static/images/home_active.png"></div>
                        <div class="uni-tabbar__label"
                             style="color: rgb(218, 86, 80); font-size: 10px; line-height: normal; margin-top: 3px;">首页
                        </div>
                      
                        </div>  </a>
                </div>
                <div class="uni-tabbar__item">
                    <div class="uni-tabbar__bd" style="height: 50px;">
                        <div class="uni-tabbar__icon uni-tabbar__icon__diff" style="width: 24px; height: 24px;"><img
                                src="./static/images/classify.png"></div>
                        <div class="uni-tabbar__label"
                             style="color: rgb(122, 126, 131); font-size: 10px; line-height: normal; margin-top: 3px;">
                            分类
                        </div><!----></div>
                </div>
                <div class="uni-tabbar__item">
                    <div class="uni-tabbar__bd" style="height: 50px;">
                        <div class="uni-tabbar__icon uni-tabbar__icon__diff" style="width: 24px; height: 24px;"><img
                                src="./static/images/order.png"></div>
                        <div class="uni-tabbar__label"
                             style="color: rgb(122, 126, 131); font-size: 10px; line-height: normal; margin-top: 3px;">
                            订单
                        </div><!----></div>
                </div>
                <div class="uni-tabbar__item">
                    <div class="uni-tabbar__bd" style="height: 50px;">
                        <div class="uni-tabbar__icon uni-tabbar__icon__diff" style="width: 24px; height: 24px;"><img
                                src="./static/images/customer.png"></div>
                        <div class="uni-tabbar__label"
                             style="color: rgb(122, 126, 131); font-size: 10px; line-height: normal; margin-top: 3px;">
                            客服
                        </div><!----></div>
                </div>
            </div>
            <div class="uni-placeholder" style="height: 50px;"></div>
        </uni-tabbar>
    </uni-app>
</div>


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
   </div>
</div>       


<script>
    $('#pbSlider0').pbTouchSlider({
        slider_Wrap: '#pbSliderWrap0',
        slider_Threshold: 10,
        slider_Speed: 600,
        slider_Ease: 'ease-out',
        slider_Drag: true,
        slider_Arrows: {
            enabled: true
        },
        slider_Dots: {
            class: '.o-slider-pagination',
            enabled: true,
            preview: false
        },
        slider_Breakpoints: {
            default: {
                height: 500
            },
            tablet: {
                height: 350,
                media: 1024
            },
            smartphone: {
                height: 250,
                media: 768
            }
        }
    });

</script>
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


</body>
</html>
