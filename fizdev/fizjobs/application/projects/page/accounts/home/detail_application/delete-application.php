<?php
	include '../../../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		?>
		<script type="text/javascript">
			window.location="../accounts/login";
		</script>
		<?php
	}

	$application_id = $_GET['application_id'];
	$delete_application = mysqli_query($conn, "DELETE FROM application_file WHERE id = '$application_id'");
	if ($delete_application) {
		$validation = $_SESSION['validation_account'];
		$account_id = $_SESSION['id_account'];
		header("location: ../?$validation=$account_id");
	}
	else{
		?>
		<script type="text/javascript">
			alert("Gagal Membatalkan Lamaran!");
		</script>
		<?php
	}
 ?>