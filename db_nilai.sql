-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 19, 2024 at 09:33 AM
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
(1, 20221, 'SPK', 15, 20, 30, 35),
(2, 20231, 'SPK', 15, 20, 30, 35);

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
(1, 'kode1', 'mata kuliah 1', 2, NULL, 2),
(2, 'Kode 2', 'Jadi Nama Mata Kuliah 2', 1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbNilaiAkhir`
--

CREATE TABLE `tbNilaiAkhir` (
  `id` int(11) NOT NULL,
  `tahunAkademik` int(11) NOT NULL,
  `mataKuliah` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `nilaiTugasTeori` int(11) NOT NULL,
  `nilaiTugasPraktek` int(11) NOT NULL,
  `nilaiTugas` int(11) NOT NULL,
  `nilaiUTS` int(11) NOT NULL,
  `nilaiUAS` int(11) NOT NULL,
  `nilaiAkhir` int(11) NOT NULL,
  `nilaiHuruf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbNilaiTugasPraktek`
--

CREATE TABLE `tbNilaiTugasPraktek` (
  `id` int(11) NOT NULL,
  `tahunAkademik` varchar(10) NOT NULL,
  `mataKuliah` varchar(256) NOT NULL,
  `noTugas` int(11) NOT NULL,
  `toipkTugas` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbNilaiTugasTeori`
--

CREATE TABLE `tbNilaiTugasTeori` (
  `id` int(11) NOT NULL,
  `tahunAkademik` varchar(10) NOT NULL,
  `mataKuliah` varchar(256) NOT NULL,
  `noTugas` int(11) NOT NULL,
  `toipkTugas` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbTahunAkademik`
--

CREATE TABLE `tbTahunAkademik` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, '201904002', 'Algi', 'TRPL'),
(3, '202004010', 'Alfina', 'TRPL');

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
-- Indexes for table `tbNilaiTugasPraktek`
--
ALTER TABLE `tbNilaiTugasPraktek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbNilaiTugasTeori`
--
ALTER TABLE `tbNilaiTugasTeori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbTahunAkademik`
--
ALTER TABLE `tbTahunAkademik`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbMataKuliah`
--
ALTER TABLE `tbMataKuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbNilaiTugasPraktek`
--
ALTER TABLE `tbNilaiTugasPraktek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbNilaiTugasTeori`
--
ALTER TABLE `tbNilaiTugasTeori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbTahunAkademik`
--
ALTER TABLE `tbTahunAkademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
