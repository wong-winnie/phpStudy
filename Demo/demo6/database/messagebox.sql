/*
Navicat MySQL Data Transfer

Source Server         : locahost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : messagebox

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-20 09:10:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for msg_article
-- ----------------------------
DROP TABLE IF EXISTS `msg_article`;
CREATE TABLE `msg_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `viewnum` int(10) NOT NULL COMMENT '阅读数',
  `time` int(10) NOT NULL COMMENT '时间',
  `status` enum('A','D') NOT NULL DEFAULT 'A' COMMENT '状态: A: 正常 D: 删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg_article
-- ----------------------------
INSERT INTO `msg_article` VALUES ('1', '标题1', '只是内容1', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('2', '标题2', '只是内容2', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('3', '标题3', '只是内容3', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('4', '标题4', '只是内容4', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('5', '标题5', '只是内容5', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('6', '标题6', '只是内容6', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('7', '标题7', '只是内容7', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('8', '标题8', '只是内容8', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('9', '标题9', '只是内容9', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('10', '标题10', '只是内容10', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('11', '标题11', '只是内容11', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('12', '标题12', '只是内容12', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('13', '标题13', '只是内容13', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('14', '标题14', '只是内容14', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('15', '标题15', '只是内容15', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('16', '标题16', '只是内容16', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('17', '标题17', '只是内容17', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('18', '标题18', '只是内容18', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('19', '标题19', '只是内容19', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('20', '标题20', '只是内容20', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('21', '标题21', '只是内容21', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('22', '标题22', '只是内容22', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('23', '标题23', '只是内容23', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('24', '标题24', '只是内容24', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('25', '标题25', '只是内容25', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('26', '标题26', '只是内容26', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('27', '标题27', '只是内容27', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('28', '标题28', '只是内容28', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('29', '标题29', '只是内容29', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('30', '标题30', '只是内容30', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('31', '标题31', '只是内容31', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('32', '标题32', '只是内容32', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('33', '标题33', '只是内容33', '0', '1508461686', 'A');
INSERT INTO `msg_article` VALUES ('34', '标题34', '只是内容34 hahaha', '3', '1508461759', 'A');
INSERT INTO `msg_article` VALUES ('35', '标题35', '只是内容35', '1', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('36', '标题36', '只是内容36', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('37', '标题37', '只是内容37', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('38', '标题38', '只是内容38', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('39', '标题39', '只是内容39', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('40', '标题40', '只是内容40', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('41', '标题41', '只是内容41', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('42', '标题42', '只是内容42', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('43', '标题43', '只是内容43', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('44', '标题44', '只是内容44', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('45', '标题45', '只是内容45', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('46', '标题46', '只是内容46', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('47', '标题47', '只是内容47', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('48', '标题48', '只是内容48', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('49', '标题49', '只是内容49', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('50', '标题50', '只是内容50', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('51', '标题51', '只是内容51', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('52', '标题52', '只是内容52', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('53', '标题53', '只是内容53', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('54', '标题54', '只是内容54', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('55', '标题55', '只是内容55', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('56', '标题56', '只是内容56', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('57', '标题57', '只是内容57', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('58', '标题58', '只是内容58', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('59', '标题59', '只是内容59', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('60', '标题60', '只是内容60', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('61', '标题61', '只是内容61', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('62', '标题62', '只是内容62', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('63', '标题63', '只是内容63', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('64', '标题64', '只是内容64', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('65', '标题65', '只是内容65', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('66', '标题66', '只是内容66', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('67', '标题67', '只是内容67', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('68', '标题68', '只是内容68', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('69', '标题69', '只是内容69', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('70', '标题70', '只是内容70', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('71', '标题71', '只是内容71', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('72', '标题72', '只是内容72', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('73', '标题73', '只是内容73', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('74', '标题74', '只是内容74', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('75', '标题75', '只是内容75', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('76', '标题76', '只是内容76', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('77', '标题77', '只是内容77', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('78', '标题78', '只是内容78', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('79', '标题79', '只是内容79', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('80', '标题80', '只是内容80', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('81', '标题81', '只是内容81', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('82', '标题82', '只是内容82', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('83', '标题83', '只是内容83', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('84', '标题84', '只是内容84', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('85', '标题85', '只是内容85', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('86', '标题86', '只是内容86', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('87', '标题87', '只是内容87', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('88', '标题88', '只是内容88', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('89', '标题89', '只是内容89', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('90', '标题90', '只是内容90', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('91', '标题91', '只是内容91', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('92', '标题92', '只是内容92', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('93', '标题93', '只是内容93', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('94', '标题94', '只是内容94', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('95', '标题95', '只是内容95', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('96', '标题96', '只是内容96', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('97', '标题97', '只是内容97', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('98', '标题98', '只是内容98', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('99', '标题99', '只是内容99', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('100', '标题100', '只是内容100', '0', '1508461687', 'A');
INSERT INTO `msg_article` VALUES ('101', '1', '1', '0', '1508461772', 'D');
