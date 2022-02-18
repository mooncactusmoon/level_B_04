<?php
$type = $_GET['type'] ?? 0;
if ($type == 0) {
   $nav = "全部商品";
   $rows = $Goods->all(['sh' => 1]);
} else {
   $t = $Type->find($type);
   if ($t['parent'] == 0) {
      $nav = $t['name']; //這是大分類
      $rows = $Goods->all(['sh' => 1, 'big' => $type]);
   } else {
      //這是中分類
      $b = $Type->find($t['parent']);
      $nav = $b['name'] . " > " . $t['name'];
      $rows = $Goods->all(['sh' => 1, 'mid' => $type]);
   }
}
?>

<h1><?= $nav; ?></h1>
<?php
foreach ($rows as $row) {
?>
<div class="all" style="display:flex;justify-content:center;height:170px;">
   <div class="pp ct" style='padding:10px;width:35%;'>
   <a href="?do=detail&id=<?=$row['id'];?>"><img src='img/<?=$row['img'];?>' style='width:70%;height:100%'></a>
   </div>
   <div style="width:65%" class="pp">
      <div class="ct tt"><?=$row['name'];?></div>
      <div>
         價格:<?=$row['price'];?>
         <a href="?do=buycart&id=<?=$row['id'];?>&qt=1" style='float:right'><img src="./icon/0402.jpg" alt=""></a>
      </div>
      <div>規格:<?=$row['spec'];?></div>
      <div>簡介:<?=mb_substr($row['intro'],0,20);?>...</div>
   </div>
</div>
<?php
}

?>