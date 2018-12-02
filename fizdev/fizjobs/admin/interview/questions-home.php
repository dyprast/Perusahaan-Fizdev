<?php 
	$test_id = $_GET['test_id'];
	$title = $_GET['title'];
	$q = mysqli_query($conn, "SELECT * FROM questions_test WHERE test_id = '$test_id' ORDER BY id");
 ?>

<section class="container">
	<div class="content">
		<div class="header">
			<h2>Pertanyaan Tes "<?php echo $title; ?>"</h2>
			<div class="action">
				<a href="./?interview=detail&test_id=<?php echo $test_id; ?>" class="btn btn-fresh" style="margin-right: 5px;">Kembali</a>
				<a href="./?interview=addQuestion&test_id=<?php echo $test_id."&title=".$title; ?>" class="btn btn-primary">Tambah Pertanyaan</a>
			</div>
		</div>
		<div class="main-content">
			<div class="row">
		<?php
			$number = 1; 
			while($results = mysqli_fetch_array($q)){
		 ?>
				<div class="col-12 col-md-3">
					<div class="cards">
						<div class="top-cards">
							<p class="gray">Nomor <?php echo $number; ?></p>
							<p class="label-top-cards"><?php echo $results['title']; ?></p>
							<input type="hidden" id="question-id-<?php echo $number; ?>" value="<?php echo $results['id']; ?>">
						</div>
						<div class="content-cards" style="text-align: center;">
							<p><?php echo $results['question']; ?></p>
						</div>
						<div class="action-cards">
							<a href="#deleteQuestion" class="btn btn-danger" onclick="deleete()">Delete</a>
						</div>
					</div>
				</div>
				<script>
					function deleete(){
						var conf = confirm("Konfirmasi Hapus Pertanyaan");
						var number;
						for (number = 1; number <= 6; number++){
							var question_ = document.getElementById("question-id-"+number).id;
						}
							alert(question_);
					}
				</script>
		<?php  
			$number++;
			}
		 ?>
			</div>
		</div>
	</div>
</section>