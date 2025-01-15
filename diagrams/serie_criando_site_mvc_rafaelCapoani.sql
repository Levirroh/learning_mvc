CREATE DATABASE serie_criando_site_mvc;
USE serie_criando_site_mvc;

CREATE TABLE postagem(
	id_postagem INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titulo_postagem VARCHAR(200) NOT NULL,
    conteudo_postagem TEXT NOT NULL
);

CREATE TABLE comentario(
	id_comentario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    autor_comentario VARCHAR (200) NOT NULL,
    mensagem_comentario TEXT NOT NULL,
    fk_postagem INT NOT NULL,
    FOREIGN KEY (fk_postagem) REFERENCES postagem(id_postagem)
); 

INSERT INTO postagem (titulo_postagem, conteudo_postagem) VALUES ('primeira postagem', 'batata é bom');
INSERT INTO postagem (titulo_postagem, conteudo_postagem) VALUES ('segundo postagem', 'batata é ruim');