-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2025 a las 15:10:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_pag1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(4) NOT NULL,
  `producto_id` int(4) NOT NULL,
  `descuento` int(3) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id`, `producto_id`, `descuento`, `estado`) VALUES
(6, 6, 12, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(50) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `tipo` int(4) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `tipo`, `imagen`) VALUES
(2, 'Hamburguesa de champiñones', 17000, 'Hamburguesa con champiñones, carne, pan, lechuga y queso', 1, 'f2.png'),
(6, 'Espagueti de champiñones', 12000, 'Espagueti de champiñones', 4, 'f4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(1) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `tipo`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(4) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `tipo`) VALUES
(1, 'Carnico'),
(4, 'Pastas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `usuarioN` varchar(50) NOT NULL,
  `tipoUsuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contraseña`, `usuarioN`, `tipoUsuario`) VALUES
(1, 'administrador', '135', 'admin', 1),
(10, 'Pepe', '123', 'pepe_12', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoUsuario` (`tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `descuentos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_producto` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
