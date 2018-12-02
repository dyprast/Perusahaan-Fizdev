<?php 
	$job_id = $_GET['job_id'];
	$q = mysqli_query($conn, "SELECT * FROM jobs WHERE id = '$job_id'");
	$results = mysqli_fetch_array($q);
 ?>

<section class="container">
	<div class="content">
		<div class="header">
			<h2>Jenis Pekerjaan "<?php echo $results['job_type']; ?>"</h2>
			<div class="action">
				<a href="./?jobs" class="btn btn-fresh">Kembali</a>
			</div>
		</div>
		<div class="main-content detail">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="child-main-content">
						<?php
							if (isset($_POST['update'])) {

								$job_type = $_POST['job_type'];
								$description = $_POST['description'];
								$salary = $_POST['salary'];
								$slot = $_POST['slot'];

								if (empty($job_type) || empty($description) || $salary == "" || $slot == "") {
									if (empty($job_type)) {
										echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Jenis Pekerjaan harus diisi !</p>";
									}
									elseif (empty($description)) {
										echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Deskripsi Pekerjaan harus diisi !</p>";
									}
									elseif ($salary == "") {
										echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Gaji harus diisi !</p>";
									}
									elseif ($slot == "") {
										echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Slot harus diisi !</p>";
									}
								}
								else{
									$q = mysqli_query($conn, "UPDATE jobs SET job_type = '$job_type', description = '$description', salary = '$salary', slot = '$slot' WHERE id = '$job_id'");
									if ($q) {
										echo "<p class='alert primary'><i class='fas fa-thumbs-up'></i> Sukses mengubah data pekerjaan</p>";
										header("refresh: 1; URL=./?jobs=detail&job_id=$job_id");
									}
								}
							}
						?>
						<form method="POST">
						<h3>Jenis Pekerjaan</h3>
						<input type="text" name="job_type" value="<?php echo $results['job_type']; ?>" class="input" placeholder="Jenis Pekerjaan">
						<h3>Deskripsi Pekerjaan</h3>
						<textarea name="description" class="input txtarea" placeholder="Deskripsi Pekerjaan"><?php echo $results['description']; ?></textarea>
						<h3>Gaji (IDR)</h3>
						<input type="text" name="salary" value="<?php echo $results['salary']; ?>" class="input" placeholder="Gaji">
						<h3>Slot (Orang)</h3>
						<input type="text" name="slot" value="<?php echo $results['slot']; ?>" class="input" placeholder="Slot">

						<h3>Nama Perusahaan</h3>
						<input type="text" name="companys_name" value="<?php echo $results['companys_name']; ?>" class="input" placeholder="Nama Perusahaan" disabled>
						<h3>Website</h3>
						<input type="text" name="website" value="<?php echo $results['website']; ?>" class="input" placeholder="Website" disabled>
						<h3>Alamat Perusahaan</h3>
						<textarea name="office_address" class="input txtarea" placeholder="Alamat Perusahaan" disabled><?php echo $results['office_address']; ?></textarea>
						<div class="action-main-content">
							<button class="btn btn-primary" name="update">Ubah Data Pekerjaan</button>
							<a href="#delete" class="btn btn-danger" onclick="deletee()">Hapus Pekerjaan</a>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>			
		<div class="info">
			<h4>Catatan :</h4>
			<p>Jika partnership dihapus, maka otomatis semua data yang menyangkut pihak partnership yang dihapus akan hilang termasuk jenis pekerjaan beserta wawancaranya.</p>
		</div>
	</div>
</section>
<script>
	function deletee(){
		var conf = confirm("Konfirmasi hapus data");
		if (conf == true) {
			window.location = "jobs/delete.php?job_id=<?php echo $job_id; ?>";
		}
	}
</script>