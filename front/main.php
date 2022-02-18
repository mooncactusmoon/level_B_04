<?php
$type=$_GET['type']??0;
if($type==0){
    $nav="全部商品";
}else{
    $t=$Type->find($type);
    if($t['parent']==0){
        $nav=$t['name']; //這是大分類
    }else{
       //這是中分類
        $b=$Type->find($t['parent']);
        $nav= $b['name'] ." > ".$t['name'];
    }
}
?>

<h1><?=$nav;?></h1>