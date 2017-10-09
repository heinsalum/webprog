<?php
	require("functions.php");
	
	//kui pole sisse loginud, siis sisselogimise lehele
	if (!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}	
	
	//kui logid välja:
	if (isset($_GET["logout"])){
		//lõpetame sessiooni
		session_destroy();
		header("Location: login.php");
	}
	
	/*
	while($stmt->fetch()){
		
	}
	*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Markus Heinsalu veebiprogemise asjad</title>
</head>
<body>
	<h1>Markus Heinsalu</h1>
	<p>See veebileht on loodud veebiprogrammeerimise kursusel ning ei sisalda mingisugust tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi välja!</a></p>
	<p><a href="?main.php">Pealeht!</a></p>
	<hr>
	<h2>Kõik systeemi kasutajad</h2>
	<table "border:"1" style="border: 1px solid black; border-collapse: collapse">
	<tr>
		<th>Eesnimi</th><th>Perekonnanimi</th><th>E-posti aadress</th>
	</tr>
	<tr>
		<td>Juku</td><td>Porgand</td><td>juku@gmail.com</td>
	</tr>
		<td>John</td><td>Konn</td><td>john@gmail.com</td>
	</tr>
		<td>Peeter</td><td>Pann</td><td>peeter@gmail.com</td>
	</tr>
		<td>Timo</td><td>Till</td><td>timo@gmail.com</td>
	</tr>
		<td>Tauri</td><td>Tuisk</td><td>tauri@gmail.com</td>
	</tr>
		<td>Tarvi</td><td>Tuul</td><td>tarvi@gmail.com</td>
	</tr>
		<td>Tarvo</td><td>Tuuker</td><td>tarvo@gmail.com</td>
	</tr>
		<td>Karl</td><td>Suur</td><td>karl@gmail.com</td>
	</tr>
		<td>Mark</td><td>Murakas</td><td>mark@gmail.com</td>
	</tr>
		<td>Mehis</td><td>Maasikas</td><td>mehis@gmail.com</td>
	</tr>
	</table>
	
</body>
</html>