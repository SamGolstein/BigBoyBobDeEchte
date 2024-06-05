<?php
include ("../src/src/klanten.php");

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/BigBoyBobLogo.png">
    <title>Home</title>
</head>

<body>
    <nav class="navBar">
        <img src="../img/BigBoyBobLogo.png" alt="BigBoyBobLogo">
        <ul>
            <li><a href="../Cijfers/index.php">Home</a></li>
            <li><a href="../Klanten/index.php">Klanten</a></li>
            <li><a href="../Factuur/index.php">facturen</a></li>
        </ul>
        <?php
        if (isset($_SESSION['gebruikersnaam'])) {
            echo "<a href='../login/account.php' class='accountButton'>Account</a>";
        } else {
            echo "<a href='../public/login.php' class='accountButton'>Inloggen</a>";
        }
        ?>
    </nav>
    <main>
        
    </main>
</body>

</html>