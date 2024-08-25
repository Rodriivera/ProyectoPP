-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2024 a las 23:09:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aromas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capilar`
--

CREATE TABLE `capilar` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `capilar`
--

INSERT INTO `capilar` (`id`, `nombre`, `autor`, `precio`, `imagen`) VALUES
(1, 'Kit anticaida shampoo + serum', 'Haircorp', '60000', 'https://http2.mlstatic.com/D_NQ_NP_717991-MLU73331019868_122023-O.webp'),
(2, 'Queratina', 'Elvive', '5500', 'https://http2.mlstatic.com/D_NQ_NP_2X_790434-MLA74779490091_022024-F.webp'),
(3, 'Shampoo reconstruccion', 'Dove', '2000', 'https://http2.mlstatic.com/D_NQ_NP_961759-MLU75010831119_032024-O.webp'),
(4, 'Serun glycolic', 'L\'Oréal', '12000', 'https://http2.mlstatic.com/D_NQ_NP_709025-MLU77937171865_072024-O.webp'),
(5, 'Hydra Oil Spray ', 'Tresemme ', '8000', 'https://http2.mlstatic.com/D_NQ_NP_706263-MLU75051383952_032024-O.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facial`
--

CREATE TABLE `facial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facial`
--

INSERT INTO `facial` (`id`, `nombre`, `autor`, `precio`, `imagen`) VALUES
(1, 'Protector Solar 50fps', 'Cocoa Beach', '20000', 'https://http2.mlstatic.com/D_NQ_NP_979780-MLU75210751848_032024-O.webp'),
(2, 'Serum Niacinamida ', 'Booster', '7000', 'https://http2.mlstatic.com/D_NQ_NP_907605-MLU74959728751_032024-O.webp'),
(3, 'Agua Micelar', 'Garnier ', '12000', 'https://http2.mlstatic.com/D_NQ_NP_608460-MLU77411990239_072024-O.webp'),
(4, 'Herramientas saca puntos negros', 'PS', '3000', 'https://http2.mlstatic.com/D_NQ_NP_669923-MLA52510326012_112022-O.webp'),
(5, 'Gel de limpieza ', 'Dermaglós', '7500', 'https://http2.mlstatic.com/D_NQ_NP_851328-MLA48124078507_112021-O.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fragancias`
--

CREATE TABLE `fragancias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fragancias`
--

INSERT INTO `fragancias` (`id`, `nombre`, `autor`, `precio`, `imagen`) VALUES
(1, 'We Are Tribe', 'Benetton', '50000', 'https://http2.mlstatic.com/D_NQ_NP_791673-MLA71964336516_092023-O.webp'),
(2, 'Man In Black', 'Bvlgari', '280000', 'https://http2.mlstatic.com/D_NQ_NP_996682-MLA45188470653_032021-O.webp'),
(3, 'Gentelman EDP', 'Givenchy', '210000', 'https://http2.mlstatic.com/D_NQ_NP_899125-MLA48860544216_012022-O.webp'),
(4, 'Chrome EDT', 'Azzaro', '200000', 'https://http2.mlstatic.com/D_NQ_NP_665611-MLA51774305501_092022-O.webp'),
(5, 'Stronger Whit You', 'Giorgio Armani', '160000', 'https://http2.mlstatic.com/D_NQ_NP_801300-MLA48255741857_112021-O.webp'),
(6, 'Kevin Black', 'Cannon', '13000', 'https://http2.mlstatic.com/D_NQ_NP_982807-MLU72831504651_112023-O.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquillaje`
--

CREATE TABLE `maquillaje` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquillaje`
--

INSERT INTO `maquillaje` (`id`, `nombre`, `autor`, `precio`, `imagen`) VALUES
(1, 'Mascara de pestañas', 'Maybelline', '15000', 'https://http2.mlstatic.com/D_NQ_NP_731180-MLU74228065987_012024-O.webp'),
(2, 'Labial Líquido Brillante', 'Maybelline ', '23000', 'https://http2.mlstatic.com/D_NQ_NP_898953-MLU78030190257_072024-O.webp'),
(3, 'Labial', 'Vogue', '10000', 'https://http2.mlstatic.com/D_NQ_NP_983358-MLU78686189645_082024-O.webp'),
(4, 'Corrector de ojeras ', 'Maybelline', '15000', 'https://http2.mlstatic.com/D_NQ_NP_924241-MLU75981828593_042024-O.webp'),
(5, 'Polvo bronceador ', 'Maybelline', '12000', 'https://http2.mlstatic.com/D_NQ_NP_837294-MLA47542283658_092021-O.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `autor`, `precio`, `imagen`) VALUES
(1, 'Slip premium', 'Hennia', '12000', 'https://http2.mlstatic.com/D_NQ_NP_824107-MLU78329377572_082024-O.webp'),
(2, 'Preservativos stronger', 'Prime', '1800', 'https://http2.mlstatic.com/D_NQ_NP_608370-MLA46594687718_072021-O.webp'),
(3, 'Cepillo Max White', 'Colgate', '3300', 'https://http2.mlstatic.com/D_NQ_NP_789058-MLU77917287913_072024-O.webp'),
(4, 'Pasta dental doble proteccion', 'Odol', '1500', 'https://http2.mlstatic.com/D_NQ_NP_696634-MLU74545498161_022024-O.webp'),
(5, 'Venis sensitive', ' Gillette', '5000', 'https://http2.mlstatic.com/D_NQ_NP_614789-MLA74650705648_022024-O.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regaleria`
--

CREATE TABLE `regaleria` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regaleria`
--

INSERT INTO `regaleria` (`id`, `imagen`, `nombre`, `autor`, `precio`) VALUES
(1, 'https://http2.mlstatic.com/D_NQ_NP_829052-MLU72565704884_112023-O.webp', 'Fibras Magicas', 'Filgo', '3000'),
(2, 'https://http2.mlstatic.com/D_NQ_NP_851184-MLU75341324351_032024-O.webp', 'Kit 24 pinceles ', 'Gadnic', '40000'),
(3, 'https://http2.mlstatic.com/D_NQ_NP_627734-MLU71658817251_092023-O.webp', 'Globo Terraqueo', 'Gloter', '30000'),
(4, 'https://http2.mlstatic.com/D_NQ_NP_838735-MLU78062218222_082024-O.webp', 'Mochila infantil', 'Ajaxgold', '17000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capilar`
--
ALTER TABLE `capilar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facial`
--
ALTER TABLE `facial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fragancias`
--
ALTER TABLE `fragancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maquillaje`
--
ALTER TABLE `maquillaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regaleria`
--
ALTER TABLE `regaleria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facial`
--
ALTER TABLE `facial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fragancias`
--
ALTER TABLE `fragancias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `maquillaje`
--
ALTER TABLE `maquillaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `regaleria`
--
ALTER TABLE `regaleria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
