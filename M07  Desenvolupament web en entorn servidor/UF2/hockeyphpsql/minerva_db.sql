-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-02-2022 a las 23:09:04
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `minerva_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classification`
--

CREATE TABLE `classification` (
  `id` int(3) NOT NULL,
  `position` int(3) NOT NULL,
  `team` varchar(30) NOT NULL,
  `points` int(3) NOT NULL,
  `matches` int(3) NOT NULL,
  `wins` int(3) NOT NULL,
  `losses` int(3) NOT NULL,
  `draws` int(3) NOT NULL,
  `gols_for` int(3) NOT NULL,
  `gols_against` int(3) NOT NULL,
  `goal_difference` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `classification`
--

INSERT INTO `classification` (`id`, `position`, `team`, `points`, `matches`, `wins`, `losses`, `draws`, `gols_for`, `gols_against`, `goal_difference`) VALUES
(1, 1, 'Buffalo Sabres', 40, 14, 13, 1, 0, 71, 17, 54),
(2, 2, 'Minerva', 37, 14, 12, 1, 1, 91, 30, 61),
(3, 3, 'Vancouver Canucks', 32, 14, 9, 3, 2, 46, 31, 14),
(4, 4, 'Chicago Blackhawks', 29, 14, 9, 2, 3, 81, 42, 39),
(5, 5, 'Florida Panthers', 21, 14, 6, 2, 3, 55, 42, 13),
(6, 6, 'Philadelphia Flyers', 19, 14, 5, 3, 5, 47, 40, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `player` varchar(30) NOT NULL,
  `place_birth` varchar(90) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `technical_team` tinyint(1) NOT NULL DEFAULT 0,
  `weigth` double DEFAULT NULL,
  `heigth` double DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `player`
--

INSERT INTO `player` (`id`, `avatar`, `player`, `place_birth`, `birthdate`, `technical_team`, `weigth`, `heigth`, `position`, `dni`) VALUES
(1, 'foto-1.jpg', 'María Carmen', 'Barcelona', '1990-01-15', 0, 70, 183, 'Porter', '12345678Z'),
(3, '', 'Equip Tecnic 12', 'Barcelona', '1982-02-09', 1, NULL, NULL, '', '00000000T'),
(5, 'foto-3.jpg', 'Angelina', 'adreça4', '2005-02-02', 0, 73, 186, 'Defensa', '00474062D'),
(6, 'foto-4.jpg', 'Ana María', 'Barcelona', '1997-02-02', 0, 74, 187, 'Mig campista', '86849950H'),
(10, 'foto-12.jpg', 'alejandra', 'Calle Jaén, 8 Museo del Prado', '2009-02-13', 0, 67, 123, 'Porter', '49953749A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `address`, `dni`) VALUES
(1, 'jordi@gmail.cat', 'jordi2000', 'jugadora', 'Calle Santander, 74, 08020, Barcelona, Barcelona', '12345678Z'),
(2, 'usu2@dom.cat', 'pass2', 'equiptecnic', 'adreça2', '00000000T'),
(13, 'usu4@dom.cat', 'pass4', 'jugadora', 'adreça4', '00474062D'),
(14, 'usu5@dom.cat', 'pass5', 'jugadora', 'Barcelona', '86849950H'),
(16, 'usu6@dom.cat', 'pass6', 'jugadora', 'Barcelona', '98367253W'),
(41, 'alejandra@gmail.com', 'jordi', 'jugadora', 'Calle Jaén, 8 Museo del Prado', '49953749A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `classification`
--
ALTER TABLE `classification`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `classification`
--
ALTER TABLE `classification`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `user` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
