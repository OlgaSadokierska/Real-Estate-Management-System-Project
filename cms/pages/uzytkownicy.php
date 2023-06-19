<?php
if (file_exists("./config.php")) {
  require_once("./config.php");
}else{
 echo"Error403. Brak pliku konfiguracyjnego";
}

if (file_exists("../include/cmsheader.php")) {
  include("../include/cmsheader.php");
}else{
 echo"nie ma";
}

/*Usuwanie użytkownika*/
function usunUzytkownika($link, $userId) {
    // Pobierz wszystkie ID rezerwacji użytkownika
    $selectRezerwacjeQuery = "SELECT id FROM rezerwacja WHERE ID_uzytkownik = $userId";
    $resultRezerwacje = mysqli_query($link, $selectRezerwacjeQuery);

    if ($resultRezerwacje) {
        // Iteruj przez wyniki i usuń każdą rezerwację
        while ($row = mysqli_fetch_assoc($resultRezerwacje)) {
            $rezerwacjaId = $row['id'];
            $deleteRezerwacjaQuery = "DELETE FROM rezerwacja WHERE id = $rezerwacjaId";
            mysqli_query($link, $deleteRezerwacjaQuery);
        }

        // Usunięcie rekordu użytkownika
        $deleteUzytkownikQuery = "DELETE FROM uzytkownik WHERE id = $userId";
        $resultUzytkownik = mysqli_query($link, $deleteUzytkownikQuery);

        // Usunięcie rekordu konta użytkownika
        $deleteKontoQuery = "DELETE FROM konto WHERE id = $userId";
        $resultKonto = mysqli_query($link, $deleteKontoQuery);

        // Sprawdź, czy wszystkie operacje zakończyły się sukcesem
        if ($resultUzytkownik && $resultKonto) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Sprawdzenie, czy przekazano parametr ID użytkownika do usunięcia
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Usunięcie użytkownika wraz z rezerwacjami
    $deleteResult = usunUzytkownika($link, $userId);

    if ($deleteResult) {
        echo "Użytkownik został usunięty wraz z powiązanymi rezerwacjami.";
    } else {
        echo "Wystąpił błąd podczas usuwania użytkownika.";
    }
}

/**/ 




$query = "SELECT konto.id, konto.login, konto.haslo, konto.typ_konta, uzytkownik.imie, uzytkownik.mail, uzytkownik.nazwisko, uzytkownik.numer_telefonu 
FROM konto 
INNER JOIN uzytkownik ON konto.id = uzytkownik.id";

$result = mysqli_query($link, $query) or die("Zapytanie zakończone niepowodzeniem");

echo "<table class=\"table table-striped\" style=\
        overflow-x: auto;
        display: flex;
        text-align: center;
        justify-content: space-around;
        flex-direction: row;
        flex-wrap: wrap;
        align-content: center;
        align-items: baseline;\" >\n";
echo "\t<tr>\n";

// Wyświetlanie nagłówków kolumn
echo "\t\t<th>ID</th>\n";
echo "\t\t<th>Login</th>\n";
echo "\t\t<th>Hasło</th>\n";
echo "\t\t<th>Typ konta</th>\n";
echo "\t\t<th>Imię</th>\n";
echo "\t\t<th>Mail</th>\n";
echo "\t\t<th>Nazwisko</th>\n";
echo "\t\t<th>Numer telefonu</th>\n";
echo "\t\t<th>Akcje</th>\n";
echo "\t</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
    echo "\t<tr>\n";

    // Wyświetlanie wartości w poszczególnych komórkach
    echo "\t\t<td>{$row['id']}</td>\n";
    echo "\t\t<td>{$row['login']}</td>\n";
    echo "\t\t<td>{$row['haslo']}</td>\n";
    echo "\t\t<td>{$row['typ_konta']}</td>\n";
    echo "\t\t<td>{$row['imie']}</td>\n";
    echo "\t\t<td>{$row['mail']}</td>\n";
    echo "\t\t<td>{$row['nazwisko']}</td>\n";
    echo "\t\t<td>{$row['numer_telefonu']}</td>\n";

    $userId = $row['id']; // Pobieramy ID użytkownika

    echo "\t\t<td><button style=\"
    background-color: 	#D22B2B; color: white; border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease 0s;\" href=\"?id=$userId\" >Usuń</button></td>\n"; // Dodajemy link usuwania z przekierowaniem do tej samej strony

    echo "\t</tr>\n";
}

echo "</table>\n";

if (file_exists("../include/cmsfooter.php")) {
  include("../include/cmsfooter.php");
}else{
 echo"nie ma";
}

?>
