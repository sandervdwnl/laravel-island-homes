-- --------------------------------------------------------
-- Host:                         localhost
-- Server versie:                5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Databasestructuur van laravel-real-estate wordt geschreven
CREATE DATABASE IF NOT EXISTS `laravel-real-estate` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `laravel-real-estate`;

-- Structuur van  tabel laravel-real-estate.failed_jobs wordt geschreven
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel laravel-real-estate.failed_jobs: ~0 rows (ongeveer)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Structuur van  tabel laravel-real-estate.images wordt geschreven
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_id` bigint(20) unsigned NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_property_id_foreign` (`property_id`),
  CONSTRAINT `images_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel laravel-real-estate.images: ~90 rows (ongeveer)
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `image_path`, `property_id`, `size`, `created_at`, `updated_at`) VALUES
	(217, 'img/68-334180_full.jpg', 68, 'full', '2021-06-29 18:47:49', '2021-06-29 18:47:49'),
	(218, 'img/68-334180_thumb.jpg', 68, 'thumb', '2021-06-29 18:47:49', '2021-06-29 18:47:49'),
	(219, 'img/68-741000_full.jpg', 68, 'full', '2021-06-29 18:47:50', '2021-06-29 18:47:50'),
	(220, 'img/68-741000_thumb.jpg', 68, 'thumb', '2021-06-29 18:47:50', '2021-06-29 18:47:50'),
	(221, 'img/68-95580_full.jpg', 68, 'full', '2021-06-29 18:47:50', '2021-06-29 18:47:50'),
	(222, 'img/68-95580_thumb.jpg', 68, 'thumb', '2021-06-29 18:47:51', '2021-06-29 18:47:51'),
	(223, 'img/68-736160_full.jpg', 68, 'full', '2021-06-29 18:47:51', '2021-06-29 18:47:51'),
	(224, 'img/68-736160_thumb.jpg', 68, 'thumb', '2021-06-29 18:47:51', '2021-06-29 18:47:51'),
	(225, 'img/68-92493_full.jpg', 68, 'full', '2021-06-29 18:47:52', '2021-06-29 18:47:52'),
	(226, 'img/68-92493_thumb.jpg', 68, 'thumb', '2021-06-29 18:47:52', '2021-06-29 18:47:52'),
	(227, 'img/60-159616_full.jpg', 60, 'full', '2021-06-29 18:49:41', '2021-06-29 18:49:41'),
	(228, 'img/60-159616_thumb.jpg', 60, 'thumb', '2021-06-29 18:49:41', '2021-06-29 18:49:41'),
	(229, 'img/60-201122_full.jpg', 60, 'full', '2021-06-29 18:49:41', '2021-06-29 18:49:41'),
	(230, 'img/60-201122_thumb.jpg', 60, 'thumb', '2021-06-29 18:49:41', '2021-06-29 18:49:41'),
	(231, 'img/60-84039_full.jpg', 60, 'full', '2021-06-29 18:49:42', '2021-06-29 18:49:42'),
	(232, 'img/60-84039_thumb.jpg', 60, 'thumb', '2021-06-29 18:49:42', '2021-06-29 18:49:42'),
	(233, 'img/60-414315_full.jpg', 60, 'full', '2021-06-29 18:49:42', '2021-06-29 18:49:42'),
	(234, 'img/60-414315_thumb.jpg', 60, 'thumb', '2021-06-29 18:49:43', '2021-06-29 18:49:43'),
	(235, 'img/60-139536_full.jpg', 60, 'full', '2021-06-29 18:49:43', '2021-06-29 18:49:43'),
	(236, 'img/60-139536_thumb.jpg', 60, 'thumb', '2021-06-29 18:49:43', '2021-06-29 18:49:43'),
	(237, 'img/67-741312_full.jpg', 67, 'full', '2021-06-29 18:50:08', '2021-06-29 18:50:08'),
	(238, 'img/67-741312_thumb.jpg', 67, 'thumb', '2021-06-29 18:50:08', '2021-06-29 18:50:08'),
	(239, 'img/67-235626_full.jpg', 67, 'full', '2021-06-29 18:50:08', '2021-06-29 18:50:08'),
	(240, 'img/67-235626_thumb.jpg', 67, 'thumb', '2021-06-29 18:50:09', '2021-06-29 18:50:09'),
	(241, 'img/67-599633_full.jpg', 67, 'full', '2021-06-29 18:50:09', '2021-06-29 18:50:09'),
	(242, 'img/67-599633_thumb.jpg', 67, 'thumb', '2021-06-29 18:50:09', '2021-06-29 18:50:09'),
	(243, 'img/67-222743_full.jpg', 67, 'full', '2021-06-29 18:50:09', '2021-06-29 18:50:09'),
	(244, 'img/67-222743_thumb.jpg', 67, 'thumb', '2021-06-29 18:50:10', '2021-06-29 18:50:10'),
	(245, 'img/67-234558_full.jpg', 67, 'full', '2021-06-29 18:50:10', '2021-06-29 18:50:10'),
	(246, 'img/67-234558_thumb.jpg', 67, 'thumb', '2021-06-29 18:50:10', '2021-06-29 18:50:10'),
	(247, 'img/61-423728_full.jpg', 61, 'full', '2021-06-29 18:51:11', '2021-06-29 18:51:11'),
	(248, 'img/61-423728_thumb.jpg', 61, 'thumb', '2021-06-29 18:51:12', '2021-06-29 18:51:12'),
	(249, 'img/61-32560_full.jpg', 61, 'full', '2021-06-29 18:51:12', '2021-06-29 18:51:12'),
	(250, 'img/61-32560_thumb.jpg', 61, 'thumb', '2021-06-29 18:51:12', '2021-06-29 18:51:12'),
	(251, 'img/61-214968_full.jpg', 61, 'full', '2021-06-29 18:51:12', '2021-06-29 18:51:12'),
	(252, 'img/61-214968_thumb.jpg', 61, 'thumb', '2021-06-29 18:51:13', '2021-06-29 18:51:13'),
	(253, 'img/61-520116_full.jpg', 61, 'full', '2021-06-29 18:51:13', '2021-06-29 18:51:13'),
	(254, 'img/61-520116_thumb.jpg', 61, 'thumb', '2021-06-29 18:51:13', '2021-06-29 18:51:13'),
	(255, 'img/61-809950_full.jpg', 61, 'full', '2021-06-29 18:51:14', '2021-06-29 18:51:14'),
	(256, 'img/61-809950_thumb.jpg', 61, 'thumb', '2021-06-29 18:51:14', '2021-06-29 18:51:14'),
	(257, 'img/62-89072_full.jpg', 62, 'full', '2021-06-29 18:52:45', '2021-06-29 18:52:45'),
	(258, 'img/62-89072_thumb.jpg', 62, 'thumb', '2021-06-29 18:52:45', '2021-06-29 18:52:45'),
	(259, 'img/62-161690_full.jpg', 62, 'full', '2021-06-29 18:52:45', '2021-06-29 18:52:45'),
	(260, 'img/62-161690_thumb.jpg', 62, 'thumb', '2021-06-29 18:52:46', '2021-06-29 18:52:46'),
	(261, 'img/62-558525_full.jpg', 62, 'full', '2021-06-29 18:52:46', '2021-06-29 18:52:46'),
	(262, 'img/62-558525_thumb.jpg', 62, 'thumb', '2021-06-29 18:52:46', '2021-06-29 18:52:46'),
	(263, 'img/62-178164_full.jpg', 62, 'full', '2021-06-29 18:52:46', '2021-06-29 18:52:46'),
	(264, 'img/62-178164_thumb.jpg', 62, 'thumb', '2021-06-29 18:52:47', '2021-06-29 18:52:47'),
	(265, 'img/62-75660_full.jpg', 62, 'full', '2021-06-29 18:52:47', '2021-06-29 18:52:47'),
	(266, 'img/62-75660_thumb.jpg', 62, 'thumb', '2021-06-29 18:52:47', '2021-06-29 18:52:47'),
	(267, 'img/63-79170_full.jpg', 63, 'full', '2021-06-29 18:53:09', '2021-06-29 18:53:09'),
	(268, 'img/63-79170_thumb.jpg', 63, 'thumb', '2021-06-29 18:53:10', '2021-06-29 18:53:10'),
	(269, 'img/63-222000_full.jpg', 63, 'full', '2021-06-29 18:53:10', '2021-06-29 18:53:10'),
	(270, 'img/63-222000_thumb.jpg', 63, 'thumb', '2021-06-29 18:53:10', '2021-06-29 18:53:10'),
	(271, 'img/63-13952_full.jpg', 63, 'full', '2021-06-29 18:53:11', '2021-06-29 18:53:11'),
	(272, 'img/63-13952_thumb.jpg', 63, 'thumb', '2021-06-29 18:53:11', '2021-06-29 18:53:11'),
	(273, 'img/63-84136_full.jpg', 63, 'full', '2021-06-29 18:53:11', '2021-06-29 18:53:11'),
	(274, 'img/63-84136_thumb.jpg', 63, 'thumb', '2021-06-29 18:53:11', '2021-06-29 18:53:11'),
	(275, 'img/63-263146_full.jpg', 63, 'full', '2021-06-29 18:53:11', '2021-06-29 18:53:11'),
	(276, 'img/63-263146_thumb.jpg', 63, 'thumb', '2021-06-29 18:53:12', '2021-06-29 18:53:12'),
	(277, 'img/64-64116_full.jpg', 64, 'full', '2021-06-29 18:54:50', '2021-06-29 18:54:50'),
	(278, 'img/64-64116_thumb.jpg', 64, 'thumb', '2021-06-29 18:54:50', '2021-06-29 18:54:50'),
	(279, 'img/64-266255_full.jpg', 64, 'full', '2021-06-29 18:54:51', '2021-06-29 18:54:51'),
	(280, 'img/64-266255_thumb.jpg', 64, 'thumb', '2021-06-29 18:54:51', '2021-06-29 18:54:51'),
	(281, 'img/64-138288_full.jpg', 64, 'full', '2021-06-29 18:54:51', '2021-06-29 18:54:51'),
	(282, 'img/64-138288_thumb.jpg', 64, 'thumb', '2021-06-29 18:54:51', '2021-06-29 18:54:51'),
	(283, 'img/64-292274_full.jpg', 64, 'full', '2021-06-29 18:54:52', '2021-06-29 18:54:52'),
	(284, 'img/64-292274_thumb.jpg', 64, 'thumb', '2021-06-29 18:54:52', '2021-06-29 18:54:52'),
	(285, 'img/64-526250_full.jpg', 64, 'full', '2021-06-29 18:54:52', '2021-06-29 18:54:52'),
	(286, 'img/64-526250_thumb.jpg', 64, 'thumb', '2021-06-29 18:54:53', '2021-06-29 18:54:53'),
	(287, 'img/65-115292_full.jpg', 65, 'full', '2021-06-29 18:56:04', '2021-06-29 18:56:04'),
	(288, 'img/65-115292_thumb.jpg', 65, 'thumb', '2021-06-29 18:56:05', '2021-06-29 18:56:05'),
	(289, 'img/65-762065_full.jpg', 65, 'full', '2021-06-29 18:56:05', '2021-06-29 18:56:05'),
	(290, 'img/65-762065_thumb.jpg', 65, 'thumb', '2021-06-29 18:56:05', '2021-06-29 18:56:05'),
	(291, 'img/65-126024_full.jpg', 65, 'full', '2021-06-29 18:56:05', '2021-06-29 18:56:05'),
	(292, 'img/65-126024_thumb.jpg', 65, 'thumb', '2021-06-29 18:56:06', '2021-06-29 18:56:06'),
	(293, 'img/65-334430_full.jpg', 65, 'full', '2021-06-29 18:56:06', '2021-06-29 18:56:06'),
	(294, 'img/65-334430_thumb.jpg', 65, 'thumb', '2021-06-29 18:56:06', '2021-06-29 18:56:06'),
	(295, 'img/65-145747_full.jpg', 65, 'full', '2021-06-29 18:56:07', '2021-06-29 18:56:07'),
	(296, 'img/65-145747_thumb.jpg', 65, 'thumb', '2021-06-29 18:56:07', '2021-06-29 18:56:07'),
	(297, 'img/66-482300_full.jpg', 66, 'full', '2021-06-29 18:56:27', '2021-06-29 18:56:27'),
	(298, 'img/66-482300_thumb.jpg', 66, 'thumb', '2021-06-29 18:56:27', '2021-06-29 18:56:27'),
	(299, 'img/66-646152_full.jpg', 66, 'full', '2021-06-29 18:56:27', '2021-06-29 18:56:27'),
	(300, 'img/66-646152_thumb.jpg', 66, 'thumb', '2021-06-29 18:56:28', '2021-06-29 18:56:28'),
	(301, 'img/66-78813_full.jpg', 66, 'full', '2021-06-29 18:56:28', '2021-06-29 18:56:28'),
	(302, 'img/66-78813_thumb.jpg', 66, 'thumb', '2021-06-29 18:56:28', '2021-06-29 18:56:28'),
	(303, 'img/66-749662_full.jpg', 66, 'full', '2021-06-29 18:56:28', '2021-06-29 18:56:28'),
	(304, 'img/66-749662_thumb.jpg', 66, 'thumb', '2021-06-29 18:56:29', '2021-06-29 18:56:29'),
	(305, 'img/66-92535_full.jpg', 66, 'full', '2021-06-29 18:56:29', '2021-06-29 18:56:29'),
	(306, 'img/66-92535_thumb.jpg', 66, 'thumb', '2021-06-29 18:56:29', '2021-06-29 18:56:29');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Structuur van  tabel laravel-real-estate.locations wordt geschreven
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel laravel-real-estate.locations: ~3 rows (ongeveer)
DELETE FROM `locations`;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'St Eustatius', 'st-eustatius', NULL, NULL),
	(2, 'Saba', 'st-maarten', NULL, NULL),
	(3, 'Bonaire', 'bonaire', NULL, NULL);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;

-- Structuur van  tabel laravel-real-estate.migrations wordt geschreven
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel laravel-real-estate.migrations: ~7 rows (ongeveer)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2014_10_12_000000_create_users_table', 1),
	(8, '2014_10_12_100000_create_password_resets_table', 1),
	(9, '2019_08_19_000000_create_failed_jobs_table', 1),
	(10, '2021_06_09_175748_create_locations_table', 1),
	(11, '2021_06_09_185653_create_properties_table', 1),
	(12, '2021_06_09_195725_create_images_table', 1),
	(13, '2021_06_10_191254_add_colum_to_properties_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Structuur van  tabel laravel-real-estate.password_resets wordt geschreven
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel laravel-real-estate.password_resets: ~1 rows (ongeveer)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('ratke.sim@example.org', '$2y$10$6753s.cVqJMv9h6W1uOBgu3VatG8tbM1Sy6ZtqrTaBsv8A4/c6S5W', '2021-06-11 20:55:06');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Structuur van  tabel laravel-real-estate.properties wordt geschreven
CREATE TABLE IF NOT EXISTS `properties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '00000',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asking_price` int(11) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'For Sale',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` bigint(20) unsigned NOT NULL,
  `latitude` decimal(8,6) unsigned zerofill NOT NULL DEFAULT '00.000000',
  `longitude` decimal(9,6) NOT NULL DEFAULT '0.000000',
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `built_in` int(11) NOT NULL,
  `area_size_indoor` int(11) NOT NULL,
  `area_size_outdoor` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `feat_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_user_id_foreign` (`user_id`),
  KEY `properties_location_id_foreign` (`location_id`),
  CONSTRAINT `properties_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel laravel-real-estate.properties: ~9 rows (ongeveer)
DELETE FROM `properties`;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` (`id`, `title`, `slug`, `user_id`, `street`, `number`, `zip_code`, `city`, `asking_price`, `status`, `description`, `location_id`, `latitude`, `longitude`, `property_type`, `built_in`, `area_size_indoor`, `area_size_outdoor`, `bedrooms`, `bathrooms`, `feat_image_path`, `is_featured`, `approved`, `created_at`, `updated_at`) VALUES
	(60, 'Luxury Cottage in The Woods', 'luxury-cottage-in-the-woods', 118, 'The road', '10', NULL, 'Windward side', 2225000, 'Pending', '<blockquote>\r\n<p>Webtwo ipsum heroku zanga oovoo zinch, mzinga koofers.</p>\r\n</blockquote>\r\n<p>Zoho twitter napster meebo, plugg. Akismet jumo ifttt doostang weebly blyve, movity unigo kno. Xobni kippt ebay boxbe appjet, kno heroku jiglu. Koofers joost vuvox heekya wesabe, doostang airbnb. diigo. <strong>Whrrl octopart dopplr heroku, xobni. grockit zlio. Chegg zooomr jaiku chegg handango, rovio ning. akismet zinch fleck. Ngmoco zlio zillow zlio wakoopa appjet skype, blekko mobly eskobo whrrl. ebay</strong>.</p>\r\n<p>Convore wesabe napster trulia vimeo lala, diigo vuvox dogster. Jibjab balihoo zanga doostang chumby quora, kaboodle xobni wesabe. Hojoki oooooc voxy, dogster. Zoosk palantir kippt whrrl dogster kaboodle, quora octopart ning.</p>\r\n<p>&nbsp;</p>', 2, 17.628277, -63.232334, 'Villa', 2012, 250, 300, 3, 2, 'img/14994_feat.jpg', 1, 1, '2021-06-21 19:15:23', '2021-06-29 18:49:40'),
	(61, 'Modern ViIlla', 'modern-viilla', 117, 'Kaya Diamanta', '44', NULL, 'Kralendijk', 3225000, 'Sold', '<h2><strong>Shopify spock quora rovio</strong></h2>\r\n<p>Ideeli heroku boxbe jiglu vuvox geni, plugg gooru kiko cloudera. Blippy imvu akismet etsy chumby jiglu dopplr <strong>waze, diigo babblely blipp</strong>y akismet chegg. Joukuu convore squidoo gooru gsnap mozy vimeo, tumblr zanga plickers lijit.</p>\r\n<p><em>Koofers babblely yuntaa oooooc twitter loopt, hipmunk jabber sifteo. woopra prezi. </em></p>\r\n<p>Kazaa spock jiglu divvyshot, zooomr eskobo oooj, palantir plaxo</p>\r\n<p>&nbsp;</p>\r\n<p>Odeo yuntaa movity weebly imeem ngmoco, divvyshot heekya bitly imvu, vimeo zillow cuil jabber. joost wesabe revver. Vuvox akismet weebly akismet eskobo, kiko doostang. Airbnb qeyno squidoo hulu movity yuntaa, imeem nuvvo insala. Shopify spock quora rovio, joukuu. Wikia stypi twones diigo kippt hipmunk akismet grockit, chegg movity vimeo yammer imeem.&nbsp; Imeem groupon sclipo jibjab, yoono. Foodzie plickers chumby meevee blyve chegg, zanga yoono boxbe. Stypi elgg gooru whrrl, meevee ideeli. yuntaa scribd. handango chegg yammer. Kiko doostang foodzie chegg, doostang skype. Blekko ebay wesabe mobly, zinch zoho. kiko. zapier udemy. Spotify zanga blekko babblely wakoopa plaxo, oooooc twones movity.</p>\r\n<p>&nbsp;</p>', 1, 12.185200, -68.283501, 'Villa', 2005, 125, 250, 3, 4, 'img/7656_feat.jpg', 0, 1, '2021-06-22 16:32:05', '2021-06-29 18:51:11'),
	(62, 'Lovely White Country House', 'lovely-white-country-house', 109, 'Fatpork road', '144', NULL, 'Oranjestad', 4555000, 'For Sale', '<p style="box-sizing: border-box; border: 0px; font-family: \'Open Sans\', sans-serif; font-size: 16px; margin: 0px 0px 24px; outline: 0px; padding: 0px; vertical-align: baseline; color: #686868; background-color: #ffffff;">Webtwo ipsum joukuu dogster kazaa doostang, kippt. Babblely whrrl chegg sifteo cloudera zinch sococo zoosk, ebay zoosk convore stypi zoho. trulia. Eduvant tivo voxy dopplr blyve ifttt, chartly gsnap weebly zoosk. <strong>Tivo foodzie reddit hojoki zynga blekko, gooru yammer cloudera octopart zillow, weebly imvu kiko woopra</strong>. Foodzie sifteo airbnb balihoo mog dopplr, convore vimeo xobni. oovoo movity bitly. Eduvant handango wesabe prezi appjet zinch, oooooc whrrl kiko. Akismet sifteo zimbra joukuu spock tumblr twitter, hipmunk grockit blekko flickr grockit, mzinga geni empressr hulu omgpop. Xobni mzinga balihoo lala, waze.</p>\r\n<p style="box-sizing: border-box; border: 0px; font-family: \'Open Sans\', sans-serif; font-size: 16px; margin: 0px 0px 24px; outline: 0px; padding: 0px; vertical-align: baseline; color: #686868; background-color: #ffffff;">Oovoo boxbe meevee sifteo cuil zapier, joukuu sifteo yammer. imeem. <em><strong>Edmodo oooooc insala zoodles shopify, convore rovio</strong></em>. Imvu tivo zanga gsnap jumo sifteo, chartly cloudera bitly. Revver chartly mzinga sococo octopart, tumblr wufoo. Jabber ifttt waze hojoki nuvvo lala, tivo skype bebo dopplr. Wufoo greplin ebay convore, blekko movity.</p>', 1, 17.482416, -62.978231, 'Villa', 1972, 175, 400, 4, 4, 'img/59208_feat.jpg', 1, 1, '2021-06-25 19:46:23', '2021-06-29 18:52:44'),
	(63, 'Semi-attached Chalet In Oranjestad Center', 'semi-attached-chalet-in-oranjestad-center', 109, 'Watermelon Road', '7', NULL, 'Oranjestad', 3500000, 'For Sale', '<blockquote>\r\n<p>Webtwo ipsum chumby lanyrd wufoo blekko, vuvox imeem cuil, ideeli insala.</p>\r\n<p>Sifteo squidoo jumo zlio tivo, hulu airbnb. Rovio blekko reddit jajah, ideeli zillow. Jajah kippt zillow voxy chegg, plickers babblely. Cuil geni joukuu gsnap yoono zoodles, dopplr akismet diigo hipmunk.</p>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<p>Yammer diigo xobni knewton blippy, spock cotweet. appjet. Voxy kaboodle bubbli nuvvo, jiglu. Groupon mzinga ning odeo zimbra rovio dopplr, wakoopa kosmix bitly zinch. Kaboodle zynga gooru jabber jaiku, zoodles flickr cotweet. Trulia knewton ngmoco reddit yammer, ideeli plaxo elgg, yuntaa bubbli trulia. Geni disqus sclipo twones woopra waze, oovoo plugg insala. Waze zoosk oooooc eskobo tumblr boxbe, ifttt zooomr zanga loopt imvu zapier, mozy napster lijit wesabe.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Wikia qeyno imeem scribd elgg, loopt shopify zappos, nuvvo qeyno ngmoco.&nbsp; Ngmoco jumo tivo twones squidoo dogster, meevee zillow plaxo. yuntaa twones joukuu. Palantir mozy cuil lijit groupon akismet zillow mzinga plickers, zoosk woopra odeo oooooc plugg twitter dropio.</strong></p>\r\n<p>&nbsp;</p>', 1, 17.480626, -62.976960, 'Villa', 1990, 110, 175, 3, 2, 'img/1624_feat.jpg', 1, 1, '2021-06-25 20:02:22', '2021-06-29 18:53:09'),
	(64, 'Unique Designed Family Villa', 'unique-designed-family-villa', 121, 'The Road', '459', NULL, 'The Bottom', 1250500, 'For Sale', '<p style="text-align: center;"><strong>Wesabe yoono gooru oooj hojoki cloudera, sifteo tivo prezi tivo</strong>.</p>\r\n<p style="text-align: left;">Blekko vuvox insala zanga spotify bebo, insala knewton zlio ning imeem airbnb, diigo twitter balihoo jabber. Napster ning jibjab yammer glogster, orkut bitly prezi diigo, zlio zappos plugg. vuvox.&nbsp; Vuvox jaiku plickers oooooc zanga dogster oovoo jiglu, dopplr chartly zlio bebo hulu.&nbsp; Bebo kosmix zlio vuvox kazaa divvyshot, plaxo joost bubbli zapier. Blyve udemy twitter joyent, cuil joukuu. Zoodles zillow mobly tivo sococo, napster voxy.</p>\r\n<p>&nbsp;</p>', 2, 17.626018, -63.250840, 'Villa', 2020, 175, 250, 4, 2, 'img/8404_feat.jpg', 1, 1, '2021-06-25 20:45:26', '2021-06-29 18:54:50'),
	(65, 'Spacious Family Home', 'spacious-family-home', 124, 'Punt Vierkant', '94', NULL, 'Kralendijk', 745000, 'For Sale', '<p>Webtwo ipsum gooru mog convore udemy, joost squidoo flickr empressr, dogster blekko. Vimeo joukuu wakoopa lala orkut meebo, empressr ning prezi akismet eduvant, woopra wakoopa disqus meevee. Omgpop vimeo mobly greplin, plickers klout. Heekya oooooc lala sococo hulu, revver kazaa kiko. Blekko grockit sococo yammer lala zoho doostang, lijit hulu grockit plaxo. Kippt vimeo jumo yoono etsy trulia zynga octopart, kiko joyent joukuu napster ning wesabe. <strong>Omgpop bebo jibjab stypi blekko flickr weebly, waze kno blippy waze</strong>.</p>\r\n<p>&nbsp;</p>\r\n<p>Foodzie bitly plickers voxy bebo klout, ideeli mog etsy. Meebo jiglu geni plugg zimbra lala, ngmoco zoodles appjet empressr, jajah unigo plickers plaxo. Akismet shopify tumblr boxbe ning wufoo, napster doostang kiko. Meebo gooru oooj joukuu zooomr, omgpop imeem. Dogster ideeli jaiku bitly, xobni palantir. Grockit wufoo zillow dogster weebly, heroku skype prezi. Ebay doostang waze skype ideeli, glogster reddit handango. Voxy jumo diigo spotify quora, gsnap koofers elgg. Babblely oovoo kosmix fleck, hojoki. wakoopa. Meebo revver bubbli voki zooomr, kno bitly. cloudera babblely. Zapier revver quora kiko, kaboodle scribd.</p>\r\n<p>&nbsp;</p>\r\n<p><em>Zynga blippy etsy wesabe, bitly. Airbnb elgg unigo oooj meevee fleck, mog lanyrd balihoo zoosk spock, joost edmodo mzinga dropio. Kippt hojoki dogster oovoo dogster, whrrl nuvvo blyve zoosk cloudera, waze mzinga zlio. </em></p>\r\n<p>Zynga ideeli balihoo lanyrd mobly yuntaa, etsy spotify empressr. Babblely meebo orkut udemy skype zlio, wikia grockit zoosk joyent. Geni mog prezi dogster lanyrd orkut, ngmoco zoodles odeo zoodles. Klout chartly grockit sifteo, prezi. Doostang cloudera hulu jumo reddit bebo weebly, jabber plickers trulia spock.</p>', 3, 12.116348, -68.293372, 'Villa', 1999, 175, 195, 3, 2, 'img/22504_feat.jpg', 0, 1, '2021-06-29 13:46:35', '2021-06-29 18:56:04'),
	(66, 'House In The Woods', 'house-in-the-woods', 124, 'Kaya Commerce', '5', NULL, 'Rincon', 175000, 'Sold', '<p>Mozy geni meebo dopplr, oooooc jajah. boxbe. Koofers reddit shopify, udemy. Glogster zimbra cuil zappos, wufoo prezi zoho mobly, qeyno orkut. Balihoo zinch reddit, orkut. zoho groupon plickers. <strong>Zlio blekko akismet zoosk, diigo spock</strong>. Zlio kaboodle kippt akismet trulia, insala heekya wakoopa.<em> Greplin blippy tumblr omgpop glogster joost xobni, ngmoco hipmunk zimbra scribd.</em></p>', 3, 12.238821, -68.332934, 'Villa', 2002, 100, 150, 2, 2, 'img/48928_feat.jpg', 0, 1, '2021-06-29 13:51:17', '2021-06-29 18:56:26'),
	(67, 'Colonial White House', 'colonial-white-house', 118, 'The Road', '789', NULL, 'Zions Hill', 155000, 'For Sale', '<p>Xobni oooooc insala cuil voxy, babblely zynga jibjab. movity odeo rovio. Whrrl dopplr hipmunk waze reddit, yammer glogster. Xobni handango bitly, glogster. Yammer jiglu mobly xobni, zlio. Plaxo xobni yammer fleck blyve mog, boxbe voki doostang sifteo diigo glogster, convore chumby zynga chegg. Napster quora woopra whrrl dogster plickers, joukuu vimeo xobni ngmoco, cotweet babblely akismet octopart. <strong>yammer hipmunk nuvvo. Yoono loopt gsnap, zanga. Scribd convore trulia voxy cloudera, spotify grockit reddit. Foodzie plugg waze zoho stypi hipmunk tivo, vimeo babblely boxbe zimbra.</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Webtwo ipsum oooj zanga etsy zapier, zooomr zanga plickers, yammer napster. Imvu shopify plickers whrrl dropio voki kno, etsy joost imvu tumblr. Mzinga insala handango twitter heroku meebo, gsnap orkut chegg yammer. Cloudera whrrl nuvvo kazaa dopplr, elgg meevee. Reddit blyve kosmix bitly orkut yammer, kno chumby boxbe cotweet. Airbnb udemy orkut bebo, mzinga spock. Dogster koofers kiko glogster xobni unigo klout, palantir meevee scribd greplin. oovoo. Klout heroku blekko hipmunk, joyent qeyno. Jibjab cuil voki koofers chartly, zimbra joukuu. Gsnap wikia kippt mobly jabber, vuvox meebo convore elgg, doostang klout insala. zimbra akismet movity. Eduvant wesabe sclipo fleck zoodles voxy, dropio skype oooj.</p>\r\n<p>&nbsp;</p>\r\n<p>Mozy geni meebo dopplr, oooooc jajah. boxbe. Koofers reddit shopify, udemy. Glogster zimbra cuil zappos, wufoo prezi zoho mobly, qeyno orkut. Balihoo zinch reddit, orkut. zoho groupon plickers. <em>Zlio blekko akismet zoosk, diigo spock. Zlio kaboodle kippt akismet trulia, insala heekya wakoopa. Greplin blippy tumblr omgpop glogster joost xobni, ngmoco hipmunk zimbra scribd.</em></p>\r\n<p>&nbsp;</p>', 2, 17.641374, -63.228974, 'Villa', 1980, 175, 300, 4, 4, 'img/21306_feat.jpg', 0, 1, '2021-06-29 13:57:16', '2021-06-29 18:50:07'),
	(68, 'Private Pool House', 'private-pool-house', 123, 'Kaya Bongo', '77', NULL, 'Kralendijk', 1150000, 'Pending', '<blockquote>\r\n<p>Zinch divvyshot lala elgg zanga whrrl gooru squidoo ngmoco diigo, meebo zooomr jabber babblely chartly kippt vuvox. handango.</p>\r\n</blockquote>\r\n<p>Zimbra foodzie greplin dopplr cotweet orkut, foodzie imeem vimeo. Zinch hulu omgpop zanga reddit, mobly zooomr kno.</p>\r\n<p>Ngmoco kazaa trulia jabber lala, mog mzinga zooomr. Odeo bebo joukuu eduvant appjet revver woopra, kiko zoosk chartly joyent groupon. Kno orkut lijit kiko yammer, zoosk stypi.</p>\r\n<p>&nbsp;</p>\r\n<p>Sclipo elgg tumblr eduvant zooomr omgpop kaboodle, imvu zimbra lijit jumo. Bubbli wikia palantir cuil, blippy geni bebo, koofers hojoki. Hipmunk eduvant yuntaa blippy wikia, quora prezi joost. Tivo zapier blyve plugg zoosk ifttt, wufoo twitter ebay waze vuvox, spotify foodzie mzinga jabber.</p>\r\n<p><em>Oovoo loopt meevee elgg woopra, divvyshot mozy zinch cloudera, blekko shopify napster. Plugg revver kiko zoodles jibjab mobly, eskobo yammer ifttt twitter.</em></p>\r\n<p>&nbsp;</p>', 3, 12.143411, -68.259392, 'Villa', 1980, 155, 125, 3, 2, 'img/21406_feat.jpg', 0, 1, '2021-06-29 14:04:51', '2021-06-29 18:47:49');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;

