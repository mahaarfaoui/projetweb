<?php

include '../controller/FactureC.php';
include '../model/Facture.php';

// create facture
$facture = null;

// create an instance of the controller
$factureC = new FactureC();
if (
    isset($_POST["numFacture"]) &&
    isset($_POST["dateFact"]) &&
    isset($_POST["montant"])
    ) {
        $facture = new Facture(
        
            $_POST['numFacture'],
            new DateTime($_POST['dateFact']),
            (float)($_POST['montant'])
            );
        $factureC->updateFacture($facture,$_POST['numFacture']);
        header('Location:listFacture.php');
        }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update bill</title>
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
    <button><a href="listFacture.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_POST['numFacture'])) {
        $facture = $factureC->showFacture($_POST['numFacture']);

    ?>

        <form id="updateFact" name="updateFact" action="" method="POST">
            <!-- LOADING VALIDATION SCRIPT -->
            <script src="../assets/js/updateFacture.js"></script>
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="numFacture">N° of bill
                        </label>
                    </td>
                    <td><input type="number" step="0.001" name="numFacture" id="numFacture" value="<?php echo $facture['numFacture']; ?>" onKeyup="numValidation()">
                        <span id="numFactError"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dateFact">Bill Date
                        </label>
                    </td>
                    <td><input type="date" name="dateFact" id="dateFact" value="<?php echo $facture['dateFacture']; ?>">
                        <span id="dateFactError"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="montant">Amount (Dt)
                        </label>
                    </td>
                    <td><input type="number" name="montant" id="montant" placeholder="000,000" value="<?php echo $facture['montant']; ?>" onKeyup ="montantValidation()">
                        <span id="montantError"></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>