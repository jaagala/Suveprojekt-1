<?php
	require("functions.php");
	echo "<body style='background-color:#FFFFFF'>";
	$email = "";
	$firstName = "";
  $lastName = "";
	$notice = "";
	$firstNameError = "";
  $lastNameError = "";
	$emailError = "";
	$passwordError = "";
	$error = "";
	//kui on uue kasutaja loomise nuppu vajutatud
	if(isset($_POST["submitUserData"])){
		if (isset($_POST["firstName"]) and !empty($_POST["firstName"])){
			$firstName = test_input($_POST["firstName"]);
		}else{
		$firstNameError="Palun sisesta eesnimi!";
		}
   	if(isset($_POST["submitUserData"])){
			if (isset($_POST["lastName"]) and !empty($_POST["lastName"])){
				$lastName = test_input($_POST["lastName"]);
			}else{
				$lastNameError="Palun sisesta perekonnanimi!";
			}
			if(isset($_POST["email"]) and !empty($_POST["email"])){
				$email = test_input($_POST["email"]);
			}else{
				$emailError = "Sisestage korrektne email!";
			}
			if(!empty($_POST["password"]) and ($_POST["password"] == $_POST["password2"])){
				$password = test_input($_POST["password"]);
				$password2 = test_input($_POST["password2"]);
				if (strlen($_POST["password"]) < '8' ) {
					$passwordError = "Salasõna peab olema vähemalt 8 tähemärgi pikkune!";
				}
			}else {
				if($_POST["password"] != $_POST["password2"]) {
					$passwordError = "Salasõnad ei kattu!";
					if (strlen($_POST["password"]) < '8' ) {
						$passwordError = "Salasõna peab olema vähemalt 8 tähemärgi pikkune!";
					}
				} else{
		   		 $passwordError = "Palun sisestage salasõna!";
				}
			}
			if(empty($firstNameError) and empty($lastNameError) and empty($emailError) and empty($passwordError)){
				$notice = signup($firstName, $lastName, $email, $password, $password2);
			} else{
					$error = "Kasutaja loomisel tekkis viga!";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/newuser.css">
	<title>Konto loomine</title>
</head>
<body>
	<br>
	<div id="main">
	   <div> <img src="pics/signature.png" id="logo" alt="logo"></div>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <h1>Konto loomine</h1>
			<input name="firstName" pattern="[A-Za-zõäöüÕÄÖÜ]*" type="text" placeholder="Eesnimi" value="<?php echo $firstName; ?>"><br>
      <input name="lastName" pattern="[A-Za-zõäöüÕÄÖÜ]*" type="text" placeholder="Perekonnanimi" value="<?php echo $lastName; ?>"><br>
			<input type="email" name="email" placeholder="E-Mail" value="<?php echo $email; ?>"><br>
			<input type="password" name="password" type="text" placeholder="Salasõna" ><br>
			<input type="password" name="password2" type="text" placeholder="Salasõna uuesti" ><br>
			<input name="submitUserData" type="submit" value="Loo kasutaja"><br>
			<br>
			<a style="text-align:left;" href="avaleht.php">Tagasi avalehele</a>
		</form>
		<a1><?php echo $notice; ?></a1>
	</div>
</body>
</html>
