-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Sep 2020 pada 14.22
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

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
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tagihan_bulanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `tagihan_bulanan`) VALUES
(1, 'Rekayasa Perangkat Lunak', 200000),
(8, 'Audio Video', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `logo` varchar(452) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `logo`) VALUES
(1, 'SMK Negeri 1 Percut Sei Tuan', 'unnamed.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `tanggal_lahir`, `nama`, `id_jurusan`, `kelas`) VALUES
(1, 1234, '12-02-2001', 'Linus Torvald', 1, 1),
(8, 1234, '12-02-2001', 'test 1', 5, 2),
(11, 1235, '12-02-2001', 'Laurentius Rando', 8, 2),
(12, 8765, '12-02-2001', 'Laurentius Rando Simamora', 1, 3),
(20, 0, '12-02-2001', 'ASDASD', 5, 5),
(24, 0, '12-02-2001', 'ASDASD', 5, 5),
(28, 35346, '12-02-2001', 'ASDASD', 5, 5),
(32, 35346, '12-02-2001', 'ASDASD', 5, 5),
(36, 35346, '12-02-2001', 'ASDASD', 5, 5),
(40, 35346, '12-02-2001', 'ASDASD', 5, 5),
(44, 35346, '12-02-2001', 'ASDASD', 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tahun_ajaran` varchar(128) NOT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `tanggal_bayar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
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
(160, 1235, '2019/2020', 10, '12-09-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `tahun_awal` varchar(128) NOT NULL,
  `tahun_akhir` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_awal`, `tahun_akhir`) VALUES
(8, '2019', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `gambar`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Admin', 'zgamingxxvi@gmail.com', 'cropped-logo-kpu-medan.png', '$2y$10$J8XKtcR1cePWBsA80LoJyOpS0vO6fHmRMx4PophM/sEHfqGCegtJy', 1, 1, 1588905978),
(5, 'Muhammad Zakaria Santoso', 'zakariasantoso@yahoo.com', '14808.jpg', '$2y$10$1LbmrMBnYs8s0CKBwsgVIeTUpwWcvmGGG34r55HRxCSbSR0mvO8T.', 2, 1, 1588926161),
(6, 'Padel', 'fadelmuhammad289@gmail.com', 'default.jpg', '$2y$10$r4XUu6dhVfVnMeeQHYrC2Ou3UvFD.Tje7NDCNIT2fYKfk1kAARNry', 2, 1, 1596523467);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
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
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'spp'),
(3, 'menu'),
(4, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
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
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
