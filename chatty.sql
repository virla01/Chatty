-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-12-2017 a las 19:36:21
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatty`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `accepted`, `created_at`, `updated_at`) VALUES
(7, 3, 1, 1, NULL, NULL),
(5, 4, 3, 1, NULL, NULL),
(4, 4, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likeable`
--

DROP TABLE IF EXISTS `likeable`;
CREATE TABLE IF NOT EXISTS `likeable` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `likeable_id` int(11) NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `likeable`
--

INSERT INTO `likeable` (`id`, `user_id`, `likeable_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Chatty\\Models\\Status', '2017-12-04 21:55:32', '2017-12-04 21:55:32');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_27_195502_create_users_table', 1),
(2, '2017_12_02_213654_create_friends_table', 2),
(3, '2017_12_03_163140_create_statuses_table', 3),
(4, '2017_12_04_163358_create_likeable_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `statuses`
--

INSERT INTO `statuses` (`id`, `user_id`, `parent_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Hi everyone', '2017-12-03 20:30:54', '2017-12-03 20:30:54'),
(2, 3, NULL, 'What a nice day', '2017-12-03 20:33:52', '2017-12-03 20:33:52'),
(3, 1, NULL, 'Esta es una nueva prueba', '2017-12-03 21:48:00', '2017-12-03 21:48:00'),
(4, 1, 3, 'probando otra vez', '2017-12-04 19:00:15', '2017-12-04 19:00:15'),
(5, 3, 3, 'probando desde lalo putelli la respuesta', '2017-12-04 19:10:24', '2017-12-04 19:10:24'),
(6, 4, NULL, 'Hola soy joel y quiero ver como funciona esto!', '2017-12-04 21:40:28', '2017-12-04 21:40:28'),
(7, 1, 6, 'Hola joel te damos la bienvenida a esta nueva comunidad', '2017-12-04 21:40:53', '2017-12-04 21:40:53'),
(8, 4, 6, 'gracias edgardo!', '2017-12-04 21:41:17', '2017-12-04 21:41:17'),
(9, 3, 6, 'Hola Joel que bueno q te metistes aqui', '2017-12-04 21:46:26', '2017-12-04 21:46:26'),
(10, 4, 6, 'Gracias Lalo', '2017-12-04 21:46:39', '2017-12-04 21:46:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `location`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aspectox.creativa@gmail.com', 'admin', '$2y$10$QhLZ6wFy/oWAvhkhi6hdL.vDRWoSZH9AdWstOZUQaJKL9A24rA60a', 'Edgardo', 'Puelli', 'Buenos Aires, AR', 'Rrq0W7FzfpsMnKFbKPhOhJ9Rh29VNp9nllY2WZn5ADaPAn5jlTLtrVzTkxFI', '2017-11-28 00:31:26', '2017-12-03 00:34:42'),
(2, 'virla01@hotmail.com', 'lalo', '$2y$10$57OyLODt07Uhv2oHGuaybOl3gBe9Q22n5r961tlYGeFhFpk4FErfS', NULL, NULL, NULL, 'MfNUVmJg9rfYcFCtDh8NZOjpjV488luER28ww6HqetcsRnp1385Flvoc9pfD', '2017-11-28 00:36:58', '2017-11-28 00:36:58'),
(3, 'lalo@aspectox.com', 'Edgardo', '$2y$10$Uu21Xdaj7Hy1YkP/yT.MeugCrV2OC1Htcir3jExdArepcF1bU49jO', 'Lalo', 'Putelli', 'Buenos Aires, AR', 'bOUlhjTxliN7nsHtuDCxkms0cNPnQwwlcFh0fDkW44cO8PWkLzFXey2deZ1o', '2017-11-28 21:23:43', '2017-12-03 03:24:18'),
(4, 'joel@aspectox.com', 'Joel', '$2y$10$1CEjJmJVvYOvAja2GIq41Owprsj4rJ6H2DgmWd8XP0A8P9fjiOMAW', NULL, NULL, NULL, 'U5TV9DiwwOOBnesdgpqlDsDZlSsjZntiML6bqHbYXYgHelPT1VU3OSuGwtLY', '2017-11-30 22:07:09', '2017-11-30 22:07:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
