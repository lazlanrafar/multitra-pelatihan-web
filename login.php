<?php
session_start();

if(isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

require 'function.php';

if (isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if (mysqli_num_rows($result) === 1 ) {
		
		// cek password 
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;
			$_SESSION["user"] = $row;
			$_SESSION["user_akses"] = $row["user_akses"];

			if ($row["user_akses"] == 'Super Admin') {
				header("Location: index.php");
			} else if ($row["user_akses"] == 'Marketing'){
				header("Location: marketing.php");

			}else if ($row["user_akses"] == 'Admin Operasional'){
				header("Location: admin_operasional.php");

			}else if ($row["user_akses"] == 'Operasional Training'){
				header("Location: operasional_training.php");
			}

			exit;	
		}
	} else {
			echo "
			<script>
			document.location.href = '';
			</script>
		";
	}
	$error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="main">
  <?php if (isset($error)) :  ?>
	<?php echo "<script> alert ('Username / Password Salah')</script>"?>
	<?php endif; ?>

   	<div class ="login">
   	
   	<form action="" method="post">
			<h4 class="text-center">LOGIN</h4>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" placeholder="Masukkan Username Anda!" autofocus autocomplete="off">	
	
			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Masukkan Password Anda!" >	
	
			<button type="submit" name="login" class="btn btn-primary">Login</button>
	
	</form>
</div>
</div>

</body>
</html>



