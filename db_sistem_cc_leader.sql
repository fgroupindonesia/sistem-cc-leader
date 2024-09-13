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
DROP DATABASE IF EXISTS `db_sistem_cc_leader`;
CREATE DATABASE IF NOT EXISTS `db_sistem_cc_leader` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sistem_cc_leader`;

-- Dumping structure for table db_sistem_cc_leader.table_asd
DROP TABLE IF EXISTS `table_asd`;
CREATE TABLE IF NOT EXISTS `table_asd` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gedung` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text_1726243438716_0` varchar(75) NOT NULL,
  `text_1726243438948_0` varchar(75) NOT NULL,
  `button_1726243439875_0` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_asd: ~0 rows (approximately)
DELETE FROM `table_asd`;
INSERT INTO `table_asd` (`id`, `gedung`, `username`, `date_created`, `text_1726243438716_0`, `text_1726243438948_0`, `button_1726243439875_0`) VALUES
	(1, '5', 'agung11', '2024-09-13 16:04:27', 'ddd', 'ddd', '');

-- Dumping structure for table db_sistem_cc_leader.table_formulir
DROP TABLE IF EXISTS `table_formulir`;
CREATE TABLE IF NOT EXISTS `table_formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `code_json` text DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_formulir: ~1 rows (approximately)
DELETE FROM `table_formulir`;
INSERT INTO `table_formulir` (`id`, `name`, `code_json`, `date_created`) VALUES
	(35, 'asd', '[{"type":"text","required":false,"label":"Text Field","className":"form-control","name":"text-1726243438716-0","access":false,"subtype":"text"},{"type":"text","required":false,"label":"Text Field","className":"form-control","name":"text-1726243438948-0","access":false,"subtype":"text"},{"type":"button","subtype":"submit","label":"Button","className":"btn-default btn","name":"button-1726243439875-0","access":false,"style":"default"}]', '2024-09-13 23:04:05');

-- Dumping structure for table db_sistem_cc_leader.table_history_formulir
DROP TABLE IF EXISTS `table_history_formulir`;
CREATE TABLE IF NOT EXISTS `table_history_formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `formulir_name` text DEFAULT NULL,
  `data_before` text DEFAULT NULL,
  `data_after` text DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_history_formulir: ~1 rows (approximately)
DELETE FROM `table_history_formulir`;
INSERT INTO `table_history_formulir` (`id`, `username`, `formulir_name`, `data_before`, `data_after`, `date_created`) VALUES
	(1, 'agung11', 'asd', 'Text Field', 'kuya', '2024-09-13 16:15:30');

-- Dumping structure for table db_sistem_cc_leader.table_users
DROP TABLE IF EXISTS `table_users`;
CREATE TABLE IF NOT EXISTS `table_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `gedung` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_users: ~3 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `fullname`, `username`, `pass`, `no_hp`, `email`, `divisi`, `gedung`, `date_created`) VALUES
	(2, 'Agung Gunawan', 'agung11', 'agung', '08723424', 'agung@gmail.com', 'IT', '5', '2024-08-26 09:23:39'),
	(4, 'udin markopolo', 'udin', 'udin', '0888', 'udin@marko.com', 'Document Control', '3', '2024-08-30 10:28:52'),
	(5, 'cinta', 'cinta', 'cintaku1', '0829', 'cinta@home.com', 'Leader', 's33', '2024-09-01 17:02:20'),
	(6, 'testing', 'testing', 'testing', '02929', 'testing@home.com', 'IT', '1', '2024-09-03 15:15:44'),
	(7, 'asdasd', 'asd', 'asd', 'asd', 'asd@gmail.com', 'IT', 'weaaasd', '2024-09-13 16:45:58'),
	(8, 'xxx', 'xxx', 'ccc', 'ssa', 'wqeqwe@gmail.com', 'IT', '0', '2024-09-13 16:46:18'),
	(9, 'ggg', 'ggg', 'ggg', 'ggg', 'ggg@gmail.com', 'IT', 'ggg', '2024-09-13 16:46:43'),
	(10, 'ffg', 'gg', 'hjjj', 'jyt', 'tyu@gmail.com', 'IT', 'hj', '2024-09-13 16:47:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
