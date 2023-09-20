<form action="admin.handler.php" method="post">
    <div class="row">

        <?php
      
        class Names
        {
            public $name;
            public $id;
            public $email;
            public $tel;
            public $cim;
            public $orderId;
            public function __construct($fname, $sname, $id, $tel, $email, $cim,$orderId)
            {
                $this->name = $fname . " " . $sname;
                $this->id = $id;
                $this->tel = $tel;
                $this->email = $email;
                $this->cim = $cim;
                $this->orderId = $orderId;
              
            }
        }
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {

            $sql = "SELECT quantity,cim, groupconn.conId, ordercon.orderId,users.userId,address.phone,menuitems.itemName,email,cim,firstName,secondName FROM `ordercon` inner join users on users.userId = ordercon.userId inner join groupconn on groupconn.orderId = ordercon.orderId inner join menuitems on menuitems.itemId = groupconn.itemId inner join address on address.userId = users.userId;";
            $res = Dbh::QueryDb($sql, array());
            $names = array();
            for ($i = 0; $i < count($res); $i++) {
                $obj = new Names($res[$i]["firstName"], $res[$i]['secondName'], $res[$i]['userId'], $res[$i]['phone'], $res[$i]['email'], $res[$i]['cim'], $res[$i]['orderId']);
                if (!in_array($obj, $names)) {
                    array_push($names, $obj);
                }
            }
            for ($i = 0; $i < count($names); $i++) {
                echo "<div class='col-md-6 p-3'><h1>" . $names[$i]->name . "</h1>";
              
                echo '<h2 class="address">' . $names[$i]->cim . '</h6>';
                echo "<h6 class='text-center' >" . $names[$i]->tel . "</h2>";
                echo "<h6 class='text-center'>" . $names[$i]->email . "</h2>";
                for ($j = 0; $j < count($res); $j++) {
                    if ($res[$j]['orderId'] == $names[$i]->orderId) {

                        echo '<div class="text-center"><div class="element"><h5>' . $res[$j]['itemName'] . ' - '. $res[$j]['quantity'].'x</h5>';
                        echo '<button name="delete" class="btn btn-success" value="'.$res[$j]['conId'].'" type="submit">
                        X
                      </button> </div></div>';
                    }
                }
                echo '</div>';
            }
        } else {
            header("Location:?site=main");
        }


   
        ?></div>
</form>