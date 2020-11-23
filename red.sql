
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `ITLA`.`post` (
  `id` INT NOT NULL,
  `titulo` VARCHAR(100) NULL DEFAULT NULL,
  `contenido` VARCHAR(225) NULL DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  `user` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));



CREATE TABLE `ITLA`.`user` (
  `id` INT NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `contrasena` varchar(150) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`));


COMMIT;