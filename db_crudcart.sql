-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 04:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crudcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `product_name`, `product_description`, `photo`, `price`, `created_at`, `updated_at`, `id_category`) VALUES
(1, 'Airpods 2 Pro', 'Brand New Airpods 2 Pro', 'airpods 2.jpg', 100, '2023-03-24 07:25:04', '2023-03-24 07:25:04', 3),
(2, 'Airpods 3th Gen', 'Brand New Airpods 3th Gen', 'airpods 3.jpg', 89, '2023-03-24 07:26:17', '2023-03-24 07:26:17', 3),
(3, 'Samsung Galaxy Z Flip 4', 'Brand New Samsung Galaxy Z Flip 4', 'flip 4.jpg', 699, '2023-03-24 07:27:54', '2023-03-24 07:29:23', 2),
(4, 'Samsung Galaxy Z Fold 4', 'Brand New Samsung Galaxy Z Fold 4', 'fold4.jpg', 999, '2023-03-24 07:29:12', '2023-03-24 07:29:12', 2),
(5, 'iPhone 14 Pro Max', 'Brand New iPhone 14 Pro Max', 'ip14pmax.jpg', 1299, '2023-03-24 07:31:24', '2023-03-24 07:31:24', 2),
(6, 'ZTE nubia Red Magic 6 Pro', 'Brand New ZTE nubia Red Magic 6 Pro', 'redmagic.jpg', 899, '2023-03-24 07:32:28', '2023-03-24 07:32:28', 2),
(7, 'Asus ROG Phone 6', 'Brand New Asus ROG Phone 6', 'rog6.jpg', 899, '2023-03-24 07:34:27', '2023-03-24 07:34:27', 2),
(8, 'Samsung Galaxy S23 Ultra', 'Brand New Galaxy S23 Ultra', 's23 ultra.jpg', 1099, '2023-03-24 07:35:01', '2023-03-24 07:35:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'HP', '2023-03-24 07:21:06', '2023-03-24 07:21:06'),
(3, 'Accessories', '2023-03-24 07:21:22', '2023-03-24 07:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `id` bigint(20) DEFAULT 20,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, 'create_barang_table', 1),
(3, 'create_kategori_table', 1),
(4, 'create_keranjang_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id_category_foreign` (`id_category`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
