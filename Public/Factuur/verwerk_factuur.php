<?php
require_once('../../config/db_config.php');
require_once('../../src/src/factuur.php');
require_once('../../src/src/factuurRegel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input
    $factuur_id = isset($_POST['factuur_id']) ? intval($_POST['factuur_id']) : null;
    $aantal = isset($_POST['aantal']) ? intval($_POST['aantal']) : null;
    $omschrijving = isset($_POST['omschrijving']) ? htmlspecialchars($_POST['omschrijving']) : null;
    $prijs = isset($_POST['prijs']) ? floatval($_POST['prijs']) : null;
    $klant_id = isset($_POST['klant_id']) ? intval($_POST['klant_id']) : null;
    $datum = isset($_POST['datum']) ? $_POST['datum'] : null;

    // Check for missing required fields
    if (is_null($factuur_id) || is_null($aantal) || is_null($omschrijving) || is_null($prijs) || is_null($klant_id) || is_null($datum)) {
        die('Error: Missing required fields');
    }

    $factuurRegel = new FactuurRegel();
    $factuurRegel->setFactuurnr($factuur_id);
    $factuurRegel->setAantal($aantal);
    $factuurRegel->setOmschrijving($omschrijving);
    $factuurRegel->setPrijs($prijs);

    if ($factuurRegel->saveRegel()) {
        // Update the total amount in the factuur
        $factuur = new Factuur();
        $factuur->setFactuurId($factuur_id);
        $current_total = $factuur->getTotaalBedrag();
        $new_total = $current_total + ($aantal * $prijs);
        $factuur->setTotaalBedrag($new_total);
        $factuur->updateTotaal();

        header("Location: index.php");
        exit();
    } else {
        echo "Error: Could not create FactuurRegel.";
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
    <form action="verwerk_factuur.php" method="post">
        <label for="factuur_id">Factuur ID:</label>
        <input type="number" name="factuur_id" id="factuur_id" required><br>
        <label for="aantal">Aantal:</label>
        <input type="number" name="aantal" id="aantal" required><br>
        <label for="omschrijving">Omschrijving:</label>
        <input type="text" name="omschrijving" id="omschrijving" required><br>
        <label for="prijs">Prijs:</label>
        <input type="number" step="0.01" name="prijs" id="prijs" required><br>
        <label for="klant_id">Klant ID:</label>
        <input type="number" name="klant_id" id="klant_id" required><br>
        <label for="datum">Datum:</label>
        <input type="date" name="datum" id="datum" required><br>
        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>
