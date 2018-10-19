/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : ultrax

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2018-10-19 17:24:19
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `pre_xunren_comment`
-- ----------------------------
DROP TABLE IF EXISTS `pre_xunren_comment`;
CREATE TABLE `pre_xunren_comment` (
  `cid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `xid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `idtype` (`xid`,`dateline`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of pre_xunren_comment
-- ----------------------------
INSERT INTO `pre_xunren_comment` VALUES ('1', '1', 'admin', '1', '1539930521', '0', '111');
INSERT INTO `pre_xunren_comment` VALUES ('2', '1', 'admin', '1', '1539930535', '0', '333');
INSERT INTO `pre_xunren_comment` VALUES ('3', '1', 'admin', '11', '1539938311', '0', '111');
INSERT INTO `pre_xunren_comment` VALUES ('4', '1', 'admin', '11', '1539938385', '0', '333');
INSERT INTO `pre_xunren_comment` VALUES ('5', '1', 'admin', '11', '1539938550', '0', '333');
INSERT INTO `pre_xunren_comment` VALUES ('6', '1', 'admin', '11', '1539938627', '0', '111');
INSERT INTO `pre_xunren_comment` VALUES ('7', '1', 'admin', '11', '1539938631', '0', '33');
INSERT INTO `pre_xunren_comment` VALUES ('8', '1', 'admin', '11', '1539938639', '0', '111');
INSERT INTO `pre_xunren_comment` VALUES ('9', '1', 'admin', '17', '1539938651', '0', '33');
INSERT INTO `pre_xunren_comment` VALUES ('10', '1', 'admin', '17', '1539938682', '0', '1123');
INSERT INTO `pre_xunren_comment` VALUES ('11', '1', 'admin', '17', '1539938695', '0', '\\\'\\\'\\\'\\\'');
INSERT INTO `pre_xunren_comment` VALUES ('12', '1', 'admin', '11', '1539940801', '0', '5555');
INSERT INTO `pre_xunren_comment` VALUES ('13', '1', 'admin', '11', '1539940810', '0', '5555');
INSERT INTO `pre_xunren_comment` VALUES ('14', '1', 'admin', '11', '1539940814', '0', '666');
INSERT INTO `pre_xunren_comment` VALUES ('15', '1', 'admin', '11', '1539940818', '0', '666');
INSERT INTO `pre_xunren_comment` VALUES ('16', '1', 'admin', '11', '1539940911', '0', '77');
INSERT INTO `pre_xunren_comment` VALUES ('17', '1', 'admin', '11', '1539940938', '0', '888');
INSERT INTO `pre_xunren_comment` VALUES ('18', '1', 'admin', '11', '1539940993', '0', 'fffff');
