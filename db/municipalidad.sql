-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2018 a las 18:23:21
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `municipalidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdos`
--

CREATE TABLE `acuerdos` (
  `id_acuerdo` int(10) NOT NULL,
  `anno_acuerdo` varchar(4) NOT NULL,
  `fecha_acuerdo` date NOT NULL,
  `id_sesion` int(10) NOT NULL,
  `creador_acuerdo` int(4) NOT NULL,
  `titulo_acuerdo` varchar(50) NOT NULL,
  `finiquito_acuerdo` date NOT NULL,
  `ultim_modif_acuerdo` date NOT NULL,
  `estado_acuerdo` varchar(15) NOT NULL,
  `archivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdo_departamento`
--

CREATE TABLE `acuerdo_departamento` (
  `id_acuerdo` int(10) NOT NULL,
  `anno_acuerdo` varchar(4) NOT NULL,
  `id_departamento` int(4) NOT NULL,
  `asignador` int(4) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdo_file`
--

CREATE TABLE `acuerdo_file` (
  `id_acuerdo` int(10) NOT NULL,
  `anno_acuerdo` varchar(4) NOT NULL,
  `filename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdo_usuario`
--

CREATE TABLE `acuerdo_usuario` (
  `id_acuerdo` int(10) NOT NULL,
  `anno_acuerdo` varchar(4) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `asignador` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_dpto` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `id_jefe` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id_sesion` int(10) NOT NULL,
  `anno_sesion` varchar(4) NOT NULL,
  `fecha_sesion` date NOT NULL,
  `creador_sesion` int(4) NOT NULL,
  `ultim_modif_sesion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `primer_apellido` varchar(20) NOT NULL,
  `segundo_apellido` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `id_dpto` int(4) DEFAULT NULL,
  `puesto` varchar(10) DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  `id_jefe` int(4) DEFAULT NULL,
  `ultimo_acceso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  ADD PRIMARY KEY (`id_acuerdo`),
  ADD KEY `anno_sesion` (`anno_acuerdo`),
  ADD KEY `creador_acuerdo` (`creador_acuerdo`),
  ADD KEY `id_sesion` (`id_sesion`);

--
-- Indices de la tabla `acuerdo_departamento`
--
ALTER TABLE `acuerdo_departamento`
  ADD PRIMARY KEY (`id_acuerdo`),
  ADD KEY `anno_acuerdo` (`anno_acuerdo`,`id_departamento`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `asignador` (`asignador`);

--
-- Indices de la tabla `acuerdo_file`
--
ALTER TABLE `acuerdo_file`
  ADD PRIMARY KEY (`id_acuerdo`),
  ADD KEY `anno_acuerdo` (`anno_acuerdo`),
  ADD KEY `filename` (`filename`);

--
-- Indices de la tabla `acuerdo_usuario`
--
ALTER TABLE `acuerdo_usuario`
  ADD PRIMARY KEY (`id_acuerdo`),
  ADD KEY `anno_acuerdo` (`anno_acuerdo`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `asignador` (`asignador`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_dpto`),
  ADD KEY `id_jefe` (`id_jefe`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `creador_sesion` (`creador_sesion`),
  ADD KEY `anno_sesion` (`anno_sesion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_jefe` (`id_jefe`),
  ADD KEY `id_dpto` (`id_dpto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  MODIFY `id_acuerdo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_dpto` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  ADD CONSTRAINT `acuerdos_ibfk_1` FOREIGN KEY (`creador_acuerdo`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `acuerdos_ibfk_2` FOREIGN KEY (`id_sesion`) REFERENCES `sesion` (`id_sesion`),
  ADD CONSTRAINT `acuerdos_ibfk_3` FOREIGN KEY (`anno_acuerdo`) REFERENCES `sesion` (`anno_sesion`);

--
-- Filtros para la tabla `acuerdo_departamento`
--
ALTER TABLE `acuerdo_departamento`
  ADD CONSTRAINT `acuerdo_departamento_ibfk_1` FOREIGN KEY (`id_acuerdo`) REFERENCES `acuerdos` (`id_acuerdo`),
  ADD CONSTRAINT `acuerdo_departamento_ibfk_2` FOREIGN KEY (`anno_acuerdo`) REFERENCES `acuerdos` (`anno_acuerdo`),
  ADD CONSTRAINT `acuerdo_departamento_ibfk_3` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_dpto`),
  ADD CONSTRAINT `acuerdo_departamento_ibfk_4` FOREIGN KEY (`asignador`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `acuerdo_usuario`
--
ALTER TABLE `acuerdo_usuario`
  ADD CONSTRAINT `acuerdo_usuario_ibfk_1` FOREIGN KEY (`id_acuerdo`) REFERENCES `acuerdos` (`id_acuerdo`),
  ADD CONSTRAINT `acuerdo_usuario_ibfk_2` FOREIGN KEY (`anno_acuerdo`) REFERENCES `acuerdos` (`anno_acuerdo`),
  ADD CONSTRAINT `acuerdo_usuario_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `acuerdo_usuario_ibfk_4` FOREIGN KEY (`asignador`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`id_jefe`) REFERENCES `usuarios` (`id_jefe`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_ibfk_1` FOREIGN KEY (`creador_sesion`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_jefe`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_dpto`) REFERENCES `departamentos` (`id_dpto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
