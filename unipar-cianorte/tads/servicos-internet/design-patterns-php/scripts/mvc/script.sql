CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `resumo` varchar(255) NULL,
  `texto` TEXT NULL,
  `ativo` CHAR(1) NOT NULL,
  `destaque` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;