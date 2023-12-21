<?php

require_once '../connect.php';

class FactureC
{

    public function listFacture()
    {
        $sql = "SELECT * FROM facture ORDER BY numFacture";
        $db = connect::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteFacture($num)
    {
        $sql = "DELETE FROM facture WHERE numFacture = :numFacture";
        $db = connect::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':numFacture', $num);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addFacture($facture)
    {
        $sql = "INSERT INTO facture  
        VALUES (NULL, :d,:m)";
        $db = conncet::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'd' => $facture->getDateFacture()->format('Y/m/d'),
                'm' => $facture->getMontant()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showFacture($num)
    {
        $sql = "SELECT * from facture where numFacture = $num";
        $db = connect::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $facture = $query->fetch();
            return $facture;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateFacture($facture, $num)
    {
        try {
            $db = connect::getConnexion();
            $query = $db->prepare(
                'UPDATE facture SET 
                    dateFacture = :dateFacture, 
                    montant = :montant
                WHERE numFacture= :numFacture'
            );
            $query->execute([
                'numFacture' => $num,
                'dateFacture' => $facture->getDateFacture()->format('Y/m/d'),
                'montant' => $facture->getMontant()
            ]);
            echo $query->rowCount() . "La facture a été mise à jour! <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function countFactures()
    {
        try
        {
            $db = connect::getConnexion();
            $sql = "SELECT COUNT(*) FROM facture";
            $num = $db->query($sql)->fetchColumn();
            return $num;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}