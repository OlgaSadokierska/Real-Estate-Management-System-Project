

<body>
<h2>Dodaj nowy dom</h2>
<form method="POST"  class="text-start" id="form-login">
    <label for="nazwa_domu">Nazwa domu:</label>
    <input type="text" name="nazwa_domu" id="nazwa_domu" required>
    <br>
    <label for="opis">Opis:</label>
    <textarea name="opis" id="opis" required></textarea>
    <br>
    <label>Typ domu:</label>
    <select name="typ_domu" id="typ_domu">
        <option value="*">Wszystkie</option>
        <option value="1">Dom jednorodzinny</option>
        <option value="2">Apartament</option>
        <option value="3">Dom szeregowy</option>
        <option value="4">Rezydencja</option>
        <option value="5">Bliźniak</option>
    </select>
    <br>
    <label for="metraz">Metraż:</label>
    <input type="number" name="metraz" id="metraz" required>
    <br>
    <label for="cena">Cena:</label>
    <input type="number" name="cena" id="cena" required>
    <br>
    <label for="ilosc_pokoi">Ilość pokoji:</label>
    <input type="number" name="ilosc_pokoi" id="ilosc_pokoi" required>
    <br>
    <label for="ilosc_pietr">Ilość pięter:</label>
    <input type="number" name="ilosc_pietr" id="ilosc_pietr" required>
    <br>
    <label for="balkon">Balkon:</label>
    <select name="balkon" id="balkon">
        <option value="Y">TAK</option>
        <option value="N">NIE</option>
    </select>
    <br>
    <label for="ogrod">OGRÓD:</label>
    <select name="ogrod" id="ogrod">
        <option value="Y">TAK</option>
        <option value="N">NIE</option>
    </select>
    <br>
    <label for="garaz">GARAZ:</label>
    <select name="garaz" id="garaz">
        <option value="Y">TAK</option>
        <option value="N">NIE</option>
    </select>
    <br>
    <label for="piwnica">Piwnica:</label>
    <select name="piwnica" id="piwnica">
        <option value="Y">TAK</option>
        <option value="N">NIE</option>
    </select>
    <br>
    <label>Typ osiedla:</label>
    <select name="typ_osiedla" id="typ_osiedla">
        <option value="*">Wszystkie</option>
        <option value="1">Bałuty</option>
        <option value="2">Polesie</option>
        <option value="3">Widzew</option>
        <option value="4">Górna</option>
        <option value="5">Retkinia</option>
    </select>
    <br>
    <input type="submit" value="Dodaj">
</form>
</body>
</html>
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
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nazwa_domu = $_POST['nazwa_domu'];
            $opis = $_POST['opis'];
            $typ_domu = $_POST['typ_domu'];
            $metraz = $_POST['metraz'];
            $cena = $_POST['cena'];
            $ilosc_pokoi = $_POST['ilosc_pokoi'];
            $ilosc_pietr = $_POST['ilosc_pietr'];
            $balkon = $_POST['balkon'];
            $ogrod = $_POST['ogrod'];
            $garaz = $_POST['garaz'];
            $piwnica = $_POST['piwnica'];
            $typ_osiedla = $_POST['typ_osiedla'];

            // Przygotuj zapytanie SQL
            $query = "INSERT INTO dom (nazwa_domu, opis, ID_typ_dom, metraz, cena, ilosc_pokoi, ilosc_pietr, balkon, ogrod, garaz, piwnica, ID_osiedle) 
                    VALUES ('$nazwa_domu', '$opis', '$typ_domu', '$metraz', '$cena', '$ilosc_pokoi', '$ilosc_pietr', '$balkon', '$ogrod', '$garaz', '$piwnica', '$typ_osiedla')";

            // Wykonaj zapytanie do bazy danych
            if (mysqli_query($link, $query)) {
                echo "Nowy dom został dodany.";
            } else {
                echo "Wystąpił błąd podczas dodawania domu: " . mysqli_error($link);
            }

            
                
            }
        } else { 
            echo "Połączenie nie jest aktywne"; 
        } 
    } 

    mysqli_query($link, "SET NAMES UTF8"); 

    ?> 
