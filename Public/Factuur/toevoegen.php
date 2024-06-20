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

    // Create a new Factuur if needed
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Factuur Toevoegen</title>
</head>

<body>
    <h1>Nieuwe Factuur Toevoegen</h1>
    <form method="post">
        klant_id: <input type="number" name="klant_id" id="klant_id" required><br>
        datum: <input type="date" name="datum" id="datum" required><br>
        aantal: <input type="number" name="aantal" id="aantal" required><br>
        omschrijving: <input type="text" name="omschrijving" id="omschrijving" required><br>
        prijs: <input type="number" name="prijs" id="prijs" required><br>
        <button type="submit">Toevoegen</button>
    </form>
</body>

</html>
