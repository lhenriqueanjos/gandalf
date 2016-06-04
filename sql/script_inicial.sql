CREATE TABLE rel_usuario_tag ( 
id INTEGER PRIMARY KEY, 
id_usuario INTEGER, 
id_tag INTEGER, 
data_inicio DATE, 
hora_inicio TIME 
);

CREATE TABLE tag ( 
id INTEGER PRIMARY KEY, 
categoria INTEGER(4), 
codigo INTEGER 
) ;

CREATE TABLE sala ( 
id INTEGER PRIMARY KEY, 
numero INTEGER, 
nome VARCHAR(20), 
descricao VARCHAR(100) 
);

CREATE TABLE categoria_tag ( 
id INTEGER(4) PRIMARY KEY, 
tipo VARCHAR(20) 
); 

CREATE TABLE usuario ( 
id INTEGER PRIMARY KEY, 
categoria INTEGER, 
vinculo_tag INTEGER, 
matricula INTEGER, 
nome VARCHAR(50), 
FOREIGN KEY(vinculo_tag) REFERENCES rel_usuario_tag (id) ON UPDATE CASCADE ON DELETE CASCADE 
);

CREATE TABLE categoria_usuario ( 
id INTEGER PRIMARY KEY, 
tipo VARCHAR(20) 
);

CREATE TABLE acesso ( 
id INTEGER PRIMARY KEY, 
id_tag INTEGER, 
id_sala INTEGER, 
data_hora DATETIME, 
FOREIGN KEY(id_tag) REFERENCES tag (id) ON UPDATE CASCADE ON DELETE CASCADE, 
FOREIGN KEY(id_sala) REFERENCES sala (id) ON UPDATE CASCADE ON DELETE CASCADE 
);

CREATE TABLE permissoes ( 
id INTEGER PRIMARY KEY, 
id_sala INTEGER, 
id_tag INTEGER, 
hora_inicio TIME, 
hora_fim TIME, 
data_inicio_permissao DATE, 
data_fim_permissao DATE, 
segunda INT(1), 
terca INT(1), 
quarta INT(1), 
quinta INT(1), 
sexta INT(1), 
sabado INT(1), 
domingo INT(1), 
FOREIGN KEY(id_sala) REFERENCES sala (id) ON UPDATE CASCADE ON DELETE CASCADE, 
FOREIGN KEY(id_tag) REFERENCES tag (id) ON UPDATE CASCADE ON DELETE CASCADE 
);

ALTER TABLE rel_usuario_tag ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE rel_usuario_tag ADD FOREIGN KEY(id_tag) REFERENCES tag (id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE tag ADD FOREIGN KEY(categoria) REFERENCES categoria_tag (id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE usuario ADD FOREIGN KEY(categoria) REFERENCES categoria_usuario (id) ON UPDATE CASCADE ON DELETE CASCADE;
