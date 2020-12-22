/*
 Navicat Premium Data Transfer

 Source Server         : Local Shiro
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : jasaprint_db

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 22/12/2020 15:18:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_detail_file
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_file`;
CREATE TABLE `tb_detail_file`  (
  `detail_file_id` int(100) NOT NULL AUTO_INCREMENT,
  `detail_file_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail_file_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail_file_total_pages` int(100) NULL DEFAULT NULL,
  `detail_file_print_pages` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `transaction_id` int(100) NULL DEFAULT NULL,
  `print_type_id` int(100) NULL DEFAULT NULL,
  `halaman_print_type_id` int(100) NULL DEFAULT 1,
  `detail_file_keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`detail_file_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_detail_update_status
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_update_status`;
CREATE TABLE `tb_detail_update_status`  (
  `detail_update_status_id` int(100) NOT NULL AUTO_INCREMENT,
  `status_transaction_id` int(100) NULL DEFAULT NULL,
  `detail_update_status_date` datetime(0) NULL DEFAULT NULL,
  `transaction_id` int(100) NULL DEFAULT NULL,
  PRIMARY KEY (`detail_update_status_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_halaman_print_type
-- ----------------------------
DROP TABLE IF EXISTS `tb_halaman_print_type`;
CREATE TABLE `tb_halaman_print_type`  (
  `halaman_print_type_id` int(100) NOT NULL AUTO_INCREMENT,
  `halaman_print_type_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `halaman_print_type_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`halaman_print_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_metode_bayar
-- ----------------------------
DROP TABLE IF EXISTS `tb_metode_bayar`;
CREATE TABLE `tb_metode_bayar`  (
  `metode_bayar_id` int(100) NOT NULL AUTO_INCREMENT,
  `metode_bayar_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `metode_bayar_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`metode_bayar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_metode_kirim
-- ----------------------------
DROP TABLE IF EXISTS `tb_metode_kirim`;
CREATE TABLE `tb_metode_kirim`  (
  `metode_kirim_id` int(100) NOT NULL AUTO_INCREMENT,
  `metode_kirim_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `metode_kirim_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`metode_kirim_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_print_price
-- ----------------------------
DROP TABLE IF EXISTS `tb_print_price`;
CREATE TABLE `tb_print_price`  (
  `print_price_id` int(100) NOT NULL AUTO_INCREMENT,
  `print_price_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `print_price_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `print_price_amount` int(100) NULL DEFAULT 0,
  PRIMARY KEY (`print_price_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_print_type
-- ----------------------------
DROP TABLE IF EXISTS `tb_print_type`;
CREATE TABLE `tb_print_type`  (
  `print_type_id` int(100) NOT NULL AUTO_INCREMENT,
  `print_type_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `print_type_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`print_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_setting
-- ----------------------------
DROP TABLE IF EXISTS `tb_setting`;
CREATE TABLE `tb_setting`  (
  `setting_id` int(100) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `setting_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `setting_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_status_payment
-- ----------------------------
DROP TABLE IF EXISTS `tb_status_payment`;
CREATE TABLE `tb_status_payment`  (
  `status_payment_id` int(100) NOT NULL AUTO_INCREMENT,
  `status_payment_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_payment_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`status_payment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_status_transaction
-- ----------------------------
DROP TABLE IF EXISTS `tb_status_transaction`;
CREATE TABLE `tb_status_transaction`  (
  `status_transaction_id` int(100) NOT NULL AUTO_INCREMENT,
  `status_transaction_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_transaction_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`status_transaction_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_status_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_status_user`;
CREATE TABLE `tb_status_user`  (
  `status_user_id` int(100) NOT NULL,
  `status_user_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_user_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`status_user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_transaction
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaction`;
CREATE TABLE `tb_transaction`  (
  `transaction_id` int(100) NOT NULL AUTO_INCREMENT,
  `transaction_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_id` int(100) NULL DEFAULT NULL,
  `transaction_date` datetime(0) NULL DEFAULT NULL,
  `status_transaction_id` int(100) NULL DEFAULT NULL,
  `transaction_print_color_total_page` int(100) NULL DEFAULT 0,
  `transaction_print_without_color_total_page` int(100) NULL DEFAULT 0,
  `transaction_print_color_price` int(100) NULL DEFAULT 0,
  `transaction_print_without_color_price` int(100) NULL DEFAULT 0,
  `transaction_ongkir` int(100) NULL DEFAULT NULL,
  `transaction_total_payment` int(100) NULL DEFAULT 0,
  `status_payment_id` int(100) NULL DEFAULT 1,
  PRIMARY KEY (`transaction_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_type_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_type_user`;
CREATE TABLE `tb_type_user`  (
  `type_user_id` int(100) NOT NULL AUTO_INCREMENT,
  `type_user_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`type_user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type_user_id` int(100) NULL DEFAULT 1,
  `user_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_user_id` int(100) NULL DEFAULT 1,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_version
-- ----------------------------
DROP TABLE IF EXISTS `tb_version`;
CREATE TABLE `tb_version`  (
  `version_id` int(100) NOT NULL AUTO_INCREMENT,
  `version_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `version_type` enum('android','web') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'android',
  PRIMARY KEY (`version_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
