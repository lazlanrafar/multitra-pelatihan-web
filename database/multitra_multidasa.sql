-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 12:13 AM
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
  `input_peserta` varchar(200) DEFAULT NULL,
  `submit_data_peserta` varchar(200) DEFAULT NULL,
  `tgl_aktual_serti` date DEFAULT NULL,
  `tgl_target_serti` date DEFAULT NULL,
  `pengajuan_sertifikat_internal` varchar(200) DEFAULT NULL,
  `tgl_aktual_dok` date DEFAULT NULL,
  `tgl_target_dok` date DEFAULT NULL,
  `dokumen_diterima` varchar(200) DEFAULT NULL,
  `status_dokumen` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pelatihan`
--

INSERT INTO `tabel_pelatihan` (`id`, `nama_kegiatan`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_peserta`, `status_kegiatan`, `permohonan_izin`, `input_peserta`, `submit_data_peserta`, `tgl_aktual_serti`, `tgl_target_serti`, `pengajuan_sertifikat_internal`, `tgl_aktual_dok`, `tgl_target_dok`, `dokumen_diterima`, `status_dokumen`, `keterangan`) VALUES
(17, 'Pembinaan Ahli K3 Umum -74', '2023-05-12', '2023-05-26', 20, 'Estimate', 'Over Schedule', 'Done', 'Not Yet', '0000-00-00', '0000-00-00', 'Late', '0000-00-00', '0000-00-00', 'Done', 'Proses Arsip', ''),
(19, 'Pembinaan dan Sertifikasi K3 Teknisi Listrik (Publik)', '2023-05-08', '2023-05-15', 14, 'Running', 'Not Yet', 'Done', 'Not Yet', '0000-00-00', '0000-00-00', 'Late', '0000-00-00', '0000-00-00', 'Done', 'Proses Arsip', 'sgdsggag'),
(20, 'Pembinaan dan Sertifikasi K3 Operator Boiler Kelas II Angkatan 8', '2023-05-08', '2023-05-13', 15, 'Running', 'Done', 'Late', 'Not Yet', '0000-00-00', '0000-00-00', 'Done', '0000-00-00', '0000-00-00', 'Done', 'Siap Distribusi', ''),
(21, 'Pembinaan dan Sertifikasi K3 Juru Ikat  (Rigger) PT McDermott', '2023-05-02', '2023-05-04', 12, 'Postpone', 'Late', 'Done', 'Not Yet', '0000-00-00', '0000-00-00', 'Late', '0000-00-00', '0000-00-00', 'On Progress', 'Proses Arsip', ''),
(22, 'Pembinaan dan Sertifikasi K3 TKBT Tingkat II', '2023-05-08', '2023-05-10', 12, 'On Schedule', 'Done', 'Done', 'Done', '0000-00-00', '0000-00-00', 'Done', '0000-00-00', '0000-00-00', 'Over Schedule', 'Proses Kemnaker', ''),
(23, 'Pembinaan dan Sertifikasi K3 Simulasi Tanggap Darurat', '2023-05-11', '2023-05-12', 25, 'Cancel', 'Late', 'Late', 'Late', '0000-00-00', '0000-00-00', 'Late', '0000-00-00', '0000-00-00', 'Done', 'Siap Distribusi', ''),
(24, 'Pembinaan dan Sertifikasi K3 Petugas Peran Kebakaran Kelas D PT. Philips Industries Batam (In-House)', '2023-05-15', '2023-05-17', 10, 'Estimate', 'Over Schedule', 'Done', 'Late', '2023-08-15', '2023-08-21', 'Done', '2023-08-17', '2023-10-16', 'On Progress', 'Proses Arsip', 'Peserta tidur'),
(25, 'Pembinaan dan Sertifikasi K3 Confined Space Utama dan Madya (Publik)', '2023-05-15', '2023-05-19', 11, 'Done', 'Late', 'Not Yet', 'Late', '2023-08-11', '2023-08-17', 'Not Yet', '2023-08-12', '2023-10-11', 'Over Schedule', 'Proses Kemnaker', ''),
(26, 'Pembinaan dan Sertifikasi K3 Koordinator Penanggulangan Kebakaran Kelas B (In-House)', '2023-05-15', '2023-05-20', 5, 'Running', 'Done', 'Late', 'Not Yet', '2023-06-01', '2023-06-07', 'Done', '2023-05-30', '2023-07-29', 'On Progress', 'Siap Distribusi', ''),
(27, 'Petugas K3 P3K', '2023-05-15', '2023-05-18', 16, 'Postpone', 'Late', 'Not Yet', 'Not Yet', '2023-08-23', '2023-08-29', 'Late', '2023-08-23', '2023-10-22', 'Done', 'Siap Distribusi', ''),
(42, 'Pembinaan Hari Kemerdekaan Indonesia', '2023-08-23', '2023-08-25', 12, 'On Schedule', NULL, NULL, NULL, '2023-08-23', '2023-08-29', NULL, '2023-08-23', '2023-10-22', NULL, 'Proses Arsip', 'The best folder structure for a PHP web project depends on the size of the project, your team&#039;s workflow, and personal preferences. However, I can provide you with a general folder structure that');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
