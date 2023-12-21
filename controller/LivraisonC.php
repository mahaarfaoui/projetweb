<?php

require_once '../connect.php';

class LivraisonC
{

    public function listLivraison()
    {
        $sql = "SELECT * FROM livraison ORDER BY refLiv";
        $db = connect::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listLivraisonDec()
    {
        $sql = "SELECT * FROM livraison ORDER BY refLiv DESC";
        $db = connect::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteLivraison($num)
    {
        $sql = "DELETE FROM livraison WHERE refLiv = :refLiv";
        $db = connect::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':refLiv', $num);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addLivraison($livraison)
    {
        $sql = "INSERT INTO livraison  
        VALUES (NULL, :a,:n,:e)";
        $db = connect::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'a' => $livraison->getAdresseLiv(),
                'n' => $livraison->getNumFact(),
                'e' => $livraison->getEtatLiv()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showLivraison($num)
    {
        $sql = "SELECT * from livraison where refLiv = $num";
        $db = connect::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $livraison = $query->fetch();
            return $livraison;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateLivraison($livraison, $num)
    {
        try {
            $db = connect::getConnexion();
            $query = $db->prepare(
                'UPDATE livraison SET  
                    adresseLiv = :adresseLiv,
                    numFact = :numFact,
                    etatLiv = :etatLiv
                WHERE refLiv= :refLiv'
            );
            $query->execute([
                'refLiv' => $num,
                'adresseLiv' => $livraison->getAdresseLiv(),
                'numFact' => $livraison->getNumFact(),
                'etatLiv' => $livraison->getEtatLiv()
            ]);
            echo $query->rowCount() . "La livraison a été mise à jour! <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }  
    
    function showNumFacts()
    {
        $sql = "SELECT numFacture FROM facture";
        $db = connect::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            $num = $query->fetchAll();
            return $num;
        } catch (Expression $e) {
            die('Error: ' . $e->getMessage());
        }    
    }
    
    function confirm($livraison, $num)
    {
        try {
            $db = connect::getConnexion();
            $query = $db->prepare(
                'UPDATE livraison SET  
                    etatLiv = "LIVREE"
                WHERE refLiv = :refLiv'
            );
            $query->execute();
            echo $query->rowCount() . "La livraison a été confirmée! <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function countLivraisons()
    {
        try
        {
            $db = connect::getConnexion();
            $sql = "SELECT COUNT(*) FROM livraison";
            $num = $db->query($sql)->fetchColumn();
            return $num;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}