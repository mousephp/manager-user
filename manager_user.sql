-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 08, 2021 lúc 12:16 AM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manager_user`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_28_031413_create_roles_table', 1),
(5, '2021_01_28_031938_create_permissions_table', 1),
(6, '2021_01_28_032206_create_user_role_table', 1),
(7, '2021_01_28_032234_create_role_permission_table', 1),
(8, '2021_01_28_032908_create_posts_table', 1),
(9, '2021_02_18_142415_add_column_to_users_table', 2),
(10, '2021_03_06_073653_add_facebook_id_column_in_users_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user-create', 'user_create', NULL, '2021-02-25 22:48:18', NULL),
(2, 'user-update', 'user_update', NULL, '2021-02-25 22:48:25', NULL),
(3, 'user-delete', 'user_delete', NULL, '2021-02-25 22:48:31', NULL),
(4, 'user-restore', 'user_restore', NULL, '2021-02-25 22:48:36', NULL),
(5, 'user-forceDelete', 'user_force_delete', NULL, '2021-02-25 22:48:49', NULL),
(6, 'user-view', 'user_view', '2021-02-03 00:57:54', '2021-02-25 22:48:53', NULL),
(7, 'view_xx', 'view-xx', '2021-02-03 01:05:08', '2021-02-28 18:09:38', '2021-02-03 01:16:12'),
(8, 'normal', 'normal', '2021-02-03 01:16:33', '2021-02-03 01:16:41', '2021-02-03 01:16:41'),
(9, 'user-list', 'user_list', '2021-02-25 16:29:41', '2021-02-25 22:48:59', NULL),
(10, 'role-update', 'role-update', '2021-02-25 22:50:04', '2021-02-25 22:50:04', NULL),
(11, 'role-delete', 'role_delete', '2021-02-25 22:50:17', '2021-02-25 22:50:17', NULL),
(12, 'role-list', 'role_delete', '2021-02-25 22:50:29', '2021-02-25 22:50:29', NULL),
(13, 'role-create', 'role_create', '2021-02-25 22:50:45', '2021-02-25 22:50:45', NULL),
(14, 'role-view', 'role_view', '2021-02-25 22:51:37', '2021-02-25 22:51:37', NULL),
(15, 'post-list', 'post_list', '2021-06-05 05:58:53', '2021-06-05 05:58:53', NULL),
(16, 'post-view', 'post_view', '2021-06-05 05:59:15', '2021-06-05 05:59:15', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tieu de 1', 'noi dung 1', 1, 1, NULL, NULL, NULL),
(2, 'tieu de 2', 'noi dung 2', 0, 2, NULL, '2021-02-02 21:00:03', '2021-02-02 21:00:03'),
(3, 'tieu de 3', 'noi dung 3', 1, 1, NULL, '2021-02-02 20:59:17', '2021-02-02 20:59:17'),
(4, 'tieu de 4', 'noi dung 4', 0, 2, NULL, '2021-02-02 20:57:00', '2021-02-02 20:57:00'),
(5, 'title 1', 'content 1', 0, 2, '2021-02-01 06:50:05', '2021-02-02 20:56:42', '2021-02-02 20:56:42'),
(6, 'bài viết', 'bài viết', 0, 1, '2021-02-01 20:27:48', '2021-02-02 20:55:09', '2021-02-02 20:55:09'),
(7, 'Thêm bài viết', 'Thêm bài viết', 1, 3, '2021-02-01 20:44:48', '2021-02-02 20:58:02', '2021-02-02 20:58:02'),
(8, 'tieu de xxx', 'drfgvbvgd lolol', 0, 3, '2021-02-01 20:57:49', '2021-02-01 21:28:01', '2021-02-01 21:28:01'),
(9, 'nguyen', 'nguyen', 1, 2, '2021-02-03 01:55:13', '2021-06-05 06:05:17', NULL),
(10, 'bài viết 1', 'bài viết', 0, 2, '2021-02-03 01:55:29', '2021-02-03 01:55:29', NULL),
(11, 'titile 2', 'content 2', 1, 3, '2021-02-25 21:46:49', '2021-02-25 23:01:27', NULL),
(12, 'titile 3 - dev@', 'content 3', 1, 2, '2021-02-25 21:47:58', '2021-02-25 22:59:37', NULL),
(13, 'titile 1', 'content 1', 1, 3, '2021-02-25 23:07:30', '2021-03-02 05:33:33', NULL),
(15, 'titile 4', 'content 4', 1, 4, '2021-02-25 23:11:02', '2021-03-02 05:52:21', '2021-03-02 05:52:21'),
(16, 'titile 5', 'titile 5', 0, 26, '2021-03-01 00:25:40', '2021-03-02 05:36:30', '2021-03-02 05:36:30'),
(17, 'titile 7', 'content 7', 0, 1, '2021-03-07 01:20:33', '2021-03-07 01:20:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL),
(2, 'dev', 'dev', '2021-02-02 02:35:00', '2021-02-02 02:35:00', NULL),
(3, 'normal', 'normal', '2021-02-02 02:41:29', '2021-02-02 02:41:29', NULL),
(4, 'test', 'test', '2021-02-02 02:41:40', '2021-06-05 06:07:12', NULL),
(10, 'normal1', 'normal1', '2021-02-03 00:31:09', '2021-02-03 00:31:39', '2021-02-03 00:31:39'),
(11, 'user', 'user', '2021-02-03 00:34:59', '2021-02-25 22:31:57', NULL),
(12, 'bugx', 'bugx', '2021-02-28 19:19:19', '2021-02-28 19:20:50', '2021-02-28 19:20:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, '2021-02-25 17:16:37', '2021-02-25 17:16:37'),
(2, 1, 2, NULL, '2021-02-25 17:16:37', '2021-02-25 17:16:37'),
(3, 1, 3, NULL, '2021-02-25 17:16:37', '2021-02-25 17:16:37'),
(4, 1, 4, NULL, '2021-02-25 17:16:37', '2021-02-25 17:16:37'),
(5, 1, 5, NULL, '2021-02-25 17:16:37', '2021-02-25 17:16:37'),
(34, 1, 1, NULL, '2021-02-25 21:59:09', '2021-02-25 21:59:09'),
(35, 1, 2, NULL, '2021-02-25 21:59:09', '2021-02-25 21:59:09'),
(36, 1, 3, NULL, '2021-02-25 21:59:09', '2021-02-25 21:59:09'),
(37, 1, 4, NULL, '2021-02-25 21:59:09', '2021-02-25 21:59:09'),
(38, 1, 5, NULL, '2021-02-25 21:59:09', '2021-02-25 21:59:09'),
(39, 1, 9, NULL, '2021-02-25 21:59:09', '2021-02-25 21:59:09'),
(43, 3, 2, NULL, NULL, NULL),
(44, 3, 3, NULL, NULL, NULL),
(45, 3, 6, NULL, NULL, NULL),
(46, 3, 9, NULL, NULL, NULL),
(50, 1, 1, NULL, '2021-02-25 22:00:45', '2021-02-25 22:00:45'),
(51, 1, 2, NULL, '2021-02-25 22:00:45', '2021-02-25 22:00:45'),
(52, 1, 3, NULL, '2021-02-25 22:00:45', '2021-02-25 22:00:45'),
(53, 1, 4, NULL, '2021-02-25 22:00:45', '2021-02-25 22:00:45'),
(54, 1, 5, NULL, '2021-02-25 22:00:45', '2021-02-25 22:00:45'),
(55, 1, 9, NULL, '2021-02-25 22:00:45', '2021-02-25 22:00:45'),
(56, 1, 1, NULL, NULL, NULL),
(57, 1, 2, NULL, NULL, NULL),
(58, 1, 3, NULL, NULL, NULL),
(59, 1, 4, NULL, NULL, NULL),
(60, 1, 5, NULL, NULL, NULL),
(61, 1, 6, NULL, NULL, NULL),
(62, 1, 9, NULL, NULL, NULL),
(100, 2, 1, NULL, NULL, NULL),
(101, 2, 2, NULL, NULL, NULL),
(102, 2, 6, NULL, NULL, NULL),
(103, 2, 9, NULL, NULL, NULL),
(126, 11, 6, NULL, NULL, NULL),
(127, 11, 9, NULL, NULL, NULL),
(128, 11, 15, NULL, NULL, NULL),
(129, 11, 16, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_original` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `google_id`, `avatar`, `avatar_original`, `provider`, `provider_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$gVv1d7GnfiQzcBsc5/hOoegxg6s93Cp64iXdWSQK4YRvGrpXm2lje', 'XsezXcK6ByPkgbmx7UJe0pu07b9CdQMyOOJjP0nnGxDQAwqXt8hNbSVZH9sP', NULL, NULL, NULL, '', '', NULL, NULL, NULL),
(2, 'dev', 'dev@gmail.com', NULL, '$2y$10$TEyZgBRB6clNnzdK.hlajePlHzW4B/Tmv/82pwd1F8QLpIkLMCkp6', 'lgA7QxL132HZsPFyYPJ3NJy2oV2BT6TYmVfBIyB9gBMj6wZml59b0cmLgXPm', NULL, NULL, NULL, '', '', NULL, '2021-03-02 05:15:21', NULL),
(3, 'user', 'user@gmail.com', NULL, '$2y$10$gKbxDurXLyvLD1rImpcphur9qzjUKp2o.l12pq99jhpuSZ0RxA.oe', NULL, NULL, NULL, NULL, '', '', '2021-02-01 07:00:41', '2021-03-01 23:13:43', NULL),
(4, 'null', 'null@gmail.com', NULL, '$2y$10$8mbTxGzH/Wopg0vG7SqaveXlh6Cc2wzNGcT5UWHyP/6ZkNBt7sIV2', NULL, NULL, NULL, NULL, '', '', '2021-02-01 23:54:12', '2021-02-02 20:16:50', NULL),
(20, 'test', 'test@gmail.com', NULL, '$2y$10$5tDmXj70x5W7gtVyhR.dS.xYNulkekRpO/25eFiP.sfxU5b4EV3uW', NULL, NULL, NULL, NULL, '', '', '2021-02-02 20:51:03', '2021-02-02 20:51:26', NULL),
(26, 'next', 'next@gmail.com', NULL, '$2y$10$.I5bhV.4GKnTTtycnjbcBu4.sOuDVdVdXh6P2dV7RR/F2zo.1HYDC', NULL, NULL, NULL, NULL, '', '', '2021-02-28 23:44:12', '2021-03-01 06:30:05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(31, 2, 2, NULL, NULL, NULL),
(32, 26, 4, NULL, NULL, NULL),
(33, 26, 11, NULL, NULL, NULL),
(36, 3, 11, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_user_id_foreign` (`user_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
