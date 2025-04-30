-- MySQL dump 10.13  Distrib 5.6.50, for Linux (x86_64)
--
-- Host: localhost    Database: scymdhzcom
-- ------------------------------------------------------
-- Server version	5.6.50-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mao_data`
--

DROP TABLE IF EXISTS `mao_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mao_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Z_id` varchar(255) DEFAULT '1',
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mao_data`
--

LOCK TABLES `mao_data` WRITE;
/*!40000 ALTER TABLE `mao_data` DISABLE KEYS */;
INSERT INTO `mao_data` VALUES (1,'1','admin','123456a','抖店商城演示（电商专用）','111','111',4157.63,'1111111111111111','联系微信','1','15548184818','sc.ymdhz.com','shenhe.1.cn','2107-11-25','0','0','0','0','0','1000','YsffdqSORH0nT3JkgNAFVMQryVSfwwXm','https://pay.jiajingyu.com/','0','1','1','123456@qq.com','机器猫','','','');
/*!40000 ALTER TABLE `mao_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mao_dindan`
--

DROP TABLE IF EXISTS `mao_dindan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mao_dindan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `msg` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mao_dindan`
--

LOCK TABLES `mao_dindan` WRITE;
/*!40000 ALTER TABLE `mao_dindan` DISABLE KEYS */;
INSERT INTO `mao_dindan` VALUES (1,'1','4','20240303170717457','','【天猫优选】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 17:07:17','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(2,'1','1','20240303170759702','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',100.00,0.00,100.00,'2024-03-03 17:07:59','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(3,'1','1','20240303170810147','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',100.00,0.00,100.00,'2024-03-03 17:08:10','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(4,'1','1','20240303170810888','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',100.00,0.00,100.00,'2024-03-03 17:08:10','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(5,'1','4','20240303170818373','','【天猫优选】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 17:08:17','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(6,'1','4','20240303170939281','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 17:09:39','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(7,'1','4','20240303171051723','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 17:10:51','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(8,'1','1','20240303171058268','134655656565','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',1.00,0.00,1.00,'2024-03-03 17:10:58','1','大姐姐','上海 宝山区 杨行镇','嘟嘟姐','','','',NULL,NULL,NULL,'',NULL,NULL),(9,'1','3','20240303171330403','','【天猫优选】土耳其海参干货批发 野生希腊黑海参土耳其淡干海参','1',1.00,0.00,1.00,'2024-03-03 17:13:30','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(10,'1','3','20240303171330805','','【天猫优选】土耳其海参干货批发 野生希腊黑海参土耳其淡干海参','1',1.00,0.00,1.00,'2024-03-03 17:13:30','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(11,'1','4','20240303171444987','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 17:14:44','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(12,'1','4','20240303171449393','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 17:14:49','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(13,'1','4','20240303171454702','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 17:14:53','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(14,'1','4','20240303172055739','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.88,0.00,1.88,'2024-03-03 17:20:55','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(15,'1','4','20240303173832236','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.88,0.00,1.88,'2024-03-03 17:38:32','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(16,'1','1','20240303174141873','。','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',1888.00,0.00,1888.00,'2024-03-03 17:41:41','1','。','天津 河北区 全境','？','！','','',NULL,NULL,NULL,'',NULL,NULL),(17,'1','4','20240303174222649','，','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.88,0.00,1.88,'2024-03-03 17:42:22','1','，','重庆 璧山县 县城内','？','？','','',NULL,NULL,NULL,'',NULL,NULL),(18,'1','4','20240303175002281','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.88,0.00,1.88,'2024-03-03 17:50:02','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(19,'1','1','20240303175305808','199596','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',1888.00,0.00,1888.00,'2024-03-03 17:53:05','1','丹迪','天津 红桥区 全境','徐福记','','','',NULL,NULL,NULL,'',NULL,NULL),(20,'1','4','20240303175313623','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.88,0.00,1.88,'2024-03-03 17:53:13','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(21,'1','4','20240303175627900','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 17:56:27','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(22,'1','1','20240303180329521','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',1888.00,0.00,1888.00,'2024-03-03 18:03:29','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(23,'1','4','20240303180355257','158687546464','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 18:03:55','1','好好','上海 闵行区 虹桥镇','华东交大就地解决是','','','',NULL,NULL,NULL,'',NULL,NULL),(24,'1','2','20240303182126527','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',188.00,0.00,188.00,'2024-03-03 18:21:26','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(25,'1','4','20240303183519276','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 18:35:19','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(26,'1','2','20240303183546121','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',188.00,0.00,188.00,'2024-03-03 18:35:46','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(27,'1','1','20240303185058638','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',1888.00,0.00,1888.00,'2024-03-03 18:50:58','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(28,'1','4','20240303212146605','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-03-03 21:21:46','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(29,'1','2','20240303214642143','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',188.00,0.00,188.00,'2024-03-03 21:46:42','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(30,'1','2','20240303222502487','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',188.00,0.00,188.00,'2024-03-03 22:25:02','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(31,'1','4','20240303232856534','大风刮过','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',0.50,0.00,0.50,'2024-03-03 23:28:56','1','大风刮过','重庆 荣昌县 广顺镇','电饭锅','','','',NULL,NULL,NULL,'',NULL,NULL),(32,'1','4','20240303235212763','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',0.50,0.00,0.50,'2024-03-03 23:52:12','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(33,'1','1','20240304003755784','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',1888.00,0.00,1888.00,'2024-03-04 00:37:55','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(34,'1','4','20240304115003375','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',0.50,0.00,0.50,'2024-03-04 11:50:03','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(35,'1','4','20240304182359291','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',0.50,0.00,0.50,'2024-03-04 18:23:59','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(36,'1','1','20240305100646868','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',1888.00,0.00,1888.00,'2024-03-05 10:06:46','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(37,'1','4','20240305162404903','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',0.50,0.00,0.50,'2024-03-05 16:24:04','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(38,'1','3','20240305205120162','56665','【天猫优选】土耳其海参干货批发 野生希腊黑海参土耳其淡干海参','1',0.50,0.00,0.50,'2024-03-05 20:51:20','1','566','重庆 铜梁县 安居镇','5358','','','',NULL,NULL,NULL,'',NULL,NULL),(39,'1','1','20240306202301354','','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',1888.00,0.00,1888.00,'2024-03-06 20:23:01','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(40,'1','3','20240309003117793','','【天猫优选】土耳其海参干货批发 野生希腊黑海参土耳其淡干海参','1',0.50,0.00,0.50,'2024-03-09 00:31:17','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(41,'1','4','20240822222006412','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',0.50,0.00,0.50,'2024-08-22 22:20:06','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(42,'1','4','20240822222138886','111','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',0.50,0.00,0.50,'2024-08-22 22:21:38','1','11','北京 密云区 城区','我！','','','',NULL,NULL,NULL,'',NULL,NULL),(43,'1','2','20240822222229275','17777777777','【天猫优选】佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','1',188.00,0.00,188.00,'2024-08-22 22:22:29','1','陈冠希','河南 焦作市 修武县','1','','','',NULL,NULL,NULL,'',NULL,NULL),(44,'1','4','20240822222255516','15545152535','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',0.50,0.00,0.50,'2024-08-22 22:22:55','1','大头','北京 朝阳区 四环到五环之间','111','','','',NULL,NULL,NULL,'',NULL,NULL),(45,'1','4','20240822222400680','15548182324','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-08-22 22:24:00','1','大头','北京 密云区 城区以外','7111','','','',NULL,NULL,NULL,'',NULL,NULL),(46,'1','4','20240822223321879','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-08-22 22:33:21','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(47,'1','4','20240822225106603','','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-08-22 22:51:05','1','','','','','','',NULL,NULL,NULL,'',NULL,NULL),(48,'1','4','20240822235717357','15525354555','【人气销量】港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','1',1.00,0.00,1.00,'2024-08-22 23:57:17','1','大头','北京 密云区 城区以外','111','','','',NULL,NULL,NULL,'',NULL,NULL);
/*!40000 ALTER TABLE `mao_dindan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mao_gd`
--

DROP TABLE IF EXISTS `mao_gd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mao_gd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `users` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(1) NOT NULL DEFAULT '',
  `ddh` varchar(50) DEFAULT NULL,
  `kh` varchar(50) DEFAULT NULL,
  `wt` text,
  `img` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `zt` varchar(1) DEFAULT NULL,
  `msg` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mao_gd`
--

LOCK TABLES `mao_gd` WRITE;
/*!40000 ALTER TABLE `mao_gd` DISABLE KEYS */;
/*!40000 ALTER TABLE `mao_gd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mao_shop`
--

DROP TABLE IF EXISTS `mao_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mao_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `img` varchar(255) DEFAULT NULL,
  `type` varchar(1) NOT NULL DEFAULT '' COMMENT '1电/2移/3联',
  `tj` varchar(1) NOT NULL DEFAULT '1' COMMENT '0推荐/1默认',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yf_price` decimal(10,2) DEFAULT '0.00',
  `youhui_zhang` varchar(10) NOT NULL DEFAULT '0',
  `youhui_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `kucun` varchar(10) NOT NULL DEFAULT '0',
  `xiaoliang` varchar(10) NOT NULL DEFAULT '0',
  `beizhu` text,
  `xq` text,
  `slxd_zt` varchar(1) NOT NULL DEFAULT '1' COMMENT '数量下单/0开启/1关闭',
  `rwzl_zt` varchar(1) NOT NULL DEFAULT '1' COMMENT '0开启/1关闭',
  `dqpb` text COMMENT '地区屏蔽',
  `zt` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mao_shop`
--

LOCK TABLES `mao_shop` WRITE;
/*!40000 ALTER TABLE `mao_shop` DISABLE KEYS */;
INSERT INTO `mao_shop` VALUES (1,'1','佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','/upload/20240822221851238.jpg','1','1',1888.00,0.00,'0',0.00,'99999','6',NULL,'<p><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01dx51001rZutH59CkV_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01dx51001rZutH59CkV_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01k9pCG11rZutEdzhoR_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01k9pCG11rZutEdzhoR_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN012JdCRU1rZutEe2adk_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN012JdCRU1rZutEe2adk_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01uW6orT1rZutDliabQ_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01uW6orT1rZutDliabQ_!!2212517395646-0-cib.jpg\" alt=\"undefined\"></p>','1','1','','0'),(2,'1','佛跳墙海鲜鲍鱼花胶海参干贝加热即食大盆菜1.5KG节日礼盒装送礼','/upload/20240822221821521.jpg','1','1',188.00,0.00,'0',0.00,'99999','6',NULL,'<p><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01dx51001rZutH59CkV_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01dx51001rZutH59CkV_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01k9pCG11rZutEdzhoR_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01k9pCG11rZutEdzhoR_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN012JdCRU1rZutEe2adk_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN012JdCRU1rZutEe2adk_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01uW6orT1rZutDliabQ_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01uW6orT1rZutDliabQ_!!2212517395646-0-cib.jpg\" alt=\"undefined\"></p>','1','1','','0'),(3,'1','土耳其海参干货批发 野生希腊黑海参土耳其淡干海参','/upload/20240822221712939.jpg','1','1',1.00,0.00,'0',0.00,'99999','3',NULL,'<p><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/2020/248/667/21384766842_493672081.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/2020/248/667/21384766842_493672081.jpg\" alt=\"1 (1).jpg\"><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/2020/719/663/21309366917_493672081.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/2020/719/663/21309366917_493672081.jpg\" alt=\"规格.jpg\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/2020/693/058/21469850396_493672081.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/2020/693/058/21469850396_493672081.jpg\" alt=\"1 (3).jpg\"><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/2020/261/208/21384802162_493672081.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/2020/261/208/21384802162_493672081.jpg\" alt=\"1 (4).jpg\"><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/2020/915/487/21384784519_493672081.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/2020/915/487/21384784519_493672081.jpg\" alt=\"1 (5).jpg\"><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/2020/894/358/21469853498_493672081.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/2020/894/358/21469853498_493672081.jpg\" alt=\"1 (6).jpg\"><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/2020/170/472/21308274071_493672081.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/2020/170/472/21308274071_493672081.jpg\" alt=\"1 (7).jpg\"><br><br></p>','1','1','','0'),(4,'1','港式金汤鲍鱼花胶鸡加热即食鱼胶滋补食材1650g礼盒','/upload/20240822221607964.jpg','3','1',1.00,0.00,'0',0.00,'99999','5',NULL,'<p><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01G7jrWK1rZutB5kl8V_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01G7jrWK1rZutB5kl8V_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01ztkjeU1rZutDHmaYK_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01ztkjeU1rZutDHmaYK_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01VVUdvH1rZutDo02cg_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01VVUdvH1rZutDo02cg_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01zPLw0c1rZutB5n2Wj_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01zPLw0c1rZutB5n2Wj_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01Ihnl6K1rZutG7PKgY_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01Ihnl6K1rZutG7PKgY_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01RPZQrd1rZutDDjda4_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01RPZQrd1rZutDDjda4_!!2212517395646-0-cib.jpg\" alt=\"undefined\"><br><br><img class=\"desc-img-loaded\" src=\"https://cbu01.alicdn.com/img/ibank/O1CN01prfamf1rZutH7VMDR_!!2212517395646-0-cib.jpg\" data-lazyload-src=\"https://cbu01.alicdn.com/img/ibank/O1CN01prfamf1rZutH7VMDR_!!2212517395646-0-cib.jpg\" alt=\"undefined\"></p>','1','1','','0');
/*!40000 ALTER TABLE `mao_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mao_tx`
--

DROP TABLE IF EXISTS `mao_tx`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mao_tx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `M_id` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `time` varchar(50) DEFAULT NULL,
  `zt` varchar(255) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mao_tx`
--

LOCK TABLES `mao_tx` WRITE;
/*!40000 ALTER TABLE `mao_tx` DISABLE KEYS */;
INSERT INTO `mao_tx` VALUES (1,'1',10.00,'2022-03-26 17:11:28','1'),(2,'1',10.00,'2022-03-31 00:03:15','1');
/*!40000 ALTER TABLE `mao_tx` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mao_user`
--

DROP TABLE IF EXISTS `mao_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mao_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `users` varchar(50) NOT NULL DEFAULT '',
  `pass` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mao_user`
--

LOCK TABLES `mao_user` WRITE;
/*!40000 ALTER TABLE `mao_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `mao_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mao_wuliu`
--

DROP TABLE IF EXISTS `mao_wuliu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mao_wuliu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `M_id` varchar(10) NOT NULL DEFAULT '',
  `users` varchar(50) DEFAULT NULL,
  `ddh` varchar(50) DEFAULT NULL,
  `msg` text,
  `time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mao_wuliu`
--

LOCK TABLES `mao_wuliu` WRITE;
/*!40000 ALTER TABLE `mao_wuliu` DISABLE KEYS */;
INSERT INTO `mao_wuliu` VALUES (1,'1','15973622705','20230719220226245','{\"code\":\"OK\",\"no\":\"772021368277322\",\"type\":\"STO\",\"list\":[{\"content\":\"快件离开【福建泉州转运中心】已发往【新疆乌鲁木齐转运中心】\",\"time\":\"2023-07-22 04:32:42\"},{\"content\":\"快件已到达【福建泉州转运中心】\",\"time\":\"2023-07-22 04:28:40\"},{\"content\":\"快件离开【福建北岸公司】已发往【福建泉州转运中心】\",\"time\":\"2023-07-22 02:39:27\"},{\"content\":\"【福建莆田公司】(0594-6253801)的湖滨一客价(17850200123)已揽收\",\"time\":\"2023-07-21 21:30:58\"}],\"state\":\"2\",\"msg\":\"查询成功\",\"name\":\"申通快递\",\"site\":\"www.sto.cn\",\"phone\":\"95543\",\"logo\":\"https://img3.fegine.com/express/sto.jpg\",\"courier\":\"\",\"courierPhone\":\"\",\"updateTime\":\"2023-07-22 04:32:42\",\"takeTime\":\"0天7小时1分\"}','2023-07-24 02:12:18');
/*!40000 ALTER TABLE `mao_wuliu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'scymdhzcom'
--

--
-- Dumping routines for database 'scymdhzcom'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-23  0:23:53
