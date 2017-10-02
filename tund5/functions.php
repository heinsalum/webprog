<?php
	$database = "if17_heinmark";
	
	//alustan sessiooni
	session_start();
	
	//sisselogimise funktsiooni 
	function signIn($email, $password){
		$notice = "";
		//ühenduse loomine serveriga
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT id, email, password FROM vpusers WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb);
		$stmt->execute();
		
		//kontrollime vastavust
		if ($stmt->fetch()){
			$hash = hash("sha512", $password);
			if ($hash == $passwordFromDb){
				$notice = "Logisite sisse!";
				
				//Määran sessiooni muutujad
				$_SESSION["uderId"] = $id;
				$_SESSION["userEmail"] = $emailFromDb;
				
				//liigume edasi pealehele
				header("Location: main.php");
				exit();
				} else {
					$notice = "vale salasõna!";
				
			}
		
		} else {
			$notice = 'Sellise kasutajatunnusega "' .$email .'"
			pole registreeritud!';
		}
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
	//kasutaja salvestamise funkt.
	function signUp($signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword){
		//loome andmebaasiühenduse
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette käsu andmebaasiserverile
		$stmt = $mysqli->prepare("INSERT INTO vpusers (firstname, lastname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s-string, i-integer, d-decimal
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();	
	}
	
	
	//sisestuse kontrollimise funktsioon
	function test_input($data){
		$data = trim($data); //tühikud jms eemaldada
		$data = stripslashes($data); //kaldkriipsud jms eemaldada
		$data = htmlspecialchars($data); //keelatud sümbolid eemaldada
		return $data;
	}
	
	/*
	$x = 5;
	$y = 6;
	echo ($x + $y);
	addValues();
	
	function addValues(){
		$z = $GLOBALS["x"] + $GLOBALS["y"]
		$z = $x + $y;
		echo "Summa on: " .$z;
		$a = 3;
		$b = 4;
		echo "Teine summa on: " .($a + $b);
	}
	echo "Kolmas summa on: " .($a + $b);
	*/
	
?>