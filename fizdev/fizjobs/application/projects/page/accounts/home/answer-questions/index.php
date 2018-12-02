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
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<title>Menjawab Pertanyaan</title>
	<link rel="icon" href="../../../../../../___/assets/img/icon.png">
	<link rel="stylesheet" href="../../../../../../___/assets/css/custom.css">
	<link rel="stylesheet" href="../../../../../../___/assets/css/base.css">
	<link rel="stylesheet" href="../../../../../../___/assets/css/answer-page.css">
	<link rel="stylesheet" href="../../../../../../___/assets/font-awesome/css/all.css">
</head>
<body>
	<section>
		<div class="form-page">
			<div class="action-top">
				<h4><i class="fas fa-id-card"></i>Menjawab Pertanyaan</h4>
				<a href="../?<?php echo $_SESSION['validation_account']; ?>=<?php echo $_SESSION['id_account']; ?>"><i class="fas fa-window-close"></i></a>
			</div>
			<div class="information-form">
				<?php 
					$validation = $_SESSION['validation_account'];
					$account_id = $_GET[$validation];
					$application_id = $_GET['application_id'];
					$apply_inf = mysqli_query($conn, "SELECT * FROM application_file WHERE id = '$application_id'");
					$result_inf = mysqli_fetch_array($apply_inf);
					$job_type = $result_inf['job_type'];
					$companys_name = $result_inf['companys_name'];
					$logo = mysqli_query($conn, "SELECT logo FROM partner WHERE companys_name = '$companys_name'");
					$res_logo = mysqli_fetch_array($logo);
				 ?>
				 <div class="img-information">
				 	<img src="../../../../../../admin/partnership/img_partner/<?php echo $res_logo['logo']; ?>">
				 </div>
				 <h2><?php echo $result_inf['job_type']; ?></h2>
				 <h3><?php echo $result_inf['companys_name']; ?></h3>
			</div>
			<div class="main-page">
				<form method="POST">
					<?php
						$a = mysqli_query($conn, "SELECT companys_name FROM application_file WHERE id = '$application_id'");
						$f = mysqli_fetch_array($a)['companys_name'];
						$b = mysqli_query($conn, "SELECT id FROM test WHERE companys_name = '$f'");
						$f_b = mysqli_fetch_array($b)['id']; 
						$check_answer = mysqli_query($conn, "SELECT * FROM answers_test WHERE account_id = '$account_id' AND test_id = '$f_b'");
						if (mysqli_num_rows($check_answer) > 0) {
								?>
							<script type="text/javascript">
									alert("Data Jawaban Sudah Ada!");
									window.location = "answer-page/?<?php echo $validation; ?>=<?php echo $account_id ?>&test_id=<?php echo $f_b; ?>&application_id=<?php echo $application_id; ?>";
							</script>
							<?php
						}
						 $show_q = mysqli_query($conn, "SELECT * FROM questions_test WHERE test_id = '$f_b'");
							if (mysqli_num_rows($show_q) <= 0) {
								?>
								<script>
									alert("Mohon maaf, Pertanyaan Belum Tersedia Untuk Perusahaan Ini, dan sedang dalam proses");
								</script>
								<?php
								$validation = $_SESSION['validation_account'];
								$account_id = $_SESSION['id_account'];
								header("location: ../?$validation=$account_id");
							}
						$num = 1;
						while($results = mysqli_fetch_array($show_q)){
					 ?>
					<h3><?php echo $num.". ".$results['question']; ?></h3>
					<textarea placeholder="Masukan Jawaban Anda disini ...." name="answer_<?php echo $num; ?>"></textarea>
					<?php 
						$num++;
						}
					 ?>
					 <div class="action">
					 	<input type="submit" name="answer-q" value="Kirim" class="btn btn-primary">
					 </div>
				</form>
			</div>
		</div>				
	</section>
	<script type="text/javascript">
		function cancel(){
			var conf = confirm("Anda yakin ingin menghapus data lamaran <?php echo $job_type; ?>?");
			if (conf == true) {
				window.location = "../detail_application/delete-application.php?application_id=<?php echo $result_detail['id']; ?>";
			}
		}
	</script>
</body>
</html>

<?php 
	if (isset($_POST['answer-q'])) {
		$num = 1;
		$show_q = mysqli_query($conn, "SELECT * FROM questions_test WHERE test_id = '$f_b'");
		while($results = mysqli_fetch_array($show_q)){
			$answer = $_POST['answer_'.$num.''];
			$q_id = $results['id'];
			$question = $results['question'];
				$input = mysqli_query($conn, "INSERT INTO answers_test (account_id, test_id, questions_id, question, answer) VALUES ('$account_id','$f_b','$q_id','$question','$answer')");
			if ($question) {
				header("location: answer-page/?$validation=$account_id&test_id=$f_b&application_id=$application_id");
			}
			$num++;
		}
	}
 ?>