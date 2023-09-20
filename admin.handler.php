<?php
include_once "dbConnection.class.php";
     if(isset($_POST['delete']))
     {
         $sql = "DELETE FROM `groupconn` WHERE conId =?";
         Dbh::UploadDb($sql,array($_POST['delete']));
     }
     header("location: index.php?site=admin");

?>