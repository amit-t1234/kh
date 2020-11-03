<?php
	session_start();

	if (isset($_POST['submit'])) {
	
		include_once 'dbh.inc.php';

		$email = $_POST['email'];
		$password = $_POST['password'];

		//check the inputs
		$stmt = $mysqli->prepare("SELECT * FROM moderator WHERE email=?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows < 1) {
			header("Location: ../login.php?login=error1");
			exit();
		} else {
			if ($row = $result->fetch_assoc()) {
				//Dehashing the password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
					header("Location: ../login.php?login=error2");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in User
					$_SESSION['userid'] = $row['userid'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['sector'] = $row['sector'];
					header("Location: ../index.php");
					exit();
				}
			}
		}
	} else {
		header("Location: ../login.php?login=error3");
		exit();
	}
?>