-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2022 a las 15:35:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pelisjuancarlos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `nombre`, `apellidos`) VALUES
(1, 'Brad', 'Pitt'),
(2, 'Anthony', 'Hopkins'),
(3, 'Claire', 'Forlani'),
(4, 'Leonardo', 'DiCaprio'),
(5, 'Tobey', 'Maguire'),
(6, 'Carey', 'Mulligan'),
(7, 'Russell', 'Crowe'),
(8, 'Joaquin', 'Phoenix'),
(9, 'Connie', 'Nielsen'),
(10, 'Kate', 'Winslet'),
(11, 'Billy', 'Zane'),
(12, 'Ed', 'Harris'),
(13, 'Jennifer', 'Connelly'),
(14, 'Sam', 'Worthington'),
(15, 'Zoe', 'Saldana'),
(16, 'Sigourney', 'Weaver'),
(17, 'Tom', 'Hanks'),
(18, 'Michael', 'Clarke Duncan'),
(19, 'David', 'Morse'),
(20, 'Will', 'Smith'),
(21, 'Ben', 'Foster'),
(22, 'Charmaine', 'Bingwa'),
(23, 'Tim', 'Robbins'),
(24, 'Morgan', 'Freeman'),
(25, 'Bob', 'Gunton'),
(26, 'Gerard', 'Butler'),
(27, 'Jamie', 'Foxx'),
(28, 'Leslie', 'Bibb'),
(29, 'John', 'Travolta'),
(30, 'Samuel L.', 'Jackson'),
(31, 'Uma', 'Thurman'),
(32, 'Bruce', 'Willis'),
(33, 'Marlon', 'Brando'),
(34, 'Al', 'Pacino'),
(35, 'James', 'Caan'),
(36, 'Jack', 'Nicholson'),
(37, 'Shelley', 'Duvall'),
(38, 'Danny', 'Lloyd'),
(41, 'Mark', 'Wahlberg'),
(42, 'Laura', 'Haddock'),
(44, 'Christoph', 'Waltz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES
(1, 'Martin', 'Brest'),
(2, 'Baz', 'Luhrmann'),
(3, 'Ridley', 'Scott'),
(4, 'James', 'Cameron'),
(5, 'Ron', 'Howard'),
(6, 'Frank', 'Darabont'),
(7, 'Antoine', 'Fuqua'),
(8, 'F. Gary', 'Gray'),
(9, 'Quentin', 'Tarantino'),
(10, 'Francis Ford', 'Coppola'),
(11, 'Stanley', 'Kubrick'),
(12, 'Michael', 'Bay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `pais` varchar(250) NOT NULL,
  `genero` varchar(500) NOT NULL,
  `ano` int(11) NOT NULL,
  `director` int(11) NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `pais`, `genero`, `ano`, `director`, `sinopsis`) VALUES
(1, '¿Conoces a Joe Black?', 'Estados Unidos', 'Fantasía;Drama;Romántico', 1999, 1, 'William Parrish es un poderoso y meticuloso magnate cuya vida se ve alterada por la llegada de un enigmático joven llamado Joe Black que se enamora de su hija. Joe es, en realidad, la personificación de la muerte, que tiene una misión que cumplir.'),
(2, 'El gran Gatsby', 'Australia', 'Drama;Romántico', 2013, 2, 'Persiguiendo su propia versión del \'sueño americano\', Nick acaba siendo vecino de Jay Gatsby, un misterioso millonario que constantemente da fiestas. Al otro lado de la bahía vive la prima de Nick, Daisy, y su mujeriego y aristócrata marido.'),
(3, 'Gladiator', 'Reino Unido;Estados Unidos', 'Acción;Aventura;Drama', 2000, 3, 'El general romano Máximo es el soporte más leal del emperador Marco Aurelio, que lo ha conducido de victoria en victoria. Sin embargo, Cómodo, el hijo de Marco Aurelio, está celoso del prestigio de Máximo y aún más del amor que su padre siente por él. Cuando Cómodo llega al poder ordena el arresto del general y su asesinato. Máximo escapa de sus asesinos, pero no puede evitar la muerte de su familia. Entonces se convierte en gladiador para llevar a cabo su venganza.'),
(4, 'Titanic', 'Estados Unidos', 'Drama;Romántico', 1998, 4, 'Jack (DiCaprio), un joven artista, gana en una partida de cartas un pasaje para viajar a América en el Titanic, el transatlántico más grande y seguro jamás construido. A bordo conoce a Rose (Kate Winslet), una joven de una buena familia venida a menos que va a contraer un matriomonio de conveniencia con Cal (Billy Zane), un millonario engreído a quien solo le interesa el prestigioso apellido de su prometida. Jack y Rose se enamoran, pero el prometido y la madre de ella ponen todo tipo de trabas a su relación. Mientras, el gigantesco y lujoso transatlántico se aproxima hacia un inmenso iceberg.'),
(5, 'Una mente maravillosa', 'Estados Unidos', 'Drama', 2002, 5, 'Obsesionado con la búsqueda de una idea matemática original, el brillante estudiante John Forbes Nash (Russell Crowe) llega a Princeton en 1947 para realizar sus estudios de postgrado. Es un muchacho extraño y solitario, al que sólo comprende su compañero de cuarto (Paul Bettany). Por fin, Nash esboza una revolucionaria teoría y consigue una plaza de profesor en el MIT. Alicia Lardé (Jennifer Connelly), una de sus alumnas, lo deja fascinado al mostrarle que las leyes del amor están por encima de las de las matemáticas. Gracias a su prodigiosa habilidad para descifrar códigos es reclutado por Parcher William (Ed Harris), del departamento de Defensa, para ayudar a los Estados Unidos en la Guerra Fría contra la Unión Soviética.'),
(6, 'Avatar', 'Estados Unidos', 'Ciencia ficción;Aventuras;Acción;Fantástico;Romántico', 2009, 4, 'Año 2154. Jake Sully (Sam Worthington), un ex-marine condenado a vivir en una silla de ruedas, sigue siendo, a pesar de ello, un auténtico guerrero. Precisamente por ello ha sido designado para ir a Pandora, donde algunas empresas están extrayendo un mineral extraño que podría resolver la crisis energética de la Tierra. Para contrarrestar la toxicidad de la atmósfera de Pandora, se ha creado el programa Avatar, gracias al cual los seres humanos mantienen sus conciencias unidas a un avatar: un cuerpo biológico controlado de forma remota que puede sobrevivir en el aire letal. Esos cuerpos han sido creados con ADN humano, mezclado con ADN de los nativos de Pandora, los Na\'vi. Convertido en avatar, Jake puede caminar otra vez. Su misión consiste en infiltrarse entre los Na\'vi, que se han convertido en el mayor obstáculo para la extracción del mineral. Pero cuando Neytiri, una bella Na\'vi (Zoe Saldana), salva la vida de Jake, todo cambia: Jake, tras superar ciertas pruebas, es admitido en su clan. Mientras tanto, los hombres esperan los resultados de la misión de Jake.'),
(7, 'La milla verde', 'Estados Unidos', 'Fantasía;Crimen', 1999, 6, 'Paul Edgecomb es un funcionario de prisiones que vigila \"la milla verde\", el pasillo de linóleo que los condenados a muerte recorren hasta llegar a la silla eléctrica. John Coffey, un gigantesco convicto acusado de violar y asesinar a dos niñas de nueve años, está esperando su inminente ejecución. Tras una personalidad ingenua, John esconde un don sobrenatural con el que contagia su sentido de espiritualidad y humanidad a todos sus compañeros de prisión.'),
(8, 'Hacia la libertad', 'Estados Unidos', 'Aventuras;Acción;Drama', 2022, 7, 'Inspirada en la conmovedora historia real de un hombre dispuesto a cualquier cosa por su familia, y por la libertad. Cuando Peter, un hombre esclavizado, arriesga su vida por escapar y regresar con su familia, se embarca en una peligrosa travesía de amor y resiliencia.'),
(9, 'Cadena perpetua', 'Estados Unidos', 'Drama', 1995, 6, 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.'),
(10, 'Un ciudadano ejemplar', 'Estados Unidos', 'Suspense;Acción;Drama', 2010, 8, 'Clyde Shelton (Gerard Butler) es un hombre que lo ha perdido todo: diez años atrás su mujer y su hija fueron brutalmente asesinadas, pero el verdadero criminal no fue condenado. El responsable de esta injusticia es Nick Rice (Jamie Foxx), el ambicioso ayudante del fiscal del distrito, que hizo un pacto con el abogado de uno de los asesinos. Pero Clyde no ha olvidado lo sucedido, y ha esperado todo este tiempo para poder llevar a cabo su venganza implacable.'),
(11, 'Pulp Fiction', 'Estados Unidos', 'Thriller;Comedia negra', 1994, 9, 'Jules y Vincent, dos asesinos a sueldo con no demasiadas luces, trabajan para el gángster Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su atractiva mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse \"manos a la obra\". Su misión: recuperar un misterioso maletín.'),
(12, 'El padrino', 'Estados Unidos', 'Drama', 1972, 10, 'América, años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Fredo (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a participar en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.'),
(13, 'El resplandor', 'Reino Unido', 'Terror;Suspense', 1980, 11, 'Jack Torrance se traslada con su mujer y su hijo de siete años al impresionante hotel Overlook, en Colorado, para encargarse del mantenimiento de las instalaciones durante la temporada invernal, época en la que permanece cerrado y aislado por la nieve. Su objetivo es encontrar paz y sosiego para escribir una novela. Sin embargo, poco después de su llegada al hotel, al mismo tiempo que Jack empieza a padecer inquietantes trastornos de personalidad, se suceden extraños y espeluznantes fenómenos paranormales.'),
(14, 'Transformers: el último caballero', 'Estados Unidos', 'Ciencia ficción;Acción', 2017, 12, 'Dos razas de robots extraterrestres transformables (los villanos \"decepticons\" y los amistosos \"autobots\") llegan a la Tierra en busca de una misteriosa fuente de poder. En la guerra que estalla entre las dos razas, los hombres toman partido por los \"autobots\". Sam Witwicky (Shia LaBeouf), un avispado adolescente, que sólo desea conquistar a la bella Mikaela (Megan Fox), se convierte en la clave de una guerra que puede destruir a la humanidad.'),
(15, 'Django desencadenado', 'Estados Unidos', 'Western', 2012, 9, 'En Texas, dos años antes de estallar la Guerra Civil Americana, King Schultz (Christoph Waltz), un cazarrecompensas alemán que sigue la pista a unos asesinos para cobrar por sus cabezas, le promete al esclavo negro Django (Jamie Foxx) dejarlo en libertad si le ayuda a atraparlos. Él acepta, pues luego quiere ir a buscar a su esposa Broomhilda (Kerry Washington), esclava en una plantación del terrateniente Calvin Candie (Leonardo DiCaprio).');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_actores`
--

CREATE TABLE `peliculas_actores` (
  `id_pelicula` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas_actores`
--

INSERT INTO `peliculas_actores` (`id_pelicula`, `id_actor`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 4),
(4, 10),
(4, 11),
(5, 7),
(5, 12),
(5, 13),
(6, 14),
(6, 15),
(6, 16),
(7, 17),
(7, 18),
(7, 19),
(8, 20),
(8, 21),
(8, 22),
(9, 23),
(9, 24),
(9, 25),
(10, 26),
(10, 27),
(10, 28),
(11, 29),
(11, 30),
(11, 31),
(11, 32),
(12, 33),
(12, 34),
(12, 35),
(13, 36),
(13, 37),
(13, 38),
(14, 2),
(14, 41),
(14, 42),
(15, 4),
(15, 27),
(15, 44);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director` (`director`);

--
-- Indices de la tabla `peliculas_actores`
--
ALTER TABLE `peliculas_actores`
  ADD PRIMARY KEY (`id_pelicula`,`id_actor`),
  ADD KEY `id_actor` (`id_actor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`director`) REFERENCES `directores` (`id`);

--
-- Filtros para la tabla `peliculas_actores`
--
ALTER TABLE `peliculas_actores`
  ADD CONSTRAINT `peliculas_actores_ibfk_1` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id`),
  ADD CONSTRAINT `peliculas_actores_ibfk_2` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
