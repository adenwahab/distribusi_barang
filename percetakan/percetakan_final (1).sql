-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2023 pada 20.28
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percetakan_final`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` double NOT NULL,
  `harga_member` double DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama_barang`, `kategori_id`, `harga`, `harga_member`, `stok`, `satuan`, `foto`) VALUES
(36, 'B01', 'Brosur', 13, 5000, 0, 204, 'lembar', 'barang_B01.png'),
(37, 'B02', 'Digital Printing', 13, 10000, 0, 80, 'lembar', 'barang_B02.png'),
(38, 'B03', 'DTF', 13, 8000, 0, 120, 'lembar', 'barang_B03.png'),
(39, 'B04', 'Ebook', 13, 20000, 0, 20, 'lembar', 'barang_B04.png'),
(40, 'B05', 'Jasa Desain Grafis', 13, 50000, 0, 10, 'lembar', 'barang_B05.png'),
(41, 'B06', 'Kartu Ucapan', 13, 3000, 0, 200, 'lembar', 'barang_B06.png'),
(42, 'B07', 'Percetakan / Cetak Offset', 13, 15000, 0, 30, 'lembar', 'barang_B07.png'),
(43, 'B08', 'Poster', 13, 10000, 0, 50, 'lembar', 'barang_B08.png'),
(44, 'B09', 'Print A3 / Lembaran 2 muka', 13, 6000, 0, 100, 'lembar', 'barang_B09.png'),
(45, 'B10', 'Print A3 / Lembaran 1 muka', 13, 5000, 0, 100, 'lembar', 'barang_B10.png'),
(46, 'B11', 'Sertifikat', 13, 7000, 0, 70, 'lembar', 'barang_B11.png'),
(47, 'B12', 'Stiker Hologram / Striker Vinyl', 13, 4000, 0, 150, 'lembar', 'barang_B12.png'),
(48, 'B13', 'Akrilik Pembatas Meja', 14, 15000, 0, 18, 'buah', NULL),
(49, 'B14', 'Amplop', 14, 1000, 0, 200, 'buah', 'barang_B14.jpg'),
(50, 'B15', 'Buku Agenda', 14, 20000, 0, 30, 'buah', 'barang_B15.jpg'),
(51, 'B16', 'Buku Daily Planner', 14, 25000, 0, 25, 'buah', NULL),
(52, 'B17', 'Buku Iqro', 14, 8000, 0, 78, 'buah', 'barang_B17.png'),
(53, 'B18', 'Buku Tulis', 14, 3000, 0, 150, 'buah', 'barang_B18.jpg'),
(54, 'B19', 'Cetak Kartu BPJS', 14, 5000, 0, 100, 'kartu', 'barang_B19.jpg'),
(55, 'B20', 'Daily Planner', 14, 20000, 0, 30, 'buah', 'barang_B20.jpg'),
(56, 'B21', 'Emoney / Kartu Flazz', 14, 20000, 0, 30, 'kartu', 'barang_B21.jpg'),
(57, 'B22', 'Flashdisk', 14, 50000, 0, 10, 'buah', 'barang_B22.jpg'),
(58, 'B23', 'ID Card', 14, 10000, 0, 50, 'kartu', 'barang_B23.jpg'),
(59, 'B24', 'Kartu Nama', 14, 2000, 0, 200, 'kartu', 'barang_B24.jpg'),
(60, 'BK001', 'Bantal Cinta', 15, 50000, 4000, 100, 'buah', 'barang_BK001.png'),
(61, 'BK002', 'Bantal Custom', 15, 75000, 0, 50, 'buah', 'barang_BK002.png'),
(62, 'BK003', 'Bantal Foto', 15, 60000, 0, 80, 'buah', 'barang_BK003.png'),
(63, 'BK004', 'Bantal Pets / Bantal Hewan', 15, 65000, 0, 70, 'buah', 'barang_BK004.png'),
(64, 'BK005', 'Bucket Bag', 15, 120000, 0, 30, 'buah', 'barang_BK005.png'),
(65, 'TS001', 'Kaos T-Shirt', 15, 80000, 0, 100, 'buah', 'barang_TS001.png'),
(66, 'KS001', 'Kerudung Segi Empat', 15, 45000, 0, 120, 'buah', 'barang_KS001.png'),
(67, 'KT001', 'Kerudung Terbaru', 15, 50000, 0, 150, 'buah', 'barang_KT001.png'),
(68, 'LL001', 'Loulou Bag', 15, 180000, 0, 20, 'buah', 'barang_LL001.png'),
(69, 'MD001', 'Masker Duckbill', 15, 10000, 0, 100, 'buah', 'barang_MD001.png'),
(70, 'MH001', 'Masker Hijab', 15, 12000, 0, 145, 'buah', 'barang_MH001.png'),
(71, 'BD001', 'Backdrop', 16, 200000, 0, 10, 'meter persegi', 'barang_BD001.jpg'),
(72, 'BN001', 'Banner', 16, 150000, 0, 20, 'meter persegi', 'barang_BN001.jpg'),
(73, 'BP001', 'Blueprint', 16, 80000, 0, 50, 'lembar', 'barang_BP001.jpg'),
(74, 'KK001', 'Kalkir', 16, 15000, 0, 200, 'meter persegi', 'barang_KK001.jpg'),
(75, 'KB001', 'Karangan Bunga Kertas', 16, 30000, 0, 100, 'buah', 'barang_KB001.jpg'),
(76, 'PT001', 'Plotter', 16, 300000, 0, 5, 'jam', 'barang_PT001.jpg'),
(77, 'RB001', 'Roll Banner', 16, 120000, 0, 30, 'buah', 'barang_RB001.jpg'),
(78, 'SC001', 'Scan', 16, 5000, 0, 90, 'lembar', 'barang_SC001.jpg'),
(79, 'SD001', 'Spanduk', 16, 100000, 0, 40, 'meter persegi', 'barang_SD001.png'),
(80, 'SH001', 'Spanduk HUT RI', 16, 150000, 0, 20, 'meter persegi', 'barang_SH001.jpg'),
(81, 'SI001', 'Spanduk Instant', 16, 80000, 0, 50, 'meter persegi', 'barang_SI001.jpg'),
(82, 'TB001', 'Tripod Banner', 16, 75000, 0, 50, 'buah', 'barang_TB001.jpg'),
(83, 'AKR01', 'Akrilik LED Foto BTS / Lampu BTS', 17, 100000, 0, 50, 'pcs', 'barang_AKR01.png'),
(84, 'AKR02', 'Akrilik Spotify', 17, 50000, 0, 100, 'pcs', 'barang_AKR02.png'),
(85, 'ALQ01', 'Al Quran Cover', 17, 75000, 0, 30, 'pcs', 'barang_ALQ01.png'),
(86, 'AMP01', 'Amplop Lebaran', 17, 5000, 0, 200, 'pcs', 'barang_AMP01.png'),
(87, 'ANG01', 'Angpao', 17, 2000, 0, 98, 'pcs', 'barang_ANG01.png'),
(88, 'BOT01', 'Botol 1 liter', 17, 20000, 0, 100, 'pcs', 'barang_BOT01.png'),
(89, 'BOT02', 'Botol Air Zam-zam', 17, 25000, 0, 50, 'pcs', 'barang_BOT02.png'),
(90, 'BOT03', 'Botol Anak Custom 500ml', 17, 15000, 0, 80, 'pcs', 'barang_BOT03.png'),
(91, 'BOT04', 'Botol Dundee 1 Liter', 17, 18000, 0, 60, 'pcs', 'barang_BOT04.png'),
(92, 'MOZ01', 'Mozaik', 18, 50000, 0, 20, 'pcs', 'barang_MOZ01.png'),
(93, 'CF01', 'Cetak Foto', 18, 10000, 0, 200, 'pcs', 'barang_CF01.png'),
(94, 'CFC01', 'Cetak Foto canvas', 18, 150000, 0, 10, 'pcs', 'barang_CFC01.png'),
(95, 'CFCP0', 'Cetak Foto Canvas / polyflex', 18, 180000, 0, 5, 'pcs', 'barang_CFCP0.png'),
(96, 'FPO01', 'Foto Polaroid', 18, 8000, 0, 100, 'pcs', 'barang_FPO01.png'),
(97, 'KAR01', 'Karikatur', 18, 50000, 0, 30, 'pcs', 'barang_KAR01.png'),
(98, 'PB01', 'Photobook', 18, 120000, 0, 15, 'pcs', 'barang_PB01.png'),
(99, 'WS01', 'Wedding Sign / Papan Nama Akrilik', 18, 75000, 0, 20, 'pcs', 'barang_WS01.png'),
(100, 'BOOTH', 'Booth / Booth Jualan', 19, 500000, 0, 2, 'pcs', 'barang_BOOTH.jpg'),
(101, 'HB01', 'Hanging Banner', 19, 250000, 0, 5, 'pcs', 'barang_HB01.jpg'),
(102, 'STAN0', 'Standee', 19, 300000, 0, 10, 'pcs', 'barang_STAN0.jpg'),
(104, 'PF001', 'Bingkai Foto', 20, 50000, 0, 10, 'pcs', 'barang_PF001.jpg'),
(105, 'PF002', 'Box Sepeda Lipat', 20, 200000, 0, 5, 'pcs', 'barang_PF002.jpg'),
(106, 'PF003', 'Hiasan Dinding', 20, 30000, 0, 20, 'pcs', 'barang_PF003.jpg'),
(107, 'PF004', 'Jam Dinding', 20, 100000, 0, 15, 'pcs', 'barang_PF004.jpg'),
(108, 'PF005', 'Jam Dinding kayu', 20, 120000, 0, 12, 'pcs', 'barang_PF005.jpg'),
(109, 'PF006', 'Jam Dinding Unik', 20, 150000, 0, 8, 'pcs', 'barang_PF006.jpg'),
(110, 'PF007', 'Lampu Akrilik / Lampu Hias', 20, 80000, 0, 18, 'pcs', 'barang_PF007.jpg'),
(111, 'PF008', 'Lampu Hias Gantung', 20, 100000, 0, 10, 'pcs', 'barang_PF008.jpg'),
(112, 'PF009', 'Lampu Meja', 20, 70000, 0, 20, 'pcs', 'barang_PF009.jpg'),
(113, 'PF010', 'Meja Custom', 20, 250000, 250000, 3, 'pcs', 'barang_PF010.jpg'),
(114, 'PF011', 'Nomor Rumah', 20, 20000, 20000, 30, 'pcs', 'barang_PF011.jpg'),
(115, 'PF012', 'Nomor Rumah Akrilik', 20, 25000, 23000, 25, 'pcs', 'barang_PF012.jpg'),
(116, 'CS001', 'Coworking Space', 21, 100000, 100000, 50, 'jam', 'barang_CS001.jpg'),
(117, 'SG001', 'Baliho', 22, 300000, 280000, 8, 'pcs', 'barang_SG001.jpg'),
(118, 'SG002', 'Light box', 22, 150000, 150000, 12, 'pcs', 'barang_SG002.jpg'),
(119, 'SG003', 'Neon Box', 22, 200000, 190000, 10, 'pcs', 'barang_SG003.jpg'),
(120, 'SG004', 'Neon Box Bulat', 22, 180000, 150000, 15, 'pcs', 'barang_SG004.jpg'),
(121, 'SG005', 'Neon Flex', 22, 120000, 100000, 20, 'pcs', 'barang_SG005.jpg'),
(122, 'PK001', 'Packaging Box Pillow', 23, 80000, 70000, 20, 'pcs', 'barang_PK001.jpg'),
(123, 'PK002', 'Packaging Box / Hand Held', 23, 50000, 35000, 30, 'pcs', 'barang_PK002.jpg'),
(124, 'PK003', 'Packaging / Box Gable', 23, 60000, 40000, 25, 'pcs', 'barang_PK003.jpg'),
(125, 'PK004', 'Packaging / Box Lotus', 23, 70000, 50000, 20, 'pcs', 'barang_PK004.jpg'),
(126, 'PK005', 'Stiker Fragile', 23, 10000, 8000, 50, 'pcs', 'barang_PK005.jpg'),
(127, 'PK006', 'Stiker Makanan', 23, 8000, 5000, 100, 'pcs', 'barang_PK006.jpg'),
(128, 'KM01', 'Cetak Stiker', 24, 10000, 8000, 50, 'pcs', 'barang_KM01.jpg'),
(129, 'KM02', 'Label Makanan', 24, 80000, 75000, 200, 'pcs', 'barang_KM02.jpg'),
(130, 'KM03', 'Standing Pouch', 24, 15000, 15000, 150, 'pcs', 'barang_KM03.png'),
(131, 'KM4', 'Stiker Label Botol', 24, 5000, 4000, 50, 'pcs', 'barang_KM4.jpg'),
(139, 'PCB19', 'percobaan', 18, 90000, 80000, 100, 'Kubik', 'barang_PCB19.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(21, 'Coworking Space'),
(18, 'Foto'),
(16, 'Large Format'),
(19, 'Marketing Tools'),
(23, 'Packaging'),
(15, 'Print Kain'),
(13, 'Print Lembaran'),
(20, 'Printerior'),
(17, 'Promo and Gift'),
(22, 'Signane'),
(14, 'Stationary'),
(24, 'UMKM');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status_member` tinyint(1) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `no_hp`, `email`, `status_member`, `foto`) VALUES
(4, 'Pelanggan 1', 'Alamat 1', '08111111111', 'pelanggan1@gmail.com', 1, 'pelanggan1.jpg'),
(5, 'Pelanggan 2', 'Alamat 2', '08222222222', 'pelanggan2@gmail.com', 0, 'pelanggan2.jpg'),
(6, 'Pelanggan 3', 'Alamat 3', '08333333333', 'pelanggan3@gmail.com', 1, 'pelanggan3.jpg'),
(7, 'Wahab roman', 'Bandung', '08976543', 'Wahab@gmail.com', 1, 'pelanggan_.jpg'),
(9, 'Anas', 'Darussalam', '08238437234', 'anas123@gmail.com', 0, '');

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
-- Struktur dari tabel `suplai_barang`
--

