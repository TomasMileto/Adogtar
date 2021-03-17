-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 04:10 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adogtar`
--

-- --------------------------------------------------------

--
-- Table structure for table `animales`
--

CREATE TABLE `animales` (
  `id_animal` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `especie` varchar(10) NOT NULL,
  `raza` int(10) UNSIGNED NOT NULL,
  `edad` int(10) UNSIGNED NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `tamanio` varchar(7) NOT NULL,
  `peso` decimal(3,0) UNSIGNED DEFAULT NULL,
  `id_localidad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(30) DEFAULT NULL,
  `tipo_necesidad` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_receptor` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animales`
--

INSERT INTO `animales` (`id_animal`, `nombre`, `especie`, `raza`, `edad`, `sexo`, `tamanio`, `peso`, `id_localidad`, `direccion`, `descripcion`, `imagen`, `tipo_necesidad`, `id_usuario`, `id_receptor`) VALUES
(1, 'Molly', 'perro', 1, 1, 'H', 'grande', '19', 20, 'Sanabria 985', 'Cachorra de 8 meses mezcla de galgo traviesa TRAVIESA', 'animal_1.jpeg', 1, 1, 3),
(2, 'Frodo', 'gato', 20, 1, 'M', 'mediano', '11', 20, 'Sanabria 985', 'Gatito gordito hermoso cuchi cuchi puuuuuuu ayy que gatito hermosoo AAA 😍', 'animal_2.jpg', 3, 1, NULL),
(3, 'Facu', 'perro', 6, 5, 'H', 'chico', '80', 20, 'Bacaccay 500', 'Un boludo barbaro, llevenselo', 'error.png', 1, 2, NULL),
(4, 'Gato Pianista', 'gato', 2, 5, 'M', 'mediano', '12', 20, 'Sanabria 985', 'tuutururuturu TUrururu tu', 'animal_4.jpg', 1, 1, 3),
(5, 'Bart Cuervo', 'perro', 1, 8, 'M', 'chico', '20', 20, 'Sanabria 985', 'Ah es un visitante, tocando a la puerta de mi cuarto. Eso es todo y nada mas.', 'animal_5.jpg', 1, 1, NULL),
(19, 'Pepa', 'perro', 1, 1, 'H', 'mediano', '12', 20, 'Sanabria 985', 'Hermosa hembrita en adopción, hija de una galga rescatada. Dócil y alegre, ideal para familias con niños.', 'animal_20.jpg', 1, 1, NULL),
(20, 'Crying Emoji', 'gato', 2, 3, 'H', 'chico', '3', 20, 'Sanabria 985', 'Pobre carita llorando busca hogar para dejar de sufrir', 'animal_21.jpg', 3, 3, NULL),
(22, 'Inosuke', 'perro', 1, 13, 'M', 'grande', '80', 20, 'Sanabria 985', 'Inosuke en condiciones normales, lleva puesta una máscara hecha con la cabeza de un Jabalí de pelaje gris y ojos azules.', 'animal_23.png', 1, 3, NULL),
(24, 'Alaska', 'gato', 2, 5, 'H', 'mediano', '5', 20, 'Leopardi 152', 'mala pero te calienta las patitas en invierno', 'animal_25.jpg', 1, 4, NULL),
(25, 'Bicho de Discord', 'perro', 5, 6, 'M', 'chico', '20', 1, 'Calle False 123', 'Tutututu tuturu ahre que es skype ese', 'animal_26.png', 2, 3, NULL),
(27, 'Bicho de Prueba', 'gato', 14, 4, 'M', 'mediano', '3', 17, 'Calle False 123', 'dddddddddddddddddddddddddddddddddddddddddddddd dddddddddddddddddddddddddddddddddddddd dddddddddddddddddddddddddddddddddddddddddddddd ddddddddddddddddd', 'animal_28.png', 2, 4, NULL),
(31, 'Sin Imagen', 'perro', 8, 6, 'M', 'grande', '90', 20, 'Sanabria 985', 'A ver como se ve sin imagen', 'error.png', 1, 1, NULL),
(35, 'Tom Muerto', 'gato', 2, 7, 'M', 'grande', '12', 19, 'Calle False 123', 'Alguien que lo salve por favor', 'animal_1.jpg', 2, 1, NULL),
(36, 'Chucky', 'perro', 1, 4, 'M', 'chico', '12', 19, 'Sanabria 985', 'Transito temporal para Chucky mientras nos vamos de vacaciones a Brasil lalalala', 'animal_37.jpg', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `localidades`
--

CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `localidades`
--

INSERT INTO `localidades` (`id_localidad`, `nombre`) VALUES
(1, 'Avellaneda'),
(2, 'Almirante Brown'),
(3, 'Berazategui'),
(4, 'Esteban Echeverria'),
(5, 'Florencio Varela'),
(6, 'General San Martin'),
(7, 'General Sarmiento'),
(8, 'Lanus'),
(9, 'La Matanza'),
(10, 'Lomas de Zamora'),
(11, 'Merlo'),
(12, 'Moreno'),
(13, 'Moron'),
(14, 'Quilmes'),
(15, 'San Fernando'),
(16, 'San Isidro'),
(17, 'Tres de Febrero'),
(18, 'Tigre'),
(19, 'Vicente Lopez'),
(20, 'CABA');

-- --------------------------------------------------------

--
-- Table structure for table `necesidades`
--

CREATE TABLE `necesidades` (
  `id_necesidad` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `necesidades`
--

INSERT INTO `necesidades` (`id_necesidad`, `descripcion`) VALUES
(1, 'adopcion'),
(2, 'transito urgente'),
(3, 'transito vaiven');

-- --------------------------------------------------------

--
-- Table structure for table `razas`
--

CREATE TABLE `razas` (
  `id_raza` int(11) NOT NULL,
  `especie` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `razas`
--

INSERT INTO `razas` (`id_raza`, `especie`, `nombre`) VALUES
(1, 'perro', 'Mestizo'),
(2, 'gato', 'Mestizo'),
(3, 'perro', 'Golden Retriever'),
(4, 'perro', 'Pastor Alemán'),
(5, 'perro', 'Labrador'),
(6, 'perro', 'Caniche'),
(7, 'perro', 'Bulldog francés'),
(8, 'perro', 'Yorkshire'),
(9, 'perro', 'Dachshund (salchicha)'),
(10, 'perro', 'Beagle'),
(11, 'perro', 'Schnauzer'),
(12, 'perro', 'Boxer'),
(13, 'gato', 'Siames'),
(14, 'gato', 'Ragdoll'),
(15, 'gato', 'Scottish Fold'),
(16, 'gato', 'British Shorthair'),
(17, 'gato', 'Maine Coon'),
(18, 'gato', 'American Shorthair'),
(19, 'gato', 'Sphynx'),
(20, 'gato', 'Bengala'),
(21, 'gato', 'Abisinio'),
(22, 'gato', 'Persa');

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes_animales`
--

CREATE TABLE `solicitudes_animales` (
  `id_animal` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solicitudes_animales`
--

INSERT INTO `solicitudes_animales` (`id_animal`, `id_usuario`, `comentario`) VALUES
(1, 1, 'Hola! Estoy interesado en Molly.'),
(1, 3, 'Hola! Estoy interesado en Molly.'),
(2, 1, 'Hola! Estoy interesado en Frodo.'),
(2, 3, 'Hola! Estoy interesado en Frodo.'),
(2, 4, 'Hola! Estoy interesado en Frodo.'),
(4, 3, 'Me gustaria adoptar a gato pianista se lo ve muy habil\r\n'),
(5, 4, 'Hola! Estoy interesado en Bart Cuervo.'),
(22, 1, 'Hola! Estoy interesado en Inosuke.'),
(22, 4, 'Hola! Estoy interesado en Inosuke.'),
(24, 1, 'Hola! Estoy interesado en Alaska.'),
(27, 1, 'Hola! Estoy interesado en Bicho de Prueba.');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_incorporacion` date NOT NULL DEFAULT current_timestamp(),
  `id_localidad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `edad`, `telefono`, `email`, `fecha_incorporacion`, `id_localidad`, `direccion`, `password`) VALUES
(1, 'Tomas Mileto', 21, 1532263033, 'tomasmileto@gmail.com', '2020-01-10', 20, 'Sanabria 985', '4edf00791e3c0a00c74ffa0f64877cc6fe7bc6f6'),
(2, 'Fulano Fullero', 40, 15555555, 'lol@gmail.com', '2020-11-10', 20, 'Calle Falsa 123', 'de09b82971cc49e8c5ccee41fc7f59cc8dcdee27'),
(3, 'Facundo Nicolas Mileto', 23, 151515323, 'facu.mileto@hotmail.com', '2020-11-10', 20, 'Sanabria 980', '4edf00791e3c0a00c74ffa0f64877cc6fe7bc6f6'),
(4, 'Celeste Fernandez', 20, 1137767488, 'celestefernandez00@gmail.com', '2020-11-28', 20, 'Leopardi 152', '5f0458d6137950ac6aaec5f603d24c1a0bc1dc9f'),
(5, 'Tomas Mileto', 90, 1132263033, 'tomasmiletox@gmail.com', '2020-12-02', 1, 'Sanabria 985', '4edf00791e3c0a00c74ffa0f64877cc6fe7bc6f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id_animal`);

--
-- Indexes for table `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indexes for table `necesidades`
--
ALTER TABLE `necesidades`
  ADD PRIMARY KEY (`id_necesidad`);

--
-- Indexes for table `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id_raza`);

--
-- Indexes for table `solicitudes_animales`
--
ALTER TABLE `solicitudes_animales`
  ADD PRIMARY KEY (`id_animal`,`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animales`
--
ALTER TABLE `animales`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `necesidades`
--
ALTER TABLE `necesidades`
  MODIFY `id_necesidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `razas`
--
ALTER TABLE `razas`
  MODIFY `id_raza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
