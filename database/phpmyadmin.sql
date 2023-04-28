CREATE DATABASE homebase;
 
 CREATE TABLE typ_dom (
		id INT AUTO_INCREMENT PRIMARY KEY,
		nazwa_typu VARCHAR(50) NOT NULL
	);

CREATE TABLE osiedle (
		id INT AUTO_INCREMENT PRIMARY KEY,
		nazwa_osiedla VARCHAR(50) NOT NULL,
		ulica VARCHAR(50),
		dzielnica VARCHAR(50)
	);

CREATE TABLE konto (
		id INT AUTO_INCREMENT PRIMARY KEY,
		login VARCHAR(30) NOT NULL,
		haslo VARCHAR(30) NOT NULL,
		typ_konta CHAR(3) CHECK (typ_konta IN ('AD','PR','KL'))
	);

CREATE TABLE uzytkownik (
		id INT AUTO_INCREMENT PRIMARY KEY,
		imie VARCHAR(50) NOT NULL,
		nazwisko VARCHAR(50) NOT NULL,
		numer_telefonu CHAR(9),
		mail VARCHAR(50),
		ID_konto INT,
		CONSTRAINT FK_konto FOREIGN KEY (ID_konto) REFERENCES konto(id)
	);

CREATE TABLE dom (
		id INT AUTO_INCREMENT PRIMARY KEY,
		nazwa_domu VARCHAR(50) NOT NULL,
		opis VARCHAR(250) NOT NULL,
		ID_typ_dom INT,
		metraz FLOAT NOT NULL,
		cena FLOAT NOT NULL,
		ilosc_pokoi INT NOT NULL,
		ilosc_pietr INT,
		balkon CHAR(1) CHECK (balkon IN ('Y','N')),
		ogrod CHAR(1) CHECK (ogrod IN ('Y','N')),
		garaz CHAR(1) CHECK (garaz IN ('Y','N')),
		piwnica CHAR(1) CHECK (piwnica IN ('Y','N')),
		ID_osiedle INT,
		CONSTRAINT FK_typ_dom FOREIGN KEY (ID_typ_dom) REFERENCES typ_dom(id),
		CONSTRAINT FK_osiedle FOREIGN KEY (ID_osiedle) REFERENCES osiedle(id)
	);

CREATE TABLE rezerwacja (
		id INT AUTO_INCREMENT PRIMARY KEY,
		ID_dom INT,
		ID_uzytkownik INT,
		data_rezerwacji DATETIME NOT NULL,
		CONSTRAINT FK_dom FOREIGN KEY (ID_dom) REFERENCES dom(id),
		CONSTRAINT FK_uzytkownik FOREIGN KEY (ID_uzytkownik) REFERENCES uzytkownik(id)
	);


CREATE TABLE status_dom (
		id INT AUTO_INCREMENT PRIMARY KEY,
		ID_osiedle INT,
		ID_dom INT,
		nazwa_statusu VARCHAR(50) NOT NULL,
		ID_rezerwacja INT,
		CONSTRAINT FK_osiedle_status FOREIGN KEY (ID_osiedle) REFERENCES osiedle(id),
		CONSTRAINT FK_dom_status FOREIGN KEY (ID_dom) REFERENCES dom(id),
		CONSTRAINT FK_rezerwacja FOREIGN KEY (ID_rezerwacja) REFERENCES rezerwacja(id)
	);

INSERT INTO typ_dom(nazwa_typu) VALUES ('Dom jednorodziny');
INSERT INTO typ_dom(nazwa_typu) VALUES ('Apartament');
INSERT INTO typ_dom(nazwa_typu) VALUES ('Dom szeregowy');
INSERT INTO typ_dom(nazwa_typu) VALUES ('Rezydencja');
INSERT INTO typ_dom(nazwa_typu) VALUES ('Bliźniak');

INSERT INTO osiedle(nazwa_osiedla,ulica,dzielnica) VALUES ('Osiedle Pogodne', 'Ul. Pogodna 1', 'Bałuty');
INSERT INTO osiedle(nazwa_osiedla,ulica,dzielnica) VALUES ('Osiedle Zielony Jar', 'Ul. Zielona 2', 'Polesie');
INSERT INTO osiedle(nazwa_osiedla,ulica,dzielnica) VALUES  ('Osiedle Nowa Wiosna', 'Ul. Kwiatowa 3', 'Widzew');
INSERT INTO osiedle(nazwa_osiedla,ulica,dzielnica) VALUES ('Osiedle Radosne Mieszkania', 'Ul. Radosna 4', 'Górna');
INSERT INTO osiedle(nazwa_osiedla,ulica,dzielnica) VALUES ('Osiedle Podwawelskie', 'Ul. Podwawelska 5', 'Retkinia');

