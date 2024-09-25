-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 06:40 AM
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
-- Database: `project_arsip_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Rahmadsyah 2', 'admin', '0192023a7bbd73250516f069df18b500', '605645259_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `arsip_id` int(11) NOT NULL,
  `arsip_waktu_upload` datetime NOT NULL,
  `arsip_petugas` int(11) NOT NULL,
  `arsip_kode` varchar(255) NOT NULL,
  `arsip_nama` varchar(255) NOT NULL,
  `arsip_jenis` varchar(255) NOT NULL,
  `arsip_kategori` int(11) NOT NULL,
  `arsip_keterangan` text NOT NULL,
  `arsip_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `arsip_waktu_upload`, `arsip_petugas`, `arsip_kode`, `arsip_nama`, `arsip_jenis`, `arsip_kategori`, `arsip_keterangan`, `arsip_file`) VALUES
(2, '2019-10-10 15:09:59', 4, 'ARSIP-MN-0002', 'File keberngkatan', 'png', 4, 'tes ttead', '1162363338_Screen Shot 2019-10-10 at 13.22.15.png'),
(3, '2019-10-10 16:02:44', 4, 'asd', 'asdasd 2x', 'pdf', 3, 'asdasd', '432536246_mamunur.pdf'),
(4, '2019-10-12 17:02:16', 5, 'MN-002', 'Contoh Surat Izin Pelaksanaan', 'pdf', 4, 'Ini Contoh Surat Izin Pelaksanaan', '1352467019_c4611_sample_explain.pdf'),
(5, '2019-10-12 17:03:01', 5, 'MN-003', 'Contoh Keputusan Kerja', 'pdf', 3, 'Contoh Keputusan Kerja pegawai', '1765932248_Contoh-surat-lamaran-kerja-pdf (1).pdf'),
(6, '2019-10-12 17:03:37', 5, 'MN-004', 'Contoh Surat Izin Pegawai', 'pdf', 7, 'berikut Contoh Surat Izin Pegawai untuk pelaksana kerja', '1651167980_instructions-for-adding-your-logo.pdf'),
(7, '2019-10-12 17:04:30', 5, 'MN-005', 'Contoh SPK Proyek Kontraktor', 'pdf', 5, 'Contoh SPK Proyek Kontraktor adalah contoh surat SPK KONTRAK', '142845393_OoPdfFormExample.pdf'),
(8, '2019-10-12 17:05:22', 5, 'MN-006', 'SPK Kontrak Jembatan', 'pdf', 6, 'Surat SPK Kontrak Jembatan Layang', '106615077_sample-link_1.pdf'),
(9, '2019-10-12 17:06:55', 6, 'MN-008', 'Contoh Curiculum Vitae Untuk Lamaran Kerja', 'pdf', 10, 'Contoh Curiculum Vitae Untuk Lamaran Kerja untuk pegawai baru', '927990343_pdf-sample(1).pdf'),
(10, '2019-10-12 17:07:30', 6, 'MN-009', 'Surat Cuti Sakit Pegawai', 'pdf', 7, 'Contoh Surat Cuti Sakit Pegawai baru', '2071946811_PEMBUATAN FILE PDF_FNH_tamim (1).pdf'),
(13, '2024-09-22 10:23:41', 4, 'fgs', 'sdgsd', 'png', 5, 'sdgsds', '15143380_Screenshot (458).png'),
(14, '2024-09-22 10:27:13', 4, 'sdsfdf', 'sgs', 'xlsx', 6, 'sdgs', '1668941043_Production_Report_-_-.xlsx'),
(17, '2024-09-22 14:07:59', 4, 'dassa', 'safas', 'pdf', 7, 'sfaasfa', '639560417_432536246_mamunur (1).pdf'),
(18, '2024-09-23 13:23:01', 4, 'fddsf', 'dsgsdg', 'pdf', 10, 'fgfhhfh', '2115754355_432536246_mamunur (1).pdf'),
(19, '2024-09-23 13:32:14', 4, 'gd', 'fdgdg', 'png', 16, 'fgdfg', '1869981127_15143380_Screenshot (458) (4).png'),
(20, '2024-09-23 13:32:26', 4, 'bfd', 'dfgdf', 'pdf', 7, 'dfgdg', '691943429_432536246_mamunur (1).pdf'),
(21, '2024-09-23 13:32:40', 4, 'fdgdg', 'dfgfd', 'pdf', 4, 'dfgdg', '1311461662_432536246_mamunur (1).pdf'),
(22, '2024-09-24 08:03:57', 9, 'gfdg', 'dfgdfg', 'png', 5, 'dfgdfg', '1795496196_Pink Illustrated Cherry Blossom Desktop Wallpaper.png');

