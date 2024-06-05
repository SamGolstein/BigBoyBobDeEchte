<?php
require_once ('database.php');
class Medewerker extends Database
{
    private $gebruikersnaam;
    private $wachtwoord;

    public function getMedewerker($gebruikersnaam, $wachtwoord)
    {
        $query = "SELECT * FROM medewerker WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord';";

        return parent::voerQueryUit($query);
    }
}