<?php
session_start();
if(file_exists("./INCLUDE/header.php")) include("./INCLUDE/header.php");
if(file_exists("./INCLUDE/nav.php")) include("./INCLUDE/nav.php");
if(file_exists("./DDAWANIE/main.php"))include("./DDAWANIE/main.php");
if(file_exists("./INCLUDE/footer.php")) include("./INCLUDE/footer.php");
?>