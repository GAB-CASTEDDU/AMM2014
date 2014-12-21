<!DOCTYPE html>



<?php

setcookie("redirect", null);

if(!isset($_COOKIE["tipo_utente"]))
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
                        <area shape="circle" coords="75,75,75" href="#" alt="Home">
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
                        <li class="current_page"><a href="#" id="home">Home</a></li>
                        <li><a href="Chi_siamo.php" id="chi_siamo">Chi siamo</a></li>
                        <li><a href="Istruzioni.php" id="istruzioni">Istruzioni</a></li>
                        <li><a href="Ricerca.php" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <table id="table-content">
                    <tr>
                        <td id="left"></td>

                        <td id="center">
                            <h1 id="h1-home">Home</h1>

                            <?
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

                            $queryvis = mysql_query("SELECT * FROM auto") or DIE('query non riuscita'.mysql_error());



                            //if(mysql_num_rows($queryvis))
                            //{
                                while($row = mysql_fetch_assoc($queryvis))
                                {
                                ?>
                                    <table>
                                        <tr>
                                            <td><b>Marca:</b> <?$row->marca?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Modello:</b> <?$row->modello?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Colore:</b> <?$row->colore?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Anno:</b> <?$row->anno?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Alimentazione:</b> <?$row->alimentazione?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Prezzo:</b> <?$row->prezzo?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Chilometri:</b> <?$row->chilometri?> </td>
                                        </tr>
                                    </table>
                                <?
                                }
                            //}
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
    $pagina_login = "Logout.php";
    $pagina_redirect = "Home.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
