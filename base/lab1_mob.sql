-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema lab1_mob
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lab1_mob
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `lab1_mob` ;

CREATE SCHEMA IF NOT EXISTS `lab1_mob` ;
USE `lab1_mob` ;

-- -----------------------------------------------------
-- Table `lab1_mob`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `apellidos` VARCHAR(255) NULL,
  `identificacion` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `pais` VARCHAR(255) NULL,
  `fecha_nacimiento` DATE NULL,
  `contraseña` VARCHAR(255) NULL,
  `foto` LONGBLOB NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `identificacion_UNIQUE` (`identificacion` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`Tour`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Tour` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` VARCHAR(255) NULL,
  `duracion` TIME NULL,
  `precio` DECIMAL(10,2) NULL,
  `cupo` INT NULL,
  `Categoria` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Tour_Categoria1_idx` (`Categoria` ASC) ,
  CONSTRAINT `fk_Tour_Categoria1`
    FOREIGN KEY (`Categoria`)
    REFERENCES `lab1_mob`.`Categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`Tour_datetime`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Tour_datetime` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha_hora` DATETIME NULL,
  `Tour_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Tour_id`),
  INDEX `fk_Tuor_datetime_Tour_idx` (`Tour_id` ASC) ,
  CONSTRAINT `fk_Tuor_datetime_Tour`
    FOREIGN KEY (`Tour_id`)
    REFERENCES `lab1_mob`.`Tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`Opcion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Opcion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`Resenia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Resenia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `calificacion` INT(1) NULL,
  `comentario` VARCHAR(255) NULL,
  `Usuario` INT NOT NULL,
  `Tour` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Reseña_Usuario1_idx` (`Usuario` ASC) ,
  INDEX `fk_Reseña_Tour1_idx` (`Tour` ASC) ,
  CONSTRAINT `fk_Reseña_Usuario1`
    FOREIGN KEY (`Usuario`)
    REFERENCES `lab1_mob`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reseña_Tour1`
    FOREIGN KEY (`Tour`)
    REFERENCES `lab1_mob`.`Tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`Galeria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Galeria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `img` LONGBLOB NOT NULL,
  `tipo` INT(1) NULL,
  `Tour` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Galeria_Tour1_idx` (`Tour` ASC) ,
  CONSTRAINT `fk_Galeria_Tour1`
    FOREIGN KEY (`Tour`)
    REFERENCES `lab1_mob`.`Tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`TourFavorito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`TourFavorito` (
  `Usuario_id` INT NOT NULL,
  `Tour_id` INT NOT NULL,
  PRIMARY KEY (`Usuario_id`, `Tour_id`),
  INDEX `fk_Usuario_has_Tour_Tour1_idx` (`Tour_id` ASC) ,
  INDEX `fk_Usuario_has_Tour_Usuario1_idx` (`Usuario_id` ASC) ,
  CONSTRAINT `fk_Usuario_has_Tour_Usuario1`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `lab1_mob`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Tour_Tour1`
    FOREIGN KEY (`Tour_id`)
    REFERENCES `lab1_mob`.`Tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`Reservacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Reservacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Usuario_id` INT NOT NULL,
  `Tour_id` INT NOT NULL,
  `cantidad` INT NULL,
  INDEX `fk_Usuario_has_Tour_Tour2_idx` (`Tour_id` ASC) ,
  INDEX `fk_Usuario_has_Tour_Usuario2_idx` (`Usuario_id` ASC) ,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Usuario_has_Tour_Usuario2`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `lab1_mob`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Tour_Tour2`
    FOREIGN KEY (`Tour_id`)
    REFERENCES `lab1_mob`.`Tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`OpcionCart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`OpcionCart` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Usuario` INT NOT NULL,
  `Tour` INT NOT NULL,
  `cantidad` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_OpcionCart_Usuario1_idx` (`Usuario` ASC) ,
  INDEX `fk_OpcionCart_Tour1_idx` (`Tour` ASC) ,
  CONSTRAINT `fk_OpcionCart_Usuario1`
    FOREIGN KEY (`Usuario`)
    REFERENCES `lab1_mob`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OpcionCart_Tour1`
    FOREIGN KEY (`Tour`)
    REFERENCES `lab1_mob`.`Tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`Incluye`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`Incluye` (
  `Tour_id` INT NOT NULL,
  `Opcion_id` INT NOT NULL,
  PRIMARY KEY (`Tour_id`, `Opcion_id`),
  INDEX `fk_Tour_has_Opcion_Opcion1_idx` (`Opcion_id` ASC) ,
  INDEX `fk_Tour_has_Opcion_Tour1_idx` (`Tour_id` ASC) ,
  CONSTRAINT `fk_Tour_has_Opcion_Tour1`
    FOREIGN KEY (`Tour_id`)
    REFERENCES `lab1_mob`.`Tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tour_has_Opcion_Opcion1`
    FOREIGN KEY (`Opcion_id`)
    REFERENCES `lab1_mob`.`Opcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lab1_mob`.`No_incluye`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lab1_mob`.`No_incluye` (
  `Tour_id` INT NOT NULL,
  `Opcion_id` INT NOT NULL,
  PRIMARY KEY (`Tour_id`, `Opcion_id`),
  INDEX `fk_Tour_has_Opcion_Opcion2_idx` (`Opcion_id` ASC) ,
  INDEX `fk_Tour_has_Opcion_Tour2_idx` (`Tour_id` ASC) ,
  CONSTRAINT `fk_Tour_has_Opcion_Tour2`
    FOREIGN KEY (`Tour_id`)
    REFERENCES `lab1_mob`.`Tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tour_has_Opcion_Opcion2`
    FOREIGN KEY (`Opcion_id`)
    REFERENCES `lab1_mob`.`Opcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
