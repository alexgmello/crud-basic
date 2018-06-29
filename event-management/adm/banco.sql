/*Apagar base de dados*/
drop database php05;

create database db_evento;

use db_evento;

create table tb_evento (
    id int primary key auto_increment,
    titulo varchar(50),
    foto varchar(50),
    data_evento date,
    descricao text,
    site varchar(200)
);

truncate tb_evento; /*Apagar conteúdo da tabela (incluindo os IDs)*/
