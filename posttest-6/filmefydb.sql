-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 16 Okt 2024 pada 02.03
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
-- Database: `filmefydb`
--
CREATE DATABASE IF NOT EXISTS `filmefydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `filmefydb`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomen_user`
--

CREATE TABLE `rekomen_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `film_fav` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekomen_user`
--

INSERT INTO `rekomen_user` (`id`, `nama`, `film_fav`, `genre`, `foto`) VALUES
(7, 'demos', 'barakamon', 'slice of life', '2024-10-16 08.02.35.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rekomen_user`
--
ALTER TABLE `rekomen_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rekomen_user`
--
ALTER TABLE `rekomen_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
