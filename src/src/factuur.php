<?php
include "database.php";
class Factuur extends Database
{
    private $factuur_id;
    private $klant_id;
    private $datum;
    private $totaal_bedrag;

    public function __construct($klant_id, $datum)
    {
        $this->klant_id = $klant_id;
        $this->datum = $datum;
        $this->totaal_bedrag = 0;
    }

    public function save()
    {
        $query = parent::getConnection()->prepare("INSERT INTO facturen (klant_id, datum, totaal_bedrag) VALUES (?, ?, ?)");

        if ($query->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function updateTotaal()
    {
        $query = parent::getConnection()->prepare("UPDATE facturen SET totaal_bedrag = ? WHERE factuur_id = ?");
        return $query->execute();
    }

    public function getFactuurId()
    {
        return $this->factuur_id;
    }

    public function setTotaalBedrag($totaal_bedrag)
    {
        $this->totaal_bedrag = $totaal_bedrag;
    }

    public function getTotaalBedrag()
    {
        return $this->totaal_bedrag;
    }
}
?>