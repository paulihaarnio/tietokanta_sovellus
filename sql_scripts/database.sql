drop database if EXISTS tietokantasovellus;
CREATE database tietokantasovellus;
use tietokantasovellus;

drop TABLE if EXISTS artisti;
CREATE TABLE artisti(
    id int not null PRIMARY KEY auto_increment,
    nimi varchar(150),
    svuosi int(4),
    genre varchar(150)
);