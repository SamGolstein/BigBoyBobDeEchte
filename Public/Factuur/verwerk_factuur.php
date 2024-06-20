<?php
require_once('../../config/db_config.php');
require_once('../../src/src/factuur.php');
require_once('../../src/src/factuurRegel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $klant_id = $_POST['klant_id'];
    $datum = $_POST['datum'];
    $aantal = $_POST['aantal'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];

    // Create a new Factuur
    $factuur = new Factuur($klant_id, $datum);
    if ($factuur->save()) {
        $factuur_id = $factuur->getFactuurId();

        // Create the FactuurRegel
        $factuurRegel = new FactuurRegel();
        $factuurRegel->setFactuurnr($factuur_id);
        $factuurRegel->setAantal($aantal);
        $factuurRegel->setOmschrijving($omschrijving);
        $factuurRegel->setPrijs($prijs);

        if ($factuurRegel->saveRegel()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: Could not create FactuurRegel.";
        }
    } else {
        echo "Error: Could not create Factuur.";
    }
}
?>
