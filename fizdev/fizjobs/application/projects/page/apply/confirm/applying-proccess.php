<?php 
	include '../../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		?>
		<script type="text/javascript">
			alert("Sebelum melamar, anda harus login terlebih dahulu!");
			window.location="../accounts/login";
		</script>
		<?php
	}
			$validation = $_SESSION['validation_account'];
			$id_account = $_GET[$validation];
			$account_show = mysqli_query($conn, "SELECT * FROM accounts WHERE id = '$id_account'");
			$show = mysqli_fetch_array($account_show);
		$job_type = $_SESSION['job_type'];
		$companys_name = $_SESSION['companys_name'];
		$office_address = $_SESSION['office_address'];
		$full_name = $show['name'];
		$email = $show['email'];
		$gender = $show['gender'];
		$date_of_birth = $show['date_of_birth'];
		$expertise = $show['expertise'];
		$graduates = $show['graduates'];
		$date_of_applying = date("Y-m-d");
		$day_of_applying = date("l");
		$test_token = bin2hex(openssl_random_pseudo_bytes(4));
		$self_promotion = $_SESSION['self_promotion'];
		$application_file = $_SESSION['app_file'];

		if ($self_promotion == "" || $application_file == "") {
			?>
			<script type="text/javascript">
				alert("Harap isi data anda!");
				window.location = "./?validation_job=<?php echo $job_id; ?>&<?php echo $validation; ?>=<?php echo $id_account; ?>";
			</script>
			<?php
		}
		else{
			$apply = mysqli_query($conn, "INSERT INTO application_file(account_id, job_type, full_name, email, gender, graduates, expertise, date_of_birth, self_promotion, application_file, test_token, companys_name, office_address, date_of_applying, day_of_applying, status) VALUES ('$id_account', '$job_type', '$full_name', '$email', '$gender', '$graduates', '$expertise', '$date_of_birth', '$self_promotion', '$application_file', '$test_token', '$companys_name', '$office_address', '$date_of_applying', '$day_of_applying', 'Di proses Admin (Melamar)')");
			if ($apply) {
				$validation = $_SESSION['validation_account'];
				$id_account = $_GET[$validation];
				?>
				<script type="text/javascript">
					alert("Melamar pekerjaan berhasil!");
				</script>
				<?php
				header("location: ../../accounts/home/?$validation=$id_account");
			}
			else{
				?>
				<script type="text/javascript">
					alert("Melamar pekerjaan gagal!");
					window.location="./?validation_job=<?php echo $job_id; ?>&<?php echo $validation; ?>=<?php echo $id_account; ?>";
				</script>
				<?php
			}
		}
 ?>