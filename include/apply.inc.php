<?php 
	if (isset($_POST['submit'])) {
		
		include_once 'dbh.inc.php';
		// profile breif, company register, 
		$aadhar_number = $_POST['aadhar_number'];
		$type = $_POST['type'];								
		$first_name = $_POST['first_name'];						
		$last_name = $_POST['last_name'];						
		$dob = $_POST['dob'];						
		$gender = $_POST['gender'];						
		$email = $_POST['email'];						
		$phone = $_POST['phone'];						
		$apply_for = $_POST['apply_for'];						
		$company_name = $_POST['company_name'];						
		$company_register = ($company_name) ? 1: 0;
		$nature = $_POST['nature'];						
		$incorporated_on = $_POST['incorporated_on'];						
		$founder_count = $_POST['founder_count'];						
		$heard_from = $_POST['heard_from'];						
		$part = $_POST['part'];						
		$hold = $_POST['hold'];						
		$why = $_POST['why'];						
		$sector = $_POST['sector'];						
		$category = $_POST['category'];						
		$idea = $_POST['idea'];						
		$solution_to = $_POST['solution_to'];						
		$your_solution = $_POST['your_solution'];						
		$competitor = $_POST['competitor'];						
		$last_funding = $_POST['last_funding'];						
		$kuberan_house = $_POST['kuberan_house'];						
		$share = $_POST['share'];						
		$fy_year = $_POST['fy_year'];						
		$customer_count = $_POST['customer_count'];						
		$average_billing = $_POST['average_billing'];						
		$revenue = $_POST['revenue'];						
		$profit = $_POST['profit'];						


		// check the inputs
		// check for empty fields
		if (empty($aadhar_number) || empty($first_name) || empty($last_name) || empty($dob) || empty($gender) || empty($email) || empty($phone) || empty($$apply_for)) {
			header("Location: ../signup.php?signup=503");
			exit();
		} else {
			/* Create a prepared statement */
			try {
				$stmt = $mysqli->prepare("INSERT INTO Users (aadhar_number, type, first_name, last_name, dob, gender, email, phone, apply_for, company_register) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("sssssssssi", $aadhar_number, $type, $first_name, $last_name, $dob, $gender, $email, $phone, $apply_for, $company_register);
				$stmt->execute();
				$stmt->close();
			} catch(Exception $e) {
				if($mysqli->errno === 1062) {
					header("Location: ../signup.php?signup=504");
					exit();
				}
			}				
			if(mysqli_query($connect, $query)) {
				header("Location: ../");
				exit();
			} else {
				header("Location: ../signup.php?success=0");
				exit();
			}		
		}
	} else {
		header("Location: ../signup.php?signup=0");
		exit();
	}
?>