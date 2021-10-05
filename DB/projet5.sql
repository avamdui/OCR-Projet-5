-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Projet5
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Projet5
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Projet5` DEFAULT CHARACTER SET utf8 ;
USE `Projet5` ;

-- -----------------------------------------------------
-- Table `Projet5`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet5`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `admin` TINYINT NULL,
  `token` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projet5`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet5`.`articles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `chapo` VARCHAR(255) NULL,
  `content` LONGTEXT NULL,
  `idUsers` INT NOT NULL,
  `image` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `posted` TINYINT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_posts_Users_idx` (`idUsers` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projet5`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet5`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `author` INT NOT NULL,
  `article_id` INT NOT NULL,
  `content` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `publied` TINYINT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_Users1_idx` (`author` ASC),
  INDEX `fk_comments_posts1_idx` (`article_id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
