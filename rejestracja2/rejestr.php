<?php
require_once "../config.php";

// Sprawdzenie czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $imie = mysqli_real_escape_string($link, $_POST["imie"]);
    $nazwisko = mysqli_real_escape_string($link, $_POST["nazwisko"]);
    $email = mysqli_real_escape_string($link, $_POST["email"]);
    $telefon = mysqli_real_escape_string($link, $_POST["telefon"]);

    // Wstawienie danych do tabeli użytkownik
    $query1 = "INSERT INTO uzytkownik (imie, nazwisko, numer_telefonu, mail, ID_konto) VALUES ('$imie', '$nazwisko', '$telefon', '$email', (SELECT id FROM konto ORDER BY id DESC LIMIT 1))";
    $result1 = mysqli_query($link, $query1);

    // Sprawdzenie czy zapytanie zostało wykonane poprawnie
    if ($result1) {
        // Rejestracja powiodła się
        echo "Rejestracja zakończona sukcesem.";
       /* header("Refresh: 2; URL=../");*/
        exit;

    } else {
        // Wystąpił błąd przy rejestracji
        echo "Wystąpił błąd podczas rejestracji: " . mysqli_error($link);
    }
}
?>




