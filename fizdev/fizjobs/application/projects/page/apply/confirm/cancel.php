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
	unlink('../application_file/'.$_SESSION['app_file']);
	header("location: ../../vacancies");
?>