<?php

include_once "functions.php";
$objfile = new fileManager();
$objfile->fileName="UserTypes.txt";
$objfile->Separator="~";

$actobj=new type();
$actobj->typename=$_REQUEST["typename"];

$actobj->storetype($objfile);

header("location:utlist.php");
?>