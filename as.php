<?php

$query = "SELECT imie, nazwisko, mail, numer_telefonu, login, typ_konta, haslo 
from konto 
INNER JOIN uzytkownik on konto.id = uzytkownik.ID_konto";


$result = mysqli_query($link, $query) or die("Zapytanie zakończone niepowodzeniem"); 

  echo "<table class=\"table\">\n"; 
  echo "\t<tr>\n"; 

  while ($field = mysqli_fetch_field($result)) { 
  echo "\t\t<th>$field->name</th>\n"; 
  } 

  echo "\t</tr>\n"; 

  while ($row = mysqli_fetch_assoc($result)) { 
  echo "\t<tr>\n"; 

  foreach ($row as $col_value) {  
  echo "\t\t<td>$col_value</td>\n";  
  } 

  echo "\t</tr>\n"; 
  } 

echo "</table>\n"; 

?>