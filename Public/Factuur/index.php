<?php
require_once ('../../config/db_config.php');
require_once ('../../src/src/factuur.php');
require_once ('../../src/src/klanten.php');

if ($_SESSION['gebruikersnaam'] == null) {
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
    <link rel="stylesheet" href="../../style/factuurIndex.css">
</head>

<body>
    <nav class="navBar">
        <img src="../../img/BigBoyBobLogo.png" alt="BigBoyBobLogo">
        <ul>
            <li><a href="../Login/index.php">Home</a></li>
            <li><a href="../Klanten/index.php">Klanten</a></li>
            <li><a href="../Factuur/index.php">facturen</a></li>
        </ul>
        <a href="../Klanten/account.php" class="accountButton">Account</a>
    </nav>

    <div class="container">
        <a href='../Klanten/index.php'>Terug</a>
        <h1>Facturen</h1>
        <table>
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
    </div>
</body>

</html>