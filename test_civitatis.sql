-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 01:22 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_civitatis`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

CREATE TABLE `actividades` (
  `idActividad` int(11) NOT NULL,
  `titulo` varchar(64) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fechaIni` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `popularidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actividades`
--

INSERT INTO `actividades` (`idActividad`, `titulo`, `descripcion`, `fechaIni`, `fechaFin`, `precio`, `popularidad`) VALUES
(1, 'prueba1', 'descripcion act1', '2019-06-07', '2019-06-05', 100, 10),
(2, 'prueba2', 'descripcion act2', '2019-06-07', '2019-06-05', 20, 5),
(3, 'prueba3', 'descripcion act3', '2019-06-07', '2019-06-09', 80, 5),
(4, 'prueba4', 'descripcion act4', '2019-06-10', '2019-06-14', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `actividades_relacionadas`
--

CREATE TABLE `actividades_relacionadas` (
  `idRelacion` int(11) NOT NULL,
  `actividadPrincipal` int(11) NOT NULL,
  `actividadRelacionada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actividades_relacionadas`
--

INSERT INTO `actividades_relacionadas` (`idRelacion`, `actividadPrincipal`, `actividadRelacionada`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 3, 4),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `personas` int(10) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `fechaReserva` date DEFAULT NULL,
  `fechaRealizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservas`
--

INSERT INTO `reservas` (`idReserva`, `referencia`, `personas`, `precio`, `fechaReserva`, `fechaRealizacion`) VALUES
(1, '1-4', 1, 100, '2019-06-06', NULL),
(2, '1-0', 1, 100, '2019-06-06', NULL),
(3, '1-3', 1, 100, '2019-06-06', NULL),
(4, '1-2221', 1, 100, '2019-06-06', NULL),
(5, '1-5624', 10, 1000, '2019-06-06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividad`);

--
-- Indexes for table `actividades_relacionadas`
--
ALTER TABLE `actividades_relacionadas`
  ADD PRIMARY KEY (`idRelacion`),
  ADD KEY `actividadPrincipal` (`actividadPrincipal`),
  ADD KEY `actividadSecundaria` (`actividadRelacionada`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `actividades_relacionadas`
--
ALTER TABLE `actividades_relacionadas`
  MODIFY `idRelacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividades_relacionadas`
--
ALTER TABLE `actividades_relacionadas`
  ADD CONSTRAINT `actividades_relacionadas_ibfk_1` FOREIGN KEY (`actividadPrincipal`) REFERENCES `actividades` (`idActividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_relacionadas_ibfk_2` FOREIGN KEY (`actividadRelacionada`) REFERENCES `actividades` (`idActividad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
