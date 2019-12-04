-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2019 pada 11.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bob`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_aplikasi`
--

CREATE TABLE `db_aplikasi` (
  `id` int(111) NOT NULL,
  `judul` varchar(111) NOT NULL,
  `namafile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas1`
--

CREATE TABLE `tb_kelas1` (
  `no` int(255) NOT NULL,
  `judulbuku` varchar(1000) NOT NULL,
  `buku` varchar(255) NOT NULL
  `cover_buku` varchar (255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas1`
--

INSERT INTO `tb_kelas1` (`no`, `judulbuku`, `buku`, `cover_buku`) VALUES
(1, '1', ''),
(3, 'lklk', 'belakang.PNG',''),
(4, 'lklk', 'belakang.PNG',''),
(5, 'buku kontol', 'belakang.PNG',''),
(6, 'lkjlk', 'Cv kalfin.pdf',''),
(7, 'o[popo', 'Cv kalfin.pdf','');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soalkelas`
--

CREATE TABLE `tb_soalkelas` (
  `id_soal` int(10) NOT NULL,
  `kelas` int(1) NOT NULL,
  `pertanyaan` text NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soalkelas`
--

INSERT INTO `tb_soalkelas` (`id_soal`, `kelas`, `pertanyaan`, `a`, `b`, `c`, `d`, `jawaban`) VALUES
(1, 1, 'Siapakah Nama Presiden Pertama di Konoha?', 'Naruto', 'Sunade', 'Tobi', 'Hasirama', 'd'),
(22, 2, 'Nama Ekor 9 Naruto?', 'Kudanil', 'Coro', 'Siamang', 'Kyubi', 'd'),
(24, 1, '1+1?', '3', '4', '5', '2', 'd');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_aplikasi`
--
ALTER TABLE `db_aplikasi`
  ADD PRIMARY KEY (`id`,`namafile`);

--
-- Indeks untuk tabel `tb_kelas1`
--
ALTER TABLE `tb_kelas1`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tb_soalkelas`
--
ALTER TABLE `tb_soalkelas`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_aplikasi`
--
ALTER TABLE `db_aplikasi`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas1`
--
ALTER TABLE `tb_kelas1`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_soalkelas`
--
ALTER TABLE `tb_soalkelas`
  MODIFY `id_soal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
