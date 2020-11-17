<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	if (isset($_POST['submit'])) {
		
		include_once 'dbh.inc.php';
		$temp = $_POST['track'];
		if ($_POST['submit'] == 'escalate') {
			$stmt = $mysqli->prepare('UPDATE users SET status=2 WHERE userid=?');
		    $stmt->bind_param('s', $_POST['track']);
		    if ($stmt->execute()) {
				header("Location: ../application.php?userid=".$temp."&success=0");
		    } else {
		    	header("Location: ../application.php?userid=".$temp."&success=1");
		    }
		    exit();		    
		}
		$select = "";
		$params = array();	
		$sum = 0;
		foreach ($_POST as $key => $value) {
			if ($key != 'submit') {
		    	$select .= $key.', ';
		    	$sum += $key == 'track' ? 0: $value;
		    	array_push($params, $value);
		    }
		}
		$select = substr($select, 0, strlen($select) - 2);

		$sql = "INSERT INTO score (".$select.") VALUES (".str_repeat('?, ', count($params) - 1)." ?)";
		$type = str_repeat('i', count($params) - 1).'s';
		echo $sql, $type, $sum;
		print_r($params);

		// check the inputs
		// check for empty fields
			/* Create a prepared statement */
		try {
			$mysqli->query("BEGIN;");
			$failed = false;
			$stmt1 = $mysqli->prepare("DELETE FROM score WHERE track = ?");
			$stmt1->bind_param("s", $temp);
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
			    $stmt3 = $mysqli->prepare('UPDATE users SET status=1, score=? WHERE userid=?');
			    $stmt3->bind_param('is', $sum, $_POST['track']);
			     if (!$stmt3->execute()) {
			         $failed = true;
			         $mysqli->query("ROLLBACK;");
			     }
			}
			if(!$failed){
			    $mysqli->query("COMMIT;");
			    header("Location: ../application.php?userid=".$temp."&success=1");
			}
		} catch(Exception $e) {
			if($mysqli->errno === 1062) {
				echo $e;
				header("Location: ../application.php?userid=".$temp."&success=0");
				exit();
			}
		}
	} else {
		header("Location: ../application.php?userid=".$temp."&success=0");
		exit();
	}
?>