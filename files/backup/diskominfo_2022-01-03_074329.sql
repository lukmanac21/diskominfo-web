#
# TABLE STRUCTURE FOR: module_groups
#

DROP TABLE IF EXISTS `module_groups`;

CREATE TABLE `module_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` int(1) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `module_groups` (`id`, `name`, `short_code`, `icon`, `is_active`) VALUES (1, 'Sistem Settings', 'settings', '1', 1);
INSERT INTO `module_groups` (`id`, `name`, `short_code`, `icon`, `is_active`) VALUES (2, 'Master data', 'master-data', '1', 1);
INSERT INTO `module_groups` (`id`, `name`, `short_code`, `icon`, `is_active`) VALUES (3, 'Informasi', 'informasi', '1', 1);
INSERT INTO `module_groups` (`id`, `name`, `short_code`, `icon`, `is_active`) VALUES (4, 'Portal', 'portal', '1', 1);


#
# TABLE STRUCTURE FOR: module_operations
#

DROP TABLE IF EXISTS `module_operations`;

CREATE TABLE `module_operations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `can_view` int(1) DEFAULT 0,
  `can_add` int(1) DEFAULT 0,
  `can_edit` int(1) DEFAULT 0,
  `can_delete` int(1) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `perm_group_id` (`m_group_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (1, 1, 'General Setting', 'general', 1, NULL, 1, NULL);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (2, 1, 'Backup Database', 'backup', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (3, 1, 'User', 'users', 1, 1, 1, NULL);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (4, 1, 'Module', 'module', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (5, 1, 'Operation', 'operations', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (6, 1, 'Role', 'roles', 1, 1, 1, NULL);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (7, 2, 'Kategori', 'kategori', 1, 1, 1, NULL);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (8, 3, 'Pengumuman', 'pengumuman', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (9, 3, 'Tentang', 'tentang', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (10, 3, 'Berita', 'berita', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (11, 3, 'Visi', 'visi', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (12, 3, 'Misi', 'misi', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (13, 3, 'Struktur', 'struktur', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (14, 3, 'Tupoksi', 'tupoksi', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (15, 3, 'E-Goverment', 'egov', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (16, 3, 'Kontak', 'kontak', 1, 1, 1, 0);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (17, 3, 'PPID', 'ppid', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (18, 4, 'OPD', 'opd', 1, 1, 1, 1);
INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (19, 4, 'Kecamatan', 'kecamatan', 1, 1, 1, 1);


#
# TABLE STRUCTURE FOR: roles
#

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `is_superadmin` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `roles` (`id`, `name`, `is_superadmin`, `created_at`, `updated_at`) VALUES (1, 'Super Administrator', 1, '2020-03-12 00:00:00', '2020-03-12 00:00:00');


#
# TABLE STRUCTURE FOR: roles_permissions
#

DROP TABLE IF EXISTS `roles_permissions`;

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `m_operation_id` int(11) DEFAULT NULL,
  `can_view` int(1) DEFAULT 0,
  `can_add` int(1) DEFAULT 0,
  `can_edit` int(1) DEFAULT 0,
  `can_delete` int(1) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (180, 8, 2, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (181, 8, 1, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (182, 8, 4, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (183, 8, 5, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (184, 8, 6, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (185, 8, 3, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (186, 8, 7, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (187, 8, 8, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (188, 8, 40, 0, 0, 0, 0);
INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES (189, 8, 10, 0, 0, 0, 0);


#
# TABLE STRUCTURE FOR: satuan
#

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `satuan` (`id`, `name`, `is_active`) VALUES (1, 'Pack', 1);
INSERT INTO `satuan` (`id`, `name`, `is_active`) VALUES (2, 'Sachet', 1);


#
# TABLE STRUCTURE FOR: settings
#

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `timezone` varchar(30) NOT NULL DEFAULT 'UTC',
  `logo` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `app_logo` varchar(100) DEFAULT NULL,
  `footer` varchar(100) DEFAULT NULL,
  `login_background` varchar(100) NOT NULL,
  `login_logo` varchar(100) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `site_desc` text DEFAULT NULL,
  `home_title` varchar(50) DEFAULT NULL,
  `site_title` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `address`, `instagram`, `youtube`, `whatsapp`, `timezone`, `logo`, `kota`, `propinsi`, `zip`, `created_at`, `updated_at`, `app_logo`, `footer`, `login_background`, `login_logo`, `keyword`, `site_desc`, `home_title`, `site_title`, `latitude`, `longitude`) VALUES (0, 'DISKOMINFO-BONDOWOSO', '-', '082332313232', '-', '-', '-', '-', 'UTC', '1632720548_icon-32x32.png', '', '', '-', '2020-03-12 00:00:00', '2021-10-18 10:45:07', '1632720548_icon-32x32.png', 'Copyright © 2021 Theme_Nate. All rights reserved.', '', NULL, NULL, NULL, NULL, 'KASIR', '-7.9146022', '113.8217761');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roles_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `opd` varchar(20) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `verification_code` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `users` (`id`, `roles_id`, `username`, `nama_lengkap`, `contact_no`, `email`, `password`, `opd`, `is_active`, `images`, `verification_code`, `created_at`, `updated_at`) VALUES (10, 1, 'superadmin', 'Super Administrator', '123123', 'superadmin@system.com', '$2y$10$WsD7vPYgWmIFrO14shybxewGnUxJj1RGcR8Ar0RoVL32qJscbOd/m', NULL, 1, NULL, '', '2020-05-11 00:00:00', '2020-05-27 00:00:00');
INSERT INTO `users` (`id`, `roles_id`, `username`, `nama_lengkap`, `contact_no`, `email`, `password`, `opd`, `is_active`, `images`, `verification_code`, `created_at`, `updated_at`) VALUES (29, 1, 'superadmin123', 'test', 'asdasdasd', 'test@gmail.com', '$2y$10$BHjqotMGczDqO2L2/5Z6TeBuyQI25H170ka56ixbZqRyiZ7InYbf.', '123456', 1, NULL, '', '2021-12-23 00:00:00', '2021-12-24 00:00:00');


