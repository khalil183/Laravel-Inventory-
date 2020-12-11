-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 03:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'electronincs', NULL, NULL),
(2, 'mobile', NULL, NULL),
(3, 'televesion', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_shope_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_total` int(191) DEFAULT '0',
  `customer_payment` int(191) DEFAULT '0',
  `customer_status` int(191) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_shope_name`, `customer_total`, `customer_payment`, `customer_status`, `created_at`, `updated_at`) VALUES
(1, 'rajibul islam', '01765549861', 'rajibul@gmail.com', 'sirajgonj', 'rajibul restaurent', 93730, 84090, 1, NULL, NULL),
(2, 'serajul islam', '01783233771', 'serajul@gmail.com', 'birganj,dinajpur', 'serajul mart', 176262, 82037, 1, NULL, NULL),
(3, 'barun dawan', '01796726183', 'aboutbarun@gmail.com', 'thakurgoan', 'dawanshop', 76990, 17500, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `expense_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_amount`, `expense_details`, `expense_day`, `expense_month`, `expense_year`, `created_at`, `updated_at`) VALUES
(1, '210', 'cha kofi', '2020-09-10', 'September', '2020', '2020-09-10 07:53:04', NULL),
(2, '240', 'cha kofi', '2020-09-13', 'September', '2020', '2020-09-13 06:08:19', NULL),
(3, '40', 'cha biskut', '2020-09-13', 'September', '2020', '2020-09-13 06:25:11', NULL),
(4, '540', 'huihykkjk', '2020-09-15', 'September', '2020', '2020-09-15 06:24:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_29_144008_create_supplyers_table', 2),
(4, '2020_08_29_144045_create_customers_table', 2),
(5, '2020_08_30_135814_create_products_table', 3),
(6, '2020_08_31_104655_create_categories_table', 4),
(7, '2020_09_01_144402_create_orders_table', 5),
(8, '2020_09_01_144437_create_order_details_table', 5),
(9, '2020_09_04_050908_create_expenses_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total_product`, `total_price`, `payment_method`, `payable_amount`, `due_amount`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '28,230.00', 'Handcash', '25000', '3230', 'Success', '2020-09-08 03:02:42', NULL),
(2, 2, 23, '89,370.00', 'Handcash', '80000', '9370', 'Success', '2020-09-08 03:04:00', NULL),
(3, 3, 3, '58,300.00', 'Handcash', '500', '57800', 'Success', '2020-09-08 03:04:55', NULL),
(4, 1, 16, '11,350.00', 'Handcash', '2000', '9350', 'Success', '2020-09-08 03:07:22', NULL),
(5, 2, 7, '1,737.00', 'Handcash', '137', '1600', 'Success', '2020-09-08 05:51:12', NULL),
(6, 1, 6, '1,320.00', 'Handcash', '1000', '320', 'Success', '2020-09-10 07:37:41', NULL),
(7, 1, 1, '90.00', 'Handcash', '90', '0', 'Success', '2020-09-10 07:40:58', NULL),
(8, 3, 13, '6,440.00', 'Cheaque', '5000', '1440', 'Success', '2020-09-10 07:51:52', NULL),
(9, 2, 7, '1,284.00', 'Handcash', '1200', '84', 'Success', '2020-09-13 06:02:53', NULL),
(10, 3, 13, '12,250.00', 'Handcash', '12000', '250', 'Success', '2020-09-13 06:07:02', NULL),
(11, 1, 6, '2,960.00', 'Handcash', '2000', '960', 'Success', '2020-09-13 06:20:14', NULL),
(12, 2, 24, '1,278.00', 'Handcash', '700', '578', 'Success', '2020-09-13 06:24:05', NULL),
(13, 2, 11, '1,380.00', 'Handcash', NULL, NULL, 'Success', '2020-09-15 06:22:45', NULL),
(14, 2, 5, '8,780.00', 'Handcash', NULL, NULL, 'Success', '2020-10-27 12:09:04', NULL),
(15, 1, 4, '770.00', 'Cheaque', '500', '270', 'pending', '2020-10-31 05:41:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `order_day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `product_qty`, `order_day`, `order_month`, `order_year`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2, '2020-09-08', 'September', '2020', '2020-09-08 03:02:42', NULL),
(2, 1, 1, 3, '2020-09-08', 'September', '2020', '2020-09-08 03:02:43', NULL),
(3, 1, 3, 1, '2020-09-08', 'September', '2020', '2020-09-08 03:02:43', NULL),
(4, 2, 2, 5, '2020-09-08', 'September', '2020', '2020-09-08 03:04:00', NULL),
(5, 2, 6, 10, '2020-09-08', 'September', '2020', '2020-09-08 03:04:00', NULL),
(6, 2, 3, 3, '2020-09-08', 'September', '2020', '2020-09-08 03:04:00', NULL),
(7, 2, 5, 5, '2020-09-08', 'September', '2020', '2020-09-08 03:04:00', NULL),
(8, 3, 3, 2, '2020-09-08', 'September', '2020', '2020-09-08 03:04:56', NULL),
(9, 3, 7, 1, '2020-09-08', 'September', '2020', '2020-09-08 03:04:56', NULL),
(10, 4, 4, 3, '2020-09-08', 'September', '2020', '2020-09-08 03:07:22', NULL),
(11, 4, 1, 7, '2020-09-08', 'September', '2020', '2020-09-08 03:07:23', NULL),
(12, 4, 2, 1, '2020-09-08', 'September', '2020', '2020-09-08 03:07:23', NULL),
(13, 4, 7, 1, '2020-09-08', 'September', '2020', '2020-09-08 03:07:23', NULL),
(14, 4, 5, 4, '2020-09-08', 'September', '2020', '2020-09-08 03:07:23', NULL),
(15, 5, 4, 3, '2020-09-08', 'September', '2020', '2020-09-08 05:51:13', NULL),
(16, 5, 1, 3, '2020-09-08', 'September', '2020', '2020-09-08 05:51:13', NULL),
(17, 5, 6, 1, '2020-09-08', 'September', '2020', '2020-09-08 05:51:13', NULL),
(18, 6, 4, 2, '2020-09-10', 'September', '2020', '2020-09-10 07:37:41', NULL),
(19, 6, 1, 4, '2020-09-10', 'September', '2020', '2020-09-10 07:37:41', NULL),
(20, 7, 1, 1, '2020-09-10', 'September', '2020', '2020-09-10 07:40:58', NULL),
(21, 8, 4, 3, '2020-09-10', 'September', '2020', '2020-09-10 07:51:52', NULL),
(22, 8, 2, 10, '2020-09-10', 'September', '2020', '2020-09-10 07:51:53', NULL),
(23, 9, 4, 2, '2020-09-13', 'September', '2020', '2020-09-13 06:02:53', NULL),
(24, 9, 1, 3, '2020-09-13', 'September', '2020', '2020-09-13 06:02:53', NULL),
(25, 9, 6, 2, '2020-09-13', 'September', '2020', '2020-09-13 06:02:54', NULL),
(26, 10, 4, 2, '2020-09-13', 'September', '2020', '2020-09-13 06:07:03', NULL),
(27, 10, 1, 1, '2020-09-13', 'September', '2020', '2020-09-13 06:07:03', NULL),
(28, 10, 5, 10, '2020-09-13', 'September', '2020', '2020-09-13 06:07:03', NULL),
(29, 11, 4, 2, '2020-09-13', 'September', '2020', '2020-09-13 06:20:14', NULL),
(30, 11, 2, 4, '2020-09-13', 'September', '2020', '2020-09-13 06:20:14', NULL),
(31, 12, 1, 10, '2020-09-13', 'September', '2020', '2020-09-13 06:24:05', NULL),
(32, 12, 6, 14, '2020-09-13', 'September', '2020', '2020-09-13 06:24:06', NULL),
(33, 13, 4, 1, '2020-09-15', 'September', '2020', '2020-09-15 06:22:45', NULL),
(34, 13, 1, 10, '2020-09-15', 'September', '2020', '2020-09-15 06:22:45', NULL),
(35, 14, 7, 1, '2020-10-27', 'October', '2020', '2020-10-27 12:09:04', NULL),
(36, 14, 5, 4, '2020-10-27', 'October', '2020', '2020-10-27 12:09:04', NULL),
(37, 15, 1, 3, '2020-10-31', 'October', '2020', '2020-10-31 05:41:24', NULL),
(38, 15, 2, 1, '2020-10-31', 'October', '2020', '2020-10-31 05:41:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khalil.cmt.bpi@gmail.com', '$2y$10$UymgTUwGVgJVhw0h9acmS.S3baDl93QDFXbNgI5kmgKEOQSpPBRbG', '2020-08-22 09:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `supplyer_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` int(11) NOT NULL,
  `purchase_day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `purchase_price`, `sell_price`, `supplyer_id`, `category_id`, `product_image`, `product_qty`, `purchase_day`, `purchase_month`, `purchase_year`, `created_at`, `updated_at`) VALUES
(1, 'led Light', 'fdsfd', 70, 90, 1, 1, 'public/images/08-09-20-02-52-55-86650.jpg', 55, '2020-09-08', 'September', '2020', '2020-09-08 02:52:55', NULL),
(2, 'power supplye', 'fddsfs', 350, 500, 2, 2, 'public/images/08-09-20-02-53-51-98451.jpg', 4, '2020-09-08', 'September', '2020', '2020-09-08 02:53:51', NULL),
(3, 'televesion', '658dd', 22000, 27000, 1, 3, 'public/images/08-09-20-02-54-41-27563.jpg', 0, '2020-09-08', 'September', '2020', '2020-09-08 02:54:41', NULL),
(4, 'keyboard', 'fdf985', 380, 480, 3, 1, 'public/images/08-09-20-02-55-32-45964.jpg', 1, '2020-09-08', 'September', '2020', '2020-09-08 02:55:32', NULL),
(5, 'year phone', '3657de', 890, 1120, 3, 2, 'public/images/08-09-20-02-56-33-58433.jpg', 13, '2020-09-08', 'September', '2020', '2020-09-08 02:56:33', NULL),
(6, 'switch', 'eeedd', 15, 27, 2, 1, 'public/images/08-09-20-02-57-42-40510.jpg', 38, '2020-09-08', 'September', '2020', '2020-09-08 02:57:42', NULL),
(7, 'volvo bettery', '343fd', 3500, 4300, 3, 1, 'public/images/08-09-20-02-58-56-46702.jpg', 0, '2020-09-08', 'September', '2020', '2020-09-08 02:58:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplyers`
--

CREATE TABLE `supplyers` (
  `supplyer_id` bigint(20) UNSIGNED NOT NULL,
  `supplyer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplyer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplyer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplyer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplyer_shope_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplyer_total` int(191) DEFAULT '0',
  `supplyer_payment` int(191) DEFAULT '0',
  `supplyer_status` int(191) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplyers`
--

INSERT INTO `supplyers` (`supplyer_id`, `supplyer_name`, `supplyer_phone`, `supplyer_email`, `supplyer_address`, `supplyer_shope_name`, `supplyer_total`, `supplyer_payment`, `supplyer_status`, `created_at`, `updated_at`) VALUES
(1, 'sabbir rahman', '01796726183', 'sabir@gmail.com', 'taingail', 'sabbirshop', 139000, 134000, 1, '2020-09-08 02:49:08', NULL),
(2, 'nasim mahmud', '01761326599', 'nasim@gmail.com', 'nilmapari sodor', 'mahmud shop', 9725, 0, 1, '2020-09-08 02:50:03', NULL),
(3, 'gazi ferdous', '01765549861', 'gazi@gmail.com', 'rangpur,pirgacha', 'dj shop', 50520, 0, 1, '2020-09-08 02:50:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'ibrahim khalil', 'admin@gmail.com', NULL, '$2y$10$UvjAEjeEm/1bf.PMiL3kouHOK0veEJkWUn0OJcy7oTTKE2zmmQLE6', 'MivyktgXxTrAamfOkHJovuxY5NV9qJFEgj5lhcNTwT6HoPTJ0Nwtzl6drEZ6', '2020-08-22 08:17:49', '2020-08-22 08:17:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplyers`
--
ALTER TABLE `supplyers`
  ADD PRIMARY KEY (`supplyer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplyers`
--
ALTER TABLE `supplyers`
  MODIFY `supplyer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
