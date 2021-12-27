-- MySQL dump 10.13  Distrib 5.7.33, for Linux (aarch64)
--
-- Host: localhost    Database: tv_live
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `live_url`
--

DROP TABLE IF EXISTS `live_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `live_url` (
  `id` int(32) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(32) NOT NULL COMMENT '直播名称',
  `remarks` varchar(32) NOT NULL COMMENT '备注',
  `url` varchar(255) NOT NULL DEFAULT '/' COMMENT '播放地址',
  `icon` varchar(32) DEFAULT 'icon' COMMENT '台标名称',
  `created_at` int(32) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(32) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `live_url`
--

LOCK TABLES `live_url` WRITE;
/*!40000 ALTER TABLE `live_url` DISABLE KEYS */;
INSERT INTO `live_url` VALUES (1,'凤凰卫视中文台','fhzw','rtmp://ivi.bupt.edu.cn:1935/livetv/fhzw',NULL,1624591931,1624591931),(2,'凤凰卫视资讯台','fhzx','rtmp://ivi.bupt.edu.cn:1935/livetv/fhzx',NULL,1624593038,1624593038),(3,'凤凰卫视电影台','fhdy','rtmp://ivi.bupt.edu.cn:1935/livetv/fhdy',NULL,1624593058,1624593058),(4,'星空卫视','startv','rtmp://ivi.bupt.edu.cn:1935/livetv/startv',NULL,1624593074,1624593074),(5,'星空体育','starsports','rtmp://ivi.bupt.edu.cn:1935/livetv/starsports',NULL,1624593099,1624593099),(6,'星空音乐台','channelv','rtmp://ivi.bupt.edu.cn:1935/livetv/channelv',NULL,1624593160,1624593160),(7,'探索频道','discovery','rtmp://ivi.bupt.edu.cn:1935/livetv/discovery',NULL,1624593173,1624593173),(8,'国家地理频道','natlgeo','rtmp://ivi.bupt.edu.cn:1935/livetv/natlgeo',NULL,1624593188,1624593188),(9,'CHC高清电影','chchd','rtmp://ivi.bupt.edu.cn:1935/livetv/chchd',NULL,1624593202,1624593202),(10,'CHC家庭影院','chctv','rtmp://ivi.bupt.edu.cn:1935/livetv/chctv',NULL,1624593214,1624593214),(11,'CHC动作电影','chcatv','rtmp://ivi.bupt.edu.cn:1935/livetv/chcatv',NULL,1624593229,1624593229),(12,'CCTV-1HD','cctv1hd','http://39.134.155.133/PLTV/88888888/224/3221225553/index.m3u8',NULL,1624593244,1629874897),(13,'CCTV-2HD','cctv2hd','http://39.135.138.58:18890/PLTV/88888888/224/3221225643/index.m3u8',NULL,1624593265,1629730003),(14,'CCTV-3HD','cctv3hd','http://39.134.65.175/PLTV/88888888/224/3221225799/index.m3u8',NULL,1624593279,1629730014),(15,'CCTV-4HD','cctv4hd','http://39.134.65.175/PLTV/88888888/224/3221225797/index.m3u8',NULL,1624593298,1629730022),(16,'CCTV-5HD','cctv5hd','http://39.135.138.58:18890/PLTV/88888888/224/3221225751/index.m3u8',NULL,1624593311,1629730033),(17,'CCTV-6HD','cctv6hd','http://39.135.36.75/PLTV/77777777/224/3221226644/index.m3u8',NULL,1624593334,1629730043),(18,'CCTV-7HD','cctv7hd','http://39.135.138.58:18890/PLTV/88888888/224/3221225624/index.m3u8',NULL,1624593348,1629730052),(19,'CCTV-8HD','cctv8hd','http://39.134.65.175/PLTV/88888888/224/3221225795/index.m3u8',NULL,1626072790,1629730061),(20,'CCTV-9HD','cctv9hd','http://39.134.65.162/PLTV/88888888/224/3221225676/index.m3u8',NULL,1628492901,1629730071),(21,'CCTV-10HD','cctv10hd','http://39.134.65.162/PLTV/88888888/224/3221225677/index.m3u8',NULL,1628492953,1629730084),(22,'CCTV-11','cctv11','http://39.134.65.162/PLTV/88888888/224/3221225517/index.m3u8',NULL,1628493187,1629730092),(23,'CCTV-12HD','cctv12hd','http://39.134.65.162/PLTV/88888888/224/3221225669/index.m3u8',NULL,1628493289,1629730101),(24,'CCTV-13','cctv13','http://39.135.138.58:18890/PLTV/88888888/224/3221225638/index.m3u8',NULL,1628493924,1629730109),(25,'CCTV-14','cctv14','http://39.134.65.162/PLTV/88888888/224/3221225674/index.m3u8',NULL,1629730142,1629730142),(26,'浙江卫视','zjtv','http://39.135.138.58:18890/PLTV/88888888/224/3221225703/index.m3u8',NULL,1629730167,1629730167),(27,'江苏卫视','jstv','http://39.135.138.58:18890/PLTV/88888888/224/3221225702/index.m3u8',NULL,1629730185,1629730185),(28,'东方卫视','dftv','http://39.134.65.162/PLTV/88888888/224/3221225672/index.m3u8',NULL,1629730205,1629730205),(29,'安徽卫视','ahhd','http://39.135.138.58:18890/PLTV/88888888/224/3221225691/index.m3u8',NULL,1629730223,1629875177),(30,'北京卫视','btv1','http://39.134.65.175/PLTV/88888888/224/3221225678/index.m3u8',NULL,1629730252,1629875211),(31,'深圳卫视','sztv','http://39.135.36.66/PLTV/77777777/224/3221226664/index.m3u8',NULL,1629730275,1629730275),(32,'重庆卫视','cqtv','http://39.135.36.59/PLTV/77777777/224/3221226650/index.m3u8',NULL,1629730298,1629730298),(33,'湖南卫视','hnhd','http://39.134.115.163:8080/PLTV/88888910/224/3221225704/index.m3u8',NULL,1629730313,1629875256),(34,'东南卫视','dntv','http://39.134.39.28/PLTV/88888888/224/3221226182/index.m3u8',NULL,1629730335,1629730335),(35,'广东卫视','gdhd','http://39.135.138.58:18890/PLTV/88888888/224/3221225701/index.m3u8',NULL,1629875318,1629875318),(36,'广西卫视','gxtv','http://39.135.138.58:18890/PLTV/88888888/224/3221225731/index.m3u8',NULL,1629875346,1629875346),(37,'甘肃卫视','gstv','http://mgws.live.miguvideo.com:8088/envivo_v/2018/SD/gansu/1000/index.m3u8',NULL,1629875373,1629875373),(38,'贵州卫视','gztv','http://xs3.csxxsj.cn:8082/live/gzws-800k.m3u8?timestamp=20210823102930&encrypt=55b27deffcd9a4a2218c0f41578e51a5',NULL,1629875438,1629875438),(39,'河北卫视','hbtv','http://live2.plus.hebtv.com/hbwsx/hd/live.m3u8',NULL,1629875465,1629875465),(40,'河南卫视','hnhd1','http://39.135.36.31/PLTV/77777777/224/3221226800/index.m3u8',NULL,1629875510,1629875510),(41,'黑龙江卫视','hljtv','http://39.134.39.34/PLTV/88888888/224/3221226142/index.m3u8',NULL,1629875543,1629875543),(42,'湖北卫视','hubeitv','http://39.135.138.58:18890/PLTV/88888888/224/3221225699/index.m3u8',NULL,1629875590,1629875590),(43,'吉林卫视','jlhd','http://39.135.138.58:18890/PLTV/88888888/224/3221225680/index.m3u8',NULL,1629875617,1629875617),(44,'江西卫视','jiangxitv','http://39.135.138.58:18890/PLTV/88888888/224/3221225705/index.m3u8',NULL,1629875634,1629875634),(45,'辽宁卫视','lnws','http://xs3.csxxsj.cn:8082/live/lnws-800k.m3u8?timestamp=20210823103702&encrypt=e14258bcef2a0c28a752c4517b5411dc',NULL,1629875660,1629875660),(46,'海南卫视','hainantv','http://stream1.hnntv.cn/lywsgq/sd/live.m3u8?_upt=8d37473e1629693395',NULL,1629875683,1629875683),(47,'内蒙古卫视','nmgtv','http://live.m2oplus.nmtv.cn/1/playlist.m3u8?_upt=2bbf59921629693405',NULL,1629875706,1629875706),(48,'宁夏卫视','nxtv','http://39.135.138.58:18890/PLTV/88888888/224/3221225726/index.m3u8',NULL,1629875728,1629875728),(49,'青海卫视','qinghaitv','http://39.135.138.58:18890/PLTV/88888888/224/3221225727/index.m3u8',NULL,1629875749,1629875749),(50,'山东卫视','shangdongtv','http://39.135.138.58:18890/PLTV/88888888/224/3221225697/index.m3u8',NULL,1629875765,1629875765),(51,'陕西卫视','shanxitv','http://cg01.hrtn.net:9090/live/shxws_400.m3u8',NULL,1629875781,1629875781),(52,'山西卫视','shangxtv','http://39.134.65.162/PLTV/88888888/224/3221225496/index.m3u8',NULL,1629875807,1629875807),(53,'四川卫视','sichuantv','http://39.135.36.62/PLTV/77777777/224/3221226604/index.m3u8',NULL,1629875846,1629875846),(54,'天津卫视','tianjintv','http://39.134.39.25/PLTV/88888888/224/3221226191/index.m3u8',NULL,1629875875,1629875875),(55,'西藏卫视','xizangtv','http://39.135.138.58:18890/PLTV/88888888/224/3221225723/index.m3u8',NULL,1629876645,1629876645),(56,'厦门卫视','xiamentv','http://223.110.245.159/ott.js.chinamobile.com/PLTV/3/224/3221226996/index.m3u8',NULL,1629876661,1629876661),(57,'新疆卫视','xinjtv','http://223.110.243.200/PLTV/3/224/3221227627/index.m3u8?servicetype=1&icpid=88888888&from=1&hms_devid=123',NULL,1629876679,1629876679),(58,'云南卫视','yunnantv','http://tvlive.ynradio.com/live/yunnanweishi/playlist.m3u8',NULL,1629876698,1629876698);
/*!40000 ALTER TABLE `live_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `created_at` int(32) NOT NULL COMMENT '创建时间',
  `updated_at` int(32) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=',1624527803,1624527803);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-21 15:21:32
