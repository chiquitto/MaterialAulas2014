
CREATE TABLE IF NOT EXISTS `marca` (
  `idmarca` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmarca`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `veiculo` (
  `idveiculo` INT NOT NULL AUTO_INCREMENT,
  `veiculo` VARCHAR(45) NOT NULL,
  `idmarca` INT NOT NULL,
  PRIMARY KEY (`idveiculo`),
  INDEX `fk_veiculo_marca_idx` (`idmarca` ASC),
  CONSTRAINT `fk_veiculo_marca`
    FOREIGN KEY (`idmarca`)
    REFERENCES `marca` (`idmarca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

