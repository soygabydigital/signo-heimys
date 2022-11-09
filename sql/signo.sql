-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2022 a las 06:17:41
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `signo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `representante` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula_rep` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_rep` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `cedula`, `apellidos`, `nombres`, `genero`, `fecha_nacimiento`, `lugar_nacimiento`, `direccion`, `telefono`, `correo`, `representante`, `cedula_rep`, `telefono_rep`, `estado`, `created_at`, `updated_at`) VALUES
(1, '12000000', 'Brandt Giménez', 'Dionny Ruth ', 'F', '2005-08-15', NULL, 'La Trilla Doña Menca de Leonis  Casa N° 18', NULL, NULL, 'Chacón Castillo Leidy Dubraska', '11649716', NULL, 1, NULL, NULL),
(2, '12000010', 'Villalobos García', 'Greilibmar Laurimar ', 'F', '2010-12-01', NULL, 'Barrio San Pedro Sabaneta final calle 29  munic. Independenc', NULL, NULL, 'Aguilar Sequera Hermes Gregorio', '13096522', NULL, 1, NULL, NULL),
(3, '12000020', 'Osorio Dávila', 'De Jesus Cristian ', 'M', '2007-11-09', NULL, 'Urbanización Mangos II calle 6 Manzana K casa 12', NULL, NULL, 'Eucarys María Arellano Marti', '13079426', NULL, 1, NULL, NULL),
(4, '12000030', 'Puertas Goitía', 'Aristobulo Kleiberth ', 'M', '2007-06-15', NULL, '3era Av. Con calle 9 y Av. Caracas casa  9-11', NULL, NULL, 'Carrillo Escalona Yoanka Karina', '6822921', NULL, 1, NULL, NULL),
(5, '12000040', 'Márquez Keller', 'Milagros Carolina ', 'F', '2005-12-13', NULL, 'Urb. San José calle 8 casa 52 munic. Independencia', NULL, NULL, 'Escalona Natera Mariangel Yesenia', '14337559', NULL, 1, NULL, NULL),
(6, '12000050', 'Vásques Meza', 'Enrriquez Darlianger ', 'M', '2005-03-01', NULL, 'Urb, San José  calle 2 cas 31 munic.  Independencia', NULL, NULL, 'Hernández mendoza Yerrosnic Desiree', '18803326', NULL, 1, NULL, NULL),
(7, '12000060', 'eheverria Aliendres', 'Rosmary Ana ', 'F', '2010-05-28', NULL, '6ta Av. Entre calle 7 y 8 munic. San Felipe', NULL, NULL, 'González Martínez Xiomara Antonia', '12726693', NULL, 1, NULL, NULL),
(8, '12000070', 'Buendía Briceño', 'Inés Ramona ', 'F', '2009-10-20', NULL, 'Santa Lucía calle principal  munic. Independencia', NULL, NULL, 'Blanco Pérez Eucarys Johana', '18303237', NULL, 1, NULL, NULL),
(9, '12000080', 'Vásquez Bolívar', 'Estrella Antonela ', 'F', '2007-12-12', NULL, 'Higuerón Asentamiento Campesino N° 22194 munic. San Felipe', NULL, NULL, 'Yecenia del Carmen Camacho Pérez', '13795746', NULL, 1, NULL, NULL),
(10, '12000090', 'Flores Osuna', 'Jereana Adamaris ', 'F', '2010-09-20', NULL, 'Higuerón Asentamiento Campesino N° 22194 munic. San Felipe', NULL, NULL, 'Yecenia del Carmen Camacho Pérez', '13795746', NULL, 1, NULL, NULL),
(11, '12000100', 'Navas Eulacio', 'Dalexandra Oscarly ', 'F', '2009-11-21', NULL, 'Recta de Apolonio calle 1 Av. 5 y 6 Independencia', NULL, NULL, 'Hilda Sabina Álvarez Colmenarez', '14013597', NULL, 1, NULL, NULL),
(12, '12000110', 'Riera Álvarez', 'Ariannys Kaira ', 'F', '2010-02-16', NULL, 'Urb. San José calle 9 casa N° 9-23 munic. Independencia', NULL, NULL, 'Castillo Escalona Aura Mercedes', '8516626', NULL, 1, NULL, NULL),
(13, '12000120', 'Canelón Rondón', 'Pedro Noel ', 'M', '2007-09-06', NULL, 'Villa El Fuerte cerca del Circuito Judicial', NULL, NULL, 'Figueredo Rivas Juan Gregorio', '15.38.312', NULL, 1, NULL, NULL),
(14, '12000130', 'Escorche Morales', 'Gian Orianny ', 'F', '2010-10-24', NULL, 'Entrada Urb. San José calle principal munic. Independencia', NULL, NULL, 'San Blas Anzola Lorena Eddymar', '16260374', NULL, 1, NULL, NULL),
(15, '12000140', 'Delgado La Cruz', 'Fabiany Ckristana ', 'F', '2009-10-31', NULL, 'Sector La Trilla Barrio Doña Josefa calle 1 San Felipe Albar', NULL, NULL, 'Medina Ron Yamileth Alejandra', '12078127', NULL, 1, NULL, NULL),
(16, '12000150', 'Hellburg Duque', 'Johangel Daniel ', 'M', '2010-09-21', NULL, '4ta Av. entre 19 y 20 sector Monte Oscuro munic. San Felipe', NULL, NULL, 'Pineda López Diana Alejandra', '15108843', NULL, 1, NULL, NULL),
(17, '12000160', 'Aguirre Torres', 'Noely Anthonella ', 'F', '2008-07-22', NULL, 'Urb. San José calle 9 casa N° 89 municipio Independencia', NULL, NULL, 'Marly Herca Sánchez Sánchez', '14567171', NULL, 1, NULL, NULL),
(18, '12000170', 'Sandoval Mendez', 'Dubraska Jeanmary ', 'F', '2006-05-10', NULL, 'Urbanización Banco Obrero vereda 4 cas N°32', NULL, NULL, 'Yovera Yovera Elena Alexandra', '19063232', NULL, 1, NULL, NULL),
(19, '12000180', 'Oliva Cardona', 'Omar Endri ', 'F', '2010-04-22', NULL, 'El Paují Avenida Libertador entre calle 3 y 4 Marín', NULL, NULL, 'Yurbin Yisleny Colina Galeano', '10372605', NULL, 1, NULL, NULL),
(20, '12000190', 'Sanabria Muñoz', 'Nakary Luis ', 'M', '2008-09-17', NULL, 'Urba Los Apamates Av Principal calle 3 casa A-9 La Pradera C', NULL, NULL, 'María Alejandra Flores García', '11648251', NULL, 1, NULL, NULL),
(21, '12000200', 'Regalado Maturet', 'Rosa Nazaret ', 'M', '2006-02-12', NULL, 'Urb. San José calle 2 casa 255 munic. Independencia', NULL, NULL, 'Salvatierra Borges Jenifert Gertrud', '15643215', NULL, 1, NULL, NULL),
(22, '12000210', 'Villegas Verasteguí', 'Armando Sorielis ', 'F', '2006-04-21', NULL, 'Urb. Juan José de Maya  manzana J16 N°11 San Felipe', NULL, NULL, 'Dehily Toviri Mujica Montilla ', '15484644', NULL, 1, NULL, NULL),
(23, '12000220', 'Uriche Pacheco', 'Oscarli José ', 'M', '2006-03-01', NULL, 'Monte Oscuro 3era Avenida munic. San Felipe', NULL, NULL, 'Colmenarez Roldan Daylin Mayerlin', '11648150', NULL, 1, NULL, NULL),
(24, '12000230', 'De Hoy Gilarte', 'Jehixo Alejandro ', 'F', '2009-03-08', NULL, '2da Avenida con calle 20 munic. San Felipe', NULL, NULL, 'Mariangely José  García Tua', '20891730', NULL, 1, NULL, NULL),
(25, '12000240', 'Colmenares Aponte', 'Ángeles Jose ', 'F', '2007-01-09', NULL, 'Urb. San José calle 8 casa 8-91 municipio Independencia', NULL, NULL, 'Mirian Yusmila Mendoza Piña ', '11984362', NULL, 1, NULL, NULL),
(26, '12000250', 'Monsalve Albaini', 'Esneiber Jonathan ', 'M', '2008-04-04', NULL, 'Calle 26 entre 3era y 4ta Av. Casa N° 3-14 secto El Cementer', NULL, NULL, 'Granado Figueroa Thainani del Valle', '8518258', NULL, 1, NULL, NULL),
(27, '12000260', 'Zavala Palma', 'Almarys Guadalupe ', 'M', '2006-10-27', NULL, 'Barrio Sabaneta final calle 26 Independencia', NULL, NULL, 'Ávila Gleimis Maryuris', '18439903', NULL, 1, NULL, NULL),
(28, '12000270', 'Camacaro Cuenca', 'Jhosmax Krisbel ', 'F', '2008-04-15', NULL, 'Calle de servicio vía la Marroquina casa N° 3 ', NULL, NULL, 'Ana Carina Silva Gavidia', '20961373', NULL, 1, NULL, NULL),
(29, '12000280', 'Castillo Di Palma', 'Jonny Enderson ', 'M', '2009-03-10', NULL, 'Parroquia Albarico Las Tinajas casa N° 375', NULL, NULL, 'Caricote Mendoza Victalia Zulay', '19992348', NULL, 1, NULL, NULL),
(30, '12000290', 'Melendez Galeno', 'Angely Fabiola ', 'F', '2006-11-27', NULL, 'San José vía La Marríquina  calle 26  munic. San Felipe', NULL, NULL, 'Mariangel Nacarith Meléndez Rodrígu', '20176234', NULL, 1, NULL, NULL),
(31, '12000300', 'Reyes Arrieche', 'Misel Josnel ', 'M', '2007-06-22', NULL, 'Urb. El Valle calle 8 vía terminal nuevo San Felipe', NULL, NULL, 'Palacios Noguera Yasmín Tibisay', '15109250', NULL, 1, NULL, NULL),
(32, '12000310', 'Rios Pineda', 'Mujica Reily ', 'M', '2006-02-14', NULL, 'Urbanización Vista al Valle Av. Intercomunal ', NULL, NULL, 'Perozo Buendía Joselín del Carmen', '23743703', NULL, 1, NULL, NULL),
(33, '12000320', 'Oviedo Figueroa', 'Marieth Ailin ', 'F', '2010-10-18', NULL, 'Av. La Patria con 2da Av  munic. San Felipe', NULL, NULL, 'D´Lima Durán Marlin Josefina', '13315851', NULL, 1, NULL, NULL),
(34, '12000330', 'Monzón Bruno', 'Mariangel Jeremias ', 'F', '2007-02-16', NULL, 'La Morita Nueva calle 13 sector 2 casa 16  munic. Cocorote', NULL, NULL, 'Ana Isabel Pinto Cuenca', '12081436', NULL, 1, NULL, NULL),
(35, '12000340', 'Escudero Contreras', 'Anger Oswelly ', 'M', '2005-04-16', NULL, 'Calle principal calle C casa N° B-26 La Pradera Cocorote', NULL, NULL, 'Norka Nohemí Villoria Pachano', '12278794', NULL, 1, NULL, NULL),
(36, '12000350', 'Calanche Mejías', 'Eudimerli María ', 'F', '2006-05-01', NULL, 'Urbanización San Antonio transv. 4 casa 4-6A ', NULL, NULL, 'Marisela Maldonado Romero', '12279820', NULL, 1, NULL, NULL),
(37, '12000360', 'Seijas Suarez', 'Crismar Keylimar ', 'F', '2009-01-09', NULL, 'Las Tapias Valle del Yurubí calle 2  munic. San Felipe', NULL, NULL, 'Coronel García Luismar', '20889437', NULL, 1, NULL, NULL),
(38, '12000370', 'Santana Montes', 'Aymar Luismerlin ', 'F', '2009-03-03', NULL, 'Urbanización San Antonio transv 8  casa N°19-10 A ', NULL, NULL, 'Ana Francisca Sarmiento', '8515234', NULL, 1, NULL, NULL),
(39, '12000380', 'Coroba Ávila', 'Leydis Abrahan ', 'M', '2006-11-08', NULL, 'Conjunto resid. San Antonio calle A N° 25-A munic. San Felip', NULL, NULL, 'Parra Daza Keilimar', '13133468', NULL, 1, NULL, NULL),
(40, '12000390', 'Zamparutti Peroza', 'Natalia Janneyberth ', 'F', '2010-01-02', NULL, 'Carretera Panamericana sector El Peñón San Javier', NULL, NULL, 'Soto Torres Yelicsa Carolina', '18052527', NULL, 1, NULL, NULL),
(41, '12000400', 'Abreu Arellano', 'Braianys Jackson ', 'M', '2005-06-30', NULL, 'Cañaveral calle principal diagonal a la escuela Independenci', NULL, NULL, 'Campo Rodríguez Rosana María', '15964080', NULL, 1, NULL, NULL),
(42, '12000410', 'Ojeda Galea', 'Marcelly Nohemi ', 'M', '2010-06-11', NULL, 'La Padera sector 3 casa N° 35 munic. Cocorote', NULL, NULL, 'Suárez Vargas Nancy Coromoto', '12078157', NULL, 1, NULL, NULL),
(43, '12000420', 'Guerra Aguilar', 'Jael Shinnay ', 'F', '2009-05-14', NULL, 'Urb. San José calle 8 casa N° 73 munic Independencia', NULL, NULL, 'Ortíz Árias Yonny Alexander', '28253848', NULL, 1, NULL, NULL),
(44, '12000430', 'Rendón Montoya', 'Dixon Nohely ', 'F', '2007-12-12', NULL, 'Santa Lucía calle 3 munic. Independencia', NULL, NULL, 'Guillén Herrera Elda Ingrid', '20888446', NULL, 1, NULL, NULL),
(45, '12000440', 'Pérez Cazziola', 'Carliannys Marian ', 'M', '2009-08-27', NULL, 'Urb. San José calle 9 casa 9-98 munic. Independencia', NULL, NULL, 'Álvarez de Avilet Mónica Anyelina', '14720346', NULL, 1, NULL, NULL),
(46, '12000450', 'Sevilla Peñaranda', 'Keiber Sarahi ', 'M', '2008-07-13', NULL, 'Urb. San José calle 3 casa N°100 munic. Independencia', NULL, NULL, 'Carvajal Durán Xiomara del Carmen', '7506077', NULL, 1, NULL, NULL),
(47, '12000460', 'Carrera Escalona', 'Nathaly Carolina ', 'F', '2006-10-03', NULL, 'Prolongación calle 18 sector Italven Independencia', NULL, NULL, 'Yolismel del Valle Camachi Díaz', '12725655', NULL, 1, NULL, NULL),
(48, '12000470', 'Campos Eizaga', 'Aimar Héctor ', 'F', '2008-11-08', NULL, 'Calle 23  entre 3era y 4ta Av. Munic. Independencia', NULL, NULL, 'Borges Silva Angela Matilde', '3912414', NULL, 1, NULL, NULL),
(49, '12000480', 'Noguera Parica', 'Bermarys Kevin ', 'F', '2009-12-20', NULL, 'Calle principal Las Flores casa N° 20 munic. Cocorote', NULL, NULL, 'Castillo Camacho Yuraima Coromoto', '15387512', NULL, 1, NULL, NULL),
(50, '12000490', 'Millán Morillo', 'Esneider Aldemar ', 'F', '2009-10-29', NULL, 'Urb. Las Tapias calle 7 entre 19 de Abril y José A Páez ', NULL, NULL, 'Pérez López Hilda Ramona ', '5459733', NULL, 1, NULL, NULL),
(51, '12000500', 'Mujica Dance', 'Eugenio Diego ', 'M', '2006-10-20', NULL, 'Calle Principal diagonal al preescolar Vista Alegre Farrial', NULL, NULL, 'Pérez de Colmenarez Ofelia Marina', '15425354', NULL, 1, NULL, NULL),
(52, '12000510', 'Calvette Yánez', 'Hanthuan Emily ', 'F', '2006-01-31', NULL, 'Calle 26 entre 2da y 3era Av. Munic. Independencia', NULL, NULL, 'Castillo Arejula Lenny Esperanza', '11649822', NULL, 1, NULL, NULL),
(53, '12000520', 'Lozano Carrillo', 'Marcos Karen ', 'F', '2008-03-24', NULL, 'Sector Santa Teresa Res. Yaracuy Apart A Cocorote', NULL, NULL, 'Piña Giménez Nilda Yamilet', '11270589', NULL, 1, NULL, NULL),
(54, '12000530', 'Landínez Omaña', 'Rosanny Augusto ', 'F', '2005-09-04', NULL, 'Urb. Indio Yara calle 7 casa N° 70 munic.  San Felipe', NULL, NULL, 'Gómez Palacios Lisbeth Sorangel', '18302403', NULL, 1, NULL, NULL),
(55, '12000540', 'Legón Jurado', 'Jhonyenireth Shantal ', 'F', '2005-02-01', NULL, 'Urb. Las Mercedes El Paují parroquia San Javier  San Felipe', NULL, NULL, 'Escobar Ramos Lilian Neicari', '7916120', NULL, 1, NULL, NULL),
(56, '12000550', 'Adames Serrano', 'Kassem Jesùs ', 'F', '2006-01-03', NULL, 'Urb. San José calle 10 casa N° 10-77 munic. Independencia', NULL, NULL, 'Guedez Niniska Carolina', '22306546', NULL, 1, NULL, NULL),
(57, '12000560', 'Henríquez Cornivell', 'Gloriana Naibel ', 'F', '2008-12-04', NULL, 'Vereda 3 casa N° 38 Banco Obrero  munic. San Felipe', NULL, NULL, 'D¨Lima Farías Maricela Bethilde', '11855426', NULL, 1, NULL, NULL),
(58, '12000570', 'Orozco Materán', 'Leonardo Eiverson ', 'F', '2005-02-06', NULL, 'Urb. Banco Obrero vereda 2 casa N° 8 munic. San Felipe', NULL, NULL, 'Prieto Durán America Yadeisel', '18758310', NULL, 1, NULL, NULL),
(59, '12000580', 'Linarez Ramírez', 'Martureth Nadia ', 'F', '2005-11-04', NULL, 'Urb. La Pradera 2da Etapa calle B entre 2da y 3era casa N° 6', NULL, NULL, 'Mendoza Valles María Ysabel', '12077193', NULL, 1, NULL, NULL),
(60, '12000590', 'Asuaje Durán', 'Denyer Marianyis ', 'F', '2010-01-23', NULL, 'Urb. Villa Nueva municipio Independencia', NULL, NULL, 'Gutiérrez Montolla Rosa Virginia', '17700956', NULL, 1, NULL, NULL),
(61, '12000600', 'Lozada Salcedo', 'Luscali Kinverlyn ', 'M', '2010-04-10', NULL, NULL, NULL, NULL, 'García V. Keymar D.', NULL, NULL, 1, NULL, NULL),
(62, '12000610', 'Andrade Lima', 'Franklin Jaiselys ', 'F', '2010-06-20', NULL, 'Urb. San José calle 4 casa  N° 65 munic.  Independencia', NULL, NULL, 'Péez Rodríguez Ingrid Janette', '7916852', NULL, 1, NULL, NULL),
(63, '12000620', 'Guarín Aguilera', 'Gehova Franyerson ', 'M', '2009-07-11', NULL, 'Urb. La Pradera 3 calle 2 casa N° 55', NULL, NULL, 'Acosta  Ariani Yaxenka', '17700750', NULL, 1, NULL, NULL),
(64, '12000630', 'Alvarado Guedes', 'Elías de los Angeles ', 'M', '2007-11-09', NULL, 'Cañaveral Fundo El Carmen primera entrada calle 1 ', NULL, NULL, 'Osorio Chávez Eraira ', '17256052', NULL, 1, NULL, NULL),
(65, '12000640', 'Naveda Ollave', 'Eglendys Gladymar ', 'F', '2005-12-05', NULL, 'Urb. San José calle 2 al final munic. Independencia', NULL, NULL, 'Orta Carrasquel Alexander Antonio', '15475144', NULL, 1, NULL, NULL),
(66, '12000650', 'echenique Chacón', 'Ruth Francis ', 'M', '2006-09-27', NULL, 'Urb. Las Tinajas calle 9 N° 384 Albarico', NULL, NULL, 'Arteaga Rodríguez Yulie Karlina', '18547411', NULL, 1, NULL, NULL),
(67, '12000660', 'Carreño Aranguren', 'Laurimar Adriana ', 'F', '2005-09-24', NULL, 'Ciudadela zona 17 Edif 1 Apart. 05 munic. San Felipe', NULL, NULL, 'Toro Calatayud Yuleidy Jessary', '18053448', NULL, 1, NULL, NULL),
(68, '12000670', 'Romero Falcón', 'Cristian Kassandra ', 'M', '2005-03-24', NULL, 'Urb. Las Tapias calle 1ero de Mayo sector B N° 3', NULL, NULL, 'Parra Pirizuela Wendy Carolina', '20334088', NULL, 1, NULL, NULL),
(69, '12000680', 'Parisca Rodríguez', 'Kleiberth Migleisy ', 'M', '2007-02-06', NULL, 'La Pradera 3 calle 3 casa N° 79  munic. Cocorote', NULL, NULL, 'Lisseth Smith Medina de Rivero', '11748320', NULL, 1, NULL, NULL),
(70, '12000690', 'Alejo Páez', 'Jorfran Davic ', 'M', '2010-01-16', NULL, 'Urb. San José calle 9 N° 22  munic. Independencia', NULL, NULL, 'Carrillo Vargas Emma Jacqueline', '14537790', NULL, 1, NULL, NULL),
(71, '12000700', 'Chacin de la Motta', 'Darlianger Kleyver ', 'F', '2007-11-17', NULL, 'La Morita Nueva sector El Caracaro munic. Cocorote', NULL, NULL, 'Ridríguez Osorio Johan Humberto', '15387567', NULL, 1, NULL, NULL),
(72, '12000710', 'sabariego Torcate', 'Ana Haroldo ', 'F', '2005-08-04', NULL, 'Calle 20 entre Av 9 y 10 Punta Brava casa N° 9-19  ', NULL, NULL, 'Viscaíno Orellana Hayrama Yildemer', '19061015', NULL, 1, NULL, NULL),
(73, '12000720', 'Ortega Bustillo', 'Ramona Brandon ', 'M', '2008-04-11', NULL, 'Urb. Francisco de Miranda Albarico   Maríncito munic.  San F', NULL, NULL, 'Díaz Rivero Yusleidy Carolina', '17699196', NULL, 1, NULL, NULL),
(74, '12000730', 'Pernía Castillos', 'Antonela Orsido ', 'F', '2005-04-27', NULL, 'Urb. San José calle 10 csa N° 78 munic. Independencia', NULL, NULL, 'Méndez Sanbrano Ramona del Carmen', '17061436', NULL, 1, NULL, NULL),
(75, '12000740', 'Gallardo Yovera', 'Adamaris Holday ', 'F', '2005-01-13', NULL, 'Urb San José calle 1 casa N° 2 munic. Independencia', NULL, NULL, 'Romero de Sánchez Viadeney Zuleymne', '12077481', NULL, 1, NULL, NULL),
(76, '12000750', 'Soto Anzola', 'Oscarly Bisneily ', 'F', '2006-04-24', NULL, '2da Avenida entre calle 26 y 27 munic. Independencia', NULL, NULL, 'López Montero Ingrid Carolina', '17698118', NULL, 1, NULL, NULL),
(77, '12000760', 'Caricote Barico', 'Kaira Brayhan ', 'F', '2007-06-16', NULL, 'Calle 9 casa N° 15 Morita Nueva munic. Cocorote', NULL, NULL, 'Tirado  Armella Wollmir Rafael', '16110859', NULL, 1, NULL, NULL),
(78, '12000770', 'Gil Torrez', 'Noel Lucia ', 'F', '2007-12-19', NULL, 'Urb. San José de Maya calle principal Albarico', NULL, NULL, 'León Torrealba Damarys Omaira', '11272944', NULL, 1, NULL, NULL),
(79, '12000780', 'Ochoa Berriz', 'Orianny Dalimar ', 'F', '2010-05-22', NULL, 'Urb. San José calle 7 casa N° 7-95 municipio Independencia', NULL, NULL, 'Aguilar Figueroa Lilibeth Maribel', '10245143', NULL, 1, NULL, NULL),
(80, '12000790', 'Ana Ferrer', 'Ckristam Eurimar ', 'F', '2010-08-19', NULL, 'Calle 18 entre 2da y 3era Av. Munic. San Felipe', NULL, NULL, 'Carreño Blacina del Carmen', '3323637', NULL, 1, NULL, NULL),
(81, '12000800', 'Hurtado Querales', 'Daniel Nebras Josua', 'M', '2007-08-10', NULL, 'Calle 3 sector 2 casa N° 14 Brisas del Terminal Independenci', NULL, NULL, 'Verasteguí Escalona María Alicia', '11275340', NULL, 1, NULL, NULL),
(82, '12000810', 'Bazán Piña', 'Anthonella Marìa ', 'M', '2006-02-06', NULL, 'Prolongación calle 20 Av. 2  Apart 5-A munic. San Felipe', NULL, NULL, 'Gómez Hernández Daisy Coromoto', '15262375', NULL, 1, NULL, NULL),
(83, '12000820', 'Roa Rosendo', 'Jeanmary Alfonzo ', 'F', '2010-07-28', NULL, 'Av. 2 entre calle 23 y 24 El Paradero munic. Independencia', NULL, NULL, 'Escalona Quiroz Yoleida del Carmen', '13094754', NULL, 1, NULL, NULL),
(84, '12000830', 'Ramìrez Rengifo', 'Endri Gleiber ', 'F', '2005-12-08', NULL, 'Ciudadela zona 13 Edif.  3 Aprt. 2-6  munic. San Felipe', NULL, NULL, 'Villegas Campos Maira Carolina', '13796277', NULL, 1, NULL, NULL),
(85, '12000840', 'Godoy Rugeles', 'Luis Lisseth ', 'M', '2007-10-05', NULL, '2da Av. Entre calle 23 y 24 El Paradero munic. Independencia', NULL, NULL, 'Escalona Quiroz Nieves Maribi', '17254990', NULL, 1, NULL, NULL),
(86, '12000850', 'Arcila Nadal', 'Nazaret Hildianys ', 'M', '2006-08-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(87, '12000860', 'Gudiño Yajure', 'Sorielis Julián ', 'F', '2008-02-27', NULL, 'Urb. San José calle 1 casa N°45 munic. Independencia', NULL, NULL, 'Arévalo Fuentes Maixcol Isaias', '18546444', NULL, 1, NULL, NULL),
(88, '12000870', 'Chirinos Parra', 'José Lilie ', 'M', '2007-12-19', NULL, 'La Morita Vieja  municipio Cocorote', NULL, NULL, 'Carmen María  Durán Sulbarán', '7430629', NULL, 1, NULL, NULL),
(89, '12000880', 'Manzanilla Virgüez', 'Alejandro Mercelys ', 'M', '2010-01-15', NULL, 'Calle 3  casa N° 7 San Gerónimo munic Cocorote', NULL, NULL, 'Ortega Ivon Yanett', '6717569', NULL, 1, NULL, NULL),
(90, '12000890', 'Leal Montesinos', 'Jose Gabrielis ', 'M', '2006-02-22', NULL, 'Twon House San Antonio calle C N° 15-C  municipio San Felipe', NULL, NULL, 'Beatríz Zobeida  Almarza Luis', '18301503', NULL, 1, NULL, NULL),
(91, '12000900', 'Dorante Rivas', 'Jonathan Rafael de los Angeles', 'F', '2009-12-22', NULL, 'Prolongación  calle 29 calle de servicio Sabaneta ', NULL, NULL, 'Pérez Sambrano Alejandra Carolina', '24001451', NULL, 1, NULL, NULL),
(92, '12000910', 'Farnataro Espinoza', 'Guadalupe Anlianis ', 'F', '2006-08-21', NULL, 'Urb. Prados del Norte 3era etapa calle 8 casa 27', NULL, NULL, 'Pacheco Flores Ada Coromoto', '15109432', NULL, 1, NULL, NULL),
(93, '12000920', 'Guerrero Yanez', 'Krisbel Noé ', 'M', '2007-03-13', NULL, 'Calle principal Cocorotico  Albarico munic. San Felipe', NULL, NULL, 'Silva Teskari Rosa Gabriela', '12282063', NULL, 1, NULL, NULL),
(94, '12000930', 'Arriechi Parada', 'Enderson Jhonder ', 'M', '2009-05-12', NULL, 'Conjunto habitacional Ciudadela  zona 7 Edif 1 Apart. 2-1', NULL, NULL, 'Díaz Arrieche Luis Eduardo', '18758604', NULL, 1, NULL, NULL),
(95, '12000940', 'Herrera Avendaño', 'Fabiola Ismaily ', 'F', '2009-01-16', NULL, 'Av. Caracas entre 7ma y 8a Av munic. San Felipe', NULL, NULL, 'Prado Rivero Jenny Elizabeth ', '15483582', NULL, 1, NULL, NULL),
(96, '12000950', 'León Guio', 'Josnel Anas ', 'M', '2006-08-05', NULL, 'Cocorotico calle 3  Albarico munic.  San Felipe', NULL, NULL, 'Arcila Giménez Yamileth Nohemí', '12077681', NULL, 1, NULL, NULL),
(97, '12000960', 'Lovera Brito', 'Reily Kanely ', 'M', '2007-03-09', NULL, '2da Av. Entre calle 25 y 26  Cementerio munic. Independencia', NULL, NULL, 'García Yovera Karina Josefina', '11273526', NULL, 1, NULL, NULL),
(98, '12000970', 'Cordero Valles', 'Ailin Anthoniel ', 'F', '2009-05-21', NULL, 'Carretera Panamericana  sector El Peñón San Javier munic. Sa', NULL, NULL, 'Soto Torres Yennery Coromoto', '18033184', NULL, 1, NULL, NULL),
(99, '12000980', 'Salvatierra Al Halah', 'Jeremias Maikol ', 'F', '2007-03-04', NULL, 'La Cuchilla  Parroquia Albarico munic. San Felipe', NULL, NULL, 'Azuaje López Julia Paola', '19615733', NULL, 1, NULL, NULL),
(100, '12000990', 'La Rosa Amundaray', 'Oswelly Geremías ', 'F', '2010-11-26', NULL, 'Desarrollo Habitacional San José calle 3 casa 7 Independenci', NULL, NULL, 'Huerta Querales Carla Dorymar', '19615493', NULL, 1, NULL, NULL),
(101, '12001000', 'Guillén Fuentes', 'María Edgar ', 'F', '2008-12-03', NULL, 'Avenida San Felipe El Fuerte munic. San Felipe', NULL, NULL, 'Maldonado Ramírez Gabriela de las N', '18052713', NULL, 1, NULL, NULL),
(102, '12001010', 'Bravo Veliz', 'Keylimar Alina ', 'F', '2009-05-27', NULL, 'La Ermita Nueva calle 4 casa N° 10   munic. Cocorote', NULL, NULL, 'Hernández Garcés Rosaura', '7586140', NULL, 1, NULL, NULL),
(103, '12001020', 'Baquero Bastardo', 'Luismerlin Jonnathan ', 'F', '2007-02-09', NULL, 'Urb. San José entre calle 7 y 8 casa N° 17-15  Independencia', NULL, NULL, 'Mogollón Arrieche Tomás Antonio', '9617126', NULL, 1, NULL, NULL),
(104, '12001030', 'Uzcategui Garrido', 'Abrahan Rosderley ', 'F', '2010-04-26', NULL, 'Calle 23  3era Av casa N° 3-5 munic. Independencia', NULL, NULL, 'Guerra Flores Yusmary Zayleth', '15387001', NULL, 1, NULL, NULL),
(105, '12001040', 'Cotiz Medina', 'Janneyberth Stephanìa ', 'M', '2005-02-28', NULL, 'Urb. San José calle 1 casa N° 7 munic. Independencia', NULL, NULL, 'Rodríguez Barboza Erika Norielys', '18546409', NULL, 1, NULL, NULL),
(106, '12001050', 'Donaire Huerta', 'Jackson Jatziel ', 'F', '2010-08-19', NULL, 'Urb. San José calle 5 casa N° 29  munic Independencia', NULL, NULL, 'Martínez Villanueva Margy Liceth', '20888838', NULL, 1, NULL, NULL),
(107, '12001060', 'Salazar Escalante', 'Nohemi Deliana ', 'M', '2008-07-17', NULL, 'Calle 30 con 2da y 3era Avenida munic.  San Felipe', NULL, NULL, 'Meza Freitez Yislanis Estais', '13797105', NULL, 1, NULL, NULL),
(108, '12001070', 'Barco Guanipa', 'Shinnay Shanttal ', 'F', '2008-08-30', NULL, 'Urb. San José calle 5 casa N° 54 munic. Independencia', NULL, NULL, 'García Landínez Rosa Victoria', '16481274', NULL, 1, NULL, NULL),
(109, '12001080', 'Arteaga Coronel', 'Nohely Herlet ', 'F', '2005-02-18', NULL, 'Urb. San José calle 7 casa N° 79 munic. Independencia', NULL, NULL, 'Oquendo Solano Shirley Jackeline', '11298112', NULL, 1, NULL, NULL),
(110, '12001090', 'Pinto Gómez', 'Marian Ronaldo ', 'F', '2008-02-27', NULL, 'Caserío Mampostal sector La Negrita munic. Independencia', NULL, NULL, 'Herrera Heredia Minelba Josefina', '11277295', NULL, 1, NULL, NULL),
(111, '12001100', 'Manzi Segovia', 'Sarahi Richel ', 'F', '2006-12-01', NULL, 'Av. 4 entre calle  33 y 34  casa N° 33-14  Palotal Independe', NULL, NULL, 'López Mora Migdalia Yasmín', '13096638', NULL, 1, NULL, NULL),
(112, '12001110', 'Alza Bonito', 'Carolina Adrian ', 'F', '2009-10-03', NULL, 'Calle 2 Av. Principal San José  munic. Independencia', NULL, NULL, 'Espinoza Cespedes Yajaira del Carme', '13695469', NULL, 1, NULL, NULL),
(113, '12001120', 'Juarez Chávez', 'Héctor Gusliannis ', 'F', '2005-04-02', NULL, 'Las Tapias sector Rosa Ines 21 calle 1 casa 3 munic. San Fel', NULL, NULL, 'López Sabariego Analiz Gregoria', '14709105', NULL, 1, NULL, NULL),
(114, '12001130', 'Cañizales Sumoza', 'Kevin Aníbal ', 'M', '2010-10-05', NULL, 'Urb. San José calle 5 casa N° 40 munic. Independencia', NULL, NULL, 'Bastidas Malaspina Maira Elvira', '13513039', NULL, 1, NULL, NULL),
(115, '12001140', 'Vizcaíno Saavedra', 'Aldemar Emanuel ', 'F', '2010-08-06', NULL, 'Santa Lucía casa N° 7 munic. Independencia', NULL, NULL, 'González Yidry del Carmen', '20176000', NULL, 1, NULL, NULL),
(116, '12001150', 'Zambrano Arenas', 'Diego Amanda ', 'M', '2005-06-11', NULL, 'Avenida 11 entre calle 13 y 14 munic. San Felipe', NULL, NULL, 'Rodríguez Primera Abner José', '17256388', NULL, 1, NULL, NULL),
(117, '12001160', 'Franco San Blas', 'Emily Merlyn ', 'M', '2005-05-31', NULL, 'Urb. Las Mercedes calle 2  casa N° 19 sector El Paují ', NULL, NULL, 'Martínez Aguey Gladys Luxmar', '16110872', NULL, 1, NULL, NULL),
(118, '12001170', 'Tría Figueredo', 'Karen Chantal José', 'M', '2008-08-10', NULL, 'Prolongación 2da Av frente al Cementerio Independencia', NULL, NULL, 'Yanez Caro Iris Margarita', '13797101', NULL, 1, NULL, NULL),
(119, '12001180', 'Díaz Pavón', 'Augusto Jhosbert ', 'F', '2010-02-25', NULL, 'Urb. Santa Teresa Edif. Yaracuy I piso 1 Apart. 1 munic. Coc', NULL, NULL, 'Álvarez de Sequera  Yuveylis Karina', '16112679', NULL, 1, NULL, NULL),
(120, '12001190', 'Duarte Quero', 'Shantal Anthomy ', 'F', '2006-07-23', NULL, 'Av. Intercomunal frente al circuito Judicial. Munic.  San Fe', NULL, NULL, 'Valle Gutiérrez Mirna Graciela', '19062517', NULL, 1, NULL, NULL),
(121, '12001200', 'Torrealba Chavarri', 'Jesùs Endrimar ', 'F', '2008-11-19', NULL, 'Urb. San José 3era etapa calle 4 casa N° 68 Independencia', NULL, NULL, 'Bazan Azuaje Keyla Matilde del C', '12081688', NULL, 1, NULL, NULL),
(122, '12001210', 'Granado Aceituno', 'Naibel Elena ', 'M', '2005-12-30', NULL, 'Urb. San José calle 7 casa N° 28 munic. Independencia', NULL, NULL, 'Mogollón Arrieche Margarita Mercede', '11263579', NULL, 1, NULL, NULL),
(123, '12001220', 'Espinal Montaner', 'Eiverson Guaicaris ', 'F', '2005-03-06', NULL, 'Urba San José calle 5 casa N° 69 munic. Independencia', NULL, NULL, 'Muñoz de Verastegüí Morelis del Car', '12078593', NULL, 1, NULL, NULL),
(124, '12001230', 'Ortiz Toro', 'Nadia Camilo ', 'M', '2009-07-03', NULL, 'Entrada urb. San José municipio Independencia', NULL, NULL, 'Lucía del Carmen Cuicas Cordero', '8514196', NULL, 1, NULL, NULL),
(125, '12001240', 'Mendoza Valladare', 'Marianyis Scarly ', 'M', '2010-05-03', NULL, 'Urbanización Higuerón I etapa calle 1  casa N°11', NULL, NULL, 'Ramírez Cáceres Viviana', '14310962', NULL, 1, NULL, NULL),
(126, '12001250', 'Vera Carmona', 'Kinverlyn Doriana ', 'M', '2005-03-23', NULL, 'Banco Obrero  Edif. Carolina Piso 4 Apart. 4B', NULL, NULL, 'Cuenca Nava Eglee Belitza', '17699458', NULL, 1, NULL, NULL),
(127, '12001260', 'Estee Zarate', 'Jaiselys Eduarlys ', 'M', '2007-04-01', NULL, 'Urb. Mangos II calle 6 casa K-10 munic. Independencia', NULL, NULL, 'Vivas Martínez Heissel Nery', '13313736', NULL, 1, NULL, NULL),
(128, '12001270', 'Domínguez Hernández', 'Franyerson Ashly ', 'M', '2009-03-10', NULL, 'Las Tapias Rosa Inés 21 calle  MC N° 39', NULL, NULL, 'Flores Lugo Jhondrimar Daniela', '20913870', NULL, 1, NULL, NULL),
(129, '12001280', 'Boada Cortéz', 'de los Angeles Massiel ', 'M', '2007-06-24', NULL, 'San Juan de la Rosa sector II Veroes Farrial', NULL, NULL, 'Sánchez Linárez Yancy Beatriz', '17797603', NULL, 1, NULL, NULL),
(130, '12001290', 'Molina Blanco', 'Gladymar Carlos ', 'F', '2007-12-07', NULL, 'Av. San Felipe El Fuerte La Cuchilla  Antonio José de Sucre ', NULL, NULL, 'Yenny Ismenia Sánchez Parra', '14209837', NULL, 1, NULL, NULL),
(131, '12001300', 'Verasteguì Ilarraza', 'Francis Franderson ', 'M', '2009-05-28', NULL, 'Higuerón calle 3 casa N° 7 2da etapa munic. San Felipe', NULL, NULL, 'Colina de Camacho Mariangela', '7514332', NULL, 1, NULL, NULL),
(132, '12001310', 'Santander Meneses', 'Adriana Maelo ', 'F', '2010-07-18', NULL, 'Urb. Juan José de Maya manzana B3 casa 1 Albarico ', NULL, NULL, 'Monroy Raquel Elena', '8514991', NULL, 1, NULL, NULL),
(133, '12001320', 'Ledezma Velásquez', 'Kassandra Evany Nathali', 'F', '2006-11-06', NULL, 'Las Tapias sector II calle 9 J.J. Veroes munic. San Felipe', NULL, NULL, 'Mujica Quintero Vicenta Emilia', '15484003', NULL, 1, NULL, NULL),
(134, '12001330', 'Najm Granadillo', 'Migleisy Alexandro ', 'M', '2005-10-29', NULL, 'Ciudadela  Hugo Rafael Chávez Frías zona 5 Apart. 03 San Fel', NULL, NULL, 'Valera Escobar Mayerlin Madelein', '20892619', NULL, 1, NULL, NULL),
(135, '12001340', 'Jayaro Heredia', 'Davic Gustavo ', 'F', '2009-12-23', NULL, 'Avenida Panamericana sector La Cuchilla  San Felipe', NULL, NULL, 'Durán Leny Starlin ', '11425827', NULL, 1, NULL, NULL),
(136, '12001350', 'Tejera Colina', 'Kleyver Jorliandrys ', 'M', '2008-12-27', NULL, 'Luisa Cáceres de Arismendis municipio Independencia', NULL, NULL, 'Aponte García Carolina del Valle  ', '11277028', NULL, 1, NULL, NULL),
(137, '12001360', 'Àrias Avilet', 'Haroldo Alexander ', 'F', '2008-03-16', NULL, 'Santa María Municipio Cocorote ', NULL, NULL, 'León Aime Rafaela', '15767412', NULL, 1, NULL, NULL),
(138, '12001370', 'Montero Castellano', 'Brandon Kimberlyn ', 'M', '2005-07-21', NULL, 'Av. 2 La Hacienda Cañaveral  El Paují  Independencia ', NULL, NULL, 'Prieto  de Fernández Norelkis del V', '15044320', NULL, 1, NULL, NULL),
(139, '12001380', 'Martínez Al', 'Orsido Gisseth ', 'M', '2006-10-27', NULL, 'Barrio Alegría  entre 29 y 30 con Av. 8  Independencia', NULL, NULL, 'Parra Peroza Yuris Carolina', '15483288', NULL, 1, NULL, NULL),
(140, '12001390', 'Berrio Vivas', 'Holday Nayeska ', 'F', '2009-07-01', NULL, 'Conj. Res. Santa Teresa Edif.II piso  3 Cocorote', NULL, NULL, 'Montero de Hernández Ailadgmi Dafne', '13463351', NULL, 1, NULL, NULL),
(141, '12001400', 'Bastidas Burgos', 'Bisneily Rosanni del Milagro', 'F', '2008-07-28', NULL, 'Cocorotico calle El Tanque casa s/n  sector Albarico', NULL, NULL, 'Reverón Lugo Dayana Clairet', '13096278', NULL, 1, NULL, NULL),
(142, '12001410', 'Ríos Villoria', 'Brayhan Joelin ', 'F', '2005-09-27', NULL, 'Urb. Valle Verde calle 1 casa N° 11 Marín San Felipe', NULL, NULL, 'Guillén de Márquez Adriana Margoth', '11654126', NULL, 1, NULL, NULL),
(143, '12001420', 'Vargas Capella', 'Lucia Gerardo ', 'F', '2007-06-24', NULL, 'Las Tapias I sector B Av. 1ero de Mayo casa N° 35', NULL, NULL, 'Reyes Pinto Rebeca', '10857737', NULL, 1, NULL, NULL),
(144, '12001430', 'Colmenàrez Vasquez', 'Dalimar Natalis ', 'M', '2005-12-23', NULL, 'Loma Linda calle Araguaney casa N° 180', NULL, NULL, 'Saibet Aponte Durán', '11651002', NULL, 1, NULL, NULL),
(145, '12001440', 'Ylarraza Ayala', 'Eurimar Ricbelys ', 'M', '2010-01-17', NULL, 'Las Tinajas Albarico calle 9 municipio San Felipe', NULL, NULL, 'Caricote Mendoza Victalia Zulay', '19992348', NULL, 1, NULL, NULL),
(146, '12001450', 'Mata Zerpa', 'Nebras Haimar ', 'M', '2006-04-04', NULL, 'Urb. San José calle 6 casa 68  Independencia', NULL, NULL, 'Pedro Manuel Mujica Juárez', '7505894', NULL, 1, NULL, NULL),
(147, '12001460', 'Almeida Malpica', 'Marìa Manuelis ', 'F', '2005-11-18', NULL, 'Urb. El Valle casa N° 8 munic. Independencia', NULL, NULL, 'Palacios Chirinos Yasmín Tibisay', '15109250', NULL, 1, NULL, NULL),
(148, '12001470', 'Rivero Colmenarez', 'Alfonzo Brayan ', 'M', '2009-09-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(149, '12001480', 'Sequeira Ron', 'Gleiber Sebastian ', 'M', '2009-06-08', NULL, 'Urb. San José calle 11  municipio Independencia', NULL, NULL, 'Carrero Quiñonez Ligia', '22674284', NULL, 1, NULL, NULL),
(150, '12001490', 'Meléndez Cumba', 'Lisseth Fabrianny ', 'M', '2010-06-12', NULL, 'Calle 32 entr 4ta y 5ta Av. Palotal munic Independencia', NULL, NULL, 'López Tarazona Norepci Yannaly', '17843701', NULL, 1, NULL, NULL),
(151, '12001500', 'Peña Ghanem', 'Hildianys Maritza ', 'F', '2005-12-21', NULL, 'Las Tapias 1 Av. J.J. Veroes Av. 2 casa N° 19 San Felipe', NULL, NULL, 'Petit González Joanna María', '14709379', NULL, 1, NULL, NULL),
(152, '12001510', 'Ortíz Ollarves', 'Julián Stehany Derehaldy', 'M', '2009-06-13', NULL, 'La Pradera II calle D entre 1° y 2° casa N° O-05 Cocorote', NULL, NULL, 'Peralta Romero Gaudys Consuelo', '10373803', NULL, 1, NULL, NULL),
(153, '12001520', 'Gutiérrez Barrios', 'Lilie Korina ', 'M', '2008-04-17', NULL, 'Urb. Luis Herrera Campins sector II Av 6  munic. Cocorote', NULL, NULL, 'Keller Oviedo Isabel Yadylex', '17700397', NULL, 1, NULL, NULL),
(154, '12001530', 'Sarabia Prado', 'Mercelys Nicolle ', 'M', '2008-03-09', NULL, '2da Av. entre calles 24 y 24 municipio Independencia', NULL, NULL, 'Lilian Rosa Santana Arenas', '14918573', NULL, 1, NULL, NULL),
(155, '12001540', 'Mora Valery', 'Gabrielis Domenico ', 'M', '2009-06-13', NULL, 'Urb. San José calle 11 casa s/n munic. Independencia', NULL, NULL, 'Gómez Hernández Noris Cecilia Natal', '16960083', NULL, 1, NULL, NULL),
(156, '12001550', 'Reverón D\' Lima', 'Rafael Anabel ', 'F', '2005-09-19', NULL, '4ta Av. Entre 33 y 34 casa N° 33-14 munic. Independencia', NULL, NULL, 'Fernández de Rumbo Raibel Velimar', '12728251', NULL, 1, NULL, NULL),
(157, '12001560', 'Bellera Peraza', 'Anlianis Andreína ', 'F', '2010-03-18', NULL, '6ta etapa de Higuerón con Asentamiento Campesino munic. San ', NULL, NULL, 'García Quintero Onelya Rosa', '19062416', NULL, 1, NULL, NULL),
(158, '12001570', 'Almeròn Mogollón', 'Noé Mariannis ', 'M', '2007-01-29', NULL, 'Urb. Virgen de las Mercedes  Taría municipio  Veroe', NULL, NULL, 'Vargas Pinto Francy Eidimar', '18301117', NULL, 1, NULL, NULL),
(159, '12001580', 'Perozo Prieto', 'Jhonder Jhowarlis ', 'F', '2008-09-09', NULL, 'Calle principal Francisco de Miranda   Albarico ', NULL, NULL, 'Sánchez Suárez Aimar Luisana', '18757787', NULL, 1, NULL, NULL),
(160, '12001590', 'Terán Lugo', 'Ismaily Risneidi ', 'F', '2006-04-10', NULL, '4ta Av.  Esq. calle 26 casa N° 25-13 Independencia', NULL, NULL, 'Ojeda Sánchez Rafael Alfredo', '3913143', NULL, 1, NULL, NULL),
(161, '12001600', 'Oropeza Cortez', 'Anas Franyelis ', 'F', '2007-06-06', NULL, 'Av. Amadeus Saturno  calle 5 Marín San Felipe', NULL, NULL, 'Martínez Mendoza Georgina Ramsue', '13179231', NULL, 1, NULL, NULL),
(162, '12001610', 'Carrasco Valenzuela', 'Kanely Jesús ', 'F', '2010-02-04', NULL, 'Calle 21 entre  2da y 3era Av. sector Monte Oscuro casa 26', NULL, NULL, 'María Bexabet Mora López', '12286674', NULL, 1, NULL, NULL),
(163, '12001620', 'Maldonado Primera', 'Anthoniel Andrew ', 'F', '2010-05-15', NULL, 'Urb. La Pradera II calle 2 y 3 manzana A-13 Cocorote', NULL, NULL, 'Elizabeth Coromoto Arteaga', '12076397', NULL, 1, NULL, NULL),
(164, '12001630', 'Árias Almarza', 'Maikol Branner ', 'F', '2005-08-13', NULL, 'Calle 7 entre Av Bolívar y Páez munic. Cocorote', NULL, NULL, 'Moreno Peña Ada Valezka', '10854674', NULL, 1, NULL, NULL),
(165, '12001640', 'Montilla Inojosa', 'Geremías Douglas ', 'M', '2006-12-01', NULL, 'Barrio José Gregorio Hernández  Cocorotico San Felipe', NULL, NULL, 'Saavedra de Abreu Morelvis del Vall', '15604591', NULL, 1, NULL, NULL),
(166, '12001650', 'Linares Rumbo', 'Edgar Karolina ', 'F', '2009-01-26', NULL, 'Urb. San José calle 10 casa N° 62 munic. Independencia', NULL, NULL, 'Méndez Sandoval Mirla del Valle', '11638055', NULL, 1, NULL, NULL),
(167, '12001660', 'Galíndez Farfan', 'Alina Ánger ', 'M', '2006-08-19', NULL, 'Ciudadela zona 2 Edif. 6 Apart. 2-5 munic. San Felipe', NULL, NULL, 'Tovar Cedeño Dilmary Carolina', '17469061', NULL, 1, NULL, NULL),
(168, '12001670', 'Pèrez Monsalbe', 'Jonnathan Natalit ', 'F', '2005-02-18', NULL, 'Calle 20 entre 7ma y 8va Av. Municipio San Felipe', NULL, NULL, 'Carrillo Dayana Alejandra', '18052329', NULL, 1, NULL, NULL),
(169, '12001680', 'Majano Villanueva', 'Rosderley Paola ', 'F', '2006-09-28', NULL, 'Calle principal Las Flores casa N°7 munic. Cocorote', NULL, NULL, 'Castillo Camacho Daisy Yuselis', '8515997', NULL, 1, NULL, NULL),
(170, '12001690', 'Hermoso Oliveros', 'Stephanìa Kenverlyn ', 'F', '2005-12-28', NULL, 'Urb. San Antonio final de la trans. 12 Fundo San Antonio', NULL, NULL, 'Briceño Mendoza Alexis Enrique', '14971884', NULL, 1, NULL, NULL),
(171, '12001700', 'Miranda Paredes', 'Jatziel Kendall ', 'F', '2008-10-31', NULL, 'Urb. Yacaray calle B casa N° 13 municipio San Felipe', NULL, NULL, 'Gallardo Rodríguez Andreína Vaneidy', '16951029', NULL, 1, NULL, NULL),
(172, '12001710', 'Itriago Quiroga', 'Deliana Derlis Rafael', 'M', '2009-05-13', NULL, 'Calle 25 entre 2da y 3era Av. Casa N° 1-13 Independencia', NULL, NULL, 'Aguilar González Ana Lucía', '7556511', NULL, 1, NULL, NULL),
(173, '12001720', 'Giansante Sánchez', 'Shanttal Sharit ', 'F', '2007-02-07', NULL, 'Urb. Yucaray calle C casa N° 30 municipio San Felipe', NULL, NULL, 'Camacho González Franber José', '15767484', NULL, 1, NULL, NULL),
(174, '12001730', 'Arias Cárdenas', 'Herlet Sarai ', 'M', '2005-01-25', NULL, 'Urb. San José calle 2 casa N° 31 munic. Independencia', NULL, NULL, 'Hernández mendoza Yerrosnic Desiree', '18303326', NULL, 1, NULL, NULL),
(175, '12001740', 'Arza González', 'Ronaldo Melisa ', 'M', '2009-12-12', NULL, 'Barrio Santa Lucía sector 3 casa N° 7  Independencia', NULL, NULL, 'Domínguez Peralta Lisvecht Josefina', '10853068', NULL, 1, NULL, NULL),
(176, '12001750', 'Magallanes Fernández', 'Richel Netzaré ', 'M', '2009-12-14', NULL, 'Guayurebo calle 2 Barrio Mamatila municipio Cocorote', NULL, NULL, 'Fernández Aguilar Cleidis Virginia', '18301905', NULL, 1, NULL, NULL),
(177, '12001760', 'Illas Perdomo', 'Adrian Alexandra ', 'F', '2006-09-10', NULL, 'Calle 25 entre 2° y 3° sector Cementerio Independencia', NULL, NULL, 'García Piña Virginia María', '13985152', NULL, 1, NULL, NULL),
(178, '12001770', 'Valera Moya', 'Gusliannis Camila ', 'F', '2008-05-02', NULL, 'Calle Principal con Av. 1 Urb. Pie de Montaña casa N° 27 ', NULL, NULL, 'Gutiérrez Pérez Jenifer Alejandra', '14797405', NULL, 1, NULL, NULL),
(179, '12001780', 'Botello Catire', 'Aníbal Ismael Nazaret', 'F', '2006-01-14', NULL, 'Brisas del Terminal calle 1 casa N° 129', NULL, NULL, 'Montesinos Hereia Norma Milagros', '13986999', NULL, 1, NULL, NULL),
(180, '12001790', 'Cabrera Covis', 'Emanuel Katherine ', 'M', '2009-05-18', NULL, 'Urb. Higuerón vereda 5 casa N° 7 2da etapa ', NULL, NULL, 'Rondón Vargas Lisbeth Carolina', '14443953', NULL, 1, NULL, NULL),
(181, '12001800', 'Escobar Ramos', 'Amanda Luisana ', 'M', '2007-10-07', NULL, 'Calle 24 entre Avenida 8 y 9  munic. Independencia', NULL, NULL, 'Villegas Mogollón Yubisay Marcelina', '13094556', NULL, 1, NULL, NULL),
(182, '12001810', 'Zumoza Balle', 'Merlyn Enrique ', 'M', '2008-05-02', NULL, 'Urb. Banco Obrero vereda 4 cas N° 28 munic. San Felipe', NULL, NULL, 'Álvarez Carmen Beatriz', '19951493', NULL, 1, NULL, NULL),
(183, '12001820', 'Albarrán Rangel', 'Chantal Naudelimar ', 'F', '2006-06-22', NULL, 'Urb. San José calle 1 casa N°102 munic. Independencia', NULL, NULL, 'Galíndez Tovar Karla Gisel', '18303128', NULL, 1, NULL, NULL),
(184, '12001830', 'Reina Peralta', 'Jhosbert Rodríguez ', 'M', '2009-02-07', NULL, 'Sector Valle La Venta La Aduana  municipio San Felipe', NULL, NULL, 'Primera Lugo Misgleidys Isgle', '14997802', NULL, 1, NULL, NULL),
(185, '12001840', 'Trujillo Barreno', 'Anthomy Edward ', 'M', '2005-09-03', NULL, 'Calle Prin. entre  Libertador y Guayurebo sec. Valle Fresco ', NULL, NULL, 'Vargas Parra Eunice Yaneth', '8510085', NULL, 1, NULL, NULL),
(186, '12001850', 'Sujaa Sarmiento', 'Endrimar Deulys ', 'M', '2009-05-20', NULL, 'Valle del Yurubí  calle 5  casa N° 212 las Tapias ', NULL, NULL, 'Materán Salcedo Sulibella Arsenia', '13984167', NULL, 1, NULL, NULL),
(187, '12001860', 'Urquiola Londoño', 'Elena Mauricio ', 'F', '2010-07-18', NULL, 'Urb Luis Herrera Campins  entre calle 10 y 7 Morita Nueva ', NULL, NULL, 'Arévalo Nadia Donatta', '12278974', NULL, 1, NULL, NULL),
(188, '12001870', 'Palacios Canelo', 'Guaicaris Alan ', 'F', '2006-10-01', NULL, 'Calle 1 sector Alí Primera  municipio San Felipe', NULL, NULL, 'Sánchez de Mujica Johanna Joliscar', '15482138', NULL, 1, NULL, NULL),
(189, '12001880', 'Arévalo Oquendo', 'Camilo Miguel ', 'F', '2006-05-19', NULL, '4ta Av. Entre calle 22 y 23 Guayabal munic. Independencia', NULL, NULL, 'Ochoa Galíndez Yorwin Hairan', '14209987', NULL, 1, NULL, NULL),
(190, '12001890', 'Gamarra Alejos', 'Scarly Josefina ', 'M', '2007-01-14', NULL, 'Ciudadela zona 2 Edif. 6 Apart. 3-3 munic. San Felipe', NULL, NULL, 'Ávila Meza Mary Carmen', '15107341', NULL, 1, NULL, NULL),
(191, '12001900', 'Cañizalez Freites', 'Doriana Antonella ', 'F', '2006-05-11', NULL, 'Urb. Juan José de Maya manzana A3 casa N° 16 ', NULL, NULL, 'Duque Mendoza Yvett Carolina', '13095962', NULL, 1, NULL, NULL),
(192, '12001910', 'Silva Torrelles', 'Eduarlys Damian ', 'F', '2008-12-16', NULL, 'Urb. San José  calle 2 casa N° 90 munic. Independencia', NULL, NULL, 'Caro Villegas Ana Carolina', '16950420', NULL, 1, NULL, NULL),
(193, '12001920', 'Quintero Coa', 'Ashly Liliana ', 'F', '2005-12-10', NULL, 'Calle la Guamita casa N° 2115 San Javier munic. San Felipe', NULL, NULL, 'Ramírez Martínez Yulmary Eusebia', '11271092', NULL, 1, NULL, NULL),
(194, '12001930', 'Griman D`Lima', 'Massiel Margarita ', 'M', '2006-12-06', NULL, 'Urb. San José calle 2 casa N° 7 munic. Independencia', NULL, NULL, 'López Soteldo Ailyn Carolina', '19061097', NULL, 1, NULL, NULL),
(195, '12001940', 'Guedez Camacho', 'Carlos Dhanialys ', 'M', '2005-10-05', NULL, 'Guayurebo calle La Rosa municipio Cocorote', NULL, NULL, 'Rodríguez Ojeda Ingrid Niolsavil', '15108976', NULL, 1, NULL, NULL),
(196, '12001950', 'Pirela Acosta', 'Franderson de Nazareth ', 'F', '2005-07-08', NULL, 'Urb. San José calle 1  municipio Independencia', NULL, NULL, 'Lovera de Ramírez Lissett Natalia', '10369993', NULL, 1, NULL, NULL),
(197, '12001960', 'Moreno Gallone', 'Maelo Eliud ', 'M', '2007-10-23', NULL, 'Avenida La Patria al lado del terminal viejo', NULL, NULL, 'Rojas Domínga de Jesús ', '15389181', NULL, 1, NULL, NULL),
(198, '12001970', 'Pichardo De Santa', 'Evany Katerin ', 'F', '2009-06-25', NULL, 'Urb. San Jose calle 7 casa N° 68  Independencia', NULL, NULL, 'María Josefina Valles Medina', '11646943', NULL, 1, NULL, NULL),
(199, '12001980', 'Loaiza Hiersimar', 'Alexandro D` los Angeles ', 'M', '2009-09-16', NULL, 'Urb. La Hacienda Av. 2 casa N° 33 munic. Independencia', NULL, NULL, 'Orellana de Rodríguez Nohani Dionet', '16112900', NULL, 1, NULL, NULL),
(200, '12001990', 'Giménez Belledo', 'Gustavo Osmairi ', 'M', '2010-05-24', NULL, '6ta etapa de Higuerón con Asentamiento Campesino ', NULL, NULL, 'Sánchez Brito Endri José', '11279212', NULL, 1, NULL, NULL),
(201, '12002000', 'García Caldera', 'Jorliandrys Ederson ', 'F', '2005-04-26', NULL, 'Urb. San José calle 2 csa N° 2-92  municipio Independencia', NULL, NULL, 'Reyes Rivas Johandri de la Trinidad', '19087823', NULL, 1, NULL, NULL),
(202, '12002010', 'Dávila Garcés', 'Alexander Isaid ', 'M', '2009-04-03', NULL, 'Conjunto Residencial Mangos II calle 6  Independencia', NULL, NULL, 'Fuentes Henrríquez Dayana Elizabeth', '15965713', NULL, 1, NULL, NULL),
(203, '12002020', 'Goitía Tovar', 'Kimberlyn David José', 'M', '2005-06-06', NULL, 'Andrés Eloy Blanco calle 6  municipio San Felipe', NULL, NULL, 'Jiménez Maldonado Elaine Alejandra', '18547524', NULL, 1, NULL, NULL),
(204, '12002030', 'Keller Polanco', 'Gisseth Nehomarlis ', 'F', '2008-01-13', NULL, 'Calle 35 entre avenida 4ta y 5ta Av. Independencia', NULL, NULL, 'Peña Aponte María Elizabeth', '13696444', NULL, 1, NULL, NULL),
(205, '12002040', 'Meza Suárez', 'Nayeska Johanis ', 'F', '2007-06-02', NULL, '2da Avenida entre calle 26 y 27  municipio Independencia', NULL, NULL, 'Montero Yngrid Jacqueline', '11272172', NULL, 1, NULL, NULL),
(206, '12002050', 'Aliendres Sequera', 'Rosanni Alessandro ', 'F', '2006-06-25', NULL, 'Urb. San José calle 10 casa N° 60  Independencia', NULL, NULL, 'Sánchez Chacón Yelitza Tibisay', '17751359', NULL, 1, NULL, NULL),
(207, '12002060', 'Briceño López', 'Joelin Leomarys ', 'F', '2010-07-17', NULL, 'Urb. San Antonio trans. 3 casa N° 2B munic. San Felipe', NULL, NULL, 'Al Halah Ghassan', 'E-82.000.7', NULL, 1, NULL, NULL),
(208, '12002070', 'Bolívar Tirado', 'Gerardo Migelys ', 'M', '2009-06-19', NULL, 'Urb. San Antonio frente al liceo munic.  San Felipe', NULL, NULL, 'Najm Noufal Etab', 'E-84.569.9', NULL, 1, NULL, NULL),
(209, '12002080', 'Osuna Dudamell', 'Natalis Noireli ', 'F', '2010-07-12', NULL, 'Ciudadela  zona 12 Edif 1 municipio San Felipe', NULL, NULL, 'Tovar Travieso  Leidys Carolina', '16823906', NULL, 1, NULL, NULL),
(210, '12002090', 'Eulacio Loyo', 'Ricbelys Cristal ', 'F', '2007-09-25', NULL, 'Urb. San José calle 3 munic. Independencia', NULL, NULL, 'Guilarte Domínguez Kislev Nassir', '20190880', NULL, 1, NULL, NULL),
(211, '12002100', 'Álvarez Sojo', 'Haimar Jonnyerli ', 'M', '2005-04-12', NULL, 'San José de Carúpano calle principal casa N° 1 munic. San Fe', NULL, NULL, 'Martínez Verasteguí  Nairelys Alexa', '24339240', NULL, 1, NULL, NULL),
(212, '12002110', 'Rondón Petit', 'Manuelis Del Valle ', 'M', '2010-04-03', NULL, 'Santa Lucía sector 3 casa N° 12  munic. Independencia', NULL, NULL, 'Sabariego Bravo Meiddy Coromoto', '18052360', NULL, 1, NULL, NULL),
(213, '12002120', 'Morales Castro', 'Brayan Jorshanser ', 'M', '2006-06-07', NULL, 'San Gerónimo parroquia Albarico munic. San Felipe', NULL, NULL, 'Guanipa Graterol Naris Tomasa', '13314961', NULL, 1, NULL, NULL),
(214, '12002130', 'La Cruz Colombo', 'Sebastian Eleanyelis ', 'F', '2010-06-20', NULL, 'Urb. Indio Yara calle 5  casa N° 110 munic. San Felipe', NULL, NULL, 'Albarrán Uzcategui Yeraldy Carolina', '18052747', NULL, 1, NULL, NULL),
(215, '12002140', 'Duque Tamayo', 'Fabrianny Hanieliz ', 'M', '2007-08-10', NULL, 'Final calle 31 municipio Independencia', NULL, NULL, 'Sevilla Moreno Minsi Yaroani', '17698088', NULL, 1, NULL, NULL),
(216, '12002150', 'Torres Cuicas', 'Maritza Anderson José', 'M', '2010-03-04', NULL, 'Calle 4 Caja de Agua  casa s/n Boraure munic Trinidad', NULL, NULL, 'Arenas Arteaga Peggi Noelia', '8516281', NULL, 1, NULL, NULL),
(217, '12002160', 'Mendez Silvestre', 'Stehany Missel ', 'F', '2008-09-11', NULL, 'Carbonero calle principal munic. Veroes', NULL, NULL, 'Martínez Rodríguez Damelis Josefina', '16823556', NULL, 1, NULL, NULL),
(218, '12002170', 'Cardona Piñero', 'Korina Manual ', 'F', '2009-09-22', NULL, 'Urb. San José calle principal N° 1-13  Independencia', NULL, NULL, 'Milagros del Carmen  Parra ', '17254211', NULL, 1, NULL, NULL),
(219, '12002180', 'Muñoz Orellana', 'Nicolle Joseph ', 'M', '2007-10-25', NULL, 'Avenida Cedeño Canaima Sur municipio San Felipe', NULL, NULL, 'Páez Luz Belén', '15965392', NULL, 1, NULL, NULL),
(220, '12002190', 'Maturet Mosquera', 'Domenico Ariel ', 'M', '2010-10-01', NULL, 'Urb. Juan José de Maya manzana H-I 14 casa N° 8 munic. San F', NULL, NULL, 'Herrera Calvajal Eilyn Karelia', '19776825', NULL, 1, NULL, NULL),
(221, '12002200', 'Verasteguí Garcías', 'Anabel Bárbara ', 'F', '2007-10-01', NULL, 'Ciudadela  zona 11 Edif 2 Apart. 1-2 munic. San Felipe', NULL, NULL, 'Jiménez Aguilar Marbella  Jaqueline', '13353502', NULL, 1, NULL, NULL),
(222, '12002210', 'Pacheco Guevara', 'Andreína Rusbelis ', 'M', '2009-07-13', NULL, 'Calle Panamer. casa 5 Urb. Granja Altaira San Gerónimo II ', NULL, NULL, 'Corona Martínez  Rosa Adriana', '15107290', NULL, 1, NULL, NULL),
(223, '12002220', 'Gilarte Toledo', 'Mariannis Eliexander ', 'F', '2010-11-17', NULL, '2da Av. Con calle 19 y 20 edif Yaracuy 1B  Banco Obrero  ', NULL, NULL, 'Sequeira Montero Bergith Belisa', '15964221', NULL, 1, NULL, NULL),
(224, '12002230', 'Aponte Pernalete', 'Jhowarlis Enzo ', 'M', '2008-05-07', NULL, 'Urb. San José calle 2 casa N° 55 munic. Independencia', NULL, NULL, 'Jenifert Gertrudis Savatierra Borge', '15643215', NULL, 1, NULL, NULL),
(225, '12002240', 'Albaini Granda', 'Risneidi Ricmar ', 'M', '2006-10-18', NULL, 'Urb. San José calle 8 casa N° 99 Independencia', NULL, NULL, 'Cotiz de Hermoso  Mileidiz Coromoto', '15592608', NULL, 1, NULL, NULL),
(226, '12002250', 'Palma Grao', 'Franyelis Edgardo ', 'M', '2009-04-16', NULL, 'Banco Obrero 2da Av. Casa N° 2 con 18   San Felipe', NULL, NULL, 'Hernández Cerpa Gouglas José', '12115101', NULL, 1, NULL, NULL),
(227, '12002260', 'Cuenca Jiménez', 'Jesús Patricia ', 'F', '2009-11-16', NULL, 'Banco Obrero 2da Av. Casa N° 2 con 18  San Felipe', NULL, NULL, 'Hernández Cerpa Gouglas José', '12115101', NULL, 1, NULL, NULL),
(228, '12002270', 'Di Palma Navea', 'Andrew Eliezer ', 'F', '2010-09-29', NULL, 'Urb. San José Calle 9 casa N°29  munic. Independencia', NULL, NULL, 'Arteaga Tovar  Norma Yadira', '8518573', NULL, 1, NULL, NULL),
(229, '12002280', 'Galeno De Cristofaro', 'Branner Dervis ', 'M', '2009-04-24', NULL, 'Urb. San José calle 3 casa N° 110 munic. Independencia', NULL, NULL, 'Campos Castillo Yuxeni Jackeline', '12280595', NULL, 1, NULL, NULL),
(230, '12002290', 'Arrieche Rojas', 'Douglas Inadier ', 'F', '2008-11-24', NULL, 'Urb. Los Samanes Agua Negra munic Veroes  Farrial', NULL, NULL, 'Parra Barboza Luisa Melia', '15484893', NULL, 1, NULL, NULL),
(231, '12002300', 'Pineda Sartori', 'Karolina René ', 'F', '2010-06-06', NULL, 'Urb. Nelson Suárez sector Don Juancho calle 3 Av. 4', NULL, NULL, 'Lovera Pineda  Jesús Alfredo', '17061830', NULL, 1, NULL, NULL),
(232, '12002310', 'Figueroa Chirino', 'Ánger Fabián ', 'F', '2009-10-27', NULL, 'Ciudadela  zona 10  Apart. 35 Edif. 2 munic. San Felipe', NULL, NULL, 'Malpica Gómez Yetzi Jennifer', '16111600', NULL, 1, NULL, NULL),
(233, '12002320', 'Bruno Orta', 'Natalit Oscar ', 'M', '2006-02-23', NULL, 'Urb. Los Sauces II calle 4  casa 16 Quinta La Abuela  ', NULL, NULL, 'Jiménez Maldonado Elaine Alejandra', '18052951', NULL, 1, NULL, NULL),
(234, '12002330', 'Contreras Urbina', 'Paola Emely ', 'F', '2009-09-30', NULL, 'Urb. La Ermita Nueva calle 6 munic Cocorote', NULL, NULL, 'Pérez Alejos Obilia Ramona', '12080193', NULL, 1, NULL, NULL);
INSERT INTO `alumnos` (`id`, `cedula`, `apellidos`, `nombres`, `genero`, `fecha_nacimiento`, `lugar_nacimiento`, `direccion`, `telefono`, `correo`, `representante`, `cedula_rep`, `telefono_rep`, `estado`, `created_at`, `updated_at`) VALUES
(1257, 'Cedula', 'Apellidos', 'Nombres', 'G', '0000-00-00', NULL, 'Direccion', 'Telefono', NULL, 'Representante', 'Cedula_rep', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anios`
--

CREATE TABLE `anios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `id_activo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anios`
--

INSERT INTO `anios` (`id`, `numero`, `id_activo`, `created_at`, `updated_at`) VALUES
(1, '2022-2023', '4', NULL, '2022-11-02 09:17:18'),
(2, '2020-2021', '', NULL, NULL),
(3, '2021-2022', '', NULL, NULL),
(4, '2022-2023', '', NULL, NULL),
(5, '2023-2024', '', NULL, NULL),
(6, '2024-2025', '', NULL, NULL),
(7, '2025-2026', '', NULL, NULL),
(8, '2026-2027', '', NULL, NULL),
(9, '2027-2028', '', NULL, NULL),
(10, '2028-2029', '', NULL, NULL),
(11, '2029-2030', '', NULL, NULL),
(12, '2030-2031', '', NULL, NULL),
(13, '2031-2032', '', NULL, NULL),
(14, '2032-2033', '', NULL, NULL),
(15, '2033-2034', '', NULL, NULL),
(16, '2034-2035', '', NULL, NULL),
(17, '2036-2037', '', NULL, NULL),
(18, '2037-2038', '', NULL, NULL),
(19, '2038-2039', '', NULL, NULL),
(21, 'Numero', 'id', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio_asignaturas`
--

CREATE TABLE `anio_asignaturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `asignatura_id` bigint(20) UNSIGNED DEFAULT NULL,
  `docente_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anio_asignaturas`
--

INSERT INTO `anio_asignaturas` (`id`, `anio_id`, `asignatura_id`, `docente_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, '2022-11-02 08:15:29', '2022-11-02 08:15:29'),
(2, 4, 2, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(3, 4, 3, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(4, 4, 4, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(5, 4, 5, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(6, 4, 6, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(7, 4, 7, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(8, 4, 8, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(9, 4, 9, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(10, 4, 10, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(11, 4, 11, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(12, 4, 12, NULL, '2022-11-02 08:15:30', '2022-11-02 08:15:30'),
(13, 4, 13, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(14, 4, 14, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(15, 4, 15, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(16, 4, 16, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(17, 4, 17, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(18, 4, 18, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(19, 4, 19, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(20, 4, 20, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(21, 4, 21, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(22, 4, 22, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(23, 4, 23, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(24, 4, 24, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(25, 4, 25, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(26, 4, 26, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(27, 4, 27, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(28, 4, 28, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(29, 4, 29, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(30, 4, 30, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(31, 4, 31, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(32, 4, 32, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(33, 4, 33, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(34, 4, 34, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(35, 4, 35, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(36, 4, 36, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(37, 4, 37, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(38, 4, 38, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(39, 4, 39, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(40, 4, 40, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(41, 4, 41, NULL, '2022-11-02 08:15:31', '2022-11-02 08:15:31'),
(42, 4, 42, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(43, 4, 43, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(44, 4, 44, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(45, 4, 45, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(46, 4, 46, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(47, 4, 47, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(48, 4, 48, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(49, 4, 49, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(50, 4, 50, NULL, '2022-11-02 08:15:32', '2022-11-02 08:15:32'),
(51, 5, 1, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(52, 5, 2, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(53, 5, 3, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(54, 5, 4, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(55, 5, 5, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(56, 5, 6, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(57, 5, 7, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(58, 5, 8, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(59, 5, 9, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(60, 5, 10, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(61, 5, 11, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(62, 5, 12, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(63, 5, 13, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(64, 5, 14, NULL, '2022-11-02 08:24:32', '2022-11-02 08:24:32'),
(65, 5, 15, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(66, 5, 16, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(67, 5, 17, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(68, 5, 18, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(69, 5, 19, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(70, 5, 20, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(71, 5, 21, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(72, 5, 22, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(73, 5, 23, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(74, 5, 24, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(75, 5, 25, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(76, 5, 26, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(77, 5, 27, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(78, 5, 28, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(79, 5, 29, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(80, 5, 30, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(81, 5, 31, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(82, 5, 32, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(83, 5, 33, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(84, 5, 34, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(85, 5, 35, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(86, 5, 36, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(87, 5, 37, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(88, 5, 38, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(89, 5, 39, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(90, 5, 40, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(91, 5, 41, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(92, 5, 42, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(93, 5, 43, NULL, '2022-11-02 08:24:33', '2022-11-02 08:24:33'),
(94, 5, 44, NULL, '2022-11-02 08:24:34', '2022-11-02 08:24:34'),
(95, 5, 45, NULL, '2022-11-02 08:24:34', '2022-11-02 08:24:34'),
(96, 5, 46, NULL, '2022-11-02 08:24:34', '2022-11-02 08:24:34'),
(97, 5, 47, NULL, '2022-11-02 08:24:34', '2022-11-02 08:24:34'),
(98, 5, 48, NULL, '2022-11-02 08:24:34', '2022-11-02 08:24:34'),
(99, 5, 49, NULL, '2022-11-02 08:24:34', '2022-11-02 08:24:34'),
(100, 5, 50, NULL, '2022-11-02 08:24:34', '2022-11-02 08:24:34'),
(101, 3, 1, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(102, 3, 2, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(103, 3, 3, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(104, 3, 4, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(105, 3, 5, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(106, 3, 6, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(107, 3, 7, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(108, 3, 8, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(109, 3, 9, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(110, 3, 10, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(111, 3, 11, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(112, 3, 12, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(113, 3, 13, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(114, 3, 14, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(115, 3, 15, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(116, 3, 16, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(117, 3, 17, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(118, 3, 18, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(119, 3, 19, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(120, 3, 20, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(121, 3, 21, NULL, '2022-11-02 08:25:37', '2022-11-02 08:25:37'),
(122, 3, 22, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(123, 3, 23, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(124, 3, 24, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(125, 3, 25, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(126, 3, 26, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(127, 3, 27, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(128, 3, 28, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(129, 3, 29, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(130, 3, 30, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(131, 3, 31, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(132, 3, 32, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(133, 3, 33, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(134, 3, 34, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(135, 3, 35, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(136, 3, 36, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(137, 3, 37, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(138, 3, 38, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(139, 3, 39, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(140, 3, 40, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(141, 3, 41, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(142, 3, 42, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(143, 3, 43, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(144, 3, 44, NULL, '2022-11-02 08:25:38', '2022-11-02 08:25:38'),
(145, 3, 45, NULL, '2022-11-02 08:25:39', '2022-11-02 08:25:39'),
(146, 3, 46, NULL, '2022-11-02 08:25:39', '2022-11-02 08:25:39'),
(147, 3, 47, NULL, '2022-11-02 08:25:39', '2022-11-02 08:25:39'),
(148, 3, 48, NULL, '2022-11-02 08:25:39', '2022-11-02 08:25:39'),
(149, 3, 49, NULL, '2022-11-02 08:25:39', '2022-11-02 08:25:39'),
(150, 3, 50, NULL, '2022-11-02 08:25:39', '2022-11-02 08:25:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `abreviado` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `calificacion_tipo` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `orden` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `abreviado`, `nombre`, `calificacion_tipo`, `estado`, `orden`, `grado_id`, `created_at`, `updated_at`) VALUES
(1, 'Castellano', 'Castellano', 'numerica', 1, '1', 1, NULL, NULL),
(2, 'Ingles', 'Ingles y otras lenguas extranjeras', 'numerica', 1, '2', 1, NULL, NULL),
(3, 'Matematica', 'Matematica', 'numerica', 1, '3', 1, NULL, NULL),
(4, 'Deporte', 'Educacion Fisica', 'numerica', 1, '4', 1, NULL, NULL),
(5, 'Art y Patr', 'Arte y Patrimonio', 'numerica', 1, '5', 1, NULL, NULL),
(6, 'Cs. Naturales', 'Ciencias Naturales', 'numerica', 1, '6', 1, NULL, NULL),
(7, 'GHC', 'Geografia, Historia y Ciudadania', 'numerica', 1, '7', 1, NULL, NULL),
(8, 'Orient y Conv', 'Orientacion y Convivencia', 'Literal', 1, '8', 1, NULL, NULL),
(9, 'P.G.C.R.C.', 'Participacion de Grupos de Creacion, Recreacion y Produccion ', 'Literal', 1, '9', 1, NULL, NULL),
(10, 'Castellano', 'Castellano', 'numerica', 1, '10', 2, NULL, NULL),
(11, 'Ingles', 'Ingles y otras lenguas extranjeras', 'numerica', 1, '11', 2, NULL, NULL),
(12, 'Matematica', 'Matematica', 'numerica', 1, '12', 2, NULL, NULL),
(13, 'Deporte', 'Educacion Fisica', 'numerica', 1, '13', 2, NULL, NULL),
(14, 'Art y Patr', 'Arte y Patrimonio', 'numerica', 1, '14', 2, NULL, NULL),
(15, 'Cs. Naturales', 'Ciencias Naturales', 'numerica', 1, '15', 2, NULL, NULL),
(16, 'GHC', 'Geografia, Historia y Ciudadania', 'numerica', 1, '16', 2, NULL, NULL),
(17, 'Orient y Conv', 'Orientacion y Convivencia', 'Literal', 1, '17', 2, NULL, NULL),
(18, 'P.G.C.R.C.', 'Participacion de Grupos de Creacion, Recreacion y Produccion ', 'Literal', 1, '18', 2, NULL, NULL),
(19, 'Castellano', 'Castellano', 'numerica', 1, '19', 3, NULL, NULL),
(20, 'Ingles', 'Ingles y otras lenguas extranjeras', 'numerica', 1, '20', 3, NULL, NULL),
(21, 'Matematica', 'Matematica', 'numerica', 1, '21', 3, NULL, NULL),
(22, 'Deporte', 'Educacion Fisica', 'numerica', 1, '22', 3, NULL, NULL),
(23, 'Fisica', 'Fisica', 'numerica', 1, '23', 3, NULL, NULL),
(24, 'Quimica', 'Quimica', 'numerica', 1, '24', 3, NULL, NULL),
(25, 'Biologia', 'Biologia', 'numerica', 1, '25', 3, NULL, NULL),
(26, 'GHC', 'Geografia, Historia y Ciudadania', 'numerica', 1, '26', 3, NULL, NULL),
(27, 'Orient y Conv', 'Orientacion y Convivencia', 'Literal', 1, '27', 3, NULL, NULL),
(28, 'P.G.C.R.C.', 'Participacion de Grupos de Creacion, Recreacion y Produccion ', 'Literal', 1, '28', 3, NULL, NULL),
(29, 'Castellano', 'Castellano', 'numerica', 1, '29', 4, NULL, NULL),
(30, 'Ingles', 'Ingles y otras lenguas extranjeras', 'numerica', 1, '30', 4, NULL, NULL),
(31, 'Matematica', 'Matematica', 'numerica', 1, '31', 4, NULL, NULL),
(32, 'Deporte', 'Educacion Fisica', 'numerica', 1, '32', 4, NULL, NULL),
(33, 'Fisica', 'Fisica', 'numerica', 1, '33', 4, NULL, NULL),
(34, 'Quimica', 'Quimica', 'numerica', 1, '34', 4, NULL, NULL),
(35, 'Biologia', 'Biologia', 'numerica', 1, '35', 4, NULL, NULL),
(36, 'GHC', 'Geografia, Historia y Ciudadania', 'numerica', 1, '36', 4, NULL, NULL),
(37, 'FSN', 'Formacion para la Soberania Nacional', 'numerica', 1, '37', 4, NULL, NULL),
(38, 'Orient y Conv', 'Orientacion y Convivencia', 'Literal', 1, '38', 4, NULL, NULL),
(39, 'P.G.C.R.C.', 'Participacion de Grupos de Creacion, Recreacion y Produccion ', 'Literal', 1, '39', 4, NULL, NULL),
(40, 'Castellano', 'Castellano', 'numerica', 1, '40', 5, NULL, NULL),
(41, 'Ingles', 'Ingles y otras lenguas extranjeras', 'numerica', 1, '41', 5, NULL, NULL),
(42, 'Matematica', 'Matematica', 'numerica', 1, '42', 5, NULL, NULL),
(43, 'Deporte', 'Educacion Fisica', 'numerica', 1, '43', 5, NULL, NULL),
(44, 'Fisica', 'Fisica', 'numerica', 1, '44', 5, NULL, NULL),
(45, 'Quimica', 'Quimica', 'numerica', 1, '45', 5, NULL, NULL),
(46, 'Biologia', 'Biologia', 'numerica', 1, '46', 5, NULL, NULL),
(47, 'GHC', 'Geografia, Historia y Ciudadania', 'numerica', 1, '47', 5, NULL, NULL),
(48, 'FSN', 'Formacion para la Soberania Nacional', 'numerica', 1, '48', 5, NULL, NULL),
(49, 'Orient y Conv', 'Orientacion y Convivencia', 'Literal', 1, '49', 5, NULL, NULL),
(50, 'P.G.C.R.C.', 'Participacion de Grupos de Creacion, Recreacion y Produccion ', 'Literal', 1, '50', 5, NULL, NULL),
(60, '', '', '', 0, NULL, NULL, NULL, NULL),
(61, '', '', '', 0, NULL, NULL, NULL, NULL),
(62, '', '', '', 0, NULL, NULL, NULL, NULL),
(63, '', '', '', 0, NULL, NULL, NULL, NULL),
(64, '', '', '', 0, NULL, NULL, NULL, NULL),
(65, '', '', '', 0, NULL, NULL, NULL, NULL),
(66, '', '', '', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_notas`
--

CREATE TABLE `corte_notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `inicio` date NOT NULL,
  `final` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `corte_notas`
--

INSERT INTO `corte_notas` (`id`, `nombre`, `inicio`, `final`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'momento-1', '0000-00-00', '0000-00-00', 1, NULL, NULL),
(2, 'momento-2', '0000-00-00', '0000-00-00', 1, NULL, NULL),
(3, 'momento-3', '0000-00-00', '0000-00-00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_pendientes`
--

CREATE TABLE `corte_pendientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `corte_pendientes`
--

INSERT INTO `corte_pendientes` (`id`, `nombre`, `fecha`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'mom1', '0000-00-00', 1, NULL, NULL),
(2, 'mom2', '0000-00-00', 1, NULL, NULL),
(3, 'mom3', '0000-00-00', 1, NULL, NULL),
(4, 'mom4', '0000-00-00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_docente` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonos` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre_docente`, `especialidad`, `telefonos`, `correo`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Lorenzo Jazmin', NULL, NULL, 'Lorenzo_Jazmin@gmail.com', 1, NULL, NULL),
(2, 'Bustamante Carlos', NULL, '0416-2367458', 'Bustamante_Carlos@gmail.com', 1, NULL, NULL),
(3, 'Arteaga Fernanda', NULL, '0424-6574125', 'Arteaga_Fernanda@gmail.com', 1, NULL, NULL),
(4, 'Colmenarez Fidel', NULL, NULL, 'Colmenarez_Fidel@gmail.com', 1, NULL, NULL),
(5, 'Gonzalez Daniela', NULL, NULL, 'Gonzalez_Daniela@gmail.com', 1, NULL, NULL),
(6, 'Alejandra Rojas', NULL, NULL, 'Alejandra_Rojas@gmail.com', 1, NULL, NULL),
(7, 'Alexis Gómez ', NULL, NULL, 'Alexis_Gómez_@gmail.com', 1, NULL, NULL),
(8, 'Carmen Mora', NULL, NULL, 'Carmen_Mora@gmail.com', 1, NULL, NULL),
(9, 'Cristian Alcalá', NULL, NULL, 'Cristian_Alcalá@gmail.com', 1, NULL, NULL),
(10, 'Dilia Giménez', NULL, NULL, 'Dilia_Giménez@gmail.com', 1, NULL, NULL),
(11, 'Edward Álvarez', NULL, NULL, 'Edward_Álvarez@gmail.com', 1, NULL, NULL),
(12, 'Elías Serrano', NULL, NULL, 'Elías_Serrano@gmail.com', 1, NULL, NULL),
(13, 'Estarlhy', NULL, NULL, 'Estarlhy@gmail.com', 1, NULL, NULL),
(14, 'Evelhín Gutiérrez', NULL, NULL, 'Evelhín_Gutiérrez@gmail.com', 1, NULL, NULL),
(15, 'Eysix Colmenarez', NULL, NULL, 'Eysix_Colmenarez@gmail.com', 1, NULL, NULL),
(16, 'Gabriela Nuñez', NULL, NULL, 'Gabriela_Nuñez@gmail.com', 1, NULL, NULL),
(17, 'Jenifer Gutiérrez', NULL, NULL, 'Jenifer_Gutiérrez@gmail.com', 1, NULL, NULL),
(18, 'Jesús Navea', NULL, NULL, 'Jesús_Navea@gmail.com', 1, NULL, NULL),
(19, 'José Chacón', NULL, NULL, 'José_Chacón@gmail.com', 1, NULL, NULL),
(20, 'José Escalona', NULL, NULL, 'José_Escalona@gmail.com', 1, NULL, NULL),
(21, 'Libia Rivero', NULL, NULL, 'Libia_Rivero@gmail.com', 1, NULL, NULL),
(22, 'Lisbetth Rondón', NULL, NULL, 'Lisbetth_Rondón@gmail.com', 1, NULL, NULL),
(23, 'Lixsy Hernández', NULL, NULL, 'Lixsy_Hernández@gmail.com', 1, NULL, NULL),
(24, 'Luis González', NULL, NULL, 'Luis_González@gmail.com', 1, NULL, NULL),
(25, 'María Colina', NULL, NULL, 'María_Colina@gmail.com', 1, NULL, NULL),
(26, 'María Flores', NULL, NULL, 'María_Flores@gmail.com', 1, NULL, NULL),
(27, 'Marianella Jiménez', NULL, NULL, 'Marianella_Jiménez@gmail.com', 1, NULL, NULL),
(28, 'Mary Camacho', NULL, NULL, 'Mary_Camacho@gmail.com', 1, NULL, NULL),
(29, 'Mary Leguiza', NULL, NULL, 'Mary_Leguiza@gmail.com', 1, NULL, NULL),
(30, 'Maybelis Rojas', NULL, NULL, 'Maybelis_Rojas@gmail.com', 1, NULL, NULL),
(31, 'Milagros Reyes', NULL, NULL, 'Milagros_Reyes@gmail.com', 1, NULL, NULL),
(32, 'Oliver Moreno', NULL, NULL, 'Oliver_Moreno@gmail.com', 1, NULL, NULL),
(33, 'Robert Parra', NULL, NULL, 'Robert_Parra@gmail.com', 1, NULL, NULL),
(34, 'Virginia Simanca', NULL, NULL, 'Virginia_Simanca@gmail.com', 1, NULL, NULL),
(35, 'Yamile Peña', NULL, NULL, 'Yamile_Peña@gmail.com', 1, NULL, NULL),
(37, 'Nombre_docente', 'Especialidad', 'Telefonos', 'Correo', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `connection` text COLLATE utf8_spanish_ci NOT NULL,
  `queue` text COLLATE utf8_spanish_ci NOT NULL,
  `payload` longtext COLLATE utf8_spanish_ci NOT NULL,
  `exception` longtext COLLATE utf8_spanish_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_grado` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre_grado`, `estado`, `created_at`, `updated_at`) VALUES
(1, '1°', 1, NULL, NULL),
(2, '2°', 1, NULL, NULL),
(3, '3°', 1, NULL, NULL),
(4, '4°', 1, NULL, NULL),
(5, '5°', 1, NULL, NULL),
(6, '6°', 0, NULL, NULL),
(7, '7°', 0, NULL, NULL),
(8, '8°', 0, NULL, NULL),
(9, '9°', 0, NULL, NULL),
(10, '10°', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_estables`
--

CREATE TABLE `grupo_estables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `anio_id` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `docente_id` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grado_id` bigint(20) UNSIGNED DEFAULT NULL,
  `seccion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alumno_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grupo_estable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estatus` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_estatus` date DEFAULT NULL,
  `repite` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `anio_id`, `grado_id`, `seccion_id`, `alumno_id`, `grupo_estable_id`, `estatus`, `fecha_estatus`, `repite`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, NULL, NULL, NULL, 0, '2022-11-02 08:23:34', '2022-11-02 08:23:34'),
(2, 5, 2, 2, 1, NULL, NULL, NULL, 0, '2022-11-02 08:24:43', '2022-11-02 08:24:43'),
(3, 4, 3, 2, 2, NULL, NULL, NULL, 0, '2022-11-02 08:25:16', '2022-11-02 08:25:16'),
(4, 5, 4, 3, 2, NULL, NULL, NULL, 0, '2022-11-02 08:27:36', '2022-11-02 08:27:36'),
(5, 4, 4, 2, 4, NULL, 'Ingreso', '2022-11-02', 1, '2022-11-02 08:28:06', '2022-11-02 08:28:06'),
(6, 5, 4, 3, 4, NULL, NULL, NULL, 1, '2022-11-02 08:35:19', '2022-11-02 08:35:19'),
(7, 4, 3, 1, 5, NULL, NULL, NULL, 0, '2022-11-02 08:35:51', '2022-11-02 08:35:51'),
(8, 5, 4, 3, 5, NULL, NULL, NULL, 0, '2022-11-02 08:40:20', '2022-11-02 08:40:20'),
(9, 4, 3, 1, 6, NULL, NULL, NULL, 0, '2022-11-02 08:40:42', '2022-11-02 08:40:42'),
(10, 5, 4, 2, 6, NULL, NULL, NULL, 0, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(11, 4, 5, 2, 7, NULL, NULL, NULL, 0, '2022-11-02 08:58:41', '2022-11-02 08:58:41'),
(12, 4, 4, 2, 8, NULL, NULL, NULL, 0, '2022-11-02 09:06:29', '2022-11-02 09:06:29'),
(13, 4, 1, 1, 9, NULL, NULL, NULL, 0, '2022-11-02 09:15:04', '2022-11-02 09:15:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_26_144325_create_anios_table', 1),
(6, '2022_04_26_145203_create_grados_table', 1),
(7, '2022_04_26_145516_create_seccions_table', 1),
(8, '2022_04_26_150118_create_alumnos_table', 1),
(9, '2022_04_26_150213_create_docentes_table', 1),
(10, '2022_04_26_225545_create_grupo_estables_table', 1),
(11, '2022_04_27_150325_create_asignaturas_table', 1),
(12, '2022_04_27_150605_create_matriculas_table', 1),
(13, '2022_04_27_150625_create_retiros_table', 1),
(14, '2022_07_13_154130_create_anio_asignaturas_table', 1),
(15, '2022_07_13_155807_create_notas_table', 1),
(16, '2022_09_28_184308_create_permission_tables', 1),
(17, '2022_10_13_190631_create_pendientes_table', 1),
(18, '2022_10_17_221029_create_corte_notas_table', 1),
(19, '2022_10_17_232759_create_corte_pendientes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota1` decimal(4,2) DEFAULT NULL,
  `nota2` decimal(4,2) DEFAULT NULL,
  `nota3` decimal(4,2) DEFAULT NULL,
  `nota_def` decimal(4,2) DEFAULT NULL,
  `matricula_id` bigint(20) UNSIGNED DEFAULT NULL,
  `anio_asignatura_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `nota1`, `nota2`, `nota3`, `nota_def`, `matricula_id`, `anio_asignatura_id`, `created_at`, `updated_at`) VALUES
(1, '20.00', '20.00', '20.00', '20.00', 1, 1, '2022-11-02 08:23:34', '2022-11-02 08:23:50'),
(2, '20.00', '20.00', '20.00', '20.00', 1, 2, '2022-11-02 08:23:34', '2022-11-02 08:23:54'),
(3, '20.00', '20.00', '20.00', '20.00', 1, 3, '2022-11-02 08:23:34', '2022-11-02 08:23:59'),
(4, '20.00', '20.00', '20.00', '20.00', 1, 4, '2022-11-02 08:23:34', '2022-11-02 08:24:04'),
(5, '20.00', '20.00', '20.00', '20.00', 1, 5, '2022-11-02 08:23:34', '2022-11-02 08:24:09'),
(6, '20.00', '20.00', '20.00', '20.00', 1, 6, '2022-11-02 08:23:34', '2022-11-02 08:24:13'),
(7, '20.00', '20.00', '20.00', '20.00', 1, 7, '2022-11-02 08:23:34', '2022-11-02 08:24:17'),
(8, '20.00', '20.00', '20.00', '20.00', 1, 8, '2022-11-02 08:23:34', '2022-11-02 08:24:21'),
(9, '20.00', '20.00', '20.00', '20.00', 1, 9, '2022-11-02 08:23:34', '2022-11-02 08:24:25'),
(10, '20.00', '2.00', '20.00', '14.00', 2, 10, '2022-11-02 08:24:43', '2022-11-02 08:43:42'),
(11, '20.00', '2.00', '20.00', '14.00', 2, 11, '2022-11-02 08:24:43', '2022-11-02 08:43:46'),
(12, '20.00', '20.00', '2.00', '14.00', 2, 12, '2022-11-02 08:24:43', '2022-11-02 08:43:51'),
(13, '20.00', '20.00', '20.00', '20.00', 2, 13, '2022-11-02 08:24:43', '2022-11-02 08:43:54'),
(14, '2.00', '2.00', '2.00', '2.00', 2, 14, '2022-11-02 08:24:43', '2022-11-02 08:43:58'),
(15, '20.00', '20.00', '20.00', '20.00', 2, 15, '2022-11-02 08:24:43', '2022-11-02 08:44:03'),
(16, '1.00', '20.00', '20.00', '13.67', 2, 16, '2022-11-02 08:24:43', '2022-11-02 09:09:26'),
(17, '5.00', '8.00', '20.00', '11.00', 2, 17, '2022-11-02 08:24:43', '2022-11-02 09:09:20'),
(18, '20.00', '20.00', '20.00', '20.00', 2, 18, '2022-11-02 08:24:43', '2022-11-02 08:44:15'),
(19, '12.00', '2.00', '1.00', '5.00', 3, 19, '2022-11-02 08:25:17', '2022-11-02 08:26:42'),
(20, '16.00', '19.00', '6.00', '13.67', 3, 20, '2022-11-02 08:25:17', '2022-11-02 08:27:21'),
(21, '20.00', '20.00', '20.00', '20.00', 3, 21, '2022-11-02 08:25:17', '2022-11-02 08:27:13'),
(22, '20.00', '20.00', '20.00', '20.00', 3, 22, '2022-11-02 08:25:17', '2022-11-02 08:27:07'),
(23, '5.00', '6.00', '8.00', '6.33', 3, 23, '2022-11-02 08:25:17', '2022-11-02 08:26:48'),
(24, '20.00', '20.00', '20.00', '20.00', 3, 24, '2022-11-02 08:25:17', '2022-11-02 08:26:53'),
(25, '20.00', '20.00', '20.00', '20.00', 3, 25, '2022-11-02 08:25:17', '2022-11-02 08:27:03'),
(26, '20.00', '20.00', '20.00', '20.00', 3, 26, '2022-11-02 08:25:17', '2022-11-02 08:26:58'),
(27, '20.00', '20.00', '20.00', '20.00', 3, 27, '2022-11-02 08:25:17', '2022-11-02 08:26:16'),
(28, '20.00', NULL, '20.00', '13.33', 3, 28, '2022-11-02 08:25:17', '2022-11-02 08:26:11'),
(29, '5.00', '6.00', '4.00', '5.00', 4, 29, '2022-11-02 08:27:37', '2022-11-02 08:44:21'),
(30, '20.00', '20.00', '15.00', '18.33', 4, 30, '2022-11-02 08:27:37', '2022-11-02 08:44:53'),
(31, '16.00', '2.00', '1.00', '6.33', 4, 31, '2022-11-02 08:27:37', '2022-11-02 08:45:00'),
(32, '20.00', '2.00', '20.00', '14.00', 4, 32, '2022-11-02 08:27:37', '2022-11-02 08:45:06'),
(33, '13.00', '15.00', '13.00', '13.67', 4, 33, '2022-11-02 08:27:37', '2022-11-02 08:45:11'),
(34, '20.00', '20.00', '20.00', '20.00', 4, 34, '2022-11-02 08:27:37', '2022-11-02 08:45:22'),
(35, '13.00', '13.00', '13.00', '13.00', 4, 35, '2022-11-02 08:27:37', '2022-11-02 08:45:17'),
(36, '13.00', '15.00', '13.00', '13.67', 4, 36, '2022-11-02 08:27:37', '2022-11-02 08:44:46'),
(37, '20.00', '20.00', '20.00', '20.00', 4, 37, '2022-11-02 08:27:37', '2022-11-02 08:44:41'),
(38, '20.00', '20.00', '18.00', '19.33', 4, 38, '2022-11-02 08:27:37', '2022-11-02 08:44:27'),
(39, '15.00', '12.00', '13.00', '13.33', 4, 39, '2022-11-02 08:27:37', '2022-11-02 08:44:35'),
(40, '20.00', '20.00', '20.00', '20.00', 5, 29, '2022-11-02 08:28:06', '2022-11-02 08:35:06'),
(41, '20.00', '20.00', '18.00', '19.33', 5, 30, '2022-11-02 08:28:07', '2022-11-02 08:29:45'),
(42, '16.00', '15.00', '16.00', '15.67', 5, 31, '2022-11-02 08:28:07', '2022-11-02 08:29:51'),
(43, '20.00', '20.00', '20.00', '20.00', 5, 32, '2022-11-02 08:28:07', '2022-11-02 08:29:39'),
(44, '20.00', '20.00', '20.00', '20.00', 5, 33, '2022-11-02 08:28:07', '2022-11-02 08:29:32'),
(45, '20.00', '20.00', '20.00', '20.00', 5, 34, '2022-11-02 08:28:07', '2022-11-02 08:29:25'),
(46, '2.00', '2.00', '2.00', '2.00', 5, 35, '2022-11-02 08:28:07', '2022-11-02 08:29:19'),
(47, '8.00', '9.00', '6.00', '7.67', 5, 36, '2022-11-02 08:28:07', '2022-11-02 08:29:13'),
(48, '2.00', '5.00', '6.00', '4.33', 5, 37, '2022-11-02 08:28:07', '2022-11-02 08:29:07'),
(49, '20.00', '20.00', '20.00', '20.00', 5, 38, '2022-11-02 08:28:07', '2022-11-02 08:29:02'),
(50, '20.00', '4.00', '8.00', '10.67', 5, 39, '2022-11-02 08:28:07', '2022-11-02 08:28:57'),
(51, '20.00', '20.00', '20.00', '20.00', 6, 29, '2022-11-02 08:35:19', '2022-11-02 08:45:29'),
(52, '20.00', '20.00', '20.00', '20.00', 6, 30, '2022-11-02 08:35:19', '2022-11-02 08:45:37'),
(53, '20.00', '20.00', '20.00', '20.00', 6, 31, '2022-11-02 08:35:19', '2022-11-02 08:45:43'),
(54, '20.00', '2.00', '20.00', '14.00', 6, 32, '2022-11-02 08:35:19', '2022-11-02 08:45:49'),
(55, '20.00', '20.00', '20.00', '20.00', 6, 33, '2022-11-02 08:35:19', '2022-11-02 08:45:55'),
(56, '16.00', '15.00', '13.00', '14.67', 6, 34, '2022-11-02 08:35:19', '2022-11-02 08:46:01'),
(57, '15.00', '15.00', '16.00', '15.33', 6, 35, '2022-11-02 08:35:19', '2022-11-02 08:46:10'),
(58, '16.00', '19.00', '16.00', '17.00', 6, 36, '2022-11-02 08:35:19', '2022-11-02 08:46:17'),
(59, '20.00', '2.00', '20.00', '14.00', 6, 37, '2022-11-02 08:35:19', '2022-11-02 08:46:23'),
(60, '2.00', '20.00', '19.00', '13.67', 6, 38, '2022-11-02 08:35:19', '2022-11-02 08:46:30'),
(61, '20.00', '20.00', '20.00', '20.00', 6, 39, '2022-11-02 08:35:19', '2022-11-02 08:46:54'),
(62, '12.00', '13.00', '16.00', '13.67', 7, 19, '2022-11-02 08:35:51', '2022-11-02 08:39:56'),
(63, '20.00', '20.00', '20.00', '20.00', 7, 20, '2022-11-02 08:35:51', '2022-11-02 08:40:01'),
(64, '13.00', '15.00', '9.00', '12.33', 7, 21, '2022-11-02 08:35:51', '2022-11-02 08:37:09'),
(65, '20.00', '20.00', '20.00', '20.00', 7, 22, '2022-11-02 08:35:51', '2022-11-02 08:36:56'),
(66, '20.00', NULL, '20.00', '13.33', 7, 23, '2022-11-02 08:35:51', '2022-11-02 08:36:51'),
(67, '16.00', '19.00', NULL, '11.67', 7, 24, '2022-11-02 08:35:51', '2022-11-02 08:36:45'),
(68, '15.00', '16.00', '18.00', '16.33', 7, 25, '2022-11-02 08:35:51', '2022-11-02 08:36:41'),
(69, '12.00', '13.00', '15.00', '13.33', 7, 26, '2022-11-02 08:35:51', '2022-11-02 08:36:35'),
(70, '20.00', '20.00', '20.00', '20.00', 7, 27, '2022-11-02 08:35:52', '2022-11-02 08:36:31'),
(71, '20.00', '20.00', '20.00', '20.00', 7, 28, '2022-11-02 08:35:52', '2022-11-02 08:36:26'),
(72, '20.00', '20.00', '20.00', '20.00', 8, 29, '2022-11-02 08:40:20', '2022-11-02 08:47:01'),
(73, NULL, NULL, NULL, NULL, 8, 30, '2022-11-02 08:40:20', '2022-11-02 08:40:20'),
(74, '13.00', NULL, NULL, '4.33', 8, 31, '2022-11-02 08:40:21', '2022-11-02 09:05:33'),
(75, NULL, NULL, NULL, NULL, 8, 32, '2022-11-02 08:40:21', '2022-11-02 08:40:21'),
(76, NULL, NULL, NULL, NULL, 8, 33, '2022-11-02 08:40:21', '2022-11-02 08:40:21'),
(77, NULL, NULL, NULL, NULL, 8, 34, '2022-11-02 08:40:21', '2022-11-02 08:40:21'),
(78, NULL, NULL, NULL, NULL, 8, 35, '2022-11-02 08:40:21', '2022-11-02 08:40:21'),
(79, NULL, NULL, NULL, NULL, 8, 36, '2022-11-02 08:40:21', '2022-11-02 08:40:21'),
(80, NULL, NULL, NULL, NULL, 8, 37, '2022-11-02 08:40:21', '2022-11-02 08:40:21'),
(81, NULL, NULL, NULL, NULL, 8, 38, '2022-11-02 08:40:21', '2022-11-02 08:40:21'),
(82, NULL, NULL, NULL, NULL, 8, 39, '2022-11-02 08:40:21', '2022-11-02 08:40:21'),
(83, '20.00', '18.00', '19.00', '19.00', 9, 19, '2022-11-02 08:40:42', '2022-11-02 08:43:13'),
(84, '16.00', '1.00', '15.00', '10.67', 9, 20, '2022-11-02 08:40:42', '2022-11-02 08:43:06'),
(85, '15.00', '1.00', '13.00', '9.67', 9, 21, '2022-11-02 08:40:42', '2022-11-02 08:41:42'),
(86, '20.00', '2.00', '20.00', '14.00', 9, 22, '2022-11-02 08:40:42', '2022-11-02 08:41:35'),
(87, '16.00', '18.00', '14.00', '16.00', 9, 23, '2022-11-02 08:40:42', '2022-11-02 08:41:29'),
(88, '5.00', '20.00', '16.00', '13.67', 9, 24, '2022-11-02 08:40:42', '2022-11-02 08:41:23'),
(89, '16.00', '1.00', '20.00', '12.33', 9, 25, '2022-11-02 08:40:42', '2022-11-02 08:41:12'),
(90, '16.00', '1.00', '20.00', '12.33', 9, 26, '2022-11-02 08:40:42', '2022-11-02 08:41:03'),
(91, '20.00', '2.00', '20.00', '14.00', 9, 27, '2022-11-02 08:40:42', '2022-11-02 08:40:56'),
(92, '20.00', '20.00', '20.00', '20.00', 9, 28, '2022-11-02 08:40:42', '2022-11-02 08:40:51'),
(93, NULL, NULL, NULL, NULL, 10, 29, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(94, NULL, NULL, NULL, NULL, 10, 30, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(95, NULL, NULL, NULL, NULL, 10, 31, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(96, NULL, NULL, NULL, NULL, 10, 32, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(97, NULL, NULL, NULL, NULL, 10, 33, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(98, NULL, NULL, NULL, NULL, 10, 34, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(99, NULL, NULL, NULL, NULL, 10, 35, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(100, '20.00', '20.00', '20.00', '20.00', 10, 36, '2022-11-02 08:43:26', '2022-11-02 08:58:23'),
(101, NULL, NULL, NULL, NULL, 10, 37, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(102, NULL, NULL, NULL, NULL, 10, 38, '2022-11-02 08:43:26', '2022-11-02 08:43:26'),
(103, NULL, NULL, NULL, NULL, 10, 39, '2022-11-02 08:43:27', '2022-11-02 08:43:27'),
(104, '20.00', '20.00', '20.00', '20.00', 11, 40, '2022-11-02 08:58:41', '2022-11-02 08:59:06'),
(105, '20.00', '20.00', '20.00', '20.00', 11, 41, '2022-11-02 08:58:42', '2022-11-02 08:59:11'),
(106, '20.00', '20.00', '20.00', '20.00', 11, 42, '2022-11-02 08:58:42', '2022-11-02 08:59:52'),
(107, '20.00', '20.00', '20.00', '20.00', 11, 43, '2022-11-02 08:58:42', '2022-11-02 08:59:45'),
(108, '20.00', '20.00', '20.00', '20.00', 11, 44, '2022-11-02 08:58:42', '2022-11-02 08:59:15'),
(109, '20.00', '20.00', '20.00', '20.00', 11, 45, '2022-11-02 08:58:42', '2022-11-02 08:59:20'),
(110, '20.00', '20.00', '20.00', '20.00', 11, 46, '2022-11-02 08:58:42', '2022-11-02 08:59:24'),
(111, '20.00', '20.00', '20.00', '20.00', 11, 47, '2022-11-02 08:58:42', '2022-11-02 08:59:38'),
(112, '20.00', '20.00', '20.00', '20.00', 11, 48, '2022-11-02 08:58:42', '2022-11-02 08:59:29'),
(113, '20.00', '20.00', '20.00', '20.00', 11, 49, '2022-11-02 08:58:42', '2022-11-02 08:59:33'),
(114, '20.00', '2.00', '20.00', '14.00', 11, 50, '2022-11-02 08:58:42', '2022-11-02 08:58:59'),
(115, NULL, NULL, NULL, NULL, 12, 29, '2022-11-02 09:06:29', '2022-11-02 09:06:29'),
(116, NULL, NULL, NULL, NULL, 12, 30, '2022-11-02 09:06:29', '2022-11-02 09:06:29'),
(117, NULL, NULL, NULL, NULL, 12, 31, '2022-11-02 09:06:30', '2022-11-02 09:06:30'),
(118, NULL, NULL, NULL, NULL, 12, 32, '2022-11-02 09:06:30', '2022-11-02 09:06:30'),
(119, NULL, NULL, NULL, NULL, 12, 33, '2022-11-02 09:06:30', '2022-11-02 09:06:30'),
(120, '15.00', '17.00', '20.00', '17.33', 12, 34, '2022-11-02 09:06:30', '2022-11-02 09:13:44'),
(121, NULL, NULL, NULL, NULL, 12, 35, '2022-11-02 09:06:30', '2022-11-02 09:06:30'),
(122, NULL, NULL, NULL, NULL, 12, 36, '2022-11-02 09:06:30', '2022-11-02 09:06:30'),
(123, NULL, NULL, NULL, NULL, 12, 37, '2022-11-02 09:06:30', '2022-11-02 09:06:30'),
(124, '20.00', '20.00', '20.00', '20.00', 12, 38, '2022-11-02 09:06:30', '2022-11-02 09:06:46'),
(125, NULL, NULL, NULL, NULL, 12, 39, '2022-11-02 09:06:30', '2022-11-02 09:06:30'),
(126, NULL, NULL, NULL, NULL, 13, 1, '2022-11-02 09:15:04', '2022-11-02 09:15:04'),
(127, NULL, NULL, NULL, NULL, 13, 2, '2022-11-02 09:15:04', '2022-11-02 09:15:04'),
(128, NULL, NULL, NULL, NULL, 13, 3, '2022-11-02 09:15:05', '2022-11-02 09:15:05'),
(129, NULL, NULL, NULL, NULL, 13, 4, '2022-11-02 09:15:05', '2022-11-02 09:15:05'),
(130, NULL, NULL, NULL, NULL, 13, 5, '2022-11-02 09:15:05', '2022-11-02 09:15:05'),
(131, NULL, NULL, NULL, NULL, 13, 6, '2022-11-02 09:15:05', '2022-11-02 09:15:05'),
(132, NULL, NULL, NULL, NULL, 13, 7, '2022-11-02 09:15:05', '2022-11-02 09:15:05'),
(133, NULL, NULL, NULL, NULL, 13, 8, '2022-11-02 09:15:05', '2022-11-02 09:15:05'),
(134, NULL, NULL, NULL, NULL, 13, 9, '2022-11-02 09:15:05', '2022-11-02 09:15:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pendientes`
--

CREATE TABLE `pendientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricula_id` bigint(20) UNSIGNED DEFAULT NULL,
  `materia` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `docente` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nota1` decimal(4,2) DEFAULT NULL,
  `nota2` decimal(4,2) DEFAULT NULL,
  `nota3` decimal(4,2) DEFAULT NULL,
  `nota4` decimal(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pendientes`
--

INSERT INTO `pendientes` (`id`, `matricula_id`, `materia`, `docente`, `nota1`, `nota2`, `nota3`, `nota4`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, NULL, '2.00', '20.00', NULL, NULL, '2022-11-02 08:25:16', '2022-11-02 08:28:30'),
(2, 4, 'Castellano', NULL, NULL, NULL, NULL, NULL, '2022-11-02 08:27:36', '2022-11-02 08:27:36'),
(3, 4, 'Fisica', NULL, NULL, NULL, NULL, NULL, '2022-11-02 08:27:36', '2022-11-02 08:27:36'),
(4, 5, 'Biologia', NULL, '16.00', NULL, NULL, NULL, '2022-11-02 08:28:06', '2022-11-02 08:28:33'),
(5, 7, 'Art y Patr', NULL, '12.00', '12.00', '12.00', NULL, '2022-11-02 08:35:51', '2022-11-02 08:36:08'),
(6, 7, 'Art y Patr', NULL, '2.00', '20.00', NULL, NULL, '2022-11-02 08:35:51', '2022-11-02 08:36:13'),
(7, 12, 'GHC', NULL, NULL, NULL, NULL, NULL, '2022-11-02 09:06:29', '2022-11-02 09:06:29'),
(8, 12, 'Deporte', NULL, NULL, NULL, NULL, NULL, '2022-11-02 09:06:29', '2022-11-02 09:06:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ver-rol', 'web', '2022-11-02 08:08:13', '2022-11-02 08:08:13'),
(2, 'crear-rol', 'web', '2022-11-02 08:08:13', '2022-11-02 08:08:13'),
(3, 'editar-rol', 'web', '2022-11-02 08:08:13', '2022-11-02 08:08:13'),
(4, 'borrar-rol', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(5, 'ver-user', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(6, 'crear-user', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(7, 'editar-user', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(8, 'borrar-user', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(9, 'editar-anio', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(10, 'editar-grado', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(11, 'editar-seccion', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(12, 'editar-corte', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(13, 'ver-alumno', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(14, 'crear-alumno', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(15, 'editar-alumno', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(16, 'ver-docente', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(17, 'crear-docente', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(18, 'editar-docente', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(19, 'ver-asignatura', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(20, 'crear-asignatura', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(21, 'editar-asignatura', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(22, 'ver-matricula', 'web', '2022-11-02 08:08:14', '2022-11-02 08:08:14'),
(23, 'crear-matricula', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(24, 'editar-matricula', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(25, 'ver-nota', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(26, 'crear-nota', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(27, 'editar-nota', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(28, 'ver-grupo', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(29, 'crear-grupo', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(30, 'editar-grupo', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(31, 'ver-periodo_asignatura', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(32, 'crear-periodo_asignatura', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(33, 'editar-periodo_asignatura', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(34, 'ver-pendiente', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(35, 'crear-pendiente', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(36, 'editar-pendiente', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(37, 'ver-retiro', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(38, 'crear-retiro', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15'),
(39, 'editar-retiro', 'web', '2022-11-02 08:08:15', '2022-11-02 08:08:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `abilities` text COLLATE utf8_spanish_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiros`
--

CREATE TABLE `retiros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricula_id` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `motivo` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-11-02 08:11:09', '2022-11-02 08:11:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccions`
--

CREATE TABLE `seccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_seccion` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seccions`
--

INSERT INTO `seccions` (`id`, `nombre_seccion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'A', 1, NULL, NULL),
(2, 'B', 1, NULL, NULL),
(3, 'C', 1, NULL, NULL),
(4, 'D', 0, NULL, NULL),
(5, 'E', 0, NULL, NULL),
(6, 'F', 0, NULL, NULL),
(7, 'G', 0, NULL, NULL),
(8, 'H', 0, NULL, NULL),
(9, 'I', 0, NULL, NULL),
(10, 'J', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asalvarado95', 'asalvarado95@gmail.com', NULL, '$2y$10$12V4sjye4DgSY6Bjk7FIIOhzoVGm9/qzEnG4tfo8Y0AzZcI9hKviO', NULL, '2022-11-02 08:09:48', '2022-11-02 08:11:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnos_cedula_unique` (`cedula`);

--
-- Indices de la tabla `anios`
--
ALTER TABLE `anios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anio_asignaturas`
--
ALTER TABLE `anio_asignaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anio_asignaturas_anio_id_foreign` (`anio_id`),
  ADD KEY `anio_asignaturas_asignatura_id_foreign` (`asignatura_id`),
  ADD KEY `anio_asignaturas_docente_id_foreign` (`docente_id`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignaturas_grado_id_foreign` (`grado_id`);

--
-- Indices de la tabla `corte_notas`
--
ALTER TABLE `corte_notas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `corte_notas_nombre_unique` (`nombre`);

--
-- Indices de la tabla `corte_pendientes`
--
ALTER TABLE `corte_pendientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `corte_pendientes_nombre_unique` (`nombre`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grados_nombre_grado_unique` (`nombre_grado`);

--
-- Indices de la tabla `grupo_estables`
--
ALTER TABLE `grupo_estables`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matriculas_anio_id_foreign` (`anio_id`),
  ADD KEY `matriculas_grado_id_foreign` (`grado_id`),
  ADD KEY `matriculas_seccion_id_foreign` (`seccion_id`),
  ADD KEY `matriculas_alumno_id_foreign` (`alumno_id`),
  ADD KEY `matriculas_grupo_estable_id_foreign` (`grupo_estable_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_matricula_id_foreign` (`matricula_id`),
  ADD KEY `notas_anio_asignatura_id_foreign` (`anio_asignatura_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pendientes`
--
ALTER TABLE `pendientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendientes_matricula_id_foreign` (`matricula_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seccions_nombre_seccion_unique` (`nombre_seccion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1258;

--
-- AUTO_INCREMENT de la tabla `anios`
--
ALTER TABLE `anios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `anio_asignaturas`
--
ALTER TABLE `anio_asignaturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `corte_notas`
--
ALTER TABLE `corte_notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `corte_pendientes`
--
ALTER TABLE `corte_pendientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `grupo_estables`
--
ALTER TABLE `grupo_estables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `pendientes`
--
ALTER TABLE `pendientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `retiros`
--
ALTER TABLE `retiros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anio_asignaturas`
--
ALTER TABLE `anio_asignaturas`
  ADD CONSTRAINT `anio_asignaturas_anio_id_foreign` FOREIGN KEY (`anio_id`) REFERENCES `anios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `anio_asignaturas_asignatura_id_foreign` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `anio_asignaturas_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `asignaturas_grado_id_foreign` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `matriculas_anio_id_foreign` FOREIGN KEY (`anio_id`) REFERENCES `anios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `matriculas_grado_id_foreign` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `matriculas_grupo_estable_id_foreign` FOREIGN KEY (`grupo_estable_id`) REFERENCES `grupo_estables` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `matriculas_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `seccions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_anio_asignatura_id_foreign` FOREIGN KEY (`anio_asignatura_id`) REFERENCES `anio_asignaturas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_matricula_id_foreign` FOREIGN KEY (`matricula_id`) REFERENCES `matriculas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `pendientes`
--
ALTER TABLE `pendientes`
  ADD CONSTRAINT `pendientes_matricula_id_foreign` FOREIGN KEY (`matricula_id`) REFERENCES `matriculas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
