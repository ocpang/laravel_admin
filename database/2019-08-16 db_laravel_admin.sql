/*
 Navicat Premium Data Transfer

 Source Server         : PHPMyAdmin
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : db_laravel_admin

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 08/16/2019 17:33:38 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `language` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `menus`
-- ----------------------------
BEGIN;
INSERT INTO `menus` VALUES ('1', '1', 'Master', '#', 'fas fa-th-large', '0', 'master', '2019-08-15 10:24:37', null, null), ('2', '2', 'Menus', 'menus', 'far fa-circle', '1', 'menus', '2019-08-15 10:27:27', null, null), ('3', '3', 'Users', 'users', 'fas fa-users', '1', 'users', '2019-08-15 10:30:27', null, null), ('4', '4', 'Area', 'areas', 'fas fa-map', '1', 'areas', '2019-08-15 10:50:27', null, null), ('5', '5', 'History', 'histories', 'fas fa-history', '0', 'histories', '2019-08-15 10:59:27', null, null), ('6', '6', 'Transaction', '#', 'fas fa-dollars', '0', 'transactions', '2019-08-15 11:52:11', null, null), ('7', '7', 'test', 'test', 'test', '6', 'test', '2019-08-15 14:14:35', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1'), ('2', '2014_10_12_100000_create_password_resets_table', '1'), ('3', '2019_08_02_105404_add_avatar_to_users_table', '2'), ('4', '2019_08_13_151426_create_menus_table', '3');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'Administrator', 'octavian91011@gmail.com', '0000-00-00 00:00:00', '$2y$10$jDoXKab1MpPbqlujd7n8JO8pQlRLfNjwwJBhoYeRrEYzn/Q.WUq4e', 'gIgsAvSWcJOQ7UbWPjDvoHXkD5cVjKMwrWZCdM51kRvbGZdMa0iNlXkVpXll', '2019081309465115.jpg', '2019-07-22 07:20:21', '2019-08-13 09:46:51'), ('2', 'Member', 'member@admin.com', null, '$2y$10$JXD8QwYtFD01oUvU47pqvuQza2tx/jhaGUti9.yKqixBymljBmap.', null, null, '2019-07-24 03:34:45', '2019-07-24 03:34:45'), ('3', 'Demo', 'demo@admin.com', null, '$2y$10$9/VuDhqEan/K1q.hcNCsE.pwpdTMxCf.S5Pq9rURs/P0PNhdeh36O', null, null, '2019-07-24 03:38:21', '2019-07-24 03:38:21');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
