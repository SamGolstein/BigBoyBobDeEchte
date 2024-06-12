<?php
require_once("database.php");
class FactuurRegel extends Database {
    private $id;
    private $aantal;
    private $factuurnr;
    private $omschrijving;
    private $prijs;

    public function save() {
        $query = parent::getConnection()->prepare("INSERT INTO factuurregels (id, factuurnr, aantal ,omschrijving, prijs) VALUES (?, ?, ?)");
       
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getFactuurRegel()
    {
        $query = "SELECT * FROM factuurregel;";
        return parent::voerQueryUit($query);
    }

    public function getid() {
        return $this->id;
    }

    public function getFactuurnr() {
        return $this->factuurnr;
    }


    public function getOmschrijving() {
        return $this->omschrijving;
    }

    public function getPrijs() {
        return $this->prijs;
    }

    public function setFactuurnr($factuurnr) {
        $this->factuurnr = $factuurnr;
    }

    public function setOmschrijving($omschrijving) {
        $this->omschrijving = $omschrijving;
    }

    public function setPrijs($prijs) {
        $this->prijs = $prijs;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAantal(){
        return $this->aantal;
    }

    public function setAantal($aantal){
        $this->aantal = $aantal;
    }
}
?>
