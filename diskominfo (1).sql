-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 04:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `isi`, `picture`) VALUES
(9, 'Surat Baru', '<p>coba &nbsp;LAGI TEST TEST</p>', 'slider1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `egoverment`
--

CREATE TABLE `egoverment` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_galeri`
--

CREATE TABLE `kategori_galeri` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_galeri`
--

INSERT INTO `kategori_galeri` (`id`, `name`) VALUES
(1, 'Foto'),
(2, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_konten`
--

CREATE TABLE `kategori_konten` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_konten`
--

INSERT INTO `kategori_konten` (`id`, `name`) VALUES
(1, 'Pengumuman'),
(2, 'Berita');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_portal`
--

CREATE TABLE `kategori_portal` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_portal`
--

INSERT INTO `kategori_portal` (`id`, `name`) VALUES
(1, 'OPD'),
(2, 'Kecamatan');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `kategori_id`, `date`, `judul`, `isi`, `picture`) VALUES
(8, 1, '2022-01-17', 'Pengaruh Religiusitas terhadap pembelajaran Agama Islam2', '<p>Zasassdadasdasdasdasdadadadasdasdasdadasdadads &nbsp;sad aad ad ad ad ads sada dasd adas</p>', 'slider1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `module_groups`
--

CREATE TABLE `module_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `module_groups`
--

INSERT INTO `module_groups` (`id`, `name`, `short_code`, `icon`, `is_active`) VALUES
(1, 'Sistem Settings', 'settings', '1', 1),
(2, 'Kategori', 'kategori', '1', 1),
(3, 'Informasi', 'informasi', '1', 1),
(4, 'Portal', 'portal', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_operations`
--

CREATE TABLE `module_operations` (
  `id` int(11) NOT NULL,
  `m_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `can_view` int(1) DEFAULT 0,
  `can_add` int(1) DEFAULT 0,
  `can_edit` int(1) DEFAULT 0,
  `can_delete` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `module_operations`
--

INSERT INTO `module_operations` (`id`, `m_group_id`, `name`, `slug`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES
(1, 1, 'General Setting', 'general', 1, NULL, 1, NULL),
(2, 1, 'Backup Database', 'backup', 1, 1, 1, 1),
(3, 1, 'User', 'users', 1, 1, 1, NULL),
(4, 1, 'Module', 'module', 1, 1, 1, 1),
(5, 1, 'Operation', 'operations', 1, 1, 1, 1),
(6, 1, 'Role', 'roles', 1, 1, 1, NULL),
(8, 3, 'Konten', 'konten', 1, 1, 1, 1),
(9, 3, 'Tentang', 'tentang', 1, 1, 1, 1),
(10, 3, 'Berita', 'berita', 1, 1, 1, 1),
(11, 3, 'Visi', 'visi', 1, 1, 1, 1),
(13, 3, 'Struktur', 'struktur', 1, 1, 1, 1),
(14, 3, 'Tupoksi', 'tupoksi', 1, 1, 1, 1),
(15, 3, 'E-Goverment', 'egov', 1, 1, 1, 1),
(17, 3, 'PPID', 'ppid', 1, 1, 1, 1),
(18, 4, 'OPD', 'opd', 1, 1, 1, 1),
(19, 4, 'Kecamatan', 'kecamatan', 1, 1, 1, 1),
(48, 3, 'Slider', 'slider', 1, 1, 1, 1),
(49, 3, 'Galery Foto', 'foto', 1, 1, 1, 1),
(50, 3, 'Galery Video', 'video', 1, 1, 1, 1),
(51, 2, 'Kategori Galeri', 'galeri', 1, 1, 1, 1),
(52, 2, 'Kategori Portal', 'portal', 1, 1, 1, 1),
(53, 2, 'Kategori Konten', 'kategori_konten', 1, 1, 1, 1),
(54, 3, 'Sosial Media', 'sosialmedia', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

CREATE TABLE `portal` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ppid`
--

CREATE TABLE `ppid` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppid`
--

INSERT INTO `ppid` (`id`, `date`, `name`, `isi`, `picture`) VALUES
(2, '2022-01-17', 'Surat Baru', '<p>sdsd asdad sds</p>', 'slider1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_superadmin` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_superadmin`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, '2020-03-12 00:00:00', '2020-03-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `m_operation_id` int(11) DEFAULT NULL,
  `can_view` int(1) DEFAULT 0,
  `can_add` int(1) DEFAULT 0,
  `can_edit` int(1) DEFAULT 0,
  `can_delete` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `role_id`, `m_operation_id`, `can_view`, `can_add`, `can_edit`, `can_delete`) VALUES
(180, 8, 2, 0, 0, 0, 0),
(181, 8, 1, 0, 0, 0, 0),
(182, 8, 4, 0, 0, 0, 0),
(183, 8, 5, 0, 0, 0, 0),
(184, 8, 6, 0, 0, 0, 0),
(185, 8, 3, 0, 0, 0, 0),
(186, 8, 7, 0, 0, 0, 0),
(187, 8, 8, 0, 0, 0, 0),
(188, 8, 40, 0, 0, 0, 0),
(189, 8, 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `name`, `is_active`) VALUES
(1, 'Pack', 1),
(2, 'Sachet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `app_logo` varchar(100) DEFAULT NULL,
  `footer` varchar(100) DEFAULT NULL,
  `quotes` text DEFAULT NULL,
  `logo_fo` varchar(255) NOT NULL,
  `icon_fo` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `picture_1` varchar(255) NOT NULL,
  `picture_2` varchar(255) NOT NULL,
  `picture_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `address`, `instagram`, `youtube`, `created_at`, `updated_at`, `app_logo`, `footer`, `quotes`, `logo_fo`, `icon_fo`, `site_title`, `picture_1`, `picture_2`, `picture_3`) VALUES
(0, 'DISKOMINFO BONDOWOSO', 'admin@bondowosokab.go.id', '0332 - 421707', 'Jl. DI. Panjaitan no 234 Bondowoso', '-', '-', '2020-03-12 00:00:00', '2022-01-13 12:10:53', '1632720548_icon-32x32.png', '© 2022 Dinas Komunikasi Dan Informasi Kabupaten Bondowoso', 'Merupakan perangkat Pemerintah Republik Indonesia ini membidangi segala urusan yang ruang lingkupnya disebutkan dalam Undang-Undang Dasar RI Tahun 1945,yaitu informasi dan komunikasi.', '', '', 'DISKOMINFO BONDOWOSO', 'bg1.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `picture`, `is_active`) VALUES
(1, 'Slider 1', '1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sosialmedia`
--

CREATE TABLE `sosialmedia` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sosialmedia`
--

INSERT INTO `sosialmedia` (`id`, `name`, `link`, `icon`) VALUES
(1, 'Instagram', 'https://instagram.com/kominfobondowoso', 'bi bi-instagram'),
(2, 'Youtube', 'https://youtube.com/kominfobondowoso', 'bi bi-youtube');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `date` date NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`id`, `name`, `isi`, `date`, `picture`) VALUES
(3, 'Surat Baru', '<p>fgsfds sdsds</p>', '2022-01-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `tupoksi`
--

CREATE TABLE `tupoksi` (
  `id` int(11) NOT NULL,
  `tugas` text NOT NULL,
  `fungsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roles_id`, `username`, `nama_lengkap`, `contact_no`, `email`, `password`, `opd`, `is_active`, `images`, `verification_code`, `created_at`, `updated_at`) VALUES
(10, 1, 'superadmin', 'Super Administrator', '123123', 'superadmin@system.com', '$2y$10$WsD7vPYgWmIFrO14shybxewGnUxJj1RGcR8Ar0RoVL32qJscbOd/m', NULL, 1, NULL, '', '2020-05-11 00:00:00', '2020-05-27 00:00:00'),
(29, 1, 'febri@kominfo.com', 'Patricka Febrianto', '081256474478', 'febri@kominfo.com', '$2y$10$yOE0X54V6DdSojD6vBnJQO8S4gKav.9fW4z211PO7ihuUaJT1DbNe', '123456', 1, NULL, '', '2021-12-23 00:00:00', '2022-01-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id` int(11) NOT NULL,
  `tahun` varchar(12) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`id`, `tahun`, `visi`, `misi`) VALUES
(3, '2019 - 2023', '<p>Visi Kabupaten Bondowoso dituangkan di dalam Rencana Pembangunan Jangka Menengah Daerah (RPJMD) Tahun 2014 – 2018, yaitu “Membawa Bondowoso MELESAT dalam Bingkai Iman dan Takwa” (Mandiri Ekonomi, Lestari, Sejahtera, Adil dan Terdepan)<br>Diharapkan dengan adanya visi tersebut akan terjadi sinergi yang dinamis antara pemerintah dan masyarakat dalam merealisasikan pembangunan yang diharapkan</p>', '<p>Guna mendukung dan merealisasikan visi yang telah dibuat, ditetapkan juga misi-misi Kabupaten Bondowoso sebagai berikut :<br>1. Membangun Kemandirian Ekonomi Bondowoso dengan Memperkuat Sektor Pertanian, Perkebunan, Peternakan serta Sektor lainnya dengan Menggerakkan Ekonomi Kerakyatan maupun Lapangan Kerja<br>2. Melestarikan Lingkungan Agar Budaya Guna Tinggi Sebagai Keuntungan Kompetitif Bondowoso, dan digunakan sebaik-baiknya untuk Kesejahteraan Bersama<br>3. Meningkatan Kesejahteraan Melalui Kebijakan Sosial di Tingkat Kabupaten yang Sinergi dengan Kebijakan Provinsi maupun Nasional<br>4. Menghadirkan Pemerintahan yang Demokratis melalui Kepemimpinan yang Jujur, Adil, Amanah, Partisipatif, dan Inovatif<br>5. Mewujudkan Bondowoso yang terdepan, Bermartabat dan Berkarakter Unggul dan Kompetitif</p>');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `hits` varchar(20) NOT NULL,
  `online` varchar(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip`, `date`, `hits`, `online`, `time`) VALUES
(1, '::1', '2022-01-17', '231', '1642413007', '2022-01-17 11:18:10'),
(2, '172.18.0.12', '2022-01-17', '3', '1642393140', '2022-01-17 11:19:00'),
(3, '::1', '2022-01-18', '219', '1642474529', '2022-01-18 07:39:16'),
(4, '172.18.0.12', '2022-01-18', '6', '1642471732', '2022-01-18 09:08:50'),
(5, '172.18.0.254', '2022-01-18', '30', '1642474563', '2022-01-18 09:53:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egoverment`
--
ALTER TABLE `egoverment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_konten`
--
ALTER TABLE `kategori_konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_portal`
--
ALTER TABLE `kategori_portal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_groups`
--
ALTER TABLE `module_groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `module_operations`
--
ALTER TABLE `module_operations`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `perm_group_id` (`m_group_id`) USING BTREE;

--
-- Indexes for table `portal`
--
ALTER TABLE `portal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppid`
--
ALTER TABLE `ppid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosialmedia`
--
ALTER TABLE `sosialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tupoksi`
--
ALTER TABLE `tupoksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `egoverment`
--
ALTER TABLE `egoverment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_konten`
--
ALTER TABLE `kategori_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori_portal`
--
ALTER TABLE `kategori_portal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `module_groups`
--
ALTER TABLE `module_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `module_operations`
--
ALTER TABLE `module_operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `portal`
--
ALTER TABLE `portal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ppid`
--
ALTER TABLE `ppid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sosialmedia`
--
ALTER TABLE `sosialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tupoksi`
--
ALTER TABLE `tupoksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
