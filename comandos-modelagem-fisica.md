# Comandos SQL para Modelagem Física

## Criar banco de dados

CREATE DATABASE microblog_tiago CHARACTER SET utf8mb4;

## Criar tabela de usuários

CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'editor') NOT NULL
);

# Criar tabela de notícias

CREATE TABLE noticias(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    titulo VARCHAR(150) NOT NULL,
    texto TEXT NOT NULL,
    resumo TEXT NOT NULL,
    imagem TEXT NOT NULL,
    usuario_id INT NOT NULL
);


## Criar o relacionamento entre tabelas e a chave estrangeira

ALTER TABLE noticias
    ADD CONSTRAINT fk_noticias_usuarios
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id);