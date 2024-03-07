-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2024 pada 10.49
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annprint`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_pesan` bigint(20) UNSIGNED NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_pesan`, `from_id`, `to_id`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'halo admin', 'on read', '2022-11-03 16:02:30', '2022-11-03 18:59:55'),
(2, 3, 1, 'admin tolong', 'on read', '2022-11-03 16:23:31', '2022-11-03 18:51:06'),
(3, 3, 1, 'tes', 'on read', '2022-11-03 16:31:32', '2022-11-03 18:51:06'),
(4, 3, 1, 'mang', 'on read', '2022-11-03 16:59:31', '2022-11-03 18:51:06'),
(5, 4, 1, 'bang', 'on read', '2022-11-03 17:16:10', '2024-01-12 09:09:15'),
(12, 1, 4, 'hai monica', 'on read', '2022-11-03 17:57:01', '2022-11-18 14:28:11'),
(13, 1, 3, 'iya rizki i love you', 'on read', '2022-11-03 18:03:16', '2022-11-03 19:06:08'),
(14, 3, 1, 'bang minta tolong', 'on read', '2022-11-03 18:18:42', '2022-11-03 18:51:06'),
(15, 1, 2, 'iya ada apa', 'off read', '2022-11-03 18:24:36', '2022-11-03 18:24:36'),
(16, 3, 1, 'kenapa pesanan saya blum di antar ?', 'on read', '2022-11-03 18:34:09', '2022-11-03 18:51:06'),
(17, 1, 4, 'bang saya menangis', 'on read', '2022-11-03 18:35:01', '2022-11-18 14:28:11'),
(18, 1, 3, 'baik mohon d tunggu', 'on read', '2022-11-03 18:35:35', '2022-11-03 19:06:08'),
(19, 1, 4, 'kenapa menangis', 'on read', '2022-11-03 18:50:57', '2022-11-18 14:28:11'),
(20, 1, 4, 'sfsfd', 'off read', '2024-01-12 09:09:14', '2024-01-12 09:09:14'),
(21, 6, 1, 'p balap', 'on read', '2024-01-12 09:16:16', '2024-01-19 07:07:39'),
(22, 1, 6, 'ghghg', 'on read', '2024-01-12 09:18:04', '2024-01-19 07:05:44'),
(23, 6, 1, 'halo dek', 'on read', '2024-01-12 09:52:22', '2024-01-19 07:07:39'),
(24, 1, 6, 'okedek', 'on read', '2024-01-12 09:52:59', '2024-01-19 07:05:44'),
(25, 1, 6, 'ok', 'on read', '2024-01-12 09:53:05', '2024-01-19 07:05:44'),
(26, 6, 1, 'ok', 'on read', '2024-01-19 07:05:44', '2024-01-19 07:07:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `jenis_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`, `created_at`, `updated_at`) VALUES
(1, 't-shirt', '2022-11-03 19:44:29', '2022-11-03 19:44:29'),
(2, 'polo shirt', '2022-11-03 19:44:39', '2022-11-03 19:44:39'),
(3, 'jaket / hoodie', '2022-11-03 19:44:51', '2022-11-03 19:44:51'),
(4, 'jersey', '2022-11-03 19:44:57', '2022-11-03 19:44:57'),
(5, 'goodie bag', '2022-11-03 19:45:04', '2022-11-03 19:45:04'),
(6, 'Baju rayo', '2024-01-12 09:56:42', '2024-01-12 09:56:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_produk`, `total`, `created_at`, `updated_at`) VALUES
(16, 6, 8, 6, '2024-01-19 06:43:26', '2024-01-19 06:43:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `komentar_produk` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_pesanan`, `id_user`, `id_produk`, `komentar_produk`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 2, 'Produk Memuaskan Sekali', '2022-11-03 20:20:14', '2022-11-03 20:20:14'),
(2, 2, 3, 4, 'Produk Memuaskan Sekali', '2022-11-03 20:20:50', '2022-11-03 20:20:50'),
(3, 1, 2, 3, 'Produk Memuaskan Sekali', '2022-11-03 20:21:01', '2022-11-03 20:21:01'),
(4, 4, 5, 5, 'Produk Memuaskan Sekali', '2022-11-17 13:24:05', '2022-11-17 13:24:05'),
(5, 1, 4, 2, 'Produk Memuaskan Sekali', '2022-11-20 09:48:30', '2022-11-20 09:48:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2022_10_15_135218_create_kategori_table', 1),
(17, '2022_10_15_153539_create_variasi_table', 1),
(18, '2022_10_15_191158_create_sablon_table', 1),
(19, '2022_10_16_105812_create_produk_table', 1),
(20, '2022_10_17_091741_create_produknon_table', 1),
(21, '2022_10_26_214800_create_keranjang_table', 1),
(22, '2022_10_28_162803_create_user_alamat_table', 1),
(24, '2022_10_31_174230_create_rekening_table', 1),
(25, '2022_11_02_141155_create_komentar_table', 1),
(26, '2022_11_03_151758_create_chat_table', 1),
(30, '2022_10_29_000910_create_pesanan_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `variasi` varchar(255) DEFAULT NULL,
  `variasi_harga` varchar(255) DEFAULT NULL,
  `variasi_total` bigint(20) DEFAULT NULL,
  `sablon` varchar(255) DEFAULT NULL,
  `sablon_harga` varchar(255) DEFAULT NULL,
  `sablon_total` bigint(20) DEFAULT NULL,
  `note_sablon_variasi` text DEFAULT NULL,
  `bayar` bigint(20) DEFAULT NULL,
  `ongkir` bigint(20) DEFAULT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `no_resi` text DEFAULT NULL,
  `desain` text DEFAULT NULL,
  `request_user` text DEFAULT NULL,
  `total_dp` bigint(20) DEFAULT NULL,
  `bukti_bayar_dp` text DEFAULT NULL,
  `bukti_bayar_dp_lunas` text DEFAULT NULL,
  `dp_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tipe_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_produk`, `quantity`, `id_alamat`, `id_kota`, `variasi`, `variasi_harga`, `variasi_total`, `sablon`, `sablon_harga`, `sablon_total`, `note_sablon_variasi`, `bayar`, `ongkir`, `total_bayar`, `bukti_bayar`, `no_resi`, `desain`, `request_user`, `total_dp`, `bukti_bayar_dp`, `bukti_bayar_dp_lunas`, `dp_status`, `status`, `tipe_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 7, 3, 399, NULL, NULL, 0, NULL, NULL, 0, NULL, 595000, 10000, 605000, NULL, '123456789', NULL, NULL, NULL, 'bukti_bayar.jpeg', 'jne.jpeg', 'lunas', 'selesai', 'dp', '2022-11-18 16:47:25', '2022-11-20 09:48:30'),
(2, 2, 5, 6, 1, 62, NULL, NULL, 0, NULL, NULL, 0, NULL, 780000, 38000, 818000, 'bukti_bayar.jpeg', 'jhjhjh', NULL, NULL, NULL, NULL, NULL, NULL, 'Barang Dalam Pengiriman', 'lunas', '2022-11-18 21:46:03', '2024-01-12 09:53:48'),
(3, 6, 4, 6, 5, 318, 'ukuran 2xl,', '5000,', 5000, 'glow phosper,', '7000,', 7000, 'asdas', 600000, 46000, 658000, NULL, NULL, 'marapi.jpg', NULL, NULL, 'kawasakiinjafi.jpg', '6.webp', 'tagihan send', 'Pesanan Di Terima', 'dp', '2024-01-12 09:24:51', '2024-01-19 06:47:48'),
(4, 6, 5, 6, 5, 318, 'kantong,', '3000,', 3000, 'glow phosper,', '7000,', 7000, NULL, 780000, 46000, 836000, 'baju12.jpeg', '65645', 'bajuu.jpeg', NULL, NULL, NULL, NULL, NULL, 'Barang Dalam Pengiriman', 'lunas', '2024-01-12 09:48:37', '2024-01-19 07:10:15'),
(5, 6, 3, 9, 5, 318, 'ukuran 4xl,', '15000,', 15000, 'sparasi warna,', '10000,', 10000, 'Mantap gan', 675000, 92000, 792000, '6.webp', NULL, 'homeslide-.png', NULL, NULL, NULL, NULL, NULL, 'Pesanan Di Terima', 'lunas', '2024-01-19 06:44:42', '2024-01-19 07:09:59'),
(6, 6, 8, 6, 5, 318, NULL, NULL, 0, NULL, NULL, 0, NULL, 480000, 46000, 526000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'menunggu pembayaran', NULL, '2024-01-19 07:06:30', '2024-01-19 07:06:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `harga_produk1` varchar(255) DEFAULT NULL,
  `harga_produk2` varchar(255) DEFAULT NULL,
  `harga_produk3` varchar(255) DEFAULT NULL,
  `harga_produk4` varchar(255) DEFAULT NULL,
  `harga_produk5` varchar(255) DEFAULT NULL,
  `foto_produk1` varchar(255) DEFAULT NULL,
  `foto_produk2` varchar(255) DEFAULT NULL,
  `foto_produk3` varchar(255) DEFAULT NULL,
  `foto_produk4` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga_produk1`, `harga_produk2`, `harga_produk3`, `harga_produk4`, `harga_produk5`, `foto_produk1`, `foto_produk2`, `foto_produk3`, `foto_produk4`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'catton carded 30s', 1, ' 75000', ' 65000', ' 60000', ' 55000', ' 50000', 'ezgif-1-2f7af3090c.jpg', 'ezgif-1-3ba8c2cbfe.jpg', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-11-03 19:46:23', '2024-01-12 09:12:09'),
(2, 'catton spandex 30s', 1, ' 85000', ' 80000', ' 75000', ' 60000', ' 55000', 'ezgif-1-34d4db8abc.jpg', 'ezgif-1-d0e2c1e68d.jpg', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-11-03 19:47:22', '2022-11-03 19:47:22'),
(3, 'lacoste PE', 2, ' 75000', ' 70000', ' 68000', ' 62000', ' 60000', 'ezgif-2-af83ebdd26.jpg', 'ezgif-2-f625b68948.jpg', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-11-03 19:48:11', '2022-11-03 19:48:11'),
(4, 'lacoste cvc', 2, ' 100000', ' 95000', ' 90000', ' 85000', ' 78000', 'ezgif-2-23948b64e8.jpg', 'ezgif-2-af83ebdd26.jpg', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-11-03 19:49:22', '2022-11-03 19:49:22'),
(5, 'Fleece Polyester', 3, ' 130000', ' 125000', ' 120000', ' 100000', ' 98000', 'ezgif-1-3ba8c2cbfe.jpg', 'ezgif-1-34d4db8abc.jpg', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-11-03 19:50:33', '2022-11-03 19:50:33'),
(8, 'Baju Polos', 2, ' 80000', ' 70000', ' 60000', '', '', 'bajudistro.jpg', '1.jpg', '3.jpg', NULL, '<p>Baju dengan kulitas yang sangat mantap dan tidak akan anda temukan di tempat lain,</p>', '2024-01-19 06:40:23', '2024-01-19 06:40:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produknon`
--

CREATE TABLE `produknon` (
  `id_produknon` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `harga_produk` varchar(255) DEFAULT NULL,
  `foto_produk1` varchar(255) DEFAULT NULL,
  `foto_produk2` varchar(255) DEFAULT NULL,
  `foto_produk3` varchar(255) DEFAULT NULL,
  `foto_produk4` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` bigint(20) UNSIGNED NOT NULL,
  `nama_rek` varchar(255) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_rek`, `no_rek`, `created_at`, `updated_at`) VALUES
(1, 'BNI', '19671920', '2022-11-03 20:37:29', '2022-11-03 20:37:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sablon`
--

CREATE TABLE `sablon` (
  `id_sablon` bigint(20) UNSIGNED NOT NULL,
  `jenis_sablon` varchar(255) NOT NULL,
  `harga_sablon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sablon`
--

INSERT INTO `sablon` (`id_sablon`, `jenis_sablon`, `harga_sablon`, `created_at`, `updated_at`) VALUES
(1, '+ warna', ' 5000', '2022-11-03 19:42:22', '2022-11-03 19:42:22'),
(2, 'glow phosper', ' 7000', '2022-11-03 19:42:38', '2022-11-03 19:42:38'),
(3, 'sparasi warna', ' 10000', '2022-11-03 19:42:53', '2022-11-03 19:42:53'),
(4, 'metalic silver', ' 5000', '2022-11-03 19:43:06', '2022-11-03 19:43:06'),
(5, 'metalic gold', ' 5000', '2022-11-03 19:43:17', '2022-11-03 19:43:17'),
(6, 'foam/timbul', ' 15000', '2022-11-03 19:43:32', '2022-11-03 19:43:32'),
(7, 'foil paper a4', ' 15000', '2022-11-03 19:43:45', '2022-11-03 19:43:45'),
(8, '+ area sablon a2', ' 5000', '2022-11-03 19:43:59', '2022-11-03 19:43:59'),
(9, 'tabrak samping', ' 7000', '2022-11-03 19:44:09', '2022-11-03 19:44:09'),
(10, 'discharge', ' 10000', '2022-11-03 19:44:20', '2022-11-03 19:44:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `foto_profile` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `tipe`, `foto_profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$FFSCSdlm.F5zWMJSB9Y7ge3b2dFxgwjSH25EysK6UimSIFIA/cjb.', 'admin', '4.png', NULL, '2022-11-03 16:01:16', '2024-01-19 07:14:01'),
(2, 'elsa', 'elsa@gmail.com', NULL, '$2y$10$elSkwXHq6iNNxs70qpp6Te407aeoo1tibeN7K7AGxHyTll0aAeokS', 'pembeli', NULL, NULL, '2022-11-03 16:02:04', '2022-11-03 17:08:50'),
(3, 'rizki ratih', 'rizkiratih@gmail.com', NULL, '$2y$10$q1BMwVRawYcCXzpWWqMMG.4HIXeCF1bCoQft8I/2VNa.o/3yMirGW', 'pembeli', NULL, NULL, '2022-11-03 16:23:15', '2022-11-03 18:08:21'),
(4, 'monica', 'monica@gmail.com', NULL, '$2y$10$xZoKxmG1RRvVlamZWkUKc.qEsANI7A63l/UpQ7sf.MdNnD6X98OKC', 'pembeli', NULL, NULL, '2022-11-03 17:15:57', '2022-11-03 17:15:57'),
(5, 'monica', 'rista@gmail.com', NULL, '$2y$10$CxioPoJsuucpueaT5.D/DeVFe3RNBMv.wU0Zpx7gRry9bn7jhJGgC', 'pembeli', NULL, NULL, '2022-11-17 13:20:33', '2022-11-17 13:20:33'),
(6, 'Beno', 'Ben@Gmail.com', NULL, '$2y$10$VtJXBUh.uDALxT3PvcZLbeCi6AOnKXhbf5czwzmxEYxpMHO8WcyF2', 'pembeli', 'marapi.jpg', NULL, '2024-01-12 09:13:14', '2024-01-17 15:30:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_alamat`
--

CREATE TABLE `user_alamat` (
  `id_user_alamat` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_prov` varchar(255) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_alamat`
--

INSERT INTO `user_alamat` (`id_user_alamat`, `id_user`, `no_telp`, `nama_penerima`, `id_provinsi`, `nama_prov`, `id_kota`, `nama_kota`, `kode_pos`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 2, '081218113193', 'elsa', 4, 'Bengkulu', 62, 'Bengkulu', '30151', 'jl. sudirman n031', '2022-11-03 19:52:56', '2022-11-03 19:52:56'),
(2, 3, '0812237293', 'rizki ratih purwasih', 33, 'Sumatera Selatan', 327, 'Palembang', '30151', 'jl. soak simpur no a7', '2022-11-03 19:56:31', '2022-11-03 19:56:31'),
(3, 4, '082128293829', 'monica', 10, 'Jawa Tengah', 399, 'Semarang', '30151', 'jl. pandanaran', '2022-11-03 20:12:34', '2022-11-03 20:12:34'),
(4, 5, '081118113193', 'monica', 8, 'Jambi', 156, 'Jambi', '30151', 'jl. jend sudirman', '2022-11-17 13:21:53', '2022-11-17 13:21:53'),
(5, 6, '0822132323', 'Bambang', 32, 'Sumatera Barat', 318, 'Padang', '12324', 'jl. Bambang anjay', '2024-01-12 09:23:28', '2024-01-12 09:23:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variasi`
--

CREATE TABLE `variasi` (
  `id_variasi` bigint(20) UNSIGNED NOT NULL,
  `jenis_variasi` varchar(255) NOT NULL,
  `harga_variasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `variasi`
--

INSERT INTO `variasi` (`id_variasi`, `jenis_variasi`, `harga_variasi`, `created_at`, `updated_at`) VALUES
(1, 'ukuran 2xl', ' 5000', '2022-11-03 19:39:47', '2022-11-03 19:39:47'),
(2, 'ukuran 3xl', ' 10000', '2022-11-03 19:39:58', '2022-11-03 19:39:58'),
(3, 'ukuran 4xl', ' 15000', '2022-11-03 19:40:11', '2022-11-03 19:40:11'),
(4, 'ukuran 5xl', ' 20000', '2022-11-03 19:40:22', '2022-11-03 19:40:22'),
(5, 'lengan panjang', ' 7000', '2022-11-03 19:40:33', '2022-11-03 19:40:33'),
(6, 'raglan', ' 10000', '2022-11-03 19:40:45', '2022-11-03 19:40:45'),
(7, 'lengan 3/4', ' 5000', '2022-11-03 19:41:02', '2022-11-03 19:41:02'),
(8, 'kerah / manset', ' 10000', '2022-11-03 19:41:15', '2022-11-03 19:41:15'),
(9, 'kantong', ' 3000', '2022-11-03 19:41:25', '2022-11-03 19:41:25'),
(10, 'kombinasi', ' 5000', '2022-11-03 19:41:36', '2022-11-03 19:41:36'),
(11, 'variasi adidas', ' 5000', '2022-11-03 19:41:51', '2022-11-03 19:41:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produknon`
--
ALTER TABLE `produknon`
  ADD PRIMARY KEY (`id_produknon`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `sablon`
--
ALTER TABLE `sablon`
  ADD PRIMARY KEY (`id_sablon`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_alamat`
--
ALTER TABLE `user_alamat`
  ADD PRIMARY KEY (`id_user_alamat`);

--
-- Indeks untuk tabel `variasi`
--
ALTER TABLE `variasi`
  ADD PRIMARY KEY (`id_variasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_pesan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produknon`
--
ALTER TABLE `produknon`
  MODIFY `id_produknon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sablon`
--
ALTER TABLE `sablon`
  MODIFY `id_sablon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_alamat`
--
ALTER TABLE `user_alamat`
  MODIFY `id_user_alamat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `variasi`
--
ALTER TABLE `variasi`
  MODIFY `id_variasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
