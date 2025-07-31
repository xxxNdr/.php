create database tragitti;
use tragitti;

create table tappe(
id int auto_increment primary key,
distanza int not null,
data_inserimento timestamp default current_timestamp
);

describe tappe;

