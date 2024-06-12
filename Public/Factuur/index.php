<?php

require_once('../../config/db_config.php');
require_once('../../src/src/factuur.php'); 
require_once('../../src/src/factuurRegel.php'); 


$db = new Database();


if (!$db->testVerbinding()) {
    die("Database connection failed.");
}


$query = "SELECT * FROM factuur";
$testen = $db->voerQueryUit($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturen</title>
    <link rel="stylesheet" href="../../style/index.css">
</head>
<body>
    <h1>Facturen</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Factuur Nr</th>
                <th>Klant Id</th>
                <th>Datum</th>
                <th>Totaal Bedrag</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testen as $test): ?>
                <tr>
                    <td><?php echo htmlspecialchars($test['factuurNr']); ?></td>
                    <td><?php echo htmlspecialchars($test['klant_id']); ?></td>
                    <td><?php echo htmlspecialchars($test['datum']); ?></td>
                    <td><?php echo htmlspecialchars($test['totaal_bedrag']); ?></td>
                    <td>
                        <a href="bewerken.php?factuurNr=<?php echo $test['factuurNr']; ?>">Bewerken</a>
                        <a href="verwijderen.php?factuurNr=<?php echo $test['factuurNr']; ?>">Verwijderen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="toevoegen.php">Toevoegen</a>

</body>
</html>
