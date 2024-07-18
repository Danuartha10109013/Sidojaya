-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 10:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidojaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `nama_aboutus` varchar(50) NOT NULL,
  `no_telpon` varchar(12) NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `nama_aboutus`, `no_telpon`, `nama_perusahaan`, `keterangan`) VALUES
(1, 'subanggateway@gmail.com', '088102322852', 'Subang Gateway', 'Subang gateway sebuah perusahaan yang bergerak di bidang teknologi yang menyediakan layanan untuk pembuatan sistem informasi berbasis website. Subang gateway berdiri di subang pada tahun 2024');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(50) NOT NULL DEFAULT '',
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` text NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama_event`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `id_wisata`) VALUES
(4, 'Memetik anggur bersama pak onii', '2024-07-16', '2024-08-16', 'Event limited', 2),
(5, 'Camp ceria', '2024-02-11', '2024-02-12', 'Menyediakan spot live music, bazzar, dan acara menarik lainnya.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` char(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama_fasilitas`) VALUES
(2, 'Kamar Mandi'),
(3, 'Parkiran'),
(4, 'Mushola'),
(5, 'Rumah Makan'),
(6, 'Selfie Area'),
(7, 'Sewa Alat');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) DEFAULT NULL,
  `nama_gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `id_wisata`, `nama_gambar`) VALUES
(1, 1, 'asdfad'),
(5, 4, 'batukapur.jpg'),
(13, 2, 'tamananggur.jpg'),
(15, 5, 'pw.jpg'),
(17, 20, 'Wisata-di-Subang-Curug-Cileat-Shutterstock.webp'),
(18, 22, 'Wisata-di-Subang-Curug-Cileat-Shutterstock (1).webp'),
(19, 33, 'jembatan lori.jpg'),
(20, 34, 'batik ecoprint.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`id`, `nama_kategori`) VALUES
(5, 'Wisata Sejarah'),
(6, 'Wisata Gunung dan Perbukitan'),
(19, 'Wisata Keluarga'),
(20, 'Wisata Buatan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_09_124953_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `status` enum('Unpaid','Paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_tiket` int(10) DEFAULT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `qty`, `total_price`, `status`, `created_at`, `updated_at`, `id_tiket`, `id_wisata`) VALUES
(29, 'ica', 'fsaasfasf', '0881023228529', 2, 200000, 'Unpaid', '2024-05-10 07:35:02', '2024-05-10 07:35:02', 1, 2),
(96, 'ica', 'asdasd', '0881023228529', 2, 200000, 'Unpaid', '2024-05-14 20:50:15', '2024-05-14 20:50:15', 1, 0),
(97, 'asep', 'dasdasd', '123', 2, 30000, 'Unpaid', '2024-05-14 21:04:38', '2024-05-14 21:04:38', 0, 0),
(98, 'asep', 'dasdasd', '123', 2, 30000, 'Unpaid', '2024-05-14 21:05:58', '2024-05-14 21:05:58', 0, 0),
(99, 'asep', 'dasdasd', '123', 2, 20000, 'Unpaid', '2024-05-14 21:06:06', '2024-05-14 21:06:06', 1, 0),
(100, 'ica', 'asdasd', '123123', 3, 30000, 'Unpaid', '2024-05-15 19:04:16', '2024-05-15 19:04:16', 1, 0),
(101, 'ahong', 'dsgdsbgsd', '0881023228529', 4, 60000, 'Unpaid', '2024-05-15 19:05:15', '2024-05-15 19:05:15', 0, 0),
(102, 'asep', 'asfasf', '0881023228529', 3, 30000, 'Unpaid', '2024-05-17 01:31:16', '2024-05-17 01:31:16', 1, 0),
(103, 'asep', 'sdfs', '0881023228529', 4, 40000, 'Unpaid', '2024-05-17 01:33:08', '2024-05-17 01:33:08', 1, 0),
(104, 'asep', 'dsgds', '0881023228529', 3, 0, 'Unpaid', NULL, NULL, NULL, 0),
(105, 'asep', 'dsgds', '0881023228529', 3, 0, 'Unpaid', NULL, NULL, NULL, 0),
(106, 'asep', 'dsgds', '0881023228529', 3, 0, 'Unpaid', NULL, NULL, NULL, 0),
(107, '123', '123', '123', 123, 0, 'Unpaid', NULL, NULL, NULL, 0),
(108, 'asep', 'jjbknkj', '0881023228529', 3, 0, 'Unpaid', NULL, NULL, NULL, 0),
(109, 'asep', 'vhgvhgvh', '0881023228529', 3, 30000, 'Unpaid', NULL, NULL, NULL, 0),
(110, '123', '123', '123', 123, 0, 'Unpaid', NULL, NULL, NULL, 0),
(111, '123', '123', '123', 123, 1230000, 'Unpaid', NULL, NULL, NULL, 0),
(112, '123', '123', '123', 123, 1845000, 'Unpaid', NULL, NULL, NULL, 0),
(113, '123', '123', '123', 1, 15000, 'Unpaid', NULL, NULL, NULL, 0),
(114, '123', '123', '123', 1, 15000, 'Unpaid', NULL, NULL, NULL, 0),
(115, 'ALex', 'Subang', '123', 1, 10000, 'Unpaid', NULL, NULL, NULL, 0),
(116, 'hari', 'dsfds', '123', 2, 20000, 'Unpaid', NULL, NULL, NULL, 0),
(117, 'asep', 'dsg', '0881023228529', 3, 30000, 'Unpaid', NULL, NULL, NULL, 0),
(118, 'asep', 'dfdsf', '0881023228529', 2, 40000, 'Unpaid', NULL, NULL, NULL, 0),
(119, 'kahim', 'asfasfa', '0881023228529', 3, 30000, 'Unpaid', NULL, NULL, NULL, 0),
(120, 'kahim', 'asfasfa', '0881023228529', 3, 60000, 'Unpaid', NULL, NULL, NULL, 0),
(121, 'kahim', 'asfasfa', '0881023228529', 3, 30000, 'Unpaid', NULL, NULL, NULL, 0),
(122, 'kahim', 'asfasfa', '0881023228529', 3, 60000, 'Unpaid', NULL, NULL, NULL, 0),
(123, 'ASEP SAEPULOH', 'asfasfsf', '123', 4, 40000, 'Unpaid', NULL, NULL, NULL, 0),
(124, 'asep', 'dsfsf', '0881023228529', 2, 20000, 'Unpaid', NULL, NULL, NULL, 0),
(125, 'asep', 'dsfsf', '0881023228529', 2, 20000, 'Unpaid', NULL, NULL, NULL, 0),
(126, 'asep', 'adsnfkjdsf', '0881023228529', 2, 20000, 'Unpaid', NULL, NULL, NULL, 0),
(127, 'asep', 'adsnfkjdsf', '0881023228529', 2, 20000, 'Unpaid', NULL, NULL, NULL, 0),
(128, 'asep', 'adsnfkjdsf', '0881023228529', 2, 20000, 'Unpaid', NULL, NULL, NULL, 0),
(129, '2', '1', '3', 1, 20000, 'Unpaid', NULL, NULL, NULL, 0),
(130, '2', '1', '3', 1, 10000, 'Unpaid', NULL, NULL, NULL, 0),
(131, '2', '1', '3', 1, 10000, 'Unpaid', NULL, NULL, NULL, 0),
(132, '2', '1', '3', 1, 15000, 'Unpaid', NULL, NULL, NULL, 0),
(133, '2', '1', '3', 1, 20000, 'Unpaid', NULL, NULL, NULL, 0),
(139, 'ASEP SAEPULOH', 'safas', '123', 2, 40000, 'Unpaid', NULL, NULL, 1, 0),
(140, 'hapis', 'asfasffsa', '0881023228529', 2, 30000, 'Unpaid', NULL, NULL, 6, 0),
(141, 'ica', 'dfdf', '9999999', 3, 9000, 'Unpaid', NULL, NULL, 7, 4),
(142, 'ica', 'dfdf', '9999999', 3, 9000, 'Unpaid', NULL, NULL, 7, 4),
(143, 'hari', 'sdgds', '33', 2, 40000, 'Unpaid', NULL, NULL, 1, 2),
(144, '123', 'sdfds', '123123', 2, 6000, 'Unpaid', NULL, NULL, 7, 4),
(145, 'hari', 'sdfsd', '123123', 3, 60000, 'Unpaid', NULL, NULL, 1, 2),
(146, 'ica', 'dsgsdf', '0881023228529', 2, 40000, 'Unpaid', NULL, NULL, 1, 2),
(147, 'diah', 'subang', '0881023228529', 1, 15000, 'Unpaid', NULL, NULL, 6, 2),
(148, 'asep', 'hyiuhki', '0813121064564', 2, 20000, 'Unpaid', NULL, NULL, 1, 2),
(149, 'ica', 'subang', '0976654333', 2, 30000, 'Unpaid', NULL, NULL, 7, 4),
(150, 'icaa', 'gfdfhc', '08325563256', 2, 20000, 'Unpaid', NULL, NULL, 12, 4),
(151, 'a desto', 'decdedced', '0881023228529', 2, 20000, 'Unpaid', NULL, NULL, 1, 2),
(152, 'asepppp', 'fvfdvdfvd', '0881023228529', 2, 30000, 'Unpaid', NULL, NULL, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id` int(20) NOT NULL,
  `nama_penginapan` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id`, `nama_penginapan`, `harga`, `id_wisata`) VALUES
