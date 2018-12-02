<?php 
	include '../../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		header("location: ../../../.././");
	}
	else {
        if ($_SESSION["type"] == "admin") {
            ?>
            <script type="text/javascript">
                alert("Kamu adalah admin, lakukan aktivitas admin yang telah di perintahkan!");
                window.location = "../../../../../admin/";
            </script>
            <?php
        }
    }
 ?>
<!-- AUTHOR : ROMADHAN EDY PRASETYO - RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" charset="width=device-width, initial-scale=1.0">
	<title>Home Account</title>
	<link rel="icon" href="../../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../../___/assets/css/account-profile.css">
	<link rel="stylesheet" href="../../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<?php
		include 'topnav-home.php'; 
		$validation_account = $_SESSION['validation_account'];
		$id_account = $_GET[$validation_account];

		$q_show_profile = mysqli_query($conn, "SELECT * FROM accounts WHERE id = '$id_account'");
		$result_profile = mysqli_fetch_array($q_show_profile);

	 ?>
	<section>
		<div class="account-profile">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="img-wrapper-profile">
						<img src="../../../../../___/assets/img/profile_accounts/<?php echo $result_profile['photo_profile']; ?>">
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="bio-box">
						<div class="label">
							<h1><?php echo strtoupper($result_profile['name']); ?></h1>
							<p><?php echo $result_profile['email']; ?></p>
						</div>
						<div class="content">
							<div class="child-content">
								<h2><?php echo $result_profile['expertise']; ?></h2>
								<h3><?php echo $result_profile['graduates']; ?></h3>
							</div>
							<div class="child-content">
								<a href="../settings/?<?php echo $_SESSION['validation_account'] ?>=<?php echo $_SESSION['id_account']; ?>">Ubah data akun</a>
								<p>Informasi profil anda, jika ada data diri anda yang tidak valid atau tidak sesuai dengan data asli, anda bisa mengubah data.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		$validation = $_SESSION['validation_account'];
		$account_id = $_GET[$validation]; 
		$check_jobs = mysqli_query($conn, "SELECT * FROM application_file WHERE account_id = '$account_id'");
		if (mysqli_num_rows($check_jobs) == 0) {
	 ?>
	<section>
		<div class="recommends">
			<div class="header">
				<img src="../../../../../___/assets/img/logo.png">
				<h2>Direkomendasikan untuk anda</h2>
			</div>
			<div class="content">
				<div class="row">
					<div class="col-12 col-md-12">
						<?php 
							$show_jobs = mysqli_query($conn, "SELECT * FROM jobs ORDER BY RAND() LIMIT 3");
							while ($result_jobs = mysqli_fetch_array($show_jobs)) {
						 ?>
						<div class="jobs">
							<div class="row">
								<div class="col-12 col-md-10">
									<div class="label">
										<div class="head-label">
											<p><?php echo $result_jobs['date_upload']; ?></p>
											<h2><?php echo $result_jobs['job_type']; ?></h2>
											<h4><a href="<?php echo $result_jobs['website']; ?>"><?php echo $result_jobs['companys_name']; ?></a><h4>
											<h4 style="color: #777; display: flex; flex-wrap: wrap;">Alamat : <?php echo substr($result_jobs['office_address'],0,40); ?><a href="https://www.google.co.id/search?safe=strict&tbm=lcl&ei=eNu5W76cCojgvgS-2JQI&q=<?php echo $result_jobs['companys_name']." ".$result_jobs['office_address']; ?>&gs_l=psy-ab.3...35831.35831.0.36133.1.1.0.0.0.0.0.0..0.0....0...1c.1.64.psy-ab..1.0.0....0.eR-bRo8GpBk&tbs=lrf:!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:2&rlfi=hd:;si:&qop=0" style="padding: 5px 10px; background-color: #f1f1f1; margin-left: 5px; border-radius: 3px;"> <i class="fas fa-map-marker-alt"></i> GMaps</a></h4>
										</div>
										<div class="content-label">
											<div class="salary">
												<p>IDR</p>
												<p><?php if ($result_jobs['salary'] == 0)
													echo $result_jobs['salary']." (Gaji Dirahasiakan)"; else echo number_format($result_jobs['salary']); ?></p>
											</div>
											<div class="description-label">
												<p><?php echo $result_jobs['description']; ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-2">
									<div class="btn-apply">
										<i class="fas fa-user-tie"></i>
										<a href="../../apply/?validation_job=<?php echo $result_jobs['id']; ?>&<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>">APPLY NOW</a>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<div class="more-jobs">
							<a href="../../vacancies">Tampilkan semua pekerjaan</a>
						</div>	
					</div>
				</div>
			</div>	
		</div>
	</section>
	<?php 
	}
	else{
	 ?>
	 <section>
		<div class="recommends">
			<div class="header">
				<img src="../../../../../___/assets/img/logo.png">
				<h2>Lamaran Anda</h2>
			</div>
			<div class="content">
				<div class="row">
					<div class="col-12 col-md-12">
						<?php
							$show_jobs = mysqli_query($conn, "SELECT * FROM application_file WHERE account_id = '$account_id' ORDER BY id DESC, date_of_applying DESC");
							while ($result_jobs = mysqli_fetch_array($show_jobs)) {
						 ?>
						<div class="jobs <?php if ($result_jobs['status'] == "Tidak Sesuai"){?>danger<?php } elseif($result_jobs['status'] == "Menunggu Jawaban Dari Pertanyaan Admin") {?> waiting <?php } ?>">
							<div class="row">
								<div class="col-12 col-md-9">
									<div class="label">
										<div class="head-label">
											<p class="date"><?php echo $result_jobs['day_of_applying']; echo ", ".$result_jobs['date_of_applying']; ?></p>
											<h2><?php echo $result_jobs['job_type']; ?></h2>
											<h4><a href="<?php echo $result_jobs['website']; ?>"><?php echo $result_jobs['companys_name']; ?></a><h4>
											<h4 style="color: #777; display: flex; flex-wrap: wrap;">Alamat : <?php echo substr($result_jobs['office_address'],0,40); ?><a href="https://www.google.co.id/search?safe=strict&tbm=lcl&ei=eNu5W76cCojgvgS-2JQI&q=<?php echo $result_jobs['companys_name']." ".$result_jobs['office_address']; ?>&gs_l=psy-ab.3...35831.35831.0.36133.1.1.0.0.0.0.0.0..0.0....0...1c.1.64.psy-ab..1.0.0....0.eR-bRo8GpBk&tbs=lrf:!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:2&rlfi=hd:;si:&qop=0" style="padding: 5px 10px; background-color: #f1f1f1; margin-left: 5px; border-radius: 3px;"> <i class="fas fa-map-marker-alt"></i> GMaps</a></h4>
										</div>
										<div class="content-label">
											<div class="salary">
												<p><b><?php echo $result_jobs['status']; ?></b></p>
											</div>
											<div class="description-label">
												<p><?php echo $result_jobs['self_promotion']; ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="btn-apply">
										<h3>Detail lamaran</h3>
										<i class="fab fa-studiovinari"></i>
										<?php 
											if ($result_jobs['status'] == "Tidak Sesuai") {
												?>
												<a href="detail_application?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>&application_id=<?php echo $result_jobs['id']; ?>" class="btn-danger">Hapus lamaran</a>
												<?php
											}
											else{
										 ?>
											<a href="detail_application?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>&application_id=<?php echo $result_jobs['id']; ?>">Detail Lamaran</a>
										<?php
											if ($result_jobs['status'] == "Menunggu Jawaban Dari Pertanyaan Admin") {
												$companys_name = $result_jobs['companys_name'];
												$check_test = mysqli_query($conn, "SELECT * FROM test WHERE companys_name = '$companys_name'");
												if (mysqli_num_rows($check_test) == 0) {
													?>
												 	<p>Wawancara "<?php echo $companys_name; ?>" belum tersedia</p>
												 	<?php
												}else{
													?>
													<a href="answer-questions?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>&application_id=<?php echo $result_jobs['id']; ?>" class="btn-mini">Jawab pertanyaan</a>
													<?php
												}
											 } 
											}
										 ?>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>	
					</div>
				</div>
			</div>	
		</div>
	</section>
	<?php 
	}
	 ?>
</body>
</html>