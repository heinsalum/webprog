<?php
	require("functions.php");
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
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

	
	$target_dir = "../../Pics";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	//kas fail on pilt või midagi muud
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	}
    if($check !== false) {
        echo "See on pildifail - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "See ei ole pildifail.";
        $uploadOk = 0;
    }
	
	//kas fail on olemas juba
	if (file_exists($target_file)) {
		echo "Fail juba olemas.";
		$uploadOk = 0;
	} 
	
	//Faili suuruse kontroll
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Fail liiga suur.";
		$uploadOk = 0;
	} 
	
	//kas parameetrid on õiged
	if ($uploadOk == 0) {
		echo "Su faili ei laetud üles tundmatu vea tõttu.";
	//kui kõik hästi, siis proovib faili laadida
	} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Fail nimega ". basename( $_FILES["fileToUpload"]["name"]). " on edukalt üles laetud.";
    } else {
        echo "Tekkis tundmatu viga!";
    }
		

	$dirToRead = "../../Pics/";
	// kuna tahan ainult pildifaile, siis filtreerin
	$picFileTypes = ["jpg", "jpeg", "png", "gif"];
	$picFiles = [];
	// $allFiles = scandir($dirToRead);
	// loen kataloogi ja viskan kaks esimest massiivi liiget(. ja ..) välja
	$allFiles = array_slice(scandir($dirToRead),2);
	// var_dump($allFiles);
	
	// tsükkel, mis töötab ainult massiividega
	foreach ($allFiles as $file){
		$fileType = pathinfo($file, PATHINFO_EXTENSION);
		// Kas see tüüp on lubatud nimekirjas?
		if (in_array($fileType, $picFileTypes) == true){
			array_push($picFiles, $file);
		}
	} //foreach lõpp
	//var_dump($picFiles);
	
	// Mitu pilti on?
	$fileCount = count($picFiles);
	$picNumber = mt_rand(0, $fileCount - 1);
	$picToShow = $picFiles[$picNumber];
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Markus Heinsalu veebiprogemise asjad</title>
</head>
<body>
	<h1>Pildi lisamise leht</h1>
	<p>See veebileht on loodud veebiprogrammeerimise kursusel ning ei sisalda mingisugust tõsiseltvõetavat sisu.</p>
	<br>
	<form action="upload.php" method="post" enctype="multipart/form-data">
    <p>Lisa pilt mida soov üles laadida:</p>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
	<br>
	<p><a href="?logout=1">Logi välja!</a></p>
	<p><a href="main.php">Tagasi pealehele</a></p>
	</form>
</body>
</html>