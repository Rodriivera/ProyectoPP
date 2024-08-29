-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2024 a las 23:08:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12


-- pajero


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
  `descripcion` text NOT NULL,
  `stock` int(11) NOT NULL,
  `familia` varchar(50) NOT NULL,
  `salida` varchar(255) NOT NULL,
  `cuerpo` varchar(255) NOT NULL,
  `fondo` varchar(255) NOT NULL,
  `invierno` tinyint(1) NOT NULL,
  `primavera` tinyint(1) NOT NULL,
  `verano` tinyint(1) NOT NULL,
  `otoño` tinyint(1) NOT NULL,
  `dia` tinyint(1) NOT NULL,
  `noche` tinyint(1) NOT NULL,
  `tamaño` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `autor`, `precio`, `descripcion`, `stock`, `familia`, `salida`, `cuerpo`, `fondo`, `invierno`, `primavera`, `verano`, `otoño`, `dia`, `noche`, `tamaño`, `imagen`, `genero`, `idcliente`) VALUES
(1, 'Acqua di Giò', 'Giorgio Armani', 150000, 'Acqua di Gio de Giorgio Armani es una fragancia de la familia olfativa Aromática Acuática para Hombres, Ideal para los días de la primavera y el verano. Acqua di Gio se lanzó en 1996. Acqua di Gio fue creada por Alberto Morillas, Annick Menardo y Christian Dussoulier. Las Notas de Salida son lima (limón verde), limón (lima ácida), bergamota, jazmín, naranja, mandarina y neroli; las Notas de Corazón son notas marinas, jazmín, calone, romero, durazno (melocotón), fresia, jacinto, ciclamen (violeta persa), violeta, cilantro, rosa, nuez moscada y reseda (miñoneta); las Notas de Fondo son almizcle blanco, cedro, musgo de roble, pachulí y ámbar.', 5, 'Frutal – Amaderada', 'Lima, limón, bergamota, jazmín, naranja, mandarina y neroli', 'Notas marinas, jazmín, calone, romero, durazno, fresia, jacinto, ciclamen, violeta, cilantro, rosa, nuez moscada y reseda', 'Almizcle blanco, cedro, musgo de roble, pachulí y ámbar', 0, 1, 1, 0, 1, 0, 100, 'https://http2.mlstatic.com/D_NQ_NP_849513-MLU74110409076_012024-O.webp', 'Hombre', 0),
(2, 'King of Seduction ', 'Antonio Banderas', 35000, '', 5, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_748501-MLA47574177150_092021-O.webp', 'Hombre', 0),
(3, 'Bergamota Ámbar', ' Adolfo Dominguez', 60000, '', 5, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_870546-MLU76112238139_042024-O.webp', 'Hombre', 0),
(4, 'Colors Man Intenso', 'Benetton', 30000, '', 5, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_872045-MLU70065176397_062023-O.webp', 'Hombre', 0),
(5, 'Voyage EDT', 'Nautica', 30000, '', 5, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_827652-MLA44749361865_012021-O.webp', 'Hombre', 0),
(6, 'Dieciocho', 'Maria Cher', 30000, '', 5, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_764898-MLU72628162610_112023-O.webp', 'Mujer', 0),
(7, 'Club de Nuit Intense Man', 'Armaf', 100000, '', 5, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_840578-MLU72639039115_112023-O.webp', 'Hombre', 0),
(8, 'Blue Seduction', 'Antonio Banderas', 30000, '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_874052-MLA72876105659_112023-O.webp', 'Hombre', 0),
(9, 'Chrome EDT', 'Azzaro', 200000, '', 5, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_665611-MLA51774305501_092022-O.webp', 'Hombre', 0),
(10, '212 Heroes', 'Carolina Herrera', 180000, '', 5, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 'https://http2.mlstatic.com/D_NQ_NP_916764-MLU72799164816_112023-O.webp', 'Mujer', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
