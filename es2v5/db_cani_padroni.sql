CREATE DATABASE IF NOT EXISTS cani;
USE cani;

CREATE TABLE padroni (
    idp INT UNSIGNED NOT NULL AUTO_INCREMENT,
    cognome VARCHAR(20) NOT NULL,
    telefono VARCHAR(13) NOT NULL,
    PRIMARY KEY (idp)
);

CREATE TABLE cani (
    idc INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    data_nascita DATE NOT NULL,
    data_vaccinazione DATE NOT NULL,
    id_padrone INT UNSIGNED NOT NULL,
    PRIMARY KEY (idc),
    CONSTRAINT fk_padrone FOREIGN KEY (id_padrone) REFERENCES padroni(idp)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);


truncate table cani;

drop table cani;
drop table padroni;

select *
from padroni;

select *
from cani;

show table status from cani;

describe cani;

SELECT 
    CONSTRAINT_NAME, 
    TABLE_NAME, 
    COLUMN_NAME, 
    REFERENCED_TABLE_NAME, 
    REFERENCED_COLUMN_NAME
FROM 
    information_schema.KEY_COLUMN_USAGE
WHERE 
    TABLE_SCHEMA = 'cani' 
    AND TABLE_NAME = 'cani'
    AND REFERENCED_TABLE_NAME IS NOT NULL;