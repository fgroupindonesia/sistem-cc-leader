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

-- Dumping structure for table db_sistem_cc_leader.table_formulir
DROP TABLE IF EXISTS `table_formulir`;
CREATE TABLE IF NOT EXISTS `table_formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `code_json` text DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_formulir: ~3 rows (approximately)
DELETE FROM `table_formulir`;
INSERT INTO `table_formulir` (`id`, `name`, `code_json`, `date_created`) VALUES
	(6, 'ssd', '[{"type":"date","required":false,"label":"Date Field","className":"form-control","name":"date-1723719597207-0","access":false,"subtype":"date"}]', '2024-08-15 18:00:01'),
	(7, 'Sebelum Bekerja', '[{"type":"text","required":false,"label":"Nama Lengkap","className":"form-control","name":"text-1724664975892-0","access":false,"subtype":"text"},{"type":"button","subtype":"submit","label":"Save","className":"btn-default btn","name":"button-1724664992810-0","access":false,"style":"default"}]', '2024-08-26 16:36:58'),
	(11, 'formulir testing aja', '[{"type":"text","required":false,"label":"Text Field","className":"form-control","name":"text-1725011246011-0","access":false,"subtype":"text"},{"type":"text","required":false,"label":"Text Field","className":"form-control","name":"text-1725011244120-0","access":false,"subtype":"text"},{"type":"text","required":false,"label":"Text Field","className":"form-control","name":"text-1725011244945-0","access":false,"subtype":"text"}]', '2024-09-02 01:19:30');

-- Dumping structure for table db_sistem_cc_leader.table_formulir_testing_aja
DROP TABLE IF EXISTS `table_formulir_testing_aja`;
CREATE TABLE IF NOT EXISTS `table_formulir_testing_aja` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text_1725011246011_0` varchar(75) NOT NULL,
  `text_1725011244120_0` varchar(75) NOT NULL,
  `text_1725011244945_0` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_formulir_testing_aja: ~0 rows (approximately)
DELETE FROM `table_formulir_testing_aja`;

-- Dumping structure for table db_sistem_cc_leader.table_sebelum_bekerja
DROP TABLE IF EXISTS `table_sebelum_bekerja`;
CREATE TABLE IF NOT EXISTS `table_sebelum_bekerja` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text_1724664975892_0` varchar(75) NOT NULL,
  `button_1724664992810_0` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_sebelum_bekerja: ~3 rows (approximately)
DELETE FROM `table_sebelum_bekerja`;
INSERT INTO `table_sebelum_bekerja` (`id`, `text_1724664975892_0`, `button_1724664992810_0`, `username`, `date_created`) VALUES
	(1, 'Staff 1', 'as', 'as', '2024-09-01 18:41:41'),
	(2, 'asd', 'as', 'as', '2024-09-01 18:41:41'),
	(3, 'asd', 'as', 'as', '2024-09-01 18:41:42');

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
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_users: ~3 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `fullname`, `username`, `pass`, `no_hp`, `email`, `divisi`, `date_created`) VALUES
	(2, 'Agung Gunawan', 'agung11', 'agung', '08723424', 'agung@gmail.com', 'IT', '2024-08-26 09:23:39'),
	(4, 'udin markopolo', 'udin', 'udin', '0888', 'udin@marko.com', 'Document Control', '2024-08-30 10:28:52'),
	(5, 'cinta', 'cinta', 'cintaku1', '0829', 'cinta@home.com', 'Leader', '2024-09-01 17:02:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
