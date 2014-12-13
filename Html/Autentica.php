<?php

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



$pagina_adm="Amministratore/Home.php";
$pagina_ven="Venditore/Home.html";
$pagina_com="Compratore/Home.html";



$queryadm = mysql_query("SELECT * FROM utenti WHERE email='".$_POST["email"]."' AND password ='".$_POST["password"]."' AND tipo='amministratore'") or DIE('query non riuscita'.mysql_error());

$queryven = mysql_query("SELECT * FROM utenti WHERE email='".$_POST["email"]."' AND password ='".$_POST["password"]."' AND tipo='venditore'") or DIE('query non riuscita'.mysql_error());

$querycom = mysql_query("SELECT * FROM utenti WHERE email='".$_POST["email"]."' AND password ='".$_POST["password"]."' AND tipo='compratore'") or DIE('query non riuscita'.mysql_error());



if(mysql_num_rows($queryadm))
{   
	$row = mysql_fetch_assoc($queryadm); 

	$_SESSION["logged"]=1;  

	header("Location:".$pagina_adm); 
}

else 

if(mysql_num_rows($queryven))
{   
	$row = mysql_fetch_assoc($queryven); 

	$_SESSION["logged"]=2;  

	header("Location:".$pagina_ven); 
}

else 

if(mysql_num_rows($querycom))
{   
	$row = mysql_fetch_assoc($querycom); 

	$_SESSION["logged"]=3;  

	header("Location:".$pagina_com); 
}

else
	header("location:Login.html"); 

?>