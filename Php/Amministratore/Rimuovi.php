<?php

if(isset($_GET["rimuoviu"]) && ($_GET["rimuoviu"]!=null))
{
    $idut = $_GET["rimuoviu"];

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

    $queryut = mysql_query("SELECT * FROM utenti WHERE email='".$idut."'") or die('Query non riuscita'.mysql_error());

    if(mysql_num_rows($queryut))
    {
        $query1 = "DELETE FROM utenti WHERE email='".$idut."'";

        $result1 = mysql_query($query1);

        if(!$result1)
        {
            die("Errore nella query: ".mysql_error());

            $pagina_login = "Gestisci.php?rimu=err";

            header("Location:".$pagina_login);
        }

        else
        {
            $pagina_login = "Gestisci.php?rimu=ok";

            header("Location:".$pagina_login);
        }
    }

    else
    {
        $pagina_login = "Gestisci.php?rimu=errpres";

        header("Location:".$pagina_login);
    }
}

else
{
    $pagina_login = "Gestisci.php?rimu=err";

    header("Location:".$pagina_login);
}



if(isset($_GET["rimuovia"]) && ($_GET["rimuovia"]!=0))
{
    $idart = $_GET["rimuovia"];

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

    $querypres = mysql_query("SELECT * FROM auto WHERE id='".$idart."' AND compratore IS NULL") or die('Query non riuscita'.mysql_error());

    if(mysql_num_rows($querypres))
    {
        $query = "DELETE FROM auto WHERE id='".$idart."' AND compratore IS NULL";

        $result = mysql_query($query);

        if(!$result)
        {
            die("Errore nella query: ".mysql_error());

            $pagina_login = "Gestisci.php?rima=err";

            header("Location:".$pagina_login);
        }

        else
        {
            $pagina_login = "Gestisci.php?rima=ok";

            header("Location:".$pagina_login);
        }
    }

    else
    {
        $pagina_login = "Gestisci.php?rima=errpres";

        header("Location:".$pagina_login);
    }
}

else
{
    $pagina_login = "Gestisci.php?rima=err";

    header("Location:".$pagina_login);
}
?>
