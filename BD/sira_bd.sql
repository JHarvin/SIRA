SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS sira_bd;

USE sira_bd;

DROP TABLE IF EXISTS talquiler;

CREATE TABLE `talquiler` (
  `fecha_alquiler` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_devolucion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  KEY `fk_vehiculo` (`numero_de_placa`),
  KEY `fk_dui` (`dui`),
  CONSTRAINT `fk_dui` FOREIGN KEY (`dui`) REFERENCES `tclientes` (`dui`),
  CONSTRAINT `fk_vehiculo` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO talquiler VALUES("24/10/2018","31/10/2018","P989-988","09894555-4","1");
INSERT INTO talquiler VALUES("24/10/2018","30/10/2018","P980-454","55466777-8","1");
INSERT INTO talquiler VALUES("24/10/2018","24/10/2018","P787-444","22233988-7","1");
INSERT INTO talquiler VALUES("28/11/2018","30/11/2018","P111-111","90000444-4","1");
INSERT INTO talquiler VALUES("29/11/2018","04/12/2018","P989-988","09894555-4","1");
INSERT INTO talquiler VALUES("29/11/2018","06/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("30/11/2018","08/12/2018","P787-444","09894555-4","1");
INSERT INTO talquiler VALUES("30/11/2018","05/12/2018","P980-454","90000444-4","1");
INSERT INTO talquiler VALUES("19/12/2018","25/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("19/12/2018","31/12/2018","P787-444","09894555-4","1");
INSERT INTO talquiler VALUES("19/12/2018","31/12/2018","P989-988","55466777-8","1");
INSERT INTO talquiler VALUES("19/12/2018","25/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("20/12/2018","30/12/2018","P787-444","09894555-4","1");
INSERT INTO talquiler VALUES("19/12/2018","30/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("20/12/2018","31/12/2018","P787-444","09894555-4","1");
INSERT INTO talquiler VALUES("19/12/2018","31/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("21/12/2018","01/01/2019","P787-444","09894555-4","1");
INSERT INTO talquiler VALUES("19/12/2018","31/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("21/01/2019","29/01/2019","P787-444","09894555-4","1");
INSERT INTO talquiler VALUES("19/12/2018","31/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("20/12/2018","30/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("20/12/2018","30/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("20/12/2018","31/12/2018","P980-454","09894555-4","1");
INSERT INTO talquiler VALUES("20/12/2018","31/12/2018","P404-404","55466777-8","1");
INSERT INTO talquiler VALUES("20/12/2018","31/12/2018","P202-205","09894555-4","1");
INSERT INTO talquiler VALUES("20/12/2018","30/12/2018","P404-404","55466777-8","1");
INSERT INTO talquiler VALUES("20/12/2018","30/12/2018","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("20/12/2018","31/12/2018","P404-404","09894555-4","1");
INSERT INTO talquiler VALUES("03/01/2019","30/01/2019","P111-111","55466777-8","1");
INSERT INTO talquiler VALUES("09/01/2019","30/01/2019","P404-404","09894555-4","1");
INSERT INTO talquiler VALUES("15/01/2019","31/01/2019","P111-111","09894555-4","1");



DROP TABLE IF EXISTS tbitacora;

CREATE TABLE `tbitacora` (
  `idbitacora` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `acciones` text COLLATE utf8_spanish_ci NOT NULL,
  `idpersonal` int(11) NOT NULL,
  PRIMARY KEY (`idbitacora`),
  KEY `fk_personal` (`idpersonal`),
  CONSTRAINT `fk_personal` FOREIGN KEY (`idpersonal`) REFERENCES `tpersonal` (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tbitacora VALUES("6","2019-01-11 23:38:11","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("7","2019-01-11 23:47:36","Se actualizo el precio de alquiler del vehiculo placas: P202-205 a un precio de: 27","2");
INSERT INTO tbitacora VALUES("8","2019-01-11 23:48:24","Se actualizo el precio de alquiler del vehiculo placas: P202-205 a un precio de: 22","2");
INSERT INTO tbitacora VALUES("9","2019-01-12 00:11:45","Se actualizo el precio de alquiler del vehiculo placas: P787-444 a un precio de: 15","2");
INSERT INTO tbitacora VALUES("10","2019-01-12 00:42:06","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("11","2019-01-12 10:02:19","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("12","2019-01-12 10:02:38","Se actualizo el precio de alquiler del vehiculo placas: P404-404 a un precio de: 25","2");
INSERT INTO tbitacora VALUES("13","2019-01-13 12:04:34","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("14","2019-01-13 15:43:41","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("15","2019-01-14 14:26:55","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("16","2019-01-14 15:23:34","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("17","2019-01-14 17:16:51","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("18","2019-01-14 21:54:04","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("19","2019-01-15 09:23:30","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("20","2019-01-15 11:10:33","Inicio de sesiÃ³n","2");
INSERT INTO tbitacora VALUES("21","2019-01-15 11:23:37","Se realizÃ³ el registro de una bateria ","2");
INSERT INTO tbitacora VALUES("22","2019-01-15 11:28:11","Se realizÃ³ el registro de una bateria ","2");
INSERT INTO tbitacora VALUES("23","2019-01-15 11:29:47","Se realizÃ³ el registro de una bateria ","2");
INSERT INTO tbitacora VALUES("24","2019-01-15 11:30:09","Se realizÃ³ el registro de una bateria ","2");



DROP TABLE IF EXISTS tclientes;

CREATE TABLE `tclientes` (
  `nombre` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `licencia_de_conducir` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(175) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`dui`,`licencia_de_conducir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tclientes VALUES("Gloria Ines Mejia","2333-2223","09894555-4","8899-988888-888-8","san bartolo san salvador ucran","F","1");
INSERT INTO tclientes VALUES("Ulises Daniel Martinez","8884-4558","22233988-7","1234-888899-447-7","zacatecoluca la paz","M","1");
INSERT INTO tclientes VALUES("Gerson Bladimir Martinez Vazquez","7666-6667","55466777-8","1010-011100-222-0","san salvador colonia loma linda distrito federal","M","0");
INSERT INTO tclientes VALUES("Katherine Rodriguez","7323-4444","90000444-4","9009-445544-444-4","San Sebastian San vicente","M","0");



DROP TABLE IF EXISTS tcontrol_bitacora;

CREATE TABLE `tcontrol_bitacora` (
  `idbitacora` int(11) NOT NULL,
  `actividad` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `hora` datetime NOT NULL,
  KEY `fk_bitacora` (`idbitacora`),
  CONSTRAINT `fk_bitacora` FOREIGN KEY (`idbitacora`) REFERENCES `tbitacora` (`idbitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS tdevoluciones;

CREATE TABLE `tdevoluciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `importe` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fin` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tdevoluciones VALUES("28","44444 ","CHIASO","11.11","2019-01-29","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("29","32F2R","STARI","0","2018-11-29","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("30","10086","AMERICA","0","2018-11-29","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("31","44444","CHIASO","","2018-11-30","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("32","99922","STARI","0","2018-11-30","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("33","20000","AMAROCK","0","2019-11-30","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("34","10000","AMERICA","0","0000-00-00","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("35","77E8E","AMAROCK","0","2019-01-13","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("36","50333","RAYO","0","2019-01-13","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("37","91919","RAYO","0","2019-01-13","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("38","20199","RAYO","0","0000-00-00","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("39","22222","RAYO","0","2019-01-13","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("40","12121","SANGL","0","0000-00-00","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("41","77565","SANGL","0","0000-00-00","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("42","22333","SANGL","0","2019-01-14","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("43","09822","SANGL","0","2019-01-14","DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("44","22333","SANGL","0","0000-00-00","NO DEVUELTA","","");
INSERT INTO tdevoluciones VALUES("45","43553","SANGL","0","0000-00-00","NO DEVUELTA","43553","");
INSERT INTO tdevoluciones VALUES("46","43553","SANGL","0","2019-01-15","NO DEVUELTA","12133","");
INSERT INTO tdevoluciones VALUES("47","12133","SANGL","0","0000-00-00","NO DEVUELTA","12133","");
INSERT INTO tdevoluciones VALUES("48","12133","SANGL","0","0000-00-00","NO DEVUELTA","00999","");
INSERT INTO tdevoluciones VALUES("49","00999","SANGL","0","0000-00-00","DEVUELTA","00999","15/01/2019");
INSERT INTO tdevoluciones VALUES("50","00999","SANGL","0","0000-00-00","DEVUELTA","Jackeline Rodriguez","15/01/2019");



DROP TABLE IF EXISTS testado_vehiculo;

CREATE TABLE `testado_vehiculo` (
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  KEY `fk_estado` (`numero_de_placa`),
  CONSTRAINT `fk_estado` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS tfactura;

CREATE TABLE `tfactura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_emision` datetime NOT NULL,
  `importe` float NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  PRIMARY KEY (`idfactura`),
  KEY `fk_producto` (`idproducto`),
  KEY `fk_personalt` (`idpersonal`),
  CONSTRAINT `fk_personalt` FOREIGN KEY (`idpersonal`) REFERENCES `tpersonal` (`idpersonal`),
  CONSTRAINT `fk_producto` FOREIGN KEY (`idproducto`) REFERENCES `tproductos` (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS tkilometraje;

CREATE TABLE `tkilometraje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cada_cuantos_meses_revision` int(11) NOT NULL,
  `cada_cuantos_kilometros` int(11) NOT NULL,
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_placa_km` (`numero_de_placa`),
  CONSTRAINT `fk_placa_km` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tkilometraje VALUES("5","6","2000","P111-111","2018-11-30 00:29:21");
INSERT INTO tkilometraje VALUES("6","3","55555","P787-444","2018-11-30 00:29:28");
INSERT INTO tkilometraje VALUES("7","5","4000","P111-111","2018-11-30 00:29:33");
INSERT INTO tkilometraje VALUES("8","1","6000","P980-454","2018-12-18 21:08:59");
INSERT INTO tkilometraje VALUES("11","5","5","P980-454","2018-11-30 00:21:17");
INSERT INTO tkilometraje VALUES("12","5","5000","P980-454","2018-12-20 10:41:21");



DROP TABLE IF EXISTS tmantenimiento;

CREATE TABLE `tmantenimiento` (
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tipomantenimiento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_numero_de_placa` (`numero_de_placa`),
  CONSTRAINT `fk_numero_de_placa` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tmantenimiento VALUES("P980-454","30/11/2018","Preventivo","0","7");
INSERT INTO tmantenimiento VALUES("P980-454","30/11/2018","Correctivo","0","8");
INSERT INTO tmantenimiento VALUES("P980-454","30/11/2018","Preventivo","0","9");
INSERT INTO tmantenimiento VALUES("P980-454","19/12/2018","Preventivo","0","10");
INSERT INTO tmantenimiento VALUES("P980-454","19/12/2018","Correctivo","0","11");
INSERT INTO tmantenimiento VALUES("P980-454","19/12/2018","Kilometraje","0","12");
INSERT INTO tmantenimiento VALUES("P111-111","20/12/2018","Correctivo","0","13");
INSERT INTO tmantenimiento VALUES("P111-111","20/12/2018","Preventivo","0","14");
INSERT INTO tmantenimiento VALUES("P989-988","20/12/2018","Preventivo","0","15");
INSERT INTO tmantenimiento VALUES("P980-454","20/12/2018","Preventivo","0","16");
INSERT INTO tmantenimiento VALUES("P404-404","20/12/2018","Preventivo","0","17");
INSERT INTO tmantenimiento VALUES("P202-205","20/12/2018","Preventivo","0","18");
INSERT INTO tmantenimiento VALUES("P787-444","20/12/2018","Preventivo","0","19");
INSERT INTO tmantenimiento VALUES("P202-205","20/12/2018","Preventivo","0","20");
INSERT INTO tmantenimiento VALUES("P980-454","20/12/2018","Preventivo","0","21");
INSERT INTO tmantenimiento VALUES("P980-454","20/12/2018","Preventivo","0","22");
INSERT INTO tmantenimiento VALUES("P989-988","20/12/2018","Preventivo","0","23");
INSERT INTO tmantenimiento VALUES("P989-988","20/12/2018","Preventivo","0","24");
INSERT INTO tmantenimiento VALUES("P989-988","20/12/2018","Preventivo","0","25");



DROP TABLE IF EXISTS tpersonal;

CREATE TABLE `tpersonal` (
  `idpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(165) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(175) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `genero` varchar(2) NOT NULL,
  `email` varchar(165) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO tpersonal VALUES("2","Francisco Javier Martinez Vazquez","7256-5678","SAN PETES BURGO","clark","root","M","jeffethramos@gmail.com","1");
INSERT INTO tpersonal VALUES("3","Dominga Mejia ","7334-4335","san salvador san salvador distrito federal","inesm","root","F","bersafbe@hotmail.com","0");
INSERT INTO tpersonal VALUES("4","Erick Antonio Ticas","7844-9554","apastepeque el centro, departamento san vicente","tikistikis","cuenta","M","ticas@hotmail.com","0");
INSERT INTO tpersonal VALUES("5","Juan Alfaro de martinez","7756-4647","la avenida 69 la curazao","montoyajuan","root","F","demontoya@hotmail.com","0");
INSERT INTO tpersonal VALUES("6","Mayra Beatriz Quintanilla","7212-2221","calle a san miguel puente cuscatlan","mayquinta","pinocha","F","mayraguzman093@hotmail.com","1");
INSERT INTO tpersonal VALUES("7","Erick Alexander Ticas Prad","7764-7484","san vicente colonia el progreso","pradticas","root","M","erickticas7@gmail.com","1");
INSERT INTO tpersonal VALUES("8","Mayra Beatriz Flores","7766-4554","puente cuscatlan san miguel","quintanilla","root","F","mbqg93@gmail.com","1");
INSERT INTO tpersonal VALUES("9","Saul Arcangel Reyes","7757-5884","colonia santa maria san sebastian san vicente","kaneki","kaneki","M","saulr1016.sr@gmail.com","1");



DROP TABLE IF EXISTS tprecios;

CREATE TABLE `tprecios` (
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  KEY `fk_placa` (`numero_de_placa`),
  CONSTRAINT `fk_placa` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tprecios VALUES("P111-111","25");
INSERT INTO tprecios VALUES("P980-454","25");
INSERT INTO tprecios VALUES("P989-988","55");
INSERT INTO tprecios VALUES("P787-444","15");
INSERT INTO tprecios VALUES("P404-404","25");
INSERT INTO tprecios VALUES("P202-205","22");



DROP TABLE IF EXISTS tprecios_alquiler;

CREATE TABLE `tprecios_alquiler` (
  `idtprecios_alquiler` int(11) NOT NULL,
  `precio_alquiler_por_dia` float DEFAULT NULL,
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtprecios_alquiler`),
  KEY `fk_precio` (`numero_de_placa`),
  CONSTRAINT `fk_precio` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS tproductos;

CREATE TABLE `tproductos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `en_existencias` int(11) NOT NULL,
  `precio_unitario` float NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `fecha_venta` date NOT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_proveedores` (`idproveedor`),
  CONSTRAINT `fk_proveedores` FOREIGN KEY (`idproveedor`) REFERENCES `tproveedores` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tproductos VALUES("5","AUTO","YY666","0","66","4","88","2019-01-15");
INSERT INTO tproductos VALUES("6","AUTO","I8755","0","77","10","222","2019-01-15");



DROP TABLE IF EXISTS tproveedores;

CREATE TABLE `tproveedores` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idproveedor`,`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tproveedores VALUES("4","AMERICA","9918-8111","saul@hotmail.com"," san miguel la avenida","0");
INSERT INTO tproveedores VALUES("5","AMAROCK","3333-3444","amarock@hotmail.com","san salvador colonia","0");
INSERT INTO tproveedores VALUES("6","CHIASO","5445-4544","asoidjf@hotmail.com","Ã±asidjfaipoi p apsoidjfiejq as","0");
INSERT INTO tproveedores VALUES("7","STARI","7746-7554","stari@hotmail.com","santa ana metapan","0");
INSERT INTO tproveedores VALUES("8","RADIOCHACK","7746-6464","radioch@hotmail.com","plaza mundo soyapango","0");
INSERT INTO tproveedores VALUES("9","RAYO","7759-9595","rayo@rayo.com","san salvador vulevar venezuela","0");
INSERT INTO tproveedores VALUES("10","SANGL","8475-9009","sangl@yahoo.com","san salvador calle loma linda","0");



DROP TABLE IF EXISTS trevision;

CREATE TABLE `trevision` (
  `idrevision` int(11) NOT NULL AUTO_INCREMENT,
  `fechasalida` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `encargadoservicio` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `servicio` text COLLATE utf8_spanish_ci NOT NULL,
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idrevision`),
  KEY `fk_placavhiculo` (`numero_de_placa`),
  CONSTRAINT `fk_placavhiculo` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO trevision VALUES("7","14/12/2018","Jonathan Eulises","reparacion por choque de vehiculos","P980-454","1");
INSERT INTO trevision VALUES("8","08/12/2018","Alejandro Garcia","cambio de aceite","P980-454","1");
INSERT INTO trevision VALUES("9","05/12/2018","Raul Ramos","cambio de bujillas","P980-454","1");
INSERT INTO trevision VALUES("10","28/12/2018","Nelson Morales Bonilla","revision de aceite, power, y caja de velocidades","P980-454","1");
INSERT INTO trevision VALUES("12","27/12/2018","Sonia Felicita Alfaro","cambio de timon y caja automatica por secuencial","P980-454","1");
INSERT INTO trevision VALUES("13","28/12/2018","Marcelo Larin","cambio de baleros de las llantas, cambio de aire acondicionado y ajuste de motor","P111-111","1");
INSERT INTO trevision VALUES("14","28/12/2018","Alvaro Rivas","chekeo de llantas, aceite","P111-111","1");
INSERT INTO trevision VALUES("15","29/12/2018","Raul Ramos","revision normal","P989-988","1");
INSERT INTO trevision VALUES("16","27/12/2018","Edgardo Ramos","revison por ruido del motor","P980-454","1");
INSERT INTO trevision VALUES("17","27/12/2018","Sandra Yesenia Landaverde","revison de motor","P404-404","1");
INSERT INTO trevision VALUES("18","31/12/2018","Oscar Batres","cambio de aceite","P202-205","1");
INSERT INTO trevision VALUES("19","29/12/2018","Samuel Orellana","cambio de aceite de motor y de caja","P787-444","0");
INSERT INTO trevision VALUES("20","03/01/2019","Oscar Antonio Flores Batres","cambio de pastillas","P202-205","0");
INSERT INTO trevision VALUES("21","26/12/2018","Alexis flores","reparacino de llanta pinchada","P989-988","1");



DROP TABLE IF EXISTS tvehiculos;

CREATE TABLE `tvehiculos` (
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(65) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `numeromotor` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `numerochasis` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `tipocombustible` varchar(65) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `imagen2` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `imagen3` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `imagen4` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`numero_de_placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tvehiculos VALUES("P111-111","toyota hilux","camioneta","azul","3232323323233443","4344433333333333","Diesel","../vehicles/toyota1.jpg","../vehicles/toyota2.jpg","../vehicles/toyota3.jpg","../vehicles/c1.jpg","2010");
INSERT INTO tvehiculos VALUES("P202-205","nissan sentra b15 ","sedan","verde oscuro","0094776674838374","5545548939398838","Especial","../vehicles/aviso.jpg","../vehicles/mitsu2.jpg","../vehicles/Grid Graphic Design Course Certificate (2).png","../vehicles/mitsu.jpg","2002");
INSERT INTO tvehiculos VALUES("P404-404","mitsubichi lancer","sedan","azul","1223344485854995","0099887333444222","Especial","../vehicles/LogoSample_ByTailorBrands.jpg","../vehicles/tech.jpg","../vehicles/technology_background_blue_flat_backdrop_round_branches_decoration_6827658.jpg","../vehicles/Grid Graphic Design Course Certificate.png","2012");
INSERT INTO tvehiculos VALUES("P787-444","toyota prado","camioneta","roja","1222223333098777","0999987744443332","Diesel","../vehicles/sentra2.jpg","../vehicles/CapturaHidro.PNG","../vehicles/catura4.PNG","../vehicles/f2.PNG","2018");
INSERT INTO tvehiculos VALUES("P980-454","hyunday elantra4","sedan","negro","2222333334444444","4444444499999999","Especial","../vehicles/hilux2.jpg","../vehicles/co1.jpg","../vehicles/co4.jpg","../vehicles/co3.jpg","2010");
INSERT INTO tvehiculos VALUES("P989-988","Honda civic","camioneta","cafe","9545454545454545","4544454545454545","Diesel","../vehicles/holo plantilla.png","../vehicles/holo plantilla.png","../vehicles/holo plantilla.png","../vehicles/holo plantilla.png","2003");



DROP TABLE IF EXISTS tventas;

CREATE TABLE `tventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `garantia` int(11) NOT NULL,
  PRIMARY KEY (`idventa`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tventas VALUES("17","qqqqqqq","aaaaaaa","2018-11-29","89898","MOTO","4","20","0");
INSERT INTO tventas VALUES("21","","","2018-11-30","89898","AUTO","4","66.66","0");
INSERT INTO tventas VALUES("22","Gerson Bladimir","Colonia Santa Maria Ostuma","2019-01-12","89898","AUTO","5","99.99","6");
INSERT INTO tventas VALUES("23","Juan Perez","Ilobasco CabaÃ±as","2019-01-13","89898","AUTO","9","99.99","4");
INSERT INTO tventas VALUES("24","Marcia Aguilar","colonia los cocos san salvador","2019-01-13","89898","AUTO","9","99.99","3");
INSERT INTO tventas VALUES("25","William Medrano","Ilobasco CabaÃ±as","2019-01-13","89898","AUTO","9","90","3");
INSERT INTO tventas VALUES("26","Machado","santo domingo","2019-01-13","89898","AUTO","6","75.55","4");
INSERT INTO tventas VALUES("27","Samuel","santo domingo","2019-01-13","89898","AUTO","9","33.33","5");
INSERT INTO tventas VALUES("28","Claudia Casco","San Salvador","2019-01-14","89898","AUTO","9","90","6");
INSERT INTO tventas VALUES("29","Mayra Carolina","puente cuscatlan","2019-01-14","YY666","AUTO","10","55.55","6");
INSERT INTO tventas VALUES("30","Yanci Flores","san miguel","2019-01-14","YY666","AUTO","10","55.55","6");
INSERT INTO tventas VALUES("31","Jackeline Rodriguez","San Sebastian San Vicente colonia santa fe","2019-01-15","YY666","AUTO","10","200","6");



SET FOREIGN_KEY_CHECKS=1;