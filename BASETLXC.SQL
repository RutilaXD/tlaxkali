drop database if exists tlaxcalli;
create database tlaxcalli;

use tlaxcalli;

DROP TABLE IF EXISTS `comprador`;
CREATE TABLE IF NOT EXISTS `comprador` (
  `id_comprador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id_comprador`),
  KEY `id_comprador` (`id_comprador`,`nombre`,`direccion`,`telefono`,`correo`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprador`
--

INSERT INTO `comprador` (`id_comprador`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
(17, 'Daniela', 'Alla', 1234, NULL);
INSERT INTO `comprador` (`id_comprador`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
(18, 'Daniel', 'Al', 1234, 'a@b.com');
INSERT INTO `comprador` (`id_comprador`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
(19, 'Dana', 'Alla', 1234, NULL);
INSERT INTO `comprador` (`id_comprador`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
(20, 'Dani', 'Aca', 1234, NULL);

select * from comprador;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(25) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` float NOT NULL,
  `total` float NOT NULL,
  `comprador` int(11) not null,
  PRIMARY KEY (`id_pedido`),
  foreign key(`comprador`) references `comprador`(`id_comprador`)
  ) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;




--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `producto`, `cantidad`, `precio`, `total`,`comprador`) VALUES
(49, 'Tortilla Normal', 12, 13, 156,17),
(48, 'Tortilla Chica', 2, 13, 26,18),
(50, 'Tortilla Normal', 122, 13, 1586,19),
(51, 'Tlacoyos', 5, 10, 50,20),
(52, 'Tortilla Normal', 4, 13, 52,17);


select * from tlaxcalli.pedido;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

select*from tlaxcalli.comprador;
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasena`) VALUES
('usuario', 'usuario');

use tlaxcalli;
select * from pedido;

drop view if exists ventas;
create view ventas as
select id_pedido, producto, cantidad, precio, total, comprador.id_comprador, comprador.nombre, comprador.direccion,
comprador.telefono, comprador.correo from pedido
inner join comprador on pedido.comprador = comprador.id_comprador;

select * from ventas;

drop view if exists ultimocomprador;
create view ultimocomprador as
select id_comprador from comprador order by id_comprador desc;

select * from ultimocomprador;
select * from pedido;

select * from comprador;