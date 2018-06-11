-- SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
-- SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Multiversum_DB
-- -----------------------------------------------------
-- CREATE SCHEMA IF NOT EXISTS `Multiversum_DB` DEFAULT CHARACTER SET utf8 ;
DROP DATABASE `Multiversum_DB`;
CREATE DATABASE IF NOT EXISTS `Multiversum_DB` DEFAULT CHARACTER SET utf8;
USE `Multiversum_DB`;

-- -----------------------------------------------------
-- Table `Multiversum_DB`.`VR_bril`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Multiversum_DB`.`VR_bril` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(75) NULL,
  `model` VARCHAR(45) NULL,
  `drieDTweeD` VARCHAR(45) NULL,
  `resolutie` VARCHAR(45) NULL,
  `platform` VARCHAR(45) NULL,
  `merk` VARCHAR(45) NULL,
  `afbeelding` VARCHAR(255) NULL,
  `prijs` DECIMAL(8,2) NULL,
  `beschrijving` TEXT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID`),
  UNIQUE INDEX `naam_UNIQUE` (`naam`),
  UNIQUE INDEX `afbeelding_UNIQUE` (`afbeelding`)
);
-- ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table inserts `Multiversum_DB`.`VR_bril`
-- -----------------------------------------------------
INSERT INTO `Multiversum_DB`.`VR_bril` (`naam`, `model`, `drieDTweeD`, `resolutie`, `platform`, `merk`, `afbeelding`, `prijs`, `beschrijving`)

VALUES
    ('Oculus Rift Bundle (Rift + Touch)', 'Oculus Rift', 'vr', '2160x1200', 'Pc', 'Oculus', 'view/asset/images/products/1.jpeg', 499.00, NULL),
    ('HP Windows Mixed Reality headset', 'HP Windows Mixed Reality headset', 'vr', '2880x1440', 'Pc', 'HP', 'view/asset/images/products/2.jpeg', 399.00, NULL),
    ('Dell Visor + Dell Visor Controllers', 'Dell visor', 'vr', '2880x1440', 'Pc', 'Dell', 'view/asset/images/products/3.jpeg', 435.46, NULL),
    ('HTC Vive Business Edition', 'HTC Vive', 'vr', '2160x1200', 'Pc', 'HTC', 'view/asset/images/products/4.jpeg', 1390.00, NULL),
    ('HTC Vive', 'HTC Vive', 'vr', '2160x1200', 'Pc', 'HTC', 'view/asset/images/products/5.jpeg', 599.00, NULL),

    ('Samsung New Gear VR + Gear VR Controller', 'Samsung New Gear VR + Gear VR Controller', 'vr', 'Geen eigen display', 'Smartphone', 'Samsung', 'view/asset/images/products/6.png', 121.59, NULL),
    ('Medion Erazer X1000 Mixed Reality Headset', 'Medion Erazer X1000 Mixed Reality Headset', 'vr', '2880x1440', 'Pc', 'Medion', 'view/asset/images/products/7.jpeg', 449, NULL),
    ('Samsung Gear VR 4 + Gear VR Controller', 'Samsung Gear VR 4 + Gear VR Controller', 'vr', 'Geen eigen display', 'Smartphone', 'Samsung', 'view/asset/images/products/8.jpeg', 114.95, NULL),
    ('Samsung Gear VR 2', 'Samsung Gear VR 2', 'vr', 'Geen eigen display', 'Smartphone', 'Samsung', 'view/asset/images/products/9.jpeg', 79.90, NULL),
    ('OSVR Hacker Development Kit 2', 'OSVR Hacker Development Kit 2', 'vr', '2160x1200', 'Pc', 'OSVR', 'view/asset/images/products/10.png', 436.68, NULL),

    ('Lenovo Explorer Headset', 'Lenovo Explorer Headset', 'vr', '2880x1440', 'Pc', 'Lenovo', 'view/asset/images/products/11.jpeg', 456.55, NULL),
    ('Oculus Rift', 'Oculus Rift', 'vr', '2160x1200', 'Pc', 'Oculus', 'view/asset/images/products/12.png', 549, NULL),
    ('Samsung Galaxy Gear VR (v2)', 'Samsung Galaxy Gear VR (v2)', 'vr', 'Geen eigen display', 'Smartphone', 'Samsung', 'view/asset/images/products/13.jpeg', 59.90, NULL),
    ('Sony PlayStation VR + VR Worlds + PS Camera', 'Sony PlayStation VR', 'vr', '1920x1080', 'PlayStation4', 'Sony', 'view/asset/images/products/14.png', 249, NULL),
    ('Sony PlayStation VR', 'Sony PlayStation VR', 'vr', '1920x1080', 'PlayStation4', 'Sony', 'view/asset/images/products/15.png', 229, NULL),

    ('VR Shinecon VR Bril Zwart + Bluetooth Remote Control Wit', 'VR Shinecon VR Bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/asset/images/products/16.jpeg', 29.95, NULL),
    ('VR Shinecon VR Bril Zwart + Bluetooth Gamepad en Remote Control Wit', 'VR Shinecon VR Bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/asset/images/products/17.jpeg', 29.95, NULL),
    ('VR Shinecon VR Bril Zwart + Bluetooth Gamepad en Remote Control Zwart', 'VR Shinecon VR Bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/asset/images/products/18.jpeg', 28.05, NULL),
    ('VR Shinecon VR Bril Zwart + Bluetooth Remote Control Zwart', 'VR Shinecon VR Bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/asset/images/products/19.jpeg', 23.60, NULL),
    ('VR Shinecon VR Bril Zwart + Bluetooth Gamepad Zwart', 'VR Shinecon VR Bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/asset/images/products/20.jpeg', 34.95, NULL),

    ('VR Shinecon VR Bril Zwart', 'VR Shinecon VR Bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/asset/images/products/21.jpeg', 24.95, NULL),
    ('VR BOX VR-bril + Bluetooth Remote Control (Zwart)', 'VR BOX VR-bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Box', 'view/asset/images/products/22.jpeg', 19.95, NULL),
    ('VR BOX VR-bril + Bluetooth Remote Control (Wit)', 'VR BOX VR-bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Box', 'view/asset/images/products/23.jpeg', 16.80, NULL),
    ('VR BOX VR-bril', 'VR BOX VR-bril', 'vr', 'Geen eigen display', 'Smartphone', 'VR Box', 'view/asset/images/products/24.jpeg', 20, NULL),
    ('Homido Smartphone Virtual Reality Headset', 'Homido Smartphone Virtual Reality Headset', 'vr', 'Geen eigen display', 'Smartphone', 'Homido', 'view/asset/images/products/25.png', 35, NULL),




-- SET SQL_MODE=@OLD_SQL_MODE;
-- SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
-- SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
