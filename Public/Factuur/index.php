<?php

require_once('../../config/db_config.php');
require_once('../../src/src/factuur.php'); 
require_once('../../src/src/factuurRegel.php'); 


$db = new Database();


if (!$db->testVerbinding()) {
    die("Database connection failed.");
}

$factuurRegel = new FactuurRegel();
$factuurReg = $factuurRegel->getFactuurRegel();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturen</title>
    <link rel="stylesheet" href="../../style/index.css">
</head>
<body>
    <h1>Facturen</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Factuur Nr</th>
                <th>Klant Id</th>
                <th>Datum</th>
                <th>Totaal Bedrag</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
        <?php
                foreach ($factuurReg as $f) {
                    echo "<tr class='customer' id='tr_foreach'>";
                    echo "<td>" . $f["id"] . "</td>";
                    echo "<td>" . $f["aantal"] . "</td>";
                    echo "<td>" . $f["prijs"] . "</td>";
                    echo "<td>" . $f["omschrijving"] . "</td>";
                    echo "<td><a href=update.php?klantenId=" . $f['id'] . ">Bewerken</a></td>";
                    echo "<td><a href=delete.php?klantenId=" . $f['id'] . ">Verwijderen</a></td>";
                    echo "</tr>";
                }
                ?>
        </tbody>
    </table>
    <br>
    <a href="toevoegen.php">Toevoegen</a>

</body>
</html>
