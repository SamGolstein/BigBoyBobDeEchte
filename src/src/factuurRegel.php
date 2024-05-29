<?php
require_once("database.php");
class FactuurRegel extends Database {
    private $factuurregel_id;
    private $factuur_id;
    private $hoeveelheid;
    private $prijs;

    public function __construct($factuur_id, $product_id, $hoeveelheid, $prijs) {
        $this->factuur_id = $factuur_id;
        $this->hoeveelheid = $hoeveelheid;
        $this->prijs = $prijs;
    }

    public function save() {
        $query = parent::getConnection()->prepare("INSERT INTO factuurregels (factuur_id, hoeveelheid, prijs) VALUES (?, ?, ?)");
       
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
