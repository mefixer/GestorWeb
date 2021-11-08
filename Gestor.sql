-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2021 a las 18:50:44
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Gestor`
--

CREATE TABLE `administrator` (
  `idadministrator` int(11) NOT NULL,
  `idnumber` varchar(10) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrator`
--

INSERT INTO `administrator` (`idadministrator`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(2, '222222222', 'Admin', 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@admin.cl', 4, 3);

-- --------------------------------------------------------


CREATE TABLE `gender` (
  `idgender` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gender`
--

INSERT INTO `gender` (`idgender`, `name`) VALUES
(3, 'Male'),
(4, 'Female');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glosary`
--


CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `role_idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`idlog`, `start`, `end`, `username`, `role_idrole`) VALUES
(1, '2018-07-16 22:56:43', NULL, 'maga', 7),
(2, '2018-07-16 22:56:46', NULL, 'maga', 7),
(3, '2018-07-16 22:56:48', '2018-07-16 22:56:58', 'maga', 7),
(4, '2018-07-16 22:57:29', NULL, 'maga', 7),
(5, '2018-07-16 22:57:31', NULL, 'maga', 7),
(6, '2018-07-16 22:57:33', '2018-07-16 22:58:19', 'maga', 7),
(7, '2018-07-22 19:36:46', NULL, 'maga', 7),
(8, '2018-07-22 19:36:48', '2018-07-22 19:38:08', 'maga', 7),
(9, '2018-07-22 19:39:13', NULL, 'maga', 7),
(10, '2018-07-22 19:39:26', NULL, 'maga', 7),
(11, '2018-07-22 19:39:28', NULL, 'maga', 7),
(12, '2018-07-22 19:39:30', '2018-07-22 19:39:58', 'maga', 7),
(13, '2018-07-25 00:16:05', '2018-07-25 00:16:23', 'lalaoa', 7),
(14, '2018-09-23 16:24:53', '2018-09-23 17:35:20', 'lalaoa', 7),
(15, '2018-09-23 18:28:17', '2018-09-23 19:06:10', 'lalaoa', 7),
(16, '2018-09-23 19:09:20', '2018-09-23 19:09:30', 'lalaoa', 7),
(17, '2018-09-23 19:09:57', '2018-09-23 19:19:42', 'lalaoa', 7),
(18, '2018-09-23 19:21:36', NULL, 'lalaoa', 7),
(19, '2018-09-23 21:37:11', '2018-09-23 21:37:17', 'lalaoa', 7),
(20, '2018-09-23 21:37:50', NULL, 'lalaoa', 7),
(21, '2018-09-24 22:28:33', NULL, 'lalaoa', 7),
(22, '2018-09-26 23:25:02', NULL, 'lalaoa', 7),
(23, '2018-09-26 23:29:05', NULL, 'lalaoa', 7),
(24, '2018-09-27 02:12:41', NULL, 'lalaoa', 7),
(25, '2018-09-29 00:24:24', NULL, 'lalaoa', 7),
(26, '2018-09-29 11:39:21', NULL, 'lalaoa', 7),
(27, '2018-09-29 11:44:04', NULL, 'lalaoa', 7),
(28, '2018-09-29 12:30:36', NULL, 'lalaoa', 7),
(29, '2018-09-29 12:41:26', NULL, 'lalaoa', 7),
(30, '2018-09-30 18:00:50', '2018-09-30 18:23:34', 'lalaoa', 7),
(31, '2018-09-30 18:24:16', NULL, 'lalaoa', 7),
(32, '2018-10-01 00:58:18', NULL, 'lalaoa', 7),
(33, '2018-10-01 01:09:42', NULL, 'lalaoa', 7),
(34, '2018-10-01 01:30:05', NULL, 'lalaoa', 7),
(35, '2018-10-01 02:47:55', NULL, 'lalaoa', 7),
(36, '2018-10-01 03:29:53', NULL, 'lalaoa', 7),
(37, '2018-10-01 22:25:08', NULL, 'lalaoa', 7),
(38, '2018-10-01 22:46:11', '2018-10-01 23:04:36', 'lalaoa', 7),
(39, '2018-10-01 23:07:54', '2018-10-02 01:22:35', 'lalaoa', 7),
(40, '2018-10-02 02:21:52', NULL, 'lalaoa', 7),
(41, '2018-10-03 22:39:26', NULL, 'lalaoa', 7),
(42, '2018-10-03 22:43:20', NULL, 'lalaoa', 7),
(43, '2018-10-04 22:38:14', NULL, 'lalaoa', 7),
(44, '2018-10-11 23:04:53', '2018-10-11 23:05:03', 'lalaoa', 7),
(45, '2018-10-11 23:06:11', '2018-10-11 23:06:39', 'lalaoa', 7),
(46, '2018-10-11 23:08:31', NULL, 'lalaoa', 7),
(47, '2018-10-11 23:28:10', NULL, 'lalaoa', 7),
(48, '2018-10-11 23:30:40', NULL, 'lalaoa', 7),
(49, '2018-10-11 23:33:10', NULL, 'lalaoa', 7),
(50, '2018-10-11 23:34:49', NULL, 'lalaoa', 7),
(51, '2018-10-11 23:39:36', NULL, 'lalaoa', 7),
(52, '2018-10-11 23:40:09', NULL, 'lalaoa', 7),
(53, '2018-10-11 23:41:46', NULL, 'lalaoa', 7),
(54, '2018-10-11 23:43:24', NULL, 'lalaoa', 7),
(55, '2018-10-11 23:47:43', '2018-10-11 23:50:05', 'lalaoa', 7),
(56, '2018-10-16 02:02:46', '2018-10-16 02:02:51', 'gnunez', 6),
(57, '2018-10-21 23:58:29', NULL, 'jrojas', 7),
(58, '2018-10-22 22:30:06', NULL, 'jrojas', 7),
(59, '2018-10-23 23:14:03', NULL, 'jrojas', 7),
(60, '2018-10-23 23:39:13', NULL, 'jrojas', 7),
(61, '2018-10-24 00:06:41', NULL, 'jrojas', 7),
(62, '2018-10-24 00:10:03', NULL, 'jrojas', 7),
(63, '2018-10-24 21:56:31', NULL, 'jrojas', 7),
(64, '2018-10-24 22:06:26', NULL, 'jrojas', 7),
(65, '2018-10-24 22:09:13', NULL, 'jrojas', 7),
(66, '2018-10-25 22:29:43', NULL, 'jrojas', 7),
(67, '2018-10-25 22:46:22', NULL, 'jrojas', 7),
(68, '2018-10-26 00:52:27', NULL, 'jrojas', 7),
(69, '2018-10-26 23:09:48', '2018-10-26 23:33:46', 'jrojas', 7),
(70, '2018-10-26 23:35:53', '2018-10-26 23:36:51', 'bperez', 6),
(71, '2018-10-26 23:42:24', '2018-10-26 23:44:52', 'jrojas', 7),
(72, '2018-10-27 01:18:34', '2018-10-27 01:20:20', 'jrojas', 7),
(73, '2018-10-27 01:20:33', NULL, 'jrojas', 7),
(74, '2018-10-27 10:21:21', '2018-10-27 10:21:38', 'jrojas', 7),
(75, '2018-10-27 10:22:36', '2018-10-27 10:23:17', 'bperez', 6),
(76, '2018-10-27 10:28:32', '2018-10-27 10:31:28', 'jrojas', 7),
(77, '2018-10-27 10:34:59', '2018-10-27 10:36:25', 'jrojas', 7),
(78, '2018-10-27 11:06:25', '2018-10-27 11:12:06', 'jrojas', 7),
(79, '2018-10-27 11:12:24', '2018-10-27 11:12:46', 'jrojas', 7),
(80, '2018-10-27 11:28:02', '2018-10-27 11:28:12', 'bperez', 6),
(81, '2018-10-27 11:28:24', '2018-10-27 11:28:27', 'bperez', 6),
(82, '2018-10-27 11:29:26', '2018-10-27 11:36:29', 'bperez', 6),
(83, '2018-10-27 11:42:52', NULL, 'jrojas', 7),
(84, '2018-11-04 16:34:40', '2018-11-04 16:35:50', 'gnunez', 6),
(85, '2018-11-04 17:36:35', '2018-11-04 17:36:43', 'jrojas', 7),
(86, '2018-11-04 20:03:55', '2018-11-04 20:17:48', 'jrojas', 7),
(87, '2018-11-04 22:19:02', NULL, 'jrojas', 7),
(88, '2018-11-04 22:20:54', NULL, 'jrojas', 7),
(89, '2018-11-05 01:39:56', '2018-11-05 01:49:20', 'jrojas', 7),
(90, '2018-11-05 02:26:08', NULL, 'jrojas', 7),
(91, '2018-11-05 03:12:26', NULL, 'jrojas', 7),
(92, '2018-11-05 23:37:04', NULL, 'jrojas', 7),
(93, '2018-11-06 00:19:14', NULL, 'jrojas', 7),
(94, '2018-11-08 00:48:18', NULL, 'jrojas', 7),
(95, '2018-11-08 01:29:20', NULL, 'jrojas', 7),
(96, '2018-11-08 02:45:45', NULL, 'jrojas', 7),
(97, '2018-11-08 02:54:05', NULL, 'jrojas', 7),
(98, '2018-11-08 23:54:52', NULL, 'jrojas', 7),
(99, '2018-11-10 05:47:27', '2018-11-10 05:53:12', 'jrojas', 7),
(100, '2018-11-10 05:53:30', '2018-11-10 05:54:51', 'gnunez', 6),
(101, '2018-11-18 16:15:35', '2018-11-18 16:16:13', 'jrojas', 7),
(102, '2018-11-18 16:16:52', '2018-11-18 16:17:47', 'gnunez', 6),
(103, '2018-11-18 22:36:44', '2018-11-18 23:04:22', 'jrojas', 7),
(104, '2018-11-18 23:09:31', '2018-11-18 23:51:47', 'jrojas', 7),
(105, '2018-11-18 23:52:06', '2018-11-18 23:56:20', 'jrojas', 7),
(106, '2018-11-19 00:03:34', '2018-11-19 00:03:41', 'jrojas', 7),
(107, '2018-11-19 00:03:57', '2018-11-19 00:28:08', 'jrojas', 7),
(108, '2018-11-19 00:28:47', '2018-11-19 00:29:17', 'gnunez', 6),
(109, '2018-11-19 00:29:26', NULL, 'jrojas', 7),
(110, '2018-11-19 00:49:52', '2018-11-19 01:06:02', 'jrojas', 7),
(111, '2018-11-19 01:07:07', '2018-11-19 01:12:45', 'jrojas', 7),
(112, '2018-11-19 01:13:15', NULL, 'jrojas', 7),
(113, '2018-11-19 03:57:48', '2018-11-19 06:10:34', 'jrojas', 7),
(114, '2018-11-20 20:30:36', NULL, 'jrojas', 7),
(115, '2018-11-20 20:35:22', '2018-11-20 20:36:00', 'jrojas', 7),
(116, '2018-11-21 04:29:23', '2018-11-21 04:34:36', 'gnunez', 6),
(117, '2018-11-21 04:35:04', '2018-11-21 04:35:07', 'jrojas', 7),
(118, '2018-11-21 04:35:14', '2018-11-21 04:35:47', 'gnunez', 6),
(119, '2018-11-21 04:35:51', '2018-11-21 04:49:56', 'rgonzalezc', 7),
(120, '2018-11-21 04:50:27', '2018-11-21 04:52:30', 'gnunez', 6),
(121, NULL, '2021-10-27 22:48:14', 'admin', 4),
(122, NULL, '2021-10-27 22:48:15', 'admin', 4),
(123, NULL, '2021-10-27 22:48:16', 'admin', 4),
(124, NULL, '2021-10-27 22:48:19', 'admin', 4),
(125, NULL, '2021-10-27 22:48:19', 'admin', 4),
(126, NULL, '2021-10-27 22:48:20', 'admin', 4),
(127, NULL, '2021-10-27 22:48:20', 'admin', 4),
(128, NULL, '2021-10-27 22:48:20', 'admin', 4),
(129, NULL, '2021-10-27 22:48:20', 'admin', 4),
(130, NULL, '2021-10-27 22:48:20', 'admin', 4),
(131, NULL, '2021-10-27 22:48:20', 'admin', 4),
(132, NULL, '2021-10-27 22:48:24', 'admin', 4),
(133, NULL, '2021-10-27 22:48:24', 'admin', 4),
(134, NULL, '2021-10-27 22:48:24', 'admin', 4),
(135, NULL, '2021-10-27 22:48:25', 'admin', 4),
(136, NULL, '2021-10-27 22:48:25', 'admin', 4),
(137, NULL, '2021-10-27 22:48:26', 'admin', 4),
(138, NULL, '2021-10-27 22:48:26', 'admin', 4),
(139, NULL, '2021-10-27 22:48:26', 'admin', 4),
(140, NULL, '2021-10-27 22:48:27', 'admin', 4),
(141, NULL, '2021-10-27 22:48:29', 'admin', 4),
(142, NULL, '2021-10-27 22:48:44', 'admin', 4),
(143, NULL, '2021-10-27 22:49:06', 'admin', 4),
(144, NULL, '2021-10-27 22:49:16', 'admin', 4),
(145, NULL, '2021-10-27 23:03:40', 'admin', 4);

-- --------------------------------------------------------


CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `rolename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`idrole`, `rolename`) VALUES
(4, 'Administrator'),
(5, 'Coordinator'),
(6, 'Teacher'),
(7, 'Student');

-- --------------------------------------------------------

--
-- Indices de la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idadministrator`,`role_idrole`,`gender_idgender`),
  ADD KEY `fk_administrator_role1_idx` (`role_idrole`),
  ADD KEY `fk_administrator_gender1_idx` (`gender_idgender`);

--
-- Indices de la tabla `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`idgender`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);


--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrator`
--
ALTER TABLE `administrator`
  MODIFY `idadministrator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gender`
--
ALTER TABLE `gender`
  MODIFY `idgender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `fk_administrator_gender1` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_administrator_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
