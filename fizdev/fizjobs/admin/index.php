<?php 
	include '../application/connectionDb/conn.php';  
	if (!isset($_SESSION['logged'])) {
		header("location: ../application/projects/page/accounts/login/");
	}
	elseif($_SESSION['type'] != "admin"){
		$validation = $_SESSION['validation'];
		$account_id = $_SESSION['account_id'];
		header("location: ../application/?$validation=$account_id");
	}
?>
<!-- AUTHOR : ROMADHAN EDY PRASETYO - RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Fizjobs</title>
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="../___/assets/font-awesome/css/all.css">
</head>
<body>
	<nav class="topnav">
		<button class="bars" onclick="sidenav()"><i class="fas fa-bars"></i></button>
		<div class="img-logo">
			<a href="./"><img src="../___/assets/img/logo.png"></a>
		</div>
	</nav>
	<nav class="sidenav" id="side-show">
		<div class="profile-accounts">
			<div class="img-profile">
				<i class="fas fa-user"></i>
			</div>
			<div class="information-profile">
				<h3><?php echo $_SESSION['name']; ?></h3>
				<a href="#signout" class="btn btn-danger" onclick="signout()">Sign out</a>
			</div>
		</div>
		<div class="menu">
			<a href="./" class="menu-child"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
			<a href="#" class="menu-child dropdown"><i class="fas fa-user-tie"></i>Data Lamaran</a>
			<div id="dropdown-menu">
				<a href="./?application_status☺=waiting" id="menu-child-1"><i class="fas fa-user-tie"></i>Tahap Pertama</a>
				<a href="./?application_status☺=answer-questions" id="menu-child-1"><i class="fas fa-user-tie"></i>Menjawab Pertanyaan</a>
				<a href="./?application_status☺=show-results" id="menu-child-1"><i class="fas fa-user-tie"></i>Hasil Jawaban</a>
				<a href="./?application_status☺=accepted" id="menu-child-1"><i class="fas fa-user-tie"></i>Lamaran Yang Diterima</a>
			</div>
			<a href="./?partnership" class="menu-child"><i class="fas fa-store"></i>Partnership</a>
			<a href="./?jobs" class="menu-child"><i class="fas fa-calendar-check"></i>Pekerjaan</a>
			<a href="./?interview" class="menu-child"><i class="fas fa-address-card"></i>Wawancara/Test</a>
			<a href="" class="menu-child"><i class="fas fa-database"></i>Database</a>
		</div>
	</nav>
	<script type="text/javascript">
		var dropdown = document.getElementsByClassName("menu-child");
		var i;

		for (i = 0; i < dropdown.length; i++) {
		  dropdown[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var dropdownContent = this.nextElementSibling;
		    if (dropdownContent.style.display === "block") {
		      dropdownContent.style.display = "none";
		    } else {
		      dropdownContent.style.display = "block";
		    }
		  });
		}
		function sidenav(){
			var x = document.getElementById("side-show");
			if (x.className === 'sidenav') {
				x.className += ' show';
			}
			else{
				x.className = 'sidenav';
			}
		}
		function signout(){
			var conf = confirm("Anda ingin logout?");
			if (conf == true) {
				window.location="../application/projects/page/accounts/logout.php";
			}
		}
	</script>
	<?php
		if (isset($_GET['application_status☺'])) {
		 	switch ($_GET['application_status☺']) {
		 		case 'waiting':
		 			include 'application/status_application/waiting/waiting.php';
		 			break;
		 		case 'detail@waiting':
		 			include 'application/status_application/waiting/detail.php';
		 			break;
		 		case 'answer-questions':
		 			include 'application/status_application/answer-questions/answer-questions.php';
		 			break;
		 		case 'detail@answer-questions':
		 			include 'application/status_application/answer-questions/detail.php';
		 			break;
		 		case 'show-results':
		 			include 'application/status_application/results-questions/show-results.php';
		 			break;
		 		case 'detail@show-results':
		 			include 'application/status_application/results-questions/detail.php';
		 			break;

		 		default:
		 			# code...
		 			break;
		 	}
		}
		elseif (isset($_GET['partnership'])) {
			switch ($_GET['partnership']) {
				case 'addPartnership':
					include 'partnership/add-partnership.php';
					break;
				case 'detail':
					include 'partnership/detail.php';
					break;
				
				default:
					include 'partnership/home.php';
					break;
			}
		}
		elseif (isset($_GET['jobs'])){
			switch ($_GET['jobs']) {
				case 'addJob':
					include 'jobs/add-job.php';
					break;
				case 'detail':
					include 'jobs/detail.php';
					break;
				
				default:
					include 'jobs/home.php';
					break;
			}
		}
		elseif (isset($_GET['interview'])){
			switch ($_GET['interview']) {
				case 'addInterview':
					include 'interview/add-interview.php';
					break;
				case 'detail':
					include 'interview/detail.php';
					break;
				case 'questionsHome':
					include 'interview/questions-home.php';
					break;
				case 'addQuestion':
					include 'interview/add-question.php';
					break;
				default:
					include 'interview/home.php';
					break;
			}
		}
		else{ 
			include 'home.php';
		}
	 ?>
</body>
</html>

<!-- FUNCTION ACTION -->
