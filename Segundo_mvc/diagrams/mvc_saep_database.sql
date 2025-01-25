CREATE DATABASE SAEP_DB_johanngr;

USE SAEP_DB_johanngr;
CREATE TABLE usuarios(
id_usuario INT PRIMARY KEY auto_increment NOT NULL,
nome_usuario VARCHAR(90) NOT NULL,
email_usuario VARCHAR(90) NOT NULL
);

CREATE TABLE tarefas(
id_tarefa INT PRIMARY KEY auto_increment NOT NULL,
fk_usuario INT NOT NULL,
FOREIGN KEY (fk_usuario) REFERENCES usuarios(id_usuario),
descricao_tarefa VARCHAR(180) NOT NULL,
setor_tarefa VARCHAR(90),
status_tarefa ENUM ("A fazer", "Fazendo", "Pronto") NOT NULL,
prioridade_tarefa ENUM ("Alta", "Média", "Baixa") NOT NULL,
data_cadastro_tarefa DATE
);


/*Para testes

UMA TAREFA DE CADA
INSERT INTO tarefas(fk_usuario, descricao_tarefa, setor_tarefa, status_tarefa, prioridade_tarefa) VALUES(1, "tarefa numero um", "bananas", "A fazer", "Média");
INSERT INTO tarefas(fk_usuario, descricao_tarefa, setor_tarefa, status_tarefa, prioridade_tarefa) VALUES(1, "tarefa numero um", "bananas", "Fazendo", "Média");
INSERT INTO tarefas(fk_usuario, descricao_tarefa, setor_tarefa, status_tarefa, prioridade_tarefa) VALUES(1, "tarefa numero um", "bananas", "Pronto", "Média");

*/