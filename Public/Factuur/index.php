<?php
require_once('../../config/db_config.php');
require_once('../../src/src/factuur.php');
require_once('../../src/src/factuurRegel.php');

$factuur = new Factuur();

// Example of getting klant_id (you should replace this with your actual logic)
$klant_id = 1; // Replace with actual klant_id

$facturen = $factuur->getAlleFactuur($klant_id); // Pass the klant_id

// Debugging: Check if facturen are fetched
echo "<pre>";
print_r($facturen);
echo "</pre>";

// Hardcoded bedrijfsgegevens
$kvknummer = "12345678";
$bedrijfsnaam = "Mijn Bedrijf BV";
$adres = "Straatnaam 123, 1234 AB, Stad";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturen Overzicht</title>
</head>
<body>
    <h1>Facturen Overzicht</h1>
    <!--  -->
        <?php foreach ($facturen as $factuur): ?>
            <h2>Factuur ID: <?php echo $factuur['factuur_id']; ?></h2>
            <p>Klant ID: <?php echo $factuur['klant_id']; ?></p>
            <p>Datum: <?php echo $factuur['datum']; ?></p>
            <p>Totaal Bedrag: €<?php echo $factuur['totaal_bedrag']; ?></p>
            <p>KVK Nummer: <?php echo $kvknummer; ?></p>
            <p>Bedrijfsnaam: <?php echo $bedrijfsnaam; ?></p>
            <p>Adres: <?php echo $adres; ?></p>
            <h3>Factuur Regels:</h3>
            <ul>
                <?php
                $factuurRegel = new FactuurRegel();
                $regels = $factuurRegel->getRegelsByFactuurnr($factuur['factuur_id']);
            //    
                    foreach ($regels as $regel):
                ?>
                        <li>
                            Aantal: <?php echo $regel['aantal']; ?>,
                            Omschrijving: <?php echo $regel['omschrijving']; ?>,
                            Prijs: €<?php echo $regel['prijs']; ?>
                        </li>
                    <?php endforeach; ?>
                <!--  -->
                    <li>Geen regels beschikbaar.</li>
                <!--  -->
            </ul>
            <form action="toevoegen_regel.php" method="post">
                <input type="hidden" name="factuur_id" value="<?php echo $factuur['factuur_id']; ?>">
                <button type="submit">Regel Toevoegen</button>
            </form>
            <hr>
        <?php endforeach; ?>
    <!--  -->
        <p>Geen facturen beschikbaar.</p>
        <a href="toevoegen_factuur.php">Nieuwe Factuur Toevoegen</a>
    <!--  -->
</body>
</html>
