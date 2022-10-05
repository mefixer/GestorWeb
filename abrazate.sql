-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para abrazate
CREATE DATABASE IF NOT EXISTS `abrazate` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `abrazate`;

-- Volcando estructura para tabla abrazate.carro
CREATE TABLE IF NOT EXISTS `carro` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(90) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `apellido` varchar(90) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `celular` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `FK_carro_estado` (`id_estado`),
  CONSTRAINT `FK_carro_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Almacenamiento de la peticion del cliente';

-- Volcando datos para la tabla abrazate.carro: ~3 rows (aproximadamente)
DELETE FROM `carro`;
/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
INSERT INTO `carro` (`id`, `nombre`, `apellido`, `direccion`, `correo`, `celular`, `id_estado`) VALUES
	(1, 'Mauricio', 'Garcia', '2 Norte, #450, Labranza, Temuco.', 'mgarciamardones@gmail.com', '20633850', 1),
	(2, 'Juan', 'Pérez', 'las Hortensias, Maule, talca.', 'jp_899@gmail.com', '45203796', 1),
	(3, '', '', '', '', '', 1),
	(4, 'Juanita', 'Mardones', '2 norte #450', 'mgarciamardones@gmail.com', '20633850', 1);
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.destacados
CREATE TABLE IF NOT EXISTS `destacados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `columna` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.destacados: ~4 rows (aproximadamente)
DELETE FROM `destacados`;
/*!40000 ALTER TABLE `destacados` DISABLE KEYS */;
INSERT INTO `destacados` (`id`, `titulo`, `columna`, `imagen`, `estado`) VALUES
	(1, 'Nanai Alivio Mentrual', 'Ingredientes: Anis, canela, jenjibre,manzanilla y toronjil.', 'nanaialiviomentrual.png', '1'),
	(2, 'Nanai A Mimir', 'Ingredientes: Flores de jazmin y Lavanda.', 'nanaiamimir.png', '1'),
	(3, 'Nanai Bombóm', 'Ingredientes: Té Negro, anís, cacao y naranja.', 'nanaibombom.png', '1'),
	(4, 'Nanai Genmaicha', 'Ingredientes: Té verde y arroz interal tostado.', 'nanaigenmaicha.png', '1');
