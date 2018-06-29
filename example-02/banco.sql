create database php_08;

use php_08;

create table tb_cliente(
    idc int primary key auto_increment,
    nome varchar(50),
    email varchar(50)
) engine = innodb;

create table tb_endereco(
    ide int primary key auto_increment,
    logradouro varchar(200),
    numero varchar(10),
    complemento varchar(50),
    cep char(8),
    bairro varchar(50),
    cidade varchar(50),
    estado char(2),
    idc int unique,
    foreign key (idc) references tb_cliente(idc) on delete cascade
) engine = innodb;

/* Para alterar o tipo da tabela depois de criada */
alter table tb_cliente engine = innodb;
alter table tb_endereco engine = innodb;

/* Para situações onde seja necessário usar TRANSITION (commit/rollback), é preciso garantir que a estrutura das tabelas estejam em INNODB */
