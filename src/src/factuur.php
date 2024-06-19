<?php
require_once('../../config/db_config.php');
require_once('database.php');

class Factuur extends Database {
    private $factuur_id;
    private $klant_id;
    private $datum;
    private $totaal_bedrag;

    public function save()
    {
        $query = parent::getConnection()->prepare("INSERT INTO factuur (klant_id, datum) VALUES (?, ?)");
        $query->bindParam(1, $this->klant_id);
        $query->bindParam(2, $this->datum);

        if ($query->execute()) {
            $this->factuur_id = $this->getConnection()->lastInsertId();
            return true;
        } else {
            return false;
        }
    
    }
    
    public function updateTotaal() {
        $query = $this->getConnection()->prepare("UPDATE facturen SET totaal_bedrag = ? WHERE factuur_id = ?");
        $query->bindParam(1, $this->totaal_bedrag);
        $query->bindParam(2, $this->factuur_id);
        return $query->execute();
    }

    public function getAlleFactuur($klantId)
    {
        $query = "SELECT * FROM factuur WHERE klant_id = '$klantId';";
        return parent::voerQueryUit($query);
    }

    public function getAllFacturen()
    {
        $query = "SELECT * FROM factuur;";
        return parent::voerQueryUit($query);
    }

    public function getFactuurId()
    {
        return $this->factuur_id;
    }

    public function updateTotaalBedrag($prijs, $factuurId)
    {
        $query = "UPDATE factuur SET totaal_bedrag = totaal_bedrag + $prijs WHERE factuur_id = $factuurId;";
        return parent::voerQueryUit($query);
    }

    public function getTotaalBedrag($factuurId)
    {
        $query = "SELECT totaal_bedrag FROM factuur WHERE factuur_id = $factuurId;";
        return parent::voerQueryUit($query);
    }

    public function setTotaalBedrag($totaal_bedrag) {
        $this->totaal_bedrag = $totaal_bedrag;
    }

    public function setId($id) {
        $this->klant_id = $id;
    }

    public function setDatum($datum) {
        $this->datum = $datum;
    }
}
?>