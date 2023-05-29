<?php
session_start();
if(file_exists("./INCLUDE/header.php")) include("./INCLUDE/header.php");
if(file_exists("./INCLUDE/nav.php")) include("./INCLUDE/nav.php");
if(file_exists("./INCLUDE/baner-small.php"))include("./INCLUDE/baner-small.php");
if(file_exists("./o-nas/main.php"))include("./o-nas/main.php");
if(file_exists("./INCLUDE/footer.php")) include("./INCLUDE/footer.php");
?>