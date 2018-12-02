<?php
	include '../../../../connectionDb/conn.php';
		$captcha = $_GET['captcha'];
		$captcha_input = $_GET['captcha_input']; 
		$name = $_GET['name'];
		$email = $_GET['email'];
		$gender = $_GET['gender'];
		$graduates = $_GET['graduates'];
		$expertise = $_GET['expertise'];
		$username = $_GET['username'];
		$password = $_GET['password'];
		$conf_password = $_GET['conf_password'];
		$date = $_GET['date'];

		if ($captcha_input == "" || $name == "" || $email == "" || $gender == "" || $graduates == "" || $expertise == "" || $username == "" || $password =="" || $date == "") {
			?>
			<script type="text/javascript">
				alert("Registrasi gagal! Pastikan semua data terisi");
				window.location = "./";
			</script>
			<?php
		}
		else if($password != $conf_password) {
			?>
			<script type="text/javascript">
				alert("Konfirmasi password salah!");
				window.location = "./";
			</script>
			<?php
		}
		else if ($captcha_input != $captcha) {
		 	?>
		 	<script type="text/javascript">
		 		alert("Kode captcha salah!");
				window.location = "./";
		 	</script>
		 	<?php
		}
		else{
			$check_username = mysqli_query($conn, "SELECT username FROM accounts WHERE username = '$username'");
			if (mysqli_num_rows($check_username) > 0) {
				?>
				<script type="text/javascript">
					alert("Mohon maaf, username telah digunakan!");
					window.location = "./";
				</script>
				<?php
			}
			else{
				$reg = mysqli_query($conn, "INSERT INTO accounts (name, photo_profile, email, gender, graduates, expertise, username, password, type, date_of_birth) VALUES ('$name', 'user-man.png', '$email', '$gender', '$graduates', '$expertise', '$username', '$password', 'user', '$date')");
				if ($reg) {
					?>
					<script type="text/javascript">
						alert("Registrasi akun sukses");
						window.location = "../login";
					</script>
					<?php
				}
				else{
					?>
					<script type="text/javascript">
						alert("Registrasi akun gagal! Silahkan ulangi kembali");
						window.location = "./";
					</script>
					<?php
				}
			}
		}
 ?>