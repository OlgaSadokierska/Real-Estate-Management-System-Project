<?php

$create[] = "CREATE TABLE `dom` (
  `id` int(11) NOT NULL,
  `nazwa_domu` varchar(50) NOT NULL,
  `opis` varchar(250) NOT NULL,
  `ID_typ_dom` int(11) DEFAULT NULL,
  `metraz` float NOT NULL,
  `cena` float NOT NULL,
  `ilosc_pokoi` int(11) NOT NULL,
  `ilosc_pietr` int(11) DEFAULT NULL,
  `balkon` enum('y','n') DEFAULT NULL,
  `ogrod` enum('y','n') DEFAULT NULL,
  `garaz` enum('y','n') DEFAULT NULL,
  `piwnica` enum('y','n') DEFAULT NULL,
  `ID_osiedle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";


$create[] .="CREATE TABLE `komentarz` (
  `id` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tresc` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";


$create[] .="CREATE TABLE `konto` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `typ_konta` char(3) DEFAULT NULL CHECK (`typ_konta` in ('AD','PR','KL'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";


$create[] .="CREATE TABLE `osiedle` (
  `id` int(11) NOT NULL,
  `nazwa_osiedla` varchar(50) NOT NULL,
  `ulica` varchar(50) DEFAULT NULL,
  `dzielnica` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";


$create[] .="CREATE TABLE `rezerwacja` (
  `id` int(11) NOT NULL,
  `ID_dom` int(11) DEFAULT NULL,
  `ID_uzytkownik` int(11) DEFAULT NULL,
  `data_rezerwacji` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";


$create[] .="CREATE TABLE `typ_dom` (
  `id` int(11) NOT NULL,
  `nazwa_typu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";


$create[] .="CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `numer_telefonu` char(9) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";

$create[] .="CREATE TABLE `zdjecia` (
  `id` int(11) NOT NULL,
  `sciezka` varchar(10000) DEFAULT '',
  `dom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";

$create[] .="ALTER TABLE `dom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_typ_dom` (`ID_typ_dom`),
  ADD KEY `FK_osiedle` (`ID_osiedle`);";

$create[] .="ALTER TABLE `komentarz`
  ADD PRIMARY KEY (`id`);";

$create[] .="ALTER TABLE `konto`
  ADD PRIMARY KEY (`id`);";

$create[] .="ALTER TABLE `osiedle`
  ADD PRIMARY KEY (`id`);";

$create[] .="ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dom` (`ID_dom`),
  ADD KEY `FK_uzytkownik` (`ID_uzytkownik`);";

$create[] .="ALTER TABLE `typ_dom`
  ADD PRIMARY KEY (`id`);";

$create[] .="ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);";

$create[] .="ALTER TABLE `zdjecia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKO_ZFEF` (`dom_id`);";

$create[] .="ALTER TABLE `dom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;";

$create[] .="ALTER TABLE `komentarz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";

$create[] .="ALTER TABLE `konto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;";

$create[] .="ALTER TABLE `osiedle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;";

$create[] .="ALTER TABLE `rezerwacja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;";

$create[] .="ALTER TABLE `typ_dom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;";

$create[] .="ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;";

$create[] .="ALTER TABLE `zdjecia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;";

$create[] .="ALTER TABLE `dom`
  ADD CONSTRAINT `FK_osiedle` FOREIGN KEY (`ID_osiedle`) REFERENCES `osiedle` (`id`),
  ADD CONSTRAINT `FK_typ_dom` FOREIGN KEY (`ID_typ_dom`) REFERENCES `typ_dom` (`id`);";

$create[] .="ALTER TABLE `rezerwacja`
  ADD CONSTRAINT `FK_dom` FOREIGN KEY (`ID_dom`) REFERENCES `dom` (`id`),
  ADD CONSTRAINT `FK_uzytkownik` FOREIGN KEY (`ID_uzytkownik`) REFERENCES `uzytkownik` (`id`);";

$create[] .="ALTER TABLE `uzytkownik`
  ADD CONSTRAINT `fk_uzytkownik_konto` FOREIGN KEY (`id`) REFERENCES `konto` (`id`);";

$create[] .="ALTER TABLE `zdjecia`
  ADD CONSTRAINT `FKO_ZFEF` FOREIGN KEY (`dom_id`) REFERENCES `dom` (`id`);";
  $create[] .="COMMIT;";

?>