<?php
include('database.php');
class Klanten extends Database
{
    private $voornaam;
    private $achternaam;

    public function getAllKlanten()
    {
        $query = "SELECT * FROM klanten;";
        return parent::voerQueryUit($query);
    }

    public function saveKlanten()
    {
        $voornaam = $this->getVoornaam();
        $achternaam = $this->getAchternaam();
        
        $query = parent::getConnection()->prepare("INSERT INTO klanten (voornaam, achternaam)
                                                VALUES (?,?);");
        $query->bindparam(1, $voornaam);
        $query->bindparam(2, $achternaam);

        if($query->execute())
        {
            return true;
        } else 
        {
            return false;
        }
        
    }

    public function deleteKlant($id)
    {
        $query = "DELETE FROM klanten WHERE id = '$id';";

        if(!parent::voerQueryUit($query))
            {
                return false;
            }
            else
            {
                return true;
            }
    }

    public function getVoornaam()
    {
        return $this->voornaam;
    }

    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;
    }

    public function getAchternaam()
    {
        return $this->achternaam;
    }

    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;
    }
}