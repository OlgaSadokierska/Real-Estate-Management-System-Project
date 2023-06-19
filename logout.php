<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);

session_destroy();
session_unset();
header('refresh: 1;');
header("Location: ./index.php");

?>