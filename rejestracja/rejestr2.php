


<?php
/*require_once "../config.php";

// Sprawdzenie czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $typ_konta = "KL";
    
    // Zabezpieczenie przed SQL Injection
    $login = mysqli_real_escape_string($link, $login);
    $haslo = mysqli_real_escape_string($link, $haslo);
    
    // Wstawienie danych do tabeli konto
    $query = "INSERT INTO konto (login, haslo, typ_konta) VALUES ('$login', '$haslo', '$typ_konta')";
    $result = mysqli_query($link, $query);
    
    // Sprawdzenie czy zapytanie zostało wykonane poprawnie
    if ($result) {
        // Rejestracja powiodła się
        header("Refresh: 2; URL=../rejestracja2/rejestracja.php");
        exit;
    } else {
        // Wystąpił błąd przy rejestracji
        echo "Wystąpił błąd podczas rejestracji: " . mysqli_error($link);
    }
}*/
require_once "../config.php";
session_start();

// Sprawdzenie czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $typ_konta = "KL";
    
    // Zabezpieczenie przed SQL Injection
    $login = mysqli_real_escape_string($link, $login);
    $haslo = mysqli_real_escape_string($link, $haslo);

    // Wstawienie danych do tabeli konto
    $query = "INSERT INTO konto (login, haslo, typ_konta) VALUES ('$login', '$haslo', '$typ_konta')";
    $result = mysqli_query($link, $query);

    // Sprawdzenie czy zapytanie zostało wykonane poprawnie
    if ($result) {
        // Pobranie ostatnio wstawionego identyfikatora
        $lastInsertId = mysqli_insert_id($link);

        // Przechowanie identyfikatora w sesji
        $_SESSION['lastInsertId'] = $lastInsertId;

        // Przekierowanie do drugiego formularza z przekazaniem identyfikatora
        header("Location: ../rejestracja2/rejestracja.php");
        exit;
    } else {
        // Wystąpił błąd przy rejestracji
        echo "Wystąpił błąd podczas rejestracji: " . mysqli_error($link);
    }
} else {
    // Użytkownik przerwał rejestrację lub strona została odświeżona
    // Usuń ewentualnie przechowany identyfikator z sesji
    unset($_SESSION['lastInsertId']);
}



?>
