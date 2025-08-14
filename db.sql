
CREATE DATABASE atividades_padaria;

USE atividades_padaria;

CREATE TABLE produto (
    ID_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    quantidade INT,
    preco INT
);

CREATE TABLE usuario(
    ID_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    contato INT(11) NOT NULL UNIQUE
);

CREATE TABLE pedido(
    ID_pedido INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT,
    ID_produto INT,
    FOREIGN KEY (ID_usuario) REFERENCES usuario(ID_usuario),
    FOREIGN KEY (ID_produto) REFERENCES produto(ID_produto)
);