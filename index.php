<?php
//Tilda Källström 2022 
include_once('config.php');
include('includes/header.php');
?>
<h1>Articles</h1>
<?php
$article = new Articles();
$articlelist = $article->getArticles();
//writeout articles
?>
<table>
  <tr>
    <th>Article Id</th>
    <th>In stock</th>
  </tr>
  <?php
foreach($articlelist as $article) {
        echo "<tr>
    <td>" . $article['articleId'] . "</td>
    <td>" . $article['inStock'] ."</td>
  </tr>";
    }
      ?>
   </table>
   <?php
    
      $article = new Articles();
 //place order
if (isset($_POST['Article1'])) {
    $articleId = $_GET['articleId'];
     $article1 = $_POST['Article1'];
     $article2 = $_POST['Article2'];
     $article3 = $_POST['Article3'];
     $article4 = $_POST['Article4'];
      
     if ($article->addToCart($article1, $article2, $article3, $article4)) {
         
         echo "<p>Your order has been made!</p>";
     } else {
         echo "<p>Error, please try again.</p>";
     }
 }
    ?>
    
    
    <h2>Buy articles</h2>
    <div>
 <form method="post" action="index.php" enctype="multipart/form-data" class='profileform'>
     <?php
    // show specific article
     $articleId = 1;
     $show_article = $article->getArticleFromId($articleId);
     $articleId = $show_article['articleId'];
     $inStock = $show_article['inStock'];
     
    if($inStock != 0) {
         echo '<label for="Article1">Article 1: </label><input type="number" value="0" min=0 placeholder="0" max=' . $inStock . ' id="Article1" name="Article1" value="' . $Article1 . '">';
     } else {
         echo '<label for="Article1">Article 1: </label><br>Unfortunately this item is out of stock. <input type="hidden" min=0 max=' . $inStock . ' id="Article1" name="Article1" value="0"><br><br>';
     }
     
     ?>
     
      <?php
     $articleId = 2;
     $show_article = $article->getArticleFromId($articleId);
     $articleId = $show_article['articleId'];
     $inStock = $show_article['inStock'];
     
   //  echo $articleId, $inStock;
     
    if($inStock != 0) {
         echo '<label for="Article2">Article 2: </label><input type="number" value="0" min=0 placeholder="0" max=' . $inStock . ' id="Article2" name="Article2">';
     } else {
         echo '<label for="Article2">Article 2: </label><br>Unfortunately this item is out of stock. <input type="hidden" min=0 max=' . $inStock . ' id="Article2" name="Article2" value="0"><br><br>';
     }
     ?>
     
       <?php
     $articleId = 3;
     $show_article = $article->getArticleFromId($articleId);
     $articleId = $show_article['articleId'];
     $inStock = $show_article['inStock'];
     
   //  echo $articleId, $inStock;
     
    if($inStock != 0) {
         echo '<label for="Article3">Article 3: </label><input type="number" value="0" min=0 placeholder="0" max=' . $inStock . ' id="Article3" name="Article3">';
     } else {
         echo '<label for="Article3">Article 3: </label><br>Unfortunately this item is out of stock. <input type="hidden" min=0 max=' . $inStock . ' id="Article3" name="Article3" value="0"><br><br>';
     }
     ?>
    
      <?php
     $articleId = 4;
     $show_article = $article->getArticleFromId($articleId);
     $articleId = $show_article['articleId'];
     $inStock = $show_article['inStock'];
     
   //  echo $articleId, $inStock;
     
    if($inStock != 0) {
         echo '<label for="Article4">Article 4: </label><input type="number" min=0 placeholder="0" value="0" max=' . $inStock . ' id="Article4" name="Article4">';
     } else {
         echo '<label for="Article4">Article 4: </label><br>Unfortunately this item is out of stock. <input type="hidden" min=0 max=' . $inStock . ' id="Article4" name="Article4" value="0"><br><br>';
     }
 
     ?>
     <input type="submit" value="Buy" name="buy">
 </form>
 </div>
 <h2>Orders</h2>
 <?php
 $order = new Orders();
 //writeout orders
$orderlist = $order->getOrders();
?>
<table>
  <tr>
    <th>OrderId</th>
    <th>Amount article 1</th>
    <th>Amount article 2</th>
    <th>Amount article 3</th>
    <th>Amount article 4</th>
  </tr>
  
<?php
foreach($orderlist as $order) {
        echo "<tr>
    <td>" . $order['orderId'] . "</td>
    <td>" . $order['article1'] ."</td>
    <td>" . $order['article2'] . "</td>
    <td>" . $order['article3'] . "</td>
    <td>" . $order['article4'] . "</td>
  </tr>";
    } 
    
   ?>
   </table>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
