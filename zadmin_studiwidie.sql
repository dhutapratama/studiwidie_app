/*
Navicat MySQL Data Transfer

Source Server         : SERVER
Source Server Version : 50529
Source Host           : 127.0.0.1:3306
Source Database       : zadmin_studiwidie

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2015-07-21 16:50:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administrators
-- ----------------------------
DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administrators
-- ----------------------------
INSERT INTO `administrators` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-07-18 15:04:17', '2015-07-21 16:47:25');

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('a7a43eae21a2725f903c0e19f4e286bf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '1437471735', 'a:6:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:5:\"admin\";s:8:\"password\";s:5:\"admin\";s:7:\"user_id\";s:88:\"cFd9rgERodG2rtmPJIJbID6hAZZB9ZFgg5vE126uI08akwCmQSsKBhfX0ydDP8UaLce5d9MDkJXvL7oFcj0nRA==\";s:9:\"user_type\";s:5:\"admin\";s:4:\"nama\";s:5:\"admin\";}');

-- ----------------------------
-- Table structure for learning
-- ----------------------------
DROP TABLE IF EXISTS `learning`;
CREATE TABLE `learning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `isi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of learning
-- ----------------------------

-- ----------------------------
-- Table structure for log_jawaban
-- ----------------------------
DROP TABLE IF EXISTS `log_jawaban`;
CREATE TABLE `log_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `no_seri` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_jawaban
-- ----------------------------

-- ----------------------------
-- Table structure for log_tryout
-- ----------------------------
DROP TABLE IF EXISTS `log_tryout`;
CREATE TABLE `log_tryout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `no_seri` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `jawaban_benar` int(11) DEFAULT NULL,
  `jawaban_salah` int(11) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_tryout
-- ----------------------------

-- ----------------------------
-- Table structure for mata_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `mata_pelajaran`;
CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mata_pelajaran
-- ----------------------------
INSERT INTO `mata_pelajaran` VALUES ('1', 'Matematika');
INSERT INTO `mata_pelajaran` VALUES ('2', 'Bahasa Indonesia');
INSERT INTO `mata_pelajaran` VALUES ('3', 'Bahasa Inggris');
INSERT INTO `mata_pelajaran` VALUES ('4', 'IPA');
INSERT INTO `mata_pelajaran` VALUES ('5', 'IPS');

-- ----------------------------
-- Table structure for pembahasan
-- ----------------------------
DROP TABLE IF EXISTS `pembahasan`;
CREATE TABLE `pembahasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(255) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `pembahasan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembahasan
-- ----------------------------

-- ----------------------------
-- Table structure for soal
-- ----------------------------
DROP TABLE IF EXISTS `soal`;
CREATE TABLE `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_seri` varchar(255) DEFAULT NULL,
  `id_mapel` int(255) DEFAULT NULL,
  `soal` text,
  `jawaban_a` varchar(255) DEFAULT NULL,
  `jawaban_b` varchar(255) DEFAULT NULL,
  `jawaban_c` varchar(255) DEFAULT NULL,
  `jawaban_d` varchar(255) DEFAULT NULL,
  `jawaban_e` varchar(255) DEFAULT NULL,
  `kunci_jawaban` varchar(255) DEFAULT NULL,
  `hint_1` varchar(255) DEFAULT NULL,
  `hint_2` varchar(255) DEFAULT NULL,
  `hint_3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soal
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'siswa', 'bcd724d15cde8c47650fda962968f102', 'Siswa', 'siswa@gmail.com');
