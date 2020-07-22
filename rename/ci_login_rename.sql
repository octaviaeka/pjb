-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2020 pada 19.50
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dropdown`
--

CREATE TABLE `dropdown` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dropdown`
--

INSERT INTO `dropdown` (`id`, `nama`) VALUES
(1, 'sidoarjo'),
(2, 'surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formula_perhitungan`
--

CREATE TABLE `formula_perhitungan` (
  `id_perhitungan` int(11) NOT NULL,
  `plant_id` varchar(255) NOT NULL,
  `jenis_perhitungan` text NOT NULL,
  `nama_perhitungan` text NOT NULL,
  `query_perhitungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_ebt`
--

CREATE TABLE `master_ebt` (
  `id_master_ebt` int(11) NOT NULL,
  `plant_id` varchar(255) NOT NULL,
  `nama_plant` text NOT NULL,
  `site_id` text NOT NULL,
  `commisioning` date NOT NULL,
  `alamat` text NOT NULL,
  `time_zone` text NOT NULL,
  `kapasitas` text NOT NULL,
  `foto` text NOT NULL,
  `nama_operator` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `kota` text NOT NULL,
  `latlong` text NOT NULL,
  `status` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_ebt`
--

INSERT INTO `master_ebt` (`id_master_ebt`, `plant_id`, `nama_plant`, `site_id`, `commisioning`, `alamat`, `time_zone`, `kapasitas`, `foto`, `nama_operator`, `telephone`, `email`, `kota`, `latlong`, `status`, `date_created`, `date_modified`) VALUES
(1, 'a', 'hel', '1', '2000-07-07', 'margorejo', 'GMT +7', '5000KW', 'logo.jpg', 'octa', '088890', 'octav@gmail.com', 'surabaya', '-7.2759, 112.808', 'aktif', '2020-07-22 16:20:05', '2020-07-08 17:00:00'),
(5, 'b', 'jayl', '2', '2000-07-07', 'Malang', 'GMT +7', '5000KW', 'logo.jpg', 'octa', '0888', 'octa@gmail.com', 'surabaya', '-7.2759, 112.808', 'aktif', '2020-07-22 16:20:11', '2020-07-08 17:00:00'),
(10, 'c', 'jaya', '2', '2000-07-07', 'Malang', 'GMT +7', '5000KW', 'logo.jpg', 'octa', '0889', 'octa@gmail.com', 'surab', '-7.2759, 112.808', 'aktif', '2020-07-22 16:20:14', '2020-07-08 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tagname`
--

CREATE TABLE `m_tagname` (
  `id` int(11) NOT NULL,
  `site_id` char(50) NOT NULL,
  `plant_id` char(50) NOT NULL,
  `equipment_id` char(50) NOT NULL,
  `tag_name` char(50) NOT NULL,
  `description` char(100) NOT NULL,
  `lower_range` int(10) NOT NULL,
  `upper_range` int(10) NOT NULL,
  `unit` char(10) NOT NULL,
  `posisi_kolom` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_tagname`
--

INSERT INTO `m_tagname` (`id`, `site_id`, `plant_id`, `equipment_id`, `tag_name`, `description`, `lower_range`, `upper_range`, `unit`, `posisi_kolom`, `date_created`, `date_modified`) VALUES
(1, '1', '1', '', 'octa', 'done', 10, 100, '5', '2', '2020-07-08 17:00:00', '2020-07-08 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site`
--

CREATE TABLE `site` (
  `id_master_site` int(11) NOT NULL,
  `site_id` varchar(255) NOT NULL,
  `wilayah_kerja` text NOT NULL,
  `alamat` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `kota` text NOT NULL,
  `status` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `site`
--

INSERT INTO `site` (`id_master_site`, `site_id`, `wilayah_kerja`, `alamat`, `telephone`, `email`, `kota`, `status`, `date_created`, `date_modified`) VALUES
(0, '1', 'surabaya', 'margorejo,surabaya', '0888', 'octa@gmail.com', 'surabaya', 'aktif', '2020-07-06 17:00:00', '0000-00-00 00:00:00'),
(0, '2', 'd', 'a', '09', 'e@gmail.com', 'sda', 'aktif', '2020-07-08 17:00:00', '2020-07-08 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `system_logbook`
--

CREATE TABLE `system_logbook` (
  `id_logbook` int(11) NOT NULL,
  `type_alarm` text NOT NULL,
  `time` text NOT NULL,
  `tag_name` text NOT NULL,
  `description` text NOT NULL,
  `sr` text NOT NULL,
  `wo` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `system_logbook`
--

INSERT INTO `system_logbook` (`id_logbook`, `type_alarm`, `time`, `tag_name`, `description`, `sr`, `wo`, `date_created`, `date_modified`) VALUES
(1, 'otomatis', '12:03:06', '1', 'lima', '105t', '110t', '2020-07-08 17:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `role_view_ebt` text NOT NULL,
  `role_edit` varchar(255) NOT NULL,
  `aktif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `kategori`, `role_view_ebt`, `role_edit`, `aktif`) VALUES
(1, 'octa', '123', 'view_user', '#ebt_sby#ebt_malang', '#ebt_sby#ebt_malang', 'yes'),
(2, 'eka', '123', 'admin_ebt', 'ebt_tulungagung#ebt_sby', 'ebt_tulungagung#ebt_sby', 'yes'),
(3, 'via', '123', 'admin_utama', 'y', 'y', 'yes'),
(4, 'octavia', '123', 'admin_it', 'ebt_tulungagung#ebt_bandung', 'ebt_tulungagung#ebt_bandung', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dropdown`
--
ALTER TABLE `dropdown`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `formula_perhitungan`
--
ALTER TABLE `formula_perhitungan`
  ADD PRIMARY KEY (`id_perhitungan`,`plant_id`);

--
-- Indeks untuk tabel `master_ebt`
--
ALTER TABLE `master_ebt`
  ADD PRIMARY KEY (`id_master_ebt`,`plant_id`) USING BTREE;

--
-- Indeks untuk tabel `m_tagname`
--
ALTER TABLE `m_tagname`
  ADD PRIMARY KEY (`tag_name`);

--
-- Indeks untuk tabel `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`site_id`,`id_master_site`) USING BTREE;

--
-- Indeks untuk tabel `system_logbook`
--
ALTER TABLE `system_logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dropdown`
--
ALTER TABLE `dropdown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `system_logbook`
--
ALTER TABLE `system_logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
