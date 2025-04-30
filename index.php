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
<html lang="en" style="font-size: 16px; --status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --tab-bar-height: 50px; --window-top: calc(0px + env(safe-area-inset-top)); --window-bottom: calc(50px + env(safe-area-inset-bottom));">
<head>
    
    
    
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $mao['title'] ?></title>
   

    <script src="static/js/jquery-2.1.1.min.js"></script>
    <script src="/static/layui-v2.9.17/layui.js"></script>
    <script src="static/js/Mao.js"></script>

 <style type="text/css">
 .Goods-name{
     color: #000;
 }
 
        a {
            text-decoration: none;
        }
        .swal-icon--error {
        border-color: #f27474;
        -webkit-animation: animateErrorIcon .5s;
        animation: animateErrorIcon .5s
    }

    .swal-icon--error__x-mark {
        position: relative;
        display: block;
        -webkit-animation: animateXMark .5s;
        animation: animateXMark .5s
    }

    .swal-icon--error__line {
        position: absolute;
        height: 5px;
        width: 47px;
        background-color: #f27474;
        display: block;
        top: 37px;
        border-radius: 2px
    }

    .swal-icon--error__line--left {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        left: 17px
    }

    .swal-icon--error__line--right {
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        right: 16px
    }

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

    .swal-icon--warning {
        border-color: #f8bb86;
        -webkit-animation: pulseWarning .75s infinite alternate;
        animation: pulseWarning .75s infinite alternate
    }

    .swal-icon--warning__body {
        width: 5px;
        height: 47px;
        top: 10px;
        border-radius: 2px;
        margin-left: -2px
    }

    .swal-icon--warning__body, .swal-icon--warning__dot {
        position: absolute;
        left: 50%;
        background-color: #f8bb86
    }

    .swal-icon--warning__dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        margin-left: -4px;
        bottom: -11px
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




    .swal-overlay--show-modal .swal-modal {
        opacity: 1;
        pointer-events: auto;
        box-sizing: border-box;
        -webkit-animation: showSweetAlert .3s;
        animation: showSweetAlert .3s;
        will-change: transform
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
    }</style>
    <link rel="stylesheet" href="./assets/uni.6ebadf31.css">

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <title>首页</title>


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
</head>
<body style="zoom: 1;" data-v-b3798e01="">
<div id="app" data-v-app="">
    <uni-app class="uni-app--showtabbar">
        <uni-page data-page="pages/index/index" type="tabBar"><!---->
            <uni-page-wrapper>
                <uni-page-body data-v-b3798e01="">
                    <uni-view data-v-b3798e01="" class="index">
                        <uni-view data-v-b3798e01="" class="index-search">
                            <uni-view data-v-9e21e19f="" data-v-b3798e01="" class="u-search" style="margin: 0px;">
                                <uni-view data-v-9e21e19f="" class="u-search__content"
                                          style="background-color: rgb(255, 255, 255); border-radius: 100px; border-color: transparent;">
                                    <!---->
                                    <uni-view data-v-9e21e19f="" class="u-search__content__icon">
                                        <uni-view data-v-dba63873="" data-v-9e21e19f="" class="u-icon u-icon--right">
                                            <uni-text data-v-dba63873="" class="u-icon__icon uicon-search u-iconfont"
                                                      hover-class=""
                                                      style="font-size: 22px; line-height: 22px; font-weight: normal; top: 0px; color: rgb(144, 147, 153);">
                                                <span></span></uni-text><!----></uni-view>
                                    </uni-view>
                                    <uni-input data-v-9e21e19f="" class="u-search__content__input"
                                               style="text-align: left; color: rgb(96, 98, 102); background-color: rgb(255, 255, 255); height: 32px;">
                                        <div class="uni-input-wrapper">

                                            <form action="" class="uni-input-form"><input type="search" placeholder="输入商品名称搜索" maxlength="-1"
                                                                                          step="" enterkeyhint="search"
                                                                                          class="uni-input-input"
                                                                                          autocomplete="off"></form>
                                        </div>
                                    </uni-input><!----></uni-view>
                                <uni-text data-v-9e21e19f="" class="u-search__action u-search__action--active">
                                    <span>搜索</span></uni-text>
                            </uni-view>
                        </uni-view>
                        <uni-view data-v-b3798e01="" class="index-shop">
                            <uni-view data-v-c6d89d52="" data-v-b3798e01="" class="Shop">
                                <uni-view data-v-c6d89d52="" class="Shop-card">
                                    <uni-view data-v-c6d89d52="" class="Shop-top">
                                        <uni-image data-v-c6d89d52="" class="Shop-top_image">
                                            <div style="background-image: url(<?php echo $shopLogo; ?>); background-position: center center; background-size: contain;"></div>
                                            <span></span></uni-image>
                                        <uni-view data-v-c6d89d52="" class="Shop-top_main">
                                            <uni-view data-v-c6d89d52="" class="Shop-top_name u-line-1"><?php echo $shopName; ?>
                                            </uni-view>
                                            <uni-view data-v-ce68a9fa="" data-v-c6d89d52="" class="Tags">
                                                <uni-view data-v-ce68a9fa="" class="Tags-item"
                                                          style="color: rgb(179, 156, 63); border: 0.03125rem solid rgb(179, 156, 63); background-color: rgb(255, 240, 201); padding: 0px 0.3125rem;">
                                                    金牌店铺
                                                </uni-view>
                                                <uni-view data-v-ce68a9fa="" class="Tags-item"
                                                          style="color: rgb(222, 171, 128); border: none; padding: 0px;">
                                                    好评过万
                                                </uni-view>
                                                <uni-view data-v-ce68a9fa="" class="Tags-item"
                                                          style="color: rgb(222, 171, 128); border: none; padding: 0px;">
                                                    回头客9000+
                                                </uni-view>
                                            </uni-view>
                                            <uni-view data-v-c6d89d52="" class="Shop-top_desc">
                                                <uni-text data-v-c6d89d52=""><span>粉丝 9999</span></uni-text>
                                                <uni-text data-v-c6d89d52=""><span>店铺口碑 4.99分</span></uni-text>
                                            </uni-view>
                                        </uni-view>
                                       <a href="/list.php"> <uni-view data-v-c6d89d52="" class="Shop-top_follow">进店</uni-view></a>
                                    </uni-view>
                                </uni-view>
                            </uni-view>
                        </uni-view>
                        <uni-view data-v-b3798e01="" class="index-list">
                            <uni-view data-v-b3798e01="" class="index-list_tabs">
                                <uni-view data-v-2b9d7afa="" data-v-b3798e01="" class="Tabs">
                                    <uni-view data-v-2b9d7afa="" class="Tabs-item Tabs-item_active" style="width: 25%;">综合</uni-view>
                                    <uni-view data-v-2b9d7afa="" class="Tabs-item" style="width: 25%;">销量</uni-view>
                                    <uni-view data-v-2b9d7afa="" class="Tabs-item" style="width: 25%;">新品</uni-view>
                                    <uni-view data-v-2b9d7afa="" class="Tabs-item" style="width: 25%;">价格<uni-view data-v-2b9d7afa="" class="Tabs-sorts">
                                            <uni-image data-v-2b9d7afa="" class="Tabs-sorts_item Tabs-sorts_up">
                                                <div style="background-image: url(./static/images/top1.png); background-position: center center; background-size: contain;"></div>
                                                <span></span><img src="./static/images/top1.png" draggable="false"></uni-image>
                                            <uni-image data-v-2b9d7afa="" class="Tabs-sorts_item Tabs-sorts_down">
                                                <div style="background-image: url(./static/images/top1.png); background-position: center center; background-size: contain;"></div>
                                                <span></span><img src="./static/images/top1.png" draggable="false"></uni-image>
                                        </uni-view>
                                    </uni-view>
                                </uni-view>
                            </uni-view>
                            <uni-view data-v-b3798e01="" id="index_list" class="index-list_goods">
                              
                            </uni-view>
                        </uni-view>
                    </uni-view>
                </uni-page-body>
            </uni-page-wrapper>
        </uni-page>
        <uni-tabbar class="uni-tabbar-bottom" style="">
            <div class="uni-tabbar" style="background-color: rgb(255, 255, 255); backdrop-filter: none;">
                <div class="uni-tabbar-border" style="background-color: rgba(0, 0, 0, 0.33);"></div>
                <div class="uni-tabbar__item">
                    <div class="uni-tabbar__bd" style="height: 50px;">
                        <div class="uni-tabbar__icon uni-tabbar__icon__diff" style="width: 24px; height: 24px;"><img
                                src="./static/images/home_active.png"></div>
                        <div class="uni-tabbar__label"
                             style="color: rgb(218, 86, 80); font-size: 10px; line-height: normal; margin-top: 3px;">首页
                        </div><!----></div>
                </div>
                <div class="uni-tabbar__item">
                    <a href="/list.php">
                    <div class="uni-tabbar__bd" style="height: 50px;">
                        <div class="uni-tabbar__icon uni-tabbar__icon__diff" style="width: 24px; height: 24px;"><img
                                src="./static/images/classify.png"></div>
                        <div class="uni-tabbar__label"
                             style="color: rgb(122, 126, 131); font-size: 10px; line-height: normal; margin-top: 3px;">
                            全部商品
                        </div><!----></div></a>
                </div>
                <div class="uni-tabbar__item">
                     <a href="/login.php">
                    <div class="uni-tabbar__bd" style="height: 50px;">
                        <div class="uni-tabbar__icon uni-tabbar__icon__diff" style="width: 24px; height: 24px;"><img
                                src="./static/images/order.png"></div>
                        <div class="uni-tabbar__label"
                             style="color: rgb(122, 126, 131); font-size: 10px; line-height: normal; margin-top: 3px;">
                            订单
                        </div><!----></div></a>
                </div>
                <div class="uni-tabbar__item">
                     <a href="/kefu.php">
                    <div class="uni-tabbar__bd" style="height: 50px;">
                        <div class="uni-tabbar__icon uni-tabbar__icon__diff" style="width: 24px; height: 24px;"><img
                                src="./static/images/customer.png"></div>
                        <div class="uni-tabbar__label"
                             style="color: rgb(122, 126, 131); font-size: 10px; line-height: normal; margin-top: 3px;">
                            客服
                        </div><!----></div></a>
                </div>
            </div>
            <div class="uni-placeholder" style="height: 50px;"></div>
        </uni-tabbar>
    </uni-app>
