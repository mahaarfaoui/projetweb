<?php
 session_start();
include '../controller/userC.php';
include '../model/user.php';
if (!isset($_SESSION['username'])){
    header("location:../index.php");
}
else if ($_SESSION['user_type']!=='admin'){
	if ($_SESSION['user_type']==='customer'){
	header("location:customer.php");
}
else {header("location:employee.php");}
}

 $f = new userC();
 $tab = $f->listUsers();
$num=$f->countAdmin();
$num2=$f->countCust();
$num3=$f->countEmp();
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" type="text/css" href="../assets/style/style.css">
    <link rel="shortcut icon" type="x-icon" href="../assets/images/logo.png">
</head>
<body>
    <?php
      

    
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
                    <img src="C:\xampp\htdocs\projetweb\assets\images\img2.jpg">
                </div>
            </div>
            <!-- CARDS -->
            <div class="cardBox">
            <a href="listemployees.php" style="text-decoration:none;">   <div class="card">
              
                    <div>
                        
                        <div class="numbers"><?php echo $num3;?></div>
                        
                        <div class="cardName">Employees</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people"></ion-icon>
                    </div>
                </div>
            </a>
            <a href="listcustomers.php" style="text-decoration:none;"> <div class="card">
                <div>
                        <div class="numbers"><?php echo $num2;?></div>
                        <div class="cardName">Customers</div>
                        
                    </div>
                    
                    <div class="iconBx">
                        <ion-icon name="people-circle-outline"></ion-icon>
                    </div>
                </div>
            </div>
            </a>
            
            <!--FACTURES DETAILS LIST-->
            <div class="details">
                <div class="recentFactures">
                    <div class="cardHeader">
                        <h2>List of Users</h2>
                        
                    </div>
    <table border="1" align="center" width="70%">
        <tr align="center">
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Profile image</th>
            
        </tr>


        <?php
        foreach ($tab as $user) {
        ?>




            <tr>
                <td align="center"><?= $user['username']; ?></td>
                <td align="center"><?= $user['email']; ?></td>
                <td align="center"><?= $user['password']; ?></td>
                <td align="center"><img class="user"src="../assets/images/<?= $user['image']; ?>" alt=""> </td>
              
                <td align="center">
                    <a href="deleteUser.php?user_id=<?php echo $user['user_id']; ?>"class="btn">Delete User</a>
                </td>
              
        </h2>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <div align="center">
            <a  href="addUser.php?id=<?php echo $user['user_id']; ?>"class="btn">
                <i class="iconBx">
                    <ion-icon name="person-add-outline"></ion-icon>
                </i>
            </a>
                
    </div>
    <a href="adminpanel.php">
        <i class="iconBx">
                    <ion-icon name="arrow-back"></ion-icon>
                </i>
    </a>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        //MenuToggle
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
