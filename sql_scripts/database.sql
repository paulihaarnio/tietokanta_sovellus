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
    artistiNimi VARCHAR(150),
    tuottaja VARCHAR(150),
    FOREIGN KEY (artistiNimi) REFERENCES artisti(artistiNimi),
    FOREIGN KEY (genreID) REFERENCES genre(genreID)
);
drop table if EXISTS kappale;
create table kappale(
    kappaleID int not null PRIMARY KEY AUTO_INCREMENT,
    kappaleNimi VARCHAR(150),
    kesto time(6),
    artistiNimi VARCHAR(150),
    FOREIGN KEY (artistiNimi) REFERENCES artisti(artistiNimi)
);
drop Table if EXISTS albumirivi;
create Table albumirivi(
    albumiID int not null,
    rivinro int not null,
    kappaleID int(4),
    PRIMARY KEY (albumiID, rivinro),
    FOREIGN KEY (kappaleID) REFERENCES kappale(kappaleID)
);


/*ALTER TABLE albumi
ADD FOREIGN KEY (artisti) REFERENCES artisti(nimi);
*/