<?php 
	include '../../application/connectionDb/conn.php';
	$test_id = $_GET['test_id'];
	$q = mysqli_query($conn, "DELETE FROM test WHERE id = '$test_id'");
	if ($q) {
		header("location: ../?interview");
	}
 ?>