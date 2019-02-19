-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema correspondencia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema correspondencia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `correspondencia` DEFAULT CHARACTER SET utf8;
USE `correspondencia` ;

-- -----------------------------------------------------
-- Table `correspondencia`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `correspondencia`.`usuario` (
  `id_usuario` INT NOT NULL,
  `tipo_usuario` INT NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `apellido_p` VARCHAR(30) NOT NULL,
  `apellido_m` VARCHAR(30) NOT NULL,
  `puesto` VARCHAR(30) NOT NULL,
  `direccion` VARCHAR(30) NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `correspondencia`.`mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `correspondencia`.`mensajes` (
  `id_mensaje_send` INT NOT NULL,
  `id_usuario_send` INT NOT NULL,
  `id_usuario_get` INT NOT NULL,
  `titulo_mensaje` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `fecha_enviado` DATE NOT NULL,
  `hora_enviado` VARCHAR(30) NOT NULL,
  `estado_respuesta` BOOLEAN NOT NULL,
  `enlace_enviado` VARCHAR(200) NOT NULL,
  `enlace_respuesta` VARCHAR(200) NULL,
  `mensaje_respuesta` VARCHAR(200) NULL,
  `hora_respuesta` VARCHAR(30) NULL)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
