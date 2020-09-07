-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2020 pada 13.24
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmfep_psbsmp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `kd_alternatif` varchar(5) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `rata_un` float NOT NULL,
  `prestasi` varchar(50) NOT NULL,
  `wawancara` float NOT NULL,
  `test_diniyah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`kd_alternatif`, `nisn`, `rata_un`, `prestasi`, `wawancara`, `test_diniyah`) VALUES
('A0001', '321', 90, 'Juara I Tingkat Kabupaten/Kota', 80, 80),
('A0002', '123', 67, 'Tidak Ada', 40, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_crips`
--

CREATE TABLE `tbl_crips` (
  `kd_crips` varchar(5) NOT NULL,
  `kd_kriteria` varchar(5) NOT NULL,
  `nm_crips` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_crips`
--

INSERT INTO `tbl_crips` (`kd_crips`, `kd_kriteria`, `nm_crips`, `nilai`) VALUES
('R0001', 'C0004', 'Juara I Tingkat Nasional', 1),
('R0002', 'C0004', 'Juara II Tingkat Nasional', 0.9),
('R0003', 'C0004', 'Juara III Tingkat Nasional', 0.8),
('R0004', 'C0004', 'Juara I Tingkat Provinsi', 0.7),
('R0005', 'C0004', 'Juara II Tingkat Provinsi', 0.6),
('R0006', 'C0004', 'Juara III Tingkat Provinsi', 0.5),
('R0007', 'C0004', 'Juara I Tingkat Kabupaten/Kota', 0.4),
('R0008', 'C0004', 'Juara II Tingkat Kabupaten/Kota', 0.3),
('R0009', 'C0004', 'Juara III Tingkat Kabupaten/Kota', 0.2),
('R0010', 'C0004', 'Juara Tingkat Kecamatan', 0.1),
('R0011', 'C0004', 'Tidak Ada', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id_pendaftaran` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_pendaftaran`, `nisn`, `id`, `status`) VALUES
(2, '321', 1, 1),
(5, '123', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` varchar(5) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nm_guru` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kd_kriteria` varchar(5) NOT NULL,
  `nm_kriteria` varchar(50) NOT NULL,
  `atribut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kd_kriteria`, `nm_kriteria`, `atribut`) VALUES
('C0001', 'Rata-Rata UN', 30),
('C0002', 'Wawancara', 30),
('C0003', 'Test Diniyah/Mengaji', 30),
('C0004', 'Prestasi Akademik/Non Akademik', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `id_guru` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `id_guru`, `username`, `password`, `level`) VALUES
(1, '', 'admin', 'admin', 'admin'),
(2, '', 'siswa', 'siswa', 'siswa'),
(3, '', 'diana', 'diana', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nisn` varchar(15) NOT NULL,
  `nm_siswa` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nm_orangtua` varchar(30) NOT NULL,
  `sekolah_asal` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `rata_un` float NOT NULL,
  `prestasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nisn`, `nm_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nm_orangtua`, `sekolah_asal`, `no_telp`, `rata_un`, `prestasi`) VALUES
('123', 'testing', 'Laki-Laki', 'Padang', '2020-12-31', 'testing', 'testing', '987654321', 67, 'Tidak Ada'),
('321', 'test', 'Perempuan', 'test', '2017-11-29', 'test', 'test', '987654321', 90, 'Juara I Tingkat Kabupaten/Kota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`kd_alternatif`);

--
-- Indeks untuk tabel `tbl_crips`
--
ALTER TABLE `tbl_crips`
  ADD PRIMARY KEY (`kd_crips`);

--
-- Indeks untuk tabel `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
