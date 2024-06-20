<?php
require_once ('../../config/db_config.php');
require_once ('../../src/src/factuur.php');
require_once ('../../src/src/klanten.php');
require_once ('../../src/src/factuurRegel.php');

$factuur = new Factuur();
$factuurRegel = new FactuurRegel();
$klant = new Klanten();

$klantId = $factuur->getKlantId($_GET['id']);
$klantInfo = $klant->getKlant($klantId[0]['klant_id']);
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
        <a href="../Klanten/account.php" class="accountButton">Account</a>
    </nav>
    <a href='index.php'>Terug</a>

    <h1>Factuur nummer <?php echo $_GET['id']; ?></h1>
    <table border="1">
        <th>Omschrijving</th>
        <th>Uren</th>
        <th>Prijs</th>

        <?php
        $factuurDetails = $factuurRegel->getFactuurRegelById($_GET['id']);
        foreach ($factuurDetails as $factuurDetail) {
            echo "<tr>";
            echo "<td>" . $factuurDetail['omschrijving'] . "</td>";
            echo "<td>" . $factuurDetail['uren'] . "</td>";
            $formattedPrice = number_format($factuurDetail['prijs'], 2, ',', '.');
            echo "<td>€" . $formattedPrice . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <p><?php echo "Totaal bedrag: " . $factuur->getTotaalBedrag($_GET['id'])[0]['totaal_bedrag']; ?></p>
    <form method="POST">
        <input type="text" name="omschrijving" placeholder="Omschrijving">
        <input type="text" name="aantal" placeholder="Uren">
        <input type="text" name="prijs" placeholder="Prijs">
        <input type="submit" name="submit" value="Toevoegen">
    </form>
    <button id="button">Maak factuur</button>
    <div class="factuur" id="maakPDF">
        <div class="factuurLogo">
            <img src="../../img/BigBoyBobLogo.png" alt="BigBoyBobLogo">
            <div class="bedrijfsInfo">
                <p>BigBoyBob</p>
                <p>J.F. Kennedylaan 49</p>
                <p>7001 EA Doetinchem</p>
                <p>KvK: 12345678</p>
            </div>
        </div>
        <div class="klantInfo">
            <?php
            foreach ($klantInfo as $klant) {
                echo "<p>" . $klant['voornaam'] . " " . $klant['achternaam'] . "</p>";
                echo "<p>" . $klant['straat'] . "</p>";
                echo "<p>" . $klant['postcode'] . " " . $klant['woonplaats'] . "</p>";
            }
            ?>
        </div>
        <div class="factuurInfo">
            <h2>FACTUUR</h2>
            <table cellspacing="0">
                <th>Uren</th>
                <th>Omschrijving</th>
                <th>Bedrag</th>
                <th>Btw</th>

                <?php
                $factuurDetails = $factuurRegel->getFactuurRegelById($_GET['id']);
                foreach ($factuurDetails as $factuurDetail) {
                    echo "<tr>";
                    echo "<td>" . $factuurDetail['uren'] . "</td>";
                    echo "<td>" . $factuurDetail['omschrijving'] . "</td>";
                    $formattedPrice = number_format($factuurDetail['prijs'], 2, ',', '.');
                    echo "<td>€" . $formattedPrice . "</td>";
                    echo "<td>21%</td>";
                    echo "</tr>";
                }
                ?>
                <td style="border-bottom: 0px"></td>
                <td>Totaal exclusief BTW</td>
                <td><?php echo "€" . number_format($factuur->getTotaalBedrag($_GET['id'])[0]['totaal_bedrag'], 2, ',', '.'); ?>
                </td>
                <tr></tr>
                <td style="border-bottom: 0px"></td>
                <td>BTW(21%)</td>
                <td><?php echo "€" . number_format($factuur->getTotaalBedrag($_GET['id'])[0]['totaal_bedrag'] * 0.21, 2, ',', '.'); ?>
                </td>
                <tr></tr>
                <td style="border-bottom: 0px"></td>
                <td style="font-weight: bold; border-bottom: none">Totaal inclusief BTW</td>
                <td style="font-weight: bold; border-bottom: none">
                    <?php echo "€" . number_format($factuur->getTotaalBedrag($_GET['id'])[0]['totaal_bedrag'] * 1.21, 2, ',', '.'); ?>
                </td>
            </table>
        </div>
        <p style="margin-top: 50px">Gelieve binnen 14 dagen te betalen op NL28ABNA000000000000</p>
    </div>
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
<script>
    window.document.onload = function () {
        mywindow.document.write('<link rel="stylesheet" href="../../style/bekijken.css">');
    }
    let button = document.getElementById("button");
    let maakpdf = document.getElementById("maakPDF");

    button.addEventListener("click", function () {
        let mywindow = window.open("", "SAVE", "height=400,width=600");

        mywindow.document.write('<html><head><title>Factuur</title>');
        mywindow.document.write('<link rel="stylesheet" href="../../style/bekijken.css">');
        mywindow.document.write('</head><body>');
        mywindow.document.write('<style>.factuur {display: flex}</style>');
        mywindow.document.write(maakpdf.outerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close();
        mywindow.focus();

        mywindow.print();
        mywindow.onunload = function () {
            window.location.reload();
        };
        mywindow.close();

        return true;
    });
</script>

</html>