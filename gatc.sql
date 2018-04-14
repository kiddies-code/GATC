-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 15 Apr 2018 pada 01.12
-- Versi Server: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.2-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gatc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `ID` int(10) NOT NULL,
  `nama_course` varchar(100) NOT NULL,
  `detail_course` text NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `kontak1` varchar(250) NOT NULL,
  `kontak2` varchar(250) DEFAULT NULL,
  `kontak3` varchar(250) DEFAULT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `jumlah_peserta` int(10) NOT NULL DEFAULT '0',
  `jumlah_max` int(10) NOT NULL DEFAULT '99999',
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`ID`, `nama_course`, `detail_course`, `tanggal_pelaksanaan`, `tanggal_berakhir`, `harga`, `kontak1`, `kontak2`, `kontak3`, `tanggal_buka`, `tanggal_tutup`, `jumlah_peserta`, `jumlah_max`, `status`, `image`) VALUES
(9, 'Hidroponik Dasar', '1. Teori budidaya tanaman sistem hidroponik.\r\n2. Peluang usaha bidang hidroponik.\r\n3. Praktik persemaian.\r\n4. Praktik hidroponik jenis Rakit Apung.\r\n5. Praktik perakitan hidroponik jenis NFT.\r\n6. Praktik pembuatan Fertigasi.', '2018-05-31', NULL, 0, 'Alfu Laila : 0857 2612 3048', '', '', '2018-04-10', '2018-05-20', 0, 99999, 'aktif', 'uploads/Hidroponik Dasar.png'),
(10, 'Nutrisi Hidroponik', '1. Teori nutrisi tanaman\r\n2. Peluang usaha nutrisi tanaman\r\n3. Praktik pembuatan nutrisi tanaman', '2018-05-30', '2018-06-02', 1000000, 'Alfu Laila : 0857 2612 3048', '', '', '2018-04-11', '2018-05-25', 0, 100, 'aktif', 'uploads/Nutrisi Hidroponik.png'),
(11, 'Budidaya Tanaman Tingkat Dasar', '1. Teori budidaya tanaman\r\n2. Prospek dan peluang usaha\r\n3. Praktik penyemaian benih sayuran\r\n4. Praktik pindah tanam bibit sayuran\r\n5. Praktik stek\r\n6. Praktik sambung\r\n7. Praktik stek-sambung (stek-bung)', '2018-05-31', NULL, 100000, 'Alfu Laila : 0857 2612 3048', '', '', '2018-04-10', '2018-05-25', 0, 150, 'aktif', 'uploads/Budidaya Tanaman Tingkat Dasar.png'),
(14, 'PROGRAM PENGEMBANGAN KEWIRAUSAHAAN ANGKATAN 2018', 'Program Pengembangan Kewirausahaan (PPK) merupakan salah satu program Direktorat Riset dan Pengabdian Masyarakat (DRPM) KEMENRISTEKDIKTI untuk menghasilkan wirausaha-wirausaha baru dari kampus. Gontor Agrotech Training Centre (GATC) merupakan salah satu layanan pengembangan kewirausahaan di Universitas Darussalam Gontor yang dibiayai oleh DRPM Kemenristekdikti. Misi dari  Gontor Agrotech Training Centre adalah menghasilkan 5 unit usaha berbasis iptek bidang Agro dari 20 wirausaha baru mandiri setiap tahun. Program ini dilaksanakan dalam bentuk kerjasama dengan 20 calon wirausaha. Calon wirausaha akan mengikuti serangkaian kegiatan bersama selama 1 tahun yakni kuliah umum bersama pakar dan praktisi, kunjungan lapangan, pelatihan, stimulus dalam bentuk in kind, pendampingan produksi, pemasaran, dan pengembangan kerjasama. \r\n\r\nKriteria Pengusulan\r\n1. Peserta adalah kelompok mahasiswa aktif dan alumni UNIDA Gontor\r\n2. Anggota kelompok pengusul berjumlah 2-3 orang\r\n3. Anggota tim berasal dari prodi dan angkatan yang berbeda\r\n4. Bidang kegiatan yang ditawarkan, antara lain:\r\na. Produk segar tanaman pangan dan hortikultura\r\nb. Produk pasca panen\r\nc. Tanaman Hias\r\nd. Sarana produksi (misal : benih, pupuk/nutrisi, media tanam, dll)\r\n\r\nSistematika Proposal “Business Plan”\r\nHALAMAN SAMPUL\r\nDAFTAR ISI\r\nBAB 1. PENDAHULUAN\r\na. Latar Belakang\r\nb. Tujuan\r\nc. Manfaat\r\nBAB 2. GAMBARAN UMUM RENCANA USAHA\r\nBerisi tentang peluang pasar, gambaran umum produk, keunikan produk, dan strategi pemasaran. Analisis kelayakan usaha meliputi modal, biaya tetap, biaya tidak tetap, analisis usaha (BEP).\r\nBAB 3. METODE PELAKSANAAN\r\nUraikan pelaksanaan atau tahapan pekerjaan untuk pencapaian tujuan program.\r\nBAB 4. KEBERLANJUTAN USAHA\r\nLampiran\r\nBerisi Rincian Anggaran Biaya, scan KTM untuk mahasiswa aktif atau kartu alumni/ijazah untuk alumni', '2018-04-18', NULL, 0, 'Alfu Laila, M.Sc (HP/WA/SMS 085726123048)  Email : gatc@unida.gontor.ac.id', '', '', '2018-04-09', '2018-04-14', 0, 99999, 'aktif', 'uploads/14.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1520347610),
('m130524_201442_init', 1520347612);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `ID` int(10) NOT NULL,
  `id_course` int(10) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `status` enum('menunggu','verifikasi','lunas') NOT NULL DEFAULT 'menunggu',
  `bukti_bayar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `peserta`
--
DELIMITER $$
CREATE TRIGGER `peserta_kurang` AFTER DELETE ON `peserta` FOR EACH ROW BEGIN
	UPDATE course SET jumlah_peserta=jumlah_peserta-1
    WHERE ID= OLD.id_course;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `peserta_tambah` AFTER INSERT ON `peserta` FOR EACH ROW BEGIN
	UPDATE course SET jumlah_peserta=jumlah_peserta+1
    WHERE ID=NEW.id_course;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_admin` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `status_admin`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GATCadmin', 'admin', '1FbONLZShWT0inWbXz28kXfyM4f_5zKD', '$2y$13$lehXI5UUTgzGe2FZvu0csefYc8ihKViJ80Oxi3mGZeE69YxnTOym6', NULL, 'gontoratc@gmail.com', 10, 1520350191, 1520350191),
(3, 'ammad', 'user', 'evfzMLkg_GZMWdNcCBGX9qaYto5exEA_', '$2y$13$cN8xiz5lSRZYQOXHB/HUyel7j8lDvuVUwcpVhRXDyoqg.eCDJEQY.', NULL, 'ammad.mahfuz@gmail.com', 10, 1521525268, 1521525268);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
