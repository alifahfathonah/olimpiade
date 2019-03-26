-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 09:37 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `asal_kota` int(11) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `rating_pembeli` varchar(50) DEFAULT NULL,
  `status_pembeli` varchar(50) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `penginput` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `nama_pembeli`, `email`, `password`, `alamat`, `asal_kota`, `tgl_input`, `rating_pembeli`, `status_pembeli`, `foto`, `penginput`, `no_hp`) VALUES
(1, 'Adib', 'adib@gmail.com', 'adib', 'Jalan Nugroho II/4m', 1, '2019-03-22 21:19:09', 'New Comers', 'Aktif', 'foto_profile4.PNG', 'admin@admin.com', '+6281216799117');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'penjual', 'Penjual');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(50) DEFAULT NULL,
  `header` varchar(50) DEFAULT NULL,
  `footer` varchar(50) DEFAULT NULL,
  `telpon` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `meta` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama_aplikasi`, `header`, `footer`, `telpon`, `alamat`, `tgl_input`, `email`, `meta`) VALUES
(1, 'Space X', 'Space X', 'The Next Unicorn', '', '', '2019-03-22 19:32:40', 'admin@admin.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mapping_kurir`
--

CREATE TABLE `mapping_kurir` (
  `id` int(11) NOT NULL,
  `tujuan` int(11) DEFAULT NULL,
  `asal` int(11) DEFAULT NULL,
  `kurir` int(11) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapping_kurir`
--

INSERT INTO `mapping_kurir` (`id`, `tujuan`, `asal`, `kurir`, `ongkir`, `tgl_input`, `email`) VALUES
(4, 2, 1, 2, 22000, '2019-03-22 19:28:33', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `mapping_menu`
--

CREATE TABLE `mapping_menu` (
  `id` int(11) NOT NULL,
  `grup` varchar(50) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapping_menu`
--

INSERT INTO `mapping_menu` (`id`, `grup`, `menu`, `tgl_input`, `email`) VALUES
(5, 'admin', 'Master Toko', '2019-03-21 21:24:59', 'admin@admin.com'),
(6, 'admin', 'Master Pembeli', '2019-03-21 21:29:28', 'admin@admin.com'),
(7, 'admin', 'Master Barang', '2019-03-21 21:30:51', 'admin@admin.com'),
(8, 'admin', 'Master Pengiriman', '2019-03-21 21:31:41', 'admin@admin.com'),
(9, 'admin', 'Transaksi Berjalan', '2019-03-21 21:32:39', 'admin@admin.com'),
(10, 'admin', 'Status Pengiriman', '2019-03-21 21:33:42', 'admin@admin.com'),
(11, 'admin', 'Komplaining', '2019-03-21 21:34:18', 'admin@admin.com'),
(12, 'admin', 'Pesanan', '2019-03-21 21:35:45', 'admin@admin.com'),
(13, 'admin', 'Dashboard Toko', '2019-03-21 21:37:35', 'admin@admin.com'),
(14, 'admin', 'Dashboard Perusahaan', '2019-03-21 21:38:32', 'admin@admin.com'),
(15, 'admin', 'Penjual', '2019-03-22 08:05:43', 'admin@admin.com'),
(16, 'admin', 'Konfigurasi', '2019-03-22 10:29:51', 'admin@admin.com'),
(18, 'admin', 'Konfigurasi Pengiriman', '2019-03-22 13:26:15', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL DEFAULT '0',
  `url` varchar(50) NOT NULL DEFAULT '0',
  `tgl_input` datetime NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '0',
  `simbol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `url`, `tgl_input`, `email`, `simbol`) VALUES
(3, 'Penjual', 'seller', '2019-03-22 08:06:04', 'admin@admin.com', 'glyphicon glyphicon-th'),
(4, 'Master Pembeli', 'buyer', '2019-03-22 19:51:11', 'admin@admin.com', 'glyphicon glyphicon-heart'),
(5, 'Master Barang', 'commodity', '2019-03-23 07:29:26', 'admin@admin.com', 'glyphicon glyphicon-barcode'),
(6, 'Master Pengiriman', 'pengiriman', '2019-03-21 21:31:37', 'admin@admin.com', 'glyphicon glyphicon-road'),
(7, 'Transaksi Berjalan', 'transaksi', '2019-03-21 21:32:34', 'admin@admin.com', 'glyphicon glyphicon-fire'),
(8, 'Status Pengiriman', 'barang/pengiriman', '2019-03-21 21:33:36', 'admin@admin.com', 'glyphicon glyphicon-share-alt'),
(9, 'Komplaining', 'komplain', '2019-03-21 21:34:15', 'admin@admin.com', 'glyphicon glyphicon-question-sign'),
(10, 'Pesanan', 'pesanan', '2019-03-21 21:35:41', 'admin@admin.com', 'glyphicon glyphicon-book'),
(11, 'Dashboard Toko', 'toko/dashboard', '2019-03-21 21:37:29', 'admin@admin.com', 'glyphicon glyphicon-home'),
(12, 'Dashboard Perusahaan', 'admin/dashboard_perusahaan', '2019-03-21 21:38:22', 'admin@admin.com', 'glyphicon glyphicon-signal'),
(13, 'Konfigurasi', 'backend/admin', '2019-03-22 10:29:40', 'admin@admin.com', 'glyphicon glyphicon-wrench'),
(14, 'Konfigurasi Pengiriman', 'admin/konfigurasi_pengiriman', '2019-03-22 13:25:53', 'admin@admin.com', 'glyphicon glyphicon-facetime-video');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_kota`
--

CREATE TABLE `m_kota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kota`
--

INSERT INTO `m_kota` (`id`, `nama_kota`, `tgl_input`, `email`) VALUES
(1, 'Pamekasan', NULL, NULL),
(2, 'Surabaya', '2019-03-22 14:23:49', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `m_kurir`
--

CREATE TABLE `m_kurir` (
  `id` int(11) NOT NULL,
  `nama_kurir` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kurir`
--

INSERT INTO `m_kurir` (`id`, `nama_kurir`, `tgl_input`, `email`) VALUES
(1, 'JNE', '2019-03-22 14:23:57', 'admin@admin.com'),
(2, 'J&T', '2019-03-22 14:24:03', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `rating_toko` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `nama_penjual` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `asal_kota` varchar(50) DEFAULT NULL,
  `nama_toko` varchar(50) DEFAULT NULL,
  `status_buka` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `penginput` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `rating_toko`, `email`, `no_hp`, `nama_penjual`, `alamat`, `asal_kota`, `nama_toko`, `status_buka`, `password`, `tgl_input`, `foto`, `penginput`) VALUES
(5, 'New Comers', 'badminlive@gmail.com', '+6281216799117', 'Hasbi Mukhtar', 'Jalan Nugroho II/4', '1', 'Badminlive', 'Aktif', 'badminlive', '2019-03-22 13:04:17', 'foto_profile1.PNG', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$ayaNmOM6rvWbKbOzCEq34Oorb51Qw5CQCf0TwmTmYFwdmIHu6nqF2', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1553300934, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(6, '::1', 'Hasbi Mukhtar', '$2y$10$YBaAu7ps7Zbp28B9sdwj5O3J2wCHOSHudx82xIdLJSqJlM6NMHaem', 'badminlive@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1553228702, NULL, 1, 'Hasbi Mukhtar', NULL, 'Badminlive', '+6281216799117'),
(8, '::1', 'Adib', '$2y$10$OtbHiQIoKKHdwGY66NdPHeNrTBbCrRORIeD2Tn5DgGo3Se3j/4XCi', 'adib@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1553264299, NULL, 1, 'Adib', NULL, 'Pembeli', '+6281216799117');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(7, 6, 3),
(9, 8, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kota`
-- (See below for the actual view)
--
CREATE TABLE `view_kota` (
`id` int(11)
,`nama_kota` varchar(50)
,`tgl_input` datetime
,`email` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_kota`
--
DROP TABLE IF EXISTS `view_kota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kota`  AS  select `m_kota`.`id` AS `id`,`m_kota`.`nama_kota` AS `nama_kota`,`m_kota`.`tgl_input` AS `tgl_input`,`m_kota`.`email` AS `email` from `m_kota` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapping_kurir`
--
ALTER TABLE `mapping_kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapping_menu`
--
ALTER TABLE `mapping_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kota`
--
ALTER TABLE `m_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kurir`
--
ALTER TABLE `m_kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapping_kurir`
--
ALTER TABLE `mapping_kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapping_menu`
--
ALTER TABLE `mapping_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_kota`
--
ALTER TABLE `m_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_kurir`
--
ALTER TABLE `m_kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
