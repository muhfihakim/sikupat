-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2023 at 11:48 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikupat`
--

-- --------------------------------------------------------

--
-- Table structure for table `sikupat`
--

CREATE TABLE `sikupat` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `kotakab` varchar(255) NOT NULL,
  `jenisidentitas` varchar(255) NOT NULL,
  `noidentitas` varchar(255) NOT NULL,
  `nobadge` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jammasuk` time NOT NULL,
  `jamkeluar` time NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `keluarperangkat` varchar(255) NOT NULL,
  `masukperangkat` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `user`, `pwd`) VALUES
(4, 'Muhammad Luthfi Hakim', 'luthfi', '$2y$10$L55IfSCvo7CPtDP/VbK9QO3MnnG/Lh8w5B9JCfbZuTP3M5ejeN8He'),
(5, 'Tio Hanapiandi', 'Tio', '$2y$10$37j.ZFRlvYmB6vrZULsXNOoTvB92zMdNkMRqb3qaq.1sLuzREHWsi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sikupat`
--
ALTER TABLE `sikupat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sikupat`
--
ALTER TABLE `sikupat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
