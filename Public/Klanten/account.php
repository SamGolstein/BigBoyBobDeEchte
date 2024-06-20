<?php
require_once('../../src/src/medewerker.php');
$medewerker = new Medewerker();

echo "Hallo " . $_SESSION['gebruikersnaam'];

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
</head>
<body>
    <form method="POST">
        <input type="text" name="gebruikersnaam" value="<?php echo $_SESSION['gebruikersnaam']; ?>">
        <input type="submit" value="verander" name="veranderen">
        <input type="submit" value="Uitloggen" name="uitloggen">
    </form>
</body>
</html>