<div style=" min-height: 60vh;">
<h3 style="margin: 20px;">Twoje rezerwacje:</h3>
<div style="display: flex;" >
<?php
session_start();
$userID = $_SESSION["uzytkownik"]['id'];
// Pobranie rezerwacji dla zalogowanego użytkownika
$query = "SELECT r.id AS Id, u.imie AS Imię, u.nazwisko AS Nazwisko, d.nazwa_domu AS 'Nazwa domu', d.opis AS Opis, d.metraz AS Metraż, d.cena AS Cena, r.data_rezerwacji AS 'Data rezerwacji' FROM rezerwacja r JOIN dom d ON r.ID_dom = d.id JOIN uzytkownik u ON r.ID_uzytkownik = u.id WHERE r.ID_uzytkownik = '$userID'";
$result = mysqli_query($link, $query);

  if (mysqli_num_rows($result) > 0) {
      echo "<table class=\"table table-striped\" style=\"overflow-x:auto;
      margin: 30px;
      text-align: center;\" >\n";

      while ($field = mysqli_fetch_field($result)) {
          echo "\t\t<th >$field->name</th>\n";

      }
      echo "\t\t<th></th>\n";

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
                 /* echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
                  echo '<input type="hidden" name="domID" value="' . $row['ID'] . '">';
                  echo '<button type="submit" id="rezerwuj" style="
                  background-color: 	#D22B2B; color: white; border-radius: 5px;
                  cursor: pointer;
                  transition: all 0.3s ease 0s;">Usuń</button>';
                  echo '</form>';*/
                  echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
                echo '<input type="hidden" name="rezerwacjaID" value="' . $row['Id'] . '">';
                echo '<button type="submit" name="usunRezerwacje" style="background-color: #D22B2B; color: white; border-radius: 5px; cursor: pointer; transition: all 0.3s ease 0s;">Usuń</button>';
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
      echo "Brak rezererwacji.";
  }
  if (isset($_POST['usunRezerwacje'])) {
    $rezerwacjaID = $_POST['rezerwacjaID'];
    
   
    $deleteQuery = "DELETE FROM rezerwacja WHERE id = '$rezerwacjaID'";
    $deleteResult = mysqli_query($link, $deleteQuery);
    
    if ($deleteResult) {
        header("Refresh:0");
    } else {
        echo "Błąd podczas usuwania rezerwacji: " . mysqli_error($link);
    }
}
?>
</div>
 </div>
</section>
</section>