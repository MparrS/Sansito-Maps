-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 06:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sansitooo`
--

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_pedido` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `ID_producto` int(11) NOT NULL,
  `ID_vendedor` int(11) NOT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `forma_pago` varchar(20) NOT NULL,
  `estado_pedido` varchar(50) DEFAULT NULL,
  `direccion_entrega` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `ID_producto` int(11) NOT NULL,
  `ID_vendedor` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `imagen_producto` varchar(128) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `stock_disponible` int(11) NOT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp(),
  `descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`ID_producto`, `ID_vendedor`, `nombre_producto`, `imagen_producto`, `descripcion`, `precio`, `categoria`, `stock_disponible`, `fecha_agregado`, `descuento`) VALUES
(1, 1, 'Audifonos Sony', '/SANSITO-MAPS/modules/img/audifonos.jfif', 'Audifonos de gran calidad', 180000.00, 'Tecnología', 5, '2023-08-14 03:46:30', NULL),
(2, 7, 'Jordan', '/SANSITO-MAPS/modules/img/calzado.jfif', 'Calzado original Jordan del año XXXX', 700000.00, 'Ropa y Calzado', 20, '2023-08-14 03:46:30', NULL),
(3, 1, 'Cámara Nikon', '/SANSITO-MAPS/modules/img/camara.jfif', 'Camiseta de gran calidad con un lente de XX', 1200000.00, 'Fotografía', 30, '2023-08-14 03:46:30', NULL),
(4, 7, 'Camisa Adidas', '/SANSITO-MAPS/modules/img/camiseta.jfif', 'Camiseta en su empaque original', 120000.00, 'Ropa y Calzado', 45, '2023-08-14 03:46:30', 10),
(5, 7, 'Zapatos New Balance', '/SANSITO-MAPS/modules/img/deportivos.jfif', 'Calzado 100% original', 500000.00, 'Ropa y Calzado', 53, '2023-08-14 03:46:30', NULL),
(7, 1, 'Asus TUF15', '/SANSITO-MAPS/modules/img/laptop.jfif', 'Laptop apta para todo tipo de trabajo, especializada en gaming', 4000000.00, 'Tecnología', 12, '2023-08-14 03:46:30', NULL),
(15, 1, 'Reloj Inteligente', 'https://www.toptecnouy.com/imgs/productos/productos31_33606.jpg', 'Un reloj inteligente con funciones avanzadas de seguimiento de actividad, notificaciones y monitoreo de la salud.', 300000.00, 'Electrónica', 50, '2023-08-31 16:30:19', 10),
(16, 7, 'Zapatillas Deportivas', 'https://www.calzadosjuscar.com/img/modulos/stock0000624/productos/PhotoRoom___5_2_23_727_121128.jpg', 'Zapatillas cómodas y duraderas, ideales para correr y hacer ejercicio. Disponibles en varios colores y tallas.', 120000.00, 'Ropa y Calzado', 100, '2023-08-31 16:30:19', 5),
(17, 8, 'Laptop Ultrabook', 'https://cdna.pcpartpicker.com/static/forever/images/product/6a840725fabb2edbccf35c919a095212.256p.jpg', 'Una laptop ultrabook ligera y potente, perfecta para trabajar y entretenimiento sobre la marcha.', 2000000.00, 'Tecnología', 30, '2023-08-31 16:30:19', 15),
(19, 1, 'Televisor 4K', 'https://images-cdn.ubuy.co.in/63a0dbff10c9ab048c5a19d4-samsung-q60b-43-034-4k-ultra-hd.jpg', 'Televisor 4K con una calidad de imagen excepcional y acceso a plataformas de streaming.', 1800000.00, 'Electrónica', 25, '2023-08-31 16:30:19', 8),
(20, 7, 'Camiseta de Algodón', 'https://image.made-in-china.com/202f0j00redYApqMnPcQ/Manufacture-Customized-Logo-Deni-Work-Shirts-for-Men.webp', 'Camiseta de algodón suave y cómoda, ideal para uso diario. Disponible en varios colores.', 40000.00, 'Ropa y Calzado', 150, '2023-08-31 16:30:19', 3),
(21, 8, 'Tablet Android', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Nexus_7_%282013%29.png/250px-Nexus_7_%282013%29.png', 'Tablet Android con una pantalla de alta resolución y rendimiento fluido para multitarea.', 800000.00, 'Tecnología', 40, '2023-08-31 16:30:19', 10),
(22, 9, 'Set de Pinceles', 'https://m.media-amazon.com/images/I/B1szuylA11S._UC256,256_CACC,256,256_.jpg', 'Set de pinceles de alta calidad para artistas. Incluye una variedad de tamaños y formas.', 60000.00, 'Arte y Manualidades', 80, '2023-08-31 16:30:19', 5),
(23, 1, 'Auriculares Inalámbricos', 'https://m.media-amazon.com/images/I/61SmiY-KNsL._CR0,204,1224,1224_UX256.jpg', 'Auriculares inalámbricos con cancelación de ruido y sonido envolvente. Perfectos para disfrutar de la música.', 250000.00, 'Electrónica', 60, '2023-08-31 16:30:19', 15),
(24, 7, 'Pantalones Vaqueros', 'https://m.media-amazon.com/images/I/91X5touijNL._UC256,256_CACC,256,256_.jpg', 'Pantalones vaqueros de alta calidad y diseño moderno. Disponibles en diferentes estilos y tallas.', 90000.00, 'Ropa y Calzado', 90, '2023-08-31 16:30:19', 5),
(25, 8, 'Impresora Multifuncional', 'https://www.emmesistemas.com/imgs/productos/productos31_2035.png', 'Impresora multifuncional que imprime, escanea y copia. Ideal para oficinas en casa.', 120000.00, 'Tecnología', 35, '2023-08-31 16:30:19', 10),
(26, 9, 'Kit de Pintura Acrílica', 'https://m.media-amazon.com/images/I/81TiEw0M56L._UC256,256_CACC,256,256_.jpg', 'Kit completo de pintura acrílica con una amplia gama de colores y pinceles. Perfecto para artistas principiantes y experimentados.', 80000.00, 'Arte y Manualidades', 70, '2023-08-31 16:30:19', 8),
(27, 1, 'Altavoz Bluetooth', 'https://www.toptecnouy.com/imgs/productos/productos31_33087.jpg', 'Altavoz Bluetooth portátil con un sonido impresionante. Perfecto para llevar la música a todas partes.', 80000.00, 'Electrónica', 70, '2023-08-31 16:30:19', 10),
(28, 7, 'Vestido de Noche', 'https://m.media-amazon.com/images/I/61pv0vMfn8L._UC256,256_CACC,256,256_.jpg', 'Elegante vestido de noche para ocasiones especiales. Diseño sofisticado y cómodo.', 180000.00, 'Ropa y Calzado', 30, '2023-08-31 16:30:19', 5),
(29, 8, 'Disco Duro Externo', 'https://www.vivasoft.co/wp-content/uploads/2020/07/Disco-Duro-Externo-HD-Toshiba-1TB-Canvio-Advance-V9-5400RPV-Usb-3-300x300.jpg', 'Disco duro externo de alta capacidad para almacenar tus archivos importantes. Conexión rápida USB 3.0.', 160000.00, 'Tecnología', 50, '2023-08-31 16:30:19', 90),
(30, 9, 'Set de Marcadores', 'https://arteacr.com/wp-content/uploads/2020/05/21984-Marcador-Doble-punta-12-unid-3004-TB12-256x256.jpg', 'Set de marcadores de colores vibrantes para ilustraciones y proyectos artísticos.', 45000.00, 'Arte y Manualidades', 100, '2023-08-31 16:30:19', 5),
(31, 1, 'Smartphone Android', 'https://m.media-amazon.com/images/I/713zKTmIeML._UC256,256_CACC,256,256_.jpg', 'Smartphone Android de última generación con cámara de alta resolución y rendimiento rápido.', 1400000.00, 'Electrónica', 40, '2023-08-31 16:30:19', 50),
(32, 7, 'Gafas de Sol', 'https://m.media-amazon.com/images/I/81+t6Xj4D2L._UC256,256_CACC,256,256_.jpg', 'Gafas de sol con estilo y protección UV. Disponibles en diferentes diseños y colores.', 60000.00, 'Ropa y Calzado', 120, '2023-08-31 16:30:19', 3),
(33, 8, 'Teclado Mecánico', 'https://m.media-amazon.com/images/I/81jbHK7fBNL._UC256,256_CACC,256,256_.jpg', 'Teclado mecánico para una experiencia de escritura excepcional. Retroiluminación personalizable.', 120000.00, 'Tecnología', 25, '2023-08-31 16:30:19', 8),
(34, 9, 'Bloc de Dibujo', 'https://m.media-amazon.com/images/I/81pSTgjqydL._UC256,256_CACC,256,256_.jpg', 'Bloc de dibujo con papel de alta calidad para bocetos y dibujos detallados.', 35000.00, 'Arte y Manualidades', 80, '2023-08-31 16:30:19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `contacto` int(20) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `tipo_usuario` int(1) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre`, `apellido`, `contacto`, `correo`, `contrasena`, `tipo_usuario`, `fecha_registro`) VALUES
(1, 'Jose', 'Vargas', 666, 'mail1@mail.com', '123456', 1, '2023-08-14 03:28:27'),
(6, 'JMiguelvm', '', 6666666, 'jose@mail.com', 'contrasena', 2, '2023-08-25 23:06:26'),
(7, 'Juan', 'Perez', 123456789, 'juan@example.com', 'contrasena1', 1, '2023-08-30 22:10:45'),
(8, 'María', 'López', 987654321, 'maria@example.com', 'contrasena2', 1, '2023-08-30 22:10:45'),
(9, 'Luis', 'González', 555555555, 'luis@example.com', 'contrasena3', 1, '2023-08-30 22:10:45'),
(10, 'Ana', 'Martínez', 111222333, 'mail@mail.com', '123456', 0, '2023-08-30 22:10:45'),
(11, 'Carlos', 'Rodríguez', 444444444, 'carlos@example.com', 'contrasena5', 0, '2023-08-30 22:10:45'),
(12, 'Laura', 'Hernández', 777777777, 'laura@example.com', 'contrasena6', 0, '2023-08-30 22:10:45'),
(13, 'Pedro', 'Díaz', 666666666, 'pedro@example.com', 'contrasena7', 0, '2023-08-30 22:10:45'),
(14, 'Carmen', 'Sánchez', 888888888, 'carmen@example.com', 'contrasena8', 0, '2023-08-30 22:10:45'),
(15, 'Jorge', 'Ramírez', 999999999, 'jorge@example.com', 'contrasena9', 0, '2023-08-30 22:10:45'),
(16, 'Sofía', 'Flores', 101010101, 'sofia@example.com', 'contrasena10', 0, '2023-08-30 22:10:45'),
(18, 'Alex', 'Alexander', 6666666, 'alex@mail.com', 'contrasena', 0, '2023-08-31 03:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `valoraciones`
--

CREATE TABLE `valoraciones` (
  `ID_valoracion` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_producto` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL CHECK (`puntuacion` >= 1 and `puntuacion` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `valoraciones`
--

INSERT INTO `valoraciones` (`ID_valoracion`, `ID_usuario`, `ID_producto`, `comentario`, `puntuacion`) VALUES
(3, 1, 4, 'Increible', 5),
(4, 1, 1, 'Buenos.', 4),
(5, 7, 1, 'Reseña positiva', 5),
(6, 8, 2, 'Excelente producto', 5),
(7, 9, 3, 'Muy satisfecho', 4),
(8, 11, 5, 'Muy recomendable', 5),
(9, 12, 7, 'Increíble experiencia', 5),
(10, 13, 1, 'Satisfecho con la compra', 4),
(11, 14, 2, 'Gran calidad', 5),
(12, 15, 3, 'Muy bueno', 4),
(13, 16, 4, 'Producto genial', 5),
(14, 7, 5, 'No quedé satisfecho', 2),
(15, 8, 7, 'No recomendaría', 1),
(16, 9, 1, 'Deficiente', 2),
(17, 10, 2, 'No cumplió mis expectativas', 2),
(18, 13, 5, 'No lo recomiendo', 2),
(19, 14, 7, 'No vale la pena', 1),
(20, 15, 1, 'Me decepcionó', 2),
(21, 16, 2, 'No lo compraría nuevamente', 2),
(22, 6, 3, 'Ingrese su comentario..', 4),
(23, 1, 12, 'Le saque los ojos 10/10', 5),
(67, 14, 30, 'Tuve algunos problemas de configuración al principio, pero funcionó después.', 4),
(71, 9, 32, 'La calidad no es tan buena como la de otras marcas.', 2),
(72, 7, 1, 'Gran producto, superó mis expectativas. Lo recomiendo.', 5),
(73, 8, 1, 'Buen precio por la calidad que ofrece. Satisfecho.', 4),
(74, 9, 1, 'Cumple con lo prometido, lo usaría nuevamente.', 4),
(75, 10, 2, 'Increíble producto, realmente útil en mi día a día.', 5),
(76, 11, 2, 'Me gustaría haberlo tenido antes, muy contento.', 4),
(77, 12, 2, 'Buenas características, lo recomendaría a otros.', 4),
(78, 13, 3, 'Este producto ha mejorado mi vida, excelente compra.', 5),
(79, 14, 3, 'No puedo creer lo bien que funciona. Muy feliz.', 5),
(80, 15, 3, 'No esperaba mucho, pero me sorprendió gratamente.', 4),
(535, 16, 4, 'Me ha facilitado mucho mi trabajo diario. Muy recomendado.', 4),
(536, 11, 4, 'Cumple con lo que necesitaba. No tengo quejas.', 4),
(537, 18, 4, 'Buen producto por el precio. Lo usaré frecuentemente.', 3),
(538, 18, 5, 'Estoy impresionado con la calidad. Funciona perfectamente.', 5),
(539, 11, 5, 'Muy satisfecho con mi compra. Lo compraría de nuevo.', 4),
(540, 16, 5, 'Buen valor por el dinero. Lo recomendaré a otros.', 4),
(541, 15, 7, 'Excelente producto en general. Me ha sorprendido gratamente.', 5),
(542, 11, 7, 'Buenas prestaciones por el precio. Lo recomiendo.', 4),
(543, 16, 7, 'No puedo quejarme, cumple con lo prometido.', 4),
(544, 15, 12, 'Realmente ha mejorado mi experiencia. Muy contento.', 5),
(545, 14, 12, 'Me gusta mucho este producto. Valió la pena la inversión.', 4),
(546, 13, 12, 'Lo uso a diario y no me ha decepcionado hasta ahora.', 4),
(547, 12, 15, 'Funciona muy bien y se ve genial. Lo recomendaré.', 5),
(548, 11, 15, 'Cumple con mis expectativas. Estoy satisfecho.', 4),
(549, 10, 15, 'Buena relación calidad-precio. Lo usaré frecuentemente.', 3),
(550, 13, 16, 'No podría estar más feliz con mi compra. Increíble.', 5),
(551, 11, 16, 'Ha superado mis expectativas. Lo recomendaría a otros.', 4),
(552, 7, 17, 'Excelente producto en general. Me ha sorprendido gratamente.', 5),
(553, 8, 17, 'Buenas prestaciones por el precio. Lo recomiendo.', 4),
(554, 9, 17, 'No puedo quejarme, cumple con lo prometido.', 4),
(555, 10, 18, 'Realmente ha mejorado mi experiencia. Muy contento.', 5),
(556, 11, 18, 'Me gusta mucho este producto. Valió la pena la inversión.', 4),
(557, 12, 18, 'Lo uso a diario y no me ha decepcionado hasta ahora.', 4),
(558, 13, 19, 'Funciona muy bien y se ve genial. Lo recomendaré.', 5),
(559, 14, 19, 'Cumple con mis expectativas. Estoy satisfecho.', 4),
(560, 15, 19, 'Buena relación calidad-precio. Lo usaré frecuentemente.', 3),
(561, 16, 20, 'No podría estar más feliz con mi compra. Increíble.', 5),
(562, 11, 20, 'Ha superado mis expectativas. Lo recomendaría a otros.', 4),
(563, 18, 20, 'Excelente producto en general. Me ha sorprendido gratamente.', 4),
(564, 18, 21, 'Buenas prestaciones por el precio. Lo recomiendo.', 5),
(565, 11, 21, 'Realmente ha mejorado mi experiencia. Muy contento.', 4),
(566, 16, 21, 'Me gusta mucho este producto. Valió la pena la inversión.', 4),
(567, 15, 22, 'Funciona muy bien y se ve genial. Lo recomendaré.', 5),
(568, 11, 22, 'Cumple con mis expectativas. Estoy satisfecho.', 4),
(569, 16, 22, 'Buena relación calidad-precio. Lo usaré frecuentemente.', 3),
(570, 15, 23, 'No podría estar más feliz con mi compra. Increíble.', 5),
(571, 14, 23, 'Ha superado mis expectativas. Lo recomendaría a otros.', 4),
(572, 13, 23, 'Excelente producto en general. Me ha sorprendido gratamente.', 4),
(573, 12, 24, 'Buenas prestaciones por el precio. Lo recomiendo.', 5),
(574, 11, 24, 'Realmente ha mejorado mi experiencia. Muy contento.', 4),
(575, 10, 24, 'Me gusta mucho este producto. Valió la pena la inversión.', 4),
(576, 13, 25, 'Funciona muy bien y se ve genial. Lo recomendaré.', 5),
(577, 11, 25, 'Cumple con mis expectativas. Estoy satisfecho.', 4),
(578, 7, 26, 'Estoy bastante decepcionado con este producto. No cumplió mis expectativas.', 2),
(579, 8, 26, 'No recomendaría este producto. No es lo que esperaba.', 1),
(580, 9, 26, 'No me gustó en absoluto. No volvería a comprarlo.', 1),
(581, 10, 27, 'Hubiera deseado no haber comprado esto. No es útil para mí.', 2),
(582, 11, 27, 'No es lo que esperaba. Me siento insatisfecho.', 2),
(583, 12, 27, 'No lo recomendaría. No vale la pena el dinero.', 1),
(584, 13, 28, 'Definitivamente no vale el precio. No cumplió mis expectativas.', 2),
(585, 14, 28, 'No estoy satisfecho con la calidad del producto. Decepcionante.', 2),
(586, 15, 28, 'No lo compraría de nuevo. Me arrepiento de esta compra.', 1),
(587, 16, 29, 'Tuve problemas desde el primer día. No es confiable en absoluto.', 2),
(588, 11, 29, 'Me decepcionó mucho este producto. No lo recomendaría.', 2),
(589, 18, 29, 'No es lo que esperaba. Me siento estafado.', 1),
(590, 18, 30, 'No es tan bueno como esperaba. Hay problemas de rendimiento.', 3),
(591, 11, 30, 'Me siento neutral sobre este producto. No es excelente, pero tampoco malo.', 3),
(592, 16, 30, 'No me impresionó. Esperaba más por el precio.', 2),
(593, 15, 31, 'No recomendaría este producto. Tiene problemas de calidad.', 2),
(594, 11, 31, 'Me decepcionó el rendimiento. No es lo que prometía.', 2),
(595, 16, 31, 'No estoy contento con mi compra. No cumple con mis necesidades.', 1),
(596, 15, 32, 'Es un producto mediocre en el mejor de los casos. No vale la pena el dinero.', 2),
(597, 14, 32, 'Me siento neutro sobre esto. No es excelente, pero tampoco malo.', 3),
(598, 13, 32, 'No me convence en absoluto. No lo recomendaría.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendedores`
--

CREATE TABLE `vendedores` (
  `ID_vendedor` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `img_empresa` text DEFAULT NULL,
  `descripcion_empresa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendedores`
--

INSERT INTO `vendedores` (`ID_vendedor`, `nombre_empresa`, `img_empresa`, `descripcion_empresa`) VALUES
(1, 'Electronics Store', 'https://siddharthnagardirectory.in/wp-content/uploads/2023/07/electronic-store.png', 'Somos una tienda especializada en electrónica, ofreciendo productos como relojes inteligentes, televisores 4K y auriculares inalámbricos.'),
(7, 'Fashion Haven', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSx9fGu7FFPvBaAX26RVguLQla8nZUxv2o6f8C9Vz5q8uVTmUm-rLYztk5kfqobwlgeokQ&usqp=CAU', 'En Fashion Haven, ofrecemos una amplia gama de productos de moda, desde zapatillas deportivas y camisetas de algodón hasta vestidos de noche y pantalones vaqueros.'),
(8, 'Tech Solutions', 'https://images.crunchbase.com/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco,dpr_1/v1506064440/ms98v6aimzka8yxrt0ke.jpg', 'Tech Solutions es tu destino para tecnología avanzada. Desde laptops ultrabook y tablets Android hasta impresoras multifuncionales y discos duros externos.'),
(9, 'Artistic Supplies', 'https://files.yappe.in/place/small/creative-garments-1715453.webp', 'En Artistic Supplies, nos enorgullece ofrecer productos para artistas creativos, como kits de pintura acrílica, sets de marcadores y bloques de dibujo de alta calidad.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_pedido`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_producto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- Indexes for table `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`ID_valoracion`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_producto` (`ID_producto`);

--
-- Indexes for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD KEY `vendedores` (`ID_vendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `ID_valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=599;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
