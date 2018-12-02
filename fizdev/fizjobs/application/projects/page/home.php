<?php 
	include 'projects/page/topnav.php';
 ?>
<section>
		<div id="slideshow">
		   <div>
		   		<div class="overlay"></div>
		     	<img src="../___/assets/img/home-1.jpg">
		   </div>
		   <div>
		   		<div class="overlay"></div>
		     	<img src="../___/assets/img/home-2.jpg">
		   </div>
		   <div>
		   		<div class="overlay"></div>
		     	<img src="../___/assets/img/home-3.jpg">
		   </div>
		   <div>
		   		<div class="overlay"></div>
		     	<img src="../___/assets/img/home-4.jpg">
		   </div>
		   <div>
		   		<div class="overlay"></div>
		     	<img src="../___/assets/img/home-5.jpg">
		   </div>
		</div>
</section>
<section>
		<div class="panel-home-search">
			<div class="search-box">
				<form method="POST">
					<h3>Pencarian</h3>
					<input type="text" name="search-box" placeholder="Kata kunci pekerjaan">
					<input type="submit" name="search-btn" value="Cari" class="search-btn">
				</form>
				<?php 
					if (isset($_POST['search-btn'])) {
						$keyword = $_POST['search-box'];
						header("location: projects/page/vacancies/?keyword=$keyword");
					}
				 ?>
				<div class="popular-search-box">
					<div class="header">
						<h4>LOWONGAN PEKERJAAN TERPOPULER</h4>
					</div>
					<div class="content">
						<a href="projects/page/vacancies/?keyword=IT">IT</a>
						<a href="projects/page/vacancies/?keyword=Programmer">Programmer</a>
						<a href="projects/page/vacancies/?keyword=Developer">Developer</a>
						<a href="projects/page/vacancies/?keyword=Software">Software</a>
					</div>
				</div>
			</div>
		</div>				
</section>
<section>
		<div class="panel-home-support">
			<div class="header">
				<h4>BERSAMA KAMI DAN DIDUKUNG OLEH</h4>
			</div>
			<div class="content">
				<div class="row">
					<?php 
						$company = mysqli_query($conn, "SELECT * FROM partner ORDER BY RAND() DESC LIMIT 12");
						while ($show_company = mysqli_fetch_array($company)) {
					 ?>
					<div class="col-12 col-md-2">
						<div class="logo-support">
							<a href="<?php echo $show_company['website']; ?>"><img src="../admin/partnership/img_partner/<?php echo $show_company['logo']; ?>"></a>
						</div>
					</div>
					<?php 
						}
					 ?>
				</div>
			</div>
		</div>
</section>
<section>
		<div class="footer">
			<div class="row">
				<div class="col-12 col-md-4">
					<div class="card-about">
						<div class="logo-card">
							<img src="../___/assets/img/logo.png">
						</div>
						<div class="content-card">
							<p>Fizjobs merupakan aplikasi berbasis web yang memiliki fungsi utama untuk melamar pekerjaan pada perusahaan yang telah terdaftar dan terdapat lowongan pada perusahaan masing-masing.</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-2">
					<div class="cards">
						<div class="header">
							<h4>Tentang kami</h4>
						</div>
						<div class="content">
							<div class="action">	
								<a href="">Berkarir bersama</a>
							</div>
							<div class="action">	
								<a href="">Kontak kami</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-2">
					<div class="cards">
						<div class="header">
							<h4>Perusahaan</h4>
						</div>
						<div class="content">
							<div class="action">	
								<a href="">Mengapa kami?</a>
							</div>
							<div class="action">	
								<a href="">Syarat Penggunaan</a>
							</div>
							<div class="action">	
								<a href="">Pasang Lowongan</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="cards social">
						<div class="header">
							<h4>Sosial</h4>
						</div>
						<div class="content">
							<a href=""><i class="fab fa-facebook"></i></a>
							<a href=""><i class="fab fa-twitter"></i></a>
							<a href=""><i class="fab fa-google-plus"></i></a>
							<a href=""><i class="fab fa-instagram"></i></a>
							<a href=""><i class="fab fa-youtube"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="copyright">
			<p>Copyright © 2018, All right reserved</p>
		</div>
</section>
<script type="text/javascript" src="../___/assets/jquery/jquery.js"></script>
<script type="text/javascript">
	$("#slideshow > div:gt(0)").hide();

	setInterval(function() {
	  $('#slideshow > div:first')
	    .fadeOut(2000)
	    .next()
	    .fadeIn(2000)
	    .end()
	    .appendTo('#slideshow');
	}, 3000);
</script>