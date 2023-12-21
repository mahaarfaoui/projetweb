<?php
include '../controller/LivraisonC.php';
$livraisonC = new LivraisonC();
$livraisonC->deleteLivraison($_GET["refLiv"]);
header('Location:listLivraison.php');
