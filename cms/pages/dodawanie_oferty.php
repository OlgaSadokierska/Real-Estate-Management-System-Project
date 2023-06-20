
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

<form method="POST" style="margin: 20px; display: flex;" class="text-start" id="form-dodaj" enctype="multipart/form-data">
  <div style="min-width: 30vw">
    <label for="nazwa_domu" style="font-size: 15px; margin: 5px;">Nazwa domu:</label>
    <br>
    <input type="text" style="margin-bottom: 10px;" name="nazwa_domu" id="nazwa_domu" required>
    <br>
    <label for="opis" style="font-size: 15px; margin: 5px;">Opis:</label>
    <br>
    <textarea name="opis" style="margin-bottom: 10px;" id="opis" required></textarea>
    <br>
    <label style="font-size: 15px; margin: 5px;">Typ domu:</label>
    <br>
    <select name="typ_domu" style="margin-bottom: 10px;" id="typ_domu">
    <?php
        $queryTypDomu = "SELECT id, nazwa_typu FROM typ_dom";
        $resultTypDomu = mysqli_query($link, $queryTypDomu);
        while ($row = mysqli_fetch_assoc($resultTypDomu)) {
            echo '<option value="' . $row["id"] . '">' . $row["nazwa_typu"] . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="metraz" style="font-size: 15px; margin: 5px;">Metraż:</label>
    <br>
    <input type="number" style="margin-bottom: 10px;" name="metraz" id="metraz" required>
    <br>
    <label for="cena" style="font-size: 15px; margin: 5px;">Cena:</label>
    <br>
    <input type="number" style="margin-bottom: 10px;" name="cena" id="cena" required>
    <br>
    <label for="ilosc_pokoi" style="font-size: 15px; margin: 5px;">Ilość pokoi:</label>
    <br>
    <input type="number" style="margin-bottom: 10px;" name="ilosc_pokoi" id="ilosc_pokoi" required>
    <br>
    <label for="ilosc_pietr" style="font-size: 15px; margin: 5px;">Ilość pięter:</label>
    <br>
    <input type="number" style="margin-bottom: 10px;" name="ilosc_pietr" id="ilosc_pietr" required>
    <br>
    </div>
    <div style="min-width: 30vw">
    <label for="balkon" style="font-size: 15px; margin: 5px;">Balkon:</label>
    <br>
    <select name="balkon" style="margin-bottom: 10px;" id="balkon">
        <option value="Y">TAK</option>
        <option value="N">NIE</option>
    </select>
    <br>
    
    <label for="ogrod" style="font-size: 15px; margin: 5px;">OGRÓD:</label>
    <br>
    <select name="ogrod" style="margin-bottom: 10px;" id="ogrod">
        <option value="Y">TAK</option>
        <option value="N">NIE</option>
    </select>
    <br>
    <label for="garaz" style="font-size: 15px; margin: 5px;">GARAZ:</label>
    <br>
    <select name="garaz" style="margin-bottom: 10px;" id="garaz">
        <option value="Y">TAK</option>
        <option value="N">NIE</option>
    </select>
    <br>
    <label for="piwnica" style="font-size: 15px; margin: 5px;">Piwnica:</label>
    <br>
    <select name="piwnica" style="margin-bottom: 10px;" id="piwnica">
        <option value="Y">TAK</option>
        <option value="N">NIE</option>
    </select>
    <br>
    <label style="font-size: 15px; margin: 5px;">Nazwa osiedla:</label>
    <br>
    <select name="typ_osiedla" style="margin-bottom: 10px;" id="typ_osiedla">
    <?php
        $queryTypOsiedla = "SELECT id, nazwa_osiedla FROM osiedle";
        $resultTypOsiedla = mysqli_query($link, $queryTypOsiedla);
        while ($row = mysqli_fetch_assoc($resultTypOsiedla)) {
            echo '<option value="' . $row["id"] . '">' . $row["nazwa_osiedla"] . '</option>';
        }
        ?>
    </select>
    <br>
    <label style="font-size: 15px; margin: 5px;">Dzielnica:</label>
    <br>
    <select name="typ_dzielnicy" style="margin-bottom: 10px;" id="typ_dzielnicy">
    <?php
        $queryTypDzielnicy = "SELECT DISTINCT dzielnica FROM osiedle";
        $resultTypDzielnicy = mysqli_query($link, $queryTypDzielnicy);
        while ($row = mysqli_fetch_assoc($resultTypDzielnicy)) {
            echo '<option value="' . $row["dzielnica"] . '">' . $row["dzielnica"] . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="zdjecie" style="font-size: 15px; margin: 5px;">Zdjęcie:</label>
    <br>
    <input type="file" style="margin-bottom: 10px;" name="file" id="fileToUpload" required>
    <br>
    <button type="submit" value="Dodaj" style="
                    margin: 10px;
                    background-color: #4CAF50;
                    color:white;
                    padding: 8px 20px;
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;
                    transition: all 0.3s ease 0s;">Dodaj</button>
                    </div>
</form>

<?php
/*
$target_dir = __DIR__ . "/../../img/";
$target_file = $target_dir . $_FILES["file"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if ( is_writable($target_dir)) {
    // do upload logic here
} else {
    echo 'Upload directory is not writable';
}

if (is_dir($target_dir)) {
    // do upload logic here
} else {
    echo ' does not exist.';
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ . "/../../img/" . $_FILES["file"]["name"])) {
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.  $target_file->" .$_FILES["file"]["error"];
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych formularza
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
    $typ_dzielnicy = $_POST['typ_dzielnicy'];

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    if ($fileError === 0) {
        // Ścieżka docelowa pliku
        $fileDestination = './img' . $fileName;

        // Przeniesienie pliku na serwer
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // Zapisanie danych w bazie danych
            $insertQuery = "INSERT INTO dom (nazwa_domu, opis, ID_typ_dom, metraz, cena, ilosc_pokoi, ilosc_pietr, balkon, ogrod, garaz, piwnica, ID_osiedle)
                            VALUES ('$nazwa_domu', '$opis', '$typ_domu', '$metraz', '$cena', '$ilosc_pokoi', '$ilosc_pietr', '$balkon', '$ogrod', '$garaz', '$piwnica', '$typ_osiedla')";

            $insertResult = mysqli_query($link, $insertQuery);

            if ($insertResult) {
                $domId = mysqli_insert_id($link);

                $insertImageQuery = "INSERT INTO zdjecia (sciezka, dom_id)
                                     VALUES ('$fileDestination', '$domId')";

                $insertImageResult = mysqli_query($link, $insertImageQuery);

                if ($insertImageResult) {
                    echo "Dodano dom z zdjęciem do bazy danych.";
                } else {
                    echo "Błąd przy dodawaniu zdjęcia: " . mysqli_error($link);
                }
            } else {
                echo "Błąd przy dodawaniu domu: " . mysqli_error($link);
            }
        } else {
            echo "Wystąpił błąd podczas przenoszenia pliku.";
        }
    } else {
        echo "Wystąpił błąd podczas przesyłania pliku.";
    }
}


if (file_exists("../include/cmsfooter.php")) {
    include("../include/cmsfooter.php");
  }else{
   echo"nie ma";
  }
*/




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych formularza
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
    $typ_dzielnicy = $_POST['typ_dzielnicy'];

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    $target_dir = __DIR__ . "/../../img/";
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($fileTmpName);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (!is_dir($target_dir)) {
        echo $target_dir . ' does not exist.';
    } elseif (!is_writable($target_dir)) {
        echo 'Upload directory is not writable.';
    } elseif (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    } elseif ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($fileTmpName, $target_file)) {
            // Zapisanie danych w bazie danych
            $insertQuery = "INSERT INTO dom (nazwa_domu, opis, ID_typ_dom, metraz, cena, ilosc_pokoi, ilosc_pietr, balkon, ogrod, garaz, piwnica, ID_osiedle)
                            VALUES ('$nazwa_domu', '$opis', '$typ_domu', '$metraz', '$cena', '$ilosc_pokoi', '$ilosc_pietr', '$balkon', '$ogrod', '$garaz', '$piwnica', '$typ_osiedla')";

            $insertResult = mysqli_query($link, $insertQuery);

            if ($insertResult) {
                $domId = mysqli_insert_id($link);

                $insertImageQuery = "INSERT INTO zdjecia (sciezka, dom_id)
                                     VALUES ('$fileName', '$domId')";

                $insertImageResult = mysqli_query($link, $insertImageQuery);

                if ($insertImageResult) {
                    echo "Dodano dom z zdjęciem do bazy danych.";
                } else {
                    echo "Błąd przy dodawaniu zdjęcia: " . mysqli_error($link);
                }
            } else {
                echo "Błąd przy dodawaniu domu: " . mysqli_error($link);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if (file_exists("../include/cmsfooter.php")) {
    include("../include/cmsfooter.php");
} else {
    echo "Nie ma.";
}



  
?>