<?php
    class Order
    {
        public $id;
        public $name;
        public $quantity;
        public $ar;

        public function __construct($id,$name,$ar)
        {
            $this->id = $id;
            $this->name = $name;
            $this->quantity = 1;
            $this->ar = $ar;
        }

        static function CartSum($cart = array())
        {
            $num = 0;
            for($i = 0;$i < count($cart);$i++)
            {
                $num += $cart[$i]->quantity;
            }
            return $num;
        }  
        public function GetPrice()
        {
            return $this->quantity*$this->ar;
        } 
        
    }




?>