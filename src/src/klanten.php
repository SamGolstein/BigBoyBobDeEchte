<?php
include('database.php');
class Klanten extends Database
{
    private $voornaam;
    private $achternaam;
    private $woonplaats;
    private $straat;
    private $postcode;
    private $telefoonnummer;
    private $id;

    public function getKlant($id)
    {
        $query = "SELECT * FROM klant WHERE klantId = '$id';";

        return parent::voerQueryUit($query);
    }

    public function getAllKlanten()
    {
        $query = "SELECT * FROM klant;";
        return parent::voerQueryUit($query);
    }

    public function zoekKlant($selected, $search)
    {
        if($selected == "voornaam")
        {
            $query = "SELECT * FROM klant WHERE voornaam LIKE '%$search%';";
        }
        else if($selected == "woonplaats")
        {
            $query = "SELECT * FROM klant WHERE woonplaats LIKE '%$search%';";
        }
        else if($selected == "alles")
        {
            $query = "SELECT * FROM klant;";
        }
        return parent::voerQueryUit($query);
    }

    public function saveKlanten()
    {
        $voornaam = $this->getVoornaam();
        $achternaam = $this->getAchternaam();
        $email = $this->getEmail();
        $woonplaats = $this->getWoonplaats();
        $straat = $this->getStraat();
        $postcode = $this->getPostcode();
        $telefoonnummer = $this->getTelefoonnummer();
        
        $query = parent::getConnection()->prepare("INSERT INTO klant (voornaam, achternaam, email, woonplaats, straat, postcode, telefoonnummer)
                                                VALUES (?, ?, ?, ?, ?, ?, ?);");
        $query->bindparam(1, $voornaam);
        $query->bindparam(2, $achternaam);
        $query->bindparam(3, $email);
        $query->bindparam(4, $woonplaats);
        $query->bindparam(5, $straat);
        $query->bindparam(6, $postcode);
        $query->bindparam(7, $telefoonnummer);

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
        $query = "DELETE FROM klant WHERE klantId = $id;";

        if(!parent::voerQueryUit($query))
            {
                return false;
            }
            else
            {
                return true;
            }
    }

    public function updateKlant($id)
    {
        $voornaam = $this->getVoornaam();
        $achternaam = $this->getAchternaam();

        $query = "UPDATE klant
                SET voornaam = '$voornaam',
                    achternaam = '$achternaam'
                WHERE klantId = $id;";

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

    public function setEmail($voornaam)
    {
        $this->voornaam = $voornaam;
    }

    public function getEmail()
    {
        return $this->achternaam;
    }

    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getWoonplaats()
    {
        return $this->woonplaats;
    }

    public function setWoonplaats($woonplaats)
    {
        $this->woonplaats = $woonplaats;
    }

    public function getStraat()
    {
        return $this->straat;
    }

    public function setStraat($straat)
    {
        $this->straat = $straat;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function getTelefoonnummer()
    {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer($telefoonnummer)
    {
        $this->telefoonnummer = $telefoonnummer;
    }
}