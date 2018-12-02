<?php 
	include '../../../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		header("location: ../../../../.././");
	}
	else {
        if ($_SESSION["type"] == "admin") {
            ?>
            <script type="text/javascript">
                alert("Kamu adalah admin, lakukan aktivitas admin yang telah di perintahkan!");
                window.location = "../../../../../../admin/";
            </script>
            <?php
        }
    }
 ?>
<!-- AUTHOR : ROMADHAN EDY PRASETYO - RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale-1.0">
	<title>Detail Lamaran</title>
	<link rel="icon" href="../../../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../../../___/assets/css/detail-application.css">
	<link rel="stylesheet" href="../../../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<section>
		<div class="detail-application">
			<div class="row">
				<div class="col-12 col-md-12">
					<?php
						$application_id = $_GET['application_id'];
						$show_detail = mysqli_query($conn, "SELECT * FROM application_file WHERE id = '$application_id'");
						$result_detail = mysqli_fetch_array($show_detail);
					 ?>
					<div class="page">
						<div class="action">
							<h4><i class="fas fa-id-card"></i>Detail lamaran</h4>
							<a href="../?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>"><i class="fas fa-window-close"></i></a>
						</div>
						<div class="card">
							<div class="header-card">
								<h3><?php echo $result_detail['status']; ?></h3>
								<h2><?php echo $result_detail['job_type']; ?></h2>
								<h4><?php echo $result_detail['companys_name']; ?></h4>
							</div>
							<div class="content-card">
								<h3>Promosi diri</h3>
								<textarea><?php echo $result_detail['self_promotion']; ?></textarea>
							</div>
							<div class="bio-card">
								<h2>Biodata</h2>
								<div class="child">
									<h3>Nama Lengkap :</h3>
									<p><?php echo $result_detail['full_name']; ?></p>
								</div>
								<div class="child">
									<h3>Email :</h3>
									<p><?php echo $result_detail['email']; ?></p>
								</div>
								<div class="child">
									<h3>Jenis Kelamin :</h3>
									<p><?php echo $result_detail['gender']; ?></p>
								</div>
								<div class="child">
									<h3>Tanggal Lahir :</h3>
									<p><?php echo $result_detail['date_of_birth']; ?></p>
								</div>
								<div class="child">
									<h3>Pendidikan Terakhir :</h3>
									<p><?php echo $result_detail['graduates']; ?></p>
								</div>
								<div class="child">
									<h3>Keahlian :</h3>
									<p><?php echo $result_detail['expertise']; ?></p>
								</div>
								<div class="child">
									<h3>File Persyaratan</h3><br>
									<a href="../../../apply/application_file/<?php echo $result_detail['application_file']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
								</div>

							</div>
							<div class="action-card">
								<a href="#delete-application" id="delete">Batalkan lamaran</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		document.getElementById('delete').onclick = function(){
			var confimartion = confirm("Hapus lamaran pekerjaan <?php echo $result_detail['job_type']; ?>?");
			if (confimartion == true) {
				window.location = "delete-application.php?application_id=<?php echo $result_detail['id']; ?>";
			}
		}
	</script>
</body>
</html>