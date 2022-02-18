<?php
if(!isset($_SESSION['member'])){
   to("?do=login");
   exit();
}
echo "你要購買的商品id為".$_GET['id'];
echo "數量為".$_GET['qt'];
?>