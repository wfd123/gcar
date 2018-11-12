/*
Navicat MySQL Data Transfer

Source Server         : OA
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : g_car4

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-17 10:33:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for car_shop_comment
-- ----------------------------
DROP TABLE IF EXISTS `car_shop_comment`;
CREATE TABLE `car_shop_comment` (
  `comment_index` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论自增索引编号',
  `comment_consumer` char(64) COLLATE utf8_bin NOT NULL COMMENT '发表评论的用户唯一id',
  `comment_nickname` varchar(30) COLLATE utf8_bin NOT NULL COMMENT '用户昵称',
  `comment_order_id` int(11) unsigned NOT NULL COMMENT '订单序列号',
  `comment_anonymity` tinyint(1) NOT NULL COMMENT '是否匿名评价',
  `comment_score` tinyint(4) NOT NULL COMMENT '评论星级，1-5颗星，代表不同的满意度',
  `comment_content` text COLLATE utf8_bin NOT NULL COMMENT '评论内容',
  `comment_images` text COLLATE utf8_bin NOT NULL COMMENT '评论图片URL列表',
  `comment_goods_id` bigint(20) NOT NULL COMMENT '评论的商品id',
  `comment_praise` int(11) NOT NULL COMMENT '评论被赞次数',
  `comment_time` int(11) NOT NULL COMMENT '评论发表时间',
  `comment_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0表示未审核，1表示已审核，2审核未通过',
  `sort` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序值1代表置顶0代表按时间',
  `comment_count` tinyint(2) NOT NULL DEFAULT '0' COMMENT '检查是否有新评论',
  PRIMARY KEY (`comment_index`),
  KEY `comment_goods_id` (`comment_goods_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;