-- --------------------------------------------------------

--
-- Table structure for table `doc1`
--

CREATE TABLE `doc1` (
  `doc1_id` int(11) NOT NULL,
  `doc1_waktu_upload` datetime NOT NULL,
  `doc1_petugas` int(11) NOT NULL,
  `doc1_kode` varchar(255) NOT NULL,
  `doc1_nama` varchar(255) NOT NULL,
  `doc1_jenis` varchar(255) NOT NULL,
  `doc1_ket` text NOT NULL,
  `doc1_file` varchar(255) NOT NULL,
  `status` enum('Uploaded','Confirm(AVP)','Confirm(VP)','Confirm(GM)','Rejected(AVP)','Rejected(VP)','Rejected(GM)','Done') DEFAULT 'Uploaded',
  `doc1_alasan_reject` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc1`
--

INSERT INTO `doc1` (`doc1_id`, `doc1_waktu_upload`, `doc1_petugas`, `doc1_kode`, `doc1_nama`, `doc1_jenis`, `doc1_ket`, `doc1_file`, `status`, `doc1_alasan_reject`) VALUES
(1, '2024-09-25 09:55:00', 1, 'sdg', 'dgd', 'pdf', 'dfg', '1571021443_2115754355_432536246_mamunur (1).pdf', 'Rejected(AVP)', NULL),
(2, '2024-09-25 09:55:06', 1, 'dfg', 'dfg', 'pdf', 'dfg', '1610883118_2115754355_432536246_mamunur (1).pdf', 'Rejected(AVP)', NULL),
(3, '2024-09-25 09:55:11', 1, 'dfg', 'dfg', 'pdf', 'dfg', '1973992076_2115754355_432536246_mamunur (1).pdf', 'Confirm(AVP)', NULL),
(4, '2024-09-25 09:55:17', 1, 'dfg', 'dfg', 'pdf', 'dgfd', '480646905_2115754355_432536246_mamunur (1).pdf', 'Confirm(AVP)', NULL),
(5, '2024-09-25 09:55:20', 1, 'dfg', 'dfg', '', 'dfg', '1207476945_', 'Confirm(AVP)', NULL),
(6, '2024-09-25 09:55:29', 1, 'dfg', 'dfg', 'pdf', 'dfg', '668150922_2115754355_432536246_mamunur (1).pdf', 'Rejected(AVP)', 'nana'),
(7, '2024-09-25 10:00:36', 1, 'fdgd', 'dfg', 'pdf', 'dfgdf', '263447640_2115754355_432536246_mamunur (1).pdf', 'Rejected(VP)', NULL),
(8, '2024-09-25 10:00:42', 1, 'dfg', 'dfg', 'pdf', 'dfg', '173532018_2115754355_432536246_mamunur (1).pdf', 'Rejected(VP)', NULL),
(9, '2024-09-25 10:00:49', 1, 'dfg', 'dfg', 'pdf', 'dfg', '165543728_2115754355_432536246_mamunur (1).pdf', 'Rejected(VP)', NULL),
(10, '2024-09-25 10:00:57', 1, 'dfg', 'dfg', 'pdf', 'dfg', '487200373_2115754355_432536246_mamunur (1).pdf', 'Done', NULL),
(11, '2024-09-25 10:01:03', 1, 'dfg', 'dfg', 'pdf', 'dfg', '91175363_2115754355_432536246_mamunur (1).pdf', 'Done', NULL),
(12, '2024-09-25 10:17:41', 2, 'dfg', 'dfg', 'pdf', 'dfg', '91175363_2115754355_432536246_mamunur (1).pdf', 'Done', NULL),
(13, '2024-09-25 10:17:44', 2, 'dfg', 'dfg', 'pdf', 'dfg', '1973992076_2115754355_432536246_mamunur (1).pdf', 'Done', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doc2`
--

CREATE TABLE `doc2` (
  `doc2_id` int(11) NOT NULL,
  `doc2_waktu_ipload` datetime NOT NULL,
  `doc2_petugas` int(11) NOT NULL,
  `doc2_kode` varchar(255) NOT NULL,
  `doc2_nama` varchar(255) NOT NULL,
  `doc2_jenis` varchar(255) NOT NULL,
  `doc2_ket` text NOT NULL,
  `doc2_file` varchar(255) NOT NULL,
  `status` enum('Uploaded','Confirm(AVP)','Confirm(VP)','Confirm(GM)','Rejected(AVP)','Rejected(VP)','Rejected(GM)','Done') NOT NULL,
  `doc2_alasan_reject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doc3`
--

CREATE TABLE `doc3` (
  `doc3_id` int(11) NOT NULL,
  `doc3_waktu_upload` datetime NOT NULL,
  `doc3_petugas` int(11) NOT NULL,
  `doc3_kode` varchar(255) NOT NULL,
  `doc3_nama` varchar(255) NOT NULL,
  `doc3_jenis` varchar(255) NOT NULL,
  `doc3_ket` text NOT NULL,
  `doc3_file` varchar(255) NOT NULL,
  `status` enum('Uploaded','Confirm(AVP)','Confirm(VP)','Confirm(GM)','Rejected(AVP)','Rejected(VP)','Rejected(GM)','Done') NOT NULL,
  `doc3_alasan_project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_keterangan`) VALUES
(1, 'Tidak berkategori', 'Semua yang tidak memiliki kategori'),
(3, 'Surat Keputusan', 'Format arsip untuk surat keputusan\r\n'),
(4, 'Surat Izin Pelaksanaan', 'Contoh format surat izin pelaksaan pekerjaan'),
(5, 'Surat Perintah Kerja Proyek jalan', 'Contoh format surat perintah untuk pekerjaan proyek jalan'),
(6, 'Surat Perintah Kerja Proyek Jembatan', 'Contoh format untuk surat perintah kerja proyek jembatan'),
(7, 'Surat Kesehatan Pegawai', 'Surat kesehatan untuk pegawai'),
(8, 'Surat Lampiran Skripsi', 'Surat contoh lampiran untuk skripsi'),
(10, 'Curiculum Vitae', 'Contoh format surat curiculum vitae untuk kenaikan jabatan'),
(16, 'nanaaaa', 'nanaaa');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int(11) NOT NULL,
  `petugas_nama` varchar(255) NOT NULL,
  `petugas_username` varchar(255) NOT NULL,
  `petugas_password` varchar(255) NOT NULL,
  `petugas_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `petugas_nama`, `petugas_username`, `petugas_password`, `petugas_foto`) VALUES
(4, 'Jhony Andrean', 'petugas1', 'b53fe7751b37e40ff34d012c7774d65f', ''),
(5, 'Junaidi Mus', 'petugas2', 'ac5604a8b8504d4ff5b842480df02e91', ''),
(6, 'Jamilah Suanda', 'petugas3', '6f7dc121bccfd778744109cac9593474', ''),
(8, 'Emilda', 'petugas4', '95c477e4932b3b16500674c18fb6f9a4', '310049817_4.png'),
(9, 'Emilda Rahmawati', 'petugas5', 'bd71eb9c0e0e5f21713f18bb58ec3f15', '723220596_4.png');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `riwayat_id` int(11) NOT NULL,
  `riwayat_waktu` datetime NOT NULL,
  `riwayat_user` int(11) NOT NULL,
  `riwayat_arsip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`riwayat_id`, `riwayat_waktu`, `riwayat_user`, `riwayat_arsip`) VALUES
(1, '2019-10-11 15:32:29', 8, 3),
(2, '2019-10-12 17:09:31', 8, 10),
(3, '2019-10-12 17:09:45', 8, 9),
(4, '2019-10-12 17:09:50', 8, 8),
(5, '2019-10-12 17:09:53', 8, 3),
(6, '2019-10-12 17:10:07', 9, 10),
(7, '2019-10-12 17:10:16', 9, 9),
(8, '2019-10-12 17:10:19', 9, 8),
(9, '2019-10-12 17:10:22', 9, 6),
(10, '2019-10-12 17:10:26', 9, 2),
(11, '2024-09-21 20:38:28', 8, 12),
(12, '2024-09-22 14:02:35', 8, 13),
(13, '2024-09-22 14:03:52', 8, 10),
(14, '2024-09-22 14:03:55', 8, 14),
(15, '2024-09-23 11:01:29', 8, 13),
(16, '2024-09-24 08:05:27', 8, 22),
(17, '2024-09-25 07:29:14', 8, 18),
(18, '2024-09-25 07:29:20', 8, 14),
(19, '2024-09-25 07:29:24', 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`) VALUES
(8, 'Samsul Bahri', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', '1653000372_3.png'),
(9, 'Reza Yuzanni', 'user2', '7e58d63b60197ceb55a1c487989a3720', ''),
(10, 'Ajir Muhajier', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', ''),
(11, 'Cut Nanda Somay', 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', ''),
(14, 'Emilda Rahmawati', 'user6', 'affec3b64cf90492377a8114c86fc093', '1227399089_4.png'),
(15, 'Sehun', 'user7', '3e0469fb134991f8f75a2760e409c6ed', '422548532_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_pks`
--

CREATE TABLE `user_pks` (
  `pks_id` int(11) NOT NULL,
  `pks_nama` varchar(255) NOT NULL,
  `pks_username` varchar(255) NOT NULL,
  `pks_password` varchar(255) NOT NULL,
  `pks_foto` varchar(255) NOT NULL,
  `pks_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_pks`
--

INSERT INTO `user_pks` (`pks_id`, `pks_nama`, `pks_username`, `pks_password`, `pks_foto`, `pks_level`) VALUES
(1, 'lala', 'asmen1', 'fe4f99f915a0bf300105985581e5bdf9', '775360028_3.png', 'ASMEN'),
(2, 'sehun', 'avp1', '6306b8af10e22f65ecaed59273d60574', '947526320_4.png', 'AVP'),
(3, 'nana', 'vp1', '846bf0b010c93c15919796fa706f5d77', '1706589269_4.png', 'VP'),
(4, 'nini', 'gm1', '769a4c56c7a22dc7b7f0a729e51a30e5', '144143178_3.png', 'GM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`);

--
-- Indexes for table `doc1`
--
ALTER TABLE `doc1`
  ADD PRIMARY KEY (`doc1_id`);

--
-- Indexes for table `doc2`
--
ALTER TABLE `doc2`
  ADD PRIMARY KEY (`doc2_id`);

--
-- Indexes for table `doc3`
--
ALTER TABLE `doc3`
  ADD PRIMARY KEY (`doc3_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_pks`
--
ALTER TABLE `user_pks`
  ADD PRIMARY KEY (`pks_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `doc1`
--
ALTER TABLE `doc1`
  MODIFY `doc1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doc2`
--
ALTER TABLE `doc2`
  MODIFY `doc2_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc3`
--
ALTER TABLE `doc3`
  MODIFY `doc3_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_pks`
--
ALTER TABLE `user_pks`
  MODIFY `pks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
