-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2025 a las 11:56:54
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
-- Base de datos: `stream_movie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL,
  `image` varchar(2500) NOT NULL,
  `release_date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`insert_statement`) VALUES
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (1, \'Avatar\', \'En el año 2154, un marine parapléjico es enviado al planeta Pandora, donde se infiltra entre los Na\\\'vi usando un avatar biológico. Atrapado entre dos mundos, debe elegir entre su misión militar o proteger a los habitantes nativos de la destrucción. Una épica de ciencia ficción dirigida por James Cameron que revolucionó los efectos visuales en 3D.\', 3.99, \'uploads/Avatar.jpg\', \'2009-12-18\', 162);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (2, \'Aquaman\', \'Arthur Curry, hijo de un farero humano y la reina de Atlantis, debe reclamar su legajo como soberano del reino submarino para evitar una guerra catastrófica entre los océanos y la superficie. Una aventura submarina llena de acción con espectaculares efectos visuales, protagonizada por Jason Momoa.\', 2.99, \'uploads/Aquaman.jpg\', \'2018-12-21\', 143);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (3, \'Battleship\', \'Cuando una flota naval internacional se enfrenta a una amenaza alienígena durante maniobras militares, el teniente Hopper debe liderar una improbable resistencia. Inspirada en el juego de mesa \"Hundir la Flota\", combina acción naval con ciencia ficción.\', 2.99, \'uploads/Battleship.jpg\', \'2012-05-18\', 131);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (4, \'Ahora me ves\', \'Un equipo de ilusionistas llamado los Cuatro Jinetes realiza espectaculares robos durante sus shows, repartiendo el botín entre el público. Mientras la policía intenta capturarlos, un agente del FBI y un experto en desenmascarar magos persiguen pistas para descubrir sus secretos. Este thriller de magia y crimen está protagonizado por Jesse Eisenberg, Woody Harrelson y Mark Ruffalo.\', 1.99, \'uploads/Ahora me ves.jpg\', \'2013-05-31\', 115);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (5, \'Pacific Rim\', \'Cuando legiones de monstruos gigantes, conocidos como Kaiju, comienzan a emerger del mar, la humanidad se une para crear los Jaegers: robots gigantes controlados por dos pilotos cuyas mentes están conectadas. Dirigida por Guillermo del Toro.\', 4.99, \'uploads/Pacific Rim.jpg\', \'2013-07-12\', 131);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (6, \'Prison Break\', \'Michael Scofield idea un plan para ayudar a su hermano Lincoln Burrows, condenado a muerte por un crimen que no cometió. Serie llena de giros inesperados.\', 3.49, \'uploads/Prison Break.jpg\', \'2005-08-29\', 44);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (7, \'Soy Leyenda\', \'Robert Neville (Will Smith) es el último humano en un Nueva York postapocalíptico, luchando contra mutantes infectados por un virus. Basada en la novela de Richard Matheson.\', 4.79, \'uploads/Soy Leyenda.jpg\', \'2007-12-14\', 101);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (8, \'Spider-man: No way home\', \'Peter Parker (Tom Holland) desenmascarado pide ayuda al Doctor Strange, pero un hechizo atrae villanos de otros universos. Dirigida por Jon Watts.\', 5.99, \'uploads/Spiderman No Way Home.jpg\', \'2021-12-17\', 148);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (9, \'Star Trek\', \'El joven James T. Kirk (Chris Pine) y Spock (Zachary Quinto) se unen por primera vez en la USS Enterprise para detener a Nero (Eric Bana), un romulano del futuro que amenaza a la Federación. Este reboot revive la clásica saga con acción y nuevos actores.\', 4.49, \'uploads/Star trek.jpg\', \'2009-05-08\', 127);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (10, \'Tarzán\', \'Tarzan, criado por gorilas, descubre su herencia humana cuando conoce a Jane. Animación fotorealista de Disney.\', 3.79, \'uploads/Tarzán.jpg\', \'2016-07-01\', 94);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (11, \'Origen\', \'Dom Cobb (Leonardo DiCaprio) roba secretos mediante sueños compartidos. Le ofrecen redimirse implantando una idea. Dirigida por Christopher Nolan.\', 5.49, \'uploads/Origen.jpg\', \'2010-07-16\', 148);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (12, \'Alita: Ángel de Combate\', \'En un futuro postapocalíptico, un científico encuentra los restos de una cyborg con cerebro humano intacto. Al reconstruirla y llamarla Alita, la joven despierta sin memoria pero con habilidades de combate excepcionales, descubriendo poco a poco su misterioso pasado mientras lucha contra fuerzas oscuras en la ciudad flotante de Iron City. Basada en el manga Gunnm y dirigida por Robert Rodriguez.\', 4.99, \'uploads/Alita - Ángel de combate.jpg\', \'2019-02-14\', 122);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (13, \'Capitán América: Civil War\', \'Los Vengadores se dividen en bandos opuestos cuando los gobiernos del mundo exigen supervisión sobre los superhéroes. El equipo de Capitán América se enfrenta al de Iron Man en un épico conflicto que redefine alianzas y presenta nuevas amenazas. Incluye la primera aparición cinematográfica de Spider-Man en el MCU y la introducción de Black Panther.\', 4.99, \'uploads/Capitán América - Civil War.jpg\', \'2016-04-28\', 147);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (14, \'Capitán América: El Soldado de Invierno\', \'Steve Rogers trabaja en S.H.I.E.L.D. mientras lucha por adaptarse al mundo moderno. Cuando un misterioso asesino conocido como el Soldado de Invierno emerge, Rogers se ve envuelto en una conspiración global que desafía a sus aliados y pone a prueba sus principios. Thriller de espionaje con elementos de superhéroes dirigido por los hermanos Russo.\', 3.99, \'uploads/Capitán América - El soldado de invierno.jpg\', \'2014-04-04\', 136);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (15, \'Chernobyl\', \'Drama histórico que relata los devastadores eventos del accidente nuclear de 1986 en la planta de Chernóbil, Ucrania. La serie sigue a científicos, bomberos y funcionarios soviéticos que arriesgaron sus vidas para mitigar el desastre mientras el gobierno intenta encubrir la verdad. Una exploración cruda de los costos humanos de la mentira institucional.\', 9.99, \'uploads/Chernobyl.jpg\', \'2019-05-06\', 322);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (16, \'El Caballero Oscuro\', \'Batman se alía con el fiscal Harvey Dent y el teniente Jim Gordon para desmantelar el crimen organizado en Gotham City. Su lucha se complica con la aparición del Joker, un criminal caótico que sumerge la ciudad en la anarquía. Considerada una de las mejores películas de superhéroes de la historia, dirigida por Christopher Nolan.\', 3.99, \'uploads/El caballero oscuro.jpg\', \'2008-07-18\', 152);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (17, \'El Clan de los Rompehuesos\', \'Paul Crewe (Adam Sandler), un ex quarterback de la NFL, es enviado a prisión por robar el auto de su novia. El corrupto alcaide lo obliga a formar un equipo de presos para enfrentarse a los guardias en un partido de fútbol americano. Con ayuda del veterano entrenador Nate (Burt Reynolds), Crewe lidera a los reclusos en una violenta revancha deportiva. Comedia deportiva con acción y humor negro.\', 3.99, \'uploads/El clan de los rompehuesos.jpg\', \'2005-05-27\', 113);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (18, \'Gladiador\', \'Máximo Décimo Meridio, un leal general romano, es traicionado cuando el corrupto hijo del emperador asciende al trono. Reducido a esclavitud, se convierte en gladiador para sobrevivir mientras anhela venganza. Epopeya histórica que combina acción espectacular con drama humano, ganadora de 5 Oscares incluyendo Mejor Película.\', 4.99, \'uploads/Gladiator.jpg\', \'2000-05-05\', 155);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (19, \'Guardianes de la Galaxia Vol. 3\', \'El equipo de Guardianes se embarca en una peligrosa misión para salvar a Rocket, descubriendo traumáticos secretos de su pasado. Última entrega de la trilogía dirigida por James Gunn, que combina acción cósmica, humor irreverente y emotivos momentos dramáticos. Adiós a esta formación de los Guardianes.\', 5.99, \'uploads/Guardianes de la galaxia Vol 3.jpg\', \'2023-05-05\', 150);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (20, \'Guardianes de la Galaxia Vol. 1\', \'Un grupo de inadaptados intergalácticos - Star-Lord, Gamora, Drax, Rocket y Groot - se unen para proteger un poderoso artefacto codiciado por el villano Ronan. Combinando acción espacial con humor irreverente y una banda sonora retro, esta aventura cósmica de Marvel marcó un nuevo tono para el MCU.\', 3.99, \'uploads/Guardianes de la galaxia.jpg\', \'2014-08-01\', 122);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (21, \'King Kong\', \'Remake del clásico de 1933 donde un ambicioso director lleva a un equipo de filmación a la misteriosa Isla de la Calavera. Allí descubren a Kong, un gigantesco gorila que desarrolla un vínculo con la actriz Ann Darrow. Epopeya de aventuras que combina acción espectacular con emotivos momentos dramáticos, ganadora de 3 Oscares.\', 3.99, \'uploads/King Kong.jpg\', \'2005-12-14\', 187);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (22, \'Los Vengadores\', \'Nick Fury de S.H.I.E.L.D. reúne a Iron Man, Capitán América, Hulk, Thor, Viuda Negra y Ojo de Halcón para formar un equipo que detenga a Loki y su ejército alienígena. Primera película crossover del MCU que unió a los superhéroes en una épica batalla por Nueva York.\', 4.99, \'uploads/Los vengadores.jpg\', \'2012-05-04\', 143);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (23, \'The Greatest Showman\', \'Inspirada en la vida de P.T. Barnum (Hugh Jackman), este musical sigue el ascenso de un humilde hijo de sastre que crea el espectáculo de circo más famoso del mundo. Con canciones originales y coreografías deslumbrantes.\', 5.29, \'uploads/The greatest showman.jpg\', \'2017-12-20\', 105);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (24, \'Vengadores: Infinity War\', \'Thanos (Josh Brolin) busca las seis Gemas del Infinito para imponer su voluntad al universo. Los Vengadores y sus aliados deberán sacrificarlo todo para detenerlo en esta épica batalla intergaláctica. Dirigida por los hermanos Russo.\', 5.99, \'uploads/Vengadores Infinity War.jpg\', \'2018-04-26\', 149);'),
('INSERT INTO movies (id, title, description, price, image, release_date, duration) VALUES (25, \'Vengadores: Endgame\', \'Tras el \"chasquido\" de Thanos, los Vengadores supervivientes idean un plan final para revertir la devastación y enfrentarse al titán en una batalla definitiva. Cierre de la saga del Infinito.\', 5.99, \'uploads/Vengadores Endgame.jpg\', \'2019-04-25\', 181);');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
