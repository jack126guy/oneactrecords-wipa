SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `%prefix%wips` (
  `wipcode` varchar(255) NOT NULL,
  `wipname` text,
  `releaseid` varchar(255) DEFAULT NULL,
  `releasedate` date NOT NULL,
  `wipref` text,
  `wipdesc` text,
  PRIMARY KEY (`wipcode`(100))
) DEFAULT COLLATE=%collation%;