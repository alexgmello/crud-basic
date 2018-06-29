/* Criar base de dados */
create database php_02;

/* Conectar a base de dados já criada */
use php_02;

/* Criar tabela */
create table tb_cliente(
    id int primary key auto_increment,
    nome varchar(50),
    email varchar(50),
    cpf char(14),
    sexo char(1)
);

create table tb_usuario(
    id int primary key auto_increment,
    nome varchar(50),
    email varchar(50),
    login varchar(50) unique,
    senha char(32),
    perfil enum('adm', 'user')
);

/*
varchar () -> texto de até 255 caracteres
text -> ~65mil
longtext -> ~4 milhões
*/

/* Inserir registro na tabela */
insert into tb_cliente values(null, 'Tobias', 'tobias@gmail.com', '12345678910', 'M');

insert into tb_usuario values(null, 'Alexandre', 'alexandre@gmail.com', 'agomide', md5('123'), 'adm');
insert into tb_usuario values(null, 'Carla', 'carla@gmail.com', 'carla', md5('abc'), 'user');

/* listar os dados inseridos */
select * from tb_cliente;
