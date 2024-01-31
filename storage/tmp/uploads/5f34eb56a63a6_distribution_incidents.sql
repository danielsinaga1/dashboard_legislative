-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 08:20 AM
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
-- Table structure for table `distribution_incidents`
--

CREATE TABLE `distribution_incidents` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `result_id` int(10) UNSIGNED DEFAULT NULL,
  `name_id` int(10) UNSIGNED DEFAULT NULL,
  `ir_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distribution_incidents`
--

INSERT INTO `distribution_incidents` (`id`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `result_id`, `name_id`, `ir_id`) VALUES
(1, NULL, NULL, '2020-07-30 08:27:53', '2020-07-30 08:27:53', NULL, NULL, NULL, 3),
(2, NULL, 'Open', '2020-08-03 03:22:58', '2020-08-03 03:22:58', NULL, NULL, 160, 147),
(3, NULL, 'Open', '2020-08-03 03:37:07', '2020-08-03 03:37:07', NULL, NULL, 160, 148),
(4, 'Created', 'Open', '2020-08-03 03:44:07', '2020-08-03 03:44:07', NULL, 4, 160, 149),
(5, NULL, 'Open', '2020-08-03 06:49:28', '2020-08-03 06:49:28', NULL, 4, 159, 150),
(6, NULL, 'Open', '2020-08-03 06:49:28', '2020-08-03 06:49:28', NULL, 1, 159, 150),
(7, NULL, 'Open', '2020-08-03 07:27:20', '2020-08-03 07:27:20', NULL, 4, 159, 151),
(8, NULL, 'Open', '2020-08-03 07:27:20', '2020-08-03 07:27:20', NULL, 1, 159, 151),
(9, NULL, 'Open', '2020-08-03 08:13:04', '2020-08-03 08:13:04', NULL, 4, 159, 152),
(10, NULL, 'Open', '2020-08-03 08:13:50', '2020-08-03 08:13:50', NULL, 4, 159, 153),
(11, NULL, 'Open', '2020-08-03 08:15:29', '2020-08-03 08:15:29', NULL, 4, 159, 154),
(12, NULL, 'Open', '2020-08-03 08:15:29', '2020-08-03 08:15:29', NULL, 1, 159, 154),
(13, NULL, 'Open', '2020-08-03 08:16:10', '2020-08-03 08:16:10', NULL, 4, 159, 155),
(14, NULL, 'Open', '2020-08-03 08:16:10', '2020-08-03 08:16:10', NULL, 1, 159, 155),
(15, 'Approved', 'Open', '2020-08-03 08:47:57', '2020-08-03 08:47:57', NULL, 1, 159, 149),
(16, 'Approved', 'Open', '2020-08-05 02:18:33', '2020-08-05 02:18:33', NULL, 2, 158, 149),
(17, 'Assigned', 'Open', '2020-08-05 02:22:10', '2020-08-05 02:22:10', NULL, 5, 161, 149),
(18, 'Handled', 'Close', '2020-08-05 02:24:11', '2020-08-05 02:24:11', NULL, 6, 164, 149);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribution_incidents`
--
ALTER TABLE `distribution_incidents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_fk_917384` (`result_id`),
  ADD KEY `name_fk_942513` (`name_id`),
  ADD KEY `ir_fk_961925` (`ir_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribution_incidents`
--
ALTER TABLE `distribution_incidents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distribution_incidents`
--
ALTER TABLE `distribution_incidents`
  ADD CONSTRAINT `ir_fk_961925` FOREIGN KEY (`ir_id`) REFERENCES `incident_reports` (`id`),
  ADD CONSTRAINT `name_fk_942513` FOREIGN KEY (`name_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `result_fk_917384` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
