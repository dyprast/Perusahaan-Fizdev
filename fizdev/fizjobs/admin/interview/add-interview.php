<section class="container">
	<div class="content">
		<div class="header">
			<h2>Tambah Tes Interview</h2>
			<div class="action">
				<a href="./?interview" class="btn btn-fresh">Kembali</a>
			</div>
		</div>
		<div class="main-content">
			<div class="form-main-content">
				<div class="logo">
					<img src="../___/assets/img/logo.png">
				</div>
				<?php 
					if (isset($_POST['addInterview'])) {
						$title = $_POST['title'];
						$companys_name = $_POST['companys_name'];
						$check_companys_name = mysqli_query($conn, "SELECT logo, companys_name, id FROM test WHERE companys_name='$companys_name'");
						if ($title == "" || $companys_name =="") {
							echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Data Form harus diisi !</p>";
						}
						else if (mysqli_num_rows($check_companys_name) > 0) {
							echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Tes Telah Tersedia</p>";
						}
						else{
							$check_partner = mysqli_query($conn, "SELECT id,logo FROM partner WHERE companys_name = '$companys_name'");
							$resultss = mysqli_fetch_array($check_partner);
							$partner_id = $resultss['id'];
							$logo = $resultss['logo'];
							$q = mysqli_query($conn, "INSERT INTO test (title, partner_id, companys_name, logo) VALUES ('$title', '$partner_id', '$companys_name', '$logo')");
							if ($q) {
								echo "<p class='alert primary'><i class='fas fa-thumbs-up'></i> Sukses menambah tes wawancara<p class='alert load'><p></p>";
								header("refresh: 1; URL=./?interview");
							}
							else{
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Gagal Menambah Tes !</p>";
							}
						}
					}
				 ?>
				<form method="POST" enctype="multipart/form-data">
					<h3>Judul Tes Wawancara</h3>
					<input type="text" name="title" class="input" placeholder="☺ Judul Tes Wawancara ☺">
					<h3>Nama Perusahaan</h3>
					<select name="companys_name" class="input">
						<option value="">☺ Nama Perusahaan ☺</option>
					<?php 
						$q = mysqli_query($conn, "SELECT companys_name FROM partner ORDER BY companys_name");
						while($r = mysqli_fetch_array($q)){
					?>	<option value="<?php echo $r['companys_name'] ?>"><?php echo $r['companys_name'] ?></option>
					<?php
						}
					 ?>
					</select>
					<div class="action">
						<button type="submit" name="addInterview" class="btn btn-primary">Tambah Tes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>