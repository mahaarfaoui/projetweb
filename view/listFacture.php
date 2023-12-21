<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of bills</title>
    <!-- IMPORTING SCRIPTS AND ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/style/styleSearchFilterFacture.css">
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
        input {
            margin-top: 10px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                </li>
                <li>
                    <a href="adminpanel.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="document-outline"></ion-icon></span>
                        <span class="title">Bills</span>
                    </a>
                </li>
                <li>
                    <a href="listLivraison.php">
                        <span class="icon"><ion-icon name="car"></ion-icon></span>
                        <span class="title">Deliveries</span>
                    </a>
                </li>
                <li>
                    <a href="listUsers.php">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li>
                    <a href="profile_admin.php">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <?php
    include "../controller/FactureC.php";

    $f = new FactureC();
    $tab = $f->listFacture();

    ?>

    <center>
        <h1>List of bills</h1>
        <h2>
            <a href="addFacture.php">Add Bill</a>
        </h2>
        <input type="text" name="filter" id="filter" onKeyup="filterFacture()" placeholder="Filter by N° of bill">
    </center>
    <table id="listFact" border="1" align="center" width="70%">
        <tr align="center">
            <th>N° of Bill</th>
            <th>Bill Date (AA-MM-JJ)</th>
            <th>Amount (Dt)</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>


        <?php
        foreach ($tab as $facture) {
        ?>


  
            <tr>
                <td align="center"><?= $facture['numFacture']; ?></td>
                <td align="center"><?= $facture['dateFacture']; ?></td>
                <td align="center"><?= $facture['montant']; ?></td>
                <td align="center">
                    <form method="POST" action="updateFacture.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $facture['numFacture']; ?> name="numFacture">
                    </form>
                </td>
                <td align="center">
                    <a class="fa fa-trash" href="deleteFacture.php?numFacture=<?php echo $facture['numFacture']; ?>"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script src="../assets/js/searchFilter.js"></script>
    <br><br>
    <form name="excel" action="export.php" method="POST">
        <div class="text-center">
            <input type="submit" name="export_excel" class="btn btn-success" value="Generate a spreadsheet">
        </div>
    </form>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script src="../assets/js/searchFilter.js"></script>
</html>