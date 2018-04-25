-- MySQL dump 10.13  Distrib 5.6.26, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: myway
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `dic_test_type`
--

DROP TABLE IF EXISTS `dic_test_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dic_test_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '题目类型ID',
  `type_name` varchar(64) NOT NULL DEFAULT '' COMMENT '题目类型名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='题目类型ID-名称字典表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dic_test_type`
--

LOCK TABLES `dic_test_type` WRITE;
/*!40000 ALTER TABLE `dic_test_type` DISABLE KEYS */;
INSERT INTO `dic_test_type` VALUES (1,1,'语言智能'),(2,2,'逻辑数学智能'),(3,3,'空间智能'),(4,4,'身体动觉智能'),(5,5,'音乐智能'),(6,6,'人际智能'),(7,7,'内省智能'),(8,8,'自然观察智能');
/*!40000 ALTER TABLE `dic_test_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_user_choice_test_results`
--

DROP TABLE IF EXISTS `r_user_choice_test_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_user_choice_test_results` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户表ID',
  `test_id` int(11) unsigned NOT NULL COMMENT '测试题目ID',
  `answer_id` int(11) unsigned NOT NULL COMMENT '测试结果ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户测试结果表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_user_choice_test_results`
--

LOCK TABLES `r_user_choice_test_results` WRITE;
/*!40000 ALTER TABLE `r_user_choice_test_results` DISABLE KEYS */;
INSERT INTO `r_user_choice_test_results` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,4),(4,1,4,4),(5,1,5,2);
/*!40000 ALTER TABLE `r_user_choice_test_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_choice_test`
--

DROP TABLE IF EXISTS `t_choice_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_choice_test` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) unsigned NOT NULL COMMENT '题目编号',
  `class` tinyint(2) NOT NULL DEFAULT '0' COMMENT '题目所属测试类别，1职业价值观测试；2多元智能量表-发现天赋能力测试',
  `type_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '题目类型',
  `desc` text NOT NULL COMMENT '题目描述（内容）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='主观选择测试题目表定义';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_choice_test`
--

LOCK TABLES `t_choice_test` WRITE;
/*!40000 ALTER TABLE `t_choice_test` DISABLE KEYS */;
INSERT INTO `t_choice_test` VALUES (1,1,2,1,'我喜欢看书。'),(2,2,2,1,'我很容易明白别人的指示、谈话内容及其言外之意。'),(3,3,2,1,'我从收音机或录音带比电视或电影可获取更多的资讯。'),(4,1,2,2,'在看或听故事时，我通常会按故事的情节猜想结局，而且猜中率很高。'),(5,2,2,2,'我对科学的新发展很有兴趣。');
/*!40000 ALTER TABLE `t_choice_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_choice_test_answers`
--

DROP TABLE IF EXISTS `t_choice_test_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_choice_test_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) unsigned NOT NULL COMMENT '答案选项编号',
  `class` tinyint(2) NOT NULL DEFAULT '0' COMMENT '题目所属测试类别，1职业价值观测试；2多元智能量表-发现天赋能力测试',
  `desc` varchar(64) NOT NULL DEFAULT '' COMMENT '选项内容',
  `goals` int(11) unsigned NOT NULL COMMENT '选项所占分数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='主观选择测试题答案模板';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_choice_test_answers`
--

LOCK TABLES `t_choice_test_answers` WRITE;
/*!40000 ALTER TABLE `t_choice_test_answers` DISABLE KEYS */;
INSERT INTO `t_choice_test_answers` VALUES (1,1,2,'不同意',0),(2,2,2,'少许同意',2),(3,3,2,'颇为同意',4),(4,4,2,'同意',6);
/*!40000 ALTER TABLE `t_choice_test_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_test`
--

DROP TABLE IF EXISTS `t_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_test` (
  `Fid` int(12) NOT NULL AUTO_INCREMENT,
  `Ftype` varchar(64) NOT NULL DEFAULT '',
  `Fname` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`Fid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_test`
--

LOCK TABLES `t_test` WRITE;
/*!40000 ALTER TABLE `t_test` DISABLE KEYS */;
INSERT INTO `t_test` VALUES (1,'ad','广告'),(2,'beau','美帝'),(3,'type3','3333'),(4,'','4444'),(5,'','9999');
/*!40000 ALTER TABLE `t_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nickName` varchar(64) NOT NULL DEFAULT '' COMMENT '姓名',
  `gender` char(1) NOT NULL DEFAULT '' COMMENT '性别,f表示男性；m表示女性；空表示未知',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日，YYYY-MM-DD类型',
  `zodiac` varchar(64) NOT NULL DEFAULT '' COMMENT '星座',
  `email` varchar(64) NOT NULL DEFAULT '' COMMENT '邮箱',
  `tel` varchar(16) NOT NULL DEFAULT '' COMMENT '电话',
  `university` varchar(64) NOT NULL DEFAULT '' COMMENT '所在学校',
  `major` varchar(64) NOT NULL DEFAULT '' COMMENT '所学专业',
  `characters` varchar(2048) NOT NULL DEFAULT '' COMMENT '性格特点',
  `books` varchar(2048) NOT NULL DEFAULT '' COMMENT '我喜欢的电影',
  `movies` varchar(2048) NOT NULL DEFAULT '' COMMENT '我喜欢的电影',
  `tastes` varchar(2048) NOT NULL DEFAULT '' COMMENT '兴趣爱好',
  `motto` varchar(2048) NOT NULL DEFAULT '' COMMENT '座右铭',
  `goal` varchar(2048) NOT NULL DEFAULT '' COMMENT '人生目标',
  `avaterUrl` varchar(2048) NOT NULL DEFAULT '' COMMENT '自画像可访问的链接',
  `openid` varchar(256) NOT NULL DEFAULT '' COMMENT '微信用户的openid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_user`
--

LOCK TABLES `t_user` WRITE;
/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
INSERT INTO `t_user` VALUES (1,'yabohe\n','m','1991-07-06','处女座\n','he_yabo@126.com','15201812050','东南大学','计算机','随和、谦虚、谨慎','《暗时间》《约翰克里斯多夫》','《春天》','辣辣辣','天道酬勤\n','成为一名大学老师','https://www.baidu.com','123456'),(2,'donlian','m','1990-06-12','处女座\n','donglian@gmail.com','15201812050','','','随和、谦虚、谨慎','《人类简史》','《山河故人》','辣辣辣','啦啦啦','成为一名大学老师','https://www.baidu.com','234567');
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-25 20:19:01
