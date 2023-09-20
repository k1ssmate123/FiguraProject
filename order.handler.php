<?php
include_once "dbConnection.class.php";
include_once "order.class.php";
session_start();
if(isset($_POST['putInCart']))
{
    $sql = "SELECT * FROM `menuitems` inner join category on category.id = categoryId;";
$res = Dbh::QueryDb($sql, array());

    $j = 0;
    while($j < count($res)&& $res[$j]['itemId'] != $_POST['putInCart'])
    {
        $j++;
    }
    if($j <count($res))
    {
        $k = 0;
        
        while($k < count($_SESSION['cart']) &&$_SESSION['cart'][$k]->id !=$_POST['putInCart']){
            $k++;
          
        }
        if($k<count($_SESSION['cart']))
        {
            $_SESSION['cart'][$k]->quantity++;
        }
        else{
        array_push($_SESSION['cart'], new Order($res[$j]['itemId'],$res[$j]['itemName'],$res[$j]['itemPrice']));
    }

    }

}
 
header("Location: index.php?site=menu");

?>