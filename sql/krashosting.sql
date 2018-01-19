-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2018 at 09:19 AM
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
-- Table structure for table `customproduct`
--

CREATE TABLE `customproduct` (
  `idcustomproduct` int(11) NOT NULL,
  `mb` varchar(45) NOT NULL,
  `ssl` tinyint(4) NOT NULL,
  `prijs` int(111) NOT NULL,
  `idklanten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `idklanten` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) NOT NULL,
  `email` mediumtext NOT NULL,
  `telefoonnummer` int(10) NOT NULL,
  `idproducten` int(11) NOT NULL,
  `aankoopdatum` varchar(30) NOT NULL,
  `betaald` varchar(5) NOT NULL,
  `datumbetaald` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medewerkers`
--

CREATE TABLE `medewerkers` (
  `idmedewerkers` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `telefoonnummer` varchar(45) NOT NULL,
  `bsn` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `bedrijfsemail` varchar(45) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL,
  `idtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medewerkers`
--

INSERT INTO `medewerkers` (`idmedewerkers`, `voornaam`, `achternaam`, `telefoonnummer`, `bsn`, `email`, `bedrijfsemail`, `wachtwoord`, `idtype`) VALUES
(22, 'Stefan', 'de Graaf', '0642364578', '230200369', 'stefan.degraaf@ictmbo.nl', 'stefan.degraaf@krashosting.nl', 'replacepw', 1),
(23, 'Anne Marie', 'de Graaf', '1234567890', '123456789', 'mama@mam.nl', 'annemarie.degraaf@krashosting.nl', 'replacepw', 2),
(24, 'Willem Jan', 'de Graaf', '1234567890', '123456789', 'wj@wj.nl', 'willemjan.degraaf@krashosting.nl', '8Kw?r?@5bH5vEQCJ7UJgOijUar9By&', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nieuws`
--

CREATE TABLE `nieuws` (
  `idnieuws` int(100) NOT NULL,
  `titel` varchar(100) NOT NULL,
  `bericht` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nieuws`
--

INSERT INTO `nieuws` (`idnieuws`, `titel`, `bericht`) VALUES
(1, 'Nieuws bericht 1', 'Lorum ipsum'),
(2, 'Nieuws bericht 2', 'Lorum ipsum'),
(3, 'Nieuws bericht 3', 'Lorum ipsum'),
(4, 'Nieuws bericht 4', 'Lorum ipsum'),
(9, 'Nieuws bericht 5', 'Lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `idproducten` int(11) NOT NULL,
  `zichtbaar` varchar(5) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `mb` varchar(45) NOT NULL,
  `ssl` varchar(5) NOT NULL,
  `ppm` int(111) NOT NULL,
  `domeinen` int(10) NOT NULL,
  `bandbreedte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`idproducten`, `zichtbaar`, `naam`, `mb`, `ssl`, `ppm`, `domeinen`, `bandbreedte`) VALUES
(1, 'true', 'starter', '2000', 'FALSE', 5, 1, '5GB'),
(2, 'true', 'basic', '4000', 'TRUE', 10, 2, '20GB'),
(3, 'true', 'advanced', '12000', 'TRUE', 20, 4, 'unlimited');

-- --------------------------------------------------------

--
-- Table structure for table `sitecontent`
--

CREATE TABLE `sitecontent` (
  `idsitecontent` int(11) NOT NULL,
  `pagename` varchar(99) NOT NULL,
  `headings` varchar(99) NOT NULL,
  `headings_en` varchar(99) NOT NULL,
  `teksten` mediumtext NOT NULL,
  `teksten_en` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitecontent`
--

INSERT INTO `sitecontent` (`idsitecontent`, `pagename`, `headings`, `headings_en`, `teksten`, `teksten_en`) VALUES
(1, 'contact1', '', '', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', ''),
(2, 'contact2', '', '', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', ''),
(3, 'about us', 'Over ons', 'About us', 'Meer dan 4 miljoen domeinen, 1,6 miljoen gehoste websites en 60.000 servers.\r\nKras Hosting staat voor professionele kwaliteit. Onze producten en dienstverlening worden\r\nregelmatig bekroond. Dankzij onze tevredenheidsgarantie kun je alles 30 dagen uitproberen. Ben\r\nje niet tevreden? Dan krijg je je geld terug. Je gegevens zijn bij ons zo veilig als in een kluis. Onze\r\ndatacenters zijn al meer dan 10 jaar ISO 27001-gecertificeerd.\r\nKrashosting staat 24/7 voor u klaar.', 'More then 4 million domains, 1,6 million hosted websites and 60.000 servers. Kras Hosting stands\r\nfor professional quality. Our products and services are regularly awarded. Thanks to our\r\nsatisfaction guarantee you can try everything for 30 days. Are you not satisfied? You get your\r\nmoney back. Your information is as safe with us as in a safe. Our data centers have been ISO\r\n27001 certified for over 10 years\r\nKrashosting is at your service 24/7.');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `idtype` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `create` tinyint(4) NOT NULL,
  `read` tinyint(4) NOT NULL,
  `update` tinyint(4) NOT NULL,
  `delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`idtype`, `naam`, `create`, `read`, `update`, `delete`) VALUES
(1, 'Admin', 1, 1, 1, 1),
(2, 'Medewerker', 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customproduct`
--
ALTER TABLE `customproduct`
  ADD PRIMARY KEY (`idcustomproduct`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`idklanten`),
  ADD KEY `producten_idx` (`idproducten`);

--
-- Indexes for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`idmedewerkers`),
  ADD KEY `type_idx` (`idtype`);

--
-- Indexes for table `nieuws`
--
ALTER TABLE `nieuws`
  ADD PRIMARY KEY (`idnieuws`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`idproducten`);

--
-- Indexes for table `sitecontent`
--
ALTER TABLE `sitecontent`
  ADD PRIMARY KEY (`idsitecontent`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idtype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customproduct`
--
ALTER TABLE `customproduct`
  MODIFY `idcustomproduct` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `idklanten` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `idmedewerkers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `nieuws`
--
ALTER TABLE `nieuws`
  MODIFY `idnieuws` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `idproducten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sitecontent`
--
ALTER TABLE `sitecontent`
  MODIFY `idsitecontent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `idtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `klanten`
--
ALTER TABLE `klanten`
  ADD CONSTRAINT `producten` FOREIGN KEY (`idproducten`) REFERENCES `producten` (`idproducten`) ON UPDATE CASCADE;

--
-- Constraints for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD CONSTRAINT `type` FOREIGN KEY (`idtype`) REFERENCES `type` (`idtype`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
