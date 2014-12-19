<?php

$pagina_red=$_COOKIE["redirect"];

session_destroy();

header("Location:".$pagina_red);
?>
