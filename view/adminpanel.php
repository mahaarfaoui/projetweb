<?php 
session_start();
include '../controller/userC.php';
include '../model/user.php';
include '../controller/FactureC.php';
include '../controller/LivraisonC.php';
if (!isset($_SESSION['username'])){
    header("location:../index.php");
}
else if ($_SESSION['user_type']!=='admin'){
	if ($_SESSION['user_type']==='customer'){
	header("location:customer.php");
}
else {header("location:employee.php");}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../assets/style/style.css">
    <link rel="shortcut icon" type="x-icon" href="../assets/images/logo.png">
</head>
<body>
    <?php
    $f = new FactureC();
    $l = new LivraisonC();
    $tab = $l->listLivraisonDec();
    $num1 = $f->countFactures();
    $num2 = $l->countLivraisons(); 

    
    ?>

    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    </a>
                </li>
                <li>
                    <a href="admin.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="listFacture.php">
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
                    <a href="admin_page.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Products</span>
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
        <!-- MAIN -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- SEARCH -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here...">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- USER IMG -->
                <div class="user">
                    <img src="../assets/images/img2.png">
                </div>
            </div>
            <!-- CARDS -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $num1; ?></div>
                        <div class="cardName">Bills</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="document-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $num2; ?></div>
                        <div class="cardName">Deliveries</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="car"></ion-icon>
                    </div>
                </div>
                
            </div>
            <!--DELIVERIES DETAILS LIST-->
            <div class="details">
                <div class="recentLivraison">
                    <div class="cardHeader">
                        <h2>Recent Deliveries</h2>
                        <a href="listLivraison.php" class="btn">See All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>N° of delivery</td>
                                <td>Address</td>
                                <td>N° of bill</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($tab as $livraison) {
                                    ?>
                                    <tr>
                                    <td align="center"><span class="<? 'status ' .$livraison['etatLiv'];?>"></span><?= $livraison['refLiv']; ?></td>
                                    <td align="center"><?= $livraison['adresseLiv']; ?></td>
                                    <td align="center"><?= $livraison['numFact']; ?></td>
                                    <td align="center"><?= $livraison['etatLiv']; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        //MenuToggle
        //sets up a menu toggle functionality for a webpage
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
        //Add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) => 
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink));
    </script>
</body>
</html>