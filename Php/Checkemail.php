<?php

$connessione_al_server = mysql_connect("localhost","truduGabriele","beluga874");

if(!$connessione_al_server)
{
    die ("Errore: connessione non riuscita".mysql_error());
}



$db_selected = mysql_select_db("amm14_truduGabriele", $connessione_al_server);

if(!$db_selected)
{
    die ("Errore: selezione del database errata ".mysql_error());
}

$queryemail = mysql_query("SELECT email FROM users WHERE email='$email'") or DIE('query non riuscita'.mysql_error());

$ris = mysql_num_rows($queryemail);

    echo $ris;

?>
