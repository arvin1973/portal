-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 03:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `field` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `field`, `isi`, `timestamp`) VALUES
(1, 'Jam Operasional', '08:00 - 15:00', '2021-09-22 14:37:40'),
(2, 'Email', 'laksanamekar10@gmail.com', '2021-09-22 16:49:57'),
(3, 'No. Telepon', '(022) 6865037', '2021-09-22 16:50:57'),
(4, 'WhatsApp', 'Segera Hadir', '2021-09-22 16:51:47'),
(5, 'Visi', 'Teratur, iman, amanah, rasional, dan adil makmur (tiara) berbasiskan desa sebagai sub sistem sosial dan sub sistem pemeritahan.', '2021-09-27 10:52:04'),
(6, 'Misi', 'Dalam rangka mewujudkan visi kabupaten bandung barat tahun 2013-2018 desa laksanamekar memiliki misi yaitu : mewujudkan masyarakat yang cerdas, rasional, maju, agamis dan sehat berbasis pada pengembangan potensi wilayah.', '2021-09-27 10:52:04'),
(7, 'Struktur Organisasi', 'ACDCASDCAD.png', '2021-09-27 11:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `image` varchar(123) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `image`, `author`, `timestamp`) VALUES
(33, 'Bismilah', '<p>aa</p>', '1441.jpg', 5, '2021-10-19 12:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `kependudukan`
--

CREATE TABLE `kependudukan` (
  `id` int(11) NOT NULL,
  `rw` varchar(11) NOT NULL,
  `ketua_rw` varchar(128) NOT NULL,
  `lokasi_rw` varchar(128) NOT NULL,
  `jumlah_warga` int(11) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `jumlah_rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kependudukan`
--

INSERT INTO `kependudukan` (`id`, `rw`, `ketua_rw`, `lokasi_rw`, `jumlah_warga`, `jumlah_kk`, `jumlah_rt`) VALUES
(1, '1', 'Nanang Kusmana', 'Kp. Tipar Timur', 861, 308, 5),
(2, '2', 'Wahyudi', 'Kp. Tipar Barat', 1961, 588, 9),
(3, '3', 'Pramono', 'Kp. Ciampel', 1761, 562, 9),
(4, '4', 'Agus Mulaya', 'Kp. Cibingbin', 1328, 403, 6),
(5, '5', 'Undang Ade S', 'Kp. Laksanamekar', 1625, 441, 7),
(6, '6', 'Supriatna', 'Kp. Sindagsari', 1172, 325, 5),
(7, '7', 'Suherman', 'Kp. Ciptakarya', 1903, 583, 9),
(8, '8', 'Deddy Sobandi', 'Perum Ciampel Indah', 564, 227, 3),
(9, '9', 'Arofah Bahtiar', 'Perum Laksanamekar Asri', 1578, 407, 7),
(10, '10', 'Ruswandi', 'Kp. Tipar Timur', 965, 251, 5),
(11, '11', 'Ir. Agus Saeful', 'Komplek Ciptamas 2', 1104, 253, 4),
(12, '12', 'Imat Rohimat', 'Kp. Sindagsari', 779, 243, 4),
(13, '13', 'Rudianto', 'Komplek Tipar Silih Asih', 576, 214, 4),
(14, '14', 'Mamad Jaenudin', 'Kp. Tipar Tengah', 731, 201, 5),
(15, '15', 'Awan Gunawan', 'Komplek Batujajar Regency', 672, 198, 5),
(16, '16', 'Oman Kusmawan', 'Kp. Lembah Tipar Silih Asih', 842, 269, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `role`, `timestamp`) VALUES
(5, 'admin', 'admin', '$2y$10$/fP5kSWhzYkDP6XivfFxI.gs/3NSD.shfqy3WSbvBTNM67cpL55J2', 1, '2021-09-21 12:50:15'),
(6, 'arvin', 'arvin', '$2y$10$dtoH4HWFKnWtr8AoEcN/muo5rIcC/sZllDzaZADHNoy4pv00KlwOS', 2, '2021-09-21 13:00:10'),
(7, 'bagas', 'bagas', '$2y$10$alcmIarFXdqyW2O.l7at4Ov9qfnULsFqFc3QhJsNrBvv/swAHXt2i', 1, '2021-09-21 13:53:42'),
(8, 'user', 'user', '$2y$10$4P9k2278XR7IH0Cojhq9MuGvDmfB7Sftda/WJc/cYMNVl3AKGL3TC', 1, '2021-09-21 15:00:40'),
(9, 'user1', 'user', '$2y$10$q5tRM8gX0WejXHW0VDZ4YO6gwkNA1JnNME2FEid4XTbJH4e7HXYxS', 0, '2021-09-21 15:00:55'),
(10, 'user11', 'user', '$2y$10$KzhCwNnVB9SDLmeguTSeleM0V1QiJe9s8d1aSFcDL60oX8uv28NFK', 0, '2021-09-21 15:01:26'),
(11, 'asu', 'asu', '$2y$10$lRvxSqW90ogXl20Tmf.GIORxYc4aPgYuDbalfGzVze9pM0EHP7bgu', 0, '2021-09-21 15:01:34'),
(12, 'a', 'a', '$2y$10$t3WFDcuTjMM.xbUP/0M9ku5YUIKXaqIJEl2fyyE4dYMwCzOiP0DGG', 1, '2021-09-21 15:02:34'),
(13, 'v', 'v', '$2y$10$scBeDBrAj5Yqr8i5vYxtX.dhfXDl0tXzndiKLq98GphtopRw9KhHm', 1, '2021-09-21 15:02:42'),
(14, 'yusuf', 'yusuf', '$2y$10$7rh.boXmdwLRkjZFsdV/8.MPfgDNmhBBaxajiCbp3uizVtJlUMzL6', 1, '2021-09-21 15:03:18'),
(15, 'username', 'user', '$2y$10$7TsY0fxXHPdJXhIxY0Df7eyiE73RTthk1HWQ.i6cR2dFHr2/cflh.', 1, '2022-07-28 10:45:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
