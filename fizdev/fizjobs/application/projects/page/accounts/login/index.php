<?php 
	include '../../../../connectionDb/conn.php';
	if (isset($_SESSION['logged'])) {
		$validation = $_SESSION['validation_account'];
		$id_account = $_SESSION['id_account'];
		header("location: ../../../.././?$validation=$id_account");
	}
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
		<div class="accounts">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-inform">
						<h2>FIZJOB</h2>
						<img src="../../../../../___/assets/img/account.svg">
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-validation">
						<div class="header">
							<a href="../../../.././"><img src="../../../../../___/assets/img/logo.png"></a>
							<h2>Login</h2>
						</div>
						<form method="POST">
							<h3>Username</h3>
							<input type="text" name="username" placeholder="Username">
							<h3>Password</h3>
							<input type="password" name="password" placeholder="Password">
							<button type="submit" name="login" class="btn-submit">Login</button>
						</form>
						<div class="txt-ask">
							<p>Belum mempunyai akun? <a href="../register">Daftar sekarang</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>

<?php 
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$check = mysqli_query($conn, "SELECT * FROM accounts WHERE username='$username' AND password='$password'");
		$result = mysqli_fetch_array($check);
		$num = mysqli_num_rows($check);
		$random = bin2hex(openssl_random_pseudo_bytes(35));
		if ($num > 0) {
			$_SESSION['logged'] = true;
			$_SESSION['id_account'] = $result['id'];
			$_SESSION['name'] = $result['name'];
			$_SESSION['type'] = $result['type'];
			$_SESSION['validation_account'] = $random;
			if ($result['type'] == "user") {
				header("location: ../../../.././?$random=".$result['id']);
			}
			else if ($result['type'] == "admin") {
				header("location: ../../../../../admin/?$random=".$result['id']);
			}
		}
		else{
			?>
			<script type="text/javascript">
				alert("Login gagal! Silahkan cek kembali akun anda");
			</script>
			<?php
		}
	}
 ?>