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

<form method="POST" style="margin: 20px;" class="text-start" id="form-dodaj-osiedle">
  <label for="nazwa_osiedla" style="font-size: 15px; margin: 5px;">Nazwa osiedla:</label>
    <br>
    <input style="margin-bottom: 10px;" type="text" name="nazwa_osiedla" id="nazwa_osiedla" required>
    <br>
    <label for="ulica" style="font-size: 15px;  margin: 5px;">Ulica:</label>
    <br>
    <input style="margin-bottom: 10px;" type="text" name="ulica" id="ulica" required>
    <br>
    <label for="dzielnica" style="font-size: 15px;  margin: 5px;">Dzielnica:</label>
    <br>
    <input style="margin-bottom: 10px;" type="text" name="dzielnica" id="dzielnica" required>
    <br>
    <input type="submit" value="Dodaj" style="
                    margin: 10px;
                    background-color: #4CAF50;
                    color:white;
                    padding: 8px 20px;
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;
                    transition: all 0.3s ease 0s;">
</form>

<?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nazwa_osiedla = $_POST['nazwa_osiedla'];
                        $ulica = $_POST['ulica'];
                        $dzielnica = $_POST['dzielnica'];
                        
                        $insertQuery = "INSERT INTO osiedle (nazwa_osiedla, ulica, dzielnica)
                                        VALUES ('$nazwa_osiedla', '$ulica', '$dzielnica')";
                        
                        $insertResult = mysqli_query($link, $insertQuery);
                        
                        if ($insertResult) {
                            echo "Dodano osiedle do bazy danych.";
                        } else {
                            echo "Błąd przy dodawaniu osiedla: " . mysqli_error($link);
                        }
                    }

                    if (file_exists("../include/cmsfooter.php")) {
                      include("../include/cmsfooter.php");
                    }else{
                     echo"nie ma";
                    }
                    
?>