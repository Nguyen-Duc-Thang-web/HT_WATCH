-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2024 at 04:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-watch`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `alt`, `created_at`, `updated_at`) VALUES
(1, 'public/images/brVoTDEMdFBlo254ceuVtPsxDtKBH3GJDD7bsijW.png', 'Saepe tempora quae sunt laboriosam iure a maiores. Tenetur est occaecati molestiae non. Occaecati deserunt eaque beatae unde placeat esse. Necessitatibus tempore veniam non at. Omnis vero ut ut vel.', '2024-08-01 06:41:47', '2024-08-01 06:42:15'),
(2, 'public/images/YG52Y5jzWqwDYO9uPdvQlZswuk0EeYI12oUPwwDK.png', 'Est fuga ad facilis non. Veritatis eaque dolores qui magnam voluptate. Non modi possimus non itaque dolorem enim. Id nobis in blanditiis tempora ea nihil et ipsa.', '2024-08-01 06:41:47', '2024-08-01 06:42:32'),
(3, 'public/images/BqMGvGPSnMocbmlxfFnz2bjY8wBVjkokFDyPOf5p.png', 'Sed voluptas quidem vel voluptatibus eius totam perferendis. Molestias qui non dolor nemo. Ut quasi ea vel temporibus.', '2024-08-01 06:41:47', '2024-08-01 06:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `fullname`, `user_id`, `phone`, `address`, `notes`, `status`, `total`, `created_at`, `updated_at`) VALUES
(69, 'Admin', 1, '+1 (808) 994-1130', '253 Lesley PortsNorth Annamarie, KS 96622-7891', '123', '0', 1400000, '2024-08-02 17:33:13', '2024-08-02 17:33:13'),
(70, 'Admin', 1, '+1 (808) 994-1130', '253 Lesley PortsNorth Annamarie, KS 96622-7891', 'nódjosdjo', '0', 650000, '2024-08-02 17:36:37', '2024-08-02 17:36:37'),
(71, 'Shanie Kris', 2, '986-460-3623', '34847 Price ShoreWest Lindseytown, SD 80010', 'zcjbkjxzbcj', '3', 10400000, '2024-08-02 17:39:34', '2024-08-02 17:44:57'),
(72, 'Shanie Kris', 2, '986-460-3623', '34847 Price Shore\nWest Lindseytown, SD 80010', '', '0', 600000, '2024-08-02 17:40:35', '2024-08-02 17:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `watch_id` bigint UNSIGNED NOT NULL,
  `bill_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `user_id`, `watch_id`, `bill_id`, `quantity`, `created_at`, `updated_at`) VALUES
