<nav class="topnav">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="logo-responsive">
						<a href="../../../../?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>"><img src="../../../../../___/assets/img/logo.png"></a>
						<a href="#" class="icon btn btn-primary" onclick="menuResponsive()"><i class="fas fa-bars"></i></a>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="navbar" id="show_menu">
						<ul>
							<li>
								<a href="../../vacancies">Lowongan</a>
							</li>
							<?php
								if (!isset($_SESSION['logged'])) {
							 ?>
							<li>
								<a href="fizjob/page/accounts/login">Masuk</a>
							</li>
							<li>
								<a href="fizjob/page/accounts/register">Mendaftar</a>
							</li>
							<?php 
								}
								else{
							 ?>
							 <li>
							 	<a href="../../../../?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>">Beranda</a>
							 </li>
							 <li>
							 	<a href="#logout" id="logoutConf">Logout</a>
							 </li>
							 <?php 
							 	}
							  ?>
							<li>
								<a href="../../../../../../fizdev_company" class="active">Perusahaan</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>		
</nav>

<script type="text/javascript">
	document.getElementById('logoutConf').onclick = function(){
		var conf = confirm("Anda ingin logout?");
		if (conf == true) {
			window.location = "../../../page/accounts/logout.php";
		}
	}
	function menuResponsive(){
		var x = document.getElementById("show_menu");
		if (x.className === "navbar") {
			x.className += " responsive";
		}
		else{
			x.className = "navbar";
		}
	}
</script>