<?php
include_once "functions.php";
$actobj=new user();
$actobj->deleteuser($_GET["id"]);

header("location:list.php");


?>