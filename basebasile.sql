-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 23:36:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basebasile`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `tipo`) VALUES
(1, 'Pregunta'),
(2, 'Opinion\r\n'),
(3, 'Dibujo'),
(4, 'Historia'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customizacion`
--

CREATE TABLE `customizacion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `background` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `customizacion`
--

INSERT INTO `customizacion` (`id`, `id_usuario`, `background`, `profile_pic`) VALUES
(1, 19, 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_background.png', 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_icon.jpg'),
(2, 16, 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_background.png', 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_icon.jpg'),
(3, 1, 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_background.png', 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_icon.jpg'),
(4, 3, 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_background.png', 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_icon.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `fecha_creacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `id_user`, `id_categoria`, `titulo`, `descripcion`, `imagen`, `likes`, `fecha_creacion`) VALUES
(1, 1, 4, 'La primera publicacion', 'Por algun motivo, no se puede subir imagen, no se porque sucede, dice que no existe el directorio, asi que tengo que conformarme con el fondo de windows xp', '', 0, '2024-10-16 17:36:40'),
(2, 1, 1, 'Segunda', 'publi', '', 0, '2024-10-16 05:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rango` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `rango`) VALUES
(1, 'admin@admin.com', '23', 'admin', 1),
(3, 'otroadmin@admin.com', '2', 'otroadmin', 2),
(16, 'pepe@gmail.com', 'Aa6@5678', 'pepe', 99),
(19, 'frederick@gmail.com', 'Fred5678', 'Frederick', 99);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customizacion`
--
ALTER TABLE `customizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users(id)` (`id_user`),
  ADD KEY `categorias(id)` (`id_categoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `customizacion`
--
ALTER TABLE `customizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
