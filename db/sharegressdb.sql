-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2018 a las 15:29:54
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sharegressdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `comentario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_imagen`, `email`, `comentario`) VALUES
(4, 1, 'hollywoodrose94@hotmail.com', 'Este soy yo en los oscars'),
(5, 2, 'hollywoodrose94@hotmail.com', 'Este es mi amigo jon'),
(6, 3, 'hollywoodrose94@hotmail.com', 'Este es will smith');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `likes` int(11) NOT NULL,
  `comentarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id`, `email`, `url`, `likes`, `comentarios`) VALUES
(1, 'hollywoodrose94@hotmail.com', 'Imagenes\\Perfiles-demo\\brad.jpg', 6, 0),
(2, 'hollywoodrose94@hotmail.com', 'Imagenes\\Perfiles-demo\\jon.jpg', 6, 0),
(3, 'hollywoodrose94@hotmail.com', 'Imagenes\\Perfiles-demo\\will2.jpg', 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `id_imagen`, `email`) VALUES
(1, 1, 'hollywoodrose94@hotmail.com'),
(2, 1, 'hollywoodrose94@hotmail.com'),
(3, 1, ''),
(4, 1, 'hollywoodrose94@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `genero` int(11) NOT NULL COMMENT '1. BiGenero  2. Cross–Dresser  3. Drag-King  4. Drag-Queen  5. Andrógino  6. Femme  7. Female to male  8. FTM  9. Gender Bender  10. Genderqueer  11. Male to Female  12. MTF  13. No Op  14. Hijra  15. Pangénero  16. Transexual  17. Transpersona  18. Mujer  19 Hombre  20. Buch  21. Two-Spirit  22. Trans  23. Agender  24. Tercer Sexo  25. Género fluido  26. Transgénero no binario  27. Hermafrodita  28. Género Dotado  29. Transgénero  30. Femme Queen  31. Persona de experiencia Transgénero  32. Hombre  33. Mujer',
  `username` varchar(50) NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `seguidores` int(11) NOT NULL,
  `seguidos` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `experiencia` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_creacion` date NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `bloqueo` int(11) NOT NULL DEFAULT '0',
  `avisos` int(11) NOT NULL,
  `numero_publicaciones` int(11) NOT NULL,
  `invitaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nombre`, `genero`, `username`, `telefono`, `seguidores`, `seguidos`, `nivel`, `experiencia`, `fecha_nacimiento`, `fecha_creacion`, `imagen`, `bloqueo`, `avisos`, `numero_publicaciones`, `invitaciones`) VALUES
(2, 'hollywoodrose94@hotmail.com', '$2y$10$F9bfKehvR6J2/3LZ26630uQs44JOSZwp0i4H9b21aUO3wQShGm1vi', 'Mario Afonso', 32, 'marioafonso46', 630845759, 0, 0, 1, 0, '1994-03-11', '2018-05-11', 'Imagenes/Perfiles-demo/usuario-sin-foto.png', 0, 0, 0, 10000),
(3, 'siri@eu.com', '$2y$10$of7kq89gPvdciFm5Uxu12.wqqIhkjBWKGUP/uQs5RpeNf/9LwbF7C', 'Unai Valverde', 32, 'unavalver', 666777888, 0, 0, 1, 0, '1988-02-22', '2018-05-11', 'Imagenes/Perfiles-demo/usuario-sin-foto.png', 0, 0, 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
