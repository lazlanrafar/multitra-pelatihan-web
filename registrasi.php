<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Registrasi</title>

    <link rel="canonical" href="/style/dashboard/dashboard.css">
    <link rel="stylesheet" type="text/css" href="sidebarstyle.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multidasa</title>
   </html>

<body>
  



<?php include('sidebar.php'); ?>

  
<div id="content-area">
  <span style="font-size: 30px;cursor: pointer" onclick="openNav()">&#9776;</span>


  <main class="col-xl-12 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Registrasi</h1>
     
      </div>



<!-- isi konten  -->

</main>


    </body>

    </html>
<?php 
require 'function.php';

if(isset($_POST["nama"]) ) {
  $data = new stdClass();
  $data->nama = $_POST["nama"];
  $data->email = $_POST["email"];
  $data->username = $_POST["username"];
  $data->password = $_POST["password"];
  $data->password2 = $_POST["password2"];
  $data->user_akses = $_POST["user_akses"];

	if (registrasi($data)) {
		echo "<script>
			alert('user berhasil ditambahkan!');
		</script";

	} else {
		echo mysqli_error($conn);
	} 



}




?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
<form action="" method="post" name="register">

<div class="modal-body">


			<div class="mb-3">
                <label class="form-label" for="nama">Nama </label>
                <Input class="form-control" type="text" name="nama" id="nama" required>
            </div>
			
			<div class="mb-3">
                <label class="form-label" for="email">Email </label>
                <Input class="form-control" type="text" name="email" id="email" required>
            </div>

			<div class="mb-3">
                <label class="form-label" for="username">Username  </label>
                <Input class="form-control" type="text" name="username" id="username" required>
            </div>

			<div class="mb-3">
                <label class="form-label" for="password">Password  </label>
                <Input class="form-control" type="password" name="password" id="password" required>
            </div>

			<div class="mb-3">
                <label class="form-label" for="password2">Konfirmasi Password  </label>
                <Input class="form-control" type="password" name="password2" id="password2" required>
            </div>

            <div class="mb-3">
              <label class="form-label" for="user_akses">User Akses</label>
              <select class="form-select" aria-label="Default select example" name="user_akses" id="user_akses">
                <option selected>Pilih</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Marketing">Marketing</option>
                <option value="Admin Operasional">Admin Operasional</option>
                <option value="Operasional Training">Operasional Training</option>
              </select>
            </div>

			<div class="modal-footer">
        	<button type="submit" name="register" class="btn btn-primary">Register</button>
      		</div>
	
	</div>
</form>

</body>
</html>