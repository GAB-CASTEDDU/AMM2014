<!DOCTYPE html>



<?php

setcookie("redirect", null);

if($_COOKIE['tipo_utente']==2)
{
?>



<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="AMM esami docente" />
        <meta name="description" content="Una pagina per gestire le funzioni dei docenti" />

        <title>Affari a 4 ruote - Progetto AMM 2013-2014</title>

        <link rel="shortcut icon" type="image/x-icon" href="../../Immagini/favicon.ico"/>
        <link rel="Stylesheet" type="text/css" href="../../Css/style.css" media="screen"/>
    </head>



    <body>
        <div id="page">
            <div id="header">
                <div id="logo">
                    <img src="../../Immagini/logo.png" alt="Logo" usemap="#logo_home"/>

                    <map name="logo_home">
                        <area shape="circle" coords="75,75,75" href="Home.php" alt="Home">
                    </map>

                    <p>Progetto di AMM 2013-2014</p>

                    <div id="benvenuto">
                        <span id="login">
                            <a href="../Logout.php">Logout</a>
                        </span>
                    </div>
                </div>

                <div id="menu">
                    <ul>
                        <li><a href="Home.php" id="home">Home</a></li>
                        <li><a href="Profilo.php" id="utenti">Profilo</a></li>
                        <li class="current_page"><a href="#" id="vendi">Vendi</a></li>
                        <li><a href="Ricerca.php" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <table id="table-content">
                    <tr>
                        <td id="left"></td>

                        <td id="center">
                            <h1 id="h1-vendi">Vendi</h1>

                            <?
                            if(isset($_GET["campi"]) && ($_GET["campi"]=="ok"))
                            {
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

                                $email = $_COOKIE["id_utente"];

                                $query = "INSERT INTO auto (marca,modello,colore,anno,alimentazione,prezzo,chilometri,venditore)
                                VALUES (\"".$_POST["marca"]."\",\"".$_POST["modello"]."\",\"".$_POST["colore"]."\",\"".$_POST["anno"]."\",\"".$_POST["alimentazione"]."\",\"".$_POST["prezzo"]."\",\"".$_POST["chilometri"]."\",\"".$email."\")";

                                $result = mysql_query($query);

                                if(!$result)
                                {
                                    die("Errore nella query: ".mysql_error());

                                    $pagina_login = "Vendi.php";

                                    header("Location:".$pagina_login);
                                }

                                else
                                {
                                    $pagina_login = "Vendi.php?agg=ok";

                                    header("Location:".$pagina_login);
                                }
                            }

                            else
                            {
                            ?>

                            <?
                            if(isset($_GET["agg"]) && ($_GET["agg"]=="ok"))
                            {
                            ?>

                            <p>Il tuo annuncio &egrave; stato aggiunto con successo!</p>

                            <?
                            }
                            ?>

                            <p>Inserisci le caretteristiche dell'auto che vuoi mettere in vendita:</p>

                            <form action="Vendi.php?campi=ok" method="post" id="form-login">
                                <table id="table-form">
                                    <tr>
                                        <td>Marca:</td>

                                        <td><input type="text" name="marca" placeholder="Fiat" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Modello:</td>

                                        <td><input type="text" name="modello" placeholder="Duna" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Colore:</td>

                                        <td><input type="text" name="colore" placeholder="Bianco" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Anno:</td>

                                        <td><input type="number" name="anno" min="1930" max="2015" placeholder="1993" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Alimentazione:</td>

                                        <td>
                                            <input type="radio" name="alimentazione" value="benzina" checked/>Benzina
                                            <input type="radio" name="alimentazione" value="diesel"/>Diesel
                                            <input type="radio" name="alimentazione" value="altro"/>Gas
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Prezzo:</td>

                                        <td><input type="number" name="prezzo" min="0" placeholder="3456" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Chilometri:</td>

                                        <td><input type="number" name="chilometri" min="0" placeholder="234567" required/></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Aggiungi" id="tasto-login"/><td>
                                    </tr>
                                </table>
                            </form>

                            <?
                            }
                            ?>

                        </td>

                        <td id="right"></td>
                    </tr>
                </table>
            </div>

            <div id="footer">
                <p>Copyright &copy; 2014 - Affari a 4 ruote. Tutti i diritti riservati.</p>

                <p>
                    <a href="http://validator.w3.org/check/referer">
                        <img style="border:0;width:88px;height:31px" src="../../Immagini/html5.png" alt="HTML Valido!" />
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
    $pagina_login = "../Login.php";
    $pagina_redirect = "Venditore/Vendi.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
