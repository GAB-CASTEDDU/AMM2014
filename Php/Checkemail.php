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

//$link = mysqli_connect("localhost", "root', 'password', 'db_name');

$email = $_POST["email"];

$query = "SELECT email FROM users WHERE email='$email'";



$result = mysql_query($connessione_al_server,$query);

/*if(mysql_num_rows($result) > 0)
{
    echo '1';
}

else
{
    echo '0';
}*/
?>