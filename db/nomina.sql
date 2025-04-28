-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2025 a las 14:50:30
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
-- Base de datos: `nomina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `estado_civil` varchar(20) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `banco` varchar(100) DEFAULT NULL,
  `tipo_cuenta` varchar(50) DEFAULT NULL,
  `numero_cuenta` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre_completo`, `numero_identificacion`, `fecha_nacimiento`, `direccion`, `telefono`, `correo_electronico`, `estado_civil`, `nacionalidad`, `banco`, `tipo_cuenta`, `numero_cuenta`, `created_at`, `updated_at`) VALUES
(1, 'oscar gomez', '84091548', '1982-03-28', 'kra 13 #18-46', '3017683510', 'ogringenieria@gmail.com', 'union_libre', 'colombiano', 'davivienda', 'ahorros', '123456783212', '2025-04-24 22:08:39', '2025-04-24 22:08:39'),
(2, 'jose gomez', '23435456', '1991-02-07', 'kra 13 #18-46', '3017683510', 'josegomez@gmail.com', 'casado', 'colombiano', 'bancolombia', 'ahorros', '123242435', '2025-04-25 00:41:42', '2025-04-25 00:41:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_detalles`
--

CREATE TABLE `empleado_detalles` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `salario_base` decimal(10,2) NOT NULL,
  `frecuencia_pago` varchar(50) NOT NULL,
  `horario_trabajo` varchar(100) DEFAULT NULL,
  `eps` varchar(100) DEFAULT NULL,
  `afp` varchar(100) DEFAULT NULL,
  `caja_compensacion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo_contrato_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado_detalles`
--

INSERT INTO `empleado_detalles` (`id`, `empleado_id`, `fecha_contratacion`, `departamento`, `cargo`, `salario_base`, `frecuencia_pago`, `horario_trabajo`, `eps`, `afp`, `caja_compensacion`, `created_at`, `updated_at`, `tipo_contrato_id`) VALUES
(1, 2, '2025-04-01', 'contabilidad', 'contador', 3000000.00, 'Mensual', 'Lunes a viernes, 8:00 AM - 5:00 PM', '0', 'Colfondos', 'Comfama', '2025-04-25 00:42:43', '2025-04-26 04:40:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1745526680),
('m250424_202938_create_empleados_table', 1745527135),
('m250424_234546_create_empleado_detalles_table', 1745538913),
('m250426_034505_create_tipo_contrato_table', 1745642349),
('m250426_042449_add_foreign_key_to_empleado_detalles', 1745642628);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id`, `nombre`) VALUES
(4, 'Aprendizaje'),
(2, 'Fijo'),
(1, 'Indefinido'),
(3, 'Por obra o labor'),
(5, 'Temporal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_identificacion` (`numero_identificacion`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD KEY `idx-empleados-numero_identificacion` (`numero_identificacion`),
  ADD KEY `idx-empleados-nombre_completo` (`nombre_completo`),
  ADD KEY `idx-empleados-correo_electronico` (`correo_electronico`);

--
-- Indices de la tabla `empleado_detalles`
--
ALTER TABLE `empleado_detalles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empleado_id` (`empleado_id`),
  ADD KEY `fk-empleado_detalles-tipo_contrato_id` (`tipo_contrato_id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleado_detalles`
--
ALTER TABLE `empleado_detalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado_detalles`
--
ALTER TABLE `empleado_detalles`
  ADD CONSTRAINT `fk-empleado_detalles-tipo_contrato_id` FOREIGN KEY (`tipo_contrato_id`) REFERENCES `tipo_contrato` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
