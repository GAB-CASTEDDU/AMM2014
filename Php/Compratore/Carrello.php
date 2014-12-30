<!DOCTYPE html>



<?php

setcookie("redirect", null);

if($_COOKIE['tipo_utente']==3)
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
                        <li class="current_page"><a href="#" id="carrello">Carrello</a></li>
                        <li><a href="Ricerca.php" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <table id="table-content">
                    <tr>
                        <td id="left"></td>

                        <td id="center">
                            <h1 id="h1-carrello">Carrello</h1>

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

                            $queryvis = mysql_query("SELECT * FROM carrello INNER JOIN auto WHERE carrello.id = auto.id AND carrello.compratore ='".$_COOKIE["utente"]."'") or die("query non riuscita".mysql_error());



                            if(isset($_GET["rimuovi"]) && ($_GET["rimuovi"]!=0))
                            {
                                $idart = $_GET["rimuovi"];

                                $querypres = mysql_query("SELECT * FROM carrello WHERE id='".$idart."' AND compratore ='".$_COOKIE["utente"]."'") or die('Query non riuscita'.mysql_error());

                                if(mysql_num_rows($querypres))
                                {
                                    $query = "DELETE FROM carrello WHERE id='".$idart."' AND compratore ='".$_COOKIE["utente"]."'";

                                    $result = mysql_query($query);

                                    if(!$result)
                                    {
                                        die("Errore nella query: ".mysql_error());

                                        $pagina_login = "Carrello.php?rim=err";

                                        header("Location:".$pagina_login);
                                    }

                                    else
                                    {
                                        $pagina_login = "Carrello.php?rim=ok";

                                        header("Location:".$pagina_login);
                                    }
                                }

                                else
                                {
                                    $pagina_login = "Carrello.php?rim=errpres";

                                    header("Location:".$pagina_login);
                                }
                            }
                            ?>

                            <h3>Aggiunti al carrello:</h3>

                            <?

                            if(isset($_GET["rim"]) && ($_GET["rim"]=="ok"))
                            {
                            ?>

                            <p><font color="32CD32">Annuncio rimosso dall carrello!</font></p>

                            <?
                            }

                            else
                            {
                                if(isset($_GET["rim"]) && ($_GET["rim"]=="err"))
                                {
                                ?>

                                <p><font color="B20000">Errore! Annuncio non rimosso correttamente.</font></p>

                                <?
                                }

                                else
                                {
                                    if(isset($_GET["rim"]) && ($_GET["rim"]=="errpres"))
                                    {
                                    ?>

                                    <p><font color="B20000">Errore! Annuncio non presente.</font></p>

                                    <?
                                    }
                                }
                            }

                            $costo = 0;

                            if(mysql_num_rows($queryvis)==0)
                            {

                            ?>
                            <br><br><p>Nessun veicolo aggiunto al carrello.</p>
                            <?
                            }

                            else
                            {
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
                                                        <td>Prezzo: &nbsp;<?$costo += $row->prezzo; echo"$row->prezzo";?> &euro;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="Carrello.php?rimuovi=<?echo $row->id?>" id="cestino">Rimuovi dal carrello</a></td>
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

                                $querycost = mysql_query("SELECT * FROM utenti WHERE email ='".$_COOKIE["utente"]."'") or die('Query non riuscita'.mysql_error());

                                $rowcost = mysql_fetch_object($querycost)

                                ?>

                                <form action="Acquista.php" method="post" id="form-login">
                                    <table id="table-form">
                                        <tr>
                                            <td>Credito: <?echo"$rowcost->credito";?> &euro;</td>
                                            <td>Costo: <?echo"$costo";?> &euro;</td>
                                            <?
                                            if(($rowcost->credito) < ($costo))
                                            {
                                            ?>
                                                <td><font color="B20000">Credito insufficiente</font></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><br><a href="Ricarica.php">RICARICA</a><td>
                                        </tr>
                                            <?
                                            }

                                            else
                                            {
                                            ?>
                                                <td><font color="32CD32">Credito sufficiente</font></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><input type="submit" value="Conferma" id="tasto-login"/><td>
                                        </tr>
                                            <?
                                            }
                                            ?>
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
    $pagina_redirect = "Compratore/Carrello.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
