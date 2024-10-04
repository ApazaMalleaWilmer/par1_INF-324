-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 10:28:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdwilmer`
--
CREATE DATABASE IF NOT EXISTS `bdwilmer` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdwilmer`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--

CREATE TABLE `catastro` (
  `id` varchar(15) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `x_ini` varchar(20) NOT NULL,
  `y_ini` varchar(20) NOT NULL,
  `x_fin` varchar(20) NOT NULL,
  `y_fin` varchar(20) NOT NULL,
  `superficie` varchar(20) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `distrito` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id`, `zona`, `x_ini`, `y_ini`, `x_fin`, `y_fin`, `superficie`, `ci`, `distrito`) VALUES
('1002', 'Residencial123', '10.123', '20.456', '10.789', '20.987', '1500', '87654321', 'Distrito 1'),
('1010', '10', '1', '1', '1', '1', '1222', '123', 'Distrito 3'),
('2001', 'Miraflores', '11.123', '21.456', '11.789', '21.987', '2500', '87654321', 'Distrito 2'),
('2050', '11', '1', '1', '1', '1', '333', '666666', 'Distrito 4'),
('3001', 'zonabaja', '12', '32', '43', '22', '333', '99887744', 'Distrito 3'),
('3002', '31', '9', '9', '9', '9', '99', '0000', 'Distrito 5'),
('3100', 'a55', '1', '1', '1', '1', '111', '434343', 'Distrito 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre`) VALUES
(1, 'Distrito 3'),
(2, 'Distrito 4'),
(3, 'Distrito 5'),
(4, 'Distrito 6'),
(5, 'Distrito 7'),
(6, 'Distrito 8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duenio`
--

CREATE TABLE `duenio` (
  `ci` varchar(20) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `duenio`
--

INSERT INTO `duenio` (`ci`, `usuario`, `contraseña`) VALUES
('0000', 'lll', 'lll'),
('123', 'qq', 'qq'),
('434343', 'w', 'w'),
('666666', 'ajax', 'ajax'),
('87654321', 'duenio', 'duenio'),
('99887744', 'dueno2', 'dueno2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `ci` varchar(20) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`ci`, `usuario`, `contraseña`) VALUES
('12345678', 'funcionario', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`, `materno`) VALUES
('0000', 'llll', 'lll', 'lll'),
('123', 'qq', 'qq654', 'qq'),
('12345678', 'Juan', 'Perez', 'Gomez'),
('434343', 'q', 'q', 'q'),
('666666', 'ajax', 'ajaxp', 'ajaxm'),
('87654321', 'Isaac123', 'Aliaga', 'Torrez'),
('99887744', 'Rene321', 'Soza22', 'Luque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `distrito_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `distrito_id`) VALUES
(1, 'Sopocachi', 1),
(2, 'Adela Samudio', 1),
(3, '8 De Diciembre', 1),
(4, 'Jinchupalla', 1),
(5, 'Kantutani', 1),
(6, 'Cristo Rey', 1),
(7, 'San Luis', 1),
(8, 'Inmaculada Concepcion', 1),
(9, 'Llojeta', 2),
(10, 'Calamarca', 2),
(11, 'Pasankeri', 2),
(12, 'San Martin', 2),
(13, 'Nieves', 2),
(14, 'Tembladerani', 2),
(15, 'Jukumarini', 2),
(16, 'Faro Murillo', 3),
(17, 'Cotahuma', 3),
(18, 'Tupac Amaru', 3),
(19, 'Tacagua', 3),
(20, 'Tejada', 3),
(21, 'Calvario', 3),
(22, 'VillaNuevoPotosi', 3),
(23, 'Antofagasta', 3),
(24, 'San Pedro', 4),
(25, 'Belen', 4),
(26, 'Juan XXIII', 4),
(27, 'El Carmen', 4),
(28, 'Bello Horizonte', 4),
(29, 'Vivienda Obrera', 4),
(30, 'Olimpic', 4),
(31, 'Gran Poder', 5),
(32, 'Los Andes', 5),
(33, 'Obispo', 5),
(34, 'Barrio Lindo', 5),
(35, '9 de Abril', 5),
(36, 'Callampaya', 6),
(37, 'Villa Victoria', 6),
(38, 'El Tejar', 6),
(39, 'Mariscal Santa Cruz', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `duenio`
--
ALTER TABLE `duenio`
  ADD PRIMARY KEY (`ci`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ci`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distrito_id` (`distrito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `duenio`
--
ALTER TABLE `duenio`
  ADD CONSTRAINT `duenio_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_ibfk_1` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
