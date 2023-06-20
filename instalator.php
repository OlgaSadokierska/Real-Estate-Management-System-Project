<!doctype html>
<html lang="PL-pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instalator</title>
</head>

<?php
$step = 0;
if(isset($_POST["step"])) $step = $_POST["step"];
if(isset($_GET["step"])) $step = $_GET["step"];
function step1(): void
{
    if(file_exists("instalator/serwer.php")) include("instalator/serwer.php");
}

function step2(): void
{
    echo '<h1>Instalator :: <code>krok: 1</code></h1><hr>';
    $file=fopen('config.php',"w");
    $config = '<?php session_start();
$host = "'.$_POST["host"].'";
$user = "'.$_POST["user"].'";
$password = "'.$_POST["passwd"].'";
$dbname = "'.$_POST["dbname"].'";

global $link;
$link = mysqli_connect($host, $user, $password) or die ("Nie można się połączyć");
mysqli_select_db ($link, $dbname) or die ("Nie mozna wybrać bazy danych");
mysqli_query($link, "SET NAMES UTF8") or die ("Nie można ustawić kodowania");
?>';


    if (!fwrite($file, $config)) {
        print "Nie mogę zapisać do pliku ($file)";
        exit;
    }
    fclose($file);

    echo "<div class='w-100 h-100 d-flex justify-content-center align-items-center flex-column'><p>Krok 1 zakończony: \n";
    echo "Plik konfiguracyjny utworzony</p>";
    echo "<p><button class='btn btn-info'><a href='instalator.php?step=3'>Dalej</a></button></p></div>";
}

function step3(): void
{
    echo '<h1>Instalator :: <code>krok: 2</code></h1><hr>';
    if (file_exists("sql/sql.php")) {
        include("sql/sql.php");
        include("config.php");
        echo "<div class='w-100 h-100 d-flex justify-content-center align-items-center flex-column'><h1>Tworzę tabele bazy: " . $dbname . ".</h1><br>\n";
        mysqli_select_db($link, $dbname) or die(mysqli_error($link));
        for ($i = 0; $i < count($create); $i++) {
            echo "<p>" . $i . ". <code>" . $create[$i] . "</code></p>\n";
            mysqli_query($link, $create[$i]);
        }
        echo "<p>Krok 2 zakończony: \n";
        echo "Struktura bazy danych została utworzona</p>";
        echo "<p><button class='btn btn-info'><a href='instalator.php?step=4'>Dalej</a></button></p></div>";
    }
}

function step4(): void
{
    echo '<h1>Instalator :: <code>krok: 3</code></h1><hr>';
    if (file_exists("sql/insert.php")) {
        include("sql/insert.php");
        include("config.php");
        echo "<div class='w-100 h-100 d-flex justify-content-center align-items-center flex-column'><p>Wstawiam dane do tabel bazy: ".$dbname.".</p>\n";
        mysqli_select_db($link, $dbname) or die(mysqli_error($link));
        for($i=0;$i<count($insert);$i++){
            echo "<p>".$i.". <code>".$insert[$i]."</code></p>\n";
            mysqli_query($link, $insert[$i]);
        }
    }
    echo "<p>Krok 3 zakończony: \n";
    echo "Niezbędne dane zostały wprowadzone do bazy</p>";
    echo "<p><button class='btn btn-info'><a href='instalator.php?step=5'>Dalej</a></button></p></div>";
}

function step5(): void
{
    if(file_exists("instalator/admin.php")) include("instalator/admin.php");
}

function step6()
{
    echo '<h1>Instalator :: <code>krok: 5</code></h1><hr>';
    $config = '<?php
    # App config
    $appName="'.$_POST["name"].'";
    ?>';
    if (is_writable('config.php')) {
        if (!$uchwyt = fopen('config.php', 'a')) {
            echo "Nie mogę otworzyć pliku ('config.php')";
            exit;
        }
        if (fwrite($uchwyt, $config) == FALSE) {
            echo "Nie mogę zapisać do pliku ('config.php')";
            exit;
        }
        fclose($uchwyt);

        echo "<div class='w-100 h-100 d-flex justify-content-center align-items-center flex-column'><p>Sukces, zapisano (<code>konfigurację</code>) do pliku (config.php)</p>\n";
    } else {
        echo "Plik config.php nie jest zapisywalny";
    }


    include("config.php");
    $login = $_POST["login"];
    $password = $_POST["password"];
    $typ_konta = "AD";
    $query = "INSERT INTO konto (login, haslo, typ_konta) VALUES ('$login', '$password', '$typ_konta')";
    if(mysqli_query($link, $query)){
        echo "<p>Utworzono konto administratora</p>";
        echo '<p><code>'.$query.'</code></p>';
        echo "<p>Krok 5 zakończony: \n";
        echo "<p><button class='btn btn-info'><a href='instalator.php?step=7'>Dalej</a></button></p></div>";
    }
    else{
        echo "Nie udało się utworzyć konta administratora";
    }
}

function step7()
{
    echo '<h1>Instalator :: <code>krok: 6</code></h1><hr>';
    echo "<div class='w-100 h-100 d-flex justify-content-center align-items-center flex-column'>".'<p>Zakończono</p>';
    echo "<button class='btn btn-info'><a href='index.php'>Przejdź do aplikacji</a></button></div>";
}

switch ($step) {

    case 2:
        step2();
        break;

    case 3:
        step3();
        break;

    case 4:
        step4();
        break;

    case 5:
        step5();
        break;

    case 6:
        step6();
        break;

    case 7:
        step7();
        break;

    default:
        if(file_exists('config.php')){
            if(is_writable('config.php')){
                $step = 1;
                step1();
            } else {
                echo "<div class='w-100 h-100 d-flex justify-content-center align-items-center flex-column'><p>Zmień uprawnienia do pliku <code>config.php</code><br>np. <code>chmod o+w config.php</code></p>";
                echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p></div>";
            }
        }else{
            echo "<div class='w-100 h-100 d-flex justify-content-center align-items-center flex-column'><p>Stwórz plik <code>config.php</code><br>np. <code>touch config.php</code></p>";
            echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p></div>";
        }
        break;
}

?>
