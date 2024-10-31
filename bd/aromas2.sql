-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 01:40:08
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
-- Base de datos: `aromas2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`id`, `usuario_id`, `producto_id`, `cantidad`, `fecha_agregado`) VALUES
(81, 1, 11, 1, '2024-10-17 17:57:13'),
(82, 1, 12, 1, '2024-10-17 17:57:18'),
(83, 1, 32, 1, '2024-10-17 17:57:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 1, 16, 1, 5000.00),
(2, 1, 8, 1, 5000.00),
(3, 2, 11, 1, 50000.00),
(4, 3, 15, 1, 160000.00),
(5, 3, 33, 1, 50000.00),
(6, 4, 8, 1, 12000.00),
(7, 5, 12, 1, 280000.00),
(8, 5, 43, 5, 250000.00),
(9, 6, 13, 1, 210000.00),
(10, 6, 14, 1, 200000.00),
(11, 7, 8, 1, 12000.00),
(12, 8, 44, 1, 170000.00),
(13, 8, 33, 1, 50000.00),
(14, 23, 39, 1, 10000.00),
(15, 24, 35, 1, 25000.00),
(16, 24, 11, 2, 50000.00),
(17, 25, 13, 1, 210000.00),
(18, 26, 38, 1, 5700.00),
(19, 27, 6, 1, 20000.00),
(20, 28, 16, 2, 15000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `usuario_id`, `producto_id`, `fecha_agregado`) VALUES
(22, 1, 11, '2024-10-17 17:57:24'),
(23, 1, 12, '2024-10-17 17:57:27'),
(24, 1, 32, '2024-10-17 17:57:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `estado` enum('Pendiente','Enviado','Entregado','Cancelado') DEFAULT 'Pendiente',
  `fecha_pedido` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `total`, `estado`, `fecha_pedido`) VALUES
(1, 1, 10000.00, 'Enviado', '2024-09-10'),
(2, 1, 50000.00, 'Cancelado', '2024-09-01'),
(3, 1, 210000.00, 'Pendiente', '2024-10-02'),
(4, 1, 12000.00, 'Pendiente', '2024-10-02'),
(5, 1, 1530000.00, 'Pendiente', '2024-10-08'),
(6, 1, 410000.00, 'Pendiente', '2024-10-12'),
(7, 1, 12000.00, 'Pendiente', '2024-10-14'),
(8, 1, 220000.00, 'Pendiente', '2024-10-14'),
(23, 1, 10000.00, 'Pendiente', '2024-10-14'),
(24, 1, 125000.00, 'Pendiente', '2024-10-14'),
(25, 6, 210000.00, 'Pendiente', '2024-10-28'),
(26, 6, 5700.00, 'Pendiente', '2024-10-28'),
(27, 6, 20000.00, 'Pendiente', '2024-10-28'),
(28, 6, 30000.00, 'Pendiente', '2024-10-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `marca` varchar(30) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `min_stock` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `precio`, `imagen_url`, `categoria`, `stock`, `min_stock`, `descripcion`, `fecha_agregado`) VALUES
(1, 'Kit anticaida shampoo + serum', 'Haircorp', 60000.00, '1.webp', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(2, 'Queratina', 'Elvive', 5500.00, '2.jpg', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(3, 'Shampoo reconstruccion', 'Dove', 2000.00, '3.jpg', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(4, 'Serun glycolic', 'L\'Oréal', 12000.00, '4.jpg', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(5, 'Hydra Oil Spray ', 'Tresemme ', 8000.00, '5.jpg', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(6, 'Protector Solar 50fps', 'Cocoa Beach', 20000.00, '6.jpg', 'Capilares', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(7, 'Serum Niacinamida ', 'Booster', 7000.00, '7.jpg', 'Faciales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(8, 'Agua Micelar', 'Garnier ', 12000.00, '8.jpg', 'Faciales', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(9, 'Herramientas saca puntos negros', 'PS', 3000.00, '9.jpg', 'Faciales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(10, 'Gel de limpieza ', 'Dermaglós', 7500.00, '10.jpg', 'Faciales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(11, 'We Are Tribe', 'Benetton', 50000.00, '11.jpg', 'Fragancias', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(12, 'Man In Black', 'Bvlgari', 280000.00, '12.jpg', 'Fragancias', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(13, 'Gentelman EDP', 'Givenchy', 210000.00, '13.jpg', 'Fragancias', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(14, 'Chrome EDT', 'Azzaro', 200000.00, '14.jpg', 'Fragancias', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(15, 'Stronger With You', 'Giorgio Armani', 160000.00, '15.jpg', 'Fragancias', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(16, 'Mascara de pestañas', 'Maybelline', 15000.00, '16.jpg', 'Maquillajes', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(17, 'Labial Líquido Brillante', 'Maybelline ', 23000.00, '17.jpg', 'Maquillajes', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(18, 'Labial', 'Vogue', 10000.00, '18.jpg', 'Maquillajes', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(19, 'Corrector de ojeras ', 'Maybelline', 15000.00, '19.jpg', 'Maquillajes', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(20, 'Polvo bronceador ', 'Maybelline', 12000.00, '20.jpg', 'Maquillajes', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(21, 'Slip premium', 'Hennia', 12000.00, '21.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(22, 'Preservativos Super Fino', 'Prime', 1800.00, '22.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(23, 'Cepillo Max White', 'Colgate', 3300.00, '23.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(24, 'Pasta dental doble proteccion', 'Odol', 1500.00, '24.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(25, 'Venis sensitive', ' Gillette', 5000.00, '25.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(26, 'Fibras Magicas', 'Filgo', 3000.00, '26.jpg', 'Regaleria', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(27, 'Kit 24 pinceles ', 'Gadnic', 40000.00, '27.jpg', 'Regaleria', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(28, 'Globo Terraqueo', 'Gloter', 30000.00, '28.jpg', 'Regaleria', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(29, 'Mochila infantil', 'Ajaxgold', 17000.00, '29.jpg', 'Regaleria', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(30, 'Mouse Inalámbrico M240 Rosa', 'Logitech', 22000.00, '30.jpg', 'Regaleria', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(31, 'Vaso Quencher 1.18 Lts', 'Stanley', 120000.00, '31.jpg', 'Hogar', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(32, 'Vaso Vidrio Gourmet 450ml X6', 'Rigolleau ', 7200.00, '32.jpg', 'Hogar', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(33, 'Batería De Cocina', 'Mta', 50000.00, '33.jpg', 'Hogar', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(34, 'Molinillo De Café Eléctrico ', 'Atma', 40000.00, '34.jpg', 'Hogar', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(35, 'Cafetera Italiana Clásica 9 Pocillos', 'Atma', 25000.00, '35.jpg', 'Hogar', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(36, 'Bandolera Cartera', 'Bourbon', 19000.00, '36.jpg', 'Accesorios', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(38, 'Broche De Pelo Mariposa X 12', 'Iko Shop', 5700.00, '38.jpg', 'Accesorios', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(39, 'Aros Cristal Plata 925', 'Cubic', 10000.00, '39.jpg', 'Accesorios', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(40, 'Deadpool Wolverine Collar Doble', 'Marvel', 9000.00, '40.jpg', 'Accesorios', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(43, 'Sauvage EDP 60 ml', 'Dior', 250000.00, 'D_NQ_NP_2X_759071-MLA74782387697.jpg', 'Fragancias', 5, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-30 02:39:23'),
(44, 'Cool Water Man Edp 100Ml', 'Davidoff', 170000.00, 'D_NQ_NP_2X_753372-MLU74220036233.jpg', 'Fragancias', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-30 02:41:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `ciudad` varchar(60) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `codigo_postal` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellido`, `dni`, `email`, `contraseña`, `direccion`, `telefono`, `ciudad`, `fecha_registro`, `codigo_postal`) VALUES
(1, 'rodri', 'Rodrigo', 'Vera', 54657772, 'rodri@gmail.com', '$2y$10$AamscTCfVaeG4sviX4k5Se94.9pUubkhH.FNfwc8nqVUFBRZpkpc6', 'Mitre 1402', '3364100596', 'San Nicolás de los Arroyos', '2024-09-12 14:27:32', '2900'),
(4, 'rodrii', '', '', NULL, 'rodrii@gmail.com', '$2y$10$.6DPOlJg/SE0Ect/ii3q5OogzEJ8NYybd2v05R24aVmc58L/x4tWa', NULL, NULL, '', '2024-09-15 02:00:47', ''),
(5, 'admin', '', '', NULL, 'admin@gmail.com', '$2y$10$n.L35FG3Tx35VyBUPcsjjucDJWzvyVIsMEcbitZJP1d8Xgs1u8sti', NULL, NULL, NULL, '2024-10-16 23:53:11', NULL),
(6, 'papo', '', '', NULL, 'papo@gmail.com', '$2y$10$K1Dqwb66jVHJLRsj2QsNROdrKyRJgvW2oybAAbt2hT3cL/ZPBKG/K', NULL, NULL, NULL, '2024-10-28 19:31:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `producto_id`, `categoria`, `precio`, `cantidad`, `fecha`) VALUES
(4, 4, 'Capilares ', 1000, 2, '2024-10-28'),
(5, 5, 'Perfumeria', 3000, 1, '2024-10-28'),
(6, 8, 'Capilares ', 1500, 1, '2024-10-28'),
(9, 6, 'Capilares', 20000, 1, '2024-02-28'),
(10, 16, 'Maquillajes', 15000, 2, '2024-10-28'),
(11, 1, 'Personales', 0, 0, '2024-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carritos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
