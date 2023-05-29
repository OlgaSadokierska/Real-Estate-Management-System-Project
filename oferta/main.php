<body>
    <!--wyszukiwanie-->
    
<?php
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
                
                  /* popraw zapytanie*/  $query = "SELECT  * ,nazwa_typu.typ_dom  FROM dom";
                    $result = mysqli_query ($link, $query) or die ("Zapytanie zakończone niepowodzeniem");
                    /* Wyświetlenie wyników w HTML */
                    echo "<table class=\"table\">\n";
                    while ($wynik = mysqli_fetch_assoc($result)) {
                    echo "\t<tr>\n";
                    foreach ($wynik as $col_value) { 
                        echo "\t\t<td>$col_value</td>\n"; 
                }
                echo "\t</tr>\n";
        }
        echo "</table>\n";
       
    } else {
        echo "Połączenie nie jest aktywne";
    }
}

mysqli_query($link, "SET NAMES UTF8");

?>
   
</body></html>