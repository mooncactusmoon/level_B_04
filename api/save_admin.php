<?php
include_once "../base.php";

$_POST['pr']=serialize($_POST['pr']);
$Admin->save($_POST);

to("../back.php?do=admin"); //如果用api的方式不用這一行