(60, 1, 6, 70, 1, '2024-08-02 17:36:37', '2024-08-02 17:36:37'),
(61, 2, 11, 71, 2, '2024-08-02 17:39:34', '2024-08-02 17:39:34'),
(62, 2, 3, 72, 1, '2024-08-02 17:40:35', '2024-08-02 17:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `watch_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `watch_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(48, 3, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`, `image`, `status`, `count`, `created_at`, `updated_at`) VALUES
(1, 'Abc', 'https://via.placeholder.com/640x480.png/008877?text=nostrum', '0', 37, '2024-08-01 06:27:21', '2024-08-02 17:44:42'),
(2, 'SamSung', 'https://via.placeholder.com/640x480.png/00cc77?text=nobis', '1', 14, '2024-08-01 06:27:21', '2024-08-01 06:27:21'),
(3, 'Apple', 'https://via.placeholder.com/640x480.png/008811?text=libero', '1', 53, '2024-08-01 06:27:21', '2024-08-01 06:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `name`, `discount`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '10.00', '2024-08-16 14:24:38', '2024-08-31 14:24:38'),
(2, 'ábjbjkzv', 'hihizx', '25.00', '2024-08-02 07:25:26', '2024-08-02 07:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(67, '2014_10_12_000000_create_users_table', 1),
(68, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(69, '2014_10_12_100000_create_password_resets_table', 1),
(70, '2019_08_19_000000_create_failed_jobs_table', 1),
(71, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(72, '2024_07_17_144201_create_catagories_table', 1),
(73, '2024_07_17_144202_create_watches_table', 1),
(74, '2024_07_17_144352_create_carts_table', 1),
(75, '2024_07_17_144409_create_bills_table', 1),
(76, '2024_07_17_144437_create_bill_details_table', 1),
(77, '2024_07_30_170325_create_banner_table', 1),
(78, '2024_08_02_142124_create_coupons_table', 2);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `email_verified_at`, `password`, `address`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '2024-08-01 06:25:31', '$2y$12$I5FuRYdhET5ATbTD5IKO9uEd4HeiwLLvAH9ojWkkvH0uE8UxvXTk.', '253 Lesley Ports\nNorth Annamarie, KS 96622-7891', '+1 (808) 994-1130', 'JrrJv2acRwR7eM24bkOa017Zjmqfl4taeGzArshFiZYGshIyX4U8gisCMZVy', '2024-08-01 06:25:31', '2024-08-01 06:25:31'),
(2, 'Shanie Kris', 'mebmer', 'nicholaus74@example.net', '2024-08-01 06:25:31', '$2y$12$I5FuRYdhET5ATbTD5IKO9uEd4HeiwLLvAH9ojWkkvH0uE8UxvXTk.', '34847 Price Shore\nWest Lindseytown, SD 80010', '986-460-3623', 'YrJzVH6xJHBJ9L9g3KrSk3CnAqBVB9y2Qghxn4Ec0EbV72V91fmGHCahhGXT', '2024-08-01 06:25:31', '2024-08-01 06:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `id` bigint UNSIGNED NOT NULL,
  `catagory_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`id`, `catagory_id`, `name`, `image`, `price`, `quantity`, `short_description`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Skmei Đồng Hồ Điện Tử Đa Năng Chống Thấm Nước 2243', 'public/images/71QJ4WbCUKjflRa211o8vbxjcgkSx2XSzSP4VhgY.jpg', 1234, 118, '123', '123', '2024-08-01 06:30:17', '2024-08-01 09:22:59'),
(2, 1, 'Đồng Hồ Điện Tử Thể Thao SKMEI 2091 Chống Nước Đếm Ngược 5 Chế Độ Báo Thức', 'public/images/aqx7P5LFdHRvzX0lHIScWqFRTBRF9ZOJSZfZ2x4Y.jpg', 500000, -1, 'Đồng hồ thể thao SKMEI 2091', 'Chống nước, đếm ngược, 5 chế độ báo thức.', NULL, '2024-08-02 17:26:42'),
(3, 1, 'Đồng Hồ Quartz Nam Chống Thấm Nước SKMEI 9288', 'public/images/STpaVLa15HT1pQEePL2UA8CwQK0pje9uhBpAe0LY.jpg', 600000, 11, 'Đồng hồ Quartz nam SKMEI 9288', 'Chống thấm nước, thiết kế thời trang.', NULL, '2024-08-01 09:16:53'),
(4, 1, 'Smael 8088 Đồng hồ nam chống nước Đồng hồ đếm ngược Đồng hồ bấm giờ Đèn Led chuyển động điện tử Đồng hồ đeo tay 5Alarm Đồng hồ kỹ thuật số 2 lần', 'public/images/RgboD2L50yIcOAtuCO8onKUfSgLt3HtROkAFbKdD.jpg', 550000, 19, 'Đồng hồ Smael 8088', 'Chống nước, đếm ngược, đèn LED, 5 báo thức.', NULL, '2024-08-01 09:14:08'),
(5, 1, 'Đồng Hồ Điện Tử Thể Thao SKMEI 2103 Chống Thấm Nước 50m Màn Hình LED 3 Thời Gian Chrono Cho Nam', 'public/images/F77Lkd8xF17KZa1BwA0nkfQMJ1aOh2fTplUPzKzE.jpg', 700000, 12, 'Đồng hồ thể thao SKMEI 2103', 'Chống thấm nước 50m, màn hình LED, 3 thời gian chrono.', NULL, '2024-08-01 06:34:52'),
(6, 1, 'Đồng Hồ Điện Tử Skmei 1988 Chống Nước Đa Năng Dành Cho Nam', 'public/images/1d4GkgztqULknexuOATO0Lk2oUbRkss4DmfZWm1o.jpg', 650000, 12, 'Đồng hồ Skmei 1988', 'Chống nước, đa năng, dành cho nam.', NULL, '2024-08-02 17:36:37'),
(7, 1, 'Smael 8060 Thương Hiệu Thời Trang Đồng Hồ Hợp Kim Nam Đa Chức Năng Thoáng Mát Hiển Thị Kép Ngoài Trời Chống Thấm Nước Đồng Hồ Điện Tử', 'public/images/T0Y4ZQQAijyFMlECoZhth8CNynvX2ETtYaWqp26f.jpg', 750000, 20, 'Đồng hồ Smael 8060', 'Thời trang, hợp kim, đa chức năng, chống thấm nước.', NULL, '2024-08-01 07:31:56'),
(8, 1, 'Đồng Hồ Quartz 3 Thanh Chống Thấm Nước SKMEI 9058 Với Dây Đeo Da', 'public/images/oEPoJ5aknxIykebAupHbpxh27jvNTqVccoUVaOEi.jpg', 800000, 14, 'Đồng hồ Quartz SKMEI 9058', 'Chống thấm nước, dây đeo da.', NULL, '2024-08-01 06:35:33'),
(9, 1, 'Skmei Đồng Hồ quartz 3bar Không Thấm Nước skmei 2108', 'public/images/xIMjYpoAAp9j87s7Cs3zB4xlG1mI16Bxj3iquPG9.jpg', 550000, 16, 'Đồng hồ Skmei 2108', 'Quartz, không thấm nước, 3bar.', NULL, '2024-08-01 06:35:58'),
(10, 2, 'Samsung Galaxy Watch FE', 'public/images/JEpLYb67jPHJ0Tn6EuloUH6Gc0QPBed1HqZmmNOO.png', 6900000, 49, 'ƯU ĐÃI THANH TOÁN\r\n Giảm 1% tối đa 100.000đ khi thanh toán qua Zalopay\r\n Giảm 20% tối đa 500k khi mở thẻ tín dụng TPBank EVO\r\n Ưu đãi trả góp 0% qua Shinhan Finance\r\n Ưu đãi trả góp 0% qua Mirae Asset Finance', 'Đặc điểm nổi bật\r\n\r\nThiết kế tinh tế, thời thượng với 2 tùy chọn màu sắc độc đáo gồm: Đen và Vàng hồng.\r\n\r\nHiệu năng vượt trội nhờ bộ xử lý Exynos W920 cùng RAM 1.5GB, đảm bảo khả năng hoạt động mượt mà và đa nhiệm tốt.\r\n\r\nViên pin dung lượng 247mAh, Galaxy Watch FE cung cấp thời gian sử dụng lên đến 40 giờ.\r\n\r\nĐược trang bị các tính năng theo dõi sức khỏe và thể thao toàn diện.\r\n\r\nGiao diện của đồng hồ được thiết kế đơn giản và dễ dàng thao tác.\r\n\r\nKháng nước đạt chuẩn 5 ATM giúp người dùng yên tâm khi sử dụng trong các hoạt động dưới nước.', '2024-08-01 21:32:53', '2024-08-01 21:38:18'),
(11, 2, 'Samsung Galaxy Watch7 40mm BT (L300)', 'public/images/N5RS24g0f6WvyzRERljO8wiASXmRxuxRjEsZqgu8.png', 5200000, 48, 'ƯU ĐÃI THANH TOÁN\r\n Giảm 1% tối đa 100.000đ khi thanh toán qua Zalopay\r\n Giảm 20% tối đa 500k khi mở thẻ tín dụng TPBank EVO\r\n Ưu đãi trả góp 0% qua Shinhan Finance\r\n Ưu đãi trả góp 0% qua Mirae Asset Finance', 'Đặc điểm nổi bật\r\n\r\nThiết kế tinh tế, thời thượng với 2 tùy chọn màu sắc độc đáo gồm: Đen và Vàng hồng.\r\n\r\nHiệu năng vượt trội nhờ bộ xử lý Exynos W920 cùng RAM 1.5GB, đảm bảo khả năng hoạt động mượt mà và đa nhiệm tốt.\r\n\r\nViên pin dung lượng 247mAh, Galaxy Watch FE cung cấp thời gian sử dụng lên đến 40 giờ.\r\n\r\nĐược trang bị các tính năng theo dõi sức khỏe và thể thao toàn diện.\r\n\r\nGiao diện của đồng hồ được thiết kế đơn giản và dễ dàng thao tác.\r\n\r\nKháng nước đạt chuẩn 5 ATM giúp người dùng yên tâm khi sử dụng trong các hoạt động dưới nước.', '2024-08-01 21:51:47', '2024-08-02 17:39:34'),
(12, 2, 'Samsung Galaxy Fit3 (R390)- Chính Hâng', 'public/images/x3s1snvHQugLonIAsWnRnRAO4pFkQSRGsxBdSqG6.png', 1903653, 12, 'ƯU ĐÃI THANH TOÁN\r\n Giảm 1% tối đa 100.000đ khi thanh toán qua Zalopay\r\n Giảm 20% tối đa 500k khi mở thẻ tín dụng TPBank EVO\r\n Ưu đãi trả góp 0% qua Shinhan Finance\r\n Ưu đãi trả góp 0% qua Mirae Asset Finance', 'Đặc điểm nổi bật\r\n\r\nThiết kế tinh tế, thời thượng với 2 tùy chọn màu sắc độc đáo gồm: Đen và Vàng hồng.\r\n\r\nHiệu năng vượt trội nhờ bộ xử lý Exynos W920 cùng RAM 1.5GB, đảm bảo khả năng hoạt động mượt mà và đa nhiệm tốt.\r\n\r\nViên pin dung lượng 247mAh, Galaxy Watch FE cung cấp thời gian sử dụng lên đến 40 giờ.\r\n\r\nĐược trang bị các tính năng theo dõi sức khỏe và thể thao toàn diện.\r\n\r\nGiao diện của đồng hồ được thiết kế đơn giản và dễ dàng thao tác.\r\n\r\nKháng nước đạt chuẩn 5 ATM giúp người dùng yên tâm khi sử dụng trong các hoạt động dưới nước.', '2024-08-01 21:53:19', '2024-08-01 21:53:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_details_user_id_foreign` (`user_id`),
  ADD KEY `bill_details_watch_id_foreign` (`watch_id`),
  ADD KEY `bill_details_bill_id_foreign` (`bill_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_watch_id_foreign` (`watch_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watches_catagory_id_foreign` (`catagory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bill_details_watch_id_foreign` FOREIGN KEY (`watch_id`) REFERENCES `watches` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_watch_id_foreign` FOREIGN KEY (`watch_id`) REFERENCES `watches` (`id`);

--
-- Constraints for table `watches`
--
ALTER TABLE `watches`
  ADD CONSTRAINT `watches_catagory_id_foreign` FOREIGN KEY (`catagory_id`) REFERENCES `catagories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
