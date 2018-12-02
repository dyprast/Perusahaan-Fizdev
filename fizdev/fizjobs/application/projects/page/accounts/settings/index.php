<?php 
	include '../../../../connectionDb/conn.php';
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
	<title>Pengaturan Akun</title>
	<link rel="icon" href="../../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../../___/assets/css/account-settings.css">
	<link rel="stylesheet" href="../../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<section>
		<div class="settings-page">
			<div class="card">
				<div class="action-top">
					<h4><i class="fab fa-keycdn"></i>Pengaturan akun</h4>
					<a href="../home/?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>"><i class="fas fa-window-close"></i></a>
				</div>
				<?php 
					$validation = $_SESSION['validation_account'];
					$account_id = $_GET[$validation];

					$account = mysqli_query($conn, "SELECT * FROM accounts WHERE id = '$account_id'");
					$show_account = mysqli_fetch_array($account);
				 ?>
				 <div class="header">
				 	<div class="row">
				 		<div class="col-12 col-md-6">
				 			<div class="img-account">
				 				<div class="overlay">
				 					<a href="change_img/?<?php echo $validation ?>=<?php echo $account_id; ?>" class="btn">Ubah gambar</a>
				 				</div>
								<img src="../../../../../___/assets/img/profile_accounts/<?php echo $show_account['photo_profile']; ?>">
							</div>
				 		</div>
				 		<div class="col-12 col-md-6">
				 			<div style="height: 300px">
				 			<div class="logo">
				 				<img src="../../../../../___/assets/img/logo.png">
				 			</div>
				 			<div class="information-account">
				 				<h3><?php echo $show_account['name']; ?></h3>
				 				<h5><?php echo $show_account['expertise']; ?></h5>
				 				<p><?php echo $show_account['graduates']; ?></p>
				 			</div>
				 			</div>
				 		</div>
				 	</div>	
				</div>
				<div class="content">
					<form method="POST">
						<div class="main-account">
							<h2>Validasi Akun</h2>
							<h3>Username</h3>
							<p><?php echo $show_account['username']; ?></p>
							<h3>Password</h3>
							<div class="password-input">
								<a href="#showHidePassword" onclick="showHide()"><i id="icon" class="fas fa-eye"></i></a>
								<input type="password" id="show-hide" name="password" placeholder="Username" value="<?php echo $show_account['password']; ?>">
							</div>
							<div class="action-password">
								<a href="change-password/?<?php echo $validation ?>=<?php echo $account_id; ?>" class="btn">Ganti password</a>
							</div>
						</div>
						<div class="profile">
							<h2>Profil Akun</h2>
							<h3>Name</h3>
							<input type="text" name="name" placeholder="Username" value="<?php echo $show_account['name']; ?>">
							<h3>Email</h3>
							<input type="text" name="email" placeholder="Username" value="<?php echo $show_account['email']; ?>">
							<h3>Jenis Kelamin</h3>
							<select name="gender">
								<option value="<?php echo $show_account['gender']; ?>"><?php echo $show_account['gender']; ?></option>
								<?php 
									if ($show_account['gender'] == "Laki-laki") {
										?>
										<option value="Perempuan">Perempuan</option>
										<?php
									}
									else{
										?>
										<option value="Laki-laki">Laki-laki</option>
										<?php
									}
								 ?>
							</select>
							<h3>Tanggal Lahir</h3>
							<input type="date" name="date_of_birth" placeholder="Username" value="<?php echo $show_account['date_of_birth']; ?>">
							<h3>Pendidikan Terakhir</h3>
							<input type="text" name="graduates" placeholder="Username" value="<?php echo $show_account['graduates']; ?>">
							<h3>Keahlian</h3>
							<select name="expertise">
								<option value="<?php echo $show_account['expertise']; ?>"><?php echo $show_account['expertise']; ?></option>
								<option value="Advertising/Media">Advertising/Media</option>
								<option value="Architecture">Architecture</option>
								<option value="Marketing">Marketing</option>
								<option value="Creative Multimedia">Creative Multimedia</option>
								<option value="Computer Science/Information Technology">Computer Science/Information Technology</option>
								<option value="Business Studies/Administration/Management">Business Studies/Administration/Management</option>
								<option value="Secretarial">Secretarial</option>
							</select>
							<div class="action">
								<input type="submit" name="update" class="btn btn-fresh" value="Ubah data akun">
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</section>

	<script type="text/javascript">
		function showHide(){
			var input = document.getElementById('show-hide');
			var icon = document.getElementById('icon');
			if (input.type === "password" || icon.className === "fas fa-eye") {
				input.type = "text";
				icon.className = "fas fa-eye-slash";
			}
			else{
				input.type = "password";
				icon.className = "fas fa-eye";
			}
		}
	</script>
</body>
</html>

<?php

	$validation = $_SESSION['validation_account'];
	$account_id = $_GET[$validation];

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$graduates = $_POST['graduates'];
		$expertise = $_POST['expertise'];

		$update = mysqli_query($conn, "UPDATE accounts SET name = '$name', email = '$email', gender = '$gender', date_of_birth = '$date_of_birth', graduates = '$graduates', expertise = '$expertise' WHERE id = '$account_id'");
		if ($update) {
			?>
			<script type="text/javascript">
				alert("Ubah data akun sukses");
				window.location = "../home/?<?php echo $validation ?>=<?php echo $account_id ?>";
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert("Gagal mengubah data akun!");
			</script>
			<?php
		}
	}
 ?>