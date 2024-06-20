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

    public function saveRegel()
    {
        $query = $this->getConnection()->prepare("INSERT INTO factuurregel (factuurNr, aantal, omschrijving, prijs) VALUES (?, ?, ?, ?)");
        $query->bindParam(1, $this->factuurnr);
        $query->bindParam(2, $this->aantal);
        $query->bindParam(3, $this->omschrijving);
        $query->bindParam(4, $this->prijs);

        return $query->execute();
    }

    public function getRegelsByFactuurnr($factuurnr)
    {
        $query = $this->getConnection()->prepare("SELECT * FROM factuurregel WHERE factuurNr = ?");
        $query->bindParam(1, $factuurnr);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setFactuurnr($factuurnr)
    {
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
