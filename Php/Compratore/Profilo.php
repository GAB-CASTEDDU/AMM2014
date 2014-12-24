<!DOCTYPE html>



<?php

setcookie("redirect", null);

if($_COOKIE['tipo_utente']==3)
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
                        <li class="current_page"><a href="#" id="utenti">Profilo</a></li>
                        <li><a href="Carrello.php" id="carrello">Carrello</a></li>
                        <li><a href="Ricerca.php" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <table id="table-content">
                    <tr>
                        <td id="left"></td>

                        <td id="center">
                            <h1 id="h1-utenti">Profilo</h1>

                            <?
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

                            $queryvis = mysql_query("SELECT * FROM utenti WHERE email='".$_COOKIE["utente"]."'") or die("query non riuscita".mysql_error());

                            $row = mysql_fetch_object($queryvis);
                            ?>

                            <h3><?echo"$row->email";?>:</h3>

                            <table>
                                <tr>
                                    <td>
                                        <table id="table-vis">
                                            <tr>
                                                <td><img src="../../Immagini/noprof.png" alt="No image aviable"></td>
                                            </tr>
                                            <tr>
                                                <td>Credito: &nbsp;<?echo"$row->credito";?> &euro;</td>
                                            </tr>
                                            <tr>
                                                <td><a href="../Ricarica.php" id="ricarica">Ricarica</a></td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td>
                                        <table id="table-vis">
                                            <tr>
                                                <td>Nome:</td><td><?echo"$row->nome";?></td>
                                            </tr>
                                            <tr>
                                                <td>Cognome:</td><td><?echo"$row->cognome";?></td>
                                            </tr>
                                            <tr>
                                                <td>Via:</td><td><?echo"$row->via $row->numciv";?></td>
                                            </tr>
                                            <tr>
                                                <td>Citt&agrave;:</td><td><?echo"$row->citta";?></td>
                                            </tr>
                                            <tr>
                                                <td>Tipo account:</td><td><?echo"$row->tipo";?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <br><br><br><br>

                            <h3>Tuoi acquisti:</h3>
                            <?
                            $queryvis2 = mysql_query("SELECT * FROM auto WHERE compratore='".$_COOKIE["utente"]."'") or die("query non riuscita".mysql_error());

                            if(mysql_num_rows($queryvis2)==0)
                            {

                            ?>
                            <br><br><p>Nessun veicolo comprato al momento. Riprova tra poco</p>
                            <?
                            }

                            while($row2 = mysql_fetch_object($queryvis2))
                            {
                            ?>
                                <table>
                                    <tr>
                                        <td>
                                            <table id="table-vis">
                                                <tr>
                                                    <td><img src="../../Immagini/noimg.png" alt="No image aviable"></td>
                                                </tr>
                                                <tr>
                                                    <td>Prezzo: &nbsp;<?echo"$row2->prezzo";?> &euro;</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="../Rimuovi.php" id="cestino">Rimuovi annuncio</a></td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td>
                                            <table id="table-vis">
                                                <tr>
                                                    <td>Marca:</td><td><?echo"$row2->marca";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Modello:</td><td><?echo"$row2->modello";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Colore:</td><td><?echo"$row2->colore";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Anno:</td><td><?echo"$row2->anno";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alimentazione:</td><td><?echo"$row2->alimentazione";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Chilometri:</td><td><?echo"$row2->chilometri";?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                                <br><br><br><br>

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
    $pagina_redirect = "Compratore/Profilo.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
