<?php
require_once('../../config/db_config.php');
require_once('../../src/src/factuur.php'); 
require_once('../../src/src/factuurRegel.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aantal = $_POST['aantal'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];

    
    
    $query = "INSERT INTO factuurregel (aantal, omschrijving, prijs) VALUES (:aantal, :omschrijving, :prijs)";
    $statement = $db->getConnection()->prepare($query);

    
    $statement->bindParam(':aantal', $aantal);
    $statement->bindParam(':omschrijving', $omschrijving);
    $statement->bindParam(':prijs', $prijs);

    
    $statement->execute();

    header("Location: index.php");
    exit();
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
        aantal <input type="number" name="aantal" id="aantal"><br>
        omschrijving <input type="text" name="omschrijving" id="omschrijving"><br>
        prijs <input type="number" name="prijs" id="prijs"><br>
        <button type="submit">Toevoegen</button>
    </form>
</body>

</html>