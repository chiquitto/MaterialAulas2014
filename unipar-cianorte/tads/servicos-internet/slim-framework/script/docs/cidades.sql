-- MySQL Script generated by MySQL Workbench
-- Mon 11 Aug 2014 08:02:15 PM BRT
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema vendas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `uf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uf` (
  `iduf` CHAR(2) NOT NULL,
  `uf` VARCHAR(45) NULL,
  PRIMARY KEY (`iduf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cidade` (
  `idcidade` INT NOT NULL AUTO_INCREMENT,
  `cidade` VARCHAR(45) NOT NULL,
  `populacao` INT NOT NULL,
  `iduf` CHAR(2) NOT NULL,
  PRIMARY KEY (`idcidade`),
  INDEX `fk_cidade_uf_idx` (`iduf` ASC),
  CONSTRAINT `fk_cidade_uf`
    FOREIGN KEY (`iduf`)
    REFERENCES `uf` (`iduf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `uf`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `uf` (`iduf`, `uf`) VALUES ('PR', 'Paraná');
INSERT INTO `uf` (`iduf`, `uf`) VALUES ('SP', 'São Paulo');
INSERT INTO `uf` (`iduf`, `uf`) VALUES ('RJ', 'Rio de Janeiro');
INSERT INTO `uf` (`iduf`, `uf`) VALUES ('SC', 'Santa Catarina');
INSERT INTO `uf` (`iduf`, `uf`) VALUES ('RS', 'Rio Grande do Sul');

COMMIT;


-- -----------------------------------------------------
-- Data for table `cidade`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Criciúma', 202395, 'SC');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Rio Grande', 206161, 'RS');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'São José', 224779, 'SC');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Cascavel', 305615, 'PR');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Blumenal', 329082, 'SC');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Ponta Grossa', 331084, 'PR');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Canoas', 338531, 'RS');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Pelotas', 341180, 'RS');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Maringá', 385753, 'PR');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Florianópolis', 453285, 'SC');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Caxias do Sul', 465304, 'RS');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Niterói', 494200, 'RJ');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Londrina', 537566, 'PR');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Joinville', 546981, 'SC');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Santo André', 704942, 'SP');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Nova Iguaçu', 804815, 'RJ');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'São Bernardo do Campo', 805895, 'SP');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Duque de Caxias', 873921, 'RJ');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'São Gonçalo', 1025507, 'RJ');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Campinas', 1144862, 'SP');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Garulhos', 1299249, 'SP');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Porto Alegre', 1467816, 'RS');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Curitiba', 1848946, 'PR');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'Rio de Janeiro', 6429923, 'RJ');
INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES (NULL, 'São Paulo', 11821873, 'SP');

COMMIT;

