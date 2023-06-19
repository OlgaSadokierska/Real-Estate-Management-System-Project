<div class="container rounded bg-white mt-5 mb-5" >
    <div class="row" style="margin-bottom: 115px">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="./img/user-color.png"><span class="font-weight-bold"><?php echo $_SESSION["uzytkownik"]['imie']; ?> </span><span class="text-black-50"><?php echo $_SESSION["uzytkownik"]['mail']; ?></span></div>
        </div>
        <div class="col-md-9 border-right">
        <form method="POST">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Dane użytkownika</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Imie</label><input type="text" name="uzytkownik_imie" id="uzytkownik_imie" class="form-control" value="<?php echo $_SESSION["uzytkownik"]['imie']; ?>"></div>
                    <div class="col-md-6"><label class="labels">Nazwisko</label><input type="text" name="uzytkownik_nazwisko" id="uzytkownik_nazwisko" class="form-control" value="<?php echo $_SESSION["uzytkownik"]['nazwisko']; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Numer telefonu</label><input type="text" name="uzytkownik_numer" id="uzytkownik_numer" class="form-control" value="<?php echo $_SESSION["uzytkownik"]['numer_telefonu']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" name="uzytkownik_mail" id="uzytkownik_mail" class="form-control" value="<?php echo $_SESSION["uzytkownik"]['mail']; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Login</label><input type="text" name="uzytkownik_login" id="uzytkownik_login" class="form-control" value="<?php echo $_SESSION["log"]['login']; ?>"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nowe hasło:</label><input type="password" name="uzytkownik_haslo_1" id="uzytkownik_haslo_1" class="form-control"></div>
                    <div class="col-md-6"><label class="labels">Powtórz hasło:</label><input type="password" name="uzytkownik_haslo_2" id="uzytkownik_haslo_2" class="form-control"></div>
                </div>
            </div>
            <input type="submit" value="Zapisz zmiany" style="
                    margin: 10px;
                    background-color: #4CAF50;
                    color:white;
                    padding: 8px 20px;
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;
                    transition: all 0.3s ease 0s;">
            </form>
        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uzytkownik_imie = $_POST['uzytkownik_imie'];
    $uzytkownik_nazwisko = $_POST['uzytkownik_nazwisko'];
    $uzytkownik_numer = $_POST['uzytkownik_numer'];
    $uzytkownik_mail = $_POST['uzytkownik_mail'];
    $uzytkownik_login = $_POST['uzytkownik_login'];
    $uzytkownik_haslo_1 = $_POST['uzytkownik_haslo_1'];
    $uzytkownik_haslo_2 = $_POST['uzytkownik_haslo_2'];
    $userID = $_SESSION['user_id'];

    

    
    $updateQuery = "UPDATE uzytkownik SET
        imie = '$uzytkownik_imie',
        nazwisko = '$uzytkownik_nazwisko',
        numer_telefonu = '$uzytkownik_numer',
        mail = '$uzytkownik_mail'
        WHERE id = '$userID'";
    
    $updateResult = mysqli_query($link, $updateQuery);

    if ($updateResult) {
        
        $updateQuery2 = "UPDATE konto SET
            login = '$uzytkownik_login',
            haslo = '$uzytkownik_haslo_1'
            WHERE id = '$userID'";
        
        $updateResult2 = mysqli_query($link, $updateQuery2);

        if ($updateResult2) {
            echo "Zaktualizowano dane użytkownika";
        } else {
            echo "Błąd przy aktualizowaniu danych konta: " . mysqli_error($link);
        }
    } else {
        echo "Błąd przy aktualizowaniu danych użytkownika: " . mysqli_error($link);
    }
}


if (file_exists("../include/cmsfooter.php")) include("../include/cmsfooter.php");

?>