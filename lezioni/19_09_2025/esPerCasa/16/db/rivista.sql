create database rivista;
use rivista;

create table autori(
id int auto_increment primary key,
nome varchar(20) not null);

create table argomenti(
id int auto_increment primary key,
nome varchar(20) not null
);

create table articoli(
id int auto_increment primary key,
titolo varchar(20) not null,
testo text not null,
lunghezza int not null,
id_argomento int,
id_autore int,
foreign key (id_argomento) references argomenti(id),
foreign key (id_autore) references autori(id)
);


insert into autori (nome) values ('AFP');
insert into argomenti(nome) values ('Spagna');
insert into articoli (titolo, testo, lunghezza, id_argomento, id_autore)
values('Spagna, il premier Sánchez chiede di escludere Israele dalle competizioni sportive', load_file('C:/xampp/htdocs/lezioni/19_09_2025/esPerCasa/articoli/1.md'
), 1814, 1, 1);

update articoli set id = 1 where id = 2;

select * from articoli;