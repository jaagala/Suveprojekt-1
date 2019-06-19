<?php
require("functions.php");
$deleteThis = "uploads/".$_GET['file'];
$fileName = $_GET['file'];
updateThis();
header("location: myfiles.php");
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Failid</title>
 </head>
 <body>
 </body>
 </html>
