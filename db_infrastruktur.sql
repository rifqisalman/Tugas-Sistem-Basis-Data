-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2024 pada 09.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_infrastruktur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(7) NOT NULL,
  `nama_kecamatan` char(50) NOT NULL,
  `luas_kecamatan` float NOT NULL,
  `nama_camat` char(50) NOT NULL,
  `nomor_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `luas_kecamatan`, `nama_camat`, `nomor_telp`) VALUES
(1, 'Gunung Pati', 9, 'Fathur', '08123213124');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerja`
--

CREATE TABLE `pekerja` (
  `id_pekerja` int(7) NOT NULL,
  `nama_pekerja` char(50) NOT NULL,
  `posisi` char(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic_projek`
--

CREATE TABLE `pic_projek` (
  `id_PIC` int(7) NOT NULL,
  `nama_perusahaan` char(50) NOT NULL,
  `nama_PIC` char(50) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `peran` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `projek_pembangunan`
--

CREATE TABLE `projek_pembangunan` (
  `id_projek` int(7) NOT NULL,
  `nama_projek` char(50) NOT NULL,
  `jenis_projek` char(50) NOT NULL,
  `lokasi_projek` varchar(100) NOT NULL,
  `status_projek` int(3) NOT NULL,
  `jumlah_anggaran` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `id_kecamatan` int(7) DEFAULT NULL,
  `id_pic` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `projek_pembangunan`
--

INSERT INTO `projek_pembangunan` (`id_projek`, `nama_projek`, `jenis_projek`, `lokasi_projek`, `status_projek`, `jumlah_anggaran`, `tanggal_mulai`, `tanggal_selesai`, `id_kecamatan`, `id_pic`) VALUES
(1, 'Pembangunan Taman', 'Sarana Umum', 'Banaran', 100, '100.000.000', '2023-11-30', '2023-12-14', NULL, NULL),
(2, 'Perbaikan Jalan', 'Sarana Umum', 'Marga Satwa', 18, '50.000.000', '2023-12-11', '0000-00-00', NULL, NULL),
(3, 'Pembangunan Sekolah', 'Sarana Pendidikan', 'Patemon', 0, '500.000.000', '2023-12-24', '0000-00-00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id_pekerja`);

--
-- Indeks untuk tabel `pic_projek`
--
ALTER TABLE `pic_projek`
  ADD PRIMARY KEY (`id_PIC`);

--
-- Indeks untuk tabel `projek_pembangunan`
--
ALTER TABLE `projek_pembangunan`
  ADD PRIMARY KEY (`id_projek`),
  ADD KEY `projek_kecamatan` (`id_kecamatan`),
  ADD KEY `pic_projek` (`id_pic`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `projek_pembangunan`
--
ALTER TABLE `projek_pembangunan`
  ADD CONSTRAINT `pic_projek` FOREIGN KEY (`id_pic`) REFERENCES `pic_projek` (`id_PIC`),
  ADD CONSTRAINT `projek_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
