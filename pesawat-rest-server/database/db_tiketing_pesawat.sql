-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2023 pada 03.51
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiketing_pesawat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'wpu123', 1, 0, 0, NULL, 1),
(2, 3, 'rahasia', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:mahasiswa/index:get', 4, 1661652477, 'wpu123'),
(2, 'uri:mahasiswa/index:get', 5, 1687942517, 'rahasia'),
(3, 'uri:bandara/index:get', 1, 1688002661, 'rahasia'),
(4, 'uri:pesawat/index:get', 1, 1688002674, 'rahasia'),
(5, 'uri:Penerbangan/index:get', 1, 1688002687, 'rahasia'),
(6, 'uri:Tarif_Penerbangan/index:get', 4, 1688002691, 'rahasia'),
(7, 'uri:Customer/index:get', 5, 1688002679, 'rahasia'),
(8, 'uri:Passenger/index:get', 10, 1688002701, 'rahasia'),
(9, 'uri:Booking/index:get', 1, 1688002696, 'rahasia'),
(10, 'uri:pesawat/index:get', 2, 1688000637, 'wpu123'),
(11, 'uri:customer/index:get', 4, 1688001580, 'wpu123'),
(12, 'uri:bandara/index:get', 1, 1688001649, 'wpu123'),
(13, 'uri:penerbangan/index:get', 1, 1688003113, 'wpu123'),
(14, 'uri:tarif_penerbangan/index:get', 1, 1688003138, 'wpu123'),
(15, 'uri:passenger/index:get', 1, 1688003171, 'wpu123'),
(16, 'uri:booking/index:get', 2, 1688003192, 'wpu123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_user`
--

CREATE TABLE `login_user` (
  `Username` varchar(25) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_user`
--

INSERT INTO `login_user` (`Username`, `Password`) VALUES
('User', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bandara`
--

CREATE TABLE `tb_bandara` (
  `id_bandara` varchar(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bandara`
--

INSERT INTO `tb_bandara` (`id_bandara`, `kode`, `nama`, `kota`) VALUES
('BAN180001', 'SRG', ' Bandar Udara Internasional Achmad Yani', 'Semarang'),
('BAN180002', 'CGK ', ' Bandar Udara Internasional Soekarno-Hatta', 'Tangerang'),
('BAN180003', 'HLP', 'Bandar Udara Internasional Halim Perdanakusuma', 'Jakarta'),
('BAN180004', 'DPS ', ' Bandar Udara Internasional Ngurah Rai', 'Denpasar'),
('BAN180005', 'BPN', ' Bandar Udara Sultan Aji Muhammad Sulaiman', 'Balik Papan'),
('BAN180006', 'JOG', ' Bandar Udara Internasional Adisutjipto', 'Seleman'),
('BAN180007', 'BDO', 'Bandar Udara Internasional Husein Sastranegara', 'Bandung'),
('BAN180008', 'SUB', 'Bandar Udara Internasional Juanda', 'Sidoarjo'),
('BAN180009', 'MDC ', ' Bandar Udara Internasional Sam Ratulangi', 'Manado'),
('BAN180010', 'DJJ', ' Bandar Udara Internasional Sentani', 'Jayapura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id_booking` varchar(11) NOT NULL,
  `id_customer` varchar(11) NOT NULL,
  `tgl_booking` date NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `total_tarif` varchar(255) NOT NULL,
  `status_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `id_customer`, `tgl_booking`, `jumlah_penumpang`, `total_tarif`, `status_bayar`) VALUES
('BOO220001', 'CUS220001', '2022-09-03', 1, '550000', 'Lunas'),
('BOO220002', 'Cus123', '2022-09-03', 1, '863500', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama`, `email`, `kota`, `negara`) VALUES
('CUS1234', 'Dita Nurul Ramadhan', 'ditan@gmail.com', 'Garut', 'Indonesia'),
('CUS220001', 'Silvani Violita', 'violita@mail.com', 'Bogor', 'Indonesia'),
('CUS220002', 'Rianto ', 'rianto@mail.com', 'Yogyakarta', 'Indonesia'),
('CUS220004', 'Moh Kodri', 'kodri@mail.com', 'Semarang', 'Indonesia'),
('CUS230005', 'Citra Gasela', 'Citra@gmail.com', 'Bandung', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dtl_booking`
--

CREATE TABLE `tb_dtl_booking` (
  `id_detail` int(11) NOT NULL,
  `id_tarif` varchar(11) NOT NULL,
  `id_booking` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dtl_booking`
--

INSERT INTO `tb_dtl_booking` (`id_detail`, `id_tarif`, `id_booking`) VALUES
(1, 'TAR220001', 'BOO220001'),
(2, 'TAR220010', 'BOO220002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_passenger`
--

CREATE TABLE `tb_passenger` (
  `id_passenger` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_kursi` varchar(50) NOT NULL,
  `id_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_passenger`
--

INSERT INTO `tb_passenger` (`id_passenger`, `nama`, `no_kursi`, `id_detail`) VALUES
(1, 'Silvani Violita', '1', 1),
(2, 'Setiawan', '1', 2),
(3, 'Dita Nurul Ramadhan', '4', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbangan`
--

CREATE TABLE `tb_penerbangan` (
  `id_penerbangan` varchar(11) NOT NULL,
  `id_bandara` varchar(11) NOT NULL,
  `id_pesawat` varchar(11) NOT NULL,
  `tgl_penerbangan` date NOT NULL,
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_tiba` time NOT NULL,
  `bandara_tujuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penerbangan`
--

INSERT INTO `tb_penerbangan` (`id_penerbangan`, `id_bandara`, `id_pesawat`, `tgl_penerbangan`, `asal`, `tujuan`, `jam_berangkat`, `jam_tiba`, `bandara_tujuan`) VALUES
('PEN220001', 'BAN180007', 'PES180007', '2023-04-06', 'Bandung', 'Jakarta', '15:40:00', '16:40:00', 'Bandar Udara Internasional Halim Perdanakusuma'),
('PEN220002', 'BAN180003', 'PES180001', '2023-04-06', 'Jakarta', 'Denpasar', '08:00:00', '10:30:00', ' Bandar Udara Internasional Ngurah Rai'),
('PEN220003', 'BAN180001', 'PES180005', '2023-04-06', 'Semarang', 'Jayapura', '12:45:00', '19:30:00', ' Bandar Udara Internasional Sentani'),
('PEN220004', 'BAN180007', 'PES180004', '2023-04-06', 'Bandung', 'Manado', '16:30:00', '18:30:00', ' Bandar Udara Internasional Sam Ratulangi'),
('PEN220005', 'BAN180003', 'PES180002', '2023-04-06', 'Jakarta', 'Balik Papan', '18:35:00', '20:35:00', ' Bandar Udara Sultan Aji Muhammad Sulaiman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesawat`
--

CREATE TABLE `tb_pesawat` (
  `id_pesawat` varchar(11) NOT NULL,
  `tipe_pesawat` varchar(255) NOT NULL,
  `jml_kursi_ekonomi` varchar(255) NOT NULL,
  `jml_kursi_bisnis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesawat`
--

INSERT INTO `tb_pesawat` (`id_pesawat`, `tipe_pesawat`, `jml_kursi_ekonomi`, `jml_kursi_bisnis`) VALUES
('PES180001', 'Airbus A330-300', '213', '34'),
('PES180002', 'Boeing 737 Max 8', '162', '8'),
('PES180003', 'Airbus A330-200', '186', '36'),
('PES180004', 'Bombardier CRJ1000 NextGen', '96', '10'),
('PES180005', 'ATR 72-600', '65', '0'),
('PES180006', 'Boeing 777-300ER', '26', '367'),
('PES180007', 'Boeing 737-800NG', '149', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif_penerbangan`
--

CREATE TABLE `tb_tarif_penerbangan` (
  `id_tarif` varchar(11) NOT NULL,
  `id_penerbangan` varchar(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `tarif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tarif_penerbangan`
--

INSERT INTO `tb_tarif_penerbangan` (`id_tarif`, `id_penerbangan`, `kelas`, `tarif`) VALUES
('TAR220001', 'PEN220001', 'Ekonomi', '550000'),
('TAR220002', 'PEN220001', 'Bisnis', '850000'),
('TAR220005', 'PEN220003', 'Ekonomi', '945000'),
('TAR220006', 'PEN220002', 'Ekonomi', '753000'),
('TAR220007', 'PEN220002', 'Bisnis', '962000'),
('TAR220008', 'PEN220004', 'Ekonomi', '763500'),
('TAR220009', 'PEN220004', 'Bisnis', '963500'),
('TAR220010', 'PEN220005', 'Ekonomi', '863500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`Username`);

--
-- Indeks untuk tabel `tb_bandara`
--
ALTER TABLE `tb_bandara`
  ADD PRIMARY KEY (`id_bandara`);

--
-- Indeks untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tb_dtl_booking`
--
ALTER TABLE `tb_dtl_booking`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_passenger`
--
ALTER TABLE `tb_passenger`
  ADD PRIMARY KEY (`id_passenger`);

--
-- Indeks untuk tabel `tb_penerbangan`
--
ALTER TABLE `tb_penerbangan`
  ADD PRIMARY KEY (`id_penerbangan`);

--
-- Indeks untuk tabel `tb_pesawat`
--
ALTER TABLE `tb_pesawat`
  ADD PRIMARY KEY (`id_pesawat`);

--
-- Indeks untuk tabel `tb_tarif_penerbangan`
--
ALTER TABLE `tb_tarif_penerbangan`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_dtl_booking`
--
ALTER TABLE `tb_dtl_booking`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_passenger`
--
ALTER TABLE `tb_passenger`
  MODIFY `id_passenger` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
