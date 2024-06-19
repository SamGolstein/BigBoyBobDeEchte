<?php
require_once ('../../config/db_config.php');
require_once ('../../src/src/factuur.php');
require_once ('../../src/src/klanten.php');
require_once ('../../src/src/factuurRegel.php');

$factuur = new Factuur();
$factuurRegel = new FactuurRegel();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/bekijken.css">
</head>

<body>
    <nav class="navBar">
        <img src="../../img/BigBoyBobLogo.png" alt="BigBoyBobLogo">
        <ul>
            <li><a href="../Login/index.php">Home</a></li>
            <li><a href="../Klanten/index.php">Klanten</a></li>
            <li><a href="../Factuur/index.php">facturen</a></li>
        </ul>
        <a href="account.php" class="accountButton">Account</a>
    </nav>
    <a href='index.php'>Terug</a>

    <h1>Factuur nummer <?php echo $_GET['id']; ?></h1>

    <table border="1">
        <th>Omschrijving</th>
        <th>Hoeveelheid</th>
        <th>Prijs</th>

        <?php
        $factuurDetails = $factuurRegel->getFactuurRegelById($_GET['id']);
        foreach ($factuurDetails as $factuurDetail) {
            echo "<tr>";
            echo "<td>" . $factuurDetail['omschrijving'] . "</td>";
            echo "<td>" . $factuurDetail['hoeveelheid'] . "</td>";
            echo "<td>" . $factuurDetail['prijs'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <p><?php echo "Totaal bedrag: " . $factuur->getTotaalBedrag($_GET['id'])[0]['totaal_bedrag']; ?></p>
    <form method="POST">
        <input type="text" name="omschrijving" placeholder="Omschrijving">
        <input type="text" name="aantal" placeholder="Hoeveelheid">
        <input type="text" name="prijs" placeholder="Prijs">
        <input type="submit" name="submit" value="Toevoegen">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $factuurRegel->setFactuurnr($_GET['id']);
        $factuurRegel->setOmschrijving($_POST['omschrijving']);
        $factuurRegel->setAantal($_POST['aantal']);
        $factuurRegel->setPrijs($_POST['prijs']);

        $totaal = $_POST['aantal'] * $_POST['prijs'];

        $factuur->updateTotaalBedrag($totaal, $_GET['id']);

        $factuurRegel->saveRegel();
        header("Location: bekijken.php?id=" . $_GET['id']);
    }
    ?>
</body>

</html>