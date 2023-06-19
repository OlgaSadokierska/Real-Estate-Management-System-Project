<body> 
<div style="min-height: 60vh;">
<?php
$queryTypDomu = "SELECT id, nazwa_typu FROM typ_dom";
$resultTypDomu = mysqli_query($link, $queryTypDomu);

if (!$resultTypDomu) {
    echo "Błąd zapytania typ_domu: " . mysqli_error($link);
}

$queryTypOsiedla = "SELECT id, nazwa_osiedla FROM osiedle";
$resultTypOsiedla = mysqli_query($link, $queryTypOsiedla);

if (!$resultTypOsiedla) {
    echo "Błąd zapytania typ_osiedla: " . mysqli_error($link);
}
$queryTypDzielnicy = "SELECT DISTINCT dzielnica FROM osiedle";
$resultTypDzielnicy = mysqli_query($link, $queryTypDzielnicy);

if (!$resultTypDzielnicy) {
    echo "Błąd zapytania typ_dzielnicy: " . mysqli_error($link);
}
?>
<form method="POST" id="form-login" style="display: flex; margin: 20px; align-items: center; justify-content: space-evenly;"> 
    <label>Typ domu:</label> 
    <select name="typ_domu" id="typ_domu"> 
        <option value="*">Wszystkie</option> 
        <?php
        while ($row = mysqli_fetch_assoc($resultTypDomu)) {
            echo '<option value="' . $row["id"] . '">' . $row["nazwa_typu"] . '</option>';
        }
        ?>
    </select> 
    <label>Nazwa osiedla:</label> 
    <select name="typ_osiedla" id="typ_osiedla"> 
        <option value="*">Wszystkie</option> 
        <?php
        while ($row = mysqli_fetch_assoc($resultTypOsiedla)) {
            echo '<option value="' . $row["id"] . '">' . $row["nazwa_osiedla"] . '</option>';
        }
        ?>
    </select> 
    <label>Dzielnica:</label> 
    <select name="typ_dzielnicy" id="typ_dzielnicy"> 
        <option value="*">Wszystkie</option> 
        <?php
        while ($row = mysqli_fetch_assoc($resultTypDzielnicy)) {
            echo '<option value="' . $row["dzielnica"] . '">' . $row["dzielnica"] . '</option>';
        }
        ?>
    </select> 
    <button type="submit">Szukaj</button>   
</form>
    
<?php
$query = "SELECT dom.id as Numer, nazwa_domu AS Nazwa, opis AS Opis, typ_dom.nazwa_typu AS 'Typ domu', metraz AS 'Metraż', cena AS Cena, ilosc_pokoi AS 'Ilość pokoi', ilosc_pietr AS 'Ilość pięter', balkon AS Balkon, ogrod AS Ogród, garaz AS Garaż, piwnica AS Piwnica, osiedle.nazwa_osiedla AS Osiedle, zdjecia.sciezka AS Zdjęcie
          FROM dom 
          INNER JOIN typ_dom ON dom.ID_typ_dom = typ_dom.id 
          INNER JOIN osiedle ON dom.ID_osiedle = osiedle.id 
          LEFT JOIN zdjecia ON dom.id = zdjecia.dom_id
          WHERE dom.id NOT IN (SELECT ID_dom FROM rezerwacja)";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $typ_domu = $_POST['typ_domu'];
    $typ_osiedla = $_POST['typ_osiedla'];
    $typ_dzielnicy = $_POST['typ_dzielnicy'];

    if ($typ_domu != '*') {
        $query .= " AND ID_typ_dom = '$typ_domu'";
    }

    if ($typ_osiedla != '*') {
        $query .= " AND ID_osiedle = '$typ_osiedla'";
    }

    if ($typ_dzielnicy != '*') {
        $query .= " AND osiedle.dzielnica = '$typ_dzielnicy'";
    }
}

$result = mysqli_query($link, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table class=\"table table-striped\" style=\"overflow-x:auto;
        display: flex;
        margin: 30px;
        max-width: 95vw;
        text-align: center;\" >\n";
        echo "\t<tr>\n";

        while ($field = mysqli_fetch_field($result)) {
            echo "\t\t<th>$field->name</th>\n";
        }
        echo "\t\t<th></th>\n";
        echo "\t</tr>\n";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "\t<tr>\n";

            foreach ($row as $column => $value) {
                if ($column == 'ZDJĘCIE') {
                    $adres_url = "./img/" . $value;
                    echo "\t\t<td><img src=\"$adres_url\" style=\"width: 100px\" alt=\"Zdjęcie\"></td>\n";
                } else {
                    echo "\t\t<td>$value</td>\n";
                }
            }

            echo '<td>';
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                $userID = $_SESSION['user_id'];
                $typ_konta = $_SESSION['log']['typ_konta'];

                if ($typ_konta == "PR" || $typ_konta == 'AD') {
                    echo "Nie masz uprawnień";
                } else {
                    echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
                    echo '<input type="hidden" name="domID" value="' . $row['numer'] . '">';
                    echo '<button type="submit" id="rezerwuj" style="
                    background-color: #5e72e4;
                    color:white;
                    padding: 8px 20px;
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;
                    transition: all 0.3s ease 0s;">Zarezerwuj</button>';
                    echo '</form>';
                }
            } else {
                echo 'Proszę się zalogować.';
            }
            

            echo '</td>';
            echo "</tr>";
        }

        echo "</table>\n";
    } else {
        echo "Brak dostępnych ofert.";
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        $domID = $_POST['domID'];
        $userID = $_SESSION['user_id'];
        $currentDate = date("Y-m-d H:i:s"); // Current date and time

        if (!empty($domID) && is_numeric($domID)) {
            if ($typ_konta == "PR" || $typ_konta == 'AD') {
                echo "Nie masz uprawnień";
            } else {
                $insertQuery = "INSERT INTO rezerwacja (ID_uzytkownik, ID_dom, data_rezerwacji) VALUES ('$userID', '$domID', '$currentDate')";
                $insertResult = mysqli_query($link, $insertQuery);

                if ($insertResult) {
                    header("location: ./rezerwacje.php");
                } else {
                    echo "Błąd podczas rezerwacji: " . mysqli_error($link);
                }
            }
        } else {
            echo "Nieprawidłowy identyfikator domu.";
        }
    }
} else {
    echo "Błąd zapytania: " . mysqli_error($link);
}
?>
</div>
</body>
</html>