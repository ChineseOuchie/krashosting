-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2017 at 09:43 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krashosting`
--
DROP DATABASE IF EXISTS `krashosting`;
CREATE DATABASE IF NOT EXISTS `krashosting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `krashosting`;

-- --------------------------------------------------------

--
-- Table structure for table `medewerkers`
--

CREATE TABLE `medewerkers` (
  `idmedewerkers` int(11) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `tussenvoegsel` varchar(10) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `telefoon_nummer` int(10) NOT NULL,
  `persoonsnummer` int(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bedrijfs_email` varchar(30) NOT NULL,
  `wachtwoord` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medewerkers`
--

INSERT INTO `medewerkers` (`idmedewerkers`, `voornaam`, `tussenvoegsel`, `achternaam`, `telefoon_nummer`, `persoonsnummer`, `email`, `bedrijfs_email`, `wachtwoord`) VALUES
(1, 'test', 'test', 'test', 0, 0, 'test@hotmail.nl', 'test@hotmail.com', 'Testtest1!');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `idproduct` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `mb` int(11) NOT NULL,
  `ssl` varchar(7) NOT NULL,
  `ppm` varchar(11) NOT NULL,
  `domeinen` int(10) NOT NULL,
  `bandbreedte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`idproduct`, `naam`, `mb`, `ssl`, `ppm`, `domeinen`, `bandbreedte`) VALUES
(1, 'starter', 2000, 'false', '4.99', 1, '5GB'),
(2, 'basic', 4000, 'true', '9.99', 2, '20GB'),
(3, 'advanced', 12000, 'true', '19.99', 4, 'unlimited');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`idmedewerkers`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`idproduct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `idmedewerkers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
