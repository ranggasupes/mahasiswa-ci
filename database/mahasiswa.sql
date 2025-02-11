-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2025 pada 15.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `code_fakultas` varchar(256) NOT NULL,
  `nama_fakultas` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`code_fakultas`, `nama_fakultas`) VALUES
('F01', 'Fakultas Teknik'),
('F02', 'Fakultas Ekonomi'),
('F03', 'Fakultas Hukum'),
('F04', 'Fakultas Ilmu Sosial dan Politik'),
('F05', 'Fakultas Kedokteran'),
('F06', 'Fakultas Matematika dan Ilmu Pengetahuan Alam'),
('F07', 'Fakultas Seni Rupa dan Desain'),
('F08', 'Fakultas Pertanian'),
('F09', 'Fakultas Psikologi'),
('F10', 'Fakultas Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `code_jurusan` varchar(256) NOT NULL,
  `nama_jurusan` varchar(256) NOT NULL,
  `code_fakultas` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`code_jurusan`, `nama_jurusan`, `code_fakultas`) VALUES
('J01', 'Teknik Informatika', 'F01'),
('J02', 'Teknik Industri', 'F01'),
('J03', 'Akutansi', 'F02'),
('J04', 'Manajemen', 'F02'),
('J05', 'Hukum Bisnis', 'F03'),
('J06', 'Ilmu Politik', 'F04'),
('J07', 'Ilmu Komunikasi', 'F04'),
('J08', 'Kedokteran Umum', 'F05'),
('J09', 'Keperawatan', 'F05'),
('J10', 'Biologi', 'F06'),
('J11', 'Kimia', 'F06'),
('J12', 'Desain Komunikasi', 'F07'),
('J13', 'Arsitektur', 'F07'),
('J14', 'Agribisnis', 'F08'),
('J15', 'Teknologi Pangan', 'F08'),
('J16', 'Psikologi Klinis', 'F09'),
('J17', 'Pendidikan Matematika', 'F10'),
('J18', 'Pendidikan Bahasa Inggris', 'F10'),
('J19', 'Teknik Sipil', 'F01'),
('J20', 'Teknik Elektro', 'F01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(100) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `code_fakultas` varchar(256) NOT NULL,
  `code_jurusan` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `ipk` varchar(10) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `status_regis` int(1) NOT NULL,
  `jenis_kelamin` varchar(256) NOT NULL,
  `id_periode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `code_fakultas`, `code_jurusan`, `alamat`, `no_hp`, `ipk`, `pin`, `status_regis`, `jenis_kelamin`, `id_periode`) VALUES
(51, 90900, 'Andre', 'F01', 'J02', 'Jl. Agatis', '082246333306', '3.86', '9403', 1, 'Perempuan', 1),
(52, 6969, 'Azril', 'F01', 'J01', 'Jl. Agatis', '082246333306', '4.00', '7441', 1, 'Laki-laki', 1),
(55, 90900, 'Rangga', 'F02', 'J04', '', '', '', '123456', 0, '', 0),
(56, 90900, 'Rangga', 'F01', 'J01', '', '', '', '123456', 0, '', 0),
(57, 90900, 'Rangga', 'F01', 'J01', 'Jl. Agatis', '082246333306', '3.87', '123456', 1, 'Laki-laki', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `nama_periode` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `nama_periode`, `keterangan`, `status`) VALUES
(1, 'Semester Genap 2023/2024', 'Koko', 0),
(2, 'Semester Ganjil 2024/2025', 'koko', 0),
(3, 'Semester Genap 2025/2026', 'Koko', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`code_fakultas`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`code_jurusan`),
  ADD KEY `fk_jurusan_fakultas` (`code_fakultas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `fk_jurusan_fakultas` FOREIGN KEY (`code_fakultas`) REFERENCES `fakultas` (`code_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
