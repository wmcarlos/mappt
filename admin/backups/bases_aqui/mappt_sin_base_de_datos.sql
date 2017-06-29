-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2017 a las 20:42:57
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mappt`
--

-- --------------------------------------------------------

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
(1, 'GANADEROS', 1),
(2, 'ALGODONEROS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tciclo`
--

CREATE TABLE `tciclo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tciclo`
--

INSERT INTO `tciclo` (`id`, `nombre`, `estatus`) VALUES
(1, 'CORTO O TEMPORAL', 1);

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
-- Estructura de tabla para la tabla `tdetalle_fuente_agua`
--

CREATE TABLE `tdetalle_fuente_agua` (
  `id_detalle_fuente_auga` int(11) NOT NULL,
  `id_fuente_agua` int(11) DEFAULT NULL,
  `id_produccion_vegetal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_implemento_maquinaria`
--

CREATE TABLE `tdetalle_implemento_maquinaria` (
  `id_detalle_implemento_maquinaria` int(11) NOT NULL,
  `id_implemento_maquinaria` int(11) DEFAULT NULL,
  `id_unidad_produccion` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_metodo_riego`
--

CREATE TABLE `tdetalle_metodo_riego` (
  `id_detalle_metodo_riego` int(11) NOT NULL,
  `id_metodo_riego` int(11) DEFAULT NULL,
  `id_produccion_vegetal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdocumento`
--

CREATE TABLE `tdocumento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `obligatorio` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tdocumento`
--

INSERT INTO `tdocumento` (`id`, `nombre`, `obligatorio`, `estatus`) VALUES
(1, 'NOTA DE INSCRIPCION DE REGISTRO UNICO NACIONAL OBLIGATORIO DE PRODUCTORES Y PRODUCTORAS AGRICOLAS (RUNOPPA) DEL SOLICITANTE', 1, 1),
(2, 'FOTOCOPIA DE LA CEDULA DE IDENTIDAD DEL SOLICITANTE', 1, 1),
(3, 'FOTOCOPIA DEL REGISTRO DE INFORMACION FISCAL (RIF) DEL SOLICITANTE', 1, 1),
(4, 'DOCUMENTOS QUE ACREDITEN ADJUDICACION O GARANTIA DE PERMANENCIA DE TIERRAS, EMITIDO POR EL INSTITUTO NACIONAL DE TIERRA (INTI)', 1, 1),
(5, 'PLANOS DE LA UNIDAD DE PRODUCCION EMITIDOS POR EL INSTITUTO NACIONAL DE TIERRAS (INTI) CON COORDENADAS UTM', 1, 1),
(6, 'CONSTANCIA DE OCUPACION DE UNIDAD DE PRODUCCION. EMITIDAS POR EL CONSEJO COMUNAL CORRESPONDIENTE A LA UBICACION POLITICA TERRITORIAL', 1, 1),
(7, '(SI POSEE)- FOTOCOPIA DE CERTIFICADO DE REGISTRO NACIONAL DE PRODUCTORES, ASOCIACIONES, EMPRESAS DE SERVICIOS, COOPERATIVAS Y ORGANIZACIONES, ASOCIACIONES ECONOMICAS DE PRODUCTORAS AGRICOLAS', 1, 1),
(8, 'CARPETA MARRON CON GANCHOS - TAMANO OFICIO', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tespecie_ave`
--

CREATE TABLE `tespecie_ave` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tespecie_ave`
--

INSERT INTO `tespecie_ave` (`id`, `nombre`, `estatus`) VALUES
(1, 'GALLINAS', 1),
(2, 'PAVO REAL', 1);

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

--
-- Volcado de datos para la tabla `tfuente_agua`
--

INSERT INTO `tfuente_agua` (`id`, `nombre`, `estatus`) VALUES
(1, 'POZO', 1),
(2, 'RIO O QUEBRADA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tgrupo_rubro`
--

CREATE TABLE `tgrupo_rubro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tgrupo_rubro`
--

INSERT INTO `tgrupo_rubro` (`id`, `nombre`, `estatus`) VALUES
(1, 'VEGETAL', 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmetodo_riego`
--

CREATE TABLE `tmetodo_riego` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmetodo_riego`
--

INSERT INTO `tmetodo_riego` (`id`, `nombre`, `estatus`) VALUES
(1, 'BOMBEO MECANICO', 1);

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
(1, 'ARAURE', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `toficina`
--

CREATE TABLE `toficina` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `toficina`
--

INSERT INTO `toficina` (`id`, `nombre`, `estatus`) VALUES
(1, 'OFICINA PRINCIPAL', 1),
(2, 'OFICINA SECUNDARIA', 1);

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
(1, 'ARAURE', 1, 1);

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
  `id_unidad_medida` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tproduccion_avicola`
--

INSERT INTO `tproduccion_avicola` (`id`, `id_unidad_produccion`, `id_rubro`, `id_especie_ave`, `total_aves_produccion`, `produccion_mensual`, `id_unidad_medida`, `estatus`) VALUES
(1, 5, 1, 1, 22, 22, 2, 1);

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

--
-- Volcado de datos para la tabla `tproduccion_pecuaria`
--

INSERT INTO `tproduccion_pecuaria` (`id`, `id_unidad_produccion`, `id_sistema_produccion`, `id_rubro`, `nc_machos`, `nc_hermbras`, `tipo_ordeneo`, `mod_ordeneo`, `cant_animal_en_ordeneo`, `cant_leche_alddia`, `nc_beneficio`, `estatus`) VALUES
(3, 5, 2, 1, 22, 22, 1, 1, 22, 22, 22, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproduccion_pesquera_aquicola`
--

CREATE TABLE `tproduccion_pesquera_aquicola` (
  `id` int(11) NOT NULL,
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

--
-- Volcado de datos para la tabla `tproduccion_porcino_cunicula`
--

INSERT INTO `tproduccion_porcino_cunicula` (`id`, `id_unidad_produccion`, `tipo`, `id_rubro`, `cantidad`, `estatus`) VALUES
(2, 5, 1, 1, 22, 1);

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
  `id_fuente_agua` int(11) NOT NULL,
  `id_metodo_riego` int(11) NOT NULL,
  `superficiebajoriego` int(11) NOT NULL,
  `superficieregada` int(11) NOT NULL,
  `tipoambiente` int(1) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tproduccion_vegetal`
--

INSERT INTO `tproduccion_vegetal` (`id`, `id_unidad_produccion`, `id_ciclo`, `ano`, `id_rubro`, `superficie`, `superifice_de_cosecha`, `rendimiento`, `produccion`, `id_fuente_agua`, `id_metodo_riego`, `superficiebajoriego`, `superficieregada`, `tipoambiente`, `fecha`, `estatus`) VALUES
(5, 5, 1, '2222', 1, 222, 22, 22, 22, 1, 1, 22, 22, 1, '2017-06-27 19:13:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproductor`
--

CREATE TABLE `tproductor` (
  `ced_rif` varchar(15) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT '1',
  `nom_rso` varchar(60) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `id_asociacion` int(11) NOT NULL,
  `estatus` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tproductor`
--

INSERT INTO `tproductor` (`ced_rif`, `tipo`, `nom_rso`, `id_sector`, `direccion`, `telefono`, `correo`, `id_asociacion`, `estatus`) VALUES
('19455541', 2, 'JUAN JOSE', 1, 'EFEFEF', '000000', 'JUAN_JOSE@HOTMAIL.COM', 2, 1),
('19902881', 1, 'MARIA VERGARA', 1, 'BARRIO LA BATALLA', '00000000000', 'MARIAVERGARA@HOTMAIL.COM', 2, 1),
('20467294', 1, 'ROGER VALERO', 1, 'URB SAN JOSE 2', '00000000000', 'REOGERVALERO@HOTMAIL.COM', 2, 1);

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
(4, 'TECNICO', ''),
(5, 'COORDINADOR', ''),
(6, 'OPERADOR', ''),
(7, 'ANALISTA', '');

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
(105, 4, 28, 0),
(106, 3, 3, 0),
(107, 3, 9, 0),
(108, 3, 1, 0),
(109, 3, 23, 0),
(110, 3, 5, 0),
(111, 3, 6, 0),
(112, 3, 4, 0),
(113, 3, 10, 0),
(114, 3, 2, 0),
(115, 3, 11, 0),
(116, 3, 7, 0),
(117, 3, 8, 0),
(118, 3, 12, 0),
(119, 3, 13, 0),
(120, 3, 14, 0),
(121, 3, 15, 0),
(122, 3, 16, 0),
(123, 3, 17, 0),
(124, 3, 18, 0),
(125, 3, 19, 0),
(126, 3, 20, 0),
(127, 3, 21, 0),
(128, 3, 22, 0),
(129, 5, 27, 0),
(130, 6, 23, 0),
(131, 6, 16, 0),
(132, 6, 22, 0),
(133, 7, 29, 0);

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

--
-- Volcado de datos para la tabla `trubro`
--

INSERT INTO `trubro` (`id`, `nombre`, `id_grupo_rubro`, `estatus`) VALUES
(1, 'HORTALIZAS', 1, 1);

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
(1, 'BARAURE', 1, 1);

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
(23, 10, 'SOLICITUD', 'vistatsolicitud.php', 0, 1, ''),
(27, 10, 'ASIGNAR VISITA', 'vistaTasignacion.php', 0, 2, ''),
(28, 10, 'APLICAR VISITA', 'vistaTaplicarvisita.php', 0, 3, ''),
(29, 10, 'ANALISTA', 'vistaTlistaanalisis.php', 0, 7, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsistema_produccion`
--

CREATE TABLE `tsistema_produccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tsistema_produccion`
--

INSERT INTO `tsistema_produccion` (`id`, `nombre`, `estatus`) VALUES
(1, 'LECHE', 1),
(2, 'CARNE', 1),
(3, 'DOBLE PROPOSITO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsolicitud`
--

CREATE TABLE `tsolicitud` (
  `nro_solicitud` int(11) NOT NULL,
  `fecha_recepcion` date NOT NULL,
  `cedula_rif_productor` varchar(15) NOT NULL,
  `id_funcionario_receptor` int(11) NOT NULL,
  `tipo_tramite` int(11) NOT NULL,
  `estatus_solicitud` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsolicitud_detalle_documento`
--

CREATE TABLE `tsolicitud_detalle_documento` (
  `id` int(11) NOT NULL,
  `nro_solicitud` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsolicitud_detalle_unidad_produccion`
--

CREATE TABLE `tsolicitud_detalle_unidad_produccion` (
  `id` int(11) NOT NULL,
  `nro_solicitud` int(11) NOT NULL,
  `id_unidad_produccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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

--
-- Volcado de datos para la tabla `tunidad_medida`
--

INSERT INTO `tunidad_medida` (`id`, `nombre`, `siglas`, `estatus`) VALUES
(1, 'LITRO', 'LTS', 1),
(2, 'KILO', 'KL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunidad_produccion`
--

CREATE TABLE `tunidad_produccion` (
  `id` int(11) NOT NULL,
  `ced_rif_productor` varchar(15) DEFAULT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `utm_norte` int(11) NOT NULL,
  `utm_este` int(11) NOT NULL,
  `superficie_total` int(11) NOT NULL,
  `superficie_aprovechable` int(11) NOT NULL,
  `superficie_aprovechada` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tunidad_produccion`
--

INSERT INTO `tunidad_produccion` (`id`, `ced_rif_productor`, `nombre`, `id_sector`, `direccion`, `utm_norte`, `utm_este`, `superficie_total`, `superficie_aprovechable`, `superficie_aprovechada`, `estatus`) VALUES
(1, '20467294', 'LOS MALAVARES', 1, 'URB PRADOS DEL SOL', 125, 458, 12325, 12545, 21254, 1),
(2, '20467294', 'ALGARABAN', 1, 'LOS PALMARES', 456, 456, 4566, 456, 4656, 1),
(3, '19902881', 'NAPOLES', 1, 'NAPOLES', 254, 1245, 1500, 1200, 1100, 1),
(5, NULL, 'TYTY', 1, 'YHYY', 1, 1, 1, 1, 1, 1);

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
  `id_usuario` int(11) NOT NULL,
  `id_oficina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`nombre_usu`, `clave`, `tipo`, `pregunta`, `respuesta`, `intentos`, `estatus`, `nombre_completo`, `correo`, `id_usuario`, `id_oficina`) VALUES
('WMCARLOS', 'CARLOS19455541', 3, 'NOMBRE DE MI PRIMERA MASCOTA', 'MANCHITA', 0, '1', 'ADMINISTRADOR', 'ADMINISTRADOR@EMPRESA.COM', 1, 1),
('COORDINADOR1', '12345', 5, 'COLOR', 'AZUL', 0, '1', 'COORDINADOR 1', 'COORDINADOR1@GMAIL.COM', 3, 1),
('TECNICO1', '12345', 4, 'COLOR', 'VERDE', 0, '1', 'TECNICO 1', 'TECNICO1@GMAIL.COM', 4, 1),
('TECNICO2', '12345', 4, 'COLOR', 'ROSA', 0, '1', 'TECNICO 2', 'TECNICO2@GMAIL.COM', 5, 1),
('OPERADOR1', '12345', 6, 'COLOR', 'NEGRO', 0, '1', 'OPERADOR 1', 'OPERADOR@GMAIL.COM', 6, 1),
('ANALISTA1', '12345', 7, 'COLOR', 'BLANCO', 0, '1', 'ANALISTA 1', 'ANALISTA@GMAIL.COM', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tvisita`
--

CREATE TABLE `tvisita` (
  `id` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_solicitud`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_solicitud` (
`nro_solicitud` int(11)
,`cedula` varchar(15)
,`productor` varchar(60)
,`sector` varchar(60)
,`parroquia` varchar(60)
,`municipio` varchar(60)
,`estado` varchar(60)
,`unidad_produccion` varchar(60)
,`fecha_recepcion` date
,`estatus` varchar(11)
,`id_visita` bigint(11)
,`id_tecnico` bigint(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_solicitud`
--
DROP TABLE IF EXISTS `v_solicitud`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_solicitud`  AS  select `ts`.`nro_solicitud` AS `nro_solicitud`,`tp`.`ced_rif` AS `cedula`,`tp`.`nom_rso` AS `productor`,`tsec`.`nombre` AS `sector`,`tparr`.`nombre` AS `parroquia`,`tmun`.`nombre` AS `municipio`,`test`.`nombre` AS `estado`,`tup`.`nombre` AS `unidad_produccion`,`ts`.`fecha_recepcion` AS `fecha_recepcion`,(case when (coalesce(`tv`.`estatus`,0) = 0) then 'Sin Asignar' when (coalesce(`tv`.`estatus`,0) = 1) then 'Asignada' when (coalesce(`tv`.`estatus`,0) = 2) then 'Realizada' when (coalesce(`tv`.`estatus`,0) = 3) then 'Aprobada' end) AS `estatus`,coalesce(`tv`.`id`,0) AS `id_visita`,coalesce(`tv`.`id_tecnico`,0) AS `id_tecnico` from (((((((((`tsolicitud` `ts` join `tsolicitud_detalle_unidad_produccion` `tsdup` on((`tsdup`.`nro_solicitud` = `ts`.`nro_solicitud`))) join `tunidad_produccion` `tup` on((`tup`.`id` = `tsdup`.`id_unidad_produccion`))) join `tsector` `tsec` on((`tsec`.`id` = `tup`.`id_sector`))) join `tparroquia` `tparr` on((`tparr`.`id` = `tsec`.`id_parroquia`))) join `tmunicipio` `tmun` on((`tmun`.`id` = `tparr`.`id_municipio`))) join `testado` `test` on((`test`.`id` = `tmun`.`id_estado`))) join `tusuario` `tu` on((`tu`.`id_usuario` = `ts`.`id_funcionario_receptor`))) join `tproductor` `tp` on((`tp`.`ced_rif` = `ts`.`cedula_rif_productor`))) left join `tvisita` `tv` on((`tv`.`id_solicitud` = `ts`.`nro_solicitud`))) order by `ts`.`fecha_recepcion` desc ;

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
-- Indices de la tabla `tcoordenadas_utm`
--
ALTER TABLE `tcoordenadas_utm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_unidad_produccion006` (`id_unidad_produccion`);

--
-- Indices de la tabla `tdetalle_fuente_agua`
--
ALTER TABLE `tdetalle_fuente_agua`
  ADD PRIMARY KEY (`id_detalle_fuente_auga`),
  ADD KEY `fk_id_fuenta_agua` (`id_fuente_agua`),
  ADD KEY `fk_id_produccion_vegetal` (`id_produccion_vegetal`);

--
-- Indices de la tabla `tdetalle_implemento_maquinaria`
--
ALTER TABLE `tdetalle_implemento_maquinaria`
  ADD PRIMARY KEY (`id_detalle_implemento_maquinaria`),
  ADD KEY `fk_id_maquinaria_implemento` (`id_implemento_maquinaria`),
  ADD KEY `fk_id_unidad_produccion0101` (`id_unidad_produccion`);

--
-- Indices de la tabla `tdetalle_metodo_riego`
--
ALTER TABLE `tdetalle_metodo_riego`
  ADD PRIMARY KEY (`id_detalle_metodo_riego`),
  ADD KEY `fk_id_metodo_riego` (`id_metodo_riego`),
  ADD KEY `fk_id_produccion_vegetal002` (`id_produccion_vegetal`);

--
-- Indices de la tabla `tdocumento`
--
ALTER TABLE `tdocumento`
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
-- Indices de la tabla `toficina`
--
ALTER TABLE `toficina`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_unidad_produccion009` (`id_unidad_produccion`),
  ADD KEY `fk_id_rubro009` (`id_rubro`),
  ADD KEY `fk_id_unidad_medida002` (`id_unidad_mendida`);

--
-- Indices de la tabla `tproduccion_avicola`
--
ALTER TABLE `tproduccion_avicola`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_unidad_produccion003` (`id_unidad_produccion`),
  ADD KEY `fk_id_rubro003` (`id_rubro`),
  ADD KEY `fk_id_especie_ave` (`id_especie_ave`),
  ADD KEY `fk_id_unidad_medida` (`id_unidad_medida`);

--
-- Indices de la tabla `tproduccion_pecuaria`
--
ALTER TABLE `tproduccion_pecuaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_unidad_produccion01` (`id_unidad_produccion`),
  ADD KEY `fk_id_sistema_produccion` (`id_sistema_produccion`),
  ADD KEY `fk_id_rubro001` (`id_rubro`);

--
-- Indices de la tabla `tproduccion_pesquera_aquicola`
--
ALTER TABLE `tproduccion_pesquera_aquicola`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_unidad_produccion005` (`id_unidad_produccion`),
  ADD KEY `fk_id_rubro` (`id_rubro`),
  ADD KEY `fk_id_tipo_pesca` (`id_tipo_pesca`);

--
-- Indices de la tabla `tproduccion_porcino_cunicula`
--
ALTER TABLE `tproduccion_porcino_cunicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_unidad_produccion007` (`id_unidad_produccion`),
  ADD KEY `fk_id_rubro007` (`id_rubro`);

--
-- Indices de la tabla `tproduccion_vegetal`
--
ALTER TABLE `tproduccion_vegetal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_metodo_riego` (`id_metodo_riego`),
  ADD KEY `fk_id_unidad_produccion002` (`id_unidad_produccion`),
  ADD KEY `fk_id_ciclo001` (`id_ciclo`),
  ADD KEY `fk_id_rubro_002` (`id_rubro`),
  ADD KEY `id_fuente_agua` (`id_fuente_agua`);

--
-- Indices de la tabla `tproductor`
--
ALTER TABLE `tproductor`
  ADD PRIMARY KEY (`ced_rif`),
  ADD UNIQUE KEY `ced_rif` (`ced_rif`),
  ADD KEY `fk_id_asociacion` (`id_asociacion`);

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
-- Indices de la tabla `tsolicitud`
--
ALTER TABLE `tsolicitud`
  ADD PRIMARY KEY (`nro_solicitud`),
  ADD KEY `fk_cedula_productor` (`cedula_rif_productor`),
  ADD KEY `fk_funcionario_receptor_id` (`id_funcionario_receptor`);

--
-- Indices de la tabla `tsolicitud_detalle_documento`
--
ALTER TABLE `tsolicitud_detalle_documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_solicitud` (`nro_solicitud`),
  ADD KEY `id_documento` (`id_documento`);

--
-- Indices de la tabla `tsolicitud_detalle_unidad_produccion`
--
ALTER TABLE `tsolicitud_detalle_unidad_produccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_solicitud` (`nro_solicitud`),
  ADD KEY `id_unidad_produccion` (`id_unidad_produccion`);

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
  ADD KEY `fk_ced_productor` (`ced_rif_productor`),
  ADD KEY `fk_id_sector` (`id_sector`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `tvisita`
--
ALTER TABLE `tvisita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasociacion`
--
ALTER TABLE `tasociacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tciclo`
--
ALTER TABLE `tciclo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tcoordenadas_utm`
--
ALTER TABLE `tcoordenadas_utm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdetalle_fuente_agua`
--
ALTER TABLE `tdetalle_fuente_agua`
  MODIFY `id_detalle_fuente_auga` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdetalle_implemento_maquinaria`
--
ALTER TABLE `tdetalle_implemento_maquinaria`
  MODIFY `id_detalle_implemento_maquinaria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdetalle_metodo_riego`
--
ALTER TABLE `tdetalle_metodo_riego`
  MODIFY `id_detalle_metodo_riego` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdocumento`
--
ALTER TABLE `tdocumento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tespecie_ave`
--
ALTER TABLE `tespecie_ave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `testado`
--
ALTER TABLE `testado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tfuente_agua`
--
ALTER TABLE `tfuente_agua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tgrupo_rubro`
--
ALTER TABLE `tgrupo_rubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tmaquinaria_implemento`
--
ALTER TABLE `tmaquinaria_implemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmetodo_riego`
--
ALTER TABLE `tmetodo_riego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tmodulo`
--
ALTER TABLE `tmodulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `toficina`
--
ALTER TABLE `toficina`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tproduccion_pecuaria`
--
ALTER TABLE `tproduccion_pecuaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tproduccion_pesquera_aquicola`
--
ALTER TABLE `tproduccion_pesquera_aquicola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tproduccion_porcino_cunicula`
--
ALTER TABLE `tproduccion_porcino_cunicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tproduccion_vegetal`
--
ALTER TABLE `tproduccion_vegetal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `trol`
--
ALTER TABLE `trol`
  MODIFY `codigo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `trol_servicio`
--
ALTER TABLE `trol_servicio`
  MODIFY `id_rol_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT de la tabla `trubro`
--
ALTER TABLE `trubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tsector`
--
ALTER TABLE `tsector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tservicio`
--
ALTER TABLE `tservicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `tsistema_produccion`
--
ALTER TABLE `tsistema_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tsolicitud_detalle_documento`
--
ALTER TABLE `tsolicitud_detalle_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de la tabla `tsolicitud_detalle_unidad_produccion`
--
ALTER TABLE `tsolicitud_detalle_unidad_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tunidad_produccion`
--
ALTER TABLE `tunidad_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tvisita`
--
ALTER TABLE `tvisita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tcoordenadas_utm`
--
ALTER TABLE `tcoordenadas_utm`
  ADD CONSTRAINT `fk_id_unidad_produccion006` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tdetalle_fuente_agua`
--
ALTER TABLE `tdetalle_fuente_agua`
  ADD CONSTRAINT `fk_id_fuenta_agua` FOREIGN KEY (`id_fuente_agua`) REFERENCES `tfuente_agua` (`id`),
  ADD CONSTRAINT `fk_id_produccion_vegetal` FOREIGN KEY (`id_produccion_vegetal`) REFERENCES `tproduccion_vegetal` (`id`);

--
-- Filtros para la tabla `tdetalle_implemento_maquinaria`
--
ALTER TABLE `tdetalle_implemento_maquinaria`
  ADD CONSTRAINT `fk_id_maquinaria_implemento` FOREIGN KEY (`id_implemento_maquinaria`) REFERENCES `tmaquinaria_implemento` (`id`),
  ADD CONSTRAINT `fk_id_unidad_produccion0101` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tdetalle_metodo_riego`
--
ALTER TABLE `tdetalle_metodo_riego`
  ADD CONSTRAINT `fk_id_metodo_riego` FOREIGN KEY (`id_metodo_riego`) REFERENCES `tmetodo_riego` (`id`),
  ADD CONSTRAINT `fk_id_produccion_vegetal002` FOREIGN KEY (`id_produccion_vegetal`) REFERENCES `tproduccion_vegetal` (`id`);

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
  ADD CONSTRAINT `fk_id_rubro009` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_unidad_medida002` FOREIGN KEY (`id_unidad_mendida`) REFERENCES `tunidad_medida` (`id`),
  ADD CONSTRAINT `fk_id_unidad_produccion009` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tproduccion_avicola`
--
ALTER TABLE `tproduccion_avicola`
  ADD CONSTRAINT `fk_id_especie_ave` FOREIGN KEY (`id_especie_ave`) REFERENCES `tespecie_ave` (`id`),
  ADD CONSTRAINT `fk_id_rubro003` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_unidad_medida` FOREIGN KEY (`id_unidad_medida`) REFERENCES `tunidad_medida` (`id`),
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
  ADD CONSTRAINT `fk_id_rubro` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_tipo_pesca` FOREIGN KEY (`id_tipo_pesca`) REFERENCES `ttipo_pesca` (`id`),
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
  ADD CONSTRAINT `fk_id_ciclo001` FOREIGN KEY (`id_ciclo`) REFERENCES `tciclo` (`id`),
  ADD CONSTRAINT `fk_id_rubro_002` FOREIGN KEY (`id_rubro`) REFERENCES `trubro` (`id`),
  ADD CONSTRAINT `fk_id_unidad_produccion002` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`);

--
-- Filtros para la tabla `tproductor`
--
ALTER TABLE `tproductor`
  ADD CONSTRAINT `fk_id_asociacion` FOREIGN KEY (`id_asociacion`) REFERENCES `tasociacion` (`id`);

--
-- Filtros para la tabla `trol_servicio`
--
ALTER TABLE `trol_servicio`
  ADD CONSTRAINT `trol_servicio_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `trol` (`codigo`),
  ADD CONSTRAINT `trol_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `tservicio` (`id_servicio`);

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
-- Filtros para la tabla `tsolicitud`
--
ALTER TABLE `tsolicitud`
  ADD CONSTRAINT `fk_cedula_productor` FOREIGN KEY (`cedula_rif_productor`) REFERENCES `tproductor` (`ced_rif`);

--
-- Filtros para la tabla `tsolicitud_detalle_documento`
--
ALTER TABLE `tsolicitud_detalle_documento`
  ADD CONSTRAINT `tsolicitud_detalle_documento_ibfk_1` FOREIGN KEY (`nro_solicitud`) REFERENCES `tsolicitud` (`nro_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tsolicitud_detalle_documento_ibfk_2` FOREIGN KEY (`id_documento`) REFERENCES `tdocumento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tsolicitud_detalle_unidad_produccion`
--
ALTER TABLE `tsolicitud_detalle_unidad_produccion`
  ADD CONSTRAINT `tsolicitud_detalle_unidad_produccion_ibfk_1` FOREIGN KEY (`nro_solicitud`) REFERENCES `tsolicitud` (`nro_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tsolicitud_detalle_unidad_produccion_ibfk_2` FOREIGN KEY (`id_unidad_produccion`) REFERENCES `tunidad_produccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tunidad_produccion`
--
ALTER TABLE `tunidad_produccion`
  ADD CONSTRAINT `fk_id_sector` FOREIGN KEY (`id_sector`) REFERENCES `tsector` (`id`);

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `tusuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `trol` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
