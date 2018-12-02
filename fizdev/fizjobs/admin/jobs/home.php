<?php 
	$q = mysqli_query($conn, "SELECT * FROM jobs ORDER BY id DESC");
 ?>

<section class="container">
	<div class="content">
		<div class="header">
			<h2>Pekerjaan Fizjobs.id</h2>
			<div class="action">
		<?php 
			if (isset($_POST['search'])) {
				$search = $_POST['search'];

				header("location: ./?jobs&keywords=$search");
			}
		 ?>
				<form method="POST" class="form-show">
					<div class="search-tBox">
						<input type="text" name="search" class="input search" placeholder="Cari Pekerjaan dan Kategori">
						<i class="fab fa-searchengin"></i>
					</div>
				</form>
				<a href="./?jobs=addJob" class="btn btn-fresh">Tambah Pekerjaan</a>
			</div>
		</div>
		<div class="main-content">
		<?php
			if (isset($_GET['keywords'])) {
				$keywords = $_GET['keywords'];
				?>
				<div class="info-showData">
					<h3>Menampilkan Hasil Pencarian "<?php echo $keywords; ?>"</h3>
				</div>
				<div class="row">
				<?php

				$q = mysqli_query($conn, "SELECT * FROM jobs WHERE job_type LIKE '%$keywords%' ORDER BY id DESC");
				while($results = mysqli_fetch_array($q)){
		 ?>
		 		<div class="col-12 col-md-6">
					<div class="cards">
						<div class="top-cards">
							<p class="label-top-cards"><?php echo $results['job_type']." - ". $results['companys_name']; ?></p>
							<p class="gray"><?php echo $results['date_upload']; ?></p>
						</div>
						<div class="content-cards">
							<p class="gray">Alamat : <?php echo substr($results['office_address'],0,70); ?> ...</p>
							<p class="green">IDR <?php if ($results['salary'] == "99") echo $results['salary']." (Gaji Dirahasiakan)"; else echo number_format($results['salary'])."<br>"; ?></p>
							<p class="slot">Tersedia : <?php echo $results['slot']; ?> Orang</p>
						</div>
						<div class="action-cards">
							<a href="./?jobs=detail&job_id=<?php echo $results['id']; ?>" class="btn btn-primary">Detail</a>
						</div>
					</div>
				</div>
		<?php 
				}
			}
			else{
				?>
				<div class="info-showData">
					<h3>"Menampilkan Semua Data"</h3>
				</div>
				<div class="row">
				<?php
				while($results = mysqli_fetch_array($q)){
		?>
				<div class="col-12 col-md-6">
					<div class="cards">
						<div class="top-cards">
							<p class="label-top-cards"><?php echo $results['job_type']." - ". $results['companys_name']; ?></p>
							<p class="gray"><?php echo $results['date_upload']; ?></p>
						</div>
						<div class="content-cards">
							<p class="gray">Alamat : <?php echo substr($results['office_address'],0,70); ?> ...</p>
							<p class="green">IDR <?php if ($results['salary'] == 0) echo $results['salary']." (Gaji Dirahasiakan)"; else echo number_format($results['salary'])."<br>"; ?></p>
							<p class="slot">Tersedia : <?php echo $results['slot']; ?> Orang</p>
						</div>
						<div class="action-cards">
							<a href="./?jobs=detail&job_id=<?php echo $results['id']; ?>" class="btn btn-primary">Detail</a>
						</div>
					</div>
				</div>
		<?php
				}
			}
		 ?>
			</div>
		</div>
	</div>
</section>