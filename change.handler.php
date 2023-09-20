<?php
include_once "dbConnection.class.php";
session_start();
if(isset($_POST['changeBtn']))
{
   
        $sql = "UPDATE `address` SET `city`=?,`postalCode`=?,`door`=?,`Address`=?,`phone`=? WHERE userId=?";
        Dbh::UploadDb($sql,array($_POST['city'],$_POST['postalCode'],$_POST['door'],$_POST['address'],$_POST['phone'],$_SESSION['userId']));
        header("Location: index.php?site=profile");
    
    
}
?>