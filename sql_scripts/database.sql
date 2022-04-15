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
    kesto time(1),
    artistiID int(4),
    mediaNimi VARCHAR(150)
);
drop Table if EXISTS albumirivi;
create Table albumirivi(
    albumiID int not null,
    rivinro int not null,
    kappaleID int(4),
    PRIMARY KEY (albumiID, rivinro)
);
drop table if EXISTS kayttaja;
create table kayttaja(
    kayttajaID int not null PRIMARY KEY AUTO_INCREMENT,
    ktunnus VARCHAR(150),
    ksalasana VARCHAR(150)
);
drop table if EXISTS soittolista;
create Table soittolista(
    soittolistaID int not null PRIMARY KEY auto_increment,
    soittolistaNimi varchar(150),
    kayttajaID int(4)
);
drop table if EXISTS soittolistarivi;
create Table soittolistarivi(
    soittolistaID int not null,
    rivinro int not null,
    kappaleID int(4),
    PRIMARY KEY (soittolistaID, rivinro)
);


ALTER TABLE albumi
ADD FOREIGN KEY (artistiID) REFERENCES artisti(artistiID);
ALTER TABLE albumi
ADD FOREIGN KEY (genreID) REFERENCES genre(genreID);
ALTER TABLE kappale
ADD FOREIGN KEY (artistiID) REFERENCES artisti(artistiID);
ALTER TABLE albumirivi
ADD FOREIGN KEY (kappaleID) REFERENCES kappale(kappaleID);
ALTER TABLE soittolista
ADD FOREIGN KEY (kayttajaID) REFERENCES kayttaja(kayttajaID);
ALTER TABLE soittolistarivi
ADD FOREIGN KEY (kappaleID) REFERENCES kappale(kappaleID);

INSERT INTO artisti (artistiNimi, svuosi, maa) VALUES ('Jari Sillanpää',1965,'Suomi'),('Katri Helena',1945 ,'Suomi'),('Elvis Presley',1935,'Yhdysvallat');

INSERT INTO kappale (artistiID, kappaleNimi, kesto, mediaNimi) VALUES (1,'Satulinna',3.59, 'satulinna'),(1,'Malagaan',3.35, 'malagaan'),(1,'Valkeaa unelmaa',3.00, 'valkeaaunelmaa'),(2,'Joulumaa',3.26, 'joulumaa'),(2,'Anna mulle tähtitaivas',3.10, 'tahtitaivas'),(2,'Puhelinlangat laulaa',2.24, 'puhelinlangat'),(3,'Hound dog',2.13, 'hounddog'),(3,'Cant Help Falling in Love',3.02, 'chfil'),(3,'Burning Love',2.50, 'burninglove');

INSERT INTO genre (genreNimi) values ('Iskelmä'),('Rock'),('Rap'),('Klassinen');

insert into albumi (albumiNimi,tekovuosi,genreID,artistiID,tuottaja) VALUES ('testi albumi', '1987',4,1,'tuottaja tarja')('hauska levy','2005',3,2,'keijo kallujärvi'),('elviksen parhaat','2000', 2,3,'tauno talttapää');