<?php

$insert[] = "INSERT INTO `dom` (`id`, `nazwa_domu`, `opis`, `ID_typ_dom`, `metraz`, `cena`, `ilosc_pokoi`, `ilosc_pietr`, `balkon`, `ogrod`, `garaz`, `piwnica`, `ID_osiedle`) VALUES
(1, 'Rodzinna przestrzeń', 'Przestronny dom z ogrodem', 1, 150.5, 500000, 6, 2, 'y', 'y', 'n', 'y', 1),
(2, 'Luksusowy apartamnet', 'Nowoczesny dom z garażem', 2, 120, 400000, 5, 1, 'n', 'y', 'y', 'n', 2),
(3, 'Piękny szeregowiec', 'Uroczy dom z piwnicą', 3, 90.5, 300000, 4, 1, 'y', 'n', 'n', 'y', 1),
(4, 'Rodzinny domeczek', 'Komfortowy dom z balkonem', 1, 180.2, 550000, 7, 2, 'y', 'y', 'y', 'n', 3),
(19, 'Dom bajka', 'To jest dom o dużej powierzchni i przestronnym ogrodzie.', 1, 150, 300000, 4, 2, 'y', 'y', 'y', 'y', 1),
(20, 'Apartamet Śliwka', 'Nowoczesny dom z pięknym widokiem na okolicę.', 2, 180, 400000, 5, 3, 'y', 'n', 'y', 'n', 3),
(21, 'Szeregowiec sąsiad', 'Przestronny dom z dużym tarasem i garażem.', 3, 200, 450000, 4, 2, 'y', 'y', 'y', 'y', 2),
(22, 'Rezydencja mak', 'Przytulny dom w cichej okolicy.', 4, 160, 350000, 3, 1, 'n', 'n', 'n', 'n', 5),
(23, 'Bliźniak swep', 'Elegancki dom z basenem i ogrodem.', 5, 120, 250000, 4, 2, 'n', 'n', 'n', 'n', 4),
(24, 'Szereg peek', 'Nowoczesny dom z panoramicznymi oknami i tarasem.', 3, 190, 420000, 5, 3, 'n', 'n', 'n', 'y', 1),
(25, 'Apartament New', 'Klasyczny apartament z pięknym widokiem na jezioro.', 2, 170, 380000, 3, 1, 'y', 'n', 'n', 'n', 2),
(26, 'Dom puchatek', 'Przytulny dom z przyjemnym tarasem i dużym podwórkiem.', 1, 140, 280000, 4, 2, 'n', 'y', 'n', 'n', 4),
(27, 'Rezydencja moder', 'Duży, nowoczesny dom z dużym salonem i kuchnią.', 4, 150, 320000, 5, 3, 'n', 'y', 'y', 'y', 3),
(28, 'Bliźniak kawka', 'Elegancki dom z przestronnymi pomieszczeniami i tarasem na dachu.', 5, 200, 500000, 6, 3, 'y', 'y', 'y', 'y', 5),
(29, 'Dom Zielony', 'Przestronny dom z dużym ogrodem, idealny dla rodzin.', 1, 180, 350000, 4, 2, 'y', 'n', 'y', 'y', 1),
(30, 'Apartament Malinowy', 'Nowoczesny apartament z widokiem na pobliskie lasy.', 2, 150, 420000, 3, 1, 'y', 'n', 'n', 'y', 3),
(31, 'Szeregowiec Komfort', 'Przestronny szeregowiec z tarasem i miejscem postojowym.', 3, 190, 450000, 5, 3, 'n', 'y', 'n', 'y', 2),
(32, 'Rezydencja Słoneczna', 'Elegancka rezydencja z dużym basenem i ogrodem.', 4, 220, 550000, 6, 3, 'y', 'n', 'y', 'n', 5),
(33, 'Bliźniak Letni', 'Przytulny bliźniak z tarasem i pięknym widokiem na pola.', 5, 130, 270000, 4, 2, 'y', 'n', 'y', 'n', 4),
(34, 'Dom Morski', 'Nowoczesny dom w stylu nadmorskim z panoramicznymi oknami.', 3, 200, 480000, 5, 3, 'n', 'y', 'n', 'y', 1),
(35, 'Apartament Marina', 'Przestronny apartament z widokiem na marinę i jezioro.', 2, 160, 400000, 4, 2, 'y', 'n', 'n', 'y', 2),
(36, 'Dom Nad Potokiem', 'Uroczy dom z tarasem nad potokiem, otoczony przyrodą.', 1, 150, 320000, 3, 1, 'y', 'n', 'n', 'y', 4),
(37, 'Rezydencja Nowoczesna', 'Nowoczesna rezydencja z przestronnymi wnętrzami i dużym ogrodem.', 4, 180, 420000, 5, 3, 'y', 'n', 'n', 'n', 3),
(38, 'Bliźniak Dolinny', 'Elegancki bliźniak z pięknym ogrodem i tarasem z widokiem na dolinę.', 5, 190, 480000, 5, 3, 'y', 'n', 'y', 'y', 5);";

