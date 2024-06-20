<?php
require_once('../../config/db_config.php');
require_once('database.php');
require_once('factuur.php');

class FactuurRegel extends Database
{
    private $id;
    private $aantal;
    private $factuurnr;
    private $omschrijving;
    private $prijs;

    public function __construct()
    {
        parent::__construct();
    }

    public function saveRegel() {
        $query = $this->getConnection()->prepare("INSERT INTO factuurregel (factuur_id, uren, omschrijving, prijs) VALUES (?, ?, ?, ?)");
        $query->bindParam(1, $this->factuurnr);
        $query->bindParam(2, $this->aantal);
        $query->bindParam(3, $this->omschrijving);
        $query->bindParam(4, $this->prijs);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getFactuurRegel() {
        $query = "SELECT * FROM factuurregel;";
        return $this->voerQueryUit($query);
    }
    public function getFactuurRegelById($factuurId) {
        $query = "SELECT * FROM factuurregel WHERE factuur_id = $factuurId;";
        return $this->voerQueryUit($query);
    }

    public function getId() {
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

    public function setAantal($aantal)
    {
        $this->aantal = $aantal;
    }

    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;
    }

    public function setPrijs($prijs)
    {
        $this->prijs = $prijs;
    }
}
?>
