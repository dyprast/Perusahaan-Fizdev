<?php 
	include '../../../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		header("location: ../../../.././");
	}
	$validation = $_SESSION['validation_account'];
	$account_id = $_GET[$validation];
	$q = mysqli_query($conn, "SELECT photo_profile FROM accounts WHERE id = '$account_id'");
	$r = mysqli_fetch_array($q);
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
	<link rel="stylesheet" href="../../../../../../___/assets/css/change-img.css">
	<link rel="stylesheet" href="../../../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<section>
		<div class="page">
			<div class="action">
				<h4><i class="fas fa-user"></i>Perbarui Gambar</h4>
				<a href="../?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>"><i class="fas fa-window-close"></i></a>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="change-img">
						<div class="show-img">
							<img src="../../../../../../___/assets/img/profile_accounts/<?php echo $r['photo_profile']; ?>" id="show-file">
						</div>
						<div class="main-form">
							<form method="POST" enctype="multipart/form-data">
								<div class="upload-btn-wrapper">
									<h3>Upload gambar baru</h3>
								  	<input type="file" name="file">
								  	<button type="submit" name="upload" class="btn btn-primary">Upload</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</section>
</body>
</html>

<?php 
	if (isset($_POST['upload'])) {
		$tmp_file = $_FILES['file']['tmp_name'];
		$file = $_FILES['file']['name'];

		if (empty($file)) {
			?>
			<script>
				alert("Tidak ada File");
			</script>
			<?php
		}
		else{
			$q = mysqli_query($conn, "UPDATE accounts SET photo_profile = '$file' WHERE id = '$account_id'");
			if ($q) {
				move_uploaded_file($tmp_file, "../../../../../../___/assets/img/profile_accounts/".$file);
				header("location: ../?$validation=$account_id");
			}
		}
	}
?>