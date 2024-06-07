<?php
include ("../../src/src/klanten.php");

$klanten = new Klanten();
$klant = $klanten->getAllKlanten();
$klantdata = [];

if (isset($_POST['zoeken'])) {
    $search = $_POST['search'];
    $selected = $_POST['zoek'];
    if ($_POST['zoek'] == "alles") {
        $klantdata = $klanten->zoekKlant($selected, $search);
    } else if ($_POST['search'] == null || !isset($_POST['zoek'])) {
        echo "Vul een zoekterm in";
    } else {

        $klantdata = $klanten->zoekKlant($selected, $search);
        if ($klantdata == null) {
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
    <link rel="stylesheet" href="../../style/klanten.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="../jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('tr.customer').hover(
                function () {
                    $(this).find('#onlyHover').css("display", "table-cell");
                    $(this).css("box-shadow", "0 4px 8px rgba(0, 0, 0, 0.2)");
                    $('th').css("display", "table-cell");
                },
                function () {
                    $(this).find('#onlyHover').css("display", "none");
                    $(this).css("box-shadow", "none");
                    $('th#onlyHover').css("display", "none");
                }
            );

            $(".customer").click(function () {
                var id = $(this).find("td:first").text();
                window.location.href = "klant.php?id=" + id;
            });
        });
    </script>
    <title>Cijfers</title>
</head>

<body>
    <nav class="navBar">
        <img src="../../img/BigBoyBobLogo.png" alt="BigBoyBobLogo">
        <ul>
            <li><a href="../Login/index.php">Home</a></li>
            <li><a href="../Klanten/index.php">Klanten</a></li>
            <li><a href="../Factuur/index.php">facturen</a></li>
        </ul>
        <a href="" class="accountButton">Account</a>
    </nav>
    <main>
        <div class="filterBar">
                <h2>Filters</h2>
            <div class="searchBar">
                <form method="POST">
                    <input type="text" placeholder="Zoek op klanten" id="search" name="search">
                    </input>
                    <select name="zoek" id="filters">
                        <option value="alles">Alles</option>
                        <option value="voornaam">Voornaam</option>
                        <option value="woonplaats">Woonplaats</option>
                    </select>
                    <input type="submit" name="zoeken" value="Zoeken" id="zoekButton"></input>
                </form>
            </div>
        </div>
        <div class="customers">
            <table cellspacing="0">
                <tr>
                    <th>Klant Nummer</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th id="onlyHover">Email</th>
                    <th>Woonplaats</th>
                    <th id="onlyHover">Straat</th>
                    <th id="onlyHover">Postcode</th>
                    <th id="onlyHover">Telefoonnummer</th>
                </tr>
                <?php
                foreach ($klant as $k) {
                    echo "<tr class='customer' id='tr_foreach'>";
                    echo "<td>" . $k["klantId"] . "</td>";
                    echo "<td>" . $k["voornaam"] . "</td>";
                    echo "<td>" . $k["achternaam"] . "</td>";
                    echo "<td id='onlyHover'>" . $k["email"] . "</td>";
                    echo "<td>" . $k["woonplaats"] . "</td>";
                    echo "<td id='onlyHover'>" . $k["straat"] . "</td>";
                    echo "<td id='onlyHover'>" . $k["postcode"] . "</td>";
                    echo "<td id='onlyHover'>" . $k["telefoonnummer"] . "</td>";
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