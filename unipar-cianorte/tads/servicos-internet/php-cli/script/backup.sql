CREATE TABLE `cidade` (
  `idcidade` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(45) NOT NULL,
  `populacao` int(11) NOT NULL,
  `iduf` char(2) NOT NULL,
  PRIMARY KEY (`idcidade`),
  KEY `fk_cidade_uf_idx` (`iduf`),
  CONSTRAINT `fk_cidade_uf` FOREIGN KEY (`iduf`) REFERENCES `uf` (`iduf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO cidade VALUES ('1', 'Criciúma', '202395', 'SC');
INSERT INTO cidade VALUES ('2', 'Rio Grande', '206161', 'RS');
INSERT INTO cidade VALUES ('3', 'São José', '224779', 'SC');
INSERT INTO cidade VALUES ('4', 'Cascavel', '305615', 'PR');
INSERT INTO cidade VALUES ('5', 'Blumenal', '329082', 'SC');
INSERT INTO cidade VALUES ('6', 'Ponta Grossa', '331084', 'PR');
INSERT INTO cidade VALUES ('7', 'Canoas', '338531', 'RS');
INSERT INTO cidade VALUES ('8', 'Pelotas', '341180', 'RS');
INSERT INTO cidade VALUES ('9', 'Maringá', '385753', 'PR');
INSERT INTO cidade VALUES ('10', 'Florianópolis', '453285', 'SC');
INSERT INTO cidade VALUES ('11', 'Caxias do Sul', '465304', 'RS');
INSERT INTO cidade VALUES ('12', 'Niterói', '494200', 'RJ');
INSERT INTO cidade VALUES ('13', 'Londrina', '537566', 'PR');
INSERT INTO cidade VALUES ('14', 'Joinville', '546981', 'SC');
INSERT INTO cidade VALUES ('15', 'Santo André', '704942', 'SP');
INSERT INTO cidade VALUES ('16', 'Nova Iguaçu', '804815', 'RJ');
INSERT INTO cidade VALUES ('17', 'São Bernardo do Campo', '805895', 'SP');
INSERT INTO cidade VALUES ('18', 'Duque de Caxias', '873921', 'RJ');
INSERT INTO cidade VALUES ('19', 'São Gonçalo', '1025507', 'RJ');
INSERT INTO cidade VALUES ('20', 'Campinas', '1144862', 'SP');
INSERT INTO cidade VALUES ('21', 'Garulhos', '1299249', 'SP');
INSERT INTO cidade VALUES ('22', 'Porto Alegre', '1467816', 'RS');
INSERT INTO cidade VALUES ('23', 'Curitiba', '1848946', 'PR');
INSERT INTO cidade VALUES ('24', 'Rio de Janeiro', '6429923', 'RJ');
INSERT INTO cidade VALUES ('25', 'São Paulo', '11821873', 'SP');
INSERT INTO cidade VALUES ('26', 'cianorte', '75000', 'PR');
INSERT INTO cidade VALUES ('27', 'maringa', '75000', 'PR');
CREATE TABLE `uf` (
  `iduf` char(2) NOT NULL,
  `uf` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iduf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO uf VALUES ('PR', 'Paraná');
INSERT INTO uf VALUES ('RJ', 'Rio de Janeiro');
INSERT INTO uf VALUES ('RS', 'Rio Grande do Sul');
INSERT INTO uf VALUES ('SC', 'Santa Catarina');
INSERT INTO uf VALUES ('SP', 'São Paulo');
