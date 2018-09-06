-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2018 a las 23:20:29
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
  `anno_acuerdo` varchar(4) DEFAULT NULL,
  `fecha_acuerdo` date NOT NULL,
  `id_sesion` int(10) DEFAULT NULL,
  `creador_acuerdo` int(4) DEFAULT NULL,
  `titulo_acuerdo` varchar(16) NOT NULL,
  `fecha_finiquito` date NOT NULL,
  `ultim_modif_acuerdo` date DEFAULT NULL,
  `estado_acuerdo` varchar(16) DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acuerdos`
--

INSERT INTO `acuerdos` (`id_acuerdo`, `anno_acuerdo`, `fecha_acuerdo`, `id_sesion`, `creador_acuerdo`, `titulo_acuerdo`, `fecha_finiquito`, `ultim_modif_acuerdo`, `estado_acuerdo`, `archivo`, `descripcion`) VALUES
(7, NULL, '2018-09-03', NULL, NULL, '57-2017', '2018-09-21', NULL, NULL, 'Intercambio tecnolÃ³gico Grupo 41.pdf', 'Urgente!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdo_departamento`
--

CREATE TABLE `acuerdo_departamento` (
  `id_acuerdo_departamento` int(10) NOT NULL,
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
  `id_acuerdo_file` int(10) NOT NULL,
  `anno_acuerdo` varchar(4) NOT NULL,
  `filename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdo_usuario`
--

CREATE TABLE `acuerdo_usuario` (
  `id_acuerdo_usuario` int(10) NOT NULL,
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
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(10) NOT NULL,
  `titulo_sesion` varchar(16) NOT NULL,
  `anno_sesion` varchar(4) DEFAULT NULL,
  `fecha_sesion` date NOT NULL,
  `creador_sesion` int(4) DEFAULT NULL,
  `ultim_modif_sesion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `titulo_sesion`, `anno_sesion`, `fecha_sesion`, `creador_sesion`, `ultim_modif_sesion`) VALUES
(1, 'SI-068-2017', NULL, '2018-09-03', NULL, NULL);

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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `primer_apellido`, `segundo_apellido`, `email`, `password`, `image`, `status`, `id_dpto`, `puesto`, `rol`, `id_jefe`, `ultimo_acceso`) VALUES
(1, 'David', 'Quesada', NULL, 'david@mail.com', '$2y$10$q9Y8T2trqkdz8d5iPUEw/OOW2JEX6PRPJ1ElDg8aPljdMYd/aJd0u', 'IMG_20180211_124105.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Brandon', 'SÃ¡nchez', NULL, 'brandon@mail.com', '$2y$10$unxN.Br7KFHnkQNWHZ4bBeEleRSr8OAdlU3lzdJkgsXSlSRLQAoS2', 'una.png', 2, NULL, NULL, NULL, NULL, NULL),
(3, 'Ernesto', 'Valerio', NULL, 'ernesto@mail.com', '$2y$10$FhmZ099vz5.zhjiukQjGy.VzQ.A.cC3RI3BuD/9A5ILFTaT/ecG8S', 'una.png', 3, NULL, NULL, NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`id_acuerdo_departamento`),
  ADD KEY `anno_acuerdo` (`anno_acuerdo`,`id_departamento`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `asignador` (`asignador`);

--
-- Indices de la tabla `acuerdo_file`
--
ALTER TABLE `acuerdo_file`
  ADD PRIMARY KEY (`id_acuerdo_file`),
  ADD KEY `anno_acuerdo` (`anno_acuerdo`),
  ADD KEY `filename` (`filename`);

--
-- Indices de la tabla `acuerdo_usuario`
--
ALTER TABLE `acuerdo_usuario`
  ADD PRIMARY KEY (`id_acuerdo_usuario`),
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
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD UNIQUE KEY `titulo_sesion` (`titulo_sesion`),
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
  MODIFY `id_acuerdo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `acuerdo_departamento`
--
ALTER TABLE `acuerdo_departamento`
  MODIFY `id_acuerdo_departamento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acuerdo_file`
--
ALTER TABLE `acuerdo_file`
  MODIFY `id_acuerdo_file` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_dpto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  ADD CONSTRAINT `acuerdos_ibfk_1` FOREIGN KEY (`creador_acuerdo`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `acuerdos_ibfk_3` FOREIGN KEY (`anno_acuerdo`) REFERENCES `sesiones` (`anno_sesion`),
  ADD CONSTRAINT `acuerdos_ibfk_4` FOREIGN KEY (`id_sesion`) REFERENCES `sesiones` (`id_sesion`);

--
-- Filtros para la tabla `acuerdo_departamento`
--
ALTER TABLE `acuerdo_departamento`
  ADD CONSTRAINT `acuerdo_departamento_ibfk_2` FOREIGN KEY (`anno_acuerdo`) REFERENCES `acuerdos` (`anno_acuerdo`),
  ADD CONSTRAINT `acuerdo_departamento_ibfk_3` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_dpto`),
  ADD CONSTRAINT `acuerdo_departamento_ibfk_4` FOREIGN KEY (`asignador`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `acuerdo_departamento_ibfk_5` FOREIGN KEY (`id_acuerdo_departamento`) REFERENCES `acuerdos` (`id_acuerdo`);

--
-- Filtros para la tabla `acuerdo_usuario`
--
ALTER TABLE `acuerdo_usuario`
  ADD CONSTRAINT `acuerdo_usuario_ibfk_1` FOREIGN KEY (`id_acuerdo_usuario`) REFERENCES `acuerdos` (`id_acuerdo`),
  ADD CONSTRAINT `acuerdo_usuario_ibfk_2` FOREIGN KEY (`anno_acuerdo`) REFERENCES `acuerdos` (`anno_acuerdo`),
  ADD CONSTRAINT `acuerdo_usuario_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `acuerdo_usuario_ibfk_4` FOREIGN KEY (`asignador`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`id_jefe`) REFERENCES `usuarios` (`id_jefe`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`creador_sesion`) REFERENCES `usuarios` (`id_usuario`);

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
