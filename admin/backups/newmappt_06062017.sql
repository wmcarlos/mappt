-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2017 a las 23:48:33
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mappt`
--
CREATE DATABASE `mappt` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `mappt`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tanalisis_inspeccion`
--

CREATE TABLE IF NOT EXISTS `tanalisis_inspeccion` (
  `idtanalisis_inspeccion` int(11) NOT NULL AUTO_INCREMENT,
  `nro_informe_inspeccion` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_revision` date NOT NULL,
  `oficina_dependencia` varchar(255) NOT NULL,
  `aprobacion_certificado` char(1) NOT NULL,
  `descripcion_porque` varchar(255) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idtanalisis_inspeccion`),
  KEY `fk_id_usuario002` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasociacion`
--

CREATE TABLE IF NOT EXISTS `tasociacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tasociacion`
--

INSERT INTO `tasociacion` (`id`, `nombre`, `estatus`) VALUES
(1, 'GANADEROS', 1),
(2, 'ALGODONEROS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tciclo`
--

CREATE TABLE IF NOT EXISTS `tciclo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcoordenadas_utm`
--

CREATE TABLE IF NOT EXISTS `tcoordenadas_utm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad_produccion` int(11) NOT NULL,
  `norte` int(11) NOT NULL,
  `este` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_id_unidad_produccion006` (`id_unidad_produccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_fuente_agua`
--

CREATE TABLE IF NOT EXISTS `tdetalle_fuente_agua` (
  `id_detalle_fuente_auga` int(11) NOT NULL AUTO_INCREMENT,
  `id_fuente_agua` int(11) DEFAULT NULL,
  `id_produccion_vegetal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_fuente_auga`),
  KEY `fk_id_fuenta_agua` (`id_fuente_agua`),
  KEY `fk_id_produccion_vegetal` (`id_produccion_vegetal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_implemento_maquinaria`
--

CREATE TABLE IF NOT EXISTS `tdetalle_implemento_maquinaria` (
  `id_detalle_implemento_maquinaria` int(11) NOT NULL AUTO_INCREMENT,
  `id_implemento_maquinaria` int(11) DEFAULT NULL,
  `id_unidad_produccion` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_implemento_maquinaria`),
  KEY `fk_id_maquinaria_implemento` (`id_implemento_maquinaria`),
  KEY `fk_id_unidad_produccion0101` (`id_unidad_produccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_metodo_riego`
--

CREATE TABLE IF NOT EXISTS `tdetalle_metodo_riego` (
  `id_detalle_metodo_riego` int(11) NOT NULL AUTO_INCREMENT,
  `id_metodo_riego` int(11) DEFAULT NULL,
  `id_produccion_vegetal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_metodo_riego`),
  KEY `fk_id_metodo_riego` (`id_metodo_riego`),
  KEY `fk_id_produccion_vegetal002` (`id_produccion_vegetal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tespecie_ave`
--

CREATE TABLE IF NOT EXISTS `tespecie_ave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testado`
--

CREATE TABLE IF NOT EXISTS `testado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `testado`
--

INSERT INTO `testado` (`id`, `nombre`, `estatus`) VALUES
(1, 'PORTUGUESA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfuente_agua`
--

CREATE TABLE IF NOT EXISTS `tfuente_agua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tgrupo_rubro`
--

CREATE TABLE IF NOT EXISTS `tgrupo_rubro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmaquinaria_implemento`
--

CREATE TABLE IF NOT EXISTS `tmaquinaria_implemento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT '1',
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmetodo_riego`
--

CREATE TABLE IF NOT EXISTS `tmetodo_riego` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo`
--

CREATE TABLE IF NOT EXISTS `tmodulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url_modulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tmodulo`
--

INSERT INTO `tmodulo` (`id_modulo`, `nombre`, `estatus`, `posicion`, `icono`, `url_modulo`) VALUES
(6, 'CONFIGURACION', 1, 1, NULL, NULL),
(7, 'SEGURIDAD', 1, 5, '', ''),
(8, 'LOCALIZACION', 0, 2, '', ''),
(9, 'MAESTROS', 0, 3, '', ''),
(10, 'TRANSACCION', 0, 5, '', ''),
(11, 'INSPECCION', 0, 6, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmunicipio`
--

CREATE TABLE IF NOT EXISTS `tmunicipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_idestado` (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tmunicipio`
--

INSERT INTO `tmunicipio` (`id`, `nombre`, `id_estado`, `estatus`) VALUES
(1, 'ARAURE', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tparroquia`
--

CREATE TABLE IF NOT EXISTS `tparroquia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_idmunicipio` (`id_municipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tparroquia`
--

INSERT INTO `tparroquia` (`id`, `nombre`, `id_municipio`, `estatus`) VALUES
(1, 'ARAURE', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_apicola`
--

CREATE TABLE IF NOT EXISTS `tproduccion_apicola` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad_produccion` int(11) NOT NULL,
  `tipo_colmena` int(1) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `produccion_mensual` int(11) NOT NULL,
  `id_unidad_mendida` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_id_unidad_produccion009` (`id_unidad_produccion`),
  KEY `fk_id_rubro009` (`id_rubro`),
  KEY `fk_id_unidad_medida002` (`id_unidad_mendida`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_avicola`
--

CREATE TABLE IF NOT EXISTS `tproduccion_avicola` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad_produccion` int(11) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `id_especie_ave` int(11) NOT NULL,
  `total_aves_produccion` int(11) NOT NULL,
  `produccion_mensual` int(11) NOT NULL,
  `produccion_diaria` int(11) NOT NULL,
  `id_unidad_medida` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_id_unidad_produccion003` (`id_unidad_produccion`),
  KEY `fk_id_rubro003` (`id_rubro`),
  KEY `fk_id_especie_ave` (`id_especie_ave`),
  KEY `fk_id_unidad_medida` (`id_unidad_medida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_pecuaria`
--

CREATE TABLE IF NOT EXISTS `tproduccion_pecuaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad_produccion` int(11) NOT NULL,
  `id_sistema_produccion` int(11) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `nc_machos` int(11) NOT NULL,
  `nc_hermbras` int(11) NOT NULL,
  `tipo_ordeneo` int(1) NOT NULL DEFAULT '1',
  `mod_ordeneo` int(1) NOT NULL DEFAULT '1',
  `cant_animal_en_ordeneo` int(11) NOT NULL,
  `cant_leche_alddia` int(11) NOT NULL,
  `nc_beneficio` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_unidad_produccion01` (`id_unidad_produccion`),
  KEY `fk_id_sistema_produccion` (`id_sistema_produccion`),
  KEY `fk_id_rubro001` (`id_rubro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_pesquera_aquicola`
--

CREATE TABLE IF NOT EXISTS `tproduccion_pesquera_aquicola` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad_produccion` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `aqla_ciclodevida` varchar(60) NOT NULL,
  `aqla_densidad` int(11) NOT NULL,
  `aqla_tipocultivosegundensidad` text NOT NULL,
  `aqla_produccionengordeprociclo` int(11) NOT NULL,
  `aqla_produccionsemillamensual` int(11) NOT NULL,
  `aqla_tiposistemacultivo` text NOT NULL,
  `aqla_profundida` int(11) NOT NULL,
  `aqla_ancho` int(11) NOT NULL,
  `aqla_largo` int(11) NOT NULL,
  `aqla_volumen` int(11) NOT NULL,
  `pqro_comunidad` varchar(60) NOT NULL,
  `id_tipo_pesca` int(11) NOT NULL,
  `tiposdeartedepescar` text NOT NULL,
  `longituddeuab` int(11) NOT NULL,
  `produccionanual` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_id_unidad_produccion005` (`id_unidad_produccion`),
  KEY `fk_id_rubro` (`id_rubro`),
  KEY `fk_id_tipo_pesca` (`id_tipo_pesca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_porcino_cunicula`
--

CREATE TABLE IF NOT EXISTS `tproduccion_porcino_cunicula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad_produccion` int(11) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT '1',
  `id_rubro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_id_unidad_produccion007` (`id_unidad_produccion`),
  KEY `fk_id_rubro007` (`id_rubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_vegetal`
--

CREATE TABLE IF NOT EXISTS `tproduccion_vegetal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad_produccion` int(11) NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  `ano` char(4) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `superifice_de_cosecha` int(11) NOT NULL,
  `rendimiento` int(11) NOT NULL,
  `produccion` int(11) NOT NULL,
  `riego` int(1) NOT NULL DEFAULT '1',
  `superficiebajoriego` int(11) NOT NULL,
  `superficieregada` int(11) NOT NULL,
  `tipoambiente` int(1) NOT NULL DEFAULT '1',
  `id_tipo_superficie` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_id_unidad_produccion002` (`id_unidad_produccion`),
  KEY `fk_id_ciclo001` (`id_ciclo`),
  KEY `fk_id_rubro_002` (`id_rubro`),
  KEY `fk_id_tipo_superficie` (`id_tipo_superficie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproductor`
--

CREATE TABLE IF NOT EXISTS `tproductor` (
  `ced_rif` varchar(15) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT '1',
  `nom_rso` varchar(60) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `id_asociacion` int(11) NOT NULL,
  `estatus` int(11) DEFAULT '1',
  PRIMARY KEY (`ced_rif`),
  UNIQUE KEY `ced_rif` (`ced_rif`),
  KEY `fk_id_asociacion` (`id_asociacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprogramacion_inspeccion`
--

CREATE TABLE IF NOT EXISTS `tprogramacion_inspeccion` (
  `nro_informe_inspeccion` int(11) NOT NULL AUTO_INCREMENT,
  `idtsolicitud_certificacion_renovacion` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `estatus` char(1) NOT NULL,
  PRIMARY KEY (`nro_informe_inspeccion`),
  KEY `fk_id_usuario003` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol`
--

CREATE TABLE IF NOT EXISTS `trol` (
  `codigo` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `trol`
--

INSERT INTO `trol` (`codigo`, `nombre`, `estatus`) VALUES
(3, 'ADMINISTRADOR', '1'),
(4, 'TECNICO', ''),
(5, 'ANALISTA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol_servicio`
--

CREATE TABLE IF NOT EXISTS `trol_servicio` (
  `id_rol_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `estatus` int(1) NOT NULL,
  PRIMARY KEY (`id_rol_servicio`),
  KEY `id_rol` (`id_rol`),
  KEY `id_servicio` (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=103 ;

--
-- Volcado de datos para la tabla `trol_servicio`
--

INSERT INTO `trol_servicio` (`id_rol_servicio`, `id_rol`, `id_servicio`, `estatus`) VALUES
(77, 3, 1, 0),
(78, 3, 9, 0),
(79, 3, 23, 0),
(80, 3, 5, 0),
(81, 3, 24, 0),
(82, 3, 3, 0),
(83, 3, 4, 0),
(84, 3, 2, 0),
(85, 3, 10, 0),
(86, 3, 6, 0),
(87, 3, 7, 0),
(88, 3, 11, 0),
(89, 3, 12, 0),
(90, 3, 8, 0),
(91, 3, 13, 0),
(92, 3, 14, 0),
(93, 3, 15, 0),
(94, 3, 16, 0),
(95, 3, 17, 0),
(96, 3, 18, 0),
(97, 3, 19, 0),
(98, 3, 20, 0),
(99, 3, 21, 0),
(100, 3, 22, 0),
(101, 4, 25, 0),
(102, 5, 26, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trubro`
--

CREATE TABLE IF NOT EXISTS `trubro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `id_grupo_rubro` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_grupo_rubro` (`id_grupo_rubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsector`
--

CREATE TABLE IF NOT EXISTS `tsector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `id_parroquia` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_parroquia` (`id_parroquia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tsector`
--

INSERT INTO `tsector` (`id`, `nombre`, `id_parroquia`, `estatus`) VALUES
(1, 'BARAURE', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tservicio`
--

CREATE TABLE IF NOT EXISTS `tservicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `id_modulo` (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `tservicio`
--

INSERT INTO `tservicio` (`id_servicio`, `id_modulo`, `nombre`, `url`, `estatus`, `posicion`, `icono`) VALUES
(1, 6, 'MODULO', 'vistaTmodulo.php', 1, 1, NULL),
(2, 6, 'SERVICIO', 'vistaTservicio.php', 1, 2, NULL),
(3, 7, 'ROL', 'vistaTrol.php', 1, 1, NULL),
(4, 7, 'USUARIO', 'vistaTusuario.php', 1, 2, NULL),
(5, 8, 'ESTADO', 'vistaTestado.php', 0, 1, ''),
(6, 8, 'MUNICIPIO', 'vistaTmunicipio.php', 0, 2, ''),
(7, 8, 'PARROQUIA', 'vistaTparroquia.php', 0, 3, ''),
(8, 8, 'SECTOR', 'vistaTsector.php', 0, 4, ''),
(9, 9, 'ASOCIACION', 'vistaTasociacion.php', 0, 1, ''),
(10, 9, 'CICLO', 'vistaTciclo.php', 0, 2, ''),
(11, 9, 'ESPECIE DE AVE', 'vistaTespecie_ave.php', 0, 3, ''),
(12, 9, 'FUENTE DE AGUA', 'vistaTfuente_agua.php', 0, 4, ''),
(13, 9, 'GRUPO DE RUBRO', 'vistaTgrupo_rubro.php', 0, 5, ''),
(14, 9, 'MAQUINARIA E IMPLEMENTO', 'vistaTmaquinaria_implemento.php', 0, 6, ''),
(15, 9, 'MÃ‰TODO DE RIEGO', 'vistaTmetodo_riego.php', 0, 7, ''),
(16, 9, 'PRODUCTOR', 'vistaTproductor.php', 0, 8, ''),
(17, 9, 'RUBRO', 'vistaTrubro.php', 0, 9, ''),
(18, 9, 'SISTEMA DE PRODUCCIÃ“N ', 'vistaTsistema_produccion.php', 0, 10, ''),
(19, 9, 'TIPO DE PESCA', 'vistaTtipo_pesca.php', 0, 11, ''),
(20, 9, 'TIPO DE SUPERFICIE', 'vistaTtipo_superficie.php', 0, 12, ''),
(21, 9, 'UNIDAD DE MEDIDA', 'vistaTunidad_medida.php', 0, 13, ''),
(22, 9, 'UNIDAD DE PRODUCCIÃ“N', 'vistaTunidad_produccion.php', 0, 14, ''),
(23, 10, 'SOLICITUD', 'vistatsolicitud.php', 0, 1, ''),
(24, 11, 'PROGRAMACIÓN DE INSPECCIÓN', 'vistatprogramacion_inspeccion.php', 0, 1, ''),
(25, 11, 'INSPECCION TECNICA', 'vistaTinspeccion_tecnica.php', 0, 2, ''),
(26, 11, 'ANÁLISIS DE INSPECCIÓN', 'vistaTanalisis_inspeccion.php', 0, 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsistema_produccion`
--

CREATE TABLE IF NOT EXISTS `tsistema_produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsolicitud_certificado_renovacion`
--

CREATE TABLE IF NOT EXISTS `tsolicitud_certificado_renovacion` (
  `idtsolicitud_certificacion_renovacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_recepcion` date NOT NULL,
  `cedula_rif_productor` varchar(15) NOT NULL,
  `id_unidad_produccion` int(11) NOT NULL,
  `documentos` char(100) NOT NULL,
  `funcionario_receptor` int(11) NOT NULL,
  `oficina_area` varchar(100) NOT NULL,
  `num_certificado_runnopa` char(50) NOT NULL,
  `num_registro_productor` char(50) NOT NULL,
  `tipo_tramite` char(1) NOT NULL,
  `estatus_solicitud` int(1) NOT NULL,
  PRIMARY KEY (`idtsolicitud_certificacion_renovacion`),
  KEY `fk_cedula_productor` (`cedula_rif_productor`),
  KEY `fk_id_unidad_produccion008` (`id_unidad_produccion`),
  KEY `fk_funcionario_receptor_id` (`funcionario_receptor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_pesca`
--

CREATE TABLE IF NOT EXISTS `ttipo_pesca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_superficie`
--

CREATE TABLE IF NOT EXISTS `ttipo_superficie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunidad_medida`
--

CREATE TABLE IF NOT EXISTS `tunidad_medida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `siglas` varchar(10) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunidad_produccion`
--

CREATE TABLE IF NOT EXISTS `tunidad_produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ced_rif_productor` varchar(15) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `utm_norte` int(11) NOT NULL,
  `utm_este` int(11) NOT NULL,
  `superficie_total` int(11) NOT NULL,
  `superficie_aprovechable` int(11) NOT NULL,
  `superficie_aprovechada` int(11) NOT NULL,
  `croquisimg` varchar(50) NOT NULL,
  `tap` int(1) NOT NULL DEFAULT '1',
  `tap_potreros` int(11) NOT NULL,
  `tap_cant_potreros` int(11) NOT NULL,
  `tap_tipo_cerca` int(1) NOT NULL DEFAULT '1',
  `tap_carga_animal_an_ha` int(11) NOT NULL,
  `tap_tipo_pasto` int(1) NOT NULL DEFAULT '1',
  `tap_especie_pasto` varchar(30) NOT NULL,
  `tap_superficie` int(11) NOT NULL,
  `tap_ultimo_mantenimiento` date NOT NULL,
  `tap_fertilizacion` int(1) NOT NULL DEFAULT '1',
  `maquinariajs` text NOT NULL,
  `implementojs` text NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_ced_productor` (`ced_rif_productor`),
  KEY `fk_id_sector` (`id_sector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `nombre_usu` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `clave` char(41) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '0',
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  `nombre_completo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_usuario`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`nombre_usu`, `clave`, `tipo`, `pregunta`, `respuesta`, `intentos`, `estatus`, `nombre_completo`, `correo`, `id_usuario`) VALUES
('wmcarlos', 'carlos19455541', 3, 'NOMBRE DE MI PRIMERA MASCOTA', 'MANCHITA', 0, '1', 'CARLOS VARGAS', 'LIBROSDELPROGRAMADOR@GMAIL.COM', 1),
('ALBERTDESINGER', 'TICO20467294', 4, 'MAMA', 'LISBETH', 0, '1', 'ALBERTO DANIEL VARGAS TOVAR', 'TICO20BBOY@GMAIL.COM', 2),
('ANALISTA', 'ANALISTA', 5, 'MAMA', 'MAMA', 0, '1', 'ANALISTA DE SISTEMAS', 'ANALISTA@GMAIL.COM', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tanalisis_inspeccion`
--
ALTER TABLE `tanalisis_inspeccion`
  ADD CONSTRAINT `fk_id_usuario002` FOREIGN KEY (`id_usuario`) REFERENCES `tusuario` (`id_usuario`);

--
-- Filtros para la tabla `tcoordenadas_utm`
--
ALTER TABLE `tcoordenadas_utm`
  ADD CONSTRAINT `fk_id_unidad_produccion006` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tdetalle_fuente_agua`
--
ALTER TABLE `tdetalle_fuente_agua`
  ADD CONSTRAINT `fk_id_produccion_vegetal` FOREIGN KEY (`id_produccion_vegetal`) REFERENCES `tproduccion_vegetal` (`id`),
  ADD CONSTRAINT `fk_id_fuenta_agua` FOREIGN KEY (`id_fuente_agua`) REFERENCES `tfuente_agua` (`id`);

--
-- Filtros para la tabla `tdetalle_implemento_maquinaria`
--
ALTER TABLE `tdetalle_implemento_maquinaria`
  ADD CONSTRAINT `fk_id_unidad_produccion0101` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`),
  ADD CONSTRAINT `fk_id_maquinaria_implemento` FOREIGN KEY (`id_implemento_maquinaria`) REFERENCES `tmaquinaria_implemento` (`id`);

--
-- Filtros para la tabla `tdetalle_metodo_riego`
--
ALTER TABLE `tdetalle_metodo_riego`
  ADD CONSTRAINT `fk_id_produccion_vegetal002` FOREIGN KEY (`id_produccion_vegetal`) REFERENCES `tproduccion_vegetal` (`id`),
  ADD CONSTRAINT `fk_id_metodo_riego` FOREIGN KEY (`id_metodo_riego`) REFERENCES `tmetodo_riego` (`id`);

--
-- Filtros para la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  ADD CONSTRAINT `fk_idestado` FOREIGN KEY (`id_estado`) REFERENCES `testado` (`id`);

--
-- Filtros para la tabla `tparroquia`
--
ALTER TABLE `tparroquia`
  ADD CONSTRAINT `fk_idmunicipio` FOREIGN KEY (`id_municipio`) REFERENCES `tmunicipio` (`id`);

--
-- Filtros para la tabla `tproduccion_apicola`
--
ALTER TABLE `tproduccion_apicola`
  ADD CONSTRAINT `fk_id_unidad_medida002` FOREIGN KEY (`id_unidad_mendida`) REFERENCES `tunidad_medida` (`id`),
  ADD CONSTRAINT `fk_id_rubro009` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_unidad_produccion009` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tproduccion_avicola`
--
ALTER TABLE `tproduccion_avicola`
  ADD CONSTRAINT `fk_id_unidad_medida` FOREIGN KEY (`id_unidad_medida`) REFERENCES `tunidad_medida` (`id`),
  ADD CONSTRAINT `fk_id_especie_ave` FOREIGN KEY (`id_especie_ave`) REFERENCES `tespecie_ave` (`id`),
  ADD CONSTRAINT `fk_id_rubro003` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_unidad_produccion003` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tproduccion_pecuaria`
--
ALTER TABLE `tproduccion_pecuaria`
  ADD CONSTRAINT `fk_id_rubro001` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_sistema_produccion` FOREIGN KEY (`id_sistema_produccion`) REFERENCES `tsistema_produccion` (`id`),
  ADD CONSTRAINT `fk_unidad_produccion01` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tproduccion_pesquera_aquicola`
--
ALTER TABLE `tproduccion_pesquera_aquicola`
  ADD CONSTRAINT `fk_id_tipo_pesca` FOREIGN KEY (`id_tipo_pesca`) REFERENCES `ttipo_pesca` (`id`),
  ADD CONSTRAINT `fk_id_rubro` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_unidad_produccion005` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tproduccion_porcino_cunicula`
--
ALTER TABLE `tproduccion_porcino_cunicula`
  ADD CONSTRAINT `fk_id_rubro007` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_unidad_produccion007` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tproduccion_vegetal`
--
ALTER TABLE `tproduccion_vegetal`
  ADD CONSTRAINT `fk_id_tipo_superficie` FOREIGN KEY (`id_tipo_superficie`) REFERENCES `ttipo_superficie` (`id`),
  ADD CONSTRAINT `fk_id_ciclo001` FOREIGN KEY (`id_ciclo`) REFERENCES `tciclo` (`id`),
  ADD CONSTRAINT `fk_id_rubro_002` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_unidad_produccion002` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tproductor`
--
ALTER TABLE `tproductor`
  ADD CONSTRAINT `fk_id_asociacion` FOREIGN KEY (`id_asociacion`) REFERENCES `tasociacion` (`id`);

--
-- Filtros para la tabla `tprogramacion_inspeccion`
--
ALTER TABLE `tprogramacion_inspeccion`
  ADD CONSTRAINT `fk_id_usuario003` FOREIGN KEY (`id_usuario`) REFERENCES `tusuario` (`id_usuario`);

--
-- Filtros para la tabla `trol_servicio`
--
ALTER TABLE `trol_servicio`
  ADD CONSTRAINT `trol_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `tservicio` (`id_servicio`),
  ADD CONSTRAINT `trol_servicio_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `trol` (`codigo`);

--
-- Filtros para la tabla `trubro`
--
ALTER TABLE `trubro`
  ADD CONSTRAINT `fkidgruporubro` FOREIGN KEY (`id_grupo_rubro`) REFERENCES `tgrupo_rubro` (`id`);

--
-- Filtros para la tabla `tsector`
--
ALTER TABLE `tsector`
  ADD CONSTRAINT `fk_parroquia` FOREIGN KEY (`id_parroquia`) REFERENCES `tparroquia` (`id`);

--
-- Filtros para la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD CONSTRAINT `tservicio_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `tmodulo` (`id_modulo`);

--
-- Filtros para la tabla `tsolicitud_certificado_renovacion`
--
ALTER TABLE `tsolicitud_certificado_renovacion`
  ADD CONSTRAINT `fk_funcionario_receptor_id` FOREIGN KEY (`funcionario_receptor`) REFERENCES `tusuario` (`id_usuario`),
  ADD CONSTRAINT `fk_cedula_productor` FOREIGN KEY (`cedula_rif_productor`) REFERENCES `tproductor` (`ced_rif`),
  ADD CONSTRAINT `fk_id_unidad_produccion008` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tunidad_produccion`
--
ALTER TABLE `tunidad_produccion`
  ADD CONSTRAINT `fk_id_sector` FOREIGN KEY (`id_sector`) REFERENCES `tsector` (`id`),
  ADD CONSTRAINT `fk_ced_productor` FOREIGN KEY (`ced_rif_productor`) REFERENCES `tproductor` (`ced_rif`);

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `tusuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `trol` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
