<?php
if(isset($_SESSION['userId']))
{
    header("location:index.php");
}
?>
<div class="header">
                    <img src="img/header.jpg" id="headerPic" alt="">
                    <h2>Bejelentkezés</h2>
                </div>

<form action="" method="post" class="loginForm  p-3">
 
    <hr>

    <label for="emailLog">E-mail cím: </label>
    <input type="email" name="emailLog" id="emailLog" class="form-control" placeholder="E-mail cím..."><br>
    <label for="emailLog">Jelszó:  </label>
    <input type="password" name="pwdLog" id="pwdLog" class="form-control" placeholder="Jelszó...">
    <hr>

    <p id="hiba"><?php
    if(isset($_GET['error']))
    {
        echo 'Hibás bejelentkezési adatok!';
    }
    ?></p>
    
    <div class="row">
        <div class="col-md-8">
            
            <input class="btn btnReg btn-primary" type="submit" id="submitLogin" name="submitLogin" value="Bejelentkezés">
        </div>

        <div class="col-md-4"><a class="btn btnReg btn-primary" href="?site=register">Regisztrálás</a></div>
    </div>
</form>
<script src="js/loginCheck.js"></script>

<?php
if(isset($_POST['submitLogin']))
{
    $sql = "SELECT * from users where email like ?";
    $res = Dbh::QueryDb($sql,array($_POST['emailLog']));
    if(count($res) === 0)
    {
        header("Location: ?site=login&error=invalidLogin");
        exit();
    }
    $checkPwd = password_verify($_POST['pwdLog'],$res[0]['pwd']);
    if(!$checkPwd)
    {
        header("Location: ?site=login&error=invalidLogin");
    }
    elseif($checkPwd === true)
    {
        $_SESSION['userId'] = $res[0]['userId'];
        $_SESSION['email'] = $res[0]['email'];
        $_SESSION['admin'] = $res[0]['admin'];
        $_SESSION['secondName'] = $res[0]['secondName'];
        $_SESSION['cart'] = array();
        header("Location: index.php");  
    }
}



?>