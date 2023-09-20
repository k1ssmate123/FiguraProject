<?php

class Dbh
{
    
    static function QueryDb($sql,$parameters = array()) //Adatbázis query
    {
        try
        {
            $username="root";
            $pwd="";
            $dbh = new PDO('mysql:host=localhost;dbname=Figura',$username,$pwd);
       

        }
        catch(PDOException $e)
        {
            print "Error: ".$e->getMessage()."<br>";
            die();
        }
        $stmt = $dbh->prepare($sql);
        
        
         
        if(!$stmt->execute($parameters))
        {
            $stmt = null;
            header("location: /Figura/index.php?error=stmtFailed");
            exit();
        }
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $res;
    
    }
    static function UploadDb($sql,$parameters = array()) //Adatbázis update
    {
        try
        {
            $username="root";
            $pwd="";
            $dbh = new PDO('mysql:host=localhost;dbname=Figura',$username,$pwd);
       

        }
        catch(PDOException $e)
        {
            print "Error: ".$e->getMessage()."<br>";
            die();
        }
        $stmt = $dbh->prepare($sql);
        
        
         
        if(!$stmt->execute($parameters))
        {
            $stmt = null;
            header("location: /Figura/index.php?error=stmtFailed");
            exit();
        }
       
        $stmt = null;
        return $dbh->lastInsertId();
    
    }

  
    

}
?>