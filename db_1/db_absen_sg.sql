-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2024 pada 09.08
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen_sg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_absen`
--

CREATE TABLE `tbl_data_absen` (
  `id_absen` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `jam_absen` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `file` text,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_absen`
--

INSERT INTO `tbl_data_absen` (`id_absen`, `nisn`, `nama_lengkap`, `jam_absen`, `keterangan`, `status`, `file`, `waktu`) VALUES
(1, '123', '', '10:33:16', 'Tepat Waktu', 'siswa', NULL, '2024-02-14 17:00:00'),
(3, '12345', 'testing', '07:57:08', 'asda', 'guru', NULL, '2024-02-17 06:26:08'),
(4, '213', 'testing', '07:58:03', 'testing', 'guru', '14f933b3d7df7070efd1aca990c6a629.jpg', '2024-02-18 06:26:08'),
(5, '123', '', '13:40', 'Izin', 'siswa', NULL, '2024-02-19 18:40:25'),
(6, '123', '', '10:33:16', 'Alpha', 'siswa', NULL, '2024-02-24 06:26:08'),
(8, '123', 'guru', '14:09', 'Alpha', 'guru', NULL, '2024-02-24 19:08:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_guru`
--

CREATE TABLE `tbl_data_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_guru`
--

INSERT INTO `tbl_data_guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `no_hp`, `mapel`, `keterangan`, `foto`, `waktu`) VALUES
(2, '123', 'guru', 'Laki-laki', '123', 'ipa', '123', '78f82d3da0216f307c2faf39cabc61e8.png', '2024-02-24 07:36:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_siswa`
--

CREATE TABLE `tbl_data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `no_hp_ortu` varchar(13) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_siswa`
--

INSERT INTO `tbl_data_siswa` (`id_siswa`, `nisn`, `nama_siswa`, `jenis_kelamin`, `no_hp`, `kelas`, `no_hp_ortu`, `keterangan`, `foto`, `waktu`) VALUES
(1, '123', 'siswa', '', '', 'X', '', 'Izin', 'c85a91ad50ab611d6e1909cd5da4f6de.png', '2024-02-24 06:31:05'),
(2, '456', 'siswa', 'Laki-laki', '1234123', 'XI', '123', '', 'c85a91ad50ab611d6e1909cd5da4f6de.png', '2024-02-24 06:31:11'),
(3, '789', 'siswa', 'Laki-laki', '1234123', 'X', '123', '', 'c85a91ad50ab611d6e1909cd5da4f6de.png', '2024-02-24 06:31:14'),
(4, '101112', 'siswa', 'Laki-laki', '1234123', 'X', '123', '', 'c85a91ad50ab611d6e1909cd5da4f6de.png', '2024-02-24 06:31:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `nama_gambar` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `gambar`, `nama_gambar`, `keterangan`, `waktu`) VALUES
(1, 'a97ae297537627fb41c239996702d25b.png', 'gambar', 'gambar 123', '2024-02-05 21:17:52'),
(2, 'a97ae297537627fb41c239996702d25b.png', 'gambar', 'gambar 123', '2024-02-05 21:17:52'),
(3, 'a97ae297537627fb41c239996702d25b.png', 'gambar', 'gambar 123', '2024-02-05 21:17:52'),
(4, 'a97ae297537627fb41c239996702d25b.png', 'gambar', 'gambar 123', '2024-02-05 21:17:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jam`
--

CREATE TABLE `tbl_jam` (
  `id_jam` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jam`
--

INSERT INTO `tbl_jam` (`id_jam`, `jam_masuk`, `keterangan`) VALUES
(1, '07:02:00', 'Jam Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `hak_akses`, `username`, `password`, `status`, `waktu`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, '2024-02-05 02:20:23'),
(2, 'kepsek', 'kepsek', 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 0, '2024-02-25 07:58:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_data_absen`
--
ALTER TABLE `tbl_data_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `tbl_data_guru`
--
ALTER TABLE `tbl_data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_data_siswa`
--
ALTER TABLE `tbl_data_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `tbl_jam`
--
ALTER TABLE `tbl_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_data_absen`
--
ALTER TABLE `tbl_data_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_data_guru`
--
ALTER TABLE `tbl_data_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_data_siswa`
--
ALTER TABLE `tbl_data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_jam`
--
ALTER TABLE `tbl_jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
