<?php 
	include '../../application/connectionDb/conn.php';
	$job_id = $_GET['job_id'];
	$q = mysqli_query($conn, "DELETE FROM jobs WHERE id = '$job_id'");
	if ($q) {
		header("location: ../?jobs");
	}
 ?>