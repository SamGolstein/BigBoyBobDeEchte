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

    if($klanten->updateKlant($_GET['id']))
    {
        header("Location: klantInfo.php?id=" . $_GET['id']);
    } else 
    {
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
</head>
<body>
    <form method="post">
        <?php foreach ($klant as $k): ?>
            <input type="text" name="voornaam" value="<?php echo $k['voornaam']; ?>">
            <input type="text" name="achternaam" value="<?php echo $k['achternaam']; ?>">
            <input type="text" name="straat" value="<?php echo $k['straat']; ?>">
            <input type="text" name="postcode" value="<?php echo $k['postcode']; ?>">
            <input type="text" name="woonplaats" value="<?php echo $k['woonplaats']; ?>">
            <input type="text" name="telefoonnummer" value="<?php echo $k['telefoonnummer']; ?>">
            <input type="text" name="email" value="<?php echo $k['email']; ?>">
            <input type="submit" value="Verander klant" name="veranderKlant">
        <?php endforeach; ?>
    </form>
</body>
</html>