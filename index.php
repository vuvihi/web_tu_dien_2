<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/autocomplete.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Bài tập môn Quản lý dự án">
		<meta name="author" content="Thực hiện bởi nhóm 323+">
		<link rel="shortcut icon" href="img/icon.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<?php
		$bol=!empty($_POST['bol'])?$_POST['bol']:'';
		include 'thu_vien.php';
		$input=!empty($_POST['input'])?$_POST['input']:'';
		$start=!empty($_POST['start'])?$_POST['start']:'';
		$end=!empty($_POST['end'])?$_POST['end']:'';
		?>
		<title>Demo Từ điển online</title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
		<link href="css/landing-page.min.css" rel="stylesheet">
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-light bg-light static-top">
			<div class="container">
				<a class="navbar-brand" href="index.php">323+</a>
				<a class="btn btn-primary" href="index.php">Từ điển Anh - Việt</a>
			</div>
		</nav>
		<header class="masthead text-white text-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-lg-8 col-xl-7 mx-auto" style="top: -100px">
						<form id="myform" autocomplete="off" method='POST' action="index.php">
							<div class="form-row">
								<div class="col-12 col-md-9 mb-2 mb-md-0">
									<input class="form-control form-control-lg" id="input" type="text" name="input" placeholder="Nhập từ cần tra" style="border-radius: 0rem">
									<input id="start" type="hidden" name="start">
									<input id="end" type="hidden" name="end">
									<input id="bol" type="hidden" name="bol" value="true">
								</div>
								<div class="col-12 col-md-3">
									<button type="button" onclick="play()" class="btn btn-block btn-lg btn-primary"><i class="fas fa-volume-up"></i></button>
									<?php
									if($bol != '')
									{
										$src = "'sound/".$input.".mp3'";
										echo "<audio id='audio' src= $src>";
									}
									else
										echo "<audio id='audio' src= 'sound/default_sound.mp3'>";
									?>
										Trình duyệt của bạn không hỗ trợ phát âm thanh!
									</audio>
									<script>
										var sound = document.getElementById("audio");
									  function play(){  
										    sound.play(); 
									  }  
									</script>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php
				if($bol != '')
				{
				echo '<div class="card" style="color: #fff;background-color: white;text-align: left">';
				echo '<div class="card-body">';
				if($input != '') echo '<font color="black">'.get_mean($start, $end).'</font>';
				echo '</div></div>';
				}
				?>
				</div>
			</header>
			<!-- Footer -->
			<footer class="footer bg-light">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 h-100 text-center text-lg-left my-auto">
							<p class="text-muted small mb-4 mb-lg-0">&copy; A Project from 323+</p>
						</div>
						<div class="col-lg-6 h-100 text-center text-lg-right my-auto">
							<ul class="list-inline mb-0">
								<li class="list-inline-item">
									<a href="https://github.com/vuvihi/demotudienonline">
										<i class="fab fa-github fa-2x fa-fw"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
			<!--Make sure the form has the autocomplete function switched off:-->
			<script src="vendor/jquery/autocomplete.js"></script>
			<script src="vendor/jquery/autocomplete_code.js"></script>
			<!-- Bootstrap core JavaScript -->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		</body>
	</html>