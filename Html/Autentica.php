<?php

session_start();

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

?>
