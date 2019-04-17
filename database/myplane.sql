-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2019 pada 16.29
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myplane`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumer`
--

CREATE TABLE `costumer` (
  `id_costumer` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kode_reservasi` varchar(20) NOT NULL,
  `nama_penumpang` text NOT NULL,
  `kode_penumpang` varchar(20) NOT NULL,
  `tittle` varchar(5) NOT NULL,
  `kode_kursi` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_rute` int(10) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `nama_pemesan`, `alamat`, `telp`, `email`, `kode_reservasi`, `nama_penumpang`, `kode_penumpang`, `tittle`, `kode_kursi`, `status`, `id_rute`, `username`) VALUES
(1, 'Faiz Hermawan', 'Purwokerto', '08981298129', 'faiz@m.com', 'VadqIB4', 'Faiz Hermawan', 'b1c1z1M1d1a1x1', 'Tn.', '5', 'Sudah dikonfirmasi', 30, 'faizh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(1) NOT NULL,
  `nama_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'petugas'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `fullname`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'petugas', 'petugas', 'petugas', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `kode_reservasi` varchar(50) NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `id_rute` int(11) NOT NULL,
  `bukti_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `kode_reservasi`, `tanggal_reservasi`, `id_rute`, `bukti_lokasi`) VALUES
(1, 'VadqIB4', '2019-04-17', 30, 'alat.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `asal` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `berangkat` time NOT NULL,
  `tiba` time NOT NULL,
  `tanggal` date NOT NULL,
  `maskapai` varchar(50) NOT NULL,
  `sisa_seat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `asal`, `tujuan`, `harga`, `berangkat`, `tiba`, `tanggal`, `maskapai`, `sisa_seat`) VALUES
(30, 'Syamsuddin Noor', 'Soekarno Hatta', '400000', '09:38:00', '12:00:00', '2019-04-18', '5', 43),
(39, 'Djuanda', 'Adi Sucipto', '300000', '00:00:00', '12:30:00', '2019-04-18', '4', 32),
(40, 'Soekarno Hatta', 'Adi Sumarmo', '400000', '09:30:00', '12:00:00', '2019-04-18', '1', 38),
(41, 'Kuala Namu', 'I Gusti Ngurahrai', '1000000', '09:45:00', '11:45:00', '2019-04-18', '2', 36),
(42, 'Soekarno Hatta', 'Sultan Hasanudin', '900000', '11:15:00', '14:25:00', '2019-04-18', '3', 20),
(43, 'Ahmad Yani', 'Iceland', '5000000', '12:30:00', '15:00:00', '2019-04-18', '1', 294),
(44, 'I Gusti Ngurahrai', 'Djuanda', '600000', '06:45:00', '08:00:00', '2019-04-18', '2', 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transport`
--

CREATE TABLE `transport` (
  `id_transport` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `seat` int(10) NOT NULL,
  `logo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transport`
--

INSERT INTO `transport` (`id_transport`, `nama`, `kode`, `deskripsi`, `seat`, `logo`) VALUES
(1, 'Garuda Indonesia', 'GI-712', 'adv', 200, 'garuda.png'),
(2, 'Lion Air', 'LA-356', 'sva', 140, 'lion.png'),
(3, 'AirAsia', 'AA-563', 'rgvf', 140, 'airasia.png'),
(4, 'Batik Air', 'BA-265', 'sbf', 175, 'batik.png'),
(5, 'Sriwijaya Air', 'SA-742', 'erg', 135, 'sriwijaya.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telephone` int(15) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `namalengkap`, `alamat`, `tgl_lahir`, `jk`, `telephone`, `level`, `status`) VALUES
(1, 'ayy', 'ayu', 'Ayys', 'Magelang', '2019-04-03', 'Perempuan', 882982, 'user', 1),
(2, 'faizh', 'faiz', 'Faiz Hermawan', '', '0000-00-00', '', 0, 'user', 1),
(4, 'admin', 'admin', 'admin', 'admin', '2019-04-01', 'Laki-laki', 8989989, 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_costumer`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `kode_reservasi` (`kode_reservasi`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `maskapai` (`maskapai`);

--
-- Indeks untuk tabel `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_costumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
