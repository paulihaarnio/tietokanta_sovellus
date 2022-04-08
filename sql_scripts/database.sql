drop database if EXISTS tietokantasovellus;
CREATE database tietokantasovellus;
use tietokantasovellus;

drop TABLE if EXISTS artisti;
CREATE TABLE artisti(
    artistiID int not null PRIMARY KEY auto_increment,
    artistiNimi varchar(150),
    svuosi int(4),
    maa varchar(150)
);
drop table if EXISTS genre;
create table genre(
    genreID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    genreNimi VARCHAR(150)
);
drop TABLE if EXISTS albumi;
CREATE TABLE albumi(
    albumiID int not null PRIMARY KEY auto_increment,
    albumiNimi varchar(150),
    tekovuosi int(4),
    genreID int(4),
    artistiID int(4),
    tuottaja VARCHAR(150)
);
drop table if EXISTS kappale;
create table kappale(
    kappaleID int not null PRIMARY KEY AUTO_INCREMENT,
    kappaleNimi VARCHAR(150),
    kesto time(6),
    artistiID int(4)
);
drop Table if EXISTS albumirivi;
create Table albumirivi(
    albumiID int not null,
    rivinro int not null,
    kappaleID int(4),
    PRIMARY KEY (albumiID, rivinro)
);


ALTER TABLE albumi
ADD FOREIGN KEY (artistiID) REFERENCES artisti(artistiID);
ALTER TABLE albumi
ADD FOREIGN KEY (genreID) REFERENCES genre(genreID);
ALTER TABLE kappale
ADD FOREIGN KEY (artistiID) REFERENCES artisti(artistiID);
ALTER TABLE albumirivi
ADD FOREIGN KEY (kappaleID) REFERENCES kappale(kappaleID);