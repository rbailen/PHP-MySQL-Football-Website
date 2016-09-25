-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2016 a las 20:43:26
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuesta`
--

CREATE TABLE IF NOT EXISTS `apuesta` (
  `id` int(11) NOT NULL,
  `partido` int(11) NOT NULL,
  `resultado` varchar(20) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apuesta`
--

INSERT INTO `apuesta` (`id`, `partido`, `resultado`, `usuario`) VALUES
(1, 8, '3-0', 27),
(2, 2, '4-1', 32),
(3, 11, '0-2', 32),
(4, 11, '1-0', 27),
(5, 7, '2-1', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE IF NOT EXISTS `clasificacion` (
  `id` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `equipo` varchar(100) NOT NULL,
  `puntos` int(11) NOT NULL,
  `pjugados` int(11) NOT NULL,
  `pganados` int(11) NOT NULL,
  `pempatados` int(11) NOT NULL,
  `pperdidos` int(11) NOT NULL,
  `gfavor` int(11) NOT NULL,
  `gcontra` int(11) NOT NULL,
  `diferencia` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`id`, `posicion`, `equipo`, `puntos`, `pjugados`, `pganados`, `pempatados`, `pperdidos`, `gfavor`, `gcontra`, `diferencia`) VALUES
(1, 5, '1', 62, 38, 18, 8, 12, 58, 45, 13),
(2, 3, '2', 88, 38, 28, 4, 6, 63, 18, 45),
(3, 1, '3', 91, 38, 29, 4, 5, 112, 29, 83),
(4, 10, '4', 45, 38, 11, 12, 15, 34, 52, -18),
(5, 6, '5', 60, 38, 17, 9, 12, 51, 59, -8),
(6, 15, '6', 42, 38, 8, 18, 12, 45, 61, -16),
(7, 14, '7', 43, 38, 11, 10, 17, 49, 61, -12),
(8, 13, '8', 43, 38, 12, 7, 19, 40, 74, -34),
(9, 19, '9', 36, 38, 9, 9, 20, 37, 67, -30),
(10, 16, '10', 39, 38, 10, 9, 19, 46, 69, -23),
(11, 11, '11', 44, 38, 12, 8, 18, 45, 53, -8),
(12, 20, '12', 32, 38, 8, 8, 22, 37, 70, -33),
(13, 8, '13', 48, 38, 12, 12, 14, 38, 35, 3),
(14, 18, '14', 38, 38, 9, 11, 18, 52, 73, -21),
(15, 2, '15', 90, 38, 28, 6, 4, 110, 34, 76),
(16, 9, '16', 48, 38, 13, 9, 16, 45, 48, -3),
(17, 7, '17', 52, 38, 14, 10, 14, 51, 50, 1),
(18, 17, '18', 39, 38, 10, 9, 19, 40, 62, -22),
(19, 12, '19', 44, 38, 11, 11, 16, 46, 48, -2),
(20, 4, '20', 64, 38, 18, 10, 10, 44, 35, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE IF NOT EXISTS `entrenador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `idEquipo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`id`, `nombre`, `nacionalidad`, `idEquipo`) VALUES
(1, 'Zinedine Zidane', 'Francesa', 15),
(2, 'Luis Enrique', 'Española', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `idEstadio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `nombre`, `puntuacion`, `idEstadio`) VALUES
(1, 'Athletic Club', 62, 4),
(2, 'Atlético de Madrid', 88, 2),
(3, 'FC Barcelona', 91, 3),
(4, 'Real Betis Balompié', 45, 5),
(5, 'RC Celta de Vigo', 60, 6),
(6, 'RC Deportivo de La Coruña', 42, 7),
(7, 'SD Éibar', 43, 8),
(8, 'RCD Espanyol de Barcelona', 43, 9),
(9, 'Getafe CF', 36, 10),
(10, 'Granada CF', 39, 11),
(11, 'UD Las Palmas', 44, 12),
(12, 'Levante UD', 32, 13),
(13, 'Málaga CF', 48, 14),
(14, 'Rayo Vallecano de Madrid', 38, 15),
(15, 'Real Madrid CF', 90, 1),
(16, 'Real Sociedad de Fútbol', 48, 16),
(17, 'Sevilla FC', 52, 17),
(18, 'Real Sporting de Gijón', 39, 18),
(19, 'Valencia CF', 44, 19),
(20, 'Villarreal CF', 64, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadio`
--

CREATE TABLE IF NOT EXISTS `estadio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadio`
--

INSERT INTO `estadio` (`id`, `nombre`, `ciudad`) VALUES
(1, 'Santiago Bernabéu', 'Madrid'),
(2, 'Vicente Calderón', 'Madrid'),
(3, 'Camp Nou', 'Barcelona'),
(4, 'San Mamés', 'Bilbao'),
(5, 'Benito Villamarín', 'Sevilla'),
(6, 'Balaídos', 'Vigo'),
(7, 'Riazor', 'A Coruña'),
(8, 'Ipurúa', 'Éibar'),
(9, 'RCDE Stadium', 'Barcelona'),
(10, 'Coliseum Alfonso Pérez', 'Getafe'),
(11, 'Los Cármenes', 'Granada'),
(12, 'Estadio de Gran Canaria', 'Las Palmas de Gran Canaria'),
(13, 'Ciudad de Valencia', 'Valencia'),
(14, 'La Rosaleda', 'Málaga'),
(15, 'Vallecas', 'Madrid'),
(16, 'Anoeta', 'San Sebastián'),
(17, 'Sánchez Pizjuán', 'Sevilla'),
(18, 'El Molinón', 'Gijón'),
(19, 'Mestalla', 'Valencia'),
(20, 'El Madrigal', 'Villarreal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE IF NOT EXISTS `jugador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `idEquipo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `nacionalidad`, `idEquipo`) VALUES
(1, 'Cristiano Ronaldo', 'Portuguesa', 15),
(2, 'Gareth Bale', 'Galesa', 15),
(3, 'Lionel Messi', 'Argentina', 3),
(4, 'Neymar Jr', 'Brasileña', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `titular` varchar(500) NOT NULL,
  `cuerpo` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `fecha`, `imagen`, `titular`, `cuerpo`) VALUES
(1, '2016-05-26', '1', 'LaLiga acoge una jornada sobre la regulación de uso y gestión de las redes sociales en el fútbol.', 'La sede de LaLiga acogió este jueves una jornada sobre la "Problemática de la regulación del uso y gestión de las redes sociales en el fútbol. Conflictos del negocio online", organizada por la Fundación de LaLiga, con el objetivo de conocer la importancia de las redes sociales como herramienta de comunicación en los clubes. El evento contó con la participación de personalidades procedentes de todos los ámbitos del entorno futbolístico, que permitieron a los asistentes tener una visión global de la temática tratada durante la jornada.\r\n\r\nEl director general Corporativo de LaLiga, Javier Gómez, inauguró la jornada, explicando el objetivo de este encuentro: "Queremos compartir y hacer reflexiones comunes en esta materia de tanta actualidad, desde un enfoque técnico. Es importante conocer la visión de LaLiga, los clubes y los operadores de televisión en este ámbito".'),
(2, '2016-05-25', '2', '\r\nEl fútbol como nunca antes lo habías visto.\r\n\r\nLaLiga y beIN SPORTS siguen innovando y ofrecerán este sábado el primer partido de fútbol de la historia a través de Facebook. ', 'Este sábado 28 de mayo el fútbol español volverá a ser pionero en las nuevas formas de emisión de partidos en directo. A través de la página de Facebook de LaLiga, y con el apoyo de beIN SPORTS, broadcaster oficial de la Primera División Femenina en España, todos los aficionados que lo deseen podrán seguir a partir de las 11.45 el encuentro entre At. Madrid Féminas y el Athletic Club. El partido, que llega con el conjunto vasco como líder de la competición a falta de tres jornadas, será el primer encuentro de fútbol de la historia en ser retransmitido en directo a través de la popular red social. El At. Madrid Féminas, tercero en la tabla, no lo pondrá nada fácil.'),
(7, '2016-05-31', '3', 'El UCAM Murcia ya es equipo de la Liga Adelante.\r\nEl conjunto universitario jugará por primera vez en su historia en la categoría, tras superar al Real Madrid Castilla en la eliminatoria de ascenso.', 'El Universidad Católica de Murcia CF ha escrito su nombre en la historia y continuará haciéndolo la próxima temporada, pero desde la Liga Adelante, donde se enfrenta al reto de jugar en esta categoría por primera vez. Y es que, el UCAM Murcia, ya es oficialmente equipo de la Liga Adelante, tras haber ganado al Real Madrid Castilla en un duro y emocionante play-off que terminó 2-1 en el partido de ida y 2-2 en la vuelta que acogió el Alfredo di Stéfano.'),
(8, '2016-06-01', '4', 'Emoción y felicidad en la celebración del Alavés por el ascenso a la Liga BBVA.', 'El conjunto de Bordalás celebró sobre el césped de Mendizorroza el ascenso a la Liga BBVA.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE IF NOT EXISTS `partido` (
  `id` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `visitante` int(11) NOT NULL,
  `resultado` varchar(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id`, `local`, `visitante`, `resultado`, `fecha`) VALUES
(1, 1, 2, '1-0', '2016-05-30'),
(2, 3, 4, '1-1', '2016-05-30'),
(3, 5, 6, '2-3', '2016-05-30'),
(4, 7, 8, '0-0', '2016-05-30'),
(5, 9, 10, '0-1', '2016-05-30'),
(6, 11, 12, '0-3', '2016-05-30'),
(7, 13, 14, '3-0', '2016-05-30'),
(8, 15, 16, '0-0', '2016-05-30'),
(9, 17, 18, '2-1', '2016-05-30'),
(10, 19, 20, '1-3', '2016-05-30'),
(11, 15, 3, '2-0', '2016-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `es_administrador` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `es_administrador`) VALUES
(27, 'Ramón Bailén Sánchez', 'user@liga.es', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(30, 'Administrador', 'admin@liga.es', '21232f297a57a5a743894a0e4a801fc3', 1),
(32, 'Antonio Ruiz Amate', 'antonio@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuesta`
--
ALTER TABLE `apuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadio`
--
ALTER TABLE `estadio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
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
-- AUTO_INCREMENT de la tabla `apuesta`
--
ALTER TABLE `apuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `estadio`
--
ALTER TABLE `estadio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
