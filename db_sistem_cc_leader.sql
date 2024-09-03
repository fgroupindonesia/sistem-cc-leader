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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_formulir: ~2 rows (approximately)
DELETE FROM `table_formulir`;
INSERT INTO `table_formulir` (`id`, `name`, `code_json`, `date_created`) VALUES
	(13, 'testing bro', '[{"type":"text","required":false,"label":"Text Field","className":"form-control","name":"text-1725357160527-0","access":false,"subtype":"text"},{"type":"radio-group","required":false,"label":"Radio Group","inline":false,"name":"radio-group-1725357161593-0","access":false,"other":false,"values":[{"label":"Option 1","value":"option-1","selected":false},{"label":"Option 2","value":"option-2","selected":false},{"label":"Option 3","value":"option-3","selected":false}]},{"type":"button","subtype":"submit","label":"save","className":"btn-default btn","name":"button-1725357158790-0","access":false,"style":"default"}]', '2024-09-03 16:52:53'),
	(14, 'testtt sissss', '[{"type":"radio-group","required":false,"label":"Radio Group","inline":false,"name":"radio-group-1725359853984-0","access":false,"other":true,"values":[{"label":"Option 1","value":"option-1","selected":false},{"label":"Option 2","value":"option-2","selected":false},{"label":"Option 3","value":"option-3","selected":false}]}]', '2024-09-03 17:38:01'),
	(15, 'teeee zzzz', '[{"type":"radio-group","required":false,"label":"Radio Group","inline":false,"name":"radio-group-1725359940949-0","access":false,"other":false,"values":[{"label":"Option 1","value":"option-1","selected":false},{"label":"Option 2","value":"option-2","selected":false},{"label":"Option 3","value":"option-3","selected":false}]},{"type":"button","subtype":"submit","label":"Button","className":"btn-default btn","name":"button-1725359938846-0","access":false,"style":"default"}]', '2024-09-03 17:39:08');

-- Dumping structure for table db_sistem_cc_leader.table_teeee_zzzz
DROP TABLE IF EXISTS `table_teeee_zzzz`;
CREATE TABLE IF NOT EXISTS `table_teeee_zzzz` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `radio_group_1725359940949_0` varchar(75) NOT NULL,
  `button_1725359938846_0` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_teeee_zzzz: ~0 rows (approximately)
DELETE FROM `table_teeee_zzzz`;
INSERT INTO `table_teeee_zzzz` (`id`, `radio_group_1725359940949_0`, `button_1725359938846_0`, `username`, `date_created`) VALUES
	(1, 'option-3', '', 'cinta', '2024-09-03 14:09:14');

-- Dumping structure for table db_sistem_cc_leader.table_testing_bro
DROP TABLE IF EXISTS `table_testing_bro`;
CREATE TABLE IF NOT EXISTS `table_testing_bro` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text_1725357160527_0` varchar(75) NOT NULL,
  `radio_group_1725357161593_0` varchar(75) NOT NULL,
  `button_1725357158790_0` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_testing_bro: ~3 rows (approximately)
DELETE FROM `table_testing_bro`;
INSERT INTO `table_testing_bro` (`id`, `text_1725357160527_0`, `radio_group_1725357161593_0`, `button_1725357158790_0`, `username`, `date_created`) VALUES
	(2, 'assdasd', 'option-2', '', 'cinta', '2024-09-03 16:02:57'),
	(3, 'ccccc', 'option-3', '', 'cinta', '2024-09-03 16:03:02'),
	(4, 'eeee', 'option-1', '', 'cinta', '2024-09-03 16:03:06');

-- Dumping structure for table db_sistem_cc_leader.table_testtt_sissss
DROP TABLE IF EXISTS `table_testtt_sissss`;
CREATE TABLE IF NOT EXISTS `table_testtt_sissss` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `radio_group_1725359853984_0` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_testtt_sissss: ~0 rows (approximately)
DELETE FROM `table_testtt_sissss`;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sistem_cc_leader.table_users: ~4 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `fullname`, `username`, `pass`, `no_hp`, `email`, `divisi`, `gedung`, `date_created`) VALUES
	(2, 'Agung Gunawan', 'agung11', 'agung', '08723424', 'agung@gmail.com', 'IT', '2', '2024-08-26 09:23:39'),
	(4, 'udin markopolo', 'udin', 'udin', '0888', 'udin@marko.com', 'Document Control', '3', '2024-08-30 10:28:52'),
	(5, 'cinta', 'cinta', 'cintaku1', '0829', 'cinta@home.com', 'Leader', '4', '2024-09-01 17:02:20'),
	(6, 'testing', 'testing', 'testing', '02929', 'testing@home.com', 'IT', '1', '2024-09-03 15:15:44');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
