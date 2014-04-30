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

INSERT INTO usuario
(nome, email, login, senha)
Values
('Usuario I', 'usuarioi@gmail.com', 'usuarioi', 'senhai'),
('Usuario II', 'usuarioii@gmail.com', 'usuarioii', 'senhaii'),
('Usuario III', 'usuarioiii@gmail.com', 'usuarioiii', 'senhaiii'),
('Usuario IV', 'usuarioiv@gmail.com', 'usuarioiv', 'senhaiv'),
('Usuario V', 'usuariov@gmail.com', 'usuariov', 'senhav'),
('Usuario VI', 'usuariovi@gmail.com', 'usuariovi', 'senhavi');