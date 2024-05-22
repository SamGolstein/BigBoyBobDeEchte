
<?php
include("../../src/src/klanten.php");

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Cijfers</title>
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
            foreach ($klant as $k)
                {
                    echo "<tr id='tr_foreach'>";
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
    </main>
</body>
</html>