INSERT INTO konto(login,haslo,typ_konta) VALUES ('Iza', 'Iza', 'AD');
INSERT INTO konto(login,haslo,typ_konta) VALUES ('Olga', 'Olga', 'AD');
INSERT INTO konto(login,haslo,typ_konta) VALUES ('Pracownik1', 'Pracownik1', 'PR');
INSERT INTO konto(login,haslo,typ_konta) VALUES ('Pracownik2', 'Pracownik2', 'PR');
INSERT INTO konto(login,haslo,typ_konta) VALUES ('Klient1', 'Klient1', 'KL');

INSERT INTO uzytkownik(imie,nazwisko,numer_telefonu,mail,ID_konto) VALUES ('Izabela', 'Najder', '123456789', 'izabela.najder@example.com', 1);
INSERT INTO uzytkownik(imie,nazwisko,numer_telefonu,mail,ID_konto) VALUES ('Olga', 'Sadokierska', '987654321', 'olga.sadokierska@example.com', 2);
INSERT INTO uzytkownik(imie,nazwisko,numer_telefonu,mail,ID_konto) VALUES ('Pracownik', 'Pierwszy', '555123456', 'pracownik.pierwszy@example.com', 3);
INSERT INTO uzytkownik(imie,nazwisko,numer_telefonu,mail,ID_konto) VALUES ('Pracownik', 'Drugi', '666987654', 'pracownik.drugi@example.com', 4);
INSERT INTO uzytkownik(imie,nazwisko,numer_telefonu,mail,ID_konto) VALUES ('Klient', 'Pierwszy', '777555123', 'klient.pierwszy@example.com', 5);

INSERT INTO dom(nazwa_domu,opis,ID_typ_dom,metraz,cena,ilosc_pokoi,ilosc_pietr,balkon,ogrod,garaz,piwnica,ID_osiedle) VALUES ('Rodzinna przestrzeń', 'Przestronny dom z ogrodem', 1, 150.5, 500000, 6, 2, 'Y', 'Y', 'N', 'Y', 1) ;
INSERT INTO dom(nazwa_domu,opis,ID_typ_dom,metraz,cena,ilosc_pokoi,ilosc_pietr,balkon,ogrod,garaz,piwnica,ID_osiedle) VALUES ('Luksusowy apartamnet', 'Nowoczesny dom z garażem', 2, 120.0, 400000, 5, 1, 'N', 'Y', 'Y', 'N', 2);
INSERT INTO dom(nazwa_domu,opis,ID_typ_dom,metraz,cena,ilosc_pokoi,ilosc_pietr,balkon,ogrod,garaz,piwnica,ID_osiedle) VALUES ('Piękny szeregowiec', 'Uroczy dom z piwnicą', 3, 90.5, 300000, 4, 1, 'Y', 'N', 'N', 'Y', 1); 
INSERT INTO dom(nazwa_domu,opis,ID_typ_dom,metraz,cena,ilosc_pokoi,ilosc_pietr,balkon,ogrod,garaz,piwnica,ID_osiedle) VALUES ('Rodzinny domeczek', 'Komfortowy dom z balkonem', 1, 180.2, 550000, 7, 2, 'Y', 'Y', 'Y', 'N', 3);
INSERT INTO dom(nazwa_domu,opis,ID_typ_dom,metraz,cena,ilosc_pokoi,ilosc_pietr,balkon,ogrod,garaz,piwnica,ID_osiedle) VALUES ('Max apartament', 'Przytulny dom na osiedlu zamkniętym', 2, 100.0, 350000, 4, 1, 'N', 'N', 'N', 'N', 4);

INSERT INTO rezerwacja(ID_dom,ID_uzytkownik,data_rezerwacji) VALUES (1, 1, '2023-03-01');
INSERT INTO rezerwacja(ID_dom,ID_uzytkownik,data_rezerwacji) VALUES (2, 3, '2023-02-02');
INSERT INTO rezerwacja(ID_dom,ID_uzytkownik,data_rezerwacji) VALUES (3, 2, '2023-01-03');
INSERT INTO rezerwacja(ID_dom,ID_uzytkownik,data_rezerwacji) VALUES (4, 4, '2023-04-04');
INSERT INTO rezerwacja(ID_dom,ID_uzytkownik,data_rezerwacji) VALUES (5, 5, '2023-04-05');

INSERT INTO status_dom(ID_osiedle,ID_dom,nazwa_statusu,ID_rezerwacja) VALUES (1, 1, 'Zarezerwowany', 1);
INSERT INTO status_dom(ID_osiedle,ID_dom,nazwa_statusu,ID_rezerwacja) VALUES  (2, 2, 'Dostępny', 2);
INSERT INTO status_dom(ID_osiedle,ID_dom,nazwa_statusu,ID_rezerwacja) VALUES (3, 3, 'W budowie', NULL);
