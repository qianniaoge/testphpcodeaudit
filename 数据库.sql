-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2025-02-11 21:40:48
-- 服务器版本： 5.7.40-log
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `gao3165636`
--

-- --------------------------------------------------------

--
-- 表的结构 `mao_data`
--

CREATE TABLE `mao_data` (
  `id` int(11) NOT NULL,
  `Z_id` varchar(255) DEFAULT '1' COMMENT '分店',
  `user` varchar(20) NOT NULL DEFAULT '',
  `pass` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `gd_gg` text,
  `qq` varchar(15) DEFAULT NULL COMMENT '客服QQ',
  `wx` varchar(20) DEFAULT NULL COMMENT '客服微信',
  `sj` varchar(15) DEFAULT NULL,
  `url` varchar(30) NOT NULL DEFAULT '' COMMENT '系统分发域名',
  `url_1` varchar(30) DEFAULT NULL COMMENT '备用域名',
  `time` varchar(30) NOT NULL DEFAULT '' COMMENT '网站到期时间',
  `dx_1` varchar(1) DEFAULT '1',
  `dx_2` varchar(255) DEFAULT '1',
  `dx_3` varchar(1) DEFAULT '1',
  `dx_4` varchar(1) DEFAULT '1',
  `yzf_type` varchar(1) DEFAULT '1' COMMENT '/0自定义/',
  `yzf_id` varchar(50) DEFAULT NULL,
  `yzf_key` varchar(100) DEFAULT NULL,
  `yzf_url` varchar(100) DEFAULT NULL,
  `zfb_zf` varchar(1) DEFAULT '0',
  `qq_zf` varchar(1) DEFAULT '0',
  `wx_zf` varchar(1) DEFAULT '0',
  `tx_zh` varchar(20) DEFAULT '' COMMENT '提现帐号',
  `tx_sm` varchar(10) DEFAULT NULL COMMENT '提现实名',
  `ym_id` varchar(20) DEFAULT NULL COMMENT '友盟',
  `mzf_id` varchar(20) DEFAULT NULL COMMENT '2',
  `mzf_key` varchar(100) DEFAULT NULL COMMENT '1',
  `total_sales` varchar(100) DEFAULT NULL COMMENT '总销量',
  `shop_logo` varchar(255) DEFAULT NULL COMMENT '店铺LOGO',
  `shop_name` varchar(100) DEFAULT NULL COMMENT '店铺名称',
  `shop_bisect` double(5,1) DEFAULT NULL COMMENT '店铺平分'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站设置';

--
-- 转存表中的数据 `mao_data`
--

INSERT INTO `mao_data` (`id`, `Z_id`, `user`, `pass`, `title`, `keywords`, `description`, `price`, `gd_gg`, `qq`, `wx`, `sj`, `url`, `url_1`, `time`, `dx_1`, `dx_2`, `dx_3`, `dx_4`, `yzf_type`, `yzf_id`, `yzf_key`, `yzf_url`, `zfb_zf`, `qq_zf`, `wx_zf`, `tx_zh`, `tx_sm`, `ym_id`, `mzf_id`, `mzf_key`, `total_sales`, `shop_logo`, `shop_name`, `shop_bisect`) VALUES
(1, '1', 'admin', '123456', '网神科技（电商专用）', '111', '111', '4268.63', '新年礼盒上架，全地区包邮，送货上门！！！', '　', '　', '18888888888', 'shop.7og.cn', 'shop.7og.cn', '2107-11-25', '0', '0', '0', '0', '0', '这里改成你的易支付id', '这里改成你的易支付key', '这里改成你的易支付网址', '0', '1', '0', '123456@qq.com', '机器猫', '', '', '', '已售5万单', '/upload/20250211211718465.jpg', '网神科技', 4.9),
(11, '1', '123456', '123456a', '分站测试', NULL, NULL, '9999.00', '494904916', '123456', '123456', '18888888888', '自定义分站', NULL, '2025-10-25', '1', '1', '1', '1', '1', NULL, NULL, NULL, '0', '0', '0', '', NULL, '', NULL, NULL, '已售10万+', '/upload/20240925185952319.png', '抖音测试站', 5.0);

-- --------------------------------------------------------

--
-- 表的结构 `mao_dindan`
--

CREATE TABLE `mao_dindan` (
  `id` int(11) NOT NULL,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `M_sp` varchar(10) NOT NULL DEFAULT '',
  `ddh` varchar(50) NOT NULL DEFAULT '',
  `sjh` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `sl` varchar(10) NOT NULL DEFAULT '1',
  `dj_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yf_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `time` varchar(50) NOT NULL DEFAULT '',
  `zt` varchar(1) NOT NULL DEFAULT '1' COMMENT '/1未处理/0已付款(待)/2已处理/',
  `xm` varchar(10) DEFAULT '' COMMENT '收件人',
  `dz` varchar(100) DEFAULT '' COMMENT '收件地址',
  `xxdz` varchar(100) DEFAULT '' COMMENT '详细地址',
  `ly` varchar(30) DEFAULT '',
  `jzxm` varchar(10) DEFAULT '' COMMENT '机主姓名',
  `sfzh` varchar(30) DEFAULT '' COMMENT '机主身份证号',
  `mgz` varchar(255) DEFAULT NULL COMMENT '免冠照',
  `sfz1` varchar(255) DEFAULT NULL COMMENT '身份证正面',
  `sfz2` varchar(255) DEFAULT NULL COMMENT '身份证反面',
  `kdgs` varchar(20) DEFAULT '' COMMENT '快递公司',
  `ydh` varchar(50) DEFAULT NULL COMMENT '运单号',
  `msg` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单';

--
-- 转存表中的数据 `mao_dindan`
--

INSERT INTO `mao_dindan` (`id`, `M_id`, `M_sp`, `ddh`, `sjh`, `name`, `sl`, `dj_price`, `yf_price`, `price`, `time`, `zt`, `xm`, `dz`, `xxdz`, `ly`, `jzxm`, `sfzh`, `mgz`, `sfz1`, `sfz2`, `kdgs`, `ydh`, `msg`) VALUES
(108, '1', '25', '20250211212054138', '', '【人气销量】30g足金手镯999', '1', '99.00', '0.00', '99.00', '2025-02-11 21:20:54', '1', '', '', '', '', '', '', NULL, NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mao_evaluate`
--

CREATE TABLE `mao_evaluate` (
  `id` int(11) NOT NULL,
  `M_id` varchar(10) NOT NULL COMMENT '网站配置ID',
  `M_sp` varchar(10) NOT NULL COMMENT '商品ID',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `pj_text` text COMMENT '评价内容',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签，多个逗号隔开',
  `user_img` varchar(255) DEFAULT NULL COMMENT '头像',
  `pj_img` varchar(255) DEFAULT NULL COMMENT '评价图片',
  `pj_img_cot` int(1) DEFAULT '1' COMMENT '评价图片数量',
  `ping_fen1` int(11) DEFAULT NULL COMMENT '评分1',
  `ping_fen2` int(11) DEFAULT NULL COMMENT '评分2',
  `ping_fen3` int(11) DEFAULT NULL COMMENT '评分3',
  `ping_fen4` int(11) DEFAULT NULL COMMENT '评分4',
  `ping_fen5` int(11) DEFAULT NULL COMMENT '评分5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `mao_gd`
--

CREATE TABLE `mao_gd` (
  `id` int(11) NOT NULL,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `users` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(1) NOT NULL DEFAULT '',
  `ddh` varchar(50) DEFAULT NULL,
  `kh` varchar(50) DEFAULT NULL,
  `wt` text,
  `img` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `zt` varchar(1) DEFAULT NULL,
  `msg` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mao_shop`
--

CREATE TABLE `mao_shop` (
  `id` int(11) NOT NULL,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `img` varchar(255) DEFAULT NULL,
  `type` varchar(1) NOT NULL DEFAULT '' COMMENT '1电/2移/3联',
  `tj` varchar(1) NOT NULL DEFAULT '1' COMMENT '0推荐/1默认',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `yf_price` decimal(10,2) DEFAULT '0.00',
  `youhui_zhang` varchar(10) NOT NULL DEFAULT '0',
  `youhui_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `kucun` varchar(10) NOT NULL DEFAULT '0',
  `xiaoliang` varchar(10) NOT NULL DEFAULT '0' COMMENT '销量',
  `beizhu` text,
  `xq` text,
  `slxd_zt` varchar(1) NOT NULL DEFAULT '1' COMMENT '数量下单/0开启/1关闭',
  `rwzl_zt` varchar(1) NOT NULL DEFAULT '1' COMMENT '0开启/1关闭',
  `dqpb` text COMMENT '地区屏蔽',
  `zt` varchar(1) NOT NULL DEFAULT '0' COMMENT '上架'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品';

--
-- 转存表中的数据 `mao_shop`
--

INSERT INTO `mao_shop` (`id`, `M_id`, `name`, `img`, `type`, `tj`, `price`, `yf_price`, `youhui_zhang`, `youhui_price`, `kucun`, `xiaoliang`, `beizhu`, `xq`, `slxd_zt`, `rwzl_zt`, `dqpb`, `zt`) VALUES
(25, '1', '30g足金手镯999', '/upload/20250211211844651.png', '3', '0', '99.00', '0.00', '0', '1.00', '12', '67', NULL, '<p style=\"text-align: center;\"><img src=\"/upload/20250211211945883.png\" alt=\"图片\" style=\"max-width: 100%; height: auto;\"><img src=\"/upload/20250211211928757.jpg\" alt=\"图片\" style=\"max-width: 100%; height: auto;\"></p>', '1', '1', '美国', '0');

-- --------------------------------------------------------

--
-- 表的结构 `mao_tx`
--

CREATE TABLE `mao_tx` (
  `id` int(11) NOT NULL,
  `M_id` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `time` varchar(50) DEFAULT NULL,
  `zt` varchar(255) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mao_user`
--

CREATE TABLE `mao_user` (
  `id` int(11) NOT NULL,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `users` varchar(50) NOT NULL DEFAULT '',
  `pass` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mao_user`
--

INSERT INTO `mao_user` (`id`, `M_id`, `users`, `pass`) VALUES
(1, '1', '18888888888', '18888888888');

-- --------------------------------------------------------

--
-- 表的结构 `mao_wuliu`
--

CREATE TABLE `mao_wuliu` (
  `id` int(11) NOT NULL,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `users` varchar(50) DEFAULT NULL,
  `ddh` varchar(50) DEFAULT NULL,
  `msg` text,
  `time` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mao_wuliu`
--

INSERT INTO `mao_wuliu` (`id`, `M_id`, `users`, `ddh`, `msg`, `time`) VALUES
(1, '1', '15973622705', '20230719220226245', '{\"code\":\"OK\",\"no\":\"772021368277322\",\"type\":\"STO\",\"list\":[{\"content\":\"快件离开【福建泉州转运中心】已发往【新疆乌鲁木齐转运中心】\",\"time\":\"2023-07-22 04:32:42\"},{\"content\":\"快件已到达【福建泉州转运中心】\",\"time\":\"2023-07-22 04:28:40\"},{\"content\":\"快件离开【福建北岸公司】已发往【福建泉州转运中心】\",\"time\":\"2023-07-22 02:39:27\"},{\"content\":\"【福建莆田公司】(0594-6253801)的湖滨一客价(17850200123)已揽收\",\"time\":\"2023-07-21 21:30:58\"}],\"state\":\"2\",\"msg\":\"查询成功\",\"name\":\"申通快递\",\"site\":\"www.sto.cn\",\"phone\":\"95543\",\"logo\":\"https://img3.fegine.com/express/sto.jpg\",\"courier\":\"\",\"courierPhone\":\"\",\"updateTime\":\"2023-07-22 04:32:42\",\"takeTime\":\"0天7小时1分\"}', '2023-07-24 02:12:18');

--
-- 转储表的索引
--

--
-- 表的索引 `mao_data`
--
ALTER TABLE `mao_data`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `mao_dindan`
--
ALTER TABLE `mao_dindan`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `mao_evaluate`
--
ALTER TABLE `mao_evaluate`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `mao_gd`
--
ALTER TABLE `mao_gd`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `mao_shop`
--
ALTER TABLE `mao_shop`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `mao_tx`
--
ALTER TABLE `mao_tx`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `mao_user`
--
ALTER TABLE `mao_user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `mao_wuliu`
--
ALTER TABLE `mao_wuliu`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mao_data`
--
ALTER TABLE `mao_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `mao_dindan`
--
ALTER TABLE `mao_dindan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- 使用表AUTO_INCREMENT `mao_evaluate`
--
ALTER TABLE `mao_evaluate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- 使用表AUTO_INCREMENT `mao_gd`
--
ALTER TABLE `mao_gd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `mao_shop`
--
ALTER TABLE `mao_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用表AUTO_INCREMENT `mao_tx`
--
ALTER TABLE `mao_tx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `mao_user`
--
ALTER TABLE `mao_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `mao_wuliu`
--
ALTER TABLE `mao_wuliu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
