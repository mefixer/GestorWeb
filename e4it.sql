-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 06:16:22
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `unity_class_teacher_idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `idanswer` int(11) NOT NULL,
  `answarename` varchar(45) NOT NULL,
  `decription` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer_has_question`
--

CREATE TABLE `answer_has_question` (
  `answer_idanswer` int(11) NOT NULL,
  `question_idquestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer_has_value`
--

CREATE TABLE `answer_has_value` (
  `answer_idanswer` int(11) NOT NULL,
  `value_idvalue` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam`
--

CREATE TABLE `exam` (
  `idexam` int(11) NOT NULL,
  `examname` varchar(45) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idmaterial` int(11) NOT NULL,
  `materialname` varchar(45) NOT NULL,
  `materialtype_idmaterialtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialtype`
--

CREATE TABLE `materialtype` (
  `idmaterialtype` int(11) NOT NULL,
  `materialtypename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_has_class`
--

CREATE TABLE `material_has_class` (
  `material_idmaterial` int(11) NOT NULL,
  `class_idclass` int(11) NOT NULL,
  `class_teacher_idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question`
--

CREATE TABLE `question` (
  `idquestion` int(11) NOT NULL,
  `questionname` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_has_activity`
--

CREATE TABLE `question_has_activity` (
  `question_idquestion` int(11) NOT NULL,
  `activity_idactivity` int(11) NOT NULL,
  `activity_unity_idunity` int(11) NOT NULL,
  `activity_unity_class_idclass` int(11) NOT NULL,
  `activity_unity_class_teacher_idteacher` int(11) NOT NULL
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
(2, 'teacher');

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
  `class_idclass` int(11) NOT NULL,
  `role_idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `role_idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`idteacher`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`) VALUES
(1, '11111111-1', 'Belén Elizabeth', 'Pérez Durán', 'beped', '202cb962ac59075b964b07152d234b70', 'belen.perez04@inacapmail.cl', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unity`
--

CREATE TABLE `unity` (
  `idunity` int(11) NOT NULL,
  `unityname` varchar(45) NOT NULL,
  `class_idclass` int(11) NOT NULL,
  `class_teacher_idteacher` int(11) NOT NULL,
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`idactivity`,`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`),
  ADD UNIQUE KEY `activityname_UNIQUE` (`activityname`),
  ADD KEY `fk_activity_unity1_idx` (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`);

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`idanswer`);

--
-- Indices de la tabla `answer_has_question`
--
ALTER TABLE `answer_has_question`
  ADD PRIMARY KEY (`answer_idanswer`,`question_idquestion`),
  ADD KEY `fk_answer_has_question_question1_idx` (`question_idquestion`),
  ADD KEY `fk_answer_has_question_answer1_idx` (`answer_idanswer`);

--
-- Indices de la tabla `answer_has_value`
--
ALTER TABLE `answer_has_value`
  ADD PRIMARY KEY (`answer_idanswer`,`value_idvalue`),
  ADD KEY `fk_answer_has_value_value1_idx` (`value_idvalue`),
  ADD KEY `fk_answer_has_value_answer1_idx` (`answer_idanswer`);

--
-- Indices de la tabla `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`idclass`,`teacher_idteacher`),
  ADD KEY `fk_class_teacher1_idx` (`teacher_idteacher`);

--
-- Indices de la tabla `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`idexam`),
  ADD UNIQUE KEY `examname_UNIQUE` (`examname`);

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
-- Indices de la tabla `material_has_class`
--
ALTER TABLE `material_has_class`
  ADD PRIMARY KEY (`material_idmaterial`,`class_idclass`,`class_teacher_idteacher`),
  ADD KEY `fk_material_has_class_class1_idx` (`class_idclass`,`class_teacher_idteacher`),
  ADD KEY `fk_material_has_class_material1_idx` (`material_idmaterial`);

--
-- Indices de la tabla `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idquestion`);

--
-- Indices de la tabla `question_has_activity`
--
ALTER TABLE `question_has_activity`
  ADD PRIMARY KEY (`question_idquestion`,`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`),
  ADD KEY `fk_question_has_activity_activity1_idx` (`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`),
  ADD KEY `fk_question_has_activity_question1_idx` (`question_idquestion`);

--
-- Indices de la tabla `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`idrecord`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idstudent`,`class_idclass`,`role_idrole`),
  ADD UNIQUE KEY `idnumber_UNIQUE` (`idnumber`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `fk_student_class_idx` (`class_idclass`),
  ADD KEY `fk_student_role1_idx` (`role_idrole`);

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
  ADD PRIMARY KEY (`idteacher`,`role_idrole`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `rut_UNIQUE` (`idnumber`),
  ADD KEY `fk_teacher_role1_idx` (`role_idrole`);

--
-- Indices de la tabla `unity`
--
ALTER TABLE `unity`
  ADD PRIMARY KEY (`idunity`,`class_idclass`,`class_teacher_idteacher`,`exam_idexam`),
  ADD KEY `fk_unity_class1_idx` (`class_idclass`,`class_teacher_idteacher`),
  ADD KEY `fk_unity_exam1_idx` (`exam_idexam`);

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
  MODIFY `idactivity` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `idanswer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `idclass` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `exam`
--
ALTER TABLE `exam`
  MODIFY `idexam` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `question`
--
ALTER TABLE `question`
  MODIFY `idquestion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `record`
--
ALTER TABLE `record`
  MODIFY `idrecord` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `idstudent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teacher`
--
ALTER TABLE `teacher`
  MODIFY `idteacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `value`
--
ALTER TABLE `value`
  MODIFY `idvalue` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_activity_unity1` FOREIGN KEY (`unity_idunity`,`unity_class_idclass`,`unity_class_teacher_idteacher`) REFERENCES `unity` (`idunity`, `class_idclass`, `class_teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `answer_has_question`
--
ALTER TABLE `answer_has_question`
  ADD CONSTRAINT `fk_answer_has_question_answer1` FOREIGN KEY (`answer_idanswer`) REFERENCES `answer` (`idanswer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answer_has_question_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `answer_has_value`
--
ALTER TABLE `answer_has_value`
  ADD CONSTRAINT `fk_answer_has_value_answer1` FOREIGN KEY (`answer_idanswer`) REFERENCES `answer` (`idanswer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answer_has_value_value1` FOREIGN KEY (`value_idvalue`) REFERENCES `value` (`idvalue`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_class_teacher1` FOREIGN KEY (`teacher_idteacher`) REFERENCES `teacher` (`idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_material_materialtype1` FOREIGN KEY (`materialtype_idmaterialtype`) REFERENCES `materialtype` (`idmaterialtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material_has_class`
--
ALTER TABLE `material_has_class`
  ADD CONSTRAINT `fk_material_has_class_class1` FOREIGN KEY (`class_idclass`,`class_teacher_idteacher`) REFERENCES `class` (`idclass`, `teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_material_has_class_material1` FOREIGN KEY (`material_idmaterial`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `question_has_activity`
--
ALTER TABLE `question_has_activity`
  ADD CONSTRAINT `fk_question_has_activity_activity1` FOREIGN KEY (`activity_idactivity`,`activity_unity_idunity`,`activity_unity_class_idclass`,`activity_unity_class_teacher_idteacher`) REFERENCES `activity` (`idactivity`, `unity_idunity`, `unity_class_idclass`, `unity_class_teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_question_has_activity_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_class` FOREIGN KEY (`class_idclass`) REFERENCES `class` (`idclass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `student_has_record`
--
ALTER TABLE `student_has_record`
  ADD CONSTRAINT `fk_student_has_record_record1` FOREIGN KEY (`record_idrecord`) REFERENCES `record` (`idrecord`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_record_student1` FOREIGN KEY (`student_idstudent`,`student_class_idclass`) REFERENCES `student` (`idstudent`, `class_idclass`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `unity`
--
ALTER TABLE `unity`
  ADD CONSTRAINT `fk_unity_class1` FOREIGN KEY (`class_idclass`,`class_teacher_idteacher`) REFERENCES `class` (`idclass`, `teacher_idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unity_exam1` FOREIGN KEY (`exam_idexam`) REFERENCES `exam` (`idexam`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
