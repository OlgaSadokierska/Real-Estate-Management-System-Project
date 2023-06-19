<?php
require_once "../config.php";
session_start();

// Sprawdzenie czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $imie = mysqli_real_escape_string($link, $_POST["imie"]);
    $nazwisko = mysqli_real_escape_string($link, $_POST["nazwisko"]);
    $email = mysqli_real_escape_string($link, $_POST["email"]);
    $telefon = mysqli_real_escape_string($link, $_POST["telefon"]);

    // Sprawdzenie czy identyfikator istnieje w sesji
    if (isset($_SESSION['lastInsertId'])) {
        // Pobranie identyfikatora z sesji
        $id_konto = mysqli_real_escape_string($link, $_SESSION['lastInsertId']);

        // Wstawienie danych do tabeli użytkownik
        $query1 = "INSERT INTO uzytkownik (imie, nazwisko, numer_telefonu, mail, id) VALUES ('$imie', '$nazwisko', '$telefon', '$email', '$id_konto')";
        $result1 = mysqli_query($link, $query1);

        // Sprawdzenie czy zapytanie zostało wykonane poprawnie
        if ($result1) {
            // Rejestracja powiodła się
            header("location: ../logowanie/stronalogowania.php");
            // Usuń przechowany identyfikator z sesji
            unset($_SESSION['lastInsertId']);
            exit;
        } else {
            // Wystąpił błąd przy rejestracji
            echo "Wystąpił błąd podczas rejestracji: " . mysqli_error($link);
        }
    } else {
        // Brak przechowanego identyfikatora w sesji
        echo "Błąd rejestracji. Powróć i wypełnij poprawnie pierwszy formularz.";
    }
}


?>