/*!40000 ALTER TABLE `destacados` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.detalle_carro
CREATE TABLE IF NOT EXISTS `detalle_carro` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_producto` int(100) NOT NULL DEFAULT '0',
  `id_carro` int(100) NOT NULL DEFAULT '0',
  `cantidad` int(100) NOT NULL DEFAULT '0',
  `subtotal` int(100) NOT NULL DEFAULT '0',
  `codigo` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Columna 1` (`id`),
  KEY `FK_detalle_carro_producto` (`id_producto`),
  KEY `FK_detalle_carro_carro` (`id_carro`),
  CONSTRAINT `FK_detalle_carro_carro` FOREIGN KEY (`id_carro`) REFERENCES `carro` (`id`),
  CONSTRAINT `FK_detalle_carro_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.detalle_carro: ~8 rows (aproximadamente)
DELETE FROM `detalle_carro`;
/*!40000 ALTER TABLE `detalle_carro` DISABLE KEYS */;
INSERT INTO `detalle_carro` (`id`, `id_producto`, `id_carro`, `cantidad`, `subtotal`, `codigo`) VALUES
	(1, 1, 1, 2, 11800, 'c4ca4238a0b923820dcc509a6f75849b'),
	(2, 2, 1, 1, 5000, 'c81e728d9d4c2f636f067f89cc14862c'),
	(3, 3, 1, 1, 5400, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
	(4, 1, 2, 1, 5900, 'c4ca4238a0b923820dcc509a6f75849b'),
	(5, 2, 2, 2, 10000, 'c81e728d9d4c2f636f067f89cc14862c'),
	(6, 3, 2, 3, 16200, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
	(7, 2, 4, 1, 5000, 'c81e728d9d4c2f636f067f89cc14862c'),
	(8, 1, 4, 2, 11800, 'c4ca4238a0b923820dcc509a6f75849b');
/*!40000 ALTER TABLE `detalle_carro` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.estado: ~4 rows (aproximadamente)
DELETE FROM `estado`;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Ingresado', 'Usuario dejo una solicitud.'),
	(2, 'Pagado', 'Administrador confirma pago cliente.'),
	(3, 'Enviado', 'Administrador a realizado las gestiones del envio.'),
	(4, 'En Camino', 'La empresa de transporte a despachado el producto.'),
	(5, 'Entregado', 'El administrador a confirmado la entrega.');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.galeria
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `columna` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.galeria: ~0 rows (aproximadamente)
DELETE FROM `galeria`;
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
INSERT INTO `galeria` (`id`, `titulo`, `columna`, `imagen`) VALUES
	(1, 'Tecitos que se sienten como un Abrazo.', 'Té hecho a mano  - pociones -  Envíos a todo Chile!', 'maspedido.jpg');
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.genero
CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(100) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abrazate.genero: ~2 rows (aproximadamente)
DELETE FROM `genero`;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`id_genero`, `descripcion`) VALUES
	(1, 'Masculino'),
	(2, 'Femenino');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.likes
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_up` datetime NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.likes: ~0 rows (aproximadamente)
DELETE FROM `likes`;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.log
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(100) NOT NULL AUTO_INCREMENT,
  `inicio` datetime DEFAULT NULL,
  `final` datetime DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `rol_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abrazate.log: ~0 rows (aproximadamente)
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.posteos
CREATE TABLE IF NOT EXISTS `posteos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `columna` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.posteos: ~0 rows (aproximadamente)
DELETE FROM `posteos`;
/*!40000 ALTER TABLE `posteos` DISABLE KEYS */;
/*!40000 ALTER TABLE `posteos` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.principal
CREATE TABLE IF NOT EXISTS `principal` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `columna` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.principal: ~0 rows (aproximadamente)
DELETE FROM `principal`;
/*!40000 ALTER TABLE `principal` DISABLE KEYS */;
INSERT INTO `principal` (`id`, `titulo`, `columna`, `imagen`) VALUES
	(1, 'Deliciosos té', 'Para Relajartarte y Compartir', 'te-portada.jpg');
/*!40000 ALTER TABLE `principal` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  KEY `PK_PRODUCTO` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.producto: ~3 rows (aproximadamente)
DELETE FROM `producto`;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `name`, `description`, `stock`, `price`, `img`, `created_date`, `update_date`) VALUES
	(1, 'Nanai a Mimir', 'Delicioso té con flores de jazmin y flores de lavanda.', 30, 5900, 'nanaiamimir.png', '2022-07-20', '2022-07-20'),
	(2, 'Nanai Genmaicha', 'Té verder y arroz integral tostado.', 18, 5000, 'nanaigenmaicha.png', '2022-09-08', '2022-09-08'),
	(3, 'Nanai Bombóm', 'Té negro con cacao, anís  y naranja.', 20, 5400, 'nanaibombom.png', '2022-09-08', '2022-09-08');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abrazate.rol: ~3 rows (aproximadamente)
DELETE FROM `rol`;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
	(1, 'Administrador'),
	(2, 'Cliente'),
	(3, 'Empleado');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.sesiones
CREATE TABLE IF NOT EXISTS `sesiones` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla abrazate.sesiones: ~0 rows (aproximadamente)
DELETE FROM `sesiones`;
/*!40000 ALTER TABLE `sesiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesiones` ENABLE KEYS */;

-- Volcando estructura para tabla abrazate.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(100) NOT NULL AUTO_INCREMENT,
  `rut` varchar(10) DEFAULT NULL,
  `primer_nombre` varchar(45) NOT NULL,
  `segundo_nombre` varchar(45) NOT NULL,
  `primer_apellido` varchar(45) NOT NULL,
  `segundo_apellido` varchar(45) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `rol_id_rol` int(11) NOT NULL,
  `genero_id_genero` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`rol_id_rol`,`genero_id_genero`),
  KEY `fk_usuario_rol_idx` (`rol_id_rol`),
  KEY `fk_usuario_genero_idx` (`genero_id_genero`),
  CONSTRAINT `fk_usuario_genero` FOREIGN KEY (`genero_id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla abrazate.usuario: ~3 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `rut`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `nombre_usuario`, `password`, `email`, `rol_id_rol`, `genero_id_genero`) VALUES
	(1, '17597491-1', 'Mauricio', 'Eduardo', 'Garcia', 'Mardones', 'admin', '202cb962ac59075b964b07152d234b70', 'mauricio@mefixer.cl', 1, 1),
	(2, '11111111-1', 'Francisca', 'Fran', 'Mena', 'Mena', 'FranAdmin', '202cb962ac59075b964b07152d234b70', 'fran@abrazate.cl', 1, 2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
