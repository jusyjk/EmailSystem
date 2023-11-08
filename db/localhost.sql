-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `campaign`;
CREATE TABLE `campaign` (
  `id` int NOT NULL AUTO_INCREMENT,
  `campaign_name` tinytext,
  `subject` varchar(25) DEFAULT NULL,
  `tags` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `message` varchar(999) DEFAULT NULL,
  `schedule_date` datetime DEFAULT NULL,
  `is_sync` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'N',
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `campaign` (`id`, `campaign_name`, `subject`, `tags`, `message`, `schedule_date`, `is_sync`, `created_at`) VALUES
(4,	'test',	'sadd',	'[\"1\",\"2\"]',	'<p>sadasddd</p>',	'2023-11-19 16:36:00',	'Y',	'2023-11-03 14:45:27'),
(5,	'test',	'sadd',	'[\"1\",\"2\"]',	'<p>esjdkasdjaskdakdssdjkadjd</p>',	'2023-11-19 16:36:00',	'Y',	'2023-11-03 14:45:27'),
(6,	'test',	'sadd',	'[\"1\"]',	'<p>Test Now</p>',	'2023-11-19 16:36:00',	'Y',	'2023-11-03 14:45:27'),
(7,	'test',	'sad',	'[\"2\"]',	'<p>test</p>',	'2023-11-16 12:10:00',	'Y',	'2023-11-07 17:30:35'),
(8,	'Justin',	'Jerald',	'[\"3\"]',	'<p>Test From Justin</p>',	'2023-11-18 21:31:00',	'Y',	'2023-11-07 17:30:35'),
(9,	'Yakin Discussion',	'Offer Sale',	'[\"7\"]',	'<p>Test Offer Sale</p>',	'2023-11-07 18:38:00',	'Y',	'2023-11-07 17:38:34'),
(11,	'ALL Users',	'Send Email For all',	'[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"]',	'<p>Send EMail For all users</p>',	'2023-11-30 22:47:00',	'Y',	'2023-11-07 17:42:35');

DROP TABLE IF EXISTS `email_queue`;
CREATE TABLE `email_queue` (
  `id_email_queue` int NOT NULL AUTO_INCREMENT,
  `id_campaign` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `from` char(55) NOT NULL,
  `to` varchar(55) NOT NULL,
  `subject` varchar(999) NOT NULL,
  `message` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_service_provider` int DEFAULT NULL,
  `email_status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT '''57'' => sent, ''''61" =>  Queued',
  `sent_date` datetime NOT NULL,
  `track_status` varchar(255) DEFAULT NULL,
  `open_count` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `click_count` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bounce_count` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `unsubscribe_count` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  PRIMARY KEY (`id_email_queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `email_queue` (`id_email_queue`, `id_campaign`, `id_user`, `from`, `to`, `subject`, `message`, `id_service_provider`, `email_status`, `sent_date`, `track_status`, `open_count`, `click_count`, `bounce_count`, `unsubscribe_count`) VALUES
(245,	9,	7,	'ram@getblabs.com',	'test1@gm.co',	'Offer Sale',	'<p>Test Offer Sale</p>',	1,	'57',	'2023-11-07 17:38:34',	'1',	'1',	'2',	'0',	'1'),
(246,	9,	7,	'ramu@getblabs.com',	'test1@gm.co',	'Offer Sale',	'<p>Test Offer Sale</p>',	2,	'57',	'2023-11-07 17:38:34',	'1',	'2',	'1',	'1',	'0'),
(247,	9,	7,	'ramg@getblabs.com',	'test1@gm.co',	'Offer Sale',	'<p>Test Offer Sale</p>',	3,	'57',	'2023-11-07 17:38:34',	'1',	'1',	'1',	'1',	'0'),
(248,	9,	7,	'ramatblabs@getblabs.com',	'test1@gm.co',	'Offer Sale',	'<p>Test Offer Sale</p>',	4,	'57',	'2023-11-07 17:38:34',	'1',	'2',	'2',	NULL,	'1'),
(249,	9,	7,	'iamram@getbals.com',	'test1@gm.co',	'Offer Sale',	'<p>Test Offer Sale</p>',	5,	'57',	'2023-11-07 17:38:34',	'1',	'2',	'3',	NULL,	'0'),
(250,	9,	7,	'ram@tryblabs.com',	'test1@gm.co',	'Offer Sale',	'<p>Test Offer Sale</p>',	6,	'57',	'2023-11-07 17:38:34',	'1',	'1',	'1',	NULL,	'0'),
(251,	11,	1,	'ram@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	1,	'57',	'2023-11-07 17:42:35',	'1',	'1',	'1',	NULL,	'0'),
(252,	11,	1,	'ramu@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	2,	'57',	'2023-11-07 17:42:35',	'1',	NULL,	'1',	'1',	'0'),
(253,	11,	1,	'ramg@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	3,	'57',	'2023-11-07 17:42:35',	NULL,	'1',	NULL,	NULL,	'0'),
(254,	11,	1,	'ramatblabs@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	4,	'57',	'2023-11-07 17:42:35',	'1',	'1',	'1',	NULL,	'0'),
(255,	11,	1,	'iamram@getbals.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	5,	'57',	'2023-11-07 17:42:35',	'1',	NULL,	'5',	'4',	'0'),
(256,	11,	1,	'ram@tryblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	6,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(257,	11,	2,	'ram@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	1,	'57',	'2023-11-07 17:42:35',	NULL,	'1',	'2',	NULL,	'0'),
(258,	11,	2,	'ramu@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	2,	'57',	'2023-11-07 17:42:35',	'1',	NULL,	NULL,	NULL,	'0'),
(259,	11,	2,	'ramg@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	3,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(260,	11,	2,	'ramatblabs@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	4,	'57',	'2023-11-07 17:42:35',	NULL,	'1',	NULL,	NULL,	'0'),
(261,	11,	2,	'iamram@getbals.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	5,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(262,	11,	2,	'ram@tryblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	6,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(263,	11,	3,	'ram@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	1,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(264,	11,	3,	'ramu@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	2,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(265,	11,	3,	'ramg@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	3,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(266,	11,	3,	'ramatblabs@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	4,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(267,	11,	3,	'iamram@getbals.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	5,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(268,	11,	3,	'ram@tryblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	6,	'57',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(269,	11,	4,	'ram@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	1,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(270,	11,	4,	'ramu@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	2,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(271,	11,	4,	'ramg@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	3,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(272,	11,	4,	'ramatblabs@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	4,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(273,	11,	4,	'iamram@getbals.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	5,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(274,	11,	4,	'ram@tryblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	6,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(275,	11,	5,	'ram@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	1,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(276,	11,	5,	'ramu@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	2,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(277,	11,	5,	'ramg@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	3,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(278,	11,	5,	'ramatblabs@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	4,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(279,	11,	5,	'iamram@getbals.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	5,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(280,	11,	5,	'ram@tryblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	6,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(281,	11,	6,	'ram@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	1,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(282,	11,	6,	'ramu@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	2,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(283,	11,	6,	'ramg@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	3,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(284,	11,	6,	'ramatblabs@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	4,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(285,	11,	6,	'iamram@getbals.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	5,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(286,	11,	6,	'ram@tryblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	6,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(287,	11,	7,	'ram@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	1,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(288,	11,	7,	'ramu@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	2,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(289,	11,	7,	'ramg@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	3,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(290,	11,	7,	'ramatblabs@getblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	4,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(291,	11,	7,	'iamram@getbals.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	5,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0'),
(292,	11,	7,	'ram@tryblabs.com',	'test1@gm.co',	'Send Email For all',	'<p>Send EMail For all users</p>',	6,	'61',	'2023-11-07 17:42:35',	NULL,	NULL,	NULL,	NULL,	'0');

DROP TABLE IF EXISTS `segments`;
CREATE TABLE `segments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `segments` (`id`, `tag_name`, `user_id`) VALUES
(1,	'wes',	'[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]'),
(2,	'JUs',	'[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]'),
(3,	'Justin',	'[\"8\",\"9\"]'),
(4,	'test',	'[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]'),
(5,	'jus',	'[\"7\",\"8\",\"9\"]'),
(6,	'test',	'[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]'),
(7,	'yakin',	'[\"10\"]');

DROP TABLE IF EXISTS `service_provider_count`;
CREATE TABLE `service_provider_count` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_service_provider` int DEFAULT NULL,
  `sent_count` varchar(25) DEFAULT NULL,
  `sent_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `service_providers`;
CREATE TABLE `service_providers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(55) DEFAULT NULL,
  `count_limit` tinyint DEFAULT NULL,
  `status` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `service_providers` (`id`, `email`, `count_limit`, `status`) VALUES
(1,	'ram@getblabs.com',	4,	'Active'),
(2,	'ramu@getblabs.com',	4,	'Active'),
(3,	'ramg@getblabs.com',	4,	'Active'),
(4,	'ramatblabs@getblabs.com',	4,	'Active'),
(5,	'iamram@getbals.com',	4,	'Active'),
(6,	'ram@tryblabs.com',	4,	'Active');

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `category` varchar(55) NOT NULL,
  `tag` varchar(55) NOT NULL,
  `weather` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `phone`, `email`, `country`, `category`, `tag`, `weather`, `status`, `created_at`) VALUES
(1,	'wes',	'test',	'1234',	'test1@gm.co',	'india',	'test',	'TN',	'cold',	'Y',	'2023-11-03 09:44:02'),
(2,	'wes',	'test',	'1234',	'test1@gm.co',	'india',	'test',	'TN',	'cold',	'Y',	'2023-11-03 09:44:02'),
(3,	'wes',	'test',	'1234',	'test1@gm.co',	'india',	'test',	'TN',	'cold',	'Y',	'2023-11-03 09:44:02'),
(4,	'wes',	'test',	'1234',	'test1@gm.co',	'india',	'test',	'TN',	'cold',	'Y',	'2023-11-03 09:44:02'),
(5,	'wes',	'test',	'1234',	'test1@gm.co',	'india',	'test',	'TN',	'cold',	'Y',	'2023-11-03 09:44:02'),
(6,	'wes',	'test',	'1234',	'test1@gm.co',	'india',	'test',	'TN',	'cold',	'Y',	'2023-11-03 09:44:02'),
(7,	'jus',	'tin',	'1234',	'test1@gm.co',	'india',	'test',	'TN',	'cold',	'Y',	'2023-11-03 09:44:02'),
(8,	'Justin',	'Jerald',	'09042727729',	'justinjerald.exalogico@gmail.com',	'dfsdf',	'dsfdf',	'dsfsdf',	'dsfsdf',	'Active',	'0000-00-00 00:00:00'),
(9,	'Justin',	'Jerald',	'09042727729',	'justinjerald.exalogico@gmail.com',	'asdas',	'dsfdf',	'Test Weather',	'Cold',	'Active',	'0000-00-00 00:00:00'),
(10,	'Yakin',	'Lab',	'1234567890',	'yakin@gmail.com',	'Indian',	'Test',	'Cofee',	'Cold',	'Active',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1,	'Justin',	'827ccb0eea8a706c4c34a16891f84e7b',	'jus@email.com');

-- 2023-11-08 07:28:29
