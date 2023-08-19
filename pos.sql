-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2023 a las 20:55:55
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `razon` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `telefono` int(12) NOT NULL,
  `regimen` varchar(20) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `sucursal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `razon`, `calle`, `municipio`, `telefono`, `regimen`, `rfc`, `colonia`, `estado`, `serie`, `sucursal`) VALUES
(1, '1', '2', '3', '4', 5, '6', '7', '8', '9', '10', '11'),
(2, '1', '2', '3', '4', 5, '6', '7', '8', '9', '10', '11'),
(3, '1', '2', '1', '1', 2, '3', '3', '2', '3', '4', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(9, '2022-06-18-005419', 'App\\Database\\Migrations\\Authentication', 'default', 'App', 1655887322, 1),
(10, '2022-06-22-060131', 'App\\Database\\Migrations\\Product', 'default', 'App', 1655887322, 1),
(11, '2022-06-22-060355', 'App\\Database\\Migrations\\Transaction', 'default', 'App', 1655887322, 1),
(12, '2022-06-22-060410', 'App\\Database\\Migrations\\TransactionItem', 'default', 'App', 1655887322, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(100) NOT NULL,
  `producto` int(100) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cantidad` float(12,2) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `producto`, `fecha`, `cantidad`, `tipo`) VALUES
(1, 1, '2023-08-16 00:00:00', 24.30, 0),
(3, 5, '2023-08-19 13:49:53', 12.00, 1),
(4, 19, '2023-08-19 13:54:41', 12.00, 1),
(5, 19, '2023-08-19 13:55:10', 120.00, 1),
(6, 19, '2023-08-19 13:55:31', 54.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(30) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `barras` varchar(50) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `description` text DEFAULT '',
  `cantidad` float(12,2) NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `code`, `barras`, `name`, `description`, `cantidad`, `price`, `created_at`, `updated_at`) VALUES
(1, '1001', NULL, 'Product 101', 'Sample Product #101', 0.00, 55.50, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(2, '1002', NULL, 'Product 102', 'Sample Product #102', 0.00, 150.00, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(4, '1004', NULL, 'Product 104', 'Sample Product #104', 0.00, 23.50, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(5, '1005', NULL, 'Product 105', 'Sample Product #105', 0.00, 60.50, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(6, '1006', NULL, 'Product 106', 'Sample Product #106', 0.00, 205.25, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(7, '1007', NULL, 'Product 107', 'Sample Product #107', 0.00, 45.00, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(8, '1008', NULL, 'Product 108', 'Sample Product #108', 0.00, 75.23, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(9, '1009', NULL, 'Product 109', 'Sample Product #109', 0.00, 106.55, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(10, '1010', NULL, 'Product 110', 'Sample Product #110', 0.00, 375.50, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(11, '1011', NULL, 'Product 111', 'Sample Product #111', 0.00, 87.45, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(12, '1012', NULL, 'Product 112', 'Sample Product #112', 0.00, 104.99, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(13, '1013', NULL, 'Product 113', 'Sample Product #113', 0.00, 55.33, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(14, '1014', NULL, 'Product 114', 'Sample Product #114', 0.00, 88.99, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(15, '1015', NULL, 'Product 115', 'Sample Product #115', 0.00, 67.25, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(16, '1016', NULL, 'Product 116', 'Sample Product #116', 0.00, 195.85, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(17, '1017', NULL, 'Product 117', 'Sample Product #117', 0.00, 499.99, '2022-06-22 16:42:07', '2022-06-22 16:42:07'),
(18, '1025', NULL, 'Producto 112', 'Esta es un breve descripción del producto 112', 0.00, 689.00, '2022-11-04 08:46:39', '2022-11-04 08:46:39'),
(19, '123', 'SDGDG3453DSF', 'DILAN', 'SDFSFD', 100.00, 43.00, '2023-08-18 11:16:26', '2023-08-19 13:55:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id` int(30) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `customer` varchar(250) NOT NULL,
  `total_amount` float(12,2) NOT NULL DEFAULT 0.00,
  `tendered` float(12,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`id`, `code`, `customer`, `total_amount`, `tendered`, `created_at`, `updated_at`) VALUES
(1, '2022062200001', 'Juan Cliente', 505.50, 600.00, '2022-06-22 16:42:41', '2022-11-03 15:54:06'),
(2, '2022062200002', 'Pedrito Cliente', 1285.00, 1300.00, '2022-06-22 16:43:00', '2022-11-03 15:54:15'),
(4, '2022110400001', 'Sebastian Cliente', 999.98, 1000.00, '2022-11-03 15:55:01', '2022-11-03 15:55:01'),
(5, '2022110400002', 'Andrés Sebastián', 2067.00, 2068.00, '2022-11-04 08:48:01', '2022-11-04 08:48:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction_items`
--

CREATE TABLE `transaction_items` (
  `transaction_id` int(30) UNSIGNED NOT NULL,
  `product_id` int(30) UNSIGNED NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(30) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transaction_items`
--

INSERT INTO `transaction_items` (`transaction_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 55.50, 1, '2022-06-22 16:42:41', '2022-06-22 16:42:41'),
(1, 2, 150.00, 3, '2022-06-22 16:42:41', '2022-06-22 16:42:41'),
(2, 11, 87.45, 10, '2022-06-22 16:43:00', '2022-06-22 16:43:00'),
(2, 6, 205.25, 2, '2022-06-22 16:43:00', '2022-06-22 16:43:00'),
(4, 17, 499.99, 2, '2022-11-03 15:55:01', '2022-11-03 15:55:01'),
(5, 18, 689.00, 3, '2022-11-04 08:48:01', '2022-11-04 08:48:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(30) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mauricio Sevilla', 'hola@configuroweb.com', '$2y$10$zgCxnn3Gk50gwjmCeV0wkekdjGRGvTdjTTFc8l5jsylCXVhK4eaJS', '2022-06-22 16:42:05', '2022-11-03 15:51:22'),
(2, 'Juan Usuario', 'jusuario@cweb.com', '$2y$10$hFNoTxykbCdJyu0FFtw54.gDcilZRdNWkI5shFB.rrYseCNfbj1G2', '2022-06-22 17:04:27', '2022-11-03 15:52:22'),
(3, 'Pedro Usuario D', 'pusuario@cweb.com', '$2y$10$R58WVfFmRxIEf7cuvopM1uZlfDLWXy8HYE0KqMZ5cNLwbLzI4UXKG', '2022-11-03 17:17:01', '2022-11-03 17:23:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD KEY `transaction_items_product_id_foreign` (`product_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
