-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2018 a las 03:58:56
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
('24/10/2018', '24/10/2018', 'P111-111', '90000444-4', 0);

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
('Gloria Ines Mejia', '7778-8888', '09894555-4', '1009-223332-225-5', 'san bartolo san salvador', 'F', 0),
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
(3, 'Dominga Bersabe Mejia', '7334-4333', 'san salvador san salvador c', 'bersabe', 'root', 'F', 'bersabe@hotmail.com', 1),
(4, 'Erick Antonio Ticas', '7844-9554', 'apastepeque el centro, departamento san vicente', 'tikistikis', 'cuenta', 'M', 'ticas@hotmail.com', 0);

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
(3, 'auto', '20000', 0, 45, 4, 50, '2018-09-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedores`
--

CREATE TABLE `tproveedores` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(165) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tproveedores`
--

INSERT INTO `tproveedores` (`idproveedor`, `nombre`, `telefono`, `email`, `direccion`) VALUES
(4, 'AMERICA', '9918-8111', 'saul@hotmail.com', ' san miguel la avenida');

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
('P111-111', 'toyota hilux', 'pick up', 'blanco', '3232323323233443', '4344433333333333', 'Diesel', '../vehicles/c1.jpg', '../vehicles/c2.jpg', '../vehicles/c3.jpg', '../vehicles/c4.jpg', 2010);

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
-- Indices de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  ADD PRIMARY KEY (`idpersonal`);

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
-- Indices de la tabla `tvehiculos`
--
ALTER TABLE `tvehiculos`
  ADD PRIMARY KEY (`numero_de_placa`);

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
-- AUTO_INCREMENT de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tproductos`
--
ALTER TABLE `tproductos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tproveedores`
--
ALTER TABLE `tproveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Filtros para la tabla `tprecios_alquiler`
--
ALTER TABLE `tprecios_alquiler`
  ADD CONSTRAINT `fk_precio` FOREIGN KEY (`numero_de_placa`) REFERENCES `tvehiculos` (`numero_de_placa`);

--
-- Filtros para la tabla `tproductos`
--
ALTER TABLE `tproductos`
  ADD CONSTRAINT `fk_proveedores` FOREIGN KEY (`idproveedor`) REFERENCES `tproveedores` (`idproveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
