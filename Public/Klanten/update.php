<?php
include ('../../src/src/klanten.php');

//Get kan bij andere accounts.
if(isset($_GET["klantenId"]))
{
    $klant = new Klanten();
    $klanten = $klant->getKlant($_GET['klantenId']);
}

if(isset($_POST["updateKlant"]))
{
    $klant = new Klanten();

    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];

    $klant->setVoornaam($voornaam);
    $klant->setAchternaam($achternaam);

        if($klant->updateKlant($_GET["klantenId"])){
            header("Location: index.php");
        } else {
            $melding = "Klant is niet bewerkt.";
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerken</title>
    <link rel="stylesheet" href="../CSS/css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="menu">
            <h1>Klanten bewerken</h1>
            <form action="#" method="post">
                <div class="inputs">
                <label for="voornaam">Voornaam: &nbsp;</label> <input type="text" name="voornaam" value="<?php echo $klanten[0]['voornaam']; ?>"/>
                </div>
                <div class="inputs">
                <label for="achternaam">Achternaam: &nbsp;</label> <input type="text" name="achternaam" value="<?php echo $klanten[0]['achternaam']; ?>"/>
                </div>
                <p class="melding"><?php if(isset($_POST["updateKlant"])){echo $melding;} ?></p>
                <div class="buttons">
                    <div class="button">
                        <input type="submit" name="updateKlant" value="Bewerk" />
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
