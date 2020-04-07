CREATE DATABASE buscaphp;
USE buscaphp;

CREATE TABLE itens(
  id int not null auto_increment primary key,
  item varchar(100),
  codigo varchar(100),
  preco varchar(100)
);
