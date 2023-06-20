<?php
require_once "../config.php";
// Sprawdzenie czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    
    // Zabezpieczenie przed SQL Injection
    $login = mysqli_real_escape_string($link, $login);
    $haslo = mysqli_real_escape_string($link, $haslo);
    
    // Zapytanie do bazy danych w celu sprawdzenia poprawności danych logowania
    $query_konto = "SELECT * FROM konto WHERE login = '$login' AND haslo = '$haslo'";
    $result_logowanie = mysqli_query($link, $query_konto);
    
    // Sprawdzenie czy zapytanie zwróciło wyniki
    if (mysqli_num_rows($result_logowanie) == 1) {
        // Dane logowania są poprawne
        $_SESSION["loggedin"] = true;

        while ($row_log = mysqli_fetch_assoc($result_logowanie)) {
            // Wyświetlanie danych
            $_SESSION["log"] = $row_log;

            echo 'ID: ' . $row_log['id'] . '<br>';
            echo 'Login: ' . $row_log['login'] . '<br>';
            echo 'Typ konta: ' . $row_log['typ_konta'] . '<br>';
            echo '<br>';

            // Zapisanie ID konta w sesji
            $_SESSION['user_id'] = $row_log['id'];
        }

        // Kod przekierowujący użytkownika na index po zalogowaniu
        header("location: ../index.php");

        // Pobranie danych użytkownika na podstawie ID konta
        $userID = $_SESSION['user_id'];
        $query_uzytkownik = "SELECT * FROM uzytkownik WHERE id='$userID'";
        $result_uzytkownik = mysqli_query($link, $query_uzytkownik);

        while ($row_uzytkownik = mysqli_fetch_assoc($result_uzytkownik)) {
            // Wyświetlanie danych
            $_SESSION["uzytkownik"] = $row_uzytkownik;
            echo 'ID: ' . $row_uzytkownik['id'] . '<br>';
            echo 'Imię: ' . $row_uzytkownik['imie'] . '<br>';
        }
    } else {
        // Dane logowania są niepoprawne
        echo "Błędny login lub hasło.";
    }
}

/*
require_once "../config.php";
// Sprawdzenie czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    
    // Zabezpieczenie przed SQL Injection
    $login = mysqli_real_escape_string($link, $login);
    $haslo = mysqli_real_escape_string($link, $haslo);
    
    // Zapytanie do bazy danych w celu sprawdzenia poprawności danych logowania
    $query_konto = "SELECT * FROM konto WHERE login = '$login' AND haslo = '$haslo'";
    $result_logowanie = mysqli_query($link, $query_konto);
    
    // Sprawdzenie czy zapytanie zwróciło wyniki
    if (mysqli_num_rows($result_logowanie) == 1) {
        // Dane logowania są poprawne
        $_SESSION["loggedin"] = true;
        $userID = $_SESSION["log"]["id"];

// Zapisanie ID użytkownika w sesji
        $_SESSION['user_id'] = $userID;

         // Kod przekierowujący użytkownika na index po zalogowaniu                          
        header("location: ../index.php");

        while ($row_log = mysqli_fetch_assoc($result_logowanie)) 
                {
                // Wyświetlanie danych
                $_SESSION["log"] = $row_log; 

                echo 'ID: ' . $row_log['id'] . '<br>';
                echo 'Login: ' . $row_log['login'] . '<br>';
                echo 'Typ konta: ' . $row_log['typ_konta'] . '<br>';
                echo '<br>';  
                }

        $userID = $_SESSION["log"]['id'];
        $query_uzytkownik = "SELECT * FROM uzytkownik WHERE id='$userID'";
        $result_uzytkownik = mysqli_query($link, $query_uzytkownik);
        while ($row_uzytkownik = mysqli_fetch_assoc($result_uzytkownik)) 
                {
                // Wyświetlanie danych
                $_SESSION["uzytkownik"] = $row_uzytkownik; 
                echo 'ID: ' . $row_uzytkownik['id'] . '<br>';
                echo 'Login: ' . $row_uzytkownik['imie'] . '<br>';  
                }
    } else {
        // Dane logowania są niepoprawne
        echo "Błędny login lub hasło.";
    }
}*/
?>
