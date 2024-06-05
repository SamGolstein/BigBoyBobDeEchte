<?php
include ("../../src/src/klanten.php");

$klanten = new Klanten();
$klant = $klanten->getAllKlanten();
$klantdata = [];

if(isset($_POST['zoeken'])){
    if($_POST['search'] == null || $_POST['zoek'] == null)
    {
        echo "Vul een zoekterm in";
    } else 
    {
        $search = $_POST['search'];
        $selected = $_POST['zoek'];  
        
        $klantdata = $klanten->zoekKlant($selected, $search);
        if($klantdata == null)
        {
            echo "Geen klanten gevonden";
        } else {
            $klant = $klantdata;
        }
    }
}
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
</head>

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
        <div class="filterBar">
            <div class="filters">
                <h2>Filters</h2>
            </div>
            <div class="searchBar">
                <form method="post">
                <input type="text" placeholder="Zoek op klanten" name="search">
                <label for="voornaam">Voornaam:</label>
                <input type="radio" name="zoek" value="voornaam">
                <label for="voornaam">Woonplaats:</label>
                <input type="radio" name="zoek" value="woonplaats">
                <input type="submit" name="zoeken" value="Zoeken"></input>
                </form>
            </div>
        </div>
        <div class="customers">
            <table cellspacing="0">
                <tr>
                    <th>Klant Nummer</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Woonplaats</th>
                    <th>Straat</th>
                    <th>Postcode</th>
                    <th>Telefoonnummer</th>
                    <th>Bewerken</th>
                    <th>Verwijderen</th>
                </tr>
                <?php
                foreach ($klant as $k) {
                    echo "<tr class='customer' id='tr_foreach'>";
                    echo "<td>" . $k["klantId"] . "</td>";
                    echo "<td>" . $k["voornaam"] . "</td>";
                    echo "<td>" . $k["achternaam"] . "</td>";
                    echo "<td>" . $k["email"] . "</td>";
                    echo "<td>" . $k["woonplaats"] . "</td>";
                    echo "<td>" . $k["straat"] . "</td>";
                    echo "<td>" . $k["postcode"] . "</td>";
                    echo "<td>" . $k["telefoonnummer"] . "</td>";
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