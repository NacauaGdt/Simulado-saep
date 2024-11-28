CREATE DATABASE sistema_de_gerenciamento_de_vendas_de_padaria;

USE sistema_de_gerenciamento_de_vendas_de_padaria;

CREATE TABLE `sistema_de_gerenciamento_de_vendas_de_padaria`.`comprador` (`comprador_id` INT NOT NULL AUTO_INCREMENT , `comprador_nome` VARCHAR(100) NOT NULL , `comprador_telefone` VARCHAR(100) NOT NULL , PRIMARY KEY (`comprador_id`)) ENGINE = InnoDB;

CREATE TABLE `sistema_de_gerenciamento_de_vendas_de_padaria`.`venda` (`venda_id` INT NOT NULL AUTO_INCREMENT , `venda_data` TIMESTAMP NOT NULL , `comprador_id` INT NOT NULL , `itens_venda` VARCHAR(100) NOT NULL , PRIMARY KEY (`venda_id`)) ENGINE = InnoDB;

ALTER TABLE `venda` ADD CONSTRAINT `item_idfk_1` FOREIGN KEY (`comprador_id`) REFERENCES `comprador`(`comprador_id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `sistema_de_gerenciamento_de_vendas_de_padaria`.`itemvenda` (`itemVenda_id` INT NOT NULL AUTO_INCREMENT , `venda_id` INT NOT NULL , `produto_id` INT NOT NULL , `quantidade` INT NOT NULL , `subtotal` DOUBLE NOT NULL , PRIMARY KEY (`itemVenda_id`)) ENGINE = InnoDB;

ALTER TABLE `itemvenda` ADD CONSTRAINT `item_idfk_2` FOREIGN KEY (`venda_id`) REFERENCES `venda`(`venda_id`) ON DELETE CASCADE ON UPDATE CASCADE;