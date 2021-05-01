-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2021 a las 14:18:33
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pizzeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numeroPedido` int(11) NOT NULL,
  `mailUsuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `sabor` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `foto` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `numeroPedido`, `mailUsuario`, `sabor`, `tipo`, `cantidad`, `foto`) VALUES
(58, '2021-04-30', 46, 'modificado@modificado.com', 'modificado', 'molde', 1, 'ImagenesDeLaVenta/molde-Muzza-cabezaleandro.jpg'),
(59, '2021-04-30', 345, 'cabezaleandro@gmail.com', 'Muzza', 'molde', 1, 'ImagenesDeLaVenta/molde-Muzza-cabezaleandro.jpg'),
(60, '2021-04-30', 560, 'cabezaleandro@gmail.com', 'Calabresa', 'molde', 1, 'ImagenesDeLaVenta/molde-Calabresa-cabezaleandro.jpg'),
(61, '2021-04-30', 79, 'cabezaleandro@gmail.com', 'Calabresa', 'molde', 1, 'ImagenesDeLaVenta/molde-Calabresa-cabezaleandro.jpg'),
(62, '2021-04-30', 64, 'cabezaleandro@gmail.com', 'Calabresa', 'molde', 1, 'ImagenesDeLaVenta/molde-Calabresa-cabezaleandro.jpg'),
(63, '2021-04-30', 675, 'cabezaleandro@gmail.com', 'Calabresa', 'molde', 1, 'ImagenesDeLaVenta/molde-Calabresa-cabezaleandro.jpg'),
(64, '2021-04-30', 926, 'cabezaleandro@gmail.com', 'Calabresa', 'molde', 1, 'ImagenesDeLaVenta/molde-Calabresa-cabezaleandro.jpg'),
(65, '2021-04-30', 926, 'cabezaleandro@gmail.com', 'Muzza', 'molde', 1, 'ImagenesDeLaVenta/molde-Muzza-cabezaleandro.jpg'),
(66, '2021-04-30', 642, 'cabezaleandro@gmail.com', 'Muzza', 'molde', 1, 'ImagenesDeLaVenta/molde-Muzza-cabezaleandro.jpg'),
(67, '2021-04-30', 779, 'cabezaleandro@gmail.com', 'Muzza', 'molde', 1, 'ImagenesDeLaVenta/molde-Muzza-cabezaleandro.jpg'),
(68, '2021-04-30', 861, 'cabezaleandro@gmail.com', 'Muzza', 'molde', 1, 'ImagenesDeLaVenta/molde-Muzza-cabezaleandro.jpg'),
(69, '2021-04-30', 156, 'cabezaleandro@gmail.com', 'Muzza', 'molde', 1, 'ImagenesDeLaVenta/molde-Muzza-cabezaleandro.jpg'),
(70, '2021-04-30', 130, 'modificado@modificado.com', 'modificado', 'molde', 1, 'ImagenesDeLaVenta/molde-Napolitana-cabezaleandro.jpg'),
(71, '2021-04-30', 761, 'cabezaleandro@gmail.com', 'Napolitana', 'molde', 1, 'ImagenesDeLaVenta/molde-Napolitana-cabezaleandro.jpg'),
(72, '2021-04-30', 486, 'cabezaleandro@gmail.com', 'Napolitana', 'molde', 1, 'ImagenesDeLaVenta/molde-Napolitana-cabezaleandro.jpg'),
(73, '2021-04-30', 157, 'VendedorRandom@gmail.com', 'Napolitana', 'molde', 1, 'ImagenesDeLaVenta/molde-Napolitana-VendedorRandom.jpg'),
(74, '2021-04-30', 336, 'VendedorRandom@gmail.com', 'Napolitana', 'molde', 1, 'ImagenesDeLaVenta/molde-Napolitana-VendedorRandom.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
