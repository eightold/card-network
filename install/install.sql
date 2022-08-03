SET FOREIGN_KEY_CHECKS=0;
DROP TABLE if EXISTS `if_config`;
CREATE TABLE `if_config` (
  `if_k` varchar(255) NOT NULL DEFAULT '',
  `if_v` text,
  PRIMARY KEY (`if_k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `if_config` VALUES ('title', '宜信自动发卡平台');
INSERT INTO `if_config` VALUES ('keywords', '宜信自动发卡平台');
INSERT INTO `if_config` VALUES ('description', '宜信益付官网：http://pay.xyctc.top/zf/ QQ群：720867010');
INSERT INTO `if_config` VALUES ('zzqq', '844441998');
INSERT INTO `if_config` VALUES ('notice2', '付款后按提示点击确定跳转到提取页面，不可提前关闭窗口！否则无法提取到卡密！');
INSERT INTO `if_config` VALUES ('notice3', '提取码是订单编号 或者 您的联系方式！');
INSERT INTO `if_config` VALUES ('notice1', '提取卡密后请尽快激活使用或保存好，系统定期清除被提取的卡密');
INSERT INTO `if_config` VALUES ('foot', '宜信发卡网');
INSERT INTO `if_config` VALUES ('dd_notice', '1.联系方式也可以作为你的提卡凭证<br>2.必须等待付款完成自动跳转，不可提前关闭页面，否则会导致订单失效，后果自负');
INSERT INTO `if_config` VALUES ('admin', 'admin');
INSERT INTO `if_config` VALUES ('pwd', 'f3b4e3b975e0484835e90514f8318e61');
INSERT INTO `if_config` VALUES ('web_url', 'localhost');
INSERT INTO `if_config` VALUES ('paiapi', '1');
INSERT INTO `if_config` VALUES ('xq_id', '');
INSERT INTO `if_config` VALUES ('xq_key', '');
INSERT INTO `if_config` VALUES ('showKc', '1');
INSERT INTO `if_config` VALUES ('CC_Defender', '2');
INSERT INTO `if_config` VALUES ('txprotect', '1');
INSERT INTO `if_config` VALUES ('qqtz', '1');
DROP TABLE if EXISTS `if_goods`;
CREATE TABLE `if_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gName` varchar(255) DEFAULT NULL,
  `gInfo` text,
  `imgs` varchar(110) DEFAULT NULL,
  `tpId` int(11) NOT NULL COMMENT 'Ã¦â€°â‚¬Ã¥Â±Å¾Ã¥Ë†â€ Ã§Â±Â»',
  `price` float DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `sotr` int(4) DEFAULT '1',
  `sales` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE if EXISTS `if_km`;
CREATE TABLE `if_km` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `km` varchar(100) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `rel` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE if EXISTS `if_order`;
CREATE TABLE `if_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `rel` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `sta` int(11) DEFAULT '0',
  `sendE` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE if EXISTS `if_type`;
CREATE TABLE `if_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tName` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;