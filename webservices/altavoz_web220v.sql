-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-03-2014 a las 10:21:02
-- Versión del servidor: 5.5.33
-- Versión de PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `altavoz_web220v`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authentications`
--

CREATE TABLE IF NOT EXISTS `authentications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'refer to users.id',
  `provider` varchar(100) NOT NULL,
  `provider_uid` varchar(255) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` text,
  `display_name` varchar(150) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `profile_url` varchar(300) DEFAULT NULL,
  `website_url` varchar(300) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `photo_url` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Volcado de datos para la tabla `authentications`
--

INSERT INTO `authentications` (`id`, `user_id`, `provider`, `provider_uid`, `email`, `password`, `display_name`, `first_name`, `last_name`, `profile_url`, `website_url`, `created_at`, `photo_url`, `description`) VALUES
(2, 4, 'Instagram', '225648327', '', NULL, 'xinita_cm', '', '', '', '', '0000-00-00 00:00:00', 'http://images.ak.instagram.com/profiles/profile_225648327_75sq_1375754727.jpg', ''),
(10, 12, 'Facebook', '1247600269', 'roggerpesantes@hotmail.com', NULL, 'Rogger Pesantes RomÃ¡n', 'Rogger', 'Pesantes RomÃ¡n', 'https://www.facebook.com/RoggerPesantesRoman', '', '0000-00-00 00:00:00', 'https://graph.facebook.com/1247600269/picture?width=150&height=150', ''),
(15, 17, 'Twitter', '207204333', '', NULL, 'xinita_cm', 'Yuri Elizabeth', '', 'http://twitter.com/xinita_cm', '', '2014-02-28 09:49:19', 'http://pbs.twimg.com/profile_images/378800000606190928/c5b44895834bf3010bc0f139e52c0c1f_normal.jpeg', 'just love â™¡'),
(20, 22, 'Facebook', '1005973391', 'misticalelf9@gmail.com', NULL, 'Hector Alvarado Basantes', 'Hector', 'Alvarado Basantes', 'https://www.facebook.com/hectoritoh', 'this', '2014-03-06 08:46:58', 'https://graph.facebook.com/1005973391/picture?width=150&height=150', 'Si pudiera regresar el tiempo, pudiera quizas hacer las cosas bien, y evitar cometer  muchos errores, mmm pero mejor nah!!      : )'),
(24, 26, 'Facebook', '664315430', 'charymaldonado_a@hotmail.com', NULL, 'Caridad Maldonado', 'Caridad', 'Maldonado', 'https://www.facebook.com/caridadmaldonad.a', '', '2014-03-09 21:45:37', 'https://graph.facebook.com/664315430/picture?width=150&height=150', ''),
(56, 50, 'Facebook', '100000731313583', 'zamechask8@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Jonathan Meza', 'Jonathan', 'Meza', 'https://www.facebook.com/jonatahanmezaflip', '', '2014-03-14 10:53:04', 'https://graph.facebook.com/100000731313583/picture?width=150&height=150', ''),
(58, 52, 'Email', 'elmail@mail.com', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', '2014-03-14 11:52:42', 'assets/img/Icono-Avatar.png', ''),
(59, 53, 'Twitter', '55764330', '', 'd41d8cd98f00b204e9800998ecf8427e', 'fzzio', 'Fabricio Orrala P.', '', 'http://twitter.com/fzzio', 'http://t.co/Ybn8Knuqm6', '2014-03-14 12:33:24', 'http://pbs.twimg.com/profile_images/433847734055878656/B8BN52Qp_normal.jpeg', 'Peninsular, #BSC, Desarrollador Multimedia. Parte de @kokoaespol. GNU/Linux & @openSUSE user. Tengo un sueÃ±o residente en @CajaNegraEC'),
(66, 60, 'Facebook', '1065805166', 'ricardofarfan@gmail.com', '', 'Ricardo FarfÃ¡n', 'Ricardo', 'FarfÃ¡n', 'https://www.facebook.com/ricardo.farfan.58', '', '2014-03-14 13:06:06', ' https://graph.facebook.com/1065805166/picture?width=150&height=150', ''),
(69, 63, 'Facebook', '1209397904', 'di_farfansion@hotmail.com', '', 'Dianita FarfÃ¡n SiÃ³n', 'Dianita', 'FarfÃ¡n SiÃ³n', 'https://www.facebook.com/dianita.farfansion', '', '2014-03-14 13:14:55', ' https://graph.facebook.com/1209397904/picture?width=150&height=150', 'Follow: @DianaFS_MAKEUP'),
(70, 64, 'Facebook', '662437538', 'alvarogomezc91@gmail.com', '', 'Alvaro Gomez', 'Alvaro', 'Gomez', 'https://www.facebook.com/alvarogomezc', '', '2014-03-14 13:27:12', ' https://graph.facebook.com/662437538/picture?width=150&height=150', ''),
(71, 65, 'Email', 'nuevomail@mail.com', '', '6cf82ee1020caef069e753c67a97a70d', '', '', '', '', '', '2014-03-14 13:31:09', 'assets/img/Icono-Avatar.png', ''),
(95, 92, 'Email', 'fla@mail.com', '', '6cf82ee1020caef069e753c67a97a70d', '', '', '', '', '', '2014-03-17 04:34:55', 'assets/img/Icono-Avatar.png', ''),
(96, 93, 'Email', 'fla2@mail.com', 'fla2@mail.com', '800e365301349f2b62fc5bcbf6ac2b39', '', '', '', '', '', '2014-03-17 05:04:54', 'assets/img/Icono-Avatar.png', ''),
(97, 94, 'Email', 'elmail2@mail.com', 'elmail2@mail.com', '285774b24334c3c3935a3a11a864c615', '', '', '', '', '', '2014-03-17 05:21:43', 'assets/img/Icono-Avatar.png', ''),
(98, 95, 'Email', 'roggerpesantes@hotmail.com', 'roggerpesantes@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', '', '2014-03-18 11:50:10', 'assets/img/Icono-Avatar.png', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(1) NOT NULL,
  `usuario_activo` int(11) NOT NULL,
  `fecha_activacion` datetime NOT NULL,
  `valor_codigo` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `estado`, `usuario_activo`, `fecha_activacion`, `valor_codigo`) VALUES
(1, 1, 2, '2014-02-14 12:00:00', '125AB'),
(2, 1, 2, '0000-00-00 00:00:00', '1235AB'),
(4, 1, 2, '0000-00-00 00:00:00', '123AB'),
(5, 1, 2, '0000-00-00 00:00:00', '124AB'),
(6, 1, 2, '0000-00-00 00:00:00', '123BC'),
(7, 1, 2, '0000-00-00 00:00:00', '124BC'),
(8, 1, 2, '0000-00-00 00:00:00', '123AZ'),
(9, 1, 2, '0000-00-00 00:00:00', '123AM'),
(10, 1, 2, '0000-00-00 00:00:00', '123AN'),
(11, 1, 2, '0000-00-00 00:00:00', '123AV'),
(12, 1, 4, '0000-00-00 00:00:00', '123AX'),
(13, 1, 4, '0000-00-00 00:00:00', '123AC'),
(14, 1, 4, '0000-00-00 00:00:00', '123AC'),
(15, 1, 4, '0000-00-00 00:00:00', '123AC'),
(16, 1, 4, '0000-00-00 00:00:00', '123AC'),
(17, 1, 4, '0000-00-00 00:00:00', '123YC'),
(18, 1, 12, '0000-00-00 00:00:00', '123YC'),
(19, 1, 4, '0000-00-00 00:00:00', '123VC'),
(20, 1, 4, '0000-00-00 00:00:00', '123ML'),
(21, 1, 4, '0000-00-00 00:00:00', '123BV'),
(22, 1, 16, '0000-00-00 00:00:00', '123FO'),
(23, 1, 22, '0000-00-00 00:00:00', '123HL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE IF NOT EXISTS `codigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `codigos`
--

