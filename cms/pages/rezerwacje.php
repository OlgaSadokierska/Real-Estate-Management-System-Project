<?php
if (file_exists("./config.php")) {
  require_once("./config.php");
}else{
 echo"Error403. Brak pliku konfiguracyjnego";
}

if (file_exists("../include/cmsheader.php")) {
  include("../include/cmsheader.php");
}else{
 echo"nie ma";
}

// Wykonaj zapytanie SELECT
$query = "SELECT rezerwacja.id AS NUMER_ZAMÓWIENIA, data_rezerwacji, nazwa_domu, imie, nazwisko, mail, numer_telefonu 
          FROM rezerwacja 
          INNER JOIN dom ON rezerwacja.ID_dom = dom.id
          INNER JOIN uzytkownik ON rezerwacja.ID_uzytkownik = uzytkownik.id";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Wyświetl nagłówki tabeli
    echo "<table class=\"table table-striped\" style=\
    overflow-x: auto;
    display: flex;
    text-align: center;
    justify-content: space-around;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: baseline;\" >
                <tr>
                    <th>Numer zamówienia</th>
                    <th>Data rezerwacji</th>
                    <th>Nazwa domu</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>E-mail</th>
                    <th>Numer telefonu</th>
                </tr>
            </thead>
            <tbody>";
    
    // Wyświetl dane w wierszach tabeli
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row["NUMER_ZAMÓWIENIA"] . '</td>
                <td>' . $row["data_rezerwacji"] . '</td>
                <td>' . $row["nazwa_domu"] . '</td>
                <td>' . $row["imie"] . '</td>
                <td>' . $row["nazwisko"] . '</td>
                <td>' . $row["mail"] . '</td>
                <td>' . $row["numer_telefonu"] . '</td>
              </tr>';
    }
    
    // Zamknij tabelę
    echo '</tbody>
          </table>';
} else {
    echo "Brak danych do wyświetlenia.";
}

if (file_exists("../include/cmsfooter.php")) {
  include("../include/cmsfooter.php");
}else{
 echo"nie ma";
}

?>