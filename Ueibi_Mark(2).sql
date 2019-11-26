-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2019 at 01:19 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ueibi_Mark`
--

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `no_of_calls` int(11) DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'Received'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `type`, `phone`, `person_name`, `company`, `city`, `website`, `date_time`, `no_of_calls`, `remarks`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'support', '6239485491', 'Sandeep Bangarh', 'CBL', 'chandigarh', 'ww.sandeepbangarh.com', '2019-11-29 10:39:00', 2, 'testt', '2019-11-02 23:39:57', '2019-11-02 23:39:57', NULL, 'Received'),
(2, 'mp', '6239485491', 'Sandeep Laller', 'CBL', 'chandigarh', 'ww.sandeepbangarh.com', '2019-11-27 10:53:00', 5, 'testttttt', '2019-11-02 23:53:36', '2019-11-02 23:53:36', NULL, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2019-10-12 03:41:42', '2019-10-12 03:41:42'),
(2, NULL, 1, 'Category 2', 'category-2', '2019-10-12 03:41:42', '2019-10-12 03:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 8, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 2),
(58, 8, 'person_name', 'text', 'Person Name', 0, 1, 1, 1, 1, 1, '{}', 3),
(59, 8, 'company', 'text', 'Company', 0, 1, 1, 1, 1, 1, '{}', 4),
(60, 8, 'city', 'text', 'City', 0, 1, 1, 1, 1, 1, '{}', 5),
(61, 8, 'website', 'text', 'Website', 0, 1, 1, 1, 1, 1, '{}', 6),
(62, 8, 'date_time', 'text', 'Date Time', 0, 1, 1, 1, 1, 1, '{}', 7),
(63, 8, 'no_of_calls', 'text', 'No Of Calls', 0, 1, 1, 1, 1, 1, '{}', 8),
(64, 8, 'remarks', 'text', 'Remarks', 0, 1, 1, 1, 1, 1, '{}', 9),
(65, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 10),
(66, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(67, 8, 'deleted_at', 'timestamp', 'Deleted At', 0, 1, 1, 1, 1, 1, '{}', 12),
(68, 8, 'status', 'text', 'Status', 0, 1, 1, 1, 1, 1, '{\"default\":\"Received\",\"options\":{\"received\":\"Received\",\"callbacks\":\"Callbacks\",\"missed\":\"Missed\"}}', 13);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2019-10-12 03:41:00', '2019-10-12 03:41:00'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-10-12 03:41:00', '2019-10-12 03:41:00'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-10-12 03:41:01', '2019-10-12 03:41:01'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2019-10-12 03:41:40', '2019-10-12 03:41:40'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2019-10-12 03:41:43', '2019-10-12 03:41:43'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2019-10-12 03:41:47', '2019-10-12 03:41:47'),
(8, 'calls', 'calls', 'Call', 'Calls', NULL, 'App\\Modals\\Call', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-11-01 12:03:05', '2019-11-01 12:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) NOT NULL,
  `assigned_by` bigint(20) NOT NULL,
  `assigned_to` bigint(20) NOT NULL,
  `ticket_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `assigned_by`, `assigned_to`, `ticket_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 7, 3, '2019-11-24 05:17:05', NULL, NULL),
(2, 4, 7, 3, '2019-11-24 05:19:48', NULL, NULL),
(3, 4, 7, 3, '2019-11-24 15:12:52', NULL, NULL),
(4, 7, 3, 1, '2019-11-26 06:29:36', NULL, NULL),
(5, 7, 3, 1, '2019-11-26 06:33:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-10-12 03:41:06', '2019-10-12 03:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `roleid` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `roleid`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`, `status`) VALUES
(1, 1, 0, 'Marketing', '', '_self', 'voyager-boat', '#000000', NULL, 6, '2019-10-12 03:41:06', '2019-10-26 01:31:09', 'voyager.dashboard', 'null', 1),
(2, 1, 0, 'Calls', '', '_self', 'voyager-images', '#000000', NULL, 7, '2019-10-12 03:41:06', '2019-10-26 01:31:09', 'voyager.media.index', 'null', 1),
(3, 1, 0, 'Pre-Sales', '', '_self', 'voyager-person', '#000000', NULL, 5, '2019-10-12 03:41:06', '2019-10-26 01:31:09', 'voyager.users.index', 'null', 1),
(6, 1, 0, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2019-10-12 03:41:09', '2019-10-13 00:19:02', 'voyager.menus.index', NULL, 0),
(7, 1, 0, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-10-12 03:41:10', '2019-10-13 00:19:02', 'voyager.database.index', NULL, 0),
(8, 1, 0, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2019-10-12 03:41:10', '2019-10-13 00:19:02', 'voyager.compass.index', NULL, 0),
(9, 1, 0, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2019-10-12 03:41:10', '2019-10-13 00:19:03', 'voyager.bread.index', NULL, 0),
(10, 1, 0, 'Escalations', '', '_self', 'voyager-settings', '#000000', NULL, 9, '2019-10-12 03:41:10', '2019-10-26 01:31:09', 'voyager.settings.index', 'null', 1),
(11, 1, 0, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-10-12 03:41:19', '2019-10-13 00:19:03', 'voyager.hooks', NULL, 0),
(14, 1, 0, 'Tickets', '', '_self', 'voyager-file-text', '#000000', NULL, 8, '2019-10-12 03:41:49', '2019-10-26 01:31:09', 'voyager.pages.index', 'null', 1),
(15, 1, 2, 'Dashboard', '', '_self', NULL, '#000000', NULL, 1, '2019-10-26 01:29:03', '2019-10-26 09:01:48', 'voyager.dashboard', 'null', 1),
(16, 1, 2, 'Upload', 'admin/support/upload', '_self', NULL, '#000000', NULL, 2, '2019-10-26 01:29:54', '2019-11-19 12:20:58', NULL, '', 1),
(17, 1, 2, 'Publish', 'admin/support/publish', '_self', NULL, '#000000', NULL, 3, '2019-10-26 01:30:24', '2019-11-19 12:21:16', NULL, '', 1),
(18, 1, 2, 'History', 'admin/support/history', '_self', NULL, '#000000', NULL, 4, '2019-10-26 01:30:40', '2019-11-19 12:21:43', NULL, '', 1),
(21, 1, 6, 'Dashboard', 'admin/presale', '_self', NULL, '#000000', NULL, 10, '2019-11-09 10:03:26', '2019-11-09 10:03:26', NULL, '', 1),
(22, 1, 6, 'Gift History', 'admin/gifts', '_self', NULL, '#000000', NULL, 11, '2019-11-09 10:04:56', '2019-11-09 10:04:56', NULL, '', 1),
(23, 1, 3, 'Dashboard', 'admin/sale', '_self', NULL, '#000000', NULL, 12, '2019-11-12 00:54:34', '2019-11-12 00:54:34', NULL, '', 1);

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
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2016_01_01_000000_create_pages_table', 2),
(25, '2016_01_01_000000_create_posts_table', 2),
(26, '2016_02_15_204651_create_categories_table', 2),
(27, '2017_04_11_000000_alter_post_nullable_fields_table', 2),
(28, '2019_11_07_054840_create_tickets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderno` varchar(100) DEFAULT NULL,
  `company` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `assigned_date` date NOT NULL,
  `assigned` tinyint(1) NOT NULL DEFAULT '0',
  `hr_remark` text,
  `verification_remark` text,
  `remark` text,
  `manager_remark` text,
  `marketing_remark` text,
  `admin_remark` text,
  `superadmin_remark` text,
  `hr_name` varchar(50) DEFAULT NULL,
  `hr_contact` varchar(50) DEFAULT NULL,
  `hr_email` varchar(50) DEFAULT NULL,
  `hr_website` varchar(100) DEFAULT NULL,
  `emp_strength` varchar(100) NOT NULL DEFAULT '0',
  `gift_type` varchar(10) DEFAULT NULL,
  `gift_quantity` bigint(20) NOT NULL DEFAULT '0',
  `presale_rating` varchar(5) NOT NULL DEFAULT '0.0',
  `marketing_rating` varchar(5) NOT NULL DEFAULT '0.0',
  `admin_rating` varchar(5) NOT NULL DEFAULT '0.0',
  `superadmin_rating` varchar(5) NOT NULL DEFAULT '0.0',
  `attachment` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderno`, `company`, `area`, `city`, `address`, `contact`, `email`, `industry`, `assigned_date`, `assigned`, `hr_remark`, `verification_remark`, `remark`, `manager_remark`, `marketing_remark`, `admin_remark`, `superadmin_remark`, `hr_name`, `hr_contact`, `hr_email`, `hr_website`, `emp_strength`, `gift_type`, `gift_quantity`, `presale_rating`, `marketing_rating`, `admin_rating`, `superadmin_rating`, `attachment`, `created_at`, `deleted_at`, `updated_at`) VALUES
(5, '9IVY1U', 'test', 'transport chowk', 'chandigarh', 'cdcl building', '9896747812', 'sanbangarh309@gmail.com', 'IT', '2019-11-29', 1, NULL, NULL, NULL, NULL, NULL, '', '', 'test address', 'test address', 'test address', 'ZZ', '01', 'test', 10, '0.0', '3', '0.0', '0.0', 'YQOSvmWXm3CTCu4vlFU0.jpeg', '2019-11-05 16:58:39', NULL, '2019-11-26 01:52:49'),
(6, '2J8VQE', 'test1', 'transport chowk', 'chandigarh', 'cdcl building', '9896747812', 'sanbangarh309@gmail.com', 'IT', '2019-11-29', 1, NULL, NULL, 'myremark', NULL, 'this is my marketing remark..', '', '', 'tanvi verma', '34343434', 'tanviverma@gmail.com', 'digittrix.com', '120', 'mug', 0, '0.0', '2.5', '0.0', '0.0', 'BABraPI2saw8dHyg1Zn5.png', '2019-11-05 16:58:39', NULL, '2019-11-26 01:50:59'),
(7, 'YJCEG1', 'test2', 'transport chowk', 'chandigarh', 'cdcl building', '9896747812', 'sanbangarh309@gmail.com', 'IT', '2019-11-29', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0', NULL, 0, '0.0', '0.0', '0.0', '0.0', NULL, '2019-11-05 16:58:39', NULL, '2019-11-10 00:20:28'),
(8, 'DBWTJD', 'test3', 'transport chowk', 'chandigarh', 'cdcl building', '9896747812', 'sanbangarh309@gmail.com', 'IT', '2019-11-29', 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0', NULL, 0, '0.0', '0.0', '0.0', '0.0', NULL, '2019-11-05 16:58:39', NULL, '2019-11-10 00:19:11'),
(9, 'X3AXLD', 'test', 'transport chowk', 'chandigarh', 'cdcl building', '9896747812', 'sanbangarh309@gmail.com', 'IT', '2019-11-29', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0', NULL, 0, '0.0', '0.0', '0.0', '0.0', NULL, '2019-11-17 13:04:07', NULL, '2019-11-17 07:34:26'),
(10, 'LUKY1T', 'test1', 'transport chowk', 'chandigarh', 'cdcl building', '9896747812', 'sanbangarh309@gmail.com', 'IT', '2019-11-29', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0', NULL, 0, '0.0', '0.0', '0.0', '0.0', NULL, '2019-11-17 13:04:07', NULL, '2019-11-17 07:34:26'),
(11, '1SYG2D', 'test2', 'transport chowk', 'chandigarh', 'cdcl building', '9896747812', 'sanbangarh309@gmail.com', 'IT', '2019-11-29', 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0', NULL, 0, '0.0', '0.0', '0.0', '0.0', NULL, '2019-11-17 13:04:07', NULL, NULL),
(12, 'XQBHUA', 'test3', 'transport chowk', 'chandigarh', 'cdcl building', '9896747812', 'sanbangarh309@gmail.com', 'IT', '2019-11-29', 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0', NULL, 0, '0.0', '0.0', '0.0', '0.0', NULL, '2019-11-17 13:04:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2019-10-12 03:41:50', '2019-10-12 10:26:07');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-10-12 03:41:11', '2019-10-12 03:41:11'),
(2, 'browse_bread', NULL, '2019-10-12 03:41:11', '2019-10-12 03:41:11'),
(3, 'browse_database', NULL, '2019-10-12 03:41:11', '2019-10-12 03:41:11'),
(4, 'browse_media', NULL, '2019-10-12 03:41:11', '2019-10-12 03:41:11'),
(5, 'browse_compass', NULL, '2019-10-12 03:41:11', '2019-10-12 03:41:11'),
(6, 'browse_menus', 'menus', '2019-10-12 03:41:11', '2019-10-12 03:41:11'),
(7, 'read_menus', 'menus', '2019-10-12 03:41:11', '2019-10-12 03:41:11'),
(8, 'edit_menus', 'menus', '2019-10-12 03:41:12', '2019-10-12 03:41:12'),
(9, 'add_menus', 'menus', '2019-10-12 03:41:12', '2019-10-12 03:41:12'),
(10, 'delete_menus', 'menus', '2019-10-12 03:41:12', '2019-10-12 03:41:12'),
(11, 'browse_roles', 'roles', '2019-10-12 03:41:12', '2019-10-12 03:41:12'),
(12, 'read_roles', 'roles', '2019-10-12 03:41:12', '2019-10-12 03:41:12'),
(13, 'edit_roles', 'roles', '2019-10-12 03:41:13', '2019-10-12 03:41:13'),
(14, 'add_roles', 'roles', '2019-10-12 03:41:13', '2019-10-12 03:41:13'),
(15, 'delete_roles', 'roles', '2019-10-12 03:41:13', '2019-10-12 03:41:13'),
(16, 'browse_users', 'users', '2019-10-12 03:41:13', '2019-10-12 03:41:13'),
(17, 'read_users', 'users', '2019-10-12 03:41:13', '2019-10-12 03:41:13'),
(18, 'edit_users', 'users', '2019-10-12 03:41:13', '2019-10-12 03:41:13'),
(19, 'add_users', 'users', '2019-10-12 03:41:13', '2019-10-12 03:41:13'),
(20, 'delete_users', 'users', '2019-10-12 03:41:13', '2019-10-12 03:41:13'),
(21, 'browse_settings', 'settings', '2019-10-12 03:41:14', '2019-10-12 03:41:14'),
(22, 'read_settings', 'settings', '2019-10-12 03:41:14', '2019-10-12 03:41:14'),
(23, 'edit_settings', 'settings', '2019-10-12 03:41:14', '2019-10-12 03:41:14'),
(24, 'add_settings', 'settings', '2019-10-12 03:41:14', '2019-10-12 03:41:14'),
(25, 'delete_settings', 'settings', '2019-10-12 03:41:14', '2019-10-12 03:41:14'),
(26, 'browse_hooks', NULL, '2019-10-12 03:41:19', '2019-10-12 03:41:19'),
(27, 'browse_categories', 'categories', '2019-10-12 03:41:42', '2019-10-12 03:41:42'),
(28, 'read_categories', 'categories', '2019-10-12 03:41:42', '2019-10-12 03:41:42'),
(29, 'edit_categories', 'categories', '2019-10-12 03:41:42', '2019-10-12 03:41:42'),
(30, 'add_categories', 'categories', '2019-10-12 03:41:42', '2019-10-12 03:41:42'),
(31, 'delete_categories', 'categories', '2019-10-12 03:41:42', '2019-10-12 03:41:42'),
(32, 'browse_posts', 'posts', '2019-10-12 03:41:46', '2019-10-12 03:41:46'),
(33, 'read_posts', 'posts', '2019-10-12 03:41:46', '2019-10-12 03:41:46'),
(34, 'edit_posts', 'posts', '2019-10-12 03:41:46', '2019-10-12 03:41:46'),
(35, 'add_posts', 'posts', '2019-10-12 03:41:47', '2019-10-12 03:41:47'),
(36, 'delete_posts', 'posts', '2019-10-12 03:41:47', '2019-10-12 03:41:47'),
(37, 'browse_pages', 'pages', '2019-10-12 03:41:49', '2019-10-12 03:41:49'),
(38, 'read_pages', 'pages', '2019-10-12 03:41:49', '2019-10-12 03:41:49'),
(39, 'edit_pages', 'pages', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(40, 'add_pages', 'pages', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(41, 'delete_pages', 'pages', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(42, 'browse_calls', 'calls', '2019-11-01 12:03:06', '2019-11-01 12:03:06'),
(43, 'read_calls', 'calls', '2019-11-01 12:03:06', '2019-11-01 12:03:06'),
(44, 'edit_calls', 'calls', '2019-11-01 12:03:06', '2019-11-01 12:03:06'),
(45, 'add_calls', 'calls', '2019-11-01 12:03:06', '2019-11-01 12:03:06'),
(46, 'delete_calls', 'calls', '2019-11-01 12:03:06', '2019-11-01 12:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 7),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(21, 6),
(21, 7),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(22, 7),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(23, 7),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(26, 6),
(26, 7),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(28, 6),
(28, 7),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(29, 6),
(29, 7),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(30, 7),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(31, 6),
(31, 7),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(32, 5),
(32, 6),
(32, 7),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(33, 6),
(33, 7),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(34, 6),
(34, 7),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(35, 5),
(35, 6),
(35, 7),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(36, 6),
(36, 7),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(37, 5),
(37, 6),
(37, 7),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(38, 6),
(38, 7),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(39, 5),
(39, 6),
(39, 7),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(40, 6),
(40, 7),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(41, 5),
(41, 6),
(41, 7),
(42, 3),
(42, 4),
(42, 5),
(42, 6),
(42, 7),
(43, 3),
(43, 4),
(43, 5),
(43, 6),
(43, 7),
(44, 3),
(44, 4),
(44, 5),
(44, 6),
(44, 7),
(45, 3),
(45, 4),
(45, 5),
(45, 6),
(45, 7),
(46, 3),
(46, 4),
(46, 5),
(46, 6),
(46, 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-10-12 03:41:47', '2019-10-12 03:41:47'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-10-12 03:41:47', '2019-10-12 03:41:47'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-10-12 03:41:47', '2019-10-12 03:41:47'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-10-12 03:41:47', '2019-10-12 03:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Admin', '2019-10-12 03:41:10', '2019-10-16 11:36:39'),
(2, 'support', 'Support', '2019-10-12 03:41:11', '2019-10-16 11:35:47'),
(3, 'presale', 'Pre Sale', '2019-10-16 11:33:57', '2019-10-16 11:35:36'),
(4, 'verification', 'Verification Support', '2019-10-16 11:34:46', '2019-10-16 11:35:21'),
(5, 'admin', 'Administrator', '2019-10-16 11:37:00', '2019-10-16 11:37:00'),
(6, 'presalemanager', 'Pre Sale Manager', '2019-11-05 13:08:31', '2019-11-05 13:08:31'),
(7, 'marketingmanager', 'Marketing Manager', '2019-11-05 13:09:14', '2019-11-05 13:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings/October2019/cWXQLGiB1YhRlB6EBoiH.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings/October2019/orIlkBc5cMvj1Q3Piu8p.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Ueibi', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Ueibi.', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', 'settings/October2019/LQYH8BpiOm7twZvOuiXx.png', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/October2019/11AB0zr2qTF5K04rv0LJ.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assigned_by` bigint(20) UNSIGNED DEFAULT NULL,
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'received',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_by` bigint(20) UNSIGNED NOT NULL,
  `assigned_to` bigint(20) UNSIGNED NOT NULL,
  `ticketno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp` int(11) DEFAULT '0',
  `rating` decimal(15,2) DEFAULT '0.00',
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `received_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `order_id`, `assigned_by`, `assigned_to`, `ticketno`, `company`, `area`, `emp`, `rating`, `file`, `gift`, `status`, `received_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 7, 3, '8HV7TL', 'test1', 'transport chowk', 0, '0.00', NULL, 'Yes', 'assigned', '2019-11-26 06:33:21', '2019-11-10 05:50:29', '2019-11-26 01:03:21', NULL),
(2, 7, 4, 6, 'BKD7UZ', 'test2', 'transport chowk', 0, '0.00', NULL, 'Yes', 'received', NULL, '2019-11-10 05:50:29', NULL, NULL),
(3, 5, 7, 7, '2FTQ0S', 'test', 'transport chowk', 0, '0.00', NULL, 'Yes', 'assigned', '2019-11-26 07:22:49', '2019-11-10 05:50:29', '2019-11-26 01:52:49', NULL),
(4, 10, 4, 6, '0P3SOC', 'test1', 'transport chowk', 0, '0.00', NULL, 'Yes', 'received', NULL, '2019-11-17 13:04:26', NULL, NULL),
(5, 9, 4, 6, 'T5WLGA', 'test', 'transport chowk', 0, '0.00', NULL, 'Yes', 'received', NULL, '2019-11-17 13:04:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-10-12 03:41:50', '2019-10-12 03:41:50'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-10-12 03:41:51', '2019-10-12 03:41:51'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-10-12 03:41:51', '2019-10-12 03:41:51'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-10-12 03:41:51', '2019-10-12 03:41:51'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-10-12 03:41:51', '2019-10-12 03:41:51'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-10-12 03:41:51', '2019-10-12 03:41:51'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-10-12 03:41:51', '2019-10-12 03:41:51'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(22, 'menu_items', 'title', 13, 'pt', 'Publicações', '2019-10-12 03:41:52', '2019-10-12 03:41:52'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-10-12 03:41:53', '2019-10-12 03:41:53'),
(24, 'menu_items', 'title', 12, 'pt', 'Categorias', '2019-10-12 03:41:53', '2019-10-12 03:41:53'),
(25, 'menu_items', 'title', 14, 'pt', 'Páginas', '2019-10-12 03:41:53', '2019-10-12 03:41:53'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-10-12 03:41:53', '2019-10-12 03:41:53'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-10-12 03:41:53', '2019-10-12 03:41:53'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-10-12 03:41:53', '2019-10-12 03:41:53'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-10-12 03:41:53', '2019-10-12 03:41:53'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-10-12 03:41:53', '2019-10-12 03:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'superadmin@ueibi.com', 'users/October2019/1BtvP7sbSA32Vvbj1Ldm.jpg', NULL, '$2y$10$UF6YKAWZfsa1.Et5SC.czeRmejs0sbnheMPoEq60jzSw46lvlppZG', '4sOggPWKj1ADwuDTi17dypfBYhwwuITwkuARUYzhrXqS2hTkK6mAEZhTfZaq', '{\"locale\":\"en\"}', '2019-10-12 03:41:43', '2019-10-26 00:44:35'),
(2, 5, 'Admin', 'admin@ueibi.com', 'users/default.png', NULL, '$2y$10$9kbjO0LtFjpAa07q7GWFs.0l7m0On2zvie2eF4Ao/g739YpRBhlBa', NULL, '{\"locale\":\"en\"}', '2019-10-16 11:39:51', '2019-10-16 11:39:51'),
(3, 3, 'Pre Sale', 'presale@ueibi.com', 'users/default.png', NULL, '$2y$10$E6UjEs7S5eqVMAwmLZdUOeTYHAa2YNoUQAJJe2DtXm/r63lZOnn7i', NULL, '{\"locale\":\"en\"}', '2019-10-16 11:41:31', '2019-10-16 11:41:31'),
(4, 2, 'Support', 'support@ueibi.com', 'users/default.png', NULL, '$2y$10$Pvtd.y9Cs/0iPAM/FPvRgOEF.haxRjbpglEgpr.tVVxQWymZotfCe', 'PPbYQ9usqilc6AVtEwV62d7KqZcgYQUfPFZ0ovYCt1RkY5chPNW0ZtTI7YdY', '{\"locale\":\"en\"}', '2019-10-16 11:42:38', '2019-10-26 00:45:00'),
(5, 4, 'Verification Support', 'verification@ueibi.com', 'users/default.png', NULL, '$2y$10$1alKiTTjvQ09tKvFy.MT6urNKToMMKrgq5nB/qEN4dqatuY.8FrUi', NULL, '{\"locale\":\"en\"}', '2019-10-16 11:43:28', '2019-10-16 11:43:28'),
(6, 6, 'Pre Sale Manager', 'presalemanager@ueibi.com', 'users/default.png', NULL, '$2y$10$qvvHswGN6HO9J/1fe6QREeZgSPe2KBUqM.YBT4janIacX5ybXrOxW', 'FwxPLer5Zr6V2wgflIBui5yFEaImvClvKyWU65QWeqLLASnNHJPVPgQRHTt7', '{\"locale\":\"en\"}', '2019-11-05 13:10:21', '2019-11-05 13:10:21'),
(7, 7, 'Marketing Manager', 'marketingmanager@ueibi.com', 'users/default.png', NULL, '$2y$10$Oh1KQ9ZpF7cjVF.zGXHji.EPPzwKw8duplTZxx4fgblc7tmleGyea', NULL, '{\"locale\":\"en\"}', '2019-11-05 13:11:13', '2019-11-05 13:11:13'),
(8, 6, 'Pre Sale Manager Two', 'PreSaleManagerTwo@ueibi.com', 'users/default.png', NULL, '$2y$10$.EpCPkM10EAAv7JBoOiG8ekC7XCOrqKFmrmPi4B7rRL/hwYWOg9Xa', NULL, '{\"locale\":\"en\"}', '2019-11-05 13:12:18', '2019-11-05 13:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `assigned_by` (`assigned_by`),
  ADD KEY `assigned_to` (`assigned_to`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_order_id_foreign` (`order_id`),
  ADD KEY `tickets_assigned_by_foreign` (`assigned_by`),
  ADD KEY `tickets_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
