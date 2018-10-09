/*
Navicat MySQL Data Transfer

Source Server         : hdm191601397
Source Server Version : 50173
Source Host           : hdm191601397.my3w.com:3306
Source Database       : hdm191601397_db

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2018-10-09 21:07:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pre_xunren_user
-- ----------------------------
DROP TABLE IF EXISTS `pre_xunren_user`;
CREATE TABLE `pre_xunren_user` (
  `xid` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) DEFAULT NULL,
  `xname` varchar(100) NOT NULL,
  `xdate` varchar(100) DEFAULT NULL,
  `xserver` varchar(100) DEFAULT NULL,
  `xuser` varchar(100) DEFAULT NULL,
  `xgroup` varchar(100) DEFAULT NULL,
  `xfriend` varchar(100) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `xtext` text,
  PRIMARY KEY (`xid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=gbk;
