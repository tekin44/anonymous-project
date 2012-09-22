/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : karyawan

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-04-22 09:11:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_karyawan`
-- ----------------------------
DROP TABLE IF EXISTS `tb_karyawan`;
CREATE TABLE `tb_karyawan` (
  `nik` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_karyawan
-- ----------------------------
INSERT INTO `tb_karyawan` VALUES ('16101986', 'Anton Sofyan');
INSERT INTO `tb_karyawan` VALUES ('16101987', 'Sofyan Hakim');
