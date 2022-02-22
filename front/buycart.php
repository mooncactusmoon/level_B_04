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
?>
<h1 class="ct"><?=$_SESSION['member'];?>的購物車</h1>
<table class="all">
   <tr class="tt ct">
      <td>編號</td>
      <td>商品名稱</td>
      <td>數量</td>
      <td>庫存量</td>
      <td>單價</td>
      <td>小計</td>
      <td>刪除</td>
   </tr>
   <?php
   foreach($_SESSION['cart'] as $id => $qt){
      $item=$Goods->find($id);
   ?>
   <tr class="pp ct">
      <td><?=$item['id'];?></td>
      <td><?=$item['name'];?></td>
      <td><?=$qt;?></td>
      <td><?=$item['stock'];?></td>
      <td><?=$item['price'];?></td>
      <td><?=$item['price']*$qt;?></td>
      <td>
         <img src="icon/0415.jpg" onclick="delCart(<?=$id;?>)">
         <!-- <img src="icon/0415.jpg" onclick="delCart(this,<\?=$id;?>)"> -->
      </td>
   </tr>
   <?php
   }
   ?>
</table>
<div class="ct">
   <img src="icon/0411.jpg" onclick="location.href='index.php'">
   &nbsp;&nbsp;
   <img src="icon/0412.jpg" onclick="location.href='?do=checkout'">

</div>


<?php
}

?>

<script>
   function delCart(id){
      $.post("api/del_cart.php",{id},()=>{
         location.href='?do=buycart';
      })
   }
   // 補充 - 網頁不重整的方式 (搭配39行-純前端作法) 
   //function delCart(dom,id){
   //    $.post("api/del_cart.php",{id},()=>{
   //       $(dom).parents('tr').remove()
   //    })
   // }
</script>