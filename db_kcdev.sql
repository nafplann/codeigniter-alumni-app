/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_kcdev

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-30 11:21:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alumni
-- ----------------------------
DROP TABLE IF EXISTS `alumni`;
CREATE TABLE `alumni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL DEFAULT 'L',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alumni
-- ----------------------------
INSERT INTO `alumni` VALUES ('1', 'kaceManaf', 'Teknik Informatika', 'L');
INSERT INTO `alumni` VALUES ('2', 'kaceRustam', 'Desain Komunikasi Visual', 'L');
INSERT INTO `alumni` VALUES ('3', 'kaceAmin', 'Sistem Informasi', 'L');
INSERT INTO `alumni` VALUES ('4', 'kaceRais', 'Multimedia', 'L');
INSERT INTO `alumni` VALUES ('5', 'kaceAdi', 'Hubungan Industri', 'L');
INSERT INTO `alumni` VALUES ('6', 'kaceUthe', 'Broadcasting', 'P');

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES ('1', 'Makan Makan', '08987654321', '2017-03-31', '2017-04-07', 'Pelepasan macan tutul');
INSERT INTO `events` VALUES ('2', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('3', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('4', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('5', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('6', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('7', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('8', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('9', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('10', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('11', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('12', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('13', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('14', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('15', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('16', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('17', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('18', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('19', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');
INSERT INTO `events` VALUES ('20', 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');

-- ----------------------------
-- Table structure for loker
-- ----------------------------
DROP TABLE IF EXISTS `loker`;
CREATE TABLE `loker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of loker
-- ----------------------------
INSERT INTO `loker` VALUES ('1', 'PT Maju Terus Pantang Mundur', '08213123213', '2017-04-05', 'Freelancer', '<p>PT. Maju Terus Pantang Mundur adalah sebuah perusahaan yang bergerak di bidang datar yang lurus. Membutuhkan seorang pegawai yang berintegritas tinggi dan memahami rumus pythagoras secara menyeluruh.</p>\r\n<p>Kualifikasi:</p>\r\n<ol>\r\n<li>Bertubuh Gitar Spanyola</li>\r\n<li>Minimal berusia 35 Tahun</li>\r\n<li>Rajin pangkal pandai</li>\r\n</ol>\r\n<p>Jika anda memenuhi kualifikasi di atas, silahkan mengirimkan cv anda pada&nbsp;<a href=\"http://www.majumundur.com\">website kami</a>&nbsp;atau pada email kami di maju@terus.com</p>', 'administrator');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','alumni') NOT NULL DEFAULT 'administrator',
  `last_login` datetime NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'noavatar.png',
  `active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Abdul Manaaf', 'Jl. Sepakat No. 53', '080989999', 'administrator', '$2y$10$B2ztsNPm8JZyGR/E12rRU.itsFuvdnYCsDg/L4SZ.xCx7usFzvXUG', 'administrator', '2017-04-22 06:05:04', 'administrator_20170421152220.jpg', '1');
INSERT INTO `users` VALUES ('2', 'Brekele', '-', '-', 'brekele', '$2y$10$c14El4ivrRXfXAyspwbxQOaXu7cX1r3/odhQRIFQSuXg6yfQ6iya2', 'administrator', '2017-04-14 17:04:39', 'noavatar.png', '1');
INSERT INTO `users` VALUES ('3', 'Daeng', '-', '-', 'daeng', '$2y$10$Uo/O3pE0REYbte04eN171.CrkKNrdwk8LXeedOEFmDZDGYFNfRzSG', 'alumni', '2017-04-14 17:04:51', 'noavatar.png', '1');
