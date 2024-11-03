-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2024 a las 18:47:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--create database empresa;
--use empresa;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `sueldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `rut`, `nombre`, `edad`, `cargo`, `sueldo`) VALUES
(1, '18.516.976-6', 'Juan Pérez', 28, 'Analista de Sistemas', 550000),
(2, '23.456.789-0', 'María García', 35, 'Desarrollador Senior', 600000),
(3, '34.567.890-1', 'Carlos Martínez', 30, 'Diseñador Gráfico', 520000),
(4, '45.678.901-2', 'Laura Rodríguez', 27, 'Consultor Financiero', 580000),
(5, '56.789.012-3', 'Pedro López', 32, 'Ingeniero de Software', 650000),
(6, '67.890.123-4', 'Ana Ramírez', 29, 'Analista de Datos', 530000),
(7, '78.901.234-5', 'Luisa Gómez', 31, 'Gerente de Proyectos', 700000),
(8, '89.012.345-6', 'Jorge Torres', 34, 'Administrador de Redes', 620000),
(9, '90.123.456-7', 'Marina Díaz', 33, 'Especialista en Marketing', 580000),
(10, '01.234.567-8', 'Roberto Vargas', 36, 'Director de Operaciones', 750000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `terminos` tinyint(1) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `clave`, `terminos`, `fecha_registro`) VALUES
(9, 'María García', 'maria@example.com', 'segura456', 1, '2024-07-11 22:25:09'),
(10, 'Carlos Martínez', 'carlos@example.com', 'contraseña789', 1, '2024-07-11 22:25:09'),
(11, 'Laura Rodríguez', 'laura@example.com', 'clave_secreta', 1, '2024-07-11 22:25:09'),
(12, 'Pedro López', 'pedro@example.com', 'clave_pedro', 1, '2024-07-11 22:25:09'),
(13, 'Ana Ramírez', 'ana@example.com', 'ana123', 1, '2024-07-11 22:25:09'),
(14, 'Luisa Gómez', 'luisa@example.com', 'clave_luisa', 1, '2024-07-11 22:25:09'),
(15, 'Jorge Torres', 'jorge@example.com', 'jorge2023', 1, '2024-07-11 22:25:09'),
(16, 'Marina Díaz', 'marina@example.com', 'marina_pass', 1, '2024-07-11 22:25:09'),
(17, 'Roberto Vargas', 'roberto@example.com', 'roberto_clave', 1, '2024-07-11 22:25:09'),
(18, 'Italia Granger', 'granger@granger.com', '$2y$10$ddUNOLOZTvrOF.jd4I/9GOizOCJSaNeE6BigElQPswsbIY3Vxcr9i', 0, '2024-07-11 22:27:15'),
(19, 'Francia Granger', 'granger.francia@gmail.com', '$2y$10$D4XNVYP8l2pPBti6IQkgOuw9J9UNn/1eAg6Rf50YE5h9jQQJTOQA.', 1, '2024-07-12 01:18:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
