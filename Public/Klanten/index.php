<?php
include ("../../src/src/klanten.php");

$klanten = new Klanten();
$klant = $klanten->getAllKlanten();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Cijfers</title>
<<<<<<<<< Temporary merge branch 1
</head> 
<body>
    <nav>
        <h1>Welkom!</h1>
        <form action="" method="post">
        </form>
    </nav>
=========
</head>
>>>>>>>>> Temporary merge branch 2

<body>
    <nav class="navBar">
        <img src="../../img/BigBoyBobLogo.png" alt="BigBoyBobLogo">
        <ul>
            <li><a href="../Cijfers/index.php">Home</a></li>
            <li><a href="../Klanten/index.php">Klanten</a></li>
            <li><a href="../Factuur/index.php">facturen</a></li>
        </ul>
        <a href="" class="accountButton">Account</a>
    </nav>
    <main>
        <div class="filterBar"></div>
        <div class="customers">
            <table>
                <tr>
                    <th>Naam</th>
                    <th>Achternaam</th>
                </tr>
                <?php
                foreach ($klant as $k) {
                    echo "<tr class='customer' id='tr_foreach'>";
                    echo "<td>" . $k["voornaam"] . "</td>";
                    echo "<td>" . $k["achternaam"] . "</td>";
                    echo "<td><a href=update.php?klantenId=" . $k['klantId'] . ">Bewerken</a></td>";
                    echo "<td><a href=delete.php?klantenId=" . $k['klantId'] . ">Verwijderen</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <div class="toevoegen">
                <a href="toevoegen.php">Toevoegen</a>
            </div>
        </div>
    </main>
</body>

</html>