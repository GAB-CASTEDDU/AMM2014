<?php

setcookie("redirect", null);

if($_COOKIE['tipo_utente']==3)
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

    $queryvis = mysql_query("SELECT * FROM carrello INNER JOIN auto WHERE carrello.id = auto.id AND carrello.compratore ='".$_COOKIE["utente"]."'") or die("query non riuscita".mysql_error());

    while($row = mysql_fetch_object($queryvis))
    {
        $querycom = "UPDATE utenti SET credito = '".$credito."' - '".$row->prezzo."' WHERE email='".$row->compratore."'";

        $queryven = "UPDATE utenti SET credito = '".$credito."' + '".$row->prezzo."' WHERE email='".$row->venditore."'";

        $queryaut = "UPDATE auto SET compratore = '".$row->compratore."' WHERE compratore ='".$_COOKIE["utente"]."'";

        $querycar = "DELETE FROM carrello WHERE carrello.id = auto.id AND compratore ='".$_COOKIE["utente"]."'";




    }


}

else
{
    $pagina_login = "../Login.php";
    $pagina_redirect = "Compratore/Carrello.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
