-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2020 lúc 08:00 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyquancafe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `bill_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bartender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `bill_code`, `user_id`, `table_id`, `bill_date`, `bartender`, `status`, `created_at`, `updated_at`, `number`) VALUES
(22, 'HD-00001', 6, 8, '2020-11-28 06:28:47', NULL, 1, '2020-11-28 06:28:47', '2020-11-28 06:28:47', 1),
(23, 'HD-00002', 6, 9, '2020-11-28 06:29:00', NULL, 1, '2020-11-28 06:29:00', '2020-11-28 06:29:00', 2),
(24, 'HD-00003', 6, 10, '2020-11-28 06:29:12', NULL, 1, '2020-11-28 06:29:12', '2020-11-28 06:29:12', 3),
(25, 'HD-00004', 6, 11, '2020-11-28 06:29:28', NULL, 1, '2020-11-28 06:29:28', '2020-11-28 06:29:28', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetail`
--

CREATE TABLE `billdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `billdetail`
--

INSERT INTO `billdetail` (`id`, `bill_id`, `menu_id`, `amount`, `price`, `created_at`, `updated_at`) VALUES
(69, 22, 16, 3, 50000, '2020-11-28 06:28:47', '2020-11-28 06:28:47'),
(70, 22, 17, 3, 40000, '2020-11-28 06:28:47', '2020-11-28 06:28:47'),
(71, 22, 18, 1, 6000, '2020-11-28 06:28:47', '2020-11-28 06:28:47'),
(72, 23, 18, 2, 6000, '2020-11-28 06:29:00', '2020-11-28 06:29:00'),
(73, 23, 17, 2, 40000, '2020-11-28 06:29:00', '2020-11-28 06:29:00'),
(74, 24, 16, 2, 50000, '2020-11-28 06:29:12', '2020-11-28 06:29:12'),
(75, 24, 17, 2, 40000, '2020-11-28 06:29:12', '2020-11-28 06:29:12'),
(76, 25, 18, 5, 6000, '2020-11-28 06:29:28', '2020-11-28 06:29:28'),
(77, 25, 16, 1, 50000, '2020-11-28 06:29:28', '2020-11-28 06:29:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goodsdeliverynotedetail`
--

CREATE TABLE `goodsdeliverynotedetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matterials_id` bigint(20) UNSIGNED DEFAULT NULL,
  `required_import_goods_id` bigint(20) NOT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `goodsdeliverynotedetail`
--

