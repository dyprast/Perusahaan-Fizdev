<?php 
	include '../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		?>
		<script type="text/javascript">
			alert("Sebelum melamar, anda harus login terlebih dahulu!");
			window.location="../accounts/login";
		</script>
		<?php
	}
 ?>
<!-- AUTHOR : ROMADHAN EDY PRASETYO - RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Apply jobs</title>
	<link rel="icon" href="../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../___/assets/css/apply.css">
	<link rel="stylesheet" href="../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<?php 
		include 'topnav-apply.php';
		$validation_job = $_GET['validation_job'];
		$validation_account = $_SESSION['validation_account'];
		$account_id = $_GET[$validation_account];
		$show_job = mysqli_query($conn, "SELECT job_type FROM jobs WHERE id = '$validation_job'");
		$result_job_show = mysqli_fetch_array($show_job);
		$job_type2 = $result_job_show['job_type'];
		$check_job = mysqli_query($conn, "SELECT * FROM application_file WHERE account_id = '$account_id'");
		while($result_job = mysqli_fetch_array($check_job)){
			$job_type = $result_job['job_type'];
			if ($job_type == $job_type2) {
				?>
				<script type="text/javascript">
					alert("Data lamaran pekerjaan <?php echo $job_type; ?> telah tersedia!");
					window.location="../accounts/home/?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>";
				</script>
				<?php
			}
		}
	 ?>
	 <section>
	 	<div class="apply-form">
	 		<div class="row">
	 			<div class="col-12 col-md-6">
	 				<?php 
	 					$job_id = $_GET['validation_job'];
	 					$job = mysqli_query($conn, "SELECT * FROM jobs WHERE id = '$job_id'");
	 					$show_job = mysqli_fetch_array($job);
	 					$companys_name = $show_job['companys_name'];
	 					$company = mysqli_query($conn, "SELECT logo FROM partner WHERE companys_name = '$companys_name'");
	 					$show_company = mysqli_fetch_array($company);
	 				 ?>
	 				<div class="job-apply">
	 					<div class="header">
	 						<img src="../../../../admin/partnership/img_partner/<?php echo $show_company['logo']; ?>">
	 						<h4><?php echo $show_job['companys_name']; ?></h4>
	 						<a href="https://www.google.co.id/search?safe=strict&tbm=lcl&ei=eNu5W76cCojgvgS-2JQI&q=<?php echo $show_job['companys_name']." ".$show_job['office_address']; ?>&gs_l=psy-ab.3...35831.35831.0.36133.1.1.0.0.0.0.0.0..0.0....0...1c.1.64.psy-ab..1.0.0....0.eR-bRo8GpBk&tbs=lrf:!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:2&rlfi=hd:;si:&qop=0" style="padding: 5px 10px; background-color: #f1f1f1; margin-left: 5px; border-radius: 3px;"><i class="fas fa-map-marker-alt"></i> GMaps</a>
	 						<h2><?php echo $show_job['job_type']; ?></h2>
	 					</div>
	 					<div class="salary">
	 						<p>IDR</p>
	 						<p><?php if ($show_job['salary'] == 99)
								echo "0 (Gaji Dirahasiakan)"; else echo $show_job['salary']; ?></p>
	 					</div>
	 					<div class="description">
	 						<p><?php echo substr($show_job['description'],0,200); ?> ....</p>
	 					</div>
	 				</div>
	 			</div>
	 			<div class="col-12 col-md-6">
	 				<div class="form-bio">
	 					<div class="information">
	 						<p>Sebelum melamar, baca terlebih dahulu tata cara dan panduan melamar di aplikasi Fizjob. Anda bisa lihat di <a href="">Sini</a></p>
	 					</div>
	 					<form method="POST" enctype="multipart/form-data">
	 						<h3>Promosikan Diri Anda (Max 300 Character)</h3>
	 						<textarea name="self_promotion" placeholder="Promosikan diri anda ... " onkeypress="if(this.value.length==300) return false;"></textarea>
	 						<h3>File Persyaratan</h3>
	 						<input type="file" name="application_file">
	 						<input type="submit" name="apply" value="Lamar" class="btn-apply">
	 					</form>
	 				</div>		
	 			</div>
	 		</div>
	 	</div>
	 </section>
</body>
</html>

<?php 
	if (isset($_POST['apply'])) {
		$validation = $_SESSION['validation_account'];
		$id_account = $_GET[$validation];
		$_SESSION['self_promotion'] = $_POST['self_promotion'];
		$tmp_file = $_FILES['application_file']['tmp_name'];
		$_SESSION['app_file'] = $_FILES['application_file']['name'];
		move_uploaded_file($tmp_file, 'application_file/'.$_SESSION['app_file']);
		$_SESSION['companys_name'] = $companys_name;
		$_SESSION['job_type'] = $show_job['job_type'];
		$_SESSION['salary'] = $show_job['salary'];
		$_SESSION['office_address'] = $show_job['office_address'];
		$_SESSION['logo'] = $show_company['logo'];

		if ($_SESSION['self_promotion'] == "" || $_SESSION['app_file'] == "") {
			?>
			<script type="text/javascript">
				alert("Harap isi data anda!");
				window.location = "./?validation_job=<?php echo $job_id; ?>&<?php echo $validation; ?>=<?php echo $id_account; ?>";
			</script>
			<?php
		}
		else{
			header("location: confirm/?$validation=$id_account");
		}
	}
 ?>