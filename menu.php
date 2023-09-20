<div class="header ">
                    <img src="img/header.jpg" id="headerPic" alt="">
                    <h2>Étlap</h2>
                </div>
<div class="container-fluid px-4">
<form action="order.handler.php" class="form-group" method="post">
    
<div class="row gx-5">
<?php
$sql = "SELECT name from category";
$catArray = Dbh::QueryDb($sql,array());



$sql = "SELECT * FROM `menuitems` inner join category on category.id = categoryId;";
$res = Dbh::QueryDb($sql, array());

for($i = 0;$i < count($catArray);$i++)
{
    echo '<h1 class="itemName p-0">'.$catArray[$i]['name'] . '</h1><hr>';
    for($j = 0;$j < count($res);$j++)
    {
        if($res[$j]['name'] == $catArray[$i]['name']){
        echo '<div class="col-md-6 menuItem p-3 mb-2"><h2 class="text-center">' . $res[$j]['itemName'] . '</h2>
        <h4 class="text-center">' . $res[$j]['itemDescription'] . '</h4>
        <h3 class="text-end pb-2">' . $res[$j]['itemPrice'] . ' Ft</h3>
       
        ';
            if (isset($_SESSION['userId'])) {
              
                echo '<div class="text-end">';
                echo '<button class="btn btnReg btn-success border-3" name="putInCart" value="' . $res[$j]['itemId'] . '" type="submit">Kosárba rakom</button></div>';
            }

            echo '</div>';
    }}
}


?><span class="text-end">*GM=gluténmentes <br>
        Az árak a kiszállítás díját is tartalmazzák.
        <?php echo count($_SESSION['cart']); ?>
</span></div>
</form>
</div>

<?php

?>
