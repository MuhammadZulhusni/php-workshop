-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8889
-- Generation Time: May 16, 2024 at 03:51 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `name`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Zulhusnii', 'BCS2111-1', 'zulhusni@gmail.com', 'computer science', '65674574e1b8f.jpg'),
(7, 'Syakirin', 'BCS2111-4', 'syak@gmail.com', 'computer science', 'nsx.jpeg'),
(9, 'Nurul', 'BCS2111-2', 'nurl@gmail.com', 'computer science', 'nsx.jpeg'),
(10, 'Siti', 'BCS2111-6', 'siti@gmail.com', 'business', 'nsx.jpeg'),
(13, 'Yana', 'BCS2111-9', 'yana@gmail.com', 'business', 'Lambo.jpg'),
(14, 'Tunku', 'BCS2111-9', 'tun@gmail.com', 'account', 'nsx.jpeg'),
(16, 'Amirul', 'BCS222-1', 'rul@gmail.com', 'computer science', 'Lambo.jpg'),
(26, 'Zlhsny', 'BCS2112-7', 'zlhsny@gmail.com', 'computer science', 'nsx.jpeg'),
(47, 'Nati', 'BCS2222-5', 'natinun@gmail.com', 'account', 'Lambo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'zul', '$2y$10$kiqvAkgFa.hHSJaBcvJ9l.qCB5qRPP.YGsvuDTvtm0fXiAZXYLsS6'),
(2, 'zulhusni', '$2y$10$CEnzAhn49bFb9UcooRc66ed9mPm0R1xK4e4aFOGBh92LozF29wCgm'),
(3, 'man', '$2y$10$EIb9UkMF7u4CsRLtm7VKT.U0wqKt6c8Xf1G0TGOhniBFbZUVMpGZq'),
(4, 'li', '$2y$10$SE3sPwhn5VBcigNK5IHCD.r9nYhIgAMec6qVdBkdnx.fENFGxCPBi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
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
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
