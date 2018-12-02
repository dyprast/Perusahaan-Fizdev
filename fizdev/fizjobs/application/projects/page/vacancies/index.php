	<?php 
	include '../../../connectionDb/conn.php';
	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	}
	else {
		$pageno = 1;
	} 
 ?>
<!-- AUTHOR : ROMADHAN EDY PRASETYO - RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devcice-width, initial-scale=1.0">
	<title>Lowongan Pekerjaan</title>
	<link rel="icon" href="../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../___/assets/css/vacancies.css">
	<link rel="stylesheet" href="../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<?php  
		include 'topnav-vacancies.php';
	?>
	<section>
		<div class="vacancies">
			<div class="header">
				<h1>Lowongan Pekerjaan</h1>
				<form method="POST">
					<i class="fab fa-searchengin"></i>
					<input type="text" name="search-jobs" placeholder="Cari Pekerjaan">
					<input type="submit" name="search-btn" style="display: none;">
				</form>
				<?php 
					if (isset($_POST['search-btn'])) {
						$keyword = $_POST['search-jobs'];
						header("location: ./?keyword=$keyword");
					}
				 ?>
				<img src="../../../../___/assets/img/logo.png">
			</div>
			<div class="content">
				<div class="row">
					<div class="col-12 col-md-12">
						<?php
							if (isset($_GET['keyword'])) {
								$keyword = $_GET['keyword'];
								?>
						<div class="result-keyword">
							<p>Hasil Pencarian : <b>Lowongan <?php echo $keyword; ?></b></p>
						</div>		
								<?php
									/*PAGINATION*/
									$page = 20;
									$offset = ($pageno - 1) * $page;
									$result = mysqli_query($conn, "SELECT COUNT(*) FROM jobs");
									$rows = mysqli_fetch_array($result)[0];
									$pages = ceil($rows / $page);
									/*END*/
								$show_jobs = mysqli_query($conn, "SELECT * FROM jobs WHERE job_type LIKE '%$keyword%' ORDER BY id DESC, date_upload DESC LIMIT $page OFFSET $offset");
								while($result_jobs = mysqli_fetch_array($show_jobs)){
						 ?>
						<div class="jobs">
							<div class="row">
								<div class="col-12 col-md-10">
									<div class="label">
										<div class="header-label">
											<p><?php echo $result_jobs['date_upload']; ?></p>
											<h2><?php echo $result_jobs['job_type']; ?></h2>
											<h4><a href="<?php echo $result_jobs['website']; ?>"><?php echo $result_jobs['companys_name']; ?></a><h4>
											<h4 style="color: #777; display: flex; flex-wrap: wrap;">Alamat : <?php echo substr($result_jobs['office_address'],0,40); ?><a href="https://www.google.co.id/search?safe=strict&tbm=lcl&ei=eNu5W76cCojgvgS-2JQI&q=<?php echo $result_jobs['companys_name']." ".$result_jobs['office_address']; ?>&gs_l=psy-ab.3...35831.35831.0.36133.1.1.0.0.0.0.0.0..0.0....0...1c.1.64.psy-ab..1.0.0....0.eR-bRo8GpBk&tbs=lrf:!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:2&rlfi=hd:;si:&qop=0" style="padding: 5px 10px; background-color: #f1f1f1; margin-left: 5px; border-radius: 3px;"> <i class="fas fa-map-marker-alt"></i> GMaps</a></h4>
										</div>
										<div class="content-label">
											<div class="salary">
												<p>IDR</p>
												<p><?php if ($result_jobs['salary'] == 99)
													echo "0 (Gaji Dirahasiakan)"; else echo number_format($result_jobs['salary'])."<br>"; ?></p>
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
										<?php 
											if (!isset($_SESSION['logged'])) {
												?>
												<a href="../apply/">APPLY NOW</a>
												<?php
											}
											else{
										 ?>
										 <a href="../apply/?validation_job=<?php echo $result_jobs['id']; ?>&<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>">APPLY NOW</a>
										 <?php 
										 } ?>
									</div>
								</div>
							</div>
						</div>
						<?php 
								}
							}
							else{
								/*PAGINATION*/
									$page = 20;
									$offset = ($pageno - 1) * $page;
									$result = mysqli_query($conn, "SELECT COUNT(*) FROM jobs");
									$rows = mysqli_fetch_array($result)[0];
									$pages = ceil($rows / $page);
								/*END*/
								$show_jobs = mysqli_query($conn, "SELECT * FROM jobs ORDER BY id DESC, date_upload DESC LIMIT $page OFFSET $offset");
								while($result_jobs = mysqli_fetch_array($show_jobs)){
							?>
						<div class="jobs">
							<div class="row">
								<div class="col-12 col-md-10">
									<div class="label">
										<div class="header-label">
											<p><?php echo $result_jobs['date_upload']; ?></p>
											<h2><?php echo $result_jobs['job_type']; ?></h2>
											<h4><a href="<?php echo $result_jobs['website']; ?>"><?php echo $result_jobs['companys_name']; ?></a><h4>
											<h4 style="color: #777; display: flex; flex-wrap: wrap;">Alamat : <?php echo substr($result_jobs['office_address'],0,40); ?><a href="https://www.google.co.id/search?safe=strict&tbm=lcl&ei=eNu5W76cCojgvgS-2JQI&q=<?php echo $result_jobs['companys_name']." ".$result_jobs['office_address']; ?>&gs_l=psy-ab.3...35831.35831.0.36133.1.1.0.0.0.0.0.0..0.0....0...1c.1.64.psy-ab..1.0.0....0.eR-bRo8GpBk&tbs=lrf:!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:2&rlfi=hd:;si:&qop=0" style="padding: 5px 10px; background-color: #f1f1f1; margin-left: 5px; border-radius: 3px;"> <i class="fas fa-map-marker-alt"></i> GMaps</a></h4>
										</div>
										<div class="content-label">
											<div class="salary">
												<p>IDR</p>
												<p><?php if ($result_jobs['salary'] == 99)
													echo "0 (Gaji Dirahasiakan)"; else echo number_format($result_jobs['salary'])."<br>"; ?></p>
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
										<?php 
											if (!isset($_SESSION['logged'])) {
												?>
												<a href="../apply/">APPLY NOW</a>
												<?php
											}
											else{
										 ?>
										 <a href="../apply/?validation_job=<?php echo $result_jobs['id']; ?>&<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>">APPLY NOW</a>
										 <?php 
										 } ?>
									</div>
								</div>
							</div>
						</div>
						<?php
								}
							}
						 ?>
						 <ul class="pagination">
						 	<div>
						 	<li>
						 		<p>Halaman <?php echo $pageno. " dari " .$pages; ?></p>
						 	</li>
						 	</div>
						 	<div>
						    <li>
						    	<a href="./?pageno=1" class="active">&laquo;</a>
						    </li>
						    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
						    	<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "./?pageno=".($pageno - 1); } ?>">Prev</a>
						    </li>
						    <li class="<?php if($pageno >= $pages){ echo 'disabled'; } ?>">
						    	<a href="<?php if($pageno >= $pages){ echo '#'; } else { echo "./?pageno=".($pageno + 1); } ?>">Next</a>
						    </li>
						    <li>
						    	<a class="active" href="./?pageno=<?php echo $pages; ?>">&raquo;</a>
						    </li>
							</div>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>