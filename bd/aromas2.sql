-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2024 a las 18:06:54
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
(2, 1, 40, 1, '2024-09-24 17:24:19'),
(3, 1, 3, 1, '2024-09-22 16:00:15');

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
(3, 2, 11, 1, 50000.00);

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
(1, 1, 30, '2024-09-22 12:33:34'),
(2, 1, 8, '2024-09-22 12:41:45');

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
(2, 1, 50000.00, 'Cancelado', '2024-09-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `marca` varchar(60) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `precio`, `imagen_url`, `categoria`, `stock`, `descripcion`, `fecha_agregado`) VALUES
(1, 'Kit anticaida shampoo + serum', 'Haircorp', 60000.00, 'https://http2.mlstatic.com/D_NQ_NP_717991-MLU73331019868_122023-O.webp', 'capilares', 0, '', '2024-09-12 14:17:34'),
(2, 'Queratina', 'Elvive', 5500.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_790434-MLA74779490091_022024-F.webp', 'capilares', 0, '', '2024-09-12 14:17:34'),
(3, 'Shampoo reconstruccion', 'Dove', 2000.00, 'https://http2.mlstatic.com/D_NQ_NP_961759-MLU75010831119_032024-O.webp', 'capilares', 0, '', '2024-09-12 14:17:34'),
(4, 'Serun glycolic', 'L\'Oréal', 12000.00, 'https://http2.mlstatic.com/D_NQ_NP_709025-MLU77937171865_072024-O.webp', 'capilares', 0, '', '2024-09-12 14:17:34'),
(5, 'Hydra Oil Spray ', 'Tresemme ', 8000.00, 'https://http2.mlstatic.com/D_NQ_NP_706263-MLU75051383952_032024-O.webp', 'capilares', 0, '', '2024-09-12 14:17:34'),
(6, 'Protector Solar 50fps', 'Cocoa Beach', 20000.00, 'https://http2.mlstatic.com/D_NQ_NP_979780-MLU75210751848_032024-O.webp', 'faciales', 0, '', '2024-09-12 14:17:34'),
(7, 'Serum Niacinamida ', 'Booster', 7000.00, 'https://http2.mlstatic.com/D_NQ_NP_907605-MLU74959728751_032024-O.webp', 'faciales', 0, '', '2024-09-12 14:17:34'),
(8, 'Agua Micelar', 'Garnier ', 12000.00, 'https://http2.mlstatic.com/D_NQ_NP_829892-MLA78236589654_082024-O.webp', 'faciales', 0, '', '2024-09-12 14:17:34'),
(9, 'Herramientas saca puntos negros', 'PS', 3000.00, 'https://http2.mlstatic.com/D_NQ_NP_669923-MLA52510326012_112022-O.webp', 'faciales', 0, '', '2024-09-12 14:17:34'),
(10, 'Gel de limpieza ', 'Dermaglós', 7500.00, 'https://http2.mlstatic.com/D_NQ_NP_851328-MLA48124078507_112021-O.webp', 'faciales', 0, '', '2024-09-12 14:17:34'),
(11, 'We Are Tribe', 'Benetton', 50000.00, 'https://http2.mlstatic.com/D_NQ_NP_791673-MLA71964336516_092023-O.webp', 'fragancias', 0, '', '2024-09-12 14:17:34'),
(12, 'Man In Black', 'Bvlgari', 280000.00, 'https://http2.mlstatic.com/D_NQ_NP_996682-MLA45188470653_032021-O.webp', 'fragancias', 0, '', '2024-09-12 14:17:34'),
(13, 'Gentelman EDP', 'Givenchy', 210000.00, 'https://http2.mlstatic.com/D_NQ_NP_899125-MLA48860544216_012022-O.webp', 'fragancias', 0, '', '2024-09-12 14:17:34'),
(14, 'Chrome EDT', 'Azzaro', 200000.00, 'https://http2.mlstatic.com/D_NQ_NP_665611-MLA51774305501_092022-O.webp', 'fragancias', 0, '', '2024-09-12 14:17:34'),
(15, 'Stronger With You', 'Giorgio Armani', 160000.00, 'https://http2.mlstatic.com/D_NQ_NP_801300-MLA48255741857_112021-O.webp', 'fragancias', 0, '', '2024-09-12 14:17:34'),
(16, 'Mascara de pestañas', 'Maybelline', 15000.00, 'https://http2.mlstatic.com/D_NQ_NP_812908-MLU77379578912_072024-O.webp', 'maquillajes', 0, '', '2024-09-12 14:17:34'),
(17, 'Labial Líquido Brillante', 'Maybelline ', 23000.00, 'https://http2.mlstatic.com/D_NQ_NP_898953-MLU78030190257_072024-O.webp', 'maquillajes', 0, '', '2024-09-12 14:17:34'),
(18, 'Labial', 'Vogue', 10000.00, 'https://http2.mlstatic.com/D_NQ_NP_983358-MLU78686189645_082024-O.webp', 'maquillajes', 0, '', '2024-09-12 14:17:34'),
(19, 'Corrector de ojeras ', 'Maybelline', 15000.00, 'https://http2.mlstatic.com/D_NQ_NP_924241-MLU75981828593_042024-O.webp', 'maquillajes', 0, '', '2024-09-12 14:17:34'),
(20, 'Polvo bronceador ', 'Maybelline', 12000.00, 'https://http2.mlstatic.com/D_NQ_NP_837294-MLA47542283658_092021-O.webp', 'maquillajes', 0, '', '2024-09-12 14:17:34'),
(21, 'Slip premium', 'Hennia', 12000.00, 'https://http2.mlstatic.com/D_NQ_NP_824107-MLU78329377572_082024-O.webp', 'personales', 0, '', '2024-09-12 14:17:34'),
(22, 'Preservativos Super Fino', 'Prime', 1800.00, 'https://http2.mlstatic.com/D_NQ_NP_697949-MLU73129005920_122023-O.webp', 'personales', 0, '', '2024-09-12 14:17:34'),
(23, 'Cepillo Max White', 'Colgate', 3300.00, 'https://http2.mlstatic.com/D_NQ_NP_789058-MLU77917287913_072024-O.webp', 'personales', 0, '', '2024-09-12 14:17:34'),
(24, 'Pasta dental doble proteccion', 'Odol', 1500.00, 'https://http2.mlstatic.com/D_NQ_NP_696634-MLU74545498161_022024-O.webp', 'personales', 0, '', '2024-09-12 14:17:34'),
(25, 'Venis sensitive', ' Gillette', 5000.00, 'https://http2.mlstatic.com/D_NQ_NP_614789-MLA74650705648_022024-O.webp', 'personales', 0, '', '2024-09-12 14:17:34'),
(26, 'Fibras Magicas', 'Filgo', 3000.00, 'https://http2.mlstatic.com/D_NQ_NP_829052-MLU72565704884_112023-O.webp', 'regaleria', 0, '', '2024-09-12 14:17:34'),
(27, 'Kit 24 pinceles ', 'Gadnic', 40000.00, 'https://http2.mlstatic.com/D_NQ_NP_851184-MLU75341324351_032024-O.webp', 'regaleria', 0, '', '2024-09-12 14:17:34'),
(28, 'Globo Terraqueo', 'Gloter', 30000.00, 'https://http2.mlstatic.com/D_NQ_NP_627734-MLU71658817251_092023-O.webp', 'regaleria', 0, '', '2024-09-12 14:17:34'),
(29, 'Mochila infantil', 'Ajaxgold', 17000.00, 'https://http2.mlstatic.com/D_NQ_NP_838735-MLU78062218222_082024-O.webp', 'regaleria', 0, '', '2024-09-12 14:17:34'),
(30, 'Mouse Inalámbrico M240 Rosa', 'Logitech', 22000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_673076-MLU71662866901_092023-F.webp', 'regaleria', 0, '', '2024-09-12 14:17:34'),
(31, 'Vaso Quencher 1.18 Lts', 'Stanley', 120000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_611822-MLU77244660071_062024-F.webp', 'hogar', 0, '', '2024-09-12 14:17:34'),
(32, 'Vaso Vidrio Copón Vino Gourmet 450ml X6', 'Rigolleau ', 7200.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_710124-MLU74033824512_012024-F.webp', 'hogar', 0, '', '2024-09-12 14:17:34'),
(33, 'Batería De Cocina Cacerola 3 Piezas Aluminio Teflón', 'Mta', 50000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_778604-MLA49897920296_052022-F.webp', 'hogar', 0, '', '2024-09-12 14:17:34'),
(34, 'Molinillo De Café Eléctrico Premium Acero Inox', 'Atma', 40000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_929183-MLU73212552377_122023-F.webp', 'hogar', 0, '', '2024-09-12 14:17:34'),
(35, 'Cafetera Italiana Clásica 9 Pocillos Manual Alumin', 'Atma', 25000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_843479-MLU73495333950_122023-F.webp', 'hogar', 0, '', '2024-09-12 14:17:34'),
(36, 'Bandolera Cartera', 'Bourbon', 19000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_943773-MLU73123206490_122023-F.webp', 'accesorios', 0, '', '2024-09-12 14:17:34'),
(37, 'Set Disfraz Animal Print', 'Furro', 5000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_755639-MLA52556584907_112022-F.webp', 'accesorios', 0, '', '2024-09-12 14:17:34'),
(38, 'Broche De Pelo Mariposa X 12', 'Iko Shop', 5700.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_986098-MLA73234910923_122023-F.webp', 'accesorios', 0, '', '2024-09-12 14:17:34'),
(39, 'Aros Cristal Plata 925', 'Cubic', 10000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_604216-MLA76414238717_052024-F.webp', 'accesorios', 0, '', '2024-09-12 14:17:34'),
(40, 'Deadpool Wolverine Collar Doble', 'Marvel', 9000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_699206-MLA77436594299_072024-F.webp', 'accesorios', 0, '', '2024-09-12 14:17:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(60) DEFAULT NULL,
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

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `contraseña`, `direccion`, `telefono`, `ciudad`, `fecha_registro`, `codigo_postal`) VALUES
(1, 'rodri', 'rodri@gmail.com', '$2y$10$AamscTCfVaeG4sviX4k5Se94.9pUubkhH.FNfwc8nqVUFBRZpkpc6', 'Mitre 1402', '3364100596', 'San Nicolás de los Arroyos', '2024-09-12 14:27:32', '2900'),
(4, 'rodrii', 'rodrii@gmail.com', '$2y$10$.6DPOlJg/SE0Ect/ii3q5OogzEJ8NYybd2v05R24aVmc58L/x4tWa', NULL, NULL, '', '2024-09-15 02:00:47', '');

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
