<?php
$type=$_GET['type']??0;
if($type==0){
    $nav="全部商品";
    $rows=$Goods->all(['sh'=>1]);
}else{
    $t=$Type->find($type);
    if($t['parent']==0){
        $nav=$t['name']; //這是大分類
        $rows=$Goods->all(['sh'=>1,'big'=>$type]);
    }else{
       //這是中分類
        $b=$Type->find($t['parent']);
        $nav= $b['name'] ." > ".$t['name'];
        $rows=$Goods->all(['sh'=>1,'mid'=>$type]);
    }
}
?>

<h1><?=$nav;?></h1>
<?php
foreach($rows as $row){
   echo $row['name']."<br>";
}

?>