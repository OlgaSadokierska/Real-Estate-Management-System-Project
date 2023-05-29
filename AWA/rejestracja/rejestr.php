<?php
require_once "../down/config.php";

// Sprawdzenie czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    
    // Zabezpieczenie przed SQL Injection
    $login = mysqli_real_escape_string($link, $login);
    $haslo = mysqli_real_escape_string($link, $haslo);
    
    // Zapytanie do bazy danych w celu sprawdzenia poprawności danych logowania
    $query = "SELECT * FROM konto WHERE login = '$login' AND haslo = '$haslo'";
    $result = mysqli_query($link, $query);
    
    // Sprawdzenie czy zapytanie zwróciło wyniki
    if (mysqli_num_rows($result) == 1) {
        // Dane logowania są poprawne
        echo "Logowanie udane!";
        // Dodaj tutaj kod przekierowujący użytkownika na inną stronę po zalogowaniu
    } else {
        // Dane logowania są niepoprawne
        echo "Błędny login lub hasło.";
    }
}
?>