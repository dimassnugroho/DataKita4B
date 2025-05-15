-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 01:23 PM
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
-- Database: `datakita4b`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_admin`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$fNWKABUve/WQZs2LbDd64eUEOrfjtxHdquyGAzkwZLZHXOk/LkT0G', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log_aktivitas` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `aktivitas` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal` date NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log_aktivitas`, `id_mahasiswa`, `id_admin`, `aktivitas`, `waktu`, `tanggal`, `ip`) VALUES
(83, 46, NULL, 'Login', '2025-05-14 16:43:17', '2025-05-14', '::1'),
(84, 46, NULL, 'Logout', '2025-05-14 16:49:03', '2025-05-14', '::1'),
(85, 46, NULL, 'Login', '2025-05-14 16:49:09', '2025-05-14', '::1'),
(86, 46, NULL, 'Logout', '2025-05-14 16:54:23', '2025-05-14', '::1'),
(87, NULL, 1, 'Login', '2025-05-14 16:54:44', '2025-05-14', '::1'),
(88, NULL, 1, 'Logout', '2025-05-14 17:10:50', '2025-05-15', '::1'),
(89, 46, NULL, 'Login', '2025-05-14 17:12:05', '2025-05-15', '::1'),
(90, 46, NULL, 'Logout', '2025-05-14 17:12:29', '2025-05-15', '::1'),
(91, NULL, 1, 'Login', '2025-05-14 17:12:37', '2025-05-15', '::1'),
(92, NULL, 1, 'Logout', '2025-05-14 17:18:46', '2025-05-15', '::1'),
(93, NULL, 1, 'Login', '2025-05-14 17:24:24', '2025-05-15', '::1'),
(94, NULL, 1, 'Logout', '2025-05-14 17:28:11', '2025-05-15', '::1'),
(95, NULL, 1, 'Login', '2025-05-14 17:28:20', '2025-05-15', '::1'),
(96, NULL, 1, 'Logout', '2025-05-14 17:30:48', '2025-05-15', '::1'),
(97, 46, NULL, 'Login', '2025-05-14 17:30:54', '2025-05-15', '::1'),
(98, 46, NULL, 'Login', '2025-05-15 03:04:03', '2025-05-15', '::1'),
(99, 46, NULL, 'Logout', '2025-05-15 03:07:18', '2025-05-15', '::1'),
(100, NULL, 1, 'Login', '2025-05-15 08:02:06', '2025-05-15', '::1'),
(101, NULL, 1, 'Logout', '2025-05-15 08:03:07', '2025-05-15', '::1'),
(102, 47, NULL, 'Login', '2025-05-15 08:13:16', '2025-05-15', '::1'),
(103, 47, NULL, 'Logout', '2025-05-15 08:15:48', '2025-05-15', '::1'),
(104, NULL, 1, 'Login', '2025-05-15 08:16:01', '2025-05-15', '::1'),
(105, NULL, 1, 'Logout', '2025-05-15 08:16:45', '2025-05-15', '::1'),
(106, 48, NULL, 'Login', '2025-05-15 08:18:52', '2025-05-15', '::1'),
(107, 48, NULL, 'Logout', '2025-05-15 08:18:58', '2025-05-15', '::1'),
(108, 49, NULL, 'Login', '2025-05-15 08:20:37', '2025-05-15', '::1'),
(109, 49, NULL, 'Logout', '2025-05-15 08:20:41', '2025-05-15', '::1'),
(110, 50, NULL, 'Login', '2025-05-15 08:30:55', '2025-05-15', '::1'),
(111, 50, NULL, 'Logout', '2025-05-15 08:31:18', '2025-05-15', '::1'),
(112, 51, NULL, 'Login', '2025-05-15 08:37:02', '2025-05-15', '::1'),
(113, 52, NULL, 'Login', '2025-05-15 11:02:06', '2025-05-15', '::1'),
(114, 52, NULL, 'Logout', '2025-05-15 11:02:15', '2025-05-15', '::1'),
(115, 53, NULL, 'Login', '2025-05-15 11:02:59', '2025-05-15', '::1'),
(116, 53, NULL, 'Logout', '2025-05-15 11:03:17', '2025-05-15', '::1'),
(117, 54, NULL, 'Login', '2025-05-15 11:04:32', '2025-05-15', '::1'),
(118, 54, NULL, 'Logout', '2025-05-15 11:04:40', '2025-05-15', '::1'),
(119, 55, NULL, 'Login', '2025-05-15 11:05:49', '2025-05-15', '::1'),
(120, 55, NULL, 'Logout', '2025-05-15 11:08:21', '2025-05-15', '::1'),
(121, 57, NULL, 'Login', '2025-05-15 11:11:18', '2025-05-15', '::1'),
(122, 57, NULL, 'Logout', '2025-05-15 11:11:29', '2025-05-15', '::1'),
(123, 47, NULL, 'Login', '2025-05-15 11:19:44', '2025-05-15', '::1'),
(124, 47, NULL, 'Logout', '2025-05-15 11:21:08', '2025-05-15', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(16) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `kesukaan` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `nim`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telepon`, `kesukaan`, `password`, `latitude`, `longitude`) VALUES
(46, 'Dimas Setyo Nugroho', '12', '2025-05-14', 'Laki-laki', 'Gang Bungur', '12', 'Makan', '$2y$10$xwJmZ6gGUbzUzQoV9cipFOlHpPS42BlaqDrorSLbguNyB55Qtrvli', '-6.3247805', '106.753723'),
(47, 'Ali Gondrong', '11230910000006', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '099999', 'Makan', '$2y$10$/wUBzgbDEXICRQA6sB/0QOGQuWQiPIOz/WO5IU9PyuAKXeXoYWZLS', '-7.9666204', '112.6326321'),
(48, 'Rayhan Alghifari Supriyatna', '11230910000039', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '123', 'Ngoding', '$2y$10$824NB.hqMGj94x.d1VecPu7k5USkif6e9t05lEDOIKYT/erteBb2.', '-7.9666204', '112.6326321'),
(49, 'Ali Ahmad Fadlan', '11230910000070', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '123', 'Makan, Tidur dan Main Games', '$2y$10$1qx/TK6q8zHabTVMJetrdONQzbkUdFJFJHuG/skbNREoBinLETsOy', '-7.9666204', '112.6326321'),
(50, 'Nizar Ahmad Barelvi', '11230910000064', '2025-05-15', 'Laki-laki', 'Jalan Bukit I, RW 16, Pisangan, Ciputat Timur, South Tangerang, Banten, Java, 15419, Indonesia', '12', 'Makan', '$2y$10$wgyLKaTicQJL8Y0DiSOuYeEYjQgJfIoi/XSoHCbkG9Dm1kGVFK7Pe', '-6.324325788818008', '106.76308234522077'),
(51, 'Pramuditya Zindu', '11230910000121', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'makan', '$2y$10$1PpR5d6IcXUd0RUF6iJrt.8dEhyggUrqtu6MiBwol6HINsNW84.p2', '-7.9666204', '112.6326321'),
(52, 'Aditia', '11230910000001', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$kKsPdrPHQFMGRMckFEXydetn5QPLnw.JVmSxKlhAOXNFZkpE2OQTi', '-7.9666204', '112.6326321'),
(53, 'Choirul', '11230910000002', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$IWM1smvvKXueWSf4Z3cgEekiCoor4QeyruOGc2NkAeODZr9je16ki', '-7.9666204', '112.6326321'),
(54, 'Agung Susilo', '11220910000003', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$seH1wI1XJZq6oiJtfLzxNu0ouPRpo23BGE83SYWMzhky3d4HAZ3Aa', '-7.9666204', '112.6326321'),
(55, 'Ahmad Faza Mutaki', '11230910000004', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$ZK69AgvFS0WcqktP3fbcj.AhYpJY3w0NFBQnvV2vI.SW3J0JYr8B2', '-7.9666204', '112.6326321'),
(56, 'Arsya Shaquilla Ahnaf', '11230910000005', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$zGKw6aTjuuywDbosyZhtN.MPxZSMFASkyyvcaujX5g9yiw3T0VIpS', '-7.9666204', '112.6326321'),
(57, 'Lalu Fathan', '11230910000007', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$jZtiJ49GzHwFjtoZqSA6a.Ik9ZCWSZ/JCO486fLl0C4nzL1m9SNt2', '-7.9666204', '112.6326321'),
(58, 'Daffa Rifky', '11230910000008', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$gRq3hCWtOEh/bWdDoBVtzOTDlG.TqHXiu1D.edpLQhr9iFn/gtgGu', '-7.9666204', '112.6326321'),
(59, 'Harun Al Rasyid', '11230910000009', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$bYR1AqNS5RrFRNQczl5SquRkWXYTY7vbb6IrdheWm9cEzLKU4XsLG', '-7.9666204', '112.6326321'),
(60, 'Abdul Rauf', '11230910000010', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$eHcBMiA35nT/wA/LWkoDteMGcWSCnYnsadp26d1SKU0lUequAy2/K', '-7.9666204', '112.6326321'),
(61, 'Rafi Rizkiyarto', '11230910000011', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$mE8DKnENr.NbhKuNxMNAN.sxR38cOv2rDNaKAsNvi6wPiUXzAzET6', '-7.9666204', '112.6326321'),
(62, 'Rusdi Aulia', '11230910000012', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '121', 'Makan', '$2y$10$vP72lFefV1VlYLyjQlz7oO.sHL7LcqyMc/gTklsc7Bvfp.X8bHX6S', '-7.9666204', '112.6326321'),
(63, 'Salman', '11230910000013', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '123', 'Makan', '$2y$10$OOV2iFsKjAp3G/3WIx/leesRTfjIaYdivtzs3PNXQQRZmNDUzFjwe', '-7.9666204', '112.6326321'),
(64, 'Irfan Fakhriyanto', '11230910000014', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '123', 'Makan', '$2y$10$7UW.lqVe/TkHudNTY1lSXOPWv1T9lF9GM/EjHJtX3yipkflwJ4dc.', '-7.9666204', '112.6326321'),
(65, 'Adif Sandri', '11230910000015', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$Ih0PcLv/zKamBLh36Omyt.VYh/e.47uaDAGQnFkVyqHapZ.VLlikW', '-7.9666204', '112.6326321'),
(66, 'Arya Saputra', '11230910000016', '2025-05-15', 'Laki-laki', 'Rampalcelaket, Malang, Kota Malang, East Java, Java, 65111, Indonesia', '12', 'Makan', '$2y$10$az3MbI/nwlN7A66Yv1iNOu.U.Ov/vFAQPnN3z9zaj8anPkIBtAetC', '-7.9666204', '112.6326321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log_aktivitas`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `fk_id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `fk_id_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `log_aktivitas_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `akun` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
