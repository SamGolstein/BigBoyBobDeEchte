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

    public function getid() {
        return $this->id;
    }

    public function getFactuurnr() {
        return $this->factuurnr;
    }


    public function omschrijving() {
        return $this->omschrijving;
    }

    public function getPrijs() {
        return $this->prijs;
    }
}
?>
