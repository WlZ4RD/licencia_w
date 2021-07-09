-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-07-2021 a las 00:31:07
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mis_cecin_v8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribuyente`
--

DROP TABLE IF EXISTS `contribuyente`;
CREATE TABLE IF NOT EXISTS `contribuyente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO_CONTRIBUYENTE` int(11) DEFAULT NULL,
  `DNI` varchar(10) DEFAULT NULL,
  `RUC` varchar(12) DEFAULT NULL,
  `DIRECCION` varchar(200) DEFAULT NULL,
  `NOM_APELL_REPRE` varchar(200) DEFAULT NULL,
  `RAZON_SOCIAL` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DNI` (`DNI`,`RUC`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contribuyente`
--

INSERT INTO `contribuyente` (`ID`, `TIPO_CONTRIBUYENTE`, `DNI`, `RUC`, `DIRECCION`, `NOM_APELL_REPRE`, `RAZON_SOCIAL`, `EMAIL`, `TELEFONO`) VALUES
(1, 1, '76736485', '20538856674', 'AV. SAN CARLOS', 'WIZARD', NULL, 'Elmudohablador2@gmail.com', '968532111'),
(2, 0, '85185663', '10040184355', 'Ciudad', 'PeÃ±a Ramirez Gilberto', 'S.A.', 'PeÃ±a@hotamail.com', '989972302'),
(3, 1, '89192778', '10040186009', 'Cerro de Pasco', 'Trinidad Bustamante Jhony', 'S.A.', 'Trinidad@hotamail.com', '957843604'),
(4, 0, '89035813', '10040186153', 'Cerro de Pasco', 'Constancia Robles Santiago', 'S.A.', 'Constancia@hotamail.com', '907586957'),
(5, 0, '87528968', '10040186951', 'Ciudad', 'Hilario Baltazar Zenaida', 'S.A.', 'Hilario@hotamail.com', '993765364'),
(6, 1, '87314702', '10040188512', 'Ciudad', 'Tapia Quispe Leoncio', 'S.A.', 'Tapia@hotamail.com', '915793852'),
(7, 1, '89670344', '10040188740', 'Ciudad', 'TravezaÃ±o Fernandez Maria', 'S.A.', 'TravezaÃ±o@hotamail.com', '906038646'),
(8, 0, '85136030', '10040188792', 'Jr.Moquegua NÂ° 247 Chaupimarca - Pasco', 'Luquillas Gonzales, Edith Melania', 'S.A.', 'Luquillas@hotamail.com', '901482454'),
(9, 1, '85674415', '10040190401', 'Ciudad', 'Jeronimo Melendez Gimenez', 'S.A.', 'Jeronimo@hotamail.com', '911867107'),
(10, 0, '88059497', '10040191076', 'Jr. Columna Pasco - 110 Ur. San Juan - Pasco - Yabncancha', 'HermitaÃ±o de Cajahuaman Hilda', 'S.A.', 'HermitaÃ±o@hotamail.com', '972167543'),
(11, 0, '84098977', '10040191467', 'Ciudad', 'Cornelio Tolentino, Tito Teofilo', 'S.A.', 'Cornelio@hotamail.com', '995193662'),
(12, 1, '84395952', '10040191967', 'Ciudad', 'Cornelio Tolentino,Tito Teofilo', 'S.A.', 'Cornelio@hotamail.com', '975802187'),
(13, 0, '85128870', '10040192242', 'Sacra Familia', 'Vilca Palacin, Valois', 'S.A.', 'Vilca@hotamail.com', '909010705'),
(14, 1, '89203629', '10040192714', 'Ciudad', 'Ulloa Estrella Fransisco', 'S.A.', 'Ulloa@hotamail.com', '996406632'),
(15, 1, '89077241', '10040193648', 'Mza A  Lte 6  A.H. Nueva Esperanza - Pasco Chaupimarca', 'Flores Atencio de Blas Yolanda', 'S.A.', 'Flores@hotamail.com', '921280093'),
(16, 1, '88076288', '10040195861', 'Jr. 28 de julio sn - Simon Bolivar - Pasco.', 'Valentin de Najera Paulina', 'S.A.', 'Valentin@hotamail.com', '974627588'),
(17, 0, '85974953', '10040196051', 'Ciudad', 'Victor Trujillo Alejo', 'S.A.', 'Victor@hotamail.com', '965770667'),
(18, 1, '87913547', '10040197813', 'Jr. Los Cipreses Pj. Undac Mz. Ã‘ Lt. 04 - Pasco - Yanacanch', 'Leon Leiva Eliseo', 'S.A.', 'Leon@hotamail.com', '908198122'),
(19, 1, '86954199', '10040199263', 'Av. Circumb.Tupac Amaru Nro 183 -Chaupimaraca-Cercado- Pasco', 'Perez Arce De Estrada Esther Zoila', 'S.A.', 'Perez@hotamail.com', '950100678'),
(20, 0, '84084606', '10040200431', 'Av. Union 445 Carhuamayo- Junin', 'Eva Villogas Colqui', 'S.A.', 'Eva@hotamail.com', '943692568'),
(21, 1, '84473031', '10040200636', 'ciudad', 'Claudio Ramos Polo', 'S.A.', 'Claudio@hotamail.com', '999870738'),
(22, 1, '85569337', '10040200806', 'Ciudad', 'Sanchez Aguilar Pedro', 'S.A.', 'Sanchez@hotamail.com', '953961886'),
(23, 1, '80076483', '10040201047', 'ciudad', 'Lopez Toribio Eleuterio', 'S.A.', 'Lopez@hotamail.com', '996345457'),
(24, 0, '83095570', '10040202094', 'Ciudad', 'Malpartida  Valentin Luis Javier', 'S.A.', 'Malpartida@hotamail.com', '958584803'),
(25, 0, '80544783', '10040203139', 'Cerro de Pasco', 'Torres Salcedo Juan', 'S.A.', 'Torres@hotamail.com', '923751905'),
(26, 1, '84671326', '10040204208', 'Jr. Bolognesi 324 - Chaupimarca', 'Mayuntupa Palomino Walter Hugo', 'S.A.', 'Mayuntupa@hotamail.com', '937774992'),
(27, 0, '82980725', '10040205778', 'Ciudad', 'Eguzquiza Alvarado Manuel', 'S.A.', 'Eguzquiza@hotamail.com', '948177644'),
(28, 0, '89898988', '10040206126', 'Ciudad', 'Tapia Cristobal Petronila', 'S.A.', 'Tapia@hotamail.com', '962547195'),
(29, 0, '84911092', '10040206413', 'Ciudad', 'Pacual Lopez Antonio', 'S.A.', 'Pacual@hotamail.com', '987910979'),
(30, 0, '86927823', '10040206502', 'Ciudad', 'De La Cruz GoÃ±e Eva Luz ', 'S.A.', 'De@hotamail.com', '972442309'),
(31, 1, '86605659', '10040206511', 'AV. LOS PROCERES MZ B LT 4 AH LOS PROCERES-YANACANCHA-PASCO', 'Rios Cervantes, olga Gladys ', 'S.A.', 'Rios@hotamail.com', '936259545'),
(32, 1, '80193595', '10040207738', 'Av. Los Proceres NÂº 80  San Juan-Pasco.', 'Picho Gonzales, Raul.', 'S.A.', 'Picho@hotamail.com', '902308260'),
(33, 0, '86912098', '10040209412', 'Ciudad', 'Grijalva Mendoza Maximo', 'S.A.', 'Grijalva@hotamail.com', '906122460'),
(34, 1, '87303147', '10040209422', 'Ciudad', 'Grijalba Mendoza  Hector', 'S.A.', 'Grijalba@hotamail.com', '976447303'),
(35, 0, '89431690', '10040210356', 'Ciudad', 'Pucuhuanca Sullca Reymundo ', 'S.A.', 'Pucuhuanca@hotamail.com', '901579750'),
(36, 0, '82629820', '10040210364', 'Ciudad', 'Cordova Morales Delia', 'S.A.', 'Cordova@hotamail.com', '938061796'),
(37, 1, '88043992', '10040211123', 'JR. BOLOGNESI NÂª 515 URB C DE PASCO PASCO PASCO CHAUPIMARCA', 'Falcon Medrano, Erasmo', 'S.A.', 'Falcon@hotamail.com', '987090944'),
(38, 0, '85204729', '10040212138', 'Ciudad', 'Hospedaje Internacional', 'S.A.', 'Hospedaje@hotamail.com', '913484779'),
(39, 0, '83355528', '10040212286', 'Ciudad', 'Mauricio Ricra Juana', 'S.A.', 'Mauricio@hotamail.com', '925499541'),
(40, 0, '81486706', '10040213967', 'CAL. TACNA NRO. 150 BARRIO PARAGSHA PASCO - PASCO - SIMON BO', 'Aguilar Valerio Vicente', 'S.A.', 'Aguilar@hotamail.com', '982225155'),
(41, 1, '82940372', '10040214181', 'Ciudad', 'Rosales Baldeon Alfonso', 'S.A.', 'Rosales@hotamail.com', '909659976'),
(42, 0, '84403167', '10040214297', 'Ciudad', 'Mamani Juana', 'S.A.', 'Mamani@hotamail.com', '965506875'),
(43, 1, '81523511', '10040214955', 'Ciudad', 'Retamozo Ore Leopoldo', 'S.A.', 'Retamozo@hotamail.com', '994249675'),
(44, 1, '85112596', '10040216010', 'Jr. Lima NÂº. 354 Int. 208  Huancayo', 'Callupe Valenzuela, Leoncio', 'S.A.', 'Callupe@hotamail.com', '914826497'),
(45, 1, '83416278', '10040216711', 'Urb.Praderas de Pariachi Mz. FLt. 11 Ate - Lima', 'Transportes y Multiservicios Huaman', 'S.A.', 'Transportes@hotamail.com', '992729194'),
(46, 1, '89621002', '10040216851', 'Calle Marquez sn Ex Oasis Chaupimarca - Pasco ', 'Epifania Lopez Santiago', 'S.A.', 'Epifania@hotamail.com', '948781467'),
(47, 1, '80806172', '10040217580', 'Ciudad', 'Castillo Garanieto Sonia', 'S.A.', 'Castillo@hotamail.com', '901244108'),
(48, 0, '84826846', '10040218381', 'Palca Grande', 'jesus Glicerio Cruz Curi', 'S.A.', 'jesus@hotamail.com', '935470800'),
(49, 1, '83548156', '10040219329', 'Asoc. Nueva Cajamarquilla M D Lt 3 Yancancha - Pasco', 'Raquel Diaz Povis', 'S.A.', 'Raquel@hotamail.com', '990327384'),
(50, 0, '87589064', '10040231779', 'NÂº N Int. 9 A.H. Maria Parado de B. Lima - Ate.', 'Yachachin Lazaro, Marcial.', 'S.A.', 'Yachachin@hotamail.com', '949468695'),
(51, 1, '80218400', '10040233411', 'Jr: 28 De Julio - Huachon', 'Quispe Cordova, Maria Magdalena', 'S.A.', 'Quispe@hotamail.com', '922059210'),
(52, 1, '85031136', '10040234107', 'Ciudad', 'PeÃ±a  De Oreb.', 'S.A.', 'PeÃ±a@hotamail.com', '978776037'),
(53, 1, '81585258', '10040234859', 'Jr: Comercio 307 Quiparacra - Pasco', 'Velasquez Ayra Julian Luis', 'S.A.', 'Velasquez@hotamail.com', '928412634'),
(54, 0, '88785743', '10040236339', 'Cal. San  Cristobal  No. SN Quiparacra Pasco', 'Quispe Arrieta  Paul  Lores', 'S.A.', 'Quispe@hotamail.com', '944839062'),
(55, 1, '83148053', '10040236738', 'Jr. 28 de Julio sn - Huachon', 'Solano Espinoza Saul David', 'S.A.', 'Solano@hotamail.com', '903966556'),
(56, 0, '87597107', '10040237718', 'Calle Comercio sn Quiparacra - Huachon', 'Odin Kiko Anaya Alvarez', 'S.A.', 'Odin@hotamail.com', '911425765'),
(57, 0, '80478604', '10040241600', 'Huariaca', 'Vargas Chavez Juan', 'S.A.', 'Vargas@hotamail.com', '934896150'),
(58, 0, '81553689', '10040243955', 'Huariaca', 'Palacios Davila Antera', 'S.A.', 'Palacios@hotamail.com', '995485485'),
(59, 1, '82953318', '10040249791', 'Huariaca', 'Bernachea Rojas Galvez', 'S.A.', 'Bernachea@hotamail.com', '983536284'),
(60, 0, '89201944', '10040251125', 'Huariaca', 'Baldeon Suarez Raul', 'S.A.', 'Baldeon@hotamail.com', '973891857'),
(61, 1, '88160369', '10040251664', 'Jr. Progreso NÂº 1198 Huariaca - Pasco', 'Calero Arrieta Victor Ricardo', 'S.A.', 'Calero@hotamail.com', '951682660'),
(62, 1, '80844491', '10040252822', 'Huariaca', 'Andrade Antonio Diego', 'S.A.', 'Andrade@hotamail.com', '926207698'),
(63, 1, '86284278', '10040253624', 'Huariaca', 'Pehovas Toribio Alfredo Antonio', 'S.A.', 'Pehovas@hotamail.com', '969188069'),
(64, 1, '80902742', '10040256526', 'Jr. Progreso NÂº 1141 Huariaca - Pasco', 'Palomino Mendoza Victoria', 'S.A.', 'Palomino@hotamail.com', '990303976'),
(65, 1, '89058305', '10040260451', 'Huariaca', 'Calderon Huaman Narciso', 'S.A.', 'Calderon@hotamail.com', '942506452'),
(66, 0, '82727975', '10040261210', 'Huariaca', 'Campos Moreyra Israel', 'S.A.', 'Campos@hotamail.com', '904114140'),
(67, 1, '87102490', '10040263093', 'Huariaca', 'Pardave Romero Jose Luis', 'S.A.', 'Pardave@hotamail.com', '909140140'),
(68, 0, '80961905', '10040264090', 'Jr. Huaral SN. Barrio Centro - Huayllay', 'Luis de Baldeon, Amalia', 'S.A.', 'Luis@hotamail.com', '984491004'),
(69, 0, '81904915', '10040266564', 'Jr. Bolognesi sn - Huayllay', 'Ricaldi Mellado Jorge Pedro', 'S.A.', 'Ricaldi@hotamail.com', '995956570'),
(70, 1, '86944223', '10040268095', 'Huayllay', 'Mendizabal de Ricra Elizabeth', 'S.A.', 'Mendizabal@hotamail.com', '957500134'),
(71, 0, '85740649', '10040268346', 'Huayllay', 'Aguero Remusgo Luis', 'S.A.', 'Aguero@hotamail.com', '998529797'),
(72, 0, '81358033', '10040272157', 'Jr. JosÃ© Olaya Huayllay Pasco.', 'Encarnacion Cristobal, Gemma.', 'S.A.', 'Encarnacion@hotamail.com', '997146385'),
(73, 1, '86180742', '10040274508', 'Lima', 'Ricra Benigna', 'S.A.', 'Ricra@hotamail.com', '914677007'),
(74, 0, '82052630', '10040274753', 'Ciudad', 'Baldeon Valdez Primitivo', 'S.A.', 'Baldeon@hotamail.com', '906010593'),
(75, 0, '83102146', '10040275784', 'Huayllay', 'Carhuachin Hinostroza Luis G.', 'S.A.', 'Carhuachin@hotamail.com', '963445980'),
(76, 1, '85167124', '10040282501', 'Huayllay', 'Cruz Mayta Celestino', 'S.A.', 'Cruz@hotamail.com', '981431610'),
(77, 0, '81775822', '10040286654', 'CAL. Rockovich MZA. O Lote . 3 P.J. Columna Pasco', 'Mendoza  Arias  Pedro', 'S.A.', 'Mendoza@hotamail.com', '961799217'),
(78, 0, '83329551', '10040286905', 'Av. Los  Cedros  MZA. E Lote  12 P.J. Undac  Pasco', 'Alejos  Lopez Martha', 'S.A.', 'Alejos@hotamail.com', '975824151'),
(79, 0, '88892683', '10040287413', 'Cerro de Pasco', 'Pagan Chavez Eliseo', 'S.A.', 'Pagan@hotamail.com', '936733171'),
(80, 0, '80411872', '10040288894', 'Jr. Chancay NÂº 8 - Huayllay', 'Alvarez Criollo Rodolfo', 'S.A.', 'Alvarez@hotamail.com', '914778690'),
(81, 0, '84320702', '10040293367', 'Jr Ferrocarril Nr. 001 Int A Barrio Arenales - PASCO', 'Villanueva Hinostroza, Rigoberto ', 'S.A.', 'Villanueva@hotamail.com', '907979196'),
(82, 0, '80028761', '10040296277', 'Call. Daniel Alcides CarriÃ³n Nro. sn - Huayllay - Pasco', 'Vicente Poma Mercedes', 'S.A.', 'Vicente@hotamail.com', '955435449'),
(83, 0, '83891888', '10040298377', 'Ciudad', 'Yachachin Aliaga Alberto', 'S.A.', 'Yachachin@hotamail.com', '987969787'),
(84, 0, '88660626', '10040299331', 'Jr. Jose Leon Pinelo NÂº 471 Lima - Comas.', 'Ricra Villanueva, Walter Samuel', 'S.A.', 'Ricra@hotamail.com', '975972335'),
(85, 1, '82297440', '10040300096', 'Av. Circunv. Arenales NÂº 424 - Chaupimarca - Pasco', 'Silvestre Carhuaz Pedro', 'S.A.', 'Silvestre@hotamail.com', '983754392'),
(86, 0, '86584915', '10040302269', 'Ciudad', 'Baldeon Mauricio, Jaime', 'S.A.', 'Baldeon@hotamail.com', '987855057'),
(87, 0, '89369100', '10040303419', 'Huaron', 'Barreto Estrada Egma Luz', 'S.A.', 'Barreto@hotamail.com', '998079554'),
(88, 1, '86849418', '10040310750', 'Calle Chancay sn Huayllay', 'Vargas Ricra Marisol', 'S.A.', 'Vargas@hotamail.com', '975244901'),
(89, 1, '80675128', '10040312183', 'Santa Rosa de Quides SN - Huayllay', 'Agustin Vicente, Isabel Carmen', 'S.A.', 'Agustin@hotamail.com', '912743830'),
(90, 0, '88030059', '10040316189', 'Jr. Mariscal Castilla NÂº 345-Pasco-Ninacaca.', 'Quispe Panduro, Leon.', 'S.A.', 'Quispe@hotamail.com', '961457665'),
(91, 0, '87012255', '10040319340', 'Jr: La Union Nro 654 Ninacaca', 'Bazan Rivera Patricio', 'S.A.', 'Bazan@hotamail.com', '968002960'),
(92, 0, '87032472', '10040322774', 'Ciudad', 'Bravo Uscuchagua Santiago', 'S.A.', 'Bravo@hotamail.com', '957605182'),
(93, 1, '89169108', '10040327512', 'Ciudad', 'ZuÃ±iga Carhuaricra Sarita', 'S.A.', 'ZuÃ±iga@hotamail.com', '975376256'),
(94, 0, '86048909', '10040329566', 'Ciudad', 'Alvino Quispe Fausto', 'S.A.', 'Alvino@hotamail.com', '971612449'),
(95, 0, '87505896', '10040331927', 'Jr. la UniÃ³n NÂº 654 Ninacaca Pasco', 'Bazan Rivera Erwin Pablo', 'S.A.', 'Bazan@hotamail.com', '966744167'),
(96, 0, '87528244', '10040331960', 'Ninacaca', 'Gaurencio Meza Quispe', 'S.A.', 'Gaurencio@hotamail.com', '955437145'),
(97, 1, '84396123', '10040341141', 'Jr. 2 de Mayo sn. Pasco.', 'Almerco Alcantara, Victor.', 'S.A.', 'Almerco@hotamail.com', '985413136'),
(98, 1, '82285028', '10040446597', 'Jr. CarriÃ³n NÂº 205B Paragsha', 'Trujillo Bravo Zumel', 'S.A.', 'Trujillo@hotamail.com', '995259680'),
(99, 1, '87347284', '10040447054', 'Rancas - Pasco', 'Ayala Lopez, Prospero Alejandro', 'S.A.', 'Ayala@hotamail.com', '906122571'),
(100, 1, '81722755', '10040447283', 'Av. El Minero SN AA.HH Jose Carlos Mariategui - 3 Simon Bol', 'Espinoza Villanueva Efrain Marino', 'S.A.', 'Espinoza@hotamail.com', '994883187'),
(101, 1, '82148578', '10040447330', 'Cal. Gregorio Atencio  SN Rancas - Pasco.', 'Roque Ricapa, Victor Paniagua.', 'S.A.', 'Roque@hotamail.com', '934644123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias_autorizaciones`
--

DROP TABLE IF EXISTS `licencias_autorizaciones`;
CREATE TABLE IF NOT EXISTS `licencias_autorizaciones` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NOMBRE` (`NOMBRE`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `licencias_autorizaciones`
--

INSERT INTO `licencias_autorizaciones` (`ID`, `NOMBRE`) VALUES
(1, 'Licencia de Funcionamiento'),
(2, 'Anuncios y Propagandas'),
(3, 'Comercio Ambulatorio'),
(4, 'Ocupacion de la Via Publica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_licencias_autorizaciones`
--

DROP TABLE IF EXISTS `tipos_licencias_autorizaciones`;
CREATE TABLE IF NOT EXISTS `tipos_licencias_autorizaciones` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_LICENCIAS_AUTORIZACIONES` int(11) DEFAULT NULL,
  `NOMBRE` varchar(400) DEFAULT NULL,
  `COSTO` double(10,2) DEFAULT NULL,
  `FORMATO` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NOMBRE` (`NOMBRE`),
  KEY `ID_LICENCIAS_AUTORIZACIONES` (`ID_LICENCIAS_AUTORIZACIONES`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_licencias_autorizaciones`
--

INSERT INTO `tipos_licencias_autorizaciones` (`ID`, `ID_LICENCIAS_AUTORIZACIONES`, `NOMBRE`, `COSTO`, `FORMATO`) VALUES
(1, 3, 'Comercio', 30.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

DROP TABLE IF EXISTS `tramite`;
CREATE TABLE IF NOT EXISTS `tramite` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONTRIBUYENTE` int(11) DEFAULT NULL,
  `ID_TIPOS_LICENCIAS_AUTORIZACIONES` int(11) DEFAULT NULL,
  `ACTIVIDAD_ECONOMICA` varchar(500) DEFAULT NULL,
  `DIRECCION` varchar(200) DEFAULT NULL,
  `TELEFONO` varchar(12) DEFAULT NULL,
  `ZONIFICACION` varchar(500) DEFAULT NULL,
  `COMPATIBILIDAD_DE_USO` int(11) DEFAULT NULL,
  `OBSERVACIONES` text,
  `NRO_BOLETA` varchar(100) DEFAULT NULL,
  `COSTO` double(10,2) DEFAULT NULL,
  `NRO_EXPEDIENTE` varchar(200) DEFAULT NULL,
  `NRO_RESOLUCION` varchar(200) DEFAULT NULL,
  `UBICACION_ARCHIVO_FISICO` varchar(200) DEFAULT NULL,
  `LARGO` double(10,2) DEFAULT NULL,
  `ANCHO` double(10,2) DEFAULT NULL,
  `F_INICIAL` date DEFAULT NULL,
  `F_VENCIMIENTO` date DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_CONTRIBUYENTE` (`ID_CONTRIBUYENTE`),
  KEY `ID_TIPOS_LICENCIAS_AUTORIZACIONES` (`ID_TIPOS_LICENCIAS_AUTORIZACIONES`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`ID`, `ID_CONTRIBUYENTE`, `ID_TIPOS_LICENCIAS_AUTORIZACIONES`, `ACTIVIDAD_ECONOMICA`, `DIRECCION`, `TELEFONO`, `ZONIFICACION`, `COMPATIBILIDAD_DE_USO`, `OBSERVACIONES`, `NRO_BOLETA`, `COSTO`, `NRO_EXPEDIENTE`, `NRO_RESOLUCION`, `UBICACION_ARCHIVO_FISICO`, `LARGO`, `ANCHO`, `F_INICIAL`, `F_VENCIMIENTO`, `ESTADO`) VALUES
(6, 23, 1, 'Venta de dulces', 'AV. SAN JUAN', '968532111', 'AB', 1, NULL, '20', 30.00, '10', '3004', 'Caja', 30.00, 20.00, '2021-06-08', '2021-08-22', 1),
(5, 2, 1, 'Venta de dulces', 'AV. SAN JUAN', '968532147', 'AB', 1, NULL, '20', 30.00, '10', '3004', 'Caja', 30.00, 20.00, '2021-06-15', '2021-06-26', 1),
(3, 98, 1, 'Venta de dulces', 'AV. SAN JUAN', '968532147', 'AB', 1, NULL, '20', 30.00, '10', '3004', 'Caja', 30.00, 20.00, '2021-06-30', '2021-08-30', 1),
(4, 87, 1, 'Venta de dulces', 'AV. SAN JUAN', '968532147', 'AB', 1, NULL, '20', 30.00, '10', '3004', 'Caja', 30.00, 20.00, '2021-06-30', '2021-08-30', 1),
(7, 5, 1, 'Venta de dulces', 'AV. SAN JUAN', '968532147', 'AB', 1, NULL, '20', 30.00, '10', '3004', 'Caja', 30.00, 20.00, '2021-06-17', '2021-09-17', 1),
(8, 50, 1, 'Venta de dulces', 'AV. SAN JUAN', '968532147', 'AB', 1, NULL, '20', 30.00, '10', '3004', 'Caja', 30.00, 20.00, '2021-06-09', '2021-08-20', 1),
(9, 23, 1, 'Venta de dulces', 'AV. SAN JUAN', '968532147', 'AB', 1, NULL, '20', 30.00, '10', '3004', 'Caja', 30.00, 20.00, '2021-06-05', '2021-09-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `NOMBRES` varchar(100) DEFAULT NULL,
  `APELLIDOS` varchar(100) DEFAULT NULL,
  `DNI` varchar(9) NOT NULL,
  `CLAVE` varchar(100) DEFAULT NULL,
  `ROL` int(11) DEFAULT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NOMBRES`, `APELLIDOS`, `DNI`, `CLAVE`, `ROL`) VALUES
('Administrador', 'Administrador', '12345678', '12345678', 1),
('WIZARD', 'W', '76736470', '1234', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
