<?php
require_once('../../config/db_config.php');
require_once('../../src/src/factuurRegel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $factuur_id = $_POST['factuur_id'];
    $aantal = $_POST['aantal'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];

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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Regel Toevoegen</title>
</head>
<body>
    <h1>Nieuwe Regel Toevoegen</h1>
    <form method="post">
        <input type="hidden" name="factuur_id" value="<?php echo $_POST['factuur_id']; ?>">
        aantal: <input type="number" name="aantal" id="aantal" required><br>
        omschrijving: <input type="text" name="omschrijving" id="omschrijving" required><br>
        prijs: <input type="number" name="prijs" id="prijs" required><br>
        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>
