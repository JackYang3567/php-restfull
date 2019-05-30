# Host: localhost  (Version: 5.5.53)
# Date: 2019-05-30 17:21:12
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "lottery"
#

DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键彩票id',
  `type_id` int(11) DEFAULT NULL COMMENT 'lottery_type_Id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '彩票名',
  `code` varchar(50) NOT NULL DEFAULT '' COMMENT '彩票编码',
  `remarks` varchar(500) DEFAULT '' COMMENT '彩票备注',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`name`,`code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='彩票种类';

#
# Data for table "lottery"
#

INSERT INTO `lottery` VALUES (1,4,'江苏快三','jsks','快三类'),(2,4,'安徽快三','ahks','快三类'),(3,4,'天津快三','tjks','天津快三'),(4,4,'河北快三','hebks','快三类'),(5,4,'广西快三','gxks','快三类'),(6,9,'江苏快三','jsssc','时时彩类'),(7,9,'极速时时彩','jisussc','时时彩类'),(8,9,'极速赛车','jisuscssc','时时彩类'),(9,7,'北京28','bj28',' 北京28'),(10,7,'加拿大28','jnd28','加拿大28'),(11,7,'丹麦28','dm28',' 丹麦28');
