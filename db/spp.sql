-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 10:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tagihan_bulanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `tagihan_bulanan`) VALUES
(1, 'Rekayasa Perangkat Lunak', 200000),
(8, 'Audio Video', 150000),
(9, 'Teknik Komputer dan Jaringan', 200000),
(10, 'Teknik Broadcasting dan Film', 200000),
(11, 'Teknik Geomatika dan Geospasial', 100000),
(12, 'Teknik Ketenagalistrikkan', 150000),
(13, 'Teknik Mesin', 150000),
(14, 'Teknik Otomotif', 150000),
(15, 'Teknik Pengelasan', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `logo` varchar(452) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `logo`) VALUES
(1, 'E-SPP SMK Negeri 1 Percut Sei Tuan', 'e-spp1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tanggal_lahir` varchar(231) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `kelas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `tanggal_lahir`, `nama`, `id_jurusan`, `kelas`) VALUES
(8, 1234, '12-02-2001', 'test 1', 5, 2),
(20, 0, '12-02-2001', 'ASDASD', 5, 5),
(24, 0, '12-02-2001', 'ASDASD', 5, 5),
(28, 35346, '12-02-2001', 'ASDASD', 5, 5),
(32, 35346, '12-02-2001', 'ASDASD', 5, 5),
(36, 35346, '12-02-2001', 'ASDASD', 5, 5),
(40, 35346, '12-02-2001', 'ASDASD', 5, 5),
(44, 35346, '12-02-2001', 'ASDASD', 5, 5),
(51, 31012, '30-10-1997', 'Andi Prayogi', 9, 1),
(52, 31011, '07-07-1997', 'Andrean', 9, 1),
(120, 0, '', '', 0, 0),
(121, 0, '', '', 0, 0),
(122, 0, '', '', 0, 0),
(123, 0, '', '', 0, 0),
(124, 0, '', '', 0, 0),
(125, 0, '', '', 0, 0),
(126, 0, '', '', 0, 0),
(127, 0, '', '', 0, 0),
(128, 0, '', '', 0, 0),
(129, 0, '', '', 0, 0),
(130, 0, '', '', 0, 0),
(131, 0, '', '', 0, 0),
(132, 0, '', '', 0, 0),
(133, 0, '', '', 0, 0),
(134, 0, '', '', 0, 0),
(135, 0, '', '', 0, 0),
(136, 0, '', '', 0, 0),
(137, 0, '', '', 0, 0),
(138, 0, '', '', 0, 0),
(139, 0, '', '', 0, 0),
(140, 0, '', '', 0, 0),
(141, 0, '', '', 0, 0),
(142, 0, '', '', 0, 0),
(143, 0, '', '', 0, 0),
(144, 0, '', '', 0, 0),
(145, 0, '', '', 0, 0),
(146, 0, '', '', 0, 0),
(147, 0, '', '', 0, 0),
(148, 0, '', '', 0, 0),
(152, 0, '', '', 0, 0),
(153, 0, '', '', 0, 0),
(154, 0, '', '', 0, 0),
(155, 0, '', '', 0, 0),
(156, 0, '', '', 0, 0),
(157, 0, '', '', 0, 0),
(158, 0, '', '', 0, 0),
(159, 0, '', '', 0, 0),
(160, 0, '', '', 0, 0),
(161, 0, '', '', 0, 0),
(162, 0, '', '', 0, 0),
(163, 0, '', '', 0, 0),
(164, 0, '', '', 0, 0),
(165, 0, '', '', 0, 0),
(166, 0, '', '', 0, 0),
(167, 0, '', '', 0, 0),
(168, 0, '', '', 0, 0),
(169, 0, '', '', 0, 0),
(170, 0, '', '', 0, 0),
(171, 0, '', '', 0, 0),
(172, 0, '', '', 0, 0),
(173, 0, '', '', 0, 0),
(174, 0, '', '', 0, 0),
(175, 0, '', '', 0, 0),
(176, 0, '', '', 0, 0),
(177, 0, '', '', 0, 0),
(178, 0, '', '', 0, 0),
(179, 0, '', '', 0, 0),
(180, 0, '', '', 0, 0),
(184, 0, '', '', 0, 0),
(185, 0, '', '', 0, 0),
(186, 0, '', '', 0, 0),
(187, 0, '', '', 0, 0),
(188, 0, '', '', 0, 0),
(189, 0, '', '', 0, 0),
(190, 0, '', '', 0, 0),
(191, 0, '', '', 0, 0),
(192, 0, '', '', 0, 0),
(193, 0, '', '', 0, 0),
(194, 0, '', '', 0, 0),
(195, 0, '', '', 0, 0),
(196, 0, '', '', 0, 0),
(197, 0, '', '', 0, 0),
(198, 0, '', '', 0, 0),
(199, 0, '', '', 0, 0),
(200, 0, '', '', 0, 0),
(201, 0, '', '', 0, 0),
(202, 0, '', '', 0, 0),
(203, 0, '', '', 0, 0),
(204, 0, '', '', 0, 0),
(205, 0, '', '', 0, 0),
(206, 0, '', '', 0, 0),
(207, 0, '', '', 0, 0),
(208, 0, '', '', 0, 0),
(209, 0, '', '', 0, 0),
(210, 0, '', '', 0, 0),
(211, 0, '', '', 0, 0),
(212, 0, '', '', 0, 0),
(216, 0, '', '', 0, 0),
(217, 0, '', '', 0, 0),
(218, 0, '', '', 0, 0),
(219, 0, '', '', 0, 0),
(220, 0, '', '', 0, 0),
(221, 0, '', '', 0, 0),
(222, 0, '', '', 0, 0),
(223, 0, '', '', 0, 0),
(224, 0, '', '', 0, 0),
(225, 0, '', '', 0, 0),
(226, 0, '', '', 0, 0),
(227, 0, '', '', 0, 0),
(228, 0, '', '', 0, 0),
(229, 0, '', '', 0, 0),
(230, 0, '', '', 0, 0),
(231, 0, '', '', 0, 0),
(232, 0, '', '', 0, 0),
(233, 0, '', '', 0, 0),
(234, 0, '', '', 0, 0),
(235, 0, '', '', 0, 0),
(236, 0, '', '', 0, 0),
(237, 0, '', '', 0, 0),
(238, 0, '', '', 0, 0),
(239, 0, '', '', 0, 0),
(240, 0, '', '', 0, 0),
(241, 0, '', '', 0, 0),
(242, 0, '', '', 0, 0),
(243, 0, '', '', 0, 0),
(244, 0, '', '', 0, 0),
(248, 0, '', '', 0, 0),
(249, 0, '', '', 0, 0),
(250, 0, '', '', 0, 0),
(251, 0, '', '', 0, 0),
(252, 0, '', '', 0, 0),
(253, 0, '', '', 0, 0),
(254, 0, '', '', 0, 0),
(255, 0, '', '', 0, 0),
(256, 0, '', '', 0, 0),
(257, 0, '', '', 0, 0),
(258, 0, '', '', 0, 0),
(259, 0, '', '', 0, 0),
(260, 0, '', '', 0, 0),
(261, 0, '', '', 0, 0),
(262, 0, '', '', 0, 0),
(263, 0, '', '', 0, 0),
(264, 0, '', '', 0, 0),
(265, 0, '', '', 0, 0),
(266, 0, '', '', 0, 0),
(267, 0, '', '', 0, 0),
(268, 0, '', '', 0, 0),
(269, 0, '', '', 0, 0),
(270, 0, '', '', 0, 0),
(271, 0, '', '', 0, 0),
(272, 0, '', '', 0, 0),
(273, 0, '', '', 0, 0),
(274, 0, '', '', 0, 0),
(275, 0, '', '', 0, 0),
(276, 0, '', '', 0, 0),
(277, 12920, '01-01-2000', 'ALIFIAH HAFIZAH', 11, 1),
(278, 13020, '01-01-2000', 'AMALIA PUTRI', 11, 1),
(279, 13120, '01-01-2000', 'ANDIKA SETIAWAN', 11, 1),
(280, 13220, '01-01-2000', 'BASUKI RAHMAN', 11, 1),
(281, 13320, '01-01-2000', 'CAHYA KHAMISA', 11, 1),
(282, 13420, '01-01-2000', 'DELLA PUSPITASARI', 11, 1),
(283, 13520, '01-01-2000', 'DIA NOVIANTI PRATIWI', 11, 1),
(284, 13620, '01-01-2000', 'DWI WIDYA PUTRI', 11, 1),
(285, 13720, '01-01-2000', 'FASYA MAHARANI', 11, 1),
(286, 13820, '01-01-2000', 'HANA TASIA SIHITE', 11, 1),
(287, 13920, '01-01-2000', 'KHAIRUNNISA WARDATUL JANNAH SIJABAT', 11, 1),
(288, 14020, '01-01-2000', 'LILI ARISKA', 11, 1),
(289, 14120, '01-01-2000', 'MAULANA HABIBI', 11, 1),
(290, 14220, '01-01-2000', 'MHD ARFAN DIANSYAH', 11, 1),
(291, 14320, '01-01-2000', 'MUHAMMAD IQBAL ALBUQHORI', 11, 1),
(292, 14420, '01-01-2000', 'MUHAMMAD REYNALDI ANGGARA', 11, 1),
(293, 14520, '01-01-2000', 'NADIA JUWITA', 11, 1),
(294, 14620, '01-01-2000', 'NAZWA', 11, 1),
(295, 14720, '01-01-2000', 'NOPITA ANDINY', 11, 1),
(296, 14820, '01-01-2000', 'NUR SOFIANTI', 11, 1),
(297, 14920, '01-01-2000', 'RENDY', 11, 1),
(298, 15020, '01-01-2000', 'RIKA', 11, 1),
(299, 15120, '01-01-2000', 'SAKINAH', 11, 1),
(300, 15220, '01-01-2000', 'SEVYKA PUTRI', 11, 1),
(301, 15320, '01-01-2000', 'SHYNDI HAZILA PUTRI', 11, 1),
(302, 15420, '01-01-2000', 'SITI AISYAH AIDIL FITRIA WARDANA', 11, 1),
(303, 15520, '01-01-2000', 'SYARIF BIL MARUF ZAMZAMI', 11, 1),
(304, 15620, '01-01-2000', 'TASYA AZZAHRA', 11, 1),
(305, 15720, '01-01-2000', 'TEGAR WIJAYA', 11, 1),
(306, 15820, '01-01-2000', 'TIKA APRILIA', 11, 1),
(307, 15920, '01-01-2000', 'TRI NABILA AULIA', 11, 1),
(308, 16020, '01-01-2000', 'ZASKIA RAHMADHANIA AZ ZAHRA', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tahun_ajaran` varchar(128) NOT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `tanggal_bayar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `nis`, `tahun_ajaran`, `pembayaran_ke`, `tanggal_bayar`) VALUES
(151, 1235, '2019/2020', 1, '12-09-2020'),
(152, 1235, '2019/2020', 2, '12-09-2020'),
(153, 1235, '2019/2020', 3, '12-09-2020'),
(154, 1235, '2019/2020', 4, '12-09-2020'),
(155, 1235, '2019/2020', 5, '12-09-2020'),
(156, 1235, '2019/2020', 6, '12-09-2020'),
(157, 1235, '2019/2020', 7, '12-09-2020'),
(158, 1235, '2019/2020', 8, '12-09-2020'),
(159, 1235, '2019/2020', 9, '12-09-2020'),
(160, 1235, '2019/2020', 10, '12-09-2020'),
(161, 31012, '2019/2020', 1, '15-09-2020');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `tahun_awal` varchar(128) NOT NULL,
  `tahun_akhir` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_awal`, `tahun_akhir`) VALUES
(8, '2019', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `gambar`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Admin', 'zgamingxxvi@gmail.com', 'default.png', '$2y$10$J8XKtcR1cePWBsA80LoJyOpS0vO6fHmRMx4PophM/sEHfqGCegtJy', 1, 1, 1588905978),
(7, 'Fitri Kumala Sari', 'fitrikumalasari@gmail.com', 'default.jpg', '$2y$10$J8XKtcR1cePWBsA80LoJyOpS0vO6fHmRMx4PophM/sEHfqGCegtJy', 1, 1, 1588905978);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(8, 0, 3),
(10, 1, 3),
(13, 1, 4),
(16, 2, 4),
(17, 2, 2),
(18, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'spp'),
(3, 'menu'),
(4, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 4, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 4, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 4, 'Ubah Password', 'user/ubahPassword', 'fas fa-fw fa-key', 1),
(11, 2, 'Data Siswa', 'spp/siswa', 'fas fa-fw fa-user-graduate', 1),
(12, 1, 'Operator Management', 'admin/operator', 'fas fa-fw fa-user-friends', 1),
(13, 2, 'Jurusan', 'spp/jurusan', 'fas fa-fw fa-book-reader', 1),
(14, 2, 'Pembayaran SPP', 'spp', 'fas fa-fw fa-money-bill-wave-alt', 1),
(15, 2, 'Tahun Ajaran', 'spp/tahunAjaran', 'fas fa-fw fa-university', 1),
(16, 1, 'Data Pembayaran', 'admin/pembayaran', 'fas fa-fw fa-money-check-alt', 1),
(17, 1, 'Data Sekolah', 'admin/sekolah', 'fa-fw fas fa-school', 1),
(18, 2, 'Data Pembayaran SPP', 'spp/pembayaran', 'fas fa-fw fa-money-check-alt 	', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
