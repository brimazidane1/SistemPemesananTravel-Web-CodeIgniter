-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2020 at 12:22 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelajap`
--

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `id_armada` int(11) NOT NULL,
  `mobil` varchar(255) NOT NULL,
  `no_pol` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `id_travel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`id_armada`, `mobil`, `no_pol`, `driver`, `nohp`, `id_travel`) VALUES
(9, 'Innova', 'BM 1234 NM', 'Ega', '08127542871', 1),
(10, 'NiiSans1', 'BM 6671 GG1', 'Sovir1', '081344211411', 2),
(11, 'Innova', 'BM 6671 GGs', 'Sovirs', '08134421141', 4);

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `umur` int(5) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `tempat_duduk` varchar(3) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `kode_verifikasi` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `id_trayek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `nama`, `jk`, `umur`, `alamat`, `email`, `nohp`, `tempat_duduk`, `paket`, `jenis_pembayaran`, `bukti_pembayaran`, `kode_verifikasi`, `status`, `id_trayek`) VALUES
(78, 'keren', 'Laki-Laki', 23, 'jl kesana', 'keren@gmail.com', '082174497752', '2_3', '', 'Transfer', '', '0d85cGG16671BMPekanbaruDumai301120Siang', 0, 11),
(79, 'sadasd', 'Laki-Laki', 12, '2esdadasda', 'keren@gmail.com', '12312312312', '1_1', '', 'Transfer', '', 'a6708GG16671BMPekanbaruDumai301120Siang', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `rute_dari` varchar(255) NOT NULL,
  `rute_ke` varchar(255) NOT NULL,
  `harga` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `rute_dari`, `rute_ke`, `harga`) VALUES
(5, 'Pekanbaru', 'Dumai', 200000),
(6, 'Dumai', 'Pekanbaru', 200000),
(7, 'Palembang', 'Pekanbaru', 500001),
(8, 'Pekanbaru', 'Palembang', 500001),
(9, 'Solok', 'Pekanbaru', 620000),
(10, 'Pekanbaru', 'Solok', 620000),
(11, 'Bangkinang', 'Bukit Tinggi', 500000),
(12, 'Bukit Tinggi', 'Bangkinang', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id_travel` int(11) NOT NULL,
  `nama_travel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id_travel`, `nama_travel`) VALUES
(1, 'PT Mantap'),
(2, 'PT Ajib boyy'),
(3, 'PT Keren'),
(4, 'PT Begete'),
(5, 'PT Sejahtera'),
(6, 'PT travel');

-- --------------------------------------------------------

--
-- Table structure for table `trayek`
--

