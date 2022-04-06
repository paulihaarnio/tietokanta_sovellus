drop database if EXISTS tietokantasovellus;
CREATE database tietokantasovellus;
use tietokantasovellus;

drop TABLE if EXISTS artisti;
CREATE TABLE artisti(
    id int not null PRIMARY KEY auto_increment,
    nimi varchar(150),
    svuosi int(4),
    maa varchar(150)
);
drop TABLE if EXISTS albumi;
CREATE TABLE albumi(
    id int not null PRIMARY KEY auto_increment,
    nimi varchar(150),
    kappale VARCHAR(150),
    tekovuosi int(4),
    genre varchar(150),
    artisti VARCHAR(150),
    tuottaja VARCHAR(150)
);
drop table if EXISTS kappale;
create table kappale(
    id int not null PRIMARY KEY AUTO_INCREMENT,
    nimi VARCHAR(150),
    kesto time(6),
    artisti VARCHAR(150),
    tuottaja VARCHAR(150)
);


/*ALTER TABLE albumi
ADD FOREIGN KEY (artisti) REFERENCES artisti(nimi);
*/