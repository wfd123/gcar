/*
Navicat MySQL Data Transfer

Source Server         : OA
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : g_car4

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-01 16:46:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user_shop
-- ----------------------------
DROP TABLE IF EXISTS `user_shop`;
CREATE TABLE `user_shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店铺id',
  `user_id` int(11) NOT NULL,
  `shop_name` varchar(255) DEFAULT '' COMMENT '店铺名称',
  `qid` int(11) NOT NULL COMMENT '1,新车2,二手车',
  `mimg` varchar(255) NOT NULL COMMENT '门头照片',
  `yimg` varchar(255) NOT NULL COMMENT '营业执照图片',
  `shop_phone` varchar(20) DEFAULT '' COMMENT '店铺电话',
  `shop_address` varchar(255) DEFAULT '' COMMENT '店铺地址',
  `latitude` varchar(255) NOT NULL COMMENT '店铺纬度',
  `longitude` varchar(255) NOT NULL COMMENT '店铺经度',
  `shop_desc` text COMMENT '店铺详情',
  `frname` varchar(255) NOT NULL COMMENT '法人名称',
  `frphone` varchar(255) NOT NULL COMMENT '法人电话',
  `status` tinyint(2) NOT NULL COMMENT '店铺状态',
  `open_time` varchar(100) NOT NULL DEFAULT '9:00 - 18:00',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `is_tj` tinyint(2) NOT NULL DEFAULT '2' COMMENT '1推荐2为未推荐',
  `is_yx` tinyint(2) NOT NULL DEFAULT '2' COMMENT '1优选2为非优选',
  `city_id` int(11) DEFAULT NULL COMMENT '城市的id',
  `business_range` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '经营范围',
  `startTiem` varchar(30) NOT NULL DEFAULT '0' COMMENT '营业时间早',
  `endTiem` varchar(30) NOT NULL COMMENT '营业时间晚',
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='商家店铺';
