-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 05:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandarharjo`
--

-- --------------------------------------------------------

--
-- Table structure for table `beranda`
--

CREATE TABLE `beranda` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beranda`
--

INSERT INTO `beranda` (`id`, `isi`, `foto`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae congue eu consequat ac felis donec et odio. Quis varius quam quisque id diam vel quam elementum. Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus. Eget gravida cum sociis natoque penatibus et magnis dis parturient montes. Integer vitae justo eget magna fermentum iaculis eu non. Tincidunt ornare massa eget egestas purus viverra accumsan in. Proin libero nunc consequat interdum varius sit amet mattis vulputate. Arcu bibendum at varius vel pharetra vel turpis nunc. Et egestas quis ipsum suspendisse ultrices gravida dictum fusce.\r\n\r\nMaecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum. Arcu ac tortor dignissim convallis aenean et. Lectus magna fringilla urna porttitor rhoncus dolor purus non. Amet facilisis magna etiam tempor orci eu lobortis. Arcu cursus euismod quis viverra nibh cras pulvinar. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Egestas integer eget aliquet nibh praesent tristique magna sit. Et netus et malesuada fames ac turpis egestas sed. Adipiscing elit pellentesque habitant morbi tristique senectus et netus. Mauris in aliquam sem fringilla ut morbi tincidunt augue interdum.\r\n\r\nEget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Blandit massa enim nec dui nunc mattis enim ut. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque. Cursus risus at ultrices mi tempus imperdiet nulla malesuada. Pharetra pharetra massa massa ultricies mi quis. Dignissim suspendisse in est ante in. Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra. Velit egestas dui id ornare arcu odio ut sem nulla. Sed id semper risus in\r\n', 'Planet9_Wallpaper_5000x2813.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`id`, `judul`, `deskripsi`, `file`) VALUES
(8, 'buku pertama', 'pertama', '5302422071-ANUGRAH RIDHO AFRIADI-RINGKASAN MATERI PRIVASI DAN PELANGGARANNYA.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama`, `foto`, `created_at`) VALUES
(2, 'pramukaaaaa', 'Screenshot 2025-04-28 064657.png', '2025-04-28 00:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `url_video` varchar(500) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id`, `foto`, `judul`, `isi`, `url_video`, `kategori`) VALUES
(18, '', 'pengumuman ppdb 2025', 'pengumuman', 'https://youtu.be/DHjqpvDnNGE?feature=shared', 'video'),
(30, '680eb6d4bb0be.png', 'acara', 'acara aa', '', 'foto');

-- --------------------------------------------------------

--
-- Table structure for table `kaldik`
--

CREATE TABLE `kaldik` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `file_kaldik` varchar(255) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kaldik`
--

INSERT INTO `kaldik` (`id`, `tahun_ajaran`, `file_kaldik`, `tanggal_upload`, `kategori`) VALUES
(12, '2028/2029', 'Pengaduan_tes_(21).pdf', '2025-04-27 07:41:25', 'semarang'),
(13, '2028/2029', 'pengaduan_dea.pdf', '2025-04-27 08:28:55', 'sd'),
(17, '2013/2014', 'Pengaduan_tes_(15).pdf', '2025-04-27 09:46:06', 'sd'),
(18, '2022/2023', 'Pengaduan_tes_(16).pdf', '2025-04-27 15:16:01', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `lomba`
--

CREATE TABLE `lomba` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lomba`
--

INSERT INTO `lomba` (`id`, `foto`, `nama`) VALUES
(13, '/upload/Screenshot 2025-04-14 020238.png', 'Lomba Internasional'),
(14, '/upload/Acer_Wallpaper_02_5000x2813.jpg', 'sdn bandarharjo');

-- --------------------------------------------------------

--
-- Table structure for table `pendidik`
--

CREATE TABLE `pendidik` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `isi` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `foto`, `isi`, `kategori`, `created_at`) VALUES
(22, 'Pengumuman MPLS Terbaru', 'pengumuman_680af267273c17.36471197.png', 'ada', '', '2025-04-25 02:24:39'),
(23, 'ppdb', 'pengumuman_680af2896d6e61.27999593.png', 'ppdb', '', '2025-04-25 02:25:13'),
(30, 'administrasi', 'Screenshot 2025-02-01 145107.png', 'sadasdads', 'MPLS', '2025-04-27 18:23:41'),
(31, 'ppdb', 'Screenshot 2025-02-01 155745.png', 'ppppppppp', 'PPDB', '2025-04-27 18:24:46'),
(32, 'berita', 'Screenshot 2025-02-19 215147.png', 'berer', 'Berita', '2025-04-27 18:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama`, `foto`, `kategori`, `created_at`) VALUES
(12, 'SMK 1 Semarang Kota', '/upload/680e7b18499ac-calendar.jpg', 'prestasi', '2025-04-27 13:44:40'),
(13, 'juara', '/upload/680e7b308df1e-sdn bandarharjo 02 logo.png', 'sang_juara', '2025-04-27 13:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `sarana`
--

CREATE TABLE `sarana` (
  `keterangan` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sarana`
--

INSERT INTO `sarana` (`keterangan`, `jumlah`) VALUES
('Ruang Kelas', 145);

-- --------------------------------------------------------

--
-- Table structure for table `sekolahku`
--

CREATE TABLE `sekolahku` (
  `sejarah` text DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `letak` varchar(255) DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolahku`
--

INSERT INTO `sekolahku` (`sejarah`, `alamat`, `telepon`, `email`, `letak`, `visi`, `misi`) VALUES
('SD Negeri Bandarharjo 02 didirikan pada tahun 1974 dengan nama SD Inpres KSP Bandarharjo. Pada tahun 1980 berganti nama menjadi SD Negeri Bandarharjo 03. Kemudian pada tahun 2000 dengan SK Gubernur Kepala Daerah Tingkat I Jawa Tengah, SD Negeri Bandarharjo 03 diubah menjadi SD Negeri Bandarharjo 02.', 'Jl. Lodan Raya No. 1, Kel. Bandarharjo, Kec. Semarang Utara, Kota Semarang, Provinsi Jawa Tengah.', '(024) 3563228', 'sdnbandarharjo02semarang@gmail.com', NULL, 'Membentuk manusia beriman, jujur, mandiri, beretika, santun dalam budaya, unggul dalam IPTEK, dan menciptakan lingkungan ramah anak serta fasilitatif terhadap keragaman peserta didik.', 'Menyiapkan sumber daya manusia yang berbudaya, cerdas, terampil, dan berbudi pekerti luhur, meningkatkan wawasan dan kreatifitas budaya, meningkatkan kualitas dan efektivitas proses belajar mengajar, menciptakan lingkungan sekolah yang kondusif, aman, dan nyaman, serta menumbuhkembangkan semangat berprestasi secara kompetetif, jujur, dan sportif.');

-- --------------------------------------------------------

--
-- Table structure for table `siswa1`
--

CREATE TABLE `siswa1` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(255) NOT NULL,
  `kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa1`
--

INSERT INTO `siswa1` (`id`, `nama`, `nisn`, `kategori`) VALUES
(5, 'faannyy', 343424, 'A'),
(9, 'adit', 12345, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `siswa2`
--

CREATE TABLE `siswa2` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(255) NOT NULL,
  `kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa2`
--

INSERT INTO `siswa2` (`id`, `nama`, `nisn`, `kategori`) VALUES
(1, 'danang 24', 3411, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `siswa3`
--

CREATE TABLE `siswa3` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa3`
--

INSERT INTO `siswa3` (`id`, `nama`, `nisn`, `kategori`) VALUES
(1, 'vivi', 52436, 'B'),
(2, 'wawan 24', 122354364, 'A'),
(3, 'anna', 878588, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `siswa4`
--

CREATE TABLE `siswa4` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(255) NOT NULL,
  `kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa4`
--

INSERT INTO `siswa4` (`id`, `nama`, `nisn`, `kategori`) VALUES
(2, 'lili 24', 6552, 'A'),
(3, 'juki', 6544, 'B'),
(4, 'loana', 666423, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `siswa5`
--

CREATE TABLE `siswa5` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(255) NOT NULL,
  `kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa5`
--

INSERT INTO `siswa5` (`id`, `nama`, `nisn`, `kategori`) VALUES
(1, 'koko', 4565, 'B'),
(2, 'yuni 24', 6787, 'A'),
(3, 'huda', 6557, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `siswa6`
--

CREATE TABLE `siswa6` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(255) NOT NULL,
  `kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa6`
--

INSERT INTO `siswa6` (`id`, `nama`, `nisn`, `kategori`) VALUES
(4, 'raju', 9865, '0'),
(5, 'raju 2', 3243546, '0'),
(6, 'raju 2', 3243546, '0'),
(7, 'gunaaar 24', 324355646, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tautan`
--

CREATE TABLE `tautan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tautan`
--

INSERT INTO `tautan` (`id`, `nama`, `link`, `foto`) VALUES
(10, 'kemendikbud', 'https://www.kemdikbud.go.id/', '680e7a21a7c66-kemendikbud.png'),
(11, 'Kominfo', 'https://www.komdigi.go.id/', '681232c1599d4-word-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`) VALUES
('fluxzz', '1234', 'admin'),
('ridho', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beranda`
--
ALTER TABLE `beranda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori` (`id`);

--
-- Indexes for table `kaldik`
--
ALTER TABLE `kaldik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidik`
--
ALTER TABLE `pendidik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa1`
--
ALTER TABLE `siswa1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa2`
--
ALTER TABLE `siswa2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa3`
--
ALTER TABLE `siswa3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa4`
--
ALTER TABLE `siswa4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa5`
--
ALTER TABLE `siswa5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa6`
--
ALTER TABLE `siswa6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tautan`
--
ALTER TABLE `tautan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beranda`
--
ALTER TABLE `beranda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kaldik`
--
ALTER TABLE `kaldik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pendidik`
--
ALTER TABLE `pendidik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `siswa1`
--
ALTER TABLE `siswa1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa2`
--
ALTER TABLE `siswa2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa3`
--
ALTER TABLE `siswa3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa4`
--
ALTER TABLE `siswa4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa5`
--
ALTER TABLE `siswa5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa6`
--
ALTER TABLE `siswa6`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tautan`
--
ALTER TABLE `tautan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