INSERT INTO `goodsdeliverynotedetail` (`id`, `matterials_id`, `required_import_goods_id`, `amount`, `created_at`, `updated_at`) VALUES
(63, 9, 28, 10, '2020-11-28 06:38:27', '2020-11-28 06:38:27'),
(64, 10, 28, 1, '2020-11-28 06:38:27', '2020-11-28 06:38:27'),
(65, 9, 29, 10, '2020-11-28 06:39:14', '2020-11-28 06:39:14'),
(66, 12, 29, 20, '2020-11-28 06:39:14', '2020-11-28 06:39:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goods_delivery_note`
--

CREATE TABLE `goods_delivery_note` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goods_delivery_note_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deliver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliver_phone_number` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `goods_delivery_note`
--

INSERT INTO `goods_delivery_note` (`id`, `goods_delivery_note_code`, `user_id`, `supplier_id`, `issue_date`, `deliver`, `deliver_phone_number`, `created_at`, `updated_at`) VALUES
(28, 'PNK-0001', 7, 7, '2020-11-28 06:38:27', 'Trần Việt Tiến', '0971418994', '2020-11-28 06:38:27', '2020-11-28 06:38:27'),
(29, 'PNK-0002', 7, 8, '2020-11-28 06:39:14', 'Nguyễn Văn Anh', '0359118994', '2020-11-28 06:39:14', '2020-11-28 06:39:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `matterials`
--

CREATE TABLE `matterials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matterials_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `matterials`
--

INSERT INTO `matterials` (`id`, `matterials_code`, `name`, `unit`, `created_at`, `updated_at`) VALUES
(9, 'CF1', 'Cafe hòa tan', 'hộp', '2020-11-28 06:35:17', '2020-11-28 06:35:17'),
(10, 'ST', 'Sữa tươi', 'hộp', '2020-11-28 06:35:32', '2020-11-28 06:35:32'),
(11, 'DG', 'Đường kính', 'kg', '2020-11-28 06:35:51', '2020-11-28 06:35:51'),
(12, 'CF2', 'Cafe nguyên chất', 'kg', '2020-11-28 06:36:24', '2020-11-28 06:36:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drinks_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `drinks_code`, `name`, `price`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(16, 'CFS', 'Cà phê sữa', 50000, 'cốc', 0, '2020-11-28 06:20:01', '2020-11-28 06:20:01'),
(17, 'CFD', 'Cafe đen', 40000, 'cốc', 0, '2020-11-28 06:20:20', '2020-11-28 06:20:20'),
(18, 'CFT', 'Cafe trứng', 6000, 'cốc', 0, '2020-11-28 06:21:43', '2020-11-28 06:21:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_26_033830_create_matterials_table', 1),
(5, '2020_10_26_040247_create_menu_table', 1),
(6, '2020_10_26_040303_create_supplier_table', 1),
(7, '2020_10_26_040322_create_table_table', 1),
(8, '2020_10_26_041807_create_bill_table', 1),
(9, '2020_10_26_041924_create_billdetail_table', 1),
(10, '2020_10_26_042106_create_goodsdeliverynotedetail_table', 1),
(11, '2020_10_26_084533_create_goods_delivery_note_table', 1),
(12, '2020_10_26_110054_create_role_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_code`, `name`, `created_at`, `updated_at`) VALUES
(6, 'VNM', 'Vinamilk', '2020-11-28 06:32:14', '2020-11-28 06:32:14'),
(7, 'TN', 'Trung Nguyên', '2020-11-28 06:33:16', '2020-11-28 06:33:16'),
(8, 'HL', 'Highland', '2020-11-28 06:33:32', '2020-11-28 06:33:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table`
--

CREATE TABLE `table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table`
--

INSERT INTO `table` (`id`, `table_code`, `number`, `status`, `created_at`, `updated_at`) VALUES
(8, '01', 1, 0, '2020-11-28 06:26:37', '2020-11-28 06:26:37'),
(9, '02', 2, 0, '2020-11-28 06:26:44', '2020-11-28 06:26:44'),
(10, '03', 3, 0, '2020-11-28 06:26:50', '2020-11-28 06:26:50'),
(11, '04', 4, 0, '2020-11-28 06:27:01', '2020-11-28 06:27:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` bigint(20) NOT NULL,
  `gender` bigint(20) NOT NULL DEFAULT 0,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_code`, `id_card`, `gender`, `status`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tiến Trần', 'trantien2456@gmail.com', 'QL', 1234567890, 0, 0, NULL, '$2y$10$EANLZGHJuyFLvUvURDTBpeDBTkfH8lTIShiavpptG1GWZ039NA/ZW', 0, NULL, NULL, '2020-11-09 10:36:37'),
(6, 'Thu ngân', 'thungan@gmail.com', 'TN', 12345678, 0, 0, NULL, '$2y$10$E99mk3fPUvukkn.5rQ6cS.N2UxvG2tJShZ.twhIimBqiuDhmOz/.W', 1, NULL, '2020-11-22 15:29:27', '2020-11-22 15:29:27'),
(7, 'Phục vụ', 'phucvu@gmail.com', 'PV', 123, 0, 0, NULL, '$2y$10$ZhmSxwOnkuQCJNg38WGDJ.LYYYIUjZrp7RZVu8VziW/Zi.DWADMaS', 2, NULL, '2020-11-22 15:38:45', '2020-11-22 15:38:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bill_bill_code_unique` (`bill_code`);

--
-- Chỉ mục cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `goodsdeliverynotedetail`
--
ALTER TABLE `goodsdeliverynotedetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `goods_delivery_note`
--
ALTER TABLE `goods_delivery_note`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `goods_delivery_note_goods_delivery_note_code_unique` (`goods_delivery_note_code`);

--
-- Chỉ mục cho bảng `matterials`
--
ALTER TABLE `matterials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matterials_matterials_code_unique` (`matterials_code`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_drinks_code_unique` (`drinks_code`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supplier_supplier_code_unique` (`supplier_code`);

--
-- Chỉ mục cho bảng `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_code_unique` (`user_code`),
  ADD UNIQUE KEY `users_id_card_unique` (`id_card`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `goodsdeliverynotedetail`
--
ALTER TABLE `goodsdeliverynotedetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `goods_delivery_note`
--
ALTER TABLE `goods_delivery_note`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `matterials`
--
ALTER TABLE `matterials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `table`
--
ALTER TABLE `table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
