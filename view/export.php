<?php
require_once '../connect.php';

try {
    $db = connect::getConnexion();
    $sql = "SELECT numFacture as Num,dateFacture as 'Date',montant as Montant FROM facture";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    require '../controller/CsvC.php';
    Csv::export($data,'Factures.csv');
} catch (Exception $e) {
    $e->getMessage();
}

?>