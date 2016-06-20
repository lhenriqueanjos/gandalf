-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE categoria_usuario (
id INTEGER PRIMARY KEY,
tipo VARCHAR(20)
)

CREATE TABLE rel_usuario_tag (
id INTEGER PRIMARY KEY,
data_inicio DATE,
hora_inicio TIME,
id_usuario INTEGER,
id_tag INTEGER
)

CREATE TABLE tag (
codigo INTEGER PRIMARY KEY,
categoria INTEGER(4)
)

CREATE TABLE permissoes (
id INTEGER PRIMARY KEY,
id_sala INTEGER,
id_tag INTEGER,
dia_semana VARCHAR(3),
hora_inicio TIME,
hora_fim TIME,
data_inicio_permissao DATE,
data_fim_permissao DATE,
FOREIGN KEY(id_tag) REFERENCES tag (codigo) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE sala (
numero INTEGER PRIMARY KEY,
nome VARCHAR(20),
descricao VARCHAR(100)
)

CREATE TABLE categoria_tag (
id INTEGER(4) PRIMARY KEY,
tipo VARCHAR(20)
)

CREATE TABLE usuario (
matricula INTEGER PRIMARY KEY,
nome VARCHAR(50),
categoria INTEGER,
vinculo_tag INTEGER,
FOREIGN KEY(categoria) REFERENCES categoria_usuario (id) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY(vinculo_tag) REFERENCES rel_usuario_tag (id) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE acesso (
id INTEGER PRIMARY KEY,
id_tag INTEGER,
id_sala INTEGER,
data_hora DATETIME,
FOREIGN KEY(id_tag) REFERENCES tag (codigo),
FOREIGN KEY(id_sala) REFERENCES sala (numero)
)

ALTER TABLE rel_usuario_tag ADD FOREIGN KEY(id_usuario) REFERENCES usuario (matricula) ON UPDATE CASCADE ON DELETE CASCADE
ALTER TABLE rel_usuario_tag ADD FOREIGN KEY(id_tag) REFERENCES tag (codigo) ON UPDATE CASCADE ON DELETE CASCADE
ALTER TABLE tag ADD FOREIGN KEY(categoria) REFERENCES categoria_tag (id) ON UPDATE CASCADE ON DELETE CASCADE
ALTER TABLE permissoes ADD FOREIGN KEY(id_sala) REFERENCES sala (numero) ON UPDATE CASCADE ON DELETE CASCADE
