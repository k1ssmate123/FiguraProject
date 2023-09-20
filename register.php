<?php
if(isset($_SESSION['userId']))
{
    header("location:index.php");
}
?>
<div class="header">
                    <img src="img/header.jpg" id="headerPic" alt="">
                    <h2>Regisztrálás</h2>
                </div>

<form action="" method="post" class="loginForm  p-3">

<div class="row">

<div class="col-md-6">
    <input type="email" class="form-control" name="emailReg" id="emailReg" placeholder="E-mail cím..."><br>
    <input type="text" class="form-control" name="firstNameReg" id="firstNameReg" placeholder="Vezetéknév..."><br>
    <input type="text" class="form-control" name="secondNameReg" id="secondNameReg" placeholder="Keresztnév..."><br>
    <input type="password" class="form-control" name="pwdReg" id="pwdReg" placeholder="Jelszó...">
    <br>
    <input type="password" class="form-control" name="pwdRegAgain" id="pwdRegAgain" placeholder="Jelszó újra...">
 






</div><hr class="line d-md-none ml-2 mt-2 mb-2" />
<div class="col-md-6 mt-md-0">


<input type="text" class="form-control" name="city" id="city" placeholder="Város..."><br>
    <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="Irányítószám..."><br>
    <input type="text" class="form-control" name="address" id="address" placeholder="Lakcím..."><br>
    <input type="text" class="form-control" name="door" id="door" placeholder="Emelet, ajtószám... (nem kötelező)">
    <br>
    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefonszám...">
    <br>
  
   



</div>

<li id="adat"><input type="checkbox" name="data" id="data"> <label for="data">Az <a href="adatkezelesOldal.pdf">adatkezelési tájékoztatót</a> elolvastam, és elfogadom.</label></li>
<p id="hiba"><?php
                   if(isset($_GET["error"]))
                   {
                        if($_GET["error"] == "emailExists")
                        {
                            echo "Ezzel az email címmel már regisztráltak!";
                        }
                        if($_GET["error"] == "none")
                        {
                            echo "Sikeres regisztráció! <br><a href='?site=login'>Bejelentkezés</a>";
                        }
                   }


                    ?></p>    
                    <hr>
 <input type="submit" class="btn btn-primary btnReg" id="submitReg" name="submitReg" value="Regisztrálás">
</form>
</div>

<script src="js/registerCheck.js"></script>




<?php
 if (isset($_POST['submitReg']))
 {
     if(EmailExists($_POST['emailReg'])=== 0){

     $pwdHashed = password_hash($_POST["pwdReg"],PASSWORD_BCRYPT);
     $sql = "INSERT INTO `users`(`email`, `pwd`, `firstName`, `secondName`, `admin`) VALUES (?,?,?,?,?)";
     $arr = array($_POST['emailReg'],$pwdHashed,$_POST['firstNameReg'],$_POST['secondNameReg'],0);
    
 
     Dbh::UploadDb($sql,$arr);

     $sql = "SELECT userId from users where email = ?";
     $res = Dbh::QueryDb($sql,array($_POST['emailReg']));
     
     $sql = "INSERT INTO `address`(`userId`,`city`, `postalCode`, `door`,`Address`, `phone`) VALUES (?,?,?,?,?,?)";
     $arr = array($res[0]['userId'],$_POST['city'],$_POST['postalCode'],$_POST['door'],$_POST['address'],$_POST['phone']);
      Dbh::UploadDb($sql,$arr);
     header("Location: ?site=register&error=none");}
     else
     {
        header("Location:?site=register&error=emailExists");
     }
 }


 function EmailExists($email)
 {
     $sql = "SELECT * from users where email = ?";
     $arr = array($email);
     $res = Dbh::QueryDb($sql, $arr);
     return count($res);

 }

?>