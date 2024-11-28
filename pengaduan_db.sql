-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 03:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(11, 'Rafaiez Jamar', 'mochammadrafaiez@gmail.com', 'Tidak Solat Berjamaah\r\n', '2024-11-25 14:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'rafaiez140509', 'admin', '2024-11-22 02:42:11'),
(2, 'user', '*D5D9F81F5542DE067FFF5FF7A4CA4BDD322C578F', 'user', '2024-11-22 02:42:11'),
(4, 'mochammadrafaiez@gmail.com', '$2y$10$jrNSwvemeEdAY0hpkVB/2.OD2iybigWKkL4tyeOedYnP5s2ajOWlu', 'user', '2024-11-22 03:05:20'),
(5, 'afsarfakhri@gmail.com', '$2y$10$0nd1o10GyhAEKElBmD8Cbumt8dYK9m0jXOdjVAsBbhz15/h0GjQ/W', 'user', '2024-11-22 03:18:03'),
(6, 'rafaiez', '$2y$10$gLJPSdWyUJ5goXaldOVR5eyY.5/Se9tPvAFAFZ0Ih9O.x9yfyhJR.', 'user', '2024-11-22 07:26:02'),
(7, 'rafa', '$2y$10$TsvYn51AByku5QsjuKAq7ObRW2Nc3wpU3LJNL2oKFVMKyHD22NSY2', 'user', '2024-11-22 13:39:44'),
(8, 'sajad', '$2y$10$Kwq1tRYHA.tYWYDGvm5sYerBjiqFDy2.3BnWJlsMR0DaAidv2p1g6', 'user', '2024-11-22 13:53:31'),
(9, 'Rafaiez Jamar', '$2y$10$BwWouK7Q7bc.9kMYi9eaT.qNMnerRayFd10POx3wLFiQZKjCmjWjW', 'user', '2024-11-25 14:06:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
