<?php
include '../../src/src/klanten.php';
$klanten = new Klanten();
$klant = $klanten->getKlant($_GET['id']);

if (isset($_POST['veranderKlant'])) {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $straat = $_POST['straat'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $email = $_POST['email'];

    $klanten->setVoornaam($voornaam);
    $klanten->setAchternaam($achternaam);
    $klanten->setStraat($straat);
    $klanten->setPostcode($postcode);
    $klanten->setWoonplaats($woonplaats);
    $klanten->setTelefoonnummer($telefoonnummer);
    $klanten->setEmail($email);

    if ($klanten->updateKlant($_GET['id'])) {
        header("Location: klantInfo.php?id=" . $_GET['id']);
    } else {
        echo "Er is iets fout gegaan";
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/veranderKlant.css">
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
    <div class="container">
        <a href="index.php">Terug</a>
        <form method="post">
            <?php foreach ($klant as $k): ?>
                <label for="voornaam">Voornaam:</label>
                <input type="text" name="voornaam" value="<?php echo $k['voornaam']; ?>"><br>
                <label for="achternaam">Achternaam:</label>
                <input type="text" name="achternaam" value="<?php echo $k['achternaam']; ?>"><br>
                <label for="straat">Straat:</label>
                <input type="text" name="straat" value="<?php echo $k['straat']; ?>"><br>
                <label for="postcode">Postcode:</label>
                <input type="text" name="postcode" value="<?php echo $k['postcode']; ?>"><br>
                <label for="woonplaats">Woonplaats:</label>
                <input type="text" name="woonplaats" value="<?php echo $k['woonplaats']; ?>"><br>
                <label for="telefoonnummer">Telefoonnummer:</label>
                <input type="text" name="telefoonnummer" value="<?php echo $k['telefoonnummer']; ?>"><br>
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $k['email']; ?>"><br>
                <input type="submit" value="Verander klant" name="veranderKlant">
            <?php endforeach; ?>
        </form>
    </div>
</body>

</html>