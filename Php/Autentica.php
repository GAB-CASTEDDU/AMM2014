<?php

session_start();

$pagina_redirect = $_COOKIE["redirect"];

setcookie("redirect", $pagina_redirect, time()+300);



$connessione_al_server = mysql_connect("localhost","truduGabriele","beluga874");

if(!$connessione_al_server)
{
	die("Errore: connessione non riuscita".mysql_error());
}



$db_selected = mysql_select_db("amm14_truduGabriele", $connessione_al_server);

if(!$db_selected)
{
	die("Errore: selezione del database errata ".mysql_error());
}



$_SESSION["email"] = $_POST["email"];

$_SESSION["password"] = $_POST["password"];



if(isset($_COOKIE["redirect"]))
{
    $pagina_adm = $_COOKIE["redirect"];
    $pagina_ven = $_COOKIE["redirect"];
    $pagina_com = $_COOKIE["redirect"];
}

else
{
    $pagina_adm = "Amministratore/Home.php";
    $pagina_ven = "Venditore/Home.php";
    $pagina_com = "Compratore/Home.php";
}



$queryadm = mysql_query("SELECT * FROM utenti WHERE email='".$_SESSION["email"]."' AND password ='".$_SESSION["password"]."' AND tipo='amministratore'") or die('Query non riuscita'.mysql_error());

$queryven = mysql_query("SELECT * FROM utenti WHERE email='".$_SESSION["email"]."' AND password ='".$_SESSION["password"]."' AND tipo='venditore'") or die('Query non riuscita'.mysql_error());

$querycom = mysql_query("SELECT * FROM utenti WHERE email='".$_SESSION["email"]."' AND password ='".$_SESSION["password"]."' AND tipo='compratore'") or die('Query non riuscita'.mysql_error());



if(mysql_num_rows($queryadm))
{
	$row = mysql_fetch_array($queryadm);
	$id = mysql_result($queryadm, "email");

	setcookie("tipo_utente", 1);
	setcookie("utente", $id);

	header("Location:".$pagina_adm);
}

else
    if(mysql_num_rows($queryven))
    {
        $row = mysql_fetch_aray($queryven);
        $id = mysql_result($queryven, "email");

        setcookie("tipo_utente", 2);
        setcookie("utente", $id);

        header("Location:".$pagina_ven);
    }

    else
        if(mysql_num_rows($querycom))
        {
            $row = mysql_fetch_array($querycom);
            $id = mysql_result($querycom, "email");

            setcookie("tipo_utente", 3);
            setcookie("utente", $id);

            header("Location:".$pagina_com);
        }

        else
        {
            setcookie("errlogin", 1);

            $pagina_login = "Login.php";

            header("Location:".$pagina_login);
        }
?>
