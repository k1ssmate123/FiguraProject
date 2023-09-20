<?php
include_once "dbConnection.class.php";
include_once "order.class.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap5/bootstrap.min.css">
    <script src="js/bootstrap5/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-md">
        <div class="container">

            <img src="img/logo.png" alt="" data-bs-toggle="collapse" data-bs-target="#collapseNav" class="menuikon navbar-toggler">
            <div class="collapse navbar-collapse" id="collapseNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="?site=main" class="nav-link">Főoldal</a></li>
                    <li class="nav-item"><a href="?site=menu" class="nav-link">Étlap</a></li>
                    <li class="nav-item"><a href="?site=galery" class="nav-link">Galéria</a></li>
              
                </ul>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="collapseNav">
                <ul class="navbar-nav ">
                    <?php
                     if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
                     {
                        echo '<li class="nav-item"><a href="?site=admin" class="nav-link">Admin</a></li>';
                     }
                    if (!isset($_SESSION['userId'])) {
                        echo '<li class="nav-item pe-md-2"><a href="?site=login" class="nav-link">Bejelentkezés</a></li>
                            <li class="nav-item"><a href="?site=register" class="nav-link">Regisztrálás</a></li>';
                    } else {
                        echo '<li class="nav-item pe-md-2"><a href="?site=profile" class="nav-link">' . $_SESSION['secondName'];
                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                            echo ' (' . Order::CartSum(($_SESSION['cart'] )) . ')';
                        }
                        echo '</a></li>
                            <li class="nav-item"><a href="?site=logout" class="nav-link">Kijelentkezés</a></li>';
                           
                    }
                   
                    ?>
                </ul>
            </div>
        </div>
        </img>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">


            <div class="<?php
            if(!isset($_GET['site'])){echo 'col-md-9';}
                        elseif (isset($_GET['site']) && ($_GET['site'] == "login" || $_GET['site'] == "register" || $_GET['site']=="change")) {
                            echo "col-md-6";
                        }
                        elseif(isset($_GET['site'])&&$_GET['site'] == "main"){ echo "col-md-9";}else {
                            echo "col-md-12";
                        } ?> col-sm-12 mainContent p-0">



                <?php
                if (isset($_GET['site'])) {
                    include_once $_GET['site'] . ".php";
                } else {
                    include_once "main.php";
                }

                ?>
            </div>

        </div>
    </div>
    <div class="container-fluid mt-auto ">
    <div class="row">
    <footer class="py-1 bottomContent">

        <ul class="nav justify-content-center border-bottom pb-1 mb-1">
            <li class="nav-item"><a href="tel:123-456-7890" class="nav-link px-2 text-muted">+36/84/343-253 <br>+3630 970-6997</a></li>
            <li class="nav-item"><a target="_blank" href="https://www.google.com/maps?ll=46.730411,18.03318&z=15&t=m&hl=hu-HU&gl=US&mapclient=embed&q=Kossuth+Lajos+u.+53+Tab+8660" class="nav-link px-2 text-muted">Tab,<br> Kossuth Lajos u.53. Főtér</a></li>
            <li class="nav-item mt-3"><a href="mailto:info@figurabisztro.hu" class="nav-link px-2 text-muted">info@figurabisztro.hu</a></li>
             <li class="nav-item"><a target="_blank" href="https://www.facebook.com/figurabisztro" class="nav-link px-2 text-muted"><img src="img/fblogo.png" class="logo" alt=""></a></li>
             <li class="nav-item"><a  class="nav-link px-2 text-muted">Az oldal kizárólagos tanulási célra jött létre</a></li>
      
            </ul>
        <p class="text-center text-muted">© 2023, Kiss Máté</p>
    </footer></div></div>

</body>

</html>