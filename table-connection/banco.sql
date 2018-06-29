create database php_06;

use php_06;

create table cargo (
    idcargo int primary key auto_increment,
    nomecargo varchar(50) unique,
    salario double(8,2) /* double (8,2) => 88888888,22 */
);

insert into cargo values (null, 'Programador Jr', 2000.00);
insert into cargo values (null, 'Web Designer Jr', 1800.50);
insert into cargo values (null, 'Suporte', 1600.95);

create table funcionario (
    idfunc int primary key auto_increment,
    nomefunc varchar(50),
    email varchar(50),
    dtnasc date,
    cpf char(14) unique,
    idcargo int,
    foreign key (idcargo) references cargo (idcargo)
);
