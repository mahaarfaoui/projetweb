<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of deliveries</title>
    <!-- IMPORTING SCRIPTS AND ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/style/styleSearchFilterLivraison.css">
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
                    <li>
                        <a href="adminpanel.php">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="listFacture.php">
                            <span class="icon"><ion-icon name="document-outline"></ion-icon></span>
                            <span class="title">Bills</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
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

    <?php
    include "../controller/LivraisonC.php";

    $l = new LivraisonC();
    $tab = $l->listLivraison();

    ?>

    <center>
        <h1>List of deliveries</h1>
        <h2>
            <a href="addLivraison.php">Add Delivery</a>
        </h2>
        <input type="text" name="filter" id="filter" onKeyup="filterLivraison()" placeholder="Filter by N° of delivery...">
    </center>
    <table id="listLiv" border="1" align="center" width="70%">
        <tr align="center">
            <th>N° of Delivery</th>
            <th>Address</th>
            <th>N° of Bill</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Confirm Delivery</th>
        </tr>


        <?php
        foreach ($tab as $livraison) {
        ?>




            <tr>
                <td align="center"><?= $livraison['refLiv']; ?></td>
                <td align="center"><?= $livraison['adresseLiv']; ?></td>
                <td align="center"><?= $livraison['numFact']; ?></td>
                <td align="center"><?= $livraison['etatLiv']; ?></td>
                <td align="center">
                    <form method="POST" action="updateLivraison.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $livraison['refLiv']; ?> name="refLiv">
                    </form>
                </td>
                <td align="center">
                    <a class="fa fa-trash" href="deleteLivraison.php?refLiv=<?php echo $livraison['refLiv']; ?>"></a>
                </td>
                <td>
                    <form name="confirm" action="confirm.php" method="POST">
                        <div class="text-center">
                        <input type="submit" name="confirm" class="btn btn-success" value="Confirm Delivery">
                        </div>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script src="../assets/js/searchFilter.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
</body>
</html>