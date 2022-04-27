<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>list of users</h1>
<table border=1>
        <tr>
            <td>id</td>
            <td>mail</td>
            <td>name</td>
            <td>birth date</td>
            <td>delete</td>
        </tr>
    
    <?php

   include_once "functions.php";
   $obj=new user();
   $arr=[];
   $arr=$obj->listallusers();
   for($i=0;$i<count($arr);$i++)
   {
       echo"<tr><td>".$arr[$i]->id."</td><td>".$arr[$i]->mail."</td><td>".$arr[$i]->name."</td><td>".$arr[$i]->birthday. "</td><td> <a href=delu.php?id".$arr[$i]->id. "> delete </a></td></tr>";
   }

    ?>
    <tr>
        <td>
            <a href="addData.html">add user<a>
        </td>
    </tr>
</table>
</body>
</html>