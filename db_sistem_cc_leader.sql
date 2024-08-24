-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_sistem_cc_leader
CREATE DATABASE IF NOT EXISTS `db_sistem_cc_leader` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sistem_cc_leader`;

-- Dumping structure for table db_sistem_cc_leader.table_formulir
CREATE TABLE IF NOT EXISTS `table_formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `code_json` text DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_formulir: ~1 rows (approximately)
DELETE FROM `table_formulir`;
INSERT INTO `table_formulir` (`id`, `name`, `code_json`, `date_created`) VALUES
	(29, 'testing lagi', '[{"type":"text","required":false,"label":"Nama Depan","className":"form-control","name":"text-1724520944113-0","access":false,"subtype":"text"},{"type":"text","required":false,"label":"Nama Belakang","className":"form-control","name":"text-1724520945337-0","access":false,"subtype":"text"},{"type":"text","required":false,"label":"Alamat","className":"form-control","name":"text-1724520947265-0","access":false,"subtype":"text"},{"type":"button","subtype":"submit","label":"Save","className":"btn-default btn","name":"button-1724520949051-0","access":false,"style":"default"}]', '2024-08-24 17:36:48');

-- Dumping structure for table db_sistem_cc_leader.table_testing_lagi
CREATE TABLE IF NOT EXISTS `table_testing_lagi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text_1724520944113_0` varchar(75) NOT NULL,
  `text_1724520945337_0` varchar(75) NOT NULL,
  `text_1724520947265_0` varchar(75) NOT NULL,
  `button_1724520949051_0` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_testing_lagi: ~1 rows (approximately)
DELETE FROM `table_testing_lagi`;
INSERT INTO `table_testing_lagi` (`id`, `text_1724520944113_0`, `text_1724520945337_0`, `text_1724520947265_0`, `button_1724520949051_0`, `username`, `date_created`) VALUES
	(1, 'asd', 'asd', 'asd', '', '', '2024-08-24 17:38:16'),
	(2, 'asdasd', 'asdasd', 'asdasd', '', '', '2024-08-24 19:23:20');

-- Dumping structure for table db_sistem_cc_leader.table_users
CREATE TABLE IF NOT EXISTS `table_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_users: ~1 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `fullname`, `username`, `pass`, `no_hp`, `email`, `divisi`, `date_created`) VALUES
	(7, 'cxcxzc', 'ddd', 'wewewe', 'ddd', 'ddd@ddd.com', 'wwwww', '2024-08-24 18:59:48');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
