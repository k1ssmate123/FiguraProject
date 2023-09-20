<?php
include_once "dbConnection.class.php";
include_once "order.class.php";
session_start();
if (isset($_POST['deleteFromCart'])) {
  $j = 0;
  while($j < count($_SESSION['cart']) && $_SESSION['cart'][$j]->id != $_POST['deleteFromCart'])
  {
    $j++;
  }
  if($j < count($_SESSION['cart']))
  {
    if($_SESSION['cart'][$j]->quantity == 1)
    {
        unset($_SESSION['cart'][$j]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);

    }
    else{$_SESSION['cart'][$j]->quantity--;}
  }
  header("Location: index.php?site=profile");

   
}
if (isset($_POST['confirmOrder'])) {
    $sql ="SELECT * FROM `address` where userId = ?";
    $res = Dbh::QueryDb($sql,array($_SESSION['userId']));
    $cim = $res[0]['city'].", ".$res[0]['Address']." ".$res[0]['door'];
$sql = "INSERT INTO `ordercon`(`userId`, `cim`, `orderTime`) VALUES (?,?, NOW())";
$lastId = Dbh::UploadDb($sql,array($_SESSION['userId'],$cim));

for($i = 0;$i < count($_SESSION['cart']);$i++)
{
    $sql = "INSERT INTO `groupconn`(`orderId`, `itemId`, `quantity`) VALUES (?,?,?)";
    Dbh::UploadDb($sql,array($lastId,$_SESSION['cart'][$i]->id,$_SESSION['cart'][$i]->quantity));
}

$_SESSION['cart'] = null;
$_SESSION['cart'] = array();
header("Location: index.php?site=profile");



 
}


?>