INSERT INTO `codigos` (`id`, `codigo`, `estado`) VALUES
(1, '125AB', 2),
(2, '123AB', 2),
(3, '124AB', 2),
(4, '1235AB', 2),
(5, '123BC', 2),
(6, '124BC', 2),
(7, '123AZ', 2),
(8, '123AX', 2),
(9, '123AC', 2),
(10, '123AV', 2),
(11, '123AN', 2),
(12, '123AM', 2),
(13, '123YC', 2),
(14, '123VC', 2),
(15, '123ML', 2),
(16, '123BV', 2),
(17, '123FO', 2),
(18, '123HL', 2),
(19, '123HA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_parametro` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `valor_parametro` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre_parametro`, `valor_parametro`, `fecha_ingreso`) VALUES
(1, 'valor_codigo', 10, '2014-02-21 00:00:00'),
(2, 'medalla_oro', 400, '2014-02-21 00:00:00'),
(3, 'medalla_plata', 300, '2014-02-21 00:00:00'),
(4, 'medalla_bronce', 200, '2014-02-21 00:00:00'),
(5, 'medalla_cobre', 160, '2014-02-21 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `hora` time NOT NULL,
  `lugar` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fondo` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `nombre`, `fecha`, `hora`, `lugar`, `fondo`) VALUES
(1, '220V Energy', '2014-02-20 07:30:00', '07:30:00', 'Centro de Convenciones', 'c2fee-toyocosta_temporada2014_homeweb_vf2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medalla`
--

CREATE TABLE IF NOT EXISTS `medalla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `voltios` int(11) NOT NULL,
  `imagen` text COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `medalla`
--

INSERT INTO `medalla` (`id`, `nombre`, `voltios`, `imagen`, `estado`) VALUES
(1, 'Oro', 400, '0e0c4-oro.png', 1),
(2, 'Plata', 300, '7cf40-plata.png', 1),
(3, 'Cobre', 200, '25265-cobre.png', 1),
(4, 'Bronce', 100, '10475-bronce.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premio`
--

CREATE TABLE IF NOT EXISTS `premio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `imagen` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `imagengrande` text NOT NULL,
  `estado` int(1) NOT NULL,
  `voltios` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `premio`
--

INSERT INTO `premio` (`id`, `nombre`, `imagen`, `imagengrande`, `estado`, `voltios`) VALUES
(1, 'Botellas', '34247-1-botella.png', '1140d-4-g-botellas.jpg', 1, 220),
(2, 'Patines', '51ac8-2-patineta.png', 'b02ee-1-g-patines.jpg', 1, 800),
(3, 'Bicicleta', '31fb8-3-bici.png', 'b18b9-5-g-bici.jpg', 1, 1200),
(4, 'Motocicleta', '43427-4-moto.png', '226a8-2-g-moto.jpg', 1, 1500),
(5, 'Carro', '9c7f4-5-carro.png', '87a1b-1-g-carro.jpg', 1, 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_voltio`
--

CREATE TABLE IF NOT EXISTS `registro_voltio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `codigo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `securityuser`
--

CREATE TABLE IF NOT EXISTS `securityuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `password_anterior` varchar(150) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `securityuser`
--

INSERT INTO `securityuser` (`id`, `usuario`, `password`, `password_anterior`, `nombre`, `correo`, `fecha_creacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'admin', 'admin', NULL, 'Administrador', 'admin@admin.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cedula` int(10) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `celular` varchar(50) NOT NULL,
  `genero` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `ciudad` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `voltios` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `cedula`, `email`, `celular`, `genero`, `ciudad`, `voltios`) VALUES
(4, 'Yuri Cosquillo', 924578781, 'yc@selnet.com.ec', '939693533', 'femenino', 'gye', 20),
(6, 'Jonathan Meza', 925692006, 'zamechask8@hotmail.com', '980017376', 'male', 'quito', 0),
(12, 'Rogger Pesantes RomÃ¡n', 1234567891, 'roggerpesantes@hotmail.com', '0997194951', 'male', 'GYE', 90),
(16, 'Fabricio Orrala Parrales', 999999999, 'fabricio_fdop_007@hotmail.com', '0888888888', 'male', 'Guayaquil', 230),
(17, 'Eliza Cosquillo', 921478855, 'yc@selnet.com.ec', '0939693533', 'femenino', 'gye', 0),
(18, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0666666666', 'male', 'Guayaquil', 0),
(19, 'Henry Lomas Ascencio', 666666666, 'khenryscorpio@hotmail.com', '0222222222', 'male', 'Guayaquil', 0),
(20, 'fzzio', 999999999, 'fo@selnet.com.ec', '0888888888', 'Masculino', 'Gye', 0),
(21, 'Fabricio Orrala Parrales', 777777777, 'fo@selnet.com.ec', '0888888888', 'Masculino', 'Guayaquil', 0),
(22, 'Hector Alvarado Basantes', 926178385, 'misticalelf9@gmail.com', '0992264273', 'male', 'Guayaquil', 10),
(23, 'Hectoritoh', 926178956, 'halvarad@fiec.espol.edu.ec', '0997255748', 'masculino', 'Guayaquil', 0),
(24, 'Fabricio Orrala', 888888888, 'fabricio_fdop_007@hotmail.com', '0777777777', 'Masculino', 'Guayaquil', 0),
(25, 'fzzio', 999999999, 'fo@selnet.com.ec', '0888888888', 'Masculino', 'Guayaquil', 0),
(26, 'Caridad Maldonado', 919188748, 'charymaldonado_a@hotmail.com', '0991163041', 'female', 'guayaquil', 0),
(27, 'Carlos JordÃ¡n', 926516550, 'calujord@gmail.com', '0981080182', 'male', 'guayaquil', 0),
(28, 'Ricardo FarfÃ¡n', 999999999, 'ricardofarfan@gmail.com', '0888888888', 'male', 'gye', 0),
(29, 'sdffsf', 888888888, 'fo@selnet.com.ec', '0777777777', 'Masculino', 'Guayaquil', 0),
(30, '32323', 188888888, 'esd@mail.com', '0666666666', 'Masculino', 'Guayaquil', 0),
(31, 'fzzio', 888888888, 'fo@se.com', '0888888887', 'Masculino', 'Guayaquil', 0),
(32, 'fzzio', 888888888, 'm@n.com', '0777777777', 'Masculino', 'Guayaquil', 0),
(33, 'fzzio', 777777777, 'm@lala.com', '0999999999', 'Masculino', 'Guayaquil', 0),
(34, 'fzzio', 777777777, 'fo@celm.com', '0888888888', 'Masculino', 'GYE', 0),
(35, 'fzzio', 333333333, 'faa@mail.com', '0111111111', 'Masculino', 'Guayaquil', 0),
(36, 'fzzio', 111111111, 'f@mail.com', '1022222222', 'Masculino', 'Guayaquil', 0),
(37, 'sasasdasdasd', 777777777, 'f@mail.com', '0222222222', 'Masculino', 'Gye', 0),
(38, 'LL', 1234567890, 'f@mail.com', '1234567876', 'Masculino', 'Guayaquil', 0),
(39, 'sefsef', 111111111, 'mai@a.com', '0111111111', 'Masculino', 'Guayaq', 0),
(40, 'asdasd', 222222222, '2323@mail.com', '5555555555', 'Masculino', 'Gye', 0),
(41, 'fzzio', 999999999, 'mail@mail.com', '1234567777', 'Masculino', 'guayaquil', 0),
(42, 'fzzio', 777777777, 'fo@m.com', '0444444444', 'Masculino', 'GYE', 0),
(43, 'fzzio', 999999999, 'f@mail.com', '0444444444', 'Masculino', 'Gye', 0),
(44, 'fzzio', 666666666, 'f@mail.com', '0444444444', 'masculino', 'Gye', 0),
(45, 'fzzio', 1111111111, 'f@mail.com', '2222222222', 'Masculino', 'Gye', 0),
(46, 'q', 1111111111, 'f@mail.com', '1222222222', 'Male', 'gye', 0),
(47, '1', 1111111111, '12222222222222222@mail.com', '2222222222', 'masculino', 'guayaquil', 0),
(48, 'fzzio', 888888888, 'fo@celm.com', '1111111111', 'Masculino', 'GYE', 0),
(49, 'fzzio', 999999999, 'f2@ce.com', '0444444444', 'Masculino', 'Gye', 0),
(50, 'Jonathan Meza', 2147483647, 'zamechask8@hotmail.com', '0988888888', 'male', 'Quito', 0),
(51, 'fzzio orrala', 777777777, 'f@mail.com', '0444444444', 'male', 'Guaayq', 0),
(52, 'Nombre Prueba', 988888888, 'elmail@mail.com', '0444444444', 'Masculino', 'Guayaquil', 0),
(53, 'Nombre Twitter', 333333333, 'fo@mail.com', '0444444444', 'Male', 'Guayaquil', 0),
(54, 'Henry Lomas Ascencio', 999999999, 'khenryscorpio@hotmail.com', '3333333333', 'male', 'admin', 0),
(55, 'Henry Lomas Ascencio', 2147483647, 'khenryscorpio@hotmail.com', '3333333333', 'male', 'gye', 0),
(56, 'Henry Lomas Ascencio', 2147483647, 'khenryscorpio@hotmail.com', '3333333333', 'male', 'gye', 0),
(57, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0000000001', 'male', 'GUAYAQ', 0),
(58, 'Henry Lomas Ascencio', 2147483647, 'khenryscorpio@hotmail.com', '1111111111', 'male', 'gYE', 0),
(59, 'Fabricio D. Orrala Parrales', 777777777, 'fabricio_fdop_007@hotmail.com', '0444444444', 'male', 'gye', 0),
(60, 'Ricardo FarfÃ¡n', 2147483647, 'ricardofarfan@gmail.com', '5436456464', 'male', 'dsfsfsfsfsfsfsfsfsfsffsfsfsfsffsffs', 0),
(61, 'Henry Lomas Ascencio', 999999999, 'khenryscorpio@hotmail.com', '0955555555', 'male', 'gye', 0),
(62, 'Henry Lomas Ascencio', 2147483647, 'khenryscorpio@hotmail.com', '1111111111', 'male', 'gye', 0),
(63, 'Dianita FarfÃ¡n SiÃ³n', 9999999, 'di_farfansion@hotmail.com', '0888888888', 'female', 'gye', 0),
(64, 'Alvaro Gomez', 911231231, 'alvarogomezc91@gmail.com', '0983316694', 'male', 'Guayaquil', 0),
(65, 'Fabricio registro', 444444444, 'nuevomail@mail.com', '0222222222', 'Masculino', 'Guayaquil', 0),
(66, 'Henry Lomas Ascencio', 888888888, 'khenryscorpio@hotmail.com', '0777777777', 'male', 'gye', 0),
(67, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0444444444', 'male', '0111', 0),
(68, 'Henry Lomas Ascencio', 444444444, 'khenryscorpio@hotmail.com', '0999999999', 'male', '033333333333333333', 0),
(69, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0444444444', 'male', 'gye', 0),
(70, 'Henry Lomas Ascencio', 922222222, 'khenryscorpio@hotmail.com', '0444444444', 'male', 'gye', 0),
(71, 'Henry Lomas Ascencio', 1111111111, 'khenryscorpio@hotmail.com', '1111111111', 'male', 'gue', 0),
(72, 'Henry Lomas Ascencio', 444444444, 'khenryscorpio@hotmail.com', '0666666666', 'male', 'gye', 0),
(73, 'Henry Lomas Ascencio', 2147483647, 'khenryscorpio@hotmail.com', '3333333333', 'male', 'gy', 0),
(74, 'Henry Lomas Ascencio', 444444444, 'khenryscorpio@hotmail.com', '6666666666', 'male', 'gye', 0),
(75, 'Henry Lomas Ascencio', 444444444, 'khenryscorpio@hotmail.com', '0008888888', 'male', 'gye', 0),
(76, 'Henry Lomas Ascencio', 555555555, 'khenryscorpio@hotmail.com', '5555555555', 'male', '8888888888888888', 0),
(77, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0333333333', 'male', 'Gye', 0),
(78, 'Henry Lomas Ascencio', 555555555, 'khenryscorpio@hotmail.com', '0333333333', 'male', 'Gye', 0),
(79, 'Henry Lomas Ascencio', 444444444, 'khenryscorpio@hotmail.com', '0333333333', 'male', 'Gye', 0),
(80, 'Henry Lomas Ascencio', 444444444, 'khenryscorpio@hotmail.com', '0333333333', 'male', 'Gye', 0),
(81, 'Henry Lomas Ascencio', 444444444, 'khenryscorpio@hotmail.com', '0555555555', 'male', 'Gye', 0),
(82, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0333333333', 'male', 'Gye', 0),
(83, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0333333333', 'male', '55', 0),
(84, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0333333333', 'male', 'Gye', 0),
(85, 'Henry Lomas Ascencio', 777777777, 'khenryscorpio@hotmail.com', '0333333333', 'male', 'Gye', 0),
(86, 'Fabricio D. Orrala Parrales', 999999999, 'fabricio_fdop_007@hotmail.com', '0888888888', 'male', 'Gye', 0),
(87, 'Fabricio D. Orrala Parrales', 999999999, 'fabricio_fdop_007@hotmail.com', '0888888888', 'male', 'Guayaquil', 0),
(88, 'Fabricio D. Orrala Parrales', 777777777, 'fabricio_fdop_007@hotmail.com', '0666666666', 'male', 'Gye', 0),
(89, 'Fabricio D. Orrala Parrales', 999999999, 'fabricio_fdop_007@hotmail.com', '0888888888', 'male', 'Guayaquil', 0),
(90, 'Fabricio D. Orrala Parrales', 999999999, 'fabricio_fdop_007@hotmail.com', '0666666666', 'male', 'Gye', 0),
(91, 'Fabricio D. Orrala Parrales', 999999999, 'fabricio_fdop_007@hotmail.com', '0666666666', 'male', 'Gye', 0),
(92, 'Fabricio', 444444444, 'fla@mail.com', '0777777777', 'Masculino', 'Guayaquil', 0),
(93, 'Fabricio', 999999999, 'fla2@mail.com', '0666666666', 'Masculino', 'Guayaquil', 0),
(94, 'Fabricio', 999999999, 'elmail2@mail.com', '0666666666', 'Masculino', 'Guayaquil', 0),
(95, 'Rogger Pesantes', 916342975, 'roggerpesantes@hotmail.com', '0997194951', 'Masculino', 'Guayaquil', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_medalla`
--

CREATE TABLE IF NOT EXISTS `usuario_medalla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `medalla_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `usuario_medalla`
--

INSERT INTO `usuario_medalla` (`id`, `usuario_id`, `medalla_id`) VALUES
(3, 2, 3),
(7, 12, 1),
(9, 4, 2),
(10, 4, 1),
(11, 4, 2),
(12, 4, 3),
(15, 16, 1),
(16, 16, 2),
(17, 16, 3),
(18, 16, 4),
(19, 22, 1),
(20, 22, 2),
(21, 22, 3),
(22, 22, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_premio`
--

CREATE TABLE IF NOT EXISTS `usuario_premio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `premio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
