<?php
require_once("database.php");
class FactuurRegel extends Database {
    private $id;
    private $factuurnr;
    private $omschrijving;
    private $prijs;

    public function __construct($id, $factuurnr, $omschrijving, $prijs) {
        $this-> $factuurnr =  $factuurnr;
        $this->omschrijving = $omschrijving;
        $this->prijs = $prijs;
    }

    public function save() {
        $query = parent::getConnection()->prepare("INSERT INTO factuurregels (id, omschrijving, prijs) VALUES (?, ?, ?)");
       
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getFactuurregelId() {
        return $this->factuurregel_id;
    }

    public function getFactuurId() {
        return $this->factuur_id;
    }


    public function getHoeveelheid() {
        return $this->hoeveelheid;
    }

    public function getPrijs() {
        return $this->prijs;
    }
}
?>
