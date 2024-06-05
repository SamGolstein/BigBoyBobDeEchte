<?php
require_once ("../src/src/klanten.php");

$klanten = new Klanten();
$klant = $klanten->getAllKlanten();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/BigBoyBobLogo.png">
    <title>Home</title>
</head>

<nav class="navBar">
    <img src="../img/BigBoyBobLogo.png" alt="BigBoyBobLogo">
    <?php
    if (isset($_SESSION['gebruikersnaam'])) {
        echo "<a href='../login/account.php' class='accountButton'>Account</a>";
    } else {
       echo "";
    }
    ?>
</nav>
<body>
    <main>
        <form method="POST">
            <label for="gebruikersnaam">Gebruikersnaam</label>
            <input type="text" name="gebruikersnaam" id="gebruikersnaam">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" name="wachtwoord" id="wachtwoord">
            <input type="submit" value="Inloggen" name="inloggen">
        </form>
    </main>
</body>
<?php
require_once ("../src/src/medewerker.php");
if (isset($_POST['inloggen'])) {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    $medewerker = new Medewerker();
    $medewerker = $medewerker->getMedewerker($gebruikersnaam, $wachtwoord);

    if (count($medewerker) > 0) {
        header('Location: Klanten/index.php');
    } else {
        echo "Gebruikersnaam of wachtwoord is onjuist";
    }
}
?>
</html>