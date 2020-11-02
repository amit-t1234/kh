<?php 

	/* Create a new mysqli object with database connection parameters */
	$mysqli = new mysqli('localhost', 'root', '', 'kuberan_house');

	if(mysqli_connect_errno()) {
		echo "Connection Failed: " . mysqli_connect_errno();
		exit();
	}
?>