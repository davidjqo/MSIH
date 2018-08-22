-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2018 a las 07:29:52
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

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
  `id` int(11) NOT NULL,
  `num_sesion` varchar(255) NOT NULL,
  `num_acuerdo` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `fecha_creacion` varchar(255) NOT NULL,
  `fecha_finiquito` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acuerdos`
--

INSERT INTO `acuerdos` (`id`, `num_sesion`, `num_acuerdo`, `departamento`, `descripcion`, `archivo`, `fecha_creacion`, `fecha_finiquito`) VALUES
(1, '2018-100', '1000', '0', 'Primer acuerdo', 'Archivo.pdf', '2018-08-22', '2018-08-29'),
(2, '2018-101', '1002', '6', 'Segundo acuerdo', 'Archivo.pdf', '2018-08-30', '2018-08-31'),
(3, '2018-102', '1003', '6', 'Tercer acuerdo', 'Archivo.pdf', '2018-09-11', '2018-09-19'),
(4, '2018-103', '1004', '10', 'Acuerdo', 'Archivo.pdf', '2018-09-03', '2018-09-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `status`) VALUES
(12, 'Hayser DÃ¡vila Abarca', 'hayser@gmail.com', '$2y$10$JOs/q31XPYqH5UVC4ediGuQ0QzLiohpqPmPKT1qTM4nMOiVhxCFEi', 'baby-dead.png', 0),
(13, 'David', 'david@mail.com', '$2y$10$y9EqvppqAB/CEhHlLPxOf.C2ApiblFcG31Cr58r6z6DR8TPaVKKey', 'dead.png', 0),
(14, 'Ernesto', 'ernesto@mail.com', '$2y$10$uamYGmgHeDoGSJZp6K4GjOqCOofvC/5TAwpnrTmqEN4.dEboE6amm', 'dead.png', 0),
(15, 'Brandon', 'brandon@mail.com', '$2y$10$hJkkCRAQ9P5ZJ5B49v/LyO.LIC/.3hNYstHBqYz1ZiH0mHPkaRfK6', 'thor.png', 0),
(16, 'Juan', 'juan@mail.com', '$2y$10$n5t3kq3ah6TcIzrbGS.XEOyRVIecf6/SunGq5jQ.dNfp73T7sKvma', 'thor.png', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
