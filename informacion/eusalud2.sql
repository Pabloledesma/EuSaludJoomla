-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2015 a las 15:50:31
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `eusalud2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_04_08_104031_add_num_id_tu_user', 2),
('2015_04_09_103308_add_user_type_to_user', 3),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_04_08_104031_add_num_id_tu_user', 2),
('2015_04_10_080139_create_session_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `num_id` text COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('Super Admin','Admin','User') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `num_id`, `user_type`) VALUES
(1, 'Pablo', 'test@test.com', '$2y$10$DWq1h2878bYE7dhCSyn.u.A8QiLf2eDwvdMXu9jnWmXg3TXG8pgYO', 'KlVcMFhlHcbhJqimurjckVc1K1KiJSc185LmhXYVsDqQAlokunWOeb6MpHPt', '2015-03-31 19:47:53', '2015-04-10 20:24:49', '', 'Super Admin'),
(6, 'El usuario', 'user@user.com', '$2y$07$BCryptRequires22Chrcte/0SoAJ3ggW7F/R4X.bSdc4qwtNK/Dvi', '7Nz04E2aW0lP7qxOH0Z2uQi3ZQcwip7Kjm4cjvRzFnvCa8zIzkN42D2elGVr', '2015-04-09 19:40:53', '2015-04-09 19:51:01', '423543', 'User'),
(7, 'PASCUAS GONZALEZ GILBERTO', 'doc@doc.com', '$2y$07$BCryptRequires22Chrcte/0SoAJ3ggW7F/R4X.bSdc4qwtNK/Dvi', 'qUXdhoEnfTgACZVqwRow1BxWyCoXvOWptpw3FhXDV0HEZCg7UZvp5z1fVGPl', '2015-04-09 20:04:11', '2015-04-11 15:57:29', '7692591', 'User'),
(8, 'Yimmy Saens', 'yimmy.saenz@eusalud.com', '$2y$07$BCryptRequires22ChrctepqoL28DHdaM9pQwllIKhHLp0TzoRui2', 'VlUokFo0ZFPYDO29CsdQS1kBJDpkNGhRz2cGNERcZIuH5aTzTEcM2G8G6Bks', '2015-04-09 20:17:35', '2015-04-11 13:14:07', '79509972', 'Super Admin'),
(9, 'Pablo Ledesma', 'pablo.ledesma@eusalud.com', '$2y$07$BCryptRequires22Chrcte1JPOgYcYSLhlFxDJ0DyD8ViCSya.bHG', 'cAN3jsfwRDVw6BCCcQhMo543pAiAdjzf6Ewxi3FV1fveDRfOGS6IJz9qY2vp', '2015-04-09 20:18:52', '2015-04-11 13:33:26', '80099493', 'Super Admin'),
(10, 'El jefe', 'jefe@jefe.com', '$2y$07$BCryptRequires22ChrctepqoL28DHdaM9pQwllIKhHLp0TzoRui2', '5nmkbh9SSe1SAHsNnSSPdnDttefybvHgpZ6VSam87U4OxAcg3iSVNr8Nh9nK', '2015-04-11 13:31:51', '2015-04-11 13:35:35', '15678', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
 ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
