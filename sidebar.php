

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">


	<div id="side-menu" class="sideMenu">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div class="main-menu">
			<h2>SideMenu</h2>
			<?php
				if ($_SESSION['user_akses'] == 'Super Admin') {
					?>
						<a href="index.php"><i class="fa fa-home"></i>Home</a>
					<a href="registrasi.php"><i class="fa fa-phone"></i>Registrasi</a>

					<?php
				}
			?>

			<?php
				if ($_SESSION['user_akses'] == 'Marketing') {
					?>
						<a href="marketing.php"><i class="fa fa-users"></i>Marketing</a>
					<?php
				}
			?>

			<?php 
				if ($_SESSION['user_akses'] == 'Operasional Training') {
					?>
						<a href="operasional_training.php"><i class="fa fa-book"></i>Operasional Training</a>
					<?php
				}
			?>

			<?php 
				if ($_SESSION['user_akses'] == 'Admin Operasional') {
					?>
						<a href="admin_operasional.php"><i class="fa fa-phone"></i>Admin Operasional</a>
					<?php
				}
			?>

			<a href="logout.php" class="btn btn-danger" style="position: absolute; bottom:0; padding: 10px;left: 50%; transform: translateX(-50%);">Log Out <i class="bi bi-box-arrow-right"></i></a>
		</div>
	</div>

	<script>
		
		function openNav(){
			document.getElementById("side-menu").style.width = "250px";
			document.getElementById("content-area").style.marginLeft = "250px";
		}

		function closeNav(){
			document.getElementById("side-menu").style.width = "0";
			document.getElementById("content-area").style.marginLeft = "0";
			console.log('cdf')
		}
	</script>