
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 02:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imenik`
--
CREATE DATABASE IF NOT EXISTS `imenik` DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci;
USE `imenik`;

-- --------------------------------------------------------

--
-- Table structure for table `spisak`
--

DROP TABLE IF EXISTS `spisak`;
CREATE TABLE IF NOT EXISTS `spisak` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imePrezime` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;


INSERT INTO `spisak` (`id`, `imePrezime`, `telefon`) VALUES
(2, 'Laza Lazic', '+381.11.321321'),
(3, 'Milenko Milenkovic', '+381.60.2223334'),
(8, 'Petar Petrovic', '+381.66.55566'),
(10, 'Ivan Ivkovic', '+381.64.6665551');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