$insert[] = "INSERT INTO `komentarz` (`id`, `name`, `email`, `tresc`) VALUES
(1, 'sdasd', 'asda', 'asdad'),
(2, 'abc', 'abc@abc.pl', 'abc'),
(3, 'abc', 'abc@abc.pl', 'abc');";

$insert[] = "INSERT INTO `konto` (`id`, `login`, `haslo`, `typ_konta`) VALUES
(1, 'Iza', 'Iza', 'AD'),
(2, 'Olga', 'Olga', 'AD'),
(3, 'Pracownik1', 'Pracownik1', 'PR'),
(4, 'Pracownik2', 'Pracownik2', 'PR'),
(5, 'ostatecznytest', '123', 'KL'),
(7, '123', '123', 'KL'),
(8, '1234', '1234', 'KL'),
(16, 'ostatecznytest1', '123', 'KL'),
(17, 'lastone', 'lastone', 'KL'),
(18, 'Magdalena', 'Magdalena', 'KL'),
(19, 'Bożena', 'Bożena', 'KL'),
(20, 'Katarzyna', 'Katarzyna', 'KL'),
(21, 'Bogdan', 'Bogdan', 'KL'),
(22, 'Stanisław', 'Stanisław', 'KL'),
(23, 'Jerzy', 'Jeż', 'KL');";

$insert[] = "INSERT INTO `osiedle` (`id`, `nazwa_osiedla`, `ulica`, `dzielnica`) VALUES
(1, 'Osiedle Pogodne', 'Ul. Pogodna 1', 'Bałuty'),
(2, 'Osiedle Zielony Jar', 'Ul. Zielona 2', 'Polesie'),
(3, 'Osiedle Nowa Wiosna', 'Ul. Kwiatowa 3', 'Widzew'),
(4, 'Osiedle Radosne Mieszkania', 'Ul. Radosna 4', 'Górna'),
(5, 'Osiedle Podwawelskie', 'Ul. Podwawelska 5', 'Retkinia');";

$insert[] = "INSERT INTO `rezerwacja` (`id`, `ID_dom`, `ID_uzytkownik`, `data_rezerwacji`) VALUES
(9, 11, 2, '2023-06-18 13:52:49'),
(10, 11, 2, '2023-06-18 14:12:40'),
(15, 6, 8, '2023-06-18 18:17:57'),
(18, 9, 2, '2023-06-18 18:27:19'),
(25, 8, 1, '2023-06-18 19:26:33'),
(27, 2, 2, '2023-06-18 19:39:54'),
(28, 26, 21, '2023-06-18 19:39:54'),
(29, 27, 21, '2023-06-18 19:39:54');";

$insert[] = "INSERT INTO `typ_dom` (`id`, `nazwa_typu`) VALUES
(1, 'Dom jednorodziny'),
(2, 'Apartament'),
(3, 'Dom szeregowy'),
(4, 'Rezydencja'),
(5, 'Bliźniak');";

