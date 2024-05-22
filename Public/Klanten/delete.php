<?php
include ('../../src/src/klanten.php');

//get kan bij andere accounts!
if(isset($_GET['klantenId']))
{
    $klant = new Klanten();
    $klanten = $klant->deleteKlant($_GET['klantenId']);

    if($klanten)
    {
        header("Location: index.php");
    }
        else 
    {
        echo "Klant is niet verwijderd";
    }
}