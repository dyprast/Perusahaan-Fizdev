<section class="container">
	<div class="content">
		<div class="header">
			<h2>Tambah Pekerjaan</h2>
			<div class="action">
				<a href="./?jobs" class="btn btn-fresh">Kembali</a>
			</div>
		</div>
		<div class="main-content">
			<div class="form-main-content">
				<div class="logo">
					<img src="../___/assets/img/logo.png">
				</div>
				<?php 
					if (isset($_POST['addPartner'])) {
						$companys_name = $_POST['companys_name'];
						$job_type = $_POST['job_type'];
						$salary = $_POST['salary'];
						$description = $_POST['description'];
						$slot = $_POST['slot'];
						$date_upload = date("Y-m-d");

						$partner = mysqli_query($conn, "SELECT office_address, website FROM partner WHERE companys_name = '$companys_name'");
						$r = mysqli_fetch_array($partner);
						$office_address = $r['office_address'];
						$website = $r['website'];

						if (empty($companys_name) || empty($job_type) || empty($salary) || empty($description) || empty($slot)) {
							if (empty($companys_name)) {
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Nama Perusahaan harus diisi !</p>";
							}
							elseif (empty($job_type)){
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Jenis Pekerjaan harus diisi !</p>";
							}
							elseif (empty($salary)){
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Gaji harus diisi !</p>";
							}
							elseif (empty($description)){
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Deskripsi Pekerjaan harus diisi !</p>";
							}
							elseif (empty($slot)){
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Slot harus diisi !</p>";
							}
						}
						else{
							$q = mysqli_query($conn, "INSERT INTO jobs (job_type, description, salary, slot, status, companys_name, date_upload, office_address, website) VALUES ('$job_type', '$description', '$salary', '$slot', 'Tersedia', '$companys_name', '$date_upload', '$office_address', '$website')");
								if ($q) {
									move_uploaded_file($tmp_logo, "partnership/img_partner/".$logo);
									header("location: ./?jobs");
								}
						}

					}
				 ?>
				<form method="POST" enctype="multipart/form-data">
					<h3>Nama Perusahaan</h3>
					<select name="companys_name" class="input">
						<option value=""></option>
					<?php 
						$q = mysqli_query($conn, "SELECT companys_name FROM partner ORDER BY companys_name");
						while($r = mysqli_fetch_array($q)){
					?>	<option value="<?php echo $r['companys_name'] ?>"><?php echo $r['companys_name'] ?></option>
					<?php
						}
					 ?>
					</select>
					<h3>Jenis Pekerjaan</h3>
					<input type="text" name="job_type" class="input" placeholder="Jenis Pekerjaan">
					<h3>Gaji (IDR)</h3>
					<input type="text" name="salary" class="input" placeholder="Gaji">
					<h3>Deskripsi Pekerjaan</h3>
					<textarea name="description" class="input txtarea" placeholder="Deskripsi Pekerjaan"></textarea>
					<h3>Slot (Orang)</h3>
					<input type="text" name="slot" class="input" placeholder="Slot (Orang)">
					<div class="action">
						<button type="submit" name="addPartner" class="btn btn-primary">Tambah Pekerjaan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>