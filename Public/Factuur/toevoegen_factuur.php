<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Factuur Toevoegen</title>
</head>
<body>
    <h1>Nieuwe Factuur Toevoegen</h1>
    <form action="verwerk_factuur.php" method="post">
        <label for="klant_id">Klant ID:</label>
        <input type="number" name="klant_id" id="klant_id" required><br>
        <label for="datum">Datum:</label>
        <input type="date" name="datum" id="datum" required><br>
        <label for="aantal">Aantal:</label>
        <input type="number" name="aantal" id="aantal" required><br>
        <label for="omschrijving">Omschrijving:</label>
        <input type="text" name="omschrijving" id="omschrijving" required><br>
        <label for="prijs">Prijs:</label>
        <input type="number" step="0.01" name="prijs" id="prijs" required><br>
        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>
