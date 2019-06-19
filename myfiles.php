<?php
  require("functions.php");
  global $description;
  global $dateFrom;
  global $dateTo;
  global $dateNotice;
  global $photoID;
  
  if(!isset($_SESSION["userId"])){
	  header("Location: avaleht.php");
	  exit();
  }

  if(isset($_GET["logout"])){
	session_destroy();
	header("Location: avaleht.php");
	exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/modal.css">
  <link rel="stylesheet" type="text/css" href="style/pealeht.css">
  <script src="javascript/pealeht.js"></script>
  <script src="javascript/modal.js" defer></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Failid</title>
</head>
<body>
  <div class="grid-container">
    <div class="grid-sidebar">
      <div id="mySidenav" class="sidenav">
        <div id="greeting"><h1 id="text">Tere, <?php echo $_SESSION["userName"]; ?>!</h1></div>
          <div id="menutext"><a style="font-family: 'digital-clock-font'; cursor:pointer" href="upload.php">Lae üles</a>
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
      <div id="files" class="files">
        <div action="myfiles.php" id="searchBox">
          <form method="post" name="searchBox">
            <input id="searchtext" name="searchBox" type="text" placeholder="">
            <input id= "search" type="submit" value="Otsi"/>
          </form>
          <form action="myfiles.php" method="post">
            <select id="select" name="subject">
              <option value="failinimi" >Nimi</option>
              <option value="Timestamp">Algus kuupäev</option>
              <option value="lopp" selected="selected">Lõpu kuupäev</option>
            </select>
            <select id="select" name="sort">
              <option value="ASC" selected="selected">Kasvav </option>
              <option value="DESC" >Kahanev </option>
            </select>
            <input id="sortbutton" name="sortButton" type="submit" value="Sorteeri"/>
          </form>
        </div>
      <?php
      $tulemus = showupload($description, $dateFrom, $dateTo, $dateNotice);
      echo $tulemus;
      ?>
      <div id="myModal" class="modal">
      <span id="close" class="close">&times;</span>
      <img class="modal-content" id="modalImg">
      <div id="caption"></div>
      </div>
    </div>
    </div>
</div>
</div>
</body>
</html>
