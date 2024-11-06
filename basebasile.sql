-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2024 a las 19:41:50
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
(1, 19, 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-11-03-01-01-47Frederick-Douglass.webp', 'http://localhost/Programaci%C3%B3n/loginBasile../uploads/2024-11-03-01-01-35fred.png'),
(2, 16, 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-11-03-01-12-14close-up-shot-of-a-burst-of-flames-in-a-controlled-explosion-photo.jpg', 'http://localhost/Programaci%C3%B3n/loginBasile../uploads/2024-11-03-01-12-06istockphoto-1352338867-1024x1024.jpg'),
(3, 1, 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-10-31-09-38-06funciones-de-un-administrador-scaled.jpg', 'http://localhost/Programaci%C3%B3n/loginBasile../uploads/2024-10-31-09-43-33images.jpeg'),
(4, 3, 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-11-03-01-07-14depositphotos_22954346-stock-illustration-business-cartoon-boss-man-with.jpg', 'http://localhost/Programaci%C3%B3n/loginBasile../uploads/2024-11-03-01-07-06sombrero-de-copa-galera-miscellaneous-by-caff-D_NQ_NP_790034-MLA25879797863_082017-F.webp'),
(5, 20, 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-11-03-01-05-04maxresdefault.jpg', 'http://localhost/Programaci%C3%B3n/loginBasile../uploads/2024-11-03-01-04-32cat-7704-8298522-1-catalog-new.webp'),
(6, 21, 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_background.png', 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_icon.jpg'),
(7, 22, 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/disabled-bakcground.jpeg', 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/disabled-profile-pic.jpeg');

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
(1, 1, 4, 'La primera publicacion', 'Por algun motivo, no se puede subir imagen, no se porque sucede, dice que no existe el directorio, asi que tengo que conformarme con el fondo de windows xp', 'https://www.cronista.com/files/image/792/792559/66217a2f9fe51.jpg', 0, '2024-10-16 17:36:40'),
(3, 1, 5, 'Finalmente, hay imagen', 'Finalmente las publicaciones de este sitio tienen imagenes, muy complicado no era alfnal, deberia haber tardado menos esta funcion, es una verguenza', 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-11-03-12-46-32concept-of-loneliness-and-disappointment-in-love-sad-man-sitting-element-of-the-picture-is-decorated-by-nasa-free-photo.jpg', 0, '2024-11-03-12-46-32'),
(4, 19, 5, 'Hola soy Frederick', 'Me llamo Frederick', 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-11-05-02-31-49Frederick-Douglass.webp', 0, '2024-11-05-02-31-49'),
(5, 22, 4, 'El inexistente', 'Había una vez, un sujeto condenado a no existir, cuya vida fue fugaz y tan solo duro unos minutos. Esta persona tenia un nombre y cara pero nadie llego a conocerlo, ni siquiera sus propios padres, porque simplemente, no se le permitió existir', 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-11-05-03-37-28HQOP4HGMUFHH3AY244WPPAH5UY.jpg', 0, '2024-11-05-03-37-28'),
(6, 16, 3, 'Explosion', 'El universo comenzó con una explosión y esta destinado a terminar por otra', 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/../uploads/2024-11-06-02-58-10360_F_580971891_nSpUhtdqQh2tyA8fDNkB8s91NZEwqb2f.jpg', 0, '2024-11-06-02-58-10');

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
(19, 'frederick@gmail.com', 'Fred5678', 'Frederick', 99),
(20, 'cirullimatias23@gmail.com', '123456yY', 'we', 99),
(21, 'matias@gmail.com', '1', 'Matias', 99),
(22, 'disable', 'disable', 'Usuario eliminado', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
