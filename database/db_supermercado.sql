-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2020 a las 17:22:50
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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `detalle` varchar(200) NOT NULL,
  `puntaje` int(50) NOT NULL,
  `id_producto_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `fecha`, `detalle`, `puntaje`, `id_producto_fk`) VALUES
(1, '0000-00-00 00:00:00', 'bueno se podria mejorar', 3, 153),
(3, '0000-00-00 00:00:00', 'muy bueno', 5, 153),
(4, '2020-07-03 02:08:43', 'el producto es muy buenoooooo', 5, 153),
(9, '2020-07-03 02:24:33', 'está vencidaasaaaaa', 4, 113),
(11, '2020-07-03 22:58:44', ' sisisis anda!!!!!', 5, 153),
(12, '2020-07-03 23:07:33', 'no me gustó', 1, 153),
(13, '2020-07-04 04:56:35', 'está vencidaasaaaaa', 1, 113),
(14, '2020-07-07 17:14:40', ' Está simpático el bowl', 3, 130),
(15, '2020-07-07 17:15:34', 'Acá hice otro comentario', 4, 130);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_rubro`
--

CREATE TABLE `imagenes_rubro` (
  `id_imagen` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `id_rubro_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes_rubro`
--

INSERT INTO `imagenes_rubro` (`id_imagen`, `path`, `id_rubro_fk`) VALUES
(6, 'images/imagesRubros/5f0269bf21faf0.44173318.jpg', 95),
(7, 'images/imagesRubros/5f0269eede9842.49589942.jpg', 95),
(27, 'images/imagesRubros/5f040176c9b801.51559516.jpeg', 102),
(28, 'images/imagesRubros/5f0401c3086e67.31573085.jpg', 102),
(30, 'images/imagesRubros/5f04035081fbc5.18625601.jpg', 102),
(31, 'images/imagesRubros/5f04038b93a251.30249173.jpg', 102),
(36, 'images/imagesRubros/5f0409b1acb132.46077925.jpg', 102);

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
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `marca`, `precio`, `id_rubro`, `imagen`) VALUES
(99, 'llave', 'bahco', 500, 84, 'images/imagesProd/5efd946a451ed3.64781647.jpg'),
(100, 'Pinza', 'Stanley', 300, 84, 'images/imagesProd/5efd9497086b70.63279006.jpg'),
(109, 'atun', 'LosHermanos', 200, 90, 'images/imagesProd/5f04c8e8530fd3.20983652.jpg'),
(113, 'Leche', 'LaSerenisima', 100, 90, 'images/imagesProd/5efd94269fe060.59928510.jpg'),
(114, 'Manzana', 'LaRoja', 110, 87, 'images/imagesProd/5efd9478618e21.46242694.jpg'),
(115, 'Banana', 'Ecuador', 150, 87, 'images/imagesProd/5efd93ea820ac3.98449134.jpg'),
(127, 'pantalon', 'Legacy', 5000, 86, 'images/imagesProd/5efd9487d488d0.56758728.jpg'),
(130, 'Tupper', 'TuTUpper', 500, 102, 'images/imagesProd/5efd943b9b0b29.13985207.jpg'),
(131, 'Tenaza', 'bahco', 600, 84, 'images/imagesProd/5efd94a5c02120.84449527.jpg'),
(153, 'Arroz', 'gallo', 100, 90, ''),
(161, 'joging', 'nike', 5000, 86, 'images/imagesProd/5efd9409f17eb1.31941086.jpg');

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
  `mail` varchar(100) NOT NULL,
  `contrasenia` varchar(200) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `mail`, `contrasenia`, `tipo`) VALUES
(2, 'elvakehler', 'mekdy2092@gmail.com', '$2y$10$bTo0/WgZP9jO1LAm5Shzy./Y/NYqMOkV054vNUgf0.VvqA8Nio5mm', 'admin'),
(5, 'carmengiusto', 'carmen@gmail.com', '$2y$10$RNJ74JXh8FvBIDC3SGPE/ewovEBBWi2p6q.PLvzfuQmne2LRddMZS', 'admin'),
(7, 'sergioyanez', 'sergiomyanez01@gmail.com', '$2y$10$rQQpb1ADrZtENXUVgd7aSOPaTZWb2Nb0KKk5V2ZhXzjwgG..iqBuu', 'admin'),
(8, 'damianYanez', 'doy@gmail.com', '$2y$10$pQrTatC2vJGlyVVb/2Iq3Of6ZoFxOoYVEMFjI.HjGDDXs96cxdw2e', 'registrado'),
(11, 'pipo', 'pipo@gmail.com', '$2y$10$9NcFVvRHuxn1xVIp1hM/0exiwSgAYQxdT2eoHYFY9N9jGUk2LqER.', 'registrado'),
(14, 'maxy', 'maxy@gmail.com', '$2y$10$SOPAlJo2x0GzDx3d1/UYc.G0R00R0nkPh6oMT9Yf4Of.SCNGaGxkC', 'registrado');

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
-- Indices de la tabla `imagenes_rubro`
--
ALTER TABLE `imagenes_rubro`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_rubro_fk` (`id_rubro_fk`);

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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `imagenes_rubro`
--
ALTER TABLE `imagenes_rubro`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_producto_fk`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `imagenes_rubro`
--
ALTER TABLE `imagenes_rubro`
  ADD CONSTRAINT `imagenes_rubro_ibfk_1` FOREIGN KEY (`id_rubro_fk`) REFERENCES `rubros` (`id_rubro`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_rubro`) REFERENCES `rubros` (`id_rubro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
