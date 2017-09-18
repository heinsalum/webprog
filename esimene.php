<?php
	//Muutujad
	$myName = "Markus";
	$myFamilyName = "Heinsalu";
	//$practiceStarted = "2017-09-11 8.15"
	$practiceStarted = date("d.m.Y") ." " ."8.15";
	$programName = "Notepad++";
	$programVersion = "7.5.1";
	$myemail = "markus.heinsalu@tlu.ee";
	
	//echo strtotime($practiceStarted);
	//echo strtotime("now");
	$timePassed = round((strtotime("now") - strtotime($practiceStarted)) / 60);
	echo $timePassed;
	
	$hourNow = date("H");
	$partOfDay = "";
	
	if ($hourNow < 8){
		$partOfDay = "Varane hommik";
	}
	if ($hourNow >= 8 and $hourNow < 16){
		$partOfDay = "koolipäev";
	}
	if ($hourNow > 16){
		$partOfDay = "vaba aeg";
	}
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
	

	<p> Mina olen 19-aastane linnavurle Tallinnast, tegelen korvpalliga ja olen 2 meetrit pikk. Mulle väga meeldib Tallinna Ülikool, sealhulgas ained, õppejõud kui ka kaastudengid.</p>
	
	<?php
		echo "<p>Täna on vastik ilm</p>";
		echo "<p>Täna on ";
		echo date("d.m.Y");
		echo ".</p>";
		echo "<p>Lehe laadimise hetkel oli kell: " .date("H:i:s") ."</p>";
		echo "Praegu on " . $partOfDay .".";
	?>
	<p>PHP käivitatakse lehe laadimisel ja siis tehakse kogu töö ära.
	Hiljem, kui vaja miskit jälle "kalkuleerida", siis laetakse kogu leht uuesti.</p>
	<?php
		echo "<p>Lehe autori täisnimi on: " .$myName ." " .
		$myFamilyName .".</p>"; 
		
	?>
	
	<?php
		echo "<p>Autor kasutab lehe töötlemiseks programmi: " .$programName ." " .
		$programVersion .".</p>";
	?>
	
	<?php
		echo "<p> Kui lehe avamisel esineb probleeme, siis kirjutada saidi loojale: " .$myemail ." " .
		$myName .".</p>";
	?>
	
</body>
</html>