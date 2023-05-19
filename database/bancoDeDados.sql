CREATE SCHEMA `login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    email VARCHAR(255),
    telefone VARCHAR(20),
    senha VARCHAR(255),
    PRIMARY KEY (id)
);