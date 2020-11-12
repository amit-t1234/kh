<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	function getFileUrl($file, $allowedExt, $folder) {
		// get every thing about the file with $_FILES
		// $file = $_FILES['file'];
		$fileName = $file['name'];
		$fileTmpName = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		$fileType = $file['type'];

		// get the extention
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		// $allowedExt = array('jpg', 'jpeg', 'tiff', 'bmp', 'doc', 'ppt', 'pptx', 'png', 'pdf', 'txt', 'docx');

		// check for allowed extention
		if(in_array($fileActualExt, $allowedExt)) {
			// check for errors
			if($fileError === 0) {
				// check for file size
				if($fileSize < 20000000 || $fileSize == 0) {
					// check if the file is uploaded through POST method
					if(is_uploaded_file($fileTmpName)) {
						// give a unique name to the file based on time of upload
						$fileNameNew = uniqid(' ', true).".".$fileActualExt;
						$fileDestination = "uploads/".$folder.'/'.$fileNameNew;

						// save the file in upload folder and sqldb
						if (move_uploaded_file($fileTmpName, '../'.$fileDestination)) {
							return $fileDestination;
						} else {
							echo 'Something went wrong!';
						}
					} else {
						echo "Malicious activity detected, Try again!";
					}
				} else {
					echo "File Too big to upload!";
				}
			} else {
				echo "Something went wrong, Try Again!";
			}
		}		
	}
	if (isset($_POST['submit'])) {
		
		include_once 'dbh.inc.php';
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
		$founders_count = $_POST['founder_count'];
		$profile_briefs = $_POST['profile_brief'];						
		$heard_from = $_POST['heard_from'];						
		$part = $_POST['part'];						
		$hold = $_POST['hold'];						
		$why = $_POST['why'];						
		$sector = $_POST['sector'];						
		$category = $_POST['category'];						
		$idea = $_POST['idea'];						
		$solution_to = $_POST['solution_to'];						
		$your_solution = $_POST['your_solution'];						
		$competitors = $_POST['competitors'];						
		$last_funding = $_POST['last_funding'];	
		$revenue = $_POST['revenue'];					
		$kuberan_house = $_POST['kuberan_house'];						
		$share = $_POST['share'];						
		$fy2018 = $_POST['fy2018'];
		$fy2018['year'] = 2018;
		$fy2019 = $_POST['fy2019'];
		$fy2019['year'] = 2019;
		$fy2020 = $_POST['fy2020'];						
		$fy2020['year'] = 2020;
		$userid = uniqid();
		print_r($profile_briefs[0]);

		// check the inputs
		// check for empty fields
		if (empty($aadhar_number) || empty($first_name) || empty($last_name) || empty($dob) || empty($gender) || empty($email) || empty($phone) || empty($apply_for)) {
			header("Location: ../signup.php?signup=503");
			exit();
		} else {
			/* Create a prepared statement */
			try {
				$stmt = 
				$stmt = $mysqli->prepare("INSERT INTO users (aadhar_number, type, first_name, last_name, dob, gender, email, phone, phone2, apply_for, company_register, userid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("ssssssssssis", $aadhar_number, $type, $first_name, $last_name, $dob, $gender, $email, $phone, $phone2, $apply_for, $company_register, $userid);
				if ($stmt->execute()) {
					echo $company_name.' '.$nature.' '.$incorporated_on.' '.$founder_count;
					$stmt = $mysqli->prepare("INSERT INTO company (aadhar_number, company_name, nature, incorporated_on, founders_count) VALUES (?, ?, ?, ?, ?)");
					$stmt->bind_param("ssssi", $aadhar_number, $company_name, $nature, $incorporated_on, $founders_count);
					echo 'yes yes!';
					$stmt->execute();
					foreach($profile_briefs as $profile_brief) {
						$stmt = $mysqli->prepare("INSERT INTO Profiles (aadhar_number, profile_brief) VALUES (?, ?)");
						$stmt->bind_param("ss", $aadhar_number, $profile_brief);
						$stmt->execute();
					}
					echo $aadhar_number, $sector, $category, $idea, $solution_to, $your_solution, $competitors, $last_funding, $revenue, $kuberan_house, $share;
					$stmt = $mysqli->prepare("INSERT INTO business (aadhar_number, sector, category, idea, solution_to, your_solution, competitors, last_funding, revenue, kuberan_house, share) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$stmt->bind_param("sssssssssdd", $aadhar_number, $sector, $category, $idea, $solution_to, $your_solution, $competitors, $last_funding, $revenue, $kuberan_house, $share);
					$stmt->execute();
					if ($type == 'entreprenuer') {
						$stmt = $mysqli->prepare("INSERT INTO history (aadhar_number, fy_year, customer_count, average_billing, revenue, profit) VALUES (?, ?, ?, ?, ?, ?), (?, ?, ?, ?, ?, ?), (?, ?, ?, ?, ?, ?)");
						$stmt->bind_param("siiiiisiiiiisiiiii", $aadhar_number, $fy2018['year'], $fy2018['customer_count'], $fy2018['average_billing'], $fy2018['revenue'], $fy2018['profit'], $aadhar_number, $fy2019['year'], $fy2019['customer_count'], $fy2019['average_billing'], $fy2019['revenue'], $fy2019['profit'], $aadhar_number, $fy2020['year'], $fy2020['customer_count'], $fy2020['average_billing'], $fy2020['revenue'], $fy2020['profit']);
						$stmt->execute();						
					}
					$stmt = $mysqli->prepare("INSERT INTO extras (aadhar_number, heard_from, part, hold, why) VALUES (?, ?, ?, ?, ?)");
					$stmt->bind_param("sssss", $aadhar_number, $heard_from, $part, $hold, $why);
					$stmt->execute();
					print_r($_FILES);
					if ($_FILES['pitchDeck'])
						$pitch_deck = getFileUrl($_FILES['pitchDeck'], array('jpg', 'jpeg', 'png', 'pdf'), 'pitchDecks');
					else
						$pitch_deck = '';
					// if ($_FILES['aadhar_img'])
					// 	$aadhar_img = getFileUrl($_FILES['aadhar_img'], array('jpg', 'jpeg', 'png'), 'aadhar_card');
					// else
					// 	$aadhar_img = null;
					if ($_FILES['video'])
						$video = getFileUrl($_FILES['video'], array('mp4', 'mov', 'wmv', 'avi'), 'videos');
					else
						$video = '';
					// if ($_FILES['images']) {
					// 	$img1 = getFileUrl($_FILES['images'], array('mp4', 'mov', 'wmv', 'avi'), 'videos');
					// } else {
					// 	$img1 = $img2 = $img3 = $img4 = $img5 = null;
					// }														
					$stmt = $mysqli->prepare("INSERT INTO attachments (aadhar_number, pitch_deck, video) VALUES (?, ?, ?)");
					$stmt->bind_param("sss", $aadhar_number, $pitch_deck, $video);
					$stmt->execute();

					// Send A mail
					$subject = 'Kuberan House Form Submitted successfully';
					$from = 'amitthakurashwani@gmail.com';
					 
					// To send HTML mail, the Content-type header must be set
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					 
					// Create email headers
					$headers .= 'From: '.$from."\r\n".
					    'Reply-To: '.$from."\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					 
					// Compose a simple HTML email message
					$message = '<html><body>';
					$message .= '<h1 style="color:#f40;">Hi '.$first_name.' '.$last_name.'!</h1>';
					$message .= '<p style="color:#080;font-size:18px;">Your Form has been successfully submitted! Your ref no. <strong>'.$userid.'</strong>(please make a note of it). We will shortly reach out to you! If you have any doubts you can write back to us. Thankyou!</p>';
					$message .= '</body></html>';
					 
					// Sending email
					if(mail($email, $subject, $message, $headers)){
					    echo 'Your mail has been sent successfully.';
					} else{
					    echo 'Unable to send email. Please try again.';
					}					
					header("Location: ../choose.html?success=1");
				}
				else {
					echo $mysqli->error;
					echo 'No1';
				}
				$stmt->close();
			} catch(Exception $e) {
				if($mysqli->errno === 1062) {
					echo $e;
					// header("Location: ../signup.php?signup=504");
					exit();
				}
			}					
		}
	} else {
		header("Location: ../signup.php?signup=0");
		exit();
	}
?>