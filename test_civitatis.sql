-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2019 a las 13:01:08
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_civitatis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
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
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idActividad`, `titulo`, `descripcion`, `fechaIni`, `fechaFin`, `precio`, `popularidad`) VALUES
(1, 'prueba1', 'descripcion act1', '2019-06-07', '2019-06-05', 100, 10),
(2, 'prueba2', 'descripcion act2', '2019-06-07', '2019-06-05', 20, 5),
(3, 'prueba3', 'descripcion act3', '2019-06-07', '2019-06-09', 80, 5),
(4, 'prueba4', 'descripcion act4', '2019-06-10', '2019-06-14', 60, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_relacionadas`
--

CREATE TABLE `actividades_relacionadas` (
  `idRelacion` int(11) NOT NULL,
  `actividadPrincipal` int(11) NOT NULL,
  `actividadRelacionada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades_relacionadas`
--

INSERT INTO `actividades_relacionadas` (`idRelacion`, `actividadPrincipal`, `actividadRelacionada`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 3, 4),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividad`);

--
-- Indices de la tabla `actividades_relacionadas`
--
ALTER TABLE `actividades_relacionadas`
  ADD PRIMARY KEY (`idRelacion`),
  ADD KEY `actividadPrincipal` (`actividadPrincipal`),
  ADD KEY `actividadSecundaria` (`actividadRelacionada`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `actividades_relacionadas`
--
ALTER TABLE `actividades_relacionadas`
  MODIFY `idRelacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades_relacionadas`
--
ALTER TABLE `actividades_relacionadas`
  ADD CONSTRAINT `actividades_relacionadas_ibfk_1` FOREIGN KEY (`actividadPrincipal`) REFERENCES `actividades` (`idActividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_relacionadas_ibfk_2` FOREIGN KEY (`actividadRelacionada`) REFERENCES `actividades` (`idActividad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
