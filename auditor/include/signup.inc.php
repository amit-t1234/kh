<?php
	session_start();
	if (isset($_POST['submit']) && isset($_SESSION['id'])) {			
		include_once 'dbh.inc.php';
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sector = $_POST['sector'];

		try {
			$passwordHash = password_hash($password, PASSWORD_DEFAULT);
			$stmt = $mysqli->prepare("INSERT INTO moderator (name, email, password, sector) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $name, $email, $passwordHash, $sector);
			$stmt->execute();
			header("Location: ../index.php");
			exit();
		} catch(Exception $e) {
			if($mysqli->errno === 1062) {
				echo $e;
				header("Location: ../index.php?signup=504");
				exit();
			}
		}
	} else {
		header("Location: ../signup.php?signup=0");
		exit();
	}
?>