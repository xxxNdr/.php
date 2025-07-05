CREATE DATABASE IF NOT EXISTS cani;
USE cani;

CREATE TABLE padroni (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    cognome VARCHAR(20) NOT NULL,
    telefono VARCHAR(13) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE cani (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    data_nascita DATE NOT NULL,
    data_vaccinazione DATE NOT NULL,
    id_padrone INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_padrone FOREIGN KEY (id_padrone) REFERENCES padroni(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

select * 
from cani;

select *
from padroni;


SHOW TABLE STATUS FROM cani;
