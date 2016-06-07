CREATE TABLE `sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categoria_tag` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(4) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tag_categoria_tag` (`id_categoria`),
  CONSTRAINT `fk_tag_categoria_tag` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `acesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tag` int(11) DEFAULT NULL,
  `id_sala` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_acesso_tag` (`id_tag`),
  KEY `fk_acesso_sala` (`id_sala`),
  CONSTRAINT `fk_acesso_sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_acesso_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categoria_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT 2,
  `matricula` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `departamento` varchar(25) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `bairro` varchar(25) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `cidade` varchar(25) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varbinary(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_categoria_usuario` (`id_categoria`),
  CONSTRAINT `fk_usuario_categoria_usuario` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `permissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sala` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `data_inicio_permissao` date DEFAULT NULL,
  `data_fim_permissao` date DEFAULT NULL,
  `segunda` int(1) DEFAULT NULL,
  `terca` int(1) DEFAULT NULL,
  `quarta` int(1) DEFAULT NULL,
  `quinta` int(1) DEFAULT NULL,
  `sexta` int(1) DEFAULT NULL,
  `sabado` int(1) DEFAULT NULL,
  `domingo` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_permissao_tag` (`id_tag`),
  KEY `fk_permissao_sala` (`id_sala`),
  CONSTRAINT `fk_permissao_sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissao_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `rel_usuario_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rel_usuario_tag_tag` (`id_tag`),
  KEY `fk_rel_usuario_tag_usuario` (`id_usuario`),
  CONSTRAINT `fk_rel_usuario_tag_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rel_usuario_tag_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sala`(numero,nome,descricao) VALUES (101,"Laboratório 1","laboratório de informática para pesquisas");
INSERT INTO `categoria_tag` (tipo) VALUES ("Administrador");
INSERT INTO `categoria_tag` (tipo) VALUES ("Cliente");
INSERT INTO `categoria_tag` (tipo) VALUES ("TAG/Cartão");
INSERT INTO `categoria_usuario` (tipo) VALUES ("Administrador");
INSERT INTO `categoria_usuario` (tipo) VALUES ("Usuário");
