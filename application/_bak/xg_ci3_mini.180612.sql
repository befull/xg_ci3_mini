/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : xg_ci3_mini

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2018-06-12 21:00:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xg_art
-- ----------------------------
DROP TABLE IF EXISTS `xg_art`;
CREATE TABLE `xg_art` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xg_art
-- ----------------------------
INSERT INTO `xg_art` VALUES ('1', 'aaa', 'a', null);
INSERT INTO `xg_art` VALUES ('10', 'aaa', 'a', null);
INSERT INTO `xg_art` VALUES ('12', 'aaa', 'a', null);

-- ----------------------------
-- Table structure for xg_art_trash
-- ----------------------------
DROP TABLE IF EXISTS `xg_art_trash`;
CREATE TABLE `xg_art_trash` (
  `id` int(8) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xg_art_trash
-- ----------------------------
INSERT INTO `xg_art_trash` VALUES ('11', 'aaa', 'a', null);
INSERT INTO `xg_art_trash` VALUES ('6', 'aaa', 'a', null);
INSERT INTO `xg_art_trash` VALUES ('7', 'aaa', 'a', null);
INSERT INTO `xg_art_trash` VALUES ('9', 'aaa', 'a', null);

-- ----------------------------
-- Table structure for xg_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `xg_auth_group`;
CREATE TABLE `xg_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text COMMENT '规则id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of xg_auth_group
-- ----------------------------
INSERT INTO `xg_auth_group` VALUES ('1', '超级管理员', '1', '');
INSERT INTO `xg_auth_group` VALUES ('2', '管理员', '1', '1,7,4');
INSERT INTO `xg_auth_group` VALUES ('4', '文章编辑', '1', '1,7,8,9');
INSERT INTO `xg_auth_group` VALUES ('6', '审核员', '-1', '1,7,8,9');

-- ----------------------------
-- Table structure for xg_auth_group_user
-- ----------------------------
DROP TABLE IF EXISTS `xg_auth_group_user`;
CREATE TABLE `xg_auth_group_user` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `group_id` int(11) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of xg_auth_group_user
-- ----------------------------
INSERT INTO `xg_auth_group_user` VALUES ('88', '1');
INSERT INTO `xg_auth_group_user` VALUES ('88', '4');
INSERT INTO `xg_auth_group_user` VALUES ('89', '2');
INSERT INTO `xg_auth_group_user` VALUES ('89', '4');

-- ----------------------------
-- Table structure for xg_auth_rule_menu
-- ----------------------------
DROP TABLE IF EXISTS `xg_auth_rule_menu`;
CREATE TABLE `xg_auth_rule_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '所属菜单',
  `name` varchar(15) DEFAULT '' COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT '' COMMENT '模块、控制器、方法',
  `ico` varchar(20) DEFAULT '' COMMENT 'font-awesome图标',
  `order_number` int(11) unsigned DEFAULT NULL COMMENT '排序',
  `type` tinyint(1) DEFAULT NULL COMMENT '1:后端菜单 -1:隐藏的权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=436 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xg_auth_rule_menu
-- ----------------------------
INSERT INTO `xg_auth_rule_menu` VALUES ('100', '1', '控制台', 'admin/init', 'fa-dashboard', '1', '1');
INSERT INTO `xg_auth_rule_menu` VALUES ('200', '1', '后台用户与权限', '', 'fa-gears', '1', '1');
INSERT INTO `xg_auth_rule_menu` VALUES ('203', '200', '用户', 'admin/user/use_ls', 'fa-user', '1', '1');
INSERT INTO `xg_auth_rule_menu` VALUES ('201', '200', '用户组', 'admin/user/group_ls', 'fa-users', '2', '1');
INSERT INTO `xg_auth_rule_menu` VALUES ('202', '200', '权限与菜单', 'admin/user/rule_ls', 'fa-sitemap', '3', '1');
INSERT INTO `xg_auth_rule_menu` VALUES ('300', '1', '会员管理', 'Admin/ShowNav/', 'fa-user', '4', '1');
INSERT INTO `xg_auth_rule_menu` VALUES ('400', '1', '文章管理', 'Admin/ShowNav/posts', 'fa-files-o', '6', '1');
INSERT INTO `xg_auth_rule_menu` VALUES ('211', '201', '删除用户组', 'admin/user/group_del', '', null, '-1');
INSERT INTO `xg_auth_rule_menu` VALUES ('210', '201', '添加用户组', 'admin/user/group_add', '', null, '-1');
INSERT INTO `xg_auth_rule_menu` VALUES ('1', '0', '主管理菜单', '', '', null, '1');
INSERT INTO `xg_auth_rule_menu` VALUES ('431', '0', '测试一级', '11', '', null, '-1');

-- ----------------------------
-- Table structure for xg_auth_user
-- ----------------------------
DROP TABLE IF EXISTS `xg_auth_user`;
CREATE TABLE `xg_auth_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；mb_password加密',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像，相对于upload/avatar目录',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `email_code` varchar(60) DEFAULT NULL COMMENT '激活码',
  `phone` bigint(11) unsigned DEFAULT NULL COMMENT '手机号',
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `register_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` varchar(16) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `last_login_time` int(10) unsigned NOT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xg_auth_user
-- ----------------------------
INSERT INTO `xg_auth_user` VALUES ('88', 'admin', 'c53255317bb11707d0f614696b3ce6f221d0e2f2', '/Upload/avatar/user1.jpg', '111@qq.com', '', null, '1', '1449199996', '::1', '1520334692');
INSERT INTO `xg_auth_user` VALUES ('89', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '/Upload/avatar/user2.jpg', '222@aaa.com', '', null, '1', '1449199996', '', '0');
INSERT INTO `xg_auth_user` VALUES ('90', 'aaa', '', '', '', null, null, '2', '0', '', '0');
