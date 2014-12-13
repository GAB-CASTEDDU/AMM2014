<?php

$pagina_login="Login.html";

setcookie("tipo_utente", 0, time()+3600);
session_destroy();

header("Location:".$pagina_login);

?>