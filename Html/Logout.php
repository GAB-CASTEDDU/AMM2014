<?php

$pagina_login="Login.html";

$_SESSION["logged"]=0;

session_destroy();

header("Location:".$pagina_login);

?>