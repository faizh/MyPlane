-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 01:45 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveler`
--

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
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
  `id_rute` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `nama_pemesan`, `alamat`, `telp`, `email`, `kode_reservasi`, `nama_penumpang`, `kode_penumpang`, `tittle`, `kode_kursi`, `status`, `id_rute`) VALUES
(78, 'Aida Fauzia Rahmatika', 'Sidanegara, Cilacap', '085725230412', 'aidafr1601@gmail.com', 'iNz7m4C', 'Aida Fauzia Rahmatika', 'r1Y1m1T111P161', 'Nn.', '9', 'Sudah dikonfirmasi', 39),
(79, 'Aida Fauzia Rahmatika', 'Sidanegara, Cilacap', '085725230412', 'aidafr1601@gmail.com', 'iNz7m4C', 'Milania Daffa Ramdhani', 'Q2f2G212R2r2n2', 'Nn.', '10', 'Sudah dikonfirmasi', 39),
(80, 'Rena Kus', 'Kroya', '0815423415', 'renakus21@gmail.com', 'Sr6W3YK', 'Rena Kus', 'a1Z151T1X1J1q1', 'Nn.', '20', 'Sudah dikonfirmasi', 41),
(81, 'Rena Kus', 'Kroya', '0815423415', 'renakus21@gmail.com', 'Sr6W3YK', 'Chairrul La', 'W2T2D2Y2r2s2N2', 'Tn.', '21', 'Sudah dikonfirmasi', 41),
(82, 'Asdr', 'safsf', '085747725412', 'raidafauzia@yahoo.co.id', 'fvnpM2x', 'czcz', 'I1N141p1A1f1W1', 'Ny.', '4', 'Sudah dikonfirmasi', 39),
(83, 'human', 'ashjshkal', '08975578757', 'asah@gmail.com', 'eGoLfCx', 'asah', 'b1o141w1c1W1X1', 'Ny.', '66', 'Sudah dikonfirmasi', 39),
(84, 'Aini Anggraeni ', 'Pandeglang', '5364728910', 'ainun@gmail.com', 'XRQsuG5', 'ainun', 'Y1x1Q1R1e1q131', 'Nn.', '45', 'Sudah dikonfirmasi', 39);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `kode_reservasi` varchar(50) NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `id_rute` int(11) NOT NULL,
  `bukti_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `kode_reservasi`, `tanggal_reservasi`, `id_rute`, `bukti_lokasi`) VALUES
(48, 'iNz7m4C', '2018-02-26', 39, 'WIN_20170727_10_08_59_Pro.jpg'),
(49, 'Sr6W3YK', '2018-02-26', 41, 'WIN_20170603_08_14_15_Pro.jpg'),
(50, 'fvnpM2x', '2018-02-26', 39, 'WIN_20170727_10_08_40_Pro.jpg'),
(51, 'eGoLfCx', '2018-07-19', 39, 'aa.png'),
(52, 'XRQsuG5', '2018-11-30', 39, '2018-08-11 06.16.18 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
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
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `asal`, `tujuan`, `harga`, `berangkat`, `tiba`, `tanggal`, `maskapai`, `sisa_seat`) VALUES
(30, 'Tunggul Wulung', 'Soekarno Hatta', '400000', '09:38:00', '12:00:00', '2018-02-26', '5', 49),
(39, 'Tunggul Wulung', 'Adi Sucipto', '150000', '14:00:00', '14:30:00', '2018-02-26', '4', 34),
(40, 'Tunggul Wulung', 'Adi Sumarmo', '195000', '10:30:00', '11:15:00', '2018-02-26', '1', 40),
(41, 'Tunggul Wulung', 'I Gusti Ngurahrai', '600000', '09:45:00', '11:45:00', '2018-02-26', '2', 36),
(42, 'Tunggul Wulung', 'Sultan Hasanudin', '735000', '11:15:00', '14:25:00', '2018-02-26', '3', 20);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
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
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id_transport`, `nama`, `kode`, `deskripsi`, `seat`, `logo`) VALUES
(1, 'Garuda Indonesia', 'GI-712', 'adv', 200, 'garuda.png'),
(2, 'Lion Air', 'LA-356', 'sva', 140, 'lion.png'),
(3, 'AirAsia', 'AA-563', 'rgvf', 140, 'airasia.png'),
(4, 'Batik Air', 'BA-265', 'sbf', 175, 'batik.png'),
(5, 'Sriwijaya Air', 'SA-742', 'erg', 135, 'sriwijaya.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `namalengkap`) VALUES
(1, 'aida', 809, 'aida fauzia rahmatika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_costumer`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `kode_reservasi` (`kode_reservasi`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `maskapai` (`maskapai`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_costumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
