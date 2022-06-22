-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 12:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE cp1250_croatian_ci NOT NULL,
  `prezime` varchar(32) COLLATE cp1250_croatian_ci NOT NULL,
  `username` varchar(32) COLLATE cp1250_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE cp1250_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `username`, `lozinka`, `razina`) VALUES
(1, 'Josip', 'Čavala', 'jcavala', '$2y$10$7hSyDmNef7F8GwAQyGRjBedYvrhTO2yyYw/223eih86XnPOCN.Hm6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `naslov` varchar(64) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `opis` text COLLATE cp1250_croatian_ci DEFAULT NULL,
  `tekst` text COLLATE cp1250_croatian_ci NOT NULL,
  `slika` varchar(64) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `kategorija` varchar(64) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `arhiva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `opis`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '2022-06-22', 'Biden falls... Again!', 'US President, Biden, Falls During Bicycle Ride', 'US President, Mr. Joe Biden, yesterday fell while riding his bicycle near his beach home in the state of Delaware.\r\n\r\nBiden, who did not suffer any injuries, fell off his bicycle while attempting to greet a group of reporters and residents at the Cape Henlopen State Park in Delaware.\r\n\r\n', 'fall.jpg', 'U.S', 0),
(2, '2022-06-22', 'Putin determined to nuke u.s', '3 Scenarios for How Putin Could Actually Use Nukes', 'We know that Russian President Vladimir Putin is thinking about using nuclear weapons.', 'putin.jpg', 'World', 0),
(16, '2022-06-22', 'Biden falls... Again!', 'US President, Biden, Falls During Bicycle Ride', 'US President, Mr. Joe Biden, yesterday fell while riding his bicycle near his beach home in the state of Delaware.\r\n\r\nBiden, who did not suffer any injuries, fell off his bicycle while attempting to greet a group of reporters and residents at the Cape Henlopen State Park in Delaware.\r\n\r\n', 'fall.jpg', 'U.S', 0),
(17, '2022-06-22', 'Biden falls... Again!', 'US President, Biden, Falls During Bicycle Ride', 'US President, Mr. Joe Biden, yesterday fell while riding his bicycle near his beach home in the state of Delaware.\r\n\r\nBiden, who did not suffer any injuries, fell off his bicycle while attempting to greet a group of reporters and residents at the Cape Henlopen State Park in Delaware.\r\n\r\n', 'fall.jpg', 'U.S', 0),
(18, '2022-06-22', 'Putin determined to nuke u.s', '3 Scenarios for How Putin Could Actually Use Nukes', 'We know that Russian President Vladimir Putin is thinking about using nuclear weapons.', 'putin.jpg', 'World', 0),
(19, '2022-06-22', 'Putin determined to nuke u.s', '3 Scenarios for How Putin Could Actually Use Nukes', 'We know that Russian President Vladimir Putin is thinking about using nuclear weapons.', 'putin.jpg', 'World', 0),
(20, '2022-06-22', 'arhivirana', ' jedna arhivirana', '', 'burger.jpeg.jpeg', 'World', 1),
(21, '2022-06-22', 'proba', 'arhivirana', 'arhivirana', 'maher.jpg.jpg', 'U.S', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
