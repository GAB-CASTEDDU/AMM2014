<?php

if(isset($_GET["rimuovi"]) && ($_GET["rimuovi"]!=0))
{
    $idart = $_GET["rimuovi"];

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

    $querypres = mysql_query("SELECT * FROM auto WHERE id='".$idart."' AND venditore ='".$_COOKIE["utente"]."' AND compratore IS NULL") or die('Query non riuscita'.mysql_error());

    if(mysql_num_rows($querypres))
    {
        $query = "DELETE FROM auto WHERE id='".$idart."' AND venditore ='".$_COOKIE["utente"]."' AND compratore IS NULL";

        $result = mysql_query($query);

        if(!$result)
        {
            die("Errore nella query: ".mysql_error());

            $pagina_login = "Profilo.php?rim=err";

            header("Location:".$pagina_login);
        }

        else
        {
            $pagina_login = "Profilo.php?rim=ok";

            header("Location:".$pagina_login);
        }
    }

    else
    {
        $pagina_login = "Profilo.php?rim=errpres";

        header("Location:".$pagina_login);
    }
}

else
{
    $pagina_login = "Profilo.php?rim=err";

    header("Location:".$pagina_login);
}
?>
