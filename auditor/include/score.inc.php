<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	if (isset($_POST['submit'])) {
		
		include_once 'dbh.inc.php';
		$select = "";
		$params = array();	
		foreach ($_POST as $key => $value) {
		    if ($value && $value[0] == 'true' && $value[1]) {
		    	$select .= $key.', ';
		    	array_push($params, $value[1]);
		    }
		}
		$select = substr($select, 0, strlen($select) - 2);

		$sql = "INSERT INTO score (".$select.") VALUES (".str_repeat('?, ', count($params) - 1)." ?)";
		$type = str_repeat('i', count($params));
		echo $sql, $type;

		// check the inputs
		// check for empty fields
			/* Create a prepared statement */
		try {
			$mysqli->query("BEGIN;");
			$failed = false;
			$stmt1 = $mysqli->prepare("DELETE FROM score WHERE track = ?");
			$temp = 1;
			$stmt1->bind_param("i", $temp);
			if (!$stmt1->execute()) {
			    $failed = true;
			    $mysqli->query("ROLLBACK;");
			}
			if(!$failed){
			    $stmt2 = $mysqli->prepare($sql);
			    $stmt2->bind_param($type, ...$params);
			     if (!$stmt2->execute()) {
			         $failed = true;
			         $mysqli->query("ROLLBACK;");
			     }
			}
			if(!$failed){
			    $mysqli->query("COMMIT;");
			    header("Location: ../score.php?success=1");
			}
		} catch(Exception $e) {
			if($mysqli->errno === 1062) {
				echo $e;
				// header("Location: ../signup.php?signup=504");
				exit();
			}
		}
	} else {
		header("Location: ../signup.php?signup=0");
		exit();
	}
?>