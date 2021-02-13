-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 03:47 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bookingoutdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ft` text NOT NULL,
  `level` enum('Admin','Author') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `ft`, `level`) VALUES
('ADM0102312', 'Admin Adventure', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user.png', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alat`
--

CREATE TABLE `tb_alat` (
  `id_alat` varchar(15) NOT NULL,
  `nm_alat` varchar(100) NOT NULL,
  `spesifikasi` text NOT NULL,
  `harga_sewa` varchar(20) NOT NULL,
  `ft_alat` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `stok` varchar(15) NOT NULL,
  `id_admin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alat`
--

INSERT INTO `tb_alat` (`id_alat`, `nm_alat`, `spesifikasi`, `harga_sewa`, `ft_alat`, `tgl_input`, `stok`, `id_admin`) VALUES
('AL12000', 'matras', '<p>polos</p>\r\n\r\n<p>berhias</p>\r\n', '5000', 'download (2).jpg', '2019-03-14 00:05:27', '10', 'ADM0102312'),
('AL15429', 'Tenda Consina Isi 4', '<p>barang bisa di booking kondisi sesuai dengan yang di foto kapasitas 4 orang.</p>\r\n', '50000', 'thss.jpg', '2019-03-12 17:11:54', '4 Tendah', 'ADM0102312'),
('AL25730', 'Sliping baq', '<p>bahan dalam polar</p>\r\n\r\n<p>warna&nbsp;biru&nbsp;hitam ping&nbsp;</p>\r\n', '50000', 'images (2).jpg', '2019-03-13 22:57:14', '5', 'ADM0102312'),
('AL27006', 'tragia', '<p>kecil</p>\r\n\r\n<p>besar</p>\r\n', '50000', 'download (5).jpg', '2019-03-14 00:04:16', '2', 'ADM0102312'),
('AL31977', 'carrel', '<p>isi 67 L</p>\r\n', '50000', '685e50b986a59a4bbfab49cece5fc92f.jpg', '2019-03-13 22:55:05', '5', 'ADM0102312'),
('AL7573', 'nesting alat masak yang dibutuhkan saat kemping', '<p>tentara</p>\r\n', '20000', 'download (4).jpg', '2019-03-21 21:52:09', '5', 'ADM0102312'),
('AL84969', 'kompr petak', '<p>empat tungku</p>\r\n', '20000', 'download (3).jpg', '2019-03-14 13:03:35', '5', 'ADM0102312'),
('AL91827', 'gas', '<p>mini</p>\r\n', '1000', 'download (7).jpg', '2019-03-14 00:06:04', '10', 'ADM0102312'),
('AL98878', 'senter', '<p>warna hitam</p>\r\n', '20000', 'download (6).jpg', '2019-03-21 21:36:14', '4', 'ADM0102312');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id_booking` varchar(15) NOT NULL,
  `id_alat` varchar(15) NOT NULL,
  `id_costumer` varchar(15) NOT NULL,
  `tgl_pakai` date NOT NULL,
  `lama_booking` int(15) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `jumlah` int(15) NOT NULL,
  `subtotal` varchar(20) DEFAULT NULL,
  `stt_booking` enum('Pending','Pengecekan','Lunas','Cancel','Checkout') NOT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `kode` varchar(3) DEFAULT NULL,
  `tgl_booking` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `id_alat`, `id_costumer`, `tgl_pakai`, `lama_booking`, `tgl_kembali`, `jumlah`, `subtotal`, `stt_booking`, `batas_waktu`, `kode`, `tgl_booking`) VALUES
('BK109895', 'AL67490', 'US527687', '2019-02-25', 1, '2019-02-26', 1, '17000', 'Lunas', NULL, '497', '2019-02-25 20:53:05'),
('BK114324', 'AL15429', 'US224994', '2020-05-21', 1, '2020-05-22', 1, '50000', 'Pending', NULL, NULL, '2020-05-21 20:54:22'),
('BK199554', 'AL19926', 'US448923', '2019-03-04', 1, '2019-03-05', 1, '30000', 'Lunas', NULL, '96', '2019-03-04 21:33:53'),
('BK217437', 'AL15429', 'US224994', '2019-03-21', 1, '2019-03-22', 1, '50000', 'Cancel', NULL, NULL, '2019-03-21 22:27:01'),
('BK343673', 'AL19926', 'US527687', '2019-02-25', 1, '2019-02-26', 1, '30000', 'Lunas', NULL, '118', '2019-02-25 22:27:17'),
('BK349006', 'AL19926', 'US527687', '2019-02-25', 1, '2019-02-26', 1, '30000', 'Lunas', NULL, '497', '2019-02-25 20:53:46'),
('BK380979', 'AL19926', 'US527687', '2019-02-25', 1, '2019-02-26', 1, '30000', 'Lunas', NULL, '497', '2019-02-25 20:52:51'),
('BK490988', 'AL19926', 'US527687', '2019-02-27', 1, '2019-02-28', 1, '30000', 'Pengecekan', NULL, '395', '2019-02-27 20:03:15'),
('BK510237', 'AL25730', 'US224994', '2019-12-25', 1, '2019-12-26', 1, '50000', 'Checkout', '2019-12-25 21:34:23', '271', '2019-12-25 19:34:21'),
('BK515014', 'AL15429', 'US598602', '2019-03-12', 7, '2019-03-19', 1, '350000', 'Checkout', '2019-03-12 19:15:16', '325', '2019-03-12 17:14:50'),
('BK595956', 'AL15429', 'US624988', '2019-03-19', 2, '2019-03-21', 2, '200000', 'Lunas', NULL, '748', '2019-03-19 13:11:08'),
('BK626907', 'AL15429', 'US624988', '2019-03-19', 1, '2019-03-20', 1, '50000', 'Pending', NULL, NULL, '2019-03-19 13:20:52'),
('BK672014', 'AL19926', 'US527687', '2019-02-26', 1, '2019-02-27', 1, '30000', 'Lunas', NULL, '986', '2019-02-26 19:40:32'),
('BK716597', 'AL25730', 'US224994', '2019-03-21', 2, '2019-03-23', 2, '200000', 'Lunas', NULL, '444', '2019-03-21 22:30:15'),
('BK996583', 'AL25730', 'US224994', '2020-05-21', 1, '2020-05-22', 1, '50000', 'Pending', NULL, NULL, '2020-05-21 20:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_costumer`
--

CREATE TABLE `tb_costumer` (
  `id_costumer` varchar(15) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(65) NOT NULL,
  `ft` text NOT NULL,
  `tgl_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_costumer`
--

INSERT INTO `tb_costumer` (`id_costumer`, `nik`, `nama`, `jekel`, `nohp`, `alamat`, `email`, `ft`, `tgl_daftar`) VALUES
('US224994', '21312', 'coba', 'Laki-laki', '08123123', 'asdasd', 'asdsa@mail.com', 'user.png', '2019-03-21 22:26:31'),
('US600636', '1234567890', 'taben', 'Perempuan', '0822789', 'padang', 'tabenta', 'user.png', '2019-03-14 13:05:22'),
('US624988', '1234', 'ainul yr', 'Laki-laki', '0852567', 'padang', 'ainul.yandri@yahoo.con', 'user.png', '2019-03-19 13:09:38'),
('US637014', '341342342342', 'asdasdasda', 'Laki-laki', '0821312312', 'padang', 'asdasda@gmail.com', 'user.png', '2019-02-23 21:00:47'),
('US916246', '23123123', 'asdasdas', 'Laki-laki', '324234', 'asdasdas', 'coba@mail.com', 'user.png', '2019-12-25 19:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfirmasi`
--

CREATE TABLE `tb_konfirmasi` (
  `id_konfirmasi` varchar(15) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `id_costumer` varchar(15) NOT NULL,
  `norek_costumer` varchar(20) NOT NULL,
  `norek_tujuan` varchar(20) NOT NULL,
  `nm_bank` varchar(30) NOT NULL,
  `jlm_bayar` varchar(25) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konfirmasi`
--

INSERT INTO `tb_konfirmasi` (`id_konfirmasi`, `kode`, `id_costumer`, `norek_costumer`, `norek_tujuan`, `nm_bank`, `jlm_bayar`, `bukti_bayar`, `tgl_input`) VALUES
('KK1171663', '96', 'US448923', '123123123', '9871983712', 'Bank Bri', '100000', 'Desert.jpg', '2019-03-04 21:35:06'),
('KK2007637', '118', 'US527687', '324234', '9871983712', 'Bank Bni', '100000', 'Lighthouse.jpg', '2019-02-25 22:27:37'),
('KK4405765', '986', 'US527687', '32423423', '9871983712', 'Bank Bni', '12312312', 'Penguins.jpg', '2019-02-25 21:11:41'),
('KK7852115', '395', 'US527687', '1232312', '9871983712', 'Bank Bri', '31231231', 'Analisis Algoritma c.45.docx', '2019-02-27 20:03:36'),
('KK9421984', '444', 'US224994', '3432423', '9871983712', 'Bank Bni', '1000000', 'Chrysanthemum.jpg', '2019-03-21 22:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_costumer` varchar(15) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_costumer`, `username`, `password`) VALUES
('US224994', 'qwerty', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
('US600636', 'taben', '62f22378ae222f017b7dd81e745c214f'),
('US624988', 'ainulyr', '9422c84b3b30efa6ac72cffff96461aa'),
('US916246', 'qwertyuiop', '6eea9b7ef19179a06954edd0f6c05ceb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `tb_costumer`
--
ALTER TABLE `tb_costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_costumer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
