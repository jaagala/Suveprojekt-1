
<?php
require("functions.php");
$deleteThis = "uploads/".$_GET['file'];
$fileName = $_GET['file'];
unlink($deleteThis);
deleteImage($fileName);
header("location: myfiles.php");
 ?>
