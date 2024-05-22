<?php
include("../../src/src/klanten.php");

$facturen = new Facturen();
$factuur = $facturen->getAllFacturen();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Factuur</title>
</head> 
<body>
    <nav>
        <h1>Welkom!</h1>
        <form action="" method="post">
        </form>
    </nav>

    <main>
        <h2>Klanten beheer</h2>
        <table>
            <tr>
                <th>Naam</th>
                <th>Achternaam</th>
            </tr>
            <?php 
           
            ?>
        </table>
        <div class="toevoegen">
            <a href="toevoegen.php">Toevoegen</a>
        </div>
    </main>
</body>
</html>