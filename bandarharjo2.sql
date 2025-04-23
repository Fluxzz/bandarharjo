-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2025 pada 09.22
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
-- Database: `bandarharjo2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beranda`
--

CREATE TABLE `beranda` (
  `foto` text NOT NULL,
  `sambutan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ebook`
--

CREATE TABLE `ebook` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ebook`
--

INSERT INTO `ebook` (`id`, `judul`, `deskripsi`, `file`) VALUES
(1, 'Ebook 1', 'Deskripsi ebook pertama', 'ebook1.pdf'),
(2, 'Ebook 2', 'Deskripsi ebook kedua', 'ebook2.pdf'),
(3, 'Ebook 3', 'Deskripsi ebook ketiga', 'ebook3.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `yt` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
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
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`id`, `foto`, `judul`, `isi`, `url_video`, `kategori`) VALUES
(2, NULL, 'MPLS Hari Pertama', 'Foto kegiatan MPLS Hari Pertama T.A. 2021/2022', NULL, 'foto'),
(3, NULL, 'Lomba Akademik', 'Foto lomba akademik di sekolah', NULL, 'foto'),
(4, NULL, 'Kegiatan Belajar Mengajar', 'Foto kegiatan belajar mengajar di kelas', NULL, 'foto'),
(5, NULL, 'Penerimaan Siswa Baru', 'Foto acara penerimaan siswa baru T.A. 2021/2022', NULL, 'foto'),
(6, NULL, 'Wisuda Siswa', 'Foto acara wisuda siswa tahun ajaran 2021/2022', NULL, 'foto'),
(7, NULL, 'MPLS Hari kedua', 'Video kegiatan MPLS Hari Pertama T.A. 2021/2022', NULL, 'video'),
(8, NULL, 'Lomba Akademik', 'Video lomba akademik di sekolah', NULL, 'video'),
(9, NULL, 'Kegiatan Belajar Mengajar', 'Video kegiatan belajar mengajar di kelas', NULL, 'video'),
(10, NULL, 'Penerimaan Siswa Baru', 'Video acara penerimaan siswa baru T.A. 2021/2022', NULL, 'video'),
(11, NULL, 'Wisuda Siswa', 'Video acara wisuda siswa tahun ajaran 2021/2022', NULL, 'video');

-- --------------------------------------------------------

--
-- Struktur dari tabel `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lomba`
--

CREATE TABLE `lomba` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lomba`
--

INSERT INTO `lomba` (`id`, `foto`, `nama`) VALUES
(4, NULL, 'Matematika Nasional'),
(5, NULL, 'Sains dan Teknologi'),
(6, NULL, 'Seni dan Budaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
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
-- Struktur dari tabel `pengumuman`
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
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `foto`, `isi`, `kategori`, `created_at`) VALUES
(2, 'Pengumuman PPDB 2025', 'ppdb2025.jpg', 'Pendaftaran peserta didik baru untuk tahun ajaran 2025 dimulai pada 1 Mei 2025.', 'PPDB', '2025-04-09 13:58:21'),
(3, 'MPLS Hari Pertama', 'mpls_hari_pertama.jpg', 'Hari pertama MPLS untuk siswa baru tahun ajaran 2025/2026 akan diadakan pada 12 Juli 2025.', 'MPLS', '2025-04-09 13:58:21'),
(4, 'Berita Sekolah', 'berita_sekolah.jpg', 'Berita terbaru mengenai kegiatan sekolah, termasuk lomba dan prestasi siswa.', 'Berita', '2025-04-09 13:58:21'),
(5, 'Pendaftaran PPDB 2023/2024', 'ppdb2023.jpg', 'Pendaftaran peserta didik baru untuk tahun ajaran 2023/2024.', 'PPDB', '2025-04-09 14:48:44'),
(6, 'Informasi PPDB Tahun Ajaran 2023', 'ppdb2023_2.jpg', 'Informasi mengenai syarat dan ketentuan PPDB tahun ajaran 2023.', 'PPDB', '2025-04-09 14:48:44'),
(7, 'Jadwal Pendaftaran PPDB 2023', 'ppdb2023_3.jpg', 'Berikut adalah jadwal pendaftaran PPDB untuk tahun ajaran 2023.', 'PPDB', '2025-04-09 14:48:44'),
(8, 'PPDB 2023: Prosedur Pendaftaran', 'ppdb2023_4.jpg', 'Prosedur lengkap pendaftaran untuk siswa baru tahun ajaran 2023/2024.', 'PPDB', '2025-04-09 14:48:44'),
(9, 'MPLS Hari Pertama', 'mpls_hari_pertama.jpg', 'Hari pertama MPLS untuk siswa baru tahun ajaran 2023/2024.', 'MPLS', '2025-04-09 14:48:44'),
(10, 'MPLS: Panduan Siswa Baru', 'mpls_panduan_siswa.jpg', 'Panduan lengkap untuk siswa baru yang mengikuti MPLS tahun ajaran 2023/2024.', 'MPLS', '2025-04-09 14:48:44'),
(11, 'MPLS Kegiatan dan Acara', 'mpls_kegiatan.jpg', 'Acara dan kegiatan yang akan dilaksanakan selama MPLS tahun ajaran 2023/2024.', 'MPLS', '2025-04-09 14:48:44'),
(12, 'MPLS untuk Siswa Baru', 'mpls_siswa_baru.jpg', 'MPLS untuk siswa baru yang dilaksanakan oleh sekolah setiap tahun ajaran baru.', 'MPLS', '2025-04-09 14:48:44'),
(13, 'Berita Sekolah Terbaru', 'berita_sekolah.jpg', 'Berita terbaru mengenai kegiatan sekolah, termasuk acara-acara dan prestasi.', 'Berita', '2025-04-09 14:48:44'),
(14, 'Kegiatan Sekolah Terbaru', 'berita_sekolah_2.jpg', 'Kegiatan terbaru yang berlangsung di sekolah, termasuk lomba dan acara sosial.', 'Berita', '2025-04-09 14:48:44'),
(15, 'Prestasi Siswa dalam Lomba', 'berita_prestasi.jpg', 'Siswa-siswa berprestasi dalam lomba tingkat nasional dan internasional.', 'Berita', '2025-04-09 14:48:44'),
(16, 'Fasilitas Baru di Sekolah', 'berita_fasilitas_baru.jpg', 'Sekolah menambah fasilitas baru untuk mendukung kegiatan belajar mengajar.', 'Berita', '2025-04-09 14:48:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah1`
--

CREATE TABLE `profil_sekolah1` (
  `sejarah` text DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `letak` varchar(255) DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil_sekolah1`
--

INSERT INTO `profil_sekolah1` (`sejarah`, `alamat`, `telepon`, `email`, `letak`, `visi`, `misi`) VALUES
('SD Negeri Bandarharjo 02 didirikan pada tahun 1974 dengan nama SD Inpres KSP Bandarharjo. Pada tahun 1980 berganti nama menjadi SD Negeri Bandarharjo 03. Kemudian pada tahun 2000 dengan SK Gubernur Kepala Daerah Tingkat I Jawa Tengah, SD Negeri Bandarharjo 03 diubah menjadi SD Negeri Bandarharjo 02.', 'Jl. Lodan Raya No. 1, Kel. Bandarharjo, Kec. Semarang Utara, Kota Semarang, Provinsi Jawa Tengah.', '(024) 3563228', 'sdnbandarharjo02semarang@gmail.com', 'Utara: Pemukiman, Timur: Pabrik, Selatan: Pabrik, Barat: Kali Semarang', 'Membentuk manusia beriman, jujur, mandiri, beretika, santun dalam budaya, unggul dalam IPTEK, dan menciptakan lingkungan ramah anak serta fasilitatif terhadap keragaman peserta didik.', 'Menyiapkan sumber daya manusia yang berbudaya, cerdas, terampil, dan berbudi pekerti luhur, meningkatkan wawasan dan kreatifitas budaya, meningkatkan kualitas dan efektivitas proses belajar mengajar, menciptakan lingkungan sekolah yang kondusif, aman, dan nyaman, serta menumbuhkembangkan semangat berprestasi secara kompetetif, jujur, dan sportif.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah2`
--

CREATE TABLE `profil_sekolah2` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil_sekolah2`
--

INSERT INTO `profil_sekolah2` (`id`, `nama`, `jabatan`, `foto`) VALUES
(1, 'Purwanto, S.Pd.SD', 'Kepala Sekolah', NULL),
(2, 'Siti Aminah, S.Pd', 'Wakil Kepala Sekolah', NULL),
(3, 'Budi Santoso, S.Pd', 'Guru Kelas 1', NULL),
(4, 'Rina Marlina, S.Pd', 'Guru Kelas 2', NULL),
(5, 'Eko Wibowo, S.Pd', 'Guru Kelas 3', NULL),
(6, 'Sari Lestari, S.Pd', 'Guru Kelas 4', NULL),
(7, 'Dedi Prasetyo, S.Pd', 'Guru Kelas 5', NULL),
(8, 'Intan Permata, S.Pd', 'Guru Kelas 6', NULL),
(9, 'Rizky Hidayat, S.Kom', 'Guru TIK', NULL),
(10, 'Nur Aini, S.Pd', 'Tata Usaha', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sambutan`
--

CREATE TABLE `sambutan` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `foto_kapsek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sambutan`
--

INSERT INTO `sambutan` (`id`, `isi`, `foto_kapsek`) VALUES
(1, 'selamat datang untuk semua yang datang', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarana_prasarana`
--

CREATE TABLE `sarana_prasarana` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sarana_prasarana`
--

INSERT INTO `sarana_prasarana` (`id`, `keterangan`, `jumlah`) VALUES
(1, 'RUANG KELAS', 30),
(2, 'R. KEPALA SEKOLAH', 1),
(3, 'R. TAMU KEPALA SEKOLAH', 1),
(4, 'RUANG GURU', 1),
(5, 'PERPUSTAKAAN', 1),
(6, 'R UKS', 1),
(7, 'R. IBADAH (MUSHOLA)', 1),
(8, 'KAMAR MANDI GURU', 2),
(9, 'TOILET SISWA', 5),
(10, 'KANTIN SEKOLAH', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa1`
--

CREATE TABLE `siswa1` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nisn` int(11) NOT NULL,
  `kategori` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa1`
--

INSERT INTO `siswa1` (`id`, `nama`, `nisn`, `kategori`) VALUES
(41, 'Asala A1', 10001, 'A'),
(42, 'Budi A2', 10002, 'A'),
(43, 'Citra A3', 10003, 'A'),
(44, 'Dewi A4', 10004, 'A'),
(45, 'Eko A5', 10005, 'A'),
(46, 'Fanny A6', 10006, 'A'),
(47, 'Gina A7', 10007, 'A'),
(48, 'Hendra A8', 10008, 'A'),
(49, 'Intan A9', 10009, 'A'),
(50, 'Joko A10', 10010, 'A'),
(51, 'Anna B1', 20001, 'B'),
(52, 'Beni B2', 20002, 'B'),
(53, 'Cindy B3', 20003, 'B'),
(54, 'Dino B4', 20004, 'B'),
(55, 'Elma B5', 20005, 'B'),
(56, 'Fajar B6', 20006, 'B'),
(57, 'Gina B7', 20007, 'B'),
(58, 'Hendra B8', 20008, 'B'),
(59, 'Indah B9', 20009, 'B'),
(60, 'Jaya B10', 20010, 'B'),
(61, 'Anna C1', 30001, 'C'),
(62, 'Beni C2', 30002, 'C'),
(63, 'Cindy C3', 30003, 'C'),
(64, 'Dino C4', 30004, 'C'),
(65, 'Elma C5', 30005, 'C'),
(66, 'Fajar C6', 30006, 'C'),
(67, 'Gina C7', 30007, 'C'),
(68, 'Hendra C8', 30008, 'C'),
(69, 'Indah C9', 30009, 'C'),
(70, 'Jaya C10', 30010, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa2`
--

CREATE TABLE `siswa2` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kategori` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa2`
--

INSERT INTO `siswa2` (`id`, `nama`, `nisn`, `kategori`) VALUES
(1, 'Asala', 10001, 'A'),
(2, 'Budi', 10002, 'A'),
(3, 'Citra', 10003, 'A'),
(4, 'Dewi', 10004, 'A'),
(5, 'Eko', 10005, 'A'),
(6, 'Fanny', 10006, 'A'),
(7, 'Gina', 10007, 'A'),
(8, 'Hendra', 10008, 'A'),
(9, 'Intan', 10009, 'A'),
(10, 'Joko', 10010, 'A'),
(11, 'Anna', 20001, 'B'),
(12, 'Beni', 20002, 'B'),
(13, 'Cindy', 20003, 'B'),
(14, 'Dino', 20004, 'B'),
(15, 'Elma', 20005, 'B'),
(16, 'Fajar', 20006, 'B'),
(17, 'Gina', 20007, 'B'),
(18, 'Hendra', 20008, 'B'),
(19, 'Indah', 20009, 'B'),
(20, 'Jaya', 20010, 'B'),
(21, 'Ari', 30001, 'C'),
(22, 'Bima', 30002, 'C'),
(23, 'Celia', 30003, 'C'),
(24, 'Diana', 30004, 'C'),
(25, 'Erik', 30005, 'C'),
(26, 'Fahmi', 30006, 'C'),
(27, 'Gita', 30007, 'C'),
(28, 'Hari', 30008, 'C'),
(29, 'Ika', 30009, 'C'),
(30, 'Juli', 30010, 'C'),
(31, 'Asala', 10001, 'A'),
(32, 'Budi', 10002, 'A'),
(33, 'Citra', 10003, 'A'),
(34, 'Dewi', 10004, 'A'),
(35, 'Eko', 10005, 'A'),
(36, 'Fanny', 10006, 'A'),
(37, 'Gina', 10007, 'A'),
(38, 'Hendra', 10008, 'A'),
(39, 'Intan', 10009, 'A'),
(40, 'Joko', 10010, 'A'),
(41, 'Anna', 20001, 'B'),
(42, 'Beni', 20002, 'B'),
(43, 'Cindy', 20003, 'B'),
(44, 'Dino', 20004, 'B'),
(45, 'Elma', 20005, 'B'),
(46, 'Fajar', 20006, 'B'),
(47, 'Gina', 20007, 'B'),
(48, 'Hendra', 20008, 'B'),
(49, 'Indah', 20009, 'B'),
(50, 'Jaya', 20010, 'B'),
(51, 'Ari', 30001, 'C'),
(52, 'Bima', 30002, 'C'),
(53, 'Celia', 30003, 'C'),
(54, 'Diana', 30004, 'C'),
(55, 'Erik', 30005, 'C'),
(56, 'Fahmi', 30006, 'C'),
(57, 'Gita', 30007, 'C'),
(58, 'Hari', 30008, 'C'),
(59, 'Ika', 30009, 'C'),
(60, 'Juli', 30010, 'C'),
(61, 'Asala', 10001, 'A'),
(62, 'Budi', 10002, 'A'),
(63, 'Citra', 10003, 'A'),
(64, 'Dewi', 10004, 'A'),
(65, 'Eko', 10005, 'A'),
(66, 'Fanny', 10006, 'A'),
(67, 'Gina', 10007, 'A'),
(68, 'Hendra', 10008, 'A'),
(69, 'Intan', 10009, 'A'),
(70, 'Joko', 10010, 'A'),
(71, 'Anna', 20001, 'B'),
(72, 'Beni', 20002, 'B'),
(73, 'Cindy', 20003, 'B'),
(74, 'Dino', 20004, 'B'),
(75, 'Elma', 20005, 'B'),
(76, 'Fajar', 20006, 'B'),
(77, 'Gina', 20007, 'B'),
(78, 'Hendra', 20008, 'B'),
(79, 'Indah', 20009, 'B'),
(80, 'Jaya', 20010, 'B'),
(81, 'Ari', 30001, 'C'),
(82, 'Bima', 30002, 'C'),
(83, 'Celia', 30003, 'C'),
(84, 'Diana', 30004, 'C'),
(85, 'Erik', 30005, 'C'),
(86, 'Fahmi', 30006, 'C'),
(87, 'Gita', 30007, 'C'),
(88, 'Hari', 30008, 'C'),
(89, 'Ika', 30009, 'C'),
(90, 'Juli', 30010, 'C'),
(91, 'Asala', 10001, 'A'),
(92, 'Budi', 10002, 'A'),
(93, 'Citra', 10003, 'A'),
(94, 'Dewi', 10004, 'A'),
(95, 'Eko', 10005, 'A'),
(96, 'Fanny', 10006, 'A'),
(97, 'Gina', 10007, 'A'),
(98, 'Hendra', 10008, 'A'),
(99, 'Intan', 10009, 'A'),
(100, 'Joko', 10010, 'A'),
(101, 'Anna', 20001, 'B'),
(102, 'Beni', 20002, 'B'),
(103, 'Cindy', 20003, 'B'),
(104, 'Dino', 20004, 'B'),
(105, 'Elma', 20005, 'B'),
(106, 'Fajar', 20006, 'B'),
(107, 'Gina', 20007, 'B'),
(108, 'Hendra', 20008, 'B'),
(109, 'Indah', 20009, 'B'),
(110, 'Jaya', 20010, 'B'),
(111, 'Ari', 30001, 'C'),
(112, 'Bima', 30002, 'C'),
(113, 'Celia', 30003, 'C'),
(114, 'Diana', 30004, 'C'),
(115, 'Erik', 30005, 'C'),
(116, 'Fahmi', 30006, 'C'),
(117, 'Gita', 30007, 'C'),
(118, 'Hari', 30008, 'C'),
(119, 'Ika', 30009, 'C'),
(120, 'Juli', 30010, 'C'),
(121, 'Asala', 10001, 'A'),
(122, 'Budi', 10002, 'A'),
(123, 'Citra', 10003, 'A'),
(124, 'Dewi', 10004, 'A'),
(125, 'Eko', 10005, 'A'),
(126, 'Fanny', 10006, 'A'),
(127, 'Gina', 10007, 'A'),
(128, 'Hendra', 10008, 'A'),
(129, 'Intan', 10009, 'A'),
(130, 'Joko', 10010, 'A'),
(131, 'Anna', 20001, 'B'),
(132, 'Beni', 20002, 'B'),
(133, 'Cindy', 20003, 'B'),
(134, 'Dino', 20004, 'B'),
(135, 'Elma', 20005, 'B'),
(136, 'Fajar', 20006, 'B'),
(137, 'Gina', 20007, 'B'),
(138, 'Hendra', 20008, 'B'),
(139, 'Indah', 20009, 'B'),
(140, 'Jaya', 20010, 'B'),
(141, 'Ari', 30001, 'C'),
(142, 'Bima', 30002, 'C'),
(143, 'Celia', 30003, 'C'),
(144, 'Diana', 30004, 'C'),
(145, 'Erik', 30005, 'C'),
(146, 'Fahmi', 30006, 'C'),
(147, 'Gita', 30007, 'C'),
(148, 'Hari', 30008, 'C'),
(149, 'Ika', 30009, 'C'),
(150, 'Juli', 30010, 'C'),
(151, 'Asala', 10001, 'A'),
(152, 'Budi', 10002, 'A'),
(153, 'Citra', 10003, 'A'),
(154, 'Dewi', 10004, 'A'),
(155, 'Eko', 10005, 'A'),
(156, 'Fanny', 10006, 'A'),
(157, 'Gina', 10007, 'A'),
(158, 'Hendra', 10008, 'A'),
(159, 'Intan', 10009, 'A'),
(160, 'Joko', 10010, 'A'),
(161, 'Anna', 20001, 'B'),
(162, 'Beni', 20002, 'B'),
(163, 'Cindy', 20003, 'B'),
(164, 'Dino', 20004, 'B'),
(165, 'Elma', 20005, 'B'),
(166, 'Fajar', 20006, 'B'),
(167, 'Gina', 20007, 'B'),
(168, 'Hendra', 20008, 'B'),
(169, 'Indah', 20009, 'B'),
(170, 'Jaya', 20010, 'B'),
(171, 'Ari', 30001, 'C'),
(172, 'Bima', 30002, 'C'),
(173, 'Celia', 30003, 'C'),
(174, 'Diana', 30004, 'C'),
(175, 'Erik', 30005, 'C'),
(176, 'Fahmi', 30006, 'C'),
(177, 'Gita', 30007, 'C'),
(178, 'Hari', 30008, 'C'),
(179, 'Ika', 30009, 'C'),
(180, 'Juli', 30010, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa3`
--

CREATE TABLE `siswa3` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kategori` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa3`
--

INSERT INTO `siswa3` (`id`, `nama`, `nisn`, `kategori`) VALUES
(1, 'Asala', 10001, 'A'),
(2, 'Budi', 10002, 'A'),
(3, 'Citra', 10003, 'A'),
(4, 'Dewi', 10004, 'A'),
(5, 'Eko', 10005, 'A'),
(6, 'Fanny', 10006, 'A'),
(7, 'Gina', 10007, 'A'),
(8, 'Hendra', 10008, 'A'),
(9, 'Intan', 10009, 'A'),
(10, 'Joko', 10010, 'A'),
(11, 'Anna', 20001, 'B'),
(12, 'Beni', 20002, 'B'),
(13, 'Cindy', 20003, 'B'),
(14, 'Dino', 20004, 'B'),
(15, 'Elma', 20005, 'B'),
(16, 'Fajar', 20006, 'B'),
(17, 'Gina', 20007, 'B'),
(18, 'Hendra', 20008, 'B'),
(19, 'Indah', 20009, 'B'),
(20, 'Jaya', 20010, 'B'),
(21, 'Ari', 30001, 'C'),
(22, 'Bima', 30002, 'C'),
(23, 'Celia', 30003, 'C'),
(24, 'Diana', 30004, 'C'),
(25, 'Erik', 30005, 'C'),
(26, 'Fahmi', 30006, 'C'),
(27, 'Gita', 30007, 'C'),
(28, 'Hari', 30008, 'C'),
(29, 'Ika', 30009, 'C'),
(30, 'Juli', 30010, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa4`
--

CREATE TABLE `siswa4` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kategori` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa4`
--

INSERT INTO `siswa4` (`id`, `nama`, `nisn`, `kategori`) VALUES
(1, 'Asala', 10001, 'A'),
(2, 'Budi', 10002, 'A'),
(3, 'Citra', 10003, 'A'),
(4, 'Dewi', 10004, 'A'),
(5, 'Eko', 10005, 'A'),
(6, 'Fanny', 10006, 'A'),
(7, 'Gina', 10007, 'A'),
(8, 'Hendra', 10008, 'A'),
(9, 'Intan', 10009, 'A'),
(10, 'Joko', 10010, 'A'),
(11, 'Anna', 20001, 'B'),
(12, 'Beni', 20002, 'B'),
(13, 'Cindy', 20003, 'B'),
(14, 'Dino', 20004, 'B'),
(15, 'Elma', 20005, 'B'),
(16, 'Fajar', 20006, 'B'),
(17, 'Gina', 20007, 'B'),
(18, 'Hendra', 20008, 'B'),
(19, 'Indah', 20009, 'B'),
(20, 'Jaya', 20010, 'B'),
(21, 'Ari', 30001, 'C'),
(22, 'Bima', 30002, 'C'),
(23, 'Celia', 30003, 'C'),
(24, 'Diana', 30004, 'C'),
(25, 'Erik', 30005, 'C'),
(26, 'Fahmi', 30006, 'C'),
(27, 'Gita', 30007, 'C'),
(28, 'Hari', 30008, 'C'),
(29, 'Ika', 30009, 'C'),
(30, 'Juli', 30010, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa5`
--

CREATE TABLE `siswa5` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kategori` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa5`
--

INSERT INTO `siswa5` (`id`, `nama`, `nisn`, `kategori`) VALUES
(1, 'Asala', 10001, 'A'),
(2, 'Budi', 10002, 'A'),
(3, 'Citra', 10003, 'A'),
(4, 'Dewi', 10004, 'A'),
(5, 'Eko', 10005, 'A'),
(6, 'Fanny', 10006, 'A'),
(7, 'Gina', 10007, 'A'),
(8, 'Hendra', 10008, 'A'),
(9, 'Intan', 10009, 'A'),
(10, 'Joko', 10010, 'A'),
(11, 'Anna', 20001, 'B'),
(12, 'Beni', 20002, 'B'),
(13, 'Cindy', 20003, 'B'),
(14, 'Dino', 20004, 'B'),
(15, 'Elma', 20005, 'B'),
(16, 'Fajar', 20006, 'B'),
(17, 'Gina', 20007, 'B'),
(18, 'Hendra', 20008, 'B'),
(19, 'Indah', 20009, 'B'),
(20, 'Jaya', 20010, 'B'),
(21, 'Ari', 30001, 'C'),
(22, 'Bima', 30002, 'C'),
(23, 'Celia', 30003, 'C'),
(24, 'Diana', 30004, 'C'),
(25, 'Erik', 30005, 'C'),
(26, 'Fahmi', 30006, 'C'),
(27, 'Gita', 30007, 'C'),
(28, 'Hari', 30008, 'C'),
(29, 'Ika', 30009, 'C'),
(30, 'Juli', 30010, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa6`
--

CREATE TABLE `siswa6` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kategori` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa6`
--

INSERT INTO `siswa6` (`id`, `nama`, `nisn`, `kategori`) VALUES
(1, 'Asala', 10001, 'A'),
(2, 'Budi', 10002, 'A'),
(3, 'Citra', 10003, 'A'),
(4, 'Dewi', 10004, 'A'),
(5, 'Eko', 10005, 'A'),
(6, 'Fanny', 10006, 'A'),
(7, 'Gina', 10007, 'A'),
(8, 'Hendra', 10008, 'A'),
(9, 'Intan', 10009, 'A'),
(10, 'Joko', 10010, 'A'),
(11, 'Anna', 20001, 'B'),
(12, 'Beni', 20002, 'B'),
(13, 'Cindy', 20003, 'B'),
(14, 'Dino', 20004, 'B'),
(15, 'Elma', 20005, 'B'),
(16, 'Fajar', 20006, 'B'),
(17, 'Gina', 20007, 'B'),
(18, 'Hendra', 20008, 'B'),
(19, 'Indah', 20009, 'B'),
(20, 'Jaya', 20010, 'B'),
(21, 'Ari', 30001, 'C'),
(22, 'Bima', 30002, 'C'),
(23, 'Celia', 30003, 'C'),
(24, 'Diana', 30004, 'C'),
(25, 'Erik', 30005, 'C'),
(26, 'Fahmi', 30006, 'C'),
(27, 'Gita', 30007, 'C'),
(28, 'Hari', 30008, 'C'),
(29, 'Ika', 30009, 'C'),
(30, 'Juli', 30010, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tautan`
--

CREATE TABLE `tautan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tautan`
--

INSERT INTO `tautan` (`id`, `nama`, `link`) VALUES
(1, 'bintang', 'https://www.sdnbandarharjo02.dikdas.semarangkota.go.id/'),
(2, 'Berita Terkini Semarang', 'https://www.suarasemarang.com/berita-terkini-semarang'),
(3, 'Kegiatan Sekolah di Semarang', 'https://www.beritasemarang.com/kegiatan-sekolah-semarang'),
(4, 'Pemilu 2024 di Semarang', 'https://www.suarasemarang.com/pemilu-semarang-2024'),
(5, 'Perkembangan Infrastruktur Semarang', 'https://www.beritasemarang.com/perkembangan-infrastruktur-semarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_pembelajaran`
--

CREATE TABLE `video_pembelajaran` (
  `id` int(11) NOT NULL,
  `link_youtube` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori` (`id`);

--
-- Indeks untuk tabel `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_sekolah2`
--
ALTER TABLE `profil_sekolah2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sarana_prasarana`
--
ALTER TABLE `sarana_prasarana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa1`
--
ALTER TABLE `siswa1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa2`
--
ALTER TABLE `siswa2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa3`
--
ALTER TABLE `siswa3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa4`
--
ALTER TABLE `siswa4`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa5`
--
ALTER TABLE `siswa5`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa6`
--
ALTER TABLE `siswa6`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tautan`
--
ALTER TABLE `tautan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `video_pembelajaran`
--
ALTER TABLE `video_pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_sekolah2`
--
ALTER TABLE `profil_sekolah2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sarana_prasarana`
--
ALTER TABLE `sarana_prasarana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `siswa1`
--
ALTER TABLE `siswa1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `siswa2`
--
ALTER TABLE `siswa2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT untuk tabel `siswa3`
--
ALTER TABLE `siswa3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `siswa4`
--
ALTER TABLE `siswa4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `siswa5`
--
ALTER TABLE `siswa5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `siswa6`
--
ALTER TABLE `siswa6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tautan`
--
ALTER TABLE `tautan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `video_pembelajaran`
--
ALTER TABLE `video_pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
