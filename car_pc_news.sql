/*
Navicat MySQL Data Transfer

Source Server         : OA
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : g_car4

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-17 10:34:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for car_pc_news
-- ----------------------------
DROP TABLE IF EXISTS `car_pc_news`;
CREATE TABLE `car_pc_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titles` varchar(150) CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '标题说明',
  `new_photo` text CHARACTER SET utf8 NOT NULL COMMENT '新闻图url',
  `new_content` text CHARACTER SET utf8 NOT NULL COMMENT 'new跳转内容',
  `new_type` int(11) NOT NULL DEFAULT '0' COMMENT '归属，0 预留空，1、公司新闻2行业新闻，3-媒体报道，4-特色活动,5-新车资讯 -其他预留',
  `new_edit` text CHARACTER SET utf8 NOT NULL COMMENT '编辑器内容',
  `popular` int(8) NOT NULL DEFAULT '0' COMMENT '浏览记录',
  `sort` int(5) NOT NULL DEFAULT '0' COMMENT '排序，值越大越靠前',
  `is_show` tinyint(1) NOT NULL DEFAULT '3' COMMENT '1上线 2下线 3待审核 4审核通过待上线 5审核拒绝',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间 添加和修改都更新这个时间',
  `is_del` tinyint(1) NOT NULL COMMENT '是否删除0正常1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='news新闻表';
