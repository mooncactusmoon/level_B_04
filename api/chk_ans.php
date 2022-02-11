<?php
include_once "../base.php";
if($_POST['ans']==$_SESSION['ans']){
   echo 1;
}else{
   echo 0;
}

?>