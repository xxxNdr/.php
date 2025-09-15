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