CREATE TABLE `trayek` (
  `id_trayek` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `sisa_tempat_duduk` varchar(255) NOT NULL,
  `sisa_paket` varchar(255) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `id_armada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trayek`
--

INSERT INTO `trayek` (`id_trayek`, `tanggal`, `waktu`, `sisa_tempat_duduk`, `sisa_paket`, `id_rute`, `id_armada`) VALUES
(9, '2020-11-28', 'Pagi', '1_1,2_1,2_2,2_3,3_1,3_2,3_3', '1_1,1_2,1_3,1_4,1_5', 6, 10),
(10, '2020-11-28', 'Pagi', '1_1,2_1,2_2,2_3,3_1,3_2,3_3', '1_1,1_2,1_3,1_4,1_5', 7, 11),
(11, '2020-11-30', 'Siang', '2_1,2_2,3_1,3_2', '1_1,1_2,1_3,1_4,1_5', 5, 10),
(12, '2020-11-30', 'Siang', '1_1,2_1,2_2,2_3,3_1,3_2,3_3', '1_1,1_2,1_3,1_4,1_5', 6, 9),
(13, '2020-12-01', 'Siang', '1_1,2_1,2_2,2_3,3_1,3_2,3_3', '1_1,1_2,1_3,1_4,1_5', 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `no_hp`, `created_at`, `id_role`) VALUES
(2, 'tes', 'tes', '$2y$10$3FMPvkQTDS2cQyKKmwB5jObjQTxO2qXG.BmqkIfUKuacmIoRiflxG', '1234567891234', '2020-11-18 05:59:49', 1),
(3, 'admin', 'admin', '$2y$10$KWinO/3fzK8439Z/0rUJ7O0P0zbGCVGo17rvTkd6Iz41EjzH2LYUm', '12212412412', '2020-11-18 06:00:26', 2),
(4, 'Sovirs', 'driver', '$2y$10$Tb0hSbopR2qL2IxOIeE8ee23HjeQg340uuxtXZbLcIsoVOn4bntnm', '12412412412', '2020-11-24 14:00:28', 3),
(5, 'keren banget', 'keren', '$2y$10$kZnv4x5/TksXDKJbIyu/IuAePpSKOkkg1PMd1BcnTY3LqzVSpjKWW', '081234567899', '2020-11-18 07:03:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(5, 2, 5),
(11, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'superadmin'),
(5, 'admin'),
(6, 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub` int(11) NOT NULL,
  `id_user_menu` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub`, `id_user_menu`, `judul`, `url`, `icon`) VALUES
(1, 1, 'Profile', 'superadmin', 'nav-icon fas fa-id-badge'),
(2, 1, 'Data PO Travel', 'superadmin/data_po_travel', 'nav-icon fas fa-suitcase'),
(3, 1, 'Kelola User', 'superadmin/kelola_user', 'nav-icon fas fa-users'),
(4, 1, 'Kelola Menu', 'superadmin/kelola_menu', 'nav-icon fas fa-folder'),
(5, 1, 'Kelola Submenu', 'superadmin/kelola_submenu', 'nav-icon fas fa-folder-open'),
(6, 1, 'Kelola Akses', 'superadmin/kelola_akses', 'nav-icon fas fa-users-cog'),
(7, 5, 'Profile', 'admin', 'nav-icon fas fa-id-badge'),
(8, 5, 'Data Travel', 'admin/data_travel', 'nav-icon fas fa-bus'),
(9, 5, 'Data Armada', 'admin/data_armada', 'nav-icon fas fa-subway'),
(10, 5, 'Data Trayek', 'admin/data_trayek', 'nav-icon fas fa-route'),
(11, 5, 'Data Penumpang', 'admin/data_penumpang', 'nav-icon fas fa-user'),
(14, 5, 'Data Rute', 'admin/data_rute', 'nav-icon fas fa-map-marker-alt'),
(15, 6, 'Profile', 'driver', 'nav-icon fas fa-id-badge'),
(16, 6, 'Data Penumpang', 'driver/data_penumpang', 'nav-icon fas fa-people-carry'),
(17, 6, 'Data Trayek', 'driver/data_trayek', 'nav-icon fas fa-route');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id_armada`),
  ADD KEY `armada_travel` (`id_travel`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`),
  ADD KEY `penumpang_trayek` (`id_trayek`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id_travel`);

--
-- Indexes for table `trayek`
--
ALTER TABLE `trayek`
  ADD PRIMARY KEY (`id_trayek`),
  ADD KEY `trayek_armada` (`id_armada`),
  ADD KEY `trayek_rute` (`id_rute`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role` (`id_role`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useraccmenu_role` (`id_role`),
  ADD KEY `useraccmenu_usermenu` (`id_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `usersubmenu_usermenu` (`id_user_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armada`
--
ALTER TABLE `armada`
  MODIFY `id_armada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trayek`
--
ALTER TABLE `trayek`
  MODIFY `id_trayek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `armada`
--
ALTER TABLE `armada`
  ADD CONSTRAINT `armada_travel` FOREIGN KEY (`id_travel`) REFERENCES `travel` (`id_travel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD CONSTRAINT `penumpang_trayek` FOREIGN KEY (`id_trayek`) REFERENCES `trayek` (`id_trayek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trayek`
--
ALTER TABLE `trayek`
  ADD CONSTRAINT `trayek_armada` FOREIGN KEY (`id_armada`) REFERENCES `armada` (`id_armada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trayek_rute` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `useraccmenu_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `useraccmenu_usermenu` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `usersubmenu_usermenu` FOREIGN KEY (`id_user_menu`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
