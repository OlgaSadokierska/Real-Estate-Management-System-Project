<?php


// Zapytanie SQL do pobrania wszystkich rekordów z tabeli "dom"
$sql = "SELECT * FROM dom";

$result = mysqli_query($link, $sql);

// Sprawdzenie czy zapytanie zostało wykonane poprawnie
if ($result) {
    // Pobranie wszystkich rekordów z tabeli "dom"
    $domy = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Wyświetlenie rekordów
    foreach ($domy as $dom) {
        echo "ID: " . $dom['id'] . "<br>";
        echo "Nazwa domu: " . $dom['nazwa_domu'] . "<br>";
        echo "Cena: " . $dom['cena'] . "<br>";
        echo "Metraż: " . $dom['metraz'] . "<br>";
        echo "Ilość pięter: " . $dom['ilosc_pietr'] . "<br>";
        echo "Ilość pokoi: " . $dom['ilosc_pokoi'] . "<br>";
        echo "Balkon: " . $dom['Kolumnabalkon'] . "<br>";
        echo "Garaż: " . $dom['Kolumnagaraz'] . "<br>";
        echo "Ogród: " . $dom['Kolumnaogrod'] . "<br>";
        echo "Piwnica: " . $dom['Kolumnapiwnica'] . "<br>";
        echo "Opis: " . $dom['opis'] . "<br><br>";
    }
} else {
    // Obsługa błędu zapytania
    echo "Wystąpił błąd przy pobieraniu rekordów z tabeli dom.";
}
?>
