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




$queryadm = mysql_query("SELECT * FROM users WHERE email='".$_POST["email"]."' AND password ='".$_POST["password"]."' AND ruolo='amministratore'") or DIE('query non riuscita'.mysql_error());

$queryven = mysql_query("SELECT * FROM users WHERE email='".$_POST["email"]."' AND password ='".$_POST["password"]."' AND ruolo='venditore'") or DIE('query non riuscita'.mysql_error());

$querycom = mysql_query("SELECT * FROM users WHERE email='".$_POST["email"]."' AND password ='".$_POST["password"]."' AND ruolo='compratore'") or DIE('query non riuscita'.mysql_error());



if(mysql_num_rows($queryadm))
{   
	$row = mysql_fetch_assoc($queryadm); 

	$_SESSION["logged"]=true;  

	header("location:Amministratore/Home.html"); 
}

else 

if(mysql_num_rows($queryven))
{   
	$row = mysql_fetch_assoc($queryven); 

	$_SESSION["logged"]=true;  

	header("location:Venditore/Home.html"); 
}

else 

if(mysql_num_rows($querycom))
{   
	$row = mysql_fetch_assoc($querycom); 

	$_SESSION["logged"]=true;  

	header("location:Compratore/Home.html"); 
}

else

header("location:login.html"); 






/*
$utenti[0]["email"]="compratore@gmail.com";
$utenti[0]["password"]="compratore";
$utenti[1]["email"]="venditore@gmail.com";
$utenti[1]["password"]="venditore";
$utenti[2]["email"]="amministratore@gmail.com";
$utenti[2]["password"]="amministratore";

$pagina_comp="Compratore/Home.html";
$pagina_vend="Venditore/Home.html";
$pagina_admi="Amministratore/Home.html";

$isLogged=false;
$whoUsers=0;


if(isset($_POST['email']) && isset($_POST['password']))
{
	for($i=0;$i<count($utenti);$i++)
	{
		if( $_POST['email']==$utenti[$i]["email"] && $_POST['password']==$utenti[$i]["password"] )
		 {
 			$isLogged=true;	
			$whoUsers=$i+1;
		 }
	}

	if($whoUsers==1)
	{
 		$_SESSION['isLogged']="true";
 		header("Location:".$pagina_comp);
	}

	else
		if($whoUsers==2)
		{
 			$_SESSION['isLogged']="true";
 			header("Location:".$pagina_vend);
		}
		
			else
				if($whoUsers==3)
				{
 					$_SESSION['isLogged']="true";
 					header("Location:".$pagina_admi);
				}

				else
				{
					header("Location:Login.html");
				}
}
*/

?>
