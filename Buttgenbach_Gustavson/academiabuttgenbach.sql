-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 08:29:42
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academiabuttgenbach`
--
CREATE DATABASE IF NOT EXISTS `academiabuttgenbach` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `academiabuttgenbach`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `alumnos_ID` int(10) UNSIGNED NOT NULL,
  `alumnos_nombres` varchar(20) NOT NULL,
  `alumnos_apellidos` varchar(28) NOT NULL,
  `alumnos_dni` char(8) NOT NULL,
  `alumnos_fechaNacimiento` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`alumnos_ID`, `alumnos_nombres`, `alumnos_apellidos`, `alumnos_dni`, `alumnos_fechaNacimiento`) VALUES
(14, 'Bruno', 'Buttgenbach Gustavson', '71072221', '29/07/2000'),
(19, 'Jane', 'Gustavson', '12345678', '12/09/1978');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas` (
  `notas_dni` char(8) NOT NULL,
  `notas_curso` varchar(20) NOT NULL,
  `notas_calificacion` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`notas_dni`, `notas_curso`, `notas_calificacion`) VALUES
('71072221', 'CTA', '12'),
('12345678', 'PFRH', '19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`alumnos_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `alumnos_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
