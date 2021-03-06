<!DOCTYPE html>



<?php

setcookie("redirect", null);

if($_COOKIE['tipo_utente']==1)
{
?>



<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Trudu Gabriele 47801"/>
        <meta name="description" content="Sito di compravendita auto usate"/>

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
                        <area shape="circle" coords="75,75,75" href="#" alt="Home">
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
                        <li class="current_page"><a href="#" id="home">Home</a></li>
                        <li><a href="Utenti.php" id="utenti">Utenti</a></li>
                        <li><a href="Gestisci.php" id="gestisci">Gestisci</a></li>
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
                                die("Errore: connessione non riuscita".mysql_error());
                            }



                            $db_selected = mysql_select_db("amm14_truduGabriele", $connessione_al_server);

                            if(!$db_selected)
                            {
                                die("Errore: selezione del database errata ".mysql_error());
                            }


                            if(isset($_GET["ricerca"]) && ($_GET["ricerca"]=="ok"))
                            {
                            ?>
                                <h3>Risultati:</h3>
                            <?

                                $_SESSION["marca"] = $_POST["marca"];
                                $_SESSION["modello"] = $_POST["modello"];
                                $_SESSION["anno"] = $_POST["anno"];
                                $_SESSION["alimentazione"] = $_POST["alimentazione"];
                                $_SESSION["prezzo"] = $_POST["prezzo"];
                                $_SESSION["chilometri"] = $_POST["chilometri"];

                                $wadd = "WHERE compratore IS NULL";

                                if($_SESSION["marca"] !="")
                                    $wadd .= " AND marca ='".$_SESSION["marca"]."'";
                                if($_SESSION["modello"] !="")
                                    $wadd .= " AND modello ='".$_SESSION["modello"]."'";
                                if($_SESSION["anno"] !="")
                                    $wadd .= " AND anno >='".$_SESSION["anno"]."'";
                                if($_SESSION["alimentazione"] !="")
                                    $wadd .= " AND alimentazione ='".$_SESSION["alimentazione"]."'";
                                if($_SESSION["prezzo"] !="")
                                    $wadd .= " AND prezzo <='".$_SESSION["prezzo"]."'";
                                if($_SESSION["chilometri"] !="")
                                    $wadd .= " AND chilometri <='".$_SESSION["chilometri"]."'";

                                $queryvis = mysql_query("SELECT * FROM auto $wadd") or die("query non riuscita".mysql_error());

                                if(mysql_num_rows($queryvis)==0)
                                {
                                ?>
                                    <br><br><p>Nessun risultato. Clicca <a href="javascript:history.back()">QUI</a> per tornare alla ricerca</p>
                                <?
                                }
                            }

                            else
                            {
                            ?>
                                <h3>In vendita:</h3>
                                <?
                                $queryvis = mysql_query("SELECT * FROM auto WHERE compratore IS NULL") or die("query non riuscita".mysql_error());

                                if(mysql_num_rows($queryvis)==0)
                                {
                                ?>
                                    <br><br><p>Nessun veicolo in vendita al momento. Riprova tra poco</p>
                                <?
                                }
                            }

                            while($row = mysql_fetch_object($queryvis))
                            {
                            ?>
                                <br>

                                <table>
                                    <tr>
                                        <td>
                                            <table id="table-vis">
                                                <tr>
                                                    <td><img src="../../Immagini/noimg.png" alt="No image aviable"></td>
                                                </tr>
                                                <tr>
                                                    <td>Prezzo: &nbsp;<?echo"$row->prezzo";?> &euro;</td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td>
                                            <table id="table-vis">
                                                <tr>
                                                    <td>Marca:</td><td><?echo"$row->marca";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Modello:</td><td><?echo"$row->modello";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Colore:</td><td><?echo"$row->colore";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Anno:</td><td><?echo"$row->anno";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alimentazione:</td><td><?echo"$row->alimentazione";?></td>
                                                </tr>
                                                <tr>
                                                    <td>Chilometri:</td><td><?echo"$row->chilometri";?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                                <br><br><br>
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
    $pagina_redirect = "Amministratore/Home.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
