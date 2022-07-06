<?php

class Orders {
    private $db;
   

    function __construct()
    {
        //connect to db
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }
//get all orders
    public function getOrders(): array {
        $sql = "SELECT * FROM cart ORDER BY orderId;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
 
    
    
}