<?php 
	$q = mysqli_query($conn, "SELECT * FROM test ORDER BY id DESC");
 ?>

<section class="container">
	<div class="content">
		<div class="header">
			<h2>Tes Wawancara Fizdev.id</h2>
			<div class="action">
				<a href="./?interview=addInterview" class="btn btn-fresh">Tambah Tes</a>
			</div>
		</div>
		<div class="main-content">
			<div class="row">
		<?php 
			while($results = mysqli_fetch_array($q)){
		 ?>
				<div class="col-12 col-md-3">
					<div class="cards">
						<div class="top-cards">
							<img src="partnership/img_partner/<?php echo $results['logo']; ?>">
							<p class="label-top-cards"><?php echo $results['companys_name']; ?></p>
						</div>
						<div class="content-cards" style="text-align: center;">
							<p><?php echo $results['title']; ?></p>
						</div>
						<div class="action-cards">
							<a href="./?interview=detail&test_id=<?php echo $results['id']; ?>" class="btn btn-primary">Detail</a>
						</div>
					</div>
				</div>
		<?php  
			}
		 ?>
			</div>
		</div>
	</div>
</section>