-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 05:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_cong`
--

-- --------------------------------------------------------

--
-- Table structure for table `demande_cong`
--

CREATE TABLE `demande_cong` (
  `Id-D` int(11) NOT NULL,
  `Date-D` date NOT NULL,
  `Date-D-D` date NOT NULL,
  `Date-F-D` date NOT NULL,
  `Nbr-J-C` int(11) NOT NULL,
  `Type-cong` varchar(20) NOT NULL,
  `Statut` varchar(30) NOT NULL DEFAULT 'En cours',
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demande_cong`
--

INSERT INTO `demande_cong` (`Id-D`, `Date-D`, `Date-D-D`, `Date-F-D`, `Nbr-J-C`, `Type-cong`, `Statut`, `Id`) VALUES
(3, '2022-09-13', '2022-09-15', '2022-09-22', 7, 'maladie', 'refusé', 2),
(4, '2022-09-13', '2022-09-15', '2022-09-22', 7, 'maladie', 'accepté', 2),
(6, '2022-09-14', '2022-09-14', '2022-09-15', 1, 'maladie', 'En cours', 2),
(7, '2022-09-13', '2022-09-15', '2022-09-30', 7, 'maladie', 'En cours', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `Id` int(11) NOT NULL,
  `PPR` int(11) NOT NULL,
  `Cin` varchar(7) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Tel` bigint(10) NOT NULL,
  `Sexe` varchar(20) NOT NULL,
  `Type` varchar(40) NOT NULL,
  `NumS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`Id`, `PPR`, `Cin`, `Nom`, `Prenom`, `Adresse`, `Tel`, `Sexe`, `Type`, `NumS`) VALUES
(1, 210, 'HH40874', 'abdilah', 'hamid', '78 Rue NOSSAIR QU SALAM SAFI', 672771155, 'male', 'Admin', 2),
(2, 411, 'HH40888', 'salma', 'Amine', '68 RUE NADER QU ACHBAR', 624785126, 'female', 'RH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `NumS` int(11) NOT NULL,
  `Intitule-S` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`NumS`, `Intitule-S`) VALUES
(1, 'informatique'),
(2, 'economique');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demande_cong`
--
ALTER TABLE `demande_cong`
  ADD PRIMARY KEY (`Id-D`),
  ADD KEY `fk_dem_emp` (`Id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `ppr` (`PPR`),
  ADD UNIQUE KEY `cin` (`Cin`),
  ADD KEY `fk_service` (`NumS`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`NumS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demande_cong`
--
ALTER TABLE `demande_cong`
  MODIFY `Id-D` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `NumS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `demande_cong`
--
ALTER TABLE `demande_cong`
  ADD CONSTRAINT `demande_cong_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `employe` (`Id`);

--
-- Constraints for table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`NumS`) REFERENCES `service` (`NumS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
