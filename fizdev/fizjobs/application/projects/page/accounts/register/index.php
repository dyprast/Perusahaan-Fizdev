<?php 
	include '../../../../connectionDb/conn.php';
 ?>
<!-- AUTHOR : ROMADHAN EDY PRASETYO - RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fizjob Login</title>
	<link rel="icon" href="../../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../../___/assets/css/accounts.css">
	<link rel="stylesheet" href="../../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<section>
		<div class="accounts register">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-inform register">
						<h1>FIZJOB</h1>
						<img src="../../../../../___/assets/img/account.svg">
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-validation register">
						<div class="header">
							<a href="../../../.././"><img src="../../../../../___/assets/img/logo.png"></a>
							<h2>Register</h2>
						</div>
						<form method="POST">
							<h3>Nama Lengkap</h3>
							<input type="text" name="name" required placeholder="Nama Lengkap">
							<h3>Email</h3>
							<input type="email" name="email" required placeholder="Email">
							<h3>Jenis Kelamin</h3>
							<select name="gender">
								<option value=""></option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Laki-laki">Perempuan</option>
							</select>
							<h3>Tanggal Lahir</h3>
							<input type="date" name="date" required>
							<h3>Pendidikan Terakhir</h3>
							<input type="text" name="graduates" required placeholder="Pendidikan Terakhir">
							<h3>Keahlian</h3>
							<select name="expertise">
								<option value=""></option>
								<option value="Advertising/Media">Advertising/Media</option>
								<option value="Architecture">Architecture</option>
								<option value="Marketing">Marketing</option>
								<option value="Creative Multimedia">Creative Multimedia</option>
								<option value="Computer Science/Information Technology">Computer Science/Information Technology</option>
								<option value="Business Studies/Administration/Management">Business Studies/Administration/Management</option>
								<option value="Secretarial">Secretarial</option>
							</select>
							<h3>Username</h3>
							<input type="text" name="username" required placeholder="Username">
							<h3>Password</h3>
							<input type="password" name="password" required placeholder="Password">
							<h3>Konfirmasi Password</h3>
							<input type="password" name="conf_password" required placeholder="Konfirmasi Password">
							<h3>Captcha</h3>
							<div class="captcha">
								<?php 
									$captcha = bin2hex(openssl_random_pseudo_bytes(3));
								 ?>
								<textarea readonly name="captcha" class="textarea" style="font-family: Captcha-Code;"><?php echo $captcha; ?></textarea>
							</div>
							<input type="text" name="captcha_input" required placeholder="captcha code">
							<button type="submit" name="register" class="btn-submit">Register</button>
						</form>
						<div class="txt-ask">
							<p>Sudah mempunyai akun? <a href="../login">Login sekarang</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>

<?php
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$graduates = $_POST['graduates'];
		$expertise = $_POST['expertise'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conf_password = $_POST['conf_password'];
		$captcha_show = $_POST['captcha'];
		$captcha_input = $_POST['captcha_input'];
		$date = $_POST['date'];
		header("location: proccess.php?name=$name&email=$email&gender=$gender&graduates=$graduates&expertise=$expertise&username=$username&password=$password&conf_password=$conf_password&captcha_input=$captcha_input&captcha=$captcha_show&date=$date");
	}
?>