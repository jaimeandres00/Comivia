-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2018 a las 17:25:14
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comivia`
--
CREATE DATABASE IF NOT EXISTS `comivia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `comivia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `code_item` int(10) UNSIGNED NOT NULL,
  `code_restaurant` int(10) UNSIGNED NOT NULL,
  `name_item` varchar(25) NOT NULL,
  `details_item` tinytext,
  `price_item` decimal(7,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`code_item`, `code_restaurant`, `name_item`, `details_item`, `price_item`) VALUES
(1, 1, 'Item 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '2000.00'),
(2, 1, 'Item 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '4000.00'),
(3, 1, 'Item 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '6000.00'),
(4, 2, 'Item 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '2500.00'),
(5, 2, 'Item 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '4500.00'),
(6, 2, 'Item 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '6500.00'),
(7, 3, 'Item 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '2800.00'),
(8, 3, 'Item 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '4800.00'),
(9, 3, 'Item 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '6800.00'),
(10, 4, 'Item 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '3000.00'),
(11, 4, 'Item 11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '5000.00'),
(12, 5, 'Item 12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '3500.00'),
(13, 5, 'Item 13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '5500.00'),
(14, 6, 'Item 14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '3800.00'),
(15, 6, 'Item 15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '3800.00'),
(16, 7, 'Item 16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '10000.00'),
(17, 7, 'Item 17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '11000.00'),
(18, 7, 'Item 18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '12000.00'),
(19, 7, 'Item 19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '13000.00'),
(20, 8, 'Item 20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '10100.00'),
(21, 8, 'Item 21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '11100.00'),
(22, 8, 'Item 22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '12100.00'),
(23, 8, 'Item 23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '13100.00'),
(24, 9, 'Item 24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '10200.00'),
(25, 9, 'Item 25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '11200.00'),
(26, 9, 'Item 26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '12200.00'),
(27, 9, 'Item 27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '13200.00'),
(28, 10, 'Item 28', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin', '15000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `code_order` int(10) UNSIGNED NOT NULL,
  `code_user` int(10) UNSIGNED NOT NULL,
  `code_item` int(10) UNSIGNED NOT NULL,
  `value_order` mediumint(8) UNSIGNED NOT NULL,
  `details_order` text,
  `status_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurants`
--

CREATE TABLE `restaurants` (
  `code_restaurant` int(10) UNSIGNED NOT NULL,
  `name_restaurant` varchar(25) NOT NULL,
  `description_restaurant` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurants`
--

INSERT INTO `restaurants` (`code_restaurant`, `name_restaurant`, `description_restaurant`) VALUES
(1, 'Restaurant 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(2, 'Restaurant 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(3, 'Restaurant 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(4, 'Restaurant 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(5, 'Restaurant 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(6, 'Restaurant 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(7, 'Restaurant 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(8, 'Restaurant 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(9, 'Restaurant 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin'),
(10, 'Restaurant 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `code_user` int(10) UNSIGNED NOT NULL,
  `name_user` varchar(25) NOT NULL,
  `lastname_user` varchar(25) NOT NULL,
  `email_user` varchar(25) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `cellphone_user` int(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`code_user`, `name_user`, `lastname_user`, `email_user`, `password_user`, `cellphone_user`) VALUES
(1, 'Jaime Andr&eacute;s ', 'Azcarate Carmona', 'jaimeandres196@gmail.com', '$2y$10$Pl6.reb5SWcoxaNY.soSyezkWN0JuqRa4xyfbowzafmeV7OS3ii.6', 3175213008);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`code_item`),
  ADD KEY `code_restaurant` (`code_restaurant`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`code_order`),
  ADD KEY `code_user` (`code_user`),
  ADD KEY `code_item` (`code_item`);

--
-- Indices de la tabla `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`code_restaurant`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`code_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `code_item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `code_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `code_restaurant` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `code_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`code_restaurant`) REFERENCES `restaurants` (`code_restaurant`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `code_item` FOREIGN KEY (`code_item`) REFERENCES `items` (`code_item`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`code_user`) REFERENCES `users` (`code_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
