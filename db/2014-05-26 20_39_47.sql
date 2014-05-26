-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.37-0ubuntu0.12.04.1-log - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for sapr_teacher_plan
CREATE DATABASE IF NOT EXISTS `sapr_teacher_plan` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sapr_teacher_plan`;


-- Dumping structure for table sapr_teacher_plan.activity
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table sapr_teacher_plan.activity: ~14 rows (approximately)
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` (`id`, `name`) VALUES
	(15, 'CalculateWork'),
	(6, 'Consultation'),
	(14, 'ControlWork'),
	(8, 'Coursework'),
	(16, 'DEK'),
	(7, 'Diploma'),
	(10, 'Exams'),
	(3, 'Lab'),
	(1, 'Lecture'),
	(11, 'Modulework'),
	(12, 'Postgraduate'),
	(2, 'Practic'),
	(13, 'PracticeLead'),
	(9, 'Zalick');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;


-- Dumping structure for table sapr_teacher_plan.position
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `changed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table sapr_teacher_plan.position: ~2 rows (approximately)
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`id`, `name`, `created_at`, `changed_at`) VALUES
	(1, 'Старший викладач', '2014-05-24 23:15:36', '2014-05-24 23:15:42'),
	(2, 'Дуже старший виладач', '2014-05-25 12:35:58', NULL);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;


-- Dumping structure for table sapr_teacher_plan.speciality
CREATE TABLE IF NOT EXISTS `speciality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `countStudents` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `changed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table sapr_teacher_plan.speciality: ~2 rows (approximately)
/*!40000 ALTER TABLE `speciality` DISABLE KEYS */;
INSERT INTO `speciality` (`id`, `name`, `countStudents`, `created_at`, `changed_at`) VALUES
	(1, 'КН-2', 123, '2014-05-24 23:35:03', NULL),
	(2, 'КН-3', 0, '2014-05-25 12:36:15', NULL);
/*!40000 ALTER TABLE `speciality` ENABLE KEYS */;


-- Dumping structure for table sapr_teacher_plan.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `changed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table sapr_teacher_plan.subject: ~5 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`id`, `name`, `created_at`, `changed_at`) VALUES
	(1, 'Системи струкукукукуцкук', NULL, '2014-05-24 19:48:10'),
	(2, 'Системи струкукукукуцкук2', '2014-05-24 19:36:08', NULL),
	(3, 'Sub2', '2014-05-25 14:27:00', NULL),
	(4, 'Sub3', '2014-05-25 14:27:04', NULL),
	(5, 'Dub4', '2014-05-25 14:27:08', NULL);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;


-- Dumping structure for table sapr_teacher_plan.teacherPlan
CREATE TABLE IF NOT EXISTS `teacherPlan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `countHours` int(11) NOT NULL,
  `numberSemester` int(11) NOT NULL,
  `changed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table sapr_teacher_plan.teacherPlan: ~7 rows (approximately)
/*!40000 ALTER TABLE `teacherPlan` DISABLE KEYS */;
INSERT INTO `teacherPlan` (`id`, `user_id`, `subject_id`, `speciality_id`, `activity_id`, `countHours`, `numberSemester`, `changed_at`, `created_at`) VALUES
	(3, 2, 1, 1, 15, 34, 1, NULL, '2014-05-25 11:22:46'),
	(4, 2, 2, 1, 14, 300, 2, NULL, '2014-05-25 12:38:32'),
	(5, 5, 2, 2, 15, 123, 2, NULL, '2014-05-25 14:20:20'),
	(6, 2, 3, 1, 16, 4, 1, NULL, '2014-05-25 14:27:19'),
	(7, 5, 4, 1, 7, 4, 1, NULL, '2014-05-25 14:28:00'),
	(8, 5, 5, 1, 11, 88, 1, NULL, '2014-05-25 14:28:12'),
	(9, 5, 5, 2, 10, 120, 1, NULL, '2014-05-25 16:03:09');
/*!40000 ALTER TABLE `teacherPlan` ENABLE KEYS */;


-- Dumping structure for table sapr_teacher_plan.teacherReport
CREATE TABLE IF NOT EXISTS `teacherReport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `dateActivity` date NOT NULL,
  `topicName` varchar(1000) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `countHours` int(11) NOT NULL,
  `changed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table sapr_teacher_plan.teacherReport: ~7 rows (approximately)
/*!40000 ALTER TABLE `teacherReport` DISABLE KEYS */;
INSERT INTO `teacherReport` (`id`, `user_id`, `subject_id`, `dateActivity`, `topicName`, `activity_id`, `countHours`, `changed_at`, `created_at`) VALUES
	(3, 2, 1, '0000-00-00', 'Name topic arqwerewr', 15, 34, NULL, '2014-05-25 11:43:04'),
	(4, 2, 1, '2014-05-08', 'wqeqwe', 15, 4, NULL, '2014-05-25 11:48:03'),
	(5, 2, 1, '2014-05-25', '3', 15, 4, NULL, '2014-05-25 11:55:21'),
	(6, 2, 1, '2014-05-25', '123123', 15, 2, NULL, '2014-05-25 11:57:41'),
	(7, 2, 1, '2014-05-25', 'dfgdfg', 15, 5, NULL, '2014-05-25 12:04:02'),
	(11, 5, 2, '2014-05-14', 'Topic name here', 15, -1, NULL, '2014-05-25 13:52:57'),
	(12, 5, 5, '2014-05-25', 'ещзшс тфьбу', 10, 110, NULL, '2014-05-25 16:03:46');
/*!40000 ALTER TABLE `teacherReport` ENABLE KEYS */;


-- Dumping structure for table sapr_teacher_plan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `type` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `changed_at` timestamp NULL DEFAULT NULL,
  `last_visited_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table sapr_teacher_plan.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `position_id`, `firstName`, `lastName`, `fatherName`, `password`, `status`, `type`, `created_at`, `changed_at`, `last_visited_at`) VALUES
	(2, 'admin@admin.com', 1, 'test1', 'test2', 'test3', '$2a$13$AXzYgQbZXsppv43ZgLraBeI.I36Jwb8yjYXakGk5Nb.I.2dGLalE2', 0, 2, NULL, '2014-05-25 14:55:42', '2014-05-25 14:16:53'),
	(3, 'test11@gmail.com', 2, 'Test11', 'Test12', 'Test13', '$2a$13$Pe99ZKIxZZjbb0Ro2ythGeuwczMhrCZotw0UsDd0.eAQP7gx/aCoi', 0, 0, '2014-05-24 18:41:34', NULL, '2014-05-25 13:26:43'),
	(4, 'test3@test3.com', 1, 'test3', 'test3test3', 'test3test3test3', '$2a$13$wxNUd47hixnH8qQOn4hHmuULQUjFZFyrQbGIIqt84TR59kn3aCGg.', 0, 0, '2014-05-24 23:51:37', NULL, NULL),
	(5, 'petro@petro.petro', 2, 'Петро', 'Петровський', 'Петрович', '$2a$13$GFLoCf.2MIdjxfi5Zx/GYu0QwiS9KZu7H7wM58SYAUHffKb0dCHue', 0, 0, '2014-05-25 12:35:37', '2014-05-25 13:45:23', '2014-05-25 13:46:16');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
