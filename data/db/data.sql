-- 管理员admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id`INT(11) NOT NULL AUTO_INCREMENT COMMENT '主键管理id',
  `name` VARCHAR(100) NOT  NULL DEFAULT '' COMMENT '管理名称',  
  `email` varchar(50) NULL COMMENT '管理邮箱',  
  `phone` varchar(15)  NULL DEFAULT '0' COMMENT '管理手机号',  
  `qq_number` varchar(20) NOT NULL DEFAULT '' COMMENT '管理QQ号',
  `pass` varchar(20) NOT NULL DEFAULT '' COMMENT '管理登录密码', 
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '管理注册时间', 
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`name`,`email`,`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='管理员admin';

INSERT INTO  `admin` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('admin','admin@163.com','13808013567','234124124','adB7pxYp9csJQ');


-- 会员member
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `Id`INT(11) NOT NULL AUTO_INCREMENT COMMENT '主键会员id',
  `name` VARCHAR(100) NOT  NULL DEFAULT '' COMMENT '会员名称',  
  `email` varchar(50) NULL COMMENT '会员邮箱',  
  `phone` varchar(15)  NULL DEFAULT '0' COMMENT '会员手机号',  
  `qq_number` varchar(20) NOT NULL DEFAULT '' COMMENT '会员QQ号',
  `pass` varchar(20) NOT NULL DEFAULT '' COMMENT '会员登录密码', 
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '会员注册时间', 
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`name`,`email`,`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='会员member';


-- 充值recharge
DROP TABLE IF EXISTS `recharge`;
CREATE TABLE `recharge` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键recharge id',
  `member_id` int(11)  NULL  COMMENT '会员id',  
  `amount` decimal(8,2)  NULL DEFAULT '0' COMMENT '变动金额',  
  `balance` decimal(8,2)  NULL DEFAULT '0' COMMENT '变动后余额',   
  `udated_time` timestamp NULL DEFAULT NULL  COMMENT '变动时间',
  `remarks` VARCHAR(500)   NULL DEFAULT '' COMMENT '备注',
  `examine`  int(11)  NULL DEFAULT 0 COMMENT '充值到账审核',
  PRIMARY KEY (`Id`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='充值recharge';

-- 登录日志sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键登录id',
  `name` VARCHAR(100) NOT  NULL DEFAULT '' COMMENT '登录人员名称', 
  `uuid`     VARCHAR(50)  NOT NULL DEFAULT '' COMMENT 'uuid',
  `email`    VARCHAR(500)  NOT NULL DEFAULT '' COMMENT 'email',
  `member_id` int(11)  NULL  COMMENT '会员id',  
  `admin_id`  int(11)  NULL COMMENT '管理员id',  
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登录时间', 
   PRIMARY KEY (`Id`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='登录日志sessions';


-- 彩票种类
DROP TABLE IF EXISTS `lottery_type`;
CREATE TABLE `lottery_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键彩票种类id',
  `name` bigint(1) NOT NULL DEFAULT '0' COMMENT '彩票种类名',
  `code` varchar(50) NOT NULL DEFAULT '0' COMMENT '彩票种类编码', 
  PRIMARY KEY (`Id`) ,
  UNIQUE KEY `name` (`name`,`code`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='彩票种类';


-- 访问api的token
DROP TABLE IF EXISTS `access_token`;
CREATE TABLE `access_token` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键token Id',
  `token`  varchar(50) NOT NULL DEFAULT '' COMMENT 'token字符串', 
  `genre` bigint(1) NOT NULL DEFAULT '0' COMMENT 'token分类0:免费试用 1:付费',  
  `term`  int(11) NOT NULL DEFAULT 1 COMMENT '购买时长 单位月', 
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'token生成时间',
  `expire_at` timestamp  NULL COMMENT 'token到期时间', 
  PRIMARY KEY (`Id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='试用token';









