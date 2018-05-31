-- MySQL Script generated by MySQL Workbench
-- Tue May 29 14:49:48 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Multiversum_DB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Multiversum_DB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Multiversum_DB` DEFAULT CHARACTER SET utf8 ;
USE `Multiversum_DB` ;

-- -----------------------------------------------------
-- Table `Multiversum_DB`.`3dbril`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Multiversum_DB`.`3dbril` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(75) NULL,
  `model` VARCHAR(45) NULL,
  `3d/2d` VARCHAR(45) NULL,
  `resolutie` VARCHAR(45) NULL,
  `merk` VARCHAR(45) NULL,
  `afbeelding` VARCHAR(255) NULL,
  `prijs` DECIMAL(8,2) NULL,
  `beschrijving` TEXT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;