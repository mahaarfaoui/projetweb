<?php
include '../controller/FactureC.php';
$factureC = new FactureC();
$factureC->deleteFacture($_GET["numFacture"]);
header('Location:listFacture.php');
