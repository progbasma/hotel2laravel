-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 05:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relaxly_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 'Wifi', 1, '2022-12-30 08:35:25', '2022-12-30 08:35:25'),
(2, 'AC', 1, '2022-12-30 08:35:38', '2022-12-30 08:35:38'),
(3, 'Gym/Fitness Centre', 1, '2022-12-30 08:35:59', '2022-12-30 08:36:10'),
(4, 'Pool', 1, '2022-12-30 08:36:24', '2022-12-30 08:37:03'),
(5, 'Washing Machine', 1, '2022-12-30 08:36:42', '2022-12-30 08:36:58'),
(6, 'TV', 1, '2022-12-30 08:36:52', '2022-12-30 08:36:52'),
(7, 'Freezer', 1, '2022-12-30 08:37:13', '2022-12-30 08:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `bedtypes`
--

CREATE TABLE `bedtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bedtypes`
--

INSERT INTO `bedtypes` (`id`, `name`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 'Double', 1, '2022-12-30 10:03:51', '2022-12-30 10:04:01'),
(2, 'Single', 1, '2022-12-30 10:04:10', '2022-12-30 10:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `lan` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `og_title` text DEFAULT NULL,
  `og_image` text DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_keywords` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `thumbnail`, `description`, `lan`, `category_id`, `is_publish`, `og_title`, `og_image`, `og_description`, `og_keywords`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Tempor orci dapibus ultrices in iaculis nunc', 'tempor-orci-dapibus-ultrices-in-iaculis-nunc', '07012023092023-900x700-blog-12.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'en', 6, 1, 'Tempor orci dapibus ultrices in iaculis nunc', '07012023092023-900x700-blog-12.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'laravel portfolio, personal portolio, portfolio, portfolio cms, resume, agency, bootstrap laravel, business, creative, freelancer, laravel CMS', 1, '2023-01-07 03:20:44', '2023-01-10 11:38:34'),
(6, 'Lorem Ipsum is simply dummy text of the printing', 'lorem-ipsum-is-simply-dummy-text-of-the-printing', '07012023092008-900x700-blog-11.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'en', 6, 1, 'Lorem Ipsum is simply dummy text of the printing', '07012023092008-900x700-blog-11.jpg', 'ecommerce, farm, farming, food market, grocery shop, grocery store, multivendor, organic, organic farm, organic food, organic store, organic theme, store, super market, vegetable', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2023-01-07 03:20:44', '2023-01-10 11:38:34'),
(7, 'Lorem Ipsum has been the industry standard dummy', 'lorem-ipsum-has-been-the-industry-standard-dummy', '07012023091951-900x700-blog-10.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'en', 6, 1, 'Lorem Ipsum has been the industry standard dummy', '07012023091951-900x700-blog-10.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s', 'ecommerce, farm, farming, food market, grocery shop, grocery store, multivendor, organic, organic farm, organic food, organic store, organic theme, store, super market, vegetable', 1, '2023-01-07 03:20:44', '2023-01-10 11:38:34'),
(8, 'Lorem Ipsum is simply dummy text of the printing', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-2', '07012023091934-900x700-blog-9.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'en', 1, 1, 'Lorem Ipsum is simply dummy text of the printing', '07012023091934-900x700-blog-9.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'ecommerce, farm, farming, food market, grocery shop, grocery store, multivendor, organic, organic farm, organic food, organic store, organic theme, store, super market, vegetable', 1, '2023-01-07 03:20:44', '2023-01-10 11:38:34'),
(9, 'It was popularised in the 1960s with the release', 'it-was-popularised-in-the-1960s-with-the-release', '07012023091917-900x700-blog-8.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'en', 1, 1, 'It was popularised in the 1960s with the release', '07012023091917-900x700-blog-8.jpg', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'ecommerce, farm, farming, food market, grocery shop, grocery store, multivendor, organic, organic farm, organic food, organic store, organic theme, store, super market, vegetable', 1, '2023-01-07 03:20:44', '2023-01-10 11:38:34'),
(10, 'Nisi quis eleifend quam adipiscing vitae proin', 'nisi-quis-eleifend-quam-adipiscing-vitae-proin', '07012023091900-900x700-blog-7.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci ac auctor augue mauris augue neque gravida in. Sed blandit libero volutpat sed cras ornare. Cursus mattis molestie a iaculis at erat pellentesque. Eu volutpat odio facilisis mauris sit amet massa. Euismod lacinia at quis risus sed vulputate odio ut. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Amet massa vitae tortor condimentum lacinia quis vel eros donec. Aliquet nibh praesent tristique magna. Placerat in egestas erat imperdiet sed euismod nisi porta lorem. Dui id ornare arcu odio ut sem nulla pharetra. Eu augue ut lectus arcu bibendum. Praesent semper feugiat nibh sed pulvinar proin. Aliquam malesuada bibendum arcu vitae elementum curabitur. In cursus turpis massa tincidunt dui. Id eu nisl nunc mi ipsum faucibus. Quisque non tellus orci ac auctor augue mauris augue. Neque egestas congue quisque egestas.<br></p><p>Rhoncus aenean vel elit scelerisque. Quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Sed odio morbi quis commodo odio. Nibh mauris cursus mattis molestie a iaculis at. Fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim. Sagittis purus sit amet volutpat consequat mauris. Scelerisque in dictum non consectetur a erat. Aliquet nec ullamcorper sit amet risus. Pharetra sit amet aliquam id diam maecenas ultricies. Scelerisque eleifend donec pretium vulputate. Eget egestas purus viverra accumsan in nisl.</p><p>Nisi quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Ultrices tincidunt arcu non sodales neque sodales ut etiam. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Duis at tellus at urna condimentum mattis pellentesque id. Sit amet justo donec enim diam vulputate ut pharetra. Hendrerit gravida rutrum quisque non tellus orci ac. Id interdum velit laoreet id donec. Lorem sed risus ultricies tristique nulla. Tortor vitae purus faucibus ornare suspendisse sed. Vitae ultricies leo integer malesuada nunc vel. Egestas tellus rutrum tellus pellentesque eu tincidunt. Purus ut faucibus pulvinar elementum integer enim neque. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Sed felis eget velit aliquet sagittis id consectetur purus ut. Pellentesque id nibh tortor id aliquet lectus. Nulla facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Habitant morbi tristique senectus et netus et malesuada fames ac.<br></p>', 'en', 1, 1, 'Nisi quis eleifend quam adipiscing vitae proin', '07012023091900-900x700-blog-7.jpg', 'Nisi quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Ultrices tincidunt arcu non sodales neque sodales ut etiam.', 'Nisi quis eleifend quam adipiscing vitae proin', 1, '2023-01-07 03:20:44', '2023-01-10 11:38:34'),
(11, 'Quisque egestas diam in arcu cursus euismod quis viverra', 'quisque-egestas-diam-in-arcu-cursus-euismod-quis-viverra', '07012023091844-900x700-blog-6.jpg', '<p>Nisi quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Ultrices tincidunt arcu non sodales neque sodales ut etiam. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Duis at tellus at urna condimentum mattis pellentesque id. Sit amet justo donec enim diam vulputate ut pharetra. Hendrerit gravida rutrum quisque non tellus orci ac. Id interdum velit laoreet id donec. Lorem sed risus ultricies tristique nulla. Tortor vitae purus faucibus ornare suspendisse sed. Vitae ultricies leo integer malesuada nunc vel. Egestas tellus rutrum tellus pellentesque eu tincidunt. Purus ut faucibus pulvinar elementum integer enim neque. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Sed felis eget velit aliquet sagittis id consectetur purus ut. Pellentesque id nibh tortor id aliquet lectus. Nulla facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Habitant morbi tristique senectus et netus et malesuada fames ac.</p><p>Quisque egestas diam in arcu cursus euismod quis viverra. Lacinia quis vel eros donec ac. Ac odio tempor orci dapibus ultrices. Congue nisi vitae suscipit tellus mauris a. Leo in vitae turpis massa sed elementum tempus egestas sed. Odio ut sem nulla pharetra diam sit amet. Nunc consequat interdum varius sit amet mattis vulputate enim nulla. Mattis rhoncus urna neque viverra justo nec ultrices dui. Tellus cras adipiscing enim eu turpis. Sollicitudin ac orci phasellus egestas. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Ut morbi tincidunt augue interdum velit euismod in pellentesque massa. Ipsum faucibus vitae aliquet nec ullamcorper sit. Sed augue lacus viverra vitae. Neque aliquam vestibulum morbi blandit. Ultricies lacus sed turpis tincidunt id. Ut eu sem integer vitae justo eget. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Et malesuada fames ac turpis egestas sed tempus urna et.<br></p><p><br></p>', 'en', 7, 1, 'Quisque egestas diam in arcu cursus euismod quis viverra', '07012023091844-900x700-blog-6.jpg', 'Quisque egestas diam in arcu cursus euismod quis viverra. Lacinia quis vel eros donec ac. Ac odio tempor orci dapibus ultrices.', 'Quisque egestas diam in arcu cursus euismod quis viverra', 1, '2023-01-07 03:20:44', '2023-01-10 11:38:34'),
(12, 'Quisque egestas diam in arcu cursus euismod quis', 'quisque-egestas-diam-in-arcu-cursus-euismod-quis-2', '07012023091827-900x700-blog-5.jpg', '<p>Rhoncus aenean vel elit scelerisque. Quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Sed odio morbi quis commodo odio. Nibh mauris cursus mattis molestie a iaculis at. Fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim. Sagittis purus sit amet volutpat consequat mauris. Scelerisque in dictum non consectetur a erat. Aliquet nec ullamcorper sit amet risus. Pharetra sit amet aliquam id diam maecenas ultricies. Scelerisque eleifend donec pretium vulputate. Eget egestas purus viverra accumsan in nisl.</p><p>Nisi quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Ultrices tincidunt arcu non sodales neque sodales ut etiam. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Duis at tellus at urna condimentum mattis pellentesque id. Sit amet justo donec enim diam vulputate ut pharetra. Hendrerit gravida rutrum quisque non tellus orci ac. Id interdum velit laoreet id donec. Lorem sed risus ultricies tristique nulla. Tortor vitae purus faucibus ornare suspendisse sed. Vitae ultricies leo integer malesuada nunc vel. Egestas tellus rutrum tellus pellentesque eu tincidunt. Purus ut faucibus pulvinar elementum integer enim neque. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Sed felis eget velit aliquet sagittis id consectetur purus ut. Pellentesque id nibh tortor id aliquet lectus. Nulla facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Habitant morbi tristique senectus et netus et malesuada fames ac.</p><p>Quisque egestas diam in arcu cursus euismod quis viverra. Lacinia quis vel eros donec ac. Ac odio tempor orci dapibus ultrices. Congue nisi vitae suscipit tellus mauris a. Leo in vitae turpis massa sed elementum tempus egestas sed. Odio ut sem nulla pharetra diam sit amet. Nunc consequat interdum varius sit amet mattis vulputate enim nulla. Mattis rhoncus urna neque viverra justo nec ultrices dui. Tellus cras adipiscing enim eu turpis. Sollicitudin ac orci phasellus egestas. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Ut morbi tincidunt augue interdum velit euismod in pellentesque massa. Ipsum faucibus vitae aliquet nec ullamcorper sit. Sed augue lacus viverra vitae. Neque aliquam vestibulum morbi blandit. Ultricies lacus sed turpis tincidunt id. Ut eu sem integer vitae justo eget. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Et malesuada fames ac turpis egestas sed tempus urna et.<br></p>', 'en', 7, 1, 'Quisque egestas diam in arcu cursus euismod quis', '07012023091827-900x700-blog-5.jpg', 'Quisque egestas diam in arcu cursus euismod quis', 'Quisque egestas diam in arcu cursus euismod quis', 1, '2023-01-07 03:20:44', '2023-01-10 11:38:34'),
(13, 'Malesuada bibendum arcu vitae elementum curabitur', 'malesuada-bibendum-arcu-vitae-elementum-curabitur', '07012023091806-900x700-blog-4.jpg', '<p>Malesuada bibendum arcu vitae elementum curabitur. Iaculis eu non diam phasellus vestibulum lorem sed. Vel pharetra vel turpis nunc eget. Sit amet nisl purus in mollis nunc sed id semper. Vel eros donec ac odio tempor orci dapibus. Id semper risus in hendrerit. Egestas pretium aenean pharetra magna ac. Vitae turpis massa sed elementum tempus. Tellus at urna condimentum mattis pellentesque. Dolor sed viverra ipsum nunc aliquet bibendum. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet. Eu mi bibendum neque egestas congue quisque egestas. Turpis massa tincidunt dui ut. Nisl tincidunt eget nullam non. Neque convallis a cras semper auctor neque vitae tempus quam. Congue quisque egestas diam in arcu cursus euismod.</p><p>Fermentum iaculis eu non diam. Gravida quis blandit turpis cursus in hac habitasse. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Malesuada fames ac turpis egestas maecenas. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Maecenas pharetra convallis posuere morbi leo. Tincidunt tortor aliquam nulla facilisi cras. Massa enim nec dui nunc. Est ultricies integer quis auctor elit sed. Elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Sed nisi lacus sed viverra tellus in hac habitasse platea. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus.<br></p>', 'en', 7, 1, 'Malesuada bibendum arcu vitae elementum curabitur', '07012023091806-900x700-blog-4.jpg', 'Malesuada bibendum arcu vitae elementum curabitur', 'Malesuada bibendum arcu vitae elementum curabitur', 1, '2023-01-06 10:35:10', '2023-01-10 11:38:34'),
(14, 'Lectus nulla at volutpat diam ut venenatis', 'lectus-nulla-at-volutpat-diam-ut-venenatis', '07012023091749-900x700-blog-3.jpg', '<p>Fermentum iaculis eu non diam. Gravida quis blandit turpis cursus in hac habitasse. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Malesuada fames ac turpis egestas maecenas. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Maecenas pharetra convallis posuere morbi leo. Tincidunt tortor aliquam nulla facilisi cras. Massa enim nec dui nunc. Est ultricies integer quis auctor elit sed. Elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Sed nisi lacus sed viverra tellus in hac habitasse platea. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tincidunt ornare massa eget egestas purus viverra. Eget nunc lobortis mattis aliquam faucibus purus in massa. Urna condimentum mattis pellentesque id. A scelerisque purus semper eget duis at tellus at urna. Tempor nec feugiat nisl pretium fusce id velit ut. Consectetur lorem donec massa sapien faucibus et. Eu sem integer vitae justo eget magna fermentum iaculis. In massa tempor nec feugiat. Arcu vitae elementum curabitur vitae nunc sed velit dignissim sodales. Lacus sed viverra tellus in hac habitasse platea dictumst vestibulum.<br></p>', 'en', 5, 1, 'Lectus nulla at volutpat diam ut venenatis', '07012023091749-900x700-blog-3.jpg', 'Fermentum iaculis eu non diam. Gravida quis blandit turpis cursus in hac habitasse. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Malesuada fames ac turpis egestas maecenas. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Maecenas pharetra convallis posuere morbi leo. Tincidunt tortor aliquam nulla facilisi cras.', 'Lectus nulla at volutpat diam ut venenatis', 1, '2023-01-06 10:35:10', '2023-01-10 11:38:34'),
(15, 'Fermentum leo vel orci porta non pulvinar', 'fermentum-leo-vel-orci-porta-non-pulvinar', '07012023091730-900x700-blog-2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tincidunt ornare massa eget egestas purus viverra. Eget nunc lobortis mattis aliquam faucibus purus in massa. Urna condimentum mattis pellentesque id. A scelerisque purus semper eget duis at tellus at urna. Tempor nec feugiat nisl pretium fusce id velit ut. Consectetur lorem donec massa sapien faucibus et. Eu sem integer vitae justo eget magna fermentum iaculis. In massa tempor nec feugiat. Arcu vitae elementum curabitur vitae nunc sed velit dignissim sodales. Lacus sed viverra tellus in hac habitasse platea dictumst vestibulum.</p><p>Fermentum leo vel orci porta non pulvinar. Ornare aenean euismod elementum nisi quis eleifend quam adipiscing vitae. Turpis massa sed elementum tempus. Ultrices mi tempus imperdiet nulla malesuada pellentesque. Nibh nisl condimentum id venenatis a condimentum vitae. Velit sed ullamcorper morbi tincidunt ornare. Euismod in pellentesque massa placerat duis ultricies lacus. Nibh nisl condimentum id venenatis a condimentum vitae sapien. Vitae aliquet nec ullamcorper sit amet risus nullam eget felis. Auctor neque vitae tempus quam pellentesque nec nam.<br></p>', 'en', 5, 1, 'Fermentum leo vel orci porta non pulvinar', '07012023091730-900x700-blog-2.jpg', 'Fermentum leo vel orci porta non pulvinar. Ornare aenean euismod elementum nisi quis eleifend quam adipiscing vitae. Turpis massa sed elementum tempus.', 'Fermentum leo vel orci porta non pulvinar', 1, '2023-01-06 10:35:10', '2023-01-10 11:38:34'),
(16, 'Dolor sed viverra ipsum nunc aliquet', 'dolor-sed-viverra-ipsum-nunc-aliquet', '07012023091700-900x700-blog-1.jpg', '<p>Dolor sed viverra ipsum nunc aliquet. Elementum facilisis leo vel fringilla est ullamcorper eget. Feugiat in ante metus dictum. Nisl tincidunt eget nullam non nisi est sit. In cursus turpis massa tincidunt dui. Vitae congue eu consequat ac felis donec et. Lectus nulla at volutpat diam ut venenatis. Dictum non consectetur a erat nam at. Eu ultrices vitae auctor eu augue ut. Nec ultrices dui sapien eget.</p><p>Ullamcorper velit sed ullamcorper morbi tincidunt. Nunc mattis enim ut tellus elementum sagittis. Orci eu lobortis elementum nibh tellus molestie. In fermentum posuere urna nec tincidunt. Eget est lorem ipsum dolor. Sed enim ut sem viverra aliquet eget. Bibendum at varius vel pharetra vel turpis nunc eget lorem. Ornare suspendisse sed nisi lacus. Quam vulputate dignissim suspendisse in est ante in. At tellus at urna condimentum. Magna fringilla urna porttitor rhoncus dolor purus non. Posuere lorem ipsum dolor sit amet consectetur adipiscing. Tempor orci dapibus ultrices in iaculis nunc sed augue lacus. Vitae congue eu consequat ac. Imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Quis imperdiet massa tincidunt nunc pulvinar sapien et ligula. Suspendisse interdum consectetur libero id faucibus. Ultrices eros in cursus turpis massa tincidunt dui ut.<br></p>', 'en', 5, 1, 'Dolor sed viverra ipsum nunc aliquet', '07012023091700-900x700-blog-1.jpg', 'Dolor sed viverra ipsum nunc aliquet. Elementum facilisis leo vel fringilla est ullamcorper eget. Feugiat in ante metus dictum. Nisl tincidunt eget nullam non nisi est sit. In cursus turpis massa tincidunt dui.', 'Dolor sed viverra ipsum nunc aliquet', 1, '2023-01-07 03:20:44', '2023-02-27 09:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `lan` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `og_title` text DEFAULT NULL,
  `og_image` text DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `thumbnail`, `description`, `lan`, `parent_id`, `is_publish`, `og_title`, `og_image`, `og_description`, `og_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Luxury Room', 'luxury-room', '05012023064503-breadcrumb-bg-4.jpg', 'Luxury Room a Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.', 'en', NULL, 1, 'Luxury Room', '06012023120550-900x700-1-room.jpg', 'Luxury Room a Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.', 'Hollywood Twin Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2022-10-18 07:19:26', '2023-01-07 02:05:17'),
(5, 'Tour Places', 'tour-places', '05012023064520-breadcrumb-bg-8.jpg', 'Tour Places a Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.', 'en', NULL, 1, 'Tour Places', '06012023135948-900x700-about-h4.png', 'Tour Places a Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.', 'Hollywood Twin Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2022-10-17 10:44:55', '2023-01-07 02:07:27'),
(6, 'Vacations', 'vacations', '05012023064531-breadcrumb-bg-11.jpg', 'Vacations a Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.', 'en', NULL, 1, 'Vacations', '06012023135659-900x700-about-h3.jpg', 'Vacations a Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.', 'Hollywood Twin Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2022-10-17 10:45:05', '2023-01-07 02:07:17'),
(7, 'Resort Places', 'resort-places', '05012023064524-breadcrumb-bg-9.jpg', 'Resort Places a Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.', 'en', NULL, 1, 'Resort Places', '06012023120606-900x700-6-room.jpg', 'Resort Places a Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.', 'Hollywood Twin Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2022-10-17 10:45:14', '2023-01-07 02:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `booking_manages`
--

CREATE TABLE `booking_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_no` varchar(100) DEFAULT NULL,
  `transaction_no` varchar(100) DEFAULT NULL,
  `roomtype_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_status_id` int(11) DEFAULT NULL,
  `booking_status_id` int(11) DEFAULT NULL,
  `total_room` int(11) DEFAULT NULL,
  `total_price` double(12,3) DEFAULT NULL,
  `discount` double(12,3) DEFAULT NULL,
  `tax` double(12,3) DEFAULT NULL,
  `subtotal` double(12,3) DEFAULT NULL,
  `total_amount` double(12,3) DEFAULT NULL,
  `paid_amount` double(12,3) DEFAULT NULL,
  `due_amount` double(12,3) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `out_date` date DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `zip_code` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bstatus_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `bstatus_name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2023-01-27 15:48:22', '2023-01-27 15:48:25'),
(2, 'Approved', '2023-01-27 15:48:34', '2023-01-27 15:48:37'),
(3, 'Checked Out', '2023-01-28 05:11:57', '2023-01-28 05:11:58'),
(4, 'Canceled', '2023-01-28 05:12:16', '2023-01-28 05:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `lan` varchar(100) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `og_title` text DEFAULT NULL,
  `og_image` text DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `thumbnail`, `description`, `lan`, `is_publish`, `og_title`, `og_image`, `og_description`, `og_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Hotel', 'hotel', '05012023064431-breadcrumb-bg-1.jpg', 'A single room has one single bed for single occupancy. An additional bed (called an extra bed) may be added to this room at a guests request and charged accordingly. The size of the bed is normally 3 feet by 6 feet. However, the concept of single rooms is vanishing nowadays. Mostly, hotels have twin or double rooms, and the charge for a single room is occupied by one person.', 'en', 1, 'Hotel', '05012023064431-400x400-breadcrumb-bg-1.jpg', 'A single room has one single bed for single occupancy. An additional bed (called an extra bed) may be added to this room at a guests request and charged accordingly. The size of the bed is normally 3 feet by 6 feet. However, the concept of single rooms is vanishing nowadays. Mostly, hotels have twin or double rooms, and the charge for a single room is occupied by one person.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort, Single Room', '2023-01-05 01:07:01', '2023-02-27 09:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `complements`
--

CREATE TABLE `complements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `item` varchar(191) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complements`
--

INSERT INTO `complements` (`id`, `name`, `item`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 'Breakfast', 'Marmalade, Ham, Egg, Bread, Breakfast burrito, Coffee, Tomato, Milk, Orange juice, Yogurt', 1, '2022-12-30 09:30:44', '2022-12-30 09:30:44'),
(2, 'Lunch', 'Rice, Beef, Mutton, Chicken and Vegetable', 1, '2022-12-30 09:35:43', '2022-12-30 09:35:43'),
(3, 'Tea', 'Tea/Coffee', 1, '2022-12-30 09:35:58', '2022-12-30 09:37:00'),
(4, 'Drinks', 'Drinks', 1, '2022-12-30 09:36:20', '2022-12-30 09:39:20'),
(5, 'Dinner', 'Rice, Beef, Mutton, Chicken, Vegetable', 1, '2022-12-30 09:38:21', '2022-12-30 09:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `contact_info` longtext DEFAULT NULL,
  `contact_form` longtext DEFAULT NULL,
  `contact_map` longtext DEFAULT NULL,
  `is_recaptcha` int(11) DEFAULT NULL,
  `mail_subject` varchar(100) DEFAULT NULL,
  `is_copy` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `lan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `contact_info`, `contact_form`, `contact_map`, `is_recaptcha`, `mail_subject`, `is_copy`, `is_publish`, `lan`, `created_at`, `updated_at`) VALUES
(6, 'Contact Us', '{\"email\":\"support@organis.com\",\"phone\":\"+1 964 565 87652\",\"address\":\"12 Poor Street, New York.\",\"short_desc\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.\"}', '[{\"label\":\"Name\",\"is_label\":\"no\",\"type\":\"text\",\"name\":\"Name\",\"placeholder\":\"Name\",\"mandatory\":\"yes\",\"dropdown_values\":\"\"},{\"label\":\"Email\",\"is_label\":\"no\",\"type\":\"email\",\"name\":\"Email\",\"placeholder\":\"Email Address\",\"mandatory\":\"yes\",\"dropdown_values\":\"\"},{\"label\":\"Subject\",\"is_label\":\"no\",\"type\":\"text\",\"name\":\"Subject\",\"placeholder\":\"Subject\",\"mandatory\":\"yes\",\"dropdown_values\":\"\"},{\"label\":\"Message\",\"is_label\":\"no\",\"type\":\"textarea\",\"name\":\"Message\",\"placeholder\":\"Message\",\"mandatory\":\"yes\",\"dropdown_values\":\"\"}]', '{\"latitude\":\"23.824442\",\"longitude\":\"90.2125329\",\"zoom\":\"10\",\"is_google_map\":0}', 0, 'subject', NULL, 1, 'en', '2022-08-26 09:37:03', '2023-02-18 08:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(191) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(2, 'Aland Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(3, 'Albania', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(4, 'Algeria', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(5, 'American Samoa', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(6, 'Andorra', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(7, 'Angola', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(8, 'Anguilla', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(9, 'Antarctica', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(10, 'Antigua and Barbuda', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(11, 'Argentina', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(12, 'Armenia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(13, 'Aruba', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(14, 'Asia / Pacific Region', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(15, 'Australia', 1, '2020-09-18 06:00:00', '2022-08-24 10:55:21'),
(16, 'Austria', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(17, 'Azerbaijan', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(18, 'Bahamas', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(19, 'Bahrain', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(20, 'Bangladesh', 1, '2020-09-18 06:00:00', '2022-08-24 10:52:40'),
(21, 'Barbados', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(22, 'Belarus', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(23, 'Belgium', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(24, 'Belize', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(25, 'Benin', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(26, 'Bermuda', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(27, 'Bhutan', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(28, 'Bolivia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(29, 'Bonaire, Sint Eustatius and Saba', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(30, 'Bosnia and Herzegovina', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(31, 'Botswana', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(32, 'Bouvet Island', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(33, 'Brazil', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(34, 'British Indian Ocean Territory', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(35, 'Brunei Darussalam', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(36, 'Bulgaria', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(37, 'Burkina Faso', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(38, 'Burundi', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(39, 'Cambodia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(40, 'Cameroon', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(41, 'Canada', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(42, 'Cape Verde', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(43, 'Cayman Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(44, 'Central African Republic', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(45, 'Chad', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(46, 'Chile', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(47, 'China', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(48, 'Christmas Island', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(49, 'Cocos (Keeling) Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(50, 'Colombia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(51, 'Comoros', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(52, 'Congo', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(53, 'Congo, the Democratic Republic of the', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(54, 'Cook Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(55, 'Costa Rica', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(56, 'Cote D\'Ivoire', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(57, 'Croatia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(58, 'Cuba', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(59, 'Curacao', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(60, 'Cyprus', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(61, 'Czech Republic', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(62, 'Denmark', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(63, 'Djibouti', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(64, 'Dominica', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(65, 'Dominican Republic', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(66, 'Ecuador', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(67, 'Egypt', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(68, 'El Salvador', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(69, 'Equatorial Guinea', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(70, 'Eritrea', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(71, 'Estonia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(72, 'Ethiopia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(73, 'Falkland Islands (Malvinas)', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(74, 'Faroe Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(75, 'Fiji', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(76, 'Finland', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(77, 'France', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(78, 'French Guiana', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(79, 'French Polynesia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(80, 'French Southern Territories', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(81, 'Gabon', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(82, 'Gambia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(83, 'Georgia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(84, 'Germany', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(85, 'Ghana', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(86, 'Gibraltar', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(87, 'Greece', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(88, 'Greenland', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(89, 'Grenada', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(90, 'Guadeloupe', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(91, 'Guam', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(92, 'Guatemala', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(93, 'Guernsey', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(94, 'Guinea', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(95, 'Guinea-Bissau', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(96, 'Guyana', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(97, 'Haiti', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(98, 'Heard Island and Mcdonald Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(99, 'Holy See (Vatican City State)', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(100, 'Honduras', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(101, 'Hong Kong', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(102, 'Hungary', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(103, 'Iceland', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(104, 'India', 1, '2020-09-18 06:00:00', '2022-08-24 10:55:40'),
(105, 'Indonesia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(106, 'Iran, Islamic Republic of', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(107, 'Iraq', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(108, 'Ireland', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(109, 'Isle of Man', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(110, 'Israel', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(111, 'Italy', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(112, 'Jamaica', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(113, 'Japan', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(114, 'Jersey', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(115, 'Jordan', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(116, 'Kazakhstan', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(117, 'Kenya', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(118, 'Kiribati', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(119, 'Korea, Democratic People\'s Republic of', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(120, 'Korea, Republic of', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(121, 'Kosovo', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(122, 'Kuwait', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(123, 'Kyrgyzstan', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(124, 'Lao People\'s Democratic Republic', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(125, 'Latvia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(126, 'Lebanon', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(127, 'Lesotho', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(128, 'Liberia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(129, 'Libyan Arab Jamahiriya', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(130, 'Liechtenstein', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(131, 'Lithuania', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(132, 'Luxembourg', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(133, 'Macao', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(134, 'Macedonia, the Former Yugoslav Republic of', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(135, 'Madagascar', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(136, 'Malawi', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(137, 'Malaysia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(138, 'Maldives', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(139, 'Mali', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(140, 'Malta', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(141, 'Marshall Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(142, 'Martinique', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(143, 'Mauritania', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(144, 'Mauritius', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(145, 'Mayotte', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(146, 'Mexico', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(147, 'Micronesia, Federated States of', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(148, 'Moldova, Republic of', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(149, 'Monaco', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(150, 'Mongolia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(151, 'Montenegro', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(152, 'Montserrat', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(153, 'Morocco', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(154, 'Mozambique', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(155, 'Myanmar', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(156, 'Namibia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(157, 'Nauru', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(158, 'Nepal', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(159, 'Netherlands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(160, 'Netherlands Antilles', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(161, 'New Caledonia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(162, 'New Zealand', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(163, 'Nicaragua', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(164, 'Niger', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(165, 'Nigeria', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(166, 'Niue', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(167, 'Norfolk Island', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(168, 'Northern Mariana Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(169, 'Norway', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(170, 'Oman', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(171, 'Pakistan', 1, '2020-09-18 06:00:00', '2022-08-24 10:52:58'),
(172, 'Palau', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(173, 'Palestinian Territory, Occupied', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(174, 'Panama', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(175, 'Papua New Guinea', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(176, 'Paraguay', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(177, 'Peru', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(178, 'Philippines', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(179, 'Pitcairn', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(180, 'Poland', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(181, 'Portugal', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(182, 'Puerto Rico', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(183, 'Qatar', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(184, 'Reunion', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(185, 'Romania', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(186, 'Russian Federation', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(187, 'Rwanda', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(188, 'Saint Barthelemy', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(189, 'Saint Helena', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(190, 'Saint Kitts and Nevis', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(191, 'Saint Lucia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(192, 'Saint Martin', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(193, 'Saint Pierre and Miquelon', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(194, 'Saint Vincent and the Grenadines', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(195, 'Samoa', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(196, 'San Marino', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(197, 'Sao Tome and Principe', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(198, 'Saudi Arabia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(199, 'Senegal', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(200, 'Serbia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(201, 'Serbia and Montenegro', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(202, 'Seychelles', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(203, 'Sierra Leone', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(204, 'Singapore', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(205, 'Sint Maarten', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(206, 'Slovakia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(207, 'Slovenia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(208, 'Solomon Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(209, 'Somalia', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(210, 'South Africa', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(211, 'South Georgia and the South Sandwich Islands', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(212, 'South Sudan', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(213, 'Spain', 2, '2020-09-18 06:00:00', '2020-09-18 06:00:00'),
(214, 'Sri Lanka', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(215, 'Sudan', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(216, 'Suriname', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(217, 'Svalbard and Jan Mayen', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(218, 'Swaziland', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(219, 'Sweden', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(220, 'Switzerland', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(221, 'Syrian Arab Republic', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(222, 'Taiwan, Province of China', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(223, 'Tajikistan', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(224, 'Tanzania, United Republic of', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(225, 'Thailand', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(226, 'Timor-Leste', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(227, 'Togo', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(228, 'Tokelau', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(229, 'Tonga', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(230, 'Trinidad and Tobago', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(231, 'Tunisia', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(232, 'Turkey', 1, '2020-09-18 06:00:00', '2022-08-24 10:55:59'),
(233, 'Turkmenistan', 2, '2020-09-18 06:00:00', '2022-08-24 10:52:06'),
(234, 'Turks and Caicos Islands', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(235, 'Tuvalu', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(236, 'Uganda', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(237, 'Ukraine', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(238, 'United Arab Emirates', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(239, 'United Kingdom', 1, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(240, 'United States', 1, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(241, 'United States Minor Outlying Islands', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(242, 'Uruguay', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(243, 'Uzbekistan', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(244, 'Vanuatu', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(245, 'Venezuela', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(246, 'Viet Nam', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(247, 'Virgin Islands, British', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(248, 'Virgin Islands, U.s.', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(249, 'Wallis and Futuna', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(250, 'Western Sahara', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(251, 'Yemen', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(252, 'Zambia', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58'),
(253, 'Zimbabwe', 2, '2020-09-18 06:00:00', '2022-08-24 10:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_code` varchar(30) NOT NULL,
  `language_name` varchar(100) DEFAULT NULL,
  `flag` text DEFAULT NULL,
  `language_default` tinyint(4) NOT NULL DEFAULT 0,
  `is_rtl` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_code`, `language_name`, `flag`, `language_default`, `is_rtl`, `status`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', NULL, 1, 0, 1, '2020-10-19 16:35:47', '2022-12-28 12:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `lankeyvalues`
--

CREATE TABLE `lankeyvalues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_code` varchar(30) DEFAULT NULL,
  `language_key` varchar(191) DEFAULT NULL,
  `language_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lankeyvalues`
--

INSERT INTO `lankeyvalues` (`id`, `language_code`, `language_key`, `language_value`, `created_at`, `updated_at`) VALUES
(1, 'en', 'Languages', 'Languages', '2021-03-29 06:08:02', '2022-12-27 11:20:54'),
(9, 'en', 'Data insert failed', 'Data insert failed', '2021-03-29 06:48:35', '2021-03-29 06:48:35'),
(14, 'en', 'Data update failed', 'Data update failed', '2021-03-29 07:32:39', '2021-03-29 07:32:39'),
(21, 'en', 'Data remove failed', 'Data remove failed', '2021-03-29 07:37:57', '2021-03-29 07:37:57'),
(24, 'en', 'Language Keywords', 'Language Keywords', '2021-03-29 07:40:09', '2021-03-29 07:40:09'),
(27, 'en', 'Add New', 'Add New', '2021-03-29 07:41:23', '2021-03-29 07:41:23'),
(30, 'en', 'Back to List', 'Back to List', '2021-03-29 07:42:44', '2021-03-29 07:42:44'),
(33, 'en', 'SL', 'SL', '2021-03-29 07:44:24', '2021-03-29 07:44:24'),
(36, 'en', 'Language Key', 'Language Key', '2021-03-29 07:45:10', '2021-03-29 07:45:10'),
(39, 'en', 'Language Value', 'Language Value', '2021-03-29 07:46:09', '2021-03-29 07:46:09'),
(42, 'en', 'Action', 'Action', '2021-03-29 07:47:30', '2021-03-29 07:47:30'),
(45, 'en', 'Save', 'Save', '2021-03-29 07:48:41', '2021-03-29 07:48:41'),
(48, 'en', 'Cancel', 'Cancel', '2021-03-29 07:49:59', '2021-03-29 07:49:59'),
(51, 'en', 'Do you really want to edit this record', 'Do you really want to edit this record?', '2021-03-29 07:51:09', '2021-03-29 07:52:19'),
(54, 'en', 'Do you really want to delete this record', 'Do you really want to delete this record?', '2021-03-29 07:52:46', '2021-03-29 07:52:46'),
(57, 'en', 'Delete', 'Delete', '2021-03-29 07:54:04', '2021-03-29 07:54:04'),
(61, 'en', 'Edit', 'Edit', '2021-03-29 07:55:02', '2021-03-29 07:55:02'),
(64, 'en', 'Confirm', 'Confirm', '2021-03-29 07:56:24', '2021-03-29 07:56:24'),
(66, 'en', 'This is alert message', 'This is alert message', '2021-03-29 07:57:25', '2021-03-29 07:57:25'),
(70, 'en', 'Language Code', 'Language Code', '2021-03-29 07:58:54', '2021-03-29 07:58:54'),
(73, 'en', 'Language Name', 'Language Name', '2021-03-29 07:59:53', '2021-03-29 07:59:53'),
(76, 'en', 'Active Language', 'Active Language', '2021-03-29 08:00:45', '2021-03-29 08:00:45'),
(78, 'en', 'General', 'General', '2021-03-29 15:53:52', '2021-03-29 15:53:52'),
(112, 'en', 'Site Name', 'Site Name', '2021-03-30 17:04:52', '2021-03-30 17:04:52'),
(116, 'en', 'Site Title', 'Site Title', '2021-03-30 17:06:30', '2021-03-30 17:06:30'),
(119, 'en', 'Site URL', 'Site URL', '2021-03-30 17:07:43', '2021-03-30 17:07:43'),
(122, 'en', 'Theme color', 'Theme color', '2021-03-30 17:10:33', '2021-03-30 17:10:33'),
(125, 'en', 'Favicon', 'Favicon', '2021-03-30 17:11:32', '2021-03-30 17:11:32'),
(131, 'en', 'The logo must be a file of type png', 'The logo must be a file of type png', '2021-03-30 17:13:33', '2021-03-30 17:13:33'),
(134, 'en', 'The file uploaded Successfully', 'The file uploaded Successfully', '2021-03-30 17:39:44', '2021-03-30 17:39:44'),
(137, 'en', 'Sorry, there was an error uploading your file', 'Sorry, there was an error uploading your file', '2021-03-30 17:40:34', '2021-03-30 17:40:34'),
(140, 'en', 'Sorry only you can upload jpg, png and gif file type', 'Sorry only you can upload jpg, png and gif file type', '2021-03-30 17:41:32', '2021-03-30 17:41:32'),
(143, 'en', 'Front Logo', 'Front Logo', '2021-03-30 18:41:19', '2021-03-30 18:41:19'),
(149, 'en', 'Back Logo', 'Back Logo', '2021-03-31 14:09:39', '2021-03-31 14:09:39'),
(152, 'en', 'Settings', 'Settings', '2021-03-31 14:12:50', '2021-03-31 14:12:50'),
(154, 'en', 'Time Zone', 'Time Zone', '2021-03-31 15:42:27', '2021-03-31 15:42:27'),
(157, 'en', 'Google reCAPTCHA', 'Google reCAPTCHA', '2021-03-31 17:15:56', '2021-03-31 17:15:56'),
(160, 'en', 'Theme Register', 'Theme Register', '2021-04-01 05:56:46', '2021-04-01 05:56:46'),
(164, 'en', 'Mail Settings', 'Mail Settings', '2021-04-01 06:19:40', '2021-04-01 06:19:40'),
(170, 'en', 'Media Setting', 'Media Setting', '2021-04-01 06:26:47', '2021-04-01 06:26:47'),
(172, 'en', 'Purchase Code', 'Purchase Code', '2021-04-01 09:50:30', '2021-04-01 09:50:30'),
(177, 'en', 'Sorry, This is not a valid purchase code.', 'Sorry, This is not a valid purchase code.', '2021-04-01 09:52:51', '2021-04-01 09:52:51'),
(179, 'en', 'Theme registered Successfully', 'Theme registered Successfully', '2021-04-01 09:53:48', '2021-04-01 09:53:48'),
(182, 'en', 'Theme deregister Successfully', 'Theme deregister Successfully', '2021-04-01 09:55:18', '2021-04-01 09:55:18'),
(185, 'en', 'Do you really want to deregister the theme', 'Do you really want to deregister the theme?', '2021-04-01 09:56:37', '2021-08-24 12:27:19'),
(188, 'en', 'Theme is registered', 'Theme is registered', '2021-04-01 11:57:20', '2021-04-01 11:57:20'),
(191, 'en', 'Deregister Theme', 'Deregister Theme', '2021-04-01 11:58:38', '2021-04-01 11:58:38'),
(194, 'en', 'Register Theme', 'Register Theme', '2021-04-01 12:00:16', '2021-04-01 12:00:16'),
(196, 'en', 'Users', 'Users', '2021-04-02 14:38:48', '2021-04-02 14:38:48'),
(199, 'en', 'Name', 'Name', '2021-04-02 17:24:38', '2021-04-02 17:24:38'),
(203, 'en', 'Email', 'Email', '2021-04-02 17:27:43', '2021-04-02 17:27:43'),
(206, 'en', 'Status', 'Status', '2021-04-02 17:30:15', '2021-04-02 17:30:15'),
(208, 'en', 'Role', 'Role', '2021-04-02 17:33:06', '2021-04-02 17:33:06'),
(214, 'en', 'Active', 'Active', '2021-04-02 17:41:30', '2021-04-02 17:41:30'),
(216, 'en', 'Inactive', 'Inactive', '2021-04-02 17:42:30', '2021-04-02 17:42:30'),
(218, 'en', 'Email Address', 'Email Address', '2021-04-03 15:34:12', '2021-04-03 15:34:12'),
(223, 'en', 'Password', 'Password', '2021-04-03 15:36:17', '2021-04-03 15:36:17'),
(225, 'en', 'Phone', 'Phone', '2021-04-03 15:37:12', '2021-04-03 15:37:12'),
(229, 'en', 'Address', 'Address', '2021-04-03 15:38:29', '2021-04-03 15:38:29'),
(231, 'en', 'Active/Inactive', 'Active/Inactive', '2021-04-03 15:39:27', '2021-04-03 15:39:27'),
(234, 'en', 'Roles', 'Roles', '2021-04-03 15:41:28', '2021-04-03 15:41:28'),
(241, 'en', 'The profile image must be a file of type jpg', 'The profile image must be a file of type jpg', '2021-04-03 15:44:10', '2021-04-03 15:44:10'),
(243, 'en', 'Profile Photo', 'Profile Photo', '2021-04-03 16:07:17', '2021-04-03 16:07:17'),
(245, 'en', 'Profile photo size 300x300 pixels', 'Profile photo size 300x300 pixels', '2021-04-03 16:10:33', '2021-04-03 16:10:33'),
(249, 'en', 'Browse', 'Browse', '2021-04-03 16:12:00', '2021-04-03 16:12:00'),
(251, 'en', 'Profile', 'Profile', '2021-04-04 15:09:54', '2021-04-04 15:09:54'),
(254, 'en', 'You are not active yet. Please contact administrator.', 'You are not active yet. Please contact administrator.', '2021-04-04 16:40:49', '2021-04-04 16:40:49'),
(258, 'en', 'You do not have permission to access this page', 'You do not have permission to access this page.', '2021-04-04 16:57:10', '2021-04-04 16:57:10'),
(260, 'en', 'Media', 'Media', '2021-04-05 16:00:22', '2021-04-05 16:00:22'),
(263, 'en', 'Attachment Details', 'Attachment Details', '2021-04-08 16:50:40', '2021-04-08 16:50:40'),
(267, 'en', 'Alternative Text', 'Alternative Text', '2021-04-08 16:52:20', '2021-04-08 16:52:20'),
(270, 'en', 'Title', 'Title', '2021-04-08 16:53:25', '2021-04-08 16:53:25'),
(273, 'en', 'Copy Link Thumbnail Image', 'Copy Link Thumbnail Image', '2021-04-08 16:56:27', '2021-04-08 16:56:27'),
(276, 'en', 'Copy Link large Image', 'Copy Link large Image', '2021-04-08 16:57:43', '2021-04-08 16:57:43'),
(279, 'en', 'Back', 'Back', '2021-04-08 16:59:05', '2021-04-08 16:59:05'),
(282, 'en', 'Select File', 'Select File', '2021-04-08 17:00:21', '2021-04-08 17:00:21'),
(285, 'en', 'All', 'All', '2021-04-08 17:01:29', '2021-04-08 17:01:29'),
(288, 'en', 'Bulk Select', 'Bulk Select', '2021-04-08 17:02:32', '2021-04-08 17:02:32'),
(291, 'en', 'Delete Permanently', 'Delete Permanently', '2021-04-08 17:03:51', '2021-04-08 17:03:51'),
(294, 'en', 'Search', 'Search', '2021-04-08 17:05:14', '2021-04-08 17:05:14'),
(296, 'en', 'Type', 'Type', '2021-04-11 14:52:20', '2021-04-11 14:52:20'),
(300, 'en', 'Width', 'Width', '2021-04-11 14:53:40', '2021-04-11 14:53:40'),
(303, 'en', 'Height', 'Height', '2021-04-11 14:54:40', '2021-04-11 14:54:40'),
(305, 'en', 'Categories', 'Categories', '2021-04-13 03:55:10', '2021-04-13 03:55:10'),
(308, 'en', 'Category Name', 'Category Name', '2021-04-13 07:01:37', '2021-04-13 07:01:37'),
(312, 'en', 'Slug', 'Slug', '2021-04-13 07:03:48', '2021-04-13 07:03:48'),
(315, 'en', 'Language', 'Language', '2021-04-13 07:05:50', '2021-04-13 07:05:50'),
(318, 'en', 'All Language', 'All Language', '2021-04-13 07:13:48', '2021-04-13 07:13:48'),
(321, 'en', 'Description', 'Description', '2021-04-13 07:23:37', '2021-04-13 07:23:37'),
(324, 'en', 'Subheader Image', 'Subheader Image', '2021-04-13 09:56:26', '2021-04-13 09:56:26'),
(326, 'en', 'Choose a File', 'Choose a File', '2021-04-13 16:41:33', '2021-04-13 16:41:33'),
(329, 'en', 'Upload File', 'Upload File', '2021-04-14 13:59:41', '2021-04-14 13:59:41'),
(332, 'en', 'Copy Thumbnail Image', 'Copy Thumbnail Image', '2021-04-15 12:02:34', '2021-04-15 12:02:34'),
(335, 'en', 'Menu', 'Menu', '2021-04-30 22:09:32', '2021-04-30 22:09:32'),
(339, 'en', 'Menu Name', 'Menu Name', '2021-04-30 22:33:42', '2021-04-30 22:33:42'),
(342, 'en', 'Menu Position', 'Menu Position', '2021-04-30 22:37:44', '2021-04-30 22:37:44'),
(345, 'en', 'Menu Status', 'Menu Status', '2021-04-30 22:42:44', '2021-04-30 22:42:44'),
(347, 'en', 'Position', 'Position', '2021-05-03 20:09:34', '2021-05-03 20:09:34'),
(351, 'en', 'Customize', 'Customize', '2021-05-03 20:20:20', '2021-05-03 20:20:20'),
(354, 'en', 'No data available', 'No data available', '2021-05-03 21:08:42', '2021-05-03 21:08:42'),
(356, 'en', 'Apply', 'Apply', '2021-05-04 21:36:47', '2021-05-04 21:36:47'),
(359, 'en', 'Do you really want to publish this records', 'Do you really want to publish this records?', '2021-05-08 21:22:10', '2021-05-08 21:25:31'),
(363, 'en', 'Do you really want to draft this records', 'Do you really want to draft this records?', '2021-05-08 21:24:58', '2021-05-08 21:25:17'),
(366, 'en', 'Do you really want to delete this records', 'Do you really want to delete this records?', '2021-05-08 21:28:28', '2021-05-08 21:28:28'),
(369, 'en', 'Please select action', 'Please select action', '2021-05-08 21:31:58', '2021-05-08 21:31:58'),
(372, 'en', 'Please select record', 'Please select record', '2021-05-08 21:38:41', '2021-05-08 21:38:41'),
(374, 'en', 'Save Menu', 'Save Menu', '2021-05-09 15:46:22', '2021-05-09 15:46:22'),
(377, 'en', 'Menu structure', 'Menu structure', '2021-05-09 15:49:16', '2021-05-09 15:49:16'),
(381, 'en', 'Add menu items', 'Add menu items', '2021-05-09 15:50:46', '2021-05-09 15:50:46'),
(383, 'en', 'Only selected language menu list', 'Only selected language menu list', '2021-05-09 15:53:38', '2021-05-09 15:53:38'),
(386, 'en', 'URL', 'URL', '2021-05-10 15:27:34', '2021-05-10 15:27:34'),
(390, 'en', 'Link Text', 'Link Text', '2021-05-10 15:29:31', '2021-05-10 15:29:31'),
(392, 'en', 'Navigation Label', 'Navigation Label', '2021-05-11 20:58:45', '2021-05-11 20:58:45'),
(398, 'en', 'Add to Menu', 'Add to Menu', '2021-05-13 22:52:21', '2021-05-13 22:52:21'),
(402, 'en', 'Select All', 'Select All', '2021-05-13 23:17:47', '2021-05-13 23:17:47'),
(405, 'en', 'Pages', 'Pages', '2021-05-13 23:20:36', '2021-05-13 23:20:36'),
(408, 'en', 'Posts', 'Posts', '2021-05-13 23:21:59', '2021-05-13 23:21:59'),
(411, 'en', 'Custom Links', 'Custom Links', '2021-05-13 23:24:29', '2021-05-13 23:24:29'),
(414, 'en', 'Target Window', 'Target Window', '2021-05-16 09:05:33', '2021-05-16 09:05:33'),
(417, 'en', 'CSS Class (Optional)', 'CSS Class (Optional)', '2021-05-16 09:47:32', '2021-05-16 09:47:32'),
(420, 'en', 'Select menu option', 'Select menu option', '2021-05-16 09:51:30', '2021-05-16 09:51:30'),
(423, 'en', 'Select width', 'Select width', '2021-05-16 09:54:38', '2021-05-16 09:54:38'),
(425, 'en', 'Please fill out required field', 'Please fill out required field.', '2021-05-19 22:53:54', '2021-05-19 22:54:25'),
(428, 'en', 'Full Width', 'Full Width', '2021-05-20 11:17:23', '2021-05-20 11:17:23'),
(432, 'en', 'Fixed Width', 'Fixed Width', '2021-05-20 11:19:02', '2021-05-20 11:19:02'),
(435, 'en', 'Mega Menu', 'Mega Menu', '2021-05-20 11:20:33', '2021-05-20 11:20:33'),
(438, 'en', 'Dropdown', 'Dropdown', '2021-05-20 11:21:44', '2021-05-20 11:21:44'),
(441, 'en', 'None', 'None', '2021-05-20 11:22:48', '2021-05-20 11:22:48'),
(444, 'en', 'Dropdown Menu', 'Dropdown Menu', '2021-05-20 11:24:45', '2021-05-20 11:24:45'),
(447, 'en', 'Edit Mega Menu Title', 'Edit Mega Menu Title', '2021-05-20 11:36:40', '2021-05-20 11:36:40'),
(450, 'en', 'Title Enable/Disable', 'Title Enable/Disable', '2021-05-20 11:38:02', '2021-05-20 11:38:02'),
(453, 'en', 'Image Enable/Disable', 'Image Enable/Disable', '2021-05-20 11:39:06', '2021-05-20 11:39:06'),
(456, 'en', 'Image', 'Image', '2021-05-20 11:40:39', '2021-05-20 11:40:39'),
(458, 'en', 'All Posts', 'All Posts', '2021-05-20 12:53:32', '2021-05-20 12:53:32'),
(462, 'en', 'All Pages', 'All Pages', '2021-05-20 12:54:21', '2021-05-20 12:54:21'),
(464, 'en', 'Published', 'Published', '2021-05-25 09:56:59', '2021-05-25 09:56:59'),
(468, 'en', 'Draft', 'Draft', '2021-05-25 09:58:54', '2021-05-25 09:58:54'),
(472, 'en', 'Publish', 'Publish', '2021-05-25 10:00:13', '2021-05-25 10:00:13'),
(475, 'en', 'Select Action', 'Select Action', '2021-05-25 10:01:35', '2021-05-25 10:01:35'),
(477, 'en', 'Home Page', 'Home Page', '2021-05-25 12:53:37', '2021-05-25 12:53:37'),
(478, 'en', 'Home', 'Home', '2021-05-25 12:53:56', '2021-05-25 12:53:56'),
(483, 'en', 'Permalink', 'Permalink', '2021-05-25 13:42:01', '2021-05-25 13:42:01'),
(486, 'en', 'Add New Row', 'Add New Row', '2021-05-27 21:43:58', '2021-05-27 21:43:58'),
(490, 'en', 'Add Column', 'Add Column', '2021-05-27 23:48:08', '2021-05-27 23:48:08'),
(493, 'en', 'Add Item', 'Add Item', '2021-05-27 23:50:41', '2021-05-27 23:50:41'),
(495, 'en', 'Generate', 'Generate', '2021-05-30 00:16:06', '2021-05-30 00:16:06'),
(499, 'en', 'Custom', 'Custom', '2021-05-30 00:18:46', '2021-05-30 00:18:46'),
(501, 'en', 'Save changes', 'Save changes', '2021-05-31 21:13:57', '2021-05-31 21:13:57'),
(505, 'en', 'Row Options', 'Row Options', '2021-05-31 21:15:12', '2021-05-31 21:15:12'),
(507, 'en', 'Define an admin label for easy identification', 'Define an admin label for easy identification.', '2021-05-31 21:23:11', '2021-05-31 21:23:11'),
(511, 'en', 'Admin Label', 'Admin Label', '2021-05-31 21:24:18', '2021-05-31 21:24:18'),
(514, 'en', 'Style', 'Style', '2021-05-31 22:03:43', '2021-05-31 22:03:43'),
(516, 'en', 'Enable this option to make this row fluid. Fluid row will help you publish full width contents.', 'Enable this option to make this row fluid. Fluid row will help you publish full width contents.', '2021-05-31 22:50:30', '2021-05-31 22:50:30'),
(521, 'en', 'Enable this option to remove gutters between columns in this row.', 'Enable this option to remove gutters between columns in this row.', '2021-05-31 22:51:34', '2021-05-31 22:51:34'),
(523, 'en', 'Section ID', 'Section ID', '2021-05-31 22:52:55', '2021-05-31 22:52:55'),
(526, 'en', 'A unique ID that will be applied to this row. Must start with a letter and may only contain dashes, underscores, letters or numbers. No spaces.', 'A unique ID that will be applied to this row. Must start with a letter and may only contain dashes, underscores, letters or numbers. No spaces.', '2021-05-31 22:54:40', '2021-05-31 22:54:40'),
(529, 'en', 'CSS Class', 'CSS Class', '2021-05-31 22:59:01', '2021-05-31 22:59:01'),
(532, 'en', 'If you wish to style a particular content element differently, then use this field to add a class name and also refer to it in your css file.', 'If you wish to style a particular content element differently, then use this field to add a class name and also refer to it in your css file.', '2021-05-31 23:00:43', '2021-05-31 23:00:43'),
(535, 'en', 'Padding Top', 'Padding Top', '2021-05-31 23:06:30', '2021-05-31 23:06:30'),
(538, 'en', 'Padding Bottom', 'Padding Bottom', '2021-05-31 23:07:57', '2021-05-31 23:07:57'),
(541, 'en', 'Background Color', 'Background Color', '2021-05-31 23:19:52', '2021-05-31 23:19:52'),
(544, 'en', 'Background Image', 'Background Image', '2021-05-31 23:24:13', '2021-05-31 23:24:13'),
(546, 'en', 'Background Position', 'Background Position', '2021-05-31 23:55:28', '2021-05-31 23:55:28'),
(549, 'en', 'Mailer', 'Mailer', '2021-06-03 17:11:56', '2021-06-03 17:11:56'),
(554, 'en', 'From Name', 'From Name', '2021-06-03 17:18:02', '2021-06-03 17:18:02'),
(556, 'en', 'From Mail Address', 'From Mail Address', '2021-06-03 17:19:58', '2021-06-03 17:19:58'),
(559, 'en', 'SMTP Host', 'SMTP Host', '2021-06-03 17:26:02', '2021-06-03 17:26:02'),
(562, 'en', 'SMTP Port', 'SMTP Port', '2021-06-03 17:26:36', '2021-06-03 17:26:36'),
(565, 'en', 'SMTP Security', 'SMTP Security', '2021-06-03 17:30:08', '2021-06-03 17:30:08'),
(568, 'en', 'SMTP Username', 'SMTP Username', '2021-06-03 17:31:04', '2021-06-03 17:31:04'),
(571, 'en', 'SMTP Password', 'SMTP Password', '2021-06-03 17:31:54', '2021-06-03 17:31:54'),
(574, 'en', 'To Name', 'To Name', '2021-06-03 17:38:18', '2021-06-03 17:38:18'),
(577, 'en', 'To Mail Address', 'To Mail Address', '2021-06-03 17:39:11', '2021-06-03 17:39:11'),
(579, 'en', 'Theme Options', 'Theme Options', '2021-06-06 22:19:11', '2021-06-06 22:19:11'),
(583, 'en', 'Logo', 'Logo', '2021-06-06 22:25:04', '2021-06-06 22:25:04'),
(586, 'en', 'Custom CSS', 'Custom CSS', '2021-06-06 22:26:40', '2021-06-06 22:26:40'),
(589, 'en', 'Custom JS', 'Custom JS', '2021-06-06 23:41:02', '2021-06-06 23:41:02'),
(598, 'en', 'Tax', 'Tax', '2021-06-27 23:35:37', '2021-06-27 23:35:37'),
(600, 'en', 'Percentage', 'Percentage', '2021-06-28 20:37:30', '2021-06-28 20:37:30'),
(607, 'en', 'Coupons', 'Coupons', '2021-06-28 22:30:40', '2021-06-28 22:30:40'),
(610, 'en', 'Code', 'Code', '2021-06-28 22:36:36', '2021-06-28 22:36:36'),
(613, 'en', 'Expire Date', 'Expire Date', '2021-06-28 22:37:33', '2021-06-28 22:37:33'),
(615, 'en', 'Labels', 'Labels', '2021-06-29 18:04:26', '2021-06-29 18:04:26'),
(619, 'en', 'Color', 'Color', '2021-06-29 18:17:50', '2021-06-29 18:17:50'),
(630, 'en', 'Shipping', 'Shipping', '2021-06-30 19:47:31', '2021-06-30 19:47:31'),
(634, 'en', 'Shipping Fee', 'Shipping Fee', '2021-06-30 20:23:06', '2021-06-30 20:23:06'),
(641, 'en', 'Featured', 'Featured', '2021-06-30 21:57:22', '2021-06-30 21:57:22'),
(644, 'en', 'YES', 'YES', '2021-06-30 21:59:29', '2021-06-30 21:59:29'),
(647, 'en', 'NO', 'NO', '2021-06-30 22:01:20', '2021-06-30 22:01:20'),
(652, 'en', 'Subheader', 'Subheader', '2021-07-02 06:08:40', '2021-07-02 06:08:40'),
(656, 'en', 'SEO', 'SEO', '2021-07-02 06:32:38', '2021-07-02 06:32:38'),
(668, 'en', 'SEO Title', 'SEO Title', '2021-07-02 07:34:34', '2021-07-02 07:34:34'),
(671, 'en', 'SEO Keywords', 'SEO Keywords', '2021-07-02 07:35:48', '2021-07-02 07:35:48'),
(674, 'en', 'SEO Description', 'SEO Description', '2021-07-02 07:37:08', '2021-07-02 07:37:08'),
(677, 'en', 'Open Graph Image', 'Open Graph Image', '2021-07-02 07:38:20', '2021-07-02 07:38:20'),
(679, 'en', 'Offer & Ads', 'Offer & Ads', '2021-07-03 08:21:06', '2021-07-03 08:21:06'),
(682, 'en', 'Offer & Ads Position', 'Offer & Ads Position', '2021-07-03 08:42:55', '2021-07-03 08:42:55'),
(695, 'en', 'Price', 'Price', '2021-07-04 08:01:20', '2021-07-04 08:01:20'),
(698, 'en', 'Images', 'Images', '2021-07-04 08:03:13', '2021-07-04 08:03:13'),
(701, 'en', 'Variations', 'Variations', '2021-07-04 08:04:45', '2021-07-04 08:04:45'),
(704, 'en', 'Inventory', 'Inventory', '2021-07-04 08:11:35', '2021-07-04 08:11:35'),
(710, 'en', 'Short Description', 'Short Description', '2021-07-04 10:11:09', '2021-07-04 10:11:09'),
(716, 'en', 'Category', 'Category', '2021-07-04 10:36:30', '2021-07-04 10:36:30'),
(725, 'en', 'Label', 'Label', '2021-07-04 10:56:21', '2021-07-04 10:56:21'),
(733, 'en', 'Cost Price', 'Cost Price', '2021-07-07 11:16:48', '2021-07-07 11:16:48'),
(737, 'en', 'Sale Price', 'Sale Price', '2021-07-07 11:17:57', '2021-07-07 11:17:57'),
(740, 'en', 'Old Price', 'Old Price', '2021-07-07 11:19:33', '2021-07-07 11:19:33'),
(743, 'en', 'Start Date', 'Start Date', '2021-07-07 11:23:03', '2021-07-07 11:23:03'),
(746, 'en', 'End Date', 'End Date', '2021-07-07 11:24:55', '2021-07-07 11:24:55'),
(749, 'en', 'Manage Stock', 'Manage Stock', '2021-07-07 11:41:20', '2021-07-07 11:41:20'),
(752, 'en', 'SKU', 'SKU', '2021-07-07 11:42:42', '2021-07-07 11:42:42'),
(755, 'en', 'Stock Status', 'Stock Status', '2021-07-07 11:44:53', '2021-07-07 11:44:53'),
(758, 'en', 'Stock Quantity', 'Stock Quantity', '2021-07-07 11:45:58', '2021-07-07 11:45:58'),
(761, 'en', 'In Stock', 'In Stock', '2021-07-07 11:50:08', '2021-07-07 11:50:08'),
(763, 'en', 'Featured image', 'Featured image', '2021-07-08 08:00:05', '2021-07-08 08:00:05'),
(766, 'en', 'Size', 'Size', '2021-07-08 12:40:54', '2021-07-08 12:40:54'),
(770, 'en', 'Select color', 'Select color', '2021-07-08 12:42:38', '2021-07-08 12:42:38'),
(773, 'en', 'Select Size', 'Select Size', '2021-07-08 12:43:06', '2021-07-08 12:43:06'),
(775, 'en', 'Multiple Images', 'Multiple Images', '2021-07-08 21:11:21', '2021-07-08 21:11:21'),
(778, 'en', 'Social Media', 'Social Media', '2021-07-11 10:44:12', '2021-07-11 10:44:12'),
(786, 'en', 'Twitter', 'Twitter', '2021-08-05 10:46:38', '2021-08-05 10:46:38'),
(787, 'en', 'Google Analytics', 'Google Analytics', '2021-08-05 11:12:25', '2021-08-05 11:12:25'),
(791, 'en', 'Google Tag Manager', 'Google Tag Manager', '2021-08-05 11:13:07', '2021-08-05 11:13:07'),
(794, 'en', 'Whatsapp', 'Whatsapp', '2021-08-05 11:13:46', '2021-08-05 11:13:46'),
(806, 'en', 'See all', 'See all', '2021-08-15 02:55:49', '2021-08-15 02:55:49'),
(811, 'en', 'Currency', 'Currency', '2021-08-21 09:02:08', '2021-08-21 09:02:08'),
(815, 'en', 'Currency Name', 'Currency Name', '2021-08-21 09:04:50', '2021-08-21 09:04:50'),
(818, 'en', 'Currency Icon', 'Currency Icon', '2021-08-21 09:06:14', '2021-08-21 09:06:14'),
(821, 'en', 'Currency Position', 'Currency Position', '2021-08-21 09:07:57', '2021-08-21 09:07:57'),
(823, 'en', 'RTL', 'RTL', '2021-08-24 09:53:21', '2021-08-24 09:53:21'),
(4659, 'en', 'Available Offer', 'Available Offer', '2021-08-25 11:07:01', '2022-04-06 01:33:43'),
(4670, 'en', 'Header', 'Header', '2021-08-29 08:05:33', '2021-08-29 08:05:33'),
(4674, 'en', 'Footer', 'Footer', '2021-08-29 08:10:34', '2021-08-29 08:10:34'),
(4677, 'en', 'Subscribe our newsletter', 'Subscribe our newsletter', '2021-08-29 08:48:22', '2021-08-29 08:48:22'),
(4680, 'en', 'Submit', 'Submit', '2021-08-29 08:50:31', '2021-08-29 08:50:31'),
(4683, 'en', 'Enter your email', 'Enter your email', '2021-08-29 08:52:37', '2021-08-29 08:52:37'),
(4686, 'en', 'Contact Us', 'Contact Us', '2021-08-29 09:55:59', '2021-08-29 09:55:59'),
(4689, 'en', 'Copyright', 'Copyright', '2021-08-29 10:42:27', '2021-08-29 10:42:27'),
(4693, 'en', 'Quick links', 'Quick links', '2021-08-29 11:02:09', '2021-08-29 11:02:09'),
(4694, 'en', 'Company', 'Company', '2021-08-29 11:03:15', '2021-08-29 11:03:15'),
(4721, 'en', 'Availability', 'Availability', '2021-09-10 03:49:55', '2021-09-10 03:49:55'),
(4724, 'en', 'Quantity', 'Quantity', '2021-09-10 03:51:11', '2021-09-10 03:51:11'),
(4727, 'en', 'Buy Now', 'Buy Now', '2021-09-10 03:54:50', '2021-09-10 03:54:50'),
(4730, 'en', 'Add To Cart', 'Add To Cart', '2021-09-10 03:55:52', '2021-09-10 03:55:52'),
(4742, 'en', 'Your rating of this product', 'Your rating of this product', '2021-09-10 05:22:49', '2021-09-10 05:22:49'),
(4748, 'en', 'login', 'Login', '2021-09-10 05:24:43', '2021-09-28 09:23:08'),
(4757, 'en', 'Showing', 'Showing', '2021-09-11 07:22:53', '2021-09-11 07:22:53'),
(4760, 'en', 'Default', 'Default', '2021-09-11 07:24:00', '2021-09-11 07:24:00'),
(4766, 'en', 'Added product to cart failed.', 'Added product to cart failed.', '2021-09-13 11:30:38', '2021-09-13 11:30:38'),
(4769, 'en', 'Shopping Cart', 'Shopping Cart', '2021-09-13 11:46:43', '2021-09-13 11:46:43'),
(4772, 'en', 'View Cart', 'View Cart', '2021-09-13 11:47:35', '2021-09-13 11:47:35'),
(4775, 'en', 'Checkout', 'Checkout', '2021-09-13 11:48:22', '2021-09-13 11:48:22'),
(4778, 'en', 'Subtotal', 'Subtotal', '2021-09-13 23:20:14', '2022-08-08 09:11:17'),
(4781, 'en', 'Total', 'Total', '2021-09-13 23:21:56', '2021-09-13 23:21:56'),
(4784, 'en', 'Please select required field.', 'Please select required field.', '2021-09-15 21:02:25', '2021-09-15 21:02:25'),
(4796, 'en', 'Cart', 'Cart', '2021-09-16 12:02:31', '2021-09-16 12:02:31'),
(4799, 'en', 'Variation', 'Variation', '2021-09-16 23:35:03', '2021-09-16 23:35:03'),
(4802, 'en', 'Remove', 'Remove', '2021-09-16 23:38:21', '2021-09-16 23:38:21'),
(4811, 'en', 'Cart Total', 'Cart Total', '2021-09-16 23:45:17', '2021-09-16 23:45:17'),
(4814, 'en', 'Price Total', 'Price Total', '2021-09-16 23:46:27', '2021-09-16 23:46:27'),
(4817, 'en', 'Proceed To CheckOut', 'Proceed To CheckOut', '2021-09-16 23:48:05', '2021-09-16 23:48:05'),
(4820, 'en', 'Discount', 'Discount', '2021-09-17 00:47:11', '2021-09-17 00:47:11'),
(4826, 'en', 'View', 'View', '2021-09-17 04:44:37', '2021-09-17 04:44:37'),
(4835, 'en', 'Facebook APP ID', 'Facebook APP ID', '2021-09-17 11:39:22', '2021-09-17 11:39:22'),
(4838, 'en', 'Facebook Pixel', 'Facebook Pixel', '2021-09-17 11:41:41', '2021-09-17 11:41:41'),
(4841, 'en', 'Register', 'Register', '2021-09-28 10:50:46', '2021-09-28 10:50:46'),
(4844, 'en', 'Sign in', 'Sign in', '2021-09-28 10:52:03', '2021-09-28 10:52:03'),
(4847, 'en', 'Sign up for an account', 'Sign up for an account', '2021-09-28 11:40:45', '2021-09-28 11:40:45'),
(4850, 'en', 'Forgot your password?', 'Forgot your password?', '2021-09-28 11:42:04', '2021-09-28 11:42:04'),
(4853, 'en', 'Back to login', 'Back to login', '2021-09-28 11:43:17', '2021-09-28 11:43:17'),
(4856, 'en', 'Please enter your email address and password', 'Please enter your email address and password', '2021-09-29 10:08:45', '2021-09-29 10:08:45'),
(4859, 'en', 'Please fill in the information below', 'Please fill in the information below', '2021-09-29 10:09:40', '2021-09-29 10:09:40'),
(4862, 'en', 'Remember me', 'Remember me', '2021-09-29 10:15:34', '2021-09-29 10:15:34'),
(4865, 'en', 'Confirm password', 'Confirm password', '2021-09-29 11:20:49', '2021-09-29 11:20:49'),
(4868, 'en', 'My Dashboard', 'My Dashboard', '2021-09-29 11:55:55', '2021-09-29 11:55:55'),
(4871, 'en', 'Logout', 'Logout', '2021-09-29 11:56:36', '2021-09-29 11:56:36'),
(4874, 'en', 'The recaptcha field is required', 'The recaptcha field is required', '2021-09-30 07:52:58', '2021-09-30 07:52:58'),
(4877, 'en', 'Thanks! You have register successfully. Please login.', 'Thanks! You have register successfully. Please login.', '2021-09-30 08:21:09', '2021-09-30 08:21:09'),
(4880, 'en', 'Oops! You are failed registration. Please try again.', 'Oops! You are failed registration. Please try again.', '2021-09-30 08:23:47', '2021-09-30 08:23:47'),
(4883, 'en', 'Your email address and password incorrect.', 'Your email address and password incorrect.', '2021-09-30 08:28:38', '2021-09-30 08:28:38'),
(4886, 'en', 'Reset Password', 'Reset Password', '2021-09-30 10:35:18', '2021-09-30 10:35:18'),
(4889, 'en', 'Enter your email address below and we will send you a link to reset your password', 'Enter your email address below and we will send you a link to reset your password', '2021-09-30 10:37:14', '2021-09-30 10:37:14'),
(4892, 'en', 'Send Password Reset Link', 'Send Password Reset Link', '2021-09-30 10:42:40', '2021-09-30 10:42:40'),
(4895, 'en', 'We can not find a user with that email address', 'We can not find a user with that email address', '2021-09-30 11:03:06', '2021-09-30 11:03:06'),
(4898, 'en', 'We have emailed your password reset link!', 'We have emailed your password reset link!', '2021-09-30 11:45:54', '2021-09-30 11:45:54'),
(4901, 'en', 'Oops! You are failed change password request. Please try again', 'Oops! You are failed change password request. Please try again', '2021-09-30 11:48:27', '2021-09-30 11:48:27'),
(4904, 'en', 'Forgot your password', 'Forgot your password', '2021-09-30 13:12:42', '2021-09-30 13:12:42'),
(4907, 'en', 'Need to forgot your password? No problem! Just click the button below and you will be on way. If you did not make this request, please ignore this email.', 'Need to forgot your password? No problem! Just click the button below and you will be on way. If you did not make this request, please ignore this email.', '2021-09-30 13:13:52', '2021-09-30 13:13:52'),
(4910, 'en', 'This password reset token is invalid', 'This password reset token is invalid', '2021-10-01 07:49:02', '2021-10-01 07:49:02'),
(4913, 'en', 'Oops! You are failed change password. Please try again', 'Oops! You are failed change password. Please try again', '2021-10-01 07:52:55', '2021-10-01 07:52:55'),
(4916, 'en', 'Your password changed successfully', 'Your password changed successfully', '2021-10-01 07:54:07', '2021-10-01 07:54:07'),
(4919, 'en', 'This password reset email is invalid', 'This password reset email is invalid', '2021-10-01 08:19:38', '2021-10-01 08:19:38'),
(4922, 'en', 'Dashboard', 'Dashboard', '2021-10-02 11:01:08', '2021-10-02 11:01:08'),
(4925, 'en', 'Orders', 'Orders', '2021-10-02 11:02:40', '2021-10-02 11:02:40'),
(4928, 'en', 'Change Password', 'Change Password', '2021-10-02 11:04:43', '2021-10-02 11:04:43'),
(4931, 'en', 'Update', 'Update', '2021-10-02 11:52:48', '2021-10-02 11:52:48'),
(4934, 'en', 'State', 'State', '2021-10-04 10:27:02', '2021-10-04 10:27:02'),
(4937, 'en', 'City', 'City', '2021-10-04 10:29:13', '2021-10-04 10:29:13'),
(4943, 'en', 'Already have an account?', 'Already have an account?', '2021-10-06 08:58:36', '2021-10-06 08:58:36'),
(4946, 'en', 'Register an account with above information?', 'Register an account with above information?', '2021-10-06 09:01:29', '2021-10-06 09:01:29'),
(4949, 'en', 'Country', 'Country', '2021-10-06 10:04:40', '2021-10-06 10:04:40'),
(4956, 'en', 'Stripe Secret', 'Stripe Secret', '2021-10-07 09:29:45', '2021-10-07 09:29:45'),
(4958, 'en', 'Stripe Method', 'Stripe Method', '2021-10-07 10:13:45', '2021-10-07 10:13:45'),
(4961, 'en', 'Cash on Delivery (COD)', 'Cash On', '2021-10-07 10:16:20', '2023-01-29 09:17:00'),
(4964, 'en', 'Stripe', 'Stripe', '2021-10-07 10:40:49', '2021-10-07 10:40:49'),
(4967, 'en', 'Bank Transfer', 'Bank Transfer', '2021-10-07 10:52:11', '2021-10-07 10:52:11'),
(4970, 'en', 'Payment Method', 'Payment Method', '2021-10-07 11:26:25', '2021-10-07 11:26:25'),
(4973, 'en', 'Pay online via Stripe', 'Pay online via Stripe', '2021-10-07 11:27:38', '2021-10-07 11:27:38'),
(4976, 'en', 'Publishable Key', 'Publishable Key', '2021-10-07 12:26:28', '2021-10-07 12:26:28'),
(4979, 'en', 'Payment Gateway Icon', 'Payment Gateway Icon', '2021-10-07 21:28:25', '2021-10-07 21:28:25'),
(4980, 'en', 'Payment Methods', 'Payment Methods', '2021-10-07 21:28:56', '2021-10-07 21:28:56'),
(4983, 'en', 'Shipping Method', 'Shipping Method', '2021-10-07 23:00:55', '2021-10-07 23:00:55'),
(4998, 'en', 'Please type valid card number', 'Please type valid card number', '2021-10-11 10:29:24', '2021-10-11 10:29:24'),
(5010, 'en', 'Thank', 'Thank', '2021-10-13 08:44:47', '2021-10-13 08:44:47'),
(5013, 'en', 'Order#', 'Order#', '2021-10-13 10:11:56', '2021-10-13 10:11:56'),
(5019, 'en', 'Guest User', 'Guest User', '2021-10-13 10:20:16', '2021-10-13 10:20:16'),
(5022, 'en', 'Customer', 'Customer', '2021-10-13 10:22:53', '2021-10-13 10:22:53'),
(5025, 'en', 'Amount', 'Amount', '2021-10-13 10:23:44', '2021-10-13 10:23:44'),
(5028, 'en', 'Qty', 'Qty', '2021-10-13 10:24:41', '2021-10-13 10:24:41'),
(5031, 'en', 'Payment Status', 'Payment Status', '2021-10-13 10:27:54', '2021-10-13 10:27:54'),
(5034, 'en', 'Order Status', 'Order Status', '2021-10-13 10:28:44', '2021-10-13 10:28:44'),
(5037, 'en', 'Filter', 'Filter', '2021-10-14 07:43:49', '2021-10-14 07:43:49'),
(5040, 'en', 'Order', 'Order', '2021-10-14 08:48:34', '2021-10-14 08:48:34'),
(5043, 'en', 'Send confirmation email to customer', 'Send confirmation email to customer', '2021-10-14 11:22:27', '2021-10-14 11:22:27'),
(5055, 'en', 'If you have any questions about this invoice, please contact us', 'If you have any questions about this invoice, please contact us', '2021-10-15 11:03:39', '2021-10-15 11:03:39'),
(5058, 'en', 'Invoice', 'Invoice', '2021-10-15 11:17:01', '2021-10-15 11:17:01'),
(5067, 'en', 'Invoice Information', 'Invoice Information', '2021-10-16 10:21:23', '2021-10-16 10:21:23'),
(5070, 'en', 'To', 'To', '2021-10-16 10:53:40', '2021-10-16 10:53:40'),
(5073, 'en', 'BILL TO', 'BILL TO', '2021-10-18 07:27:41', '2021-10-18 07:27:41'),
(5076, 'en', 'BILL FROM', 'BILL FROM', '2021-10-18 07:31:10', '2021-10-18 07:31:10'),
(5082, 'en', 'Thanks for your order. You can find your purchase information below.', 'Thanks for your order. You can find your purchase information below.', '2021-10-18 09:09:31', '2021-10-18 09:09:31'),
(5085, 'en', 'Hi', 'Hi', '2021-10-18 09:10:40', '2021-10-18 09:10:40'),
(5088, 'en', 'Your order status', 'Your order status', '2021-10-18 10:27:44', '2021-10-18 10:27:44'),
(5094, 'en', 'Order Details', 'Order Details', '2021-10-19 12:01:32', '2021-10-19 12:01:32'),
(5097, 'en', 'Current password does not match.', 'Current password does not match.', '2021-10-20 01:23:42', '2021-10-20 01:23:42'),
(5100, 'en', 'New password can not be the old password!', 'New password can not be the old password!', '2021-10-20 01:27:11', '2021-10-20 01:27:11'),
(5103, 'en', 'Current password', 'Current password', '2021-10-20 01:31:47', '2021-10-20 01:31:47'),
(5106, 'en', 'New password', 'New password', '2021-10-20 01:32:48', '2021-10-20 01:32:48'),
(5109, 'en', 'Password confirmation', 'Password confirmation', '2021-10-20 01:33:53', '2021-10-20 01:33:53'),
(5112, 'en', 'Do you really want to active this records', 'Do you really want to active this records', '2021-10-20 06:17:20', '2021-10-20 06:17:20'),
(5115, 'en', 'Do you really want to inactive this records', 'Do you really want to inactive this records', '2021-10-20 06:18:15', '2021-10-20 06:18:15'),
(5118, 'en', 'Customers', 'Customers', '2021-10-20 10:20:56', '2023-01-06 05:48:53'),
(5121, 'en', 'Write comment', 'Write comment', '2021-10-21 07:13:25', '2021-10-21 07:13:25'),
(5124, 'en', 'Please Login', 'Please Login', '2021-10-21 07:47:07', '2021-10-21 07:47:07'),
(5133, 'en', 'Oops! You are unauthorized. Please login.', 'Oops! You are unauthorized. Please login.', '2021-10-21 08:20:07', '2021-10-21 08:20:07'),
(5142, 'en', 'Ratings', 'Ratings', '2021-10-21 10:18:17', '2021-10-21 10:18:17'),
(5145, 'en', 'Comments', 'Comments', '2021-10-21 10:21:08', '2021-10-21 10:21:08'),
(5151, 'en', 'All Category', 'All Category', '2021-10-22 07:25:42', '2021-10-22 07:25:42'),
(5157, 'en', 'All Collection', 'All Collection', '2021-10-22 07:30:22', '2021-10-22 07:30:22'),
(5163, 'en', 'Backend Theme color', 'Backend Theme color', '2021-10-29 02:21:31', '2023-02-16 11:24:55'),
(5166, 'en', 'Awaiting processing', 'Awaiting processing', '2021-10-30 09:34:35', '2021-10-30 09:34:35'),
(5169, 'en', 'Processing', 'Processing', '2021-10-30 09:36:03', '2021-10-30 09:36:03'),
(5172, 'en', 'Ready for pickup', 'Ready for pickup', '2021-10-30 09:36:51', '2021-10-30 09:36:51'),
(5175, 'en', 'Completed', 'Completed', '2021-10-30 09:37:41', '2021-10-30 09:37:41'),
(5178, 'en', 'Canceled', 'Canceled', '2021-10-30 09:38:25', '2021-10-30 09:38:25'),
(5209, 'en', 'Selling', 'Selling', '2021-10-31 08:21:16', '2021-10-31 08:21:16'),
(5212, 'en', 'Newsletters', 'Newsletters', '2021-11-01 08:53:47', '2021-11-01 08:53:47'),
(5218, 'en', 'MailChimp Settings', 'MailChimp Settings', '2021-11-01 09:06:20', '2021-11-01 09:06:20'),
(5220, 'en', 'MailChimp API Key', 'MailChimp API Key', '2021-11-01 09:11:02', '2021-11-01 09:11:02'),
(5223, 'en', 'Audience ID', 'Audience ID', '2021-11-01 09:16:13', '2021-11-01 09:16:13'),
(5226, 'en', 'Subscribe Popup', 'Subscribe Popup', '2021-11-01 09:43:27', '2021-11-01 09:43:27'),
(5232, 'en', 'Created At', 'Created At', '2021-11-01 10:53:10', '2021-11-01 10:53:10'),
(5235, 'en', 'You have successfully subscribed.', 'You have successfully subscribed.', '2021-11-02 09:39:45', '2021-11-02 09:39:45'),
(5238, 'en', 'You are already subscribed.', 'You are already subscribed.', '2021-11-02 09:41:44', '2021-11-02 09:41:44'),
(5241, 'en', 'Some problem occurred, please try again.', 'Some problem occurred, please try again.', '2021-11-02 09:43:52', '2021-11-02 09:43:52'),
(5244, 'en', 'Please enable mailchimp.', 'Please enable mailchimp.', '2021-11-02 09:48:33', '2021-11-02 09:48:33'),
(5247, 'en', 'MailChimp API Key Invalid.', 'MailChimp API Key Invalid.', '2021-11-02 10:05:29', '2021-11-02 10:05:29'),
(5250, 'en', 'The requested resource could not be found.', 'The requested resource could not be found.', '2021-11-02 10:16:11', '2021-11-02 10:16:11'),
(5256, 'en', 'Enter your email address', 'Enter your email address', '2021-11-05 07:43:20', '2021-11-05 07:43:20'),
(5259, 'en', 'Transactions', 'Transactions', '2021-11-07 08:14:44', '2021-11-07 08:14:44'),
(5262, 'en', 'Date', 'Date', '2021-11-07 09:16:20', '2021-11-07 09:16:20'),
(5265, 'en', 'Transaction#', 'Transaction#', '2021-11-07 09:22:09', '2021-11-07 09:22:09'),
(5268, 'en', 'Hello', 'Hello', '2021-11-16 11:08:54', '2021-11-16 11:08:54'),
(5713, 'en', 'Excel', 'Excel', '2021-11-30 10:19:17', '2021-11-30 10:19:17'),
(5716, 'en', 'CSV', 'CSV', '2021-11-30 10:20:34', '2021-11-30 10:20:34'),
(5719, 'en', 'Default Language', 'Default Language', '2021-12-01 08:58:28', '2021-12-01 08:58:28'),
(7708, 'en', 'Create an seller account', 'Create an seller account', '2021-12-07 09:28:05', '2021-12-07 09:28:05'),
(7711, 'en', 'Create an customer account', 'Create an customer account', '2021-12-07 09:29:56', '2021-12-07 09:29:56'),
(7714, 'en', 'Shop Name', 'Shop Name', '2021-12-07 09:55:08', '2021-12-07 09:55:08'),
(7717, 'en', 'Shop URL', 'Shop URL', '2021-12-07 10:03:59', '2021-12-07 10:03:59'),
(7720, 'en', 'Shop Phone', 'Shop Phone', '2021-12-07 10:05:36', '2021-12-07 10:05:36'),
(7723, 'en', 'Available', 'Available', '2021-12-09 10:35:12', '2021-12-09 10:35:12'),
(7726, 'en', 'Not Available', 'Not Available', '2021-12-09 10:36:35', '2021-12-09 10:36:35'),
(7730, 'en', 'Thanks! You have register successfully. Your account is pending for review.', 'Thanks! You have register successfully. Your account is pending for review.', '2021-12-09 11:52:22', '2021-12-09 11:52:22'),
(7757, 'en', 'Bank Name', 'Bank Name', '2021-12-13 08:46:35', '2021-12-13 08:46:35'),
(7760, 'en', 'Bank Code/IFSC', 'Bank Code/IFSC', '2021-12-13 08:48:28', '2021-12-13 08:48:28'),
(7763, 'en', 'Account Number', 'Account Number', '2021-12-13 09:23:30', '2021-12-13 09:23:30'),
(7766, 'en', 'Account Holder Name', 'Account Holder Name', '2021-12-13 09:24:46', '2021-12-13 09:24:46'),
(8235, 'en', 'PayPal ID', 'PayPal ID', '2021-12-21 09:29:38', '2021-12-21 09:29:38'),
(8238, 'en', 'Joined At', 'Joined At', '2021-12-21 10:30:19', '2021-12-21 10:30:19'),
(8241, 'en', 'Bank Information', 'Bank Information', '2021-12-21 10:52:46', '2021-12-21 10:52:46'),
(8244, 'en', 'Details', 'Details', '2021-12-21 10:53:41', '2021-12-21 10:53:41'),
(8247, 'en', 'My Account', 'My Account', '2021-12-25 00:02:31', '2021-12-25 00:02:31'),
(8252, 'en', 'Total Amount', 'Total Amount', '2021-12-31 03:24:10', '2021-12-31 03:24:10'),
(8270, 'en', 'Find', 'Find', '2022-01-03 10:52:20', '2022-01-03 10:52:20'),
(8291, 'en', 'Zip Code', 'Zip Code', '2022-01-11 11:30:34', '2022-01-11 11:30:34'),
(8294, 'en', 'Fee', 'Fee', '2022-01-12 11:00:50', '2022-01-12 11:00:50'),
(8297, 'en', 'Transaction ID', 'Transaction ID', '2022-01-12 11:28:32', '2022-01-12 11:28:32'),
(8315, 'en', 'All Status', 'All Status', '2022-01-17 10:56:27', '2022-01-17 10:56:27'),
(8321, 'en', 'Since', 'Since', '2022-01-21 03:25:18', '2022-01-21 03:25:18'),
(8327, 'en', 'View Website', 'View Website', '2022-01-21 11:39:34', '2022-01-21 11:39:34'),
(8330, 'en', 'Subscribe Settings', 'Subscribe Settings', '2022-01-22 08:35:09', '2022-01-22 08:35:09'),
(8336, 'en', 'Language Switcher', 'Language Switcher', '2022-01-22 10:12:08', '2022-01-22 10:12:08'),
(8339, 'en', 'Paypal', 'Paypal', '2022-05-20 03:52:47', '2022-05-20 03:52:47'),
(8342, 'en', 'Paypal Method', 'Paypal Method', '2022-05-20 03:56:33', '2022-05-20 03:56:33'),
(8345, 'en', 'Client ID', 'Client ID', '2022-05-20 04:06:21', '2022-05-20 04:06:21'),
(8348, 'en', 'Secret', 'Secret', '2022-05-20 04:09:49', '2022-05-20 04:09:49'),
(8351, 'en', 'Sandbox mode', 'Sandbox mode', '2022-05-20 05:02:26', '2022-05-20 05:02:26'),
(8354, 'en', 'Razorpay', 'Razorpay', '2022-05-20 06:08:31', '2022-05-20 06:08:31'),
(8357, 'en', 'Razorpay Method', 'Razorpay Method', '2022-05-20 06:11:09', '2022-05-20 06:11:09'),
(8360, 'en', 'Key Id', 'Key Id', '2022-05-20 06:19:15', '2022-05-20 06:19:15'),
(8363, 'en', 'Key Secret', 'Key Secret', '2022-05-20 06:21:38', '2022-05-20 06:21:38'),
(8366, 'en', 'Mollie', 'Mollie', '2022-05-20 07:34:24', '2022-05-20 07:34:24'),
(8369, 'en', 'Mollie Method', 'Mollie Method', '2022-05-20 07:36:26', '2022-05-20 07:36:26'),
(8372, 'en', 'API Key', 'API Key', '2022-05-20 07:45:45', '2022-05-20 07:45:45'),
(8375, 'en', 'Pay online via Paypal', 'Pay online via Paypal', '2022-05-20 11:21:54', '2022-05-20 11:21:54'),
(8378, 'en', 'Payment with PayPal', 'Payment with PayPal', '2022-05-20 11:27:14', '2022-05-20 11:27:14'),
(8381, 'en', 'Pay online via Razorpay', 'Pay online via Razorpay', '2022-05-20 11:33:32', '2022-05-20 11:33:32'),
(8384, 'en', 'Payment with Razorpay', 'Payment with Razorpay', '2022-05-20 11:34:11', '2022-05-20 11:34:11'),
(8387, 'en', 'Pay online via Mollie', 'Pay online via Mollie', '2022-05-20 11:38:33', '2022-05-20 11:38:33'),
(8390, 'en', 'Payment with Mollie', 'Payment with Mollie', '2022-05-20 11:39:19', '2022-05-20 11:39:19'),
(8393, 'en', 'Connection timeout', 'Connection timeout', '2022-05-27 05:06:38', '2022-05-27 05:06:38'),
(8396, 'en', 'Some error occur, sorry for inconvenient', 'Some error occur, sorry for inconvenient', '2022-05-27 05:08:13', '2022-05-27 05:08:13'),
(8399, 'en', 'Unknown error occurred', 'Unknown error occurred', '2022-05-27 06:00:39', '2022-05-27 06:00:39'),
(8402, 'en', 'Payment failed', 'Payment failed', '2022-05-27 06:55:32', '2022-05-27 06:55:32'),
(8405, 'en', 'Test Mode', 'Test Mode', '2022-05-31 08:52:27', '2022-05-31 08:52:27'),
(8408, 'en', 'Thumbnail Image', 'Thumbnail Image', '2022-06-30 23:36:15', '2022-06-30 23:36:15'),
(8411, 'en', 'Layer Image 1', 'Layer Image 1', '2022-06-30 23:39:16', '2022-06-30 23:39:16'),
(8414, 'en', 'Sub Title', 'Sub Title', '2022-06-30 23:54:25', '2022-06-30 23:54:25'),
(8417, 'en', 'Layer Image 2', 'Layer Image 2', '2022-07-01 00:38:26', '2022-07-01 00:38:26'),
(8420, 'en', 'Layer Image 3', 'Layer Image 3', '2022-07-01 03:36:30', '2022-07-01 03:36:30'),
(8438, 'en', 'Youtube Video URL', 'Youtube Video URL', '2022-07-20 08:10:02', '2022-07-20 08:10:02'),
(8441, 'en', 'Button Text', 'Button Text', '2022-07-20 08:19:59', '2022-07-20 08:19:59'),
(8444, 'en', 'Footer Subscribe Section', 'Footer Subscribe Section', '2022-07-22 04:57:23', '2022-07-22 04:57:23'),
(8447, 'en', 'Subscribe', 'Subscribe', '2022-07-22 06:05:08', '2022-07-22 06:05:08'),
(8450, 'en', 'About Us', 'About Us', '2022-07-22 08:25:05', '2022-07-22 08:25:05'),
(8456, 'en', 'Show More', 'Show More', '2022-07-22 10:35:48', '2022-07-22 10:35:48'),
(8462, 'en', 'Themes', 'Themes', '2022-07-26 09:45:45', '2022-07-26 09:45:45'),
(8465, 'en', 'Activated', 'Activated', '2022-07-26 10:58:56', '2022-07-26 10:58:56'),
(8468, 'en', 'Activate', 'Activate', '2022-07-26 10:59:32', '2022-07-26 10:59:32'),
(8471, 'en', 'Updated Successfully', 'Updated Successfully', '2022-07-26 11:16:37', '2022-07-26 11:16:37'),
(8474, 'en', 'Saved Successfully', 'Saved Successfully', '2022-07-26 11:17:03', '2022-07-26 11:17:03'),
(8480, 'en', 'Unit', 'Unit', '2022-08-02 10:29:08', '2022-08-02 10:29:08'),
(8483, 'en', 'Discount Manage', 'Discount Manage', '2022-08-02 10:58:55', '2022-08-02 10:58:55'),
(8486, 'en', 'Vendor', 'Vendor', '2022-08-07 08:25:23', '2022-08-07 08:25:23'),
(8489, 'en', 'Off', 'Off', '2022-08-09 00:34:07', '2022-08-09 00:34:07'),
(8498, 'en', 'Page Variation', 'Page Variation', '2022-08-11 11:35:13', '2022-08-11 11:35:13'),
(8501, 'en', 'Homepage Variation', 'Homepage Variation', '2022-08-11 11:36:35', '2022-08-11 11:36:35'),
(8507, 'en', 'Category Page Variation', 'Category Page Variation', '2022-08-11 23:29:35', '2022-08-11 23:29:35'),
(8513, 'en', 'Full width without sidebar', 'Full width without sidebar', '2022-08-12 00:18:09', '2022-08-12 00:18:09'),
(8516, 'en', 'Left Sidebar', 'Left Sidebar', '2022-08-12 00:18:48', '2022-08-12 00:18:48'),
(8520, 'en', 'Right Sidebar', 'Right Sidebar', '2022-08-12 00:19:36', '2022-08-12 00:19:36'),
(8531, 'en', 'Top Rated', 'Top Rated', '2022-08-13 10:27:52', '2022-08-13 10:27:52'),
(8565, 'en', 'Manage Page', 'Manage Page', '2022-08-18 05:15:30', '2022-08-18 05:15:30'),
(8567, 'en', 'Section Manage', 'Section Manage', '2022-08-18 05:18:09', '2022-08-18 05:18:09'),
(8570, 'en', 'All Manage Page', 'All Manage Page', '2022-08-18 08:20:23', '2022-08-18 08:20:23'),
(8577, 'en', 'Price Range', 'Price Range', '2022-08-23 10:46:41', '2022-08-23 10:46:41'),
(8579, 'en', 'Countries', 'Countries', '2022-08-24 09:58:42', '2022-08-24 09:58:42'),
(8582, 'en', 'Contact', 'Contact', '2022-08-25 11:10:53', '2022-08-25 11:10:53'),
(8585, 'en', 'Get In Touch', 'Get In Touch', '2022-08-25 11:21:59', '2022-08-25 11:21:59'),
(8588, 'en', 'Contact Info', 'Contact Info', '2022-08-25 11:22:54', '2022-08-25 11:22:54'),
(8591, 'en', 'Google Map', 'Google Map', '2022-08-25 23:16:36', '2022-08-25 23:16:36'),
(8597, 'en', 'Latitude', 'Latitude', '2022-08-25 23:40:27', '2022-08-25 23:40:27'),
(8600, 'en', 'Longitude', 'Longitude', '2022-08-25 23:41:03', '2022-08-25 23:41:03'),
(8603, 'en', 'Zoom', 'Zoom', '2022-08-25 23:41:34', '2022-08-25 23:41:34'),
(8606, 'en', 'Contact Form', 'Contact Form', '2022-08-26 00:14:14', '2022-08-26 00:14:14'),
(8609, 'en', 'Add Field', 'Add Field', '2022-08-26 03:22:56', '2022-08-26 03:22:56'),
(8612, 'en', 'Dropdown Values', 'Dropdown Values', '2022-08-26 03:45:54', '2022-08-26 03:45:54'),
(8615, 'en', 'Please fill up all mandatory fields', 'Please fill up all mandatory fields', '2022-08-26 09:32:13', '2022-08-26 09:32:13'),
(8618, 'en', 'Send Message', 'Send Message', '2022-08-26 10:45:10', '2022-08-26 10:45:10'),
(8621, 'en', 'Label Show/Hide', 'Label Show/Hide', '2022-08-27 08:06:45', '2022-08-27 08:06:45'),
(8624, 'en', 'reCAPTCHA is not valid. Please try again!', 'reCAPTCHA is not valid. Please try again!', '2022-08-28 08:52:02', '2022-08-28 08:52:02'),
(8627, 'en', 'Please check the captcha', 'Please check the captcha', '2022-08-28 08:53:58', '2022-08-28 08:53:58'),
(8630, 'en', 'Your message has been delivered', 'Your message has been delivered', '2022-08-28 09:27:34', '2022-08-28 09:27:34'),
(8634, 'en', 'Oops! Message could not be sent. Please try again.', 'Oops! Message could not be sent. Please try again.', '2022-08-28 09:33:07', '2022-08-28 09:33:07'),
(8636, 'en', 'Select Mail Subject Field', 'Select Mail Subject Field', '2022-08-28 10:41:02', '2022-08-28 10:41:02'),
(8639, 'en', 'Share this', 'Share this', '2022-08-30 07:00:22', '2022-08-30 07:00:22'),
(8642, 'en', 'Your cart is empty!', 'Your cart is empty!', '2022-09-01 12:11:03', '2022-09-01 12:11:03'),
(8651, 'en', 'Dark Gray Color', 'Dark Gray Color', '2022-09-01 23:26:24', '2022-09-01 23:26:24'),
(8655, 'en', 'Gray Color', 'Gray Color', '2022-09-01 23:26:51', '2022-09-01 23:26:51'),
(8661, 'en', 'Black Color', 'Black Color', '2022-09-01 23:38:22', '2022-09-01 23:38:22'),
(8664, 'en', 'White Color', 'White Color', '2022-09-01 23:39:06', '2022-09-01 23:39:06'),
(8666, 'en', 'Cookie Consent', 'Cookie Consent', '2022-10-15 09:38:24', '2022-10-15 09:38:24'),
(8670, 'en', 'Message', 'Message', '2022-10-15 09:39:25', '2022-10-15 09:39:25'),
(8673, 'en', 'Learn More URL', 'Learn More URL', '2022-10-15 09:40:09', '2022-10-15 09:40:09'),
(8675, 'en', 'Learn More Text', 'Learn More Text', '2022-10-15 09:40:26', '2022-10-15 09:40:26'),
(8682, 'en', 'Blog', 'Blog', '2022-10-17 09:40:18', '2022-10-17 09:40:18'),
(8684, 'en', 'Read More', 'Read More', '2022-10-19 11:16:16', '2022-10-19 11:16:16'),
(8687, 'en', 'By', 'By', '2022-10-19 11:19:48', '2022-10-19 11:19:48'),
(8690, 'en', 'Blog Categories', 'Blog Categories', '2022-10-20 11:18:06', '2022-10-20 11:18:06'),
(8693, 'en', 'Thousands Separator', 'Thousands Separator', '2022-12-08 17:33:10', '2022-12-08 17:33:10'),
(8694, 'en', 'Decimal Separator', 'Decimal Separator', '2022-12-08 17:40:39', '2022-12-08 17:40:39'),
(8695, 'en', 'Decimal Digit', 'Decimal Digit', '2022-12-08 17:49:48', '2022-12-08 17:49:48'),
(8697, 'en', 'Amenity', 'Amenity', '2022-12-30 08:13:57', '2022-12-30 08:13:57'),
(8698, 'en', 'Complements', 'Complements', '2022-12-30 08:51:38', '2022-12-30 08:51:38'),
(8699, 'en', 'Complement', 'Complement', '2022-12-30 08:58:07', '2022-12-30 08:58:07'),
(8700, 'en', 'Item', 'Item', '2022-12-30 09:07:19', '2022-12-30 09:07:19'),
(8701, 'en', 'Bed Types', 'Bed Types', '2022-12-30 09:50:48', '2022-12-30 09:50:48'),
(8702, 'en', 'Bed Type', 'Bed Type', '2022-12-30 09:56:27', '2022-12-30 09:56:27'),
(8703, 'en', 'Rooms', 'Rooms', '2022-12-31 10:29:38', '2022-12-31 10:29:38'),
(8704, 'en', 'Room Name', 'Room Name', '2022-12-31 10:44:12', '2022-12-31 10:44:12'),
(8705, 'en', 'Room', 'Room', '2023-01-01 10:39:42', '2023-01-01 10:39:42'),
(8706, 'en', 'Is Featured', 'Is Featured', '2023-01-01 10:56:09', '2023-01-01 10:56:09'),
(8707, 'en', 'Total Adult', 'Total Adult', '2023-01-01 10:58:27', '2023-01-01 10:58:27'),
(8708, 'en', 'Total Child', 'Total Child', '2023-01-01 10:58:38', '2023-01-01 10:58:38'),
(8710, 'en', 'Amenities', 'Amenities', '2023-01-01 11:11:57', '2023-01-01 11:11:57'),
(8711, 'en', 'Beds', 'Beds', '2023-01-01 11:16:52', '2023-01-01 11:16:52'),
(8712, 'en', 'Select beds', 'Select beds', '2023-01-01 11:22:25', '2023-01-01 11:22:25'),
(8713, 'en', 'Select Complements', 'Select Complements', '2023-01-01 11:24:29', '2023-01-01 11:24:29'),
(8714, 'en', 'Select Amenities', 'Select Amenities', '2023-01-01 11:26:06', '2023-01-01 11:26:06'),
(8721, 'en', 'Packages', 'Packages', '2023-01-05 12:27:53', '2023-01-05 12:27:53'),
(8722, 'en', 'Optional', 'Optional', '2023-01-06 03:01:26', '2023-01-06 03:01:26'),
(8723, 'en', 'Night', 'Night', '2023-01-06 08:50:56', '2023-01-06 08:50:56'),
(8724, 'en', 'Book Now', 'Book Now', '2023-01-06 08:51:36', '2023-01-06 08:51:36'),
(8725, 'en', 'Adult', 'Adult', '2023-01-06 08:53:07', '2023-01-06 08:53:07'),
(8726, 'en', 'Child', 'Child', '2023-01-06 08:53:27', '2023-01-06 08:53:27'),
(8727, 'en', 'Our Services', 'Our Services', '2023-01-06 11:08:46', '2023-01-06 11:08:46');
INSERT INTO `lankeyvalues` (`id`, `language_code`, `language_key`, `language_value`, `created_at`, `updated_at`) VALUES
(8728, 'en', 'Slider', 'Slider', '2023-01-06 21:38:58', '2023-01-06 21:38:58'),
(8729, 'en', 'Slider/Hero Section', 'Hero Section', '2023-01-06 21:41:20', '2023-03-05 10:14:27'),
(8730, 'en', 'Video Section', 'Video Section', '2023-01-06 21:43:07', '2023-01-06 21:43:07'),
(8731, 'en', 'Preview', 'Preview', '2023-01-06 22:49:33', '2023-01-06 22:49:33'),
(8732, 'en', 'Testimonial', 'Testimonial', '2023-01-06 23:09:07', '2023-01-06 23:09:07'),
(8733, 'en', 'Client', 'Client', '2023-01-07 01:13:16', '2023-01-07 01:13:16'),
(8735, 'en', 'Oops! Not found.', 'Oops! Not found.', '2023-01-10 09:43:43', '2023-01-10 09:43:43'),
(8736, 'en', 'Latest Blog', 'Latest Blog', '2023-01-10 10:45:48', '2023-01-10 10:45:48'),
(8737, 'en', 'Choose Your Rooms', 'Choose Your Rooms', '2023-01-13 07:03:11', '2023-01-13 07:03:11'),
(8738, 'en', 'Our Blogs', 'Our Blogs', '2023-01-13 07:14:20', '2023-01-13 07:14:20'),
(8739, 'en', 'Subheader BG Images', 'Subheader BG Images', '2023-01-14 07:50:29', '2023-01-14 07:50:29'),
(8740, 'en', 'Blog Subheader Background Image', 'Blog Subheader Background Image', '2023-01-14 08:30:26', '2023-01-14 08:30:26'),
(8741, 'en', 'Contact Us Subheader Background Image', 'Contact Us Subheader Background Image', '2023-01-14 08:38:58', '2023-01-14 08:38:58'),
(8742, 'en', 'Register Subheader Background Image', 'Register Subheader Background Image', '2023-01-14 08:43:33', '2023-01-14 08:43:33'),
(8743, 'en', 'Login Subheader Background Image', 'Login Subheader Background Image', '2023-01-14 08:46:20', '2023-01-14 08:46:20'),
(8744, 'en', 'Reset Password Subheader Background Image', 'Reset Password Subheader Background Image', '2023-01-14 08:50:49', '2023-01-14 08:50:49'),
(8745, 'en', 'Dashboard Subheader Background Image', 'Dashboard Subheader Background Image', '2023-01-14 08:58:13', '2023-01-14 08:58:13'),
(8746, 'en', 'Profile Subheader Background Image', 'Profile Subheader Background Image', '2023-01-14 09:01:33', '2023-01-14 09:01:33'),
(8747, 'en', 'Change Password Subheader Background Image', 'Change Password Subheader Background Image', '2023-01-14 09:06:34', '2023-01-14 09:06:34'),
(8748, 'en', 'Booking', 'Booking', '2023-01-14 09:16:57', '2023-01-14 09:16:57'),
(8749, 'en', 'Booking Subheader Background Image', 'Booking Subheader Background Image', '2023-01-14 09:25:54', '2023-01-14 09:25:54'),
(8750, 'en', 'If you need any help, feel free to contact us.', 'If you need any help, feel free to contact us.', '2023-01-14 10:44:03', '2023-01-14 10:44:03'),
(8752, 'en', 'Total Room', 'Total Room', '2023-01-15 11:41:30', '2023-01-15 11:41:30'),
(8753, 'en', 'Hotel Manage', 'Hotel Manage', '2023-01-16 10:34:31', '2023-01-16 10:34:31'),
(8754, 'en', 'Room Type', 'Room Type', '2023-01-16 10:58:19', '2023-01-16 10:58:19'),
(8755, 'en', 'Room No', 'Room No', '2023-01-21 05:47:22', '2023-01-21 05:47:22'),
(8756, 'en', 'Booking Request', 'Booking Request', '2023-01-25 09:48:48', '2023-01-25 09:48:48'),
(8757, 'en', 'Booking Request Information', 'Booking Request Information', '2023-01-25 09:49:41', '2023-01-25 09:49:41'),
(8758, 'en', 'Send Booking Request', 'Send Booking Request', '2023-01-25 09:57:07', '2023-01-25 09:57:07'),
(8759, 'en', 'Booking Summary', 'Booking Summary', '2023-01-25 10:02:03', '2023-01-25 10:02:03'),
(9323, 'en', 'Check In', 'Check In', '2023-01-27 10:11:51', '2023-01-27 10:11:51'),
(9324, 'en', 'Check Out', 'Check Out', '2023-01-27 10:12:31', '2023-01-27 10:12:31'),
(9325, 'en', 'Oops! Your booking request is failed. Please enter room number.', 'Oops! Your booking request is failed. Please enter room number.', '2023-01-27 10:30:48', '2023-01-27 10:30:48'),
(9326, 'en', 'Oops! Your booking request is failed. Please try again.', 'Oops! Your booking request is failed. Please try again.', '2023-01-27 10:33:57', '2023-01-27 10:33:57'),
(9327, 'en', 'Your booking request is successfully.', 'Your booking request is successfully.', '2023-01-27 10:34:43', '2023-01-27 10:34:43'),
(9328, 'en', 'Thank you for our room booking request.', 'Thank you for our room booking request.', '2023-01-28 04:21:08', '2023-01-28 04:21:08'),
(9330, 'en', 'Go To Your Dashboard', 'Go To Your Dashboard', '2023-01-28 04:28:39', '2023-01-28 04:28:39'),
(9331, 'en', 'Booking Manage', 'Booking Manage', '2023-01-29 10:26:43', '2023-01-29 10:26:43'),
(9332, 'en', 'Approved Booking', 'Approved Booking', '2023-01-29 10:58:19', '2023-01-29 10:58:19'),
(9333, 'en', 'Checked Out Booking', 'Checked Out Booking', '2023-01-29 10:59:06', '2023-01-29 10:59:06'),
(9335, 'en', 'All Booking', 'All Booking', '2023-01-29 11:04:04', '2023-01-29 11:04:04'),
(9337, 'en', 'Cancelled Booking', 'Cancelled Booking', '2023-01-29 11:54:36', '2023-01-29 11:54:36'),
(9339, 'en', 'Booking Status', 'Booking Status', '2023-01-31 09:11:45', '2023-01-31 09:11:45'),
(9340, 'en', 'In / Out Date', 'In / Out Date', '2023-02-01 07:46:58', '2023-02-01 07:46:58'),
(9341, 'en', 'Total Days', 'Total Day', '2023-02-01 07:47:50', '2023-02-05 11:22:33'),
(9342, 'en', 'Booking Date', 'Booking Date', '2023-02-01 09:43:46', '2023-02-01 09:43:46'),
(9343, 'en', 'We have received your booking request and will contact you as soon. You can find your booking information below.', 'We have received your booking request and will contact you as soon. You can find your booking information below.', '2023-02-01 09:59:59', '2023-02-01 09:59:59'),
(9344, 'en', 'Thank you for booking our rooms.', 'Thank you for booking our rooms.', '2023-02-01 10:02:32', '2023-02-01 10:02:32'),
(9345, 'en', 'Booking No', 'Booking No', '2023-02-01 11:31:54', '2023-02-01 11:31:54'),
(9347, 'en', 'Your assign  room no', 'Your assign  room no', '2023-02-02 01:15:32', '2023-02-02 01:15:32'),
(9348, 'en', 'Grand Total', 'Grand Total', '2023-02-02 01:34:59', '2023-02-02 01:34:59'),
(9349, 'en', 'My Booking', 'My Booking', '2023-02-02 05:19:46', '2023-02-02 05:19:46'),
(9350, 'en', 'Running', 'Running', '2023-02-02 09:23:24', '2023-02-02 09:23:24'),
(9351, 'en', 'Checked Out', 'Checked Out', '2023-02-02 09:23:35', '2023-02-02 09:23:35'),
(9352, 'en', 'Invoice Details', 'Invoice Details', '2023-02-02 10:28:37', '2023-02-02 10:28:37'),
(9353, 'en', 'Removed Successfully', 'Removed Successfully', '2023-02-03 03:27:32', '2023-02-03 03:27:32'),
(9930, 'en', 'Customer Information', 'Customer Information', '2023-02-03 12:21:36', '2023-02-03 12:21:36'),
(9931, 'en', 'Merge Room and Date', 'Merge Room and Date', '2023-02-03 12:26:30', '2023-02-03 12:26:30'),
(9932, 'en', 'Assign Room', 'Assign Room', '2023-02-03 21:26:54', '2023-02-03 21:26:54'),
(9933, 'en', 'Room Number', 'Room Number', '2023-02-04 00:16:50', '2023-02-04 00:16:50'),
(9934, 'en', 'Not found assign room', 'Not found assign room', '2023-02-04 00:38:09', '2023-02-04 00:38:09'),
(9936, 'en', 'Already Assigned', 'Already Assigned', '2023-02-04 07:04:26', '2023-02-04 07:04:26'),
(9937, 'en', 'Your booking request is approved. You can find your booking information below.', 'Your booking request is approved. You can find your booking information below.', '2023-02-04 10:26:26', '2023-02-04 10:26:26'),
(9938, 'en', 'Your booking request is approved.', 'Your booking request is approved.', '2023-02-04 10:26:56', '2023-02-04 10:26:56'),
(9939, 'en', 'Your booking has checked out.', 'Your booking has checked out.', '2023-02-04 10:28:37', '2023-02-04 10:28:37'),
(9940, 'en', 'Your booking has checked out. You can find your booking information below.', 'Your booking has checked out. You can find your booking information below.', '2023-02-04 10:28:53', '2023-02-04 10:28:53'),
(9941, 'en', 'Your booking has cancelled.', 'Your booking has cancelled.', '2023-02-04 10:29:36', '2023-02-04 10:29:36'),
(9943, 'en', 'Note', 'Note', '2023-02-08 07:49:14', '2023-02-08 07:49:14'),
(9944, 'en', 'Book Room', 'Book Room', '2023-02-08 10:43:04', '2023-02-08 10:43:04'),
(9945, 'en', 'Pending Payment', 'Pending Payment', '2023-02-08 11:11:44', '2023-02-08 11:11:44'),
(9946, 'en', 'All Payment Status', 'All Payment Status', '2023-02-08 11:26:29', '2023-02-08 11:26:29'),
(9947, 'en', 'Room List', 'Room List', '2023-02-09 10:05:45', '2023-02-09 10:05:45'),
(9948, 'en', 'All Room Type', 'All Room Type', '2023-02-09 10:21:32', '2023-02-09 10:21:32'),
(9949, 'en', 'Booked', 'Booked', '2023-02-09 10:48:47', '2023-02-09 10:48:47'),
(9950, 'en', 'Goto Backend Dashboard', 'Goto Backend Dashboard', '2023-02-11 00:08:57', '2023-02-11 00:08:57'),
(9951, 'en', 'Check Availability', 'Check Availability', '2023-02-11 09:33:13', '2023-02-11 09:33:13'),
(9953, 'en', 'Total Earn', 'Total Earn', '2023-02-13 07:37:04', '2023-02-13 07:37:04'),
(9954, 'en', 'Canceled Payment', 'Canceled Payment', '2023-02-13 08:13:21', '2023-02-13 08:13:21'),
(9955, 'en', 'Incompleted Payment', 'Incompleted Payment', '2023-02-13 08:18:02', '2023-02-13 08:18:02'),
(9956, 'en', 'Total Room Type', 'Total Room Type', '2023-02-13 08:44:17', '2023-02-13 08:44:17'),
(9957, 'en', 'Total Booking Completed', 'Total Booking Completed', '2023-02-13 08:59:46', '2023-02-13 08:59:46'),
(9958, 'en', 'Total Running Booking', 'Total Running Booking', '2023-02-13 09:02:39', '2023-02-13 09:02:39'),
(9959, 'en', 'Total Booking Request', 'Total Booking Request', '2023-02-13 09:09:10', '2023-02-13 09:09:10'),
(9960, 'en', 'Total Booking Canceled', 'Total Booking Canceled', '2023-02-13 09:11:41', '2023-02-13 09:11:41'),
(9961, 'en', 'Today\'s Booked Room', 'Today\'s Booked Room', '2023-02-13 09:30:27', '2023-02-13 09:30:27'),
(9962, 'en', 'Today\'s Available Room', 'Today\'s Available Room', '2023-02-13 09:41:43', '2023-02-13 09:41:43'),
(9963, 'en', 'Total Customer', 'Total Customer', '2023-02-13 10:40:09', '2023-02-13 10:40:09'),
(9964, 'en', 'Active Customer', 'Active Customer', '2023-02-13 10:41:56', '2023-02-13 10:41:56'),
(9965, 'en', 'Inactive Customer', 'Inactive Customer', '2023-02-13 10:44:18', '2023-02-13 10:44:18'),
(9966, 'en', 'Recent Booking Request', 'Recent Booking Request', '2023-02-14 07:38:44', '2023-02-14 07:38:44'),
(9968, 'en', 'Earning', 'Earning', '2023-02-15 09:41:49', '2023-02-15 09:41:49'),
(9969, 'en', 'Monthly Earning Report (Last 12 Months)', 'Monthly Earning Report (Last 12 Months)', '2023-02-15 09:47:17', '2023-02-15 09:47:17'),
(9970, 'en', 'Monthly Booking Report (Last 12 Months)', 'Monthly Booking Report (Last 12 Months)', '2023-02-15 09:50:33', '2023-02-15 09:50:33'),
(9971, 'en', 'Total Booking', 'Total Booking', '2023-02-15 10:24:33', '2023-02-15 10:24:33'),
(9972, 'en', 'Light Color', 'Light Color', '2023-02-16 10:38:49', '2023-02-16 10:38:49'),
(9973, 'en', 'Blue Color', 'Blue Color', '2023-02-16 10:44:06', '2023-02-16 10:44:06'),
(9974, 'en', 'Gray 400 Color', 'Gray 400 Color', '2023-02-16 10:48:34', '2023-02-16 10:48:34'),
(9975, 'en', 'Total Booked Room', 'Total Booked Room', '2023-02-17 04:00:36', '2023-02-17 04:00:36'),
(9977, 'en', 'Available Room for Booking', 'Available Room for Booking', '2023-02-17 06:38:03', '2023-02-17 06:38:03'),
(9978, 'en', 'Todays Booked Rooms', 'Todays Booked Rooms', '2023-02-17 08:41:13', '2023-02-17 08:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `media_options`
--

CREATE TABLE `media_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `alt_title` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `large_image` text DEFAULT NULL,
  `option_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_options`
--

INSERT INTO `media_options` (`id`, `title`, `alt_title`, `thumbnail`, `large_image`, `option_value`, `created_at`, `updated_at`) VALUES
(782, 'favicon', 'favicon', '27122022155818-favicon.ico', '27122022155818-favicon.ico', '1150', '2022-12-27 09:58:18', '2022-12-27 09:58:18'),
(783, 'logo', 'logo', '27122022160114-400x400-logo.png', '27122022160114-logo.png', '4411', '2022-12-27 10:01:14', '2022-12-27 10:01:14'),
(784, 'photo', 'photo', '27122022160205-400x400-photo.png', '27122022160205-photo.png', '21950', '2022-12-27 10:02:05', '2022-12-27 10:02:05'),
(785, 'payment', 'payment', '27122022160256-400x400-payment.png', '27122022160256-payment.png', '8212', '2022-12-27 10:02:56', '2022-12-27 10:02:56'),
(786, 'footer-top', 'footer-top', '27122022160439-400x400-footer-top.jpg', '27122022160439-footer-top.jpg', '228643', '2022-12-27 10:04:39', '2022-12-27 10:04:39'),
(792, 'home1_bg', 'home1_bg', '04012023155330-400x400-home1_bg.jpg', '04012023155330-home1_bg.jpg', '390019', '2023-01-04 09:53:30', '2023-01-04 09:53:30'),
(793, 'breadcrumb-bg-1', 'breadcrumb-bg-1', '05012023064431-400x400-breadcrumb-bg-1.jpg', '05012023064431-breadcrumb-bg-1.jpg', '84321', '2023-01-05 00:44:31', '2023-01-05 00:44:31'),
(794, 'breadcrumb-bg-2', 'breadcrumb-bg-2', '05012023064453-400x400-breadcrumb-bg-2.jpg', '05012023064453-breadcrumb-bg-2.jpg', '93609', '2023-01-05 00:44:53', '2023-01-05 00:44:53'),
(795, 'breadcrumb-bg-3', 'breadcrumb-bg-3', '05012023064459-400x400-breadcrumb-bg-3.jpg', '05012023064459-breadcrumb-bg-3.jpg', '58785', '2023-01-05 00:44:59', '2023-01-05 00:44:59'),
(796, 'breadcrumb-bg-4', 'breadcrumb-bg-4', '05012023064503-400x400-breadcrumb-bg-4.jpg', '05012023064503-breadcrumb-bg-4.jpg', '63381', '2023-01-05 00:45:03', '2023-01-05 00:45:03'),
(797, 'breadcrumb-bg-5', 'breadcrumb-bg-5', '05012023064507-400x400-breadcrumb-bg-5.jpg', '05012023064507-breadcrumb-bg-5.jpg', '71437', '2023-01-05 00:45:07', '2023-01-05 00:45:07'),
(799, 'breadcrumb-bg-7', 'breadcrumb-bg-7', '05012023064516-400x400-breadcrumb-bg-7.jpg', '05012023064516-breadcrumb-bg-7.jpg', '53805', '2023-01-05 00:45:16', '2023-01-05 00:45:16'),
(800, 'breadcrumb-bg-8', 'breadcrumb-bg-8', '05012023064520-400x400-breadcrumb-bg-8.jpg', '05012023064520-breadcrumb-bg-8.jpg', '36846', '2023-01-05 00:45:20', '2023-01-05 00:45:20'),
(801, 'breadcrumb-bg-9', 'breadcrumb-bg-9', '05012023064524-400x400-breadcrumb-bg-9.jpg', '05012023064524-breadcrumb-bg-9.jpg', '88036', '2023-01-05 00:45:24', '2023-01-05 00:45:24'),
(802, 'breadcrumb-bg-10', 'breadcrumb-bg-10', '05012023064527-400x400-breadcrumb-bg-10.jpg', '05012023064527-breadcrumb-bg-10.jpg', '105273', '2023-01-05 00:45:27', '2023-01-05 00:45:27'),
(803, 'breadcrumb-bg-11', 'breadcrumb-bg-11', '05012023064531-400x400-breadcrumb-bg-11.jpg', '05012023064531-breadcrumb-bg-11.jpg', '105988', '2023-01-05 00:45:31', '2023-01-05 00:45:31'),
(804, 'about-1', 'about-1', '06012023113159-900x700-about-1.jpg', '06012023113159-about-1.jpg', '187311', '2023-01-06 05:31:59', '2023-01-06 05:31:59'),
(805, 'about-2', 'about-2', '06012023113208-900x700-about-2.jpg', '06012023113208-about-2.jpg', '145968', '2023-01-06 05:32:08', '2023-01-06 05:32:08'),
(806, 'about-3', 'about-3', '06012023113215-900x700-about-3.jpg', '06012023113215-about-3.jpg', '182885', '2023-01-06 05:32:15', '2023-01-06 05:32:15'),
(807, '1-room', '1-room', '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', '53288', '2023-01-06 06:05:50', '2023-01-06 06:05:50'),
(808, '2-room', '2-room', '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', '52636', '2023-01-06 06:05:53', '2023-01-06 06:05:53'),
(809, '3-room', '3-room', '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', '43658', '2023-01-06 06:05:57', '2023-01-06 06:05:57'),
(810, '4-room', '4-room', '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', '66724', '2023-01-06 06:06:00', '2023-01-06 06:06:00'),
(811, '5-room', '5-room', '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', '64673', '2023-01-06 06:06:03', '2023-01-06 06:06:03'),
(812, '6-room', '6-room', '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', '42943', '2023-01-06 06:06:06', '2023-01-06 06:06:06'),
(813, 'about-4', 'about-4', '06012023135205-900x700-about-4.jpg', '06012023135205-about-4.jpg', '129315', '2023-01-06 07:52:05', '2023-01-06 07:52:05'),
(814, 'about-h3', 'about-h3', '06012023135659-900x700-about-h3.jpg', '06012023135659-about-h3.jpg', '48282', '2023-01-06 07:56:59', '2023-01-06 07:56:59'),
(815, 'about-h4', 'about-h4', '06012023135948-900x700-about-h4.png', '06012023135948-about-h4.png', '545601', '2023-01-06 07:59:48', '2023-01-06 07:59:48'),
(816, '3-client', '3-client', '06012023140634-900x700-3-client.jpg', '06012023140634-3-client.jpg', '64992', '2023-01-06 08:06:34', '2023-01-06 08:06:34'),
(817, 'service_6', 'service_6', '06012023175149-900x700-service_6.png', '06012023175149-service_6.png', '4990', '2023-01-06 11:51:49', '2023-01-06 11:51:49'),
(818, 'service_5', 'service_5', '06012023175228-900x700-service_5.png', '06012023175228-service_5.png', '4974', '2023-01-06 11:52:28', '2023-01-06 11:52:28'),
(819, 'service_4', 'service_4', '06012023175255-900x700-service_4.png', '06012023175255-service_4.png', '4846', '2023-01-06 11:52:55', '2023-01-06 11:52:55'),
(820, 'service_3', 'service_3', '06012023175320-900x700-service_3.png', '06012023175320-service_3.png', '4783', '2023-01-06 11:53:21', '2023-01-06 11:53:21'),
(821, 'service_2', 'service_2', '06012023175344-900x700-service_2.png', '06012023175344-service_2.png', '4151', '2023-01-06 11:53:44', '2023-01-06 11:53:44'),
(822, 'service_1', 'service_1', '06012023175409-900x700-service_1.png', '06012023175409-service_1.png', '3659', '2023-01-06 11:54:10', '2023-01-06 11:54:10'),
(823, 'preview', 'preview', '07012023043902-900x700-preview.jpg', '07012023043902-preview.jpg', '98285', '2023-01-06 22:39:02', '2023-01-06 22:39:02'),
(824, '1-client', '1-client', '07012023065428-100x100-1-client.jpg', '07012023065428-1-client.jpg', '42066', '2023-01-07 00:54:28', '2023-01-07 00:54:28'),
(825, '3-client', '3-client', '07012023065729-100x100-3-client.jpg', '07012023065729-3-client.jpg', '64992', '2023-01-07 00:57:29', '2023-01-07 00:57:29'),
(826, '4-client', '4-client', '07012023065821-100x100-4-client.jpg', '07012023065821-4-client.jpg', '66497', '2023-01-07 00:58:21', '2023-01-07 00:58:21'),
(827, '2-client', '2-client', '07012023065955-100x100-2-client.jpg', '07012023065955-2-client.jpg', '52497', '2023-01-07 00:59:55', '2023-01-07 00:59:55'),
(828, '5-client', '5-client', '07012023070147-100x100-5-client.jpg', '07012023070147-5-client.jpg', '3826', '2023-01-07 01:01:47', '2023-01-07 01:01:47'),
(829, '6-client', '6-client', '07012023070816-100x100-6-client.jpg', '07012023070816-6-client.jpg', '5242', '2023-01-07 01:08:16', '2023-01-07 01:08:16'),
(832, 'blog-1', 'blog-1', '07012023091700-900x700-blog-1.jpg', '07012023091700-blog-1.jpg', '147181', '2023-01-07 03:17:00', '2023-01-07 03:17:00'),
(833, 'blog-2', 'blog-2', '07012023091730-900x700-blog-2.jpg', '07012023091730-blog-2.jpg', '132817', '2023-01-07 03:17:30', '2023-01-07 03:17:30'),
(834, 'blog-3', 'blog-3', '07012023091749-900x700-blog-3.jpg', '07012023091749-blog-3.jpg', '166293', '2023-01-07 03:17:49', '2023-01-07 03:17:49'),
(835, 'blog-4', 'blog-4', '07012023091806-900x700-blog-4.jpg', '07012023091806-blog-4.jpg', '235468', '2023-01-07 03:18:06', '2023-01-07 03:18:06'),
(836, 'blog-5', 'blog-5', '07012023091827-900x700-blog-5.jpg', '07012023091827-blog-5.jpg', '222726', '2023-01-07 03:18:27', '2023-01-07 03:18:27'),
(837, 'blog-6', 'blog-6', '07012023091844-900x700-blog-6.jpg', '07012023091844-blog-6.jpg', '217451', '2023-01-07 03:18:44', '2023-01-07 03:18:44'),
(838, 'blog-7', 'blog-7', '07012023091900-900x700-blog-7.jpg', '07012023091900-blog-7.jpg', '196295', '2023-01-07 03:19:00', '2023-01-07 03:19:00'),
(839, 'blog-8', 'blog-8', '07012023091917-900x700-blog-8.jpg', '07012023091917-blog-8.jpg', '196868', '2023-01-07 03:19:18', '2023-01-07 03:19:18'),
(840, 'blog-9', 'blog-9', '07012023091934-900x700-blog-9.jpg', '07012023091934-blog-9.jpg', '74456', '2023-01-07 03:19:34', '2023-01-07 03:19:34'),
(841, 'blog-10', 'blog-10', '07012023091951-900x700-blog-10.jpg', '07012023091951-blog-10.jpg', '150793', '2023-01-07 03:19:51', '2023-01-07 03:19:51'),
(842, 'blog-11', 'blog-11', '07012023092008-900x700-blog-11.jpg', '07012023092008-blog-11.jpg', '239961', '2023-01-07 03:20:08', '2023-01-07 03:20:08'),
(843, 'blog-12', 'blog-12', '07012023092023-900x700-blog-12.jpg', '07012023092023-blog-12.jpg', '269950', '2023-01-07 03:20:24', '2023-01-07 03:20:24'),
(844, '7-room', '7-room', '09012023045851-900x700-7-room.jpg', '09012023045851-7-room.jpg', '56301', '2023-01-08 22:58:51', '2023-01-08 22:58:51'),
(845, '8-room', '8-room', '09012023045855-900x700-8-room.jpg', '09012023045855-8-room.jpg', '40917', '2023-01-08 22:58:55', '2023-01-08 22:58:55'),
(846, '9-room', '9-room', '09012023045859-900x700-9-room.jpg', '09012023045859-9-room.jpg', '51872', '2023-01-08 22:58:59', '2023-01-08 22:58:59'),
(847, '10-room', '10-room', '09012023045904-900x700-10-room.jpg', '09012023045904-10-room.jpg', '65092', '2023-01-08 22:59:04', '2023-01-08 22:59:04'),
(848, '11-room', '11-room', '09012023045908-900x700-11-room.jpg', '09012023045908-11-room.jpg', '73323', '2023-01-08 22:59:08', '2023-01-08 22:59:08'),
(849, '12-room', '12-room', '09012023045912-900x700-12-room.jpg', '09012023045912-12-room.jpg', '82673', '2023-01-08 22:59:12', '2023-01-08 22:59:12'),
(850, '13-room', '13-room', '09012023045916-900x700-13-room.jpg', '09012023045916-13-room.jpg', '77166', '2023-01-08 22:59:16', '2023-01-08 22:59:16'),
(851, '14-room', '14-room', '09012023045919-900x700-14-room.jpg', '09012023045919-14-room.jpg', '43658', '2023-01-08 22:59:19', '2023-01-08 22:59:19'),
(852, '15-room', '15-room', '09012023045924-900x700-15-room.jpg', '09012023045924-15-room.jpg', '41576', '2023-01-08 22:59:24', '2023-01-08 22:59:24'),
(853, '16-room', '16-room', '09012023045928-900x700-16-room.jpg', '09012023045928-16-room.jpg', '48485', '2023-01-08 22:59:28', '2023-01-08 22:59:28'),
(854, '17-room', '17-room', '09012023045931-900x700-17-room.jpg', '09012023045931-17-room.jpg', '48644', '2023-01-08 22:59:31', '2023-01-08 22:59:31'),
(855, '18-room', '18-room', '09012023045935-900x700-18-room.jpg', '09012023045935-18-room.jpg', '59822', '2023-01-08 22:59:35', '2023-01-08 22:59:35'),
(856, '19-room', '19-room', '09012023045939-900x700-19-room.jpg', '09012023045939-19-room.jpg', '40153', '2023-01-08 22:59:39', '2023-01-08 22:59:39'),
(857, '20-room', '20-room', '09012023045943-900x700-20-room.jpg', '09012023045943-20-room.jpg', '69235', '2023-01-08 22:59:43', '2023-01-08 22:59:43'),
(858, 'Rectangle 1', 'Rectangle 1', '10012023044211-900x700-Rectangle 1.jpg', '10012023044211-Rectangle 1.jpg', '340811', '2023-01-09 22:42:11', '2023-01-09 22:42:11'),
(859, 'Rectangle 1-1', 'Rectangle 1-1', '10012023044217-900x700-Rectangle 1-1.jpg', '10012023044217-Rectangle 1-1.jpg', '401088', '2023-01-09 22:42:17', '2023-01-09 22:42:17'),
(860, 'Rectangle 1-2', 'Rectangle 1-2', '10012023044221-900x700-Rectangle 1-2.jpg', '10012023044221-Rectangle 1-2.jpg', '538083', '2023-01-09 22:42:21', '2023-01-09 22:42:21'),
(861, 'Rectangle 1-3', 'Rectangle 1-3', '10012023044236-900x700-Rectangle 1-3.jpg', '10012023044236-Rectangle 1-3.jpg', '502601', '2023-01-09 22:42:36', '2023-01-09 22:42:36'),
(862, 'Rectangle 1-4', 'Rectangle 1-4', '10012023044241-900x700-Rectangle 1-4.jpg', '10012023044241-Rectangle 1-4.jpg', '343973', '2023-01-09 22:42:41', '2023-01-09 22:42:41'),
(863, 'Rectangle 1-5', 'Rectangle 1-5', '10012023044246-900x700-Rectangle 1-5.jpg', '10012023044246-Rectangle 1-5.jpg', '595229', '2023-01-09 22:42:46', '2023-01-09 22:42:46'),
(865, 'Rectangle 2', 'Rectangle 2', '10012023044256-900x700-Rectangle 2.jpg', '10012023044256-Rectangle 2.jpg', '444297', '2023-01-09 22:42:56', '2023-01-09 22:42:56'),
(866, 'Rectangle 2-1', 'Rectangle 2-1', '10012023044300-900x700-Rectangle 2-1.jpg', '10012023044300-Rectangle 2-1.jpg', '428503', '2023-01-09 22:43:00', '2023-01-09 22:43:00'),
(867, 'Rectangle 2-3', 'Rectangle 2-3', '10012023044311-900x700-Rectangle 2-3.jpg', '10012023044311-Rectangle 2-3.jpg', '352555', '2023-01-09 22:43:11', '2023-01-09 22:43:11'),
(868, 'Rectangle 2-4', 'Rectangle 2-4', '10012023044315-900x700-Rectangle 2-4.jpg', '10012023044315-Rectangle 2-4.jpg', '385371', '2023-01-09 22:43:15', '2023-01-09 22:43:15'),
(869, 'Rectangle 2-5', 'Rectangle 2-5', '10012023044320-900x700-Rectangle 2-5.jpg', '10012023044320-Rectangle 2-5.jpg', '347959', '2023-01-09 22:43:20', '2023-01-09 22:43:20'),
(870, 'Rectangle 3', 'Rectangle 3', '10012023044326-900x700-Rectangle 3.jpg', '10012023044326-Rectangle 3.jpg', '506416', '2023-01-09 22:43:26', '2023-01-09 22:43:26'),
(871, 'Rectangle 3-1', 'Rectangle 3-1', '10012023044330-900x700-Rectangle 3-1.jpg', '10012023044330-Rectangle 3-1.jpg', '517914', '2023-01-09 22:43:30', '2023-01-09 22:43:30'),
(872, 'Rectangle 3-2', 'Rectangle 3-2', '10012023084409-900x700-Rectangle 3-2.jpg', '10012023084409-Rectangle 3-2.jpg', '593995', '2023-01-10 02:44:09', '2023-01-10 02:44:09'),
(873, 'Rectangle 3-3', 'Rectangle 3-3', '10012023084413-900x700-Rectangle 3-3.jpg', '10012023084413-Rectangle 3-3.jpg', '557754', '2023-01-10 02:44:14', '2023-01-10 02:44:14'),
(874, 'Rectangle 3-4', 'Rectangle 3-4', '10012023084418-900x700-Rectangle 3-4.jpg', '10012023084418-Rectangle 3-4.jpg', '433039', '2023-01-10 02:44:18', '2023-01-10 02:44:18'),
(875, 'Rectangle 3-5', 'Rectangle 3-5', '10012023084422-900x700-Rectangle 3-5.jpg', '10012023084422-Rectangle 3-5.jpg', '311751', '2023-01-10 02:44:22', '2023-01-10 02:44:22'),
(877, 'Rectangle 4', 'Rectangle 4', '10012023084440-900x700-Rectangle 4.jpg', '10012023084440-Rectangle 4.jpg', '339760', '2023-01-10 02:44:40', '2023-01-10 02:44:40'),
(878, 'Rectangle 4-1', 'Rectangle 4-1', '10012023084444-900x700-Rectangle 4-1.jpg', '10012023084444-Rectangle 4-1.jpg', '445135', '2023-01-10 02:44:44', '2023-01-10 02:44:44'),
(879, 'Rectangle 4-2', 'Rectangle 4-2', '10012023084447-900x700-Rectangle 4-2.jpg', '10012023084447-Rectangle 4-2.jpg', '451904', '2023-01-10 02:44:48', '2023-01-10 02:44:48'),
(880, 'Rectangle 4-3', 'Rectangle 4-3', '10012023084453-900x700-Rectangle 4-3.jpg', '10012023084453-Rectangle 4-3.jpg', '426551', '2023-01-10 02:44:53', '2023-01-10 02:44:53'),
(881, 'Rectangle 4-4', 'Rectangle 4-4', '10012023084456-900x700-Rectangle 4-4.jpg', '10012023084456-Rectangle 4-4.jpg', '450440', '2023-01-10 02:44:56', '2023-01-10 02:44:56'),
(882, 'Rectangle 4-5', 'Rectangle 4-5', '10012023084503-900x700-Rectangle 4-5.jpg', '10012023084503-Rectangle 4-5.jpg', '360719', '2023-01-10 02:45:03', '2023-01-10 02:45:03'),
(883, 'Rectangle 5', 'Rectangle 5', '10012023084507-900x700-Rectangle 5.jpg', '10012023084507-Rectangle 5.jpg', '501330', '2023-01-10 02:45:07', '2023-01-10 02:45:07'),
(884, 'Rectangle 5-1', 'Rectangle 5-1', '10012023084512-900x700-Rectangle 5-1.jpg', '10012023084512-Rectangle 5-1.jpg', '411317', '2023-01-10 02:45:12', '2023-01-10 02:45:12'),
(885, 'Rectangle 5-2', 'Rectangle 5-2', '10012023084515-900x700-Rectangle 5-2.jpg', '10012023084515-Rectangle 5-2.jpg', '412644', '2023-01-10 02:45:15', '2023-02-27 09:04:54'),
(886, 'Rectangle 5-3', 'Rectangle 5-3', '10012023084519-900x700-Rectangle 5-3.jpg', '10012023084519-Rectangle 5-3.jpg', '440486', '2023-01-10 02:45:19', '2023-01-10 02:45:19'),
(887, 'Rectangle 5-4', 'Rectangle 5-4', '10012023084521-900x700-Rectangle 5-4.jpg', '10012023084521-Rectangle 5-4.jpg', '330552', '2023-01-10 02:45:21', '2023-01-10 02:45:21'),
(888, 'Rectangle 5-5', 'Rectangle 5-5', '10012023084524-900x700-Rectangle 5-5.jpg', '10012023084524-Rectangle 5-5.jpg', '417214', '2023-01-10 02:45:24', '2023-01-10 02:45:24'),
(889, 'offer-3', 'offer-3', '13012023104807-900x700-offer-3.jpg', '13012023104807-offer-3.jpg', '850214', '2023-01-13 04:48:07', '2023-01-13 04:48:07'),
(890, 'offer-2', 'offer-2', '13012023104926-900x700-offer-2.jpg', '13012023104926-offer-2.jpg', '573231', '2023-01-13 04:49:26', '2023-01-13 04:49:26'),
(891, 'offer-1', 'offer-1', '13012023105100-900x700-offer-1.jpg', '13012023105100-offer-1.jpg', '441835', '2023-01-13 04:51:00', '2023-01-13 04:51:00'),
(893, 'home-1', 'home-1', '16022023173552-600x315-home-1.jpg', '16022023173552-home-1.jpg', '52948', '2023-02-16 11:35:52', '2023-02-16 11:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `media_settings`
--

CREATE TABLE `media_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_type` varchar(191) NOT NULL,
  `media_desc` varchar(200) DEFAULT NULL,
  `media_width` varchar(100) DEFAULT NULL,
  `media_height` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_settings`
--

INSERT INTO `media_settings` (`id`, `media_type`, `media_desc`, `media_width`, `media_height`, `created_at`, `updated_at`) VALUES
(1, 'Thumbnail', NULL, '900', '700', '2021-04-11 20:21:59', '2022-08-01 11:04:33'),
(2, 'Subheader', NULL, '1920', '400', '2021-04-13 16:40:28', '2021-04-15 11:09:52'),
(3, 'Mega_Menu', NULL, '300', '400', '2021-05-17 15:20:51', '2021-05-17 15:20:53'),
(4, 'Testimonial', NULL, '100', '100', '2021-07-01 06:04:31', '2021-07-01 06:04:33'),
(5, 'Product_Thumbnail', NULL, '900', '700', '2021-07-02 13:27:52', '2022-08-01 11:08:22'),
(6, 'SEO_Image', NULL, '600', '315', '2021-07-02 14:43:42', '2021-07-02 09:19:54'),
(7, 'Product_Multiple_Image', NULL, '900', '700', '2022-08-18 12:16:27', '2023-02-17 11:08:22'),
(8, 'Blog_Thumbnail', NULL, '900', '700', '2022-10-19 16:51:40', '2022-10-19 16:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `mega_menus`
--

CREATE TABLE `mega_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `mega_menu_title` text DEFAULT NULL,
  `is_title` int(11) DEFAULT NULL,
  `is_image` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `css_class` varchar(191) DEFAULT NULL,
  `lan` varchar(191) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(191) NOT NULL,
  `menu_position` varchar(191) DEFAULT NULL,
  `lan` varchar(100) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_position`, `lan`, `status_id`, `created_at`, `updated_at`) VALUES
(120, 'Header Menu', 'header', 'en', 1, '2022-07-21 09:55:35', '2022-07-21 09:55:35'),
(121, 'Quick links', 'footer', 'en', 1, '2022-07-22 07:54:53', '2022-07-22 07:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `menu_childs`
--

CREATE TABLE `menu_childs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `mega_menu_id` int(11) DEFAULT NULL,
  `menu_type` varchar(191) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_label` text DEFAULT NULL,
  `custom_url` text DEFAULT NULL,
  `target_window` varchar(191) DEFAULT NULL,
  `css_class` varchar(191) DEFAULT NULL,
  `lan` varchar(191) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_parents`
--

CREATE TABLE `menu_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `menu_type` varchar(191) DEFAULT NULL,
  `child_menu_type` varchar(191) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_label` text DEFAULT NULL,
  `custom_url` text DEFAULT NULL,
  `target_window` varchar(191) DEFAULT NULL,
  `css_class` varchar(191) DEFAULT NULL,
  `column` int(11) DEFAULT NULL,
  `width_type` varchar(191) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `lan` varchar(191) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_parents`
--

INSERT INTO `menu_parents` (`id`, `menu_id`, `menu_type`, `child_menu_type`, `item_id`, `item_label`, `custom_url`, `target_window`, `css_class`, `column`, `width_type`, `width`, `lan`, `sort_order`, `created_at`, `updated_at`) VALUES
(941, 121, 'page', 'none', 49, 'Career', 'career', '_self', NULL, NULL, NULL, NULL, 'en', 6, '2022-09-02 05:45:07', '2023-02-18 05:58:52'),
(942, 121, 'page', 'none', 48, 'About Us', 'about-us', '_self', NULL, NULL, NULL, NULL, 'en', 1, '2022-09-02 05:45:07', '2023-02-18 05:58:52'),
(943, 121, 'page', 'none', 47, 'Cookie Policy', 'cookie-policy', '_self', NULL, NULL, NULL, NULL, 'en', 3, '2022-09-02 05:45:07', '2023-02-18 05:58:52'),
(944, 121, 'page', 'none', 46, 'Booking Policy', 'booking-policy', '_self', NULL, NULL, NULL, NULL, 'en', 5, '2022-09-02 05:45:07', '2023-02-18 05:58:52'),
(945, 121, 'page', 'none', 45, 'Terms and Conditions', 'terms-and-conditions', '_self', NULL, NULL, NULL, NULL, 'en', 4, '2022-09-02 05:45:07', '2023-02-18 05:58:52'),
(946, 121, 'page', 'none', 44, 'Privacy Policy', 'privacy-policy', '_self', NULL, NULL, NULL, NULL, 'en', 2, '2022-09-02 05:45:07', '2023-02-18 05:58:52'),
(947, 121, 'custom_link', 'none', NULL, 'Contact us', 'https://relaxly.themeposh.net/contact/6/contact-us', '_self', '', NULL, NULL, NULL, 'en', 7, '2022-09-02 05:49:27', '2023-02-18 05:58:52'),
(949, 121, 'custom_link', 'none', NULL, 'My account', 'https://relaxly.themeposh.net/user/login', '_self', '', NULL, NULL, NULL, 'en', 8, '2022-09-02 05:50:50', '2023-02-18 05:58:52'),
(1014, 120, 'custom_link', 'none', NULL, 'Home', 'https://relaxly.themeposh.net/', '_self', '', NULL, NULL, NULL, 'en', 1, '2023-01-10 00:33:49', '2023-02-27 09:42:01'),
(1017, 120, 'custom_link', 'none', NULL, 'Contact Us', 'https://relaxly.themeposh.net/contact/6/contact-us', '_self', '', NULL, NULL, NULL, 'en', 6, '2023-01-10 00:35:23', '2023-02-27 09:42:01'),
(1026, 120, 'page', 'none', 48, 'About Us', 'about-us', '_self', NULL, NULL, NULL, NULL, 'en', 2, '2023-01-11 09:27:59', '2023-02-27 09:42:01'),
(1027, 120, 'page', 'none', 71, 'FAQ', 'faq', '_self', NULL, NULL, NULL, NULL, 'en', 5, '2023-01-11 09:28:28', '2023-02-27 09:42:01'),
(1030, 120, 'product_category', 'none', 1, 'Hotel', 'hotel', '_self', NULL, NULL, NULL, NULL, 'en', 3, '2023-01-16 10:31:44', '2023-02-27 09:42:01'),
(1043, 120, 'blog', 'none', 0, 'Blog', 'blog', '_self', NULL, NULL, NULL, NULL, 'en', 4, '2023-02-17 23:46:38', '2023-02-27 09:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_23_120000_create_shoppingcart_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_27_172426_create_languages_table', 1),
(6, '2021_03_27_172601_create_lankeyvalues_table', 1),
(7, '2021_03_30_140957_create_tp_options_table', 1),
(8, '2021_04_01_152906_create_timezones_table', 1),
(9, '2021_04_02_150516_create_user_status_table', 1),
(10, '2021_04_02_150609_create_user_roles_table', 1),
(11, '2021_04_09_044943_create_media_options_table', 1),
(12, '2021_04_12_140713_create_media_settings_table', 1),
(13, '2021_05_01_115940_create_menus_table', 1),
(14, '2021_05_01_120841_create_tp_status_table', 1),
(15, '2021_05_01_133411_create_menu_parents_table', 1),
(16, '2021_05_01_140308_create_mega_menus_table', 1),
(17, '2021_05_01_141350_create_menu_childs_table', 1),
(18, '2021_06_27_161510_create_taxes_table', 1),
(19, '2021_07_03_135905_create_offer_ads_table', 1),
(20, '2021_07_03_172443_create_sliders_table', 1),
(21, '2021_07_11_173246_create_social_medias_table', 1),
(22, '2021_08_21_141949_create_reviews_table', 1),
(23, '2021_10_03_164438_create_payment_method_table', 1),
(24, '2021_10_03_164717_create_payment_status_table', 1),
(25, '2021_10_06_154120_create_countries_table', 1),
(26, '2021_10_26_153444_create_pages_table', 1),
(27, '2021_11_01_162210_create_subscribers_table', 1),
(28, '2022_08_18_112436_create_section_manages_table', 1),
(29, '2022_08_25_165632_create_contacts_table', 1),
(30, '2022_10_17_142326_create_blog_categories_table', 1),
(31, '2022_10_17_152007_create_blogs_table', 1),
(32, '2022_12_29_155752_create_amenities_table', 2),
(33, '2022_12_29_160022_create_complements_table', 2),
(34, '2022_12_29_160139_create_bedtypes_table', 2),
(35, '2022_12_29_160235_create_categories_table', 2),
(37, '2022_12_29_160446_create_rooms_table', 3),
(38, '2023_01_03_155440_create_room_images_table', 4),
(39, '2023_01_05_165400_create_section_contents_table', 5),
(40, '2023_01_21_101710_create_room_manages_table', 6),
(41, '2023_01_22_153058_create_booking_status_table', 7),
(42, '2023_01_22_153216_create_booking_manages_table', 7),
(43, '2023_01_29_160950_create_room_assigns_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `offer_ads`
--

CREATE TABLE `offer_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_ad_type` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_ads`
--

INSERT INTO `offer_ads` (`id`, `offer_ad_type`, `title`, `url`, `image`, `desc`, `is_publish`, `created_at`, `updated_at`) VALUES
(29, 'homepage1', 'World Tour', '#', '13012023104807-offer-3.jpg', '{\"text_1\":\"World Tour\",\"text_2\":\"Get the best international offers and deals world tour packages from here.\",\"button_text\":\"Book Now\",\"target\":null}', 1, '2023-01-13 04:48:36', '2023-01-13 05:26:06'),
(30, 'homepage1', 'Hot Air Balloon', '#', '13012023104926-offer-2.jpg', '{\"text_1\":\"Hot Air Balloon\",\"text_2\":\"A hot air balloon is a lighter-than-air aircraft consisting of a bag, called an envelope, which contains heated air.\",\"button_text\":\"Book Now\",\"target\":null}', 1, '2023-01-13 04:49:30', '2023-01-13 05:26:06'),
(31, 'homepage1', 'Mountainous Offer', '#', '13012023105100-offer-1.jpg', '{\"text_1\":\"Mountainous Offer\",\"text_2\":\"Up to 70% off on Winter Mountainous Offers.\",\"button_text\":\"Book Now\",\"target\":null}', 1, '2023-01-13 04:51:08', '2023-01-13 05:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `content` longtext DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `lan` varchar(100) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `og_title` text DEFAULT NULL,
  `og_image` text DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `thumbnail`, `lan`, `is_publish`, `og_title`, `og_image`, `og_description`, `og_keywords`, `created_at`, `updated_at`) VALUES
(44, 'Privacy Policy', 'privacy-policy', '<h6>What is a privacy policy?</h6>\r\n<p>A privacy policy is a document that states what personal data you collect from your users, why, and how you keep it private.</p>\r\n<p>The purpose of the privacy policy is to inform your users about how their data is being handled.</p>\r\n<p>Hence, the privacy policy should be accessible for your users and kept in plain and readable language.</p>\r\n<p>Most countries have privacy laws requiring that websites collecting personal data have a proper privacy policy in place.</p>\r\n<p>Failure to comply can result in heavy fines and even prosecution. Are you based in the EU or providing services to EU citizens, you must have a GDPR compliant privacy policy on your domain.</p>\r\n<p>We will get into this in more detail below.</p>\r\n\r\n<h6>What is personal data?</h6>\r\n<p>Personal data is information that can identify an individual, either directly or when combined with other data.</p>\r\n<p>Names, e-mails, addresses, localization, IP addresses, photos, and account information all are directly identifying data.</p>\r\n<p>Health information, income, religion, and cultural profiles, and the like is also personal data.</p>\r\n<p>Furthermore, and crucial in the present context, data on user behavior is also personal. Cookies can track and register individual users’ browsing activities, like what articles they scroll past and which ones they choose to click on.</p>\r\n\r\n<h6>Why is a privacy policy important?</h6>\r\n<p>The most important thing to remember is that a privacy policy is required by law if you collect data from users, either directly or indirectly. For example, if you have a contact form on your website you need a privacy policy. But you will also need a privacy policy if you use analytics tools such as Google Analytics.</p>\r\n\r\n<h6>Where do I put my privacy policy?</h6>\r\n<p>Usually, you can find privacy policies in the footer of a website. We recommend that you place your privacy policy in easy to find locations on your website.</p>\r\n\r\n<h6>What should the privacy policy include?</h6>\r\n<p>A standard privacy policy should include: what data you collect from visitors, how you collect it, why you are collecting the data, how you are using the data.</p>\r\n\r\n<h6>Why you Need a Privacy Policy</h6>\r\n<p>Privacy is not a new concept. Humans have always desired privacy in their social as well as private lives. But the idea of privacy as a human right is a relatively modern phenomenon.</p>\r\n<p>Around the world, laws and regulations have been developed for the protection of data related to government, education, health, children, consumers, financial institutions, etc.</p>\r\n<p>This data is critical to the person it belongs to. From credit card numbers and social security numbers to email addresses and phone numbers, our sensitive, personally identifiable information is important. This sort of information in unreliable hands can potentially have far-reaching consequences.</p>\r\n<p>Companies or websites that handle customer information are required to publish their Privacy Policies on their business websites. If you own a website, web app, mobile app or desktop app that collects or processes user data, you most certainly will have to post a Privacy Policy on your website (or give in-app access to the full Privacy Policy agreement).</p>', '05012023064453-breadcrumb-bg-2.jpg', 'en', 1, NULL, NULL, NULL, NULL, '2021-11-24 00:55:31', '2023-01-11 10:49:32'),
(45, 'Terms and Conditions', 'terms-and-conditions', '<h6>What are Terms and Conditions?</h6>\r\n<p>Terms and conditions (also referred to as terms of use or terms of service) are a form of legal agreement outlining rules and restrictions for customers to follow when using your site.</p>\r\n\r\n<h6>Does My Online Shop Need Terms and Conditions?</h6>\r\n<p>While it’s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your online business.</p>\r\n<p>As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major benefits of including terms and conditions on your ecommerce site:</p>\r\n<h6>1. Prevent Site Abuse</h6>\r\n<p>By setting guidelines on proper site usage, terms inform users what constitutes acceptable actions when using your site, and the consequences of breaking those rules.</p>\r\n<p>Examples of unacceptable behaviors include spamming, using bots, or posting defamatory content. Having terms and conditions allows you to take action against site abusers by banning them or terminating their accounts.</p>\r\n\r\n<h6>2. Protect Your Property</h6>\r\n<p>As the owner of your online store or shop, you also own your website’s content, logo, page designs, and any other brand-related materials you produce.</p>\r\n<p>Use your terms and conditions to inform users that your properties are protected by copyright and trademark laws, and set the rules for how others can lawfully use your materials.</p>\r\n\r\n<h6>3. Minimize Disputes</h6>\r\n<p>A well-drafted terms and conditions agreement will minimize your chances of legal disputes, as all the rules are clearly laid out for customers to see.</p>\r\n<p>In the event that disputes do arise, your terms and conditions (specifically, a dispute resolution clause) sets out a plan for resolving conflicts with limited difficulty.</p>\r\n\r\n<h6>What to Include in Terms and Conditions for Online Stores</h6>\r\n<p>Although terms and conditions will vary from business to business, standard terms and conditions for ecommerce sites will include these clauses:</p>\r\n\r\n<h6>Pricing and Payment Terms</h6>\r\n<p>Under your pricing and payment clause, address online purchase and pricing-related topics, including transaction processes, shipping and delivery terms, and returns and refunds.</p>\r\n<p>Your terms and conditions should also link to your return and refund policy, so users can easily find the details of your returns process. If you decide not to offer refunds, link to your no refund policy or all sales are final policy instead.</p>\r\n\r\n<p>Id aliquet risus feugiat in. Nec ullamcorper sit amet risus nullam eget felis. Sagittis nisl rhoncus mattis rhoncus.</p>\r\n<p>Aliquet sagittis id consectetur purus. Fermentum iaculis eu non diam phasellus vestibulum lorem. Libero id faucibus nisl tincidunt eget nullam non nisi est. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada.</p>\r\n<p>Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Sit amet facilisis magna etiam. Volutpat sed cras ornare arcu dui vivamus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam maecenas ultricies mi eget mauris pharetra et.</p>\r\n<p>Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Fringilla urna porttitor rhoncus dolor purus non. </p>', '05012023064503-breadcrumb-bg-4.jpg', 'en', 1, NULL, NULL, NULL, NULL, '2021-11-24 00:55:59', '2023-01-11 10:49:32'),
(46, 'Booking Policy', 'booking-policy', '<p>The role of the purchasing policy is to define standard methods and procedures for the Company to purchase products and services from different vendors. This policy covers all expenses for the company including items like taxes, payroll payments, etc.  Those are defined as exceptions in the policy and proper procedures are defined to manage these payments.</p>\r\n\r\n<p>Compliance with this policy is mandatory for all employees. Noncompliance with this policy could lead to action including termination of employment. The purchasing department is responsible for maintaining and implementing the processes defined in this policy.</p>\r\n\r\n<h6>Refund Policy</h6>\r\n<p>Thanks for purchasing our products Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci sagittis eu volutpat odio facilisis mauris sit amet massa. Egestas tellus rutrum tellus pellentesque eu. Id interdum velit laoreet id donec ultrices tincidunt. Faucibus turpis in eu mi bibendum neque egestas congue quisque.</p>\r\n<p>We offer a full money-back guarantee for all purchases made on our website. If you are not satisfied with the product that you have purchased from us, you can get your money back no questions asked. You are eligible for a full reimbursement within 14 calendar days of your purchase.</p>\r\n<p>After the 14-day period you will no longer be eligible and won\'t be able to receive a refund. We encourage our customers to try the product (or service) in the first two weeks after their purchase to ensure it fits your needs.</p>\r\n<p>If you have any additional questions or would like to request a refund, feel free to contact us.</p>\r\n\r\n<h6>Why do You Need a Refund Policy?</h6>\r\n<p>We have already stated that a refund policy is a legal agreement. If you run an online retail business or an e-commerce website, the chances are that you already have some policies on display for your customers. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci sagittis eu volutpat odio facilisis mauris sit amet massa. Egestas tellus rutrum tellus pellentesque eu. Id interdum velit laoreet id donec ultrices tincidunt. Faucibus turpis in eu mi bibendum neque egestas congue quisque.</p>\r\n\r\n<h6>What to Include in a Refund policy?</h6>\r\n<p>People don\'t have a tendency to read long and boring legal documents online. On the other hand, you have to provide all the necessary information.</p>\r\n<p>This is why it is advised to break down your return/refund policy into smaller sections. This will increase the readability of the document, make it easier for customers to find what they need, and, at the same time, protect you legally.</p>\r\n\r\n<p>Id aliquet risus feugiat in. Nec ullamcorper sit amet risus nullam eget felis. Sagittis nisl rhoncus mattis rhoncus.</p>\r\n<p>Aliquet sagittis id consectetur purus. Fermentum iaculis eu non diam phasellus vestibulum lorem. Libero id faucibus nisl tincidunt eget nullam non nisi est. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada.</p>\r\n<p>Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Sit amet facilisis magna etiam. Volutpat sed cras ornare arcu dui vivamus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam maecenas ultricies mi eget mauris pharetra et.</p>\r\n<p>Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Fringilla urna porttitor rhoncus dolor purus non. </p>', '05012023064507-breadcrumb-bg-5.jpg', 'en', 1, NULL, NULL, NULL, NULL, '2021-11-24 00:56:14', '2023-02-17 23:11:01'),
(47, 'Cookie Policy', 'cookie-policy', '<h6>What\'s a Cookies Policy</h6>\r\n<p>A Cookies Policy is a policy that provides users with detailed information about the types of cookies a website uses, how these cookies are used, and how users can control cookies placement through limiting or forbidding a website to place cookies on his/her electronic device.</p>\r\n<p>A Privacy Policy will often include a section within it that covers Cookies. However, in the EU, having a fully separate Cookies Policy is required.</p>\r\n<p>In this case, any information about cookies can also be placed in the Privacy Policy but then referenced in the separate Cookies Policy.</p>\r\n\r\n<h6>Legal Requirements for Cookies Policies</h6>\r\n<p>Any EU business that uses cookies must comply with the EU Cookies Law, which requires a Cookie Policy to be in place. Visitors to your website must be alerted that cookies are in use, what kind of cookies are in use, and given the option to opt out of having these cookies placed on their devices.</p>\r\n<p>A Cookie Policy is where this information can be thoroughly detailed and explained to your visitors.</p>\r\n<p>While pop-up boxes and banner notifications alert users that cookies are being used and can allow for an option to opt out within that box or banner, this kind of policy is where further information can be detailed and accessible to your visitors at any time.</p>\r\n\r\n<h6>What to Include in Your Cookies Policy</h6>\r\n<p>All Cookies Policies will include the same basic information:</p>\r\n<ul>\r\n	<li>That cookies are in use on your website</li>\r\n	<li>What cookies are</li>\r\n	<li>What kind of cookies are in use (by you and/or third parties)</li>\r\n	<li>How and why you (and/or third parties) are using the cookies</li>\r\n	<li>How a user can opt out of having cookies placed on a device</li>\r\n</ul>\r\n<p>Let\'s look at some examples of Cookies Policy clauses that address the above information.</p>\r\n\r\n<h6>You Use Cookies, and What Cookies Are</h6>\r\n<p>Most Cookies Policies start by letting users know that cookies are in use, and telling them what cookies are. Simple, easy-to-understand language should be used here so that everyone is able to understand what the policy is saying.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci sagittis eu volutpat odio facilisis mauris sit amet massa. Egestas tellus rutrum tellus pellentesque eu. Id interdum velit laoreet id donec ultrices tincidunt. Faucibus turpis in eu mi bibendum neque egestas congue quisque. Est ultricies integer quis auctor elit sed vulputate mi. Leo vel fringilla est ullamcorper eget nulla. Odio pellentesque diam volutpat commodo. Tincidunt augue interdum velit euismod in pellentesque massa placerat duis. Auctor urna nunc id cursus metus aliquam. Sapien faucibus et molestie ac feugiat sed lectus vestibulum mattis. Maecenas accumsan lacus vel facilisis volutpat est velit egestas dui. Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>', '05012023064516-breadcrumb-bg-7.jpg', 'en', 1, NULL, NULL, NULL, NULL, '2021-11-24 00:56:24', '2023-01-11 10:49:32'),
(48, 'About Us', 'about-us', '<h6>What Is An About Us Page?</h6>\r\n<p>An About Us Page is a page on your website that tells your readers all about you. It includes a detailed description covering all aspects of your business and you as an entrepreneur. This can include the products or services you are offering, how you came into being as a business, your mission and vision, your aim, and maybe something about your future goals too. Your About Us page is your perfect opportunity to tell a compelling story about your business.</p>\r\n\r\n<p>An About Us page helps your company make a good first impression, and is critical for building customer trust and loyalty. An About Us page should make sure to cover basic information about the store and its founders, explain the company\'s purpose and how it differs from the competition, and encourage discussion and interaction. Here are some free templates, samples, and example About Us pages to help your ecommerce store stand out from the crowd.</p>\r\n\r\n<p>Even though an About Us page is one of the most important elements of a website, it is often one of the most overlooked elements. Compared to a landing page, an About Us page help you communicate a range of things:</p>\r\n<ul>\r\n	<li>The story of your brand and why you started it. </li>\r\n	<li>The cause or customers that your business serves.</li>\r\n	<li>Your business model or how your products are sourced/manufactured.</li>\r\n</ul>\r\n<p>As an important part of your website your About Us page can set you apart from your competitors in a way that can build your brand in a positive way.</p>\r\n\r\n<h6>Your History</h6>\r\n<p>Take the visitors on your website to a trip down memory lane, and give them an insight to the history behind your store. Here, you can show them where, how, and when you started, and everything your business has accomplished on the way. This is your chance to share your relevant milestones and achievements relating to your business in an engaging way.</p>\r\n<p>You can even choose to present your history to your viewers in the form of a timeline, which allows you to display a large amount of information in a visually engaging manner. Your customers or potential customers might be interested in seeing how you grew over the years.</p>\r\n\r\n<h6>Team Member Profiles</h6>\r\n<p>Add an emotional element to your About Us page by adding details of the people that are driving the passion at your business. People find it easier to connect with human beings, so allow the personality of your crew to shine through the About Us page.</p>\r\n\r\n<p>Id aliquet risus feugiat in. Nec ullamcorper sit amet risus nullam eget felis. Sagittis nisl rhoncus mattis rhoncus.</p>\r\n<p>Aliquet sagittis id consectetur purus. Fermentum iaculis eu non diam phasellus vestibulum lorem. Libero id faucibus nisl tincidunt eget nullam non nisi est. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada.</p>\r\n<p>Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Sit amet facilisis magna etiam. Volutpat sed cras ornare arcu dui vivamus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam maecenas ultricies mi eget mauris pharetra et.</p>\r\n<p>Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Fringilla urna porttitor rhoncus dolor purus non. </p>', '05012023064520-breadcrumb-bg-8.jpg', 'en', 1, NULL, NULL, NULL, NULL, '2021-11-24 00:57:08', '2023-01-11 10:49:32'),
(49, 'Career', 'career', '<p>A Career Objective or a Resume Objective is essentially a heading statement that describes your professional goals in two to three sentences. Employers looking to hire an employee for a position tend to seek candidates that are driven enough to understand what they want. Whether you are starting off or set on a particular dream job, it is extremely essential to design an effective objective to stand out. Designing a resume that catches the eye of the recruiter is important. Showcasing all your skills, and highlighting work experience, and finding the perfect balance, can seem quite intimidating. Thus, taking up a Free Resume Building from Scratch session will help you streamline the process and help you create an effective resume. You will learn a step-by-step process, Do’s and Don’ts, Language &amp; Formatting, and Live Resume Examples.</p>\r\n\r\n<h6>What’s the best resume template to use for an e-commerce resume?</h6>\r\n<p>The best resume template for e-commerce efficiently communicates the information employers need to see. Look for a template with a header in which to provide contact details and room for an objective or summary statement in addition to lists of skills, professional experience, and education.</p>\r\n<p>Our e-commerce resume sample features all of these sections as well as an additional section dedicated to certifications and affiliations. Use this template with our resume builder to create a resume in minutes.</p>\r\n\r\n<h6>What’s the best format for a resume: PDF, MS Word, or txt?</h6>\r\n<p>Check the job advertisement or description to determine which format an employer prefers for resume submission. PDF and MS Word files can display formatting, and plain text files cannot. The e-commerce resume sample includes light formatting such as bolded text, horizontal lines, and bullet points.</p>\r\n<p>If an employer has requested you to submit your resume with other documents, you might want to consider a versatile PDF file. Microsoft Word is a full-featured word processor with a wide variety of formatting options for structuring and refining the appearance of your materials. A text file can be useful for copying and pasting into a form on an online application portal.</p>\r\n\r\n<h6>What’s the best way to include digital skills on an e-commerce resume?</h6>\r\n<p>Digital skills play a major part in the success of any e-commerce candidate. Emphasize the skills requested in the description of the job you are seeking and try to make your resume reflect the employer’s priorities.</p>\r\n\r\n<h6>How can you separate your e-commerce resume from other candidates’ resumes?</h6>\r\n<p>The candidate in our e-commerce resume sample focuses on SEO, social networking, and blogging in her objective statement and sets forth more technological proficiencies in the skills section. If specific proficiency is absolutely necessary, you might want to bring it up in your summary statement or list of skills. Reference competencies related to past positions under qualifications or experience.</p>\r\n<p>One of the best ways to distinguish your resume from the competition for an e-commerce position is to tailor your experience to the job you are seeking. Also, use effective and relevant metrics throughout to make a strong case for your abilities. Write your objective or summary statement with the position you want in mind.</p>\r\n\r\n<h6>How do you list awards on your e-commerce resume?</h6>\r\n<p>You can make reference to awards considered industry standard in your summary statement or a section devoted to awards. If these honors pertain to past positions, bring them up in the corresponding entry of your professional experience section. The candidate on our e-commerce resume sample does not mention accolades, but she includes a section for certifications and affiliations that could go in the place of, before, or after an awards section.</p>', '05012023064524-breadcrumb-bg-9.jpg', 'en', 1, NULL, NULL, NULL, NULL, '2021-11-24 00:57:18', '2023-01-11 10:49:32'),
(71, 'FAQ', 'faq', '<p>The role of the purchasing policy is to define standard methods and procedures for the Company to purchase products and services from different vendors. This policy covers all expenses for the company including items like taxes, payroll payments, etc.  Those are defined as exceptions in the policy and proper procedures are defined to manage these payments.</p>\r\n\r\n<p>Compliance with this policy is mandatory for all employees. Noncompliance with this policy could lead to action including termination of employment. The purchasing department is responsible for maintaining and implementing the processes defined in this policy.</p>\r\n\r\n<h6>Refund Policy</h6>\r\n<p>Thanks for purchasing our products Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci sagittis eu volutpat odio facilisis mauris sit amet massa. Egestas tellus rutrum tellus pellentesque eu. Id interdum velit laoreet id donec ultrices tincidunt. Faucibus turpis in eu mi bibendum neque egestas congue quisque.</p>\r\n<p>We offer a full money-back guarantee for all purchases made on our website. If you are not satisfied with the product that you have purchased from us, you can get your money back no questions asked. You are eligible for a full reimbursement within 14 calendar days of your purchase.</p>\r\n<p>After the 14-day period you will no longer be eligible and won\'t be able to receive a refund. We encourage our customers to try the product (or service) in the first two weeks after their purchase to ensure it fits your needs.</p>\r\n<p>If you have any additional questions or would like to request a refund, feel free to contact us.</p>\r\n\r\n<h6>Why do You Need a Refund Policy?</h6>\r\n<p>We have already stated that a refund policy is a legal agreement. If you run an online retail business or an e-commerce website, the chances are that you already have some policies on display for your customers. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci sagittis eu volutpat odio facilisis mauris sit amet massa. Egestas tellus rutrum tellus pellentesque eu. Id interdum velit laoreet id donec ultrices tincidunt. Faucibus turpis in eu mi bibendum neque egestas congue quisque.</p>\r\n\r\n<h6>What to Include in a Refund policy?</h6>\r\n<p>People don\'t have a tendency to read long and boring legal documents online. On the other hand, you have to provide all the necessary information.</p>\r\n<p>This is why it is advised to break down your return/refund policy into smaller sections. This will increase the readability of the document, make it easier for customers to find what they need, and, at the same time, protect you legally.</p>\r\n\r\n<p>Id aliquet risus feugiat in. Nec ullamcorper sit amet risus nullam eget felis. Sagittis nisl rhoncus mattis rhoncus.</p>\r\n<p>Aliquet sagittis id consectetur purus. Fermentum iaculis eu non diam phasellus vestibulum lorem. Libero id faucibus nisl tincidunt eget nullam non nisi est. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada.</p>\r\n<p>Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Sit amet facilisis magna etiam. Volutpat sed cras ornare arcu dui vivamus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam maecenas ultricies mi eget mauris pharetra et.</p>\r\n<p>Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Fringilla urna porttitor rhoncus dolor purus non. </p>', '05012023064531-breadcrumb-bg-11.jpg', 'en', 1, NULL, NULL, NULL, NULL, '2022-09-04 11:00:58', '2023-02-27 09:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `method_name`, `created_at`, `updated_at`) VALUES
(1, 'Cash On', '2021-10-03 17:07:16', '2021-10-03 17:07:18'),
(2, 'Bank Transfer', '2021-10-03 17:09:11', '2021-10-03 17:09:13'),
(3, 'Stripe', '2021-10-03 17:09:54', '2021-10-03 17:09:56'),
(4, 'Paypal', '2022-05-20 09:33:54', '2022-05-20 09:33:54'),
(5, 'Razorpay', '2022-05-20 09:33:54', '2022-05-20 09:33:54'),
(6, 'Mollie', '2022-05-20 09:33:54', '2022-05-20 09:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pstatus_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `pstatus_name`, `created_at`, `updated_at`) VALUES
(1, 'Completed', '2021-10-03 16:52:47', '2021-10-03 16:52:50'),
(2, 'Pending', '2021-10-03 16:53:12', '2021-10-03 16:53:14'),
(3, 'Canceled', '2021-10-03 16:53:33', '2021-10-03 16:53:34'),
(4, 'Incompleted', '2021-10-03 16:53:57', '2021-10-03 16:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `cover_img` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `total_adult` int(11) DEFAULT NULL,
  `total_child` int(11) DEFAULT NULL,
  `price` double(12,3) DEFAULT NULL,
  `old_price` double(12,3) DEFAULT NULL,
  `amenities` varchar(150) DEFAULT NULL,
  `complements` varchar(150) DEFAULT NULL,
  `beds` varchar(100) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `is_discount` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `lan` varchar(100) DEFAULT NULL,
  `og_title` text DEFAULT NULL,
  `og_image` text DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `title`, `slug`, `thumbnail`, `cover_img`, `short_desc`, `description`, `total_adult`, `total_child`, `price`, `old_price`, `amenities`, `complements`, `beds`, `cat_id`, `tax_id`, `is_discount`, `is_featured`, `is_publish`, `lan`, `og_title`, `og_image`, `og_description`, `og_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Executive Suite', 'executive-suite', '06012023120550-900x700-1-room.jpg', '05012023064431-breadcrumb-bg-1.jpg', NULL, '<p>A single room has one single bed for single occupancy. An additional bed (called an extra bed) may be added to this room at a guests request and charged accordingly.<br><br>The size of the bed is normally 3 feet by 6 feet. However, the concept of single rooms is vanishing nowadays. Mostly, hotels have twin or double rooms, and the charge for a single room is occupied by one person.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 1, 100.000, NULL, '2|7|3|6|5|1', '5|2|3', '1|2', 1, 38, NULL, 0, 1, 'en', 'Executive Suite', '06012023120550-900x700-1-room.jpg', 'A single room has one single bed for single occupancy. An additional bed (called an extra bed) may be added to this room at a guests request and charged accordingly.', 'Single Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-05 04:15:56', '2023-01-21 09:43:27'),
(10, 'Royal Club Suite', 'royal-club-suite', '06012023120553-900x700-2-room.jpg', '05012023064453-breadcrumb-bg-2.jpg', NULL, '<p>A twin room has two single beds for double occupancy. An extra bed may be added to this room at a guests request and charged accordingly. Here the bed size is normally 3 feet by 6 feet. These rooms are suitable for sharing accommodation among a group of delegates meeting.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p><p><br></p>', 2, 1, 400.000, NULL, '2|7|3|4|6|5|1', '1|5|4|2|3', '1|2', 1, 38, NULL, 1, 1, 'en', 'Royal Club Suite', '06012023120553-900x700-2-room.jpg', 'A twin room has two single beds for double occupancy. An extra bed may be added to this room at a guests request and charged accordingly. Here the bed size is normally 3 feet by 6 feet. These rooms are suitable for sharing accommodation among a group of delegates meeting.', 'Twin Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-06 06:38:55', '2023-01-21 09:43:11'),
(11, 'Honeymoon Suite', 'honeymoon-suite', '06012023120557-900x700-3-room.jpg', '05012023064459-breadcrumb-bg-3.jpg', NULL, '<p>A double room has one double bed for double occupancy. An extra bed may be added to this room at a guest\'s request and charged accordingly. The size of the double bed is generally 4.5 feet by 6 feet.<br></p>', 2, 1, 1000.000, 1200.000, '2|7|3|4|6|5|1', '1|5|4|2|3', '1|2', 1, 38, 1, 1, 1, 'en', 'Honeymoon Suite', '06012023120557-900x700-3-room.jpg', 'A double room has one double bed for double occupancy. An extra bed may be added to this room at a guest\'s request and charged accordingly. The size of the double bed is generally 4.5 feet by 6 feet.', 'Double Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-06 07:03:44', '2023-01-21 09:42:50'),
(12, 'Deluxe Family Suite', 'deluxe-family-suite', '09012023045931-900x700-17-room.jpg', '05012023064503-breadcrumb-bg-4.jpg', NULL, '<p>A triple room has three separate single beds and can be occupied by three guests. This type of room is suitable for groups and delegates of meetings and conferences.<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 1, 1150.000, 1500.000, '2|7|3|4|6|5|1', '1|5|4|2|3', '1', 1, 38, 1, 1, 1, 'en', 'Deluxe Family Suite', '06012023120600-900x700-4-room.jpg', 'A triple room has three separate single beds and can be occupied by three guests. This type of room is suitable for groups and delegates of meetings and conferences.', 'Triple Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-06 07:11:16', '2023-01-21 09:42:24'),
(13, 'Deluxe Couple Suite', 'deluxe-couple-suite', '06012023120603-900x700-5-room.jpg', '05012023064507-breadcrumb-bg-5.jpg', NULL, '<p>A quad room has four separate single beds and can accommodate four persons together in the same room.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 2, 1100.000, 1200.000, '2|7|3|4|6|5|1', '1|5|4|2|3', '1|2', 1, 38, 1, 0, 1, 'en', 'Deluxe Couple Suite', '06012023120603-900x700-5-room.jpg', 'A quad room has four separate single beds and can accommodate four persons together in the same room.', 'Quad Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-06 07:15:40', '2023-01-21 09:45:56'),
(14, 'Super Deluxe Twin', 'super-deluxe-twin', '06012023120606-900x700-6-room.jpg', '05012023064453-breadcrumb-bg-2.jpg', NULL, '<p>A Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 1, 600.000, NULL, '2|7|4|6|5|1', '5|4|2|3', '1', 1, 38, NULL, 0, 1, 'en', 'Super Deluxe Twin', '06012023120606-900x700-6-room.jpg', 'A Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Hollywood Twin Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-06 07:23:57', '2023-01-21 09:41:45'),
(15, 'Deluxe Room', 'deluxe-room', '09012023045855-900x700-8-room.jpg', '05012023064431-breadcrumb-bg-1.jpg', NULL, '<p>A king room has a king-size bed. The size of the bed is 6 feet by 6 feet. An extra bed may be added to this room at a guest\'s request and charged accordingly.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 1, 700.000, NULL, '2|7|6|5|1', '1|5|4|2', '1|2', 1, 38, NULL, 0, 1, 'en', 'Deluxe Room', '09012023045855-900x700-8-room.jpg', 'A king room has a king-size bed. The size of the bed is 6 feet by 6 feet. An extra bed may be added to this room at a guest\'s request and charged accordingly.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'King Room, Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-08 22:36:16', '2023-01-21 09:41:31'),
(16, 'Deluxe Twin Room', 'deluxe-twin-room', '09012023045904-900x700-10-room.jpg', '05012023064507-breadcrumb-bg-5.jpg', NULL, '<p>A queen room has a queen-size bed. The size of the bed is 5 feet by 6 feet. An extra bed may be added to this room at a guest\'s request and charged accordingly.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 0, 500.000, NULL, '2|7|3|4|6|1', '5|4|2', '1', 1, 38, NULL, 0, 1, 'en', 'Deluxe Twin Room', '09012023045904-900x700-10-room.jpg', 'A queen room has a queen-size bed. The size of the bed is 5 feet by 6 feet. An extra bed may be added to this room at a guest\'s request and charged accordingly.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Queen Room Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-08 23:12:01', '2023-01-21 09:41:10'),
(17, 'Economy Room', 'economy-room', '09012023045908-900x700-11-room.jpg', '05012023064531-breadcrumb-bg-11.jpg', NULL, '<p>Interconnecting rooms have a common wall and a door that connects the two rooms. This allows guests to access any of the two rooms without passing through a public area. This type of hotel room is ideal for families and crew members in a 5-star hotel.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 3, 2, 1000.000, 1400.000, '2|3|4|6|5|1', '5|4|2|3', '1|2', 1, 38, 1, 0, 1, 'en', 'Economy Room', '09012023045908-900x700-11-room.jpg', 'Interconnecting rooms have a common wall and a door that connects the two rooms. This allows guests to access any of the two rooms without passing through a public area. This type of hotel room is ideal for families and crew members in a 5-star hotel.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-08 23:35:06', '2023-01-21 09:40:40'),
(18, 'Superior Room', 'superior-room', '09012023045912-900x700-12-room.jpg', '05012023064527-breadcrumb-bg-10.jpg', NULL, '<p>A Cabana is situated away from the main hotel building, in the \r\nvicinity of a swimming pool or sea beach. It may or may not have beds \r\nand is generally used as a changing room, not a bedroom.</p><p>Lorem \r\nipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem\r\n dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit \r\nsuscipit laborum eligendi eaque! Porro in deleniti ad sed corporis \r\nconsequuntur quos, numquam totam alias vero neque eum aliquam \r\nreprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio \r\nveniam architecto, repellendus exercitationem commodi? Optio, iste \r\ntempora amet excepturi laborum ipsam perspiciatis asperiores nihil \r\nvoluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum \r\nlabore debitis animi quod eum, earum officiis ipsa molestiae quasi, est \r\nveniam quam ducimus. Repudiandae est facilis veritatis praesentium \r\nmagnam error nihil, modi accusantium sequi, illo porro.</p><p></p>', 2, 0, 300.000, 400.000, '2|7|3|4|6|5|1', '1|5|4|2', '1', 1, 38, 1, 0, 1, 'en', 'Superior Room', '09012023045912-900x700-12-room.jpg', 'A Cabana is situated away from the main hotel building, in the vicinity of a swimming pool or sea beach. It may or may not have beds and is generally used as a changing room, not a bedroom.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-08 23:44:50', '2023-01-21 09:45:12'),
(19, 'Balcony Executive Room', 'balcony-executive-room', '09012023045935-900x700-18-room.jpg', '05012023064453-breadcrumb-bg-2.jpg', NULL, '<p>A Lanai has a veranda or roofed patio and is often furnished and used as a living room. It generally has a view of a garden or sea beach.</p><p>Lorem \r\nipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem\r\n dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit \r\nsuscipit laborum eligendi eaque! Porro in deleniti ad sed corporis \r\nconsequuntur quos, numquam totam alias vero neque eum aliquam \r\nreprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio \r\nveniam architecto, repellendus exercitationem commodi? Optio, iste \r\ntempora amet excepturi laborum ipsam perspiciatis asperiores nihil \r\nvoluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum \r\nlabore debitis animi quod eum, earum officiis ipsa molestiae quasi, est \r\nveniam quam ducimus. Repudiandae est facilis veritatis praesentium \r\nmagnam error nihil, modi accusantium sequi, illo porro.</p><p></p>', 1, 0, 200.000, NULL, '2|7|3|4|6|5|1', '1|5|4|2|3', '2', 1, 38, NULL, 1, 1, 'en', 'Balcony Executive Room', '09012023045935-900x700-18-room.jpg', 'A Lanai has a veranda or roofed patio and is often furnished and used as a living room. It generally has a view of a garden or sea beach.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-09 00:04:37', '2023-01-21 09:32:49'),
(20, 'Executive Premium Suite', 'executive-premium-suite', '09012023045859-900x700-9-room.jpg', '05012023064453-breadcrumb-bg-2.jpg', NULL, '<p>A penthouse room is generally located on the topmost floor of hotels and has an attached open terrace or open sky space. It has very opulent decor and furnishings and is among the costliest rooms in the hotels, preferred by celebrities and major political personalities.<br></p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 1, 2000.000, 3000.000, '2|7|3|4|6|5|1', '1|5|4|2|3', '1', 1, 38, 1, 0, 1, 'en', 'Executive Premium Suite', '09012023045859-900x700-9-room.jpg', 'A penthouse room is generally located on the topmost floor of hotels and has an attached open terrace or open sky space. It has very opulent decor and furnishings and is among the costliest rooms in the hotels, preferred by celebrities and major political personalities.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-09 00:16:56', '2023-01-21 09:23:29'),
(21, 'Couple Premium Room', 'couple-premium-room', '09012023045912-900x700-12-room.jpg', '05012023064453-breadcrumb-bg-2.jpg', NULL, '<p>A hospitality room is designed for hotel guests who would want to entertain their own guests outside their allotted rooms. Such rooms are generally charged on an hourly basis.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 1, 720.000, NULL, '2|7|3|4|6|5|1', '5|4|2|3', '1', 1, 38, NULL, 0, 1, 'en', 'Couple Premium Room', '09012023045912-900x700-12-room.jpg', 'A hospitality room is designed for hotel guests who would want to entertain their own guests outside their allotted rooms. Such rooms are generally charged on an hourly basis.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-09 00:27:29', '2023-01-21 09:39:10'),
(22, 'Superior Premium Room', 'superior-premium-room', '06012023120553-900x700-2-room.jpg', '05012023064453-breadcrumb-bg-2.jpg', NULL, '<p>An efficiency room has an attached kitchenette for guests preferring a longer duration of stay. Generally, this type of hotel room is found in holiday and health resorts where guests stay for a longer period of time.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 2, 1400.000, 1500.000, '2|7|3|4|6|5|1', '1|5|4|2|3', '1|2', 1, 38, 1, 1, 1, 'en', 'Superior Premium Room', '06012023120553-900x700-2-room.jpg', 'An efficiency room has an attached kitchenette for guests preferring a longer duration of stay. Generally, this type of hotel room is found in holiday and health resorts where guests stay for a longer period of time.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-09 00:42:50', '2023-01-21 09:31:34'),
(23, 'Twin Premium Room', 'twin-premium-room', '06012023135205-900x700-about-4.jpg', '05012023064453-breadcrumb-bg-2.jpg', NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? <br></p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 0, 400.000, NULL, '2|7|3|4|6|5|1', '1|5|4|2', '1', 1, 38, NULL, 1, 1, 'en', 'Twin Premium Room', '06012023135205-900x700-about-4.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-09 00:54:54', '2023-01-21 09:27:19'),
(24, 'Deluxe Double Room', 'deluxe-double-room', '09012023045943-900x700-20-room.jpg', '05012023064527-breadcrumb-bg-10.jpg', NULL, '<p>A Suite room is comprised of more than one room. Occasionally, it can also be a single large room with clearly defined sleeping and sitting areas. The decor of such units is of very high standards, aimed to please the affluent guest who can afford the high tariffs of the room category.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 1, 800.000, 1000.000, '2|7|3|4|6|5|1', '1|5|4|2|3', '1', 1, 38, 1, 0, 1, 'en', 'Deluxe Double Room', '09012023045943-900x700-20-room.jpg', 'A Suite room is comprised of more than one room. Occasionally, it can also be a single large room with clearly defined sleeping and sitting areas. The decor of such units is of very high standards, aimed to please the affluent guest who can afford the high tariffs of the room category.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-09 01:57:27', '2023-01-30 10:25:35'),
(25, 'Deluxe Single Room', 'deluxe-single-room', '06012023120606-900x700-6-room.jpg', '05012023064527-breadcrumb-bg-10.jpg', NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 0, 200.000, NULL, '2|7|3|4|6|5|1', '1|5|4|2', '1', 1, 38, NULL, 1, 1, 'en', 'Deluxe Single Room', '06012023120606-900x700-6-room.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-09 02:08:39', '2023-01-21 09:38:38'),
(43, 'Luxury Suite', 'luxury-suite', '10012023084507-900x700-Rectangle 5.jpg', '05012023064516-breadcrumb-bg-7.jpg', NULL, '<p>A Hollywood twin room has two single beds with a common headboard. This hotel room type is generally occupied by two guests.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.<br></p>', 2, 1, 456.000, NULL, '2|7|3|4|6|5|1', '1|5|4|2|3', '1|2', 1, 38, 0, 0, 1, 'en', 'Luxury Suite', '10012023084507-900x700-Rectangle 5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione dolorem dolor nostrum dolorum necessitatibus a inventore fugit, quis ab sit suscipit laborum eligendi eaque! Porro in deleniti ad sed corporis consequuntur quos, numquam totam alias vero neque eum aliquam reprehenderit obcaecati accusamus ex atque omnis quidem rem distinctio veniam architecto, repellendus exercitationem commodi? Optio, iste tempora amet excepturi laborum ipsam perspiciatis asperiores nihil voluptates quidem id doloremque libero. Temporibus incidunt omnis ipsum labore debitis animi quod eum, earum officiis ipsa molestiae quasi, est veniam quam ducimus. Repudiandae est facilis veritatis praesentium magnam error nihil, modi accusantium sequi, illo porro.', 'Booking, Hotel Booking, Rooms, Room Booking, Room Book, Hotel Near By Me, Resurrect, Resort', '2023-01-10 03:39:32', '2023-02-27 09:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `room_assigns`
--

CREATE TABLE `room_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `roomtype_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `large_image` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `thumbnail`, `large_image`, `desc`, `created_at`, `updated_at`) VALUES
(13, 1, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-06 06:34:23', '2023-01-06 06:34:23'),
(14, 1, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-06 06:34:31', '2023-01-06 06:34:31'),
(16, 1, '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', NULL, '2023-01-06 06:34:50', '2023-01-06 06:34:50'),
(17, 1, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-06 06:34:56', '2023-01-06 06:34:56'),
(18, 1, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-06 06:35:04', '2023-01-06 06:35:04'),
(19, 10, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-06 06:55:36', '2023-01-06 06:55:36'),
(20, 10, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-06 06:55:50', '2023-01-06 06:55:50'),
(21, 10, '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', NULL, '2023-01-06 06:55:56', '2023-01-06 06:55:56'),
(22, 10, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-06 06:56:01', '2023-01-06 06:56:01'),
(23, 10, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-06 06:56:10', '2023-01-06 06:56:10'),
(25, 10, '06012023113208-900x700-about-2.jpg', '06012023113208-about-2.jpg', NULL, '2023-01-06 06:57:03', '2023-01-06 06:57:03'),
(26, 11, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-06 07:07:08', '2023-01-06 07:07:08'),
(27, 11, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-06 07:07:13', '2023-01-06 07:07:13'),
(28, 11, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-06 07:07:26', '2023-01-06 07:07:26'),
(29, 11, '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', NULL, '2023-01-06 07:07:31', '2023-01-06 07:07:31'),
(30, 11, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-06 07:07:38', '2023-01-06 07:07:38'),
(31, 11, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-06 07:07:44', '2023-01-06 07:07:44'),
(32, 12, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-06 07:13:31', '2023-01-06 07:13:31'),
(33, 12, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-06 07:13:35', '2023-01-06 07:13:35'),
(34, 12, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-06 07:13:44', '2023-01-06 07:13:44'),
(35, 12, '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', NULL, '2023-01-06 07:13:50', '2023-01-06 07:13:50'),
(36, 12, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-06 07:13:55', '2023-01-06 07:13:55'),
(37, 12, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-06 07:14:00', '2023-01-06 07:14:00'),
(38, 13, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-06 07:18:40', '2023-01-06 07:18:40'),
(39, 13, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-06 07:18:52', '2023-01-06 07:18:52'),
(40, 13, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-06 07:18:57', '2023-01-06 07:18:57'),
(41, 13, '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', NULL, '2023-01-06 07:19:01', '2023-01-06 07:19:01'),
(42, 13, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-06 07:19:06', '2023-01-06 07:19:06'),
(43, 13, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-06 07:19:11', '2023-01-06 07:19:11'),
(44, 14, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-06 07:25:47', '2023-01-06 07:25:47'),
(45, 14, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-06 07:25:52', '2023-01-06 07:25:52'),
(46, 14, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-06 07:25:56', '2023-01-06 07:25:56'),
(47, 14, '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', NULL, '2023-01-06 07:26:14', '2023-01-06 07:26:14'),
(48, 14, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-06 07:26:18', '2023-01-06 07:26:18'),
(50, 14, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-06 08:21:21', '2023-01-06 08:21:21'),
(51, 15, '09012023045851-900x700-7-room.jpg', '09012023045851-7-room.jpg', NULL, '2023-01-08 23:03:54', '2023-01-08 23:03:54'),
(52, 15, '09012023045855-900x700-8-room.jpg', '09012023045855-8-room.jpg', NULL, '2023-01-08 23:04:02', '2023-01-08 23:04:02'),
(53, 15, '09012023045859-900x700-9-room.jpg', '09012023045859-9-room.jpg', NULL, '2023-01-08 23:04:08', '2023-01-08 23:04:08'),
(54, 15, '09012023045904-900x700-10-room.jpg', '09012023045904-10-room.jpg', NULL, '2023-01-08 23:04:14', '2023-01-08 23:04:14'),
(55, 15, '09012023045908-900x700-11-room.jpg', '09012023045908-11-room.jpg', NULL, '2023-01-08 23:04:19', '2023-01-08 23:04:19'),
(56, 15, '09012023045912-900x700-12-room.jpg', '09012023045912-12-room.jpg', NULL, '2023-01-08 23:04:28', '2023-01-08 23:04:28'),
(57, 15, '09012023045916-900x700-13-room.jpg', '09012023045916-13-room.jpg', NULL, '2023-01-08 23:04:34', '2023-01-08 23:04:34'),
(58, 17, '09012023045851-900x700-7-room.jpg', '09012023045851-7-room.jpg', NULL, '2023-01-08 23:39:29', '2023-01-08 23:39:29'),
(59, 17, '09012023045855-900x700-8-room.jpg', '09012023045855-8-room.jpg', NULL, '2023-01-08 23:39:34', '2023-01-08 23:39:34'),
(60, 17, '09012023045859-900x700-9-room.jpg', '09012023045859-9-room.jpg', NULL, '2023-01-08 23:39:39', '2023-01-08 23:39:39'),
(61, 17, '09012023045943-900x700-20-room.jpg', '09012023045943-20-room.jpg', NULL, '2023-01-08 23:39:46', '2023-01-08 23:39:46'),
(62, 17, '09012023045939-900x700-19-room.jpg', '09012023045939-19-room.jpg', NULL, '2023-01-08 23:39:51', '2023-01-08 23:39:51'),
(63, 17, '09012023045931-900x700-17-room.jpg', '09012023045931-17-room.jpg', NULL, '2023-01-08 23:40:00', '2023-01-08 23:40:00'),
(64, 17, '09012023045928-900x700-16-room.jpg', '09012023045928-16-room.jpg', NULL, '2023-01-08 23:40:08', '2023-01-08 23:40:08'),
(65, 17, '09012023045935-900x700-18-room.jpg', '09012023045935-18-room.jpg', NULL, '2023-01-08 23:40:15', '2023-01-08 23:40:15'),
(66, 18, '09012023045916-900x700-13-room.jpg', '09012023045916-13-room.jpg', NULL, '2023-01-08 23:46:47', '2023-01-08 23:46:47'),
(67, 18, '09012023045919-900x700-14-room.jpg', '09012023045919-14-room.jpg', NULL, '2023-01-08 23:46:52', '2023-01-08 23:46:52'),
(68, 18, '09012023045924-900x700-15-room.jpg', '09012023045924-15-room.jpg', NULL, '2023-01-08 23:46:58', '2023-01-08 23:46:58'),
(70, 18, '09012023045928-900x700-16-room.jpg', '09012023045928-16-room.jpg', NULL, '2023-01-08 23:47:07', '2023-01-08 23:47:07'),
(72, 18, '09012023045931-900x700-17-room.jpg', '09012023045931-17-room.jpg', NULL, '2023-01-08 23:47:26', '2023-01-08 23:47:26'),
(73, 18, '09012023045935-900x700-18-room.jpg', '09012023045935-18-room.jpg', NULL, '2023-01-08 23:47:34', '2023-01-08 23:47:34'),
(74, 18, '09012023045943-900x700-20-room.jpg', '09012023045943-20-room.jpg', NULL, '2023-01-08 23:47:40', '2023-01-08 23:47:40'),
(76, 19, '09012023045939-900x700-19-room.jpg', '09012023045939-19-room.jpg', NULL, '2023-01-09 00:06:50', '2023-01-09 00:06:50'),
(77, 19, '09012023045935-900x700-18-room.jpg', '09012023045935-18-room.jpg', NULL, '2023-01-09 00:06:56', '2023-01-09 00:06:56'),
(78, 19, '09012023045931-900x700-17-room.jpg', '09012023045931-17-room.jpg', NULL, '2023-01-09 00:07:02', '2023-01-09 00:07:02'),
(79, 19, '09012023045859-900x700-9-room.jpg', '09012023045859-9-room.jpg', NULL, '2023-01-09 00:07:51', '2023-01-09 00:07:51'),
(80, 19, '09012023045904-900x700-10-room.jpg', '09012023045904-10-room.jpg', NULL, '2023-01-09 00:08:01', '2023-01-09 00:08:01'),
(82, 20, '09012023045855-900x700-8-room.jpg', '09012023045855-8-room.jpg', NULL, '2023-01-09 00:21:02', '2023-01-09 00:21:02'),
(83, 20, '09012023045904-900x700-10-room.jpg', '09012023045904-10-room.jpg', NULL, '2023-01-09 00:21:07', '2023-01-09 00:21:07'),
(84, 20, '09012023045912-900x700-12-room.jpg', '09012023045912-12-room.jpg', NULL, '2023-01-09 00:21:12', '2023-01-09 00:21:12'),
(85, 20, '09012023045916-900x700-13-room.jpg', '09012023045916-13-room.jpg', NULL, '2023-01-09 00:21:17', '2023-01-09 00:21:17'),
(86, 20, '09012023045919-900x700-14-room.jpg', '09012023045919-14-room.jpg', NULL, '2023-01-09 00:21:23', '2023-01-09 00:21:23'),
(87, 21, '09012023045851-900x700-7-room.jpg', '09012023045851-7-room.jpg', NULL, '2023-01-09 00:29:30', '2023-01-09 00:29:30'),
(88, 21, '06012023135205-900x700-about-4.jpg', '06012023135205-about-4.jpg', NULL, '2023-01-09 00:29:45', '2023-01-09 00:29:45'),
(89, 21, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-09 00:29:51', '2023-01-09 00:29:51'),
(90, 21, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-09 00:29:56', '2023-01-09 00:29:56'),
(91, 21, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-09 00:30:02', '2023-01-09 00:30:02'),
(92, 21, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-09 00:30:07', '2023-01-09 00:30:07'),
(93, 21, '09012023045912-900x700-12-room.jpg', '09012023045912-12-room.jpg', NULL, '2023-01-09 00:32:16', '2023-01-09 00:32:16'),
(94, 21, '09012023045855-900x700-8-room.jpg', '09012023045855-8-room.jpg', NULL, '2023-01-09 00:32:23', '2023-01-09 00:32:23'),
(95, 20, '09012023045859-900x700-9-room.jpg', '09012023045859-9-room.jpg', NULL, '2023-01-09 00:34:17', '2023-01-09 00:34:17'),
(96, 19, '09012023045935-900x700-18-room.jpg', '09012023045935-18-room.jpg', NULL, '2023-01-09 00:34:59', '2023-01-09 00:34:59'),
(97, 22, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-09 00:44:56', '2023-01-09 00:44:56'),
(98, 22, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-09 00:45:01', '2023-01-09 00:45:01'),
(99, 22, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-09 00:45:06', '2023-01-09 00:45:06'),
(100, 22, '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', NULL, '2023-01-09 00:45:10', '2023-01-09 00:45:10'),
(101, 22, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-09 00:45:17', '2023-01-09 00:45:17'),
(102, 22, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-09 00:45:24', '2023-01-09 00:45:24'),
(103, 22, '06012023135205-900x700-about-4.jpg', '06012023135205-about-4.jpg', NULL, '2023-01-09 00:45:33', '2023-01-09 00:45:33'),
(104, 22, '09012023045939-900x700-19-room.jpg', '09012023045939-19-room.jpg', NULL, '2023-01-09 00:45:50', '2023-01-09 00:45:50'),
(106, 23, '06012023135205-900x700-about-4.jpg', '06012023135205-about-4.jpg', NULL, '2023-01-09 00:57:59', '2023-01-09 00:57:59'),
(107, 23, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-09 00:58:06', '2023-01-09 00:58:06'),
(108, 23, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-09 00:58:11', '2023-01-09 00:58:11'),
(109, 23, '06012023120600-900x700-4-room.jpg', '06012023120600-4-room.jpg', NULL, '2023-01-09 00:58:16', '2023-01-09 00:58:16'),
(110, 23, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-09 00:58:23', '2023-01-09 00:58:23'),
(111, 23, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-09 00:58:28', '2023-01-09 00:58:28'),
(112, 23, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-09 00:58:33', '2023-01-09 00:58:33'),
(113, 23, '09012023045855-900x700-8-room.jpg', '09012023045855-8-room.jpg', NULL, '2023-01-09 00:58:45', '2023-01-09 00:58:45'),
(114, 24, '09012023045943-900x700-20-room.jpg', '09012023045943-20-room.jpg', NULL, '2023-01-09 02:01:21', '2023-01-09 02:01:21'),
(115, 24, '09012023045939-900x700-19-room.jpg', '09012023045939-19-room.jpg', NULL, '2023-01-09 02:01:26', '2023-01-09 02:01:26'),
(116, 24, '09012023045935-900x700-18-room.jpg', '09012023045935-18-room.jpg', NULL, '2023-01-09 02:01:31', '2023-01-09 02:01:31'),
(117, 24, '09012023045931-900x700-17-room.jpg', '09012023045931-17-room.jpg', NULL, '2023-01-09 02:01:44', '2023-01-09 02:01:44'),
(119, 24, '09012023045855-900x700-8-room.jpg', '09012023045855-8-room.jpg', NULL, '2023-01-09 02:02:10', '2023-01-09 02:02:10'),
(120, 24, '09012023045916-900x700-13-room.jpg', '09012023045916-13-room.jpg', NULL, '2023-01-09 02:02:26', '2023-01-09 02:02:26'),
(121, 25, '06012023120606-900x700-6-room.jpg', '06012023120606-6-room.jpg', NULL, '2023-01-09 02:24:54', '2023-01-09 02:24:54'),
(122, 25, '06012023135205-900x700-about-4.jpg', '06012023135205-about-4.jpg', NULL, '2023-01-09 02:25:01', '2023-01-09 02:25:01'),
(123, 25, '06012023120603-900x700-5-room.jpg', '06012023120603-5-room.jpg', NULL, '2023-01-09 02:25:07', '2023-01-09 02:25:07'),
(124, 25, '06012023120550-900x700-1-room.jpg', '06012023120550-1-room.jpg', NULL, '2023-01-09 02:25:12', '2023-01-09 02:25:12'),
(125, 25, '06012023120557-900x700-3-room.jpg', '06012023120557-3-room.jpg', NULL, '2023-01-09 02:25:18', '2023-01-09 02:25:18'),
(126, 25, '09012023045928-900x700-16-room.jpg', '09012023045928-16-room.jpg', NULL, '2023-01-09 02:25:28', '2023-01-09 02:25:28'),
(234, 43, '10012023084507-900x700-Rectangle 5.jpg', '10012023084507-Rectangle 5.jpg', NULL, '2023-01-10 03:41:44', '2023-01-10 03:41:44'),
(235, 43, '10012023084422-900x700-Rectangle 3-5.jpg', '10012023084422-Rectangle 3-5.jpg', NULL, '2023-01-10 03:41:49', '2023-01-10 03:41:49'),
(236, 43, '10012023044320-900x700-Rectangle 2-5.jpg', '10012023044320-Rectangle 2-5.jpg', NULL, '2023-01-10 03:41:54', '2023-01-10 03:41:54'),
(237, 43, '10012023084447-900x700-Rectangle 4-2.jpg', '10012023084447-Rectangle 4-2.jpg', NULL, '2023-01-10 03:42:00', '2023-01-10 03:42:00'),
(238, 43, '10012023044330-900x700-Rectangle 3-1.jpg', '10012023044330-Rectangle 3-1.jpg', NULL, '2023-01-10 03:42:05', '2023-01-10 03:42:05'),
(239, 43, '10012023044246-900x700-Rectangle 1-5.jpg', '10012023044246-Rectangle 1-5.jpg', NULL, '2023-01-10 03:42:11', '2023-01-10 03:42:11'),
(240, 43, '10012023084409-900x700-Rectangle 3-2.jpg', '10012023084409-Rectangle 3-2.jpg', NULL, '2023-01-10 03:42:16', '2023-01-10 03:42:16'),
(241, 43, '10012023044300-900x700-Rectangle 2-1.jpg', '10012023044300-Rectangle 2-1.jpg', NULL, '2023-01-10 03:42:23', '2023-01-10 03:42:23'),
(256, 1, '09012023045851-900x700-7-room.jpg', '09012023045851-7-room.jpg', NULL, '2023-01-21 09:10:22', '2023-01-21 09:10:22'),
(257, 16, '10012023084440-900x700-Rectangle 4.jpg', '10012023084440-Rectangle 4.jpg', NULL, '2023-01-21 09:18:23', '2023-01-21 09:18:23'),
(258, 16, '10012023084413-900x700-Rectangle 3-3.jpg', '10012023084413-Rectangle 3-3.jpg', NULL, '2023-01-21 09:18:28', '2023-01-21 09:18:28'),
(259, 16, '10012023044320-900x700-Rectangle 2-5.jpg', '10012023044320-Rectangle 2-5.jpg', NULL, '2023-01-21 09:18:32', '2023-01-21 09:18:32'),
(260, 16, '10012023044315-900x700-Rectangle 2-4.jpg', '10012023044315-Rectangle 2-4.jpg', NULL, '2023-01-21 09:18:36', '2023-01-21 09:18:36'),
(261, 16, '10012023044256-900x700-Rectangle 2.jpg', '10012023044256-Rectangle 2.jpg', NULL, '2023-01-21 09:18:41', '2023-01-21 09:18:41'),
(262, 16, '10012023044241-900x700-Rectangle 1-4.jpg', '10012023044241-Rectangle 1-4.jpg', NULL, '2023-01-21 09:18:45', '2023-01-21 09:18:45'),
(263, 16, '09012023045851-900x700-7-room.jpg', '09012023045851-7-room.jpg', NULL, '2023-01-21 09:18:53', '2023-01-21 09:18:53'),
(264, 16, '09012023045928-900x700-16-room.jpg', '09012023045928-16-room.jpg', NULL, '2023-01-21 09:18:59', '2023-01-21 09:18:59'),
(265, 16, '06012023120553-900x700-2-room.jpg', '06012023120553-2-room.jpg', NULL, '2023-01-21 09:19:18', '2023-01-21 09:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `room_manages`
--

CREATE TABLE `room_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roomtype_id` int(11) DEFAULT NULL,
  `room_no` varchar(191) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `out_date` date DEFAULT NULL,
  `book_status` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_manages`
--

INSERT INTO `room_manages` (`id`, `roomtype_id`, `room_no`, `in_date`, `out_date`, `book_status`, `is_publish`, `created_at`, `updated_at`) VALUES
(21, 43, '101', NULL, NULL, 2, 1, '2023-01-21 07:14:07', '2023-02-27 07:37:27'),
(22, 43, '102', NULL, NULL, 2, 1, '2023-01-21 07:14:11', '2023-02-27 07:37:27'),
(23, 43, '103', NULL, NULL, 2, 1, '2023-01-21 07:14:21', '2023-02-27 07:37:27'),
(24, 43, '104', NULL, NULL, 2, 1, '2023-01-21 07:14:24', '2023-02-17 10:01:58'),
(25, 43, '105', NULL, NULL, 2, 1, '2023-01-21 07:14:31', '2023-02-17 10:01:58'),
(26, 43, '106', NULL, NULL, 2, 1, '2023-01-21 07:14:36', '2023-02-17 10:01:58'),
(27, 43, '107', NULL, NULL, 2, 1, '2023-01-21 07:14:42', '2023-02-17 10:01:58'),
(28, 43, '108', NULL, NULL, 2, 1, '2023-01-21 07:14:46', '2023-01-21 07:14:46'),
(29, 43, '109', NULL, NULL, 2, 1, '2023-01-21 07:14:50', '2023-01-21 07:14:50'),
(30, 43, '110', NULL, NULL, 2, 1, '2023-01-21 07:14:54', '2023-01-21 07:14:54'),
(35, 1, '100', NULL, NULL, 2, 1, '2023-01-21 09:09:06', '2023-02-27 09:39:11'),
(36, 1, '101', NULL, NULL, 2, 1, '2023-01-21 09:09:12', '2023-02-27 09:39:09'),
(37, 1, '102', NULL, NULL, 2, 1, '2023-01-21 09:09:17', '2023-02-17 10:01:54'),
(38, 1, '103', NULL, NULL, 2, 1, '2023-01-21 09:09:21', '2023-02-16 08:45:20'),
(39, 1, '104', NULL, NULL, 2, 1, '2023-01-21 09:09:25', '2023-02-16 08:45:20'),
(40, 1, '105', NULL, NULL, 2, 1, '2023-01-21 09:09:40', '2023-02-16 08:45:20'),
(41, 1, '106', NULL, NULL, 2, 1, '2023-01-21 09:09:48', '2023-02-13 06:51:01'),
(42, 1, '107', NULL, NULL, 2, 1, '2023-01-21 09:09:56', '2023-01-21 09:09:56'),
(43, 1, '108', NULL, NULL, 2, 1, '2023-01-21 09:10:10', '2023-02-13 06:51:01'),
(44, 10, '100', NULL, NULL, 2, 1, '2023-01-21 09:11:12', '2023-02-11 04:21:46'),
(45, 10, '101', NULL, NULL, 2, 1, '2023-01-21 09:11:16', '2023-02-27 07:37:32'),
(46, 10, '102', NULL, NULL, 2, 1, '2023-01-21 09:11:20', '2023-02-11 04:21:46'),
(47, 10, '103', NULL, NULL, 2, 1, '2023-01-21 09:11:25', '2023-02-27 07:37:27'),
(48, 10, '104', NULL, NULL, 2, 1, '2023-01-21 09:11:28', '2023-01-21 09:11:28'),
(49, 10, '105', NULL, NULL, 2, 1, '2023-01-21 09:11:33', '2023-01-21 09:11:33'),
(50, 11, '100', NULL, NULL, 2, 1, '2023-01-21 09:12:32', '2023-02-27 07:37:32'),
(51, 11, '101', NULL, NULL, 2, 1, '2023-01-21 09:12:36', '2023-02-27 07:37:32'),
(52, 11, '102', NULL, NULL, 2, 1, '2023-01-21 09:12:39', '2023-02-17 11:17:19'),
(53, 11, '103', NULL, NULL, 2, 1, '2023-01-21 09:12:42', '2023-02-17 11:17:18'),
(54, 11, '104', NULL, NULL, 2, 1, '2023-01-21 09:12:47', '2023-02-27 07:37:27'),
(55, 11, '105', NULL, NULL, 2, 1, '2023-01-21 09:12:51', '2023-02-27 07:37:27'),
(56, 11, '106', NULL, NULL, 2, 1, '2023-01-21 09:12:56', '2023-01-21 09:12:56'),
(57, 12, '100', NULL, NULL, 2, 1, '2023-01-21 09:13:34', '2023-02-27 07:37:32'),
(58, 12, '101', NULL, NULL, 2, 1, '2023-01-21 09:13:37', '2023-02-27 07:37:32'),
(59, 12, '102', NULL, NULL, 2, 1, '2023-01-21 09:13:40', '2023-02-27 07:37:27'),
(60, 12, '103', NULL, NULL, 2, 1, '2023-01-21 09:13:43', '2023-02-27 07:37:27'),
(61, 12, '104', NULL, NULL, 2, 1, '2023-01-21 09:13:46', '2023-02-27 07:37:27'),
(62, 12, '105', NULL, NULL, 2, 1, '2023-01-21 09:13:49', '2023-02-27 07:37:27'),
(63, 12, '106', NULL, NULL, 2, 1, '2023-01-21 09:13:53', '2023-02-27 07:37:27'),
(64, 12, '107', NULL, NULL, 2, 1, '2023-01-21 09:13:58', '2023-02-27 07:37:27'),
(65, 13, '100', NULL, NULL, 2, 1, '2023-01-21 09:14:37', '2023-02-27 07:37:32'),
(66, 13, '101', NULL, NULL, 2, 1, '2023-01-21 09:14:41', '2023-02-27 07:37:32'),
(67, 13, '102', NULL, NULL, 2, 1, '2023-01-21 09:14:46', '2023-02-17 11:25:04'),
(68, 13, '103', NULL, NULL, 2, 1, '2023-01-21 09:14:50', '2023-01-21 09:14:50'),
(69, 13, '104', NULL, NULL, 2, 1, '2023-01-21 09:14:53', '2023-01-21 09:14:53'),
(70, 13, '105', NULL, NULL, 2, 1, '2023-01-21 09:14:57', '2023-01-21 09:14:57'),
(71, 13, '106', NULL, NULL, 2, 1, '2023-01-21 09:15:01', '2023-01-21 09:15:01'),
(72, 14, '100', NULL, NULL, 2, 1, '2023-01-21 09:15:38', '2023-01-21 09:15:38'),
(73, 14, '101', NULL, NULL, 2, 1, '2023-01-21 09:15:41', '2023-01-21 09:15:41'),
(74, 14, '102', NULL, NULL, 2, 1, '2023-01-21 09:15:44', '2023-01-21 09:15:44'),
(75, 14, '103', NULL, NULL, 2, 1, '2023-01-21 09:15:47', '2023-01-21 09:15:47'),
(76, 14, '104', NULL, NULL, 2, 1, '2023-01-21 09:15:50', '2023-01-21 09:15:50'),
(77, 14, '105', NULL, NULL, 2, 1, '2023-01-21 09:15:54', '2023-01-21 09:15:54'),
(78, 14, '106', NULL, NULL, 2, 1, '2023-01-21 09:15:58', '2023-01-21 09:15:58'),
(79, 14, '107', NULL, NULL, 2, 1, '2023-01-21 09:16:04', '2023-01-21 09:16:04'),
(80, 15, '100', NULL, NULL, 2, 1, '2023-01-21 09:16:47', '2023-02-27 07:37:32'),
(81, 15, '101', NULL, NULL, 2, 1, '2023-01-21 09:16:50', '2023-02-27 07:37:32'),
(82, 15, '102', NULL, NULL, 2, 1, '2023-01-21 09:16:53', '2023-02-27 07:37:27'),
(83, 15, '103', NULL, NULL, 2, 1, '2023-01-21 09:16:57', '2023-02-27 07:37:27'),
(84, 15, '104', NULL, NULL, 2, 1, '2023-01-21 09:17:00', '2023-02-27 07:37:27'),
(85, 15, '105', NULL, NULL, 2, 1, '2023-01-21 09:17:04', '2023-01-21 09:17:04'),
(86, 15, '106', NULL, NULL, 2, 1, '2023-01-21 09:17:08', '2023-02-11 01:17:05'),
(87, 16, '100', NULL, NULL, 2, 1, '2023-01-21 09:17:43', '2023-02-27 07:37:32'),
(88, 16, '101', NULL, NULL, 2, 1, '2023-01-21 09:17:45', '2023-02-27 07:37:32'),
(89, 16, '102', NULL, NULL, 2, 1, '2023-01-21 09:17:48', '2023-02-27 07:37:32'),
(90, 16, '103', NULL, NULL, 2, 1, '2023-01-21 09:17:52', '2023-02-27 07:37:32'),
(91, 16, '104', NULL, NULL, 2, 1, '2023-01-21 09:17:56', '2023-02-27 07:37:32'),
(92, 16, '105', NULL, NULL, 2, 1, '2023-01-21 09:18:00', '2023-01-21 09:18:00'),
(93, 16, '106', NULL, NULL, 2, 1, '2023-01-21 09:18:03', '2023-01-21 09:18:03'),
(94, 16, '107', NULL, NULL, 2, 1, '2023-01-21 09:18:06', '2023-01-21 09:18:06'),
(95, 17, '100', NULL, NULL, 2, 1, '2023-01-21 09:19:54', '2023-02-27 07:37:32'),
(96, 17, '101', NULL, NULL, 2, 1, '2023-01-21 09:19:57', '2023-02-27 07:37:32'),
(97, 17, '102', NULL, NULL, 2, 1, '2023-01-21 09:20:00', '2023-02-27 07:37:27'),
(98, 17, '103', NULL, NULL, 2, 1, '2023-01-21 09:20:03', '2023-02-27 07:37:27'),
(99, 17, '104', NULL, NULL, 2, 1, '2023-01-21 09:20:06', '2023-02-27 07:37:27'),
(100, 17, '105', NULL, NULL, 2, 1, '2023-01-21 09:20:09', '2023-02-27 07:37:27'),
(101, 17, '106', NULL, NULL, 2, 1, '2023-01-21 09:20:13', '2023-01-21 09:20:13'),
(102, 17, '107', NULL, NULL, 2, 1, '2023-01-21 09:20:18', '2023-01-21 09:20:18'),
(103, 17, '108', NULL, NULL, 2, 1, '2023-01-21 09:20:23', '2023-01-21 09:20:23'),
(104, 18, '100', NULL, NULL, 2, 1, '2023-01-21 09:21:02', '2023-02-27 07:37:32'),
(105, 18, '101', NULL, NULL, 2, 1, '2023-01-21 09:21:06', '2023-02-27 07:37:32'),
(106, 18, '102', NULL, NULL, 2, 1, '2023-01-21 09:21:09', '2023-01-21 09:21:09'),
(107, 18, '103', NULL, NULL, 2, 1, '2023-01-21 09:21:12', '2023-01-21 09:21:12'),
(108, 18, '104', NULL, NULL, 2, 1, '2023-01-21 09:21:15', '2023-01-21 09:21:15'),
(109, 18, '105', NULL, NULL, 2, 1, '2023-01-21 09:21:19', '2023-01-21 09:21:19'),
(110, 18, '106', NULL, NULL, 2, 1, '2023-01-21 09:21:24', '2023-01-21 09:21:24'),
(111, 19, '100', NULL, NULL, 2, 1, '2023-01-21 09:22:07', '2023-02-27 07:37:32'),
(112, 19, '101', NULL, NULL, 2, 1, '2023-01-21 09:22:09', '2023-02-27 07:37:27'),
(113, 19, '102', NULL, NULL, 2, 1, '2023-01-21 09:22:13', '2023-02-27 07:37:32'),
(114, 19, '103', NULL, NULL, 2, 1, '2023-01-21 09:22:16', '2023-02-16 08:06:55'),
(115, 19, '104', NULL, NULL, 2, 1, '2023-01-21 09:22:20', '2023-02-16 08:06:55'),
(116, 19, '105', NULL, NULL, 2, 1, '2023-01-21 09:22:24', '2023-01-21 09:22:24'),
(117, 20, '100', NULL, NULL, 2, 1, '2023-01-21 09:23:04', '2023-02-06 08:47:14'),
(118, 20, '101', NULL, NULL, 2, 1, '2023-01-21 09:23:07', '2023-02-06 08:47:14'),
(119, 20, '102', NULL, NULL, 2, 1, '2023-01-21 09:23:10', '2023-02-06 08:47:14'),
(120, 20, '103', NULL, NULL, 2, 1, '2023-01-21 09:23:13', '2023-02-06 08:44:44'),
(121, 20, '104', NULL, NULL, 2, 1, '2023-01-21 09:23:17', '2023-02-06 08:47:14'),
(122, 20, '105', NULL, NULL, 2, 1, '2023-01-21 09:23:21', '2023-02-06 08:46:01'),
(123, 21, '100', NULL, NULL, 2, 1, '2023-01-21 09:23:59', '2023-02-27 07:37:27'),
(124, 21, '101', NULL, NULL, 2, 1, '2023-01-21 09:24:02', '2023-02-27 07:37:27'),
(125, 21, '102', NULL, NULL, 2, 1, '2023-01-21 09:24:05', '2023-02-27 07:37:27'),
(126, 21, '103', NULL, NULL, 2, 1, '2023-01-21 09:24:09', '2023-02-27 07:37:27'),
(127, 21, '104', NULL, NULL, 2, 1, '2023-01-21 09:24:22', '2023-02-27 07:37:27'),
(128, 21, '105', NULL, NULL, 2, 1, '2023-01-21 09:24:26', '2023-02-27 07:37:27'),
(129, 22, '100', NULL, NULL, 2, 1, '2023-01-21 09:25:19', '2023-02-15 10:22:01'),
(130, 22, '101', NULL, NULL, 2, 1, '2023-01-21 09:25:21', '2023-02-09 11:01:51'),
(131, 22, '102', NULL, NULL, 2, 1, '2023-01-21 09:25:28', '2023-02-15 10:22:01'),
(132, 22, '103', NULL, NULL, 2, 1, '2023-01-21 09:25:34', '2023-02-09 11:01:51'),
(133, 22, '104', NULL, NULL, 2, 1, '2023-01-21 09:25:41', '2023-02-06 11:23:45'),
(134, 22, '105', NULL, NULL, 2, 1, '2023-01-21 09:25:46', '2023-02-06 11:23:45'),
(135, 23, '100', NULL, NULL, 2, 1, '2023-01-21 09:26:49', '2023-02-27 07:37:27'),
(136, 23, '101', NULL, NULL, 2, 1, '2023-01-21 09:26:52', '2023-02-27 07:37:27'),
(137, 23, '102', NULL, NULL, 2, 1, '2023-01-21 09:26:56', '2023-01-21 09:26:56'),
(138, 23, '103', NULL, NULL, 2, 1, '2023-01-21 09:26:59', '2023-01-21 09:26:59'),
(139, 23, '104', NULL, NULL, 2, 1, '2023-01-21 09:27:03', '2023-01-21 09:27:03'),
(140, 23, '105', NULL, NULL, 2, 1, '2023-01-21 09:27:06', '2023-01-21 09:27:06'),
(141, 23, '106', NULL, NULL, 2, 1, '2023-01-21 09:27:10', '2023-01-21 09:27:10'),
(142, 24, '100', NULL, NULL, 2, 1, '2023-01-21 09:27:53', '2023-02-27 07:37:27'),
(143, 24, '101', NULL, NULL, 2, 1, '2023-01-21 09:27:56', '2023-02-27 07:37:27'),
(144, 24, '102', NULL, NULL, 2, 1, '2023-01-21 09:28:00', '2023-02-27 07:37:27'),
(145, 24, '103', NULL, NULL, 2, 1, '2023-01-21 09:28:03', '2023-02-08 09:45:51'),
(146, 24, '104', NULL, NULL, 2, 1, '2023-01-21 09:28:08', '2023-02-08 09:45:51'),
(147, 24, '105', NULL, NULL, 2, 1, '2023-01-21 09:28:11', '2023-02-08 09:45:51'),
(148, 25, '100', NULL, NULL, 2, 1, '2023-01-21 09:28:57', '2023-02-27 07:37:27'),
(149, 25, '101', NULL, NULL, 2, 1, '2023-01-21 09:29:00', '2023-02-27 07:37:27'),
(150, 25, '102', NULL, NULL, 2, 1, '2023-01-21 09:29:02', '2023-01-21 09:29:02'),
(151, 25, '103', NULL, NULL, 2, 1, '2023-01-21 09:29:06', '2023-01-21 09:29:06'),
(152, 25, '104', NULL, NULL, 2, 1, '2023-01-21 09:29:09', '2023-01-21 09:29:09'),
(153, 25, '105', NULL, NULL, 2, 1, '2023-01-21 09:29:13', '2023-01-21 09:29:13'),
(154, 43, '111', NULL, NULL, 2, 1, '2023-01-27 08:27:48', '2023-01-27 08:27:48'),
(161, 21, '106', NULL, NULL, 2, 1, '2023-02-16 09:07:50', '2023-02-16 09:07:50'),
(162, 21, '107', NULL, NULL, 2, 1, '2023-02-16 09:07:58', '2023-02-16 09:07:58'),
(163, 21, '108', NULL, NULL, 2, 1, '2023-02-16 09:08:03', '2023-02-16 09:08:03'),
(164, 12, '108', NULL, NULL, 2, 1, '2023-02-16 09:08:44', '2023-02-16 09:08:44'),
(165, 12, '109', NULL, NULL, 2, 1, '2023-02-16 09:08:48', '2023-02-16 09:08:48'),
(166, 12, '110', NULL, NULL, 2, 1, '2023-02-16 09:08:52', '2023-02-16 09:08:52'),
(167, 12, '111', NULL, NULL, 2, 1, '2023-02-16 09:08:58', '2023-02-16 09:08:58'),
(168, 12, '112', NULL, NULL, 2, 1, '2023-02-16 09:09:04', '2023-02-16 09:09:04'),
(169, 15, '107', NULL, NULL, 2, 1, '2023-02-16 09:09:31', '2023-02-16 09:09:31'),
(170, 15, '108', NULL, NULL, 2, 1, '2023-02-16 09:09:35', '2023-02-16 09:09:35'),
(171, 16, '108', NULL, NULL, 2, 1, '2023-02-16 09:09:58', '2023-02-16 09:09:58'),
(172, 16, '109', NULL, NULL, 2, 1, '2023-02-16 09:10:01', '2023-02-16 09:10:01'),
(173, 16, '110', NULL, NULL, 2, 1, '2023-02-16 09:10:05', '2023-02-16 09:10:05'),
(174, 17, '109', NULL, NULL, 2, 1, '2023-02-16 09:10:26', '2023-02-16 09:10:26'),
(175, 17, '110', NULL, NULL, 2, 1, '2023-02-16 09:10:30', '2023-02-16 09:10:30'),
(176, 17, '111', NULL, NULL, 2, 1, '2023-02-16 09:10:33', '2023-02-16 09:10:33'),
(177, 11, '107', NULL, NULL, 2, 1, '2023-02-16 09:11:13', '2023-02-16 09:11:13'),
(178, 11, '108', NULL, NULL, 2, 1, '2023-02-16 09:11:17', '2023-02-16 09:11:17'),
(179, 11, '109', NULL, NULL, 2, 1, '2023-02-16 09:11:22', '2023-02-16 09:11:22'),
(180, 11, '110', NULL, NULL, 2, 1, '2023-02-16 09:11:26', '2023-02-16 09:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `section_contents`
--

CREATE TABLE `section_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_type` varchar(191) DEFAULT NULL,
  `page_type` varchar(191) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_contents`
--

INSERT INTO `section_contents` (`id`, `section_type`, `page_type`, `url`, `image`, `title`, `desc`, `is_publish`, `created_at`, `updated_at`) VALUES
(4, 'about_us', 'home_1', '#', '10012023044246-Rectangle 1-5.jpg', 'Welcome to Relaxly Modern Hotel Rooms and Services', '{\"description\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"total_rooms\":\"500\",\"total_customers\":\"1200\",\"total_amenities\":\"120\",\"total_packages\":\"320\",\"button_text\":\"More About Us\",\"target\":\"_self\",\"image2\":\"10012023044326-Rectangle 3.jpg\",\"image3\":\"10012023044300-Rectangle 2-1.jpg\",\"year\":null,\"tp_name\":null,\"position\":null}', 1, '2023-01-05 12:20:12', '2023-02-27 09:41:12'),
(17, 'our_services', NULL, NULL, '06012023175149-service_6.png', 'Gym', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2023-01-06 11:51:57', '2023-01-06 12:07:14'),
(18, 'our_services', NULL, NULL, '06012023175228-service_5.png', 'Breakfast', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2023-01-06 11:52:34', '2023-01-06 12:07:14'),
(19, 'our_services', NULL, NULL, '06012023175255-service_4.png', 'Swimming Pool', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2023-01-06 11:52:58', '2023-01-06 12:07:14'),
(20, 'our_services', NULL, NULL, '06012023175320-service_3.png', 'Quality Rooms', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2023-01-06 11:53:24', '2023-01-06 12:07:14'),
(21, 'our_services', NULL, NULL, '06012023175344-service_2.png', 'Parking Space', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2023-01-06 11:53:48', '2023-01-06 12:07:14'),
(22, 'our_services', NULL, NULL, '06012023175409-service_1.png', 'Pick Up & Drop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2023-01-06 11:54:13', '2023-01-06 12:07:14'),
(26, 'testimonial', NULL, NULL, '07012023065428-100x100-1-client.jpg', 'Michael', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-07 00:57:01', '2023-01-07 01:16:20'),
(27, 'testimonial', NULL, NULL, '07012023065729-100x100-3-client.jpg', 'James', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-07 00:57:33', '2023-01-07 01:16:20'),
(28, 'testimonial', NULL, NULL, '07012023065821-100x100-4-client.jpg', 'Robert', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-07 00:58:24', '2023-01-07 01:16:20'),
(29, 'testimonial', NULL, NULL, '07012023065955-100x100-2-client.jpg', 'Nancy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-07 00:59:59', '2023-01-07 01:16:20'),
(30, 'testimonial', NULL, NULL, '07012023070147-100x100-5-client.jpg', 'John', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-07 01:01:51', '2023-01-07 01:16:20'),
(31, 'testimonial', NULL, NULL, '07012023070816-100x100-6-client.jpg', 'Sarah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-07 01:08:22', '2023-02-27 09:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `section_manages`
--

CREATE TABLE `section_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manage_type` varchar(191) DEFAULT NULL,
  `section` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_manages`
--

INSERT INTO `section_manages` (`id`, `manage_type`, `section`, `title`, `url`, `image`, `desc`, `is_publish`, `created_at`, `updated_at`) VALUES
(374, 'home_1', 'slider_hero', 'Hero Section', NULL, NULL, NULL, 1, '2023-01-13 06:44:13', '2023-01-13 07:16:43'),
(376, 'home_1', 'about_us', 'About Us', NULL, NULL, NULL, 1, '2023-01-13 06:52:00', '2023-01-13 07:16:43'),
(377, 'home_1', 'offer_ads', 'Choose your offer', NULL, NULL, 'One More Offer For You!', 1, '2023-01-13 06:54:13', '2023-01-13 07:16:43'),
(378, 'home_1', 'featured_rooms', 'Featured Rooms', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-13 06:58:30', '2023-01-13 07:16:43'),
(379, 'home_1', 'our_services', 'Our Hotel Services', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-13 07:04:30', '2023-01-13 07:16:43'),
(380, 'home_1', 'testimonial', 'What Our Clients Says', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-13 07:10:15', '2023-01-13 07:16:43'),
(381, 'home_1', 'our_blogs', 'Latest Blog & News', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2023-01-13 07:13:30', '2023-01-13 07:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) NOT NULL,
  `instance` varchar(191) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_type` varchar(191) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_type`, `url`, `image`, `title`, `desc`, `is_publish`, `created_at`, `updated_at`) VALUES
(29, 'home_1', '#', '04012023155330-home1_bg.jpg', 'Enjoy Your Beautiful Moment', '{\"sub_title\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"button_text\":\"Booking Now\",\"target\":null}', 1, '2023-01-04 09:54:14', '2023-02-27 09:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `social_icon` varchar(120) DEFAULT NULL,
  `target` varchar(100) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `title`, `url`, `social_icon`, `target`, `is_publish`, `created_at`, `updated_at`) VALUES
(2, 'Facebook', 'https://www.facebook.com/', 'bi bi-facebook', '_blank', 1, '2021-07-12 09:24:54', '2021-07-12 09:49:25'),
(3, 'Twitter', 'https://twitter.com/', 'bi bi-twitter', '_blank', 1, '2021-07-12 09:37:32', '2021-07-12 09:49:25'),
(4, 'Instagram', 'https://www.instagram.com/', 'bi bi-instagram', '_blank', 1, '2021-09-07 10:40:20', '2022-07-22 06:44:00'),
(5, 'Youtube', 'https://www.youtube.com/', 'bi bi-youtube', '_blank', 1, '2021-11-06 10:54:01', '2022-07-22 06:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_address` varchar(191) DEFAULT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email_address`, `first_name`, `last_name`, `address`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 'selimrana@gmail.com', 'Selim Rana', 'Selim Rana', NULL, NULL, 'subscribed', '2021-12-09 12:09:30', '2021-12-09 12:09:30'),
(3, 'aieub_ali@gmail.com', 'AIEUB ALI', 'AIEUB ALI', NULL, NULL, 'subscribed', '2022-01-18 07:51:47', '2022-01-18 07:51:47'),
(4, 'salmaakter@gmail.com', 'SALMA AKTER', 'SALMA AKTER', NULL, NULL, 'subscribed', '2022-01-18 07:56:58', '2022-01-18 07:56:58'),
(5, 'fuadhasan@email.com', 'Fuad Hasan', 'Fuad Hasan', NULL, NULL, 'subscribed', '2022-01-20 09:09:41', '2022-01-20 09:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `percentage` double(12,3) NOT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `title`, `percentage`, `is_publish`, `created_at`, `updated_at`) VALUES
(38, 'VAT', 5.000, 1, '2021-09-14 11:19:52', '2023-02-27 09:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `timezone_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`id`, `timezone`, `timezone_name`, `created_at`, `updated_at`) VALUES
(1, 'Pacific/Midway', 'Midway Island, Samoa', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(2, 'Pacific/Pago_Pago', 'Pago Pago', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(3, 'Pacific/Honolulu', 'Hawaii', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(4, 'America/Anchorage', 'Alaska', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(5, 'America/Vancouver', 'Vancouver', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(6, 'America/Los_Angeles', 'Pacific Time (US and Canada)', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(7, 'America/Tijuana', 'Tijuana', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(8, 'America/Edmonton', 'Edmonton', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(9, 'America/Denver', 'Mountain Time (US and Canada)', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(10, 'America/Phoenix', 'Arizona', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(11, 'America/Mazatlan', 'Mazatlan', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(12, 'America/Winnipeg', 'Winnipeg', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(13, 'America/Regina', 'Saskatchewan', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(14, 'America/Chicago', 'Central Time (US and Canada)', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(15, 'America/Mexico_City', 'Mexico City', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(16, 'America/Guatemala', 'Guatemala', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(17, 'America/El_Salvador', 'El Salvador', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(18, 'America/Managua', 'Managua', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(19, 'America/Costa_Rica', 'Costa Rica', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(20, 'America/Montreal', 'Montreal', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(21, 'America/New_York', 'Eastern Time (US and Canada)', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(22, 'America/Indianapolis', 'Indiana (East)', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(23, 'America/Panama', 'Panama', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(24, 'America/Bogota', 'Bogota', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(25, 'America/Lima', 'Lima', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(26, 'America/Halifax', 'Halifax', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(27, 'America/Puerto_Rico', 'Puerto Rico', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(28, 'America/Caracas', 'Caracas', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(29, 'America/Santiago', 'Santiago', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(30, 'America/St_Johns', 'Newfoundland and Labrador', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(31, 'America/Montevideo', 'Montevideo', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(32, 'America/Araguaina', 'Brasilia', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(33, 'America/Argentina/Buenos_Aires', 'Buenos Aires, Georgetown', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(34, 'America/Godthab', 'Greenland', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(35, 'America/Sao_Paulo', 'Sao Paulo', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(36, 'Atlantic/Azores', 'Azores', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(37, 'Canada/Atlantic', 'Atlantic Time (Canada)', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(38, 'Atlantic/Cape_Verde', 'Cape Verde Islands', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(39, 'UTC', 'Universal Time UTC', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(40, 'Etc/Greenwich', 'Greenwich Mean Time', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(41, 'Europe/Belgrade', 'Belgrade, Bratislava, Ljubljana', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(42, 'CET', 'Sarajevo, Skopje, Zagreb', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(43, 'Atlantic/Reykjavik', 'Reykjavik', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(44, 'Europe/Dublin', 'Dublin', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(45, 'Europe/London', 'London', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(46, 'Europe/Lisbon', 'Lisbon', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(47, 'Africa/Casablanca', 'Casablanca', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(48, 'Africa/Nouakchott', 'Nouakchott', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(49, 'Europe/Oslo', 'Oslo', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(50, 'Europe/Copenhagen', 'Copenhagen', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(51, 'Europe/Brussels', 'Brussels', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(52, 'Europe/Berlin', 'Amsterdam, Berlin, Rome, Stockholm, Vienna', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(53, 'Europe/Helsinki', 'Helsinki', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(54, 'Europe/Amsterdam', 'Amsterdam', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(55, 'Europe/Rome', 'Rome', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(56, 'Europe/Stockholm', 'Stockholm', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(57, 'Europe/Vienna', 'Vienna', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(58, 'Europe/Luxembourg', 'Luxembourg', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(59, 'Europe/Paris', 'Paris', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(60, 'Europe/Zurich', 'Zurich', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(61, 'Europe/Madrid', 'Madrid', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(62, 'Africa/Bangui', 'West Central Africa', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(63, 'Africa/Algiers', 'Algiers', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(64, 'Africa/Tunis', 'Tunis', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(65, 'Africa/Harare', 'Harare, Pretoria', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(66, 'Africa/Nairobi', 'Nairobi', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(67, 'Europe/Warsaw', 'Warsaw', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(68, 'Europe/Prague', 'Prague Bratislava', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(69, 'Europe/Budapest', 'Budapest', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(70, 'Europe/Sofia', 'Sofia', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(71, 'Europe/Istanbul', 'Istanbul', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(72, 'Europe/Athens', 'Athens', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(73, 'Europe/Bucharest', 'Bucharest', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(74, 'Asia/Nicosia', 'Nicosia', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(75, 'Asia/Beirut', 'Beirut', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(76, 'Asia/Damascus', 'Damascus', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(77, 'Asia/Jerusalem', 'Jerusalem', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(78, 'Asia/Amman', 'Amman', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(79, 'Africa/Tripoli', 'Tripoli', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(80, 'Africa/Cairo', 'Cairo', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(81, 'Africa/Johannesburg', 'Johannesburg', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(82, 'Europe/Moscow', 'Moscow', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(83, 'Asia/Baghdad', 'Baghdad', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(84, 'Asia/Kuwait', 'Kuwait', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(85, 'Asia/Riyadh', 'Riyadh', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(86, 'Asia/Bahrain', 'Bahrain', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(87, 'Asia/Qatar', 'Qatar', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(88, 'Asia/Aden', 'Aden', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(89, 'Asia/Tehran', 'Tehran', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(90, 'Africa/Khartoum', 'Khartoum', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(91, 'Africa/Djibouti', 'Djibouti', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(92, 'Africa/Mogadishu', 'Mogadishu', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(93, 'Asia/Dubai', 'Dubai', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(94, 'Asia/Muscat', 'Muscat', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(95, 'Asia/Baku', 'Baku, Tbilisi, Yerevan', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(96, 'Asia/Kabul', 'Kabul', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(97, 'Asia/Yekaterinburg', 'Yekaterinburg', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(98, 'Asia/Tashkent', 'Islamabad, Karachi, Tashkent', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(99, 'Asia/Calcutta', 'India', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(100, 'Asia/Kathmandu', 'Kathmandu', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(101, 'Asia/Novosibirsk', 'Novosibirsk', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(102, 'Asia/Almaty', 'Almaty', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(103, 'Asia/Dacca', 'Dacca', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(104, 'Asia/Krasnoyarsk', 'Krasnoyarsk', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(105, 'Asia/Dhaka', 'Astana, Dhaka', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(106, 'Asia/Bangkok', 'Bangkok', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(107, 'Asia/Saigon', 'Vietnam', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(108, 'Asia/Jakarta', 'Jakarta', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(109, 'Asia/Irkutsk', 'Irkutsk, Ulaanbaatar', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(110, 'Asia/Shanghai', 'Beijing, Shanghai', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(111, 'Asia/Hong_Kong', 'Hong Kong', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(112, 'Asia/Taipei', 'Taipei', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(113, 'Asia/Kuala_Lumpur', 'Kuala Lumpur', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(114, 'Asia/Singapore', 'Singapore', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(115, 'Australia/Perth', 'Perth', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(116, 'Asia/Yakutsk', 'Yakutsk', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(117, 'Asia/Seoul', 'Seoul', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(118, 'Asia/Tokyo', 'Osaka, Sapporo, Tokyo', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(119, 'Australia/Darwin', 'Darwin', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(120, 'Australia/Adelaide', 'Adelaide', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(121, 'Asia/Vladivostok', 'Vladivostok', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(122, 'Pacific/Port_Moresby', 'Guam, Port Moresby', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(123, 'Australia/Brisbane', 'Brisbane', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(124, 'Australia/Sydney', 'Canberra, Melbourne, Sydney', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(125, 'Australia/Hobart', 'Hobart', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(126, 'Asia/Magadan', 'Magadan', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(127, 'SST', 'Solomon Islands', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(128, 'Pacific/Noumea', 'New Caledonia', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(129, 'Asia/Kamchatka', 'Kamchatka', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(130, 'Pacific/Fiji', 'Fiji Islands, Marshall Islands', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(131, 'Pacific/Auckland', 'Auckland, Wellington', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(132, 'Asia/Kolkata', 'Mumbai, Kolkata, New Delhi', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(133, 'Europe/Kiev', 'Kiev', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(134, 'America/Tegucigalpa', 'Tegucigalpa', '2021-03-31 00:00:00', '2021-03-31 01:02:14'),
(135, 'Pacific/Apia', 'Independent State of Samoa', '2021-03-31 00:00:00', '2021-03-31 01:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `tp_options`
--

CREATE TABLE `tp_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) NOT NULL,
  `option_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tp_options`
--

INSERT INTO `tp_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(3, 'general_settings', '{\"company\":\"Relaxly\",\"email\":\"relaxly@gmail.com\",\"phone\":\"01215123456789\",\"site_name\":\"Relaxly\",\"site_title\":\"Unlimited Hotel Booking Platform\",\"address\":\"House # 2\\/C\\/3\\/A, Road # 1, Shyamoli, Dhaka, Bangladesh\",\"timezone\":\"Asia\\/Dhaka\"}', '2021-03-31 15:59:45', '2023-02-27 09:44:09'),
(5, 'google_recaptcha', '{\"sitekey\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"secretkey\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"is_recaptcha\":0}', '2021-03-31 17:56:01', '2023-02-18 01:48:34'),
(35, 'mail_settings', '{\"ismail\":0,\"from_name\":\"Relaxly\",\"from_mail\":\"admin@companyname.com\",\"to_name\":\"Theme Posh\",\"to_mail\":\"admin@gmail.com\",\"mailer\":\"smtp\",\"smtp_host\":\"mail.companyname.com\",\"smtp_port\":\"465\",\"smtp_security\":\"ssl\",\"smtp_username\":\"admin@companyname.com\",\"smtp_password\":\"xxxxxxxxxxxxxxxx\"}', '2021-06-03 19:33:17', '2023-02-27 09:44:17'),
(69, 'custom_css', NULL, '2021-06-06 23:18:38', '2021-11-26 04:38:46'),
(70, 'custom_js', NULL, '2021-06-06 23:46:24', '2021-11-26 04:37:19'),
(74, 'theme_option_seo', '{\"og_title\":\"Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa.\",\"og_image\":\"16022023173552-600x315-home-1.jpg\",\"og_description\":\"Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa.\",\"og_keywords\":\"Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa.\",\"is_publish\":\"1\"}', '2021-07-11 10:38:12', '2023-02-16 11:35:57'),
(77, 'theme_logo', '{\"favicon\":\"27122022155818-favicon.ico\",\"front_logo\":\"27122022160114-400x400-logo.png\",\"back_logo\":\"27122022160114-400x400-logo.png\"}', '2021-07-12 11:15:36', '2023-02-27 09:42:10'),
(78, 'facebook', '{\"fb_app_id\":null,\"is_publish\":\"2\"}', '2021-08-05 11:00:35', '2021-11-26 03:59:37'),
(79, 'twitter', '{\"twitter_id\":null,\"is_publish\":\"2\"}', '2021-08-05 11:10:01', '2021-11-26 03:57:18'),
(80, 'whatsapp', '{\"whatsapp_id\":\"0123456789\",\"whatsapp_text\":null,\"position\":\"left\",\"is_publish\":\"1\"}', '2021-08-05 11:25:20', '2023-02-27 09:42:53'),
(87, 'theme_option_header', '{\"address\":\"12 Poor Street, New York.\",\"phone\":\"+1 964 565 87652\",\"is_publish\":\"1\"}', '2021-08-29 08:45:26', '2022-06-24 00:38:20'),
(91, 'theme_option_footer', '{\"about_logo\":\"27122022160114-logo.png\",\"about_desc\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\",\"is_publish_about\":\"1\",\"address\":\"56 King Street, New York\",\"phone\":\"+1 964 123 456789\",\"email\":\"support@organis.com\",\"is_publish_contact\":\"1\",\"copyright\":\"Copyright &copy; 2023. All rights reserved by <a href=\\\"#\\\">Relaxly<\\/a>\",\"is_publish_copyright\":\"1\",\"payment_gateway_icon\":\"27122022160256-payment.png\",\"is_publish_payment\":\"1\"}', '2021-08-29 11:15:13', '2023-02-27 07:40:03'),
(93, 'home-video', '{\"title\":\"Our Hotel Preview Video\",\"short_desc\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"url\":\"#\",\"video_url\":\"https:\\/\\/www.youtube.com\\/watch?v=AlfXYaiAv68\",\"button_text\":\"Book Now\",\"target\":null,\"image\":\"07012023043902-preview.jpg\",\"is_publish\":\"1\"}', '2021-09-01 11:39:35', '2023-02-27 09:41:18'),
(94, 'facebook-pixel', '{\"fb_pixel_id\":null,\"is_publish\":\"2\"}', '2021-09-17 11:52:01', '2021-11-26 03:59:21'),
(95, 'google_analytics', '{\"tracking_id\":null,\"is_publish\":\"2\"}', '2021-09-18 08:11:08', '2023-02-27 09:42:47'),
(96, 'google_tag_manager', '{\"google_tag_manager_id\":null,\"is_publish\":\"2\"}', '2021-09-18 08:30:10', '2021-11-26 04:35:16'),
(98, 'cash_on_delivery', '{\"description\":\"Pay via cash on\",\"isenable\":1}', '2021-10-07 10:42:26', '2023-01-29 09:18:05'),
(99, 'bank_transfer', '{\"description\":\"Please send money to our bank account: A\\/C- 12365402547895487454.\",\"isenable\":1}', '2021-10-07 10:53:34', '2022-05-20 12:05:08'),
(100, 'stripe', '{\"stripe_key\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"stripe_secret\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"currency\":\"usd\",\"isenable\":0}', '2021-10-07 12:14:49', '2023-02-18 07:53:06'),
(101, 'mailchimp', '{\"mailchimp_api_key\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"audience_id\":\"0123645455455\",\"is_mailchimp\":0}', '2021-11-01 09:27:17', '2023-02-18 01:51:48'),
(102, 'subscribe_popup', '{\"subscribe_title\":\"Subscribe our newsletter\",\"subscribe_popup_desc\":\"Subscribe to the mailing list to receive updates on special offers, new arrivals and our promotions.\",\"bg_image_popup\":\"04012023155330-home1_bg.jpg\",\"background_image\":\"27122022160439-footer-top.jpg\",\"is_subscribe_popup\":1,\"is_subscribe_footer\":1}', '2021-11-01 10:00:58', '2023-02-18 06:05:23'),
(111, 'seller_settings', '{\"fee_withdrawal\":\"5\",\"product_auto_publish\":1,\"seller_auto_active\":1}', '2022-01-07 10:45:07', '2022-12-09 07:42:52'),
(112, 'language_switcher', '{\"is_language_switcher\":\"1\"}', '2022-01-22 10:22:15', '2023-02-18 05:59:42'),
(114, 'paypal', '{\"paypal_client_id\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"paypal_secret\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"paypal_currency\":\"USD\",\"ismode_paypal\":1,\"isenable_paypal\":0}', '2022-05-19 23:25:59', '2023-02-18 07:53:17'),
(116, 'razorpay', '{\"razorpay_key_id\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"razorpay_key_secret\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"razorpay_currency\":\"USD\",\"ismode_razorpay\":1,\"isenable_razorpay\":0}', '2022-05-20 00:28:45', '2023-02-18 07:53:32'),
(117, 'mollie', '{\"mollie_api_key\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"mollie_currency\":\"USD\",\"ismode_mollie\":1,\"isenable_mollie\":0}', '2022-05-20 07:50:45', '2023-02-18 07:53:43'),
(131, 'page_variation', '{\"home_variation\":\"home_1\"}', '2022-08-11 23:58:42', '2023-02-18 05:59:12'),
(133, 'google_map', '{\"googlemap_apikey\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"is_googlemap\":0}', '2022-08-27 10:17:37', '2023-02-18 02:05:28'),
(147, 'theme_color', '{\"theme_color\":\"#fd5056\",\"light_color\":\"#f9353d\",\"blue_color\":\"#2d1268\",\"gray_color\":\"#8d949d\",\"dark_gray_color\":\"#595959\",\"gray400_color\":\"#e7e7e7\",\"gray500_color\":\"#fbfbfb\",\"black_color\":\"#1f3347\",\"white_color\":\"#ffffff\",\"backend_theme_color\":\"#2d1268\"}', '2022-09-01 23:55:08', '2023-02-18 05:59:50'),
(160, 'cookie_consent', '{\"title\":\"Cookie Consent\",\"message\":\"This website uses cookies or similar technologies, to enhance your browsing experience and provide personalized recommendations. By continuing to use our website, you agree to our\",\"button_text\":\"Accept\",\"learn_more_url\":\"https:\\/\\/relaxly.themeposh.net\\/page\\/47\\/cookie-policy\",\"learn_more_text\":\"Privacy Policy\",\"style\":\"minimal\",\"position\":\"left\",\"is_publish\":\"1\"}', '2022-10-15 09:49:20', '2023-02-27 09:43:01'),
(169, 'currency', '{\"currency_name\":\"USD\",\"currency_icon\":\"$\",\"currency_position\":\"left\",\"thousands_separator\":\"comma\",\"decimal_separator\":\"point\",\"decimal_digit\":\"2\"}', '2021-08-21 04:22:13', '2023-02-27 09:40:43'),
(173, 'subheader_bg_images', '{\"blog_bg\":\"05012023064531-breadcrumb-bg-11.jpg\",\"contact_bg\":\"05012023064527-breadcrumb-bg-10.jpg\",\"register_bg\":\"05012023064524-breadcrumb-bg-9.jpg\",\"login_bg\":\"05012023064520-breadcrumb-bg-8.jpg\",\"reset_password_bg\":\"05012023064516-breadcrumb-bg-7.jpg\",\"dashboard_bg\":\"05012023064507-breadcrumb-bg-5.jpg\",\"profile_bg\":\"05012023064503-breadcrumb-bg-4.jpg\",\"change_password_bg\":\"05012023064459-breadcrumb-bg-3.jpg\",\"booking_bg\":\"05012023064453-breadcrumb-bg-2.jpg\"}', '2023-01-14 09:43:04', '2023-02-18 05:59:25'),
(190, 'vipc', '{\"bactive\":0,\"resetkey\":0}', '2023-03-05 10:14:50', '2023-03-05 10:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `tp_status`
--

CREATE TABLE `tp_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tp_status`
--

INSERT INTO `tp_status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Publish', '2021-05-01 04:46:48', '2021-05-01 04:46:50'),
(2, 'Draft', '2021-05-01 04:47:05', '2021-05-01 04:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `shop_name` varchar(200) DEFAULT NULL,
  `shop_url` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip_code` varchar(200) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bactive` varchar(200) DEFAULT NULL,
  `bkey` varchar(200) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `shop_name`, `shop_url`, `phone`, `address`, `city`, `state`, `zip_code`, `country_id`, `photo`, `bactive`, `bkey`, `status_id`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@themeposh.xyz', NULL, '$2y$10$ZYRpWfsE3YxDhgszerpr3.GGJXtOzn73ezzGL//K/xnktkCT06MNa', NULL, NULL, '0123456789', '56 King Street, New York', NULL, NULL, NULL, NULL, '27122022160205-400x400-photo.png', 'YWRtaW4xMjM0NTY=', NULL, 1, 1, 'cIUAkfFScFkDvjlThuQuE9EGZA89bZfber4wYUGJZzWPDGiCJ1kxL3Wq8vA0', '2021-03-26 13:22:14', '2023-01-14 06:10:04'),
(75, 'Receptionist', 'receptionist@themeposh.xyz', NULL, '$2y$10$7GhUTGybj33dRyCeTflxLOozs0.3QqRS718KIoFcQ77cjSdpYRmEO', NULL, NULL, '0123456789', '58 King Street, New York', NULL, NULL, NULL, NULL, '10012023044315-900x700-Rectangle 2-4.jpg', 'cmVjZXB0aW9uaXN0MTIzNDU2', NULL, 1, 3, NULL, '2023-02-09 21:41:55', '2023-02-27 09:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-04-01 21:57:16', '2021-04-01 21:57:19'),
(2, 'Customer', '2021-04-01 21:57:29', '2021-04-01 21:57:31'),
(3, 'Receptionist', '2021-12-07 16:36:42', '2021-12-07 16:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2021-04-01 21:57:57', '2021-04-01 21:57:59'),
(2, 'Inactive', '2021-04-01 21:58:10', '2021-04-01 21:58:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bedtypes`
--
ALTER TABLE `bedtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `booking_manages`
--
ALTER TABLE `booking_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `complements`
--
ALTER TABLE `complements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_code_unique` (`language_code`);

--
-- Indexes for table `lankeyvalues`
--
ALTER TABLE `lankeyvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_options`
--
ALTER TABLE `media_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_settings`
--
ALTER TABLE `media_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_settings_media_type_unique` (`media_type`);

--
-- Indexes for table `mega_menus`
--
ALTER TABLE `mega_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_menu_name_unique` (`menu_name`);

--
-- Indexes for table `menu_childs`
--
ALTER TABLE `menu_childs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_parents`
--
ALTER TABLE `menu_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_ads`
--
ALTER TABLE `offer_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_slug_unique` (`slug`);

--
-- Indexes for table `room_assigns`
--
ALTER TABLE `room_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_manages`
--
ALTER TABLE `room_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_contents`
--
ALTER TABLE `section_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_manages`
--
ALTER TABLE `section_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_address_unique` (`email_address`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_options`
--
ALTER TABLE `tp_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tp_options_option_name_unique` (`option_name`);

--
-- Indexes for table `tp_status`
--
ALTER TABLE `tp_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tp_status_status_unique` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bedtypes`
--
ALTER TABLE `bedtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking_manages`
--
ALTER TABLE `booking_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complements`
--
ALTER TABLE `complements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lankeyvalues`
--
ALTER TABLE `lankeyvalues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9979;

--
-- AUTO_INCREMENT for table `media_options`
--
ALTER TABLE `media_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=895;

--
-- AUTO_INCREMENT for table `media_settings`
--
ALTER TABLE `media_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mega_menus`
--
ALTER TABLE `mega_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1306;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `menu_childs`
--
ALTER TABLE `menu_childs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

--
-- AUTO_INCREMENT for table `menu_parents`
--
ALTER TABLE `menu_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1044;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `offer_ads`
--
ALTER TABLE `offer_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `room_assigns`
--
ALTER TABLE `room_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `room_manages`
--
ALTER TABLE `room_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `section_contents`
--
ALTER TABLE `section_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `section_manages`
--
ALTER TABLE `section_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tp_options`
--
ALTER TABLE `tp_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `tp_status`
--
ALTER TABLE `tp_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
