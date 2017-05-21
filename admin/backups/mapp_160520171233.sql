-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2017 a las 07:02:19
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mappt`
--
CREATE DATABASE IF NOT EXISTS `mappt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mappt`;

--
-- Estructura de tabla para la tabla `tasociacion`
--
CREATE TABLE `tasociacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasociacion`
--

INSERT INTO `tasociacion` (`id`, `nombre`, `estatus`) VALUES
(1, 'ASOCIACIONUNO', 1),
(2, 'SILOS ANCA', 1),
(3, 'COPOSA', 1),
(4, 'IANCARINA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tciclo`
--

CREATE TABLE `tciclo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcoordenadas_utm`
--

CREATE TABLE `tcoordenadas_utm` (
  `id` int(11) NOT NULL,
  `id_unidad_produccion` int(11) NOT NULL,
  `norte` int(11) NOT NULL,
  `este` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tespecie_ave`
--

CREATE TABLE `tespecie_ave` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testado`
--

CREATE TABLE `testado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `testado`
--

INSERT INTO `testado` (`id`, `nombre`, `estatus`) VALUES
(1, 'PORTUGUESA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfuente_agua`
--

CREATE TABLE `tfuente_agua` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tgrupo_rubro`
--

CREATE TABLE `tgrupo_rubro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmaquinaria_implemento`
--

CREATE TABLE `tmaquinaria_implemento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT '1',
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmaquinaria_implemento`
--

INSERT INTO `tmaquinaria_implemento` (`id`, `nombre`, `tipo`, `estatus`) VALUES
(1, 'VNPROPLUSION', 1, 1),
(2, 'MAQUINARIDOS', 1, 1),
(3, 'IMPLEMENTOUNO', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmetodo_riego`
--

CREATE TABLE `tmetodo_riego` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo`
--

CREATE TABLE `tmodulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url_modulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tmodulo`
--

INSERT INTO `tmodulo` (`id_modulo`, `nombre`, `estatus`, `posicion`, `icono`, `url_modulo`) VALUES
(6, 'CONFIGURACION', 1, 1, NULL, NULL),
(7, 'SEGURIDAD', 1, 5, '', ''),
(8, 'LOCALIZACION', 0, 2, '', ''),
(9, 'MAESTROS', 0, 3, '', ''),
(10, 'TRANSACCION', 0, 5, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmunicipio`
--

CREATE TABLE `tmunicipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmunicipio`
--

INSERT INTO `tmunicipio` (`id`, `nombre`, `id_estado`, `estatus`) VALUES
(1, 'ARAURE', 1, 1),
(2, 'PAEZ', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tparroquia`
--

CREATE TABLE `tparroquia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tparroquia`
--

INSERT INTO `tparroquia` (`id`, `nombre`, `id_municipio`, `estatus`) VALUES
(1, 'RIO ACARIGUA', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_apicola`
--

CREATE TABLE `tproduccion_apicola` (
  `id` int(11) NOT NULL,
  `id_unidad_produccion` int(11) NOT NULL,
  `tipo_colmena` int(1) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `produccion_mensual` int(11) NOT NULL,
  `id_unidad_mendida` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_avicola`
--

CREATE TABLE `tproduccion_avicola` (
  `id` int(11) NOT NULL,
  `id_unidad_produccion` int(11) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `id_especie_ave` int(11) NOT NULL,
  `total_aves_produccion` int(11) NOT NULL,
  `produccion_mensual` int(11) NOT NULL,
  `produccion_diaria` int(11) NOT NULL,
  `id_unidad_medida` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_pecuaria`
--

CREATE TABLE `tproduccion_pecuaria` (
  `id` int(11) NOT NULL,
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
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_pesquera_aquicola`
--

CREATE TABLE `tproduccion_pesquera_aquicola` (
  `id` int(11) NOT NULL,
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
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_porcino_cunicula`
--

CREATE TABLE `tproduccion_porcino_cunicula` (
  `id` int(11) NOT NULL,
  `id_unidad_produccion` int(11) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT '1',
  `id_rubro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_vegetal`
--

CREATE TABLE `tproduccion_vegetal` (
  `id` int(11) NOT NULL,
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
  `fuente_agua_js` text NOT NULL,
  `metodo_riego_js` text NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproductor`
--

CREATE TABLE `tproductor` (
  `id` int(11) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT '1',
  `ced_rif` varchar(15) NOT NULL,
  `nom_rso` varchar(60) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `asociacionesjs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tproductor`
--

INSERT INTO `tproductor` (`id`, `tipo`, `ced_rif`, `nom_rso`, `id_sector`, `direccion`, `telefono`, `correo`, `asociacionesjs`) VALUES
(1, 1, '20467294', 'ALBERTO VARGAS', 1, 'SAN JOSE 2 AV3 CASA 80', '02556217144', 'TICO20BBOY@GMAIL.COM', '1,2,4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol`
--

CREATE TABLE `trol` (
  `codigo` int(1) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trol`
--

INSERT INTO `trol` (`codigo`, `nombre`, `estatus`) VALUES
(3, 'ADMINISTRADOR', '1'),
(4, 'TECNICO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol_servicio`
--

CREATE TABLE `trol_servicio` (
  `id_rol_servicio` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trol_servicio`
--

INSERT INTO `trol_servicio` (`id_rol_servicio`, `id_rol`, `id_servicio`, `estatus`) VALUES
(54, 3, 3, 0),
(55, 3, 9, 0),
(56, 3, 1, 0),
(57, 3, 23, 0),
(58, 3, 5, 0),
(59, 3, 6, 0),
(60, 3, 4, 0),
(61, 3, 10, 0),
(62, 3, 2, 0),
(63, 3, 11, 0),
(64, 3, 7, 0),
(65, 3, 8, 0),
(66, 3, 12, 0),
(67, 3, 13, 0),
(68, 3, 14, 0),
(69, 3, 15, 0),
(70, 3, 16, 0),
(71, 3, 17, 0),
(72, 3, 18, 0),
(73, 3, 19, 0),
(74, 3, 20, 0),
(75, 3, 21, 0),
(76, 3, 22, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trubro`
--

CREATE TABLE `trubro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `id_grupo_rubro` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsector`
--

CREATE TABLE `tsector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_parroquia` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tsector`
--

INSERT INTO `tsector` (`id`, `nombre`, `id_parroquia`, `estatus`) VALUES
(1, 'LOS ANGELES', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tservicio`
--

CREATE TABLE `tservicio` (
  `id_servicio` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(23, 10, 'SOLICITUD', 'vistatsolicitud.php', 0, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsistema_produccion`
--

CREATE TABLE `tsistema_produccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsolicitud_certificado_renovacion`
--

CREATE TABLE `tsolicitud_certificado_renovacion` (
  `idtsolicitud_certificacion_renovacion` int(11) NOT NULL,
  `fecha_recepcion` date NOT NULL,
  `cedula_rif_productor` varchar(15) NOT NULL,
  `id_unidad_produccion` int(11) NOT NULL,
  `documentos` char(100) NOT NULL,
  `funcionario_receptor` char(25) NOT NULL,
  `oficina_area` varchar(100) NOT NULL,
  `num_certificado_runnopa` char(50) NOT NULL,
  `num_registro_productor` char(50) NOT NULL,
  `tipo_tramite` char(1) NOT NULL,
  `estatus_solicitud` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_pesca`
--

CREATE TABLE `ttipo_pesca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_superficie`
--

CREATE TABLE `ttipo_superficie` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunidad_medida`
--

CREATE TABLE `tunidad_medida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `siglas` varchar(10) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunidad_produccion`
--

CREATE TABLE `tunidad_produccion` (
  `id` int(11) NOT NULL,
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
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tunidad_produccion`
--

INSERT INTO `tunidad_produccion` (`id`, `ced_rif_productor`, `nombre`, `id_sector`, `direccion`, `utm_norte`, `utm_este`, `superficie_total`, `superficie_aprovechable`, `superficie_aprovechada`, `croquisimg`, `tap`, `tap_potreros`, `tap_cant_potreros`, `tap_tipo_cerca`, `tap_carga_animal_an_ha`, `tap_tipo_pasto`, `tap_especie_pasto`, `tap_superficie`, `tap_ultimo_mantenimiento`, `tap_fertilizacion`, `maquinariajs`, `implementojs`, `estatus`) VALUES
(2, '20467294', 'PRADO LOS ANGELES', 1, 'SAN LOS ANGELES', 500, 5000, 25000, 20000, 5000, 'CROQUIS', 1, 1, 5, 1, 120, 1, 'PASTICHO', 5000, '2017-05-16', 1, '2', '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `nombre_usu` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `clave` char(41) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '0',
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  `nombre_completo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`nombre_usu`, `clave`, `tipo`, `pregunta`, `respuesta`, `intentos`, `estatus`, `nombre_completo`, `correo`, `id_usuario`) VALUES
('wmcarlos', 'carlos19455541', 3, 'NOMBRE DE MI PRIMERA MASCOTA', 'MANCHITA', 0, '1', 'CARLOS VARGAS', 'LIBROSDELPROGRAMADOR@GMAIL.COM', 1),
('ALBERTDESINGER', 'TICO20467294', 4, 'MAMA', 'LISBETH', 0, '1', 'ALBERTO DANIEL VARGAS TOVAR', 'TICO20BBOY@GMAIL.COM', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tasociacion`
--
ALTER TABLE `tasociacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tciclo`
--
ALTER TABLE `tciclo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tespecie_ave`
--
ALTER TABLE `tespecie_ave`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testado`
--
ALTER TABLE `testado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tfuente_agua`
--
ALTER TABLE `tfuente_agua`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tgrupo_rubro`
--
ALTER TABLE `tgrupo_rubro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tmaquinaria_implemento`
--
ALTER TABLE `tmaquinaria_implemento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tmetodo_riego`
--
ALTER TABLE `tmetodo_riego`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tmodulo`
--
ALTER TABLE `tmodulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idestado` (`id_estado`);

--
-- Indices de la tabla `tparroquia`
--
ALTER TABLE `tparroquia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idmunicipio` (`id_municipio`);

--
-- Indices de la tabla `tproduccion_apicola`
--
ALTER TABLE `tproduccion_apicola`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tproduccion_avicola`
--
ALTER TABLE `tproduccion_avicola`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tproduccion_pecuaria`
--
ALTER TABLE `tproduccion_pecuaria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tproduccion_pesquera_aquicola`
--
ALTER TABLE `tproduccion_pesquera_aquicola`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tproduccion_porcino_cunicula`
--
ALTER TABLE `tproduccion_porcino_cunicula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tproduccion_vegetal`
--
ALTER TABLE `tproduccion_vegetal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tproductor`
--
ALTER TABLE `tproductor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ced_rif` (`ced_rif`);

--
-- Indices de la tabla `trol`
--
ALTER TABLE `trol`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `trol_servicio`
--
ALTER TABLE `trol_servicio`
  ADD PRIMARY KEY (`id_rol_servicio`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `trubro`
--
ALTER TABLE `trubro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo_rubro` (`id_grupo_rubro`);

--
-- Indices de la tabla `tsector`
--
ALTER TABLE `tsector`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_parroquia` (`id_parroquia`);

--
-- Indices de la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `tsistema_produccion`
--
ALTER TABLE `tsistema_produccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tsolicitud_certificado_renovacion`
--
ALTER TABLE `tsolicitud_certificado_renovacion`
  ADD PRIMARY KEY (`idtsolicitud_certificacion_renovacion`);

--
-- Indices de la tabla `ttipo_pesca`
--
ALTER TABLE `ttipo_pesca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ttipo_superficie`
--
ALTER TABLE `ttipo_superficie`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tunidad_medida`
--
ALTER TABLE `tunidad_medida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tunidad_produccion`
--
ALTER TABLE `tunidad_produccion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ced_rif_productor` (`ced_rif_productor`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasociacion`
--
ALTER TABLE `tasociacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tciclo`
--
ALTER TABLE `tciclo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tespecie_ave`
--
ALTER TABLE `tespecie_ave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `testado`
--
ALTER TABLE `testado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tfuente_agua`
--
ALTER TABLE `tfuente_agua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tgrupo_rubro`
--
ALTER TABLE `tgrupo_rubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmaquinaria_implemento`
--
ALTER TABLE `tmaquinaria_implemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tmetodo_riego`
--
ALTER TABLE `tmetodo_riego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmodulo`
--
ALTER TABLE `tmodulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tparroquia`
--
ALTER TABLE `tparroquia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tproduccion_apicola`
--
ALTER TABLE `tproduccion_apicola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tproduccion_avicola`
--
ALTER TABLE `tproduccion_avicola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tproduccion_pecuaria`
--
ALTER TABLE `tproduccion_pecuaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tproduccion_pesquera_aquicola`
--
ALTER TABLE `tproduccion_pesquera_aquicola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tproduccion_porcino_cunicula`
--
ALTER TABLE `tproduccion_porcino_cunicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tproduccion_vegetal`
--
ALTER TABLE `tproduccion_vegetal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tproductor`
--
ALTER TABLE `tproductor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `trol`
--
ALTER TABLE `trol`
  MODIFY `codigo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `trol_servicio`
--
ALTER TABLE `trol_servicio`
  MODIFY `id_rol_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `trubro`
--
ALTER TABLE `trubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tsector`
--
ALTER TABLE `tsector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tservicio`
--
ALTER TABLE `tservicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `tsistema_produccion`
--
ALTER TABLE `tsistema_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tsolicitud_certificado_renovacion`
--
ALTER TABLE `tsolicitud_certificado_renovacion`
  MODIFY `idtsolicitud_certificacion_renovacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ttipo_pesca`
--
ALTER TABLE `ttipo_pesca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ttipo_superficie`
--
ALTER TABLE `ttipo_superficie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tunidad_medida`
--
ALTER TABLE `tunidad_medida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tunidad_produccion`
--
ALTER TABLE `tunidad_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  ADD CONSTRAINT `fk_idestado` FOREIGN KEY (`id_estado`) REFERENCES `testado` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tparroquia`
--
ALTER TABLE `tparroquia`
  ADD CONSTRAINT `fk_idmunicipio` FOREIGN KEY (`id_municipio`) REFERENCES `tmunicipio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trol_servicio`
--
ALTER TABLE `trol_servicio`
  ADD CONSTRAINT `trol_servicio_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `trol` (`codigo`),
  ADD CONSTRAINT `trol_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `tservicio` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trubro`
--
ALTER TABLE `trubro`
  ADD CONSTRAINT `fkidgruporubro` FOREIGN KEY (`id_grupo_rubro`) REFERENCES `tgrupo_rubro` (`id`);

--
-- Filtros para la tabla `tsector`
--
ALTER TABLE `tsector`
  ADD CONSTRAINT `fk_parroquia` FOREIGN KEY (`id_parroquia`) REFERENCES `tparroquia` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD CONSTRAINT `tservicio_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `tmodulo` (`id_modulo`);

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `tusuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `trol` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
