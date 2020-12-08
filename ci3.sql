-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2020 at 11:59 AM
-- Server version: 10.3.25-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `sampul` varchar(128) NOT NULL,
  `kode_buku` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `pengarang` varchar(128) NOT NULL,
  `th_terbit` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `sampul`, `kode_buku`, `judul`, `penerbit`, `pengarang`, `th_terbit`, `jumlah`, `ket`) VALUES
(5, '1.png', '978-602-1514-91-7', 'Algoritma dan Pemrograman dalam C++', 'Informatika', 'Rinaldi Munir', 'Februari 2016', 20, 'Buku Algoritma dan Pemrograman dalam Bahasa Pascal, C, dan C++ merupakan edisi baru dari buku sebelumnya, yaitu Algoritma dan Pemrograman dalam Bahasa Pascal dan C. Buku ini disusun bagi siapapun (siswa, mahasiswa, umum) yang ingin mempelajari bidang pemrograman.⁣⁣ ⁣⁣'),
(6, '2.png', '978-623-7131-25-0 ⁣', 'Social Media & Social Network', 'Informatika', 'I Putu Agus Eka Pratama ⁣', '2020', 50, 'Melalui buku ini kamu dapat mengetahui perkembangan social media dan social network dari waktu ke waktu beserta bisnis didalamnya, teknologi Augmented Reality, Machine Learning, dan Cloud Computing beserta dengan perannya pada social media dan social network, apa etika komputer dan etika internet serta bagaimana penerapannya dalam penggunaan social media.⁣⁣'),
(11, '3.png', '978-632-1514-91-8', 'Pemrograman Web', 'Informatika', 'Priyanto Hidayatulloh', 'Desember 2016', 10, 'Buku Pemrograman Web : Studi Kasus Web Sistem Informasi Akademik ini cocok untuk Mahasiswa/Siswa SMK dalam menyelesaikan tugas mata kuliah Pemrograman Web dan tugas akhir dengan topik web atau sistem informasi. Buku ini juga cocok untuk freelance programmer maupun programmer profesional yang bekerja di perusahaan serta orang awam terhadap dunia pemrograman web karena dijelaskan dari nol secara runtut dan terperinci dengan bahasa yang sederhana dan mudah dimengerti.⁣⁣⁣');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Aulia Ahmad Nabil', 'admin@gmail.com', 'default.png', '$2y$10$XhdnKJwu3rzqvY3uEy/S6OPx2.ZT33R65AZRb3eeFf4aIdijc4Bpu', 1, 1, 1605710844),
(2, 'BrondoL', 'idnbdy@gmail.com', 'default.png', '$2y$10$/7eJCYCazAadW0c9ffZst.12RGc49nqyvgOJnlgJfDlsDosT1QIla', 2, 1, 1605711513),
(4, 'Ahmad Nabil El Hafidz', 'nabilunited2@gmail.com', 'default.png', '$2y$10$t64n8X0CzTrfZzPs44yiTublxbMg1mY2GA1mPAXZUDy/MmKhRCfba', 2, 1, 1606900006);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(10, 1, 3),
(12, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `judul`) VALUES
(1, 'Admin', 'Admin'),
(2, 'User', 'User'),
(3, 'Perpus', 'Menu Perpustakaan'),
(4, 'Menu', 'Menu Web');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Daftar Buku', 'user', 'fas fa-fw fa-book', 1),
(3, 2, 'Buku Saya', 'user/edit', 'fas fa-fw fa-bookmark', 1),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'Submenu Management', 'menu/submenu', 'far fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 2, 'Riwayat Peminjaman', 'user/changepassword', 'fas fa-fw fa-shopping-cart', 1),
(11, 3, 'Data Buku', 'perpus', 'fas fa-fw fa-book', 1),
(12, 3, 'Data Member', 'perpus/datamember', 'fas fa-fw fa-users', 1),
(13, 3, 'Data Peminjaman', 'perpus/datapeminjaman', 'fas fa-fw fa-shopping-cart', 1),
(14, 3, 'Data Pengembalian', 'perpus/datapengembalian', 'fas fa-fw fa-sync-alt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'nabilunited2@gmail.com', 'mXiTbYYW3c4K0/FbHAfle8XiRZPgtEYh3cQ88CAgxzug7urihzWVYg4T/5eV6DDi7lS95aEZD7HhxoQatG7UKw==', 1606925055);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
