<?php

include '../controller/LivraisonC.php';
include '../model/Livraison.php';

$error = "";

// create 'livraison'
$livraison = null;

// create an instance of the controller
$livraisonC = new LivraisonC();
$tab = $livraisonC->showNumFacts();
if (
    isset($_POST["adresseLiv"]) &&
    isset($_POST["numFact"]) &&
    isset($_POST['etatLiv'])
) {
    $livraison = new Livraison(
        null,
        $_POST['adresseLiv'],
        $_POST['numFact'],
        $_POST['etatLiv']
        );
    $livraisonC->addLivraison($livraison);
    header('Location:listLivraison.php');
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add delivery</title>
    <!-- IMPORTING SCRIPTS AND ICONS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="x-icon" href="../assets/images/logo.png">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* STYLE */
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        body {
            background-color: white;
        }
    </style>
</head>

<body>
    <a href="listLivraison.php">Back to list</a>
    <hr>

    <form id="addLiv" name="addLiv" action="" method="POST">
        <!-- LOADING VALIDATION SCRIPT -->
        <script src="../assets/js/addLivraison.js"></script>
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="adresseLiv">Address
                    </label>
                </td>
                <td><input type="text" name="adresseLiv" id="adresseLiv" onKeyup="adresseLivValidation()">
                    <span id="adresseLivError"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="numFact">N° of Bill
                    </label>
                </td>
                <td>
                    <select name="numFact" id="numFact" onchange="numFactureValidation()">
                        <option value="null">Select</option>
                        <?php
                            foreach($tab as $facture) {
                                echo('<option value="' .$facture['numFacture']. '"> '.$facture['numFacture'].'</option>');
                            }
                        ?>
                    </select>
                    <span id="numFactError"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="etatLiv">Status
                    </label>
                </td>
                <td>
                    <select name="etatLiv" onchange="etatLivValidation()">
                        <option value="null">Select</option>
                        <option value="NON LIVREE">Non livrée</option>
                        <option value="ANNULEE">Annulée</option>
                        <option value="EN COURS">En cours</option>
                        <option value="LIVREE">Livrée</option>
                    </select>
                    <span id="etatLivError"></span>
                </td>                
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Add">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>