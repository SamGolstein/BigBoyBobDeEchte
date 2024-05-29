<?php
require_once('../../src/src/factuur.php');
require_once('../../src/src/factuurRegel.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klant_id = $_POST['klant_id'];
    $datum = date('Y-m-d');
    $hoeveelheid = $_POST['hoeveelheid'];
    $prijs = $_POST['prijs'];

   
    $factuur = new Factuur($klant_id, $datum);
    if ($factuur->save()) {
  
        $factuurregel = new FactuurRegel($factuur->getFactuurId(), $product_id, $hoeveelheid, $hoeveelheid * $prijs);
        if ($factuurregel->save()) {
        
            $factuur->setTotaalBedrag($factuur->getTotaalBedrag() + $factuurregel->getPrijs());
            $factuur->updateTotaal();
            echo "Factuur  toegevoegd!";
        } else {
            echo "Fout bij het opslaan van de factuurregel.";
        }
    } else {
        echo "Fout bij het opslaan van de factuur.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Facturatiesysteem</title>
</head>
<body>
    <h1>Voeg een nieuwe factuur en factuurregel toe</h1>
    <form method="post" action="">
        Klant ID: <input type="text" name="klant_id" ><br>
        Hoeveelheid: <input type="text" name="hoeveelheid" rquired><br>
        Prijs per stuk: <input type="text" name="prijs"><br>
        <input type="submit" value="Toevoegen">
    </form>
</body>
</html>
