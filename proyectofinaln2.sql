-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2024 a las 17:35:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinaln2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `materia`) VALUES
(1, 'Matematicas'),
(6, 'Ingles'),
(7, 'PHP'),
(9, 'Ciencia'),
(10, 'Artes Plasticas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'maestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `nacimiento` date NOT NULL,
  `rol_id` int(11) NOT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `direccion`, `nacimiento`, `rol_id`, `materia_id`, `status`) VALUES
(1, 'Administrador', '', 'admin@admin', '$2y$10$kyA9Xxq8aCLigvBCq3KoQeO8T5LPUq0IvMSn.heMJP3PSxah57tR2', '', '0000-00-00', 1, NULL, 1),
(2, 'Maestro', '', 'maestro@maestro', '$2y$10$jCUeii8Hx07WG855MAY.juFGefwgujp5Ylp9jK9MVB4x34G3OC.dm', 'cl 13', '2000-01-01', 2, 1, 1),
(4, 'jorge', '', 'jorge@jorge', '$2y$10$72HScXKMpziZ1Iy4Wi55zOrcDnaGm1e3qorGK/E5WhxGqj485EHM6', 'santa cruz', '0000-00-00', 2, 7, 1),
(6, 'Fabiola', 'Cruz', 'fabiola@fabiola', '$2y$10$27O9lzZiaKb6beixDA3gDe1104P7N.Wh8RlSlkhSUGbKccJ7Ylkt.', 'ilo 02', '1999-08-22', 2, 10, 1),
(7, 'Noah', 'Alvarez', 'noah@noah', '$2y$10$6slDUbMSmFZ.VmqzN9/eVedHDmqWU.B1DyqLW5Lg.1rsSt9tTyfcy', 'Ecuador 12', '2023-05-10', 2, 9, 1),
(8, 'Diego', 'Huarsaya', 'diego@diego', '$2y$10$MFLNCnLdz37EhS3P46tJw.SE6GclY34tarZhNcHio051l1IBRTcbO', 'umacollo', '1998-10-01', 2, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol` (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_roles_fk` (`rol_id`),
  ADD KEY `usuarios_materias_fk` (`materia_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_materias_fk` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_roles_fk` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
