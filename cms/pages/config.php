<?php
session_start();
$host = "localhost";
$login = "2024_izabelan";
$password = "398869";
$dbname = "2024_izabelan";

$link = mysqli_connect($host, $login, $password);
if (!$link) {
    die("Nie można się połączyć: " . mysqli_connect_error());
}

$db_selected = mysqli_select_db($link, $dbname);
if (!$db_selected) {
    die("Nie można wybrać bazy danych: " . mysqli_error($link));
} else {
    if (mysqli_ping($link)) {
       /* echo "Połączenie jest aktywne";*/
       
    } else {
        echo "Połączenie nie jest aktywne";
    }
}

mysqli_query($link, "SET NAMES UTF8");

?>


