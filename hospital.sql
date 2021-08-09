-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-08-2021 a las 04:09:15
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos_pacientes`
--

DROP TABLE IF EXISTS `medicos_pacientes`;
CREATE TABLE IF NOT EXISTS `medicos_pacientes` (
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `medicos_pacientes_id_medico_foreign` (`id_medico`),
  KEY `medicos_pacientes_id_paciente_foreign` (`id_paciente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicos_pacientes`
--

INSERT INTO `medicos_pacientes` (`id_medico`, `id_paciente`, `created_at`, `updated_at`) VALUES
(3, 1, '2021-08-07 06:39:03', '2021-08-07 06:39:03'),
(3, 1, '2021-08-07 06:42:43', '2021-08-07 06:42:43'),
(3, 1, '2021-08-07 06:45:25', '2021-08-07 06:45:25'),
(3, 1, '2021-08-07 07:56:11', '2021-08-07 07:56:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_07_02_060109_medicos', 1),
(4, '2021_07_02_060221_pacientes', 1),
(5, '2021_07_02_060243_admin', 1),
(6, '2021_07_02_060315_citas', 1),
(7, '2021_07_02_191909_especialidades', 1),
(8, '2021_08_03_235724_medicos_pacientes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_admin`
--

DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE IF NOT EXISTS `t_admin` (
  `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_citas`
--

DROP TABLE IF EXISTS `t_citas`;
CREATE TABLE IF NOT EXISTS `t_citas` (
  `id_cita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_paciente` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `talla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `motivo_cita` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `t_citas_id_medico_foreign` (`id_medico`),
  KEY `t_citas_id_paciente_foreign` (`id_paciente`),
  KEY `t_citas_id_admin_foreign` (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_citas`
--

INSERT INTO `t_citas` (`id_cita`, `nombre_paciente`, `telefono`, `edad`, `fecha`, `hora`, `peso`, `talla`, `observaciones`, `id_medico`, `id_paciente`, `id_admin`, `motivo_cita`, `created_at`, `updated_at`) VALUES
(1, 'Olga', '7721000000', 56, '2021-08-01', '08:45 PM', '47kg', '180cm', 'hola', 3, 1, 1, 'consulta', '2021-08-07 06:45:25', '2021-08-07 09:07:06'),
(2, 'Olga', '7721000000', 56, '2021-08-04', '03:30 PM', '10kg', '157cm', 'hola2', 3, 1, 1, 'consulta medica', '2021-08-07 07:56:11', '2021-08-07 09:07:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_especialidades`
--

DROP TABLE IF EXISTS `t_especialidades`;
CREATE TABLE IF NOT EXISTS `t_especialidades` (
  `id_especialidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_especialidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_especialidades`
--

INSERT INTO `t_especialidades` (`id_especialidad`, `nombre_especialidad`, `created_at`, `updated_at`) VALUES
(1, 'Medicina interna', NULL, NULL),
(2, 'Traumatoliogía', NULL, NULL),
(3, 'Anesteciología', NULL, NULL),
(4, 'Dermatología', NULL, NULL),
(5, 'Radiología', NULL, NULL),
(6, 'Endocrinología', NULL, NULL),
(7, 'Medico general', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_medicos`
--

DROP TABLE IF EXISTS `t_medicos`;
CREATE TABLE IF NOT EXISTS `t_medicos` (
  `id_medico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_P` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_M` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `cedula_Profesional` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `A_experiencia` int(10) UNSIGNED NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_medico`),
  UNIQUE KEY `t_medicos_cedula_profesional_unique` (`cedula_Profesional`),
  UNIQUE KEY `t_medicos_email_unique` (`email`),
  KEY `t_medicos_id_admin_foreign` (`id_admin`),
  KEY `t_medicos_id_especialidad_foreign` (`id_especialidad`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_medicos`
--

INSERT INTO `t_medicos` (`id_medico`, `nombre`, `apellido_P`, `apellido_M`, `id_especialidad`, `cedula_Profesional`, `email`, `direccion`, `A_experiencia`, `telefono`, `id_admin`, `created_at`, `updated_at`) VALUES
(1, 'Gabriel', 'Hernandez', 'Ruiz', 1, '111111111111111', 'gabriel@gmail.com', 'pachuca de soto', 3, '7721000000', 1, '2021-08-07 05:57:41', '2021-08-07 05:57:41'),
(2, 'Marco', 'Castro', 'Ayala', 2, '222222222222222', 'marco@gmail.com', 'pachuca de soto', 2, '7721000000', 1, '2021-08-07 06:04:42', '2021-08-07 06:04:42'),
(3, 'Raul', 'Rubio', 'Negrete', 3, '333333333333333', 'raul@gmail.com', 'Ixmiquilpan', 4, '7721000000', 1, '2021-08-07 06:05:35', '2021-08-07 06:05:35'),
(4, 'Mario', 'Quijano', 'Chavez', 4, '444444444444444', 'mario@gmail.com', 'pachuca de soto', 3, '7721000000', 1, '2021-08-07 06:06:31', '2021-08-07 06:06:31'),
(5, 'Norberto', 'Angeles', 'Lopez', 5, '555555555555555', 'norberto@gmail.com', 'pachuca de soto', 10, '7721000000', 1, '2021-08-07 06:07:27', '2021-08-07 06:07:27'),
(6, 'Sergio', 'Jimenez', 'Flores', 6, '666666666666666', 'sergio@gmail.com', 'Ixmiquilpan', 2, '7721000000', 1, '2021-08-07 06:08:17', '2021-08-07 06:08:17'),
(7, 'Ramon', 'Peña', 'Escalante', 7, '999999999999999', 'ramon@gmail.com', 'Ixmiquilpan', 4, '7721000000', 1, '2021-08-07 06:09:02', '2021-08-07 06:09:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pacientes`
--

DROP TABLE IF EXISTS `t_pacientes`;
CREATE TABLE IF NOT EXISTS `t_pacientes` (
  `id_paciente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_P` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_M` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_Nacimiento` date NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_medico` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  UNIQUE KEY `t_pacientes_email_unique` (`email`),
  KEY `t_pacientes_id_medico_foreign` (`id_medico`),
  KEY `t_pacientes_id_admin_foreign` (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_pacientes`
--

INSERT INTO `t_pacientes` (`id_paciente`, `nombre`, `apellido_P`, `apellido_M`, `email`, `direccion`, `fecha_Nacimiento`, `telefono`, `id_medico`, `id_admin`, `created_at`, `updated_at`) VALUES
(1, 'Olga', 'Perez', 'Lopez', 'olga@gmail.com', 'Ixmiquilpan', '1974-06-13', '7721000000', NULL, 1, '2021-08-07 06:16:26', '2021-08-07 06:16:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula_profesional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `id_medico` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH,
  UNIQUE KEY `users_cedula_profesional_unique` (`cedula_profesional`) USING HASH,
  KEY `users_id_medico_foreign` (`id_medico`),
  KEY `users_id_paciente_foreign` (`id_paciente`),
  KEY `users_id_admin_foreign` (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `email`, `cedula_profesional`, `level`, `id_medico`, `id_paciente`, `id_admin`, `imagen`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gerardo', 'gerardo@gmail.com', NULL, 0, NULL, NULL, NULL, NULL, 1, '$2y$10$OOn4udpieJKvmd0L8iRe5e5ysGiJAXfk3CGss/8T3Uybxtav4CYcO', 's9ptOgMFFVxBsY65s3RqQkdgCyEnEHejCwg5AYAEwM19wxBb3MsM5x75IuBq', NULL, NULL),
(2, 'Cristian', 'cristian@gmail.com', NULL, 0, NULL, NULL, NULL, NULL, 1, '$2y$10$wWeKvhdKfzWFb8R/KmjHfuj6eBkJbxAbHF/eIrOE1zEMPhaJiQEoe', NULL, NULL, NULL),
(3, 'Gabriel', 'gabriel@gmail.com', '111111111111111', 1, 1, NULL, 1, 'gabriel.jpg', 1, '$2y$10$HLU1RMzHODMzu2LyzfDYDeQ/odPN.DvDLppWpM7VifqxlJLYE88wu', 'DMjh9oPDtJfL71hTtH169L95jGeq6grk8aa48p96fYtiedoJ2d0gmyCvI5qc', '2021-08-07 05:57:41', '2021-08-07 05:57:41'),
(4, 'Marco', 'marco@gmail.com', '222222222222222', 1, 2, NULL, 1, NULL, 1, '$2y$10$wA9Gj4ylnBEO3oRojSVi7.W3K6oTX98HgqaHQ4LpJD8BHc80Mo4fa', NULL, '2021-08-07 06:04:42', '2021-08-07 06:04:42'),
(5, 'Raul', 'raul@gmail.com', '333333333333333', 1, 3, NULL, 1, 'raul.jpg', 1, '$2y$10$tjEwnj0Md3/pmo2hXMFjV.fmfCeHynKYgWFcV/nVQrQbvpIMp2TS2', NULL, '2021-08-07 06:05:35', '2021-08-07 06:05:35'),
(6, 'Mario', 'mario@gmail.com', '444444444444444', 1, 4, NULL, 1, NULL, 1, '$2y$10$WIRNYooQsx6xQZiJswTWCemPVpbu5mlwQHXqcEjOq6S/EHKJNJZBS', NULL, '2021-08-07 06:06:31', '2021-08-07 06:06:31'),
(7, 'Norberto', 'norberto@gmail.com', '555555555555555', 1, 5, NULL, 1, NULL, 1, '$2y$10$fIVrbKMfr0QMtfy7MY9RqO6TcIEC5yGZ7lY2WpXmWlZzUSkeFrtUS', NULL, '2021-08-07 06:07:27', '2021-08-07 06:07:27'),
(8, 'Sergio', 'sergio@gmail.com', '666666666666666', 1, 6, NULL, 1, NULL, 1, '$2y$10$PolxDIoya7GZ1C01CjOMF.mnXm5PXmbhR1tY2OWMaXnEXzDekkGBO', NULL, '2021-08-07 06:08:17', '2021-08-07 06:08:17'),
(9, 'Ramon', 'ramon@gmail.com', '999999999999999', 1, 7, NULL, 1, NULL, 1, '$2y$10$01CYnlJF0Me6rwUEoYVOH.jBvZ/rJb8e03i8S.eitsLAZn8cSu1EO', NULL, '2021-08-07 06:09:02', '2021-08-07 06:09:02'),
(11, 'Olga', 'olga@gmail.com', NULL, 2, NULL, 1, 1, NULL, 1, '$2y$10$qUpR3cqe9h.SiyJbTs9LwetWHaT1DVrmat/jOsq.Es3Pxg7LvpWVa', 'a9eW7A25D5aqXhKQ56XuTih5dIS8Jq69dEhF5agtTv44ELZuBlZPgdyIRki6', '2021-08-07 06:16:26', '2021-08-07 06:16:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
