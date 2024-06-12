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

    public function updateGebruikersnaam()
    {
        $nieuweGebruikersnaam = $this->getGebruikersnaam();

        $query = parent::getConnection()->prepare("UPDATE medewerker SET gebruikersnaam = ? WHERE gebruikersnaam = ?");
        $query->bindparam(1, $nieuweGebruikersnaam);
        $query->bindparam(2, $_SESSION['gebruikersnaam']);

        if ($query->execute()) {
            $_SESSION['gebruikersnaam'] = $nieuweGebruikersnaam;
            return true;
        } else {
            return false;
        }
    }

    public function setGebruikersnaam($gebruikersnaam)
    {
        $this->gebruikersnaam = $gebruikersnaam;
    }

    public function getGebruikersnaam()
    {
        return $this->gebruikersnaam;
    }
}