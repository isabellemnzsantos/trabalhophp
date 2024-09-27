CREATE DATABASE Forms;
USE Forms;

CREATE TABLE Formulario (
	id INT auto_increment PRIMARY KEY,
	nome VARCHAR(255) not null,
	email VARCHAR(255) not null,
	data_nascimento DATE not null,
	genero ENUM('Masculino', 'Feminino', 'Outros') not null,
	biografia TEXT not null,
    data_cadastro DATE
);

SELECT * FROM Formulario;


