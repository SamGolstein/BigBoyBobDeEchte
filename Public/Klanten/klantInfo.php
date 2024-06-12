<!DOCTYPE html>
<html lang="en">

<?php
include '../../src/src/klanten.php';
include '../../src/src/factuur.php';

$klant = new Klanten();
$factuur = new Factuur();

$klantInfo = $klant->getKlant($_GET['id']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/klantInfo.css">
</head>

<body>
    <nav class="navBar">
        <img src="../../img/BigBoyBobLogo.png" alt="BigBoyBobLogo">
        <ul>
            <li><a href="../Login/index.php">Home</a></li>
            <li><a href="../Klanten/index.php">Klanten</a></li>
            <li><a href="../Factuur/index.php">facturen</a></li>
        </ul>
        <a href="" class="accountButton">Account</a>
    </nav>

    <div class="container">
        <?php
        foreach ($klantInfo as $klant) {
            ?>
            <div class="klantInfo">
                <h2>Klant info</h2>
                <p>Voornaam: <?php echo $klant['voornaam']; ?></p>
                <p>Achternaam: <?php echo $klant['achternaam']; ?></p>
                <p>Straat: <?php echo $klant['straat']; ?></p>
                <p>Postcode: <?php echo $klant['postcode']; ?></p>
                <p>Woonplaats: <?php echo $klant['woonplaats']; ?></p>
                <p>Telefoonnummer: <?php echo $klant['telefoonnummer']; ?></p>
                <p>Email: <?php echo $klant['email']; ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>