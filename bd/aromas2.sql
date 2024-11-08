-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 17:56:03
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
(122, 6, 36, 2, '2024-11-06 02:00:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `clave` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`clave`, `valor`) VALUES
('valor-envio', 10000);

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
(24, 32, 11, 1, 50000.00),
(25, 32, 14, 1, 200000.00),
(26, 33, 13, 1, 210000.00),
(27, 34, 15, 1, 160000.00),
(28, 34, 43, 1, 250000.00),
(29, 35, 44, 1, 170000.00),
(30, 35, 13, 1, 210000.00),
(33, 37, 17, 1, 23000.00),
(34, 37, 15, 1, 160000.00),
(35, 37, 22, 3, 1800.00),
(36, 37, 28, 1, 30000.00),
(37, 37, 31, 1, 120000.00),
(38, 37, 40, 1, 9000.00),
(39, 37, 1, 1, 60000.00),
(40, 37, 8, 1, 12000.00),
(41, 38, 31, 1, 120000.00),
(42, 39, 17, 3, 23000.00),
(43, 40, 12, 1, 280000.00),
(44, 41, 43, 1, 250000.00),
(45, 42, 17, 1, 23000.00),
(46, 42, 35, 1, 25000.00);

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
(27, 1, 14, '2024-11-01 14:57:48'),
(37, 10, 16, '2024-11-06 04:03:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `envio` int(11) NOT NULL,
  `estado` enum('Pendiente','Enviado','Cancelado') DEFAULT 'Pendiente',
  `fecha_pedido` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `total`, `envio`, `estado`, `fecha_pedido`) VALUES
(32, 1, 255000.00, 5000, 'Pendiente', '2024-10-31'),
(33, 1, 215000.00, 5000, 'Enviado', '2024-10-31'),
(34, 1, 415000.00, 5000, 'Cancelado', '2024-10-31'),
(35, 1, 380000.00, 0, 'Pendiente', '2024-10-31'),
(37, 5, 419400.00, 0, 'Pendiente', '2024-11-05'),
(38, 10, 120000.00, 0, 'Pendiente', '2024-11-05'),
(39, 10, 69000.00, 0, 'Pendiente', '2024-11-05'),
(40, 10, 280000.00, 0, 'Pendiente', '2024-11-06'),
(41, 10, 250000.00, 0, 'Pendiente', '2024-11-06'),
(42, 10, 58000.00, 10000, 'Pendiente', '2024-11-06');

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
(1, 'Kit anticaida shampoo + serum', 'Haircorp', 60000.00, '1.webp', 'Capilares', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(2, 'Queratina', 'Elvive', 5500.00, '2.jpg', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(3, 'Shampoo reconstruccion', 'Dove', 2000.00, '3.jpg', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(4, 'Serun glycolic', 'L\'Oréal', 12000.00, '4.jpg', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(5, 'Hydra Oil Spray ', 'Tresemme ', 8000.00, '5.jpg', 'Capilares', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(6, 'Protector Solar 50fps', 'Cocoa Beach', 20000.00, '6.jpg', 'Capilares', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(7, 'Serum Niacinamida ', 'Booster', 7000.00, '7.jpg', 'Faciales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(8, 'Agua Micelar', 'Garnier ', 12000.00, '8.jpg', 'Faciales', 7, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(9, 'Herramientas saca puntos negros', 'PS', 3000.00, '9.jpg', 'Faciales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(10, 'Gel de limpieza ', 'Dermaglós', 7500.00, '10.jpg', 'Faciales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(11, 'We Are Tribe', 'Benetton', 50000.00, '11.jpg', 'Fragancias', 6, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(12, 'Man In Black', 'Bvlgari', 280000.00, '12.jpg', 'Fragancias', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(13, 'Gentelman EDP', 'Givenchy', 210000.00, '13.jpg', 'Fragancias', 5, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(14, 'Chrome EDT', 'Azzaro', 200000.00, '14.jpg', 'Fragancias', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(15, 'Stronger With You', 'Giorgio Armani', 160000.00, '15.jpg', 'Fragancias', 7, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(16, 'Mascara de pestañas', 'Maybelline', 15000.00, '16.jpg', 'Maquillajes', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(17, 'Labial Líquido Brillante', 'Maybelline ', 23000.00, '17.jpg', 'Maquillajes', 4, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(18, 'Labial', 'Vogue', 10000.00, '18.jpg', 'Maquillajes', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(19, 'Corrector de ojeras ', 'Maybelline', 15000.00, '19.jpg', 'Maquillajes', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(20, 'Polvo bronceador ', 'Maybelline', 12000.00, '20.jpg', 'Maquillajes', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(21, 'Slip premium', 'Hennia', 12000.00, '21.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(22, 'Preservativos Super Fino', 'Prime', 1800.00, '22.jpg', 'Personales', 7, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(23, 'Cepillo Max White', 'Colgate', 3300.00, '23.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(24, 'Pasta dental doble proteccion', 'Odol', 1500.00, '24.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(25, 'Venis sensitive', ' Gillette', 5000.00, '25.jpg', 'Personales', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(26, 'Fibras Magicas', 'Filgo', 3000.00, '26.jpg', 'Regaleria', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(27, 'Kit 24 pinceles ', 'Gadnic', 40000.00, '27.jpg', 'Regaleria', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(28, 'Globo Terraqueo', 'Gloter', 30000.00, '28.jpg', 'Regaleria', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(29, 'Mochila infantil', 'Ajaxgold', 17000.00, '29.jpg', 'Regaleria', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(30, 'Mouse Inalámbrico M240 Rosa', 'Logitech', 22000.00, '30.jpg', 'Regaleria', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(31, 'Vaso Quencher 1.18 Lts', 'Stanley', 120000.00, '31.jpg', 'Hogar', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(32, 'Vaso Vidrio Gourmet 450ml X6', 'Rigolleau ', 7200.00, '32.jpg', 'Hogar', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(33, 'Batería De Cocina', 'Mta', 50000.00, '33.jpg', 'Hogar', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(34, 'Molinillo De Café Eléctrico ', 'Atma', 40000.00, '34.jpg', 'Hogar', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(35, 'Cafetera Italiana Clásica 9 Pocillos', 'Atma', 25000.00, '35.jpg', 'Hogar', 8, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(36, 'Bandolera Cartera', 'Bourbon', 19000.00, '36.jpg', 'Accesorios', 10, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(38, 'Broche De Pelo Mariposa X 12', 'Iko Shop', 5700.00, '38.jpg', 'Accesorios', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(39, 'Aros Cristal Plata 925', 'Cubic', 10000.00, '39.jpg', 'Accesorios', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(40, 'Deadpool Wolverine Collar Doble', 'Marvel', 9000.00, '40.jpg', 'Accesorios', 9, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-12 14:17:34'),
(43, 'Sauvage EDP 60 ml', 'Dior', 250000.00, 'D_NQ_NP_2X_759071-MLA74782387697.jpg', 'Fragancias', 3, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-30 02:39:23'),
(44, 'Cool Water Man Edp 100Ml', 'Davidoff', 170000.00, 'D_NQ_NP_2X_753372-MLU74220036233.jpg', 'Fragancias', 7, 5, 'Proin egestas lectus in justo tincidunt feugiat. Nam in tempor lorem. Ut sed pharetra diam. Sed a tellus dolor. Mauris pharetra tortor quis libero interdum, et euismod orci condimentum. Suspendisse non convallis dolor. Aenean blandit faucibus metus ut placerat. Aenean elementum posuere justo vitae mollis. Pellentesque elementum quam et consequat sodales. In hac habitasse platea dictumst. Sed gravida diam sapien, in consectetur ligula posuere a. Praesent facilisis dapibus nunc, et pellentesque eros vulputate a.', '2024-09-30 02:41:30');

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
(6, 'papo', '', '', NULL, 'papo@gmail.com', '$2y$10$K1Dqwb66jVHJLRsj2QsNROdrKyRJgvW2oybAAbt2hT3cL/ZPBKG/K', NULL, NULL, NULL, '2024-10-28 19:31:47', NULL),
(7, 'rodriii', '', '', NULL, 'rodriii@gmail.com', '$2y$10$WQ26ywZDGCNDZz4d5ILFZenndEXFppUaksCXOZxeInsgZjVfhFsgm', NULL, NULL, NULL, '2024-11-01 15:24:41', NULL),
(10, 'fausto', '', '', NULL, 'fausto@gmail.com', '$2y$10$vgMhCvGwSiDZfanpWYvQt.ORVrj6N1Y3fQ2zdrNF1n/TjiPv0ADnu', '123', NULL, 'san nicolas ', '2024-11-06 02:37:56', '2900');

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
(24, 17, 'Maquillajes', 23000, 1, '2024-10-05'),
(25, 15, 'Fragancias', 160000, 1, '2024-09-05'),
(26, 22, 'Personales', 1800, 3, '2024-08-05'),
(27, 28, 'Regaleria', 30000, 1, '2024-07-05'),
(28, 31, 'Hogar', 120000, 1, '2024-06-05'),
(29, 40, 'Accesorios', 9000, 1, '2024-11-05'),
(30, 1, 'Capilares', 60000, 1, '2024-11-05'),
(31, 8, 'Faciales', 12000, 1, '2024-11-05'),
(32, 31, 'Hogar', 120000, 1, '2024-11-05'),
(33, 17, 'Maquillajes', 23000, 3, '2024-11-05'),
(34, 12, 'Fragancias', 280000, 1, '2024-11-06'),
(35, 43, 'Fragancias', 250000, 1, '2024-11-06'),
(36, 17, 'Maquillajes', 23000, 1, '2024-11-06'),
(37, 35, 'Hogar', 25000, 1, '2024-11-06');

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
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`clave`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
