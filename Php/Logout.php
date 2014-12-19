<?php

$pagina_login="Login.php";

setcookie("tipo_utente", null);
session_destroy();

header("Location:".$pagina_login);
?>
