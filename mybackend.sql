/*
 Navicat MySQL Data Transfer

 Source Server         : 10.117.17.216-公网ip访问
 Source Server Type    : MySQL
 Source Server Version : 50546
 Source Host           : 121.43.119.235
 Source Database       : jrgame

 Target Server Type    : MySQL
 Target Server Version : 50546
 File Encoding         : utf-8

 Date: 09/27/2016 11:06:34 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `jr_admin`
-- ----------------------------
DROP TABLE IF EXISTS `jr_admin`;
CREATE TABLE `jr_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态默认为 1 正常 2 禁用',
  `name` varchar(32) NOT NULL COMMENT '后台用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` varchar(32) DEFAULT NULL COMMENT '后台用户email',
  `is_manager` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1 为管理员 2 为普通用户',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(32) DEFAULT NULL COMMENT '最后登录ip',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  `c_time` datetime NOT NULL COMMENT '创建时间',
  `u_time` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台用户表';

-- ----------------------------
--  Records of `jr_admin`
-- ----------------------------
BEGIN;
INSERT INTO `jr_admin` VALUES ('1', '1', 'root', 'cf3a43c08e6ae35314147d7d987e0f5e', '', '0', null, null, '', '2016-09-19 10:01:49', '2016-09-19 10:01:52'), ('2', '1', 'roots', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@1234.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-21 18:02:50'), ('4', '1', '729', '98b376fb52c29ed458b144a76be56eec', '729@usfund.com.cn1', '2', null, null, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('20', '1', '1543', '98b376fb52c29ed458b144a76be56eec', '1543@test.com', '2', null, null, '1543', '2016-09-19 17:17:36', '2016-09-19 17:17:36'), ('21', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('22', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('23', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('24', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('25', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('26', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('27', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('28', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('29', '1', 'roots1', 'cf3a43c08e6ae35314147d7d987e0f5e', '123@123.com', '1', null, null, '', '0000-00-00 00:00:00', '2016-09-19 17:16:58'), ('30', '1', '739', '6878e823c162f08247b51fdaa8e9897d', '1@1.com', '2', null, null, '', '2016-09-21 18:58:33', '2016-09-21 18:58:33'), ('31', '1', '123', 'a4ad69a6235ee74fc21c95642f0b3e16', '5665@jhkl.com', '1', null, null, '', '2016-09-21 18:58:58', '2016-09-21 19:01:46');
COMMIT;

-- ----------------------------
--  Table structure for `jr_admin_role`
-- ----------------------------
DROP TABLE IF EXISTS `jr_admin_role`;
CREATE TABLE `jr_admin_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL COMMENT 'jr_admin 表 id',
  `role_id` int(11) NOT NULL COMMENT 'jr_role 表 id',
  `c_time` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台用户角色表';

-- ----------------------------
--  Records of `jr_admin_role`
-- ----------------------------
BEGIN;
INSERT INTO `jr_admin_role` VALUES ('8', '3', '22', '2016-09-19 15:04:14'), ('9', '2', '5', '2016-09-19 13:52:13'), ('13', '20', '3', '2016-09-19 13:52:41'), ('14', '20', '5', '2016-09-19 17:23:33'), ('16', '4', '5', '2016-09-20 17:27:50'), ('17', '21', '5', '2016-09-20 17:27:58'), ('18', '30', '6', '2016-09-21 18:59:21');
COMMIT;

-- ----------------------------
--  Table structure for `jr_menu`
-- ----------------------------
DROP TABLE IF EXISTS `jr_menu`;
CREATE TABLE `jr_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 1:显示  2:隐藏',
  `name` varchar(255) NOT NULL COMMENT '菜单名',
  `level` tinyint(4) NOT NULL COMMENT '层级: 1,2,3',
  `pid` int(11) NOT NULL COMMENT '上级菜单id',
  `path` varchar(255) NOT NULL COMMENT '菜单路径',
  `sort` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `icon` varchar(32) DEFAULT NULL COMMENT '菜单图标',
  `c_time` datetime NOT NULL COMMENT '创建时间',
  `u_time` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台菜单表';

-- ----------------------------
--  Records of `jr_menu`
-- ----------------------------
BEGIN;
INSERT INTO `jr_menu` VALUES ('1', '1', '鲸鱼合伙人', '1', '0', 'JinPartner/test', '1', 'fa-users', '2016-09-14 00:36:42', '2016-09-20 09:13:05'), ('23', '1', '合伙人添加', '2', '1', 'xx', '1', '', '2016-09-19 17:26:24', '2016-09-19 17:26:24'), ('24', '1', '信息统计', '2', '1', 'JinPartner/count', '2', '', '2016-09-19 17:27:21', '2016-09-20 00:15:49'), ('25', '1', '条形图', '3', '24', 'xxx', '5', '', '2016-09-19 17:38:47', '2016-09-19 17:38:47'), ('26', '1', '柱状图', '3', '24', 'JinPartner/test', '1', '', '2016-09-19 17:39:09', '2016-09-20 09:06:18'), ('27', '1', '活动2', '1', '0', 'xxx/xxx?a=1', '5', '', '2016-09-19 17:39:28', '2016-09-19 23:54:49'), ('28', '1', 'xxx游戏', '1', '0', 'xxx', '20', '', '2016-09-20 17:26:32', '2016-09-20 17:27:17'), ('29', '1', '156', '1', '0', '15', '10', '', '2016-09-21 19:04:19', '2016-09-21 19:04:32'), ('30', '1', '红包审核', '2', '1', 'JinPartner/redList', '0', '', '2016-09-22 15:05:21', '2016-09-22 16:03:36');
COMMIT;

-- ----------------------------
--  Table structure for `jr_role`
-- ----------------------------
DROP TABLE IF EXISTS `jr_role`;
CREATE TABLE `jr_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '角色名',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  `c_time` datetime NOT NULL COMMENT '创建时间',
  `u_time` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台角色表';

-- ----------------------------
--  Records of `jr_role`
-- ----------------------------
BEGIN;
INSERT INTO `jr_role` VALUES ('3', '123312313', '3213', '2016-09-17 01:35:38', '2016-09-17 01:35:38'), ('5', '鲸鱼合伙人负责人', '！@#！@￥@#E!F&amp;amp;amp;quot;:?;123', '2016-09-17 01:36:13', '2016-09-19 13:55:12'), ('6', '739', '739', '2016-09-21 18:57:44', '2016-09-21 18:57:44');
COMMIT;

-- ----------------------------
--  Table structure for `jr_role_menu`
-- ----------------------------
DROP TABLE IF EXISTS `jr_role_menu`;
CREATE TABLE `jr_role_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT 'jr_role 表 id',
  `menu_id` int(11) NOT NULL COMMENT 'jr_menu 表 id',
  `c_time` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台角色菜单表';

-- ----------------------------
--  Records of `jr_role_menu`
-- ----------------------------
BEGIN;
INSERT INTO `jr_role_menu` VALUES ('72', '3', '1', '2016-09-20 15:05:54'), ('73', '3', '23', '2016-09-20 15:05:54'), ('74', '3', '26', '2016-09-20 15:05:54'), ('75', '3', '25', '2016-09-20 15:05:54'), ('76', '3', '27', '2016-09-20 15:05:54'), ('77', '5', '1', '2016-09-20 17:27:37'), ('78', '5', '23', '2016-09-20 17:27:37'), ('79', '5', '24', '2016-09-20 17:27:37'), ('80', '5', '26', '2016-09-20 17:27:37'), ('81', '5', '25', '2016-09-20 17:27:37'), ('82', '5', '27', '2016-09-20 17:27:37'), ('83', '5', '28', '2016-09-20 17:27:37'), ('84', '6', '1', '2016-09-21 18:58:02'), ('85', '6', '24', '2016-09-21 18:58:02'), ('86', '6', '26', '2016-09-21 18:58:02'), ('87', '6', '25', '2016-09-21 18:58:02');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
