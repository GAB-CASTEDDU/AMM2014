<?php

if(!isset($_COOKIE["redirect"]))
    $pagina_login="Login.php";

else
    $pagina_login=$_COOKIE["redirect"];

setcookie("tipo_utente", "");
session_destroy();

header("Location:".$pagina_login);
?>
