<?php
if(isset($_GET['id']) && isset($_GET['qt'])){
   //存成2維陣列，裡面的每個陣列=[商品(id)=>幾個(qt)]
   $_SESSION['cart'][$_GET['id']]=$_GET['qt']; 

}
if(!isset($_SESSION['member'])){
   to("?do=login");
   exit();
}
if(empty($_SESSION['cart'])){
   echo "<h1 class='ct'>購物車中無商品</h1>";
}else{

   print_r($_SESSION['cart']);
}

?>