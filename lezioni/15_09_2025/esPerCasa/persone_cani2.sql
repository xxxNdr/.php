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

insert into pagine (nome, contenuto) values
('lista-padroni', '{"titolo":"lista-padroni","h1":"Lista Padroni","menu":[]}'),
('lista-cani', '{"titolo":"lista-cani","h1":"Lista Cani"}');


update pagine
set contenuto = json_set(contenuto, '$.template', 'cani.twig')
where nome = 'lista-cani' and id > 0;
--  id > 0 permettere di superare il vincolo di safe update perché esso vuole che
-- l'istruzione update abbia una clausola where che usi almeno una colonna indicizzata
-- e chiave primaria. La condizione è sempre vera per tutte le righe con id positivo
-- in mysql gli indici partono da 1 e non da 0 che sarebbe false

alter table pagine
add column template varchar(20);

alter table pagine
change column nome url varchar(20);

update pagine set template = json_unquote(json_extract(contenuto, '$.template')) where id > 0;

update pagine set contenuto = json_remove(contenuto, '$.template') where id > 0;

update pagine set contenuto = json_set(contenuto, '$.titolo', 'lista-padroni') where id = 1;

SELECT contenuto FROM pagine WHERE id = 1;

update pagine set url = 'lista-padroni', contenuto = json_set(contenuto, '$.titolo', 'lista-padroni') where id = 1;
update pagine set contenuto = json_set(contenuto, '$.h1', 'Lista Padroni') where id = 1;
update pagine set contenuto = json_set(contenuto, '$.template', 'padroni.twig') where id = 1;

update pagine set template = 'padroni.twig'
where id = 1;

update pagine set contenuto = json_remove(contenuto, '$.template') where id = 1;

create table padroni_cani(
id int auto_increment primary key,
padrone_id int not null,
cane_id int not null,
foreign key (padrone_id) references persone(id),
foreign key (cane_id) references cani(id)
);
/*
questa tabella memorizza le associazioni tra padrone e cane
*/

set sql_safe_updates = 0;
delete from persone;
delete from cani;
set sql_safe_updates = 1;

select * from cani;
select * from persone;
select * from pagine;
select * from padroni_cani;