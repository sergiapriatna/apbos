-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 08:15 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bosapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(3) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `nidn` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `namalengkap`, `nidn`, `username`, `password`, `jabatan`, `status`, `foto`) VALUES
(1, 'ali ahmadi', '324235534', 'ali', '86318e52f5ed4801abe1d13d509443de', 'dosen', 'aktif', 'ali.jpg'),
(2, 'benie', '34234252546', 'benie', 'benie', 'dosen', 'aktif', 'beni.jpg'),
(5, 'Agin suragin', '345436345', 'agien', 'bfbefd53a8eefeab4f2ad065f54308c3', 'Dosen', 'nonaktif', 'img003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `judul_skripsi`
--

CREATE TABLE `judul_skripsi` (
  `id` int(3) NOT NULL,
  `judulskripsi` varchar(255) NOT NULL,
  `mahasiswa` varchar(100) NOT NULL,
  `dospem1` varchar(100) NOT NULL,
  `dospem2` varchar(100) NOT NULL,
  `kategoriskripsi` varchar(100) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_skripsi`
--

INSERT INTO `judul_skripsi` (`id`, `judulskripsi`, `mahasiswa`, `dospem1`, `dospem2`, `kategoriskripsi`, `tahun`, `status`, `link`) VALUES
(1, 'wewewe', 'nurul', 'ali', 'ali', 'Management_Data', '2020', 'aktif', 'www.unla.co.id'),
(2, 'trtrhthefdbvc', 'mhs', 'benie', 'ali', 'Jaringan', '2019', 'aktif', 'wewrfasd');

-- --------------------------------------------------------

--
-- Table structure for table `kartubimbingan`
--

CREATE TABLE `kartubimbingan` (
  `id` int(11) NOT NULL,
  `id_mhs` int(3) NOT NULL,
  `id_dsn` int(3) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `tanggalbimbingan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_skripsi`
--

CREATE TABLE `kategori_skripsi` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_skripsi`
--

INSERT INTO `kategori_skripsi` (`id`, `nama`) VALUES
(2, 'Management_Data'),
(3, 'Security'),
(4, 'Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(3) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `npm` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tahunangkatan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `namalengkap`, `npm`, `username`, `password`, `tahunangkatan`, `status`, `foto`) VALUES
(3, 'nurul', '343243', 'nurul', '123', '2019', 'nonaktif', 'nurul.jpg'),
(4, 'seegies', '4115563453735', 'sergi', '8b8d481c6dcdbd24b4e43825c5345309', '2017', 'aktif', 'BELAKANG_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `id` int(3) NOT NULL,
  `id_user` int(4) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartubimbingan`
--
ALTER TABLE `kartubimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_skripsi`
--
ALTER TABLE `kategori_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kartubimbingan`
--
ALTER TABLE `kartubimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_skripsi`
--
ALTER TABLE `kategori_skripsi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
