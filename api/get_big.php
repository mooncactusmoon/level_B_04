<?php include_once "../base.php";
$bigs=$Type->all(['parent'=>0]);

foreach($bigs as $key => $b){
   echo "<option value='{$b['id']}'>{$b['name']}</option>";
}