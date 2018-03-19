-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2018 a las 02:36:32
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--

CREATE TABLE `activity` (
  `idactivity` int(11) NOT NULL,
  `activityname` varchar(45) NOT NULL,
  `descriptionleft` varchar(45) DEFAULT NULL,
  `descriptionright` varchar(45) DEFAULT NULL,
  `unity_idunity` int(11) NOT NULL,
  `unity_class_idclass` int(11) NOT NULL,
  `unity_class_teacher_idteacher` int(11) NOT NULL,
  `material_idmaterial` int(11) NOT NULL,
  `material_materialtype_idmaterialtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activity`
--

INSERT INTO `activity` (`idactivity`, `activityname`, `descriptionleft`, `descriptionright`, `unity_idunity`, `unity_class_idclass`, `unity_class_teacher_idteacher`, `material_idmaterial`, `material_materialtype_idmaterialtype`) VALUES
(2, 'Whats is a best smartphone?', 'resolve cuestion an anwer', '', 2, 5, 1, 1, 4),
(3, 'Wach the video and respounse the answers', '', '', 3, 1, 1, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `idanswer` int(11) NOT NULL,
  `answername` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `value_idvalue` int(11) NOT NULL,
  `question_idquestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE `class` (
  `idclass` int(11) NOT NULL,
  `classname` varchar(45) NOT NULL,
  `descriptioncenter` varchar(200) NOT NULL,
  `descriptionleft` varchar(200) DEFAULT NULL,
  `descriptionright` varchar(200) DEFAULT NULL,
  `teacher_idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`idclass`, `classname`, `descriptioncenter`, `descriptionleft`, `descriptionright`, `teacher_idteacher`) VALUES
(1, 'English 4 IT', 'INFORMATION TECNOLOGIES', '', '', 1),
(5, 'SNAP DRAGON PTE', 'VEST DIVICE', 'TESLA MOTOR', 'BIOTECNOLOGY', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinator`
--

CREATE TABLE `coordinator` (
  `idcoordinator` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coordinator`
--

INSERT INTO `coordinator` (`idcoordinator`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(1, '66666666-6', 'David', 'Maldonado Briones', 'dama', '202cb962ac59075b964b07152d234b70', 'david@gmail.com', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam`
--

CREATE TABLE `exam` (
  `idexam` int(11) NOT NULL,
  `examname` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_has_record`
--

CREATE TABLE `exam_has_record` (
  `exam_idexam` int(11) NOT NULL,
  `record_idrecord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gender`
--

CREATE TABLE `gender` (
  `idgender` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `glosary` (
  `idglosary` int(11) NOT NULL,
  `wordname` varchar(45) NOT NULL,
  `description` varchar(200) NOT NULL,
  `aditionaldescription` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `glosary`
--

INSERT INTO `glosary` (`idglosary`, `wordname`, `description`, `aditionaldescription`) VALUES
(6, 'Potato', 'Patata', 'En Chile, Papa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_has_student`
--

CREATE TABLE `log_has_student` (
  `log_idlog` int(11) NOT NULL,
  `student_idstudent` int(11) NOT NULL,
  `student_role_idrole` int(11) NOT NULL,
  `student_gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idmaterial` int(11) NOT NULL,
  `materialname` varchar(45) NOT NULL,
  `descriptionleft` varchar(200) NOT NULL,
  `descriptionright` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `route` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `materialtype_idmaterialtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `materialtype` (
  `idmaterialtype` int(11) NOT NULL,
  `materialtypename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `question` (
  `idquestion` int(11) NOT NULL,
  `questionname` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `activity_idactivity` int(11) NOT NULL,
  `activity_unity_idunity` int(11) NOT NULL,
  `activity_unity_class_idclass` int(11) NOT NULL,
  `activity_unity_class_teacher_idteacher` int(11) NOT NULL,
  `activity_material_idmaterial` int(11) NOT NULL,
  `activity_material_materialtype_idmaterialtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_has_record`
--

CREATE TABLE `question_has_record` (
  `question_idquestion` int(11) NOT NULL,
  `record_idrecord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--

CREATE TABLE `record` (
  `idrecord` int(11) NOT NULL,
  `recordname` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record_has_class`
--

CREATE TABLE `record_has_class` (
  `record_idrecord` int(11) NOT NULL,
  `class_idclass` int(11) NOT NULL,
  `class_teacher_idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `rolename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `student` (
  `idstudent` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`idstudent`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(3, '17597491-1', 'Mauricio Eduardo', 'Garcia Mardones', 'magata', '202cb962ac59075b964b07152d234b70', 'mgarciamardones@gmail.com', 1, 1),
(4, '22222222-2', 'Jose Agustin', 'Parra Cancino', 'paca', '202cb962ac59075b964b07152d234b70', 'jose_parra@gmail.com', 1, 1),
(5, '33333333-3', 'sdasdasdDSASDA', 'ASDAASDASD', 'ASDAS', '123', 'SDADADAD', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_has_class`
--

CREATE TABLE `student_has_class` (
  `student_idstudent` int(11) NOT NULL,
  `student_role_idrole` int(11) NOT NULL,
  `student_gender_idgender` int(11) NOT NULL,
  `class_idclass` int(11) NOT NULL,
  `class_teacher_idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `student_has_class`
--

INSERT INTO `student_has_class` (`student_idstudent`, `student_role_idrole`, `student_gender_idgender`, `class_idclass`, `class_teacher_idteacher`) VALUES
(3, 1, 1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_has_record`
--

CREATE TABLE `student_has_record` (
  `student_idstudent` int(11) NOT NULL,
  `student_class_idclass` int(11) NOT NULL,
  `record_idrecord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE `teacher` (
  `idteacher` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`idteacher`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(1, '11111111-1', 'Belén Elizabeth', 'Pérez Durán', 'beped', '202cb962ac59075b964b07152d234b70', 'belen.perez04@inacapmail.cl', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_has_log`
--

CREATE TABLE `teacher_has_log` (
  `teacher_idteacher` int(11) NOT NULL,
  `teacher_role_idrole` int(11) NOT NULL,
  `teacher_gender_idgender` int(11) NOT NULL,
  `log_idlog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unity`
--

CREATE TABLE `unity` (
  `idunity` int(11) NOT NULL,
  `unityname` varchar(45) NOT NULL,
  `descriptioncenter` varchar(200) DEFAULT NULL,
  `descriptionleft` varchar(200) DEFAULT NULL,
  `descriptionright` varchar(200) DEFAULT NULL,
  `class_idclass` int(11) NOT NULL,
  `class_teacher_idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unity`
--

INSERT INTO `unity` (`idunity`, `unityname`, `descriptioncenter`, `descriptionleft`, `descriptionright`, `class_idclass`, `class_teacher_idteacher`) VALUES
(2, 'SMARTPHONE', 'Mobile Devices', '', '', 5, 1),
(3, 'Information Tecnology', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unity_has_exam`
--

CREATE TABLE `unity_has_exam` (
  `unity_idunity` int(11) NOT NULL,
  `unity_class_idclass` int(11) NOT NULL,
  `unity_class_teacher_idteacher` int(11) NOT NULL,
  `exam_idexam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `value`
--

CREATE TABLE `value` (
  `idvalue` int(11) NOT NULL,
  `valuename` varchar(45) NOT NULL,
  `val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `value`
--

INSERT INTO `value` (`idvalue`, `valuename`, `val`) VALUES
(1, 'Good', 100),
(2, 'Regular', 50),
(3, 'Bad', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`idactivity`,`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`,`material_idmaterial`,`material_materialtype_idmaterialtype`),
  ADD UNIQUE KEY `activityname_UNIQUE` (`activityname`),
  ADD KEY `fk_activity_unity1_idx` (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`),
  ADD KEY `fk_activity_material1_idx` (`material_idmaterial`,`material_materialtype_idmaterialtype`);

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`idanswer`,`value_idvalue`,`question_idquestion`),
  ADD KEY `fk_answer_value1_idx` (`value_idvalue`),
  ADD KEY `fk_answer_question1_idx` (`question_idquestion`);

--
-- Indices de la tabla `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`idclass`,`teacher_idteacher`),
  ADD KEY `fk_class_teacher1_idx` (`teacher_idteacher`);

--
-- Indices de la tabla `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`idcoordinator`,`role_idrole`,`gender_idgender`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `rut_UNIQUE` (`idnumber`),
  ADD KEY `fk_teacher_role1_idx` (`role_idrole`),
  ADD KEY `fk_teacher_gender1_idx` (`gender_idgender`);

--
-- Indices de la tabla `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`idexam`,`state`),
  ADD UNIQUE KEY `examname_UNIQUE` (`examname`);

--
-- Indices de la tabla `exam_has_record`
--
ALTER TABLE `exam_has_record`
  ADD PRIMARY KEY (`exam_idexam`,`record_idrecord`),
  ADD KEY `fk_exam_has_record_record1_idx` (`record_idrecord`),
  ADD KEY `fk_exam_has_record_exam1_idx` (`exam_idexam`);

--
-- Indices de la tabla `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`idgender`);

--
-- Indices de la tabla `glosary`
--
ALTER TABLE `glosary`
  ADD PRIMARY KEY (`idglosary`),
  ADD UNIQUE KEY `wordname_UNIQUE` (`wordname`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`);

--
-- Indices de la tabla `log_has_student`
--
ALTER TABLE `log_has_student`
  ADD PRIMARY KEY (`log_idlog`,`student_idstudent`,`student_role_idrole`,`student_gender_idgender`),
  ADD KEY `fk_log_has_student_student1_idx` (`student_idstudent`,`student_role_idrole`,`student_gender_idgender`),
  ADD KEY `fk_log_has_student_log1_idx` (`log_idlog`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idmaterial`,`materialtype_idmaterialtype`),
  ADD KEY `fk_material_materialtype1_idx` (`materialtype_idmaterialtype`);

--
-- Indices de la tabla `materialtype`
--
ALTER TABLE `materialtype`
  ADD PRIMARY KEY (`idmaterialtype`);

--
-- Indices de la tabla `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idquestion`,`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`,`activity_material_idmaterial`,`activity_material_materialtype_idmaterialtype`),
  ADD KEY `fk_question_activity1_idx` (`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`,`activity_material_idmaterial`,`activity_material_materialtype_idmaterialtype`);

--
-- Indices de la tabla `question_has_record`
--
ALTER TABLE `question_has_record`
  ADD PRIMARY KEY (`question_idquestion`,`record_idrecord`),
  ADD KEY `fk_question_has_record_record1_idx` (`record_idrecord`),
  ADD KEY `fk_question_has_record_question1_idx` (`question_idquestion`);

--
-- Indices de la tabla `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`idrecord`);

--
-- Indices de la tabla `record_has_class`
--
ALTER TABLE `record_has_class`
  ADD PRIMARY KEY (`record_idrecord`,`class_idclass`,`class_teacher_idteacher`),
  ADD KEY `fk_record_has_class_class1_idx` (`class_idclass`,`class_teacher_idteacher`),
  ADD KEY `fk_record_has_class_record1_idx` (`record_idrecord`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idstudent`,`role_idrole`,`gender_idgender`),
  ADD UNIQUE KEY `idnumber_UNIQUE` (`idnumber`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `fk_student_role1_idx` (`role_idrole`),
  ADD KEY `fk_student_gender1_idx` (`gender_idgender`);

--
-- Indices de la tabla `student_has_class`
--
ALTER TABLE `student_has_class`
  ADD PRIMARY KEY (`student_idstudent`,`student_role_idrole`,`student_gender_idgender`,`class_idclass`,`class_teacher_idteacher`),
  ADD KEY `fk_student_has_class_class1_idx` (`class_idclass`,`class_teacher_idteacher`),
  ADD KEY `fk_student_has_class_student1_idx` (`student_idstudent`,`student_role_idrole`,`student_gender_idgender`);

--
-- Indices de la tabla `student_has_record`
--
ALTER TABLE `student_has_record`
  ADD PRIMARY KEY (`student_idstudent`,`student_class_idclass`,`record_idrecord`),
  ADD KEY `fk_student_has_record_record1_idx` (`record_idrecord`),
  ADD KEY `fk_student_has_record_student1_idx` (`student_idstudent`,`student_class_idclass`);

--
-- Indices de la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`idteacher`,`role_idrole`,`gender_idgender`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `rut_UNIQUE` (`idnumber`),
  ADD KEY `fk_teacher_role1_idx` (`role_idrole`),
  ADD KEY `fk_teacher_gender1_idx` (`gender_idgender`);

--
-- Indices de la tabla `teacher_has_log`
--
ALTER TABLE `teacher_has_log`
  ADD PRIMARY KEY (`teacher_idteacher`,`teacher_role_idrole`,`teacher_gender_idgender`,`log_idlog`),
  ADD KEY `fk_teacher_has_log_log1_idx` (`log_idlog`),
  ADD KEY `fk_teacher_has_log_teacher1_idx` (`teacher_idteacher`,`teacher_role_idrole`,`teacher_gender_idgender`);

--
-- Indices de la tabla `unity`
--
ALTER TABLE `unity`
  ADD PRIMARY KEY (`idunity`,`class_idclass`,`class_teacher_idteacher`),
  ADD UNIQUE KEY `descriptioncenter_UNIQUE` (`descriptioncenter`),
  ADD KEY `fk_unity_class1_idx` (`class_idclass`,`class_teacher_idteacher`);

--
-- Indices de la tabla `unity_has_exam`
--
ALTER TABLE `unity_has_exam`
  ADD PRIMARY KEY (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`,`exam_idexam`),
  ADD KEY `fk_unity_has_exam_exam1_idx` (`exam_idexam`),
  ADD KEY `fk_unity_has_exam_unity1_idx` (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`);

--
-- Indices de la tabla `value`
--
ALTER TABLE `value`
  ADD PRIMARY KEY (`idvalue`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity`
--
ALTER TABLE `activity`
  MODIFY `idactivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `idanswer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `idclass` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `coordinator`
--
ALTER TABLE `coordinator`
  MODIFY `idcoordinator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `exam`
--
ALTER TABLE `exam`
  MODIFY `idexam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gender`
--
ALTER TABLE `gender`
  MODIFY `idgender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `glosary`
--
ALTER TABLE `glosary`
  MODIFY `idglosary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materialtype`
--
ALTER TABLE `materialtype`
  MODIFY `idmaterialtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `question`
--
ALTER TABLE `question`
  MODIFY `idquestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `record`
--
ALTER TABLE `record`
  MODIFY `idrecord` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `idstudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `teacher`
--
ALTER TABLE `teacher`
  MODIFY `idteacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unity`
--
ALTER TABLE `unity`
  MODIFY `idunity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `value`
--
ALTER TABLE `value`
  MODIFY `idvalue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `fk_answer_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answer_value1` FOREIGN KEY (`value_idvalue`) REFERENCES `value` (`idvalue`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_activity1` FOREIGN KEY (`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`,`activity_material_idmaterial`,`activity_material_materialtype_idmaterialtype`) REFERENCES `activity` (`idactivity`, `unity_idunity`, `unity_class_idclass`, `unity_class_teacher_idteacher`, `material_idmaterial`, `material_materialtype_idmaterialtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
