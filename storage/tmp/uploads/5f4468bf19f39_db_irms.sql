-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 10:41 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_irms`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_incidents`
--

CREATE TABLE `area_incidents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_incidents`
--

INSERT INTO `area_incidents` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Plant', '2020-02-16 16:01:03', '2020-02-16 16:01:22', NULL),
(2, 'Non-Plant', '2020-02-16 16:01:15', '2020-02-16 16:01:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `area_user`
--

CREATE TABLE `area_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_user`
--

INSERT INTO `area_user` (`id`, `area_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 56, '2020-05-29 03:37:18', '2020-05-29 03:37:18', NULL),
(2, 1, 60, '2020-05-29 07:55:34', '2020-05-29 07:55:34', NULL),
(3, 1, 61, '2020-05-29 07:55:40', '2020-05-29 07:55:40', NULL),
(4, 1, 62, '2020-05-29 07:55:48', '2020-05-29 07:55:48', NULL),
(5, 1, 63, '2020-05-29 07:55:59', '2020-05-29 07:55:59', NULL),
(6, 1, 84, '2020-05-29 07:56:08', '2020-05-29 07:56:08', NULL),
(7, 1, 85, '2020-05-29 07:56:15', '2020-05-29 07:56:15', NULL),
(8, 1, 87, '2020-05-29 07:56:21', '2020-05-29 07:56:21', NULL),
(9, 1, 123, '2020-05-29 07:56:28', '2020-05-29 07:56:28', NULL),
(10, 1, 124, '2020-05-29 07:56:35', '2020-05-29 07:56:35', NULL),
(11, 1, 86, '2020-05-29 07:56:42', '2020-05-29 07:56:42', NULL),
(12, 1, 139, '2020-05-29 07:56:49', '2020-05-29 07:56:49', NULL),
(13, 1, 140, '2020-05-29 07:56:59', '2020-05-29 07:56:59', NULL),
(14, 1, 141, '2020-05-29 07:57:10', '2020-05-29 07:57:10', NULL),
(15, 1, 150, '2020-05-29 07:57:18', '2020-05-29 07:57:18', NULL),
(16, 1, 57, '2020-05-29 07:57:24', '2020-05-29 07:57:24', NULL),
(17, 1, 119, '2020-05-29 07:57:30', '2020-05-29 07:57:30', NULL),
(18, 1, 135, '2020-05-29 07:57:36', '2020-05-29 07:57:36', NULL),
(19, 1, 144, '2020-05-29 07:57:48', '2020-05-29 07:57:48', NULL),
(20, 1, 83, '2020-05-29 07:57:56', '2020-05-29 07:57:56', NULL),
(21, 1, 167, '2020-05-29 07:58:02', '2020-05-29 07:58:02', NULL),
(22, 1, 96, '2020-05-29 07:58:07', '2020-05-29 07:58:07', NULL),
(23, 1, 163, '2020-05-29 07:58:12', '2020-05-29 07:58:12', NULL),
(24, 2, 64, '2020-05-29 07:58:22', '2020-05-29 07:58:22', NULL),
(25, 2, 22, '2020-05-29 07:58:29', '2020-05-29 07:58:29', NULL),
(26, 2, 14, '2020-05-29 07:58:35', '2020-05-29 07:58:35', NULL),
(27, 2, 24, '2020-05-29 07:58:43', '2020-05-29 07:58:43', NULL),
(28, 2, 124, '2020-05-29 07:58:54', '2020-05-29 07:58:54', NULL),
(29, 1, 120, '2020-05-29 07:59:00', '2020-05-29 07:59:00', NULL),
(30, 1, 58, '2020-05-29 07:59:06', '2020-05-29 07:59:06', NULL),
(31, 1, 133, '2020-05-29 07:59:13', '2020-05-29 07:59:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL,
  `assigned_to_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets_histories`
--

CREATE TABLE `assets_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `asset_id` int(10) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL,
  `assigned_user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE `asset_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_locations`
--

CREATE TABLE `asset_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_statuses`
--

CREATE TABLE `asset_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_statuses`
--

INSERT INTO `asset_statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Available', '2020-01-30 16:48:12', '2020-01-30 16:48:12', NULL),
(2, 'Not Available', '2020-01-30 16:48:12', '2020-01-30 16:48:12', NULL),
(3, 'Broken', '2020-01-30 16:48:12', '2020-01-30 16:48:12', NULL),
(4, 'Out for Repair', '2020-01-30 16:48:12', '2020-01-30 16:48:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(1, 'updated', 34, 'App\\IncidentReport', 159, '{\"id\":34,\"no_laporan\":\"LI-0520-0033\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 2\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-05-2020 10:51:04\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-03 11:10:31\",\"acknowledged_at\":null,\"created_at\":\"2020-05-14 18:51:08\",\"updated_at\":\"2020-06-03 11:10:31\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":4,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-03 03:10:31', '2020-06-03 03:10:31'),
(2, 'updated', 33, 'App\\IncidentReport', 159, '{\"id\":33,\"no_laporan\":\"LI-0520-0032\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 2\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-05-2020 10:47:32\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-03 11:10:34\",\"acknowledged_at\":null,\"created_at\":\"2020-05-14 18:47:36\",\"updated_at\":\"2020-06-03 11:10:34\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":4,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-03 03:10:34', '2020-06-03 03:10:34'),
(3, 'updated', 34, 'App\\IncidentReport', 158, '{\"id\":34,\"no_laporan\":\"LI-0520-0033\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 2\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-05-2020 10:51:04\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-03 11:10:31\",\"acknowledged_at\":\"2020-06-03 11:14:40\",\"created_at\":\"2020-05-14 18:51:08\",\"updated_at\":\"2020-06-03 11:14:40\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":4,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-03 03:14:40', '2020-06-03 03:14:40'),
(4, 'updated', 33, 'App\\IncidentReport', 158, '{\"id\":33,\"no_laporan\":\"LI-0520-0032\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 2\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-05-2020 10:47:32\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-03 11:10:34\",\"acknowledged_at\":\"2020-06-03 11:18:11\",\"created_at\":\"2020-05-14 18:47:36\",\"updated_at\":\"2020-06-03 11:18:11\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":4,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-03 03:18:11', '2020-06-03 03:18:11'),
(5, 'updated', 33, 'App\\IncidentReport', 161, '{\"id\":33,\"no_laporan\":\"LI-0520-0032\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 2\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-05-2020 10:47:32\",\"date_action\":null,\"assigned_at\":\"2020-06-03 11:24:23\",\"reviewed_at\":\"2020-06-03 11:10:34\",\"acknowledged_at\":\"2020-06-03 11:18:11\",\"created_at\":\"2020-05-14 18:47:36\",\"updated_at\":\"2020-06-03 11:24:23\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":4,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":\"162\",\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-03 03:24:23', '2020-06-03 03:24:23'),
(6, 'updated', 34, 'App\\IncidentReport', 161, '{\"id\":34,\"no_laporan\":\"LI-0520-0033\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 2\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-05-2020 10:51:04\",\"date_action\":null,\"assigned_at\":\"2020-06-05 15:23:07\",\"reviewed_at\":\"2020-06-03 11:10:31\",\"acknowledged_at\":\"2020-06-03 11:14:40\",\"created_at\":\"2020-05-14 18:51:08\",\"updated_at\":\"2020-06-05 15:23:07\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":4,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":\"164\",\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-05 07:23:07', '2020-06-05 07:23:07'),
(7, 'updated', 21, 'App\\IncidentReport', 159, '{\"id\":21,\"no_laporan\":\"LI-0520-0020\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 1\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"13-05-2020 14:53:37\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-11 09:49:09\",\"acknowledged_at\":null,\"created_at\":\"2020-05-12 22:54:25\",\"updated_at\":\"2020-06-11 09:49:09\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":2,\"category_id\":4,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-11 01:49:09', '2020-06-11 01:49:09'),
(8, 'updated', 21, 'App\\IncidentReport', 158, '{\"id\":21,\"no_laporan\":\"LI-0520-0020\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 1\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"13-05-2020 14:53:37\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-11 09:49:09\",\"acknowledged_at\":\"2020-06-11 09:49:29\",\"created_at\":\"2020-05-12 22:54:25\",\"updated_at\":\"2020-06-11 09:49:29\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":2,\"category_id\":4,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-11 01:49:29', '2020-06-11 01:49:29'),
(9, 'updated', 21, 'App\\IncidentReport', 161, '{\"id\":21,\"no_laporan\":\"LI-0520-0020\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident 1\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"13-05-2020 14:53:37\",\"date_action\":null,\"assigned_at\":\"2020-06-11 09:52:01\",\"reviewed_at\":\"2020-06-11 09:49:09\",\"acknowledged_at\":\"2020-06-11 09:49:29\",\"created_at\":\"2020-05-12 22:54:25\",\"updated_at\":\"2020-06-11 09:52:01\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":2,\"category_id\":4,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":\"86\",\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-11 01:52:01', '2020-06-11 01:52:01'),
(10, 'updated', 25, 'App\\IncidentReport', 159, '{\"id\":25,\"no_laporan\":\"LI-0520-0024\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"13-05-2020 15:14:34\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-11 11:20:13\",\"acknowledged_at\":null,\"created_at\":\"2020-05-12 23:14:38\",\"updated_at\":\"2020-06-11 11:20:13\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":2,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-11 03:20:13', '2020-06-11 03:20:13'),
(11, 'updated', 24, 'App\\IncidentReport', 159, '{\"id\":24,\"no_laporan\":\"LI-0520-0023\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test incident\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"13-05-2020 15:13:04\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-11 11:20:26\",\"acknowledged_at\":null,\"created_at\":\"2020-05-12 23:13:32\",\"updated_at\":\"2020-06-11 11:20:26\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":2,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-11 03:20:26', '2020-06-11 03:20:26'),
(12, 'created', 35, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 15:26:17\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0001\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 15:29:25\",\"created_at\":\"2020-06-12 15:29:25\",\"id\":35,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 07:29:25', '2020-06-12 07:29:25'),
(13, 'created', 36, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 15:26:17\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0002\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 15:40:13\",\"created_at\":\"2020-06-12 15:40:13\",\"id\":36,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 07:40:13', '2020-06-12 07:40:13'),
(14, 'created', 37, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 15:26:17\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0003\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 15:53:01\",\"created_at\":\"2020-06-12 15:53:01\",\"id\":37,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 07:53:01', '2020-06-12 07:53:01'),
(15, 'created', 38, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 16:07:46\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0004\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 16:07:51\",\"created_at\":\"2020-06-12 16:07:51\",\"id\":38,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 08:07:51', '2020-06-12 08:07:51'),
(16, 'created', 39, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 16:07:46\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0005\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 16:08:25\",\"created_at\":\"2020-06-12 16:08:25\",\"id\":39,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 08:08:25', '2020-06-12 08:08:25'),
(17, 'created', 40, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 16:08:27\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0006\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 16:08:31\",\"created_at\":\"2020-06-12 16:08:31\",\"id\":40,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 08:08:31', '2020-06-12 08:08:31'),
(18, 'created', 41, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 16:08:27\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0007\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 16:26:45\",\"created_at\":\"2020-06-12 16:26:45\",\"id\":41,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 08:26:45', '2020-06-12 08:26:45'),
(19, 'created', 42, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 16:08:27\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0008\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 16:37:12\",\"created_at\":\"2020-06-12 16:37:12\",\"id\":42,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 08:37:12', '2020-06-12 08:37:12'),
(20, 'created', 43, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 16:08:27\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0009\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 16:37:24\",\"created_at\":\"2020-06-12 16:37:24\",\"id\":43,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 08:37:24', '2020-06-12 08:37:24'),
(21, 'created', 44, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 16:08:27\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0010\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 16:47:03\",\"created_at\":\"2020-06-12 16:47:03\",\"id\":44,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 08:47:03', '2020-06-12 08:47:03'),
(22, 'created', 45, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"date_incident\":\"12-06-2020 16:47:08\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0011\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 16:47:11\",\"created_at\":\"2020-06-12 16:47:11\",\"id\":45,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 08:47:11', '2020-06-12 08:47:11'),
(23, 'created', 46, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"date_incident\":\"12-06-2020 17:05:22\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"4\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"test 23\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0012\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-12 17:05:50\",\"created_at\":\"2020-06-12 17:05:50\",\"id\":46,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-12 09:05:51', '2020-06-12 09:05:51'),
(24, 'updated', 45, 'App\\IncidentReport', 159, '{\"id\":45,\"no_laporan\":\"LI-0620-0011\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"12-06-2020 16:47:08\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 10:18:27\",\"acknowledged_at\":null,\"created_at\":\"2020-06-12 16:47:11\",\"updated_at\":\"2020-06-15 10:18:27\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":1,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":2,\"file\":[],\"photos\":[{\"id\":3,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":45,\"collection_name\":\"photos\",\"name\":\"5ee3410e41ef8_parse\",\"file_name\":\"5ee3410e41ef8_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":3,\"created_at\":\"2020-06-12 16:47:11\",\"updated_at\":\"2020-06-12 16:47:13\",\"url\":\"\\/storage\\/3\\/5ee3410e41ef8_parse.png\",\"thumbnail\":\"\\/storage\\/3\\/conversions\\/5ee3410e41ef8_parse-thumb.jpg\"}],\"media\":[{\"id\":3,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":45,\"collection_name\":\"photos\",\"name\":\"5ee3410e41ef8_parse\",\"file_name\":\"5ee3410e41ef8_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":3,\"created_at\":\"2020-06-12 16:47:11\",\"updated_at\":\"2020-06-12 16:47:13\",\"url\":\"\\/storage\\/3\\/5ee3410e41ef8_parse.png\",\"thumbnail\":\"\\/storage\\/3\\/conversions\\/5ee3410e41ef8_parse-thumb.jpg\"}]}', '::1', '2020-06-15 02:18:27', '2020-06-15 02:18:27'),
(25, 'updated', 45, 'App\\IncidentReport', 158, '{\"id\":45,\"no_laporan\":\"LI-0620-0011\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"12-06-2020 16:47:08\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 10:18:27\",\"acknowledged_at\":\"2020-06-15 10:23:29\",\"created_at\":\"2020-06-12 16:47:11\",\"updated_at\":\"2020-06-15 10:23:29\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":1,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":2,\"file\":[],\"photos\":[{\"id\":3,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":45,\"collection_name\":\"photos\",\"name\":\"5ee3410e41ef8_parse\",\"file_name\":\"5ee3410e41ef8_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":3,\"created_at\":\"2020-06-12 16:47:11\",\"updated_at\":\"2020-06-12 16:47:13\",\"url\":\"\\/storage\\/3\\/5ee3410e41ef8_parse.png\",\"thumbnail\":\"\\/storage\\/3\\/conversions\\/5ee3410e41ef8_parse-thumb.jpg\"}],\"media\":[{\"id\":3,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":45,\"collection_name\":\"photos\",\"name\":\"5ee3410e41ef8_parse\",\"file_name\":\"5ee3410e41ef8_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":3,\"created_at\":\"2020-06-12 16:47:11\",\"updated_at\":\"2020-06-12 16:47:13\",\"url\":\"\\/storage\\/3\\/5ee3410e41ef8_parse.png\",\"thumbnail\":\"\\/storage\\/3\\/conversions\\/5ee3410e41ef8_parse-thumb.jpg\"}]}', '::1', '2020-06-15 02:23:30', '2020-06-15 02:23:30'),
(26, 'updated', 44, 'App\\IncidentReport', 159, '{\"id\":44,\"no_laporan\":\"LI-0620-0010\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"12-06-2020 16:08:27\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 10:32:30\",\"acknowledged_at\":null,\"created_at\":\"2020-06-12 16:47:03\",\"updated_at\":\"2020-06-15 10:32:30\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":1,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":2,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 02:32:30', '2020-06-15 02:32:30'),
(27, 'updated', 44, 'App\\IncidentReport', 158, '{\"id\":44,\"no_laporan\":\"LI-0620-0010\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"12-06-2020 16:08:27\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 10:32:30\",\"acknowledged_at\":\"2020-06-15 10:33:16\",\"created_at\":\"2020-06-12 16:47:03\",\"updated_at\":\"2020-06-15 10:33:16\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":1,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":2,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 02:33:17', '2020-06-15 02:33:17'),
(28, 'updated', 44, 'App\\IncidentReport', 158, '{\"id\":44,\"no_laporan\":\"LI-0620-0010\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"12-06-2020 16:08:27\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 10:32:30\",\"acknowledged_at\":\"2020-06-15 10:33:49\",\"created_at\":\"2020-06-12 16:47:03\",\"updated_at\":\"2020-06-15 10:33:49\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":1,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":2,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 02:33:50', '2020-06-15 02:33:50'),
(29, 'created', 47, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"date_incident\":\"15-06-2020 11:58:36\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"test 234\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0013\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-15 11:59:27\",\"created_at\":\"2020-06-15 11:59:27\",\"id\":47,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 03:59:27', '2020-06-15 03:59:27'),
(30, 'created', 48, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"date_incident\":\"15-06-2020 14:10:09\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"test 461\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0014\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-15 14:10:47\",\"created_at\":\"2020-06-15 14:10:47\",\"id\":48,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 06:10:47', '2020-06-15 06:10:47'),
(31, 'updated', 48, 'App\\IncidentReport', 159, '{\"id\":48,\"no_laporan\":\"LI-0620-0014\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 461\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 14:10:09\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 14:22:20\",\"acknowledged_at\":null,\"created_at\":\"2020-06-15 14:10:47\",\"updated_at\":\"2020-06-15 14:22:20\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":3,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[{\"id\":6,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":48,\"collection_name\":\"photos\",\"name\":\"5ee710cf4f837_parse\",\"file_name\":\"5ee710cf4f837_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":6,\"created_at\":\"2020-06-15 14:10:47\",\"updated_at\":\"2020-06-15 14:10:50\",\"url\":\"\\/storage\\/6\\/5ee710cf4f837_parse.png\",\"thumbnail\":\"\\/storage\\/6\\/conversions\\/5ee710cf4f837_parse-thumb.jpg\"}],\"media\":[{\"id\":6,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":48,\"collection_name\":\"photos\",\"name\":\"5ee710cf4f837_parse\",\"file_name\":\"5ee710cf4f837_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":6,\"created_at\":\"2020-06-15 14:10:47\",\"updated_at\":\"2020-06-15 14:10:50\",\"url\":\"\\/storage\\/6\\/5ee710cf4f837_parse.png\",\"thumbnail\":\"\\/storage\\/6\\/conversions\\/5ee710cf4f837_parse-thumb.jpg\"}]}', '::1', '2020-06-15 06:22:20', '2020-06-15 06:22:20'),
(32, 'updated', 47, 'App\\IncidentReport', 159, '{\"id\":47,\"no_laporan\":\"LI-0620-0013\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 234\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 11:58:36\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 14:30:40\",\"acknowledged_at\":null,\"created_at\":\"2020-06-15 11:59:27\",\"updated_at\":\"2020-06-15 14:30:40\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":3,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[{\"id\":5,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":47,\"collection_name\":\"photos\",\"name\":\"5ee6f202745e6_parse\",\"file_name\":\"5ee6f202745e6_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":5,\"created_at\":\"2020-06-15 11:59:28\",\"updated_at\":\"2020-06-15 11:59:33\",\"url\":\"\\/storage\\/5\\/5ee6f202745e6_parse.png\",\"thumbnail\":\"\\/storage\\/5\\/conversions\\/5ee6f202745e6_parse-thumb.jpg\"}],\"media\":[{\"id\":5,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":47,\"collection_name\":\"photos\",\"name\":\"5ee6f202745e6_parse\",\"file_name\":\"5ee6f202745e6_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":5,\"created_at\":\"2020-06-15 11:59:28\",\"updated_at\":\"2020-06-15 11:59:33\",\"url\":\"\\/storage\\/5\\/5ee6f202745e6_parse.png\",\"thumbnail\":\"\\/storage\\/5\\/conversions\\/5ee6f202745e6_parse-thumb.jpg\"}]}', '::1', '2020-06-15 06:30:40', '2020-06-15 06:30:40'),
(33, 'updated', 47, 'App\\IncidentReport', 159, '{\"id\":47,\"no_laporan\":\"LI-0620-0013\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 234\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 11:58:36\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 14:30:49\",\"acknowledged_at\":null,\"created_at\":\"2020-06-15 11:59:27\",\"updated_at\":\"2020-06-15 14:30:49\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":3,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[{\"id\":5,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":47,\"collection_name\":\"photos\",\"name\":\"5ee6f202745e6_parse\",\"file_name\":\"5ee6f202745e6_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":5,\"created_at\":\"2020-06-15 11:59:28\",\"updated_at\":\"2020-06-15 11:59:33\",\"url\":\"\\/storage\\/5\\/5ee6f202745e6_parse.png\",\"thumbnail\":\"\\/storage\\/5\\/conversions\\/5ee6f202745e6_parse-thumb.jpg\"}],\"media\":[{\"id\":5,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":47,\"collection_name\":\"photos\",\"name\":\"5ee6f202745e6_parse\",\"file_name\":\"5ee6f202745e6_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":5,\"created_at\":\"2020-06-15 11:59:28\",\"updated_at\":\"2020-06-15 11:59:33\",\"url\":\"\\/storage\\/5\\/5ee6f202745e6_parse.png\",\"thumbnail\":\"\\/storage\\/5\\/conversions\\/5ee6f202745e6_parse-thumb.jpg\"}]}', '::1', '2020-06-15 06:30:49', '2020-06-15 06:30:49'),
(34, 'updated', 48, 'App\\IncidentReport', 158, '{\"id\":48,\"no_laporan\":\"LI-0620-0014\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 461\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 14:10:09\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 14:22:20\",\"acknowledged_at\":\"2020-06-15 14:32:14\",\"created_at\":\"2020-06-15 14:10:47\",\"updated_at\":\"2020-06-15 14:32:14\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":3,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[{\"id\":6,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":48,\"collection_name\":\"photos\",\"name\":\"5ee710cf4f837_parse\",\"file_name\":\"5ee710cf4f837_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":6,\"created_at\":\"2020-06-15 14:10:47\",\"updated_at\":\"2020-06-15 14:10:50\",\"url\":\"\\/storage\\/6\\/5ee710cf4f837_parse.png\",\"thumbnail\":\"\\/storage\\/6\\/conversions\\/5ee710cf4f837_parse-thumb.jpg\"}],\"media\":[{\"id\":6,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":48,\"collection_name\":\"photos\",\"name\":\"5ee710cf4f837_parse\",\"file_name\":\"5ee710cf4f837_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":6,\"created_at\":\"2020-06-15 14:10:47\",\"updated_at\":\"2020-06-15 14:10:50\",\"url\":\"\\/storage\\/6\\/5ee710cf4f837_parse.png\",\"thumbnail\":\"\\/storage\\/6\\/conversions\\/5ee710cf4f837_parse-thumb.jpg\"}]}', '::1', '2020-06-15 06:32:14', '2020-06-15 06:32:14'),
(35, 'updated', 46, 'App\\IncidentReport', 159, '{\"id\":46,\"no_laporan\":\"LI-0620-0012\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 23\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"12-06-2020 17:05:22\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 14:35:46\",\"acknowledged_at\":null,\"created_at\":\"2020-06-12 17:05:50\",\"updated_at\":\"2020-06-15 14:35:46\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":4,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[{\"id\":4,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":46,\"collection_name\":\"photos\",\"name\":\"5ee3455fce292_parse\",\"file_name\":\"5ee3455fce292_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":4,\"created_at\":\"2020-06-12 17:05:51\",\"updated_at\":\"2020-06-12 17:05:54\",\"url\":\"\\/storage\\/4\\/5ee3455fce292_parse.png\",\"thumbnail\":\"\\/storage\\/4\\/conversions\\/5ee3455fce292_parse-thumb.jpg\"}],\"media\":[{\"id\":4,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":46,\"collection_name\":\"photos\",\"name\":\"5ee3455fce292_parse\",\"file_name\":\"5ee3455fce292_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":4,\"created_at\":\"2020-06-12 17:05:51\",\"updated_at\":\"2020-06-12 17:05:54\",\"url\":\"\\/storage\\/4\\/5ee3455fce292_parse.png\",\"thumbnail\":\"\\/storage\\/4\\/conversions\\/5ee3455fce292_parse-thumb.jpg\"}]}', '::1', '2020-06-15 06:35:46', '2020-06-15 06:35:46'),
(36, 'updated', 46, 'App\\IncidentReport', 159, '{\"id\":46,\"no_laporan\":\"LI-0620-0012\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 23\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"12-06-2020 17:05:22\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 14:35:57\",\"acknowledged_at\":null,\"created_at\":\"2020-06-12 17:05:50\",\"updated_at\":\"2020-06-15 14:35:57\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":4,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[{\"id\":4,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":46,\"collection_name\":\"photos\",\"name\":\"5ee3455fce292_parse\",\"file_name\":\"5ee3455fce292_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":4,\"created_at\":\"2020-06-12 17:05:51\",\"updated_at\":\"2020-06-12 17:05:54\",\"url\":\"\\/storage\\/4\\/5ee3455fce292_parse.png\",\"thumbnail\":\"\\/storage\\/4\\/conversions\\/5ee3455fce292_parse-thumb.jpg\"}],\"media\":[{\"id\":4,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":46,\"collection_name\":\"photos\",\"name\":\"5ee3455fce292_parse\",\"file_name\":\"5ee3455fce292_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":4,\"created_at\":\"2020-06-12 17:05:51\",\"updated_at\":\"2020-06-12 17:05:54\",\"url\":\"\\/storage\\/4\\/5ee3455fce292_parse.png\",\"thumbnail\":\"\\/storage\\/4\\/conversions\\/5ee3455fce292_parse-thumb.jpg\"}]}', '::1', '2020-06-15 06:35:57', '2020-06-15 06:35:57'),
(37, 'created', 49, 'App\\IncidentReport', 1, '{\"area_id\":\"2\",\"date_incident\":\"15-06-2020 14:42:58\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"3\",\"description\":\"test 789\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0015\",\"updated_at\":\"2020-06-15 15:48:52\",\"created_at\":\"2020-06-15 15:48:52\",\"id\":49,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 07:48:52', '2020-06-15 07:48:52'),
(38, 'created', 50, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"date_incident\":\"15-06-2020 15:51:21\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"3\",\"description\":\"test 789\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0016\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-15 15:51:37\",\"created_at\":\"2020-06-15 15:51:37\",\"id\":50,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 07:51:37', '2020-06-15 07:51:37'),
(39, 'created', 51, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"date_incident\":\"15-06-2020 15:51:21\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"3\",\"description\":\"test 789\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0017\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-15 15:51:58\",\"created_at\":\"2020-06-15 15:51:58\",\"id\":51,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 07:51:58', '2020-06-15 07:51:58'),
(40, 'created', 52, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"date_incident\":\"15-06-2020 15:51:21\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"3\",\"description\":\"test 789\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0018\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-15 15:52:08\",\"created_at\":\"2020-06-15 15:52:08\",\"id\":52,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 07:52:08', '2020-06-15 07:52:08'),
(41, 'updated', 52, 'App\\IncidentReport', 159, '{\"id\":52,\"no_laporan\":\"LI-0620-0018\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 789\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 15:51:21\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 16:00:31\",\"acknowledged_at\":null,\"created_at\":\"2020-06-15 15:52:08\",\"updated_at\":\"2020-06-15 16:00:31\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":1,\"classify_id\":3,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 08:00:32', '2020-06-15 08:00:32'),
(42, 'created', 53, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"date_incident\":\"15-06-2020 16:08:28\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0019\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-15 16:09:07\",\"created_at\":\"2020-06-15 16:09:07\",\"id\":53,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 08:09:07', '2020-06-15 08:09:07'),
(43, 'updated', 53, 'App\\IncidentReport', 159, '{\"id\":53,\"no_laporan\":\"LI-0620-0019\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 7114\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 16:08:28\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 16:31:36\",\"acknowledged_at\":null,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:31:36\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[{\"id\":9,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":53,\"collection_name\":\"photos\",\"name\":\"5ee72c82244ed_parse\",\"file_name\":\"5ee72c82244ed_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":9,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:09:09\",\"url\":\"\\/storage\\/9\\/5ee72c82244ed_parse.png\",\"thumbnail\":\"\\/storage\\/9\\/conversions\\/5ee72c82244ed_parse-thumb.jpg\"}],\"media\":[{\"id\":9,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":53,\"collection_name\":\"photos\",\"name\":\"5ee72c82244ed_parse\",\"file_name\":\"5ee72c82244ed_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":9,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:09:09\",\"url\":\"\\/storage\\/9\\/5ee72c82244ed_parse.png\",\"thumbnail\":\"\\/storage\\/9\\/conversions\\/5ee72c82244ed_parse-thumb.jpg\"}]}', '::1', '2020-06-15 08:31:36', '2020-06-15 08:31:36'),
(44, 'updated', 52, 'App\\IncidentReport', 158, '{\"id\":52,\"no_laporan\":\"LI-0620-0018\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 789\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 15:51:21\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 16:00:31\",\"acknowledged_at\":\"2020-06-15 16:32:19\",\"created_at\":\"2020-06-15 15:52:08\",\"updated_at\":\"2020-06-15 16:32:19\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":1,\"classify_id\":3,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 08:32:19', '2020-06-15 08:32:19'),
(45, 'updated', 52, 'App\\IncidentReport', 158, '{\"id\":52,\"no_laporan\":\"LI-0620-0018\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 789\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 15:51:21\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 16:00:31\",\"acknowledged_at\":\"2020-06-15 16:35:03\",\"created_at\":\"2020-06-15 15:52:08\",\"updated_at\":\"2020-06-15 16:35:03\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":1,\"classify_id\":3,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-15 08:35:03', '2020-06-15 08:35:03'),
(46, 'updated', 53, 'App\\IncidentReport', 158, '{\"id\":53,\"no_laporan\":\"LI-0620-0019\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 7114\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 16:08:28\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-15 16:31:36\",\"acknowledged_at\":\"2020-06-15 16:35:57\",\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:35:57\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"file\":[],\"photos\":[{\"id\":9,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":53,\"collection_name\":\"photos\",\"name\":\"5ee72c82244ed_parse\",\"file_name\":\"5ee72c82244ed_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":9,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:09:09\",\"url\":\"\\/storage\\/9\\/5ee72c82244ed_parse.png\",\"thumbnail\":\"\\/storage\\/9\\/conversions\\/5ee72c82244ed_parse-thumb.jpg\"}],\"media\":[{\"id\":9,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":53,\"collection_name\":\"photos\",\"name\":\"5ee72c82244ed_parse\",\"file_name\":\"5ee72c82244ed_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":9,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:09:09\",\"url\":\"\\/storage\\/9\\/5ee72c82244ed_parse.png\",\"thumbnail\":\"\\/storage\\/9\\/conversions\\/5ee72c82244ed_parse-thumb.jpg\"}]}', '::1', '2020-06-15 08:35:57', '2020-06-15 08:35:57'),
(47, 'created', 65, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"18-06-2020 13:39:47\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"banyak angin diatas\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0020\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-18 13:52:31\",\"created_at\":\"2020-06-18 13:52:31\",\"id\":65,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-18 05:52:31', '2020-06-18 05:52:31'),
(48, 'created', 66, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"18-06-2020 13:39:47\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"banyak angin diatas\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0021\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-18 13:54:36\",\"created_at\":\"2020-06-18 13:54:36\",\"id\":66,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-18 05:54:36', '2020-06-18 05:54:36'),
(49, 'created', 67, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"18-06-2020 13:39:47\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"banyak angin diatas\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0022\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-18 13:54:42\",\"created_at\":\"2020-06-18 13:54:42\",\"id\":67,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-18 05:54:42', '2020-06-18 05:54:42'),
(50, 'created', 68, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"18-06-2020 13:55:35\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"banyak angin diatas\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0023\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-18 13:58:44\",\"created_at\":\"2020-06-18 13:58:44\",\"id\":68,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-18 05:58:44', '2020-06-18 05:58:44'),
(51, 'created', 69, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"23-06-2020 10:42:54\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"kerusakan lagi\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0024\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-23 10:43:43\",\"created_at\":\"2020-06-23 10:43:43\",\"id\":69,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-23 02:43:43', '2020-06-23 02:43:43'),
(52, 'created', 70, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"23-06-2020 10:42:54\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"kerusakan lagi\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0025\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-23 10:45:35\",\"created_at\":\"2020-06-23 10:45:35\",\"id\":70,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-23 02:45:35', '2020-06-23 02:45:35'),
(53, 'created', 71, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"23-06-2020 10:42:54\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"kerusakan lagi\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0026\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-23 10:45:42\",\"created_at\":\"2020-06-23 10:45:42\",\"id\":71,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-23 02:45:42', '2020-06-23 02:45:42');
INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(54, 'updated', 71, 'App\\IncidentReport', 163, '{\"id\":71,\"no_laporan\":\"LI-0620-0026\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"kerusakan lagi\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"23-06-2020 10:42:54\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-23 11:05:53\",\"acknowledged_at\":null,\"created_at\":\"2020-06-23 10:45:42\",\"updated_at\":\"2020-06-23 11:05:53\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":2,\"file\":[],\"photos\":[{\"id\":14,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":71,\"collection_name\":\"photos\",\"name\":\"5ef16cd528ee3_parse\",\"file_name\":\"5ef16cd528ee3_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":14,\"created_at\":\"2020-06-23 10:45:42\",\"updated_at\":\"2020-06-23 10:45:42\",\"url\":\"\\/storage\\/14\\/5ef16cd528ee3_parse.png\",\"thumbnail\":\"\\/storage\\/14\\/conversions\\/5ef16cd528ee3_parse-thumb.jpg\"}],\"media\":[{\"id\":14,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":71,\"collection_name\":\"photos\",\"name\":\"5ef16cd528ee3_parse\",\"file_name\":\"5ef16cd528ee3_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":14,\"created_at\":\"2020-06-23 10:45:42\",\"updated_at\":\"2020-06-23 10:45:42\",\"url\":\"\\/storage\\/14\\/5ef16cd528ee3_parse.png\",\"thumbnail\":\"\\/storage\\/14\\/conversions\\/5ef16cd528ee3_parse-thumb.jpg\"}]}', '::1', '2020-06-23 03:05:53', '2020-06-23 03:05:53'),
(55, 'created', 72, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"23-06-2020 11:57:51\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"kerusakan valve\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0027\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-23 11:58:24\",\"created_at\":\"2020-06-23 11:58:24\",\"id\":72,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 03:58:25', '2020-06-23 03:58:25'),
(56, 'created', 73, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"date_incident\":\"23-06-2020 14:15:41\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"test 461\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0028\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 14:16:09\",\"created_at\":\"2020-06-23 14:16:09\",\"id\":73,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 06:16:09', '2020-06-23 06:16:09'),
(57, 'created', 74, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"date_incident\":\"23-06-2020 14:15:41\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"test 461\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0029\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 14:18:45\",\"created_at\":\"2020-06-23 14:18:45\",\"id\":74,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 06:18:45', '2020-06-23 06:18:45'),
(58, 'created', 75, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"date_incident\":\"23-06-2020 15:08:22\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0030\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 15:08:39\",\"created_at\":\"2020-06-23 15:08:39\",\"id\":75,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 07:08:39', '2020-06-23 07:08:39'),
(59, 'created', 76, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"date_incident\":\"23-06-2020 15:08:22\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0031\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 15:09:01\",\"created_at\":\"2020-06-23 15:09:01\",\"id\":76,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 07:09:01', '2020-06-23 07:09:01'),
(60, 'created', 77, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"date_incident\":\"23-06-2020 15:08:22\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0032\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 15:09:10\",\"created_at\":\"2020-06-23 15:09:10\",\"id\":77,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 07:09:10', '2020-06-23 07:09:10'),
(61, 'created', 78, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"23-06-2020 15:30:53\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0033\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 15:34:01\",\"created_at\":\"2020-06-23 15:34:01\",\"id\":78,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 07:34:01', '2020-06-23 07:34:01'),
(62, 'created', 79, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"23-06-2020 15:30:53\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0034\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 15:34:08\",\"created_at\":\"2020-06-23 15:34:08\",\"id\":79,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 07:34:08', '2020-06-23 07:34:08'),
(63, 'created', 80, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"23-06-2020 15:30:53\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0035\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 15:34:14\",\"created_at\":\"2020-06-23 15:34:14\",\"id\":80,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 07:34:14', '2020-06-23 07:34:14'),
(64, 'created', 81, 'App\\IncidentReport', 162, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"23-06-2020 15:30:53\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0036\",\"nama_pelapor_id\":162,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 15:34:37\",\"created_at\":\"2020-06-23 15:34:37\",\"id\":81,\"file\":[],\"photos\":[],\"media\":[]}', '127.0.0.1', '2020-06-23 07:34:37', '2020-06-23 07:34:37'),
(65, 'created', 82, 'App\\IncidentReport', 86, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"23-06-2020 15:43:41\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0037\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-23 15:44:05\",\"created_at\":\"2020-06-23 15:44:05\",\"id\":82,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-23 07:44:05', '2020-06-23 07:44:05'),
(66, 'created', 83, 'App\\IncidentReport', 131, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"23-06-2020 15:48:10\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0038\",\"nama_pelapor_id\":131,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-23 15:48:44\",\"created_at\":\"2020-06-23 15:48:44\",\"id\":83,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-23 07:48:44', '2020-06-23 07:48:44'),
(67, 'created', 84, 'App\\IncidentReport', 131, '{\"area_id\":\"1\",\"date_incident\":\"23-06-2020 15:55:31\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"test 789\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0039\",\"nama_pelapor_id\":131,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-23 16:00:13\",\"created_at\":\"2020-06-23 16:00:13\",\"id\":84,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-23 08:00:13', '2020-06-23 08:00:13'),
(68, 'created', 85, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"25-06-2020 13:48:11\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"IR-2020001\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0040\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 13:50:07\",\"created_at\":\"2020-06-25 13:50:07\",\"id\":85,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 05:50:07', '2020-06-25 05:50:07'),
(69, 'created', 86, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 13:57:01\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0041\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 13:58:11\",\"created_at\":\"2020-06-25 13:58:11\",\"id\":86,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 05:58:11', '2020-06-25 05:58:11'),
(70, 'created', 87, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"25-06-2020 14:08:05\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"Kerusakan sessat\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0040\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 14:08:52\",\"created_at\":\"2020-06-25 14:08:52\",\"id\":87,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 06:08:52', '2020-06-25 06:08:52'),
(71, 'created', 88, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 14:09:08\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0041\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 14:09:34\",\"created_at\":\"2020-06-25 14:09:34\",\"id\":88,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 06:09:34', '2020-06-25 06:09:34'),
(72, 'created', 89, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 14:46:50\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"IR-2020001\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0042\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 14:47:17\",\"created_at\":\"2020-06-25 14:47:17\",\"id\":89,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 06:47:17', '2020-06-25 06:47:17'),
(73, 'created', 90, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"25-06-2020 15:02:20\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"1\",\"description\":\"IR-2020001\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0041\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:02:40\",\"created_at\":\"2020-06-25 15:02:40\",\"id\":90,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:02:40', '2020-06-25 07:02:40'),
(74, 'created', 91, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 15:02:43\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0042\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:03:09\",\"created_at\":\"2020-06-25 15:03:09\",\"id\":91,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:03:09', '2020-06-25 07:03:09'),
(75, 'created', 92, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 15:36:14\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"IR-2020001\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0043\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:36:35\",\"created_at\":\"2020-06-25 15:36:35\",\"id\":92,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:36:35', '2020-06-25 07:36:35'),
(76, 'created', 93, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 15:38:31\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"1\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0044\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:38:55\",\"created_at\":\"2020-06-25 15:38:55\",\"id\":93,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:38:55', '2020-06-25 07:38:55'),
(77, 'created', 94, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 15:38:31\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"1\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0045\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:39:25\",\"created_at\":\"2020-06-25 15:39:25\",\"id\":94,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:39:25', '2020-06-25 07:39:25'),
(78, 'created', 95, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 15:38:31\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"1\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0046\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:39:30\",\"created_at\":\"2020-06-25 15:39:30\",\"id\":95,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:39:30', '2020-06-25 07:39:30'),
(79, 'created', 96, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 15:44:00\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0047\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:44:22\",\"created_at\":\"2020-06-25 15:44:22\",\"id\":96,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:44:22', '2020-06-25 07:44:22'),
(80, 'created', 97, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"25-06-2020 15:45:55\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0048\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:46:17\",\"created_at\":\"2020-06-25 15:46:17\",\"id\":97,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:46:17', '2020-06-25 07:46:17'),
(81, 'created', 98, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 15:46:23\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0049\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 15:46:41\",\"created_at\":\"2020-06-25 15:46:41\",\"id\":98,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:46:41', '2020-06-25 07:46:41'),
(82, 'created', 99, 'App\\IncidentReport', 86, '{\"area_id\":\"2\",\"date_incident\":\"25-06-2020 15:50:07\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"4\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0050\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-25 15:50:27\",\"created_at\":\"2020-06-25 15:50:27\",\"id\":99,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:50:27', '2020-06-25 07:50:27'),
(83, 'created', 100, 'App\\IncidentReport', 86, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"25-06-2020 15:53:45\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"4\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0051\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-25 15:54:02\",\"created_at\":\"2020-06-25 15:54:02\",\"id\":100,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:54:02', '2020-06-25 07:54:02'),
(84, 'created', 101, 'App\\IncidentReport', 86, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"25-06-2020 15:53:45\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"4\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0052\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-25 15:59:27\",\"created_at\":\"2020-06-25 15:59:27\",\"id\":101,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 07:59:27', '2020-06-25 07:59:27'),
(85, 'created', 102, 'App\\IncidentReport', 86, '{\"area_id\":\"1\",\"ri_id\":null,\"date_incident\":\"25-06-2020 15:53:45\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"4\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0053\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-25 16:00:52\",\"created_at\":\"2020-06-25 16:00:52\",\"id\":102,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:00:52', '2020-06-25 08:00:52'),
(86, 'created', 103, 'App\\IncidentReport', 86, '{\"area_id\":\"1\",\"date_incident\":\"25-06-2020 16:01:30\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"4\",\"category_id\":\"4\",\"classify_id\":\"4\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0054\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-25 16:01:47\",\"created_at\":\"2020-06-25 16:01:47\",\"id\":103,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:01:47', '2020-06-25 08:01:47'),
(87, 'created', 104, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"25-06-2020 16:02:04\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"4\",\"category_id\":\"4\",\"classify_id\":\"1\",\"description\":\"IR-2020001\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0055\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 16:02:28\",\"created_at\":\"2020-06-25 16:02:28\",\"id\":104,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:02:28', '2020-06-25 08:02:28'),
(88, 'created', 105, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 16:02:48\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020001\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0056\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 16:03:08\",\"created_at\":\"2020-06-25 16:03:08\",\"id\":105,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:03:08', '2020-06-25 08:03:08'),
(89, 'created', 106, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 16:09:42\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0040\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 16:10:01\",\"created_at\":\"2020-06-25 16:10:01\",\"id\":106,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:10:01', '2020-06-25 08:10:01'),
(90, 'created', 107, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 16:10:56\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0041\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 16:12:15\",\"created_at\":\"2020-06-25 16:12:15\",\"id\":107,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:12:15', '2020-06-25 08:12:15'),
(91, 'created', 108, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 16:28:25\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"1\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0042\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 16:28:42\",\"created_at\":\"2020-06-25 16:28:42\",\"id\":108,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:28:42', '2020-06-25 08:28:42'),
(92, 'created', 109, 'App\\IncidentReport', 86, '{\"area_id\":\"1\",\"date_incident\":\"25-06-2020 16:30:30\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"4\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"IR-2020001\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0043\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-25 16:30:47\",\"created_at\":\"2020-06-25 16:30:47\",\"id\":109,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:30:47', '2020-06-25 08:30:47'),
(93, 'created', 110, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 16:33:48\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"1\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0044\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 16:34:14\",\"created_at\":\"2020-06-25 16:34:14\",\"id\":110,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:34:14', '2020-06-25 08:34:14'),
(94, 'created', 111, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 16:36:59\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0045\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 16:37:18\",\"created_at\":\"2020-06-25 16:37:18\",\"id\":111,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:37:18', '2020-06-25 08:37:18'),
(95, 'created', 112, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"25-06-2020 16:38:09\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020003\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0046\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-25 16:38:38\",\"created_at\":\"2020-06-25 16:38:38\",\"id\":112,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-25 08:38:38', '2020-06-25 08:38:38'),
(96, 'created', 113, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"26-06-2020 08:09:42\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020003\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0047\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-26 08:10:05\",\"created_at\":\"2020-06-26 08:10:05\",\"id\":113,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 00:10:05', '2020-06-26 00:10:05'),
(97, 'created', 114, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"26-06-2020 08:11:18\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0048\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-26 08:11:38\",\"created_at\":\"2020-06-26 08:11:38\",\"id\":114,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 00:11:38', '2020-06-26 00:11:38'),
(98, 'created', 115, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"26-06-2020 08:21:35\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"3\",\"description\":\"IR-2020003\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0049\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-26 08:21:55\",\"created_at\":\"2020-06-26 08:21:55\",\"id\":115,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 00:21:55', '2020-06-26 00:21:55'),
(99, 'created', 116, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"26-06-2020 08:22:56\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"IR-2020003\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0050\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-26 08:23:18\",\"created_at\":\"2020-06-26 08:23:18\",\"id\":116,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 00:23:18', '2020-06-26 00:23:18'),
(100, 'created', 117, 'App\\IncidentReport', 86, '{\"area_id\":\"1\",\"date_incident\":\"26-06-2020 09:44:53\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"4\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"IR-2020002\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0051\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-26 09:45:23\",\"created_at\":\"2020-06-26 09:45:23\",\"id\":117,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 01:45:23', '2020-06-26 01:45:23'),
(101, 'created', 118, 'App\\IncidentReport', 159, '{\"area_id\":\"1\",\"date_incident\":\"26-06-2020 15:09:24\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"4\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"test 789\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0052\",\"nama_pelapor_id\":159,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":159,\"reviewed_at\":\"2020-06-26 15:11:23\",\"updated_at\":\"2020-06-26 15:11:23\",\"created_at\":\"2020-06-26 15:11:23\",\"id\":118,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 07:11:23', '2020-06-26 07:11:23'),
(102, 'created', 119, 'App\\IncidentReport', 107, '{\"area_id\":\"1\",\"date_incident\":\"26-06-2020 15:34:59\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0053\",\"nama_pelapor_id\":107,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-26 15:37:03\",\"created_at\":\"2020-06-26 15:37:03\",\"id\":119,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 07:37:03', '2020-06-26 07:37:03'),
(103, 'created', 120, 'App\\IncidentReport', 107, '{\"area_id\":\"1\",\"date_incident\":\"26-06-2020 15:45:52\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"test 789\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0054\",\"nama_pelapor_id\":107,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-26 15:46:11\",\"created_at\":\"2020-06-26 15:46:11\",\"id\":120,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 07:46:11', '2020-06-26 07:46:11'),
(104, 'created', 121, 'App\\IncidentReport', 163, '{\"area_id\":\"1\",\"date_incident\":\"26-06-2020 17:09:50\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"test 7114\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0055\",\"nama_pelapor_id\":163,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":163,\"reviewed_at\":\"2020-06-26 17:10:21\",\"updated_at\":\"2020-06-26 17:10:21\",\"created_at\":\"2020-06-26 17:10:21\",\"id\":121,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-26 09:10:21', '2020-06-26 09:10:21'),
(105, 'created', 122, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"29-06-2020 09:39:34\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"3\",\"description\":\"Cerita Test 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0056\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-29 09:40:33\",\"created_at\":\"2020-06-29 09:40:33\",\"id\":122,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 01:40:33', '2020-06-29 01:40:33'),
(106, 'created', 123, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"29-06-2020 09:44:22\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"Cerita Test 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0057\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-29 09:44:59\",\"created_at\":\"2020-06-29 09:44:59\",\"id\":123,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 01:44:59', '2020-06-29 01:44:59'),
(107, 'created', 124, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"29-06-2020 09:44:22\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"Cerita Test 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0058\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-29 09:45:26\",\"created_at\":\"2020-06-29 09:45:26\",\"id\":124,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 01:45:27', '2020-06-29 01:45:27'),
(108, 'created', 125, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"29-06-2020 09:44:22\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"Cerita Test 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0059\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-29 09:45:34\",\"created_at\":\"2020-06-29 09:45:34\",\"id\":125,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 01:45:34', '2020-06-29 01:45:34'),
(109, 'updated', 125, 'App\\IncidentReport', 163, '{\"id\":125,\"no_laporan\":\"LI-0620-0059\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"Cerita Test 1\",\"reason\":\"Laporan asal-asalan\\r\\n\\r\\nUlangi buat incident Baru\",\"status\":\"Close\",\"date_incident\":\"29-06-2020 09:44:22\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-29 10:14:33\",\"acknowledged_at\":null,\"created_at\":\"2020-06-29 09:45:34\",\"updated_at\":\"2020-06-29 10:14:33\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":2,\"file\":[],\"photos\":[{\"id\":60,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":125,\"collection_name\":\"photos\",\"name\":\"5ef947bd5d53c_parse\",\"file_name\":\"5ef947bd5d53c_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":60,\"created_at\":\"2020-06-29 09:45:34\",\"updated_at\":\"2020-06-29 09:45:35\",\"url\":\"\\/storage\\/60\\/5ef947bd5d53c_parse.png\",\"thumbnail\":\"\\/storage\\/60\\/conversions\\/5ef947bd5d53c_parse-thumb.jpg\"}],\"media\":[{\"id\":60,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":125,\"collection_name\":\"photos\",\"name\":\"5ef947bd5d53c_parse\",\"file_name\":\"5ef947bd5d53c_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":60,\"created_at\":\"2020-06-29 09:45:34\",\"updated_at\":\"2020-06-29 09:45:35\",\"url\":\"\\/storage\\/60\\/5ef947bd5d53c_parse.png\",\"thumbnail\":\"\\/storage\\/60\\/conversions\\/5ef947bd5d53c_parse-thumb.jpg\"}]}', '::1', '2020-06-29 02:14:33', '2020-06-29 02:14:33'),
(110, 'updated', 124, 'App\\IncidentReport', 163, '{\"id\":124,\"no_laporan\":\"LI-0620-0058\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"Cerita Test 1\",\"reason\":\"Udah ku bilang asal-asalan ini\",\"status\":\"Close\",\"date_incident\":\"29-06-2020 09:44:22\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-29 10:15:11\",\"acknowledged_at\":null,\"created_at\":\"2020-06-29 09:45:26\",\"updated_at\":\"2020-06-29 10:15:11\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":2,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 02:15:12', '2020-06-29 02:15:12'),
(111, 'updated', 121, 'App\\IncidentReport', 158, '{\"id\":121,\"no_laporan\":\"LI-0620-0055\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 7114\",\"reason\":\"Nanti-nanti aja yah\\r\\n\\r\\noke.!!!!\",\"status\":\"Close\",\"date_incident\":\"26-06-2020 17:09:50\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-26 17:10:21\",\"acknowledged_at\":\"2020-06-29 10:23:16\",\"created_at\":\"2020-06-26 17:10:21\",\"updated_at\":\"2020-06-29 10:23:16\",\"deleted_at\":null,\"nama_pelapor_id\":163,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":1,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":57,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":121,\"collection_name\":\"photos\",\"name\":\"5ef5bb6b068a5_kasus8\",\"file_name\":\"5ef5bb6b068a5_kasus8.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":203349,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":57,\"created_at\":\"2020-06-26 17:10:21\",\"updated_at\":\"2020-06-26 17:10:21\",\"url\":\"\\/storage\\/57\\/5ef5bb6b068a5_kasus8.png\",\"thumbnail\":\"\\/storage\\/57\\/conversions\\/5ef5bb6b068a5_kasus8-thumb.jpg\"}],\"media\":[{\"id\":57,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":121,\"collection_name\":\"photos\",\"name\":\"5ef5bb6b068a5_kasus8\",\"file_name\":\"5ef5bb6b068a5_kasus8.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":203349,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":57,\"created_at\":\"2020-06-26 17:10:21\",\"updated_at\":\"2020-06-26 17:10:21\",\"url\":\"\\/storage\\/57\\/5ef5bb6b068a5_kasus8.png\",\"thumbnail\":\"\\/storage\\/57\\/conversions\\/5ef5bb6b068a5_kasus8-thumb.jpg\"}]}', '::1', '2020-06-29 02:23:16', '2020-06-29 02:23:16'),
(112, 'updated', 121, 'App\\IncidentReport', 158, '{\"id\":121,\"no_laporan\":\"LI-0620-0055\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 7114\",\"reason\":\"Nanti-nanti aja yah\\r\\n\\r\\noke.!!!!\",\"status\":\"Close\",\"date_incident\":\"26-06-2020 17:09:50\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-26 17:10:21\",\"acknowledged_at\":\"2020-06-29 10:24:56\",\"created_at\":\"2020-06-26 17:10:21\",\"updated_at\":\"2020-06-29 10:24:56\",\"deleted_at\":null,\"nama_pelapor_id\":163,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":1,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":57,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":121,\"collection_name\":\"photos\",\"name\":\"5ef5bb6b068a5_kasus8\",\"file_name\":\"5ef5bb6b068a5_kasus8.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":203349,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":57,\"created_at\":\"2020-06-26 17:10:21\",\"updated_at\":\"2020-06-26 17:10:21\",\"url\":\"\\/storage\\/57\\/5ef5bb6b068a5_kasus8.png\",\"thumbnail\":\"\\/storage\\/57\\/conversions\\/5ef5bb6b068a5_kasus8-thumb.jpg\"}],\"media\":[{\"id\":57,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":121,\"collection_name\":\"photos\",\"name\":\"5ef5bb6b068a5_kasus8\",\"file_name\":\"5ef5bb6b068a5_kasus8.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":203349,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":57,\"created_at\":\"2020-06-26 17:10:21\",\"updated_at\":\"2020-06-26 17:10:21\",\"url\":\"\\/storage\\/57\\/5ef5bb6b068a5_kasus8.png\",\"thumbnail\":\"\\/storage\\/57\\/conversions\\/5ef5bb6b068a5_kasus8-thumb.jpg\"}]}', '::1', '2020-06-29 02:24:57', '2020-06-29 02:24:57'),
(113, 'created', 126, 'App\\IncidentReport', 163, '{\"area_id\":\"1\",\"date_incident\":\"29-06-2020 10:26:40\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"Cerita Test 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0060\",\"nama_pelapor_id\":163,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":163,\"reviewed_at\":\"2020-06-29 10:27:06\",\"updated_at\":\"2020-06-29 10:27:06\",\"created_at\":\"2020-06-29 10:27:06\",\"id\":126,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 02:27:07', '2020-06-29 02:27:07'),
(114, 'updated', 126, 'App\\IncidentReport', 158, '{\"id\":126,\"no_laporan\":\"LI-0620-0060\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"Cerita Test 1\",\"reason\":\"Sudah dari tadi gk bisa dibilangi\",\"status\":\"Close\",\"date_incident\":\"29-06-2020 10:26:40\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-29 10:27:06\",\"acknowledged_at\":\"2020-06-29 10:27:43\",\"created_at\":\"2020-06-29 10:27:06\",\"updated_at\":\"2020-06-29 10:27:43\",\"deleted_at\":null,\"nama_pelapor_id\":163,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":4,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":61,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":126,\"collection_name\":\"photos\",\"name\":\"5ef9516c1675f_parse\",\"file_name\":\"5ef9516c1675f_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":61,\"created_at\":\"2020-06-29 10:27:07\",\"updated_at\":\"2020-06-29 10:27:08\",\"url\":\"\\/storage\\/61\\/5ef9516c1675f_parse.png\",\"thumbnail\":\"\\/storage\\/61\\/conversions\\/5ef9516c1675f_parse-thumb.jpg\"}],\"media\":[{\"id\":61,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":126,\"collection_name\":\"photos\",\"name\":\"5ef9516c1675f_parse\",\"file_name\":\"5ef9516c1675f_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":61,\"created_at\":\"2020-06-29 10:27:07\",\"updated_at\":\"2020-06-29 10:27:08\",\"url\":\"\\/storage\\/61\\/5ef9516c1675f_parse.png\",\"thumbnail\":\"\\/storage\\/61\\/conversions\\/5ef9516c1675f_parse-thumb.jpg\"}]}', '::1', '2020-06-29 02:27:43', '2020-06-29 02:27:43'),
(115, 'created', 127, 'App\\IncidentReport', 163, '{\"area_id\":\"1\",\"date_incident\":\"29-06-2020 10:28:29\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"2\",\"description\":\"RTE\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0061\",\"nama_pelapor_id\":163,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":163,\"reviewed_at\":\"2020-06-29 10:29:04\",\"updated_at\":\"2020-06-29 10:29:04\",\"created_at\":\"2020-06-29 10:29:04\",\"id\":127,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 02:29:05', '2020-06-29 02:29:05'),
(116, 'updated', 127, 'App\\IncidentReport', 158, '{\"id\":127,\"no_laporan\":\"LI-0620-0061\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"RTE\",\"reason\":\"ADuh capek kali dari tadi ku bilang juga apa\",\"status\":\"Close\",\"date_incident\":\"29-06-2020 10:28:29\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-29 10:29:04\",\"acknowledged_at\":\"2020-06-29 10:29:47\",\"created_at\":\"2020-06-29 10:29:04\",\"updated_at\":\"2020-06-29 10:29:47\",\"deleted_at\":null,\"nama_pelapor_id\":163,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":4,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":62,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":127,\"collection_name\":\"photos\",\"name\":\"5ef951d637969_parse\",\"file_name\":\"5ef951d637969_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":62,\"created_at\":\"2020-06-29 10:29:06\",\"updated_at\":\"2020-06-29 10:29:10\",\"url\":\"\\/storage\\/62\\/5ef951d637969_parse.png\",\"thumbnail\":\"\\/storage\\/62\\/conversions\\/5ef951d637969_parse-thumb.jpg\"}],\"media\":[{\"id\":62,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":127,\"collection_name\":\"photos\",\"name\":\"5ef951d637969_parse\",\"file_name\":\"5ef951d637969_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":62,\"created_at\":\"2020-06-29 10:29:06\",\"updated_at\":\"2020-06-29 10:29:10\",\"url\":\"\\/storage\\/62\\/5ef951d637969_parse.png\",\"thumbnail\":\"\\/storage\\/62\\/conversions\\/5ef951d637969_parse-thumb.jpg\"}]}', '::1', '2020-06-29 02:29:48', '2020-06-29 02:29:48'),
(117, 'created', 128, 'App\\IncidentReport', 163, '{\"area_id\":\"2\",\"date_incident\":\"29-06-2020 10:32:10\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"5\",\"classify_id\":\"3\",\"description\":\"Cerita Test 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0062\",\"nama_pelapor_id\":163,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":163,\"reviewed_at\":\"2020-06-29 10:32:34\",\"updated_at\":\"2020-06-29 10:32:34\",\"created_at\":\"2020-06-29 10:32:34\",\"id\":128,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 02:32:34', '2020-06-29 02:32:34'),
(118, 'updated', 128, 'App\\IncidentReport', 158, '{\"id\":128,\"no_laporan\":\"LI-0620-0062\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"Cerita Test 1\",\"reason\":\"Ada cerita tentang aku dan dia dan kita bersama saat dulu kala\",\"status\":\"Close\",\"date_incident\":\"29-06-2020 10:32:10\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-29 10:32:34\",\"acknowledged_at\":\"2020-06-29 10:33:22\",\"created_at\":\"2020-06-29 10:32:34\",\"updated_at\":\"2020-06-29 10:33:22\",\"deleted_at\":null,\"nama_pelapor_id\":163,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":5,\"classify_id\":3,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":2,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":63,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":128,\"collection_name\":\"photos\",\"name\":\"5ef952b5ac257_kasus8\",\"file_name\":\"5ef952b5ac257_kasus8.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":203349,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":63,\"created_at\":\"2020-06-29 10:32:34\",\"updated_at\":\"2020-06-29 10:32:37\",\"url\":\"\\/storage\\/63\\/5ef952b5ac257_kasus8.png\",\"thumbnail\":\"\\/storage\\/63\\/conversions\\/5ef952b5ac257_kasus8-thumb.jpg\"}],\"media\":[{\"id\":63,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":128,\"collection_name\":\"photos\",\"name\":\"5ef952b5ac257_kasus8\",\"file_name\":\"5ef952b5ac257_kasus8.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":203349,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":63,\"created_at\":\"2020-06-29 10:32:34\",\"updated_at\":\"2020-06-29 10:32:37\",\"url\":\"\\/storage\\/63\\/5ef952b5ac257_kasus8.png\",\"thumbnail\":\"\\/storage\\/63\\/conversions\\/5ef952b5ac257_kasus8-thumb.jpg\"}]}', '::1', '2020-06-29 02:33:22', '2020-06-29 02:33:22'),
(119, 'updated', 117, 'App\\IncidentReport', 164, '{\"id\":117,\"no_laporan\":\"LI-0620-0051\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"IR-2020002\",\"reason\":\"Sudah kamu makan dulu sana ada ayam curian tuh\",\"status\":\"Close\",\"date_incident\":\"26-06-2020 09:44:53\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-29 10:37:34\",\"acknowledged_at\":null,\"created_at\":\"2020-06-26 09:45:23\",\"updated_at\":\"2020-06-29 10:37:34\",\"deleted_at\":null,\"nama_pelapor_id\":86,\"reviewed_by_id\":164,\"dept_origin_id\":3,\"root_cause_id\":2,\"category_id\":3,\"classify_id\":2,\"dept_designated_id\":4,\"result_id\":3,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":53,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":117,\"collection_name\":\"photos\",\"name\":\"5ef5531adfc24_parse\",\"file_name\":\"5ef5531adfc24_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":53,\"created_at\":\"2020-06-26 09:45:23\",\"updated_at\":\"2020-06-26 09:45:24\",\"url\":\"\\/storage\\/53\\/5ef5531adfc24_parse.png\",\"thumbnail\":\"\\/storage\\/53\\/conversions\\/5ef5531adfc24_parse-thumb.jpg\"}],\"media\":[{\"id\":53,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":117,\"collection_name\":\"photos\",\"name\":\"5ef5531adfc24_parse\",\"file_name\":\"5ef5531adfc24_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":53,\"created_at\":\"2020-06-26 09:45:23\",\"updated_at\":\"2020-06-26 09:45:24\",\"url\":\"\\/storage\\/53\\/5ef5531adfc24_parse.png\",\"thumbnail\":\"\\/storage\\/53\\/conversions\\/5ef5531adfc24_parse-thumb.jpg\"}]}', '::1', '2020-06-29 02:37:35', '2020-06-29 02:37:35');
INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(120, 'updated', 80, 'App\\IncidentReport', 164, '{\"id\":80,\"no_laporan\":\"LI-0620-0035\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 7114\",\"reason\":\"Rejected ini bosque\",\"status\":\"Close\",\"date_incident\":\"23-06-2020 15:30:53\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-29 10:39:35\",\"acknowledged_at\":null,\"created_at\":\"2020-06-23 15:34:14\",\"updated_at\":\"2020-06-29 10:39:35\",\"deleted_at\":null,\"nama_pelapor_id\":162,\"reviewed_by_id\":164,\"dept_origin_id\":3,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":20,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":80,\"collection_name\":\"photos\",\"name\":\"5ef1b07451255_parse\",\"file_name\":\"5ef1b07451255_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":20,\"created_at\":\"2020-06-23 15:34:14\",\"updated_at\":\"2020-06-23 15:34:14\",\"url\":\"\\/storage\\/20\\/5ef1b07451255_parse.png\",\"thumbnail\":\"\\/storage\\/20\\/conversions\\/5ef1b07451255_parse-thumb.jpg\"}],\"media\":[{\"id\":20,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":80,\"collection_name\":\"photos\",\"name\":\"5ef1b07451255_parse\",\"file_name\":\"5ef1b07451255_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":20,\"created_at\":\"2020-06-23 15:34:14\",\"updated_at\":\"2020-06-23 15:34:14\",\"url\":\"\\/storage\\/20\\/5ef1b07451255_parse.png\",\"thumbnail\":\"\\/storage\\/20\\/conversions\\/5ef1b07451255_parse-thumb.jpg\"}]}', '::1', '2020-06-29 02:39:43', '2020-06-29 02:39:43'),
(121, 'created', 129, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"29-06-2020 10:42:46\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"4\",\"classify_id\":\"1\",\"description\":\"Cerita Test 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0063\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-06-29 10:43:14\",\"created_at\":\"2020-06-29 10:43:14\",\"id\":129,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 02:43:17', '2020-06-29 02:43:17'),
(122, 'created', 130, 'App\\IncidentReport', 86, '{\"area_id\":\"1\",\"date_incident\":\"29-06-2020 10:44:39\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"4\",\"category_id\":\"3\",\"classify_id\":\"4\",\"description\":\"Cerita Test 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0620-0064\",\"nama_pelapor_id\":86,\"dept_origin_id\":3,\"result_id\":4,\"updated_at\":\"2020-06-29 10:45:05\",\"created_at\":\"2020-06-29 10:45:05\",\"id\":130,\"file\":[],\"photos\":[],\"media\":[]}', '::1', '2020-06-29 02:45:07', '2020-06-29 02:45:07'),
(123, 'updated', 123, 'App\\IncidentReport', 163, '{\"id\":123,\"no_laporan\":\"LI-0620-0057\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"Cerita Test 1\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"29-06-2020 09:44:22\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-30 11:21:55\",\"acknowledged_at\":null,\"created_at\":\"2020-06-29 09:44:59\",\"updated_at\":\"2020-06-30 11:21:55\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":2,\"file\":[],\"photos\":[{\"id\":59,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":123,\"collection_name\":\"photos\",\"name\":\"5ef94781ab15b_kasus8\",\"file_name\":\"5ef94781ab15b_kasus8.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":203349,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":59,\"created_at\":\"2020-06-29 09:45:00\",\"updated_at\":\"2020-06-29 09:45:02\",\"url\":\"\\/storage\\/59\\/5ef94781ab15b_kasus8.png\",\"thumbnail\":\"\\/storage\\/59\\/conversions\\/5ef94781ab15b_kasus8-thumb.jpg\"}],\"media\":[{\"id\":59,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":123,\"collection_name\":\"photos\",\"name\":\"5ef94781ab15b_kasus8\",\"file_name\":\"5ef94781ab15b_kasus8.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":203349,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":59,\"created_at\":\"2020-06-29 09:45:00\",\"updated_at\":\"2020-06-29 09:45:02\",\"url\":\"\\/storage\\/59\\/5ef94781ab15b_kasus8.png\",\"thumbnail\":\"\\/storage\\/59\\/conversions\\/5ef94781ab15b_kasus8-thumb.jpg\"}]}', '::1', '2020-06-30 03:21:55', '2020-06-30 03:21:55'),
(124, 'updated', 129, 'App\\IncidentReport', 163, '{\"id\":129,\"no_laporan\":\"LI-0620-0063\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"Cerita Test 1\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"29-06-2020 10:42:46\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-06-30 11:32:46\",\"acknowledged_at\":null,\"created_at\":\"2020-06-29 10:43:14\",\"updated_at\":\"2020-06-30 11:32:46\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":163,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":4,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":2,\"file\":[],\"photos\":[{\"id\":64,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":129,\"collection_name\":\"photos\",\"name\":\"5ef9552f97c3c_parse\",\"file_name\":\"5ef9552f97c3c_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":64,\"created_at\":\"2020-06-29 10:43:21\",\"updated_at\":\"2020-06-29 10:43:23\",\"url\":\"\\/storage\\/64\\/5ef9552f97c3c_parse.png\",\"thumbnail\":\"\\/storage\\/64\\/conversions\\/5ef9552f97c3c_parse-thumb.jpg\"}],\"media\":[{\"id\":64,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":129,\"collection_name\":\"photos\",\"name\":\"5ef9552f97c3c_parse\",\"file_name\":\"5ef9552f97c3c_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":64,\"created_at\":\"2020-06-29 10:43:21\",\"updated_at\":\"2020-06-29 10:43:23\",\"url\":\"\\/storage\\/64\\/5ef9552f97c3c_parse.png\",\"thumbnail\":\"\\/storage\\/64\\/conversions\\/5ef9552f97c3c_parse-thumb.jpg\"}]}', '::1', '2020-06-30 03:32:46', '2020-06-30 03:32:46'),
(125, 'updated', 33, 'App\\IncidentReport', 162, '{\"id\":33,\"no_laporan\":\"LI-0520-0032\",\"perbaikan_awal\":null,\"location\":\"STG Pump\",\"perbaikan\":\"sudah di perbaiki dengan suatu alat\",\"pencegahan\":\"sudah di cegah dengan menambahkan alat\",\"description\":\"test incident 2\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-05-2020 10:47:32\",\"date_action\":\"20-07-2020 10:59:48\",\"assigned_at\":\"2020-06-03 11:24:23\",\"reviewed_at\":\"2020-06-03 11:10:34\",\"acknowledged_at\":\"2020-06-03 11:18:11\",\"created_at\":\"2020-05-14 10:47:36\",\"updated_at\":\"2020-07-20 10:59:54\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":162,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-20 02:59:54', '2020-07-20 02:59:54'),
(126, 'updated', 62, 'App\\IncidentReport', 161, '{\"id\":62,\"no_laporan\":\"LI-0620-0002\",\"perbaikan_awal\":\"WR23930\",\"location\":\"FT-9501\",\"perbaikan\":null,\"pencegahan\":null,\"description\":\"ketika proses pengapalan ft9501 tidak nunjuk\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"07-06-2020 11:18:31\",\"date_action\":null,\"assigned_at\":\"2020-07-20 11:49:17\",\"reviewed_at\":\"2020-06-08 09:59:33\",\"acknowledged_at\":\"2020-06-08 11:14:03\",\"created_at\":\"2020-06-07 23:04:54\",\"updated_at\":\"2020-07-20 11:49:17\",\"deleted_at\":null,\"nama_pelapor_id\":150,\"reviewed_by_id\":96,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":168,\"action_by_id\":\"162\",\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-20 03:49:17', '2020-07-20 03:49:17'),
(127, 'updated', 62, 'App\\IncidentReport', 162, '{\"id\":62,\"no_laporan\":\"LI-0620-0002\",\"perbaikan_awal\":\"WR23930\",\"location\":\"FT-9501\",\"perbaikan\":\"sudah ditambahkan apar\",\"pencegahan\":\"sudah di cegah dengan membungkus alat\",\"description\":\"ketika proses pengapalan ft9501 tidak nunjuk\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"07-06-2020 11:18:31\",\"date_action\":\"20-07-2020 11:52:09\",\"assigned_at\":\"2020-07-20 11:49:17\",\"reviewed_at\":\"2020-06-08 09:59:33\",\"acknowledged_at\":\"2020-06-08 11:14:03\",\"created_at\":\"2020-06-07 23:04:54\",\"updated_at\":\"2020-07-20 11:52:26\",\"deleted_at\":null,\"nama_pelapor_id\":150,\"reviewed_by_id\":96,\"dept_origin_id\":4,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":168,\"action_by_id\":162,\"assigned_to_id\":null,\"cr_id\":2,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-20 03:52:26', '2020-07-20 03:52:26'),
(128, 'updated', 53, 'App\\IncidentReport', 161, '{\"id\":53,\"no_laporan\":\"LI-0620-0019\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"test 7114\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 16:08:28\",\"date_action\":null,\"assigned_at\":\"2020-07-20 12:00:27\",\"reviewed_at\":\"2020-06-15 16:31:36\",\"acknowledged_at\":\"2020-06-15 16:35:57\",\"created_at\":\"2020-06-15 08:09:07\",\"updated_at\":\"2020-07-20 12:00:27\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":\"162\",\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":9,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":53,\"collection_name\":\"photos\",\"name\":\"5ee72c82244ed_parse\",\"file_name\":\"5ee72c82244ed_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":9,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:09:09\",\"url\":\"\\/storage\\/9\\/5ee72c82244ed_parse.png\",\"thumbnail\":\"\\/storage\\/9\\/conversions\\/5ee72c82244ed_parse-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":9,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":53,\"collection_name\":\"photos\",\"name\":\"5ee72c82244ed_parse\",\"file_name\":\"5ee72c82244ed_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":9,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:09:09\",\"url\":\"\\/storage\\/9\\/5ee72c82244ed_parse.png\",\"thumbnail\":\"\\/storage\\/9\\/conversions\\/5ee72c82244ed_parse-thumb.jpg\"}]}', '127.0.0.1', '2020-07-20 04:00:27', '2020-07-20 04:00:27'),
(129, 'updated', 53, 'App\\IncidentReport', 162, '{\"id\":53,\"no_laporan\":\"LI-0620-0019\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":\"sudah ditambahkan apar\",\"pencegahan\":\"sambungan lan dibungkus dengan alat\",\"description\":\"test 7114\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"15-06-2020 16:08:28\",\"date_action\":\"20-07-2020 12:00:54\",\"assigned_at\":\"2020-07-20 12:00:27\",\"reviewed_at\":\"2020-06-15 16:31:36\",\"acknowledged_at\":\"2020-06-15 16:35:57\",\"created_at\":\"2020-06-15 08:09:07\",\"updated_at\":\"2020-07-20 12:00:55\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":162,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[],\"photos\":[{\"id\":9,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":53,\"collection_name\":\"photos\",\"name\":\"5ee72c82244ed_parse\",\"file_name\":\"5ee72c82244ed_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":9,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:09:09\",\"url\":\"\\/storage\\/9\\/5ee72c82244ed_parse.png\",\"thumbnail\":\"\\/storage\\/9\\/conversions\\/5ee72c82244ed_parse-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":9,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":53,\"collection_name\":\"photos\",\"name\":\"5ee72c82244ed_parse\",\"file_name\":\"5ee72c82244ed_parse.png\",\"mime_type\":\"image\\/png\",\"disk\":\"public\",\"size\":6174,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":9,\"created_at\":\"2020-06-15 16:09:07\",\"updated_at\":\"2020-06-15 16:09:09\",\"url\":\"\\/storage\\/9\\/5ee72c82244ed_parse.png\",\"thumbnail\":\"\\/storage\\/9\\/conversions\\/5ee72c82244ed_parse-thumb.jpg\"}]}', '127.0.0.1', '2020-07-20 04:00:55', '2020-07-20 04:00:55'),
(130, 'created', 131, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"20-07-2020 15:43:18\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"Test incident 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0001\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-07-20 15:45:41\",\"created_at\":\"2020-07-20 15:45:41\",\"id\":131,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-20 07:45:41', '2020-07-20 07:45:41'),
(131, 'created', 132, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"20-07-2020 15:46:06\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"1\",\"description\":\"Test incident 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0002\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-07-20 15:46:33\",\"created_at\":\"2020-07-20 15:46:33\",\"id\":132,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-20 07:46:33', '2020-07-20 07:46:33'),
(132, 'created', 133, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"ri_id\":null,\"date_incident\":\"21-07-2020 16:33:55\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0003\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-07-21 16:34:27\",\"created_at\":\"2020-07-21 16:34:27\",\"id\":133,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-07-21 08:34:27', '2020-07-21 08:34:27'),
(133, 'created', 134, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"2\",\"date_incident\":\"21-07-2020 16:35:55\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"3\",\"description\":\"CER123\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0004\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-07-21 16:36:28\",\"created_at\":\"2020-07-21 16:36:28\",\"id\":134,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-07-21 08:36:28', '2020-07-21 08:36:28'),
(134, 'updated', 134, 'App\\IncidentReport', 159, '{\"id\":134,\"no_laporan\":\"LI-0720-0004\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"21-07-2020 16:35:55\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-07-23 09:22:38\",\"acknowledged_at\":null,\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-23 09:22:38\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":3,\"classify_id\":3,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":2,\"file\":[],\"photos\":[{\"id\":73,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":134,\"collection_name\":\"photos\",\"name\":\"5f16a8febcd08_shoe1\",\"file_name\":\"5f16a8febcd08_shoe1.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":153515,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":73,\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-21 16:36:29\",\"url\":\"\\/storage\\/73\\/5f16a8febcd08_shoe1.jpg\",\"thumbnail\":\"\\/storage\\/73\\/conversions\\/5f16a8febcd08_shoe1-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":73,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":134,\"collection_name\":\"photos\",\"name\":\"5f16a8febcd08_shoe1\",\"file_name\":\"5f16a8febcd08_shoe1.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":153515,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":73,\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-21 16:36:29\",\"url\":\"\\/storage\\/73\\/5f16a8febcd08_shoe1.jpg\",\"thumbnail\":\"\\/storage\\/73\\/conversions\\/5f16a8febcd08_shoe1-thumb.jpg\"}]}', '127.0.0.1', '2020-07-23 01:22:38', '2020-07-23 01:22:38'),
(135, 'updated', 134, 'App\\IncidentReport', 158, '{\"id\":134,\"no_laporan\":\"LI-0720-0004\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"21-07-2020 16:35:55\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-07-23 09:22:38\",\"acknowledged_at\":\"2020-07-23 09:23:01\",\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-23 09:23:01\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":3,\"classify_id\":3,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":2,\"file\":[],\"photos\":[{\"id\":73,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":134,\"collection_name\":\"photos\",\"name\":\"5f16a8febcd08_shoe1\",\"file_name\":\"5f16a8febcd08_shoe1.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":153515,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":73,\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-21 16:36:29\",\"url\":\"\\/storage\\/73\\/5f16a8febcd08_shoe1.jpg\",\"thumbnail\":\"\\/storage\\/73\\/conversions\\/5f16a8febcd08_shoe1-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":73,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":134,\"collection_name\":\"photos\",\"name\":\"5f16a8febcd08_shoe1\",\"file_name\":\"5f16a8febcd08_shoe1.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":153515,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":73,\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-21 16:36:29\",\"url\":\"\\/storage\\/73\\/5f16a8febcd08_shoe1.jpg\",\"thumbnail\":\"\\/storage\\/73\\/conversions\\/5f16a8febcd08_shoe1-thumb.jpg\"}]}', '127.0.0.1', '2020-07-23 01:23:01', '2020-07-23 01:23:01'),
(136, 'updated', 134, 'App\\IncidentReport', 161, '{\"id\":134,\"no_laporan\":\"LI-0720-0004\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"21-07-2020 16:35:55\",\"date_action\":null,\"assigned_at\":\"2020-07-23 09:23:38\",\"reviewed_at\":\"2020-07-23 09:22:38\",\"acknowledged_at\":\"2020-07-23 09:23:01\",\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-23 09:23:38\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":3,\"category_id\":3,\"classify_id\":3,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":\"167\",\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":2,\"file\":[],\"photos\":[{\"id\":73,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":134,\"collection_name\":\"photos\",\"name\":\"5f16a8febcd08_shoe1\",\"file_name\":\"5f16a8febcd08_shoe1.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":153515,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":73,\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-21 16:36:29\",\"url\":\"\\/storage\\/73\\/5f16a8febcd08_shoe1.jpg\",\"thumbnail\":\"\\/storage\\/73\\/conversions\\/5f16a8febcd08_shoe1-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":73,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":134,\"collection_name\":\"photos\",\"name\":\"5f16a8febcd08_shoe1\",\"file_name\":\"5f16a8febcd08_shoe1.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":153515,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":73,\"created_at\":\"2020-07-21 16:36:28\",\"updated_at\":\"2020-07-21 16:36:29\",\"url\":\"\\/storage\\/73\\/5f16a8febcd08_shoe1.jpg\",\"thumbnail\":\"\\/storage\\/73\\/conversions\\/5f16a8febcd08_shoe1-thumb.jpg\"}]}', '127.0.0.1', '2020-07-23 01:23:38', '2020-07-23 01:23:38'),
(137, 'created', 135, 'App\\IncidentReport', 59, '{\"area_id\":\"1\",\"date_incident\":\"26-07-2020 10:52:43\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"ada kebocoran\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0005\",\"nama_pelapor_id\":59,\"dept_origin_id\":8,\"result_id\":4,\"updated_at\":\"2020-07-27 10:53:40\",\"created_at\":\"2020-07-27 10:53:40\",\"id\":135,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-27 02:53:40', '2020-07-27 02:53:40'),
(138, 'updated', 135, 'App\\IncidentReport', 58, '{\"id\":135,\"no_laporan\":\"LI-0720-0005\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"ada kebocoran\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"26-07-2020 10:52:43\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":null,\"acknowledged_at\":\"2020-07-27 10:56:23\",\"created_at\":\"2020-07-27 10:53:40\",\"updated_at\":\"2020-07-27 10:56:23\",\"deleted_at\":null,\"nama_pelapor_id\":59,\"reviewed_by_id\":null,\"dept_origin_id\":8,\"root_cause_id\":4,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":58,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[{\"id\":75,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":135,\"collection_name\":\"file\",\"name\":\"5f1e41acbbcaa_db_irms\",\"file_name\":\"5f1e41acbbcaa_db_irms.sql\",\"mime_type\":\"text\\/x-Algol68\",\"disk\":\"public\",\"size\":260560,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":75,\"created_at\":\"2020-07-27 10:53:41\",\"updated_at\":\"2020-07-27 10:53:41\"}],\"photos\":[{\"id\":74,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":135,\"collection_name\":\"photos\",\"name\":\"5f1e418fee0cc_logokpi\",\"file_name\":\"5f1e418fee0cc_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":74,\"created_at\":\"2020-07-27 10:53:40\",\"updated_at\":\"2020-07-27 10:53:41\",\"url\":\"\\/storage\\/74\\/5f1e418fee0cc_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/74\\/conversions\\/5f1e418fee0cc_logokpi-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":74,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":135,\"collection_name\":\"photos\",\"name\":\"5f1e418fee0cc_logokpi\",\"file_name\":\"5f1e418fee0cc_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":74,\"created_at\":\"2020-07-27 10:53:40\",\"updated_at\":\"2020-07-27 10:53:41\",\"url\":\"\\/storage\\/74\\/5f1e418fee0cc_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/74\\/conversions\\/5f1e418fee0cc_logokpi-thumb.jpg\"},{\"id\":75,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":135,\"collection_name\":\"file\",\"name\":\"5f1e41acbbcaa_db_irms\",\"file_name\":\"5f1e41acbbcaa_db_irms.sql\",\"mime_type\":\"text\\/x-Algol68\",\"disk\":\"public\",\"size\":260560,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":75,\"created_at\":\"2020-07-27 10:53:41\",\"updated_at\":\"2020-07-27 10:53:41\"}]}', '127.0.0.1', '2020-07-27 02:56:23', '2020-07-27 02:56:23'),
(139, 'created', 136, 'App\\IncidentReport', 59, '{\"area_id\":\"1\",\"date_incident\":\"27-07-2020 11:22:25\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"Test incident 1\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0006\",\"nama_pelapor_id\":59,\"dept_origin_id\":8,\"result_id\":4,\"updated_at\":\"2020-07-27 11:23:57\",\"created_at\":\"2020-07-27 11:23:57\",\"id\":136,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-27 03:23:57', '2020-07-27 03:23:57'),
(140, 'updated', 136, 'App\\IncidentReport', 58, '{\"id\":136,\"no_laporan\":\"LI-0720-0006\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"Test incident 1\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"27-07-2020 11:22:25\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-07-27 11:34:18\",\"acknowledged_at\":null,\"created_at\":\"2020-07-27 11:23:57\",\"updated_at\":\"2020-07-27 11:34:18\",\"deleted_at\":null,\"nama_pelapor_id\":59,\"reviewed_by_id\":58,\"dept_origin_id\":8,\"root_cause_id\":2,\"category_id\":2,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[{\"id\":77,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":136,\"collection_name\":\"file\",\"name\":\"5f1e48c360651_db_irms\",\"file_name\":\"5f1e48c360651_db_irms.sql\",\"mime_type\":\"text\\/x-Algol68\",\"disk\":\"public\",\"size\":260560,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":77,\"created_at\":\"2020-07-27 11:23:57\",\"updated_at\":\"2020-07-27 11:23:57\"}],\"photos\":[{\"id\":76,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":136,\"collection_name\":\"photos\",\"name\":\"5f1e48ae31f34_logokpi\",\"file_name\":\"5f1e48ae31f34_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":76,\"created_at\":\"2020-07-27 11:23:57\",\"updated_at\":\"2020-07-27 11:23:57\",\"url\":\"\\/storage\\/76\\/5f1e48ae31f34_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/76\\/conversions\\/5f1e48ae31f34_logokpi-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":76,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":136,\"collection_name\":\"photos\",\"name\":\"5f1e48ae31f34_logokpi\",\"file_name\":\"5f1e48ae31f34_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":76,\"created_at\":\"2020-07-27 11:23:57\",\"updated_at\":\"2020-07-27 11:23:57\",\"url\":\"\\/storage\\/76\\/5f1e48ae31f34_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/76\\/conversions\\/5f1e48ae31f34_logokpi-thumb.jpg\"},{\"id\":77,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":136,\"collection_name\":\"file\",\"name\":\"5f1e48c360651_db_irms\",\"file_name\":\"5f1e48c360651_db_irms.sql\",\"mime_type\":\"text\\/x-Algol68\",\"disk\":\"public\",\"size\":260560,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":77,\"created_at\":\"2020-07-27 11:23:57\",\"updated_at\":\"2020-07-27 11:23:57\"}]}', '127.0.0.1', '2020-07-27 03:34:18', '2020-07-27 03:34:18'),
(141, 'created', 137, 'App\\IncidentReport', 59, '{\"area_id\":\"1\",\"date_incident\":\"27-07-2020 15:37:54\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"CER1234\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0007\",\"nama_pelapor_id\":59,\"dept_origin_id\":8,\"result_id\":4,\"updated_at\":\"2020-07-27 15:38:26\",\"created_at\":\"2020-07-27 15:38:26\",\"id\":137,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-27 07:38:26', '2020-07-27 07:38:26'),
(142, 'updated', 137, 'App\\IncidentReport', 58, '{\"id\":137,\"no_laporan\":\"LI-0720-0007\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER1234\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"27-07-2020 15:37:54\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":null,\"acknowledged_at\":\"2020-07-27 15:39:59\",\"created_at\":\"2020-07-27 15:38:26\",\"updated_at\":\"2020-07-27 15:39:59\",\"deleted_at\":null,\"nama_pelapor_id\":59,\"reviewed_by_id\":null,\"dept_origin_id\":8,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":58,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[{\"id\":79,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":137,\"collection_name\":\"file\",\"name\":\"5f1e846c68c71_db_irms\",\"file_name\":\"5f1e846c68c71_db_irms.sql\",\"mime_type\":\"text\\/x-Algol68\",\"disk\":\"public\",\"size\":260560,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":79,\"created_at\":\"2020-07-27 15:38:27\",\"updated_at\":\"2020-07-27 15:38:27\"}],\"photos\":[{\"id\":78,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":137,\"collection_name\":\"photos\",\"name\":\"5f1e845d2b67e_logokpi\",\"file_name\":\"5f1e845d2b67e_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":78,\"created_at\":\"2020-07-27 15:38:26\",\"updated_at\":\"2020-07-27 15:38:27\",\"url\":\"\\/storage\\/78\\/5f1e845d2b67e_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/78\\/conversions\\/5f1e845d2b67e_logokpi-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":78,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":137,\"collection_name\":\"photos\",\"name\":\"5f1e845d2b67e_logokpi\",\"file_name\":\"5f1e845d2b67e_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":78,\"created_at\":\"2020-07-27 15:38:26\",\"updated_at\":\"2020-07-27 15:38:27\",\"url\":\"\\/storage\\/78\\/5f1e845d2b67e_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/78\\/conversions\\/5f1e845d2b67e_logokpi-thumb.jpg\"},{\"id\":79,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":137,\"collection_name\":\"file\",\"name\":\"5f1e846c68c71_db_irms\",\"file_name\":\"5f1e846c68c71_db_irms.sql\",\"mime_type\":\"text\\/x-Algol68\",\"disk\":\"public\",\"size\":260560,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":79,\"created_at\":\"2020-07-27 15:38:27\",\"updated_at\":\"2020-07-27 15:38:27\"}]}', '127.0.0.1', '2020-07-27 07:39:59', '2020-07-27 07:39:59'),
(143, 'created', 138, 'App\\IncidentReport', 59, '{\"area_id\":\"1\",\"date_incident\":\"27-07-2020 15:50:38\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"1\",\"classify_id\":\"2\",\"description\":\"CER123\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0008\",\"nama_pelapor_id\":59,\"dept_origin_id\":8,\"result_id\":4,\"updated_at\":\"2020-07-27 15:51:19\",\"created_at\":\"2020-07-27 15:51:19\",\"id\":138,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-27 07:51:19', '2020-07-27 07:51:19'),
(144, 'updated', 138, 'App\\IncidentReport', 58, '{\"id\":138,\"no_laporan\":\"LI-0720-0008\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"27-07-2020 15:50:38\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-07-27 15:51:53\",\"acknowledged_at\":\"2020-07-27 15:51:53\",\"created_at\":\"2020-07-27 15:51:19\",\"updated_at\":\"2020-07-27 15:51:53\",\"deleted_at\":null,\"nama_pelapor_id\":59,\"reviewed_by_id\":58,\"dept_origin_id\":8,\"root_cause_id\":4,\"category_id\":1,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":58,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":null,\"file\":[{\"id\":81,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":138,\"collection_name\":\"file\",\"name\":\"5f1e877435f67_Email sementara\",\"file_name\":\"5f1e877435f67_Email-sementara.docx\",\"mime_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"disk\":\"public\",\"size\":113643,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":81,\"created_at\":\"2020-07-27 15:51:19\",\"updated_at\":\"2020-07-27 15:51:19\"}],\"photos\":[{\"id\":80,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":138,\"collection_name\":\"photos\",\"name\":\"5f1e8757779e8_logokpi\",\"file_name\":\"5f1e8757779e8_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":80,\"created_at\":\"2020-07-27 15:51:19\",\"updated_at\":\"2020-07-27 15:51:19\",\"url\":\"\\/storage\\/80\\/5f1e8757779e8_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/80\\/conversions\\/5f1e8757779e8_logokpi-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":80,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":138,\"collection_name\":\"photos\",\"name\":\"5f1e8757779e8_logokpi\",\"file_name\":\"5f1e8757779e8_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":80,\"created_at\":\"2020-07-27 15:51:19\",\"updated_at\":\"2020-07-27 15:51:19\",\"url\":\"\\/storage\\/80\\/5f1e8757779e8_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/80\\/conversions\\/5f1e8757779e8_logokpi-thumb.jpg\"},{\"id\":81,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":138,\"collection_name\":\"file\",\"name\":\"5f1e877435f67_Email sementara\",\"file_name\":\"5f1e877435f67_Email-sementara.docx\",\"mime_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"disk\":\"public\",\"size\":113643,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":81,\"created_at\":\"2020-07-27 15:51:19\",\"updated_at\":\"2020-07-27 15:51:19\"}]}', '127.0.0.1', '2020-07-27 07:51:53', '2020-07-27 07:51:53'),
(145, 'created', 139, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"27-07-2020 15:56:46\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"1\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0009\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-07-27 15:58:23\",\"created_at\":\"2020-07-27 15:58:23\",\"id\":139,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-27 07:58:23', '2020-07-27 07:58:23'),
(146, 'updated', 139, 'App\\IncidentReport', 159, '{\"id\":139,\"no_laporan\":\"LI-0720-0009\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"27-07-2020 15:56:46\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-07-27 15:59:53\",\"acknowledged_at\":null,\"created_at\":\"2020-07-27 15:58:23\",\"updated_at\":\"2020-07-27 15:59:53\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[{\"id\":83,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":139,\"collection_name\":\"file\",\"name\":\"5f1e89143cfdd_User Name\",\"file_name\":\"5f1e89143cfdd_User-Name.txt\",\"mime_type\":\"text\\/plain\",\"disk\":\"public\",\"size\":960,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":83,\"created_at\":\"2020-07-27 15:58:24\",\"updated_at\":\"2020-07-27 15:58:24\"}],\"photos\":[{\"id\":82,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":139,\"collection_name\":\"photos\",\"name\":\"5f1e88fe8606e_logokpi\",\"file_name\":\"5f1e88fe8606e_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":82,\"created_at\":\"2020-07-27 15:58:23\",\"updated_at\":\"2020-07-27 15:58:24\",\"url\":\"\\/storage\\/82\\/5f1e88fe8606e_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/82\\/conversions\\/5f1e88fe8606e_logokpi-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":82,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":139,\"collection_name\":\"photos\",\"name\":\"5f1e88fe8606e_logokpi\",\"file_name\":\"5f1e88fe8606e_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":82,\"created_at\":\"2020-07-27 15:58:23\",\"updated_at\":\"2020-07-27 15:58:24\",\"url\":\"\\/storage\\/82\\/5f1e88fe8606e_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/82\\/conversions\\/5f1e88fe8606e_logokpi-thumb.jpg\"},{\"id\":83,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":139,\"collection_name\":\"file\",\"name\":\"5f1e89143cfdd_User Name\",\"file_name\":\"5f1e89143cfdd_User-Name.txt\",\"mime_type\":\"text\\/plain\",\"disk\":\"public\",\"size\":960,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":83,\"created_at\":\"2020-07-27 15:58:24\",\"updated_at\":\"2020-07-27 15:58:24\"}]}', '127.0.0.1', '2020-07-27 07:59:53', '2020-07-27 07:59:53'),
(147, 'updated', 139, 'App\\IncidentReport', 158, '{\"id\":139,\"no_laporan\":\"LI-0720-0009\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"27-07-2020 15:56:46\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-07-27 15:59:53\",\"acknowledged_at\":\"2020-07-27 16:25:15\",\"created_at\":\"2020-07-27 15:58:23\",\"updated_at\":\"2020-07-27 16:25:15\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":1,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[{\"id\":83,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":139,\"collection_name\":\"file\",\"name\":\"5f1e89143cfdd_User Name\",\"file_name\":\"5f1e89143cfdd_User-Name.txt\",\"mime_type\":\"text\\/plain\",\"disk\":\"public\",\"size\":960,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":83,\"created_at\":\"2020-07-27 15:58:24\",\"updated_at\":\"2020-07-27 15:58:24\"}],\"photos\":[{\"id\":82,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":139,\"collection_name\":\"photos\",\"name\":\"5f1e88fe8606e_logokpi\",\"file_name\":\"5f1e88fe8606e_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":82,\"created_at\":\"2020-07-27 15:58:23\",\"updated_at\":\"2020-07-27 15:58:24\",\"url\":\"\\/storage\\/82\\/5f1e88fe8606e_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/82\\/conversions\\/5f1e88fe8606e_logokpi-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":82,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":139,\"collection_name\":\"photos\",\"name\":\"5f1e88fe8606e_logokpi\",\"file_name\":\"5f1e88fe8606e_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":82,\"created_at\":\"2020-07-27 15:58:23\",\"updated_at\":\"2020-07-27 15:58:24\",\"url\":\"\\/storage\\/82\\/5f1e88fe8606e_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/82\\/conversions\\/5f1e88fe8606e_logokpi-thumb.jpg\"},{\"id\":83,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":139,\"collection_name\":\"file\",\"name\":\"5f1e89143cfdd_User Name\",\"file_name\":\"5f1e89143cfdd_User-Name.txt\",\"mime_type\":\"text\\/plain\",\"disk\":\"public\",\"size\":960,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":83,\"created_at\":\"2020-07-27 15:58:24\",\"updated_at\":\"2020-07-27 15:58:24\"}]}', '127.0.0.1', '2020-07-27 08:25:15', '2020-07-27 08:25:15'),
(148, 'created', 140, 'App\\IncidentReport', 59, '{\"area_id\":\"1\",\"date_incident\":\"28-07-2020 08:48:01\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER1234\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0010\",\"nama_pelapor_id\":59,\"dept_origin_id\":8,\"result_id\":4,\"updated_at\":\"2020-07-28 08:50:12\",\"created_at\":\"2020-07-28 08:50:12\",\"id\":140,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-28 00:50:12', '2020-07-28 00:50:12'),
(149, 'created', 141, 'App\\IncidentReport', 59, '{\"area_id\":\"2\",\"date_incident\":\"28-07-2020 08:50:17\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"3\",\"description\":\"CER1234\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0011\",\"nama_pelapor_id\":59,\"dept_origin_id\":8,\"result_id\":4,\"updated_at\":\"2020-07-28 08:51:03\",\"created_at\":\"2020-07-28 08:51:03\",\"id\":141,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-07-28 00:51:03', '2020-07-28 00:51:03'),
(150, 'created', 142, 'App\\IncidentReport', 58, '{\"area_id\":\"1\",\"date_incident\":\"28-07-2020 11:26:21\",\"root_cause_id\":\"3\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"1\",\"description\":\"CER123\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0012\",\"nama_pelapor_id\":58,\"dept_origin_id\":8,\"result_id\":2,\"reviewed_by_id\":58,\"acknowledged_by_id\":58,\"reviewed_at\":\"2020-07-28 11:26:48\",\"acknowledged_at\":\"2020-07-28 11:26:48\",\"updated_at\":\"2020-07-28 11:26:48\",\"created_at\":\"2020-07-28 11:26:48\",\"id\":142,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-07-28 03:26:48', '2020-07-28 03:26:48'),
(151, 'updated', 141, 'App\\IncidentReport', 58, '{\"id\":141,\"no_laporan\":\"LI-0720-0011\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER1234\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"28-07-2020 08:50:17\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-07-28 11:29:49\",\"acknowledged_at\":\"2020-07-28 11:29:49\",\"created_at\":\"2020-07-28 08:51:03\",\"updated_at\":\"2020-07-28 11:29:49\",\"deleted_at\":null,\"nama_pelapor_id\":59,\"reviewed_by_id\":58,\"dept_origin_id\":8,\"root_cause_id\":3,\"category_id\":2,\"classify_id\":3,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":58,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":2,\"ri_id\":null,\"file\":[{\"id\":87,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":141,\"collection_name\":\"file\",\"name\":\"5f1f7671656ba_db_irms\",\"file_name\":\"5f1f7671656ba_db_irms.sql\",\"mime_type\":\"text\\/x-Algol68\",\"disk\":\"public\",\"size\":260560,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":87,\"created_at\":\"2020-07-28 08:51:04\",\"updated_at\":\"2020-07-28 08:51:04\"}],\"photos\":[{\"id\":86,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":141,\"collection_name\":\"photos\",\"name\":\"5f1f76569bba0_logokpi\",\"file_name\":\"5f1f76569bba0_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":86,\"created_at\":\"2020-07-28 08:51:03\",\"updated_at\":\"2020-07-28 08:51:04\",\"url\":\"\\/storage\\/86\\/5f1f76569bba0_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/86\\/conversions\\/5f1f76569bba0_logokpi-thumb.jpg\"}],\"file_investigation\":[],\"media\":[{\"id\":86,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":141,\"collection_name\":\"photos\",\"name\":\"5f1f76569bba0_logokpi\",\"file_name\":\"5f1f76569bba0_logokpi.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"size\":11218,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true}},\"responsive_images\":[],\"order_column\":86,\"created_at\":\"2020-07-28 08:51:03\",\"updated_at\":\"2020-07-28 08:51:04\",\"url\":\"\\/storage\\/86\\/5f1f76569bba0_logokpi.jpg\",\"thumbnail\":\"\\/storage\\/86\\/conversions\\/5f1f76569bba0_logokpi-thumb.jpg\"},{\"id\":87,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":141,\"collection_name\":\"file\",\"name\":\"5f1f7671656ba_db_irms\",\"file_name\":\"5f1f7671656ba_db_irms.sql\",\"mime_type\":\"text\\/x-Algol68\",\"disk\":\"public\",\"size\":260560,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":87,\"created_at\":\"2020-07-28 08:51:04\",\"updated_at\":\"2020-07-28 08:51:04\"}]}', '127.0.0.1', '2020-07-28 03:29:49', '2020-07-28 03:29:49'),
(152, 'created', 1, 'App\\DistributionIncident', 160, '{\"ir_id\":3,\"updated_at\":\"2020-07-30 16:27:53\",\"created_at\":\"2020-07-30 16:27:53\",\"id\":1}', '::1', '2020-07-30 08:27:53', '2020-07-30 08:27:53'),
(153, 'created', 143, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"ri_id\":\"1\",\"date_incident\":\"30-07-2020 16:27:51\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0720-0013\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-07-30 16:27:53\",\"created_at\":\"2020-07-30 16:27:53\",\"id\":143,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-07-30 08:27:53', '2020-07-30 08:27:53'),
(154, 'created', 144, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"03-08-2020 11:17:13\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0001\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-08-03 11:17:47\",\"created_at\":\"2020-08-03 11:17:47\",\"id\":144,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 03:17:47', '2020-08-03 03:17:47');
INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(155, 'created', 145, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"03-08-2020 11:17:13\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0002\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-08-03 11:21:22\",\"created_at\":\"2020-08-03 11:21:22\",\"id\":145,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 03:21:22', '2020-08-03 03:21:22'),
(156, 'created', 146, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"03-08-2020 11:21:21\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0003\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-08-03 11:22:26\",\"created_at\":\"2020-08-03 11:22:26\",\"id\":146,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 03:22:26', '2020-08-03 03:22:26'),
(157, 'created', 147, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"03-08-2020 11:22:56\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0004\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-08-03 11:22:58\",\"created_at\":\"2020-08-03 11:22:58\",\"id\":147,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 03:22:58', '2020-08-03 03:22:58'),
(158, 'created', 2, 'App\\DistributionIncident', 160, '{\"ir_id\":147,\"status\":\"Open\",\"name_id\":160,\"updated_at\":\"2020-08-03 11:22:58\",\"created_at\":\"2020-08-03 11:22:58\",\"id\":2}', '127.0.0.1', '2020-08-03 03:22:58', '2020-08-03 03:22:58'),
(159, 'created', 148, 'App\\IncidentReport', 160, '{\"area_id\":\"2\",\"ri_id\":\"1\",\"date_incident\":\"03-08-2020 11:36:35\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0005\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-08-03 11:37:07\",\"created_at\":\"2020-08-03 11:37:07\",\"id\":148,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 03:37:07', '2020-08-03 03:37:07'),
(160, 'created', 3, 'App\\DistributionIncident', 160, '{\"ir_id\":148,\"status\":\"Open\",\"name_id\":160,\"updated_at\":\"2020-08-03 11:37:07\",\"created_at\":\"2020-08-03 11:37:07\",\"id\":3}', '127.0.0.1', '2020-08-03 03:37:07', '2020-08-03 03:37:07'),
(161, 'created', 149, 'App\\IncidentReport', 160, '{\"area_id\":\"1\",\"ri_id\":\"1\",\"date_incident\":\"03-08-2020 11:43:47\",\"root_cause_id\":\"1\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0006\",\"nama_pelapor_id\":160,\"dept_origin_id\":4,\"result_id\":4,\"updated_at\":\"2020-08-03 11:44:07\",\"created_at\":\"2020-08-03 11:44:07\",\"id\":149,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 03:44:07', '2020-08-03 03:44:07'),
(162, 'created', 4, 'App\\DistributionIncident', 160, '{\"ir_id\":149,\"status\":\"Open\",\"name_id\":160,\"updated_at\":\"2020-08-03 11:44:07\",\"created_at\":\"2020-08-03 11:44:07\",\"id\":4}', '127.0.0.1', '2020-08-03 03:44:07', '2020-08-03 03:44:07'),
(163, 'updated', 4, 'App\\DistributionIncident', 160, '{\"ir_id\":149,\"status\":\"Open\",\"name_id\":160,\"updated_at\":\"2020-08-03 11:44:07\",\"created_at\":\"2020-08-03 11:44:07\",\"id\":4,\"description\":\"lappet\"}', '127.0.0.1', '2020-08-03 03:44:07', '2020-08-03 03:44:07'),
(164, 'created', 150, 'App\\IncidentReport', 159, '{\"area_id\":\"1\",\"date_incident\":\"03-08-2020 14:48:57\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0007\",\"nama_pelapor_id\":159,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":159,\"reviewed_at\":\"2020-08-03 14:49:28\",\"updated_at\":\"2020-08-03 14:49:28\",\"created_at\":\"2020-08-03 14:49:28\",\"id\":150,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 06:49:28', '2020-08-03 06:49:28'),
(165, 'created', 5, 'App\\DistributionIncident', 159, '{\"ir_id\":150,\"result_id\":4,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 14:49:28\",\"created_at\":\"2020-08-03 14:49:28\",\"id\":5}', '127.0.0.1', '2020-08-03 06:49:28', '2020-08-03 06:49:28'),
(166, 'created', 6, 'App\\DistributionIncident', 159, '{\"ir_id\":150,\"result_id\":1,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 14:49:28\",\"created_at\":\"2020-08-03 14:49:28\",\"id\":6}', '127.0.0.1', '2020-08-03 06:49:28', '2020-08-03 06:49:28'),
(167, 'created', 151, 'App\\IncidentReport', 159, '{\"area_id\":\"1\",\"date_incident\":\"03-08-2020 15:24:47\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0008\",\"nama_pelapor_id\":159,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":159,\"reviewed_at\":\"2020-08-03 15:27:20\",\"updated_at\":\"2020-08-03 15:27:20\",\"created_at\":\"2020-08-03 15:27:20\",\"id\":151,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 07:27:20', '2020-08-03 07:27:20'),
(168, 'created', 7, 'App\\DistributionIncident', 159, '{\"ir_id\":151,\"result_id\":4,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 15:27:20\",\"created_at\":\"2020-08-03 15:27:20\",\"id\":7}', '127.0.0.1', '2020-08-03 07:27:20', '2020-08-03 07:27:20'),
(169, 'created', 8, 'App\\DistributionIncident', 159, '{\"ir_id\":151,\"result_id\":1,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 15:27:20\",\"created_at\":\"2020-08-03 15:27:20\",\"id\":8}', '127.0.0.1', '2020-08-03 07:27:20', '2020-08-03 07:27:20'),
(170, 'created', 152, 'App\\IncidentReport', 159, '{\"area_id\":\"1\",\"date_incident\":\"03-08-2020 16:12:41\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0009\",\"nama_pelapor_id\":159,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":159,\"reviewed_at\":\"2020-08-03 16:13:03\",\"updated_at\":\"2020-08-03 16:13:03\",\"created_at\":\"2020-08-03 16:13:03\",\"id\":152,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 08:13:04', '2020-08-03 08:13:04'),
(171, 'created', 9, 'App\\DistributionIncident', 159, '{\"ir_id\":152,\"result_id\":4,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 16:13:04\",\"created_at\":\"2020-08-03 16:13:04\",\"id\":9}', '127.0.0.1', '2020-08-03 08:13:04', '2020-08-03 08:13:04'),
(172, 'created', 153, 'App\\IncidentReport', 159, '{\"area_id\":\"1\",\"date_incident\":\"03-08-2020 16:12:41\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0010\",\"nama_pelapor_id\":159,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":159,\"reviewed_at\":\"2020-08-03 16:13:50\",\"updated_at\":\"2020-08-03 16:13:50\",\"created_at\":\"2020-08-03 16:13:50\",\"id\":153,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 08:13:50', '2020-08-03 08:13:50'),
(173, 'created', 10, 'App\\DistributionIncident', 159, '{\"ir_id\":153,\"result_id\":4,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 16:13:50\",\"created_at\":\"2020-08-03 16:13:50\",\"id\":10}', '127.0.0.1', '2020-08-03 08:13:50', '2020-08-03 08:13:50'),
(174, 'created', 154, 'App\\IncidentReport', 159, '{\"area_id\":\"1\",\"date_incident\":\"03-08-2020 16:15:27\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"CER123DR\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0011\",\"nama_pelapor_id\":159,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":159,\"reviewed_at\":\"2020-08-03 16:15:29\",\"updated_at\":\"2020-08-03 16:15:29\",\"created_at\":\"2020-08-03 16:15:29\",\"id\":154,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 08:15:29', '2020-08-03 08:15:29'),
(175, 'created', 11, 'App\\DistributionIncident', 159, '{\"ir_id\":154,\"result_id\":4,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 16:15:29\",\"created_at\":\"2020-08-03 16:15:29\",\"id\":11}', '127.0.0.1', '2020-08-03 08:15:29', '2020-08-03 08:15:29'),
(176, 'created', 12, 'App\\DistributionIncident', 159, '{\"ir_id\":154,\"result_id\":1,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 16:15:29\",\"created_at\":\"2020-08-03 16:15:29\",\"id\":12}', '127.0.0.1', '2020-08-03 08:15:29', '2020-08-03 08:15:29'),
(177, 'created', 155, 'App\\IncidentReport', 159, '{\"area_id\":\"1\",\"date_incident\":\"03-08-2020 16:15:49\",\"root_cause_id\":\"2\",\"dept_designated_id\":\"3\",\"category_id\":\"2\",\"classify_id\":\"2\",\"description\":\"CER1234\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0012\",\"nama_pelapor_id\":159,\"dept_origin_id\":4,\"result_id\":1,\"reviewed_by_id\":159,\"reviewed_at\":\"2020-08-03 16:16:10\",\"updated_at\":\"2020-08-03 16:16:10\",\"created_at\":\"2020-08-03 16:16:10\",\"id\":155,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 08:16:10', '2020-08-03 08:16:10'),
(178, 'created', 13, 'App\\DistributionIncident', 159, '{\"ir_id\":155,\"result_id\":4,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 16:16:10\",\"created_at\":\"2020-08-03 16:16:10\",\"id\":13}', '127.0.0.1', '2020-08-03 08:16:10', '2020-08-03 08:16:10'),
(179, 'created', 14, 'App\\DistributionIncident', 159, '{\"ir_id\":155,\"result_id\":1,\"status\":\"Open\",\"name_id\":159,\"updated_at\":\"2020-08-03 16:16:10\",\"created_at\":\"2020-08-03 16:16:10\",\"id\":14}', '127.0.0.1', '2020-08-03 08:16:10', '2020-08-03 08:16:10'),
(180, 'updated', 149, 'App\\IncidentReport', 159, '{\"id\":149,\"no_laporan\":\"LI-0820-0006\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"03-08-2020 11:43:47\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-08-03 16:47:57\",\"acknowledged_at\":null,\"created_at\":\"2020-08-03 11:44:07\",\"updated_at\":\"2020-08-03 16:47:57\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":1,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-03 08:47:57', '2020-08-03 08:47:57'),
(181, 'created', 15, 'App\\DistributionIncident', 159, '{\"ir_id\":149,\"name_id\":159,\"result_id\":1,\"status\":\"Open\",\"updated_at\":\"2020-08-03 16:47:57\",\"created_at\":\"2020-08-03 16:47:57\",\"id\":15}', '127.0.0.1', '2020-08-03 08:47:57', '2020-08-03 08:47:57'),
(182, 'updated', 149, 'App\\IncidentReport', 158, '{\"id\":149,\"no_laporan\":\"LI-0820-0006\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"03-08-2020 11:43:47\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-08-03 16:47:57\",\"acknowledged_at\":\"2020-08-05 10:18:33\",\"created_at\":\"2020-08-03 11:44:07\",\"updated_at\":\"2020-08-05 10:18:33\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":2,\"acknowledged_by_id\":158,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-08-05 02:18:33', '2020-08-05 02:18:33'),
(183, 'created', 16, 'App\\DistributionIncident', 158, '{\"ir_id\":149,\"name_id\":158,\"result_id\":2,\"description\":\"Approved\",\"status\":\"Open\",\"updated_at\":\"2020-08-05 10:18:33\",\"created_at\":\"2020-08-05 10:18:33\",\"id\":16}', '::1', '2020-08-05 02:18:33', '2020-08-05 02:18:33'),
(184, 'updated', 149, 'App\\IncidentReport', 161, '{\"id\":149,\"no_laporan\":\"LI-0820-0006\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"03-08-2020 11:43:47\",\"date_action\":null,\"assigned_at\":\"2020-08-05 10:20:11\",\"reviewed_at\":\"2020-08-03 16:47:57\",\"acknowledged_at\":\"2020-08-05 10:18:33\",\"created_at\":\"2020-08-03 11:44:07\",\"updated_at\":\"2020-08-05 10:20:11\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":\"164\",\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-08-05 02:20:11', '2020-08-05 02:20:11'),
(185, 'updated', 149, 'App\\IncidentReport', 161, '{\"id\":149,\"no_laporan\":\"LI-0820-0006\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"03-08-2020 11:43:47\",\"date_action\":null,\"assigned_at\":\"2020-08-05 10:21:25\",\"reviewed_at\":\"2020-08-03 16:47:57\",\"acknowledged_at\":\"2020-08-05 10:18:33\",\"created_at\":\"2020-08-03 11:44:07\",\"updated_at\":\"2020-08-05 10:21:25\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":\"164\",\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-08-05 02:21:25', '2020-08-05 02:21:25'),
(186, 'updated', 149, 'App\\IncidentReport', 161, '{\"id\":149,\"no_laporan\":\"LI-0820-0006\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"03-08-2020 11:43:47\",\"date_action\":null,\"assigned_at\":\"2020-08-05 10:22:10\",\"reviewed_at\":\"2020-08-03 16:47:57\",\"acknowledged_at\":\"2020-08-05 10:18:33\",\"created_at\":\"2020-08-03 11:44:07\",\"updated_at\":\"2020-08-05 10:22:10\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":\"164\",\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-08-05 02:22:10', '2020-08-05 02:22:10'),
(187, 'created', 17, 'App\\DistributionIncident', 161, '{\"ir_id\":149,\"name_id\":161,\"description\":\"Assigned\",\"result_id\":5,\"status\":\"Open\",\"updated_at\":\"2020-08-05 10:22:10\",\"created_at\":\"2020-08-05 10:22:10\",\"id\":17}', '::1', '2020-08-05 02:22:10', '2020-08-05 02:22:10'),
(188, 'updated', 149, 'App\\IncidentReport', 164, '{\"id\":149,\"no_laporan\":\"LI-0820-0006\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":\"sudah di perbaiki dengan suatu alat\",\"pencegahan\":\"sudah di cegah dengan menambahkan alat\",\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Open\",\"date_incident\":\"03-08-2020 11:43:47\",\"date_action\":\"05-08-2020 10:23:57\",\"assigned_at\":\"2020-08-05 10:22:10\",\"reviewed_at\":\"2020-08-03 16:47:57\",\"acknowledged_at\":\"2020-08-05 10:18:33\",\"created_at\":\"2020-08-03 11:44:07\",\"updated_at\":\"2020-08-05 10:24:04\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":5,\"acknowledged_by_id\":158,\"action_by_id\":164,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '::1', '2020-08-05 02:24:04', '2020-08-05 02:24:04'),
(189, 'updated', 149, 'App\\IncidentReport', 164, '{\"id\":149,\"no_laporan\":\"LI-0820-0006\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":\"sudah di perbaiki dengan suatu alat\",\"pencegahan\":\"sudah di cegah dengan menambahkan alat\",\"description\":\"CER123DR\",\"reason\":null,\"status\":\"Close\",\"date_incident\":\"03-08-2020 11:43:47\",\"date_action\":\"05-08-2020 10:23:57\",\"assigned_at\":\"2020-08-05 10:22:10\",\"reviewed_at\":\"2020-08-03 16:47:57\",\"acknowledged_at\":\"2020-08-05 10:18:33\",\"created_at\":\"2020-08-03 11:44:07\",\"updated_at\":\"2020-08-05 10:24:11\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":1,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":6,\"acknowledged_by_id\":158,\"action_by_id\":164,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[],\"photos\":[],\"file_investigation\":[{\"id\":90,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":149,\"collection_name\":\"file_investigation\",\"name\":\"5f2a18430a3af_kpi\",\"file_name\":\"5f2a18430a3af_kpi.psd\",\"mime_type\":\"image\\/vnd.adobe.photoshop\",\"disk\":\"public\",\"size\":252920,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":90,\"created_at\":\"2020-08-05 10:24:04\",\"updated_at\":\"2020-08-05 10:24:04\"}],\"media\":[{\"id\":90,\"model_type\":\"App\\\\IncidentReport\",\"model_id\":149,\"collection_name\":\"file_investigation\",\"name\":\"5f2a18430a3af_kpi\",\"file_name\":\"5f2a18430a3af_kpi.psd\",\"mime_type\":\"image\\/vnd.adobe.photoshop\",\"disk\":\"public\",\"size\":252920,\"manipulations\":[],\"custom_properties\":[],\"responsive_images\":[],\"order_column\":90,\"created_at\":\"2020-08-05 10:24:04\",\"updated_at\":\"2020-08-05 10:24:04\"}]}', '::1', '2020-08-05 02:24:11', '2020-08-05 02:24:11'),
(190, 'created', 18, 'App\\DistributionIncident', 164, '{\"ir_id\":149,\"name_id\":164,\"description\":\"Handled\",\"result_id\":6,\"status\":\"Close\",\"updated_at\":\"2020-08-05 10:24:11\",\"created_at\":\"2020-08-05 10:24:11\",\"id\":18}', '::1', '2020-08-05 02:24:11', '2020-08-05 02:24:11'),
(191, 'created', 156, 'App\\IncidentReport', 158, '{\"area_id\":\"2\",\"date_incident\":\"05-08-2020 14:29:33\",\"root_cause_id\":\"4\",\"dept_designated_id\":\"3\",\"category_id\":\"3\",\"classify_id\":\"2\",\"description\":\"CER123\",\"status\":\"Open\",\"no_laporan\":\"LI-0820-0013\",\"nama_pelapor_id\":158,\"dept_origin_id\":4,\"result_id\":2,\"reviewed_by_id\":158,\"acknowledged_by_id\":158,\"reviewed_at\":\"2020-08-05 14:30:04\",\"acknowledged_at\":\"2020-08-05 14:30:04\",\"updated_at\":\"2020-08-05 14:30:04\",\"created_at\":\"2020-08-05 14:30:04\",\"id\":156,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-05 06:30:04', '2020-08-05 06:30:04'),
(192, 'created', 19, 'App\\DistributionIncident', 158, '{\"ir_id\":156,\"result_id\":4,\"status\":\"Open\",\"description\":\"Created\",\"name_id\":158,\"updated_at\":\"2020-08-05 14:30:04\",\"created_at\":\"2020-08-05 14:30:04\",\"id\":19}', '127.0.0.1', '2020-08-05 06:30:04', '2020-08-05 06:30:04'),
(193, 'created', 20, 'App\\DistributionIncident', 158, '{\"ir_id\":156,\"result_id\":1,\"status\":\"Open\",\"description\":\"Approved\",\"name_id\":158,\"updated_at\":\"2020-08-05 14:30:04\",\"created_at\":\"2020-08-05 14:30:04\",\"id\":20}', '127.0.0.1', '2020-08-05 06:30:04', '2020-08-05 06:30:04'),
(194, 'created', 21, 'App\\DistributionIncident', 158, '{\"ir_id\":156,\"result_id\":2,\"status\":\"Open\",\"description\":\"Approved\",\"name_id\":158,\"updated_at\":\"2020-08-05 14:30:04\",\"created_at\":\"2020-08-05 14:30:04\",\"id\":21}', '127.0.0.1', '2020-08-05 06:30:04', '2020-08-05 06:30:04'),
(195, 'updated', 147, 'App\\IncidentReport', 159, '{\"id\":147,\"no_laporan\":\"LI-0820-0004\",\"perbaikan_awal\":null,\"location\":null,\"perbaikan\":null,\"pencegahan\":null,\"description\":\"CER123DR\",\"reason\":\"Jelek Laporanmu\",\"status\":\"Close\",\"date_incident\":\"03-08-2020 11:22:56\",\"date_action\":null,\"assigned_at\":null,\"reviewed_at\":\"2020-08-05 15:11:24\",\"acknowledged_at\":null,\"created_at\":\"2020-08-03 11:22:58\",\"updated_at\":\"2020-08-05 15:11:24\",\"deleted_at\":null,\"nama_pelapor_id\":160,\"reviewed_by_id\":159,\"dept_origin_id\":4,\"root_cause_id\":2,\"category_id\":2,\"classify_id\":2,\"dept_designated_id\":3,\"result_id\":3,\"acknowledged_by_id\":null,\"action_by_id\":null,\"assigned_to_id\":null,\"cr_id\":null,\"area_id\":1,\"ri_id\":1,\"file\":[],\"photos\":[],\"file_investigation\":[],\"media\":[]}', '127.0.0.1', '2020-08-05 07:11:24', '2020-08-05 07:11:24'),
(196, 'created', 22, 'App\\DistributionIncident', 159, '{\"ir_id\":147,\"result_id\":3,\"status\":\"Close\",\"reason\":\"Jelek Laporanmu\",\"description\":\"Rejected\",\"name_id\":159,\"updated_at\":\"2020-08-05 15:11:24\",\"created_at\":\"2020-08-05 15:11:24\",\"id\":22}', '127.0.0.1', '2020-08-05 07:11:24', '2020-08-05 07:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `category_incidents`
--

CREATE TABLE `category_incidents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_incidents`
--

INSERT INTO `category_incidents` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Manusia', '2020-01-26 08:49:53', '2020-01-26 08:49:53', NULL),
(2, 'Asset/Produksi', '2020-01-26 08:50:00', '2020-01-26 08:50:00', NULL),
(3, 'Lingkungan', '2020-01-26 08:50:09', '2020-01-26 08:50:09', NULL),
(4, 'Reputasi', '2020-01-26 08:50:18', '2020-01-26 08:50:18', NULL),
(5, 'Security Fisik', '2020-01-26 08:50:24', '2020-01-26 08:50:24', NULL),
(6, 'Security Siber', '2020-01-26 08:50:30', '2020-01-26 08:50:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chemical_releases`
--

CREATE TABLE `chemical_releases` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chemical_releases`
--

INSERT INTO `chemical_releases` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Yes', '2020-05-05 10:01:43', '2020-05-05 10:01:43', NULL),
(2, 'No', '2020-05-05 10:01:50', '2020-05-05 10:01:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classification_details`
--

CREATE TABLE `classification_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `classification_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classification_details`
--

INSERT INTO `classification_details` (`id`, `description`, `created_at`, `updated_at`, `deleted_at`, `category_id`, `classification_id`) VALUES
(1, '<p>First aid case (tanpa tindakan medis)</p>', '2020-01-29 19:15:11', '2020-01-29 19:16:21', NULL, 1, 1),
(2, '<p>First aid case (ada tindakan medis)</p>', '2020-01-29 19:15:24', '2020-01-29 19:15:24', NULL, 1, 2),
(3, '<p>Medical treatment case</p>', '2020-01-29 19:15:36', '2020-01-29 19:15:36', NULL, 1, 3),
(4, '<p>Lost workday case atau Cacat Permanen</p>', '2020-01-29 19:15:52', '2020-01-29 19:15:52', NULL, 1, 4),
(5, '<p>Kematian (1 atau lebih orang)</p>', '2020-01-29 19:16:06', '2020-01-29 19:16:06', NULL, 1, 5),
(6, '<p>Pabrik beroperasi normal dengan kondisi gangguan tidak berarti</p>', '2020-01-29 19:16:34', '2020-01-29 19:16:34', NULL, 2, 1),
(7, '<p>Pabrik beroperasi normal dengan gangguan yang menyebabkan perbaikan di tempat</p>', '2020-01-29 19:16:44', '2020-01-29 19:16:44', NULL, 2, 2),
(8, '<ul><li>&nbsp;Pabrik beroperasi tidak normal dan perlu perbaikan dengan&nbsp; menurunkan rate produksi&nbsp;</li><li>&nbsp;Kerugian &lt; USD 50.000</li></ul>', '2020-01-29 19:17:14', '2020-01-29 19:17:14', NULL, 2, 3),
(9, '<ul><li>Pabrik shutdown dengan kerusakan yang harus di perbaiki sampai dengan 5 hari</li><li>&nbsp;Kerugian USD 50.000 – 100.000</li></ul>', '2020-01-29 19:17:47', '2020-01-29 19:17:47', NULL, 2, 4),
(10, '<ul><li>Pabrik shutdown dengan memerlukan perbaikan lebih dari 5 hari</li><li>Kerugian &gt; USD 100.000</li></ul>', '2020-01-29 19:18:02', '2020-01-29 19:18:02', NULL, 2, 5),
(11, '<p>Pencemaran di lingkungan kerja</p>', '2020-01-29 19:18:19', '2020-01-29 19:18:19', NULL, 3, 1),
(12, '<p>Pencemaran di lingkungan perusahaan</p>', '2020-01-29 19:18:35', '2020-01-29 19:18:35', NULL, 3, 2),
(13, '<p>Pencemaran ke masyarakat</p>', '2020-01-29 19:18:55', '2020-01-29 19:18:55', NULL, 3, 3),
(14, '<p>Pencemaran ke masyarakat dan menimbulkan protes masyarakat</p>', '2020-01-29 19:19:08', '2020-01-29 19:19:08', NULL, 3, 4),
(15, '<p>Pencemaran lingkungan yang menimbulkan tuntutan hukum</p>', '2020-01-29 19:19:24', '2020-01-29 19:19:24', NULL, 3, 5),
(16, '<p>Reaksi di internal kawasan industri KIE</p>', '2020-01-29 19:19:38', '2020-01-29 19:19:38', NULL, 4, 1),
(17, '<p>Liputan oleh media lokal (Bontang Post)</p>', '2020-01-29 19:19:53', '2020-01-29 19:19:53', NULL, 4, 2),
(18, '<ul><li>Liputan oleh media regional (Kaltim Post)</li><li>Aduan kerusakan oleh masyarakat</li></ul>', '2020-01-29 19:20:38', '2020-01-29 19:20:38', NULL, 4, 3),
(19, '<ul><li>Liputan oleh media Nasional</li><li>Tuntutan hukum oleh masyarakat/LSM</li><li>PROPER Nasional MERAH</li></ul>', '2020-01-29 19:20:51', '2020-01-29 19:20:51', NULL, 4, 4),
(20, '<ul><li>Liputan oleh media Internasional&nbsp;</li><li>Investigasi dari Pemerintah/Kepolisian</li></ul>', '2020-01-29 19:21:14', '2020-01-29 19:21:14', NULL, 4, 5),
(21, '<p>Masuk tanpa izin, tidak ada kehilangan</p>', '2020-01-29 19:21:30', '2020-01-29 19:21:30', NULL, 5, 1),
(22, '<p>Masuk tanpa izin, tidak ada kehilangan, dan mengganggu kenyamanan</p>', '2020-01-29 19:21:44', '2020-01-29 19:21:44', NULL, 5, 2),
(23, '<p>Masuk tanpa izin, ada kehilangan 1 barang</p>', '2020-01-29 19:22:03', '2020-01-29 19:22:03', NULL, 5, 3),
(24, '<p>Masuk tanpa izin, ada kehilangan lebih dari 1 barang</p>', '2020-01-29 19:22:29', '2020-01-29 19:22:29', NULL, 5, 4),
(25, '<p>ancaman bom, pembajakan pabrik, sabotase</p>', '2020-01-29 19:22:44', '2020-01-29 19:22:44', NULL, 5, 5),
(26, '<p>Penggunaan hardware yang tidak terdaftar tanpa kehilangan informasi perusahaan</p>', '2020-01-29 19:22:58', '2020-01-29 19:22:58', NULL, 6, 1),
(27, '<p>System down kurang dari 2 jam</p>', '2020-01-29 19:23:11', '2020-01-29 19:23:11', NULL, 6, 2),
(28, '<p>System down 2 - 8 jam, Kehilangan data perusahaan secara permanen</p>', '2020-01-29 19:23:31', '2020-01-29 19:23:31', NULL, 6, 3),
(29, '<p>System diretas, tanpa diketahui, dan sewaktu-waktu dapat dikendalikan dari luar</p>', '2020-01-29 19:23:49', '2020-01-29 19:23:49', NULL, 6, 4),
(30, '<p>Kelumpuhan infrastruktur IT</p>', '2020-01-29 19:24:05', '2020-01-29 19:24:05', NULL, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `classification_incidents`
--

CREATE TABLE `classification_incidents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classification_incidents`
--

INSERT INTO `classification_incidents` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Insignificant', '2020-01-26 08:50:52', '2020-01-26 08:50:52', NULL),
(2, 'Minor', '2020-01-26 08:50:59', '2020-01-26 08:50:59', NULL),
(3, 'Moderate', '2020-01-26 08:51:05', '2020-01-26 08:51:05', NULL),
(4, 'Major', '2020-01-26 08:51:11', '2020-01-26 08:51:11', NULL),
(5, 'Catastrophic', '2020-01-26 08:51:20', '2020-01-26 08:51:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation_departments`
--

CREATE TABLE `designation_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_departments`
--

INSERT INTO `designation_departments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `code`) VALUES
(1, 'General Affairs & Information Technology', '2020-01-26 09:51:02', '2020-03-10 00:56:02', NULL, 'GA&IT'),
(2, 'Human Resource Development', '2020-01-26 09:51:11', '2020-03-10 00:56:09', NULL, 'HRD'),
(3, 'Maintenance', '2020-01-26 09:51:24', '2020-03-10 00:56:25', NULL, 'MECH'),
(4, 'Operation', '2020-01-26 09:51:31', '2020-03-10 00:56:33', NULL, 'OPR'),
(5, 'Finance & Accounting', '2020-01-26 09:51:38', '2020-03-10 00:56:42', NULL, 'FIN&ACC'),
(6, 'Logistic & Shipping', '2020-01-26 09:51:45', '2020-03-10 00:57:21', NULL, 'LOG&SHP'),
(7, 'Quality, Safety, Health and Environment', '2020-01-26 09:51:51', '2020-03-10 00:57:34', NULL, 'QSHE'),
(8, 'Technical Support', '2020-01-26 09:52:02', '2020-03-10 00:57:43', NULL, 'TSP'),
(9, 'Technology', '2020-02-04 18:09:29', '2020-03-10 00:57:49', NULL, 'TECH');

-- --------------------------------------------------------

--
-- Table structure for table `incident_reports`
--

CREATE TABLE `incident_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_laporan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perbaikan_awal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perbaikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pencegahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_incident` datetime DEFAULT NULL,
  `date_action` datetime DEFAULT NULL,
  `assigned_at` datetime DEFAULT NULL,
  `reviewed_at` datetime DEFAULT NULL,
  `acknowledged_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nama_pelapor_id` int(10) UNSIGNED DEFAULT NULL,
  `reviewed_by_id` int(10) UNSIGNED DEFAULT NULL,
  `dept_origin_id` int(10) UNSIGNED DEFAULT NULL,
  `root_cause_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `classify_id` int(10) UNSIGNED DEFAULT NULL,
  `dept_designated_id` int(10) UNSIGNED DEFAULT NULL,
  `result_id` int(10) UNSIGNED DEFAULT NULL,
  `acknowledged_by_id` int(10) UNSIGNED DEFAULT NULL,
  `action_by_id` int(10) UNSIGNED DEFAULT NULL,
  `assigned_to_id` int(10) UNSIGNED DEFAULT NULL,
  `cr_id` int(10) UNSIGNED DEFAULT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `ri_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incident_reports`
--

INSERT INTO `incident_reports` (`id`, `no_laporan`, `perbaikan_awal`, `location`, `perbaikan`, `pencegahan`, `description`, `reason`, `status`, `date_incident`, `date_action`, `assigned_at`, `reviewed_at`, `acknowledged_at`, `created_at`, `updated_at`, `deleted_at`, `nama_pelapor_id`, `reviewed_by_id`, `dept_origin_id`, `root_cause_id`, `category_id`, `classify_id`, `dept_designated_id`, `result_id`, `acknowledged_by_id`, `action_by_id`, `assigned_to_id`, `cr_id`, `area_id`, `ri_id`) VALUES
(1, 'LI-0520-0001', NULL, 'STG Pump', NULL, NULL, 'test 1 * tambahan dari spdt', NULL, 'Open', '2020-05-08 11:30:43', NULL, '2020-05-08 16:46:15', '2020-05-08 15:29:39', '2020-05-08 15:38:40', '2020-05-07 19:28:33', '2020-05-10 22:52:56', '2020-05-10 22:52:56', 160, 159, 4, 3, 3, 2, 3, 5, 158, 162, NULL, 1, 1, NULL),
(2, 'LI-0520-0002', NULL, 'Compressor Limit', NULL, NULL, 'test 2 * tambahan dari spdt ssssssssssssssssssssssssssss', 'Jangan dulu bosque', 'Close', '2020-05-08 11:36:50', NULL, NULL, '2020-05-08 11:41:26', '2020-05-08 11:42:01', '2020-05-07 19:34:51', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 160, 159, 4, 2, 4, 3, 3, 3, 158, NULL, NULL, 1, 1, NULL),
(3, 'LI-0520-0003', NULL, 'CER00098', NULL, NULL, 'test 3 *tambahan dari spdt', 'Nanti ajalah', 'Close', '2020-05-07 15:37:26', NULL, NULL, '2020-05-08 11:39:22', NULL, '2020-05-07 19:35:38', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 160, 159, 4, 3, 4, 3, 3, 3, NULL, NULL, NULL, 1, 2, NULL),
(4, 'LI-0520-0004', NULL, 'Compressor Limit', 'sudah di masukkan kedalam tps', NULL, 'test incident 4', NULL, 'Close', '2020-05-08 13:14:21', '2020-05-07 15:16:24', '2020-05-08 13:13:31', '2020-05-08 13:12:43', '2020-05-08 13:13:01', '2020-05-07 21:12:18', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 160, 159, 4, 2, 3, 4, 3, 6, 158, 162, NULL, 2, 1, NULL),
(5, 'LI-0520-0005', 'Menegur dan mengingatkan', 'Graha parna', 'sudah dilakukan pengingat', NULL, 'bekerja di ketinggian tanpa full body harness', NULL, 'Close', '2020-05-08 14:04:22', '2020-05-07 14:32:12', '2020-05-08 14:22:46', '2020-05-08 14:07:06', '2020-05-08 14:11:30', '2020-05-07 22:05:53', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 124, 120, 7, 1, 1, 2, 1, 6, 135, 32, NULL, 2, 2, NULL),
(6, 'LI-0520-0006', 'membuat WR ke MPC', 'P-2103A', NULL, NULL, 'mech seal p-2103a bocor', NULL, 'Open', '2020-05-08 14:09:00', NULL, NULL, NULL, NULL, '2020-05-07 22:10:44', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 124, NULL, 7, 4, 2, 3, 3, 4, NULL, NULL, NULL, 1, 1, NULL),
(7, 'LI-0520-0007', NULL, 'TS-0421', NULL, NULL, 'dry gas seal bocor melebihi batas guarantee manufacture', NULL, 'Open', '2020-05-08 14:12:40', NULL, NULL, NULL, NULL, '2020-05-07 22:14:18', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 124, NULL, 7, 4, 2, 4, 3, 4, NULL, NULL, NULL, 1, 1, NULL),
(8, 'LI-0520-0008', NULL, 'P-9501', NULL, NULL, 'flange to flange leaks out dan ada korban', NULL, 'Open', '2020-05-08 14:14:35', NULL, NULL, NULL, NULL, '2020-05-07 22:15:27', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 124, NULL, 7, 4, 2, 5, 3, 4, NULL, NULL, NULL, 1, 1, NULL),
(9, 'LI-0520-0009', NULL, 'RT390384', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-08 15:29:47', NULL, '2020-05-08 15:39:27', '2020-05-08 15:38:11', '2020-05-08 15:38:33', '2020-05-07 23:27:36', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 160, 159, 4, 3, 4, 4, 3, 5, 158, 162, NULL, 2, 1, NULL),
(10, 'LI-0520-0010', NULL, 'Graha Parna', 'sudah ditambahkan apar', NULL, 'tidak tersedianya apar', NULL, 'Close', '2020-05-10 08:00:30', '2020-05-10 11:00:00', '2020-05-11 08:04:21', '2020-05-11 07:59:14', '2020-05-11 07:59:35', '2020-05-10 15:58:48', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 152, 40, 1, 2, 2, 2, 7, 6, 22, 124, NULL, 2, 2, NULL),
(11, 'LI-0520-0011', NULL, 'Graha Parna', 'Penambahan APAR di GP nomor FE-GP-031', NULL, 'tidak tersedianya apar test 2', NULL, 'Close', '2020-05-11 08:10:36', '2020-05-11 08:31:28', '2020-05-11 08:10:16', '2020-05-11 08:08:58', '2020-05-11 08:09:18', '2020-05-10 16:08:34', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 152, 40, 1, 2, 2, 2, 7, 6, 22, 124, NULL, 2, 2, NULL),
(12, 'LI-0520-0012', NULL, 'Graha Parna', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-04 06:16:34', NULL, NULL, NULL, NULL, '2020-05-10 16:15:49', '2020-05-10 22:53:36', '2020-05-10 22:53:36', 160, NULL, 4, 4, 2, 3, 1, 4, NULL, NULL, NULL, 2, 2, NULL),
(13, 'LI-0520-0013', NULL, 'Graha Parna', NULL, NULL, 'tidak tersedianya apar', NULL, 'Open', '2020-05-11 08:56:33', NULL, NULL, '2020-05-11 08:55:03', NULL, '2020-05-10 16:54:33', '2020-05-10 22:53:04', '2020-05-10 22:53:04', 152, 40, 1, 3, 2, 4, 7, 1, NULL, NULL, NULL, 2, 2, NULL),
(14, 'LI-0520-0014', 'Re-start ilang dengan opening yang sama (20%). WR 23841', 'N2 Generator', 'check', 'check', 'kejadian berulang untuk n2 generator dump (keempat kalinya) dalam kurun waktu 24 april sampai 10 mei', NULL, 'Close', '2020-05-10 15:03:00', '2020-05-11 09:49:05', '2020-05-11 09:44:25', '2020-05-11 09:12:23', '2020-05-11 09:24:15', '2020-05-10 17:12:23', '2020-05-10 23:51:57', '2020-05-10 23:51:57', 96, 96, 4, 4, 2, 3, 3, 6, 168, 83, NULL, 2, 1, NULL),
(15, 'LI-0520-0015', 'Identifikasi aliran lubang bersama TSP-MTN, WR23842', 'area sekitar K-0431-T1', 'Sudah dilakukan perbaikan', 'Sudah dilakukan perbaikan', 'bak kontrol area k-0431-t1 ada lubang, sehingga buangan kondensat yang seharusnya menuju t-0304, mengalir ke lubang tsb', NULL, 'Close', '2020-05-11 10:33:47', '2020-05-12 11:00:00', '2020-05-13 14:45:59', '2020-05-11 10:41:42', '2020-05-11 11:42:45', '2020-05-10 18:38:21', '2020-05-25 17:25:13', NULL, 150, 96, 4, 4, 2, 2, 3, 6, 168, 167, NULL, 2, 1, NULL),
(16, 'LI-0520-0016', 'Restart kembali dengan opening inlet 20%. WR 23841', 'N2 Generator (dibuat kembali karena dihapus)', NULL, NULL, 'n2 generator dump untuk ke-empat kalinya dalam periode 24 april sd 10 mei 2020', NULL, 'Open', '2020-05-10 15:06:00', NULL, '2020-05-13 14:45:08', '2020-05-12 07:51:12', '2020-05-12 10:02:47', '2020-05-11 15:51:12', '2020-05-12 22:45:08', NULL, 96, 96, 4, 4, 2, 3, 3, 5, 168, 83, NULL, 2, 1, NULL),
(18, 'LI-0520-0017', NULL, 'sekitaran ini itu', NULL, NULL, 'test', NULL, 'Open', '2020-05-13 07:23:34', NULL, NULL, NULL, NULL, '2020-05-11 23:34:25', '2020-05-11 23:34:25', NULL, 160, NULL, 4, 2, 3, 4, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(19, 'LI-0520-0018', NULL, 'sekitaran ini itu', NULL, NULL, 'test', NULL, 'Open', '2020-05-13 07:34:26', NULL, NULL, NULL, NULL, '2020-05-11 23:34:31', '2020-05-11 23:34:31', NULL, 160, NULL, 4, 2, 3, 4, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(20, 'LI-0520-0019', NULL, 'Graha Parna', NULL, NULL, 'test 2', NULL, 'Open', '2020-05-13 07:35:45', NULL, NULL, NULL, NULL, '2020-05-12 00:31:39', '2020-05-12 00:31:39', NULL, 160, NULL, 4, 4, 1, 4, 3, 4, NULL, NULL, NULL, 2, 2, NULL),
(21, 'LI-0520-0020', NULL, 'STG Pump', NULL, NULL, 'test incident 1', NULL, 'Open', '2020-05-13 14:53:37', NULL, '2020-06-03 11:24:23', '2020-06-11 09:49:09', '2020-06-11 09:49:29', '2020-05-12 06:54:25', '2020-06-10 17:52:01', NULL, 160, 159, 4, 2, 4, 1, 3, 5, 158, 86, NULL, 2, 1, NULL),
(22, 'LI-0520-0021', NULL, 'STG Pump', NULL, NULL, 'test 1', NULL, 'Open', '2020-05-13 15:09:37', NULL, NULL, NULL, NULL, '2020-05-12 07:09:54', '2020-05-12 07:09:54', NULL, 160, NULL, 4, 2, 2, 2, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(23, 'LI-0520-0022', NULL, 'STG Pump', NULL, NULL, 'test incident', NULL, 'Open', '2020-05-13 15:10:12', NULL, NULL, NULL, NULL, '2020-05-12 07:12:54', '2020-05-12 07:12:54', NULL, 160, NULL, 4, 2, 2, 2, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(24, 'LI-0520-0023', NULL, 'STG Pump', NULL, NULL, 'test incident', NULL, 'Open', '2020-05-13 15:13:04', NULL, NULL, '2020-05-13 16:07:49', NULL, '2020-05-12 07:13:32', '2020-06-10 19:20:26', NULL, 160, 159, 4, 2, 2, 2, 3, 1, NULL, NULL, NULL, 2, 1, NULL),
(25, 'LI-0520-0024', NULL, 'STG Pump', NULL, NULL, 'test incident', NULL, 'Open', '2020-05-13 15:14:34', NULL, NULL, '2020-06-03 11:10:31', NULL, '2020-05-12 07:14:38', '2020-06-10 19:20:13', NULL, 160, 159, 4, 2, 2, 2, 3, 1, NULL, NULL, NULL, 2, 1, NULL),
(26, 'LI-0520-0025', NULL, 'STG Pump', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-13 15:18:33', NULL, '2020-06-03 11:24:23', '2020-05-13 16:07:49', '2020-05-13 16:08:27', '2020-05-12 07:18:55', '2020-05-12 08:08:27', NULL, 160, 159, 4, 2, 1, 2, 3, 2, 158, NULL, NULL, 2, 1, NULL),
(27, 'LI-0520-0026', NULL, 'STG Pump', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-15 10:29:18', NULL, NULL, NULL, NULL, '2020-05-14 02:31:45', '2020-05-14 02:31:45', NULL, 160, NULL, 4, 2, 4, 3, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(28, 'LI-0520-0027', NULL, 'STG Pump', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-15 10:32:03', NULL, NULL, NULL, NULL, '2020-05-14 02:32:09', '2020-05-14 02:32:09', NULL, 160, NULL, 4, 2, 4, 3, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(29, 'LI-0520-0028', NULL, 'STG Pump', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-15 10:35:46', NULL, NULL, NULL, NULL, '2020-05-14 02:35:52', '2020-05-14 02:35:52', NULL, 160, NULL, 4, 2, 4, 3, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(30, 'LI-0520-0029', NULL, 'STG Pump', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-15 10:36:03', NULL, NULL, NULL, NULL, '2020-05-14 02:36:07', '2020-05-14 02:36:07', NULL, 160, NULL, 4, 2, 4, 3, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(31, 'LI-0520-0030', NULL, 'STG Pump', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-15 10:37:43', NULL, NULL, NULL, NULL, '2020-05-14 02:37:47', '2020-05-14 02:37:47', NULL, 160, NULL, 4, 2, 4, 3, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(32, 'LI-0520-0031', NULL, 'STG Pump', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-15 10:44:41', NULL, NULL, NULL, NULL, '2020-05-14 02:45:06', '2020-05-14 02:45:06', NULL, 160, NULL, 4, 4, 2, 4, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(33, 'LI-0520-0032', NULL, 'STG Pump', 'sudah di perbaiki dengan suatu alat', 'sudah di cegah dengan menambahkan alat', 'test incident 2', NULL, 'Open', '2020-05-15 10:47:32', '2020-07-20 10:59:48', '2020-06-03 11:24:23', '2020-06-03 11:10:34', '2020-06-03 11:18:11', '2020-05-14 02:47:36', '2020-07-20 02:59:54', NULL, 160, 159, 4, 4, 2, 1, 3, 5, 158, 162, NULL, 2, 1, NULL),
(34, 'LI-0520-0033', NULL, 'STG Pump', NULL, NULL, 'test incident 2', NULL, 'Open', '2020-05-15 10:51:04', NULL, '2020-06-05 15:23:07', '2020-06-03 11:10:31', '2020-06-03 11:14:40', '2020-05-14 02:51:08', '2020-06-04 23:23:07', NULL, 160, 159, 4, 4, 2, 2, 3, 5, 158, 164, NULL, 2, 1, NULL),
(35, 'LI-0620-0001', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 15:26:17', NULL, NULL, NULL, NULL, '2020-06-11 23:29:25', '2020-06-11 23:29:25', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(36, 'LI-0620-0002', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 15:26:17', NULL, NULL, NULL, NULL, '2020-06-11 23:40:13', '2020-06-11 23:40:13', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(37, 'LI-0620-0003', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 15:26:17', NULL, NULL, NULL, NULL, '2020-06-11 23:53:01', '2020-06-11 23:53:01', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(38, 'LI-0620-0004', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 16:07:46', NULL, NULL, NULL, NULL, '2020-06-12 00:07:51', '2020-06-12 00:07:51', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(39, 'LI-0620-0005', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 16:07:46', NULL, NULL, NULL, NULL, '2020-06-12 00:08:25', '2020-06-12 00:08:25', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(40, 'LI-0620-0006', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 16:08:27', NULL, NULL, NULL, NULL, '2020-06-12 00:08:31', '2020-06-12 00:08:31', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(41, 'LI-0620-0007', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 16:08:27', NULL, NULL, NULL, NULL, '2020-06-12 00:26:45', '2020-06-12 00:26:45', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(42, 'LI-0620-0008', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 16:08:27', NULL, NULL, NULL, NULL, '2020-06-12 00:37:12', '2020-06-12 00:37:12', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(43, 'LI-0620-0009', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 16:08:27', NULL, NULL, NULL, NULL, '2020-06-12 00:37:24', '2020-06-12 00:37:24', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(44, 'LI-0620-0010', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 16:08:27', NULL, NULL, '2020-06-15 10:32:30', '2020-06-15 10:33:49', '2020-06-12 00:47:03', '2020-06-14 18:33:49', NULL, 160, 159, 4, 4, 1, 1, 3, 2, 158, NULL, NULL, NULL, 2, NULL),
(45, 'LI-0620-0011', NULL, NULL, NULL, NULL, 'test', NULL, 'Open', '2020-06-12 16:47:08', NULL, NULL, '2020-06-15 10:18:27', '2020-06-15 10:23:29', '2020-06-12 00:47:11', '2020-06-14 18:23:29', NULL, 160, 159, 4, 4, 1, 1, 3, 2, 158, NULL, NULL, NULL, 2, NULL),
(46, 'LI-0620-0012', NULL, NULL, NULL, NULL, 'test 23', NULL, 'Open', '2020-06-12 17:05:22', NULL, NULL, '2020-06-15 14:35:57', NULL, '2020-06-12 01:05:50', '2020-06-14 22:35:57', NULL, 160, 159, 4, 1, 2, 2, 4, 1, NULL, NULL, NULL, NULL, 1, NULL),
(47, 'LI-0620-0013', NULL, NULL, NULL, NULL, 'test 234', NULL, 'Open', '2020-06-15 11:58:36', NULL, NULL, '2020-06-15 14:30:49', NULL, '2020-06-14 19:59:27', '2020-06-14 22:30:49', NULL, 160, 159, 4, 1, 3, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL),
(48, 'LI-0620-0014', NULL, NULL, NULL, NULL, 'test 461', NULL, 'Open', '2020-06-15 14:10:09', NULL, NULL, '2020-06-15 14:22:20', '2020-06-15 14:32:14', '2020-06-14 22:10:47', '2020-06-14 22:32:14', NULL, 160, 159, 4, 3, 3, 2, 3, 2, 158, NULL, NULL, NULL, 1, NULL),
(49, 'LI-0620-0015', NULL, NULL, NULL, NULL, 'test 789', NULL, 'Open', '2020-06-15 14:42:58', NULL, NULL, NULL, NULL, '2020-06-14 23:48:52', '2020-06-14 23:48:52', NULL, NULL, NULL, NULL, 3, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, 2, NULL),
(50, 'LI-0620-0016', NULL, NULL, NULL, NULL, 'test 789', NULL, 'Open', '2020-06-15 15:51:21', NULL, NULL, NULL, NULL, '2020-06-14 23:51:37', '2020-06-14 23:51:37', NULL, 160, NULL, 4, 3, 1, 3, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(51, 'LI-0620-0017', NULL, NULL, NULL, NULL, 'test 789', NULL, 'Open', '2020-06-15 15:51:21', NULL, NULL, NULL, NULL, '2020-06-14 23:51:58', '2020-06-14 23:51:58', NULL, 160, NULL, 4, 3, 1, 3, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(52, 'LI-0620-0018', NULL, NULL, NULL, NULL, 'test 789', NULL, 'Open', '2020-06-15 15:51:21', NULL, NULL, '2020-06-15 16:00:31', '2020-06-15 16:35:03', '2020-06-14 23:52:08', '2020-06-15 00:35:03', NULL, 160, 159, 4, 3, 1, 3, 3, 2, 158, NULL, NULL, NULL, 1, NULL),
(53, 'LI-0620-0019', NULL, NULL, 'sudah ditambahkan apar', 'sambungan lan dibungkus dengan alat', 'test 7114', NULL, 'Open', '2020-06-15 16:08:28', '2020-07-20 12:00:54', '2020-07-20 12:00:27', '2020-06-15 16:31:36', '2020-06-15 16:35:57', '2020-06-15 00:09:07', '2020-07-20 04:00:55', NULL, 160, 159, 4, 3, 2, 2, 3, 5, 158, 162, NULL, NULL, 1, NULL),
(54, 'LI-0520-0017', 'WR 23865, Bersama MTN membuat modifikasi (mangkok berisi air) pada keluaran \'leher angsa\' condenser', 'TS-0431-E1', NULL, NULL, 'gland condenser ts-0431-e1 tidak bekerja dengan baik/normalpada keluaran \'leher angsa\' tidak keluar kondensat, malah kondisi vakum - menarik udara dari luar', NULL, 'Open', '2020-05-14 09:51:26', NULL, '2020-06-04 13:24:17', '2020-05-14 13:15:55', '2020-05-20 08:18:00', '2020-05-13 17:58:21', '2020-06-03 21:24:17', NULL, 150, 96, 4, 4, 2, 3, 8, 5, 168, 58, NULL, 2, 1, NULL),
(55, 'LI-0520-0018', 'Running purifier oli K-0431-T1, kontinyu sampling & analisa kualitas oli K-0431-T1, monitor & optimalkan performa gland condenser TS-0431-E1', 'K-0431-T1', NULL, NULL, 'termonitor ada kenaikan level reservoir oli k-0431-t1dari pengecekan tim mekanik (drain) & analisa lab, ditemukan ada kenaikan water content', NULL, 'Open', '2020-05-14 10:00:09', NULL, '2020-06-04 13:23:44', '2020-05-14 13:15:29', '2020-05-20 08:23:50', '2020-05-13 18:02:45', '2020-06-03 21:23:44', NULL, 150, 96, 4, 4, 2, 3, 8, 5, 168, 58, NULL, 2, 1, NULL),
(56, 'LI-0520-0019', 'Meeting Investigasi Bersama, dengan action plant : Simulasi IS-43, Function test Gov TS-0431, Pengecekan limit switch PALL LO & TTV Trip', 'Plant', NULL, NULL, 'pada 17 mei 2020 17:05 (waktu dcs), muncul alarm za04402: k-0431 exerciser, dan ts/k-0431 tripkemudian oleh karena ts/k-0431 trip, steam system terjadi goncangan sehingga steam/gas ratio turun menyentuh setting low-low, dan plant trip (is-21).pressure sh ', NULL, 'Open', '2020-05-17 14:00:38', NULL, '2020-06-04 13:22:28', '2020-05-18 07:40:03', '2020-05-20 08:34:52', '2020-05-17 01:24:26', '2020-06-03 21:22:28', NULL, 150, 96, 4, 4, 2, 4, 8, 5, 168, 58, NULL, 2, 1, NULL),
(57, 'LI-0520-0020', 'Meeting Investigasi bersama, Pengecekan oleh Elektrik', 'MCC', NULL, NULL, 'pada 17 mei 20 14:01:37 (waktu dcs) kdm open breakerpengecekan awal, ada indikasi reverse power stg kpi', NULL, 'Open', '2020-05-17 17:01:37', NULL, '2020-05-26 14:56:01', '2020-05-20 08:44:43', '2020-05-26 10:29:09', '2020-05-17 01:28:57', '2020-05-25 22:56:01', NULL, 150, 96, 4, 4, 2, 3, 3, 5, 168, 83, NULL, 2, 1, NULL),
(58, 'LI-0520-0021', 'Shut Down HARU, pengamanan system, wr23886', 'HARU', NULL, NULL, '-pada 09:53 muncul alarm low level lv08002 (c-0801 hp scrubber) di dcs-kemudian operator berusaha melakukan action menormalkan kondisi operasi (memanualkan lv08002 dan berusaha menaikkan level c-0801), sambil field operator melakukan pengecekan di lapanga', NULL, 'Open', '2020-05-22 09:53:00', NULL, '2020-06-04 11:52:10', '2020-05-22 11:59:32', '2020-05-26 10:28:25', '2020-05-21 19:50:28', '2020-06-03 19:52:10', NULL, 150, 96, 4, 4, 2, 3, 8, 5, 168, 58, NULL, 1, 1, NULL),
(59, 'LI-0520-0022', 'WR23902', 'V-0251', NULL, NULL, 'body deaerator leak out', NULL, 'Open', '2020-05-28 19:30:00', NULL, NULL, '2020-06-08 09:58:41', '2020-06-08 10:59:55', '2020-05-28 23:09:55', '2020-06-07 18:59:55', NULL, 150, 96, 4, 4, 2, 2, 8, 2, 168, NULL, NULL, 1, 1, NULL),
(60, 'LI-0520-0023', 'WR23895', 'PV-1103', NULL, NULL, 'pv-1103 leaksthrough\r\n\r\nketika trial menutup bv manual u/s pv1103, suara passing menghilang\r\nketika bv dibuka kembali, suara passing muncul kembali', NULL, 'Open', '2020-05-27 00:00:00', NULL, NULL, '2020-06-08 09:59:05', '2020-06-08 11:11:38', '2020-05-28 23:12:30', '2020-06-07 19:11:38', NULL, 150, 96, 4, 4, 2, 3, 8, 2, 168, NULL, NULL, 2, 1, NULL),
(61, 'LI-0620-0001', 'WR23912, Switch PM-0301A to PM-0301C untuk pengecekan PM-0301A', 'PM-0301A', NULL, NULL, 'oli motor pm-0301a rembes dari body samping', NULL, 'Open', '2020-06-02 00:00:00', NULL, NULL, '2020-06-08 09:58:07', '2020-06-08 11:13:39', '2020-06-03 00:14:08', '2020-06-07 19:13:39', NULL, 150, 96, 4, 4, 2, 2, 3, 2, 168, NULL, NULL, 1, 1, NULL),
(62, 'LI-0620-0002', 'WR23930', 'FT-9501', 'sudah ditambahkan apar', 'sudah di cegah dengan membungkus alat', 'ketika proses pengapalan ft9501 tidak nunjuk', NULL, 'Open', '2020-06-07 11:18:31', '2020-07-20 11:52:09', '2020-07-20 11:49:17', '2020-06-08 09:59:33', '2020-06-08 11:14:03', '2020-06-07 15:04:54', '2020-07-20 03:52:26', NULL, 150, 96, 4, 4, 2, 2, 3, 5, 168, 162, NULL, 2, 1, NULL),
(63, 'LI-0620-0003', 'adjust damper manual', 'H-1101', NULL, NULL, 'temuan start up 17 mei 2020\r\n\r\ndamper pkb tidak bekerja normal - mengikuti acc', NULL, 'Open', '2020-05-17 20:00:08', NULL, NULL, '2020-06-08 09:59:49', '2020-06-08 11:14:28', '2020-06-07 15:07:20', '2020-06-07 19:14:28', NULL, 150, 96, 4, 4, 2, 3, 3, 2, 168, NULL, NULL, 2, 1, NULL),
(64, 'LI-0620-0004', 'Pengosongan menggunakan sump pump', 'FT-2105', NULL, NULL, 'ft-2105 (flowmeter outfall) terendam air karena air masuk dari sisi parit. parit dalam kondisi hampir penuh dan air masuk melalui jalur kabel untuk transmitter. dikhawatirkan internal part ft rusak', NULL, 'Open', '2020-06-09 15:32:51', NULL, NULL, NULL, NULL, '2020-06-08 23:34:57', '2020-06-08 23:34:57', NULL, 124, NULL, 7, 2, 2, 2, 3, 4, NULL, NULL, NULL, 2, 1, NULL),
(65, 'LI-0620-0020', NULL, NULL, NULL, NULL, 'banyak angin diatas', NULL, 'Open', '2020-06-18 13:39:47', NULL, NULL, NULL, NULL, '2020-06-18 05:52:31', '2020-06-18 05:52:31', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(66, 'LI-0620-0021', NULL, NULL, NULL, NULL, 'banyak angin diatas', NULL, 'Open', '2020-06-18 13:39:47', NULL, NULL, NULL, NULL, '2020-06-18 05:54:36', '2020-06-18 05:54:36', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(67, 'LI-0620-0022', NULL, NULL, NULL, NULL, 'banyak angin diatas', NULL, 'Open', '2020-06-18 13:39:47', NULL, NULL, NULL, NULL, '2020-06-18 05:54:42', '2020-06-18 05:54:42', NULL, 160, NULL, 4, 4, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(68, 'LI-0620-0023', NULL, NULL, NULL, NULL, 'banyak angin diatas', NULL, 'Open', '2020-06-18 13:55:35', NULL, NULL, NULL, NULL, '2020-06-18 05:58:44', '2020-06-18 05:58:44', NULL, 160, NULL, 4, 2, 3, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(69, 'LI-0620-0024', NULL, NULL, NULL, NULL, 'kerusakan lagi', NULL, 'Open', '2020-06-23 10:42:54', NULL, NULL, NULL, NULL, '2020-06-23 02:43:43', '2020-06-23 02:43:43', NULL, 160, NULL, 4, 4, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(70, 'LI-0620-0025', NULL, NULL, NULL, NULL, 'kerusakan lagi', NULL, 'Open', '2020-06-23 10:42:54', NULL, NULL, NULL, NULL, '2020-06-23 02:45:35', '2020-06-23 02:45:35', NULL, 160, NULL, 4, 4, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(71, 'LI-0620-0026', NULL, NULL, NULL, NULL, 'kerusakan lagi', NULL, 'Open', '2020-06-23 10:42:54', NULL, NULL, '2020-06-23 11:05:53', NULL, '2020-06-23 02:45:42', '2020-06-23 03:05:53', NULL, 160, 163, 4, 4, 2, 2, 3, 1, NULL, NULL, NULL, NULL, 1, 2),
(72, 'LI-0620-0027', NULL, NULL, NULL, NULL, 'kerusakan valve', NULL, 'Open', '2020-06-23 11:57:51', NULL, NULL, NULL, NULL, '2020-06-23 03:58:24', '2020-06-23 03:58:24', NULL, 160, NULL, 4, 4, 2, 1, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(73, 'LI-0620-0028', NULL, NULL, NULL, NULL, 'test 461', NULL, 'Open', '2020-06-23 14:15:41', NULL, NULL, NULL, NULL, '2020-06-23 06:16:09', '2020-06-23 06:16:09', NULL, 162, NULL, 3, 1, 3, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(74, 'LI-0620-0029', NULL, NULL, NULL, NULL, 'test 461', NULL, 'Open', '2020-06-23 14:15:41', NULL, NULL, NULL, NULL, '2020-06-23 06:18:45', '2020-06-23 06:18:45', NULL, 162, NULL, 3, 1, 3, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(75, 'LI-0620-0030', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-23 15:08:22', NULL, NULL, NULL, NULL, '2020-06-23 07:08:39', '2020-06-23 07:08:39', NULL, 162, NULL, 3, 1, 1, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(76, 'LI-0620-0031', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-23 15:08:22', NULL, NULL, NULL, NULL, '2020-06-23 07:09:01', '2020-06-23 07:09:01', NULL, 162, NULL, 3, 1, 1, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(77, 'LI-0620-0032', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-23 15:08:22', NULL, NULL, NULL, NULL, '2020-06-23 07:09:10', '2020-06-23 07:09:10', NULL, 162, NULL, 3, 1, 1, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(78, 'LI-0620-0033', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-23 15:30:53', NULL, NULL, NULL, NULL, '2020-06-23 07:34:01', '2020-06-23 07:34:01', NULL, 162, NULL, 3, 4, 2, 1, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(79, 'LI-0620-0034', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-23 15:30:53', NULL, NULL, NULL, NULL, '2020-06-23 07:34:08', '2020-06-23 07:34:08', NULL, 162, NULL, 3, 4, 2, 1, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(80, 'LI-0620-0035', NULL, NULL, NULL, NULL, 'test 7114', 'Rejected ini bosque', 'Close', '2020-06-23 15:30:53', NULL, NULL, '2020-06-29 10:39:35', NULL, '2020-06-23 07:34:14', '2020-06-29 02:39:35', NULL, 162, 164, 3, 4, 2, 1, 3, 3, NULL, NULL, NULL, NULL, 1, NULL),
(81, 'LI-0620-0036', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-23 15:30:53', NULL, NULL, NULL, NULL, '2020-06-23 07:34:37', '2020-06-23 07:34:37', NULL, 162, NULL, 3, 4, 2, 1, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(82, 'LI-0620-0037', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-23 15:43:41', NULL, NULL, NULL, NULL, '2020-06-23 07:44:05', '2020-06-23 07:44:05', NULL, 86, NULL, 3, 4, 2, 1, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(83, 'LI-0620-0038', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-23 15:48:10', NULL, NULL, NULL, NULL, '2020-06-23 07:48:44', '2020-06-23 07:48:44', NULL, 131, NULL, 4, 1, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(84, 'LI-0620-0039', NULL, NULL, NULL, NULL, 'test 789', NULL, 'Open', '2020-06-23 15:55:31', NULL, NULL, NULL, NULL, '2020-06-23 08:00:13', '2020-06-23 08:00:13', NULL, 131, NULL, 4, 1, 1, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(106, 'LI-0620-0040', NULL, NULL, NULL, NULL, 'IR-2020002', NULL, 'Open', '2020-06-25 16:09:42', NULL, NULL, NULL, NULL, '2020-06-25 08:10:01', '2020-06-25 08:10:01', NULL, 160, NULL, 4, 2, 2, 1, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(107, 'LI-0620-0041', NULL, NULL, NULL, NULL, 'IR-2020002', NULL, 'Open', '2020-06-25 16:10:56', NULL, NULL, NULL, NULL, '2020-06-25 08:12:15', '2020-06-25 08:12:15', NULL, 160, NULL, 4, 3, 3, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(108, 'LI-0620-0042', NULL, NULL, NULL, NULL, 'IR-2020002', NULL, 'Open', '2020-06-25 16:28:25', NULL, NULL, NULL, NULL, '2020-06-25 08:28:42', '2020-06-25 08:28:42', NULL, 160, NULL, 4, 2, 3, 1, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(109, 'LI-0620-0043', NULL, NULL, NULL, NULL, 'IR-2020001', NULL, 'Open', '2020-06-25 16:30:30', NULL, NULL, NULL, NULL, '2020-06-25 08:30:47', '2020-06-25 08:30:47', NULL, 86, NULL, 3, 2, 3, 2, 4, 4, NULL, NULL, NULL, NULL, 1, NULL),
(110, 'LI-0620-0044', NULL, NULL, NULL, NULL, 'IR-2020002', NULL, 'Open', '2020-06-25 16:33:48', NULL, NULL, NULL, NULL, '2020-06-25 08:34:14', '2020-06-25 08:34:14', NULL, 160, NULL, 4, 2, 4, 1, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(111, 'LI-0620-0045', NULL, NULL, NULL, NULL, 'IR-2020002', NULL, 'Open', '2020-06-25 16:36:59', NULL, NULL, NULL, NULL, '2020-06-25 08:37:18', '2020-06-25 08:37:18', NULL, 160, NULL, 4, 3, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(112, 'LI-0620-0046', NULL, NULL, NULL, NULL, 'IR-2020003', NULL, 'Open', '2020-06-25 16:38:09', NULL, NULL, NULL, NULL, '2020-06-25 08:38:38', '2020-06-25 08:38:38', NULL, 160, NULL, 4, 3, 4, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(113, 'LI-0620-0047', NULL, NULL, NULL, NULL, 'IR-2020003', NULL, 'Open', '2020-06-26 08:09:42', NULL, NULL, NULL, NULL, '2020-06-26 00:10:05', '2020-06-26 00:10:05', NULL, 160, NULL, 4, 3, 4, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(114, 'LI-0620-0048', NULL, NULL, NULL, NULL, 'IR-2020002', NULL, 'Open', '2020-06-26 08:11:18', NULL, NULL, NULL, NULL, '2020-06-26 00:11:38', '2020-06-26 00:11:38', NULL, 160, NULL, 4, 2, 1, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(115, 'LI-0620-0049', NULL, NULL, NULL, NULL, 'IR-2020003', NULL, 'Open', '2020-06-26 08:21:35', NULL, NULL, NULL, NULL, '2020-06-26 00:21:55', '2020-06-26 00:21:55', NULL, 160, NULL, 4, 3, 2, 3, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(116, 'LI-0620-0050', NULL, NULL, NULL, NULL, 'IR-2020003', NULL, 'Open', '2020-06-26 08:22:56', NULL, NULL, NULL, NULL, '2020-06-26 00:23:18', '2020-06-26 00:23:18', NULL, 160, NULL, 4, 2, 4, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(117, 'LI-0620-0051', NULL, NULL, NULL, NULL, 'IR-2020002', 'Sudah kamu makan dulu sana ada ayam curian tuh', 'Close', '2020-06-26 09:44:53', NULL, NULL, '2020-06-29 10:37:34', NULL, '2020-06-26 01:45:23', '2020-06-29 02:37:34', NULL, 86, 164, 3, 2, 3, 2, 4, 3, NULL, NULL, NULL, NULL, 1, NULL),
(118, 'LI-0620-0052', NULL, NULL, NULL, NULL, 'test 789', NULL, 'Open', '2020-06-26 15:09:24', NULL, NULL, '2020-06-26 15:11:23', NULL, '2020-06-26 07:11:23', '2020-06-26 07:11:23', NULL, 159, 159, 4, 2, 2, 2, 4, 1, NULL, NULL, NULL, NULL, 1, NULL),
(119, 'LI-0620-0053', NULL, NULL, NULL, NULL, 'test 7114', NULL, 'Open', '2020-06-26 15:34:59', NULL, NULL, NULL, NULL, '2020-06-26 07:37:03', '2020-06-26 07:37:03', NULL, 107, NULL, 4, 2, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(120, 'LI-0620-0054', NULL, NULL, NULL, NULL, 'test 789', NULL, 'Open', '2020-06-26 15:45:52', NULL, NULL, NULL, NULL, '2020-06-26 07:46:11', '2020-06-26 07:46:11', NULL, 107, NULL, 4, 2, 3, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(121, 'LI-0620-0055', NULL, NULL, NULL, NULL, 'test 7114', 'Nanti-nanti aja yah\r\n\r\noke.!!!!', 'Close', '2020-06-26 17:09:50', NULL, NULL, '2020-06-26 17:10:21', '2020-06-29 10:24:56', '2020-06-26 09:10:21', '2020-06-29 02:24:56', NULL, 163, 163, 4, 3, 1, 2, 3, 3, 158, NULL, NULL, NULL, 1, NULL),
(122, 'LI-0620-0056', NULL, NULL, NULL, NULL, 'Cerita Test 1', NULL, 'Open', '2020-06-29 09:39:34', NULL, NULL, NULL, NULL, '2020-06-29 01:40:33', '2020-06-29 01:40:33', NULL, 160, NULL, 4, 1, 2, 3, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(123, 'LI-0620-0057', NULL, NULL, NULL, NULL, 'Cerita Test 1', NULL, 'Open', '2020-06-29 09:44:22', NULL, NULL, '2020-06-29 09:44:59', NULL, '2020-06-29 01:44:59', '2020-06-30 03:21:55', NULL, 160, 163, 4, 4, 2, 2, 3, 1, NULL, NULL, NULL, NULL, 1, 2),
(124, 'LI-0620-0058', NULL, NULL, NULL, NULL, 'Cerita Test 1', 'Udah ku bilang asal-asalan ini', 'Close', '2020-06-29 09:44:22', NULL, NULL, '2020-06-29 10:15:11', NULL, '2020-06-29 01:45:26', '2020-06-29 02:15:11', NULL, 160, 163, 4, 4, 2, 2, 3, 3, NULL, NULL, NULL, NULL, 1, 2),
(125, 'LI-0620-0059', NULL, NULL, NULL, NULL, 'Cerita Test 1', 'Laporan asal-asalan\r\n\r\nUlangi buat incident Baru', 'Close', '2020-06-29 09:44:22', NULL, NULL, '2020-06-29 10:14:33', NULL, '2020-06-29 01:45:34', '2020-06-29 02:14:33', NULL, 160, 163, 4, 4, 2, 2, 3, 3, NULL, NULL, NULL, NULL, 1, 2),
(126, 'LI-0620-0060', NULL, NULL, NULL, NULL, 'Cerita Test 1', 'Sudah dari tadi gk bisa dibilangi', 'Close', '2020-06-29 10:26:40', NULL, NULL, '2020-06-29 10:27:06', '2020-06-29 10:27:43', '2020-06-29 02:27:06', '2020-06-29 02:27:43', NULL, 163, 163, 4, 1, 4, 2, 3, 3, 158, NULL, NULL, NULL, 1, NULL),
(127, 'LI-0620-0061', NULL, NULL, NULL, NULL, 'RTE', 'ADuh capek kali dari tadi ku bilang juga apa', 'Close', '2020-06-29 10:28:29', NULL, NULL, '2020-06-29 10:29:04', '2020-06-29 10:29:47', '2020-06-29 02:29:04', '2020-06-29 02:29:47', NULL, 163, 163, 4, 1, 4, 2, 3, 3, 158, NULL, NULL, NULL, 1, NULL),
(128, 'LI-0620-0062', NULL, NULL, NULL, NULL, 'Cerita Test 1', 'Ada cerita tentang aku dan dia dan kita bersama saat dulu kala', 'Close', '2020-06-29 10:32:10', NULL, NULL, '2020-06-29 10:32:34', '2020-06-29 10:33:22', '2020-06-29 02:32:34', '2020-06-29 02:33:22', NULL, 163, 163, 4, 3, 5, 3, 3, 3, 158, NULL, NULL, NULL, 2, NULL),
(129, 'LI-0620-0063', NULL, NULL, NULL, NULL, 'Cerita Test 1', NULL, 'Open', '2020-06-29 10:42:46', NULL, NULL, '2020-06-29 09:44:59', NULL, '2020-06-29 02:43:14', '2020-06-30 03:32:46', NULL, 160, 163, 4, 3, 4, 1, 3, 1, NULL, NULL, NULL, NULL, 1, 2),
(130, 'LI-0620-0064', NULL, NULL, NULL, NULL, 'Cerita Test 1', NULL, 'Open', '2020-06-29 10:44:39', NULL, NULL, NULL, NULL, '2020-06-29 02:45:05', '2020-06-29 02:45:05', NULL, 86, NULL, 3, 3, 3, 4, 4, 4, NULL, NULL, NULL, NULL, 1, NULL),
(131, 'LI-0720-0001', NULL, NULL, NULL, NULL, 'Test incident 1', NULL, 'Open', '2020-07-20 15:43:18', NULL, NULL, NULL, NULL, '2020-07-20 07:45:41', '2020-07-20 07:45:41', NULL, 160, NULL, 4, 2, 1, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(132, 'LI-0720-0002', NULL, NULL, NULL, NULL, 'Test incident 1', NULL, 'Open', '2020-07-20 15:46:06', NULL, NULL, NULL, NULL, '2020-07-20 07:46:33', '2020-07-20 07:46:33', NULL, 160, NULL, 4, 3, 1, 1, 3, 4, NULL, NULL, NULL, NULL, 1, 2),
(133, 'LI-0720-0003', NULL, NULL, NULL, NULL, 'CER123', NULL, 'Open', '2020-07-21 16:33:55', NULL, NULL, NULL, NULL, '2020-07-21 08:34:27', '2020-07-21 08:34:27', NULL, 160, NULL, 4, 2, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 2, NULL),
(134, 'LI-0720-0004', NULL, NULL, NULL, NULL, 'CER123', NULL, 'Open', '2020-07-21 16:35:55', NULL, '2020-05-13 14:45:59', '2020-07-23 09:22:38', '2020-07-23 09:23:01', '2020-07-21 08:36:28', '2020-07-23 01:23:38', NULL, 160, 159, 4, 3, 3, 3, 3, 5, 158, 167, NULL, NULL, 1, 2),
(135, 'LI-0720-0005', NULL, NULL, NULL, NULL, 'ada kebocoran', NULL, 'Open', '2020-07-26 10:52:43', NULL, NULL, NULL, '2020-07-27 10:56:23', '2020-07-27 02:53:40', '2020-07-27 02:56:23', NULL, 59, NULL, 8, 4, 2, 2, 3, 2, 58, NULL, NULL, NULL, 1, NULL),
(136, 'LI-0720-0006', NULL, NULL, NULL, NULL, 'Test incident 1', NULL, 'Open', '2020-07-27 11:22:25', NULL, NULL, '2020-07-27 11:34:18', NULL, '2020-07-27 03:23:57', '2020-07-27 03:34:18', NULL, 59, 58, 8, 2, 2, 1, 3, 1, NULL, NULL, NULL, NULL, 1, NULL),
(137, 'LI-0720-0007', NULL, NULL, NULL, NULL, 'CER1234', NULL, 'Open', '2020-07-27 15:37:54', NULL, NULL, NULL, '2020-07-27 15:39:59', '2020-07-27 07:38:26', '2020-07-27 07:39:59', NULL, 59, NULL, 8, 1, 2, 1, 3, 2, 58, NULL, NULL, NULL, 1, NULL),
(138, 'LI-0720-0008', NULL, NULL, NULL, NULL, 'CER123', NULL, 'Open', '2020-07-27 15:50:38', NULL, NULL, '2020-07-27 15:51:53', '2020-07-27 15:51:53', '2020-07-27 07:51:19', '2020-07-27 07:51:53', NULL, 59, 58, 8, 4, 1, 2, 3, 2, 58, NULL, NULL, NULL, 1, NULL),
(139, 'LI-0720-0009', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-07-27 15:56:46', NULL, NULL, '2020-07-27 15:59:53', '2020-07-27 16:25:15', '2020-07-27 07:58:23', '2020-07-27 08:25:15', NULL, 160, 159, 4, 1, 2, 1, 3, 2, 158, NULL, NULL, NULL, 1, 1),
(140, 'LI-0720-0010', NULL, NULL, NULL, NULL, 'CER1234', NULL, 'Open', '2020-07-28 08:48:01', NULL, NULL, NULL, NULL, '2020-07-28 00:50:12', '2020-07-28 00:50:12', NULL, 59, NULL, 8, 4, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 1, NULL),
(141, 'LI-0720-0011', NULL, NULL, NULL, NULL, 'CER1234', NULL, 'Open', '2020-07-28 08:50:17', NULL, NULL, '2020-07-28 11:29:49', '2020-07-28 11:29:49', '2020-07-28 00:51:03', '2020-07-28 03:29:49', NULL, 59, 58, 8, 3, 2, 3, 3, 2, 58, NULL, NULL, NULL, 2, NULL),
(142, 'LI-0720-0012', NULL, NULL, NULL, NULL, 'CER123', NULL, 'Open', '2020-07-28 11:26:21', NULL, NULL, '2020-07-28 11:26:48', '2020-07-28 11:26:48', '2020-07-28 03:26:48', '2020-07-28 03:26:48', NULL, 58, 58, 8, 3, 3, 1, 3, 2, 58, NULL, NULL, NULL, 1, NULL),
(143, 'LI-0720-0013', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-07-30 16:27:51', NULL, NULL, NULL, NULL, '2020-07-30 08:27:53', '2020-07-30 08:27:53', NULL, 160, NULL, 4, 1, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 2, 1),
(144, 'LI-0820-0001', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 11:17:13', NULL, NULL, NULL, NULL, '2020-08-03 03:17:47', '2020-08-03 03:17:47', NULL, 160, NULL, 4, 2, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(145, 'LI-0820-0002', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 11:17:13', NULL, NULL, NULL, NULL, '2020-08-03 03:21:22', '2020-08-03 03:21:22', NULL, 160, NULL, 4, 2, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(146, 'LI-0820-0003', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 11:21:21', NULL, NULL, NULL, NULL, '2020-08-03 03:22:26', '2020-08-03 03:22:26', NULL, 160, NULL, 4, 2, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 1, 1),
(147, 'LI-0820-0004', NULL, NULL, NULL, NULL, 'CER123DR', 'Jelek Laporanmu', 'Close', '2020-08-03 11:22:56', NULL, NULL, '2020-08-05 15:11:24', NULL, '2020-08-03 03:22:58', '2020-08-05 07:11:24', NULL, 160, 159, 4, 2, 2, 2, 3, 3, NULL, NULL, NULL, NULL, 1, 1),
(148, 'LI-0820-0005', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 11:36:35', NULL, NULL, NULL, NULL, '2020-08-03 03:37:07', '2020-08-03 03:37:07', NULL, 160, NULL, 4, 2, 2, 2, 3, 4, NULL, NULL, NULL, NULL, 2, 1),
(149, 'LI-0820-0006', NULL, NULL, 'sudah di perbaiki dengan suatu alat', 'sudah di cegah dengan menambahkan alat', 'CER123DR', NULL, 'Close', '2020-08-03 11:43:47', '2020-08-05 10:23:57', '2020-08-05 10:22:10', '2020-08-03 16:47:57', '2020-08-05 10:18:33', '2020-08-03 03:44:07', '2020-08-05 02:24:11', NULL, 160, 159, 4, 1, 2, 2, 3, 6, 158, 164, NULL, NULL, 1, 1),
(150, 'LI-0820-0007', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 14:48:57', NULL, NULL, '2020-08-03 14:49:28', NULL, '2020-08-03 06:49:28', '2020-08-03 06:49:28', NULL, 159, 159, 4, 2, 2, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL),
(151, 'LI-0820-0008', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 15:24:47', NULL, NULL, '2020-08-03 15:27:20', NULL, '2020-08-03 07:27:20', '2020-08-03 07:27:20', NULL, 159, 159, 4, 2, 2, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL),
(152, 'LI-0820-0009', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 16:12:41', NULL, NULL, '2020-08-03 16:13:03', NULL, '2020-08-03 08:13:03', '2020-08-03 08:13:03', NULL, 159, 159, 4, 2, 3, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL),
(153, 'LI-0820-0010', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 16:12:41', NULL, NULL, '2020-08-03 16:13:50', NULL, '2020-08-03 08:13:50', '2020-08-03 08:13:50', NULL, 159, 159, 4, 2, 3, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL),
(154, 'LI-0820-0011', NULL, NULL, NULL, NULL, 'CER123DR', NULL, 'Open', '2020-08-03 16:15:27', NULL, NULL, '2020-08-03 16:15:29', NULL, '2020-08-03 08:15:29', '2020-08-03 08:15:29', NULL, 159, 159, 4, 2, 3, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL),
(155, 'LI-0820-0012', NULL, NULL, NULL, NULL, 'CER1234', NULL, 'Open', '2020-08-03 16:15:49', NULL, NULL, '2020-08-03 16:16:10', NULL, '2020-08-03 08:16:10', '2020-08-03 08:16:10', NULL, 159, 159, 4, 2, 2, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL),
(156, 'LI-0820-0013', NULL, NULL, NULL, NULL, 'CER123', NULL, 'Open', '2020-08-05 14:29:33', NULL, NULL, '2020-08-05 14:30:04', '2020-08-05 14:30:04', '2020-08-05 06:30:04', '2020-08-05 06:30:04', NULL, 158, 158, 4, 4, 3, 2, 3, 2, 158, NULL, NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Software & Development Officer', '2020-01-29 17:03:35', '2020-01-29 17:03:35', NULL),
(2, 'Vice President Director', '2020-01-26 07:48:09', '2020-01-26 07:48:09', NULL),
(3, 'President Director', '2020-01-26 07:48:24', '2020-01-26 07:48:24', NULL),
(4, 'Internal Controller', '2020-01-26 07:48:38', '2020-01-26 07:48:38', NULL),
(5, 'Accounting & Tax Manager', '2020-01-26 07:48:57', '2020-01-26 07:48:57', NULL),
(6, 'Accounting Staff', '2020-01-26 07:49:12', '2020-01-26 07:49:12', NULL),
(7, 'Finance Superintendent', '2020-01-26 07:50:08', '2020-01-26 07:50:08', NULL),
(8, 'Finance & Accounting Supervisor', '2020-01-26 07:50:32', '2020-01-26 07:50:32', NULL),
(9, 'Tax Supervisor', '2020-01-26 07:50:41', '2020-01-26 07:50:41', NULL),
(10, 'Tax Superintendent', '2020-01-26 07:50:55', '2020-01-26 07:50:55', NULL),
(11, 'Finance Supervisor', '2020-01-26 07:51:17', '2020-01-26 07:51:17', NULL),
(12, 'Accounting Superintendent', '2020-01-26 07:51:45', '2020-01-26 07:51:45', NULL),
(13, 'Finance Manager', '2020-01-26 07:51:55', '2020-01-26 07:51:55', NULL),
(14, 'Senior Manager', '2020-01-26 07:52:11', '2020-01-26 07:52:11', NULL),
(15, 'General Manager HRD & GA', '2020-01-26 07:52:30', '2020-01-26 07:52:30', NULL),
(16, 'HRD Superintendent', '2020-01-26 07:52:49', '2020-01-26 07:52:49', NULL),
(17, 'R & B Supervisor', '2020-01-26 07:53:05', '2020-01-26 07:53:05', NULL),
(18, 'OPD Supervisor', '2020-01-26 07:53:57', '2020-01-26 07:53:57', NULL),
(19, 'R & B Officer', '2020-01-26 07:54:09', '2020-01-26 07:54:09', NULL),
(20, 'OPD Admin', '2020-01-26 07:54:22', '2020-01-26 07:54:22', NULL),
(21, 'People Development Officer', '2020-01-26 07:54:38', '2020-01-26 07:54:38', NULL),
(22, 'Organizational Development Officer', '2020-01-26 07:54:54', '2020-01-26 07:54:54', NULL),
(23, 'GA Manager', '2020-01-26 07:55:11', '2020-01-26 07:55:11', NULL),
(24, 'Driver', '2020-01-26 07:55:29', '2020-01-26 07:55:29', NULL),
(25, 'GA Superintendent', '2020-01-26 07:55:44', '2020-01-26 07:55:44', NULL),
(26, 'Messanger', '2020-01-26 07:55:57', '2020-01-26 07:55:57', NULL),
(27, 'CSR & External Relation Specialist', '2020-01-26 07:56:28', '2020-01-26 07:56:28', NULL),
(28, 'HK & Club House Officer', '2020-01-26 07:56:41', '2020-01-26 07:56:41', NULL),
(29, 'GA Supervisor', '2020-01-26 07:56:56', '2020-01-26 07:56:56', NULL),
(30, 'External Relation Officer', '2020-01-26 07:57:27', '2020-01-26 07:57:27', NULL),
(31, 'Transport Coordinator', '2020-01-26 07:58:05', '2020-01-26 07:58:05', NULL),
(32, 'Transport & Accomodation Officer', '2020-01-26 07:58:23', '2020-01-26 07:58:23', NULL),
(33, 'Legal & Compliance', '2020-01-26 07:58:45', '2020-01-26 07:58:45', NULL),
(34, 'Chief Secretary', '2020-01-26 07:59:02', '2020-01-26 07:59:02', NULL),
(35, 'Executive Secretary', '2020-01-26 07:59:15', '2020-01-26 07:59:15', NULL),
(36, 'Information Technology Supervisor', '2020-01-26 07:59:24', '2020-01-26 08:00:08', NULL),
(37, 'IT Network & Infrastructure', '2020-01-26 07:59:46', '2020-01-26 07:59:46', NULL),
(38, 'IT Support', '2020-01-26 08:00:34', '2020-01-26 08:00:42', NULL),
(39, 'Software & Development Engineer', '2020-01-26 08:01:01', '2020-01-26 08:01:01', NULL),
(40, 'Network & Infrastructure Officer', '2020-01-26 08:01:24', '2020-01-26 08:01:24', NULL),
(41, 'Logistic & Shipping Manager', '2020-01-26 08:01:59', '2020-01-26 08:01:59', NULL),
(42, 'Inventory Analyst', '2020-01-26 08:02:15', '2020-01-26 08:02:15', NULL),
(43, 'Buyer', '2020-01-26 08:02:23', '2020-01-26 08:02:23', NULL),
(44, 'Storage Officer', '2020-01-26 08:02:33', '2020-01-26 08:02:33', NULL),
(45, 'Procurement Supervisor', '2020-01-26 08:02:49', '2020-01-26 08:02:49', NULL),
(46, 'Logistic Superintendent', '2020-01-26 08:03:04', '2020-01-26 08:03:04', NULL),
(47, 'Warehouseman', '2020-01-26 08:03:17', '2020-01-26 08:03:17', NULL),
(48, 'Procurement Admin', '2020-01-26 08:03:31', '2020-01-26 08:03:31', NULL),
(49, 'Inventory & Warehouse Supervisor', '2020-01-26 08:03:56', '2020-01-26 08:03:56', NULL),
(50, 'Shipping Superintendent', '2020-01-26 08:04:15', '2020-01-26 08:04:15', NULL),
(51, 'Senior Shipping Officer', '2020-01-26 08:04:36', '2020-01-26 08:04:36', NULL),
(52, 'Shipping Documentation', '2020-01-26 08:04:47', '2020-01-26 08:04:47', NULL),
(53, 'Maintenance Manager', '2020-01-26 08:05:01', '2020-01-26 08:05:01', NULL),
(54, 'Project, Contract & Outsourcing Administration', '2020-01-26 08:05:27', '2020-01-26 08:05:27', NULL),
(55, 'Electrical & Instrument Supervisor', '2020-01-26 08:05:50', '2020-01-26 08:05:50', NULL),
(56, 'Electrical & Instrument Technician', '2020-01-26 08:06:05', '2020-01-26 08:06:16', NULL),
(57, 'Shop Technician', '2020-01-26 08:06:48', '2020-01-26 08:06:48', NULL),
(58, 'Craft Technician', '2020-01-26 08:06:59', '2020-01-26 08:06:59', NULL),
(59, 'Foreman Instrument', '2020-01-26 08:07:15', '2020-01-26 08:07:15', NULL),
(60, 'Mechanical Technician', '2020-01-26 08:07:41', '2020-01-26 08:07:41', NULL),
(61, 'Mechanical Technician & Crane Operator', '2020-01-26 08:07:59', '2020-01-26 08:07:59', NULL),
(62, 'Mechanical Supervisor', '2020-01-26 08:08:32', '2020-01-26 08:08:32', NULL),
(63, 'Craft Foreman', '2020-01-26 08:08:43', '2020-01-26 08:08:43', NULL),
(64, 'Electrical Foreman', '2020-01-26 08:09:13', '2020-01-26 08:09:13', NULL),
(65, 'Shop Foreman', '2020-01-26 08:09:24', '2020-01-26 08:09:24', NULL),
(66, 'Mechanical Foreman', '2020-01-26 08:09:38', '2020-01-26 08:09:38', NULL),
(67, 'Electrical & Instrument Technican', '2020-01-26 08:09:55', '2020-01-26 08:10:10', '2020-01-26 08:10:10'),
(68, 'Electrical & Instrument Superintendent', '2020-01-26 08:11:01', '2020-01-26 08:11:01', NULL),
(69, 'Instrument Engineer', '2020-01-26 08:11:13', '2020-01-26 08:11:13', NULL),
(70, 'Electrical Engineer', '2020-01-26 08:11:26', '2020-01-26 08:11:26', NULL),
(71, 'Mechanical Engineer', '2020-01-26 08:11:37', '2020-01-26 08:11:37', NULL),
(72, 'MPC Engineer', '2020-01-26 08:11:46', '2020-01-26 08:11:46', NULL),
(73, 'Planner & Scheduler', '2020-01-26 08:12:04', '2020-01-26 08:12:04', NULL),
(74, 'Tool Keeper', '2020-01-26 08:12:57', '2020-01-26 08:12:57', NULL),
(75, 'MPC Field Executor', '2020-01-26 08:13:12', '2020-01-26 08:13:12', NULL),
(76, 'Production Administration', '2020-01-26 08:14:33', '2020-01-26 08:14:33', NULL),
(77, 'Secretary', '2020-01-26 08:14:42', '2020-01-26 08:14:42', NULL),
(78, 'Ammonia Superintendent', '2020-01-26 08:15:11', '2020-01-26 08:15:11', NULL),
(79, 'Operation Manager', '2020-01-26 08:15:22', '2020-01-26 08:15:22', NULL),
(80, 'Ammonia Panel Operator', '2020-01-26 08:15:32', '2020-01-26 08:15:32', NULL),
(81, 'Utility Panel Operator', '2020-01-26 08:15:42', '2020-01-26 08:15:42', NULL),
(82, 'Utility Foreman', '2020-01-26 08:15:56', '2020-01-26 08:15:56', NULL),
(83, 'Ammonia Foreman', '2020-01-26 08:16:07', '2020-01-26 08:16:07', NULL),
(84, 'Shift Supervisor', '2020-01-26 08:16:27', '2020-01-26 08:16:27', NULL),
(85, 'Panel Operator', '2020-01-26 08:17:20', '2020-01-26 08:17:20', NULL),
(86, 'Utility Field Operator', '2020-01-26 08:17:41', '2020-01-26 08:17:41', NULL),
(87, 'Ammonia Field Operator', '2020-01-26 08:18:08', '2020-01-26 08:18:08', NULL),
(88, 'Utility Superintendent', '2020-01-26 08:19:06', '2020-01-26 08:19:06', NULL),
(89, 'Operator Engineer', '2020-01-26 08:19:34', '2020-01-26 08:19:34', NULL),
(90, 'Field Operator', '2020-01-26 08:21:35', '2020-01-26 08:21:35', NULL),
(91, 'Quality MS Officer', '2020-01-26 08:21:56', '2020-01-26 08:21:56', NULL),
(92, 'Safety Foreman', '2020-01-26 08:22:14', '2020-01-26 08:22:14', NULL),
(93, 'Staff QSHE Manager', '2020-01-26 08:22:28', '2020-01-26 08:22:28', NULL),
(94, 'Safety, Health & Environment Superintendent', '2020-01-26 08:23:00', '2020-01-26 08:23:00', NULL),
(95, 'Safety Technician', '2020-01-26 08:23:17', '2020-01-26 08:23:17', NULL),
(96, 'Environment Foreman', '2020-01-26 08:23:34', '2020-01-26 08:23:34', NULL),
(97, 'Process Safety Engineer', '2020-01-26 08:24:48', '2020-01-26 08:24:48', NULL),
(98, 'Environment Technician', '2020-01-26 08:25:08', '2020-01-26 08:25:08', NULL),
(99, 'SHE Engineer', '2020-01-26 08:25:41', '2020-01-26 08:25:41', NULL),
(100, 'Staff Vice President Director', '2020-01-26 08:25:57', '2020-01-26 08:25:57', NULL),
(101, 'Inspection Engineer', '2020-01-26 08:26:19', '2020-01-26 08:26:19', NULL),
(102, 'Technical Support Manager', '2020-01-26 08:26:28', '2020-01-26 08:26:28', NULL),
(103, 'Reliability Superintendent', '2020-01-26 08:27:05', '2020-01-26 08:27:05', NULL),
(104, 'Inspector', '2020-01-26 08:27:19', '2020-01-26 08:27:19', NULL),
(105, 'Reliability Mechanical Engineer', '2020-01-26 08:27:35', '2020-01-26 08:27:35', NULL),
(106, 'Reliability E/I Engineer', '2020-01-26 08:28:00', '2020-01-26 08:28:00', NULL),
(107, 'Quality Laboratory Foreman', '2020-01-26 08:28:53', '2020-01-26 08:28:53', NULL),
(108, 'Technical Laboratory Foreman', '2020-01-26 08:29:08', '2020-01-26 08:29:08', NULL),
(109, 'PE Superintendent', '2020-01-26 08:29:47', '2020-01-26 08:29:47', NULL),
(110, 'Laboratory Analyst', '2020-01-26 08:29:58', '2020-01-26 08:29:58', NULL),
(111, 'Laboratory Supervisor', '2020-01-26 08:30:13', '2020-01-26 08:30:13', NULL),
(112, 'Process Engineer', '2020-01-26 08:30:31', '2020-01-26 08:30:31', NULL),
(113, 'Technology Manager', '2020-01-26 08:30:50', '2020-01-26 08:30:50', NULL),
(114, 'Staff GM Produksi', '2020-01-26 08:31:25', '2020-01-26 08:31:25', NULL),
(115, 'Mechanical Superintendent', '2020-01-26 08:34:48', '2020-01-26 08:34:48', NULL),
(116, 'Advisor', '2020-01-26 08:34:54', '2020-01-26 08:34:54', NULL),
(117, 'Finance Officer', '2020-01-26 08:35:01', '2020-01-26 08:35:01', NULL),
(118, 'HRD Manager', '2020-01-26 08:35:14', '2020-01-26 08:35:14', NULL),
(119, 'Staff GM Teknik & Logistik', '2020-01-26 08:35:31', '2020-01-26 08:35:42', NULL),
(120, 'QSHE Manager', '2020-01-26 08:36:09', '2020-01-26 08:36:09', NULL),
(121, 'Laboratory Superintendent', '2020-01-26 08:36:24', '2020-01-26 08:36:24', NULL),
(122, 'Senior Advisor', '2020-01-26 08:36:34', '2020-01-26 08:36:34', NULL),
(123, 'GM Production', '2020-01-26 08:39:23', '2020-01-26 08:39:23', NULL),
(124, 'GA Admin', '2020-01-29 18:46:37', '2020-01-29 18:46:37', NULL),
(125, 'General Services', '2020-01-29 18:47:06', '2020-01-29 18:47:06', NULL),
(126, 'GA & Personnel Support', '2020-01-29 18:47:38', '2020-01-29 18:47:38', NULL),
(127, 'Operation Engineer', '2020-02-02 10:04:32', '2020-02-02 10:04:32', NULL),
(128, 'Budget, Asset & Control', '2020-03-08 23:51:33', '2020-03-08 23:51:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\IncidentReport', 41, 'photos', '5ee337fe62376_parse', '5ee337fe62376_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 1, '2020-06-12 08:26:46', '2020-06-12 08:26:50'),
(2, 'App\\IncidentReport', 43, 'photos', '5ee33ec31589e_parse', '5ee33ec31589e_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 2, '2020-06-12 08:37:24', '2020-06-12 08:37:25'),
(3, 'App\\IncidentReport', 45, 'photos', '5ee3410e41ef8_parse', '5ee3410e41ef8_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 3, '2020-06-12 08:47:11', '2020-06-12 08:47:13'),
(4, 'App\\IncidentReport', 46, 'photos', '5ee3455fce292_parse', '5ee3455fce292_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 4, '2020-06-12 09:05:51', '2020-06-12 09:05:54'),
(5, 'App\\IncidentReport', 47, 'photos', '5ee6f202745e6_parse', '5ee6f202745e6_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 5, '2020-06-15 03:59:28', '2020-06-15 03:59:33'),
(6, 'App\\IncidentReport', 48, 'photos', '5ee710cf4f837_parse', '5ee710cf4f837_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 6, '2020-06-15 06:10:47', '2020-06-15 06:10:50'),
(7, 'App\\IncidentReport', 49, 'photos', '5ee727df13dbc_parse', '5ee727df13dbc_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 7, '2020-06-15 07:48:52', '2020-06-15 07:48:54'),
(8, 'App\\IncidentReport', 50, 'photos', '5ee7287d6f0c4_parse', '5ee7287d6f0c4_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 8, '2020-06-15 07:51:38', '2020-06-15 07:51:38'),
(9, 'App\\IncidentReport', 53, 'photos', '5ee72c82244ed_parse', '5ee72c82244ed_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 9, '2020-06-15 08:09:07', '2020-06-15 08:09:09'),
(10, 'App\\IncidentReport', 65, 'photos', '5eeb010427211_parse', '5eeb010427211_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 10, '2020-06-18 05:52:31', '2020-06-18 05:52:34'),
(11, 'App\\IncidentReport', 67, 'photos', '5eeb01a1beb9c_parse', '5eeb01a1beb9c_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 11, '2020-06-18 05:54:42', '2020-06-18 05:54:43'),
(12, 'App\\IncidentReport', 68, 'photos', '5eeb01e42afcd_parse', '5eeb01e42afcd_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 12, '2020-06-18 05:58:44', '2020-06-18 05:58:45'),
(13, 'App\\IncidentReport', 69, 'photos', '5ef16c433ad64_parse', '5ef16c433ad64_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 13, '2020-06-23 02:43:44', '2020-06-23 02:43:48'),
(14, 'App\\IncidentReport', 71, 'photos', '5ef16cd528ee3_parse', '5ef16cd528ee3_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 14, '2020-06-23 02:45:42', '2020-06-23 02:45:42'),
(15, 'App\\IncidentReport', 72, 'photos', '5ef17dcc9fc15_parse', '5ef17dcc9fc15_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 15, '2020-06-23 03:58:26', '2020-06-23 03:58:29'),
(16, 'App\\IncidentReport', 73, 'photos', '5ef19e1877fd6_parse', '5ef19e1877fd6_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 16, '2020-06-23 06:16:10', '2020-06-23 06:16:12'),
(17, 'App\\IncidentReport', 74, 'photos', '5ef19ec3f3944_parse', '5ef19ec3f3944_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 17, '2020-06-23 06:18:45', '2020-06-23 06:18:45'),
(18, 'App\\IncidentReport', 75, 'photos', '5ef1aa6b57738_parse', '5ef1aa6b57738_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 18, '2020-06-23 07:08:39', '2020-06-23 07:08:39'),
(19, 'App\\IncidentReport', 78, 'photos', '5ef1b05681fb4_parse', '5ef1b05681fb4_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 19, '2020-06-23 07:34:01', '2020-06-23 07:34:01'),
(20, 'App\\IncidentReport', 80, 'photos', '5ef1b07451255_parse', '5ef1b07451255_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 20, '2020-06-23 07:34:14', '2020-06-23 07:34:14'),
(21, 'App\\IncidentReport', 81, 'photos', '5ef1b08bd64d0_parse', '5ef1b08bd64d0_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 21, '2020-06-23 07:34:37', '2020-06-23 07:34:37'),
(22, 'App\\IncidentReport', 82, 'photos', '5ef1b2b6ef161_parse', '5ef1b2b6ef161_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 22, '2020-06-23 07:44:05', '2020-06-23 07:44:05'),
(23, 'App\\IncidentReport', 83, 'photos', '5ef1b3cf32dd5_parse', '5ef1b3cf32dd5_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 23, '2020-06-23 07:48:44', '2020-06-23 07:48:44'),
(24, 'App\\IncidentReport', 84, 'photos', '5ef1b5bd5ad29_parse', '5ef1b5bd5ad29_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 24, '2020-06-23 08:00:13', '2020-06-23 08:00:13'),
(25, 'App\\IncidentReport', 85, 'photos', '5ef43b0223013_parse', '5ef43b0223013_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 25, '2020-06-25 05:50:07', '2020-06-25 05:50:10'),
(26, 'App\\IncidentReport', 86, 'photos', '5ef43cdd5f412_parse', '5ef43cdd5f412_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 26, '2020-06-25 05:58:11', '2020-06-25 05:58:11'),
(27, 'App\\IncidentReport', 87, 'photos', '5ef43f5222bed_parse', '5ef43f5222bed_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 27, '2020-06-25 06:08:53', '2020-06-25 06:08:54'),
(28, 'App\\IncidentReport', 88, 'photos', '5ef43f8ac652e_parse', '5ef43f8ac652e_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 28, '2020-06-25 06:09:34', '2020-06-25 06:09:34'),
(29, 'App\\IncidentReport', 89, 'photos', '5ef44864e2862_parse', '5ef44864e2862_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 29, '2020-06-25 06:47:17', '2020-06-25 06:47:18'),
(30, 'App\\IncidentReport', 90, 'photos', '5ef44c029a0bb_parse', '5ef44c029a0bb_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 30, '2020-06-25 07:02:40', '2020-06-25 07:02:40'),
(31, 'App\\IncidentReport', 91, 'photos', '5ef44c1c8ae17_parse', '5ef44c1c8ae17_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 31, '2020-06-25 07:03:09', '2020-06-25 07:03:10'),
(32, 'App\\IncidentReport', 92, 'photos', '5ef453f583690_parse', '5ef453f583690_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 32, '2020-06-25 07:36:35', '2020-06-25 07:36:36'),
(33, 'App\\IncidentReport', 93, 'photos', '5ef454805d065_parse', '5ef454805d065_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 33, '2020-06-25 07:38:55', '2020-06-25 07:38:56'),
(34, 'App\\IncidentReport', 95, 'photos', '5ef454b0ef308_parse', '5ef454b0ef308_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 34, '2020-06-25 07:39:30', '2020-06-25 07:39:31'),
(35, 'App\\IncidentReport', 96, 'photos', '5ef455c956fcd_parse', '5ef455c956fcd_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 35, '2020-06-25 07:44:22', '2020-06-25 07:44:23'),
(36, 'App\\IncidentReport', 97, 'photos', '5ef4563d47184_parse', '5ef4563d47184_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 36, '2020-06-25 07:46:18', '2020-06-25 07:46:18'),
(37, 'App\\IncidentReport', 98, 'photos', '5ef45655013c9_parse', '5ef45655013c9_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 37, '2020-06-25 07:46:41', '2020-06-25 07:46:41'),
(38, 'App\\IncidentReport', 100, 'photos', '5ef4580dcd400_parse', '5ef4580dcd400_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 38, '2020-06-25 07:54:02', '2020-06-25 07:54:03'),
(39, 'App\\IncidentReport', 101, 'photos', '5ef4595e4464c_parse', '5ef4595e4464c_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 39, '2020-06-25 07:59:27', '2020-06-25 07:59:28'),
(40, 'App\\IncidentReport', 102, 'photos', '5ef459b317df2_parse', '5ef459b317df2_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 40, '2020-06-25 08:00:52', '2020-06-25 08:00:52'),
(41, 'App\\IncidentReport', 103, 'photos', '5ef459dce9b4e_parse', '5ef459dce9b4e_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 41, '2020-06-25 08:01:47', '2020-06-25 08:01:47'),
(42, 'App\\IncidentReport', 104, 'photos', '5ef45a0642d84_parse', '5ef45a0642d84_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 42, '2020-06-25 08:02:28', '2020-06-25 08:02:28'),
(43, 'App\\IncidentReport', 105, 'photos', '5ef45a2f25024_parse', '5ef45a2f25024_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 43, '2020-06-25 08:03:08', '2020-06-25 08:03:08'),
(44, 'App\\IncidentReport', 106, 'photos', '5ef45bcbf1d2f_parse', '5ef45bcbf1d2f_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 44, '2020-06-25 08:10:01', '2020-06-25 08:10:02'),
(45, 'App\\IncidentReport', 107, 'photos', '5ef45c161dd59_parse', '5ef45c161dd59_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 45, '2020-06-25 08:12:15', '2020-06-25 08:12:15'),
(46, 'App\\IncidentReport', 110, 'photos', '5ef461771d64c_parse', '5ef461771d64c_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 46, '2020-06-25 08:34:14', '2020-06-25 08:34:14'),
(47, 'App\\IncidentReport', 111, 'photos', '5ef462314fa17_parse', '5ef462314fa17_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 47, '2020-06-25 08:37:18', '2020-06-25 08:37:19'),
(48, 'App\\IncidentReport', 112, 'photos', '5ef462790d619_parse', '5ef462790d619_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 48, '2020-06-25 08:38:38', '2020-06-25 08:38:38'),
(49, 'App\\IncidentReport', 113, 'photos', '5ef53cccce9e1_parse', '5ef53cccce9e1_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 49, '2020-06-26 00:10:05', '2020-06-26 00:10:07'),
(50, 'App\\IncidentReport', 114, 'photos', '5ef53d2c4baf5_parse', '5ef53d2c4baf5_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 50, '2020-06-26 00:11:38', '2020-06-26 00:11:39'),
(51, 'App\\IncidentReport', 115, 'photos', '5ef53f965c25e_parse', '5ef53f965c25e_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 51, '2020-06-26 00:21:55', '2020-06-26 00:21:56'),
(52, 'App\\IncidentReport', 116, 'photos', '5ef53fea24afc_parse', '5ef53fea24afc_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 52, '2020-06-26 00:23:18', '2020-06-26 00:23:18'),
(53, 'App\\IncidentReport', 117, 'photos', '5ef5531adfc24_parse', '5ef5531adfc24_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 53, '2020-06-26 01:45:23', '2020-06-26 01:45:24'),
(54, 'App\\IncidentReport', 118, 'photos', '5ef59f8a46ee5_kasus8', '5ef59f8a46ee5_kasus8.png', 'image/png', 'public', 203349, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 54, '2020-06-26 07:11:23', '2020-06-26 07:11:25'),
(55, 'App\\IncidentReport', 119, 'photos', '5ef5a53d659bd_kasus8', '5ef5a53d659bd_kasus8.png', 'image/png', 'public', 203349, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 55, '2020-06-26 07:37:03', '2020-06-26 07:37:04'),
(56, 'App\\IncidentReport', 120, 'photos', '5ef5a7b540ecc_kasus8', '5ef5a7b540ecc_kasus8.png', 'image/png', 'public', 203349, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 56, '2020-06-26 07:46:11', '2020-06-26 07:46:11'),
(57, 'App\\IncidentReport', 121, 'photos', '5ef5bb6b068a5_kasus8', '5ef5bb6b068a5_kasus8.png', 'image/png', 'public', 203349, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 57, '2020-06-26 09:10:21', '2020-06-26 09:10:21'),
(58, 'App\\IncidentReport', 122, 'photos', '5ef9466b0f6e2_kasus8', '5ef9466b0f6e2_kasus8.png', 'image/png', 'public', 203349, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 58, '2020-06-29 01:40:34', '2020-06-29 01:40:37'),
(59, 'App\\IncidentReport', 123, 'photos', '5ef94781ab15b_kasus8', '5ef94781ab15b_kasus8.png', 'image/png', 'public', 203349, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 59, '2020-06-29 01:45:00', '2020-06-29 01:45:02'),
(60, 'App\\IncidentReport', 125, 'photos', '5ef947bd5d53c_parse', '5ef947bd5d53c_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 60, '2020-06-29 01:45:34', '2020-06-29 01:45:35'),
(61, 'App\\IncidentReport', 126, 'photos', '5ef9516c1675f_parse', '5ef9516c1675f_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 61, '2020-06-29 02:27:07', '2020-06-29 02:27:08'),
(62, 'App\\IncidentReport', 127, 'photos', '5ef951d637969_parse', '5ef951d637969_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 62, '2020-06-29 02:29:06', '2020-06-29 02:29:10'),
(63, 'App\\IncidentReport', 128, 'photos', '5ef952b5ac257_kasus8', '5ef952b5ac257_kasus8.png', 'image/png', 'public', 203349, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 63, '2020-06-29 02:32:34', '2020-06-29 02:32:37'),
(64, 'App\\IncidentReport', 129, 'photos', '5ef9552f97c3c_parse', '5ef9552f97c3c_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 64, '2020-06-29 02:43:21', '2020-06-29 02:43:23'),
(65, 'App\\IncidentReport', 130, 'photos', '5ef955a02c7c6_parse', '5ef955a02c7c6_parse.png', 'image/png', 'public', 6174, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 65, '2020-06-29 02:45:07', '2020-06-29 02:45:08'),
(66, 'App\\IncidentReport', 33, 'file', '5f1508a955d63_db_irms', '5f1508a955d63_db_irms.sql', 'text/x-Algol68', 'public', 260560, '[]', '[]', '[]', 66, '2020-07-20 02:59:54', '2020-07-20 02:59:54'),
(67, 'App\\IncidentReport', 53, 'file_investigation', '5f1516f224d79_User Name', '5f1516f224d79_User-Name.txt', 'text/plain', 'public', 960, '[]', '[]', '[]', 67, '2020-07-20 04:00:55', '2020-07-20 04:00:55'),
(68, 'App\\IncidentReport', 131, 'photos', '5f154b8cefe76_logokpi', '5f154b8cefe76_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 68, '2020-07-20 07:45:41', '2020-07-20 07:45:42'),
(69, 'App\\IncidentReport', 131, 'file', '5f154b9ab2205_db_irms', '5f154b9ab2205_db_irms.sql', 'text/x-Algol68', 'public', 260560, '[]', '[]', '[]', 69, '2020-07-20 07:45:42', '2020-07-20 07:45:42'),
(70, 'App\\IncidentReport', 132, 'photos', '5f154bc92b962_logokpi', '5f154bc92b962_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 70, '2020-07-20 07:46:33', '2020-07-20 07:46:33'),
(71, 'App\\IncidentReport', 133, 'photos', '5f16a87f04b44_logokpi', '5f16a87f04b44_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 71, '2020-07-21 08:34:27', '2020-07-21 08:34:28'),
(72, 'App\\IncidentReport', 133, 'file', '5f16a88e40f91_User Name', '5f16a88e40f91_User-Name.txt', 'text/plain', 'public', 960, '[]', '[]', '[]', 72, '2020-07-21 08:34:28', '2020-07-21 08:34:28'),
(73, 'App\\IncidentReport', 134, 'photos', '5f16a8febcd08_shoe1', '5f16a8febcd08_shoe1.jpg', 'image/jpeg', 'public', 153515, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 73, '2020-07-21 08:36:28', '2020-07-21 08:36:29'),
(74, 'App\\IncidentReport', 135, 'photos', '5f1e418fee0cc_logokpi', '5f1e418fee0cc_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 74, '2020-07-27 02:53:40', '2020-07-27 02:53:41'),
(75, 'App\\IncidentReport', 135, 'file', '5f1e41acbbcaa_db_irms', '5f1e41acbbcaa_db_irms.sql', 'text/x-Algol68', 'public', 260560, '[]', '[]', '[]', 75, '2020-07-27 02:53:41', '2020-07-27 02:53:41'),
(76, 'App\\IncidentReport', 136, 'photos', '5f1e48ae31f34_logokpi', '5f1e48ae31f34_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 76, '2020-07-27 03:23:57', '2020-07-27 03:23:57'),
(77, 'App\\IncidentReport', 136, 'file', '5f1e48c360651_db_irms', '5f1e48c360651_db_irms.sql', 'text/x-Algol68', 'public', 260560, '[]', '[]', '[]', 77, '2020-07-27 03:23:57', '2020-07-27 03:23:57'),
(78, 'App\\IncidentReport', 137, 'photos', '5f1e845d2b67e_logokpi', '5f1e845d2b67e_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 78, '2020-07-27 07:38:26', '2020-07-27 07:38:27'),
(79, 'App\\IncidentReport', 137, 'file', '5f1e846c68c71_db_irms', '5f1e846c68c71_db_irms.sql', 'text/x-Algol68', 'public', 260560, '[]', '[]', '[]', 79, '2020-07-27 07:38:27', '2020-07-27 07:38:27'),
(80, 'App\\IncidentReport', 138, 'photos', '5f1e8757779e8_logokpi', '5f1e8757779e8_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 80, '2020-07-27 07:51:19', '2020-07-27 07:51:19'),
(81, 'App\\IncidentReport', 138, 'file', '5f1e877435f67_Email sementara', '5f1e877435f67_Email-sementara.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 113643, '[]', '[]', '[]', 81, '2020-07-27 07:51:19', '2020-07-27 07:51:19'),
(82, 'App\\IncidentReport', 139, 'photos', '5f1e88fe8606e_logokpi', '5f1e88fe8606e_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 82, '2020-07-27 07:58:23', '2020-07-27 07:58:24'),
(83, 'App\\IncidentReport', 139, 'file', '5f1e89143cfdd_User Name', '5f1e89143cfdd_User-Name.txt', 'text/plain', 'public', 960, '[]', '[]', '[]', 83, '2020-07-27 07:58:24', '2020-07-27 07:58:24'),
(84, 'App\\IncidentReport', 140, 'photos', '5f1f75dae2cf0_logokpi', '5f1f75dae2cf0_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 84, '2020-07-28 00:50:12', '2020-07-28 00:50:13'),
(85, 'App\\IncidentReport', 140, 'file', '5f1f7613e2214_db_irms', '5f1f7613e2214_db_irms.sql', 'text/x-Algol68', 'public', 260560, '[]', '[]', '[]', 85, '2020-07-28 00:50:13', '2020-07-28 00:50:13'),
(86, 'App\\IncidentReport', 141, 'photos', '5f1f76569bba0_logokpi', '5f1f76569bba0_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 86, '2020-07-28 00:51:03', '2020-07-28 00:51:04'),
(87, 'App\\IncidentReport', 141, 'file', '5f1f7671656ba_db_irms', '5f1f7671656ba_db_irms.sql', 'text/x-Algol68', 'public', 260560, '[]', '[]', '[]', 87, '2020-07-28 00:51:04', '2020-07-28 00:51:04'),
(88, 'App\\IncidentReport', 142, 'photos', '5f1f9ae969a69_logokpi', '5f1f9ae969a69_logokpi.jpg', 'image/jpeg', 'public', 11218, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 88, '2020-07-28 03:26:48', '2020-07-28 03:26:49'),
(89, 'App\\IncidentReport', 142, 'file', '5f1f9af69f855_db_irms', '5f1f9af69f855_db_irms.sql', 'text/x-Algol68', 'public', 260560, '[]', '[]', '[]', 89, '2020-07-28 03:26:49', '2020-07-28 03:26:49'),
(90, 'App\\IncidentReport', 149, 'file_investigation', '5f2a18430a3af_kpi', '5f2a18430a3af_kpi.psd', 'image/vnd.adobe.photoshop', 'public', 252920, '[]', '[]', '[]', 90, '2020-08-05 02:24:04', '2020-08-05 02:24:04'),
(91, 'App\\IncidentReport', 156, 'photos', '5f2a51d91112f_kpi', '5f2a51d91112f_kpi.jpg', 'image/jpeg', 'public', 5474, '[]', '{\"generated_conversions\":{\"thumb\":true}}', '[]', 91, '2020-08-05 06:30:04', '2020-08-05 06:30:05'),
(92, 'App\\IncidentReport', 156, 'file', '5f2a51ea2ef69_kpi', '5f2a51ea2ef69_kpi.psd', 'image/vnd.adobe.photoshop', 'public', 252920, '[]', '[]', '[]', 92, '2020-08-05 06:30:05', '2020-08-05 06:30:05');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_01_31_000001_create_media_table', 1),
(8, '2020_01_31_000002_create_audit_logs_table', 1),
(9, '2020_01_31_000003_create_assets_histories_table', 1),
(10, '2020_01_31_000004_create_assets_table', 1),
(11, '2020_01_31_000005_create_asset_statuses_table', 1),
(12, '2020_01_31_000006_create_asset_locations_table', 1),
(13, '2020_01_31_000007_create_asset_categories_table', 1),
(14, '2020_01_31_000008_create_time_entries_table', 1),
(15, '2020_01_31_000009_create_time_projects_table', 1),
(16, '2020_01_31_000010_create_time_work_types_table', 1),
(17, '2020_01_31_000012_create_job_titles_table', 1),
(18, '2020_01_31_000013_create_origin_departments_table', 1),
(19, '2020_01_31_000014_create_designation_departments_table', 1),
(20, '2020_01_31_000015_create_classification_details_table', 1),
(21, '2020_01_31_000016_create_roles_table', 1),
(22, '2020_01_31_000017_create_classification_incidents_table', 1),
(23, '2020_01_31_000018_create_category_incidents_table', 1),
(24, '2020_01_31_000019_create_root_causes_table', 1),
(25, '2020_01_31_000020_create_results_table', 1),
(26, '2020_01_31_000021_create_user_alerts_table', 1),
(27, '2020_01_31_000022_create_permissions_table', 1),
(28, '2020_01_31_000023_create_users_table', 1),
(29, '2020_01_31_000024_create_user_user_alert_pivot_table', 1),
(30, '2020_01_31_000025_create_role_user_pivot_table', 1),
(31, '2020_01_31_000026_create_permission_role_pivot_table', 1),
(32, '2020_01_31_000027_add_relationship_fields_to_assets_histories_table', 1),
(33, '2020_01_31_000028_add_relationship_fields_to_assets_table', 1),
(34, '2020_01_31_000030_add_relationship_fields_to_time_entries_table', 1),
(35, '2020_01_31_000031_add_relationship_fields_to_classification_details_table', 1),
(36, '2020_01_31_000033_create_qa_topics_table', 1),
(37, '2020_02_17_130622_create_area_incidents_table', 1),
(38, '2020_03_11_081410_add_code_to_origin_departments_table', 1),
(39, '2020_03_11_081947_add_code_to_designation_departments_table', 1),
(40, '2020_05_05_143004_create_chemical_releases_table', 1),
(41, '2020_05_06_075240_create_incident_reports_table', 1),
(42, '2020_05_06_075943_add_relationship_fields_to_incident_reports_table', 1),
(43, '2020_05_19_080916_create_area_user_table', 1),
(44, '2020_06_15_164113_create_region_incidents_table', 2),
(45, '2020_06_16_103318_add_relationship_fields_to_incident_reports_table', 3),
(46, '2020_06_16_161003_add_relationship_fields_to_incident_reports_table', 4),
(47, '2020_03_10_150612_create_incident_reports_table', 5),
(48, '2020_06_16_163104_create_region_incidents_table', 6),
(49, '2020_06_17_094631_add_relationship_fields_to_incident_reports_table', 7),
(50, '2020_06_17_103737_create_results_table', 8),
(51, '2020_06_17_104647_add_relationship_fields_to_incident_reports_table', 9),
(52, '2020_07_08_151716_create_distribution_incidents', 10),
(53, '2020_07_29_135506_add_relationship_fields_to_distribution_incidents_table', 11),
(54, '2020_08_05_142248_create_distribution_incidents_table', 12),
(55, '2020_08_05_142354_add_relationship_fields_to_distribution_incidents_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `origin_departments`
--

CREATE TABLE `origin_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `origin_departments`
--

INSERT INTO `origin_departments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `code`) VALUES
(1, 'General Affairs & Information Technology', '2020-01-29 17:03:49', '2020-03-10 00:53:30', NULL, 'GA&IT'),
(2, 'Human Resource Development', '2020-01-26 09:46:09', '2020-03-10 00:54:00', NULL, 'HRD'),
(3, 'Maintenance', '2020-01-26 09:46:30', '2020-03-10 00:54:08', NULL, 'MECH'),
(4, 'Operation', '2020-01-26 09:46:41', '2020-03-10 00:54:16', NULL, 'OPR'),
(5, 'Finance & Accounting', '2020-01-26 09:47:17', '2020-03-10 00:54:33', NULL, 'FIN&ACC'),
(6, 'Logistic & Shipping', '2020-01-26 09:48:22', '2020-03-10 00:55:03', NULL, 'LOG&SHP'),
(7, 'Quality, Safety, Health and Environment', '2020-01-26 09:48:51', '2020-03-10 00:55:16', NULL, 'QSHE'),
(8, 'Technical Support', '2020-01-26 09:49:32', '2020-03-10 00:55:26', NULL, 'TSP'),
(9, 'Technology', '2020-01-26 09:50:10', '2020-03-10 00:55:37', NULL, 'TECH');

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
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'audit_log_show', NULL, NULL, NULL),
(18, 'audit_log_access', NULL, NULL, NULL),
(19, 'user_alert_create', NULL, NULL, NULL),
(20, 'user_alert_show', NULL, NULL, NULL),
(21, 'user_alert_delete', NULL, NULL, NULL),
(22, 'user_alert_access', NULL, NULL, NULL),
(23, 'incident_report_setting_access', NULL, NULL, NULL),
(24, 'result_create', NULL, NULL, NULL),
(25, 'result_edit', NULL, NULL, NULL),
(26, 'result_show', NULL, NULL, NULL),
(27, 'result_delete', NULL, NULL, NULL),
(28, 'result_access', NULL, NULL, NULL),
(29, 'root_cause_create', NULL, NULL, NULL),
(30, 'root_cause_edit', NULL, NULL, NULL),
(31, 'root_cause_show', NULL, NULL, NULL),
(32, 'root_cause_delete', NULL, NULL, NULL),
(33, 'root_cause_access', NULL, NULL, NULL),
(34, 'category_incident_create', NULL, NULL, NULL),
(35, 'category_incident_edit', NULL, NULL, NULL),
(36, 'category_incident_show', NULL, NULL, NULL),
(37, 'category_incident_delete', NULL, NULL, NULL),
(38, 'category_incident_access', NULL, NULL, NULL),
(39, 'classification_incident_create', NULL, NULL, NULL),
(40, 'classification_incident_edit', NULL, NULL, NULL),
(41, 'classification_incident_show', NULL, NULL, NULL),
(42, 'classification_incident_delete', NULL, NULL, NULL),
(43, 'classification_incident_access', NULL, NULL, NULL),
(44, 'classification_detail_create', NULL, NULL, NULL),
(45, 'classification_detail_edit', NULL, NULL, NULL),
(46, 'classification_detail_show', NULL, NULL, NULL),
(47, 'classification_detail_delete', NULL, NULL, NULL),
(48, 'classification_detail_access', NULL, NULL, NULL),
(49, 'designation_department_create', NULL, NULL, NULL),
(50, 'designation_department_edit', NULL, NULL, NULL),
(51, 'designation_department_show', NULL, NULL, NULL),
(52, 'designation_department_delete', NULL, NULL, NULL),
(53, 'designation_department_access', NULL, NULL, NULL),
(54, 'origin_department_create', NULL, NULL, NULL),
(55, 'origin_department_edit', NULL, NULL, NULL),
(56, 'origin_department_show', NULL, NULL, NULL),
(57, 'origin_department_delete', NULL, NULL, NULL),
(58, 'origin_department_access', NULL, NULL, NULL),
(59, 'job_title_create', NULL, NULL, NULL),
(60, 'job_title_edit', NULL, NULL, NULL),
(61, 'job_title_show', NULL, NULL, NULL),
(62, 'job_title_delete', NULL, NULL, NULL),
(63, 'job_title_access', NULL, NULL, NULL),
(64, 'incident_report_create', NULL, NULL, NULL),
(65, 'incident_report_edit', NULL, NULL, NULL),
(66, 'incident_report_show', NULL, NULL, NULL),
(67, 'incident_report_delete', NULL, NULL, NULL),
(68, 'incident_report_access', NULL, NULL, NULL),
(69, 'time_management_access', NULL, NULL, NULL),
(70, 'time_work_type_create', NULL, NULL, NULL),
(71, 'time_work_type_edit', NULL, NULL, NULL),
(72, 'time_work_type_show', NULL, NULL, NULL),
(73, 'time_work_type_delete', NULL, NULL, NULL),
(74, 'time_work_type_access', NULL, NULL, NULL),
(75, 'time_project_create', NULL, NULL, NULL),
(76, 'time_project_edit', NULL, NULL, NULL),
(77, 'time_project_show', NULL, NULL, NULL),
(78, 'time_project_delete', NULL, NULL, NULL),
(79, 'time_project_access', NULL, NULL, NULL),
(80, 'time_entry_create', NULL, NULL, NULL),
(81, 'time_entry_edit', NULL, NULL, NULL),
(82, 'time_entry_show', NULL, NULL, NULL),
(83, 'time_entry_delete', NULL, NULL, NULL),
(84, 'time_entry_access', NULL, NULL, NULL),
(85, 'time_report_create', NULL, NULL, NULL),
(86, 'time_report_edit', NULL, NULL, NULL),
(87, 'time_report_show', NULL, NULL, NULL),
(88, 'time_report_delete', NULL, NULL, NULL),
(89, 'time_report_access', NULL, NULL, NULL),
(90, 'asset_management_access', NULL, NULL, NULL),
(91, 'asset_category_create', NULL, NULL, NULL),
(92, 'asset_category_edit', NULL, NULL, NULL),
(93, 'asset_category_show', NULL, NULL, NULL),
(94, 'asset_category_delete', NULL, NULL, NULL),
(95, 'asset_category_access', NULL, NULL, NULL),
(96, 'asset_location_create', NULL, NULL, NULL),
(97, 'asset_location_edit', NULL, NULL, NULL),
(98, 'asset_location_show', NULL, NULL, NULL),
(99, 'asset_location_delete', NULL, NULL, NULL),
(100, 'asset_location_access', NULL, NULL, NULL),
(101, 'asset_status_create', NULL, NULL, NULL),
(102, 'asset_status_edit', NULL, NULL, NULL),
(103, 'asset_status_show', NULL, NULL, NULL),
(104, 'asset_status_delete', NULL, NULL, NULL),
(105, 'asset_status_access', NULL, NULL, NULL),
(106, 'asset_create', NULL, NULL, NULL),
(107, 'asset_edit', NULL, NULL, NULL),
(108, 'asset_show', NULL, NULL, NULL),
(109, 'asset_delete', NULL, NULL, NULL),
(110, 'asset_access', NULL, NULL, NULL),
(111, 'assets_history_access', NULL, NULL, NULL),
(112, 'my_incident_report_access', '2020-01-30 00:44:14', '2020-01-30 00:44:14', NULL),
(113, 'my_incident_report_create', '2020-01-30 00:44:21', '2020-01-30 00:44:21', NULL),
(114, 'my_incident_report_show', '2020-01-30 00:44:33', '2020-01-30 00:44:33', NULL),
(115, 'my_incident_report_delete', '2020-01-30 00:44:41', '2020-01-30 00:44:41', NULL),
(116, 'my_incident_report_edit', '2020-01-30 00:44:57', '2020-01-30 00:44:57', NULL),
(117, 'task_incident_report_access', '2020-01-30 00:45:13', '2020-01-30 00:45:13', NULL),
(118, 'task_incident_report_create', '2020-01-30 00:45:19', '2020-01-30 00:45:19', NULL),
(119, 'task_incident_report_delete', '2020-01-30 00:45:26', '2020-01-30 00:45:26', NULL),
(120, 'task_incident_report_edit', '2020-01-30 00:45:36', '2020-01-30 00:45:36', NULL),
(121, 'task_incident_report_show', '2020-01-30 00:45:41', '2020-01-30 00:45:41', NULL),
(122, 'history_my_incident_report_access', '2020-02-02 12:12:22', '2020-02-02 12:12:22', NULL),
(123, 'history_task_incident_report_access', '2020-02-02 12:12:34', '2020-02-02 12:12:34', NULL),
(124, 'history_my_incident_report_show', '2020-02-02 12:21:13', '2020-02-02 12:21:13', NULL),
(125, 'history_task_incident_report_show', '2020-02-02 12:21:25', '2020-02-02 12:21:25', NULL),
(126, 'user_parent_access', '2020-02-06 00:56:14', '2020-02-06 00:56:14', NULL),
(127, 'user_parent_show', '2020-02-06 00:56:37', '2020-02-06 00:56:37', NULL),
(128, 'user_parent_edit', '2020-02-06 00:56:53', '2020-02-06 00:56:53', NULL),
(129, 'user_parent_create', '2020-02-06 00:57:01', '2020-02-06 00:57:01', NULL),
(130, 'user_parent_delete', '2020-02-06 01:23:28', '2020-02-06 01:23:28', NULL),
(131, 'chemical_release_access', '2020-02-15 04:42:46', '2020-05-05 08:35:39', NULL),
(132, 'chemical_release_show', '2020-02-15 04:42:58', '2020-05-05 08:35:54', NULL),
(133, 'chemical_release_create', '2020-02-15 04:43:12', '2020-05-05 08:35:58', NULL),
(134, 'chemical_release_edit', '2020-02-15 04:43:25', '2020-05-05 08:36:05', NULL),
(135, 'chemical_release_delete', '2020-02-15 04:45:28', '2020-05-05 08:37:05', NULL),
(136, 'area_incident_access', '2020-02-16 04:53:36', '2020-02-16 04:53:36', NULL),
(137, 'area_incident_create', '2020-02-16 04:53:45', '2020-02-16 04:53:45', NULL),
(138, 'area_incident_edit', '2020-02-16 04:53:57', '2020-02-16 04:53:57', NULL),
(139, 'area_incident_show', '2020-02-16 04:54:06', '2020-02-16 04:54:06', NULL),
(140, 'area_incident_delete', '2020-02-16 04:54:14', '2020-02-16 04:54:14', NULL),
(141, 'ir_notification_access', '2020-03-19 01:43:01', '2020-03-19 01:43:01', NULL),
(142, 'ir_notification_show', '2020-03-19 01:43:12', '2020-03-19 01:43:12', NULL),
(143, 'ir_notification_create', '2020-03-19 01:43:22', '2020-03-19 01:43:22', NULL),
(144, 'ir_notification_edit', '2020-03-19 01:43:31', '2020-03-19 01:44:44', '2020-03-19 01:44:44'),
(145, 'ir_notification_delete', '2020-03-19 01:45:45', '2020-03-19 01:45:45', NULL),
(146, 'area_user_access', '2020-05-29 03:10:24', '2020-05-29 03:10:24', NULL),
(147, 'area_user_create', '2020-05-29 03:10:33', '2020-05-29 03:10:33', NULL),
(148, 'area_user_edit', '2020-05-29 03:10:43', '2020-05-29 03:10:43', NULL),
(149, 'area_user_show', '2020-05-29 03:10:51', '2020-05-29 03:10:51', NULL),
(150, 'area_user_delete', '2020-05-29 03:11:02', '2020-05-29 03:11:02', NULL),
(151, 'region_incident_access', '2020-06-16 07:25:37', '2020-06-16 07:25:37', NULL),
(152, 'region_incident_create', '2020-06-16 07:25:48', '2020-06-16 07:25:48', NULL),
(153, 'region_incident_edit', '2020-06-16 07:26:18', '2020-06-16 07:26:18', NULL),
(154, 'region_incident_show', '2020-06-16 07:26:25', '2020-06-16 07:26:25', NULL),
(155, 'region_incident_delete', '2020-06-16 07:26:33', '2020-06-16 07:26:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(2, 17),
(2, 18),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(3, 64),
(3, 65),
(3, 66),
(3, 67),
(3, 68),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 73),
(3, 74),
(3, 75),
(3, 76),
(3, 77),
(3, 78),
(3, 79),
(3, 80),
(3, 81),
(3, 82),
(3, 83),
(3, 84),
(3, 85),
(3, 86),
(3, 87),
(3, 88),
(3, 89),
(3, 90),
(3, 91),
(3, 92),
(3, 93),
(3, 94),
(3, 95),
(3, 96),
(3, 97),
(3, 98),
(3, 99),
(3, 100),
(3, 101),
(3, 102),
(3, 103),
(3, 104),
(3, 105),
(3, 106),
(3, 107),
(3, 108),
(3, 109),
(3, 110),
(3, 111),
(4, 23),
(4, 65),
(4, 66),
(4, 68),
(5, 23),
(5, 65),
(5, 66),
(5, 68),
(6, 23),
(6, 65),
(6, 66),
(6, 68),
(4, 67),
(7, 23),
(7, 66),
(7, 68),
(8, 23),
(8, 64),
(8, 66),
(4, 112),
(4, 114),
(4, 115),
(4, 116),
(5, 112),
(5, 114),
(6, 112),
(6, 114),
(6, 117),
(6, 121),
(8, 112),
(8, 113),
(8, 114),
(8, 117),
(8, 120),
(8, 121),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(3, 112),
(3, 113),
(3, 114),
(3, 115),
(3, 116),
(3, 117),
(3, 118),
(3, 119),
(3, 120),
(3, 121),
(9, 23),
(9, 65),
(9, 66),
(9, 68),
(9, 112),
(9, 114),
(9, 115),
(9, 116),
(9, 67),
(4, 124),
(6, 122),
(9, 122),
(9, 124),
(5, 122),
(5, 124),
(8, 122),
(8, 123),
(8, 124),
(8, 125),
(4, 122),
(6, 120),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(3, 122),
(3, 123),
(3, 124),
(3, 125),
(3, 126),
(3, 127),
(3, 128),
(3, 129),
(1, 130),
(6, 123),
(6, 124),
(6, 125),
(5, 123),
(5, 125),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(3, 130),
(3, 131),
(3, 132),
(3, 133),
(3, 134),
(3, 135),
(5, 113),
(5, 116),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(3, 136),
(3, 137),
(3, 138),
(3, 139),
(3, 140),
(6, 113),
(8, 68),
(10, 23),
(10, 66),
(10, 68),
(10, 112),
(10, 113),
(10, 114),
(5, 117),
(5, 120),
(5, 121),
(10, 117),
(10, 120),
(10, 121),
(10, 122),
(10, 123),
(10, 124),
(10, 125),
(6, 116),
(1, 141),
(1, 142),
(1, 143),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 152),
(1, 153),
(1, 154),
(1, 155);

-- --------------------------------------------------------

--
-- Table structure for table `qa_topics`
--

CREATE TABLE `qa_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Approved Partially', '2020-06-17 02:41:49', '2020-06-17 02:41:49', NULL),
(2, 'Approved Fully', '2020-06-17 02:41:56', '2020-06-17 02:41:56', NULL),
(3, 'Rejected', '2020-06-17 02:42:01', '2020-06-17 02:42:01', NULL),
(4, 'New', '2020-06-17 02:42:04', '2020-06-17 02:42:04', NULL),
(5, 'In Progress', '2020-06-17 02:42:09', '2020-06-17 02:42:09', NULL),
(6, 'Done', '2020-06-17 02:42:12', '2020-06-17 02:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL),
(3, 'Super Administrator', '2020-01-29 17:04:15', '2020-01-29 17:04:15', NULL),
(4, 'Supervisor', '2020-01-29 17:26:43', '2020-01-29 17:26:43', NULL),
(5, 'Superintendent', '2020-01-29 17:27:16', '2020-01-29 17:27:16', NULL),
(6, 'Manager', '2020-01-29 17:27:42', '2020-01-29 17:27:42', NULL),
(7, 'General Manager', '2020-01-29 17:28:24', '2020-01-29 17:28:24', NULL),
(8, 'Initiator', '2020-01-29 17:28:48', '2020-01-29 17:28:48', NULL),
(9, 'Foreman', '2020-02-02 05:29:36', '2020-02-02 05:29:36', NULL),
(10, 'Administrator', '2020-02-26 05:22:36', '2020-02-26 05:22:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(161, 6),
(162, 8),
(164, 5),
(160, 8),
(159, 5),
(124, 10),
(87, 8),
(123, 8),
(84, 8),
(139, 8),
(60, 8),
(43, 8),
(86, 8),
(56, 8),
(150, 8),
(163, 5),
(96, 5),
(131, 8),
(63, 8),
(107, 8),
(2, 10),
(167, 5),
(83, 5),
(59, 8),
(58, 6),
(158, 6);

-- --------------------------------------------------------

--
-- Table structure for table `root_causes`
--

CREATE TABLE `root_causes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `root_causes`
--

INSERT INTO `root_causes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tindakan tidak aman', '2020-01-29 19:25:13', '2020-01-29 19:25:13', NULL),
(2, 'Procedure', '2020-01-29 19:25:19', '2020-01-29 19:25:19', NULL),
(3, 'Lingkungan', '2020-01-29 19:25:28', '2020-01-29 19:25:28', NULL),
(4, 'Kegagalan Alat', '2020-01-29 19:25:33', '2020-01-29 19:25:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `time_entries`
--

CREATE TABLE `time_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `work_type_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_projects`
--

CREATE TABLE `time_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_work_types`
--

CREATE TABLE `time_work_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `job_id` int(10) UNSIGNED DEFAULT NULL,
  `dept_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `npk`, `parent_id`, `job_id`, `dept_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$6pFFBA//IIn8zwHdH3t3JOs.rD3S/0zAzQvZbIcVTrF1bDT6OemFe', NULL, '1', NULL, 1, 1, NULL, NULL, NULL),
(2, 'Daniel Sinaga', 'daniel.sinagaa@kpi.co.id', NULL, '$2y$10$eglN9TWvcL/uZrW9QGeb0eRQtf/avsyXQ/JPtnpOKd1dSuwv6XEYu', NULL, '1902379', 1, 1, 1, '2020-01-29 17:04:41', '2020-07-15 06:21:58', NULL),
(3, 'Budi Handoyo', 'sinagadaniel22@gmail.com', NULL, '$2y$10$3TVJdOVsUXFvIdduqI.cSuwqgxzKA4dJWrDZxRYuI4cA8qDq2RIwW', NULL, '9502005', NULL, 13, 5, '2020-01-29 17:30:10', '2020-05-12 14:39:31', NULL),
(4, 'Dewi Kilianjani P', 'dewi.kilianjani@kpi.co.id', NULL, '$2y$10$KMEb1sw0YsvV1vZN8iHG9uGLMIhcIhYQ/HGsmQfCtlYwjDH2RdpH.', NULL, '0801220', NULL, 6, 5, '2020-01-29 17:35:56', '2020-03-08 23:52:14', NULL),
(5, 'Mohamad Ahman', 'mohamad.ahman@kpi.co.id', NULL, '$2y$10$/k0eHCzV5iBbIha8IvSynuxHUnv0WvY1wDtMr/83Cq7ZtaSnndE5i', NULL, '0101123', NULL, 7, 5, '2020-01-29 17:36:49', '2020-05-04 16:13:16', NULL),
(6, 'Lelly Madona', 'lelly.madona@kpi.co.id', NULL, '$2y$10$6t3dMZOV1yVCMu34aXp9fOsgshDIll/t/SBcuRNda1.hnInqt3ww.', NULL, '0101104', NULL, 8, 5, '2020-01-29 17:37:52', '2020-03-08 23:53:34', NULL),
(7, 'Masniari Nasution', 'masniari.nasution@kpi.co.id', NULL, '$2y$10$/j0IJgWB1n8xenBmYcDRW..f.JdSCfwlJEBeDCKljMudhQlM4KxwS', NULL, '0101102', NULL, 10, 5, '2020-01-29 18:32:25', '2020-03-08 23:55:19', NULL),
(8, 'Eddy Mardiawan', 'eddy.mardiwan@kpi.co.id', NULL, '$2y$10$dtgg9mDiTJEI62KIsjvCOOCyfcusvEe8tG1iZEe8LdCkF9Rno3PX6', NULL, '0002053', NULL, 5, 5, '2020-01-29 18:33:12', '2020-03-08 23:58:51', NULL),
(9, 'Laura Theresia', 'laura.theresia@kpi.co.id', NULL, '$2y$10$lqmf1FsUlCkdiBG7yDhDgOp8AVWqavPBqy/Rnx4EEd8atqjiN0SOW', NULL, '1502331', NULL, 11, 5, '2020-01-26 14:20:55', '2020-03-08 23:59:14', NULL),
(10, 'Reynold PM Marbun', 'reynold.marbun@kpi.co.id', NULL, '$2y$10$OLVbqc7SLIqayNNl4Hkth.hr6T6hamtB0vjvvG0ZFrWSZPCqC5dlS', NULL, '1602333', NULL, 12, 5, '2020-01-26 14:22:16', '2020-03-08 23:59:52', NULL),
(11, 'Stevanus Yandi Putra Aji', 'sinagadaniel0122@gmail.com', NULL, '$2y$10$vSYV9pF84EZUpeXqeNOF7ea5ScFKNJVetjIWG4H.f6GpDwl3f8qEm', NULL, '1702348', NULL, 128, 5, '2020-01-26 14:23:43', '2020-05-12 14:39:57', NULL),
(12, 'David Desmanto Simbolon', 'gonzalez2002@gmail.com', NULL, '$2y$10$azMAEESTdad86XSqNTqiWes.FTarYa2g.HRck4wmfmHFkU0aNhm4K', NULL, '1602336', NULL, 14, 5, '2020-01-26 14:25:55', '2020-03-08 15:23:26', NULL),
(13, 'B. Budi Hermawan', 'razygul@gmail.com', NULL, '$2y$10$A8hkgP17dc6zY1HMwZy4N.wL4hnZxBZTuTF9XOy6RL.08OMFK9Deq', NULL, '9902014', NULL, 15, 1, '2020-01-26 14:27:42', '2020-02-18 17:44:01', NULL),
(14, 'Faisal Fachmi', 'faisal.fachmi@kpi.co.id', NULL, '$2y$10$98pxAMgfTY0X8dqfc1nZFuRMWjTUsJb6pMytQJDAxLA4P.91LNLr2', NULL, '0601194', NULL, 16, 2, '2020-01-26 14:29:06', '2020-01-30 00:55:42', NULL),
(15, 'Hestiningrum', 'hestiningrum@kpi.co.id', NULL, '$2y$10$WePlXNfB4GbQqDQ62aKFq.nK.zbFebksIip6gO34RDedwGlo0myHK', NULL, '1201256', NULL, 17, 2, '2020-01-26 14:30:13', '2020-02-02 00:31:53', NULL),
(16, 'Theodora Natalia CS', 'theodora.nathalia@kpi.co.id', NULL, '$2y$10$YzvxrhF5KPCIX4dw5OJ/FegrZ4zjDNf7TjGNH6eW5SaFywNCB4uRS', NULL, '1401293', NULL, 18, 2, '2020-01-26 14:32:51', '2020-01-30 00:56:09', NULL),
(17, 'Alfian', 'alfian@kpi.co.id', NULL, '$2y$10$qtzMvyL8RXNX7FrxMqxsiuG6Cwovq7k9PQQQT7e7v57lff2ZPu88a', NULL, '0101130', NULL, 19, 2, '2020-01-26 14:34:04', '2020-01-30 00:56:31', NULL),
(18, 'Harun A. Rosyid', 'harun.arosyid@kpi.co.id', NULL, '$2y$10$2l5iUQBO8FN8pHDAl9lAJOWoEa4OBoxxLsVJa/b1HWiYTZclh0Myu', NULL, '0101129', NULL, 20, 2, '2020-01-26 14:35:21', '2020-01-30 00:56:45', NULL),
(19, 'Susana Afriati', 'susana.afriati@kpi.co.id', NULL, '$2y$10$nbbhe2Nx75MKz3xghbfarOLGQhfwdPj/E677leFnaD1yXNMfdypDS', NULL, '0801218', NULL, 21, 2, '2020-01-26 14:36:17', '2020-01-30 00:57:49', NULL),
(20, 'Antonio Nalau', 'antonio.nalau@kpi.co.id', NULL, '$2y$10$7uLeKLTzFzraggOUz.hy.uraaHWf/7VgUQQxrcTyNWR9uthbIrFV6', NULL, '1701342', NULL, 22, 2, '2020-01-26 14:37:11', '2020-01-30 00:58:02', NULL),
(21, 'Rose Diana Rahel Sianturi', 'rose.sianturi@kpi.co.id', NULL, '$2y$10$vBQybPm7AXS.FNrYtFVTSuO1ULlm9wNLSoQkvCsWlooO/cU/je.XW', NULL, '1901372', NULL, 22, 2, '2020-01-26 14:37:53', '2020-01-30 00:58:10', NULL),
(22, 'Muhammad Nasrudin', 'jellibeans@gmail.com', NULL, '$2y$10$Z7HSETJ7WCiPYLs1MLrineAqtUyfAycNMksRXKA.4iAZxWACSVRcW', NULL, '0102157', NULL, 23, 1, '2020-01-26 14:38:46', '2020-02-18 17:44:34', NULL),
(23, 'Slamet Untung', 'slamet.untung@kpi.co.id', NULL, '$2y$10$Fa5fxVRIbol2CuACA0zPduEzL0moXivXK9GZm3SgRGKsyAoFiSHaO', NULL, '9601007', NULL, 24, 1, '2020-01-26 14:39:50', '2020-02-04 18:05:33', NULL),
(24, 'Aguspar', 'aguspar@kpi.co.id', NULL, '$2y$10$TVgsPHEpVJh65jrRgAcKXe.MEP0yB6KbCkRv1wkG5dahVY6l4y9mG', NULL, '0101110', NULL, 25, 1, '2020-01-26 14:40:27', '2020-02-04 18:07:06', NULL),
(25, 'Muhammad Ismail', 'muhammad.ismail@kpi.co.id', NULL, '$2y$10$d7zQ9fItIRvs1LYdQWeVuOP9F/o.YKzOt99KVXjVLtIazqD39bJ26', NULL, '9602009', NULL, 26, 1, '2020-01-26 14:41:33', '2020-02-04 18:07:21', NULL),
(26, 'Mery Juna Manalu', 'meryjuna.manalu@kpi.co.id', NULL, '$2y$10$Vlgt6mAWImxARAzeKD1.gOxgdoB0zryfs9fpHOQVXx1JhLmkImcdq', NULL, '0001033', NULL, 27, 1, '2020-01-26 14:42:52', '2020-02-04 18:07:35', NULL),
(27, 'Suprasetyo', 'suprasetyo@kpi.co.id', NULL, '$2y$10$8lVjNy0Cax0K5AQbcvreQ.Vhmqf86vEETTVsEbU6FNzAATA/AvIB2', NULL, '0001037', NULL, 28, 1, '2020-01-26 14:44:38', '2020-02-04 18:07:48', NULL),
(28, 'Darwis Tolleng', 'darwis.tolleng@kpi.co.id', NULL, '$2y$10$WYE3UuuylSMAeP97ragNlON408v/G5sD6mvk7e2C4aOfL2mgL8ok6', NULL, '0001038', NULL, 29, 1, '2020-01-26 14:45:17', '2020-02-04 18:10:02', NULL),
(29, 'Niko Dimus', 'niko.dimus@kpi.co.id', NULL, '$2y$10$UWw.o5ck1gg/eyTgFXBcrOxmgwIJSMWHVY8Bi36avVqbPjcC9sO6K', NULL, '0001039', NULL, 30, 1, '2020-01-26 14:47:18', '2020-02-04 18:10:14', NULL),
(30, 'Tabed Abia B.', 'tabed@kpi.co.id', NULL, '$2y$10$mf.hD1EYZmX355enEQFk/.Igsk/FxZV8GUKTtURb9S0Vz9IkisfQC', NULL, '0101106', NULL, 24, 1, '2020-01-26 14:48:17', '2020-02-04 18:10:51', NULL),
(31, 'Isma Rahmawaty', 'isma.rahmawaty@kpi.co.id', NULL, '$2y$10$Rz296E0sQvSGgdqX/JpRGevRc1XvWafw/wSmORsVlXPBh.iN4V4SO', NULL, '0101122', NULL, 124, 1, '2020-01-26 14:49:12', '2020-02-04 18:11:02', NULL),
(32, 'Syarifuddin', 'syariffuddin@kpi.co.id', NULL, '$2y$10$9fBw1DdSRAM208oAvtA2HuJ8rodxd2KQgmVfdKb3rr.LV9hp.QL3e', NULL, '0101128', NULL, 125, 1, '2020-01-26 14:51:03', '2020-02-04 18:11:30', NULL),
(33, 'Joko Harmanto', 'joko.harmanto@kpi.co.id', NULL, '$2y$10$zOU72a8/eRhvUCXGhss5AO7yq.xaIH0vLoMYFOkISNmf07d2.zFGW', NULL, '0502184', NULL, 126, 1, '2020-01-26 14:52:22', '2020-02-04 18:16:13', NULL),
(34, 'Agustinus Sad S', 'agustinus.sad@kpi.co.id', NULL, '$2y$10$rATcnvJcUBjNNrRIwEMPv.QzZmYmIvTNpvaeyvvcnvqukAfKRDdjq', NULL, '0602195', NULL, 24, 1, '2020-01-26 14:55:58', '2020-02-04 18:16:25', NULL),
(35, 'Kairul', 'kairul@kpi.co.id', NULL, '$2y$10$GxDn9.3upjtOGf6zxIZM2uQDjdfY4BpKcRCpFciTbzEnB.xBpLKZ.', NULL, '0001040', NULL, 31, 1, '2020-01-26 14:56:48', '2020-02-04 18:16:35', NULL),
(36, 'Hamzah Yahya', 'hamzah@kpi.co.id', NULL, '$2y$10$HMQxofpXsCn1t3sKEWKWRegfh225cJVkjfbSYx6zXytnbuxqmxCzO', NULL, '0801224', NULL, 32, 1, '2020-01-26 14:57:28', '2020-02-04 18:16:46', NULL),
(37, 'Yehuda Yuda', 'yehuda@kpi.co.id', NULL, '$2y$10$2WiTTw4EbtQ5n.E3qa.3n.3ovMuWM4NNlo1bxCArpHH.yVqA3xo2y', NULL, '1502313', NULL, 33, 1, '2020-01-26 14:58:33', '2020-02-04 18:16:58', NULL),
(38, 'Dwi Putranti Ratna Dewi', 'dwi.putranti@kpi.co.id', NULL, '$2y$10$sRz3kOUkI7PQiiUga5WMReMmT8qvw48IVGRgaQoPE55O1horVH.3y', NULL, '0402181', NULL, 34, 1, '2020-01-26 14:59:41', '2020-02-04 18:17:09', NULL),
(39, 'Stephanie Halim', 'stephanie.halim@kpi.co.id', NULL, '$2y$10$C93wM8HeAaytKnGickJPS.XfqfAIxBFWs5eHRPkzRigFTYw3OWhc2', NULL, '1902367', NULL, 35, 1, '2020-01-26 15:00:38', '2020-02-04 18:17:21', NULL),
(40, 'Muhammad Rosyad', 'app-supportt@kpi.co.id', NULL, '$2y$10$RljMojOVgZx/Ryt8ROF2neXT/m1TxMknO3ABUn9Buq.DVlByW721K', NULL, '1001248', NULL, 36, 1, '2020-01-26 15:01:09', '2020-05-12 13:53:37', NULL),
(41, 'Nugroho Cahyo Riadmojo', 'cahyo.riadmojo@kpi.co.id', NULL, '$2y$10$YoHoSx6tBdz/2pEeVctuz.gz.rN1/ZDLrBL2dHT5AQ3CyyrITw0Ii', NULL, '1302287', NULL, 37, 1, '2020-01-26 15:01:52', '2020-01-30 01:12:33', NULL),
(43, 'Alfiansyah Damara', 'alfiansyah.damaraa@kpi.co.id', NULL, '$2y$10$2XbI5ldh3ucvNhA5FsR16u2KXT76A5scC.TcEMnQ7OcaWQ.pXcMPW', NULL, '1901370', 40, 39, 1, '2020-01-26 15:03:31', '2020-06-09 00:13:23', NULL),
(44, 'Muhammad Yusuf', 'muhammad.yusuff@kpi.co.id', NULL, '$2y$10$7ZGJ9fNNueU3vcRGC5da4Od.LoierCkOMxC.gz0Rs/dUWnLSIiBny', NULL, '1901371', NULL, 40, 1, '2020-01-26 15:04:12', '2020-05-12 14:04:20', NULL),
(45, 'R Tommy Hendrawanto', 'ascanner@gmail.com', NULL, '$2y$10$z4IshRUAnISI0URQDw676.uPTuUMm/mB1JJtB6T6LeKlE/9aRWmJ6', NULL, '1702350', NULL, 41, 6, '2020-01-26 15:05:53', '2020-03-08 15:24:32', NULL),
(46, 'Hariyanto', 'hariyanto.wh@kpi.co.id', NULL, '$2y$10$o7qRkkzA2pxY1JBhlSCr4.HRCMVYNQxPvyEsRYIZbHgZg6VnuqZ6i', NULL, '0001036', NULL, 42, 6, '2020-01-26 15:06:43', '2020-03-08 15:24:56', NULL),
(47, 'Widi Pahala', 'widi.pahala@kpi.co.id', NULL, '$2y$10$sQfzwQWpeL94geV6JlxTfejqQM4ptNJwh3971FqSegGqYMqNS2AbS', NULL, '0101114', NULL, 43, 6, '2020-01-26 15:07:25', '2020-03-08 15:25:09', NULL),
(48, 'Edi Suranta Tarigan', 'edi.suranta@kpi.co.id', NULL, '$2y$10$lo8Bx/1UwHx4G2yDo3/OLOUB9wM3HQqVBsjdIIeyCwKpSC8QI4Yri', NULL, '0301174', NULL, 44, 6, '2020-01-26 15:09:01', '2020-03-08 15:25:25', NULL),
(49, 'Edi Susanto', 'edi.susanto@kpi.co.id', NULL, '$2y$10$6nGr4Z.Ipv7VvdbizvcasOemxwo/FWB3zjfDea1WGybeXNLM9kAl2', NULL, '0301177', NULL, 45, 6, '2020-01-26 15:09:53', '2020-03-08 15:25:52', NULL),
(50, 'Lumban MT Sinaga', 'lumban.sinaga@kpi.co.id', NULL, '$2y$10$REF8EEcLop568qVmFp05.utWQTegt7m/z7CZYKhVTpqwiUOyQJ07O', NULL, '0301178', NULL, 46, 6, '2020-01-26 15:10:50', '2020-03-08 15:26:11', NULL),
(51, 'Yudiansyah', 'yudiansyah@kpi.co.id', NULL, '$2y$10$HIAtaMQIMFHT58EewX3ygu5Ev.BBa1icVbsd0scc5dWnugTLb7Jle', NULL, '0501188', NULL, 47, 6, '2020-01-26 15:11:28', '2020-03-08 15:26:26', NULL),
(52, 'Zainul Arifin', 'zainul.arifin@kpi.co.id', NULL, '$2y$10$G0g4JlrNvVJXusaZBl9ZlOIlqGMvp9mo/fKt2fxIBI2e7bJtWAkQy', NULL, '0101113', NULL, 47, 6, '2020-01-26 15:12:09', '2020-03-08 15:26:39', NULL),
(53, 'Arifah Priestiwi', 'arifah.priestiwi@kpi.co.id', NULL, '$2y$10$5f2eZgm6DP.BWNGdyr0io.tfAMrdgXnwazU.Vun9.4ECDXnOvV4UG', NULL, '0001032', NULL, 43, 6, '2020-01-26 15:12:58', '2020-03-08 15:26:50', NULL),
(54, 'Agus Jaya', 'agus.jaya@kpi.co.id', NULL, '$2y$10$Oa6Mx1Tog.sLjb53g3x5P.ww9I6ZGtwVLKdH/N5aJifKJKbOutlCC', NULL, '0901233', NULL, 48, 6, '2020-01-26 15:13:36', '2020-03-08 15:27:02', NULL),
(55, 'Greweng Arieanto', 'greweng.arieanto@kpi.co.id', NULL, '$2y$10$xEH4ugLeWgy2e98degv47edxtJ1oF/xqHmM5pdGjH2FUpDFn6DP9e', NULL, '0401180', NULL, 43, 6, '2020-01-26 15:14:12', '2020-03-08 15:27:31', NULL),
(56, 'Adi Hendri Setiawan', 'app-supporttt@kpi.co.id', NULL, '$2y$10$Bt/G8xOdRg5T4aeJX1rgq.mP3oh9LTKuzI84Ltxj/OjKUE7SztdNC', NULL, '1302260', 58, 101, 8, '2020-01-28 13:34:41', '2020-06-15 03:34:03', NULL),
(57, 'Kuswara Hendrayana', 'natali140477@gmail.com', NULL, '$2y$10$rvz0zykIRt0EYChWoaXTH.D8DXKnDncm24QnFKjch6YPGMdN70pPm', NULL, '1702351', NULL, 102, 8, '2020-01-28 13:35:53', '2020-03-08 15:28:16', NULL),
(58, 'Murra Chandra Wicaksana', 'murra.candraa@kpi.co.id', NULL, '$2y$10$x9VTvRf/jeFF1OVcYfsGgO2By9C.9mdl4cZ6WEkukVFD.9GtreV9m', NULL, '0902229', 1, 103, 8, '2020-01-28 13:36:50', '2020-07-27 08:09:57', NULL),
(59, 'Bagus Yuwono', 'bagus.yuwono@kpi.co.id', NULL, '$2y$10$YBb5VooSrn7A7BkIPn0bduTpVBi5Gy.puTalwlrw9hRTcyRVW4Iya', NULL, '0001058', 58, 104, 8, '2020-01-28 13:37:33', '2020-07-27 02:52:14', NULL),
(60, 'Ilham Adityarsena Febryantho', 'daniel.sinaga1@kpi.co.id', NULL, '$2y$10$YuqFyO.ne3cQbeFgBhv5q.1oFzl4Z7up3L0E17ILZhS2xftykwemq', NULL, '1802354', 58, 105, 8, '2020-01-28 13:38:57', '2020-06-09 00:11:51', NULL),
(61, 'Avila Dhanu Kurniawan', 'asri.kamal@kpi.co.id', NULL, '$2y$10$cwAmm/kruHBN9inMHkrXpOKOq9B1eJ0CUfVFG6vqHmV0/cLvaj.Z2', NULL, '1802355', NULL, 101, 8, '2020-01-28 13:40:02', '2020-05-12 13:59:59', NULL),
(62, 'Yogi Anastra Danu Wijaya', 'muhammad.yusuf@kpi.co.id', NULL, '$2y$10$kVNOBVSOTKp77FXS2RHF8eBSYriaeXNikJu2TXOIJLH4.AMo6lQmO', NULL, '1802357', NULL, 106, 8, '2020-01-28 13:41:10', '2020-05-12 14:04:30', NULL),
(63, 'Muhammad Hanif Ramadhan', 'daniellegend7444@gmail.com', NULL, '$2y$10$CXu34e1qu/xBbhzgZjuR/er7JiMKz7/rX5KBiH3Jrex5gu2uI8Tv.', NULL, '1802358', 58, 105, 8, '2020-01-28 13:42:15', '2020-07-23 03:23:01', NULL),
(64, 'Akhmad Suryo Puguh Santoso', 'sabishineko@gmail.com', NULL, '$2y$10$3t1aSFJmTUsh/DomJjWgaOc9rUE7fmjWwIyB7bFijOguUn/KTcnwu', NULL, '1802362', NULL, 118, 2, '2020-01-28 16:03:53', '2020-03-08 15:30:49', NULL),
(66, 'Masrani', 'masrani@kpi.co.id', NULL, '$2y$10$dbpkfsHEPSe8aptstG86YOqEB1HYu6s0VYBXK4Q1sfdh4udnw8x5G', NULL, '0001024', NULL, 54, 3, '2020-02-02 05:38:45', '2020-03-08 15:32:14', NULL),
(67, 'Bistok Lumban Raja', 'bistok.lumban@kpi.co.id', NULL, '$2y$10$ClrhtnD3srxJFJbpqqNdeuqAu7uAdORHROqqwO9YGl/qX4CjyFRqi', NULL, '0001045', NULL, 55, 3, '2020-02-02 05:39:51', '2020-03-08 15:32:31', NULL),
(68, 'Lewi Tulak', 'lewi.tulak@kpi.co.id', NULL, '$2y$10$gH8MZYuXin5rHojPsLdMZu5lV4LXJbKsvNi.EWB6xi9D3ZTiaxSOK', NULL, '0001080', NULL, 56, 3, '2020-02-02 05:40:37', '2020-03-08 15:33:05', NULL),
(69, 'Nursyain', 'nursyain@kpi.co.id', NULL, '$2y$10$yShq1ygZu3x3ic.15ZyEzeoJjVXVqKpO5kDMASHyqbPnohuxVv45W', NULL, '0001083', NULL, 57, 3, '2020-02-02 05:41:32', '2020-03-08 15:33:32', NULL),
(70, 'Ronald Tampubolon', 'ronald.tampubolon@kpi.co.id', NULL, '$2y$10$uj2UumtZNIraleZvne3LouOLVqq5gaj5Wx4B0tcmkNY4emdtvP58W', NULL, '0001088', NULL, 58, 3, '2020-02-02 05:42:31', '2020-03-09 00:10:51', NULL),
(71, 'Sufian Nur', 'sufian.nur@kpi.co.id', NULL, '$2y$10$YKax63DGRajV.A2a8KyJie3AJVlYezJ84hp9426rMh0lKXqsR4R26', NULL, '0001091', NULL, 59, 3, '2020-02-02 05:43:12', '2020-05-04 15:58:00', NULL),
(72, 'Sugiman', 'sugiman@kpi.co.id', NULL, '$2y$10$tx6qHWCZppO5BUejpGCewOT1lpdyUbrgy.xI9dmUpX2D2klEEtER.', NULL, '0001092', NULL, 60, 3, '2020-02-02 05:44:08', '2020-03-09 00:11:11', NULL),
(73, 'Winarno', 'winarno@kpi.co.id', NULL, '$2y$10$osCArLDQMaKapqCSms.HquG6w2pdnX2LXOMXOPRnydwsV1BnBa/EW', NULL, '0001098', NULL, 60, 3, '2020-02-02 05:44:52', '2020-03-09 00:11:46', NULL),
(74, 'Ahmad Syaifuddin', 'ahmad.syaifuddin@kpi.co.id', NULL, '$2y$10$odycgtjW8Bq6pbckflTUh.GsGWR5/YRdjk6GHTmZmXC5sP/d62qxi', NULL, '0101105', NULL, 61, 3, '2020-02-02 05:45:53', '2020-03-09 00:11:52', NULL),
(75, 'Bambang Sutrisno', 'bambang.sutrisno@kpi.co.id', NULL, '$2y$10$pNNdNkqKZ3QjVHugS3g8jOW.N..9OEmTBdXnJW92b7UcIZWMOn1oy', NULL, '0101133', NULL, 60, 3, '2020-02-02 05:46:31', '2020-03-09 00:11:57', NULL),
(76, 'Said Alamsyah', 'said.alamsyah@kpi.co.id', NULL, '$2y$10$pOLapt.8ZVzGnQ21ttgYp.La6HkgZc4bV8GH64HWvIJWRsj6LsQ/C', NULL, '0101149', NULL, 58, 3, '2020-02-02 05:47:07', '2020-03-09 00:12:01', NULL),
(77, 'Muhammad Nur', 'muhammad.nur@kpi.co.id', NULL, '$2y$10$G004Rrf//Qi/ZSjWZIIgO.fWYig.AKv6hmR828QnV/Tg9VphEPATm', NULL, '0101152', NULL, 62, 3, '2020-02-02 05:48:00', '2020-03-09 00:12:06', NULL),
(78, 'Deddy Irawan', 'deddy.irawan@kpi.co.id', NULL, '$2y$10$3jE3u25f9PZKRpqRSh7/jOoR7afbwDdO5k5X7bQRFQscM1tDVyo1i', NULL, '0101153', NULL, 63, 3, '2020-02-02 05:48:48', '2020-05-04 15:58:47', NULL),
(79, 'Eddy Dwiono Sakti', 'eddy.dwiono@kpi.co.id', NULL, '$2y$10$D2VypSl8dOxjAXbCKcZju.321Hor9a8aUnrY0h7o1KN4iTUIKu5KK', NULL, '0101155', NULL, 64, 3, '2020-02-02 05:49:59', '2020-05-04 15:59:18', NULL),
(80, 'Zuhadi', 'zuhadi@kpi.co.id', NULL, '$2y$10$fmJpAvxG0JPFSFwsMohF0ODrwEqA0ZQxLG9S0HAs1WkybD3HPNA/.', NULL, '0101164', NULL, 65, 3, '2020-02-02 05:50:38', '2020-05-04 16:00:01', NULL),
(81, 'Djono', 'djono@kpi.co.id', NULL, '$2y$10$91.1p7hVOAXQWBlTTMEjfOujN0BTvr/LdQyh3iyQMkwOv6PTPXmYG', NULL, '0101165', NULL, 66, 3, '2020-02-02 05:51:37', '2020-05-04 16:00:23', NULL),
(82, 'Sunaryo', 'sunaryo@kpi.co.id', NULL, '$2y$10$hSAKzWYU4ESVEdeiqxCo9OYluiKo2t0STX5vp6wRJARGEOaa40ESW', NULL, '0401182', NULL, 56, 3, '2020-02-02 05:52:16', '2020-03-08 15:38:22', NULL),
(83, 'Kukuh Pradipa', 'kukuh.pradipaa@kpi.co.id', NULL, '$2y$10$0rl7YsE1cZmhmyoFW8e34.Eqxu4bqZrDKNF10CPE.z6F68h7KvrNK', NULL, '0902228', 161, 68, 3, '2020-02-02 05:52:55', '2020-07-23 02:48:57', NULL),
(84, 'Randika Gunawan', 'superintendenttest54111@gmail.com', NULL, '$2y$10$UBZQng8S5cMvHKzr54m4ZusMCTAzEGPo/rpkwAknO9blyiAa4sXG2', '1302284', '167', 58, 69, 3, '2020-02-02 05:53:30', '2020-06-08 06:37:54', NULL),
(85, 'Gilang Hari Pratomo', 'gilang.pratomo@kpi.co.id', NULL, '$2y$10$xd7oJHwstz1ypqoeUqgXJOhbjjfxKTvzfznfjb2RJCCAoYg4z71E.', NULL, '1802356', NULL, 70, 3, '2020-02-02 05:54:20', '2020-03-08 15:39:18', NULL),
(86, 'Andre Febrianto', 'andre.febrianto0@kpi.co.id', NULL, '$2y$10$Y0DM1AxAay6gNtd3xUbv4exuhSUdRPU7G.wQ0jDd2DNuK5bDRxUXC', NULL, '1802353', 164, 71, 3, '2020-02-02 05:55:10', '2020-06-23 07:45:30', NULL),
(87, 'Dimas Dwi Ananda', 'dimas.ananda@kpi.co.id', NULL, '$2y$10$HluMVqPawAUjl8F0DtVnCOi.OU8qfrJ19g94kz28L.UpbTun01sK6', NULL, '1802360', 167, 72, 3, '2020-02-02 05:55:46', '2020-06-03 01:28:07', NULL),
(88, 'Angga Galuh Pradana', 'angga.pradana@kpi.co.id', NULL, '$2y$10$gcTdpCGLEgss1H/sT1JfduRBqH2FYwPbh0RSrHswFfrYwa33B97xG', NULL, '1501314', NULL, 73, 3, '2020-02-02 05:56:13', '2020-03-08 15:39:54', NULL),
(89, 'Tumpal Pandapotan Siregar', 'tumpal.siregar@kpi.co.id', NULL, '$2y$10$t6lr.D1Ak0vZsH2fHhLF6uR1iek4cfyEaYPwZ40kFcJXgQdVKNUAO', NULL, '0101107', NULL, 60, 3, '2020-02-02 05:57:31', '2020-03-09 00:14:55', NULL),
(90, 'Wahyu Purwono', 'wahyu.purwono@kpi.co.id', NULL, '$2y$10$s5ulrRBvo55pNQFhkUeX7.C/uZ2TeAIUGAetMC.7oCA53BKX4WYnO', NULL, '0101139', NULL, 60, 3, '2020-02-02 06:00:07', '2020-03-09 00:15:14', NULL),
(91, 'Abdul Rahman', 'abdul.rahman@kpi.co.id', NULL, '$2y$10$wC7UvYX/pc2UjNYYW0/YgOp.kIKoVxz5/lG4/09wIjTS4MGf.RCbO', NULL, '0701207', NULL, 74, 3, '2020-02-02 06:00:54', '2020-03-09 00:15:22', NULL),
(92, 'Rahmat Kartolo', 'rahmat.kartolo@kpi.co.id', NULL, '$2y$10$w4tmA1dt0Ibg6PiqISZIIu3CQv6JB12A/EKqVmaRlmMd9hJ284XVK', NULL, '0101127', NULL, 74, 3, '2020-02-02 06:01:47', '2020-03-09 00:15:29', NULL),
(93, 'Ery Achmad Rondhi', 'ery.rondhi@kpi.co.id', NULL, '$2y$10$ox81w9Iwmufu0ISEBCUCq.1Om9lCUCK1hF0kQ3jFF/xUEsLO9/uQK', NULL, '1701343', NULL, 75, 3, '2020-02-02 06:02:51', '2020-03-08 15:40:37', NULL),
(94, 'Wijianto', 'wijianto@kpi.co.id', NULL, '$2y$10$XZa3yYvZhjeP7V0arWu0z.lF0fIaBLAKnycMVehfoxNg1aNbSdk2q', NULL, '1001250', NULL, 76, 4, '2020-02-02 06:03:41', '2020-03-09 00:17:35', NULL),
(95, 'Ina Orrania Jayanti Pattaru', 'ina.orrania@kpi.co.id', NULL, '$2y$10$UFAKOJQjUZatXpNatjLDhe7qMj5JyBbZqVLw5Fte2egZUFLYYdc02', NULL, '1401295', NULL, 77, 4, '2020-02-02 06:04:42', '2020-03-09 00:17:43', NULL),
(96, 'Zaki Sani Rahman', 'zaki.rahmann@kpi.co.id', NULL, '$2y$10$nIVf8/92Th8ZYMUTaiIH1e3194RiOsWhGmSkPBdxb2ZAejDjgIApC', NULL, '0802214', 158, 78, 4, '2020-02-02 06:05:13', '2020-07-15 03:44:50', NULL),
(98, 'Agus Supriadi', 'agus.supriadi@kpi.co.id', NULL, '$2y$10$gsGr.a0Pgh6dgBl5ZE6sXOobKSQZnYPzr.544n4t0vxn3zYRX/L/q', NULL, '0001055', NULL, 80, 4, '2020-02-02 06:06:33', '2020-05-07 12:14:33', NULL),
(99, 'Ansyursyah', 'ansyursyah@kpi.co.id', NULL, '$2y$10$pQlbCfuJMXyaQbMhCEVY2.C0w2KE4zlF7Kmf9ceDL4Of9Lq1Gmbiy', NULL, '0001057', NULL, 82, 4, '2020-02-02 06:07:42', '2020-05-04 16:00:42', NULL),
(100, 'Dedie Noeryanto', 'dedie.noeryanto@kpi.co.id', NULL, '$2y$10$QF1RLTAT5PaOnzJMlWs5Dup2fdu0DUwyGEK5xv56H2ykqLVewq2qi', NULL, '0001062', NULL, 83, 4, '2020-02-02 06:08:33', '2020-05-04 16:01:24', NULL),
(101, 'Dharlys Tiku Kala', 'dharlys.kala@kpi.co.id', NULL, '$2y$10$Hon./hI1KwMO5gfS5aGrxurV1NnZdS7nJBbiyVOmKhc5Su.VZ8gUq', NULL, '0001063', NULL, 81, 4, '2020-02-02 06:09:34', '2020-03-08 15:43:22', NULL),
(102, 'Don Ericson Panjaitan', 'don.erricson@kpi.co.id', NULL, '$2y$10$NaHaPGBbZIC7M6867BYeC.WQgfkTeIxLNcMd9n9xo8vo8WE0Fp3TC', NULL, '0001064', NULL, 83, 4, '2020-02-02 06:10:23', '2020-05-04 16:02:01', NULL),
(103, 'Dwi Kusharyono', 'dwi.kusharyono@kpi.co.id', NULL, '$2y$10$597c3C.hnnxxQPLG8SjcPeWYrzEZbxPuKNQYE/HsnQ/P7RvJB6Rw2', NULL, '0001065', NULL, 80, 4, '2020-02-02 06:11:21', '2020-03-08 15:43:50', NULL),
(104, 'Eko Sudrajat', 'eko.sudrajat@kpi.co.id', NULL, '$2y$10$teD6tKOfj6MoptzBOqzAD.ev0XVdpsx02adH/6HYOxoFuyTb8xRVq', NULL, '0001066', NULL, 82, 4, '2020-02-02 06:12:08', '2020-05-04 16:02:17', NULL),
(105, 'Fery Yon', 'fery.yon@kpi.co.id', NULL, '$2y$10$qBj5PDs0lTzy22w2kZ3mDO.f7FPOauqdr.4i8EgijpJAYhMipOzIW', NULL, '0001068', NULL, 80, 4, '2020-02-02 06:13:18', '2020-03-08 15:44:51', NULL),
(106, 'Herry Sulistiono', 'herry.sulistiono@kpi.co.id', NULL, '$2y$10$MSMiEfSX.A5FU3eFmh1R8.n6nTdkS4rxwJP/CS7YRUzSWk0XFVo8y', NULL, '0001071', NULL, 84, 4, '2020-02-02 06:14:11', '2020-03-09 00:20:33', NULL),
(107, 'Iwan Surono', 'iwan.surono@kpi.co.id', NULL, '$2y$10$.TcOooGPaijHmdIWGGdLzuRaiSCB5wyld0zppVMCt7pCXWK3B8QnS', NULL, '0001074', 163, 82, 4, '2020-02-02 06:15:04', '2020-06-26 07:34:45', NULL),
(108, 'Joko Susilo', 'joko.susilo@kpi.co.id', NULL, '$2y$10$oNwV3.VXCelr7wUaIOnVWuDTRA.rsEKuDvC86xMSzjKakx3SRiVCe', NULL, '0001076', NULL, 84, 4, '2020-02-02 06:15:51', '2020-03-09 00:20:47', NULL),
(109, 'Khamim Rosidi', 'khamim.rosidi@kpi.co.id', NULL, '$2y$10$g.cc37Yl02VLy2RxIGqEDO5aC8HPFE9X.8j1GV7vnYs7nMJxoD.6.', NULL, '0001077', NULL, 83, 4, '2020-02-02 06:16:47', '2020-05-04 16:03:02', NULL),
(110, 'Muhammad Nur Faisal', 'muhammad.faisal@kpi.co.id', NULL, '$2y$10$EthY5S.m7w5MNqVzq1HGFeknXaJt2LgZ4ZuNdNt1zKnsw8JNxZuL6', NULL, '0001081', NULL, 80, 4, '2020-02-02 06:17:52', '2020-03-08 15:45:46', NULL),
(111, 'Parno', 'parno@kpi.co.id', NULL, '$2y$10$2.JQCTPp3Falf2mCfL2vIeBySlDq9zcq9zL/XCy6dEjl4eEJvw6Ua', NULL, '0001084', NULL, 83, 4, '2020-02-02 06:18:26', '2020-05-04 16:03:24', NULL),
(112, 'Rindu Firmansyah', 'rindu.firmansyah@kpi.co.id', NULL, '$2y$10$sHOX3T4s7mp8Fw3PVyRHhu8uZCKQLkZ0WRBVBWNgZHYXy3YlC93Hq', NULL, '0001086', NULL, 82, 4, '2020-02-02 06:19:16', '2020-05-04 16:03:51', NULL),
(113, 'Tuwuh Sudiharto', 'tuwuh.sudiharto@kpi.co.id', NULL, '$2y$10$SQ/xHAM8HbUSBpf4Aq0Q3OgJfx6LRN33.xN4oq1QOHCjz5rXYpQYO', NULL, '0001094', NULL, 80, 4, '2020-02-02 06:20:23', '2020-03-08 15:46:18', NULL),
(114, 'Wachid', 'wachid@kpi.co.id', NULL, '$2y$10$lKm3r1zIXwi/fAgWcywMoubZ./KXfFbslwCLB5VNg.6MgJH8uaTiS', NULL, '0001095', NULL, 82, 4, '2020-02-02 06:21:13', '2020-05-04 16:04:09', NULL),
(115, 'Wahyu Teguh Setyadi', 'wahyu.teguh@kpi.co.id', NULL, '$2y$10$Ob6G/VhoImM0UBll4PC.gOi5JgGhhzTDA16B152lp7Vja2Hxxo8kq', NULL, '0001096', NULL, 83, 4, '2020-02-02 06:22:19', '2020-05-04 16:04:29', NULL),
(116, 'Wahyu', 'wahyu.opr@kpi.co.id', NULL, '$2y$10$.og4uOL3uRpr5T3omD5uWOc9jLG/0NbSyu9jCjY9X17crpEDwFA2e', NULL, '0501191', NULL, 80, 4, '2020-02-02 06:22:59', '2020-03-08 15:47:34', NULL),
(117, 'Mardiyanto', 'mardiyanto@kpi.co.id', NULL, '$2y$10$8siwH9TZeCNP3YSj4AtZced2qpqXUCCjWTBzEAwZoqHs9pBDoe3Yq', NULL, '0001034', NULL, 91, 7, '2020-02-02 06:24:14', '2020-03-08 15:47:43', NULL),
(118, 'Wahyu', 'wahyu@kpi.co.id', NULL, '$2y$10$YDYf3S5mM4tvyr6TnZ/j7uSzw0Y9EVb3Unf3pnkZdeBJbXA81q/ve', NULL, '0001100', NULL, 92, 7, '2020-02-02 06:25:39', '2020-05-04 16:04:56', NULL),
(119, 'Burhanuddin', 'makhmud77@gmail.com', NULL, '$2y$10$PXE0jNjWTNYLYBF1nOay3eH0ZShH8dE8YdghpIPIIvj.iQdSxOZAa', NULL, '0002046', NULL, 93, 7, '2020-02-02 06:26:39', '2020-03-08 15:48:06', NULL),
(120, 'Danny Anggara', 'danny.anggara@kpi.co.id', NULL, '$2y$10$RtLV6wpN0no/doPEjcAnT.9EDT1/bXrwal1502ot5EUe0BwR8em4O', 'uT8vR0gAFfTW1gzjmnv8lrIdIAc2QcrRLsjobVAjZbjqhfADbnjMYh0Z7HfY', '0802219', NULL, 94, 7, '2020-02-02 06:27:44', '2020-03-08 15:48:16', NULL),
(121, 'Aryani Retno S', 'aryani.retno@kpi.co.id', NULL, '$2y$10$mL9OksgLPt89VEZLAEI..u0wVUXtcRZpHVXGl8RCvTf1kScNHBbvu', NULL, '0001042', NULL, 96, 7, '2020-02-02 06:29:02', '2020-05-04 16:05:07', NULL),
(122, 'Nandang Kurniawan', 'nandang.kurniawan@kpi.co.id', NULL, '$2y$10$gdWmvCdORHWAfU95qbZFqO5wiZG/TbQV7aD3bHk.kLuxm711hm5K2', NULL, '0102140', NULL, 92, 7, '2020-02-02 06:30:18', '2020-05-04 16:06:05', NULL),
(123, 'Zikrina Hanifah Herfiani', 'zikrina.herfiani@kpi.co.id', NULL, '$2y$10$2IhRuN3Q51Y983O0HORuFuXYlrHahe37/8DqvL52.K0XLnRzJZxnW', NULL, '1801364', 120, 99, 7, '2020-02-02 06:31:09', '2020-06-03 01:28:45', NULL),
(124, 'Arif Rahman Hakim', 'arif.rahman@kpi.co.id', NULL, '$2y$10$4NQuyGBH0Hq1nIBJvqgfuuW3nohO50NHi4ZOfCVZtRkIwaY2dZoKS', NULL, '1302280', 120, 97, 7, '2020-02-02 06:32:04', '2020-06-03 01:26:58', NULL),
(125, 'Fajar Adiyatama', 'fajar.adiyatama@kpi.co.id', NULL, '$2y$10$4gAb3HhPJ0Y0gDb3VEdQreFIrGNjsRxKlViGJhp9OzzoTxdXIuSq2', NULL, '1401296', NULL, 91, 7, '2020-02-02 06:32:55', '2020-03-08 15:49:16', NULL),
(126, 'Takalimin', 'takalimin@kpi.co.id', NULL, '$2y$10$hImzEkEtqgfI6u49jUHXtOjJ0B.96e5noKrEUuw/BgFDcp7yra7I2', NULL, '0101138', NULL, 95, 7, '2020-02-02 06:33:30', '2020-03-08 15:49:27', NULL),
(127, 'Ruslan', 'ruslan@kpi.co.id', NULL, '$2y$10$p/CNRGkfHuFSs12fTsCaYeUzHY//zEQYzovkGuofIYLfmV5rGJbfm', NULL, '0101126', NULL, 98, 7, '2020-02-02 06:34:22', '2020-03-08 15:49:48', NULL),
(128, 'Pahmi', 'pahmi@kpi.co.id', NULL, '$2y$10$mjEMq4b7j34QaEaeYX6cvu5bCjGlGwZSsIAbOPxTFrnRdAtsn1Fqi', NULL, '0101135', NULL, 95, 7, '2020-02-02 06:35:20', '2020-03-08 15:49:57', NULL),
(129, 'Lukman Cahaya Mustika', 'lukman.cahaya@kpi.co.id', NULL, '$2y$10$HKdY8btgy6kPQfrGe2EZIe7AO2fZFNm5jOwc/.9QZAePQPVuecAry', NULL, '0701200', NULL, 80, 4, '2020-02-02 09:37:50', '2020-03-08 15:50:10', NULL),
(130, 'Wachyudi', 'wachyudi@kpi.co.id', NULL, '$2y$10$sD.0ReBqDOtrSanH1.4WW.yLxn8DyNbKf9FTRjnMsKlvTqySVz/4m', NULL, '0701202', NULL, 85, 4, '2020-02-02 09:38:58', '2020-03-08 15:50:32', NULL),
(131, 'Risky Ilhamsyah', 'risky.ilhamsyah@kpi.co.id', NULL, '$2y$10$iMmRyRWSB6ahtxg5E.TEn.h5wSKBs2.mH8TJtnOlvIbmrSAniZmdO', NULL, '0701204', 159, 80, 4, '2020-02-02 09:40:09', '2020-06-23 07:41:20', NULL),
(132, 'Endik Warsito', 'endik.warsito@kpi.co.id', NULL, '$2y$10$P8WDOsOV4AZKQLPkz7gKxO2vllmCTCh7Npfz7BQ3JW2U9wsAHT4pq', NULL, '0102124', NULL, 107, 9, '2020-02-02 09:43:49', '2020-05-04 16:05:51', NULL),
(133, 'Ardyan Kusuma Jaya', 'ardyan.kusuma@kpi.co.id', NULL, '$2y$10$1toe/dug.L4qjxDp1Jil1.fEL3u/eI/KtLVvD8GN/0/RfwFYg13pe', NULL, '0801226', NULL, 109, 8, '2020-02-02 09:45:14', '2020-03-08 15:51:50', NULL),
(134, 'Muhammad Rizki', 'muhammad.rizki@kpi.co.id', NULL, '$2y$10$A.hjXiE31gHu1M6kr1WLjefu0QzxLe/HZGV.WLsBWaxes2/wrEEN6', NULL, '0902232', NULL, 110, 9, '2020-02-02 09:46:23', '2020-03-09 00:27:23', NULL),
(135, 'Robertus Gunung Dwiriawan', 'robertus.dwiriawan@kpi.co.id', NULL, '$2y$10$ytBjLMExXKI96oHS1zR78.7E1oY5dtyj2EkqqqE3XIOxjAxaJM0LO', NULL, '1902368', NULL, 120, 7, '2020-02-02 09:47:36', '2020-03-08 15:53:04', NULL),
(136, 'Sapto Hari Prasetyo', 'sapto.hari@kpi.co.id', NULL, '$2y$10$CfakqUN83J2nAKktB54bWecplpzm1UmrAGPZMBLshzV8y8363R702', NULL, '9203270', NULL, 123, 4, '2020-02-02 09:49:05', '2020-03-08 15:53:22', NULL),
(137, 'Syahrul Sanudji', 'syahrul.sanudji@kpi.co.id', NULL, '$2y$10$XvNuh1ZwOD8SyDQgzWUnDOMK3d5w5YdGgSOqsx8.PAbIzIwUkq7jS', NULL, '1102252', NULL, 110, 9, '2020-02-02 09:50:16', '2020-03-09 00:27:29', NULL),
(138, 'Finqo Aprianto', 'finqo.aprianto@kpi.co.id', NULL, '$2y$10$zcKpsV7ImD1ODk.IhjLIeuHkzis3aeE5bOVApIenKmwYH0Ycc9fXK', NULL, '1501305', NULL, 111, 9, '2020-02-02 09:52:47', '2020-03-08 15:57:10', NULL),
(139, 'Mochamad Wildan', 'superintendenttest24111@gmail.com', NULL, '$2y$10$K5bBSaSAsfl7jlR.n4GEOeQXttphQB7JndfE2PdHTBuqhSciVlqoe', NULL, '1502320', 133, 112, 9, '2020-02-02 09:54:01', '2020-06-08 06:38:49', NULL),
(140, 'Rendy Vapriandani', 'test.user@kpi.co.id', NULL, '$2y$10$IcRWvCTFC3dqC0n7UCG7tuc67cHm51oczpED.yL7P/Rcxx7Qgu6r2', NULL, '1302282', NULL, 112, 9, '2020-02-02 09:54:41', '2020-05-12 14:38:48', NULL),
(141, 'Gihon Andre Asmitra Harahap', 'sinagadaniel2@gmail.com', NULL, '$2y$10$WmWh8P5s/hLzaOqtg3Hvve3bgk.h17lQis/Sq3.1VY15LkHpdWjTi', NULL, '1302286', NULL, 112, 9, '2020-02-02 09:55:30', '2020-05-12 14:39:34', NULL),
(142, 'Yehezkiel Imanuel Maruanaya', 'yehezkiel.maruanayaa@kpi.co.id', NULL, '$2y$10$DID/XByJ3zIiRXDCD7NZleN7TzR4VDvOM1o3I71HDFScLvmQ3bzbW', NULL, '1502328', NULL, 110, 9, '2020-02-02 09:56:42', '2020-05-12 13:52:33', NULL),
(143, 'Dicky Indra Saputra', 'dicky.saputra@kpi.co.id', NULL, '$2y$10$y54YWgpgmlsDix2LlVZAq.cFE8Xdp258GTBvul3OUj32xwITU1RL2', NULL, '1502329', NULL, 110, 9, '2020-02-02 09:57:26', '2020-03-08 15:58:20', NULL),
(144, 'Kus Heryadi', 'fhaufiku@gmail.com', NULL, '$2y$10$dVRUrdw/LLZau.hCckxVR.P1Ac.nmSKvF8v6HZnLqg8slVkLIU1Cu', NULL, '1702341', NULL, 113, 9, '2020-02-02 09:58:15', '2020-03-08 15:58:34', NULL),
(145, 'Muhammad Septian', 'muhammad.septian@kpi.co.id', NULL, '$2y$10$E2.Mo4q63zvV/tc1Pp3bs.7t6Iw110qPJwqfKIzTVNU2ExOzHEY4W', NULL, '1701347', NULL, 110, 9, '2020-02-02 09:59:30', '2020-03-08 15:58:51', NULL),
(146, 'Rully Andrian Nugroho', 'rully.nugroho@kpi.co.id', NULL, '$2y$10$DVF1ujOVd/iqBS6luYcSt.uSv6aAjzNlM0EcbuDfeCp/.OjjCy.FK', NULL, '0102141', NULL, 108, 9, '2020-02-02 10:00:30', '2020-05-04 16:06:21', NULL),
(147, 'M Wahid Ardani B', 'muhammad.wahid@kpi.co.id', NULL, '$2y$10$hi1cK82hpBnmFo9y4.yXEuWNq/JJaJn93wYAaW6gH3cLSkpqwc3dq', NULL, '1301270', NULL, 110, 9, '2020-02-02 10:01:26', '2020-03-08 15:59:14', NULL),
(148, 'M Delta Aslam Azis', 'muhammad.delta@kpi.co.id', NULL, '$2y$10$T.c2pBmogQddUI5Swzr0I.38d3P1ELTloQf7G6RnICYDc5cKGmGFa', NULL, '1501311', NULL, 110, 9, '2020-02-02 10:02:17', '2020-03-08 16:02:03', NULL),
(149, 'Yurisman Djamaluddin', 'yurisman.djamaluddin@kpi.co.id', NULL, '$2y$10$w2SN9KhuOBAVjG86p1j9NOSAQzCUPP2YZmFE4rOmUHg8ky7EHHWUW', NULL, '1402290', NULL, 110, 9, '2020-02-02 10:03:11', '2020-03-08 16:02:26', NULL),
(150, 'Filoyak Josua Sinaga', 'sinagadaniel012@gmail.com', NULL, '$2y$10$wFpfkRmczyDdl1fDWhLf5eNHsH79BqWDAGxF3Y0PcyW9ES/HUPuS.', NULL, '1501321', 159, 127, 4, '2020-02-02 10:05:17', '2020-06-23 07:37:55', NULL),
(152, 'Asri Kamal', 'asri.kamall@kpi.co.id', NULL, '$2y$10$orj26zi/nBIP5JNKyZ1AhuL4r4kkqjQUvNhc9r3s2AbEII/kgyPSe', NULL, '0101121', NULL, 38, 1, '2020-02-08 23:26:58', '2020-05-12 13:59:50', NULL),
(157, 'Sukadi', 'sukadi@kpi.co.id', NULL, '$2y$10$ocN8bF/AogX9KomsaoFJFuepTlu/bXEJmsXMEhcrI.f13/xW1UtZC', NULL, '0001093', NULL, 87, 4, '2020-02-08 23:58:24', '2020-03-08 16:00:02', NULL),
(158, 'Manager Creator Test', 'managertest41@gmail.com', NULL, '$2y$10$UvQSG7Tjj.XAI4hP1i.gYOZ2Vn4Lv3AoNyGr0otIKsS1pBjg8aM2G', '4hGJEBJsAGU6Y1jcuwBe9496FNue9G11jgvspuYklCLvR5gQYPqsVx4ciXm2', '2002190', 1, 79, 4, '2020-02-09 17:37:50', '2020-07-22 01:01:03', NULL),
(159, 'Superintendent Creator Test', 'superintendenttest541@gmail.com', NULL, '$2y$10$3i8BJRmmA.waXzNaVoxM9e6r3wF9yeMnTA8b3PoZUV1Kc7lUn2sl2', NULL, '2002191', 159, 78, 4, '2020-02-09 17:42:05', '2020-07-24 01:25:53', NULL),
(160, 'Creator Test', 'daniellegend744@gmail.com', NULL, '$2y$10$jx8DuELsMn3PESmUQ9mXIO3aaxD7g1i9iedia5wRLODmSi64NleR6', NULL, '2002192', 159, 87, 4, '2020-02-09 17:44:41', '2020-07-23 03:24:06', NULL),
(161, 'Manager Executor Test', 'managertest94@gmail.com', NULL, '$2y$10$Sqasw5Od8efQIjcR1E8BsOgnmPyGMGXTSG/TfA.sEXmvq2.BdlA9S', NULL, '2002193', 1, 53, 3, '2020-02-09 17:47:56', '2020-06-25 05:40:23', NULL),
(162, 'Executor Test', 'executortest1@gmail.com', NULL, '$2y$10$NxT2T0NFcQsaRQNEq46RDORtI0m/Vnr4wQnDvZFIHaQBkbehClCr.', NULL, '2002194', 164, 60, 3, '2020-02-09 17:49:06', '2020-06-25 05:39:58', NULL),
(163, 'Baskara Aji Nugraha', 'daniel.sinaga@kpi.co.id', NULL, '$2y$10$2UT4oUiggxjTpN85X4p1rusoRBvV9BwNx5apb.Gu997.izoCcdIme', NULL, '1102251', 158, 88, 4, '2020-02-25 03:07:50', '2020-06-26 07:40:03', NULL),
(164, 'Superintendent Executor Test', 'superintendenttest241@gmail.com', NULL, '$2y$10$i7yQkdkjtqjsvBiQMZpPQe6zFXlEsT40xssCrIgP5K4YMpK0CQ9Mu', NULL, '2002195', 161, 115, 3, '2020-03-01 01:36:54', '2020-06-26 07:39:54', NULL),
(165, 'Administrator Safety', 'daniel.sinagaaa@kpi.co.id', NULL, '$2y$10$0unlK62x1J.gM.RulkCOAepdN3Fc8rYfjOb.4D4ZpKBkLaERvDdO6', NULL, '2002196', NULL, 100, 7, '2020-03-01 23:34:59', '2020-04-28 00:39:40', NULL),
(166, 'Suyanto', 'suyanto@kpi.co.id', NULL, '$2y$10$bSMstpeyKw8J4wqg4luPguth7p/Wow1lwGcYqbuOD4.47EOyNCvqK', NULL, '1901376', NULL, 121, 9, '2020-03-08 15:56:25', '2020-03-08 15:56:25', NULL),
(167, 'Mujiyono', 'daniellegend74@gmail.com', NULL, '$2y$10$76EPiSQa..gz.6v./W6R..bP4//.PIhhZr3yNzPK00t6g8TrhQ9OO', NULL, '1601337', 161, 115, 3, '2020-03-09 00:09:14', '2020-07-23 03:24:17', NULL),
(168, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 08:07:51', '2020-06-12 08:07:51', NULL),
(169, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 08:08:25', '2020-06-12 08:08:25', NULL),
(170, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 08:08:31', '2020-06-12 08:08:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` int(10) UNSIGNED NOT NULL,
  `alert_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alert_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_incidents`
--
ALTER TABLE `area_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_user`
--
ALTER TABLE `area_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_id_fk_924542` (`area_id`),
  ADD KEY `user_id_fk_924543` (`user_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_944481` (`category_id`),
  ADD KEY `status_fk_944485` (`status_id`),
  ADD KEY `location_fk_944486` (`location_id`),
  ADD KEY `assigned_to_fk_944488` (`assigned_to_id`);

--
-- Indexes for table `assets_histories`
--
ALTER TABLE `assets_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_fk_944493` (`asset_id`),
  ADD KEY `status_fk_944494` (`status_id`),
  ADD KEY `location_fk_944495` (`location_id`),
  ADD KEY `assigned_user_fk_944496` (`assigned_user_id`);

--
-- Indexes for table `asset_categories`
--
ALTER TABLE `asset_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_locations`
--
ALTER TABLE `asset_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_statuses`
--
ALTER TABLE `asset_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_incidents`
--
ALTER TABLE `category_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemical_releases`
--
ALTER TABLE `chemical_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classification_details`
--
ALTER TABLE `classification_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_927423` (`category_id`),
  ADD KEY `classification_fk_929975` (`classification_id`);

--
-- Indexes for table `classification_incidents`
--
ALTER TABLE `classification_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_departments`
--
ALTER TABLE `designation_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_reports`
--
ALTER TABLE `incident_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_pelapor_fk_927464` (`nama_pelapor_id`),
  ADD KEY `reviewed_by_fk_927474` (`reviewed_by_id`),
  ADD KEY `dept_origin_fk_927478` (`dept_origin_id`),
  ADD KEY `root_cause_fk_927479` (`root_cause_id`),
  ADD KEY `category_fk_927480` (`category_id`),
  ADD KEY `classify_fk_927481` (`classify_id`),
  ADD KEY `dept_designated_fk_927482` (`dept_designated_id`),
  ADD KEY `ri_fk_914570` (`ri_id`),
  ADD KEY `result_fk_927483` (`result_id`),
  ADD KEY `acknowledged_by_fk_927484` (`acknowledged_by_id`),
  ADD KEY `action_by_fk_944425` (`action_by_id`),
  ADD KEY `assigned_to_fk_944425` (`assigned_to_id`),
  ADD KEY `cr_fk_942862` (`cr_id`),
  ADD KEY `area_fk_963580` (`area_id`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_titles_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `origin_departments`
--
ALTER TABLE `origin_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_478762` (`role_id`),
  ADD KEY `permission_id_fk_478762` (`permission_id`);

--
-- Indexes for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_topics_creator_id_foreign` (`creator_id`),
  ADD KEY `qa_topics_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_478771` (`user_id`),
  ADD KEY `role_id_fk_478771` (`role_id`);

--
-- Indexes for table `root_causes`
--
ALTER TABLE `root_causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_entries`
--
ALTER TABLE `time_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_type_fk_944458` (`work_type_id`),
  ADD KEY `project_fk_944459` (`project_id`);

--
-- Indexes for table `time_projects`
--
ALTER TABLE `time_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_work_types`
--
ALTER TABLE `time_work_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_npk_unique` (`npk`),
  ADD KEY `parent_fk_950165` (`parent_id`),
  ADD KEY `job_fk_927461` (`job_id`),
  ADD KEY `dept_fk_930199` (`dept_id`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_927343` (`user_alert_id`),
  ADD KEY `user_id_fk_927343` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_incidents`
--
ALTER TABLE `area_incidents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area_user`
--
ALTER TABLE `area_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets_histories`
--
ALTER TABLE `assets_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_categories`
--
ALTER TABLE `asset_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_locations`
--
ALTER TABLE `asset_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_statuses`
--
ALTER TABLE `asset_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `category_incidents`
--
ALTER TABLE `category_incidents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chemical_releases`
--
ALTER TABLE `chemical_releases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classification_details`
--
ALTER TABLE `classification_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `classification_incidents`
--
ALTER TABLE `classification_incidents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designation_departments`
--
ALTER TABLE `designation_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `incident_reports`
--
ALTER TABLE `incident_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `origin_departments`
--
ALTER TABLE `origin_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `qa_topics`
--
ALTER TABLE `qa_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `root_causes`
--
ALTER TABLE `root_causes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_entries`
--
ALTER TABLE `time_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_projects`
--
ALTER TABLE `time_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_work_types`
--
ALTER TABLE `time_work_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_user`
--
ALTER TABLE `area_user`
  ADD CONSTRAINT `area_id_fk_924542` FOREIGN KEY (`area_id`) REFERENCES `area_incidents` (`id`),
  ADD CONSTRAINT `user_id_fk_924543` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assigned_to_fk_944488` FOREIGN KEY (`assigned_to_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `category_fk_944481` FOREIGN KEY (`category_id`) REFERENCES `asset_categories` (`id`),
  ADD CONSTRAINT `location_fk_944486` FOREIGN KEY (`location_id`) REFERENCES `asset_locations` (`id`),
  ADD CONSTRAINT `status_fk_944485` FOREIGN KEY (`status_id`) REFERENCES `asset_statuses` (`id`);

--
-- Constraints for table `assets_histories`
--
ALTER TABLE `assets_histories`
  ADD CONSTRAINT `asset_fk_944493` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  ADD CONSTRAINT `assigned_user_fk_944496` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `location_fk_944495` FOREIGN KEY (`location_id`) REFERENCES `asset_locations` (`id`),
  ADD CONSTRAINT `status_fk_944494` FOREIGN KEY (`status_id`) REFERENCES `asset_statuses` (`id`);

--
-- Constraints for table `classification_details`
--
ALTER TABLE `classification_details`
  ADD CONSTRAINT `category_fk_927423` FOREIGN KEY (`category_id`) REFERENCES `category_incidents` (`id`),
  ADD CONSTRAINT `classification_fk_929975` FOREIGN KEY (`classification_id`) REFERENCES `classification_incidents` (`id`);

--
-- Constraints for table `incident_reports`
--
ALTER TABLE `incident_reports`
  ADD CONSTRAINT `acknowledged_by_fk_927484` FOREIGN KEY (`acknowledged_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `action_by_fk_944425` FOREIGN KEY (`action_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `area_fk_963580` FOREIGN KEY (`area_id`) REFERENCES `area_incidents` (`id`),
  ADD CONSTRAINT `assigned_to_fk_944425` FOREIGN KEY (`assigned_to_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `category_fk_927480` FOREIGN KEY (`category_id`) REFERENCES `category_incidents` (`id`),
  ADD CONSTRAINT `classify_fk_927481` FOREIGN KEY (`classify_id`) REFERENCES `classification_incidents` (`id`),
  ADD CONSTRAINT `cr_fk_942862` FOREIGN KEY (`cr_id`) REFERENCES `chemical_releases` (`id`),
  ADD CONSTRAINT `dept_designated_fk_927482` FOREIGN KEY (`dept_designated_id`) REFERENCES `designation_departments` (`id`),
  ADD CONSTRAINT `dept_origin_fk_927478` FOREIGN KEY (`dept_origin_id`) REFERENCES `origin_departments` (`id`),
  ADD CONSTRAINT `nama_pelapor_fk_927464` FOREIGN KEY (`nama_pelapor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `result_fk_927483` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`),
  ADD CONSTRAINT `reviewed_by_fk_927474` FOREIGN KEY (`reviewed_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ri_fk_914570` FOREIGN KEY (`ri_id`) REFERENCES `region_incidents` (`id`),
  ADD CONSTRAINT `root_cause_fk_927479` FOREIGN KEY (`root_cause_id`) REFERENCES `root_causes` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_478762` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_478762` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD CONSTRAINT `qa_topics_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_topics_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_478771` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_478771` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_entries`
--
ALTER TABLE `time_entries`
  ADD CONSTRAINT `project_fk_944459` FOREIGN KEY (`project_id`) REFERENCES `time_projects` (`id`),
  ADD CONSTRAINT `work_type_fk_944458` FOREIGN KEY (`work_type_id`) REFERENCES `time_work_types` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `dept_fk_930199` FOREIGN KEY (`dept_id`) REFERENCES `origin_departments` (`id`),
  ADD CONSTRAINT `job_fk_927461` FOREIGN KEY (`job_id`) REFERENCES `job_titles` (`id`),
  ADD CONSTRAINT `parent_fk_950165` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_927343` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_927343` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
