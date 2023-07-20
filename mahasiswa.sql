-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 02:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `nama` varchar(150) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Gojo Satouro', '123456789', 'gojo123@gmail.com', 'pembasmi iblis', '3.jpg'),
(2, 'Hu Tao', '121212522', 'hutao123@gmail.com', 'penggali kubur', '2.jpg'),
(3, 'Saitama', '121212122', 'botak123@gmail.com', 'menjadi pahlawan', '4.jpg'),
(4, 'Hu Tao', '121212123', 'tanjiro123@gmail.com', 'pembasmi iblis', '3.jpg'),
(5, 'Zoro', '123456789', 'zoro123@gmail.com', 'management', '2.jpg'),
(6, 'raiden', '121212522', 'raiden123@gmail.com', 'teknik memasak', '3.jpg'),
(7, 'sakura', '121212321', 'sakura123@gmail.com', 'shinobi / ninja', '4.jpg'),
(8, 'Naruto', '123456782', 'naruto123@gmail.com', 'shinobi / ninja', '6.jpg'),
(9, 'Sasuke', '121212621', 'sasuke123@gmail.com', 'shinobi / ninja', '5.jpg'),
(10, 'Luffy', '121212193', 'luffy@gmail.com', 'pemburu one piece', '1.jpg'),
(13, 'eula', '123241223', 'eula@gmail.com', 'penari', '1.jpg'),
(22, 'yelan', '24123412', 'yelan@gmail.com', 'teknik sipil', '2.jpg'),
(23, 'ayaka', '141213121', 'ayaka@gmail.com', 'manajement', '3.jpg'),
(24, 'tatang', '12124123', 'tatang@gmail.com', 'keuangan', '4.jpg'),
(46, 'sansan', '123123414', 'sansan@gmail.com', 'teknik informatika', '6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
