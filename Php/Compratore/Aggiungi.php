<?php

if(isset($_GET["aggiungi"]) && ($_GET["aggiungi"]!=0))
{
    $idart = $_GET["aggiungi"];

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

    $querypres = mysql_query("SELECT * FROM carrello WHERE id='".$idart."' AND incar ='".$_COOKIE["utente"]."'") or die('Query non riuscita'.mysql_error());

    if(!mysql_num_rows($querypres))
    {
        $query = "INSERT INTO carrello (id,incar)
        VALUES (\"".$idart."\",\"".$_COOKIE["utente"]."\")";

        $result = mysql_query($query);

        if(!$result)
        {
            die("Errore nella query: ".mysql_error());

            $pagina_login = "Home.php?agg=err";

            header("Location:".$pagina_login);
        }

        else
        {
            $pagina_login = "Home.php?agg=ok";

            header("Location:".$pagina_login);
        }
    }

    else
    {
        $pagina_login = "Home.php?agg=errpres";

        header("Location:".$pagina_login);
    }
}

else
{
    $pagina_login = "Home.php?agg=err";

    header("Location:".$pagina_login);
}
?>
