<?php 
	$application_id = $_GET['application_id'];
	$q = mysqli_query($conn, "SELECT * FROM application_file WHERE id = '$application_id'");
	$results = mysqli_fetch_array($q);
 ?>

<section class="container">
	<div class="content">
		<div class="header">
			<h2>Data lamaran "<?php echo $results['full_name']; ?>"</h2>
			<div class="action">
				<a href="./?application_status☺=answer-questions" class="btn btn-fresh">Kembali</a>
			</div>
		</div>
		<div class="main-content detail">
			<div class="label-main-content">
				<h3><?php echo $results['companys_name']; ?></h3>
				<h2><?php echo $results['job_type']; ?></h2>
				<p><?php echo $results['status']; ?></p>
			</div>
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="child-main-content">
						<h3>Nama Lengkap</h3>
						<p><?php echo $results['full_name']; ?></p>
						<h3>Email</h3>
						<p><?php echo $results['email']; ?></p>
						<h3>Jenis Kelamin</h3>
						<p><?php echo $results['gender']; ?></p>
						<h3>Tanggal Lahir</h3>
						<p><?php echo $results['date_of_birth']; ?></p>
						<h3>Pendidikan Terakhir</h3>
						<p><?php echo $results['graduates']; ?></p>
						<h3>Keahlian</h3>
						<p><?php echo $results['expertise']; ?></p>
						<h3>Promosi Diri</h3>
						<p class="input txtarea"><?php echo $results['self_promotion']; ?></p>
						<h3>File Persyaratan</h3>
						<div style="margin-top: 5px;">
							<a href="../application/projects/page/apply/application_file/<?php echo $results['application_file']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
						</div>
						<div class="action-main-content">
							<button class="btn btn-danger" onclick="decline()">Tolak</button>
						</div>
					</div>
				</div>
			</div>
		</div>					
	</div>
</section>

<script type="text/javascript">
	function accept(){
		var conf = confirm("Konfirmasi terima data lamaran");
		if (conf == true) {
			window.location = "application/status_application/waiting/accept.php?application_id=<?php echo $application_id; ?>";
		}
	}
	function decline(){
		var conf = confirm("Konfirmasi tolak data lamaran");
		if (conf == true) {
			window.location = "application/status_application/waiting/decline.php?application_id=<?php echo $application_id; ?>";
		}
	}
</script>