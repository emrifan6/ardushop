-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 06:55 PM
-- Server version: 10.4.8-MariaDB-log
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `stok` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `slug`, `judul`, `harga`, `gambar`, `stok`, `timestamp`) VALUES
(1, 'esp01', 'ESP-01', 20000, 'esp01.jpg', 100, '2021-06-16 13:48:13'),
(2, 'nodemcu', 'NodeMCU', 40000, 'nodemcu.jpg', 97, '2021-06-19 16:43:29'),
(3, 'rtcds3231', 'RTC DS32331', 13000, 'rtcds3231.jpg', 100, '2021-06-16 14:22:11'),
(4, 'activebuzzer', 'Aktif Buzzer', 2000, 'activebuzzer.jpg', 150, '2021-06-16 13:50:18'),
(5, 'adaptor5v1a', 'Adaptor 5V 1A', 18000, 'adaptor5v1a.jpg', 100, '2021-06-16 13:52:17'),
(6, 'femalesocket5mm', 'Female Socket 5mm', 1000, 'femalesocket5mm.jpg', 1998, '2021-06-19 16:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `hakakses` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `no_hp`, `alamat`, `hakakses`, `timestamp`) VALUES
(1, 'rifan', 'rifan', '081225079410', 'JL. Gasem Wulung Raya rt04/rw04, Tlogosari Wetan, Pedurungan, Kota Semarang', 'pembeli', '2021-06-19 15:39:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
