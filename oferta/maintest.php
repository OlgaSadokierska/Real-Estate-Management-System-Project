<?php
$host = "localhost";
$login = "2024_izabelan";
$password = "398869";
$dbname = "2024_izabelan";

$link = mysqli_connect($host, $login, $password);
// Sprawdzenie czy udało się nawiązać połączenie
if (!$link) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Sprawdzenie czy użytkownik jest zalogowany
    if (isset($_SESSION['user_id'])) {
        // Pobranie identyfikatora użytkownika z sesji
        $userID = $_SESSION['user_id'];

        // Pobranie rezerwacji dla zalogowanego użytkownika
        $query = "SELECT * FROM rezerwacja WHERE ID_uzytkownik = '$userID'";
        $result = mysqli_query($link, $query);

        // Sprawdzenie czy zapytanie zostało wykonane poprawnie
        if ($result) {
            // Wyświetlenie rezerwacji
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Wyświetlanie danych rezerwacji
                    echo "ID rezerwacji: " . $row["ID"] . "<br>";
                    echo "Data rezerwacji: " . $row["data_rezerwacji"] . "<br>";
                    // Wyświetlanie innych danych rezerwacji...
                    echo "<br>";
                }
            } else {
                echo "Brak rezerwacji dla tego użytkownika.";
            }
        } else {
            echo "Wystąpił błąd podczas pobierania rezerwacji: " . mysqli_error($link);
        }
    } else {
        echo "Użytkownik nie jest zalogowany.";
    }
} else {
    echo "Użytkownik nie jest zalogowany.";
}


// Zamknięcie połączenia z bazą danych
mysqli_close($link);
?>


</body>
</html>
