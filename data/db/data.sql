-- ======== 创建数据库 ========
DROP DATABASE IF EXISTS `work_caiji`; 
CREATE DATABASE IF NOT EXISTS `work_caiji` CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'; 

-- ======== 创建数据表 ========
-- 采集彩票数据记录表
DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `expect` bigint(1) NOT NULL DEFAULT '0',
  `code` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `expect` (`expect`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=7083 DEFAULT CHARSET=utf8 COMMENT='彩票数据表';

-- ======== 系统基本数据表 ======
-- 管理员admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id`INT(11) NOT NULL AUTO_INCREMENT COMMENT '主键管理id',
  `name` VARCHAR(100) NOT  NULL DEFAULT '' COMMENT '管理名称',  
  `email` varchar(50) NULL COMMENT '管理邮箱',  
  `phone` varchar(15)  NULL DEFAULT '0' COMMENT '管理手机号',  
  `qq_number` varchar(20) NOT NULL DEFAULT '' COMMENT '管理QQ号',
  `pass` varchar(32) NOT NULL DEFAULT '' COMMENT '管理登录密码', 
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
  `gender` bigint(1)  NOT NULL DEFAULT 0  COMMENT '性别0:女，1:男',
  `email` varchar(50) NULL COMMENT '会员邮箱',  
  `phone` varchar(15)  NULL DEFAULT '0' COMMENT '会员手机号',  
  `qq_number` varchar(20) NOT NULL DEFAULT '' COMMENT '会员QQ号',
  `pass` varchar(32) NOT NULL DEFAULT '' COMMENT '会员登录密码', 
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '会员注册时间', 
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`name`,`email`,`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='会员member';
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('jack123','jack123@163.com','13908013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('tomson123','tomson123@163.com','13908013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('jonhand','jonhand@163.com','13708013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('test123','test123@163.com','13608013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('janaili','janaili@163.com','13508013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('pierson','pierson@163.com','13408013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('jonjianc','jonjianc@163.com','13308013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('obamatee','obamatee@163.com','13008013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('milkjosn','milkjosn@163.com','13908013561','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('geenton','geenton@163.com','13908013562','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('beyoungeen','beyoungeen@163.com','13908013563','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('misherkate','misherkate@163.com','13908013564','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('mikeytomin','mikeytomin@163.com','13908013565','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('niketong','niketong@163.com','13908013566','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('fradehan','fradehan@163.com','13908013567','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('babalaha','babalaha@163.com','13508013518','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('lamierha','lamierha@163.com','13908013528','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('aisonhau','aisonhau@163.com','13508013538','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('amajson','amajson@163.com','13508013548','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('ajaxbill','ajaxbill@163.com','13508013558','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('billtont','billtont@163.com','13508013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('bottent','bottent@163.com','13908013578','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('shootbang','shootbang@163.com','13908013588','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('shehandle','shehandle@163.com','13508013598','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('larlli','larlli@163.com','13908013508','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('tccwong','tccwong@163.com','13908013968','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('itoyokado','itoyokado@163.com','13908013668','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('tjaxbill','tjaxbill@163.com','13508013558','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('willtont','willtont@163.com','13508013568','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('xottent','xottent@163.com','13908013578','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('zhootbang','zhootbang@163.com','13908013588','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('vhehandle','vhehandle@163.com','13508013598','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('marlli','marlli@163.com','13908013508','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('tncwong','tncwong@163.com','13908013968','234124124','MerDkA.pv1Bvk');
INSERT INTO  `member` (`name`,`email`,`phone`,`qq_number`,`pass`) VALUES ('ritoyokado','ritoyokado@163.com','13908013668','234124124','MerDkA.pv1Bvk');

-- 支付payment
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键payment id',
  `member_id` int(11)  NULL  COMMENT '会员id', 
  `method` bigint(1)  NULL  COMMENT '支付方式1:支付宝,2:微信支付,3:微信支付官方,4:QQ钱包支付,5:QQ钱包支付官方',  
  `amount` decimal(8,2)  NULL DEFAULT '0' COMMENT '支付金额1:50,2:100,3:135:', 
  `payer` varchar(50) NOT NULL DEFAULT '0' COMMENT '付款人姓名',
  `time`  timestamp NULL DEFAULT NULL COMMENT '付款时间',  
  `account`varchar(50)  NULL DEFAULT '0' COMMENT '付款账号后4位',  
  `notes` VARCHAR(500)   NULL DEFAULT '' COMMENT '付款备注',
  `examine`  int(11)  NULL DEFAULT 0 COMMENT '付款到账审核1:到账后手动添加余额',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '支付时间',
  PRIMARY KEY (`Id`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='支付payment';

-- 支付方式
DROP TABLE IF EXISTS `paymethod`;
CREATE TABLE `paymethod` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键paymethod id',
  `name` varchar(50) NOT NULL DEFAULT '0' COMMENT '支付方式名，支付方式1:支付宝,2:微信支付,3:微信支付官方,4:QQ钱包支付,5:QQ钱包支付官方',
  `code` varchar(50)   NULL  COMMENT '支付方式英文名', 
  `icon_path` VARCHAR(500)   NULL DEFAULT '' COMMENT '支付方式图标路径',
  `notes` VARCHAR(500) NOT  NULL DEFAULT '' COMMENT '支付方式备注', 
  `status` bigint(1) NOT NULL DEFAULT '0' COMMENT '0:禁用 1:启用', 
  `sortId` int(11) NOT NULL COMMENT '排序', 
  PRIMARY KEY (`Id`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='支付方式名paymethod';
INSERT INTO  `paymethod` (`name`,`code`,`icon_path`,`sortId`) VALUES ('支付宝','alipay','Ali_QrCode.png','1');
INSERT INTO  `paymethod` (`name`,`code`,`icon_path`,`sortId`) VALUES ('微信','Weixin','Weixin_QrCode.png','2');
INSERT INTO  `paymethod` (`name`,`code`,`icon_path`,`sortId`) VALUES ('微信官方','Weixin_gf','Weixin_QrCode_gf.png','3');
INSERT INTO  `paymethod` (`name`,`code`,`icon_path`,`sortId`) VALUES ('QQ钱包','QQwallet','QQwallet_QrCode.png','4');
INSERT INTO  `paymethod` (`name`,`code`,`icon_path`,`sortId`) VALUES ('QQ钱包官方','QQwallet_gf','QQwallet_gf_QrCode.png','5');

-- 支付金额设置
DROP TABLE IF EXISTS `payamount`;
CREATE TABLE `payamount` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键payamount id',
  `amount_val` int(11)  NULL DEFAULT '0' COMMENT '金额预设值',
  `sortId` int(11) NOT NULL COMMENT '排序', 
  PRIMARY KEY (`Id`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='支付方式名payamount';
INSERT INTO  `payamount` (`amount_val`,`sortId`) VALUES (50,1);
INSERT INTO  `payamount` (`amount_val`,`sortId`) VALUES (100,2);
INSERT INTO  `payamount` (`amount_val`,`sortId`) VALUES (150,3);
INSERT INTO  `payamount` (`amount_val`,`sortId`) VALUES (200,4);
INSERT INTO  `payamount` (`amount_val`,`sortId`) VALUES (500,5);

--  ================
-- IP白名单white_list
DROP TABLE IF EXISTS `white_list`;
CREATE TABLE `white_list` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键recharge id',
  `member_id` int(11)  NULL  COMMENT '会员id', 
  `token_id` int(11)  NULL  COMMENT '表access_token的Id',  
  `ip` varchar(50)  NULL DEFAULT '0' COMMENT 'ip白名单', 
  `status` bigint(1) NOT NULL DEFAULT '0' COMMENT '0:未绑定 1:已绑定', 
  `examine`  int(11)  NULL DEFAULT 0 COMMENT '充值到账审核1:到账通过', 
   PRIMARY KEY (`Id`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='白名单white_list';


-- 充值recharge
DROP TABLE IF EXISTS `recharge`;
CREATE TABLE `recharge` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键recharge id',
  `token_id` int(11)  NULL  COMMENT '表access_token的Id',  
  `amount` decimal(8,2)  NULL DEFAULT '0' COMMENT '变动金额', 
  `purchase_month` int(11) NOT NULL DEFAULT '0' COMMENT '购买时长,单位月',
  `code` varchar(50) NOT NULL DEFAULT '0' COMMENT '充值彩票的编码',  -- 与表lottery中字段`code`
  `balance` decimal(8,2)  NULL DEFAULT '0' COMMENT '变动后余额',  
  `remarks` VARCHAR(500)   NULL DEFAULT '' COMMENT '备注',
  `examine`  int(11)  NULL DEFAULT 0 COMMENT '充值到账审核1:到账通过', -- 到账审核通过时在表access_token中生成为member_id成唯一uuid作为token(access_token表的字段)
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '充值时间',
  `udated_time` timestamp NULL DEFAULT NULL  COMMENT '变动时间',
  `expire_at` timestamp  NULL COMMENT '购买时长到期时间', 
  PRIMARY KEY (`Id`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='充值recharge';


-- 访问api的token
DROP TABLE IF EXISTS `access_token`;
CREATE TABLE `access_token` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键token Id',
  `member_id` int(11)  NULL  COMMENT '会员id', 
  `token`  varchar(50) NOT NULL DEFAULT '' COMMENT 'token字符串', 
  `opened` bigint(1) NOT NULL DEFAULT '0' COMMENT '0:未开通API禁用 1:开通API可用',
  `is_auth` bigint(1) NOT NULL DEFAULT '0' COMMENT '0:未授权接口 1:授权接口',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'token生成时间',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='试用token';


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

-- 
-- 彩票种类
DROP TABLE IF EXISTS `lottery_type`;
CREATE TABLE `lottery_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键彩票种类id',
  `type_name` varchar(50) NULL COMMENT '彩票种类名',
  `type_code` varchar(50)  NULL  COMMENT '彩票种类编码', 
  `remarks` VARCHAR(500)   NULL  COMMENT '彩票种类备注',
  PRIMARY KEY (`Id`) ,
  UNIQUE KEY `type_name` (`type_name`,`type_code`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='彩票种类';
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('高频彩类','gpc','高频彩类');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('低频彩类','dpc','低频彩类');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('十一选五类','syxw','十一选五类');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('快三类','ks','快三类');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('快乐十分/农场类','klsf','快乐十分/农场类');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('六合彩类','lhc','六合彩类');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('28类','lottery28','28类');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('极速彩种','jisu','极速彩种');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('时时彩类','ssc','时时彩类');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('境外彩种','abroad','境外彩种');
INSERT INTO  `lottery_type` (`type_name`,`type_code`,`remarks`) VALUES ('其他类','other','其他类');

-- 彩票种类
DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键彩票id',
  `type_id` int(11)  NULL  COMMENT 'lottery_type_Id',  
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '彩票名',
  `code` varchar(50) NOT NULL DEFAULT '' COMMENT '彩票编码', 
  `remarks` VARCHAR(500)   NULL DEFAULT '' COMMENT '彩票备注',
  PRIMARY KEY (`Id`) ,
  UNIQUE KEY `name` (`name`,`code`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='彩票种类';
INSERT INTO  `lottery` (`type_id`,`name`,`code`,`remarks`)  VALUES (4,'江苏快三','jsks','快三类');
INSERT INTO  `lottery` (`type_id`,`name`,`code`,`remarks`)  VALUES (4,'安徽快三','ahks','快三类');
INSERT INTO  `lottery` (`type_id`,`name`,`code`,`remarks`)  VALUES (4,'湖北快三','hbks','快三类');
INSERT INTO  `lottery` (`type_id`,`name`,`code`,`remarks`)  VALUES (4,'河北快三','hebks','快三类');
INSERT INTO  `lottery` (`type_id`,`name`,`code`,`remarks`)  VALUES (4,'广西快三','gxks','快三类');
INSERT INTO  `lottery` (`type_id`,`name`,`code`,`remarks`)  VALUES (9,'江苏快三','jsssc','时时彩类');
INSERT INTO  `lottery` (`type_id`,`name`,`code`,`remarks`)  VALUES (9,'极速时时彩','jisussc','时时彩类');
INSERT INTO  `lottery` (`type_id`,`name`,`code`,`remarks`)  VALUES (9,'极速赛车','jisuscssc','时时彩类');


-- 彩票API价格表
DROP TABLE IF EXISTS `prices`;
CREATE TABLE `prices` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键价格id',
  `lottery_id` int(11)  NULL  COMMENT 'lottery表Id',  
  `month` int(11) NOT NULL DEFAULT 0 COMMENT '价格级别0:会员(月付)',
  `season` int(11) NOT NULL DEFAULT 0 COMMENT '价格级别1:金牌会员(季付)',
  `halfyear` int(11) NOT NULL DEFAULT 0 COMMENT '价格级别2：白金会员(半年付)',
  `year` int(11) NOT NULL DEFAULT 0 COMMENT '价格级别3：钻石会员(年付)',
  `threeyear` int(11) NOT NULL DEFAULT 0 COMMENT '价格级别4：金钻会员(3年付)',
  `remarks` VARCHAR(500)   NULL DEFAULT '' COMMENT '彩票备注',
  PRIMARY KEY (`Id`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='价格表';
INSERT INTO  `prices` (`lottery_id`,`month`,`season`,`halfyear`,`year`,`threeyear`,`remarks`)  VALUES (1,20,55,100,190,550,'江苏快三');
INSERT INTO  `prices` (`lottery_id`,`month`,`season`,`halfyear`,`year`,`threeyear`,`remarks`)  VALUES (2,30,55,100,190,550,'安徽快三');

-- 视图
DROP VIEW IF EXISTS `view_auth_token_api` ;
CREATE VIEW `view_auth_token_api` AS 
 select r.token_id,r.amount,r.purchase_month, r.code,l.name,
  r.balance, r.examine,r.created_at,r.udated_time, 
  r.expire_at, a.token ,a.opened
 from recharge r left join access_token a  on a.Id = r.token_id  
 left join lottery l on r.code= l.code
 -- where a.pened = 1 && unix_timestamp(NOW()) < unix_timestamp(`r.expire_at`) 








