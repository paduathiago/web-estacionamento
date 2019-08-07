create schema if not exists estacionamento;
use estacionamento;
#drop database estacionamento;

create table if not exists Cliente
(
cpf int NOT NULL,
Nome varchar (60) Not null,
dtNasc date Not null,
primary key (cpf)
);

create table if not exists Modelo 
(
codmod int Not null,
desc_2 varchar(40) not null,
primary key (codmod)
);

create table if not exists veiculo
(
placa varchar(8) not null,
modelo_codmod int not null,
cliente_cpf int not null,
cor varchar(20) not null,
primary key (placa),
foreign key (modelo_codmod) references Modelo(codmod) on delete cascade,
foreign key (cliente_cpf) references Cliente(cpf) on delete cascade
);


create table if not exists patio
(
num int not null,
ender varchar(40) not null,
capacidade int not null,
primary key (num)
);

create table if not exists estaciona

(
cod int not null,
patio_num int not null,
veiculo_placa varchar(8) not null,
dtentrada varchar(10) not null,
dtsaida varchar(10) not null,
hsentrada varchar(10) not null,
hssaida varchar(10) not null,
primary key (cod),
foreign key (patio_num) references patio (num) on delete cascade,
foreign key (veiculo_placa) references Veiculo (placa) on delete cascade

);

insert into Cliente values (111222, 'Ariosvaldo da Costa', '1977/10/25');
insert into Cliente values (333009, 'Dardânia da Silva', '1986/12/05');
insert into Cliente values (228877, 'Sandercley Oriente', '1995/11/30');

insert into Cliente values (202020, 'Jasson Lindo', '2002/03/21');
insert into Cliente values (303030, 'Livia Porto Seguro', '2002/01/30');
insert into Cliente values (404040, 'Nathalia Terere', '2000/07/19');


select * from cliente;

insert into modelo values ( 1, 'Sedan');
insert into modelo values ( 2, 'Van');

insert into veiculo values ('gta 1234', 1, 333009, 'branco');
insert into veiculo values ('isa 4321', 2, 228877, 'rosa');

insert into patio values ( 10, 'Av andradas, 310', 100);
insert into patio values ( 20, 'AV do contorno, 555', 50);

insert into estaciona values (01, 10, 'gta 1234','2019/07/11','2019/07/12', '14:00','17:00');
insert into estaciona values (02, 20, 'isa 4321','2019/07/13', '2019/07/14', '15:00','19:00');

CREATE USER 'estacionamento'@'localhost' IDENTIFIED BY 'joselia';
GRANT ALL PRIVILEGES ON estacionamento.* TO 'estacionamento'@'localhost';
