<?php 
	include '../../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		?>
		<script type="text/javascript">
			alert("Sebelum melamar, anda harus login terlebih dahulu!");
			window.location="../accounts/login";
		</script>
		<?php
	}
 ?>
<!-- AUTHOR : ROMADHAN EDY PRASETYO - RPL SMKN 10 JAKARTA -->
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Konfirmasi Lamaran</title>
	<link rel="icon" href="../../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../../___/assets/css/apply.css">
	<link rel="stylesheet" href="../../../../../___/assets/font-awesome/css/all.css">
 </head>
 <body>
 	<section>
 		<div class="confirm-apply">
 			<div class="row">
 				<div class="col-12 col-md-12">
 					<?php 
 						$job_type = $_SESSION['job_type'];
						$companys_name = $_SESSION['companys_name'];
						$self_promotion = $_SESSION['self_promotion'];
						$salary = $_SESSION['salary'];
						$logo = $_SESSION['logo'];
 					 ?>
 					<div class="card">
 						<div class="top-card">
 							<h4><i class="fas fa-clipboard-check"></i>Konfirmasi Lamaran</h4>
 						</div>
 						<div class="content-card">
 							<div class="header-content-card">
 								<img src="../../../../../admin/partnership/img_partner/<?php echo $logo; ?>">
 								<h2><?php echo $job_type; ?></h2>
 								<h3><?php echo $companys_name; ?></h3>
 								<div class="salary">
 									<p>IDR</p>
 									<p><?php if ($salary == 99)
										echo "0 (Gaji Dirahasiakan)"; else echo number_format($salary); ?></p>
 								</div>
 							</div>
 							<div class="label-content-card">
 								<div class="description">
 									<h3>Promosi diri</h3>
 									<p><?php echo $self_promotion; ?></p>
 								</div>
 							</div>
 							<div class="action-card">
 								<a href="#cancel-apply" class="btn btn-danger"  onclick="cancelApply()">Batalkan lamaran</a>
 								<a href="#confirm-apply" class="btn" onclick="confirmApply()">Konfirmasi lamaran</a>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<script type="text/javascript">
 		function confirmApply(){
 			var conf = confirm("Konfirmasi lamaran anda sekarang?");
 			if (conf == true) {
 				window.location="applying-proccess.php?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>";
 			}
 		}
 		function cancelApply(){
 			var canc = confirm("Batalkan lamaran anda sekarang?");
 			if (canc == true) {
 				window.location="cancel.php";
 			}
 		}
 	</script>
 </body>
 </html>