-- Structuur van  tabel laravel-real-estate.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel laravel-real-estate.users: ~23 rows (ongeveer)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
	(84, 'Admin', 'Admin', 'admin@mail.com', '2021-06-11 19:43:55', '$2y$10$bFJyZ8sy353tz1aJCIz6.e8TRJDHxmhe4/7Yri4RucmO3b4H3RzW.', NULL, 1, '2021-06-11 21:07:37', '2021-06-11 21:07:37'),
	(100, 'Stromannn', 'Furmandd', 'lenora.kirlin@example.net', '2021-06-11 21:10:56', '$2y$10$SmRrKP.mkbT0wGqRoTCsJujJQOsvuJNij37tkrvwZZOaKC3i.cU9i', '9G8QC2291Z', 0, '2021-06-11 21:10:57', '2021-06-14 20:01:27'),
	(104, 'Mable', 'Leffler', 'elian.champlin@example.net', '2021-06-11 21:10:56', '$2y$10$V38XXLLk6W61iAz16Ive8Omr3BWWEbcsoOi8IxXeiQbN2kzqsG06e', 'NQ9JeO1zpQ', 0, '2021-06-11 21:10:57', '2021-06-11 21:10:57'),
	(105, 'Josephine', 'Romaguera', 'kilback.cleora@example.org', '2021-06-11 21:11:11', '$2y$10$vJxzR2C3u2X2kdOxAoCIiOkfGSUUxKUdirDJSA3xRJHDIjtgKkSGC', 'nmvhHOVars', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(106, 'Cheyenne', 'Goldner', 'xjakubowski@example.org', '2021-06-11 21:11:11', '$2y$10$auK0PgQwnhK8OYHJB.3sCeOfRRp6ueVfbNFRLgYwKx0bJIir2Z.5S', 'Fi4xQanw8x', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(107, 'Sasha', 'Crooks', 'nathen33@example.net', '2021-06-11 21:11:11', '$2y$10$mQGnpwL25OrONaixmQ.II.OOeH6BYXpO24OlYN0bBmg6GPcd0XUI6', 'rcE7NGxbhg', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(108, 'Marjorie', 'Brown', 'enola00@example.com', '2021-06-11 21:11:11', '$2y$10$om6di3j9KyrAobvHVJTm4OWSA8/nnFHSB6m/SdTavoQP/HAh.ibOS', 'DmtaY5CsZ0', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(109, 'Isom', 'Bednar', 'lubowitz.marcos@example.org', '2021-06-11 21:11:11', '$2y$10$10ISHlXtzJaIu5Om72BS1e4u6CChRelDlbO/7WxWubksOcw5QwhTq', '7Xq6wlA1NKbDsYByozuU9XzbUR0ddPN2TC13w6NAHRZq26rl29FOD5ION4ip', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(110, 'Alene', 'Buckridge', 'vandervort.anderson@example.net', '2021-06-11 21:11:11', '$2y$10$6SvM2MTUWKiTEysi1szkv.JmhZxT8Wt.F77hR1GG17.aAy82zSICC', 'kd5kMY0Bz6', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(111, 'Cathy', 'Bauch', 'sawayn.jarred@example.net', '2021-06-11 21:11:11', '$2y$10$nR0iHeBjLfwSIn9HdbDA1erggBHbAcPkrj5ru84ISkOgrIUJP33Mi', 'QugL4CfIIqjFPjplRu5BIiTNsJIlmczuiRFGBrxlGrRi5NiVtnddZef07Eth', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(112, 'Bonnie', 'White', 'alberta.turcotte@example.net', '2021-06-11 21:11:11', '$2y$10$pHhA/qHeNg2D/wlp0wXW5eGdqMOaq6N49ZS3vOt6j9oWCL2aGgiJu', 'zg3GBMWok2', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(113, 'Ulices', 'Bartell', 'penelope88@example.org', '2021-06-11 21:11:11', '$2y$10$ccOm5j0MBQt/MF9hVl3xzOJTjlsl5Lx2stKc22VS0bXM0NlTuS0gO', 'TVdpZz0kMs', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(114, 'Stefan', 'Jacobson', 'qcassin@example.com', '2021-06-11 21:11:11', '$2y$10$eUProqpUSbj7pnY6LkWqk.pI1koEYQ1/3W/LCTp8G1rWMiHxuSmGO', 'W24nN8RJHw', 0, '2021-06-11 21:11:11', '2021-06-11 21:11:11'),
	(115, 'Jacquelyn', 'Bashirian', 'beier.willy@example.net', '2021-06-11 21:11:34', '$2y$10$6xNTeYACmaUccCdbiWv/suoekgrHL6u1gyYYxFf8vwHyaSWnO9mWe', 'ppDG1r2ozC', 0, '2021-06-11 21:11:34', '2021-06-11 21:11:34'),
	(116, 'Madelyn', 'West', 'kpfannerstill@example.org', '2021-06-11 21:11:34', '$2y$10$B8wmNRHFn.diUNjrdPTdMuEBsGXuTBKFbo23WkhOyzKPszJZFrYaa', 'JUYNsxmC5b', 0, '2021-06-11 21:11:34', '2021-06-11 21:11:34'),
	(117, 'Britney', 'Ferry', 'beau.kub@example.org', '2021-06-11 21:11:34', '$2y$10$ho8xWYbcrP68sX9pvVIFDuO/ndmWQuu2EKoPNsLF1ISKM3oWSDrQ.', 'XF3FKWyNiKULlVWWkzKvSdjchfZDQVC5t8iQu0fMLb8MostiQ4jQ96nmrKr2', 0, '2021-06-11 21:11:34', '2021-06-11 21:11:34'),
	(118, 'Garnet', 'Conroy', 'shields.makayla@example.net', '2021-06-11 21:11:34', '$2y$10$lk2C84BU4/qxazSj0cS2qeAzvsmkXzg0I0X5Nr8nJKXIctE1USOSG', 'raIKGvilThOWcxNCPmUeUmxVkeZCUacLltiHt6WkGa0TdWMFu4vY9lw2PHMC', 0, '2021-06-11 21:11:34', '2021-06-11 21:11:34'),
	(119, 'Cale', 'Rath', 'quitzon.christop@example.org', '2021-06-11 21:11:34', '$2y$10$aV9yuwoCL1LVUoHBzJIRce8IeTKupCC.gHNgVs55YgPi.qh4XESyW', 'cocyIcXU3S', 0, '2021-06-11 21:11:34', '2021-06-11 21:11:34'),
	(120, 'Rahul', 'Swaniawski', 'zfay@example.org', '2021-06-11 21:11:34', '$2y$10$Ae52ggKp9TJzWBZ3lCNX0Oi453JWF7r4JjpCyvc67aiNdFhl.H5HC', 'NKgDK3SxWY', 0, '2021-06-11 21:11:34', '2021-06-11 21:11:34'),
	(121, 'Troy', 'Prosacco', 'von.cale@example.org', '2021-06-11 21:11:34', '$2y$10$pnnHiohNbRsSPZrabnW.iOmlAXfiCzuAHFBRPSYwyb5Sz7ehDdad6', 'Ubyaw0gsl2HKt3VrLdq656S6iYchEy7oCLHza443Nn5b7zF05PywyKMjuygr', 0, '2021-06-11 21:11:34', '2021-06-11 21:11:34'),
	(122, 'Bill', 'West', 'angus28@example.org', '2021-06-11 21:11:34', '$2y$10$Sq1jjJySiJEsjED.mQhDpOCB7rt119eZuFrMXpaEvxSo2IfmQJiH6', 'i406nZnlIg', 0, '2021-06-11 21:11:34', '2021-06-11 21:11:34'),
	(123, 'Ritchy', 'Jamal', 'zoconner@example.com', '2021-06-11 21:11:34', '$2y$10$Of/CTgdqF9UjuA2eesS5oesDzLEx3UKQ7N5FMPgPzlBR..mpBav6K', 'ISLrYWVZ6D9jmehcCAhtcnsQLmyF532aEr7R1Fae7aGkVCIgjNeECNr1SkKU', 0, '2021-06-11 21:11:35', '2021-06-29 17:38:23'),
	(124, 'Michale', 'Berge', 'ysporer@example.com', '2021-06-11 21:11:34', '$2y$10$UYHwYunV/9bGMW3uXCXVgeavr2HXw.rNclBSZ9HQS2/UuijuGAJIG', 'spCsyi38QtGQsNIvRnRoBF8s3x8T6AoYMyasdxXzFMvAVx2Imc6ZgPwTa8Ms', 0, '2021-06-11 21:11:35', '2021-06-11 21:11:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
