<?php

$pagina_login="Login.php";

setcookie("tipo_utente", 0, null);
session_destroy();

header("Location:".$pagina_login);
?>
