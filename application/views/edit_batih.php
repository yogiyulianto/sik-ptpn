<!DOCTYPE html>
<html>

<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
</head>

<body>
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

	<div class="container" style="margin-top: 80px">
		<div class="col-md-12">
			<?php echo form_open('batih/update') ?>
			<input type="hidden" name="karyawan_id" value="<?php echo $detail->karyawan_id ?>" class="form-control">

			<div class="form-group">
				<label for="text">Karyawan</label>
				<select name="karyawan_id" class="form-control">
					<?php foreach($karyawan as $karyawans) { ?>
						<option value="<?= $karyawans->karyawan_id ?>"><?= $karyawans->karyawan_nama ?></option>
					<?php } ?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="text">Nama Batih</label>
				<input type="text" name="nama_batih" value="<?php echo $detail->nama_batih ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Status Batih</label>
				<input type="text" name="status_batih" value="<?php echo $detail->status_batih ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Jenis Kelamin</label>
				<input type="text" name="jenis_kelamin" value="<?php echo $detail->jenis_kelamin ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tempat Lahir</label>
				<input type="text" name="tempat_lahir" value="<?php echo $detail->tempat_lahir ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Golongan Darah</label>
				<input type="text" name="golongan_darah" value="<?php echo $detail->golongan_darah ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Keterangan</label>
				<input type="text" name="keterangan" value="<?php echo $detail->keterangan ?>" class="form-control">
			</div>

			<div class="form-group">
				<div><?php if($detail->foto!=null){ ?>
					<img width="100px" src="<?php echo base_url()."/upload/".$detail->foto?>"></img>
					<input type="file" name="foto" value="<?php echo $detail->foto ?>" class="form-control">
				</div><?php  } ?>
				<div><?php if($detail->foto==null){ ?>
					<label for="text">foto</label>
					<input type="file" name="foto" value="<?php echo $detail->foto ?>" class="form-control">
				</div><?php  } ?>
			</div>

			<button type="submit" class="btn btn-md btn-success">Input</button>
			<?php echo form_close() ?>
		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>
