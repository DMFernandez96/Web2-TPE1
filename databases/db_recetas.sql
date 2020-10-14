-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 08:11:21
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_recetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(4, 'Vegano', 'Apto vegano'),
(8, 'Cócteles', 'bebidas alcohólicas'),
(9, 'Postres', 'Comida dulce'),
(10, 'Italiana', 'comida de origen italiano'),
(12, 'China', 'Comida de origen chino'),
(13, 'Vegetariano', 'Apto para vegetarianos'),
(14, 'Pastas', 'Masa de harina, manteca o aceite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ingredientes` text NOT NULL,
  `calorias` int(11) DEFAULT NULL,
  `instrucciones` text NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id`, `nombre`, `ingredientes`, `calorias`, `instrucciones`, `id_categoria`) VALUES
(32, 'Pastel de chocolate con glaseado moka', '1¾ tazas (220 g) de harina 1 cucharadita de bicarbonato 1 cucharadita de sal kosher ¾ taza (180 g) de mantequilla sin sal 2 tazas (400 g)de azúcar granulado 1 cucharada de extracto de vainilla 3 huevos ⅔ taza (180 mL) agua caliente desde el grifo ⅔ taza (70 g) cacao en polvo 1 cucharada de café instantáneo en polvo ⅔ taza (160 g) de nata y leche Para el glaseado: 340 g de chocolate negro, picado en trozos pequeños 3 cucharadas (45 g) de mantequilla sin sal, picada, 2 cucharadas de café instantáneo en polvo, 1¼ tazas de nata espesa,1 cucharada de Kahlua,1 cucharadita de extracto de vainilla', 1000, 'Para el Pastel: Calentamos el horno a 170 grados C. Lubricamos un molde de 23X33cm. En un bol mediano, mezclamos la harina, el bicarbonato, y la sal. Usando una batidora eléctrica, batimos la mantequilla y el azúcar a velocidad mediana unos 5 minutos, hasta que esté esponjoso. Limpiamos los lados del bol y añadimos la vainilla, y batimos los huevos uno a uno, hasta que se mezclen uniformemente. En un bol mediano, batimos el agua caliente, el cacao en polvo, el café en polvo hasta que este suave. Añadimos la nata y leche y batimos hasta que esté. suave. Con la batidora en velocidad baja, añadimos alternando las mezclas de harina y chocolate, empezando con la harina y terminando con la harina. Con un espátula de goma, limpiamos el bol para asegurar que la mezcla está bien mezclada. Echamos la mezcla dentro del molde, y aplanamos la parte de arriba. La horneamos entre 20 y 30 minutos…o hasta que podamos meter una pala en el centro y pueda salir limpia. La dejamos enfriar en el molde antes de glasearlo. Para hacer el glaseado: Ponemos en un bol grande el chocolate, la mantequilla, y el café instantáneo en polvo. Echamos la nata en una olla pequeña y cocinamos a medio fuego hasta que hierva. Lo quitamos del fuego y echamos uniformemente encima de la mezcla de chocolate. Le dejamos enfriar un momento, y luego batimos con una espátula de goma hasta que todo esté derretido y suave. Mezclamos la Kahlua y el extracto de vainilla hasta que se mezcle bien. Enfriamos en la nevera unos 30 minutos. Limpiamos los lados del bol y batimos el glaseado con una batidora en velocidad alta unos 15 a 20 segundos, hasta que la mezcla esté esponjosa. Quitamos y expandimos encima del pastel. La dejamos en la nevera 30 minutos.', 9),
(33, 'Cuscús con verduras al curry', '250 gr de cuscús 250 ml de caldo de verduras 1 cebolla grande 1 pimiento rojo 1 pimiento verde 1 calabacín pequeño 2 ajos Curry en polvo Comino en polvo Canela en polvo Aceite de oliva Sal', 102, 'Picamos finamente las verduras: la cebolla, los pimientos, los ajos, el calabacín.\r\nLo salteamos en una sartén con aceite de oliva, a fuego medio-bajo, para que poche suavemente.\r\nCuando las verduras estén ya doradas, les añadimos una cucharadita de curry en polvo.\r\nOjo con las cantidades de curry, yo uso uno bastante potente, por lo que mis cantidades pueden ser más pequeñas de las que tú necesites. Es importante ir probando los ingredientes.\r\nPor otra parte, mientras mantenemos las verduras pochando muy suavemente, hervimos 250ml de caldo, al que le añadimos 1 cdita pequeña de curry y 1/3 de cucharadita de comino, en una olla de tamaño medio.\r\nCuando rompa a hervir el caldo, apagamos el fuego y añadimos los 250gr de cuscús.\r\nRemovemos bien con una paleta de madera, hasta que el caldo haya sido totalmente absorbido. Si notas que el cuscús queda un poquito pegado o duro, puedes añadir un chorrito pequeño más de caldo y remover.\r\nAhora, añadimos un chorro de aceite de oliva, 1/2 cdita de curry en polvo, una pizca de comino y una puntita de cucharadita de canela en polvo.\r\nY volvemos a remover muy muy bien.\r\nAhora, cogemos las verduras salteadas y las añadimos a la olla. Mezclamos muy bien, añadimos una pizca de sal y volvemos a mezclar.\r\nProbamos el sabor, y si le falta intensidad al curry, es el momento de añadir mayor cantidad. También puedes jugar con las cantidades de canela, comino y sal. ¡Y listo para servir! Lo puedes comer en caliente, frío o templado.', 4),
(34, 'Burritos vegetales de Heura', 'Tortillas de trigo para burritos 1 caja de Heura (pues escoger bocados originales o mediterráneos) 1 pimiento rojo 1 cebolla 5 setas shiitake Aceite de oliva Pimentón dulce Ajo en polvo Perejil Sal *Opcional: mayonesa vegana ', 145, 'Si vas a usar Heura congelada, retírala del congelador ya.\r\nEn primer lugar picaremos la cebolla en tiras, y la colocaremos en la sartén, con un chorro generoso de aceite de oliva.\r\nLo dejamos saltear a fuego medio-bajo, removiendo periódicamente. \r\nMientras, cortamos en tiras el pimiento rojo y las setas shiitake.\r\nCuando la cebolla comience a estar pochada, añadimos el pimiento y las setas shiitake.\r\nSalteamos hasta que comience a dorar ligeramente.\r\nSeguidamente, añadimos la Heura y la salteamos hasta que empiece a tostar muy ligeramente. Asegúrate de hacerla por ambas partes.\r\nCuando esté cogiendo algo de color, añadimos 2 cditas pequeñas de pimentón dulce, 2 pellizcos de perejil, 3 pellizcos de ajo en polvo y dos pellizcos más de sal.\r\nRemovemos y nos aseguramos de dorarlo bien, a fuego medio, para que todo se saltee con cariño.\r\nCuando esté listo, retiramos y rellenamos los burritos con el salteado, trocitos de lechuga troceadas y la salsa mayonesa.', 4),
(35, 'Tarta brownie con leche condensada y mantequilla de almendras ', '1 taza de harina de trigo 1 cdita de levadura en polvo 1 taza de cacao en polvo (yo usé tipo soluble, no cacao puro) 1/3 de taza de aceite de girasol Aceite de coco ( 1/4 taza + 4 cdas soperas) Leche de soja (1/3 de taza + 1/3 de taza) 200 gr de anacardos naturales 7 cdas soperas de vainilla líquida Pizca de sal Sirope de ágave 200 ml de leche de coco condensada (leche condensada vegana) * Molde de 20 cm', 560, 'Lo primero que vamos a hacer es poner a cocer los anacardos mientras prepararemos el brownie. Los metemos en abundante agua hirviendo y lo mantenemos en una ebullición suave.\r\nPor otra parte, en un bowl grande, mezclamos 1 taza de harina de trigo, 1 taza de cacao en polvo y 1 punta de cucharadita de sal.\r\nRemovemos con ganas, y veremos como poco a poco la harina se va humedeciendo y adhiriendo entre si misma.\r\nCuando esté bien mezclado, añadimos 2 cdas soperas de sirope de ágave.\r\nVolvemos a mezclar y añadimos 1/3 de taza de leche de soja.\r\nRemovemos con ganas por última vez hasta conseguir una masa espesa, densa, cremosa y homogénea.\r\nLa colocamos dentro del molde y la horneamos a 160 grados durante unos 25 minutos, aunque esto puede cambiar en función del horno. Lo ideal es que pasados los 20 minutos pinchéis el brownie para ver si sigue demasiado húmedo en el interior.\r\nCuando ya esté horneado, retiramos el molde del horno y lo dejamos templar, sin desmoldar.\r\nCogemos una cucharadita de leche vegetal y la utilizamos para “pintar” por encima el brownie, y así darle más jugosidad.\r\nLo dejamos templar.\r\nPor otra parte, retiramos los anacardos de la olla y escurrimos bien el agua.\r\nLos pasamos a un bowl, añadimos la leche condensada vegana.\r\nSiguiendo, añadimos 1/3 de leche de soja y con una batidora, trituramos todo hasta que quede bien cremoso y sin grumos.\r\nAñadimos 4 cdas soperas de aceite de coco y volvemos a triturar.\r\nAñadimos 4 cdas soperas de vainilla líquida, volvemos a triturar y reservamos.\r\nCuando el brownie ya esté templado, ya podemos seguir trabajando la tarta. Yo lo que hice fue, con una cuchara, adaptar el brownie bien al molde, “chafándolo” para compactarlo ligeramente con mucho cuidado, ya que al levar, los bordes tienden a quedar más bajos que el centro. ¿Veis que en la segunda foto de abajo, el brownie queda plano? Creo que así es más cómodo.\r\nVertemos la crema de leche de coco condensada y vainilla por encima y bañamos con unos chorritos ligeros de mantequilla de almendras.\r\nAhora, con un palillo, vamos haciendo formas por encima de la tarta, para mezclar y mover la mantequilla de almendras y la crema de anacardo, hasta crear figuras.\r\nLo metemos en el congelador entre 1 y 2 horas antes de servir. ¡Y a disfrutar!', 9),
(36, 'Wonton con salsa picante estilo Sichuan', '20 hojas de pasta wonton, 200 g. de cerdo picado 10 g. de cebolleta 1 diente de ajo picado 1/2 cucharada de salsa de soja 1 cucharadita de sal 1 cucharadita de azúcar Un poco de pimienta blanca Un chorrito de aceite de sésamo Un chorrito de vino de arroz chino (opcional), 3 cucharadas de salsa de soja ligera 1.5 cucharadas de vinagre negro chino 3 cucharadas de aceite de chili 2 cucharaditas de azúcar 1 diente de ajo picado 1 cucharadita de pasta de sésamo china o también puedes usar Tahini (opcional)', 366, 'Ponemos el cerdo picado en un bol. Añadimos el ajo picado y la cebolleta, reservando su parte verde para luego.Añadimos sal, azúcar, un poco de pimienta blanca, aceite de sésamo, salsa de soja ligera, vino de arroz chino y lo mezclamos todo bien. Lo tapamos y dejamos marinar en la nevera durante 20 minutos.Para hacer la salsa, en un bol ponemos salsa de soja ligera, vinagre negro chino, azúcar, ajo picado y aceite de chili.Opcionalmente ponemos pasta de sésamo china. También se puede usar Tahini Mezclamos todo bien y nuestra salsa ya está lista. Para preparar el wonton, cogemos una hoja y ponemos una cucharadita del relleno.Con ayuda de un poco de agua, doblamos por la mitad y lo cerramos muy bien. Le damos la vuelta y con un poco más de agua juntamos las puntas.En un cazo con agua hirviendo, cocinamos el wonton, le ponemos un poco de sal y aceite de sésamo para que no se peguen. Cuando rompa a hervir, añadimos agua fría y repetimos el proceso tres veces. Tardará unos 8 minutos en total. Los sacamos a un bol, ponemos nuestra salsa y la cebolleta que hemos reservado. Y ya está listo para comer.', 12),
(37, 'Focaccia', '500 g Harina 000 370 cc agua 2 cucharadas aceite oliva 9 gr levadura seca o 20 grs de levadura fresca 5 gr sal', 574, 'En un bowl colocar todos los ingredientes e integrar hasta formar una masa bastante líquida, sin amasar o agregar más harina ya que procederemos a realizar la diálisis que es la hidratación del gluten. Tapar y dejar reposar durante 20 min. Con las manos mojadas plegar los bordes hacia el centro y dejar leudar durante otros 20 min. Repetir 1 vez más por última vez.Después de los 3 amasados cada 20 min dejar reposar en heladera de un día al otro en un bowl aceitado (mínimamente 12hs y máximo 3 días). Una vez levada volcar con mucho cuidado sobre una fuente aceitada y estirar LEVEMENTE con los dedos para no desgacificar las burbujitas del levado tan características de este pan.Hacer una emulsión de 2 cucharadas de aceite y 2 de agua y verter sobre la masa, para colocarle por encima el romero, el ajo picado, orégano, tomatitos cherrys y sal. Llevar al horno 180-200 por 35 min o hasta dorar.', 10),
(38, 'Ensalada griega con sandía', 'Pepino 1 Sandía 350 g Queso feta 100 g Aceitunas negras deshuesadas 16 Limón 1 Cebolla morada 0.5 Pimiento verde 0.5 Vinagre de Módena 10 ml Sal Pimienta negra molida Hojas de menta fresca', 99, 'Lavamos el pepino, cortamos a lo largo y retiramos las semillas. Cortamos finamente al igual que hacemos con la cebolla y el pimiento. Maceramos las tres verduras con el zumo del limón.Retiramos las pipas de la sandía, si las tuviese, y cortamos en dados. Introducimos en una ensaladera junto con el queso feta desmigado. Añadimos hojas de menta (cantidad al gusto) finamente picadas si son grandes o enteras sin son pequeñas.Incorporamos el pepino, la cebolla y el pimiento macerados y las aceitunas negras. Salpimentamos y aliñamos con aceite de oliva virgen extra al gusto. Removemos con cuidado para incorporar todos los ingredientes y sabores y lista para servir.', 13),
(39, 'Apple Martini', '4 cl de Vodka Grey Goose 1.5 cl de Licor de Manzana Marie Brizard 1.5 cl de Cointreau', 25, 'Poner todos los ingredientes en un vaso mezclador con hielo, agitar bien y servir en copa de cocktail con una rodaja de manzana.', 8),
(40, 'Bloody Mary', '4.5 cl de Vodka 9 cl de Zumo de tomate 1.5 cl de Zumo de limón 2 Dashes (golpes) de Salsa Perrins (Worchestershire) 1 Dash (golpe) de Tabasco', 34, 'Aderezar con sal de apio, sal y pimienta.\r\nSe elabora en vaso mezclador o directamente en vaso hig-ball.\r\nDecorar con apio fresco y rodaja de limón.', 8),
(41, 'Fetuccinni', '500 gramos de fetuccini (el resultado es mejor si usas pasta fresca) 50 gr de mantequilla 400 ml de nata líquida de cocina (crema de leche) 100 gr de queso Parmesano rallado Sal, pimienta y nuez moscada al gusto', 455, 'Hervimos los fetuccini al dente en agua con sal siguiendo las instrucciones del fabricante en cuanto al tiempo.\r\nMientras se cuecen los fetuccini mezclamos al fuego en un cazo la nata, la mantequilla y el queso rallado. Tiene que llegar a hervir para que la salsa se concentre y el queso y la mantequilla se integren por completo.\r\nCuando la salsa esté cremosa se salpimenta y se añade la nuez moscada.\r\nLos fetuccini se escurren muy bien y se salsean con esta crema, se revuelve un poco y se sirve al momento.', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `mail`, `password`) VALUES
(1, 'admin@demo.com', '$2y$10$msLtXhgdZII2IMO303ZBO.QDXDYPLmIGRs5B94.kJlAxpOFMvwXRK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
