-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 10:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spree_retail`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin_profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `main` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `main`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Featured', 'M', 'm-1', '2022-02-03 05:00:55', '2022-02-03 05:00:55'),
(2, 'Fashion', 'Shoes', 'shoes-1', '2022-02-03 10:55:10', '2022-02-03 10:55:10'),
(3, 'Health and Beauty', 'Soap', 'Soap-1', NULL, NULL),
(4, 'Fashion', 'Men Shoes', 'men-shoes-1', '2022-02-03 11:20:53', '2022-02-03 11:20:53'),
(5, 'Featured', 'New Arrivals', 'new-arrivals-1', '2022-02-03 11:26:58', '2022-02-03 11:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `category_parent`
--

CREATE TABLE `category_parent` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_parent`
--

INSERT INTO `category_parent` (`id`, `category_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '2022-02-03 11:20:53', '2022-02-03 11:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 2000007, 2, NULL, NULL),
(2, 2000008, 2, NULL, NULL),
(8, 2000014, 2, NULL, NULL),
(9, 2000015, 2, NULL, NULL),
(10, 2000016, 2, NULL, NULL),
(11, 2000017, 2, NULL, NULL),
(12, 2000018, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 'Red', '#FF0000', NULL, NULL),
(2, 'Black', '#000000', '2022-02-03 17:08:57', '2022-02-03 17:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_applications`
--

CREATE TABLE `kitchen_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_04_06_143936_create_roles_table', 1),
(7, '2021_04_06_144023_create_role_user_table', 1),
(8, '2021_04_06_145131_create_user_profile_table', 1),
(9, '2021_04_06_211430_create_products_table', 1),
(10, '2021_04_06_211432_create_categories_table', 1),
(11, '2021_04_06_211603_create_category_product_table', 1),
(12, '2021_04_06_211700_create_category_parent_table', 1),
(13, '2021_04_09_104751_create_user_address_table', 1),
(14, '2021_04_09_164644_create_user_stripe_table', 1),
(15, '2021_04_09_180840_create_orders_table', 1),
(16, '2021_04_09_181039_create_order_product_table', 1),
(17, '2021_04_10_075830_create_vendor_request_table', 1),
(18, '2021_04_10_084849_create_vendor_profile_table', 1),
(19, '2021_04_10_211945_create_vendor_product_dispatch_table', 1),
(20, '2021_04_12_223301_create_vendor_stripe_table', 1),
(21, '2021_04_14_165713_create_vendor_transfer_table', 1),
(22, '2021_04_20_114146_create_user_card_table', 1),
(23, '2021_04_20_214411_create_notifications_table', 1),
(24, '2021_04_21_122656_create_banners_table', 1),
(25, '2021_05_07_103206_create_careers_table', 1),
(26, '2021_05_07_111543_create_applications_table', 1),
(27, '2021_05_10_204825_create_kitchen_applications_table', 1),
(28, '2021_05_23_113056_create_shoppingcart_table', 1),
(29, '2021_07_13_155113_create_sizes_table', 1),
(30, '2021_07_13_160703_create_product_size_table', 1),
(31, '2021_07_13_172026_add_field_type_size_product_table', 1),
(32, '2021_07_13_172301_create_type_sizes_table', 1),
(33, '2021_07_13_210231_create_colors_table', 1),
(34, '2021_07_13_212736_create_product_colors_table', 1),
(35, '2021_07_13_220158_create_product_color_sizes_table', 1),
(36, '2021_07_18_134944_create_product_images_table', 1),
(37, '2021_09_12_204923_update_brand_profile_add_brand_picture', 1),
(38, '2022_02_03_150357_add_type_size_id_to_sizes_table', 2),
(39, '2022_02_03_202419_change_product_attributes_type_in_to_decimal', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `charge_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` int(11) NOT NULL,
  `billing_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_app_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_postalcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name_on_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_discount` int(11) NOT NULL DEFAULT 0,
  `billing_discount_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_subtotal` int(11) NOT NULL DEFAULT 0,
  `billing_tax` int(11) NOT NULL DEFAULT 0,
  `billing_total` int(11) NOT NULL DEFAULT 0,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stripe',
  `shipped` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fedex_delivery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fedex_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fedex_time` timestamp NULL DEFAULT NULL,
  `fedex_tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `vendor_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `required` int(11) NOT NULL DEFAULT 0,
  `available` int(11) NOT NULL DEFAULT 0,
  `sold` int(11) NOT NULL DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inactive` date DEFAULT NULL,
  `length` decimal(7,2) NOT NULL,
  `width` decimal(7,2) NOT NULL,
  `height` decimal(7,2) NOT NULL,
  `weight` decimal(7,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `slug`, `main`, `featured`, `name`, `price`, `quantity`, `remaining`, `required`, `available`, `sold`, `description`, `thumbnail`, `status`, `inactive`, `length`, `width`, `height`, `weight`, `deleted_at`, `created_at`, `updated_at`, `type_size_id`) VALUES
(2000001, 1000001, 'Dr. Guadalupe Mayer DVM', 'Fashion', NULL, 'Shoes', '355', 50, 50, 0, 0, 0, 'Id sed neque laudantium nesciunt quod consequatur. Veniam dolor tempore consequatur asperiores maxime sed dolorum.', 'n2.jpg', 'Active', NULL, '10.00', '10.00', '3.00', '2.00', NULL, '2022-02-02 16:08:31', '2022-02-02 16:08:31', NULL),
(2000002, 1000001, 'Elwyn Daniel', 'Fashion', NULL, 'Shoes', '255', 50, 50, 0, 0, 0, 'Sed nihil velit exercitationem doloribus possimus. Aliquam dicta quo incidunt dicta aut eos. Et fugit ut nostrum optio.', 'n2.jpg', 'InActive', '2022-02-03', '10.00', '10.00', '3.00', '2.00', NULL, '2022-02-02 16:08:31', '2022-02-03 14:47:54', NULL),
(2000003, 1000000, 'Clemmie Hermiston IV', 'Fashion', NULL, 'Shoes', '333', 50, 50, 0, 0, 0, 'Harum debitis voluptas est. Omnis deleniti reiciendis eaque quo. Est nam cumque officia doloremque aspernatur.', 'n2.jpg', 'Active', NULL, '10.00', '10.00', '3.00', '2.00', NULL, '2022-02-02 16:08:31', '2022-02-02 16:08:31', NULL),
(2000004, 1000000, 'Elody Champlin DVM', 'Fashion', NULL, 'Shoes', '352', 50, 50, 0, 0, 0, 'Quis alias eaque enim eos molestias dolorum aut. Nihil et in dolorum delectus cum. Ratione recusandae magni eligendi. Aut sed in ut nesciunt.', 'n2.jpg', 'Active', NULL, '10.00', '10.00', '3.00', '2.00', NULL, '2022-02-02 16:08:32', '2022-02-02 16:08:32', NULL),
(2000005, 1000000, 'Miss Marie Bednar', 'Fashion', NULL, 'Shoes', '85', 50, 50, 0, 0, 0, 'Vel et quia quidem et mollitia et ipsam. Suscipit recusandae amet porro dignissimos odio. Laboriosam beatae reprehenderit mollitia mollitia necessitatibus assumenda.', 'n2.jpg', 'Active', NULL, '10.00', '10.00', '3.00', '2.00', NULL, '2022-02-02 16:08:32', '2022-02-02 16:08:32', NULL),
(2000006, 1000001, 'gsd-1', 'Fashion', NULL, 'gsd', '45', 33, 33, 0, 0, 0, '\"}}asdfa', '', 'Active', NULL, '3.00', '3.00', '3.00', '23.00', NULL, '2022-02-03 13:24:58', '2022-02-03 13:24:58', NULL),
(2000007, 1000001, 'test-1', 'Fashion', NULL, 'Test', '22', 12, 12, 0, 0, 0, 'sf', '', 'Active', NULL, '2.00', '2.00', '2.00', '2.00', NULL, '2022-02-03 13:27:52', '2022-02-03 13:27:52', NULL),
(2000008, 1000000, 'admin-test-1', 'Fashion', 'New Arrivals', 'Admin Test', '25', 45, 45, 0, 0, 0, 'sd', '', 'Active', NULL, '5.00', '5.00', '5.00', '55.00', NULL, '2022-02-03 13:50:34', '2022-02-03 13:50:34', 2),
(2000009, 1000001, 'test-vendor-1', 'Fashion', NULL, 'Test Vendor', '52', 7, 5, 0, 0, 0, 'fsdf', '', 'Active', NULL, '4.00', '4.00', '3.00', '4.00', NULL, '2022-02-03 14:10:43', '2022-02-03 16:16:11', 3),
(2000010, 1000000, 'admin-test-two-1', 'Fashion', NULL, 'Admin Test Two', '3', 3, 3, 0, 0, 0, 'eee', '', 'Active', NULL, '3.00', '3.00', '3.00', '3.00', NULL, '2022-02-03 14:21:32', '2022-02-03 16:28:48', 2),
(2000011, 1000001, 'test-test-test-1', 'Fashion', NULL, 'test test test', '5', 23, 3, 0, 0, 0, 'dfsadf', '', 'Active', NULL, '3.00', '3.00', '3.00', '9.00', NULL, '2022-02-03 14:39:03', '2022-02-03 16:15:33', 2),
(2000012, 1000001, 'test-four-1', 'Fashion', NULL, 'test four', '5', 5, 5, 0, 0, 0, 'dgs', '', 'InActive', NULL, '5.00', '2.00', '4.00', '5.00', NULL, '2022-02-03 14:41:07', '2022-02-03 14:47:23', 2),
(2000013, 1000001, 'tshirt-1', 'Fashion', NULL, 'Tshirt', '34', 50, 54, 0, 0, 0, 'asdf', '', 'Active', NULL, '2.00', '3.00', '3.00', '45.00', NULL, '2022-02-03 16:54:33', '2022-02-03 16:56:22', 2),
(2000014, 1000001, 'ila-hodge-1', 'Fashion', NULL, 'Ila Hodge', '847.5', 527, 527, 0, 0, 0, 'Et illum excepteur', '', 'Active', NULL, '23.00', '8.00', '2.00', '43.00', NULL, '2022-02-03 17:10:32', '2022-02-03 17:10:32', 2),
(2000015, 1000001, 'numeric-product-1', 'Fashion', NULL, 'Numeric Product', '54.5', 45, 45, 0, 0, 0, 'asdf', '', 'Active', NULL, '3.00', '2.00', '4.00', '8.00', NULL, '2022-02-03 17:16:07', '2022-02-03 17:16:07', 2),
(2000016, 1000001, 'testttttt-1', 'Fashion', NULL, 'testttttt', '45.9', 3, 3, 0, 0, 0, 'asdf', '', 'Active', NULL, '2.00', '1.00', '3.00', '2.00', NULL, '2022-02-03 17:20:09', '2022-02-03 17:20:09', 3),
(2000017, 1000001, 'test-product-with-fraction-1', 'Fashion', NULL, 'test product with fraction', '25.2', 52, 52, 0, 0, 0, 'asdf', '', 'Active', NULL, '3.49', '14.90', '4.80', '4.50', NULL, '2022-02-03 17:31:24', '2022-02-03 17:31:24', 2),
(2000018, 1000001, 'product-1', 'Fashion', NULL, 'product', '45.5', 45, 45, 0, 0, 0, 'fasdf', '', 'Active', NULL, '7.80', '6.80', '7.50', '7.18', NULL, '2022-02-03 17:33:37', '2022-02-03 17:33:37', 3),
(2000019, 1000001, 'shoes-1', 'Fashion', NULL, 'Shoes', '25.66', 4, 4, 0, 0, 0, 'Brand Shoes', '', 'Active', NULL, '4.00', '4.00', '6.00', '7.00', NULL, '2022-02-03 17:45:28', '2022-02-03 17:46:46', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 2000007, 1, '2022-02-03 13:27:52', '2022-02-03 13:27:52'),
(2, 2000008, 1, NULL, NULL),
(3, 2000009, 1, '2022-02-03 14:10:43', '2022-02-03 14:10:43'),
(4, 2000009, 2, '2022-02-03 14:10:43', '2022-02-03 14:10:43'),
(5, 2000010, 1, '2022-02-03 14:21:32', '2022-02-03 14:21:32'),
(6, 2000010, 2, '2022-02-03 14:21:32', '2022-02-03 14:21:32'),
(7, 2000010, 1, NULL, NULL),
(8, 2000010, 2, NULL, NULL),
(9, 2000011, 1, '2022-02-03 14:39:03', '2022-02-03 14:39:03'),
(10, 2000011, 2, '2022-02-03 14:39:04', '2022-02-03 14:39:04'),
(11, 2000012, 1, '2022-02-03 14:41:07', '2022-02-03 14:41:07'),
(13, 2000013, 1, '2022-02-03 16:54:33', '2022-02-03 16:54:33'),
(15, 2000014, 2, '2022-02-03 17:10:32', '2022-02-03 17:10:32'),
(16, 2000015, 2, '2022-02-03 17:16:07', '2022-02-03 17:16:07'),
(17, 2000016, 2, '2022-02-03 17:20:09', '2022-02-03 17:20:09'),
(18, 2000017, 2, '2022-02-03 17:31:25', '2022-02-03 17:31:25'),
(19, 2000018, 2, '2022-02-03 17:33:37', '2022-02-03 17:33:37'),
(20, 2000019, 1, '2022-02-03 17:45:28', '2022-02-03 17:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_color_sizes`
--

CREATE TABLE `product_color_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color_sizes`
--

INSERT INTO `product_color_sizes` (`id`, `product_id`, `color_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 2000008, 1, 2, '2022-02-03 13:50:34', '2022-02-03 13:50:34'),
(2, 2000008, 1, 4, '2022-02-03 13:50:34', '2022-02-03 13:50:34'),
(9, 2000010, 1, 1, '2022-02-03 16:28:48', '2022-02-03 16:28:48'),
(10, 2000010, 2, 1, '2022-02-03 16:28:48', '2022-02-03 16:28:48'),
(11, 2000012, 1, 2, '2022-02-03 16:29:12', '2022-02-03 16:29:12'),
(12, 2000013, 1, 3, '2022-02-03 16:55:56', '2022-02-03 16:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 2000010, '', '2022-02-03 16:28:48', '2022-02-03 16:28:48'),
(2, 2000012, '', '2022-02-03 16:29:11', '2022-02-03 16:29:11'),
(4, 2000013, '', '2022-02-03 16:56:23', '2022-02-03 16:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2000008, 2, NULL, NULL, NULL),
(2, 2000011, 4, NULL, NULL, NULL),
(3, 2000011, 3, NULL, NULL, NULL),
(4, 2000011, 4, NULL, NULL, NULL),
(6, 2000010, 1, NULL, NULL, NULL),
(7, 2000012, 2, NULL, NULL, NULL),
(8, 2000013, 3, NULL, NULL, NULL),
(9, 2000019, 9, NULL, NULL, NULL),
(10, 2000019, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Vendor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1000000, 1, NULL, NULL),
(3, 1000001, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('1000002', 'default', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:2:{s:32:\"a5a6a61b3b8f553d7daa6a109d688559\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"a5a6a61b3b8f553d7daa6a109d688559\";s:2:\"id\";i:2000004;s:3:\"qty\";i:1;s:4:\"name\";s:5:\"Shoes\";s:5:\"price\";d:352;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:2:{s:4:\"size\";N;s:5:\"color\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"0c127a59dd9b65fbda7c60e5e996559d\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"0c127a59dd9b65fbda7c60e5e996559d\";s:2:\"id\";i:2000005;s:3:\"qty\";i:1;s:4:\"name\";s:5:\"Shoes\";s:5:\"price\";d:85;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:2:{s:4:\"size\";N;s:5:\"color\";N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-02-03 08:10:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type_size_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `type_size_id`) VALUES
(1, 'XS', '2022-02-03 15:32:13', '2022-02-03 15:32:13', NULL, 2),
(2, 'S', '2022-02-03 15:32:13', '2022-02-03 15:32:13', NULL, 2),
(3, 'M', '2022-02-03 15:58:50', '2022-02-03 15:58:50', NULL, 2),
(4, 'L', '2022-02-03 15:58:50', '2022-02-03 15:58:50', NULL, 2),
(8, 'XL', '2022-02-03 16:01:05', '2022-02-03 16:01:05', NULL, 2),
(9, '40', '2022-02-03 16:03:14', '2022-02-03 16:03:14', NULL, 3),
(10, '41', '2022-02-03 16:03:14', '2022-02-03 16:03:14', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `type_sizes`
--

CREATE TABLE `type_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_sizes`
--

INSERT INTO `type_sizes` (`id`, `name`, `product_type`, `created_at`, `updated_at`) VALUES
(1, 'Shoes', 'Fashio', '2022-02-03 14:56:15', '2022-02-03 14:56:15'),
(2, 'Apparel', 'Fashion', '2022-02-03 14:56:15', '2022-02-03 14:56:15'),
(3, 'Bottoms', '', '2022-02-03 15:08:23', '2022-02-03 15:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_letter` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `force_logout` tinyint(1) NOT NULL DEFAULT 0,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `news_letter`, `status`, `force_logout`, `stripe_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1000000, 'Hassen', 'Ibrahim', 'miniibrahim@gmail.com', NULL, '$2y$10$hP/XLRWEH9bnPqJYMOqbCeuf32LYV/pRioOp9p4DxBpQOLerCJ4OK', NULL, NULL, 0, 'Active', 0, NULL, 'k48n6r4ymmexrQjukD5C2QYcnsW7mMUesvd2dVrap6Qb6W1bzfGVpd55NTy9', NULL, '2022-02-02 16:06:28', '2022-02-02 16:06:28'),
(1000001, 'Hassen', 'SAS', 'abc@gmail.com', NULL, '$2y$10$pmC2ZkGzoEueQYwN8QS1K.tWpG4Q3cs/cjuPHbTrSMbeMfmJGYOoK', NULL, NULL, 0, 'Active', 0, NULL, '5CVBkqAdK9RVhPy53YZs64TDepjnxaRAWbt3foA2kW6pcs1RFa1pm6T4vyyf', NULL, '2022-02-03 04:37:02', '2022-02-03 04:37:02'),
(1000002, 'Hash', 'Hash', 'xyz@gmail.com', NULL, '$2y$10$VHTMTGwhllCs/5q9IHRy/.uy/Q3y8e72fZZ7bjMfuhqhB2xGQFduS', NULL, NULL, 0, 'Active', 0, NULL, NULL, NULL, '2022-02-03 08:05:05', '2022-02-03 08:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `first_name`, `last_name`, `address`, `app_address`, `city`, `region`, `zipcode`, `country`, `created_at`, `updated_at`) VALUES
(1, 1000002, 'Hash', 'Hash', 'Addis', 'Addis', 'Verginia', 'Verginia', '208', 'USA', NULL, '2022-02-03 08:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_card`
--

CREATE TABLE `user_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `image`, `gender`, `created_at`, `updated_at`) VALUES
(1, 1000000, NULL, 'Male', NULL, NULL),
(2, 1000001, NULL, NULL, '2022-02-03 04:37:03', '2022-02-03 04:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_stripe`
--

CREATE TABLE `user_stripe` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `card_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_dispatch`
--

CREATE TABLE `vendor_product_dispatch` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_profile`
--

CREATE TABLE `vendor_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_structure` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_profile`
--

INSERT INTO `vendor_profile` (`id`, `user_id`, `brand_name`, `brand_website`, `brand_structure`, `brand_address`, `brand_city`, `brand_country`, `brand_zipcode`, `vendor_role`, `about`, `created_at`, `updated_at`, `logo`) VALUES
(5000001, 1000000, 'Adidas', 'www.example.com', 'asdf', 'addis', 'Addis Ababa', 'Ethiopia', '208', 'Sales', 'afasdfas', '2022-02-02 19:12:22', '2022-02-02 19:12:22', NULL),
(5000002, 1000001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-03 04:37:03', '2022-02-03 04:37:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_request`
--

CREATE TABLE `vendor_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `structure` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_stripe`
--

CREATE TABLE `vendor_stripe` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `account_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_stripe`
--

INSERT INTO `vendor_stripe` (`id`, `vendor_id`, `account_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1000001, 'acct_1KP00OQW7LHIsbrN', 'Active', '2022-02-03 04:48:27', '2022-02-03 04:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_transfer`
--

CREATE TABLE `vendor_transfer` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `order_product_id` int(10) UNSIGNED NOT NULL,
  `transfer_amount` int(11) NOT NULL DEFAULT 0,
  `error` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_parent`
--
ALTER TABLE `category_parent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_parent_category_id_foreign` (`category_id`),
  ADD KEY `category_parent_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kitchen_applications`
--
ALTER TABLE `kitchen_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_vendor_id_foreign` (`vendor_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_color_sizes`
--
ALTER TABLE `product_color_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_type_size_id_foreign` (`type_size_id`);

--
-- Indexes for table `type_sizes`
--
ALTER TABLE `type_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_address_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_card`
--
ALTER TABLE `user_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_card_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_profile_user_id_unique` (`user_id`);

--
-- Indexes for table `user_stripe`
--
ALTER TABLE `user_stripe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_stripe_user_id_foreign` (`user_id`);

--
-- Indexes for table `vendor_product_dispatch`
--
ALTER TABLE `vendor_product_dispatch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_product_dispatch_vendor_id_foreign` (`vendor_id`),
  ADD KEY `vendor_product_dispatch_product_id_foreign` (`product_id`);

--
-- Indexes for table `vendor_profile`
--
ALTER TABLE `vendor_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_profile_user_id_unique` (`user_id`);

--
-- Indexes for table `vendor_request`
--
ALTER TABLE `vendor_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_stripe`
--
ALTER TABLE `vendor_stripe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_stripe_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `vendor_transfer`
--
ALTER TABLE `vendor_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_transfer_vendor_id_foreign` (`vendor_id`),
  ADD KEY `vendor_transfer_order_product_id_foreign` (`order_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12000001;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11000001;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_parent`
--
ALTER TABLE `category_parent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kitchen_applications`
--
ALTER TABLE `kitchen_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13000001;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9000001;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000001;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000020;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_color_sizes`
--
ALTER TABLE `product_color_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `type_sizes`
--
ALTER TABLE `type_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000003;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_card`
--
ALTER TABLE `user_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8000001;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_stripe`
--
ALTER TABLE `user_stripe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_product_dispatch`
--
ALTER TABLE `vendor_product_dispatch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6000001;

--
-- AUTO_INCREMENT for table `vendor_profile`
--
ALTER TABLE `vendor_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000003;

--
-- AUTO_INCREMENT for table `vendor_request`
--
ALTER TABLE `vendor_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000001;

--
-- AUTO_INCREMENT for table `vendor_stripe`
--
ALTER TABLE `vendor_stripe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_transfer`
--
ALTER TABLE `vendor_transfer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7000001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_parent`
--
ALTER TABLE `category_parent`
  ADD CONSTRAINT `category_parent_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_parent_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_product_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_type_size_id_foreign` FOREIGN KEY (`type_size_id`) REFERENCES `type_sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_card`
--
ALTER TABLE `user_card`
  ADD CONSTRAINT `user_card_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_stripe`
--
ALTER TABLE `user_stripe`
  ADD CONSTRAINT `user_stripe_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vendor_product_dispatch`
--
ALTER TABLE `vendor_product_dispatch`
  ADD CONSTRAINT `vendor_product_dispatch_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `vendor_product_dispatch_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vendor_profile`
--
ALTER TABLE `vendor_profile`
  ADD CONSTRAINT `vendor_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vendor_stripe`
--
ALTER TABLE `vendor_stripe`
  ADD CONSTRAINT `vendor_stripe_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vendor_transfer`
--
ALTER TABLE `vendor_transfer`
  ADD CONSTRAINT `vendor_transfer_order_product_id_foreign` FOREIGN KEY (`order_product_id`) REFERENCES `order_product` (`id`),
  ADD CONSTRAINT `vendor_transfer_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
