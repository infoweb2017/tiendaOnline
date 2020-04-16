-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2020 a las 14:23:42
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `Apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `Correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` int(9) NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `dni`, `Nombre`, `Apellido`, `Correo`, `Telefono`, `usuario`, `password`) VALUES
(1, '23878974T', 'Fernando', 'Peréz', 'fernandoperez@hotmail.com', 612778921, '\0\0\0f\0\0\0e\0\0\0r\0\0\0n\0\0\0a\0\0\0n\0\0\0d\0\0\0o', '1234'),
(3, '34567427L', 'Maria ', 'Gonzales', 'mariagonzalez@yahoo.es', 654456123, '\0\0\0M', '1234'),
(4, '23878974A', 'Fernando', 'Peréz', 'fernandoperez@hotmail.com', 612778921, '\0\0\0F', '1234'),
(5, '223345665', 'Cristina', 'De la Cruz', 'delacruz@gmail.com', 600567123, '\0\0\0C', '1234'),
(6, '45567889J', 'Paco', 'Aldarias', 'paco_aldarias@yahoo.es', 654123678, '\0\0\0P', '1234'),
(7, '223345665', 'Cristina', 'De la Cruz', 'delacruz@gmail.com', 600567123, NULL, NULL),
(8, '45567889M', 'Paco', 'Aldarias', 'paco_aldarias@yahoo.es', 654123678, NULL, NULL),
(9, '44898879G', 'Francys', 'Riesco', 'francys@yahoo.es', 653334240, 'francys', '1234'),
(41, '45678890T', 'Maria del Carmen ', 'Suarez', 'mariacarmen@email.com', 655444222, 'Maria ', '123456'),
(46, '2233456L', 'Cristina', 'De la Cruz', 'delacruz@gmail.com', 600567123, 'Cris', '1234'),
(47, '46567789O', 'Lorena', 'San martin', 'lore@email.com', 689000111, 'Lorena', '1234'),
(48, '45678890U', 'Lucia', 'lombardi', 'lucia@email.com', 655778987, 'Lucia', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`) USING HASH,
  ADD UNIQUE KEY `dni` (`dni`,`Telefono`,`usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
