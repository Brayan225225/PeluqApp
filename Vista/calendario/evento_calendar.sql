-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2023 a las 21:40:06
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evento_calendar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `tipoDoc` varchar(30) NOT NULL,
  `identificacion` bigint(20) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `especialidades` varchar(30) NOT NULL,
  `sedes` varchar(20) NOT NULL,
  `jornada` varchar(10) NOT NULL,
  `medicos` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `tipoDoc`, `identificacion`, `nombres`, `apellidos`, `especialidades`, `sedes`, `jornada`, `medicos`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'cita medica', 'Cedula', 1011200843, 'Walter', 'White', 'Medicina General', 'Bosa', 'P.M.', 'jesse', 'cance', '2023-09-12 16:25:00', '2023-09-12 17:25:00'),
(7, 'Cita de control', 'CC', 1014738641, 'sebastian', 'segura castellanos', 'general', 'calle 54', 'Mañana', 'Oscar', 'Cita de control General', '2023-09-14 15:00:00', '2023-09-14 16:01:00'),
(8, 'XD', 'CC', 1014738641, 'sebastian', 'segura castellanos', 'general', 'calle 54', 'Mañana', 'Oscar', 'XD', '2023-09-19 17:15:00', '2023-09-19 18:15:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
