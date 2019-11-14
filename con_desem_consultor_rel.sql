-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-11-2019 a las 16:49:54
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `con_desem_consultor_rel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cao_cliente`
--

DROP TABLE IF EXISTS `cao_cliente`;
CREATE TABLE IF NOT EXISTS `cao_cliente` (
  `co_cliente` bigint(20) NOT NULL AUTO_INCREMENT,
  `cliente_nombre` char(20) NOT NULL,
  `cliente_apellido` char(20) NOT NULL,
  PRIMARY KEY (`co_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cao_cliente`
--

INSERT INTO `cao_cliente` (`co_cliente`, `cliente_nombre`, `cliente_apellido`) VALUES
(1, 'perez', 'delgado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cao_fatura`
--

DROP TABLE IF EXISTS `cao_fatura`;
CREATE TABLE IF NOT EXISTS `cao_fatura` (
  `co_factura` bigint(20) NOT NULL AUTO_INCREMENT,
  `co_cliente` bigint(20) NOT NULL,
  `co_sistema` bigint(20) NOT NULL,
  `co_os` bigint(20) NOT NULL,
  `commissao_cn` double NOT NULL,
  PRIMARY KEY (`co_factura`),
  KEY `cao_fatura_co_cliente_fkey` (`co_cliente`),
  KEY `cao_fatura_co_sistema_fkey` (`co_sistema`),
  KEY `cao_fatura_co_os_fkey` (`co_os`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cao_fatura`
--

INSERT INTO `cao_fatura` (`co_factura`, `co_cliente`, `co_sistema`, `co_os`, `commissao_cn`) VALUES
(1, 1, 1, 1, 0.15),
(2, 1, 1, 2, 0.15),
(3, 1, 1, 3, 0.15),
(4, 1, 2, 4, 0.15),
(5, 1, 3, 5, 0.15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cao_os`
--

DROP TABLE IF EXISTS `cao_os`;
CREATE TABLE IF NOT EXISTS `cao_os` (
  `co_os` bigint(20) NOT NULL AUTO_INCREMENT,
  `data_emissao` date NOT NULL,
  `valor` double NOT NULL,
  `total_imp_inc` double NOT NULL,
  PRIMARY KEY (`co_os`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cao_os`
--

INSERT INTO `cao_os` (`co_os`, `data_emissao`, `valor`, `total_imp_inc`) VALUES
(1, '2019-11-12', 35000, 0.16),
(3, '2019-10-12', 20000, 0.16),
(4, '2019-10-12', 20000, 0.16),
(5, '2019-12-12', 20000, 0.16),
(2, '2019-11-13', 20000, 0.16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cao_salario`
--

DROP TABLE IF EXISTS `cao_salario`;
CREATE TABLE IF NOT EXISTS `cao_salario` (
  `co_salario` bigint(20) NOT NULL AUTO_INCREMENT,
  `co_sistema` bigint(20) NOT NULL,
  `brut_salario` double NOT NULL,
  PRIMARY KEY (`co_salario`),
  KEY `cao_salario_co_sistema_fkey` (`co_sistema`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cao_salario`
--

INSERT INTO `cao_salario` (`co_salario`, `co_sistema`, `brut_salario`) VALUES
(2, 1, 5000),
(3, 3, 3500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cao_usuario`
--

DROP TABLE IF EXISTS `cao_usuario`;
CREATE TABLE IF NOT EXISTS `cao_usuario` (
  `co_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` char(20) NOT NULL,
  `usuario_apellido` char(20) NOT NULL,
  PRIMARY KEY (`co_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cao_usuario`
--

INSERT INTO `cao_usuario` (`co_usuario`, `usuario_nombre`, `usuario_apellido`) VALUES
(1, 'Guillermo', 'Berbesi'),
(2, 'Pedro', 'Perez'),
(3, 'cristian', 'gonzalez'),
(4, 'josefa', 'marin'),
(5, 'rey', 'milagro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissao_sistema`
--

DROP TABLE IF EXISTS `permissao_sistema`;
CREATE TABLE IF NOT EXISTS `permissao_sistema` (
  `co_sistema` bigint(20) NOT NULL AUTO_INCREMENT,
  `in_ativo` char(1) NOT NULL,
  `co_tipo_usuario` bigint(20) NOT NULL,
  `co_usuario` bigint(20) NOT NULL,
  PRIMARY KEY (`co_sistema`),
  KEY `permissao_sistema_co_usuario_fkey` (`co_usuario`),
  KEY `permissao_sistema_co_tipo_usuario_fkey` (`co_tipo_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permissao_sistema`
--

INSERT INTO `permissao_sistema` (`co_sistema`, `in_ativo`, `co_tipo_usuario`, `co_usuario`) VALUES
(1, 'S', 1, 1),
(2, 'S', 2, 2),
(3, 'S', 1, 3),
(4, 'S', 1, 4),
(5, 'N', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `co_tipo_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`co_tipo_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`co_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'consultor'),
(2, 'cliente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
