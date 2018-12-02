<?php 
	include '../../../../../../connectionDb/conn.php';
	if (!isset($_SESSION['logged'])) {
		header("location: ../../../../../.././");
	}
	else {
        if ($_SESSION["type"] == "admin") {
            ?>
            <script type="text/javascript">
                alert("Kamu adalah admin, lakukan aktivitas admin yang telah di perintahkan!");
                window.location = "../../../../../../../admin/";
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
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<title>Answer Page</title>
	<link rel="icon" href="../../../../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../../../../___/assets/css/answer-page.css">
	<link rel="stylesheet" href="../../../../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<section>
		<div class="answer-page">
			<div class="top-action">
				 <h4><i class="fab fa-keycdn"></i> Jawaban Anda</h4>
				 <a href="../../?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>"><i class="fas fa-window-close"></i></a>
			</div>
			<div class="page">
				<?php
					$validation = $_SESSION['validation_account'];
					$account_id = $_GET[$validation];
					$test_id = $_GET['test_id']; 
					$_q = mysqli_query($conn, "SELECT * FROM test WHERE id = '$test_id'");
					$_r = mysqli_fetch_array($_q)['companys_name'];
					$_detail = mysqli_query($conn, "SELECT * FROM partner WHERE companys_name = '$_r'");
					$results_detail = mysqli_fetch_array($_detail);
				 ?>
				<div class="detail-pt">
					<img src="../../../../../../../admin/partnership/img_partner/<?php echo $results_detail['logo'] ?>">
					<h4><?php echo $results_detail['companys_name']; ?></h4>
					<p><?php echo substr($results_detail['office_address'],0,80); ?> ...</p>
					<a href="https://www.google.co.id/search?safe=strict&tbm=lcl&ei=eNu5W76cCojgvgS-2JQI&q=<?php echo $results_detail['companys_name']." ".$results_detail['office_address']; ?>&gs_l=psy-ab.3...35831.35831.0.36133.1.1.0.0.0.0.0.0..0.0....0...1c.1.64.psy-ab..1.0.0....0.eR-bRo8GpBk&tbs=lrf:!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:2&rlfi=hd:;si:&qop=0" style="padding: 5px 10px; background-color: #f1f1f1; margin-left: 5px; border-radius: 3px; text-decoration: none;"> <i class="fas fa-map-marker-alt"></i> GMaps</a>
				</div>
				<?php
					$application_id = $_GET['application_id'];
					$q = mysqli_query($conn, "SELECT * FROM application_file WHERE id = '$application_id'");
					$results_detail = mysqli_fetch_array($q);
					$q2 = mysqli_query($conn, "SELECT title FROM test WHERE id = '$test_id'");
				 	$res = mysqli_fetch_array($q2)['title'];
				 ?>
				 <div class="detail-job">
				 	<h3><?php echo $results_detail['job_type']; ?></h3>
				 	<h3><?php echo $res; ?></h3>
				 </div>
				 <div class="main-page">
				 	<div class="title">
				 		
				 	</div>
				 	<?php 
				 		$answer = mysqli_query($conn, "SELECT * FROM answers_test WHERE test_id = '$test_id' AND account_id = '$account_id'");
				 		$num = 1;
				 		while($results = mysqli_fetch_array($answer)){
				 	 ?>
				 	 <div class="answer">
				 	 	<h4><?php echo $num.". ".$results['question']; ?></h4>
				 	 	<p><?php echo $results['answer']; ?></p>
				 	 </div>
				 	<?php $num++;} ?>
				 </div>
				<div class="action-apply">
					<a href="#deleteApp" class="btn btn-danger" onclick="deleteApp()">Batalkan lamaran</a>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		function deleteApp(){
			var conf = confirm("Hapus Lamaran Pekerjaan <?php echo $results_detail['job_type']; ?>");
			if (conf == true) {
				window.location="../../detail_application/delete-application.php?application_id=<?php echo $results_detail['id']; ?>"
			}
		}
	</script>
</body>
</html>