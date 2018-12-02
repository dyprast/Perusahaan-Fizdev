<section class="container">
	<div class="content">
		<div class="header">
			<h2>Tambah Partnership</h2>
			<div class="action">
				<a href="./?partnership" class="btn btn-fresh">Kembali</a>
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
						$website = $_POST['website'];
						$office_address = $_POST['office_address'];
						$tmp_logo = $_FILES['logo']['tmp_name'];
						$logo = $_FILES['logo']['name'];

						if (empty($companys_name) || empty($website) || empty($office_address) || empty($logo)) {
							if (empty($companys_name)) {
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Nama Perusahaan harus diisi !</p>";
							}
							elseif (empty($website)){
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Website harus diisi !</p>";
							}
							elseif (empty($office_address)){
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Alamat Perusahaan harus diisi !</p>";
							}
							elseif (empty($logo)){
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Logo Perusahaan harus diisi !</p>";
							}
						}
						else{
							/*$check_companysName = mysqli_query($conn, "SELECT companys_name FROM partner");
							while($r = mysqli_fetch_array($check_companysName)){
								if ($r['companys_name'] == $companys_name) {
									?>
									<script type="text/javascript">
										alert("Nama Perusahaan Sudah Ada!");
										window.location = "./?partnership=addPartnership";
									</script>
									<?php
								}
							}*/
							$q = mysqli_query($conn, "INSERT INTO partner (companys_name, website, office_address, logo) VALUES ('$companys_name', '$website', '$office_address', '$logo')");
								if ($q) {
									move_uploaded_file($tmp_logo, "partnership/img_partner/".$logo);
									header("location: ./?partnership");
								}
						}

					}
				 ?>
				<form method="POST" enctype="multipart/form-data">
					<h3>Nama Perusahaan</h3>
					<input type="text" name="companys_name" class="input" placeholder="Nama Perusahaan">
					<h3>Website</h3>
					<input type="text" name="website" class="input" placeholder="Website">
					<h3>Alamat Perusahaan</h3>
					<textarea name="office_address" class="input txtarea" placeholder="Alamat Perusahaan"></textarea>
					<h3>Logo Perusahaan</h3>
					<input type="file" name="logo" class="input" placeholder="Logo Perusahaan">
					<div class="action">
						<button type="submit" name="addPartner" class="btn btn-primary">Tambah Partner</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>