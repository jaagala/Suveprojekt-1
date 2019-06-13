<?php
require("functions.php");
$deleteThis = "uploads/".$_GET['file'];

$fileName = $_GET['file'];
// muuda kaustas
updateThis();
header("location: myfiles.php");
 ?>
