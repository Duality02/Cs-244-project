<?php

include_once "functions.php";
$actobj=new type();
$actobj->deletetype($_GET["id"]);

header("location:utlist.php");

?>