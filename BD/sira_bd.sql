-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2018 a las 22:16:51
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sira_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talquiler`
--

CREATE TABLE `talquiler` (
  `fecha_alquiler` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_devolucion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `talquiler`
--

INSERT INTO `talquiler` (`fecha_alquiler`, `fecha_devolucion`, `numero_de_placa`, `dui`, `status`) VALUES
('24/10/2018', '31/10/2018', 'P989-988', '09894555-4', 0),
('24/10/2018', '30/10/2018', 'P980-454', '55466777-8', 0),
('24/10/2018', '24/10/2018', 'P787-444', '22233988-7', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbitacora`
--

CREATE TABLE `tbitacora` (
  `idbitacora` int(11) NOT NULL,
  `hora_inicio` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `idpersonal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclientes`
--

CREATE TABLE `tclientes` (
  `nombre` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `licencia_de_conducir` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(175) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tclientes`
--

INSERT INTO `tclientes` (`nombre`, `telefono`, `dui`, `licencia_de_conducir`, `direccion`, `genero`, `status`) VALUES
('Gloria Ines Mejia', '2333-2223', '09894555-4', '8899-988888-888-8', 'san bartolo san salvador ucran', 'F', 1),
('Ulises Daniel Martinez', '8884-4558', '22233988-7', '1234-888899-447-7', 'zacatecoluca la paz', 'M', 1),
('Gerson Bladimir Martinez Vazquez', '7666-6667', '55466777-8', '1010-011100-222-0', 'san salvador colonia loma linda distrito federal', 'M', 0),
('Katherine Rodriguez', '7323-4444', '90000444-4', '9009-445544-444-4', 'San Sebastian San vicente', 'M', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcontrol_bitacora`
--

CREATE TABLE `tcontrol_bitacora` (
  `idbitacora` int(11) NOT NULL,
  `actividad` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testado_vehiculo`
--

CREATE TABLE `testado_vehiculo` (
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfactura`
--

CREATE TABLE `tfactura` (
  `idfactura` int(11) NOT NULL,
  `fecha_emision` datetime NOT NULL,
  `importe` float NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmantenimiento`
--

CREATE TABLE `tmantenimiento` (
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tipomantenimiento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersonal`
--

CREATE TABLE `tpersonal` (
  `idpersonal` int(11) NOT NULL,
  `nombre` varchar(165) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(175) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `genero` varchar(2) NOT NULL,
  `email` varchar(165) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpersonal`
--

INSERT INTO `tpersonal` (`idpersonal`, `nombre`, `telefono`, `direccion`, `username`, `password`, `genero`, `email`, `status`) VALUES
(2, 'Francisco Javier Martinez Vazquez', '7256-5678', 'SAN PETES BURGO', 'clark', 'root', 'M', 'harvin_809@hotmail.com', 1),
(3, 'Dominga Mejia ', '7334-4335', 'san salvador san salvador distrito federal', 'inesm', 'root', 'F', 'bersafbe@hotmail.com', 0),
(4, 'Erick Antonio Ticas', '7844-9554', 'apastepeque el centro, departamento san vicente', 'tikistikis', 'cuenta', 'M', 'ticas@hotmail.com', 0),
(5, 'Juan Alfaro de martinez', '7756-4647', 'la avenida 69 la curazao', 'montoyajuan', 'root', 'F', 'demontoya@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprecios`
--

CREATE TABLE `tprecios` (
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tprecios`
--

INSERT INTO `tprecios` (`numero_de_placa`, `precio`) VALUES
('P111-111', 75),
('P980-454', 555),
('P989-988', 55),
('P787-444', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprecios_alquiler`
--

CREATE TABLE `tprecios_alquiler` (
  `idtprecios_alquiler` int(11) NOT NULL,
  `precio_alquiler_por_dia` float DEFAULT NULL,
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproductos`
--

CREATE TABLE `tproductos` (
  `idproducto` int(11) NOT NULL,
  `tipo` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `en_existencias` int(11) NOT NULL,
  `precio_unitario` float NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tproductos`
--

INSERT INTO `tproductos` (`idproducto`, `tipo`, `codigo`, `en_existencias`, `precio_unitario`, `idproveedor`, `precio_venta`, `fecha_venta`) VALUES
(2, 'MOTO', '77464', 1, 15, 4, 20, '2018-09-13'),
(3, 'MOTO', '20000', 0, 100, 4, 200, '2018-10-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedores`
--

CREATE TABLE `tproveedores` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tproveedores`
--

INSERT INTO `tproveedores` (`idproveedor`, `nombre`, `telefono`, `email`, `direccion`, `status`) VALUES
(4, 'AMERICA', '9918-8111', 'saul@hotmail.com', ' san miguel la avenida', 0),
(5, 'AMAROCK', '3333-3444', 'amarock@hotmail.com', 'san salvador colonia', 0),
(6, 'CHIASO', '5445-4544', 'asoidjf@hotmail.com', 'Ã±asidjfaipoi p apsoidjfiejq as', 0),
(7, 'STARI', '7746-7554', 'stari@hotmail.com', 'santa ana metapan', 0),
(8, 'RADIOCHACK', '7746-6464', 'radioch@hotmail.com', 'plaza mundo soyapango', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trevision`
--

CREATE TABLE `trevision` (
  `idrevision` int(11) NOT NULL,
  `fechasalida` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `encargadoservicio` int(11) NOT NULL,
  `servicio` text COLLATE utf8_spanish_ci NOT NULL,
  `numero_de_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tvehiculos`
--

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
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tvehiculos`
--

INSERT INTO `tvehiculos` (`numero_de_placa`, `marca`, `tipo`, `color`, `numeromotor`, `numerochasis`, `tipocombustible`, `imagen`, `imagen2`, `imagen3`, `imagen4`, `year`) VALUES
('P111-111', 'toyota hilux', 'camioneta', 'azul', '3232323323233443', '4344433333333333', 'Diesel', '../vehicles/c1.jpg', '../vehicles/c2.jpg', '../vehicles/c3.jpg', '../vehicles/c4.jpg', 2010),
('P787-444', 'toyota prado', 'camioneta', 'roja', '1222223333098777', '0999987744443332', 'Diesel', '../vehicles/Captura2.PNG', '../vehicles/CapturaHidro.PNG', '../vehicles/catura4.PNG', '../vehicles/f2.PNG', 2018),
('P980-454', 'hyunday elantra4', 'sedan', 'negro', '2222333334444444', '4444444499999999', 'Especial', '../vehicles/hilux2.jpg', '../vehicles/co1.jpg', '../vehicles/co4.jpg', '../vehicles/co3.jpg', 2010),
('P989-988', 'Honda civic', 'camioneta', 'cafe', '9545454545454545', '4544454545454545', 'Diesel', '../vehicles/holo plantilla.png', '../vehicles/holo plantilla.png', '../vehicles/holo plantilla.png', '../vehicles/holo plantilla.png', 2003);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tventas`
--

CREATE TABLE `tventas` (
  `idventa` int(11) NOT NULL,
  `cliente` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `garantia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `talquiler`
--
ALTER TABLE `talquiler`
  ADD KEY `fk_vehiculo` (`numero_de_placa`),
  ADD KEY `fk_dui` (`dui`);

--
-- Indices de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD PRIMARY KEY (`idbitacora`),
  ADD KEY `fk_personal` (`idpersonal`);

--
-- Indices de la tabla `tclientes`
--
ALTER TABLE `tclientes`
  ADD PRIMARY KEY (`dui`,`licencia_de_conducir`);

--
-- Indices de la tabla `tcontrol_bitacora`
--
ALTER TABLE `tcontrol_bitacora`
  ADD KEY `fk_bitacora` (`idbitacora`);

--
-- Indices de la tabla `testado_vehiculo`
--
ALTER TABLE `testado_vehiculo`
  ADD KEY `fk_estado` (`numero_de_placa`);

--
-- Indices de la tabla `tfactura`
--
ALTER TABLE `tfactura`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `fk_producto` (`idproducto`),
  ADD KEY `fk_personalt` (`idpersonal`);

--
-- Indices de la tabla `tmantenimiento`
--
ALTER TABLE `tmantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_numero_de_placa` (`numero_de_placa`);

--
-- Indices de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  ADD PRIMARY KEY (`idpersonal`);

--
-- Indices de la tabla `tprecios`
--
ALTER TABLE `tprecios`
  ADD KEY `fk_placa` (`numero_de_placa`);

--
-- Indices de la tabla `tprecios_alquiler`
--
ALTER TABLE `tprecios_alquiler`
  ADD PRIMARY KEY (`idtprecios_alquiler`),
  ADD KEY `fk_precio` (`numero_de_placa`);

--
-- Indices de la tabla `tproductos`
--
ALTER TABLE `tproductos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_proveedores` (`idproveedor`);

--
-- Indices de la tabla `tproveedores`
--
ALTER TABLE `tproveedores`
  ADD PRIMARY KEY (`idproveedor`,`nombre`);

--
-- Indices de la tabla `trevision`
--
ALTER TABLE `trevision`
  ADD PRIMARY KEY (`idrevision`),
  ADD KEY `fk_placavhiculo` (`numero_de_placa`);

--
-- Indices de la tabla `tvehiculos`
--
ALTER TABLE `tvehiculos`
  ADD PRIMARY KEY (`numero_de_placa`);

--
-- Indices de la tabla `tventas`
--
ALTER TABLE `tventas`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tfactura`
--
ALTER TABLE `tfactura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmantenimiento`
--
ALTER TABLE `tmantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tproductos`
--
ALTER TABLE `tproductos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tproveedores`
--
ALTER TABLE `tproveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `trevision`
--
ALTER TABLE `trevision`
  MODIFY `idrevision` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tventas`
--
ALTER TABLE `tventas`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `talquiler`
--
ALTER TABLE `talquiler`
  ADD CONSTRAINT `fk_dui` FOREIGN KEY (`dui`) REFERENCES `tclientes` (`dui`),
  ADD CONSTRAINT `fk_vehiculo` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`);

--
-- Filtros para la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD CONSTRAINT `fk_personal` FOREIGN KEY (`idpersonal`) REFERENCES `tpersonal` (`idpersonal`);

--
-- Filtros para la tabla `tcontrol_bitacora`
--
ALTER TABLE `tcontrol_bitacora`
  ADD CONSTRAINT `fk_bitacora` FOREIGN KEY (`idbitacora`) REFERENCES `tbitacora` (`idbitacora`);

--
-- Filtros para la tabla `testado_vehiculo`
--
ALTER TABLE `testado_vehiculo`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`);

--
-- Filtros para la tabla `tfactura`
--
ALTER TABLE `tfactura`
  ADD CONSTRAINT `fk_personalt` FOREIGN KEY (`idpersonal`) REFERENCES `tpersonal` (`idpersonal`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`idproducto`) REFERENCES `tproductos` (`idproducto`);

--
-- Filtros para la tabla `tmantenimiento`
--
ALTER TABLE `tmantenimiento`
  ADD CONSTRAINT `fk_numero_de_placa` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`);

--
-- Filtros para la tabla `tprecios`
--
ALTER TABLE `tprecios`
  ADD CONSTRAINT `fk_placa` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`);

--
-- Filtros para la tabla `tprecios_alquiler`
--
ALTER TABLE `tprecios_alquiler`
  ADD CONSTRAINT `fk_precio` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`);

--
-- Filtros para la tabla `tproductos`
--
ALTER TABLE `tproductos`
  ADD CONSTRAINT `fk_proveedores` FOREIGN KEY (`idproveedor`) REFERENCES `tproveedores` (`idproveedor`);

--
-- Filtros para la tabla `trevision`
--
ALTER TABLE `trevision`
  ADD CONSTRAINT `fk_placavhiculo` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
