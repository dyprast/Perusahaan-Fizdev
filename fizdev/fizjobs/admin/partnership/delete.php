<?php 
	include '../../application/connectionDb/conn.php';
	$partner_id = $_GET['partner_id'];
	$q = mysqli_query($conn, "DELETE FROM partner WHERE id = '$partner_id'");
	if ($q) {
		header("location: ../?partnership");
	}
 ?>