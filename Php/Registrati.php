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

        <script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>
        <script type="text/javascript">
            $(document).ready( function()
                                {
                                    $("#email").keyup(function()
                                                        {
                                                            var email = this.id;

                                                            $.ajax(
                                                            {
                                                                type: "POST",
                                                                url: "Checkemail.php",
                                                                data: email+"="+this.value,
                                                                success: function(response)
                                                                            {
                                                                                if(response == '0')
                                                                                {
                                                                                    $("#check_email").html('<img src="../Immagini/rimuovi.png">Disponibile ');
                                                                                }

                                                                                else
                                                                                {
                                                                                    $("#check_email").html('<img src="../Immagini/rimuovi.png">Non disponibile ');
                                                                                    $("#email").val("");
                                                                                }
                                                                            }
                                                            });
                                                        });
                                });


            /*$(document).ready( function()
                                {
                                    $("#email").keyup( function()
                                                        {
                                                            var email = this.id;
                                                            $.ajax({ type: "POST",
                                                            url: "Checkemail.php",
                                                            data: email+"="+this.value,
                                                            success: function(response)
                                                                        {

                                                                            if(response == '0')
                                                                            {
                                                                                $("#check_email").html('<img src="../Immagini/rimuovi.png">Disponibile ');
                                                                            }
                                                                            else
                                                                            {
                                                                                $("#check_email").html('<img src="../Immagini/rimuovi.png">Non disponibile ');
                                                                                $("#email").val("");
                                                                            }
                                                                        }
                                                                    });
                                                        });
                                });*/
        </script>
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
                            <h1 id="h1-registrati">Registrati</h1>

                            <?
                            if(isset($_GET["campi"]) && ($_GET["campi"]=="ok"))
                            {
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

                                $query = "INSERT INTO utenti (nome,cognome,citta,via,numciv,tipo,email,password)
                                        VALUES (\"".$_POST["nome"]."\",\"".$_POST["cognome"]."\",\"".$_POST["citta"]."\",\"".$_POST["via"]."\",\"".$_POST["numciv"]."\",\"".$_POST["tipo"]."\",\"".$_POST["email"]."\",\"".$_POST["password"]."\")";

                                $result = mysql_query($query);

                                mysqli_close($connessione_al_server);

                                if(!$result)
                                {
                                    die("Errore nella query: ".mysql_error());

                                    $pagina_login = "Registrati.php";

                                    header("Location:".$pagina_login);
                                }

                                else
                                {
                                    $pagina_login = "Login.php";

                                    header("Location:".$pagina_login);
                                }
                            }

                            else
                            {
                            ?>

                            <p>Inserisci i tuoi dati e registrati a Affari a 4 ruote:</p>

                            <form action="Registrati.php?campi=ok" method="post" id="form-login">
                                <table id="table-form">
                                    <tr>
                                        <td>Nome:</td>

                                        <td><input type="text" name="nome" placeholder="Nome" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Cognome:</td>

                                        <td><input type="text" name="cognome" placeholder="Cognome" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Citt&agrave;:</td>

                                        <td><input type="text" name="citta" placeholder="Citta'" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Via:</td>

                                        <td><input type="text" name="via" placeholder="Via" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Numero civ.:</td>

                                        <td><input type="number" name="numciv" min="0" required/></td>
                                    </tr>

                                    <tr>
                                        <td>Tipo account:</td>

                                        <td>
                                            <input type="radio" name="tipo" value="compratore" checked/>Compratore
                                            <input type="radio" name="tipo" value="Diesel"/>Venditore
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>E-mail:</td>

                                        <td>
                                            <input id="email" type="text" name="email" placeholder="mail@a4r.it" required/>
                                            <span id="check_email"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Password:</td>

                                        <td><input type="password" name="password" placeholder="Password" required/></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Registrati" id="tasto-login"/><td>
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
    $pagina_redirect = "Ricerca.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
