<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to PTPN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="background-image: url(assets/img/sawit.jpg);height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
<div class="container" style="margin-top: 40px;">
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<div style="background-color: black; width: 1000px; height: 500px; border: 2px solid black;border-radius: 50px 50px;opacity: 0.8">
			<div class="row" style="margin-top: 20px;">
				<div class="col-2">
					<img src="assets/img/logo.png" width="150px" style="padding: 20px;"></img>
				</div>
				<div class="col-10">
					<h2 class="text-center" style="color: white">SELAMAT DATANG DI APLIKASI ONLINE</h2>
					<h2 class="text-center" style="color: yellow">HUMAN RESOURCES INFORMATION SYyTEM PTPN</h2>
					<h2 class="text-center" style="color: green">SILAHKAN PILIH MENU DIBAWAH INI</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-3"></div>
				<div class="col-3">
					<img src="assets/img/help.png" width="150px" style="padding: 20px;"></img>
					<h5 style="padding-left: 20px;"><a href="<?php echo base_url('Login') ?>">Login</a></h5>
				</div>
				<div class="col-3">
					<img src="assets/img/library.png" width="195px" style="padding: 20px;"></img>
					<h5 style="padding-left: 20px;"><a href="<?php echo base_url('Home/library') ?>">E-Library</a></h5>
				</div>
				<div class="col-3"></div>
			</div>
			<p class="text-center mt-5" style="color:orange">PT Perkebunan Nusantara V(Persero)</p>
		</div>
		</div>
		<div class="col-1"></div>
	</div>
</div>

</body>
</html>
