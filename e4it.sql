-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2017 a las 05:55:55
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e4it`
--
CREATE DATABASE IF NOT EXISTS `e4it` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `e4it`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--
-- Creación: 14-12-2017 a las 02:53:42
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `idactivity` int(11) NOT NULL AUTO_INCREMENT,
  `activityname` varchar(45) NOT NULL,
  `descriptionleft` varchar(45) DEFAULT NULL,
  `descriptionright` varchar(45) DEFAULT NULL,
  `unity_idunity` int(11) NOT NULL,
  `unity_class_idclass` int(11) NOT NULL,
  `unity_class_teacher_idteacher` int(11) NOT NULL,
  `material_idmaterial` int(11) NOT NULL,
  `material_materialtype_idmaterialtype` int(11) NOT NULL,
  PRIMARY KEY (`idactivity`,`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`,`material_idmaterial`,`material_materialtype_idmaterialtype`),
  UNIQUE KEY `activityname_UNIQUE` (`activityname`),
  KEY `fk_activity_unity1_idx` (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`),
  KEY `fk_activity_material1_idx` (`material_idmaterial`,`material_materialtype_idmaterialtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `activity`:
--   `material_idmaterial`
--       `material` -> `idmaterial`
--   `material_materialtype_idmaterialtype`
--       `material` -> `materialtype_idmaterialtype`
--   `unity_idunity`
--       `unity` -> `idunity`
--   `unity_class_idclass`
--       `unity` -> `class_idclass`
--   `unity_class_teacher_idteacher`
--       `unity` -> `class_teacher_idteacher`
--

--
-- Truncar tablas antes de insertar `activity`
--

TRUNCATE TABLE `activity`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--
-- Creación: 12-12-2017 a las 17:59:16
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `idanswer` int(11) NOT NULL AUTO_INCREMENT,
  `answarename` varchar(45) NOT NULL,
  `decription` varchar(45) NOT NULL,
  `value_idvalue` int(11) NOT NULL,
  PRIMARY KEY (`idanswer`,`value_idvalue`),
  KEY `fk_answer_value1_idx` (`value_idvalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `answer`:
--   `value_idvalue`
--       `value` -> `idvalue`
--

--
-- Truncar tablas antes de insertar `answer`
--

TRUNCATE TABLE `answer`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer_has_question`
--
-- Creación: 30-11-2017 a las 03:20:25
--

DROP TABLE IF EXISTS `answer_has_question`;
CREATE TABLE IF NOT EXISTS `answer_has_question` (
  `answer_idanswer` int(11) NOT NULL,
  `question_idquestion` int(11) NOT NULL,
  PRIMARY KEY (`answer_idanswer`,`question_idquestion`),
  KEY `fk_answer_has_question_question1_idx` (`question_idquestion`),
  KEY `fk_answer_has_question_answer1_idx` (`answer_idanswer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `answer_has_question`:
--   `answer_idanswer`
--       `answer` -> `idanswer`
--   `question_idquestion`
--       `question` -> `idquestion`
--

--
-- Truncar tablas antes de insertar `answer_has_question`
--

TRUNCATE TABLE `answer_has_question`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--
-- Creación: 30-11-2017 a las 03:20:21
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `idclass` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(45) NOT NULL,
  `descriptioncenter` varchar(200) NOT NULL,
  `descriptionleft` varchar(200) DEFAULT NULL,
  `descriptionright` varchar(200) DEFAULT NULL,
  `teacher_idteacher` int(11) NOT NULL,
  PRIMARY KEY (`idclass`,`teacher_idteacher`),
  KEY `fk_class_teacher1_idx` (`teacher_idteacher`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `class`:
--   `teacher_idteacher`
--       `teacher` -> `idteacher`
--

--
-- Truncar tablas antes de insertar `class`
--

TRUNCATE TABLE `class`;
--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`idclass`, `classname`, `descriptioncenter`, `descriptionleft`, `descriptionright`, `teacher_idteacher`) VALUES
(1, 'English 4 IT', 'CLASS INFORMATION TECNOLOGIES', '', '', 1),
(2, 'Funciona Bien', 'HOLA HOLA HOLA', 'EL EXTRA', 'LOREA CHORO NACO', 1),
(3, 'EL EXTRA', 'EL FUA', 'VOY Y SACO', 'AL UNIVERSO', 1),
(5, 'SNAP DRAGON PTE', 'VEST DIVICE', 'TESLA MOTOR', 'BIOTECNOLOGY', 1),
(6, 'ADASD', 'ADASDASD', 'dasdasdasdasd', 'asdasdas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinator`
--
-- Creación: 17-12-2017 a las 02:59:12
--

DROP TABLE IF EXISTS `coordinator`;
CREATE TABLE IF NOT EXISTS `coordinator` (
  `idcoordinator` int(11) NOT NULL AUTO_INCREMENT,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL,
  PRIMARY KEY (`idcoordinator`,`role_idrole`,`gender_idgender`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `rut_UNIQUE` (`idnumber`),
  KEY `fk_teacher_role1_idx` (`role_idrole`),
  KEY `fk_teacher_gender1_idx` (`gender_idgender`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `coordinator`:
--   `gender_idgender`
--       `gender` -> `idgender`
--   `role_idrole`
--       `role` -> `idrole`
--

--
-- Truncar tablas antes de insertar `coordinator`
--

TRUNCATE TABLE `coordinator`;
--
-- Volcado de datos para la tabla `coordinator`
--

INSERT INTO `coordinator` (`idcoordinator`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(1, '66666666-6', 'David', 'Maldonado Briones', 'dama', '202cb962ac59075b964b07152d234b70', 'david@gmail.com', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam`
--
-- Creación: 30-11-2017 a las 03:20:22
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `idexam` int(11) NOT NULL AUTO_INCREMENT,
  `examname` varchar(45) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idexam`),
  UNIQUE KEY `examname_UNIQUE` (`examname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `exam`:
--

--
-- Truncar tablas antes de insertar `exam`
--

TRUNCATE TABLE `exam`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_has_record`
--
-- Creación: 08-12-2017 a las 21:15:55
--

DROP TABLE IF EXISTS `exam_has_record`;
CREATE TABLE IF NOT EXISTS `exam_has_record` (
  `exam_idexam` int(11) NOT NULL,
  `record_idrecord` int(11) NOT NULL,
  PRIMARY KEY (`exam_idexam`,`record_idrecord`),
  KEY `fk_exam_has_record_record1_idx` (`record_idrecord`),
  KEY `fk_exam_has_record_exam1_idx` (`exam_idexam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `exam_has_record`:
--   `exam_idexam`
--       `exam` -> `idexam`
--   `record_idrecord`
--       `record` -> `idrecord`
--

--
-- Truncar tablas antes de insertar `exam_has_record`
--

TRUNCATE TABLE `exam_has_record`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gender`
--
-- Creación: 02-12-2017 a las 20:07:11
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `idgender` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idgender`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `gender`:
--

--
-- Truncar tablas antes de insertar `gender`
--

TRUNCATE TABLE `gender`;
--
-- Volcado de datos para la tabla `gender`
--

INSERT INTO `gender` (`idgender`, `name`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glosary`
--
-- Creación: 12-12-2017 a las 17:59:17
--

DROP TABLE IF EXISTS `glosary`;
CREATE TABLE IF NOT EXISTS `glosary` (
  `idglosary` int(11) NOT NULL AUTO_INCREMENT,
  `wordname` varchar(45) NOT NULL,
  `decription` varchar(200) NOT NULL,
  `aditionaldescription` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idglosary`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `glosary`:
--

--
-- Truncar tablas antes de insertar `glosary`
--

TRUNCATE TABLE `glosary`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--
-- Creación: 17-12-2017 a las 02:59:11
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `log`:
--

--
-- Truncar tablas antes de insertar `log`
--

TRUNCATE TABLE `log`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_has_student`
--
-- Creación: 17-12-2017 a las 02:59:12
--

DROP TABLE IF EXISTS `log_has_student`;
CREATE TABLE IF NOT EXISTS `log_has_student` (
  `log_idlog` int(11) NOT NULL,
  `student_idstudent` int(11) NOT NULL,
  `student_role_idrole` int(11) NOT NULL,
  `student_gender_idgender` int(11) NOT NULL,
  PRIMARY KEY (`log_idlog`,`student_idstudent`,`student_role_idrole`,`student_gender_idgender`),
  KEY `fk_log_has_student_student1_idx` (`student_idstudent`,`student_role_idrole`,`student_gender_idgender`),
  KEY `fk_log_has_student_log1_idx` (`log_idlog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `log_has_student`:
--   `log_idlog`
--       `log` -> `idlog`
--   `student_idstudent`
--       `student` -> `idstudent`
--   `student_role_idrole`
--       `student` -> `role_idrole`
--   `student_gender_idgender`
--       `student` -> `gender_idgender`
--

--
-- Truncar tablas antes de insertar `log_has_student`
--

TRUNCATE TABLE `log_has_student`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--
-- Creación: 06-12-2017 a las 03:43:54
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `idmaterial` int(11) NOT NULL AUTO_INCREMENT,
  `materialname` varchar(45) NOT NULL,
  `descriptionleft` varchar(200) NOT NULL,
  `descriptionright` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `route` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `materialtype_idmaterialtype` int(11) NOT NULL,
  PRIMARY KEY (`idmaterial`,`materialtype_idmaterialtype`),
  KEY `fk_material_materialtype1_idx` (`materialtype_idmaterialtype`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `material`:
--   `materialtype_idmaterialtype`
--       `materialtype` -> `idmaterialtype`
--

--
-- Truncar tablas antes de insertar `material`
--

TRUNCATE TABLE `material`;
--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idmaterial`, `materialname`, `descriptionleft`, `descriptionright`, `link`, `route`, `url`, `materialtype_idmaterialtype`) VALUES
(1, 'Mac DeMarco - Chamber of Reflection', 'newjerseyjustin\nPublicado el 10 mar. 2014\nsupport mac and buy salad days on the right.\nhttps://itunes.apple.com/us/album/sal...\nChamber of Reflection\nCategoría\nMúsica\nLicencia\nLicencia estándar', '', 'https://www.youtube.com/watch?v=NY8IS0ssnXQ', '', '', 4),
(2, 'Tool - sober', '1992', 'EE.UU', 'https://www.youtube.com/watch?v=hglVqACd1C8', '', '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialtype`
--
-- Creación: 30-11-2017 a las 03:20:24
--

DROP TABLE IF EXISTS `materialtype`;
CREATE TABLE IF NOT EXISTS `materialtype` (
  `idmaterialtype` int(11) NOT NULL AUTO_INCREMENT,
  `materialtypename` varchar(45) NOT NULL,
  PRIMARY KEY (`idmaterialtype`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `materialtype`:
--

--
-- Truncar tablas antes de insertar `materialtype`
--

TRUNCATE TABLE `materialtype`;
--
-- Volcado de datos para la tabla `materialtype`
--

INSERT INTO `materialtype` (`idmaterialtype`, `materialtypename`) VALUES
(1, 'Files'),
(2, 'Audio'),
(3, 'Upload Video'),
(4, 'Youtube Link');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question`
--
-- Creación: 30-11-2017 a las 03:20:23
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `idquestion` int(11) NOT NULL AUTO_INCREMENT,
  `questionname` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idquestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `question`:
--

--
-- Truncar tablas antes de insertar `question`
--

TRUNCATE TABLE `question`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_has_activity`
--
-- Creación: 16-12-2017 a las 04:35:26
--

DROP TABLE IF EXISTS `question_has_activity`;
CREATE TABLE IF NOT EXISTS `question_has_activity` (
  `question_idquestion` int(11) NOT NULL,
  `activity_idactivity` int(11) NOT NULL,
  `activity_unity_idunity` int(11) NOT NULL,
  `activity_unity_class_idclass` int(11) NOT NULL,
  `activity_unity_class_teacher_idteacher` int(11) NOT NULL,
  `activity_material_idmaterial` int(11) NOT NULL,
  `activity_material_materialtype_idmaterialtype` int(11) NOT NULL,
  PRIMARY KEY (`question_idquestion`,`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`,`activity_material_idmaterial`,`activity_material_materialtype_idmaterialtype`),
  KEY `fk_question_has_activity_activity1_idx` (`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`,`activity_material_idmaterial`,`activity_material_materialtype_idmaterialtype`),
  KEY `fk_question_has_activity_question1_idx` (`question_idquestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `question_has_activity`:
--   `activity_idactivity`
--       `activity` -> `idactivity`
--   `activity_unity_idunity`
--       `activity` -> `unity_idunity`
--   `activity_unity_class_idclass`
--       `activity` -> `unity_class_idclass`
--   `activity_unity_class_teacher_idteacher`
--       `activity` -> `unity_class_teacher_idteacher`
--   `activity_material_idmaterial`
--       `activity` -> `material_idmaterial`
--   `activity_material_materialtype_idmaterialtype`
--       `activity` -> `material_materialtype_idmaterialtype`
--   `question_idquestion`
--       `question` -> `idquestion`
--

--
-- Truncar tablas antes de insertar `question_has_activity`
--

TRUNCATE TABLE `question_has_activity`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_has_record`
--
-- Creación: 08-12-2017 a las 21:15:55
--

DROP TABLE IF EXISTS `question_has_record`;
CREATE TABLE IF NOT EXISTS `question_has_record` (
  `question_idquestion` int(11) NOT NULL,
  `record_idrecord` int(11) NOT NULL,
  PRIMARY KEY (`question_idquestion`,`record_idrecord`),
  KEY `fk_question_has_record_record1_idx` (`record_idrecord`),
  KEY `fk_question_has_record_question1_idx` (`question_idquestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `question_has_record`:
--   `question_idquestion`
--       `question` -> `idquestion`
--   `record_idrecord`
--       `record` -> `idrecord`
--

--
-- Truncar tablas antes de insertar `question_has_record`
--

TRUNCATE TABLE `question_has_record`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--
-- Creación: 30-11-2017 a las 03:20:23
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `idrecord` int(11) NOT NULL AUTO_INCREMENT,
  `recordname` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`idrecord`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `record`:
--

--
-- Truncar tablas antes de insertar `record`
--

TRUNCATE TABLE `record`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record_has_class`
--
-- Creación: 08-12-2017 a las 21:15:54
--

DROP TABLE IF EXISTS `record_has_class`;
CREATE TABLE IF NOT EXISTS `record_has_class` (
  `record_idrecord` int(11) NOT NULL,
  `class_idclass` int(11) NOT NULL,
  `class_teacher_idteacher` int(11) NOT NULL,
  PRIMARY KEY (`record_idrecord`,`class_idclass`,`class_teacher_idteacher`),
  KEY `fk_record_has_class_class1_idx` (`class_idclass`,`class_teacher_idteacher`),
  KEY `fk_record_has_class_record1_idx` (`record_idrecord`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `record_has_class`:
--   `class_idclass`
--       `class` -> `idclass`
--   `class_teacher_idteacher`
--       `class` -> `teacher_idteacher`
--   `record_idrecord`
--       `record` -> `idrecord`
--

--
-- Truncar tablas antes de insertar `record_has_class`
--

TRUNCATE TABLE `record_has_class`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--
-- Creación: 01-12-2017 a las 02:06:27
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(45) NOT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `role`:
--

--
-- Truncar tablas antes de insertar `role`
--

TRUNCATE TABLE `role`;
--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`idrole`, `rolename`) VALUES
(1, 'student'),
(2, 'teacher'),
(3, 'coordinator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--
-- Creación: 03-12-2017 a las 04:06:36
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `idstudent` int(11) NOT NULL AUTO_INCREMENT,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL,
  PRIMARY KEY (`idstudent`,`role_idrole`,`gender_idgender`),
  UNIQUE KEY `idnumber_UNIQUE` (`idnumber`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_student_role1_idx` (`role_idrole`),
  KEY `fk_student_gender1_idx` (`gender_idgender`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `student`:
--   `gender_idgender`
--       `gender` -> `idgender`
--   `role_idrole`
--       `role` -> `idrole`
--

--
-- Truncar tablas antes de insertar `student`
--

TRUNCATE TABLE `student`;
--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`idstudent`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(3, '17597491-1', 'Mauricio Eduardo', 'Garcia Mardones', 'magata', '202cb962ac59075b964b07152d234b70', 'mgarciamardones@gmail.com', 1, 1),
(4, '22222222-2', 'Jose Agustin', 'Parra Cancino', 'paca', '202cb962ac59075b964b07152d234b70', 'jose_parra@gmail.com', 1, 1),
(5, '33333333-3', 'sdasdasdDSASDA', 'ASDAASDASD', 'ASDAS', '123', 'SDADADAD', 1, 1),
(6, '44444444-4', 'ASDASD', 'ASDASD', 'ASDASD', '123', 'ASDASD', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_has_class`
--
-- Creación: 03-12-2017 a las 04:06:37
--

DROP TABLE IF EXISTS `student_has_class`;
CREATE TABLE IF NOT EXISTS `student_has_class` (
  `student_idstudent` int(11) NOT NULL,
  `student_role_idrole` int(11) NOT NULL,
  `student_gender_idgender` int(11) NOT NULL,
  `class_idclass` int(11) NOT NULL,
  `class_teacher_idteacher` int(11) NOT NULL,
  PRIMARY KEY (`student_idstudent`,`student_role_idrole`,`student_gender_idgender`,`class_idclass`,`class_teacher_idteacher`),
  KEY `fk_student_has_class_class1_idx` (`class_idclass`,`class_teacher_idteacher`),
  KEY `fk_student_has_class_student1_idx` (`student_idstudent`,`student_role_idrole`,`student_gender_idgender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `student_has_class`:
--   `class_idclass`
--       `class` -> `idclass`
--   `class_teacher_idteacher`
--       `class` -> `teacher_idteacher`
--   `student_idstudent`
--       `student` -> `idstudent`
--   `student_role_idrole`
--       `student` -> `role_idrole`
--   `student_gender_idgender`
--       `student` -> `gender_idgender`
--

--
-- Truncar tablas antes de insertar `student_has_class`
--

TRUNCATE TABLE `student_has_class`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_has_record`
--
-- Creación: 02-12-2017 a las 22:27:57
--

DROP TABLE IF EXISTS `student_has_record`;
CREATE TABLE IF NOT EXISTS `student_has_record` (
  `student_idstudent` int(11) NOT NULL,
  `student_class_idclass` int(11) NOT NULL,
  `record_idrecord` int(11) NOT NULL,
  PRIMARY KEY (`student_idstudent`,`student_class_idclass`,`record_idrecord`),
  KEY `fk_student_has_record_record1_idx` (`record_idrecord`),
  KEY `fk_student_has_record_student1_idx` (`student_idstudent`,`student_class_idclass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `student_has_record`:
--   `record_idrecord`
--       `record` -> `idrecord`
--   `student_idstudent`
--       `student` -> `idstudent`
--

--
-- Truncar tablas antes de insertar `student_has_record`
--

TRUNCATE TABLE `student_has_record`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--
-- Creación: 02-12-2017 a las 20:10:38
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `idteacher` int(11) NOT NULL AUTO_INCREMENT,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL,
  PRIMARY KEY (`idteacher`,`role_idrole`,`gender_idgender`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `rut_UNIQUE` (`idnumber`),
  KEY `fk_teacher_role1_idx` (`role_idrole`),
  KEY `fk_teacher_gender1_idx` (`gender_idgender`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `teacher`:
--   `gender_idgender`
--       `gender` -> `idgender`
--   `role_idrole`
--       `role` -> `idrole`
--

--
-- Truncar tablas antes de insertar `teacher`
--

TRUNCATE TABLE `teacher`;
--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`idteacher`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(1, '11111111-1', 'Belén Elizabeth', 'Pérez Durán', 'beped', '202cb962ac59075b964b07152d234b70', 'belen.perez04@inacapmail.cl', 2, 2),
(2, '33333333-3', 'Alfred', 'Storm Linear', 'att', '202cb962ac59075b964b07152d234b70', 'alstorm@gmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_has_log`
--
-- Creación: 17-12-2017 a las 02:59:11
--

DROP TABLE IF EXISTS `teacher_has_log`;
CREATE TABLE IF NOT EXISTS `teacher_has_log` (
  `teacher_idteacher` int(11) NOT NULL,
  `teacher_role_idrole` int(11) NOT NULL,
  `teacher_gender_idgender` int(11) NOT NULL,
  `log_idlog` int(11) NOT NULL,
  PRIMARY KEY (`teacher_idteacher`,`teacher_role_idrole`,`teacher_gender_idgender`,`log_idlog`),
  KEY `fk_teacher_has_log_log1_idx` (`log_idlog`),
  KEY `fk_teacher_has_log_teacher1_idx` (`teacher_idteacher`,`teacher_role_idrole`,`teacher_gender_idgender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `teacher_has_log`:
--   `log_idlog`
--       `log` -> `idlog`
--   `teacher_idteacher`
--       `teacher` -> `idteacher`
--   `teacher_role_idrole`
--       `teacher` -> `role_idrole`
--   `teacher_gender_idgender`
--       `teacher` -> `gender_idgender`
--

--
-- Truncar tablas antes de insertar `teacher_has_log`
--

TRUNCATE TABLE `teacher_has_log`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unity`
--
-- Creación: 09-12-2017 a las 15:20:29
--

DROP TABLE IF EXISTS `unity`;
CREATE TABLE IF NOT EXISTS `unity` (
  `idunity` int(11) NOT NULL,
  `unityname` varchar(45) NOT NULL,
  `descriptioncenter` varchar(200) DEFAULT NULL,
  `descriptionleft` varchar(200) DEFAULT NULL,
  `descriptionright` varchar(200) DEFAULT NULL,
  `class_idclass` int(11) NOT NULL,
  `class_teacher_idteacher` int(11) NOT NULL,
  PRIMARY KEY (`idunity`,`class_idclass`,`class_teacher_idteacher`),
  UNIQUE KEY `descriptioncenter_UNIQUE` (`descriptioncenter`),
  KEY `fk_unity_class1_idx` (`class_idclass`,`class_teacher_idteacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `unity`:
--   `class_idclass`
--       `class` -> `idclass`
--   `class_teacher_idteacher`
--       `class` -> `teacher_idteacher`
--

--
-- Truncar tablas antes de insertar `unity`
--

TRUNCATE TABLE `unity`;
--
-- Volcado de datos para la tabla `unity`
--

INSERT INTO `unity` (`idunity`, `unityname`, `descriptioncenter`, `descriptionleft`, `descriptionright`, `class_idclass`, `class_teacher_idteacher`) VALUES
(0, 'ajdgajsh', 'jhdajshdga', 'kjhadas', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unity_has_exam`
--
-- Creación: 09-12-2017 a las 15:20:30
--

DROP TABLE IF EXISTS `unity_has_exam`;
CREATE TABLE IF NOT EXISTS `unity_has_exam` (
  `unity_idunity` int(11) NOT NULL,
  `unity_class_idclass` int(11) NOT NULL,
  `unity_class_teacher_idteacher` int(11) NOT NULL,
  `exam_idexam` int(11) NOT NULL,
  PRIMARY KEY (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`,`exam_idexam`),
  KEY `fk_unity_has_exam_exam1_idx` (`exam_idexam`),
  KEY `fk_unity_has_exam_unity1_idx` (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `unity_has_exam`:
--   `exam_idexam`
--       `exam` -> `idexam`
--   `unity_idunity`
--       `unity` -> `idunity`
--   `unity_class_idclass`
--       `unity` -> `class_idclass`
--   `unity_class_teacher_idteacher`
--       `unity` -> `class_teacher_idteacher`
--

--
-- Truncar tablas antes de insertar `unity_has_exam`
--

TRUNCATE TABLE `unity_has_exam`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `value`
--
-- Creación: 30-11-2017 a las 03:20:25
--

DROP TABLE IF EXISTS `value`;
CREATE TABLE IF NOT EXISTS `value` (
  `idvalue` int(11) NOT NULL AUTO_INCREMENT,
  `valuename` varchar(45) NOT NULL,
  `val` int(11) NOT NULL,
  PRIMARY KEY (`idvalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `value`:
--

--
-- Truncar tablas antes de insertar `value`
--

TRUNCATE TABLE `value`;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_activity_material1` FOREIGN KEY (`material_idmaterial`,`material_materialtype_idmaterialtype`) REFERENCES `material` (`idmaterial`, `materialtype_idmaterialtype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_unity1` FOREIGN KEY (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`) REFERENCES `unity` (`idunity`, `class_idclass`, `class_teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_value1` FOREIGN KEY (`value_idvalue`) REFERENCES `value` (`idvalue`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `answer_has_question`
--
ALTER TABLE `answer_has_question`
  ADD CONSTRAINT `fk_answer_has_question_answer1` FOREIGN KEY (`answer_idanswer`) REFERENCES `answer` (`idanswer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answer_has_question_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_class_teacher1` FOREIGN KEY (`teacher_idteacher`) REFERENCES `teacher` (`idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `fk_teacher_gender10` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_role10` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `exam_has_record`
--
ALTER TABLE `exam_has_record`
  ADD CONSTRAINT `fk_exam_has_record_exam1` FOREIGN KEY (`exam_idexam`) REFERENCES `exam` (`idexam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exam_has_record_record1` FOREIGN KEY (`record_idrecord`) REFERENCES `record` (`idrecord`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_has_student`
--
ALTER TABLE `log_has_student`
  ADD CONSTRAINT `fk_log_has_student_log1` FOREIGN KEY (`log_idlog`) REFERENCES `log` (`idlog`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_has_student_student1` FOREIGN KEY (`student_idstudent`,`student_role_idrole`,`student_gender_idgender`) REFERENCES `student` (`idstudent`, `role_idrole`, `gender_idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_material_materialtype1` FOREIGN KEY (`materialtype_idmaterialtype`) REFERENCES `materialtype` (`idmaterialtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `question_has_activity`
--
ALTER TABLE `question_has_activity`
  ADD CONSTRAINT `fk_question_has_activity_activity1` FOREIGN KEY (`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`,`activity_material_idmaterial`,`activity_material_materialtype_idmaterialtype`) REFERENCES `activity` (`idactivity`, `unity_idunity`, `unity_class_idclass`, `unity_class_teacher_idteacher`, `material_idmaterial`, `material_materialtype_idmaterialtype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_question_has_activity_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `question_has_record`
--
ALTER TABLE `question_has_record`
  ADD CONSTRAINT `fk_question_has_record_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_question_has_record_record1` FOREIGN KEY (`record_idrecord`) REFERENCES `record` (`idrecord`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `record_has_class`
--
ALTER TABLE `record_has_class`
  ADD CONSTRAINT `fk_record_has_class_class1` FOREIGN KEY (`class_idclass`,`class_teacher_idteacher`) REFERENCES `class` (`idclass`, `teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_record_has_class_record1` FOREIGN KEY (`record_idrecord`) REFERENCES `record` (`idrecord`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_gender1` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `student_has_class`
--
ALTER TABLE `student_has_class`
  ADD CONSTRAINT `fk_student_has_class_class1` FOREIGN KEY (`class_idclass`,`class_teacher_idteacher`) REFERENCES `class` (`idclass`, `teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_class_student1` FOREIGN KEY (`student_idstudent`,`student_role_idrole`,`student_gender_idgender`) REFERENCES `student` (`idstudent`, `role_idrole`, `gender_idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `student_has_record`
--
ALTER TABLE `student_has_record`
  ADD CONSTRAINT `fk_student_has_record_record1` FOREIGN KEY (`record_idrecord`) REFERENCES `record` (`idrecord`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_record_student1` FOREIGN KEY (`student_idstudent`) REFERENCES `student` (`idstudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_gender1` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `teacher_has_log`
--
ALTER TABLE `teacher_has_log`
  ADD CONSTRAINT `fk_teacher_has_log_log1` FOREIGN KEY (`log_idlog`) REFERENCES `log` (`idlog`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_has_log_teacher1` FOREIGN KEY (`teacher_idteacher`,`teacher_role_idrole`,`teacher_gender_idgender`) REFERENCES `teacher` (`idteacher`, `role_idrole`, `gender_idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `unity`
--
ALTER TABLE `unity`
  ADD CONSTRAINT `fk_unity_class1` FOREIGN KEY (`class_idclass`,`class_teacher_idteacher`) REFERENCES `class` (`idclass`, `teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `unity_has_exam`
--
ALTER TABLE `unity_has_exam`
  ADD CONSTRAINT `fk_unity_has_exam_exam1` FOREIGN KEY (`exam_idexam`) REFERENCES `exam` (`idexam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unity_has_exam_unity1` FOREIGN KEY (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`) REFERENCES `unity` (`idunity`, `class_idclass`, `class_teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla activity
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla answer
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla answer_has_question
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla class
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla coordinator
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla exam
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla exam_has_record
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla gender
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla glosary
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla log
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla log_has_student
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla material
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla materialtype
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla question
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla question_has_activity
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla question_has_record
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla record
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla record_has_class
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla role
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla student
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla student_has_class
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla student_has_record
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla teacher
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla teacher_has_log
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla unity
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla unity_has_exam
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la tabla value
--

--
-- Truncar tablas antes de insertar `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncar tablas antes de insertar `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncar tablas antes de insertar `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadatos para la base de datos e4it
--

--
-- Truncar tablas antes de insertar `pma__bookmark`
--

TRUNCATE TABLE `pma__bookmark`;
--
-- Truncar tablas antes de insertar `pma__relation`
--

TRUNCATE TABLE `pma__relation`;
--
-- Truncar tablas antes de insertar `pma__savedsearches`
--

TRUNCATE TABLE `pma__savedsearches`;
--
-- Truncar tablas antes de insertar `pma__central_columns`
--

TRUNCATE TABLE `pma__central_columns`;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
