create database TrabalhoBimestral4bm;
use TrabalhoBimestral4bm;

create table usuario(
    cpf varchar(11),
    email varchar(100),
    nome varchar(100),
    senha varchar(32),
    data_assinatura date,
    primary key (cpf, email)
);

create table administrador(
    id_administrador int auto_increment,
    nome varchar(100),
    email varchar(100),
    senha varchar(32),
    permissao varchar(10),
    primary key(id_administrador)
);

insert into administrador (nome, email, senha, permissao) values
    ('Administrador 1', 'PrimeiroAdmnistrador@email.com', '202cb962ac59075b964b07152d234b70', 'baixa'),
    ('Administrador 2', 'SegundoAdmnistrador@email.com', 'caf1a3dfb505ffed0d024130f58c5cf', 'alta');
