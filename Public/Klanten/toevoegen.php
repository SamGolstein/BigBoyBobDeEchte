<?php
include ("../../src/src/klanten.php");

if (isset($_POST["saveKlant"])) {
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $woonplaats = $_POST["woonplaats"];
    $email = $_POST["email"];
    $straat = $_POST["straat"];
    $postcode = $_POST["postcode"];
    $telefoonnummer = $_POST["telefoonnummer"];

    $newKlant = new Klanten();
    $newKlant->setVoornaam($voornaam);
    $newKlant->setAchternaam($achternaam);
    $newKlant->setEmail($email);
    $newKlant->setWoonplaats($woonplaats);
    $newKlant->setStraat($straat);
    $newKlant->setPostcode($postcode);
    $newKlant->setTelefoonnummer($telefoonnummer);

    if ($newKlant->saveKlanten()) {
        header("Location: index.php");
    } else {
        $melding = "Klant is niet opgeslagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toevoegen</title>
    <link rel="stylesheet" href="../CSS/css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../style/toevoegen.css">
</head>

<body>
    <main>
        <a href="index.php">Terug</a>
        <div class="menu">
            <h1>Klant toevoegen</h1>
            <form action="#" method="post">
                <div class="inputs">
                    <input type="text" name="voornaam" placeholder="Voornaam"
                        value="<?php if (isset($_POST["saveKlant"])) {
                            echo $voornaam;
                        } ?>" />
                </div>
                <div class="inputs">
                    <input type="text" name="achternaam" placeholder="Achternaam"
                        value="<?php if (isset($_POST["saveKlant"])) {
                            echo $achternaam;
                        } ?>" />
                </div>
                <div class="inputs">
                    <input type="text" name="email" placeholder="Email"
                        value="<?php if (isset($_POST["saveKlant"])) {
                            echo $achternaam;
                        } ?>" />
                </div>
                <div class="inputs">
                    <input type="text" name="woonplaats" placeholder="Woonplaats"
                        value="<?php if (isset($_POST["saveKlant"])) {
                            echo $woonplaats;
                        } ?>" />
                </div>
                <div class="inputs">
                    <input type="text" name="straat" placeholder="Straat"
                        value="<?php if (isset($_POST["saveKlant"])) {
                            echo $straat;
                        } ?>" />
                </div>
                <div class="inputs">
                    <input type="text" name="postcode" placeholder="Postcode"
                        value="<?php if (isset($_POST["saveKlant"])) {
                            echo $postcode;
                        } ?>" />
                </div>
                <div class="inputs">
                    <input type="text" name="telefoonnummer" placeholder="Telefoonnummer"
                        value="<?php if (isset($_POST["saveKlant"])) {
                            echo $telefoonnummer;
                        } ?>" />
                <p class="melding"><?php if (isset($_POST["saveKlant"])) {
                    echo $melding;
                } ?></p>
                <div class="buttons">
                    <div class="button">
                        <input type="submit" name="saveKlant" value="Toevoegen" />
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>