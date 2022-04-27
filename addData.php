<?php

include_once "functions.php";
$objfile = new fileManager();
$objfile->fileName="UsersFile.txt";
$objfile->Separator="~";

$actobj=new user();
$actobj->mail=$_REQUEST["mail"];
$actobj->pass=$_REQUEST["pass"];
$actobj->name=$_REQUEST["name"];


$actobj->storeuser($objfile);

header("location:list.php");

?>