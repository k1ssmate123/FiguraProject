<div class="header">
       <img src="img/header.jpg" id="headerPic" alt="">
       <h2>Profil</h2>
   </div>
<div class="row p-3">
    <div class="col-md-6 border-dark">
        <h1>Kosár</h1>
        <form action="profile.handler.php" method="post">
            <?php
            if (isset($_SESSION['userId'])) {
               
            
    

                if (count($_SESSION['cart']) > 0) {
                    $osszPrice = 0;
                    for($i = 0; $i < count($_SESSION['cart']);$i++)
                    {
                        $osszPrice+=$_SESSION['cart'][$i]->GetPrice();
                    }
                    echo "<p class='mb-3 ossz'>Összesen: ".$osszPrice. " Ft</p>";
                    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                 

                        echo '<div class="pb-1 text-center"><h2>' . $_SESSION['cart'][$i]->name . ' - '.$_SESSION['cart'][$i]->quantity.'x</h2>
                         <h3>' . $_SESSION['cart'][$i]->GetPrice(). ' Ft</h3>
                       
                         ';

                        echo '<div class="text-end">';
                        echo '<button onClick="window.location.reload();" class="btn btnReg btn-success border-3" name="deleteFromCart" value="' . $_SESSION['cart'][$i]->id . '" type="submit">Törlés a kosárból</button></div>';
                        echo '</div>';

                     }     echo '<button class="btn m-3 btnReg btn-success justify-content-center border-3" name="confirmOrder" type="submit">Rendelés véglegesítése</button>';
                  
                } else {
                    echo '<p class="text-center">Még nincs semmi a kosaradban!</p>';
                }
            } else {
                header("location: index.php");
            }


            ?>

        </form>
    </div>
  


<div class="col-md-6">
    <h1>Aktív rendelések</h1>

    <?php
    $sql = "SELECT * FROM `ordercon` where userId = ?";
    $res = Dbh::QueryDb($sql, array($_SESSION['userId']));
    if (count($res) > 0) {
       $sql = "SELECT quantity, itemDescription, itemName, itemPrice FROM `ordercon` inner join users on users.userId = ordercon.userId inner join groupconn on groupconn.orderId = ordercon.orderId inner join menuitems on menuitems.itemId = groupconn.itemId where users.userId = ?" ;
       
       $res = Dbh::QueryDb($sql,array($_SESSION['userId']));
      

   
        for ($i = 0; $i < count($res); $i++) {
            echo '<div class="row"><div class="col item"><h2>' . $res[$i]['itemName'] . ' - '.$res[$i]['quantity'].'x</h2>
                <h3>' . $res[$i]['itemPrice']*$res[$i]['quantity'] . ' Ft</h3>
                <h4>' . $res[$i]['itemDescription'] . '</h4>
                </div></div>';
     
        
        }
       
    } else {
        echo '<p class="text-center">Nincs aktív rendelésed</p>';
    }


    ?>

</div></div><hr>
<div class="p-3">Szállítási adatok<br>

<?php
$sql = "SELECT * from address where userId = ?";
$array = Dbh::QueryDb($sql,array($_SESSION['userId']));
echo $array[0]['postalCode']." ".$array[0]['city'].", ";
echo $array[0]['Address']." ".$array[0]['door'].", <br>";
echo $array[0]['phone'];
echo ''
?>
<br><a class="btn btnReg btn-primary" href="?site=change">Adatok megváltoztatása</a>

</div>
