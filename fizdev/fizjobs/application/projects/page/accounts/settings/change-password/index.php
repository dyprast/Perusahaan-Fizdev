<?php 
	include '../../../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		header("location: ../../../.././");
	}
 ?>
<!-- AUTHOR : ROMADHAN EDY PRASETYO - RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fizjobs.id</title>
	<link rel="icon" href="../../../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../../../___/assets/css/change-password.css">
	<link rel="stylesheet" href="../../../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<section>
		<div class="page">
			<div class="action">
				<h4><i class="fab fa-keycdn"></i>Ubah password</h4>
				<a href="../?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>"><i class="fas fa-window-close"></i></a>
			</div>
			<div class="header">
				<div class="row">
					<div class="col-12 col-md-12">
						<div class="change-password">
							<div class="header">
								<img src="../../../../../../___/assets/img/logo.png">
							</div>
							<div class="main-form">
								<form method="POST">
									<p>Password lama</p>
									<input type="password" name="old_pw" placeholder="Password Lama" required>
									<p>Password baru</p>
									<input type="password" name="new_pw" placeholder="Password Baru" required>
									<p>Konfirmasi password baru</p>
									<input type="password" name="conf_new_pw" placeholder="Konfirmasi Password Baru" required>
									<div class="btn-change">
										<input type="submit" name="change" class="btn" value="Ubah password">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>

<?php 
	if (isset($_POST['change'])) {
		$validation = $_SESSION['validation_account'];
		$account_id = $_GET[$validation];
		$old_pw = $_POST['old_pw'];
		$new_pw = $_POST['new_pw'];
		$conf_new_pw = $_POST['conf_new_pw'];

		$check_old_pw = mysqli_query($conn, "SELECT password FROM accounts WHERE id = '$account_id'");
		$result_old_pw = mysqli_fetch_array($check_old_pw);
		if ($result_old_pw['password'] != $old_pw) {
			?>
			<script type="text/javascript">
				alert("Password lama anda salah!");
			</script>
			<?php
		}
		elseif ($new_pw != $conf_new_pw) {
			?>
			<script type="text/javascript">
				alert("Cek Konfirmasi password baru anda!");
			</script>
			<?php
		}
		else{
			$change = mysqli_query($conn, "UPDATE accounts SET password = '$new_pw' WHERE id = '$account_id'");
			if ($change) {
				?>
				<script type="text/javascript">
					alert("Berhasil mengubah password");
					window.location="../?<?php echo $validation; ?>=<?php echo $account_id; ?>";
				</script>
				<?php
			}
			else{
				?>
				<script type="text/javascript">
					alert("Gagal mengubah password!");
				</script>
				<?php
			}
		}
	}
 ?>