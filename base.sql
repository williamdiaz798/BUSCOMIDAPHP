-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 06:32:50
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbobuscomida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcateria`
--

create database dbobuscomida;
use dbobuscomida;

CREATE TABLE `tblcateria` (
  `IdCateria` varchar(25) NOT NULL,
  `NombreCateria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcateria`
--

INSERT INTO `tblcateria` (`IdCateria`, `NombreCateria`) VALUES
('1', 'Tipica'),
('2', 'Postres'),
('3', 'Cafeterias'),
('4', 'China'),
('5', 'Mexicana'),
('6', 'Rapida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpreferencias`
--

CREATE TABLE `tblpreferencias` (
  `Idusuario` varchar(25) DEFAULT NULL,
  `IdCateria` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpreferencias`
--

INSERT INTO `tblpreferencias` (`Idusuario`, `IdCateria`) VALUES
('1', '1'),
('2', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrestaurante`
--

CREATE TABLE `tblrestaurante` (
  `IdRestaurante` varchar(25) NOT NULL,
  `NombreRestaurante` varchar(50) DEFAULT NULL,
  `LatRestaurante` varchar(60) DEFAULT NULL,
  `LogRestaurante` varchar(60) DEFAULT NULL,
  `EspecialidadRestaurante` varchar(100) DEFAULT NULL,
  `IdCategoria` varchar(25) DEFAULT NULL,
  `DireccionRestaurante` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblrestaurante`
--

INSERT INTO `tblrestaurante` (`IdRestaurante`, `NombreRestaurante`, `LatRestaurante`, `LogRestaurante`, `EspecialidadRestaurante`, `IdCategoria`, `DireccionRestaurante`) VALUES
('1', 'Tortas el Zarco', '13.699542', '-89.201453', 'La Correcta', '6', 'Condominio Plaza Orleans, Calle Arce, San Salvador'),
('10', 'Mondon\'s', '13.700763', '-89.201811', 'Tipicos', '1', 'Edificio Benito Juarez, Calle Arce, San Salvador'),
('11', 'China Wok', '13.704602', '-89.214130', 'Wok', '4', 'Alameda Juan Pablo II, San Salvador'),
('12', 'Panda Express', '13.706970', '-89.211804', 'Chao Mein', '4', 'Alameda Juan Pablo II, Metrocentro, San Salvador'),
('13', 'Don Li', '13.694792', '-89.243214', 'Spicy Ramen', '4', 'Bulevar Del Hipodromo 613, San Salvador'),
('14', 'Pizza Nova', '13.699718', '-89.222672', 'Pizza Casera', '6', '63 Avenida Sur 1, San Salvador'),
('15', 'Pizza Hut', '13.701335', '-89.221813', '4 Estaciones', '6', 'Alameda Franklin Delano Roosevelt 2, San Salvador'),
('16', 'Pizza Bambinos', '13.700352', '-89.201150', 'Familiar', '1', 'Condominio Plaza Orleans, Calle Arce, San Salvador'),
('17', 'Burguer King', '13.699927', '-89.209011', 'Whopper', '6', '35 Avenida Norte 145, San Salvador'),
('18', 'Wendys', '13.700769', '-89.221253', 'Melt', '6', 'Alameda Franklin Delano Roosevelt 2, San Salvador'),
('19', 'Santa Burguesa', '13.704816', '-89.211805', 'La Perfecta', '6', 'Bulevar De Los Heroes 49, San Salvador'),
('2', 'Tortas el chino', '13.701360', '-89.201182', 'Torta Loca', '6', '19 Av Norte, San Salvador'),
('20', 'El Rosario UTEC', '13.700709', '-89.201586', 'Tamales', '2', 'Edificio Benito Juarez, Calle Arce, San Salvador'),
('21', 'Cafeteria UTEC', '13.700785', '-89.200441', 'Sandwich', '1', 'Edificio Sim?n Bol?var - Escuela de Derecho, Calle Arce 1114, San Salvador'),
('22', 'Mister Donut', '13.700058', '-89.202115', 'Donas con cucas', '2', 'Calle Arce, San Salvador'),
('3', 'Tortas Eli', '13.701584', '-89.201123', 'Completa', '6', '19 Av Norte, San Salvador'),
('4', 'Tortas el chino Memo', '13.701032', '-89.200173', 'El Chino', '6', '1a C Poniente 1040, San Salvador'),
('5', 'Krisppy\'s\r\n', '13.707746\r\n', '-89.236605\r\n', 'Pizza Krisppys', '6', '81 Avenida Nte 619, San Salvador\r\n'),
('6', 'El Horno di Fab\r\n', '13.676453\r\n', '-89.254306\r\n', 'La Calzone', '6', 'Carr. Panamericana 14, Cd Merliot\r\n'),
('7', 'Olive Garden\r\n', '13.676832\r\n', '-89.254011\r\n', 'Spaguetti', '1', 'Carr. Panamericana 14, Cd Merliot\r\n'),
('8', 'Deli Arce\r\n', '13.700080\r\n', '-89.200727\r\n', 'Pupusas', '1', 'Calle Arce 1114, San Salvador\r\n'),
('9', 'Pupuseria \"El Camioncito\"\r\n', '13.701435\r\n', '-89.201162\r\n', 'Pupusas', '1', '19 Av Norte, San Salvador\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipousuario`
--

CREATE TABLE `tbltipousuario` (
  `IdTipoUsuario` varchar(25) NOT NULL,
  `NombreTipoUsuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbltipousuario`
--

INSERT INTO `tbltipousuario` (`IdTipoUsuario`, `NombreTipoUsuario`) VALUES
('1', 'Administrador'),
('2', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `IdUsuario` varchar(25) NOT NULL,
  `NombreUsuario` varchar(50) DEFAULT NULL,
  `TipoUsuario` varchar(25) DEFAULT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`IdUsuario`, `NombreUsuario`, `TipoUsuario`, `Password`) VALUES
('1', 'William Diaz', '2', 'CB42B30B5E843E1F26C1E80932AD921521695D2A2C4269FF1AB3F568F17CA17F'),
('2', 'Jose Perez', '2', 'C8A035AC02E4DF0DFC93CB3D2F36B9DC35D014FA1E69E59751EF31552A051738'),
('3', 'William Ernesto Diaz', '1', 'A59117BDDA89F85792058F11A9112B7A27749F4B9461250E2A13EE547FDD4FFE'),
('4', 'Kiore Ryze', '1', '13f6de4446f04e6c1b716480a69d603edc223a01dd2b8632b5dfbc4b21271898'),
('5', 'Algorythm Riven', '2', '13f6de4446f04e6c1b716480a69d603edc223a01dd2b8632b5dfbc4b21271898');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcateria`
--
ALTER TABLE `tblcateria`
  ADD PRIMARY KEY (`IdCateria`);

--
-- Indices de la tabla `tblpreferencias`
--
ALTER TABLE `tblpreferencias`
  ADD KEY `Idusuario` (`Idusuario`),
  ADD KEY `IdCateria` (`IdCateria`);

--
-- Indices de la tabla `tblrestaurante`
--
ALTER TABLE `tblrestaurante`
  ADD PRIMARY KEY (`IdRestaurante`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `tbltipousuario`
--
ALTER TABLE `tbltipousuario`
  ADD PRIMARY KEY (`IdTipoUsuario`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `TipoUsuario` (`TipoUsuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblpreferencias`
--
ALTER TABLE `tblpreferencias`
  ADD CONSTRAINT `tblpreferencias_ibfk_1` FOREIGN KEY (`Idusuario`) REFERENCES `tblusuarios` (`IdUsuario`),
  ADD CONSTRAINT `tblpreferencias_ibfk_2` FOREIGN KEY (`IdCateria`) REFERENCES `tblcateria` (`IdCateria`);

--
-- Filtros para la tabla `tblrestaurante`
--
ALTER TABLE `tblrestaurante`
  ADD CONSTRAINT `tblrestaurante_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `tblcateria` (`IdCateria`);

--
-- Filtros para la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`TipoUsuario`) REFERENCES `tbltipousuario` (`IdTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