$insert[] = "INSERT INTO `uzytkownik` (`id`, `imie`, `nazwisko`, `numer_telefonu`, `mail`) VALUES
(1, 'Izabela', 'Najder', '123456789', 'izabela.najder@example.com'),
(2, 'Olga', 'Sadokierska', '987654321', 'olga.sadokierska@example.com'),
(3, 'Pracownik', 'Pierwszy', '555123456', 'pracownik.pierwszy@example.com'),
(4, 'Pracownik', 'Drugi', '666987654', 'pracownik.drugi@example.com'),
(5, 'ostatecznytest', 'ostatecznytest', '123456789', 'ostatecznytest@ostatecznytest.pl'),
(8, '1234', '1234', '1234', '1234'),
(16, 'ostatecznytest123', 'ostatecznytest123', '987654321', 'ostatecznytest1@ostatecznytest.pl'),
(17, 'lastone', 'lastone', '111222333', 'lastone@lastone.pl'),
(18, 'Magdalena', 'Nowak', '789456123', 'magdnowak@wp.pl'),
(19, 'Bożena', 'Mak', '456789123', 'makbo@wp.pl'),
(20, 'Katarzyna ', 'Mirosław', '741258963', 'mika@wp.pl'),
(21, 'Bogdan', 'Stanisz', '456321789', 'szta@wp.pl'),
(22, 'Stanisław', 'Nokaw', '456712542', 'kd@wp.pl'),
(23, 'Jerzy', 'Najder', '741369852', 'we@wp.pl');";

$insert[] = "INSERT INTO `zdjecia` (`id`, `sciezka`, `dom_id`) VALUES
(6, '3d-electric-car-building-min.jpg', 11),
(12, '1.jpg', 18),
(13, 'dom_modelowy_15_hdr.jpg', 1),
(14, 'fototapety-do-kuchni-apartament-dom-w-paryzu.jpeg', 2),
(15, '000ADMUMTI3WBVFK-C122-F4.jpg', 3),
(16, 'wady-i-zalety-domow-jednorodzinnych.jpg', 4),
(17, '6ea764f90d22376c0b1a10ed4ea5f25606cbadd7.jpg', 19),
(18, 'aurory_7-1024x525.jpg', 26),
(19, 'OGRÓD okap, kamien na parterze 2.jpg', 29),
(20, 'YONO-ARCHITECTURE-5-architekt-Torun-dom-jednorodzinny-w-Grabowcu-nowoczesna-stodola-cegla-zadaszony-taras.jpg', 36),
(22, '2467249-Wnetrza-luksusowe-nawiazuja-do-historii-miejsca-lub-lokalizacji-konkretnego-stylu-lub-odzwierciedlaja-osobowosc-uzytkownikow.jpg', 20),
(23, '2467239-Zestawienie-roznorodnych-materialow-wysokiej-klasy-swiadczy-o-prestizu-danego-miejsca.jpg', 25),
(24, 'img_2.jpg', 30),
(25, 'apartament-gielda-krzesla-meble-1571460-1024x658-1.jpg', 35),
(26, '029204_r0_940.jpg', 21),
(27, 'unnamed.jpg', 24),
(28, 'shutterstock_397451641_big.jpg', 31),
(29, '10-powodow-dla-ktorych-warto-kupic-dom-szeregowy-234057-900x900.jpg', 34),
(30, 'A457-Dom-na-Bialolece-02-WidokFrontowy-2560x1440.jpg', 22),
(31, 'unnamed (1).jpg', 27),
(32, 'rezydencja.png', 32),
(33, '500x500-index.jpg', 37),
(34, 'dom-blizniak-na-dzialce-500m2-program-mdm-gazowe-domy-borkowo-210091422.jpg', 23),
(35, '91498183_14_Dom-blizniak-pompa-ciepla-z-balkonem_900x700.jpg', 28),
(36, 'a027daa3904d4018a9e11718efc766811fde060a_7559561.jpg', 33),
(37, '18085_f817_xbig.jpg', 38);";


?>