-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for woca_onque
DROP DATABASE IF EXISTS `woca_onque`;
CREATE DATABASE IF NOT EXISTS `woca_onque` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `woca_onque`;

-- Dumping structure for table woca_onque.que
DROP TABLE IF EXISTS `que`;
CREATE TABLE IF NOT EXISTS `que` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` char(4) DEFAULT 'OAPP',
  `author_id` varchar(40) DEFAULT 'OAPP25082020',
  `euid` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  KEY `entry` (`entry`),
  KEY `author` (`author`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_onque.que: ~0 rows (approximately)
/*!40000 ALTER TABLE `que` DISABLE KEYS */;
/*!40000 ALTER TABLE `que` ENABLE KEYS */;

-- Dumping structure for table woca_onque._sample
DROP TABLE IF EXISTS `_sample`;
CREATE TABLE IF NOT EXISTS `_sample` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` char(4) DEFAULT 'OAPP',
  `author_id` varchar(40) DEFAULT 'OAPP25082020',
  `euid` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  KEY `entry` (`entry`),
  KEY `author` (`author`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_onque._sample: ~0 rows (approximately)
/*!40000 ALTER TABLE `_sample` DISABLE KEYS */;
/*!40000 ALTER TABLE `_sample` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
