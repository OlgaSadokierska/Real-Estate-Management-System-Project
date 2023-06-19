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

?>
<form style="margin: 20px;" method="POST" class="text-start" id="form-dodaj-typ-domu">
    <label for="nazwa_typu" style="font-size: 15px;">Nazwa typu domu:</label>
    <br>
    <input style="margin-bottom: 10px;" type="text" name="nazwa_typu" id="nazwa_typu" required>
    <br>
    <input type="submit" value="Dodaj" style="
                    margin: 10px;
                    background-color:  #4CAF50;
                    color:white;
                    padding: 8px 20px;
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;
                    transition: all 0.3s ease 0s;">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazwa_typu = $_POST['nazwa_typu'];
    
    $insertQuery = "INSERT INTO typ_dom (nazwa_typu)
                    VALUES ('$nazwa_typu')";
    
    $insertResult = mysqli_query($link, $insertQuery);
    
    if ($insertResult) {
        echo "Dodano typ domu do bazy danych.";
    } else {
        echo "Błąd przy dodawaniu typu domu: " . mysqli_error($link);
    }
}

if (file_exists("../include/cmsfooter.php")) {
  include("../include/cmsfooter.php");
}else{
 echo"nie ma";
}

?>