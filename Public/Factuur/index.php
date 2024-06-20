<?php
require_once('../../config/db_config.php');
require_once('../../src/src/factuur.php'); 
require_once('../../src/src/klanten.php');

if($_SESSION['gebruikersnaam'] == null)
{
    header('Location: ../Login/index.php');
}

$factuur = new Factuur();
$alleFacturen = $factuur->getAllFacturen();

$klant = new Klanten();

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
        <th>Factuur nummer</th>
        <th>Klant naam</th>
    <?php
    foreach ($alleFacturen as $factuur) {
        echo "<tr>";
        echo "<td> <a href='bekijken.php?id=" . $factuur['factuur_id'] . "'>" . $factuur['factuur_id'] . "</td></a>";        
        $klantNaam = $klant->getKlant($factuur['klant_id']);
        
        echo "<td>" . $klantNaam[0]['voornaam'] . "</td>";
        echo "</tr>";
    }
    ?>
    </table>

</body>
</html>
