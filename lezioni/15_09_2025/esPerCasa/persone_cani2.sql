create database persone_cani2;
use persone_cani2;

create table persone(
id int not null primary key auto_increment,
nome varchar(20),
telefono varchar(10)
);

create table cani(
id int not null primary key auto_increment,
nome varchar(20),
data_nascita date
);

create table pagine(
id int not null primary key auto_increment,
nome varchar(20),
contenuto json
);

create table padroni_cani(
id int auto_increment primary key,
padrone_id int not null,
cane_id int not null,
foreign key (padrone_id) references persone(id),
foreign key (cane_id) references cani(id)
);

insert into pagine (nome, contenuto) values
('lista-padroni', '{"titolo":"lista-padroni","h1":"Lista Padroni","menu":[]}'),
('lista-cani', '{"titolo":"lista-cani","h1":"Lista Cani"}');


delete from cani where id > 0;