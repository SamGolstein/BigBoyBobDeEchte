<?php
require_once('../../config/db_config.php');
require_once('database.php');

class Factuur extends Database {
    private $factuur_id;
    private $klant_id;
    private $datum;
    private $totaal_bedrag;

    public function __construct($klant_id = null, $datum = null, $totaal_bedrag = 0) {
        parent::__construct();
        $this->klant_id = $klant_id;
        $this->datum = $datum;
        $this->totaal_bedrag = $totaal_bedrag;
    }

    public function save() {
        try {
            $query = parent::getConnection()->prepare("INSERT INTO factuur (klant_id, datum, totaal_bedrag) VALUES (?, ?, ?)");
            $query->bindParam(1, $this->klant_id);
            $query->bindParam(2, $this->datum);
            $query->bindParam(3, $this->totaal_bedrag);

            if ($query->execute()) {
                $this->factuur_id = parent::getConnection()->lastInsertId();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function updateTotaal() {
        try {
            $query = parent::getConnection()->prepare("UPDATE factuur SET totaal_bedrag = ? WHERE factuur_id = ?");
            $query->bindParam(1, $this->totaal_bedrag);
            $query->bindParam(2, $this->factuur_id);
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

//     public function getTotaalBedrag()
// {
//     $query = $this->getConnection()->prepare("SELECT totaal_bedrag FROM factuur WHERE factuur_id = ?");
//     $query->bindParam(1, $this->factuur_id);
//     $query->execute();
//     $result = $query->fetch(PDO::FETCH_ASSOC);
//     return $result['totaal_bedrag'];
// }


public function getAlleFactuur($klantId) {
    try {
        $query = "SELECT * FROM factuur WHERE klant_id = :klantId";
        $stmt = parent::getConnection()->prepare($query);
        $stmt->bindParam(':klantId', $klantId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}



    public function getFactuurId() {
        return $this->factuur_id;
    }

    public function setFactuurId($factuur_id) {
        $this->factuur_id = $factuur_id;
    }

    public function setTotaalBedrag($totaal_bedrag) {
        $this->totaal_bedrag = $totaal_bedrag;
    }

    public function getTotaalBedrag() {
        return $this->totaal_bedrag;
    }
}
?>
