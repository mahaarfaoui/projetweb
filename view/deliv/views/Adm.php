<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css">
</head>
<body>
   
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="aff.php">
                        <span class="icon"><ion-icon name="document-outline"></ion-icon></span>
                        <span class="title">Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="affp.php">
                        <span class="icon"><ion-icon name="cart"></ion-icon></span>
                        <span class="title">Panier</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Paramètres</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Déconnexion</span>
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
                        <input type="text" placeholder="Chercher ici">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- USER IMG -->
                <div class="user">
                    <img src="assets/images/img2.png">
                </div>
            </div>
            <!-- CARDS -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"> 4</div>
                        <div class="cardName">Commandes</div>
                    </div>
                    <div class="iconBx">
                    <ion-icon name="document-outline"></ion-icon>                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">5</div>
                        <div class="cardName">Panier</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
            </div>
          

    </div>

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