(1, 'dewasa', 20000, 2),
(13, 'heheheh', 20202020, 20),
(14, 'weekend', 250000, 4),
(16, 'weekday', 200000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(20) NOT NULL,
  `rating` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rating`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_hari` int(20) NOT NULL,
  `total_bayar` bigint(20) NOT NULL,
  `id_penginapan` int(20) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `nama`, `phone`, `tanggal`, `jumlah_hari`, `total_bayar`, `id_penginapan`, `id_wisata`) VALUES
(26, 'asep', '123123', '2024-05-26', 2, 30000, 1, 0),
(27, 'asep', '123123', '2024-05-26', 2, 20000, 1, 0),
(28, 'asep', '123123', '2024-05-26', 2, 20000, 1, 0),
(29, 'asep', '123123', '2024-05-26', 2, 20000, 1, 0),
(30, 'asep', '123123', '2024-05-26', 2, 20000, 1, 0),
(31, 'asep', '123', '2024-05-27', 2, 40000, 1, 0),
(32, 'ica', '0881023228529', '2024-05-27', 2, 20000, 1, 0),
(33, 'ica', '123123', '2024-05-28', 2, 40000, 14, 0),
(34, 'asep', '123123', '2024-05-28', 3, 60000, 14, 2),
(35, 'asep', '123123', '2024-07-03', 2, 40000, 1, 2),
(36, 'asep', '123123', '2024-07-03', 2, 40000, 1, 2),
(37, 'diah', '0881023228529', '2024-06-14', 3, 60000, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(20) NOT NULL,
  `review` text NOT NULL,
  `id_ratings` int(20) NOT NULL,
  `id_wisata` int(20) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `id_ratings`, `id_wisata`, `id_user`) VALUES
