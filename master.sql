-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table master.calendar
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL,
  `calendar` date NOT NULL,
  `day_name` enum('saturday','sunday','monday','tuesday','wednesday','thursday','friday') COLLATE utf8_unicode_ci NOT NULL,
  `holiday` tinyint(4) NOT NULL DEFAULT '0',
  `holiday_type` enum('all','exam') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.calendar: 0 rows
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;


-- Dumping structure for table master.day
CREATE TABLE IF NOT EXISTS `day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` enum('saturday','sunday','monday','tuesday','wednesday','thursday','friday') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.day: 0 rows
/*!40000 ALTER TABLE `day` DISABLE KEYS */;
/*!40000 ALTER TABLE `day` ENABLE KEYS */;


-- Dumping structure for table master.place
CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.place: 0 rows
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
/*!40000 ALTER TABLE `place` ENABLE KEYS */;


-- Dumping structure for table master.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.role: 4 rows
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `title`) VALUES
	(1, 'programmer'),
	(2, 'super admin'),
	(3, 'admin'),
	(5, 'student');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


-- Dumping structure for table master.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.session: 0 rows
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;


-- Dumping structure for table master.session_day
CREATE TABLE IF NOT EXISTS `session_day` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  KEY `day_id` (`day_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.session_day: 0 rows
/*!40000 ALTER TABLE `session_day` DISABLE KEYS */;
/*!40000 ALTER TABLE `session_day` ENABLE KEYS */;


-- Dumping structure for table master.session_day_time
CREATE TABLE IF NOT EXISTS `session_day_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('fix','rotating') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `place_id` (`place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.session_day_time: 0 rows
/*!40000 ALTER TABLE `session_day_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `session_day_time` ENABLE KEYS */;


-- Dumping structure for table master.session_metting
CREATE TABLE IF NOT EXISTS `session_metting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(11) DEFAULT NULL,
  `session_day_time_id` int(11) DEFAULT NULL,
  `status` enum('not be held','extra') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calendar_id` (`calendar_id`),
  KEY `session_day_time_id` (`session_day_time_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.session_metting: 0 rows
/*!40000 ALTER TABLE `session_metting` DISABLE KEYS */;
/*!40000 ALTER TABLE `session_metting` ENABLE KEYS */;


-- Dumping structure for table master.term
CREATE TABLE IF NOT EXISTS `term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `form_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.term: 0 rows
/*!40000 ALTER TABLE `term` DISABLE KEYS */;
/*!40000 ALTER TABLE `term` ENABLE KEYS */;


-- Dumping structure for table master.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username_unique` (`username`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.user: 4 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`) VALUES
	(1, 'programmer', 'programmer@gmail.com', '$2y$10$72Hdaq5kMQF42p0DFNxLYOYETB5N9C43B8.u/6Zcd15bYZg1PsOly', 'nlepX62IANFDF4SoV1j7XUdPXoaGGzJ7tAy1yZxw7GQkFJXsfwpkFYmKOOPY', NULL),
	(2, 'sa', 'sa@gmail.com', '$2y$10$aLbIsH72fMehQrYa2fy/mev0KZkQvghfjWK9XB0ABa5FDZ.7Ip6ue', NULL, NULL),
	(3, 'admin', 'admin@gmail.com', '$2y$10$U/XJx70UikQxaHdK2Eu.ZexWqgKNeBgxIgeXrsaVssORGAz0UTN6e', NULL, NULL),
	(5, 'user', 'user@gmail.com', '$2y$10$nIe9lNRxNhPAIOoF7zOiVeLJuV.CYnarsuAYVAGmlqTNbr7QFmdQi', 'sKpTBt1U8MmvpTBdRwoGZAFSsBLOWovLUsgvkl5jx4hthn3nTW6EUaoUFvHW', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table master.user_info
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `family` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `shortIntroduce` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.user_info: 0 rows
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;


-- Dumping structure for table master.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table master.user_role: 4 rows
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
