CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO cliente (nome,email)
VALUES
('Jose da Silva', 'jose@gmail.com'),
('Maria Aparecida', 'maria.65@hotmail.com'),
('Geraldo Santos', 'geraldo@yahoo.com'),
('Margarida Rosa', 'margarida@rosa.com');

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;