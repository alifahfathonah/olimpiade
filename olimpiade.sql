-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 08:51 AM
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
-- Database: `olimpiade`
--

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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `penginput` varchar(50) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `aktif` varchar(50) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `aktif`, `waktu`, `tgl_input`, `email`) VALUES
(3, 'Kelas X', 'Tidak Aktif', 120, '2019-03-27 11:25:40', 'admin@admin.com');

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
(1, 'Olimpiade Liga Siswa', 'Olimpiade Liga Siswa', 'Join Us to the next level', '+62 813-5788-6143', 'Surabaya', '2019-03-26 15:54:19', 'admin@admin.com', 'Olimpiade Untuk Siswa');

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
(16, 'admin', 'Konfigurasi', '2019-03-22 10:29:51', 'admin@admin.com'),
(19, 'admin', 'Data Siswa', '2019-03-26 20:35:09', 'admin@admin.com'),
(20, 'admin', 'Data Kelas', '2019-03-26 20:39:28', 'admin@admin.com'),
(21, 'admin', 'Konfigurasi Sekolah', '2019-03-26 20:41:18', 'admin@admin.com'),
(22, 'admin', 'Data Soal', '2019-03-26 20:41:51', 'admin@admin.com'),
(23, 'admin', 'Data Guru', '2019-03-26 20:42:18', 'admin@admin.com');

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
(3, 'Data Guru', 'guru', '2019-03-26 20:36:55', 'admin@admin.com', 'glyphicon glyphicon-th'),
(4, 'Data Siswa', 'siswa', '2019-03-26 20:34:55', 'admin@admin.com', 'glyphicon glyphicon-heart'),
(5, 'Master Sekolah', 'sekolah', '2019-03-26 20:37:09', 'admin@admin.com', 'glyphicon glyphicon-barcode'),
(7, 'Data Soal', 'soal', '2019-03-26 20:41:40', 'admin@admin.com', 'glyphicon glyphicon-fire'),
(13, 'Konfigurasi', 'backend/admin', '2019-03-22 10:29:40', 'admin@admin.com', 'glyphicon glyphicon-wrench'),
(14, 'Konfigurasi Sekolah', 'admin/konfigurasi_pengiriman', '2019-03-26 20:41:08', 'admin@admin.com', 'glyphicon glyphicon-facetime-video'),
(15, 'Data Kelas', 'kelas', '2019-03-26 20:40:24', 'admin@admin.com', 'glyphicon glyphicon-refresh');

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
-- Table structure for table `m_sekolah`
--

CREATE TABLE `m_sekolah` (
  `id` int(11) NOT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_sekolah`
--

INSERT INTO `m_sekolah` (`id`, `sekolah`, `tgl_input`, `email`) VALUES
(1, 'SMAN 1 ', '2019-03-26 16:23:48', 'admin@admin.com'),
(2, 'SMAN 2', '2019-03-26 16:23:58', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `email`, `password`, `sekolah`, `tgl_input`, `no_hp`, `tgl_lahir`, `jenis_kelamin`) VALUES
(4, 'tsabbit aqdami', 'tsabbitaqdami@gmail.com', 'tsabbit', '1', '2019-03-27 05:56:08', '+6281216799117', NULL, 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `soal_esay`
--

CREATE TABLE `soal_esay` (
  `id` int(11) NOT NULL,
  `isi_soal_esay` text NOT NULL,
  `idkelas` int(11) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_esay`
--

INSERT INTO `soal_esay` (`id`, `isi_soal_esay`, `idkelas`, `email`, `tgl_input`) VALUES
(3, '<p><img alt=\"\" height=\"300\" src=\"/olimpiade/backend/kcfinder/upload/images/kaka(1).jpg\" width=\"300\" /></p>\r\n', 3, 'admin@admin.com', '2019-03-29 13:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `soal_ganda`
--

CREATE TABLE `soal_ganda` (
  `id` int(11) NOT NULL,
  `isi_soal` text NOT NULL,
  `pilihan1` varchar(50) NOT NULL,
  `pilihan2` varchar(50) NOT NULL DEFAULT '0',
  `pilihan3` varchar(50) NOT NULL DEFAULT '0',
  `pilihan4` varchar(50) NOT NULL DEFAULT '0',
  `pilihan5` varchar(50) NOT NULL DEFAULT '0',
  `kunci` varchar(50) NOT NULL DEFAULT '0',
  `idkelas` int(11) NOT NULL DEFAULT '0',
  `namakelas` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_ganda`
--

INSERT INTO `soal_ganda` (`id`, `isi_soal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `kunci`, `idkelas`, `namakelas`, `email`, `tgl_input`) VALUES
(2, '<p><img alt=\"\" height=\"63\" src=\"/olimpiade/backend/kcfinder/upload/images/Logo.PNG\" width=\"171\" /></p>\r\n', 'Aangq', 'Avatarq', 'Koi dan Juiq', 'Koi dan Jui ama alysq', 'Si Rabq', '-', 3, '0', 'admin@admin.com', '2019-03-29 13:58:09');

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
(1, '127.0.0.1', 'administrator', '$2y$12$ayaNmOM6rvWbKbOzCEq34Oorb51Qw5CQCf0TwmTmYFwdmIHu6nqF2', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1553838226, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(6, '::1', 'Hasbi Mukhtar', '$2y$10$SvR6P9EKY2aHXTRsJ2imjeohzzEWNSA1zgTCvGK6Wj.Qy/1Epp7My', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1553228702, NULL, 1, 'Hasbi Mukhtar', NULL, 'SMAN 2', '+6281216799117'),
(13, '::1', 'tsabbit aqdami', '$2y$10$By0pXUHiWgKEya.E461wzOrZE7ZzHoiEVFa8tTkeDOWr7MfWDdiK.', 'tsabbitaqdami@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1553640969, NULL, 1, 'tsabbit aqdami', NULL, '1', '+6281216799117');

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
(14, 13, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kota`
-- (See below for the actual view)
--
CREATE TABLE `view_kota` (
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
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
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
-- Indexes for table `m_kurir`
--
ALTER TABLE `m_kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_sekolah`
--
ALTER TABLE `m_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal_esay`
--
ALTER TABLE `soal_esay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal_ganda`
--
ALTER TABLE `soal_ganda`
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
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_kurir`
--
ALTER TABLE `m_kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_sekolah`
--
ALTER TABLE `m_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soal_esay`
--
ALTER TABLE `soal_esay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soal_ganda`
--
ALTER TABLE `soal_ganda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
