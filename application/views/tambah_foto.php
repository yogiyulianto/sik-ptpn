<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>hasil pencarian karyawan</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Human Resources Information System PTPN V</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>Home">Home</a>
      </li>
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Karyawan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url() ?>karyawan">Data Pribadi</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>jenjangpendidikan">Pendidikan Formal</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>riwayatjabatan">Riwayat Jabatan</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>riwayatgolongan">Riwayat Golongan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Data Umum
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url() ?>kursusumum">Kursus Umum</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>rewards">Rewards/Punisment</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>batih">Batih</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>pengalamanorganisasi">Pengalaman Organisasi</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="<?php echo base_url() ?>home/library" tabindex="-1">Panduan</a>
			</li>
			<li class="nav-item">
        <a class="nav-link disabled" href="<?php echo base_url() ?>login" tabindex="-1">Logout</a>
      </li>
    </ul>
			<ul class="nav navbar-nav navbar-right">
				<img src="assets/img/logo.png" width="80px" style="padding: 20px;">
				<a class="nav-link disabled" href="<?php echo base_url() ?>home/" tabindex="-1"></a>
				</img>
			</ul>
		</div>
	</nav>
<body>
	
<p><center>hasil pencarian karywan dengan nrk : <?php echo $batih->karyawan_id ?>, ada 1 nama <br> klik tombol <font color="red">upload foto </font>untuk menginput foto karyawan</center></<center>,</p>

<center> <table border="1">
  <tr>
	<td style="padding: 30px"><img src="<?php echo base_url() ?>upload/<?php echo $batih->lokasi_foto ?>" alt="" width="100px"></td>
	<td style="padding: 30px"> <b><?php echo $batih->karyawan_nama ?></b> <br> <?php echo $batih->karyawan_golongan."<br>".$batih->karyawan_bagian_kebun ?> <br> </td>
  </tr>
</table>
<br>
<form action="<?php echo base_url() ?>foto/simpan" method="post" enctype="multipart/form-data">
<input type="file" name="foto"> <button>Upload foto</button>
</form>
</center>
</body>
</html>
