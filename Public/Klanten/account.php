<?php
require_once('../../src/src/medewerker.php');
$medewerker = new Medewerker();

if(isset($_POST['veranderen'])){
    $nieuweGebruikersNaam = $_POST['gebruikersnaam'];

    $medewerker->setGebruikersnaam($nieuweGebruikersNaam);
    $medewerker->updateGebruikersnaam();
}

if(isset($_POST['uitloggen'])){
    $_SESSION['gebruikersnaam'] = null;
    session_destroy();
    header('Location: ../Login/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/account.css">
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
    <form method="POST">
        <p>Huidige gebruikersnaam: <?php echo $_SESSION['gebruikersnaam']; ?></p>
        <input type="text" name="gebruikersnaam" value="<?php echo $_SESSION['gebruikersnaam']; ?>">
        <input type="submit" value="verander" name="veranderen">
        <input type="submit" value="Uitloggen" name="uitloggen">
    </form>
    </div>
</body>
</html>