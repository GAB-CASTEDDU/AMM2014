<?php
$pagina_adm=$_COOKIE["redirect"];
    $pagina_ven=$_COOKIE["redirect"];
    $pagina_com=$_COOKIE["redirect"];
session_start();



$connessione_al_server=mysql_connect("localhost","truduGabriele","beluga874");

if(!$connessione_al_server)
{
	die ('Errore: connessione non riuscita'.mysql_error());
}



$db_selected=mysql_select_db("amm14_truduGabriele",$connessione_al_server);

if(!$db_selected)
{
	die ('Errore: selezione del database errata '.mysql_error());
}



$_SESSION["email"]=$_POST["email"];

$_SESSION["password"]=$_POST["password"];


/*if(isset($_COOKIE["redirect"]))
{*/

//}

/*else
{
    $pagina_adm="Amministratore/Home.php";
    $pagina_ven="Venditore/Home.php";
    $pagina_com="Compratore/Home.php";
}*/

$queryadm = mysql_query("SELECT * FROM utenti WHERE email='".$_SESSION["email"]."' AND password ='".$_SESSION["password"]."' AND tipo='amministratore'") or DIE('query non riuscita'.mysql_error());

$queryven = mysql_query("SELECT * FROM utenti WHERE email='".$_SESSION["email"]."' AND password ='".$_SESSION["password"]."' AND tipo='venditore'") or DIE('query non riuscita'.mysql_error());

$querycom = mysql_query("SELECT * FROM utenti WHERE email='".$_SESSION["email"]."' AND password ='".$_SESSION["password"]."' AND tipo='compratore'") or DIE('query non riuscita'.mysql_error());



if(mysql_num_rows($queryadm))
{
	$row = mysql_fetch_assoc($queryadm);

	setcookie("tipo_utente", 1, time()+3600);

	header("Location:".$pagina_adm);
}

else

if(mysql_num_rows($queryven))
{
	$row = mysql_fetch_assoc($queryven);

	setcookie("tipo_utente", 2, time()+3600);

	header("Location:".$pagina_ven);
}

else

if(mysql_num_rows($querycom))
{
	$row = mysql_fetch_assoc($querycom);

	setcookie("tipo_utente", 3, time()+3600);

	header("Location:".$pagina_com);
}

else
{
    $pagina_login="Login.php";

	header("Location:".$pagina_login);
}
?>
