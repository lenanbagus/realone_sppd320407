-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 06:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cilengkrang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_agenda`
--

CREATE TABLE `data_agenda` (
  `id` int(11) NOT NULL,
  `dasar_surat` varchar(30) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `pengikut_a` varchar(30) NOT NULL,
  `pengikut_b` varchar(30) NOT NULL,
  `pengikut_c` varchar(30) NOT NULL,
  `id_asn` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_agenda`
--

INSERT INTO `data_agenda` (`id`, `dasar_surat`, `lokasi`, `kegiatan`, `tgl_mulai`, `tgl_selesai`, `jam_mulai`, `jam_selesai`, `pengikut_a`, `pengikut_b`, `pengikut_c`, `id_asn`, `created_at`, `updated_at`) VALUES
(28, 'OWII/0988/DLK', 'Hotel Grand Sun Shine Bandung', 'SDDP Online 2051', '2021-12-20', '2021-12-20', '08:00:00', '11:00:00', 'Rendi Triwardana', 'Sopi Sopian', 'Erty Merlina', 26, '2021-12-26 17:02:13', '2021-12-27 00:02:13'),
(34, 'SUMUR/212/RENDANG', 'Ruang Rapat Dinas Kependudukan', 'Rapat Evaluasi SIAK Terpusat', '2021-12-22', '2021-12-22', '08:00:00', '02:00:00', 'Inal Zainal', 'Ariel Noah', 'Ariel Tatum', 24, '2021-12-26 17:02:13', '2021-12-27 00:02:13'),
(35, '123qwqwe23', 'fvdvrdvea s', 'trhsth rtu tyunyur', '2021-12-22', '2021-12-22', '00:00:00', '21:00:00', 'w4t', 't4', 't4w', 23, '2021-12-26 17:02:13', '2021-12-27 00:02:13'),
(36, '1029KSDW', 'Surabaya', 'Rapat Kegiatan Honorarium P3K', '2021-12-23', '2021-12-24', '08:00:00', '14:00:00', 'Keanu Alkhalifi', 'Raiden Azzamy', 'Hiddan Alkhairy', 24, '2021-12-26 17:02:13', '2021-12-27 00:02:13'),
(38, 'TEST:2021/12/27-1221', 'Semarang', 'Piknik', '2021-12-27', '2021-12-28', '10:30:00', '02:30:00', 'upin', 'ipin', 'mail', 27, '2021-12-26 17:02:13', '2021-12-27 00:02:13'),
(39, '005/1349/PKALD', 'Pusdikter Angkatan Darat Jalan', 'Menghadiri Pelatihan Masa Jabatan Bagi Kepala Desa Terpilih Tahun 2022', '2021-12-28', '2021-12-28', '10:03:00', '02:03:00', 'upin', 'ipin', 'mail', 20, '2021-12-26 17:02:13', '2021-12-27 00:02:13'),
(40, '005/1349/PKALD/TEST', 'Pusdikter Angkatan Darat Jalan', 'Menghadiri Pelatihan Masa Jabatan Bagi Kepala Desa Terpilih Tahun 2022', '2021-12-27', '2021-12-27', '12:02:00', '16:02:00', 'upin', 'ipin', 'mail', 27, '2021-12-26 17:03:00', '2021-12-27 00:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_asn`
--

CREATE TABLE `data_asn` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nip` decimal(18,0) NOT NULL,
  `tempatlahir` varchar(30) NOT NULL,
  `tanggallahir` date NOT NULL,
  `golongan` varchar(30) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_asn`
--

INSERT INTO `data_asn` (`id`, `name`, `nip`, `tempatlahir`, `tanggallahir`, `golongan`, `jabatan`) VALUES
(20, 'Mohamad Dani, SH., MM.', '197110232009011001', 'Bandung', '1971-10-23', 'IV/d - Pembina Utama Madya', 'Camat'),
(21, 'Drs. Awan Gunawan M.Pd.I', '196607161993021002', 'Cirebon', '1966-07-16', 'III/c - Penata', 'Sekretaris Camat'),
(23, 'Drs. Asep Ojat M.Pd.', '197101232009061003', 'Bandung', '1971-01-23', 'III/b - Penata Muda Tingkat I', 'Pengelola Bantuan Keuangan Kepada Pemerintah Desa'),
(24, 'Bagus Achda Lenan, S.T.', '320406170789000801', 'Bandung', '1989-07-17', 'III/b - Penata Muda Tingkat I', 'Pengelola Layanan Operasional'),
(26, 'Okky Padliansyah, S.Ag.', '298177283728377287', 'Bandung', '2021-12-04', 'III/a - Penata Muda', 'Petugas Keamanan'),
(27, 'Elin Marlina, S.Ip.', '193873387283777222', 'Cirebon', '1981-12-13', 'II/d - Pengatur Tingkat I', 'Pengadministrasian Umum');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id`, `name`) VALUES
(1, 'bagus'),
(2, 'Bagus Achda Lenan'),
(3, 'ulemanikah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_agenda`
--
ALTER TABLE `data_agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_asn` (`id_asn`);

--
-- Indexes for table `data_asn`
--
ALTER TABLE `data_asn`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_agenda`
--
ALTER TABLE `data_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `data_asn`
--
ALTER TABLE `data_asn`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_agenda`
--
ALTER TABLE `data_agenda`
  ADD CONSTRAINT `data_agenda_ibfk_1` FOREIGN KEY (`id_asn`) REFERENCES `data_asn` (`id`),
  ADD CONSTRAINT `data_agenda_ibfk_2` FOREIGN KEY (`id_asn`) REFERENCES `data_asn` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;