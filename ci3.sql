-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2021 at 06:08 PM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT '0',
  `password` varchar(50) DEFAULT '0',
  `nama` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '123456', 'Fikri Firman Fadilah');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `sampul` varchar(128) NOT NULL,
  `kode_buku` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `th_terbit` varchar(50) DEFAULT NULL,
  `rak_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `sampul`, `kode_buku`, `judul`, `penerbit`, `pengarang`, `th_terbit`, `rak_id`, `jumlah`, `ket`) VALUES
(1, '', '9786026417374', 'Buku Ajar Mata Kuliah Bahasa Indonesia : Pendekatan Saintifik', 'Indomedia Pustaka', 'Solehun ,S.Pd., M.Pd.', '2018', 1, 18, 'Buku ini disusun dengan tujuan menyediakan materi pembelajaran bahasa Indonesia. Materi dan tugas-tugas dalam buku ajar ini diorganisasikan ke dalam empat siklus pembelajaran, yaitu mengamti, menanya, mengumpulkan informasi, mengasosiasi, dan mengomunikasikan. Selain itu, untuk keperluan pengayaan dan evaluasi. Setiap unit materi dilengkapi dengan latihan tugas terstruktur.'),
(2, '', '9786020459721', 'Pemrograman Android & Database', 'Elex Media Komputindo', 'Abdul Kadir', '2018', 2, 20, 'Buku yang sangat bermanfaat untuk mempelajari pembuatan aplikasi Android yang menyimpan data dalam bentuk database. Buku ini mengupas materi-materi menarik, yang dibahas langkah demi langkah sehingga memudahkan bagi siapa saja untuk mempraktikkannya.     Dasar-dasar pemrograman Web diberikan pada buku ini, dari HTML, CSS, JavaScript, jQuery hingga PHP. Selain itu, dasar pengaksesan database MySQL melalui phpMyAdmin dan juga melalui skrip PHP ikut dijelaskan. Contoh aplikasi Android untuk mengelola data inventori laboratorium dan juga aplikasi Internet of Things untuk mengontrol sejumlah lampu disertakan pada buku ini.'),
(4, '', '9789792963809', 'Logika dan Matematika', ' Andi Publisher', '', '2019', 2, 10, 'Buku Logika & Matematika ini dapat digunakan sebagai buku ajar atau referensi yang menunjang pembelajaran mata kuliah Matematik Diskrit. Dengan mempelajari buku ini, mahasiswa diharapkan mampu meningkatkan kemampuannya dalam berpikir logis, kreatif, dan kritis. Kemampuan itu tentunya akan sangat berguna bagi mahasiswa/pembaca dalam menunjang pengembang sistem informasi, pengembang multimedia/game, dan kompetensi yang relevan.');

--
-- Triggers `buku`
--
DELIMITER $$
CREATE TRIGGER `buku_before_delete` BEFORE DELETE ON `buku` FOR EACH ROW BEGIN

DELETE FROM peminjaman WHERE buku_id = OLD.buku_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `kode_member` varchar(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `kode_member`, `nama`, `alamat`, `no_identitas`) VALUES
(1, '1703040024', 'Fikri Firman Fadilah', 'Wangon', '081227853507');

--
-- Triggers `member`
--
DELIMITER $$
CREATE TRIGGER `member_before_delete` BEFORE DELETE ON `member` FOR EACH ROW BEGIN

DELETE FROM peminjaman WHERE member_id = OLD.member_id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `jumlah_pinjam` int(11) DEFAULT NULL,
  `tgl_pengembalian` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `ket_pinjam` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `member_id`, `buku_id`, `jumlah_pinjam`, `tgl_pengembalian`, `tgl_pinjam`, `tgl_kembali`, `status`, `ket_pinjam`) VALUES
(28, 1, 4, 10, 2020, '2019-12-24', '2019-12-31', 'Kembali', 'DSDSD'),
(29, 1, 4, 2, NULL, '2019-12-24', '2019-12-02', 'Pinjam', 'dsds'),
(32, 1, 1, 2, 2020, '2019-12-24', '2019-12-31', 'Kembali', 'sadsd');

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `peminjaman_after_insert` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN

UPDATE buku
SET jumlah = jumlah-NEW.jumlah_pinjam WHERE buku_id = NEW.buku_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `peminjaman_after_update` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN

IF(NEW.status = 'Kembali') THEN
UPDATE buku
SET jumlah = jumlah+OLD.jumlah_pinjam WHERE buku_id = NEW.buku_id;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `rak_id` int(11) NOT NULL,
  `nama_rak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`rak_id`, `nama_rak`) VALUES
(1, 'Rak 1'),
(2, 'Rak 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`),
  ADD KEY `FK_buku_rak` (`rak_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD KEY `FK_peminjaman_member` (`member_id`),
  ADD KEY `FK_peminjaman_buku` (`buku_id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`rak_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `rak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `FK_buku_rak` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`rak_id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_peminjaman_buku` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`),
  ADD CONSTRAINT `FK_peminjaman_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
