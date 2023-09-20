<?php
if(!isset($_SESSION['userId']))
{
    header("Location: index.php");
}
else
{
    $sql = "SELECT * from address where userId = ?";
$array = Dbh::QueryDb($sql,array($_SESSION['userId']));

}
?>
   <div class="header">
       <img src="img/header.jpg" id="headerPic" alt="">
       <h2>Adatok szerkesztése</h2>
   </div>
<div class="p-3">
    <form action="change.handler.php" method="post">
    
    
    
    <label for="city">Város</label> <input type="text" class="form-control" name="city" value="<?php echo $array[0]['city'];?>" id="city" placeholder="Város..."><br>
       <label for="postalCode">Irányítószám</label> <input type="text" class="form-control" value="<?php echo $array[0]['postalCode'];?>" name="postalCode" id="postalCode" placeholder="Irányítószám..."><br>
       <label for="address">Cím</label>  <input type="text" class="form-control" value="<?php echo $array[0]['Address'];?>" name="address" id="address" placeholder="Lakcím..."><br>
       <label for="door">Emelet, ajtószám</label>   <input type="text" class="form-control" value="<?php echo $array[0]['door'];?>" name="door" id="door" placeholder="Emelet, ajtószám... (nem kötelező)">
        <br>
        <label for="phone">Telefonszám</label>  <input type="text" class="form-control" value="<?php echo $array[0]['phone'];?>" name="phone" id="phone" placeholder="Telefonszám...">
        <br>
    

    
    
    
        <button type="submit" class="btn btnReg btn-primary" name="changeBtn">Adatok megváltoztatása</button>
    </form>
</div>

