-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2020 a las 22:01:21
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_supermercado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `puntaje` int(50) NOT NULL,
  `id_producto_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `precio` int(100) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `marca`, `precio`, `id_rubro`, `imagen`) VALUES
(99, 'llave', 'bahco', 500, 84, 'images/imagesProd/llave.jpg'),
(100, 'Pinza', 'Stanley', 300, 84, 'images/imagesProd/pinza.jpg'),
(105, 'Remera', 'Legacy', 500, 86, 'images/imagesProd/remera.jpg'),
(109, 'atun', 'La Campagnola', 200, 90, 'images/imagesProd/atun.jpg'),
(112, 'Fideos', 'Don Vicente', 120, 90, 'images/imagesProd/fideos.jpg\r\n'),
(113, 'Leche', 'La Serenisima', 100, 90, 'images/imagesProd/leche.jpg'),
(114, 'Manzana', 'LaRoja', 110, 87, 'images/imagesProd/manzana.jpg'),
(115, 'Banana', 'Ecuador', 150, 87, 'images/imagesProd/banana.jpg'),
(116, 'jogging', 'Nike', 1200, 86, 'images/imagesProd/jogging.jpg'),
(118, 'asados', 'Ternera', 400, 95, 'images/imagesProd/asado.jpg'),
(127, 'pantalon', 'Legacy', 5000, 86, 'images/imagesProd/pantalon.jpg'),
(129, 'Aspirina', 'bayer', 200, 101, 'images/imagesProd/aspirina.jpg'),
(130, 'Tupper', 'TuTUpper', 500, 102, 'images/imagesProd/tupper.jpg'),
(131, 'Tenaza', 'bahco', 600, 84, 'images/imagesProd/tenaza.jpg'),
(152, 'reel', 'Shimano', 300000, 113, 'images/imagesProd/5edad52d128ed3.97569768.jpg'),
(153, 'Arroz', 'gallo', 150, 90, 'images/imagesProd/5edae7a4051211.74856818.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id_rubro` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `imagen_rubro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id_rubro`, `nombre`, `imagen_rubro`) VALUES
(84, 'Ferreteria', 'images/imagesRubros/ferreteria.jpg'),
(86, 'Ropa', 'images/imagesRubros/ropa.jpg'),
(87, 'fruteria', 'images/imagesRubros/fruteria.jpg'),
(90, 'Despensa', 'images/imagesRubros/despensa.jpg'),
(95, 'Carniceria', 'images/imagesRubros/carniceria.jpg'),
(101, 'farmacia', 'images/imagesRubros/farmacia.jpg'),
(102, 'Bazar', 'images/imagesRubros/5edaeb106039e1.17460497.jpg'),
(112, 'Camping', 'images/imagesRubros/5edad4ebc9dce4.82063906.jpg'),
(113, 'pesca', 'images/imagesRubros/5edad4fe56f782.86934884.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `contrasenia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contrasenia`) VALUES
(1, 'sergioyanez', '$2y$10$g98E3lrydwO1ramE5PNsXOEppus.uheJ9kxjnDfn29BPoiXuaEFgS'),
(2, 'elvakehler', '$2y$10$bTo0/WgZP9jO1LAm5Shzy./Y/NYqMOkV054vNUgf0.VvqA8Nio5mm'),
(3, 'carmengiusto', 'carmen');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_producto_fk` (`id_producto_fk`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_rubro` (`id_rubro`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id_rubro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_producto_fk`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_rubro`) REFERENCES `rubros` (`id_rubro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
