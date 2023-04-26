-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2022 a las 15:59:06
-- Versión del servidor: 10.3.28-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Geason`
--
CREATE DATABASE Geason;
use Geason;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galery`
--

CREATE TABLE IF NOT EXISTS `galery` (
  `idimage` int(11) NOT NULL,
  `iduser` int(3) NOT NULL,
  `nomimage` varchar(255) DEFAULT NULL,
  `descripcioimage` varchar(255) DEFAULT NULL,
  `urlimage` varchar(255) DEFAULT NULL,
  `backgroundcolorimage` varchar(255) DEFAULT NULL,
  `dateUpload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(3) NOT NULL,
  `nameuser` varchar(255) NOT NULL,
  `mailuser` varchar(255) DEFAULT NULL,
  `passworduser` varchar(255) NOT NULL,
  `activeuser` int(255) NOT NULL DEFAULT 1,
  `codeuser` varchar(255) DEFAULT NULL,
  `imguser` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `nameuser`, `mailuser`, `passworduser`, `activeuser`, `codeuser`, `imguser`) VALUES
(1, 'admin', 'marcbouzas2002@ginebro.cat', 'geason1234', 2, NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`idimage`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `galery`
--
ALTER TABLE `galery`
  MODIFY `idimage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
