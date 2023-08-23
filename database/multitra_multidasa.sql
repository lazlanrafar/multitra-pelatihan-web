-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 06:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multitra_multidasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pelatihan`
--

CREATE TABLE `tabel_pelatihan` (
  `id` int(50) NOT NULL,
  `nama_kegiatan` varchar(200) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jumlah_peserta` int(100) DEFAULT NULL,
  `status_kegiatan` varchar(200) DEFAULT NULL,
  `permohonan_izin` varchar(200) DEFAULT NULL,
  `input_peserta` varchar(200) NOT NULL DEFAULT 'On Progress',
  `submit_data_peserta` date DEFAULT NULL,
  `tgl_aktual_serti` date DEFAULT NULL,
  `tgl_target_serti` date DEFAULT NULL,
  `pengajuan_sertifikat_internal` varchar(200) NOT NULL DEFAULT 'On Progress',
  `tgl_aktual_dok` date DEFAULT NULL,
  `tgl_target_dok` date DEFAULT NULL,
  `dokumen_diterima` varchar(200) NOT NULL DEFAULT 'On Progress',
  `status_dokumen` varchar(200) DEFAULT NULL,
  `tgl_aktual_permohonan_izin` date DEFAULT NULL,
  `tgl_target_permohonan_izin` date DEFAULT NULL,
  `tgl_aktual_input_peserta` date DEFAULT NULL,
  `tgl_target_input_peserta` date DEFAULT NULL,
  `permohonan_izin_pelatihan` varchar(255) NOT NULL DEFAULT 'On Progress',
  `keterangan` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pelatihan`
--

INSERT INTO `tabel_pelatihan` (`id`, `nama_kegiatan`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_peserta`, `status_kegiatan`, `permohonan_izin`, `input_peserta`, `submit_data_peserta`, `tgl_aktual_serti`, `tgl_target_serti`, `pengajuan_sertifikat_internal`, `tgl_aktual_dok`, `tgl_target_dok`, `dokumen_diterima`, `status_dokumen`, `tgl_aktual_permohonan_izin`, `tgl_target_permohonan_izin`, `tgl_aktual_input_peserta`, `tgl_target_input_peserta`, `permohonan_izin_pelatihan`, `keterangan`, `created_at`) VALUES
(43, 'Pembinaan dan Sertifikasi K3 Petugas Peran Kebakaran Kelas D PT. Philips Industries Batam (In-House)', '2023-08-23', '2023-08-25', 15, 'On Schedule', NULL, 'Done', '2023-08-31', '2023-08-31', '2023-08-31', 'Done', '2023-09-10', '2023-10-24', 'Done', 'Siap Distribusi', '2023-08-18', '2023-08-18', '2023-08-19', '2023-08-24', 'Done', '', '2023-08-23 15:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_akses` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `user_akses`) VALUES
(14, 'Syarif Mustofa', 'superadmin', 'syarif.multidasa@gmail.com', '$2y$10$sLCWN8H9hGRQTaWYgngkLeZ70XP/tqT34Dk2hOAlidST271f89T3a', 'Super Admin'),
(15, 'Rehan Butar Butar', 'marketing', 'rehanpatiguna29@gmail.com', '$2y$10$V3h6nd8lf1xyRFfzn6Ynh.YMff8tCTVOcDQJMUen4vGgg1kQ0EJpy', 'Marketing'),
(16, 'Aan Sitompul', 'admin', 'admin@gmail.com', '$2y$10$gCIepaym5rVvWyTwvjjUN.YlGJ.fEA3Igcb42OmHeJ1sdrDMy23S.', 'Admin Operasional'),
(19, 'Patiguna L', 'operasional', 'patiguna@gmail.com', '$2y$10$GQFrKh4jf5hVxQIIzzq8T.20xSdj3mV/av5KNlti9M4yz/TAPmSka', 'Operasional Training');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pelatihan`
--
ALTER TABLE `tabel_pelatihan`
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
-- AUTO_INCREMENT for table `tabel_pelatihan`
--
ALTER TABLE `tabel_pelatihan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
