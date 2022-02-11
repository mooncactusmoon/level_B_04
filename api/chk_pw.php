<?php
include_once "../base.php";
$db=new DB($_POST['table']);
$chk=$db->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
   echo 1;
}else{
   echo 0;
}

// echo $Mem->math('count','*',['acc'=>$_POST['acc']]);

?>