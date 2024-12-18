-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 11:02 AM
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
(1, 'Rahmadsyah 2', 'admin', '0192023a7bbd73250516f069df18b500', '605645259_3.png'),
(2, 'Emilda Rahmawati', 'admin', '4acb4bc224acbbe3c2bfdcaa39a4324e', '657028952_4.png');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_header_id` int(11) NOT NULL,
  `agenda_kategori` varchar(255) NOT NULL,
  `agenda_tanggal` date NOT NULL,
  `agenda_tanggalawal` time NOT NULL,
  `agenda_tanggalakhir` time NOT NULL,
  `agenda_kegiatan` varchar(255) NOT NULL,
  `agenda_deskripsi` varchar(255) NOT NULL,
  `agenda_lokasi` varchar(255) NOT NULL,
  `agenda_pj` varchar(255) NOT NULL,
  `agenda_status` varchar(255) NOT NULL,
  `agenda_dokumen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`agenda_id`, `agenda_header_id`, `agenda_kategori`, `agenda_tanggal`, `agenda_tanggalawal`, `agenda_tanggalakhir`, `agenda_kegiatan`, `agenda_deskripsi`, `agenda_lokasi`, `agenda_pj`, `agenda_status`, `agenda_dokumen`) VALUES
(25, 22, 'Daily', '2024-12-18', '14:00:00', '16:00:00', 'Rapat Koordinasi', 'Koordinasi proyek efisiensi biaya', 'Ruang Rapat Klawas-Blok Timur', 'Budi Yahya', 'On Progress', NULL),
(26, 24, 'Yearly', '2024-12-23', '14:00:00', '16:00:00', 'Penyusunan Laporan', 'Menyusun laporan mingguan operasional', 'Ruang Rapat MCC', 'Budi Yahyi', 'Close', '1816907742_687607012_1451734872_1258905874_Laporan Produksi - 11 Nov 2024 (2) (4) (3).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `agenda_header`
--

CREATE TABLE `agenda_header` (
  `agendaheader_id` int(11) NOT NULL,
  `agendaheader_ticket` varchar(255) NOT NULL,
  `agendaheader_nopeg` varchar(255) NOT NULL,
  `agendaheader_kegiatan` varchar(255) NOT NULL,
  `agendaheader_nomor` varchar(255) NOT NULL,
  `agendaheader_lokasi` varchar(255) NOT NULL,
  `agendaheader_fasilitas` varchar(255) NOT NULL,
  `agendaheader_jumlah` int(11) NOT NULL,
  `agendaheader_tanggal` date NOT NULL,
  `agendaheader_tanggalawal` time NOT NULL,
  `agendaheader_tanggalakhir` time NOT NULL,
  `agendaheader_kebutuhan` varchar(500) NOT NULL,
  `agendaheader_layout` varchar(255) DEFAULT NULL,
  `agendaheader_status` varchar(255) DEFAULT NULL,
  `agendaheader_alasan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda_header`
--

INSERT INTO `agenda_header` (`agendaheader_id`, `agendaheader_ticket`, `agendaheader_nopeg`, `agendaheader_kegiatan`, `agendaheader_nomor`, `agendaheader_lokasi`, `agendaheader_fasilitas`, `agendaheader_jumlah`, `agendaheader_tanggal`, `agendaheader_tanggalawal`, `agendaheader_tanggalakhir`, `agendaheader_kebutuhan`, `agendaheader_layout`, `agendaheader_status`, `agendaheader_alasan`) VALUES
(22, 'AR-001', '123456', 'Rapat Koordinasi', '0863246572343', 'Ruang Rapat Klawas-Blok Timur', 'abcd', 15, '2024-12-18', '14:00:00', '16:00:00', 'Sound 1, Jumlah kursi 15', NULL, 'Approved', NULL),
(23, 'AR-002', '12345678', 'Evaluasi Progress Harian', '08652146244', 'Ruang Rapat Klawas-Blok Barat', 'abcdef', 20, '2024-12-20', '10:30:00', '11:00:00', 'Jumlah kursi 20', NULL, 'Rejected', 'Layout ruangan tidak dikirimkan'),
(24, 'AR-003', '12345678987', 'Penyusunan Laporan', '086324658123', 'Ruang Rapat MCC', 'abcd', 26, '2024-12-23', '14:00:00', '16:00:00', 'Jumlah kursi 30', NULL, 'Approved', NULL),
(25, 'AR-004', '12345678', 'Training Teknologi Baru', '086324658123', 'Ruang Rapat Klawas-Blok Barat', 'abcd', 50, '2024-12-28', '08:00:00', '16:00:00', 'Jumlah kursi 60', '816315703_Sales.pdf', 'Approved', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `arsip_id` int(11) NOT NULL,
  `arsip_waktu_upload` datetime NOT NULL,
  `arsip_petugas` int(11) NOT NULL,
  `arsip_admin` int(11) NOT NULL,
  `arsip_kode` varchar(255) NOT NULL,
  `arsip_nama` varchar(255) NOT NULL,
  `arsip_jenis` varchar(255) NOT NULL,
  `arsip_kategori` int(11) NOT NULL,
  `arsip_status` varchar(255) NOT NULL,
  `arsip_keterangan` text NOT NULL,
  `arsip_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `arsip_waktu_upload`, `arsip_petugas`, `arsip_admin`, `arsip_kode`, `arsip_nama`, `arsip_jenis`, `arsip_kategori`, `arsip_status`, `arsip_keterangan`, `arsip_file`) VALUES
(27, '2024-12-03 09:58:41', 0, 1, 'gfgsdfsd', 'fdgdfgsdfsd', 'pdf', 18, '6', 'dfgdfggggggg', '1052835287_1258905874_Laporan Produksi - 11 Nov 2024.pdf'),
(28, '2024-12-03 10:27:22', 0, 1, 'dgsadgf', 'sadgsd', 'pdf', 18, '6', 'sdgsadg', '639941540_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(29, '2024-12-03 10:27:41', 0, 1, 'sadgsdg', 'sdgsdg', 'pdf', 18, '4', 'sdgsg', '1278052683_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(30, '2024-12-03 10:46:52', 0, 1, 'sdg', 'sdgsdg', 'pdf', 19, '4', 'sdgdg', '377919556_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(31, '2024-12-03 10:47:02', 0, 1, 'dsgsdg', 'sdgsdg', 'pdf', 19, '5', 'sdgsdg', '83859717_1258905874_Laporan Produksi - 11 Nov 2024 (1).pdf'),
(32, '2024-12-03 10:47:11', 0, 1, 'sdgsd', 'gsdgds', 'pdf', 19, '5', 'sdgsdg', '237414165_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(33, '2024-12-03 10:47:24', 0, 1, 'sdgsdg', 'sdgsdg', 'pdf', 19, '6', 'sdgsdg', '1666902250_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(34, '2024-12-03 10:47:35', 0, 1, 'sdgsdg', 'sdgdsg', 'pdf', 19, '6', 'sdgdsg', '2080445280_1258905874_Laporan Produksi - 11 Nov 2024.pdf'),
(35, '2024-12-03 10:57:02', 0, 1, 'sdfsdf', 'sfdsd', 'pdf', 20, '4', 'sdfsd', '1244180418_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(36, '2024-12-03 10:57:12', 0, 1, 'sdfsdf', 'sdfsdf', 'pdf', 20, '4', 'sdfds', '476522434_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(37, '2024-12-03 10:57:23', 0, 1, 'sdfsdf', 'sdfsdf', 'pdf', 20, '5', 'sdfsdf', '439416700_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(39, '2024-12-03 10:57:51', 0, 1, 'sdfds', 'sdfsd', 'pdf', 21, '4', 'sdfdsf', '1628068299_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(40, '2024-12-03 10:57:59', 0, 1, 'sdfsdf', 'sdfdsf', 'pdf', 21, '5', 'sdfsdf', '1456974522_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(41, '2024-12-03 10:58:08', 0, 1, 'sdfdsf', 'sdfsdf', 'pdf', 21, '6', 'sdfsdf', '1669326370_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(42, '2024-12-03 13:56:50', 4, 0, 'dfsdf', 'sfsdf', 'pdf', 18, '6', 'sdfsdfdffhdrh', '1451734872_1258905874_Laporan Produksi - 11 Nov 2024 (2).pdf'),
(45, '2024-12-15 10:59:55', 5, 0, 'sdf', 'sdf', 'pdf', 18, '4', 'sdfsd', '687607012_1451734872_1258905874_Laporan Produksi - 11 Nov 2024 (2) (4).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `bulan_kontrak`
--

CREATE TABLE `bulan_kontrak` (
  `bulan_id` int(11) NOT NULL,
  `bulan_header_id` int(11) NOT NULL,
  `bulan_bulan` date NOT NULL,
  `bulan_invoice` double NOT NULL,
  `bulan_denda` double NOT NULL,
  `bulan_realisasi` double NOT NULL,
  `bulan_rk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bulan_kontrak`
--

INSERT INTO `bulan_kontrak` (`bulan_id`, `bulan_header_id`, `bulan_bulan`, `bulan_invoice`, `bulan_denda`, `bulan_realisasi`, `bulan_rk`) VALUES
(1, 4, '2020-10-01', 0, 0, 0, 0),
(2, 4, '2020-11-01', 0, 0, 0, 0),
(3, 4, '2020-12-01', 0, 0, 0, 0),
(4, 4, '2021-01-01', 0, 0, 0, 0),
(5, 4, '2021-02-01', 0, 0, 0, 0),
(6, 4, '2021-03-01', 0, 0, 0, 0),
(7, 4, '2021-04-01', 0, 0, 0, 0),
(8, 4, '2021-05-01', 0, 0, 0, 0),
(9, 4, '2021-06-01', 0, 0, 0, 0),
(10, 4, '2021-07-01', 0, 0, 0, 0),
(11, 4, '2021-08-01', 0, 0, 0, 0),
(12, 4, '2021-09-01', 0, 0, 0, 0),
(13, 4, '2021-10-01', 0, 0, 0, 0),
(14, 4, '2021-11-01', 0, 0, 0, 0),
(15, 4, '2021-12-01', 0, 0, 0, 0),
(16, 4, '2022-01-01', 0, 0, 0, 0),
(17, 4, '2022-02-01', 0, 0, 0, 0),
(18, 4, '2022-03-01', 0, 0, 0, 0),
(19, 4, '2022-04-01', 0, 0, 0, 0),
(20, 4, '2022-05-01', 0, 0, 0, 0),
(21, 4, '2022-06-01', 0, 0, 0, 0),
(22, 4, '2022-07-01', 0, 0, 0, 0),
(23, 4, '2022-08-01', 0, 0, 0, 0),
(24, 4, '2022-09-01', 0, 0, 0, 0),
(25, 4, '2022-10-01', 0, 0, 0, 0),
(26, 4, '2022-11-01', 0, 0, 0, 0),
(27, 4, '2022-12-01', 0, 0, 0, 0),
(28, 4, '2023-01-01', 0, 0, 0, 0),
(29, 4, '2023-02-01', 0, 0, 0, 0),
(30, 4, '2023-03-01', 0, 0, 0, 0),
(31, 4, '2023-04-01', 0, 0, 0, 0),
(32, 4, '2023-05-01', 0, 0, 0, 0),
(33, 4, '2023-06-01', 0, 0, 0, 0),
(34, 4, '2023-07-01', 0, 0, 0, 0),
(35, 4, '2023-08-01', 0, 0, 0, 0),
(36, 4, '2023-09-01', 0, 0, 0, 0),
(37, 4, '2023-10-01', 0, 0, 0, 0),
(38, 4, '2023-11-01', 0, 0, 0, 0),
(39, 4, '2023-12-01', 0, 0, 0, 0),
(40, 4, '2024-01-01', 0, 0, 0, 0),
(41, 4, '2024-02-01', 0, 0, 0, 0),
(42, 4, '2024-03-01', 0, 0, 0, 0),
(43, 4, '2024-04-01', 0, 0, 0, 0),
(44, 4, '2024-05-01', 0, 0, 0, 0),
(45, 4, '2024-06-01', 0, 0, 0, 0),
(46, 4, '2024-07-01', 0, 0, 0, 0),
(47, 4, '2024-08-01', 0, 0, 0, 0),
(48, 4, '2024-09-01', 0, 0, 0, 0),
(49, 6, '2021-05-01', 0, 0, 0, 0),
(50, 6, '2021-06-01', 0, 0, 0, 0),
(51, 6, '2021-07-01', 0, 0, 0, 0),
(52, 6, '2021-08-01', 0, 0, 0, 0),
(53, 6, '2021-09-01', 0, 0, 0, 0),
(54, 6, '2021-10-01', 0, 0, 0, 0),
(55, 6, '2021-11-01', 0, 0, 0, 0),
(56, 6, '2021-12-01', 0, 0, 0, 0),
(57, 6, '2022-01-01', 0, 0, 0, 0),
(58, 6, '2022-02-01', 0, 0, 0, 0),
(59, 6, '2022-03-01', 0, 0, 0, 0),
(60, 6, '2022-04-01', 0, 0, 0, 0),
(61, 6, '2022-05-01', 0, 0, 0, 0),
(62, 6, '2022-06-01', 0, 0, 0, 0),
(63, 6, '2022-07-01', 0, 0, 0, 0),
(64, 6, '2022-08-01', 0, 0, 0, 0),
(65, 6, '2022-09-01', 0, 0, 0, 0),
(66, 6, '2022-10-01', 0, 0, 0, 0),
(67, 6, '2022-11-01', 0, 0, 0, 0),
(68, 6, '2022-12-01', 0, 0, 0, 0),
(69, 6, '2023-01-01', 0, 0, 0, 0),
(70, 6, '2023-02-01', 0, 0, 0, 0),
(71, 6, '2023-03-01', 0, 0, 0, 0),
(72, 6, '2023-04-01', 0, 0, 0, 0),
(73, 6, '2023-05-01', 0, 0, 0, 0),
(74, 6, '2023-06-01', 0, 0, 0, 0),
(75, 6, '2023-07-01', 0, 0, 0, 0),
(76, 6, '2023-08-01', 0, 0, 0, 0),
(77, 6, '2023-09-01', 0, 0, 0, 0),
(78, 6, '2023-10-01', 0, 0, 0, 0),
(79, 6, '2023-11-01', 0, 0, 0, 0),
(80, 6, '2023-12-01', 0, 0, 0, 0),
(81, 6, '2024-01-01', 0, 0, 0, 0),
(82, 6, '2024-02-01', 0, 0, 0, 0),
(83, 6, '2024-03-01', 0, 0, 0, 0),
(84, 6, '2024-04-01', 0, 0, 0, 0),
(85, 6, '2024-05-01', 0, 0, 0, 0),
(86, 6, '2024-06-01', 0, 0, 0, 0),
(87, 6, '2024-07-01', 0, 0, 0, 0),
(88, 6, '2024-08-01', 0, 0, 0, 0),
(89, 6, '2024-09-01', 0, 0, 0, 0),
(90, 6, '2024-10-01', 0, 0, 0, 0),
(91, 6, '2024-11-01', 0, 0, 0, 0),
(92, 6, '2024-12-01', 0, 0, 0, 0),
(93, 6, '2025-01-01', 0, 0, 0, 0),
(94, 6, '2025-02-01', 0, 0, 0, 0),
(95, 6, '2025-03-01', 0, 0, 0, 0),
(96, 6, '2025-04-01', 0, 0, 0, 0),
(97, 7, '2021-11-01', 0, 0, 0, 0),
(98, 7, '2021-12-01', 0, 0, 0, 0),
(99, 7, '2022-01-01', 0, 0, 0, 0),
(100, 7, '2022-02-01', 0, 0, 0, 0),
(101, 7, '2022-03-01', 0, 0, 0, 0),
(102, 7, '2022-04-01', 0, 0, 0, 0),
(103, 7, '2022-05-01', 0, 0, 0, 0),
(104, 7, '2022-06-01', 0, 0, 0, 0),
(105, 7, '2022-07-01', 0, 0, 0, 0),
(106, 7, '2022-08-01', 0, 0, 0, 0),
(107, 7, '2022-09-01', 0, 0, 0, 0),
(108, 7, '2022-10-01', 0, 0, 0, 0),
(109, 7, '2022-11-01', 0, 0, 0, 0),
(110, 7, '2022-12-01', 0, 0, 0, 0),
(111, 7, '2023-01-01', 0, 0, 0, 0),
(112, 7, '2023-02-01', 0, 0, 0, 0),
(113, 7, '2023-03-01', 0, 0, 0, 0),
(114, 7, '2023-04-01', 0, 0, 0, 0),
(115, 7, '2023-05-01', 0, 0, 0, 0),
(116, 7, '2023-06-01', 0, 0, 0, 0),
(117, 7, '2023-07-01', 0, 0, 0, 0),
(118, 7, '2023-08-01', 0, 0, 0, 0),
(119, 7, '2023-09-01', 0, 0, 0, 0),
(120, 7, '2023-10-01', 0, 0, 0, 0),
(121, 7, '2023-11-01', 0, 0, 0, 0),
(122, 7, '2023-12-01', 0, 0, 0, 0),
(123, 7, '2024-01-01', 0, 0, 0, 0),
(124, 7, '2024-02-01', 0, 0, 0, 0),
(125, 7, '2024-03-01', 0, 0, 0, 0),
(126, 7, '2024-04-01', 0, 0, 0, 0),
(127, 7, '2024-05-01', 0, 0, 0, 0),
(128, 7, '2024-06-01', 0, 0, 0, 0),
(129, 7, '2024-07-01', 0, 0, 0, 0),
(130, 7, '2024-08-01', 0, 0, 0, 0),
(131, 7, '2024-09-01', 0, 0, 0, 0),
(132, 7, '2024-10-01', 0, 0, 0, 0),
(133, 7, '2024-11-01', 0, 0, 0, 0),
(134, 7, '2024-12-01', 0, 0, 0, 0),
(135, 7, '2025-01-01', 0, 0, 0, 0),
(136, 7, '2025-02-01', 0, 0, 0, 0),
(137, 7, '2025-03-01', 0, 0, 0, 0),
(138, 7, '2025-04-01', 0, 0, 0, 0),
(139, 7, '2025-05-01', 0, 0, 0, 0),
(140, 7, '2025-06-01', 0, 0, 0, 0),
(141, 7, '2025-07-01', 0, 0, 0, 0),
(142, 7, '2025-08-01', 0, 0, 0, 0),
(143, 7, '2025-09-01', 0, 0, 0, 0),
(144, 7, '2025-10-01', 0, 0, 0, 0),
(145, 5, '2021-05-01', 0, 0, 0, 0),
(146, 5, '2021-06-01', 0, 0, 0, 0),
(147, 5, '2021-07-01', 0, 0, 0, 0),
(148, 5, '2021-08-01', 0, 0, 0, 0),
(149, 5, '2021-09-01', 0, 0, 0, 0),
(150, 5, '2021-10-01', 0, 0, 0, 0),
(151, 5, '2021-11-01', 0, 0, 0, 0),
(152, 5, '2021-12-01', 0, 0, 0, 0),
(153, 5, '2022-01-01', 0, 0, 0, 0),
(154, 5, '2022-02-01', 0, 0, 0, 0),
(155, 5, '2022-03-01', 0, 0, 0, 0),
(156, 5, '2022-04-01', 0, 0, 0, 0),
(157, 5, '2022-05-01', 0, 0, 0, 0),
(158, 5, '2022-06-01', 0, 0, 0, 0),
(159, 5, '2022-07-01', 0, 0, 0, 0),
(160, 5, '2022-08-01', 0, 0, 0, 0),
(161, 5, '2022-09-01', 0, 0, 0, 0),
(162, 5, '2022-10-01', 0, 0, 0, 0),
(163, 5, '2022-11-01', 0, 0, 0, 0),
(164, 5, '2022-12-01', 0, 0, 0, 0),
(165, 5, '2023-01-01', 0, 0, 0, 0),
(166, 5, '2023-02-01', 0, 0, 0, 0),
(167, 5, '2023-03-01', 0, 0, 0, 0),
(168, 5, '2023-04-01', 0, 0, 0, 0),
(169, 5, '2023-05-01', 0, 0, 0, 0),
(170, 5, '2023-06-01', 0, 0, 0, 0),
(171, 5, '2023-07-01', 0, 0, 0, 0),
(172, 5, '2023-08-01', 0, 0, 0, 0),
(173, 5, '2023-09-01', 0, 0, 0, 0),
(174, 5, '2023-10-01', 0, 0, 0, 0),
(175, 5, '2023-11-01', 0, 0, 0, 0),
(176, 5, '2023-12-01', 0, 0, 0, 0),
(177, 5, '2024-01-01', 0, 0, 0, 0),
(178, 5, '2024-02-01', 0, 0, 0, 0),
(179, 5, '2024-03-01', 0, 0, 0, 0),
(180, 5, '2024-04-01', 0, 0, 0, 0),
(181, 5, '2024-05-01', 0, 0, 0, 0),
(182, 5, '2024-06-01', 0, 0, 0, 0),
(183, 5, '2024-07-01', 0, 0, 0, 0),
(184, 5, '2024-08-01', 0, 0, 0, 0),
(185, 5, '2024-09-01', 0, 0, 0, 0),
(186, 5, '2024-10-01', 0, 0, 0, 0),
(187, 5, '2024-11-01', 0, 0, 0, 0),
(188, 5, '2024-12-01', 0, 0, 0, 0),
(189, 5, '2025-01-01', 0, 0, 0, 0),
(190, 5, '2025-02-01', 0, 0, 0, 0),
(191, 5, '2025-03-01', 0, 0, 0, 0),
(192, 5, '2025-04-01', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dockajian`
--

CREATE TABLE `dockajian` (
  `dock_id` int(11) NOT NULL,
  `dock_petugas` int(11) NOT NULL,
  `dock_waktu_asmen` datetime NOT NULL,
  `dock_waktu_avp` datetime DEFAULT NULL,
  `dock_waktu_vp` datetime DEFAULT NULL,
  `dock_waktu_gm` datetime DEFAULT NULL,
  `dock_avp` int(11) DEFAULT NULL,
  `dock_vp` int(11) DEFAULT NULL,
  `dock_gm` int(11) DEFAULT NULL,
  `dock_tujuan_vp` int(11) DEFAULT NULL,
  `dock_tujuan_avp` int(11) DEFAULT NULL,
  `dock_tujuan_gm` int(11) DEFAULT NULL,
  `dock_nama` varchar(255) NOT NULL,
  `dock_desk` varchar(255) NOT NULL,
  `dock_jenis` varchar(255) NOT NULL,
  `dock_kategori` varchar(255) NOT NULL,
  `dock_aspek` varchar(255) NOT NULL,
  `dock_tanggal` date NOT NULL,
  `dock_lokasi` varchar(255) NOT NULL,
  `dock_file` varchar(255) NOT NULL,
  `dock_comment` text NOT NULL,
  `dock_alasan_reject` text DEFAULT NULL,
  `dock_status_asmen` varchar(255) NOT NULL,
  `dock_status_avp` varchar(255) DEFAULT NULL,
  `dock_status_vp` varchar(255) DEFAULT NULL,
  `dock_status_gm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dockajian`
--

INSERT INTO `dockajian` (`dock_id`, `dock_petugas`, `dock_waktu_asmen`, `dock_waktu_avp`, `dock_waktu_vp`, `dock_waktu_gm`, `dock_avp`, `dock_vp`, `dock_gm`, `dock_tujuan_vp`, `dock_tujuan_avp`, `dock_tujuan_gm`, `dock_nama`, `dock_desk`, `dock_jenis`, `dock_kategori`, `dock_aspek`, `dock_tanggal`, `dock_lokasi`, `dock_file`, `dock_comment`, `dock_alasan_reject`, `dock_status_asmen`, `dock_status_avp`, `dock_status_vp`, `dock_status_gm`) VALUES
(3, 10, '2024-10-15 09:17:11', '2024-10-15 11:29:09', '2024-10-15 13:27:40', '2024-10-15 14:19:22', 38, 47, 50, 47, 38, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Normal', 'Sesuai dengan Aspek K3L PTBA', '2024-10-01', 'Kantor Penambangan Klawas', '1955036245_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(4, 11, '2024-10-15 09:17:56', '2024-10-15 11:29:44', '2024-10-15 13:27:35', '2024-10-15 14:19:19', 38, 47, 50, 47, 38, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Jasa', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-02', 'Kantor Penambangan Klawas', '1954307382_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(5, 12, '2024-10-15 09:18:34', '2024-10-15 11:29:56', '2024-10-15 13:27:25', '2024-10-15 14:35:31', 38, 47, 50, 47, 38, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-03', 'Kantor Penambangan Klawas', '569204972_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(6, 13, '2024-10-15 09:19:57', '2024-10-15 11:34:08', '2024-10-15 13:27:09', '2024-10-15 14:19:16', 39, 47, 50, 47, 39, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Jasa', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-04', 'Kantor Penambangan Klawas', '1110754986_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(7, 15, '2024-10-15 09:20:53', '2024-10-15 11:35:59', '2024-10-15 13:26:58', '2024-10-15 14:19:13', 39, 47, 50, 47, 39, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-05', 'Kantor Penambangan Klawas', '2076528351_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(8, 16, '2024-10-15 09:34:48', '2024-10-15 11:36:05', '2024-10-15 13:26:52', '2024-10-15 14:19:10', 39, 47, 50, 47, 39, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Jasa', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-06', 'Kantor Penambangan Klawas', '1558197486_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(9, 17, '2024-10-15 09:35:25', '2024-10-15 11:45:04', '2024-10-15 13:26:47', '2024-10-15 14:19:07', 40, 47, 50, 47, 40, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Bangko untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-07', 'Kantor Penambangan Klawas', '1649090466_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', 'jjhbfd', 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(10, 18, '2024-10-15 09:36:06', '2024-10-15 11:44:59', '2024-10-15 13:25:50', '2024-10-15 14:19:03', 40, 47, 50, 47, 40, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Normal', 'Sesuai dengan Aspek K3L PTBA', '2024-10-08', 'Kantor Penambangan Klawas', '1565955586_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(11, 19, '2024-10-15 09:41:48', '2024-10-15 11:44:53', '2024-10-15 13:25:17', '2024-10-15 14:18:59', 40, 47, 50, 47, 40, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-09', 'Kantor Penambangan Klawas', '1695278794_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', 'berkas tidak lengkap', 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(12, 20, '2024-10-15 09:42:19', '2024-10-15 11:45:27', '2024-10-15 13:29:19', '2024-10-15 14:18:55', 41, 48, 50, 48, 41, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Barang', 'Mendesak', 'Sesuai dengan Aspek K3L PTBA', '2024-10-10', 'Kantor Penambangan Klawas', '1681609253_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(13, 21, '2024-10-15 09:47:07', '2024-10-15 11:45:32', '2024-10-15 13:29:15', '2024-10-15 14:18:52', 41, 48, 50, 48, 41, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Jasa', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-11', 'Kantor Penambangan Klawas', '566720796_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(14, 22, '2024-10-15 09:47:36', '2024-10-15 11:45:38', '2024-10-15 13:29:04', '2024-10-15 14:18:49', 41, 48, 50, 48, 41, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-12', 'Kantor Penambangan Klawas', '1235484358_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(15, 23, '2024-10-15 09:49:29', '2024-10-15 11:46:25', '2024-10-15 13:28:57', '2024-10-15 14:18:45', 42, 48, 50, 48, 42, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Barang', 'Mendesak', 'Sesuai dengan Aspek K3L PTBA', '2024-10-13', 'Kantor Penambangan Klawas', '1686887485_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(16, 24, '2024-10-15 09:49:57', '2024-10-15 11:46:29', '2024-10-15 13:28:49', '2024-10-15 14:18:41', 42, 48, 50, 48, 42, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Jasa', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-14', 'Kantor Penambangan Klawas', '355930189_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(17, 25, '2024-10-15 09:50:24', '2024-10-15 11:46:35', '2024-10-15 13:28:44', '2024-10-15 14:18:38', 42, 48, 50, 48, 42, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-15', 'Kantor Penambangan Klawas', '1449842835_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(18, 26, '2024-10-15 09:51:07', '2024-10-15 11:47:14', '2024-10-15 13:28:36', '2024-10-15 14:18:35', 43, 48, 50, 48, 43, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-16', 'Kantor Penambangan Klawas', '1777986483_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(19, 27, '2024-10-15 09:51:30', '2024-10-15 11:47:09', '2024-10-15 13:28:29', '2024-10-15 14:17:58', 43, 48, 50, 48, 43, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Jasa', 'Mendesak', 'Sesuai dengan Aspek K3L PTBA', '2024-10-17', 'Kantor Penambangan Klawas', '1917452250_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(20, 28, '2024-10-15 09:51:57', '2024-10-15 11:47:05', '2024-10-15 13:28:24', '2024-10-15 14:17:35', 43, 48, 50, 48, 43, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-18', 'Kantor Penambangan Klawas', '1266008651_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(21, 29, '2024-10-15 09:52:25', '2024-10-15 11:47:43', '2024-10-15 13:30:24', '2024-10-15 14:17:31', 44, 49, 50, 49, 44, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-19', 'Kantor Penambangan Klawas', '247493202_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(22, 30, '2024-10-15 09:53:27', '2024-10-15 11:47:40', '2024-10-15 13:30:19', '2024-10-15 14:17:26', 44, 49, 50, 49, 44, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-20', 'Kantor Penambangan Klawas', '769673801_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(23, 31, '2024-10-15 09:54:48', '2024-10-15 11:47:36', '2024-10-15 13:30:14', '2024-10-15 14:17:22', 44, 49, 50, 49, 44, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Barang', 'Mendesak', 'Sesuai dengan Aspek K3L PTBA', '2024-10-21', 'Kantor Penambangan Klawas', '1841747001_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(24, 32, '2024-10-15 09:55:27', '2024-10-15 11:48:20', '2024-10-15 13:30:09', '2024-10-15 14:17:18', 45, 49, 50, 49, 45, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-22', 'Kantor Penambangan Klawas', '1165192626_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(25, 33, '2024-10-15 09:56:31', '2024-10-15 11:48:17', '2024-10-15 13:30:03', '2024-10-15 14:17:14', 45, 49, 50, 49, 45, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-23', 'Kantor Penambangan Klawas', '1756384195_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(26, 34, '2024-10-15 09:56:54', '2024-10-15 11:48:13', '2024-10-15 13:29:58', '2024-10-15 14:17:10', 45, 49, 50, 49, 45, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Normal', 'Sesuai dengan Aspek K3L PTBA', '2024-10-24', 'Kantor Penambangan Klawas', '330061049_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(27, 35, '2024-10-15 09:57:37', '2024-10-15 11:48:46', '2024-10-15 13:29:52', '2024-10-15 14:17:01', 46, 49, 50, 49, 46, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-25', 'Kantor Penambangan Klawas', '491663930_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(30, 36, '2024-10-15 10:07:54', '2024-10-15 11:48:42', '2024-10-15 13:29:47', '2024-10-15 14:16:56', 46, 49, 50, 49, 46, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-26', 'Kantor Penambangan Klawas', '414165017_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(31, 37, '2024-10-15 10:08:38', '2024-10-15 11:48:38', '2024-10-15 13:29:43', '2024-10-15 14:16:23', 46, 49, 50, 49, 46, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-27', 'Kantor Penambangan Klawas', '173243151_Tampilan Website.pdf', 'Daging lebih mahal, lebih bergengsi, dan dalam bentuk permainan berburu biasanya hanya sebagai konsumsi kaum bangsawan. Yang paling umum dijual oleh tukang daging adalah daging babi, ayam, dan unggas domestik lainnya; sapi, yang mana membutuhkan investasi lahan lebih besar, lebih jarang dijumpai. Ikan kod dan haring menjadi andalan di daerah bagian utara; bahan makanan tersebut dikeringkan, diasap atau diasinkan oleh mereka yang tinggal di pedalaman, tetapi berbagai ikan air tawar dan ikan air asin lainnya juga dikonsumsi oleh mereka.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(33, 10, '2024-12-04 14:24:58', '2024-12-04 14:26:41', NULL, NULL, 38, NULL, NULL, NULL, 38, NULL, 'aaa', 'aaa', 'Barang', 'Normal', 'aaa', '2024-12-03', 'Kantor Penambangan Bangko', '2042091250_1279308882_1258905874_Laporan Produksi - 11 Nov 2024 (1) (1).pdf', 'assa', 'asdasd', 'Uploaded (Asmen)', 'Rejected (AVP)', NULL, NULL),
(34, 10, '2024-12-04 14:25:55', '2024-12-04 14:28:55', '2024-12-04 14:27:10', '2024-12-04 14:27:36', 38, 47, 50, 47, 38, 50, 'dsfsd', 'ghfhg', 'Barang', 'Normal', 'vs', '2025-01-10', 'sdfsdf', '1437943974_1279308882_1258905874_Laporan Produksi - 11 Nov 2024 (1) (1).pdf', 'sdfsd', 'dsfasd', 'Uploaded (Asmen)', 'Rejected (AVP)', 'Approved (VP)', 'Done'),
(35, 10, '2024-12-04 14:26:10', '2024-12-04 14:38:12', '2024-12-04 14:38:37', '2024-12-04 14:39:14', 38, 47, 50, 47, 38, 50, 'sdf', 'sdf', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2025-01-02', 'Kantor Penambangan Klawas', '13541125_1279308882_1258905874_Laporan Produksi - 11 Nov 2024 (1) (1).pdf', 'sdf', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `doc_kak_hps`
--

CREATE TABLE `doc_kak_hps` (
  `dockh_id` int(11) NOT NULL,
  `dockh_dock_id` int(11) NOT NULL,
  `dockh_petugas` int(11) NOT NULL,
  `dockh_waktu_asmen` datetime NOT NULL,
  `dockh_waktu_avp` datetime DEFAULT NULL,
  `dockh_waktu_vp` datetime DEFAULT NULL,
  `dockh_waktu_gm` datetime DEFAULT NULL,
  `dockh_avp` int(11) DEFAULT NULL,
  `dockh_vp` int(11) DEFAULT NULL,
  `dockh_gm` int(11) DEFAULT NULL,
  `dockh_tujuan_avp` int(11) DEFAULT NULL,
  `dockh_tujuan_vp` int(11) DEFAULT NULL,
  `dockh_tujuan_gm` int(11) DEFAULT NULL,
  `dockh_nama` varchar(255) NOT NULL,
  `dockh_desk` varchar(255) NOT NULL,
  `dockh_jenis` varchar(255) NOT NULL,
  `dockh_kategori` varchar(255) NOT NULL,
  `dockh_aspek` varchar(255) NOT NULL,
  `dockh_tanggal` date NOT NULL,
  `dockh_lokasi` varchar(255) NOT NULL,
  `dockh_cost` varchar(255) NOT NULL,
  `dockh_satuan` varchar(255) NOT NULL,
  `dockh_harga` double NOT NULL,
  `dockh_jumlah` double NOT NULL,
  `dockh_harga_total` double NOT NULL,
  `dockh_file_kak` varchar(255) NOT NULL,
  `dockh_file_hps` varchar(255) NOT NULL,
  `dockh_comment` text NOT NULL,
  `dockh_alasan_reject` text DEFAULT NULL,
  `dockh_status_asmen` varchar(255) NOT NULL,
  `dockh_status_avp` varchar(255) DEFAULT NULL,
  `dockh_status_vp` varchar(255) DEFAULT NULL,
  `dockh_status_gm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_kak_hps`
--

INSERT INTO `doc_kak_hps` (`dockh_id`, `dockh_dock_id`, `dockh_petugas`, `dockh_waktu_asmen`, `dockh_waktu_avp`, `dockh_waktu_vp`, `dockh_waktu_gm`, `dockh_avp`, `dockh_vp`, `dockh_gm`, `dockh_tujuan_avp`, `dockh_tujuan_vp`, `dockh_tujuan_gm`, `dockh_nama`, `dockh_desk`, `dockh_jenis`, `dockh_kategori`, `dockh_aspek`, `dockh_tanggal`, `dockh_lokasi`, `dockh_cost`, `dockh_satuan`, `dockh_harga`, `dockh_jumlah`, `dockh_harga_total`, `dockh_file_kak`, `dockh_file_hps`, `dockh_comment`, `dockh_alasan_reject`, `dockh_status_asmen`, `dockh_status_avp`, `dockh_status_vp`, `dockh_status_gm`) VALUES
(2, 3, 10, '2024-10-15 14:29:10', '2024-10-15 14:39:14', '2024-10-15 14:45:37', '2024-10-15 14:49:30', 38, 47, 50, 38, 47, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Normal', 'Sesuai dengan Aspek K3L PTBA', '2024-10-01', 'Kantor Penambangan Klawas', 'A13424332 1244', 'Pcs', 2000, 12, 24000, '229238819_Tampilan Website.pdf', '1774080360_Tampilan Website.pdf', 'Suatu jenis masakan olahan dikembangkan pada Abad Pertengahan Akhir yang mana menjadi norma kalangan bangsawan di seluruh Eropa. Bumbu-bumbu penyedap yang umum dalam perbendaharaan asam-manis yang sangat berbumbu khas makanan abad pertengahan kelas atas meliputi jus masam (verjuice), anggur, dan vinegar dikombinasikan dengan rempah seperti lada hitam, kuma-kuma, dan jahe. Semua itu, seiring dengan meluasnya penggunaan gula atau madu, memberi rasa asam-manis pada banyak hidangan. Almond sangat populer sebagai pengental dalam sup, rebusan, dan saus, terutama sebagai susu almond.', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(3, 4, 11, '2024-10-15 15:01:31', NULL, NULL, NULL, NULL, NULL, NULL, 38, NULL, NULL, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Tambang untuk ruangan VP Penambangan', 'Jasa', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-02', 'Kantor Penambangan Klawas', 'A13424332 1244', 'Set', 2000, 12, 24000, '2080995532_Tampilan Website.pdf', '1432575057_Tampilan Website.pdf', 'Teknik pengawetan makanan (terutama pengeringan, pengasinan, pengasapan, dan pengasaman) dan waktu pengangkutan yang lama menjadikan perdagangan jarak jauh atas banyak jenis makanan sangatlah mahal. Karena itu, makanan kaum bangsawan lebih cenderung terpengaruh bangsa asing dibanding dengan masakan kaum miskin; ini bergantung pada rempah-rempah eksotis dan biaya impor yang mahal. Sebagaimana setiap lapisan masyarakat mengikuti salah satu hal di atas, inovasi-inovasi dari perdagangan internasional dan peperangan dengan bangsa asing sejak abad ke-12 dan seterusnya secara bertahap tersebar luas melalui kelas menengah atas di kota-kota abad pertengahan. Selain tidak tersedianya barang mewah — seperti rempah-rempah — secara ekonomis, ada berbagai ketetapan yang melarang konsumsi makanan tertentu di kelas-kelas sosial tertentu dan hukum yang membatasi konsumsi berlebihan (demi publisitas) pada golongan orang kaya baru. Norma sosial juga menetapkan bahwa makanan kelas pekerja harus lebih sederhana, karena diyakini ada kemiripan alamiah antara pekerjaan dan makanan seseorang; pekerja kasar perlu makanan yang lebih kesat, yang lebih murah.', NULL, 'Uploaded (Asmen)', NULL, NULL, NULL),
(4, 8, 16, '2024-10-15 15:04:01', NULL, NULL, NULL, NULL, NULL, NULL, 39, NULL, NULL, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Jasa', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2024-10-06', 'Kantor Penambangan Klawas', 'A13424332 1244', 'Set', 2000, 12, 24000, '1543771395_Tampilan Website.pdf', '714652381_Tampilan Website.pdf', 'Teknik pengawetan makanan (terutama pengeringan, pengasinan, pengasapan, dan pengasaman) dan waktu pengangkutan yang lama menjadikan perdagangan jarak jauh atas banyak jenis makanan sangatlah mahal. Karena itu, makanan kaum bangsawan lebih cenderung terpengaruh bangsa asing dibanding dengan masakan kaum miskin; ini bergantung pada rempah-rempah eksotis dan biaya impor yang mahal. Sebagaimana setiap lapisan masyarakat mengikuti salah satu hal di atas, inovasi-inovasi dari perdagangan internasional dan peperangan dengan bangsa asing sejak abad ke-12 dan seterusnya secara bertahap tersebar luas melalui kelas menengah atas di kota-kota abad pertengahan. Selain tidak tersedianya barang mewah — seperti rempah-rempah — secara ekonomis, ada berbagai ketetapan yang melarang konsumsi makanan tertentu di kelas-kelas sosial tertentu dan hukum yang membatasi konsumsi berlebihan (demi publisitas) pada golongan orang kaya baru. Norma sosial juga menetapkan bahwa makanan kelas pekerja harus lebih sederhana, karena diyakini ada kemiripan alamiah antara pekerjaan dan makanan seseorang; pekerja kasar perlu makanan yang lebih kesat, yang lebih murah.', NULL, 'Uploaded (Asmen)', NULL, NULL, NULL),
(5, 35, 10, '2024-12-04 14:28:12', '2024-12-04 14:38:16', '2024-12-04 14:39:04', '2024-12-04 14:39:22', 38, 47, 50, 38, 47, 50, 'sdf', 'sdf', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2025-01-02', 'Kantor Penambangan Klawas', 'ssdaasd', 'Ea', 11, 11, 121, '206828320_1279308882_1258905874_Laporan Produksi - 11 Nov 2024 (1) (1).pdf', '1085269323_1279308882_1258905874_Laporan Produksi - 11 Nov 2024 (1) (1).pdf', 'dfsdf', NULL, 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(6, 34, 10, '2024-12-04 14:28:29', '2024-12-04 14:29:04', NULL, NULL, 38, NULL, NULL, 38, NULL, NULL, 'dsfsd', 'ghfhg', 'Barang', 'Normal', 'vs', '2025-01-10', 'sdfsdf', 'sadasd', 'Carton', 12, 21, 252, '993702935_1279308882_1258905874_Laporan Produksi - 11 Nov 2024 (1) (1).pdf', '93851115_1279308882_1258905874_Laporan Produksi - 11 Nov 2024 (1) (1).pdf', 'dsfd', 'cvsdcsd', 'Uploaded (Asmen)', 'Rejected (AVP)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doc_kontrak`
--

CREATE TABLE `doc_kontrak` (
  `dockt_id` int(11) NOT NULL,
  `dockt_dock_id` int(11) NOT NULL,
  `dockt_petugas` int(11) NOT NULL,
  `dockt_waktu_asmen` datetime NOT NULL,
  `dockt_waktu_avp` datetime DEFAULT NULL,
  `dockt_waktu_vp` datetime DEFAULT NULL,
  `dockt_waktu_gm` datetime DEFAULT NULL,
  `dockt_avp` int(11) DEFAULT NULL,
  `dockt_vp` int(11) DEFAULT NULL,
  `dockt_gm` int(11) DEFAULT NULL,
  `dockt_tujuan_avp` int(11) DEFAULT NULL,
  `dockt_tujuan_vp` int(11) DEFAULT NULL,
  `dockt_tujuan_gm` int(11) DEFAULT NULL,
  `dockt_nama` varchar(255) NOT NULL,
  `dockt_desk` varchar(255) NOT NULL,
  `dockt_jenis` varchar(255) NOT NULL,
  `dockt_kategori` varchar(255) NOT NULL,
  `dockt_aspek` varchar(255) NOT NULL,
  `dockt_tanggal` date NOT NULL,
  `dockt_lokasi` varchar(255) NOT NULL,
  `dockt_file` varchar(255) NOT NULL,
  `dockt_comment` text NOT NULL,
  `dockt_alasan_reject` text NOT NULL,
  `dockt_status_asmen` varchar(255) NOT NULL,
  `dockt_status_avp` varchar(255) DEFAULT NULL,
  `dockt_status_vp` varchar(255) DEFAULT NULL,
  `dockt_status_gm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_kontrak`
--

INSERT INTO `doc_kontrak` (`dockt_id`, `dockt_dock_id`, `dockt_petugas`, `dockt_waktu_asmen`, `dockt_waktu_avp`, `dockt_waktu_vp`, `dockt_waktu_gm`, `dockt_avp`, `dockt_vp`, `dockt_gm`, `dockt_tujuan_avp`, `dockt_tujuan_vp`, `dockt_tujuan_gm`, `dockt_nama`, `dockt_desk`, `dockt_jenis`, `dockt_kategori`, `dockt_aspek`, `dockt_tanggal`, `dockt_lokasi`, `dockt_file`, `dockt_comment`, `dockt_alasan_reject`, `dockt_status_asmen`, `dockt_status_avp`, `dockt_status_vp`, `dockt_status_gm`) VALUES
(3, 3, 10, '2024-10-15 15:00:38', '2024-10-15 15:21:12', '2024-10-15 15:29:11', '2024-10-15 15:35:02', 38, 47, 50, 38, 47, 50, 'Pengadaan Perlengkapan Kantor', 'Pengadaan Perlengkapan Kantor untuk ruangan VP Penambangan', 'Barang', 'Normal', 'Sesuai dengan Aspek K3L PTBA', '2024-10-01', 'Kantor Penambangan Klawas', '1459105342_Tampilan Website.pdf', 'Teknik pengawetan makanan (terutama pengeringan, pengasinan, pengasapan, dan pengasaman) dan waktu pengangkutan yang lama menjadikan perdagangan jarak jauh atas banyak jenis makanan sangatlah mahal. Karena itu, makanan kaum bangsawan lebih cenderung terpengaruh bangsa asing dibanding dengan masakan kaum miskin; ini bergantung pada rempah-rempah eksotis dan biaya impor yang mahal. Sebagaimana setiap lapisan masyarakat mengikuti salah satu hal di atas, inovasi-inovasi dari perdagangan internasional dan peperangan dengan bangsa asing sejak abad ke-12 dan seterusnya secara bertahap tersebar luas melalui kelas menengah atas di kota-kota abad pertengahan. Selain tidak tersedianya barang mewah — seperti rempah-rempah — secara ekonomis, ada berbagai ketetapan yang melarang konsumsi makanan tertentu di kelas-kelas sosial tertentu dan hukum yang membatasi konsumsi berlebihan (demi publisitas) pada golongan orang kaya baru. Norma sosial juga menetapkan bahwa makanan kelas pekerja harus lebih sederhana, karena diyakini ada kemiripan alamiah antara pekerjaan dan makanan seseorang; pekerja kasar perlu makanan yang lebih kesat, yang lebih murah.', 'berkas tidak lengkap', 'Uploaded (Asmen)', 'Approved (AVP)', 'Approved (VP)', 'Done'),
(4, 35, 10, '2024-12-04 14:39:56', '2024-12-04 14:40:15', NULL, NULL, 38, NULL, NULL, 38, NULL, NULL, 'sdf', 'sdf', 'Barang', 'Penting', 'Sesuai dengan Aspek K3L PTBA', '2025-01-02', 'Kantor Penambangan Klawas', '263721062_1279308882_1258905874_Laporan Produksi - 11 Nov 2024 (1) (1).pdf', 'adasd', 'sd', 'Uploaded (Asmen)', 'Rejected (AVP)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `header_kontrak`
--

CREATE TABLE `header_kontrak` (
  `header_id` int(11) NOT NULL,
  `header_judul` varchar(255) NOT NULL,
  `header_nomor` int(11) NOT NULL,
  `header_kategori` varchar(255) NOT NULL,
  `header_ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header_kontrak`
--

INSERT INTO `header_kontrak` (`header_id`, `header_judul`, `header_nomor`, `header_kategori`, `header_ket`) VALUES
(4, 'PEKERJAAN JASA SEWA ALAT-ALAT BERAT BULLDOZER D65-12 DAN EXCAVATOR 320 GC SATKER PENAMBANGAN', 13636, 'JASA SEWA ALAT', ''),
(5, 'PEKERJAAN JASA SEWA ALAT PENUNJANG TAMBANG (APT)', 14369, 'JASA SEWA ALAT', ''),
(6, 'PEKERJAAN JASA SEWA HD 785 & WATER TRUK 16 KL', 16147, 'JASA SEWA ALAT', ''),
(7, 'PEKERJAAN JASA SEWA ALAT BERAT DAN ALAT PENUNJANG TAMBANG (APT)', 16002, 'JASA SEWA ALAT', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(17, 'Invoicing'),
(18, 'Nota Dinas Masuk'),
(19, 'Nota Dinas Keluar'),
(20, 'Surat Masuk'),
(21, 'Surat Keluar'),
(22, 'Berita Acara'),
(23, 'Rencana Kerja'),
(24, 'Risalah Rapat'),
(25, 'Logbook');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `kontrak_id` int(11) NOT NULL,
  `kontrak_header_id` int(11) NOT NULL,
  `kontrak_desk` varchar(255) NOT NULL,
  `kontrak_jumlah` int(11) NOT NULL,
  `kontrak_tahun` year(4) NOT NULL,
  `kontrak_masa` int(11) NOT NULL,
  `kontrak_awal` date NOT NULL,
  `kontrak_akhir` date NOT NULL,
  `kontrak_minhm` int(11) NOT NULL,
  `kontrak_maxhm` int(11) NOT NULL,
  `kontrak_tarif` double NOT NULL,
  `kontrak_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`kontrak_id`, `kontrak_header_id`, `kontrak_desk`, `kontrak_jumlah`, `kontrak_tahun`, `kontrak_masa`, `kontrak_awal`, `kontrak_akhir`, `kontrak_minhm`, `kontrak_maxhm`, `kontrak_tarif`, `kontrak_total`) VALUES
(7, 4, 'SEWA ALAT BULLDOZER D65-12', 1, '2020', 48, '2020-10-01', '2024-10-01', 150, 450, 417955, 9027828000),
(8, 4, 'SEWA ALAT EXCAVATOR 320 GC', 1, '2020', 48, '2020-10-01', '2024-10-01', 150, 450, 239915.37037037, 5182172000),
(9, 5, 'SEWA ALAT EXCAVATOR PC200', 1, '2021', 48, '2021-05-01', '2025-05-01', 200, 380, 306107.037213268, 5583392358.77),
(10, 5, 'SEWA ALAT BULLDOZER D85ESS-2A', 2, '2021', 48, '2021-05-01', '2025-05-01', 200, 380, 527647.668109375, 19248586932.63),
(11, 5, 'SEWA ALAT COMPACTOR 20 TON', 1, '2021', 48, '2021-05-01', '2025-05-01', 200, 300, 459243.331185417, 6613103969.07),
(12, 6, 'SEWA ALAT KOMATSU HD 785-7', 10, '2016', 12, '2021-05-01', '2022-05-01', 250, 400, 2317141, 111222768000),
(13, 6, 'SEWA ALAT WATER TRUCK 16 KL', 3, '2021', 48, '2021-05-01', '2025-05-01', 200, 400, 139000000, 8006400000000),
(15, 7, 'SEWA ALAT MOTOR GRADER 14', 2, '2021', 48, '2021-11-01', '2025-11-01', 300, 400, 895000, 34368000000),
(16, 7, 'SEWA ALAT BULLDOZER D9', 3, '2021', 48, '2021-11-01', '2025-11-01', 300, 400, 1284400, 73981440000),
(17, 7, 'SEWA ALAT BULLDOZER D65P-12', 2, '2021', 48, '2021-11-01', '2025-11-01', 300, 400, 537000, 20620800000),
(18, 7, 'SEWA ALAT COMPACTOR 20 TON', 2, '2021', 48, '2021-11-01', '2025-11-01', 200, 300, 415700, 11972160000);

-- --------------------------------------------------------

--
-- Table structure for table `orderme_isi`
--

CREATE TABLE `orderme_isi` (
  `ordermeisi_id` int(11) NOT NULL,
  `ordermeisi_order_id` int(11) NOT NULL,
  `ordermeisi_tanggal` date NOT NULL,
  `ordermeisi_history` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderme_isi`
--

INSERT INTO `orderme_isi` (`ordermeisi_id`, `ordermeisi_order_id`, `ordermeisi_tanggal`, `ordermeisi_history`) VALUES
(16, 12, '2024-12-02', 'Koordinasi via wa untuk pelaksaan pekerjaan'),
(17, 12, '2024-12-03', 'Awal Pengerjaan'),
(18, 12, '2024-12-04', 'Progress pemasangan AC'),
(19, 13, '2024-12-09', 'Progress pemasangan AC'),
(20, 13, '2024-12-10', 'Progress pemasangan AC');

-- --------------------------------------------------------

--
-- Table structure for table `order_me`
--

CREATE TABLE `order_me` (
  `orderme_id` int(11) NOT NULL,
  `orderme_kategori` varchar(255) NOT NULL,
  `orderme_tanggal` date NOT NULL,
  `orderme_request` varchar(255) NOT NULL,
  `orderme_desk` varchar(255) NOT NULL,
  `orderme_lokasi` varchar(255) NOT NULL,
  `orderme_pj` varchar(255) DEFAULT NULL,
  `orderme_penerima` varchar(255) NOT NULL,
  `orderme_status` varchar(255) NOT NULL,
  `orderme_tglselesai` date NOT NULL,
  `orderme_dokumen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_me`
--

INSERT INTO `order_me` (`orderme_id`, `orderme_kategori`, `orderme_tanggal`, `orderme_request`, `orderme_desk`, `orderme_lokasi`, `orderme_pj`, `orderme_penerima`, `orderme_status`, `orderme_tglselesai`, `orderme_dokumen`) VALUES
(12, 'Perbaikan', '2024-12-01', 'Perbaikan AC sebanyak 1 unit', 'Perbaikan AC kantor klawas ruang admin', 'Ruang Admin', 'Budi Santosa', 'Budi Santoso', 'Close', '2024-12-05', '387019079_439416700_1258905874_Laporan Produksi - 11 Nov 2024 (2) (2).pdf'),
(13, 'Perbaikan', '2024-12-08', 'Perbaikan AC sebanyak 3 unit', 'Perbaikan AC kantor msf ruang admin', 'Ruang Admin', NULL, 'Budi Santoso', 'On Progress', '0000-00-00', NULL),
(14, 'Perbaikan', '2024-12-15', 'Perbaikan AC sebanyak 5 unit', 'Perbaikan AC kantor klawas ruang server', 'Ruang Admin', NULL, 'Budi Santoso', 'Open', '0000-00-00', NULL);

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
(38, '2024-12-15 11:17:44', 8, 45),
(39, '2024-12-15 11:17:46', 8, 42),
(40, '2024-12-15 11:17:48', 8, 41),
(41, '2024-12-15 11:17:49', 8, 40),
(42, '2024-12-15 11:17:50', 8, 39),
(43, '2024-12-15 11:17:51', 8, 37),
(44, '2024-12-15 11:17:52', 8, 36),
(45, '2024-12-15 11:17:53', 8, 35),
(46, '2024-12-15 11:17:54', 8, 34),
(47, '2024-12-15 11:17:55', 8, 33),
(48, '2024-12-15 11:18:10', 9, 45),
(49, '2024-12-15 11:18:14', 9, 42),
(50, '2024-12-15 11:18:15', 9, 41),
(51, '2024-12-15 11:18:16', 9, 40),
(52, '2024-12-15 11:18:16', 9, 39),
(53, '2024-12-15 11:18:18', 9, 37);

-- --------------------------------------------------------

--
-- Table structure for table `status_arsip`
--

CREATE TABLE `status_arsip` (
  `status_id` int(11) NOT NULL,
  `status_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_arsip`
--

INSERT INTO `status_arsip` (`status_id`, `status_nama`) VALUES
(4, 'Open'),
(5, 'On Progress'),
(6, 'Close');

-- --------------------------------------------------------

--
-- Table structure for table `status_pr`
--

CREATE TABLE `status_pr` (
  `statuspr_id` int(11) NOT NULL,
  `statuspr_tanggal_pengajuan` date NOT NULL,
  `statuspr_kode` varchar(255) NOT NULL,
  `statuspr_nama` varchar(255) NOT NULL,
  `statuspr_jumlah` int(11) NOT NULL,
  `statuspr_satuan` varchar(255) NOT NULL,
  `statuspr_vendor` varchar(255) NOT NULL,
  `statuspr_tanggal_proses` date DEFAULT NULL,
  `statuspr_tahap` varchar(255) DEFAULT NULL,
  `statuspr_lama` int(11) DEFAULT NULL,
  `statuspr_estimasi` date NOT NULL,
  `statuspr_status` varchar(255) NOT NULL,
  `statuspr_catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_pr`
--

INSERT INTO `status_pr` (`statuspr_id`, `statuspr_tanggal_pengajuan`, `statuspr_kode`, `statuspr_nama`, `statuspr_jumlah`, `statuspr_satuan`, `statuspr_vendor`, `statuspr_tanggal_proses`, `statuspr_tahap`, `statuspr_lama`, `statuspr_estimasi`, `statuspr_status`, `statuspr_catatan`) VALUES
(12, '2024-12-01', 'PR-202412-001', 'Alat Berat Excavator', 1, 'Unit', 'PT Mesin Tambang', '0000-00-00', NULL, 0, '2024-12-10', 'Open', NULL),
(13, '2024-12-06', 'PR-202412-002', 'Komponen Convoyer', 2, 'Pcs', 'PT Sparepart Nusantara', '0000-00-00', NULL, 0, '2024-12-15', 'On Progress', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superadmin_id` int(11) NOT NULL,
  `superadmin_nama` varchar(255) NOT NULL,
  `superadmin_username` varchar(255) NOT NULL,
  `superadmin_password` varchar(255) NOT NULL,
  `superadmin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`superadmin_id`, `superadmin_nama`, `superadmin_username`, `superadmin_password`, `superadmin_foto`) VALUES
(2, 'superadmin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', '186212315_3.png');

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
  `pks_kode` varchar(255) NOT NULL,
  `pks_nama` varchar(255) NOT NULL,
  `pks_username` varchar(255) NOT NULL,
  `pks_password` varchar(255) NOT NULL,
  `pks_foto` varchar(255) NOT NULL,
  `pks_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_pks`
--

INSERT INTO `user_pks` (`pks_id`, `pks_kode`, `pks_nama`, `pks_username`, `pks_password`, `pks_foto`, `pks_level`) VALUES
(10, 'AD-AM-AA-1', 'asmen1', 'asmen1', 'fe4f99f915a0bf300105985581e5bdf9', '83067462_1073842483_3.png', 'ASMEN'),
(11, 'AD-AM-AA-2', 'asmen2', 'asmen2', '2f9716895ffc644a410e2bd722ec8078', '1782508757_1073842483_3.png', 'ASMEN'),
(12, 'AD-AM-AA-3', 'asmen3', 'asmen3', '728409d94edd7b6a9682d4dfaa7837a8', '1145629957_1073842483_3.png', 'ASMEN'),
(13, 'AD-AM-AB-1', 'asmen4', 'asmen4', 'b6f0804433dba53d81b05bf10b75d993', '355830679_1782508757_1073842483_3.png', 'ASMEN'),
(15, 'AD-AM-AB-2', 'asmen5', 'asmen5', 'd2830e2a10a7702359b17a8ff3e610d1', '734034742_1782508757_1073842483_3.png', 'ASMEN'),
(16, 'AD-AM-AB-3', 'asmen6', 'asmen6', '60c531b982ace77a5e98db8f807446e3', '1063918984_1782508757_1073842483_3.png', 'ASMEN'),
(17, 'AD-AM-AC-1', 'asmen7', 'asmen7', '58078b92d2b041304abca091e541eb6d', '604135192_1145629957_1073842483_3.png', 'ASMEN'),
(18, 'AD-AM-AC-2', 'asmen8', 'asmen8', 'ea7ca65a8b9ea731660430a4bda73405', '969450296_1782508757_1073842483_3.png', 'ASMEN'),
(19, 'AD-AM-AC-3', 'asmen9', 'asmen9', '3c46b7778bcd5ac88f8bb107457123c8', '1275895142_294215809_3.png', 'ASMEN'),
(20, 'AD-AM-BA-1', 'asmen10', 'asmen10', '942f7377ed14131c5611ff21a4a6d615', '1068088102_294215809_3.png', 'ASMEN'),
(21, 'AD-AM-BA-2', 'asmen11', 'asmen11', '50bbc137d71f536c517716f609008eb8', '1501751747_294215809_3.png', 'ASMEN'),
(22, 'AD-AM-BA-3', 'asmen12', 'asmen12', '4ac2cafbad901b5ab011c5eede5aea9d', '2081912120_294215809_3.png', 'ASMEN'),
(23, 'AD-AM-BB-1', 'asmen13', 'asmen13', 'd452c7b9f2454d179deb1ca625c9175d', '160300124_294215809_3.png', 'ASMEN'),
(24, 'AD-AM-BB-2', 'asmen14', 'asmen14', 'e4cb672a7d30c8fc751486a7a4bcead6', '1593856327_160300124_294215809_3.png', 'ASMEN'),
(25, 'AD-AM-BB-3', 'asmen15', 'asmen15', 'b8345d5e55d62ae0a201a5bdb28a19dc', '1419029896_294215809_3.png', 'ASMEN'),
(26, 'AD-AM-BC-1', 'asmen16', 'asmen16', '5c1e739d9f43d5c8239da6426605693b', '588420837_294215809_3.png', 'ASMEN'),
(27, 'AD-AM-BC-2', 'asmen17', 'asmen17', '7dc88c9c3fb135b6129ac8968aeed2ab', '1015308114_294215809_3.png', 'ASMEN'),
(28, 'AD-AM-BC-3', 'asmen18', 'asmen18', '554233a462a8ee07462552c79f7eb174', '828700666_294215809_3.png', 'ASMEN'),
(29, 'AD-AM-CA-1', 'asmen19', 'asmen19', 'a69a62798afb45c2cb7c33ffd51400be', '1407090525_294215809_3.png', 'ASMEN'),
(30, 'AD-AM-CA-2', 'asmen20', 'asmen20', '62155d090f435d4df161d5a64ee56670', '838328966_294215809_3.png', 'ASMEN'),
(31, 'AD-AM-CA-3', 'asmen21', 'asmen21', 'aed9bfa03ea6da73ce55ffd447328fda', '1478813824_294215809_3.png', 'ASMEN'),
(32, 'AD-AM-CB-1', 'asmen22', 'asmen22', '7cb4e6bc09c5aaabbb49c05cc2721335', '764283092_294215809_3.png', 'ASMEN'),
(33, 'AD-AM-CB-2', 'asmen23', 'asmen23', 'c716473339fd5ead847ae8a38dba2c8b', '1979931903_294215809_3.png', 'ASMEN'),
(34, 'AD-AM-CB-3', 'asmen24', 'asmen24', 'c59b69c1f1ecada156edad7fadcde16f', '203223651_294215809_3.png', 'ASMEN'),
(35, 'AD-AM-CC-1', 'asmen25', 'asmen25', '4bea9d5eae0c64499d317dc591f3cc56', '91241669_294215809_3.png', 'ASMEN'),
(36, 'AD-AM-CC-2', 'asmen26', 'asmen26', '921811169c89dbc373f098b2be7873d4', '1974736678_588420837_294215809_3.png', 'ASMEN'),
(37, 'AD-AM-CC-3', 'asmen27', 'asmen27', 'da97d1ca170554a57fd0ba6b0717883c', '1972391622_160300124_294215809_3.png', 'ASMEN'),
(38, 'AD-AVP-A-1', 'avp1', 'avp1', '6306b8af10e22f65ecaed59273d60574', '2021806254_294215809_3.png', 'AVP'),
(39, 'AD-AVP-A-2', 'avp2', 'avp2', 'e6cbd694c3a741e3cfa5f339a197a369', '1651780791_160300124_294215809_3.png', 'AVP'),
(40, 'AD-AVP-A-3', 'avp3', 'avp3', '3cf8a24ea0543824955f089ee605dcfe', '749520751_604135192_1145629957_1073842483_3.png', 'AVP'),
(41, 'AD-AVP-B-1', 'avp4', 'avp4', '3ddbd9d486b3e08f1f7195e433747978', '1986460603_588420837_294215809_3.png', 'AVP'),
(42, 'AD-AVP-B-2', 'avp5', 'avp5', '977e480262084741e6359bddfc920926', '1668073096_160300124_294215809_3.png', 'AVP'),
(43, 'AD-AVP-B-3', 'avp6', 'avp6', '8a5e2c78f8bdf1936a6c307c48af5717', '1949904548_160300124_294215809_3.png', 'AVP'),
(44, 'AD-AVP-C-1', 'avp7', 'avp7', '79070dc9555d1356065c521077ec0869', '1209129787_160300124_294215809_3.png', 'AVP'),
(45, 'AD-AVP-C-2', 'avp8', 'avp8', '942341be7988b7e53f390fb51fb2d7bc', '1938287439_160300124_294215809_3.png', 'AVP'),
(46, 'AD-AVP-C-3', 'avp9', 'avp9', '2416e3f865aa65be439812a7cc6433fd', '1316105469_588420837_294215809_3.png', 'AVP'),
(47, 'AD-VP-A-1', 'vp1', 'vp1', '846bf0b010c93c15919796fa706f5d77', '262913747_160300124_294215809_3.png', 'VP'),
(48, 'AD-VP-B-1', 'vp2', 'vp2', 'ee2f71ea303750543c37eb8261b8be4b', '1332333936_91241669_294215809_3.png', 'VP'),
(49, 'AD-VP-C-1', 'vp3', 'vp3', 'bd0c3f8186b70273efab970c0eec647d', '98782118_160300124_294215809_3.png', 'VP'),
(50, 'AD-GM-A-1', 'gm1', 'gm1', '769a4c56c7a22dc7b7f0a729e51a30e5', '1910743952_91241669_294215809_3.png', 'GM'),
(51, 'AD-GM-B-1', 'gm2', 'gm2', 'f336cda39f250b9f975ebc301aed58c6', '1617730587_user1.jpg', 'GM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `agenda_header`
--
ALTER TABLE `agenda_header`
  ADD PRIMARY KEY (`agendaheader_id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`);

--
-- Indexes for table `bulan_kontrak`
--
ALTER TABLE `bulan_kontrak`
  ADD PRIMARY KEY (`bulan_id`);

--
-- Indexes for table `dockajian`
--
ALTER TABLE `dockajian`
  ADD PRIMARY KEY (`dock_id`);

--
-- Indexes for table `doc_kak_hps`
--
ALTER TABLE `doc_kak_hps`
  ADD PRIMARY KEY (`dockh_id`),
  ADD KEY `dockh_dock_id` (`dockh_dock_id`);

--
-- Indexes for table `doc_kontrak`
--
ALTER TABLE `doc_kontrak`
  ADD PRIMARY KEY (`dockt_id`),
  ADD KEY `fk_dockt_dock_id` (`dockt_dock_id`);

--
-- Indexes for table `header_kontrak`
--
ALTER TABLE `header_kontrak`
  ADD PRIMARY KEY (`header_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`kontrak_id`);

--
-- Indexes for table `orderme_isi`
--
ALTER TABLE `orderme_isi`
  ADD PRIMARY KEY (`ordermeisi_id`);

--
-- Indexes for table `order_me`
--
ALTER TABLE `order_me`
  ADD PRIMARY KEY (`orderme_id`);

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
-- Indexes for table `status_arsip`
--
ALTER TABLE `status_arsip`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `status_pr`
--
ALTER TABLE `status_pr`
  ADD PRIMARY KEY (`statuspr_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superadmin_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `agenda_header`
--
ALTER TABLE `agenda_header`
  MODIFY `agendaheader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `bulan_kontrak`
--
ALTER TABLE `bulan_kontrak`
  MODIFY `bulan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `dockajian`
--
ALTER TABLE `dockajian`
  MODIFY `dock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `doc_kak_hps`
--
ALTER TABLE `doc_kak_hps`
  MODIFY `dockh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doc_kontrak`
--
ALTER TABLE `doc_kontrak`
  MODIFY `dockt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `header_kontrak`
--
ALTER TABLE `header_kontrak`
  MODIFY `header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `kontrak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderme_isi`
--
ALTER TABLE `orderme_isi`
  MODIFY `ordermeisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_me`
--
ALTER TABLE `order_me`
  MODIFY `orderme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `status_arsip`
--
ALTER TABLE `status_arsip`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_pr`
--
ALTER TABLE `status_pr`
  MODIFY `statuspr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_pks`
--
ALTER TABLE `user_pks`
  MODIFY `pks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doc_kak_hps`
--
ALTER TABLE `doc_kak_hps`
  ADD CONSTRAINT `dockh_dock_id` FOREIGN KEY (`dockh_dock_id`) REFERENCES `dockajian` (`dock_id`);

--
-- Constraints for table `doc_kontrak`
--
ALTER TABLE `doc_kontrak`
  ADD CONSTRAINT `fk_dockt_dock_id` FOREIGN KEY (`dockt_dock_id`) REFERENCES `dockajian` (`dock_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
