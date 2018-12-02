<?php 
	$test_id = $_GET['test_id'];
	$q = mysqli_query($conn, "SELECT * FROM test WHERE id = '$test_id'");
	$results = mysqli_fetch_array($q);
 ?>

<section class="container">
	<div class="content">
		<div class="header">
			<h2>Tes Wawancara "<?php echo $results['title']; ?>"</h2>
			<div class="action">
				<a href="./?interview" class="btn btn-fresh">Kembali</a>
			</div>
		</div>
		<div class="main-content detail">
			<div class="label-main-content">
				<img src="partnership/img_partner/<?php echo $results['logo']; ?>">
			</div>
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="child-main-content">
						<?php
							if (isset($_POST['update'])) {

								$companys_name = $_POST['companys_name'];
								$website  = $_POST['website'];
								$office_address = $_POST['office_address'];

								if (empty($companys_name) || empty($website) || empty($office_address)) {
									if (empty($companys_name)) {
										echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Nama Perusahaan harus diisi !</p>";
									}
									elseif (empty($website)){
										echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Website harus diisi !</p>";
									}
									elseif (empty($office_address)){
										echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Alamat Perusahaan harus diisi !</p>";
									}
								}
								else{
									$q = mysqli_query($conn, "UPDATE partner SET companys_name = '$companys_name', website = '$website', office_address = '$office_address' WHERE id = '$test_id'");
									if ($q) {
										echo "<p class='alert primary'><i class='fas fa-thumbs-up'></i> Sukses mengubah data partnership</p>";
										header("refresh: 1; URL=./?partnership=detail&test_id=$test_id");
									}
								}
							}
						?>
						<form method="POST">
						<h3>Nama Perusahaan</h3>
						<input type="text" name="companys_name" value="<?php echo $results['companys_name']; ?>" class="input" placeholder="Nama Perusahaan" disabled>
						<div class="action-main-content">
							<a href="./?interview=questionsHome&test_id=<?php echo $results['id']; ?>&title=<?php echo $results['title']; ?>" class="btn btn-primary" name="update">Masukan Pertanyaan</a>
							<a href="#delete" class="btn btn-danger" onclick="deletee()">Hapus Tes</a>
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
			window.location = "interview/delete.php?test_id=<?php echo $test_id; ?>";
		}
	}
</script>