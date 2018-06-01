/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : sisnotas

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-04-19 10:20:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for configuracion
-- ----------------------------
DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_login` varchar(45) DEFAULT NULL,
  `conf_password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`conf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of configuracion
-- ----------------------------

-- ----------------------------
-- Table structure for curso
-- ----------------------------
DROP TABLE IF EXISTS `docente`;
CREATE TABLE `docente` (
  `doce_id` int(11) NOT NULL AUTO_INCREMENT,
  `doce_nombres` varchar(45) DEFAULT NULL,
  `doce_apellidos` varchar(45) DEFAULT NULL,
  `doce_area` varchar(45) DEFAULT NULL,
  `doce_login` varchar(45) DEFAULT NULL,
  `doce_password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`doce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `curs_id` int(11) NOT NULL AUTO_INCREMENT,
  `curs_doce_id` int(11) NOT NULL,
  `curs_nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`curs_id`),
  KEY `fk_curso_docente1_idx` (`curs_doce_id`),
  CONSTRAINT `fk_curso_docente1` FOREIGN KEY (`curs_doce_id`) REFERENCES `docente` (`doce_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of curso
-- ----------------------------

-- ----------------------------
-- Table structure for docente
-- ----------------------------

-- ----------------------------
-- Records of docente
-- ----------------------------
INSERT INTO `docente` VALUES ('2', 'Jose', 'Aguilar', 'Matematicas', 'jose', '12345');
INSERT INTO `docente` VALUES ('3', 'Carlos','Azaustre', 'Lenguaje', 'carlos', '12345');

-- ----------------------------
-- Table structure for estudiante
-- ----------------------------
DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante` (
  `estu_id` int(11) NOT NULL AUTO_INCREMENT,
  `estu_grado` int(11) NOT NULL,
  `estu_seccion` varchar(1) NOT NULL,
  `estu_nombre` varchar(45) DEFAULT NULL,
  `estu_apellidos` varchar(45) DEFAULT NULL,
  `estu_direccion` varchar(60) DEFAULT NULL,
  `estu_login` varchar(45) DEFAULT NULL,
  `estu_password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`estu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of estudiante
-- ----------------------------

-- ----------------------------
-- Table structure for notas
-- ----------------------------
DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas` (
  `nota_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_estu_id` int(11) NOT NULL,
  `nota_curs_id` int(11) NOT NULL,
  `nota_nota1` decimal(10,2) DEFAULT NULL,
  `nota_nota2` decimal(10,2) DEFAULT NULL,
  `nota_nota3` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`nota_id`),
  KEY `fk_notas_curso_idx` (`nota_curs_id`),
  KEY `fk_notas_estudiante1_idx` (`nota_estu_id`),
  CONSTRAINT `fk_notas_curso` FOREIGN KEY (`nota_curs_id`) REFERENCES `curso` (`curs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_estudiante1` FOREIGN KEY (`nota_estu_id`) REFERENCES `estudiante` (`estu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notas
-- ----------------------------
