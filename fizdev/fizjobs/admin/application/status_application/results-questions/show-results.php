<section class="container">
	<div class="content">
		<div class="header">
			<h2>Data pelamar yang Sudah Menjawab Wawancara</h2>
		</div>
		<div class="main-content">
			<form method="POST">
				<h3>Pilih pekerjaan untuk menampilkan data pelamar</h3>
				<select name="select-jobs" class="cbStyle">
					<option value=""> -- Pilih pekerjaan -- </option>
					<option value="show-all">Tampilkan semua</option>
					<?php 
						$q = mysqli_query($conn, "SELECT * FROM jobs ORDER BY job_type");
						while ($results = mysqli_fetch_array($q)) {
					 ?>
					<option value="<?php echo $results['job_type'] ?>"><?php echo $results['job_type'] ?></option>
					<?php 
						}
					 ?>
				</select>
				<button type="submit" name="show" class="btn btn-fresh">Tampilkan</button>
			</form>
	<?php 
		if (isset($_POST['show'])) {
			$select_jobs = $_POST['select-jobs'];
			if (empty($select_jobs)) {
				echo "<p class='alert danger'>Pilih pekerjaan yang ingin ditampilkan</p>";
			}
			elseif ($select_jobs == "show-all") {
				$q = mysqli_query($conn, "SELECT * FROM application_file WHERE status = 'Di proses Admin (Melamar)' ORDER BY id");
	 ?>
	 	<h3 class="inform-show-cards">Menampilkan semua data</h3>
			<div class="row">
			<?php 
				while($results = mysqli_fetch_array($q)){ 
			?>
				<div class="col-12 col-md-6">
					<div class="cards">
						<div class="top-cards">
							<p class="label-top-cards"><?php echo $results['job_type']." - ". $results['companys_name']; ?></p>
							<p class="gray"><?php echo $results['day_of_applying']." - ". $results['date_of_applying']; ?></p>
						</div>
						<div class="content-cards">
							<p class="bold"><?php echo $results['full_name']; ?></p>
							<p class="gray"><?php echo $results['gender']; ?></p>
							<p class="gray"><?php echo $results['expertise']; ?></p>
							<p class="small"><?php echo $results['email']; ?></p>
						</div>
						<div class="action-cards">
							<a href="./?application_status☺=detail@show-results&application_id=<?php echo $results['id']; ?>" class="btn btn-primary">Detail</a>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
	<?php
			}
			else{
				$q = mysqli_query($conn, "SELECT * FROM application_file WHERE status = 'Di proses Admin (Melamar)' AND job_type = '$select_jobs' ORDER BY id");
			?>	
				<h3 class="inform-show-cards">Menampilkan data pelamar "<?php echo $select_jobs; ?>"</h3>
				<div class="row">
				<?php 
					while($results = mysqli_fetch_array($q)){ 
				?>
					<div class="col-12 col-md-3">
						<div class="cards">
							<div class="top-cards">
								<p class="label-top-cards"><?php echo $results['companys_name']; ?></p>
								<h3><?php echo $results['job_type']; ?></h3>
							</div>
							<div class="content-cards">
								<p><?php echo $results['full_name']; ?></p>
								<p><?php echo $results['email']; ?></p>
							</div>
							<div class="action-cards">
								<a href="./?application_status☺=detail@show-results&application_id=<?php echo $results['id']; ?>" class="btn btn-primary">Detail</a>	
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			}
		}
	 ?>
		</div>
	</div>
</section>