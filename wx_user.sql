/*
Navicat MySQL Data Transfer

Source Server         : OA
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : g_car4

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-02 18:52:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wx_user
-- ----------------------------
DROP TABLE IF EXISTS `wx_user`;
CREATE TABLE `wx_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` char(64) COLLATE utf8_bin NOT NULL COMMENT '用户登录帐号',
  `login_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '昵称',
  `unionid` char(60) COLLATE utf8_bin NOT NULL COMMENT '用户关联的微信公众平台openid',
  `name` tinytext COLLATE utf8_bin NOT NULL COMMENT '用户昵称',
  `sex` tinyint(4) NOT NULL COMMENT '用户性别',
  `photo` tinytext COLLATE utf8_bin NOT NULL COMMENT '用户头像图片存储路径',
  `is_del` int(10) unsigned DEFAULT NULL,
  `puid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;
