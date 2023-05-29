<?php
require_once "../config.php";
session_start();
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
        $query1 = "SELECT * FROM dom ";
        $result1 = mysqli_query($link, $query1);
        if ($result1) {
            // Pętla po wynikach zapytania
            while ($row = mysqli_fetch_assoc($result1)) {
                // Wyświetlanie danych
                echo 'ID: ' . $row['id'] . '<br>';
                echo 'Nazwa: ' . $row['nazwa_domu'] . '<br>';
                echo 'Opis: ' . $row['opis'] . '<br>';
                echo '<br>';

                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;                            

                header("location: ../index.php");
            }
        } else {
            echo 'Błąd zapytania: ' . mysqli_error($link);
        }
        // Dodaj tutaj kod przekierowujący użytkownika na inną stronę po zalogowaniu
    } else {
        // Dane logowania są niepoprawne
        echo "Błędny login lub hasło.";
    }
}
?>
