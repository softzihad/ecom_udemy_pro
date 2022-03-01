-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 03:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_udemy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin123', 'admin@example.com', '2022-02-12 13:32:49', '$2y$10$S/Wii97KIomZh2ymLrt6QerQ4Hk1Q1hJrd8ibLVlri/87HhGmY2rG', 'rf94ex59EwrZnGCD6xUyV3NomD5Mva0JcdUSEECRzl4CLrG5vOZjGJ8QEgJb', NULL, 'uploads/admin-images/1644863611avatar-1.png', '2022-02-12 13:32:49', '2022-02-15 10:05:08'),
(2, 'adminAnother', 'admin1@example.com', '2022-02-12 13:32:49', '$2y$10$S/Wii97KIomZh2ymLrt6QerQ4Hk1Q1hJrd8ibLVlri/87HhGmY2rG', 'nCmSGbimf8nP0r3fkYjUYIJdLFJ8l0PFn1z9NcXQtsJNmSFaaF6lHS7UxQqF', NULL, 'uploads/admin-images/1644863611avatar-1.png', '2022-02-12 13:32:49', '2022-02-15 10:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_bng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_bng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_bng`, `brand_slug_en`, `brand_slug_bng`, `brand_image`, `created_at`, `updated_at`) VALUES
(2, 'Apple', 'এ্যাপল', 'Apple', 'এ্যাপল', 'uploads/brand/1645192636Apple-Logo-PNG-Image-715x715.png', '2022-02-17 14:51:45', '2022-02-24 10:46:15'),
(3, 'Vivo', 'ভিভো', 'Vivo', 'ভিভো', 'uploads/brand/1645177335vivo-Phone-logo.png', '2022-02-18 03:42:15', '2022-02-24 10:47:26'),
(4, 'Samsung', 'স্যামসাং', 'Samsung', 'স্যামসাং', 'uploads/brand/1645192710Samsung_logo.png', '2022-02-18 04:33:04', '2022-02-24 10:47:09'),
(5, 'Xiaomi', 'শাওমি', 'Xiaomi', 'শাওমি', 'uploads/brand/1645192796xiaomi.png', '2022-02-18 05:42:52', '2022-02-24 10:47:50'),
(6, 'Huawei', 'হুয়াওয়ে', 'Huawei', 'হুয়াওয়ে', 'uploads/brand/1645192820Huawei-Logo.wine.png', '2022-02-18 05:50:18', '2022-03-01 07:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name_bng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug_bng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_bng`, `category_slug_en`, `category_slug_bng`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'ফ্যাশন', 'fashion', 'ফ্যাশন', 'fa fa-ravelry', '2022-02-24 10:52:44', '2022-02-24 10:52:44'),
(2, 'Electronics', 'ইলেকট্রনিক্স', 'electronics', 'ইলেকট্রনিক্স', 'fa fa-user', '2022-02-24 10:53:36', '2022-02-24 10:53:36'),
(3, 'Sweet Home', 'সুইট হোম', 'sweet-home', 'সুইট-হোম', 'fa fa-shopping-cart', '2022-02-24 10:54:29', '2022-02-24 10:54:29'),
(4, 'Appliances', 'যন্ত্রপাতি', 'appliances', 'যন্ত্রপাতি', 'fa fa-telegram', '2022-02-24 10:55:00', '2022-02-24 10:55:00'),
(5, 'Beauty', 'সৌন্দর্য', 'beauty', 'সৌন্দর্য', 'fa fa-id-card-o', '2022-02-24 10:55:54', '2022-02-24 10:55:54');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_02_12_130759_create_sessions_table', 1),
(7, '2022_02_12_191221_create_admins_table', 2),
(8, '2022_02_17_132457_create_brands_table', 3),
(9, '2022_02_19_102630_create_categories_table', 4),
(10, '2022_02_19_125207_create_sub_categories_table', 5),
(11, '2022_02_19_190622_create_sub_sub_categories_table', 6),
(12, '2022_02_23_153447_create_products_table', 7),
(13, '2022_02_23_155045_create_multi_imgs_table', 7),
(14, '2022_03_01_113802_create_sliders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/multi-image/1725842249744436.jpeg', '2022-02-25 06:09:02', '2022-02-26 10:03:48'),
(4, 2, 'uploads/products/multi-image/1725737292069306.jpeg', '2022-02-25 06:15:32', NULL),
(5, 2, 'uploads/products/multi-image/1725737292250511.jpeg', '2022-02-25 06:15:32', NULL),
(6, 2, 'uploads/products/multi-image/1725737292419490.jpeg', '2022-02-25 06:15:32', NULL),
(10, 4, 'uploads/products/multi-image/1726096197811161.jpeg', '2022-03-01 05:20:11', '2022-03-01 05:20:11'),
(11, 4, 'uploads/products/multi-image/1726096197979780.jpeg', '2022-03-01 05:20:11', '2022-03-01 05:20:11'),
(12, 4, 'uploads/products/multi-image/1726096198150107.jpeg', '2022-03-01 05:20:12', '2022-03-01 05:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_bng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_bng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_bng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_bng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_bng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_bng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_bng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_bng`, `product_slug_en`, `product_slug_bng`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_bng`, `product_size_en`, `product_size_bng`, `product_color_en`, `product_color_bng`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_bng`, `long_descp_en`, `long_descp_bng`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 2, 'Winter Hoody', 'শীতকালীন হুডি', 'winter-hoody', 'শীতকালীন-হুডি', '619', '100', 'Ipsum,Amet', 'ট্যাগ-1,ট্যাগ-2', 'Small,Medium,Large', 'Small,Medium,Large', 'red,green,blue', 'red,green,blue', '500', '50', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>', '<p>প্রকাশনা এবং গ্রাফিক ডিজাইনে, Lorem ipsum হল একটি স্থানধারক পাঠ্য যা সাধারণত অর্থপূর্ণ বিষয়বস্তুর উপর নির্ভর না করে একটি নথির ভিজ্যুয়াল ফর্ম বা টাইপফেস প্রদর্শন করতে ব্যবহৃত হয়৷ প্রকাশনা এবং গ্রাফিক ডিজাইনে, Lorem ipsum হল একটি স্থানধারক পাঠ্য যা সাধারণত ভিজ্যুয়াল ফর্ম প্রদর্শন করতে ব্যবহৃত হয়৷ অর্থপূর্ণ সামগ্রীর উপর নির্ভর না করে একটি নথি বা টাইপফেসের। প্রকাশনা এবং গ্রাফিক ডিজাইনে, Lorem ipsum হল একটি স্থানধারক পাঠ্য যা সাধারণত অর্থপূর্ণ বিষয়বস্তুর উপর নির্ভর না করে একটি নথি বা টাইপফেসের ভিজ্যুয়াল ফর্ম প্রদর্শন করতে ব্যবহৃত হয়।</p>', 'uploads/products/thambnail/1725842214100399.jpeg', 1, 1, 1, 1, 1, '2022-02-25 06:09:02', '2022-03-01 05:18:40'),
(2, 3, 1, 1, 2, 'Exercise Shoes', 'ব্যায়াম জুতা', 'exercise-shoes', 'ব্যায়াম-জুতা', '619s', '1200', 'Lorem,Ipsum,Amet', 'ট্যাগ-1,ট্যাগ-2', 'Small,Medium', 'ছোট,মধ্যম,বড়', 'red,green,blue', 'লাল,কালো', '800', '80', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate', 'প্রকাশনা এবং গ্রাফিক ডিজাইনে, হল একটি স্থানধারক পাঠ্য যা সাধারণত প্রদর্শন করতে ব্যবহৃত হয়', '<p>In publishing and graphic <em><u><strong><span style=\"color:#e74c3c\">design</span></strong></u></em>, <a href=\"https://www.facebook.com/\">facebook</a> ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>', 'প্রকাশনা এবং গ্রাফিক ডিজাইনে, একটি স্থানধারক পাঠ্য যা সাধারণত অর্থপূর্ণ বিষয়বস্তুর উপর নির্ভর না করে একটি নথি বা টাইপফেসের ভিজ্যুয়াল ফর্ম প্রদর্শন করতে ব্যবহৃত হয়। চূড়ান্ত অনুলিপি উপলব্ধ হওয়ার আগে একটি স্থানধারক হিসাবে ব্যবহার করা যেতে পারে।\r\n\r\nপ্রকাশনা এবং গ্রাফিক ডিজাইনে, একটি স্থানধারক পাঠ্য যা সাধারণত অর্থপূর্ণ বিষয়বস্তুর উপর নির্ভর না করে একটি নথি বা টাইপফেসের ভিজ্যুয়াল ফর্ম প্রদর্শন করতে ব্যবহৃত হয়। চূড়ান্ত অনুলিপি উপলব্ধ হওয়ার আগে একটি স্থানধারক হিসাবে ব্যবহার করা যেতে পারে।', 'uploads/products/thambnail/1725737291871284.jpeg', 1, NULL, 1, 1, 0, '2022-02-25 06:15:32', '2022-03-01 04:01:20'),
(4, 6, 1, 1, 1, 'Man\'s T-Shirt', 'পুরুষদের টি-শার্ট', 'man\'s-t-shirt', 'পুরুষদের-টি-শার্ট', '4324', '100', 'Lorem,Ipsum', 'ট্যাগ-2,ট্যাগ-3', 'Small,Medium,Large', 'Small,Medium,Large', 'red,green,blue', 'red,green,blue', '200', '180', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'প্রকাশনা এবং গ্রাফিক ডিজাইনে, Lorem ipsum হল একটি স্থানধারক পাঠ্য যা সাধারণত অর্থপূর্ণ বিষয়বস্তুর উপর নির্ভর না করে একটি নথি বা টাইপফেসের ভিজ্যুয়াল ফর্ম প্রদর্শন করতে ব্যবহৃত হয়।', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>', 'uploads/products/thambnail/1726096197386698.jpeg', 1, 1, 1, 1, 1, '2022-03-01 05:20:11', '2022-03-01 05:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Xse8rxiCod1mmYtcvW7V3phZMsfFs2UA6GXurgtU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiYW1PNXNMUm15emNaUUFvVllwNWdxWDlTOGozcTdveURwRnNrUGdUcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9lY29tLXVkZW15LnRlc3QvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSUV6YlN2b2hsemRBVktiZVhkNnlmLm8uejJlSWN1SzMvd2VHaVdydDhKL3FSbVFYUUFPRzIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJElFemJTdm9obHpkQVZLYmVYZDZ5Zi5vLnoyZUljdUszL3dlR2lXcnQ4Si9xUm1RWFFBT0cyIjtzOjE5OiJwYXNzd29yZF9oYXNoX2FkbWluIjtzOjYwOiIkMnkkMTAkUy9XaWk5N0tJb21aaDJ5bUxydDZRZXJRNEhrMVExaEpyZDhpYkxWbHJpLzg3SGhHbVkyckciO30=', 1646142703);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/slider/1726103568784471.jpg', 'Slider Title', 'Slider Decription', 1, '2022-03-01 06:09:30', '2022-03-01 07:17:21'),
(2, 'uploads/slider/1726101660094347.jpg', 'titile', NULL, 1, '2022-03-01 06:47:00', '2022-03-01 07:16:28'),
(4, 'uploads/slider/1726103865706090.jpg', NULL, NULL, 1, '2022-03-01 07:22:04', '2022-03-01 07:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_name_bng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_slug_bng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_bng`, `subcategory_slug_en`, `subcategory_slug_bng`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mans Top Ware', 'ম্যান টপ ওয়্যার', 'mans-top-ware', 'ম্যান-টপ-ওয়্যার', '2022-02-24 10:58:37', '2022-02-24 10:58:37'),
(2, 1, 'Mans Bottom Ware', 'ম্যানস বটম ওয়ার', 'mans-bottom-ware', 'ম্যানস-বটম-ওয়ার', '2022-02-24 10:58:57', '2022-02-24 10:58:57'),
(3, 1, 'Mans Footwear', 'মানস পাদুকা', 'mans-footwear', 'মানস-পাদুকা', '2022-02-24 10:59:27', '2022-02-24 10:59:27'),
(4, 1, 'Women Footwear', 'মহিলাদের পাদুকা', 'women-footwear', 'মহিলাদের-পাদুকা', '2022-02-24 10:59:46', '2022-02-24 10:59:46'),
(5, 2, 'Computer Peripherals', 'কম্পিউটার পেরিফেরাল', 'computer-peripherals', 'কম্পিউটার-পেরিফেরাল', '2022-02-24 11:00:42', '2022-02-24 11:00:42'),
(6, 2, 'Mobile Accessory', 'মোবাইল অ্যাকসেসরি', 'mobile-accessory', 'মোবাইল-অ্যাকসেসরি', '2022-02-24 11:00:59', '2022-02-24 11:00:59'),
(7, 2, 'Gaming', 'গেমিং', 'gaming', 'গেমিং', '2022-02-24 11:01:20', '2022-02-24 11:01:20'),
(8, 3, 'Home Furnishings', 'বাড়ির আসবাবপত্র', 'home-furnishings', 'বাড়ির-আসবাবপত্র', '2022-02-24 11:01:55', '2022-02-24 11:01:55'),
(9, 3, 'Living Room', 'বসার ঘর', 'living-room', 'বসার-ঘর', '2022-02-24 11:02:32', '2022-02-24 11:02:32'),
(10, 3, 'Home Decor', 'বাড়ির সাজসজ্জা', 'home-decor', 'বাড়ির-সাজসজ্জা', '2022-02-24 11:03:06', '2022-02-24 11:03:06'),
(11, 4, 'Televisions', 'টেলিভিশন', 'televisions', 'টেলিভিশন', '2022-02-24 11:03:50', '2022-02-24 11:03:50'),
(12, 4, 'Washing Machines', 'ওয়াশিং মেশিন', 'washing-machines', 'ওয়াশিং-মেশিন', '2022-02-24 11:04:09', '2022-02-24 11:04:09'),
(13, 4, 'Refrigerators', 'রেফ্রিজারেটর', 'refrigerators', 'রেফ্রিজারেটর', '2022-02-24 11:04:28', '2022-02-24 11:04:28'),
(14, 5, 'Beauty and Personal Care', 'সৌন্দর্য এবং ব্যক্তিগত যত্ন', 'beauty-and-personal-care', 'সৌন্দর্য-এবং-ব্যক্তিগত-যত্ন', '2022-02-24 11:04:57', '2022-02-24 11:04:57'),
(15, 5, 'Food and Drinks', 'খাদ্য ও পানীয়', 'food-and-drinks', 'খাদ্য-ও-পানীয়', '2022-02-24 11:05:14', '2022-02-24 11:05:14'),
(16, 5, 'Body Care', 'শরীরের যত্ন', 'body-care', 'শরীরের-যত্ন', '2022-02-24 11:05:49', '2022-02-24 11:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsubcategory_name_bng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsubcategory_slug_bng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_bng`, `subsubcategory_slug_en`, `subsubcategory_slug_bng`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mans T-shirt', 'ম্যানস টি-শার্ট', 'mans-t-shirt', 'ম্যানস-টি-শার্ট', '2022-02-24 11:08:02', '2022-02-24 11:10:19'),
(2, 1, 1, 'Mans Casual Shirts', 'ম্যানস ক্যাজুয়াল শার্ট', '', '', '2022-02-24 11:08:40', '2022-02-24 11:08:40'),
(3, 1, 1, 'Mans Kurtas', 'ম্যানস কুর্তা', '', '', '2022-02-24 11:09:58', '2022-02-24 11:09:58'),
(4, 1, 2, 'Mans Jeans', 'ম্যানস জিন্স', 'mans-jeans', 'ম্যানস-জিন্স', '2022-02-24 11:10:54', '2022-02-24 11:11:44'),
(5, 1, 2, 'Mans Trousers', 'মানস ট্রাউজার্স', '', '', '2022-02-24 11:11:18', '2022-02-24 11:11:18'),
(6, 1, 2, 'Mans Cargos', 'ম্যানস কার্গোস', '', '', '2022-02-24 11:12:12', '2022-02-24 11:12:12'),
(7, 1, 3, 'Mans Sports Shoes', 'ম্যানস ক্রীড়া জুতা', 'mans-sports-shoes', 'ম্যানস-ক্রীড়া-জুতা', '2022-02-24 11:13:17', '2022-02-24 11:13:50'),
(8, 1, 3, 'Mans Casual Shoes', 'ম্যানস ক্যাজুয়াল জুতা', '', '', '2022-02-24 11:14:24', '2022-02-24 11:14:24'),
(9, 1, 3, 'Mans Formal Shoes', 'মানস ফরমাল জুতা', '', '', '2022-02-24 11:14:46', '2022-02-24 11:14:46'),
(10, 1, 4, 'Women Flats', 'মহিলা ফ্ল্যাট', '', '', '2022-02-24 11:15:20', '2022-02-24 11:15:20'),
(11, 1, 4, 'Women Heels', 'মহিলাদের হিল', '', '', '2022-02-24 11:15:40', '2022-02-24 11:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'User', 'admin@example.com', NULL, NULL, '$2y$10$IEzbSvohlzdAVKbeXd6yf.o.z2eIcuK3/weGiWrt8J/qRmQXQAOG2', NULL, NULL, '8cmApBSZ8ppABcjnEqIauiLCEyZQIbLej2qeCsY1vvkHkKfFs6x2MhE4fYsC', NULL, '', '2022-02-12 07:14:09', '2022-02-17 13:47:37'),
(2, 'Ruhul Amin', 'amin@gmail.com', '01245785966', NULL, '$2y$10$IEzbSvohlzdAVKbeXd6yf.o.z2eIcuK3/weGiWrt8J/qRmQXQAOG2', NULL, NULL, 'HAsOytInGyVUZOVajkfyfSEGYgYSXebNFgZh5T5uC0an9dNz9ZlmTrCy8ygM', NULL, 'uploads/user-images/1645018761img-3.png', '2022-02-15 14:22:32', '2022-02-17 05:20:07'),
(3, 'sabbir', 'sabbir@gmail.com', '01245785965', NULL, '$2y$10$QD0OqRhno9wU1D8S1zzneOvgu/PnIK8xgkNaLXiOC0e3BsGdqXMWi', NULL, NULL, NULL, NULL, NULL, '2022-02-28 07:17:30', '2022-02-28 07:17:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
