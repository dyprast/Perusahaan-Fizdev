<?php 
	$test_id = $_GET['test_id'];
	$title = $_GET['title'];
 ?>
<section class="container">
	<div class="content">
		<div class="header">
			<h2>Tambah Pertanyaan "<?php echo $title; ?>"</h2>
			<div class="action">
				<a href="./?interview=questionsHome&test_id=<?php echo $test_id."&title=".$title; ?>" class="btn btn-fresh">Kembali</a>
			</div>
		</div>
		<div class="main-content">
			<div class="form-main-content">
				<div class="logo">
					<img src="../___/assets/img/logo.png">
				</div>
				<?php 
					if (isset($_POST['addquestion'])) {
						$question = $_POST['question'];
						if (empty($question)) {
							echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Pertanyaan Tidak Boleh Kosong !</p>";
						}
						else{
							$q = mysqli_query($conn, "INSERT INTO questions_test (test_id, question, title) VALUES ('$test_id','$question','$title')");
							if ($q) {
								echo "<p class='alert primary'><i class='fas fa-thumbs-up'></i> Sukses menambah tes wawancara</p>";
								header("refresh: 1; URL=./?interview=questionsHome&test_id=$test_id&title=$title");
							}
							else{
								echo "<p class='alert danger'><i class='fas fa-info-circle'></i> Gagal Menambah Tes !</p>";
							}
						}
					}
				 ?>
				<form method="POST" enctype="multipart/form-data">
					<h3>Pertanyaan</h3>
					<textarea name="question" class="input txtarea" placeholder="Masukan Pertanyaan Di sini"></textarea>
					<div class="action">
						<button type="submit" name="addquestion" class="btn btn-primary">Tambah Pertanyaan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>