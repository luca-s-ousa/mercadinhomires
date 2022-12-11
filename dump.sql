CREATE DATABASE mercadinho_mires;

USE mercadinho_mires;

CREATE TABLE clientes (
    id INT auto_increment PRIMARY KEY,
    nome VARCHAR(50),
    email VARCHAR(100),
    senha VARCHAR(50)
);

CREATE TABLE produtos (
    id INT auto_increment PRIMARY KEY,
    link_imagem TEXT,
    nome_produto VARCHAR(50),
    preco FLOAT
);

CREATE TABLE carrinho (
    id INT auto_increment PRIMARY KEY,
    quantidade INT,
    produto_id INT,
    cliente_id INT
);

CREATE TABLE cliente_produto (
    cliente_id INT,
    produto_id INT
);

ALTER TABLE `carrinho` ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
ALTER TABLE `carrinho` ADD CONSTRAINT `fk_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

ALTER TABLE `cliente_produto` ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
ALTER TABLE `cliente_produto` ADD CONSTRAINT `fk_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);