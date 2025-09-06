create database `piatti-ingredienti`;
use `piatti-ingredienti`;

create table piatti (
idp int auto_increment primary key,
nome varchar(20) not null
);

create table ingredienti (
idi int auto_increment primary key,
nome varchar(20) not null
);

create table piatti_ingredienti(
 id_piatto int not null,
 id_ingrediente int not null,
 primary key (id_piatto, id_ingrediente),
 foreign key (id_piatto) references piatti(idp) on delete cascade,
 foreign key (id_ingrediente) references ingredienti(idi) on delete cascade
/*
la tabella piatti_ingredienti fa da ponte ed è la relazione molti a molti
fra le due tabelle: un piatto è fatto da vari ingredienti, un ingrediente compare in più piatti

la chiave composta non ammette associazioni piatti ingredienti duplicate

on delete cascade permette di eliminare automaticamente l'associazione nella tabella ponte
se un piatto o ingrediente vengono eliminati dalle loro corrispettive tabelle

La tabella ponte in MVC non sarà mostrata all'utente ma verrà utilizzata per creare modificare cancellare
associazioni piatti ingredienti
*/
 );