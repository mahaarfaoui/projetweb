<?php

include '../controller/FactureC.php';
include '../model/Facture.php';

$error = "";

// Create 'facture'
$facture = null;

// Create an instance of the controller
$factureC = new FactureC();
if (
    isset($_POST["dateFact"]) &&
    isset($_POST["montant"])
) {
    $facture = new Facture(
        null,
        new DateTime($_POST['dateFact']),
        floatval($_POST['montant'])
        );
    $factureC->addFacture($facture);
    header('Location:listFacture.php');
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add bill</title>
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
    <a href="listFacture.php">Back to list</a>
    <hr>

    <form id="addFact" name="addFact" action="" method="POST">
        <!-- LOADING VALIDATION SCRIPT -->
        <script src="../assets/js/addFacture.js"></script>
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="dateFact">Bill Date
                    </label>
                </td>
                <td><input type="date" name="dateFact" id="dateFact">
                    <span id="dateFactError"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="montant">Amount (Dt)
                    </label>
                </td>
                <td><input type="number" step="0.001" name="montant" id="montant" placeholder="000,000" onKeyup="montantValidation()">
                    <span id="montantError"></span>
                </td>    
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Add">
                </td>
                <td>
                    <input type="reset" value="Reset" onClick="reset()">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>