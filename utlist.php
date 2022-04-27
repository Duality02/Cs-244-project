<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>List of user types</h1>
<table border=1>
        <tr>
            <td>id</td>
            <td>type</td>
            <td>delete</td>
        </tr>

    <?php

   include_once "functions.php";
   $obj=new type();
   $arr=[];
   $arr=$obj->listalltypes();
   for($i=0;$i<count($arr);$i++)
   {
       echo"<tr><td>".$arr[$i]->id."</td><td>".$arr[$i]->typename."</td><td> <a href=del.php?id".$arr[$i]->id. "> delete </a></td></tr>";
   }

    ?>
    <tr>
        <td>
            <a href="addtype.html">add type<a>
        </td>
    </tr>

</table>

</body>
</html>