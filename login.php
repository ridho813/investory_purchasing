
<?php

	session_start();
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$koneksi = new mysqli("localhost","root","","purchasing");

	
	?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pengadaan Barang Langsung</title>

	<!-- Bootstrap -->
		
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
	          background: url(img/fotobr.jpg) no-repeat fixed;
	          -webkit-background-size: 100% 100%;
	          -moz-background-size: 100% 100%;
	          -o-background-size: 100% 100%;
	          background-size: 100% 100%;
	        }
		.row {
			margin:100px auto;
			width:400px;
			text-align:center;
		}
		.login {
			background-color:#FFFFFF;
			padding:25px;
			margin-top:10px;
		}
	</style>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	
	<div class="container">
		<div class="row">
		<div class="center">
		<div class="login">
				
				
				
				<form role="form" action="" method="post">
				<h1> UGM RESIDENCE</h1>
				<h4> Sistem Pengadaan Barang Langsung</h4>
				<br>
					<div class="form-group">
					
					 
						<input type="text" name="username"  class="form-control" placeholder="Masukan Username" required autofocus />
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Masukan Password" required autofocus />
					</div>
					
					<div class="form-group">
						<input type="submit" name="login" class="btn btn-primary btn-block" value="Masuk" />
						
					</div>
						<br>
			
				</form>
				
			</div>
		
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

	<?php
	
					$username = $_POST['username'];
					$password = $_POST['password'];
					$login = $_POST['login'];
					
					if ($login) {
						$sql = $koneksi->query("select * from pengguna where username='$username' and password='$password'");
						$ketemu = $sql->num_rows;
						$data = $sql->fetch_assoc();
						
						if ($ketemu >=1) {
							session_start();
							
							if ($data['level'] == 'SPV Purchasing') {
								$_SESSION['SPV Purchasing'] =$data['idusers'];
								
								header("location:index3.php");
								}
							else if ($data['level'] == 'Adm Purchasing') {
								$_SESSION['Adm Purchasing'] =$data['idusers'];
								
								header("location:index2.php");
								}
							else if ($data['level'] == 'SPV Unit') {
								$_SESSION['SPV Unit'] =$data['idusers'];
								
								header("location:index1.php");
								}
							else if ($data['level'] == 'Manajer') {
								$_SESSION['Manajer'] =$data['idusers'];
								
								header("location:index.php");
								}
							}
						else {
							echo '<center><div class="alert alert-danger">Maaf... Login gagal. Silahkan Coba Kembali</div></center>';
						
						}
					}
					
				?>
			