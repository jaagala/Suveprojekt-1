<?php
require ("functions.php");
//kui pole sisselogitud
  if(!isset($_SESSION["userId"])){
	header("Location:avaleht.php");
	exit();
  }
  //Väljalogimine
  if(isset($_GET["logout"])){
	session_destroy();
	header("Location:avaleht.php");
	exit();
  }
  $mybgcolor = "#FFFFFF";
  $mytxtcolor = "#000000";
if(isset($_POST['submit'])){
  $file = $_FILES['fileToUpload'];
  $dateFrom = date('Y-m-d', strtotime($_POST['algus']));
  $dateTo = date('Y-m-d', strtotime($_POST['lopp']));
  $dateNotice = date('Y-m-d', strtotime($_POST['alert']));
  $description = $_REQUEST['Description'];
  $filename = $_FILES['fileToUpload']['name'];
  $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
  $fileSize = $_FILES['fileToUpload']['size'];
  $fileError = $_FILES['fileToUpload']['error'];
  $fileType = $_FILES['fileToUpload']['type'];
  $fileExt = explode('.', $filename);
  $fileActualExt = strtolower(end($fileExt));
  $description .="." .$fileActualExt;
  $allowed = array('jpg', 'jpeg','png','pdf');
  if(in_array($fileActualExt, $allowed)){
    if($fileError ===0){
      if($fileSize < 5000000){
        $fileNameNew =  $description;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        upload($description, $dateFrom, $dateTo, $dateNotice);
      } else {
        echo "fail on liiga suur";
      }
    } else {
      echo "oli viga üleslaadimisel";
    }
  }else{
    echo "Ei saa sellist tüüpi faili laadida";
  }
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="pealeht.css">
  <script src="pealeht.js"></script>
  <title>Faili üleslaadimine</title>
</head>
<body>
<div class="grid-container">
  <div class="grid-sidebar">
   <div id="mySidenav" class="sidenav">
   <div id="greeting"> <h1 id="text">Tere, <?php echo $_SESSION["userName"]; ?>!</h1> </div>
   <div id="menutext">  <a style="font-family: 'digital-clock-font'; cursor:pointer" href="upload.php">Lae üles</a>
   <br>
  <br>
  <a id="text" style="font-family: 'digital-clock-font';cursor:pointer" href="myfiles.php">Sinu lepingud</a>
  <br>
  <br>
  <a href="?logout=1">Logi välja</a>
  </div>
  </div>
  </div>
  <div class="grid-body">
  <div id="form" class="form">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div> <img src="signature.png" id="logo" alt="logo"></div>
      <h1>Lae leping üles</h1>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <p>Faili nimi:</p>
      <input type="text" rows="2" cols="35" name="Description" id="Description">
      <br/>
      <p>Lepingu algus: </p>
      <input type="date" id="algus" name="algus">
      <br>
      <p>Lepingu lõpp: </p>
      <input type="date" id="lopp" name="lopp" >
      <br>
      <p>Teavita lepingu lõpukuupäevast: </p>
      <input type="date" id="alert" name="alert">
      <br>
      <input TYPE="submit" name="submit" value="Lae üles">
  </form>
  </div>
  </div>
  </div>
</body>
</html>