</div>
<script id="demo" type="text/html">
  {{#  layui.each(d.data, function(index, item){ }}
  
  
  <a href="/goods.php?id={{item.id}}">
                                <uni-view data-v-246f3ccd="" data-v-b3798e01="" class="Goods index-list_goods_item">
                                    <uni-image data-v-246f3ccd="" class="Goods-image">
                                        <div style="background-image: url({{item.img}}); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                        <span></span><img src="{{item.img}}" draggable="false"></uni-image>
                                    <uni-view data-v-246f3ccd="" class="Goods-main">
                                        <uni-view data-v-246f3ccd="" class="Goods-name u-line-2">{{item.name}}</uni-view>
                                        <uni-view data-v-246f3ccd="" class="Goods-price">
                                            <uni-view data-v-246f3ccd="" class="Goods-price_normal">￥{{item.price}}</uni-view>
                                            <uni-view data-v-246f3ccd="" class="Goods-price_sold">已售{{item.xiaoliang}}</uni-view>
                                        </uni-view>
                                        <uni-view data-v-246f3ccd="" class="Goods-bottom">
                                            <uni-view data-v-ce68a9fa="" data-v-246f3ccd="" class="Tags Goods-bottom_tags">
                                                <uni-view data-v-ce68a9fa="" class="Tags-item" style="color: rgb(222, 171, 128); border: 0.03125rem solid rgb(222, 171, 128); background-color: rgb(255, 241, 238); padding: 0px 0.3125rem;">
                                                    运费险
                                                </uni-view>
                                                <uni-view data-v-ce68a9fa="" class="Tags-item" style="color: rgb(222, 171, 128); border: 0.03125rem solid rgb(222, 171, 128); background-color: rgb(255, 241, 238); padding: 0px 0.3125rem;">
                                                    7天无理由退货
                                                </uni-view>
                                            </uni-view>
                                        </uni-view>
                                    </uni-view>
                                </uni-view>
                                </a>
  
  

  {{#  }); }}
  {{#  if(d.data.length === 0){ }}
    无数据
  {{#  } }} 
</script>
    <script src="static/js/bui.js"></script>
<script>

layui.use('laytpl', function(){
  var laytpl = layui.laytpl;
  //index_list
  

      var loading = '<div class="infinite-loading"><span class="fui-preloader"></span><span class="text"> 正在加载...</span></div>';
    function query(tabs){
        $("#index_list").html(loading);
      
        $.post('../api/data.php?mod=index_list&tabs=' + tabs + '&sorts=' + jgSorts, function (d) {
            
            
         
            
            var getTpl = demo.innerHTML
,view = document.getElementById('index_list');
laytpl(getTpl).render(d, function(html){
  view.innerHTML = html;
});
            
            
            return false
        });
    }
  
  
  

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

            var data = $(this).text().length > 50 ? "价格" : $(this).html();
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


});

</script>
</body>
</html>
