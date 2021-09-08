CREATE DATABASE dadosfujamonstro;

DROP TABLE IF EXISTS historicojogo;

CREATE TABLE historicojogo (

data varchar(45) NOT NULL,
inicioDuracao varchar(45) NOT NULL,
finalDuracao varchar(45) NOT NULL,
duracao varchar(45) NOT NULL,
numeroVidas int(2) NOT NULL,
PRIMARY KEY (data)

);


