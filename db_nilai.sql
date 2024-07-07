-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 07, 2024 at 07:50 PM
-- Server version: 5.7.39
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_nilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbKontrakNilai`
--

CREATE TABLE `tbKontrakNilai` (
  `id` int(11) NOT NULL,
  `tahunAkademik` int(11) NOT NULL,
  `mataKuliah` varchar(256) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `tugas` int(11) NOT NULL,
  `UTS` int(11) NOT NULL,
  `UAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbKontrakNilai`
--

INSERT INTO `tbKontrakNilai` (`id`, `tahunAkademik`, `mataKuliah`, `kehadiran`, `tugas`, `UTS`, `UAS`) VALUES
(1, 20221, 'Sistem Pendukung Keputusan', 15, 20, 30, 35),
(3, 20221, 'Bahasa Indonesia', 20, 20, 25, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbMataKuliah`
--

CREATE TABLE `tbMataKuliah` (
  `id` int(11) NOT NULL,
  `kodeMK` varchar(8) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `sksTeori` int(11) DEFAULT NULL,
  `sksPraktik` int(11) DEFAULT NULL,
  `totalSKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbMataKuliah`
--

INSERT INTO `tbMataKuliah` (`id`, `kodeMK`, `nama`, `sksTeori`, `sksPraktik`, `totalSKS`) VALUES
(2, 'MKU103', 'Bahasa Indonesia', 2, 0, 2),
(3, 'SE606', 'Sistem Pendukung Keputusan', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbNilaiAkhir`
--

CREATE TABLE `tbNilaiAkhir` (
  `id` int(11) NOT NULL,
  `tahunAkademik` int(11) NOT NULL,
  `kodeMK` varchar(8) NOT NULL,
  `mataKuliah` varchar(64) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `nilaiKehadiran` float NOT NULL,
  `nilaiTugas` float NOT NULL,
  `nilaiUTS` float NOT NULL,
  `nilaiUAS` float NOT NULL,
  `nilaiAkhir` float NOT NULL,
  `nilaiHuruf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbNilaiAkhir`
--

INSERT INTO `tbNilaiAkhir` (`id`, `tahunAkademik`, `kodeMK`, `mataKuliah`, `nim`, `nama`, `nilaiKehadiran`, `nilaiTugas`, `nilaiUTS`, `nilaiUAS`, `nilaiAkhir`, `nilaiHuruf`) VALUES
(1, 20221, 'MKU103', 'Bahasa Indonesia', 201904001, 'Annisa', 90, 60, 60, 50, 62.5, 'C'),
(3, 20221, 'SE606', 'Sistem Pendukung Keputusan', 202004010, 'Alfina', 90, 90, 90, 90, 90, 'A'),
(5, 20221, 'MKU103', 'Bahasa Indonesia', 202004008, 'Chandra Ardiansyah', 60, 90, 60, 90, 76.5, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `prodi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `prodi`) VALUES
(1, '201904001', 'Annisa', 'TRPL'),
(2, '201904002', 'Algi', 'TRMK'),
(3, '202004010', 'Alfina', 'TL'),
(4, '202004003', 'Raza', 'TRPL'),
(5, '202004008', 'Chandra Ardiansyah', 'TRPL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbKontrakNilai`
--
ALTER TABLE `tbKontrakNilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbMataKuliah`
--
ALTER TABLE `tbMataKuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbNilaiAkhir`
--
ALTER TABLE `tbNilaiAkhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbKontrakNilai`
--
ALTER TABLE `tbKontrakNilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbMataKuliah`
--
ALTER TABLE `tbMataKuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbNilaiAkhir`
--
ALTER TABLE `tbNilaiAkhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
