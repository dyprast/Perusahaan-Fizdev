<?php 
	include '../../../../application/connectionDb/conn.php';
	$application_id = $_GET['application_id'];
	$q = mysqli_query($conn, "UPDATE application_file SET status = 'Menunggu Jawaban Dari Pertanyaan Admin' WHERE id = '$application_id'");
	if ($q) {
			header("location: ../../.././?application_status☺=waiting");
		}
 ?>