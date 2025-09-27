create database padroni_cani3;
use padroni_cani3;

create table padroni(
id int auto_increment primary key not null,
nome varchar(255),
telefono varchar(255)
);

create table cani(
id int auto_increment primary key not null,
nome varchar(255),
data_nascita date
);

create table padroni_cani(
id int auto_increment primary key,
padrone_id int not null,
cane_id int not null,
foreign key (padrone_id) references padroni(id),
foreign key (cane_id) references cani(id)
);

create table pagine(
id int unique not null,
nome varchar(20),
contenuto json
);

alter table pagine modify column id int not null auto_increment primary key;


insert into pagine (nome, contenuto) values
('lista-padroni', '{"titolo":"lista-padroni","h1":"Lista Padroni", "menu":[]}'),
('lista-cani', '{"titolo":"lista-cani","h1":"Lista Cani","menu":[]}');
insert into pagine (nome, contenuto) values
('homepage', '{"titolo":"Benvenuto al Canile","h1":"Benvenuto al Canile", "menu":[]}');

select * from padroni;