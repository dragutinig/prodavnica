-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema kviz
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kviz
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kviz` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci ;
USE `kviz` ;

-- -----------------------------------------------------
-- Table `kviz`.`pitanja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kviz`.`pitanja` (
  `idpitanja` INT NOT NULL AUTO_INCREMENT,
  `pitanje` TEXT(200) NOT NULL,
  PRIMARY KEY (`idpitanja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kviz`.`odgovori`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kviz`.`odgovori` (
  `idodgovori` INT NOT NULL AUTO_INCREMENT,
  `odgovor` VARCHAR(45) NOT NULL,
  `true_false` TINYINT(1) NOT NULL,
  `pitanja_idpitanja` INT NOT NULL,
  PRIMARY KEY (`idodgovori`),
  INDEX `fk_odgovori_pitanja_idx` (`pitanja_idpitanja` ASC) VISIBLE,
  CONSTRAINT `fk_odgovori_pitanja`
    FOREIGN KEY (`pitanja_idpitanja`)
    REFERENCES `kviz`.`pitanja` (`idpitanja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kviz`.`slike`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kviz`.`slike` (
  `idslike` INT NOT NULL AUTO_INCREMENT,
  `slika` VARCHAR(45) NOT NULL,
  `ime` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idslike`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
