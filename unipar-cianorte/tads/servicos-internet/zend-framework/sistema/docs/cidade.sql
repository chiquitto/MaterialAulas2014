-- Adminer 4.1.0 MySQL dump

DROP TABLE IF EXISTS `uf`;
CREATE TABLE `uf` (
  `iduf` char(2) NOT NULL,
  `uf` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iduf`)
) ENGINE=InnoDB;

INSERT INTO `uf` (`iduf`, `uf`) VALUES
('PR',	'Paraná'),
('RJ',	'Rio de Janeiro'),
('RS',	'Rio Grande do Sul'),
('SC',	'Santa Catarina'),
('SP',	'São Paulo');

DROP TABLE IF EXISTS `cidade`;
CREATE TABLE `cidade` (
  `idcidade` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(45) NOT NULL,
  `populacao` int(11) NOT NULL,
  `iduf` char(2) NOT NULL,
  PRIMARY KEY (`idcidade`),
  KEY `fk_cidade_uf_idx` (`iduf`),
  CONSTRAINT `fk_cidade_uf` FOREIGN KEY (`iduf`) REFERENCES `uf` (`iduf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;

INSERT INTO `cidade` (`idcidade`, `cidade`, `populacao`, `iduf`) VALUES
(1,	'Criciúma',	202395,	'SC'),
(2,	'Rio Grande',	206161,	'RS'),
(3,	'São José',	224779,	'SC'),
(4,	'Cascavel',	305615,	'PR'),
(5,	'Blumenal',	329082,	'SC'),
(6,	'Ponta Grossa',	331084,	'PR'),
(7,	'Canoas',	338531,	'RS'),
(8,	'Pelotas',	341180,	'RS'),
(9,	'Maringá',	385753,	'PR'),
(10,	'Florianópolis',	453285,	'SC'),
(11,	'Caxias do Sul',	465304,	'RS'),
(12,	'Niterói',	494200,	'RJ'),
(13,	'Londrina',	537566,	'PR'),
(14,	'Joinville',	546981,	'SC'),
(15,	'Santo André',	704942,	'SP'),
(16,	'Nova Iguaçu',	804815,	'RJ'),
(17,	'São Bernardo do Campo',	805895,	'SP'),
(18,	'Duque de Caxias',	873921,	'RJ'),
(19,	'São Gonçalo',	1025507,	'RJ'),
(20,	'Campinas',	1144862,	'SP'),
(21,	'Garulhos',	1299249,	'SP'),
(22,	'Porto Alegre',	1467816,	'RS'),
(23,	'Curitiba',	1848946,	'PR'),
(24,	'Rio de Janeiro',	6429923,	'RJ'),
(25,	'São Paulo',	11821873,	'SP'),
(26,	'Cianorte',	75000,	'PR'),
(27,	'Maringa',	75000,	'PR');

-- 2014-09-30 22:48:36