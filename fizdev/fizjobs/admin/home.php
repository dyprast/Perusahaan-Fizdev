<?php 
	$q_acc = mysqli_query($conn ,"SELECT COUNT(*) FROM accounts");
	$r_acc = mysqli_fetch_array($q_acc)[0];
	$q_jobs = mysqli_query($conn ,"SELECT COUNT(*) FROM jobs");
	$r_jobs = mysqli_fetch_array($q_jobs)[0];
	$q_app_file = mysqli_query($conn ,"SELECT COUNT(*) FROM application_file");
	$r_app_file = mysqli_fetch_array($q_app_file)[0];
	$q_test = mysqli_query($conn ,"SELECT COUNT(*) FROM test");
	$r_test = mysqli_fetch_array($q_test)[0];
 ?>

<section class="container">
	<div class="statistic">
		<div class="row">
			<div class="col-12 col-md-3">
				<div class="statistic-cards">
					<div class="quantity">
						<h1><?php echo $r_acc; ?></h1>
					</div>
					<div class="inform">
						<h3>Akun Terdaftar</h3>
					</div>
					<div class="icon">
						<i class="fas fa-users"></i>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-3">
				<div class="statistic-cards">
					<div class="quantity">
						<h1><?php echo $r_jobs; ?></h1>
					</div>
					<div class="inform">
						<h3>Jenis Pekerjaan</h3>
					</div>
					<div class="icon">
						<i class="fas fa-calendar-check"></i>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-3">
				<div class="statistic-cards">
					<div class="quantity">
						<h1><?php echo $r_app_file; ?></h1>
					</div>
					<div class="inform">
						<h3>Data Lamaran</h3>
					</div>
					<div class="icon">
						<i class="fas fa-user-tie"></i>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-3">
				<div class="statistic-cards">
					<div class="quantity">
						<h1><?php echo $r_test; ?></h1>
					</div>
					<div class="inform">
						<h3>Wawancara Online</h3>
					</div>
					<div class="icon">
						<i class="fas fa-address-card"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="country-maps">
		<img src="assets/img/Flag_map_of_Indonesia.svg">
	</div>
</section>