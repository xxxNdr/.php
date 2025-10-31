create database cani;
use cani;

create table cani(
id int auto_increment primary key,
nome varchar(255),
data_nascita date
);

-- VEDI TABELLA
select * from cani;