<?php

class Articles {
    private $db;
    private $articleId;
    private $quantity;

    function __construct()
    {
        //connect to db
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }
    //get all articles
    public function getArticles(): array {
        $sql = "SELECT * FROM shop ORDER BY articleId;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    //add articles to cart
    public function addToCart($article1, $article2, $article3, $article4) {
         $sql = "INSERT INTO cart(article1, article2, article3, article4)VALUES($article1, $article2, $article3, $article4);";
            $result = $this->db->query($sql);
            return $result;
            echo $article1;
    }
    //functions to update stock that aren't used due to triggers in db
    /*
    public function updateStock() {
                $this->addToCart($article1, $article2, $article3, $article4);
            $article1 = $_GET['Article1'];
        $sql = "UPDATE shop SET inStock = inStock - '$article1' WHERE articleId = 1;";
        echo $sql;
         $result = $this->db->query($sql);
        return $result;
    } 
  
    public function updateInStock() {
        $this->addToCart($article1, $article2, $article3, $article4);
        $sql = "UPDATE shop SET inStock = inStock + 10 WHERE inStock = 0 AND articleId = 1;";
        $result = $this->db->query($sql);
        return $result;
    }
   
    public function updateInStockThree() {
        $this->addToCart($article1, $article2, $article3, $article4);
        $sql = "UPDATE shop SET inStock = inStock + 20 WHERE inStock < 20 AND articleId = 3;";
        $result = $this->db->query($sql);
        return $result;
    }
    
     public function updateInStockFour() {
        $this->addToCart($article1, $article2, $article3, $article4);
        $sql = "UPDATE shop SET inStock = inStock + new.article4 WHERE articleId = 4;";
        $result = $this->db->query($sql);
        return $result;
    }
    
    */
    //get specific article
     public function getArticleFromId($articleId)
    {
        $articleId = intval($articleId);
        $sql = "SELECT inStock FROM shop where articleId = $articleId;";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }
    
    
}