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

$query = "SELECT nazwa_domu AS Nazwa, opis AS Opis, typ_dom.nazwa_typu AS 'Typ domu', metraz AS Metraż, cena AS 'Cena', ilosc_pokoi AS 'Ilość pokoi', ilosc_pietr AS 'Ilość pięter',  osiedle.nazwa_osiedla AS Osiedle
          FROM dom 
          INNER JOIN typ_dom ON dom.ID_typ_dom = typ_dom.id 
          INNER JOIN osiedle ON dom.ID_osiedle = osiedle.id 
          LEFT JOIN zdjecia ON dom.id = zdjecia.dom_id";


$result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class=\"table table-striped\" style=\
        overflow-x: auto;
        display: flex;
        text-align: center;
        justify-content: space-around;
        flex-direction: row;
        flex-wrap: wrap;
        align-content: center;
        align-items: baseline;\" >\n";
        echo "\t<tr style=\"width:5vw;\" >\n";

        while ($field = mysqli_fetch_field($result)) {
            echo "\t\t<th>$field->name</th>\n";

        }
        echo "\t\t<th></th>\n";
        echo "\t</tr>\n";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "\t<tr>\n";
            foreach ($row as $column => $value) {
                    echo "\t\t<td>$value</td>\n";
                }
            echo '<td>';
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                $userID = $_SESSION['user_id'];
                $typ_konta = $_SESSION['log']['typ_konta'];
              
                    echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
                    echo '<input type="hidden" name="domID" value="' . $row['ID'] . '">';
                    echo '<button type="submit" style="
                    background-color: 	#D22B2B; color: white; border-radius: 5px;
                    cursor: pointer;
                    transition: all 0.3s ease 0s;">Usuń</button>';
                    echo '</form>';
                
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


if (file_exists("../include/cmsfooter.php")) {
  include("../include/cmsfooter.php");
}else{
 echo"nie ma";
}

?>