CREATE TABLE `suplai_barang` (
  `id` int(11) NOT NULL,
  `suplier_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` varchar(45) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `suplai_barang`
--

INSERT INTO `suplai_barang` (`id`, `suplier_id`, `barang_id`, `tgl`, `jumlah`, `keterangan`) VALUES
(1, 1, 36, '2023-05-20', '50', NULL),
(2, 2, 37, '2023-05-21', '30', NULL),
(3, 3, 38, '2023-05-22', '40', NULL),
(6, 5, 139, '2023-06-23', '50', 'percobaan afkar'),
(7, 3, 128, '2023-06-25', '30', 'Masuk 30');

--
-- Trigger `suplai_barang`
--
DELIMITER $$
CREATE TRIGGER `normalkanStok` AFTER DELETE ON `suplai_barang` FOR EACH ROW BEGIN
    UPDATE barang SET stok = stok - OLD.jumlah WHERE id = OLD.barang_id;
END #
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambahStok` AFTER INSERT ON `suplai_barang` FOR EACH ROW BEGIN
    UPDATE barang SET stok = stok + NEW.jumlah WHERE id = NEW.barang_id;
END #
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateStok` AFTER UPDATE ON `suplai_barang` FOR EACH ROW BEGIN
    UPDATE barang SET stok = stok - OLD.jumlah + NEW.jumlah WHERE id = NEW.barang_id;
END #
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `alamat`, `no_hp`, `email`) VALUES
(1, 'Supplier 1', 'Alamat Supplier 1', '0812345678', NULL),
(2, 'Supplier 2', 'Alamat Supplier 2', '0823456789', NULL),
(3, 'Supplier 3', 'Alamat Supplier 3', '0834567890', NULL),
(5, 'Wahab', 'sukabumi', '81234567', 'wahab@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` varchar(45) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `barang_id`, `pelanggan_id`, `tgl`, `jumlah`, `total_harga`, `keterangan`) VALUES
(1, 36, 4, '2023-05-29', '2', 400000, NULL),
(2, 38, 4, '2023-05-29', '1', 200000, NULL),
(3, 40, 5, '2023-05-30', '3', 300000, NULL),
(4, 45, 6, '2023-05-30', '5', 500000, NULL),
(5, 55, 4, '2023-05-31', '2', 700000, NULL),
(20, 128, 7, '2023-06-25', '50', 400000, 'haha haha haha'),
(21, 128, 7, '2023-06-25', '30', 240000, 'malam'),
(23, 52, 7, '2023-06-25', '2', 16000, 'malam'),
(25, 48, 9, '2023-06-25', '2', 30000, NULL);

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `kurangiStok` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN 
    UPDATE barang SET stok = stok - NEW.jumlah WHERE id = NEW.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `normalisasiStok` AFTER DELETE ON `transaksi` FOR EACH ROW BEGIN 
    UPDATE barang SET stok = stok + OLD.jumlah 
    WHERE id = OLD.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahStok` AFTER UPDATE ON `transaksi` FOR EACH ROW BEGIN 
    UPDATE barang SET stok =(stok + OLD.jumlah) - NEW.jumlah
    WHERE id = NEW.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` enum('admin','kasir','manajer') NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `no_hp`, `alamat`, `username_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin', 'admin123@gmail.com', NULL, '', NULL, '$2y$10$m2dFp4WTPEyuvcdRPN.yQ..mHtRDcG.BkFSwpzgI1iphs/jsWWD/y', 'T2Ud9GKq6gdz8LPZcLoeZpTnfyIw5VmtuGrlqqxGzwQhSRT7w0hGLmrqijwX', '2023-06-05 08:05:05', '2023-06-05 08:05:05'),
(3, 'Abdul Wahab', 'admin', 'wahab@gmail.com', '081234567', 'sukabumi', NULL, '$2y$10$RlWOme8DrDNztvA8VKguuOmaOMEWmJDq2m9UJPvTMSASvPBvhB30G', NULL, '2023-06-15 07:54:07', '2023-06-15 07:55:17'),
(4, 'M. Afkar Siddiq', 'admin', 'afkarsiddiq0@gmail', '082169019974', 'Darussalam, Banda Aceh', NULL, '$2y$10$8..aOpK9dBKLurE0LHuaa.cpLMa21KlJpEiZsRmM.XpqJ1lTqLTEW', NULL, '2023-06-25 08:48:23', '2023-06-25 08:48:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `nama_produk_idx` (`nama_barang`),
  ADD KEY `fk_produk_jenis` (`kategori_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `nama_pelanggan_idx` (`nama`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `suplai_barang`
--
ALTER TABLE `suplai_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_suplier_has_barang_suplier` (`suplier_id`),
  ADD KEY `fk_suplier_has_barang_barang1` (`barang_id`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk_has_pelanggan_produk1` (`barang_id`),
  ADD KEY `fk_produk_has_pelanggan_pelanggan1` (`pelanggan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suplai_barang`
--
ALTER TABLE `suplai_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_produk_jenis` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `suplai_barang`
--
ALTER TABLE `suplai_barang`
  ADD CONSTRAINT `fk_suplier_has_barang_barang1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_suplier_has_barang_suplier` FOREIGN KEY (`suplier_id`) REFERENCES `suplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_produk_has_pelanggan_pelanggan1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_has_pelanggan_produk1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
