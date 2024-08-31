-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2024 a las 02:25:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `autor`, `precio`, `imagen`, `categoria`) VALUES
(1, 'Kit anticaida shampoo + serum', 'Haircorp', 60000, 'https://http2.mlstatic.com/D_NQ_NP_717991-MLU73331019868_122023-O.webp', 'capilares'),
(2, 'Queratina', 'Elvive', 5500, 'https://http2.mlstatic.com/D_NQ_NP_2X_790434-MLA74779490091_022024-F.webp', 'capilares'),
(3, 'Shampoo reconstruccion', 'Dove', 2000, 'https://http2.mlstatic.com/D_NQ_NP_961759-MLU75010831119_032024-O.webp', 'capilares'),
(4, 'Serun glycolic', 'L\'Oréal', 12000, 'https://http2.mlstatic.com/D_NQ_NP_709025-MLU77937171865_072024-O.webp', 'capilares'),
(5, 'Hydra Oil Spray ', 'Tresemme ', 8000, 'https://http2.mlstatic.com/D_NQ_NP_706263-MLU75051383952_032024-O.webp', 'capilares'),
(6, 'Protector Solar 50fps', 'Cocoa Beach', 20000, 'https://http2.mlstatic.com/D_NQ_NP_979780-MLU75210751848_032024-O.webp', 'faciales'),
(7, 'Serum Niacinamida ', 'Booster', 7000, 'https://http2.mlstatic.com/D_NQ_NP_907605-MLU74959728751_032024-O.webp', 'faciales'),
(8, 'Agua Micelar', 'Garnier ', 12000, 'https://http2.mlstatic.com/D_NQ_NP_829892-MLA78236589654_082024-O.webp', 'faciales'),
(9, 'Herramientas saca puntos negros', 'PS', 3000, 'https://http2.mlstatic.com/D_NQ_NP_669923-MLA52510326012_112022-O.webp', 'faciales'),
(10, 'Gel de limpieza ', 'Dermaglós', 7500, 'https://http2.mlstatic.com/D_NQ_NP_851328-MLA48124078507_112021-O.webp', 'faciales'),
(11, 'We Are Tribe', 'Benetton', 50000, 'https://http2.mlstatic.com/D_NQ_NP_791673-MLA71964336516_092023-O.webp', 'fragancias'),
(12, 'Man In Black', 'Bvlgari', 280000, 'https://http2.mlstatic.com/D_NQ_NP_996682-MLA45188470653_032021-O.webp', 'fragancias'),
(13, 'Gentelman EDP', 'Givenchy', 210000, 'https://http2.mlstatic.com/D_NQ_NP_899125-MLA48860544216_012022-O.webp', 'fragancias'),
(14, 'Chrome EDT', 'Azzaro', 200000, 'https://http2.mlstatic.com/D_NQ_NP_665611-MLA51774305501_092022-O.webp', 'fragancias'),
(15, 'Stronger With You', 'Giorgio Armani', 160000, 'https://http2.mlstatic.com/D_NQ_NP_801300-MLA48255741857_112021-O.webp', 'fragancias'),
(16, 'Mascara de pestañas', 'Maybelline', 15000, 'https://http2.mlstatic.com/D_NQ_NP_812908-MLU77379578912_072024-O.webp', 'maquillajes'),
(17, 'Labial Líquido Brillante', 'Maybelline ', 23000, 'https://http2.mlstatic.com/D_NQ_NP_898953-MLU78030190257_072024-O.webp', 'maquillajes'),
(18, 'Labial', 'Vogue', 10000, 'https://http2.mlstatic.com/D_NQ_NP_983358-MLU78686189645_082024-O.webp', 'maquillajes'),
(19, 'Corrector de ojeras ', 'Maybelline', 15000, 'https://http2.mlstatic.com/D_NQ_NP_924241-MLU75981828593_042024-O.webp', 'maquillajes'),
(20, 'Polvo bronceador ', 'Maybelline', 12000, 'https://http2.mlstatic.com/D_NQ_NP_837294-MLA47542283658_092021-O.webp', 'maquillajes'),
(21, 'Slip premium', 'Hennia', 12000, 'https://http2.mlstatic.com/D_NQ_NP_824107-MLU78329377572_082024-O.webp', 'personales'),
(22, 'Preservativos Super Fino', 'Prime', 1800, 'https://http2.mlstatic.com/D_NQ_NP_697949-MLU73129005920_122023-O.webp', 'personales'),
(23, 'Cepillo Max White', 'Colgate', 3300, 'https://http2.mlstatic.com/D_NQ_NP_789058-MLU77917287913_072024-O.webp', 'personales'),
(24, 'Pasta dental doble proteccion', 'Odol', 1500, 'https://http2.mlstatic.com/D_NQ_NP_696634-MLU74545498161_022024-O.webp', 'personales'),
(25, 'Venis sensitive', ' Gillette', 5000, 'https://http2.mlstatic.com/D_NQ_NP_614789-MLA74650705648_022024-O.webp', 'personales'),
(26, 'Fibras Magicas', 'Filgo', 3000, 'https://http2.mlstatic.com/D_NQ_NP_829052-MLU72565704884_112023-O.webp', 'regaleria'),
(27, 'Kit 24 pinceles ', 'Gadnic', 40000, 'https://http2.mlstatic.com/D_NQ_NP_851184-MLU75341324351_032024-O.webp', 'regaleria'),
(28, 'Globo Terraqueo', 'Gloter', 30000, 'https://http2.mlstatic.com/D_NQ_NP_627734-MLU71658817251_092023-O.webp', 'regaleria'),
(29, 'Mochila infantil', 'Ajaxgold', 17000, 'https://http2.mlstatic.com/D_NQ_NP_838735-MLU78062218222_082024-O.webp', 'regaleria'),
(30, 'Mouse Inalámbrico M240 Rosa', 'Logitech', 22000, 'https://http2.mlstatic.com/D_NQ_NP_2X_673076-MLU71662866901_092023-F.webp', 'regaleria'),
(31, 'Vaso Quencher 1.18 Lts', 'Stanley', 120000, 'https://http2.mlstatic.com/D_NQ_NP_2X_611822-MLU77244660071_062024-F.webp', 'hogar'),
(32, 'Vaso Vidrio Copón Vino Gourmet 450ml X6', 'Rigolleau ', 7200, 'https://http2.mlstatic.com/D_NQ_NP_2X_710124-MLU74033824512_012024-F.webp', 'hogar'),
(33, 'Batería De Cocina Cacerola 3 Piezas Aluminio Tefló', 'Mta', 50000, 'https://http2.mlstatic.com/D_NQ_NP_2X_778604-MLA49897920296_052022-F.webp', 'hogar'),
(34, 'Molinillo De Café Eléctrico Premium Acero Inox', 'Atma', 40000, 'https://http2.mlstatic.com/D_NQ_NP_2X_929183-MLU73212552377_122023-F.webp', 'hogar'),
(35, 'Cafetera Italiana Clásica 9 Pocillos Manual Alumin', 'Atma', 25000, 'https://http2.mlstatic.com/D_NQ_NP_2X_843479-MLU73495333950_122023-F.webp', 'hogar'),
(36, 'Bandolera Cartera', 'Bourbon', 19000, 'https://http2.mlstatic.com/D_NQ_NP_2X_943773-MLU73123206490_122023-F.webp', 'accesorios'),
(37, 'Set Disfraz Animal Print', 'Furro', 5000, 'https://http2.mlstatic.com/D_NQ_NP_2X_755639-MLA52556584907_112022-F.webp', 'accesorios'),
(38, 'Broche De Pelo Mariposa X 12', 'Iko Shop', 5700, 'https://http2.mlstatic.com/D_NQ_NP_2X_986098-MLA73234910923_122023-F.webp', 'accesorios'),
(39, 'Aros Cristal Plata 925', 'Cubic', 10000, 'https://http2.mlstatic.com/D_NQ_NP_2X_604216-MLA76414238717_052024-F.webp', 'accesorios'),
(40, 'Deadpool Wolverine Collar Doble', 'Marvel', 9000, 'https://http2.mlstatic.com/D_NQ_NP_2X_699206-MLA77436594299_072024-F.webp', 'accesorios');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
