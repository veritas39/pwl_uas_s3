-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 05:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `spesies` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`id`, `nama`, `jenis`, `spesies`, `warna`, `umur`) VALUES
(1, 'Singa', 'Mamalia', 'Felidae', 'Coklat', 5),
(2, 'Gajah', 'Mamalia', 'Elephantidae', 'Abu-abu', 8),
(3, 'Zebra', 'Mamalia', 'Equidae', 'Hitam-Putih', 4),
(4, 'Kanguru', 'Mamalia', 'Macropodidae', 'Abu-abu', 3),
(5, 'Harimau', 'Mamalia', 'Felidae', 'Jingga-hitam', 6),
(6, 'Jerapah', 'Mamalia', 'Giraffidae', 'Kuning-coklat', 7),
(7, 'Kuda Nil', 'Mamalia', 'Hippopotamidae', 'Abu-abu', 10),
(8, 'Orangutan', 'Primata', 'Hominidae', 'Coklat', 9),
(9, 'Koala', 'Mamalia', 'Phascolarctidae', 'Abu-abu', 4),
(10, 'Penguin', 'Aves', 'Spheniscidae', 'Hitam-Putih', 2),
(11, 'Kura-kura', 'Reptil', 'Testudinidae', 'Hijau', 15),
(12, 'Gorila', 'Primata', 'Hominidae', 'Hitam', 12),
(13, 'Ikan Lumba-lumba', 'Mamalia', 'Delphinidae', 'Abu-abu', 8),
(14, 'Kapibara', 'Mamalia', 'Hydrochoeridae', 'Coklat', 6),
(15, 'Kuda', 'Mamalia', 'Equidae', 'Coklat', 5),
(16, 'ayam', 'unggas', 'ciken', 'hitam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `tgl_kedatangan` date NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `nama`, `email`, `jumlah_tiket`, `tgl_pemesanan`, `tgl_kedatangan`, `total_harga`) VALUES
(13, 'Surya Gelas', 'surya.gelas@gmail.com', 3, '2024-01-14', '2024-01-20', 75000),
(14, 'rehan wangsaf', 'rehan.wangsaf@gmail.com', 5, '2024-01-16', '2024-01-20', 125000),
(15, 'aktar sepuh', 'aktar.sepuh@gmail.com', 4, '2024-01-16', '2024-01-27', 100000),
(16, 'haidar skin', 'haidar.skin@gmail.com', 5, '2024-01-16', '2024-01-23', 125000),
(17, 'andi whistle', 'andi.whiste@gmail.com', 1, '2024-01-16', '2024-01-25', 25000),
(18, 'dafa synthesizer', 'dafa.synthesizer@gmail.com', 3, '2024-01-16', '2024-01-28', 75000),
(19, 'aimar bernyanyi', 'aimar.bernyanyi@gmail.com', 2, '2024-01-16', '2024-03-10', 50000),
(20, 'ucha steam', 'ucha.steam@gmail.com', 4, '2024-01-16', '2024-01-23', 100000),
(21, 'nanang kosim', 'nanag@gmail.com', 4, '2024-01-17', '2024-01-27', 100000),
(22, 'Juna ', 'juna@gmail.com', 5, '2024-01-17', '2024-02-04', 125000),
(23, 'admin', 'admin123@gmail.com', 3, '2024-01-17', '2024-01-28', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `privilege`) VALUES
(1, 'MBryan', 'mbryan22', 'muhammad.bryan.tik22@mhsw.pnj.ac.id', '$2y$10$j9FQ42SVs10maPIM4hcWoeaAsQRgv2YNJvJ3LxqZG4zY/EPVygh/q', 'visitor'),
(5, 'admin321', 'admin', 'admin123@gmail.com', '$2y$10$mPN/hN9HvGWF6ybLsqvWfurMGqT4dWsWl7USw72Su5oKBQs6Ulw16', 'admin'),
(6, 'regis22', 'regis22', 'regis@gmail.com', '$2y$10$a2tC8E3PJBFg6/E0ZhIo3OycKQhVnJhG2L.lwVmlxdGPOzaQZ/94.', ''),
(7, 'regis33', 'regis33', 'regis33@gmail.com', '$2y$10$SX9qBIszhVGH1MEY4Do1MuY4RmYGPl2eGV5dUjgkckS6F3u3UaG0q', ''),
(8, 'Ronaldo', 'ronaldo', 'ronaldo@gmail.com', '$2y$10$n3q2T4pbTGhTm1Tc9sYWvOD/qc.NG/xCVlYTBPXJOjxfxiAL5b7Fq', ''),
(9, 'bryan27', 'bryan27', 'bryan@gmail.com', '$2y$10$za2NpeuOGdSqYyrKt0wzJeyrrcHN9oLtpJk2iF/xiV0OveypYy98u', ''),
(10, 'husen19', 'husen19', 'husen@gmail.com', '$2y$10$.0BtS5FS2oaMbfb63zACIub9ByNgMzXvdhNcRZh6xR1Cysv2cJUFS', ''),
(11, 'okta8', 'okta8', 'okta@gmail.com', '$2y$10$qXux8G3svqKMoKOuZeK1LOUfndTEOAVxATrUc1JbOl5/CDZZZXBEC', ''),
(12, 'madeBikin', 'madeBikin', 'made@gmail.com', '$2y$10$j98NfxDXJWcXJRgQuj3s6.o8ZSEnou8gcBb9Nh9WVD/TeYWInhvmK', ''),
(13, 'saripMotor', 'saripMotor', 'sarip@gmail.com', '$2y$10$d1dmVbpKlWb8WA/bBadI2evuoLI9wBYYIH6WRn2WCzQbM7F2Ou3KS', ''),
(14, 'siapa', 'siapa123', 'siapa@gmail.com', '$2y$10$sb99C8Z3.Adx1MBALG21Ke1Hsm62xh6QD77Op1ls8w98gAV3hkoZi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hewan`
--
ALTER TABLE `hewan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