(1, 'gdsgds', 1, 22, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(10) NOT NULL,
  `nama_tiket` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `nama_tiket`, `harga`, `id_wisata`) VALUES
(1, 'anak-anak', 10000, 2),
(6, 'dewasa', 15000, 2),
(7, 'weekend', 15000, 4),
(12, 'weekday', 10000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(20) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `rating` int(20) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `nama`, `deskripsi`, `rating`, `id_wisata`) VALUES
(1, 'asep', 'asfjaskfaskf', 4, 2),
(2, 'rido', 'asfkaskfnask', 4, 0),
(3, 'rido', 'sdfsfs', 5, 0),
(4, 'user', 'aku senang sekali', 5, 0),
(5, 'user', 'njsanjsfa', 5, 0),
(6, 'user', 'asfs', 1, 0),
(7, 'user', 'menarik sekali', 5, 0),
(8, 'user', 'kerenn', 5, 0),
(9, 'user', 'kerenn', 5, 0),
(10, 'user', 'buset', 5, 0),
(11, 'user', 'buset', 5, 0),
(12, 'user', 'asdsa', 4, 0),
(13, 'user', 'iyah', 5, 0),
(14, 'user', 'dia', 4, 0),
(15, 'user', 'okey', 5, 0),
(16, 'user', 'kita', 4, 0),
(17, 'user', 'bagus sekaliii', 5, 0),
(18, 'user', 'cc', 4, 2),
(19, 'user', 'epul', 5, 2),
(20, 'user', 'seger', 5, 20),
(21, 'aat', 'keren', 4, 4),
(22, 'user', 'kerennnn', 5, 2),
(23, 'diah', 'bagus', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('pengunjung','adminwisata','superadmin','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pengunjung',
  `acces_wisata` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `acces_wisata`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'ASEP SAEPULOH', 'saepuloh@gmail.com', NULL, '$2y$10$oa93/TUxOVQDOALmoeZCIeTBv.vy3gb7WzdLCjv.dQqAHro8SXCP.', 'adminwisata', 'cijuhung', NULL, '2024-05-02 09:46:39', '2024-05-02 09:46:39'),
(29, 'pengunjung', 'pengunjung@gmail.com', NULL, '$2y$10$hpgYWYamMfF0vnblW0zpOue.cv9Z6lAUcmFTqC4B64LTcoCAq0U26', 'pengunjung', '0', NULL, '2024-05-05 19:34:22', '2024-05-05 19:34:22'),
(30, 'adminwisata', 'adminwisata@gmail.com', NULL, '$2y$10$L9tYivWYZSFWKWS3MaDpiun0ojtGblBZy70VolK9hM/1GAL9d0E5i', 'adminwisata', 'Taman anggur kukulu subang', NULL, '2024-05-05 19:35:03', '2024-05-05 19:35:03'),
(31, 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$w9txvazcue6h9WIZXdBUweSoYe4017mhZx3AN3LDQLYSb4k8HutwS', 'superadmin', '0', NULL, '2024-05-05 19:36:05', '2024-05-05 19:36:05'),
(32, 'user', 'user@gmail.com', NULL, '$2y$10$VYidm448360p69p5/rAOk.0UbQaFVzNDThyIhh/7SJ1.TZf3NiFne', 'pengunjung', '0', NULL, '2024-05-05 19:38:53', '2024-05-05 19:38:53'),
(33, 'polsub', 'polsub@gmail.com', NULL, '$2y$10$PkihDEsEmncKhRcAt98wsO51bMsDkD34tklBww1XtbOG1OW9hA52m', 'adminwisata', 'Kolam Renang Three Stars', NULL, '2024-05-06 00:06:00', '2024-05-06 00:06:00'),
(34, 'adsad', 'diah@gmail.com', NULL, '$2y$10$I8S0CkftHmWXi4UxdVuAPObW14V/L.BkhaDArjUWzxO95hP3Bds0a', 'pengunjung', '0', NULL, '2024-05-07 09:45:26', '2024-05-07 09:45:26'),
(35, 'andika', 'andika@gmail.com', NULL, '$2y$10$VO4gyVu5/EvWC.jSF14C0uXTmrUrbG8vOc1.Jf19a6rUVUl5/viFu', 'adminwisata', '0', NULL, '2024-05-07 20:39:10', '2024-05-07 20:39:10'),
(36, 'andika', 'andika1@gmail.com', NULL, '$2y$10$KXr/48.vQ2L.nPkjsRvWou4zKMX53hUfUPBPU9I2s47oyYV/mNFB2', 'pengunjung', '0', NULL, '2024-05-07 20:42:25', '2024-05-07 20:42:25'),
(37, 'andika', 'andika22@gmail.com', NULL, '$2y$10$6vchZJXTEGgCQ3scFSdj/.c.qFiFOnhfdkgeVThg4MH1s3hNYFm8q', 'adminwisata', '0', NULL, '2024-05-07 20:43:52', '2024-05-07 20:43:52'),
(38, 'andika11', 'andika11@gmail.com', NULL, '$2y$10$QA7hEidSAfogZ6QWg6Wy6OPwshTRa4LF8po2dp2WtF41BYALysXm6', 'pengunjung', '0', NULL, '2024-05-07 20:47:57', '2024-05-07 20:47:57'),
(39, 'asep', 'asep123@gmail.com', NULL, '$2y$10$VqP/RyZ/TAmIgSGcJcWW6OgoZ1nqdQSLXcVK9a8.NasZBLMQyCyEi', 'pengunjung', '0', NULL, '2024-05-07 20:52:29', '2024-05-07 20:52:29'),
(40, 'ica', 'ica@gmail.com', NULL, '$2y$10$g/Ui8GUdAQCBbubp9bqsIeA7ZJRkdweV71auv0fIE.WFv8LUb4n1q', 'pengunjung', '0', NULL, '2024-05-13 21:24:25', '2024-05-13 21:24:25'),
(42, 'batukapur', 'batukapur@gmail.com', NULL, '$2y$10$Hk0SCtLdjHpw8yecO2cGDeEnJA67mQSwQ0MmbEp5YCi4yPvWJBdl.', 'adminwisata', 'Pemandian Air Panas Batu Kapur', NULL, '2024-05-19 19:20:12', '2024-05-19 19:20:12'),
(43, 'tsabit', 'tsabit@gmail.com', NULL, '$2y$10$/ip2mWkkHnW3ge6f4qnSTuV/JtypWcUxQ4XzSZ/.9ks/sTrdesT4e', 'adminwisata', 'asdas', NULL, '2024-05-26 09:45:41', '2024-05-26 09:45:41'),
(44, 'tsabit', 'tsabitx@gmail.com', NULL, '$2y$10$3BqFwGijJt3X/iBE4iMtaO3WL0VsX7jFcqrlmUAeGatzLapfES/Ba', 'pengunjung', NULL, NULL, '2024-05-26 10:08:14', '2024-05-26 10:08:14'),
(45, 'admincileat', 'admincileat@gmail.com', NULL, '$2y$10$7Cfme.kSeQs1ILUS5xWLMO4XpjLo.8/UW6mRb.IyzPjGdEx7l1n7i', 'adminwisata', 'curug cileat', NULL, '2024-05-26 10:11:01', '2024-05-26 10:11:01'),
(46, 'farhan', 'farhan@gmail.com', NULL, '$2y$10$Kow9V2bNvjGQIPYeOEpvI.K8m3z0HJgB2VVTs.m1yAkVB0Xp1WY7u', 'pengunjung', NULL, NULL, '2024-05-26 10:31:55', '2024-05-26 10:31:55'),
(47, 'farhan', 'farhan1@gmail.com', NULL, '$2y$10$KSSLV3e2jjsX/oI50NlJeu5YeUdNpUHNm.bb65kWHZ3hsGbbe4JgC', 'adminwisata', 'curug cileat', NULL, '2024-05-26 10:32:43', '2024-05-26 10:32:43'),
(48, 'polsub', 'polsub22@gmail.com', NULL, '$2y$10$YphaKXFVDhwxFgi6CZuhvutqUG.d7qmO0OK8mb67cVqOx0JlxDM7G', 'pengunjung', NULL, NULL, '2024-05-27 22:57:15', '2024-05-27 22:57:15'),
(49, 'adminpamoyanan', 'adminpamoyanan@gmail.com', NULL, '$2y$10$G0sdGlfW0.fZzOMk3pL/.eY2L/OTEHXDGGcau2G/MWw5jZ0WDLZGq', 'adminwisata', 'bukit pamoyanan', NULL, '2024-05-28 00:04:53', '2024-05-28 00:04:53'),
(50, 'ccc', 'cccc@gmail.com', NULL, '$2y$10$kMBDlL1g0OMcgbeOejQP4uQnfvVVNIodhB9gQEWRfPGBWvgTaJwDW', 'adminwisata', 'cc', NULL, '2024-06-05 04:29:01', '2024-06-05 04:29:01'),
(54, 'cukurukuk', 'cukuruk@gmail.com', NULL, '$2y$10$e4Hqhe2MGU3ktStjJZIWm.o8pDejFleW6QW06MRyiFrmw3mwGT4Ya', 'adminwisata', 'cukuruk', NULL, '2024-06-05 06:21:20', '2024-06-05 06:21:20'),
(55, 'rizki', 'rizki@gmail.com', NULL, '$2y$10$wgKUcRI6/u8Z8gD0tDPOCOXsRe5mp4V/B7k45ezEcT7tZZoqUWMUi', 'pengunjung', NULL, NULL, '2024-06-08 11:52:37', '2024-06-08 11:52:37'),
(56, 'aat', 'aat@gmail.com', NULL, '$2y$10$gz7TXjQlFxjUoOwUG7TtYeGMOLnT4m8/ot86MpAwEvHtncpMK1Hq.', 'pengunjung', NULL, NULL, '2024-06-08 11:58:39', '2024-06-08 11:58:39'),
(57, 'karo', 'karo@gmail.com', NULL, '$2y$10$yCX7Qg7FikhbmPQa5PZVuOK5iI9Bp9BLY7q.jAdEChY9z5ddi4Giy', 'adminwisata', 'karo', NULL, '2024-06-08 12:25:20', '2024-06-08 12:25:20'),
(58, 'asep', 'asep@gmail.com', NULL, '$2y$10$bortSveNCnkRH4oSzCXTb.xvkpfXxFzv/DUix4Obc3Ru1tuDq2BTK', 'adminwisata', 'asep', NULL, '2024-06-10 00:12:30', '2024-06-10 00:12:30'),
(59, 'tsabit', 'tsabitt@gmail.com', NULL, '$2y$10$QkIWnK4tqhTTKynnRDUtvuH9lvmYK84fKKXaPTFnuJakywRIys/gS', 'adminwisata', 'tsabit_farmhouse', NULL, '2024-06-10 00:33:06', '2024-06-10 00:33:06'),
(60, 'fadlil', 'fadlil@gmail.com', NULL, '$2y$10$KgTBjbatXujo705bAJBd5eY7WvpRFwb0Pt5eGavb4n8VDQnFpDA.y', 'pengunjung', NULL, NULL, '2024-06-10 23:19:39', '2024-06-10 23:19:39'),
(61, 'abdul', 'abdul@gmail.com', NULL, '$2y$10$QbMCDaIFpMgdAh5bp7DEjenZieEuU.rRKlXarvGMBRxH39G6UdIa2', 'adminwisata', 'abdul', NULL, '2024-06-10 23:26:23', '2024-06-10 23:26:23'),
(62, 'sep', 'sep@gmail.com', NULL, '$2y$10$vTeMKAxgxhlgNRk9KxWooe2azleGWoN8S1dxu/s8t/RDV3WyhbOc6', 'adminwisata', 'sep', NULL, '2024-06-10 23:29:34', '2024-06-10 23:29:34'),
(63, 'diah', 'diahrahman@gmail.com', NULL, '$2y$10$2rql5zzFO7tIQBKssfi5aOpnc/10SeQTGCO0XZX1NXpdsv55Pji4S', 'pengunjung', NULL, NULL, '2024-06-13 18:59:02', '2024-06-13 18:59:02'),
(64, 'adminjembatanlori', 'adminjembatanlori@gmail.com', NULL, '$2y$10$bCmIKfuM1x45A4tfDnNxd.hmCT1c6hhXEY7tY7SOw7R1eQmDVn8zq', 'adminwisata', 'Jembatan Lori', NULL, '2024-07-16 00:26:47', '2024-07-16 00:26:47'),
(65, 'adminbatik', 'adminbatik@gmail.com', NULL, '$2y$10$eRlgwnj4NYGDsD5f2Jw51.WfhCDRjinWwoswj1aKTrvl1qq33HkJK', 'adminwisata', 'Batik Ecoprint', NULL, '2024-07-16 01:13:24', '2024-07-16 01:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL DEFAULT '',
  `harga_tiket` int(11) NOT NULL DEFAULT 0,
  `kontak_pengelola` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `fasilitas` varchar(250) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `gmaps` varchar(50) NOT NULL DEFAULT '',
  `id_kategori` int(11) DEFAULT NULL,
  `id_galeri` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `bukti_pengelola` varchar(100) NOT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `name`, `email`, `password`, `nama_wisata`, `harga_tiket`, `kontak_pengelola`, `alamat`, `fasilitas`, `deskripsi`, `gmaps`, `id_kategori`, `id_galeri`, `id_user`, `bukti_pengelola`, `status`) VALUES
(2, '', '', '', 'Taman anggur kukulu subang', 10000, '081343316941', 'Kp. Kukulu 1, RT.22/RW.06, Balingbing, Kec. Pagaden Bar., Kabupaten Subang, Jawa Barat', 'Kamar Mandi,Parkiran,Mushola,Rumah Makan', 'Taman anggur kukulu subang merupakan tempat wisata yang menyediakan berbagai spot wisata yang menarik. Dimulai dari taman anggur, rumah adat sunda, sisinga\'an, dan kolam renang.', '-6.489627911503402, 107.74068392364924', 6, NULL, 30, '', 'ya'),
(4, '', '', '', 'Pemandian Air Panas Batu Kapur', 10000, '081343316931', 'Desa Curug Agung. Kecamatan Sagalaherang, Kabupaten Subang, Provinsi Jawa Barat.', 'Kamar Mandi,Parkiran,Mushola', 'Nama lain dari Curug Agung adalah Curug Batu Kapur. Dilokasi ini ada pemandian air panas dengan temperatur sekitar 40-45 derajat celcius. Terletak di Desa Curug Agung. Kecamatan Sagalaherang, Kabupaten Subang, Provinsi Jawa Barat.', '-6.639864344129977, 107.66836499481586', 6, NULL, 42, '', 'ya'),
(5, '', '', '', 'Kolam Renang Three Stars', 15000, '0878-2816-3769', 'Jl. Otto Iskandardinata No.222, Karanganyar, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'Kamar Mandi,Parkiran,Mushola,Rumah Makan', 'Kolam Renang Three Stars adalah sebuah kolam renang atau lokasi berenang yang berlokasi di Karanganyar, Subang, Kabupaten Subang, Jawa Barat.', '-6.557914871312085, 107.77246710838004', 19, NULL, 33, '', 'ya'),
(20, '', '', '', 'Curug Cileat', 15000, '081312107043', 'Cibogo, Cupunagara, Gardusayang, Kec. Cisalak, Kabupaten Subang, Jawa Barat', 'Kamar Mandi,Parkiran,Mushola', 'Curug Cileat merupakan tempat wisata andalan yang terdapat di Kabupaten Subang, Jawa Barat. Curug Cileat memiliki ketinggian sekitar 100 meter dan menjadi curug tertinggi yang ada di Subang', '-6.781324162248865, 107.75195058891747', 6, NULL, 45, '', 'ya'),
(22, '', '', '', 'Bukit Pamoyanan', 20000, '089524811112', 'Kawungluwuk, Kec. Tanjungsiang, Kabupaten Subang, Jawa Barat', 'Kamar Mandi,Parkiran,Mushola', 'Bukit berhutan yang populer untuk kemah, terkenal dengan panorama matahari terbit & lautan awan di pagi hari.', '-6.753090707117893, 107.79525987399562', 6, NULL, 49, '', 'ya'),
(33, 'adminjembatanlori', 'adminjembatanlori@gmail.com', '$2y$10$bCmIKfuM1x45A4tfDnNxd.hmCT1c6hhXEY7tY7SOw7R1eQmDVn8zq', 'Jembatan Lori', 10000, '085159694425', 'Jl. Desa Sidajaya - Desa Tanjung, Kecamatan Cipunagara, Kabupaten Subang', 'Selfie Area', 'Jembatan Lori atau sekarang dikenal dengan sebutan Jembatan Pelangi ditetapkan sebagai Situs Sejarah sejak 29 Desember 2021.', '-6.495609534325585, 107.88933096614063', 20, NULL, 64, 'Data Ulasan  Laravel.pdf', 'ya'),
(34, 'adminbatik', 'adminbatik@gmail.com', '$2y$10$eRlgwnj4NYGDsD5f2Jw51.WfhCDRjinWwoswj1aKTrvl1qq33HkJK', 'Batik Ecoprint', 100000, '085159694425', 'Jl. Desa Sidajaya - Desa Tanjung, Kecamatan Cipunagara, Kabupaten Subang', 'Kamar Mandi,Mushola,Sewa Alat', 'Batik ecoprint merupakan produk lokal yang dikembangkan oleh masyarakat sebagai kerajinan sekaligus fashion karna motifnya yang beragam, setiap helai kain atau pun baju ecoprint memiliki motif dan warna yang unik, desain ecoprint sangatlah bisa untuk mengikuti perkembangan zaman', '-6.505011712386206, 107.89558430786575', 20, NULL, 65, 'Poster kelompok 4 (4).pdf', 'ya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK_event_wisata` (`id_wisata`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tiket` (`id_tiket`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE;

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penginapan` (`id_penginapan`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rating` (`id_ratings`),
  ADD KEY `id_wisata` (`id_wisata`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_kategori` (`id_kategori`) USING BTREE,
  ADD KEY `id_galeri` (`id_galeri`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_event_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`);

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_penginapan` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
