<!DOCTYPE html>



<?php

if(!isset($_COOKIE['tipo_utente']))
{
?>



<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="AMM esami docente" />
        <meta name="description" content="Una pagina per gestire le funzioni dei docenti" />

        <title>Affari a 4 ruote - Progetto AMM 2013-2014</title>

        <link rel="shortcut icon" type="image/x-icon" href="../Immagini/favicon.ico"/>
        <link rel="Stylesheet" type="text/css" href="../Css/style.css" media="screen"/>
    </head>



    <body>
        <div id="page">
            <div id="header">
                <div id="logo">
		    <img src="../Immagini/logo.png" alt="Logo" usemap="#logo_home"/>

		    <map name="logo_home">
			<area shape="circle" coords="75,75,75" href="Home.php" alt="Home">
		    </map>

		    <p>Progetto di AMM 2013-2014</p>

		    <div id="benvenuto">
			<span id="login">
			    <a href="Login.php">Login</a>
			</span>
		    </div>
                </div>

                <div id="menu">
                    <ul>
                        <li><a href="Home.php" id="home">Home</a></li>
			<li><a href="Chi_siamo.php" id="chi_siamo">Chi siamo</a></li>
                        <li class="current_page"><a href="#" id="istruzioni">Istruzioni</a></li>
                        <li><a href="Ricerca.php" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

	    <div id="content">
		<table id="table-content">
		    <tr>
			<td id="left"></td>

			<td id="center">
				<h1 id="h1-istruzioni">Istruzioni</h1>

                		<p>Benvenuto in A4R! Nell'applicazione sono gi&agrave; registrati 3 utenti:</p>

               			<ol>
                    		    <li>COMPRATORE</li>

                   		    <ul>
                        		<li>Username: compratore@gmail.com</li>
                       			<li>Password: compratore</li>
                    		    </ul>

                    		    <li>VENDITORE</li>

                    		    <ul>
                        		<li>Username: venditore@gmail.com</li>
                        		<li>Password: venditore</li>
                    		    </ul>

                    		    <li>AMMINISTRATORE</li>

                    		    <ul>
                        		<li>Username: amministratore@gmail.com</li>
                        		<li>Password: amministratore</li>
                    		    </ul>
                		</ol>
			</td>

			<td id="right"></td>
		    </tr>
		</table>

            </div>


            <div id="footer">
                <p>Copyright &copy; 2014 - Affari a 4 ruote. Tutti i diritti riservati.</p>

                <p>
                    <a href="http://validator.w3.org/check/referer">
                    <img style="border:0;width:88px;height:31px" src="../Immagini/html5.png" alt="HTML Valido!" />
                    </a>

                    <a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valido!" />
                    </a>
                </p>

            </div>
        </div>
    </body>
</html>



<?
}

else
{
    $pagina_login="Logout.php";

	header("Location:".$pagina_login);
}
?>
