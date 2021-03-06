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
			<?php echo form_open('riwayatjabatan/simpan') ?>

			<div class="form-group">
				<label for="text">No Karyawan</label>
				<input type="text" disabled name="karyawan_id" value="<?php echo $detail['karyawan_id'] ?>"
					class="form-control" placeholder="Masukkan No. Karyawan">
				<input type="hidden" name="karyawan_id" value="<?php echo $detail['karyawan_id'] ?>">
			</div>

			<div class="form-group">
				<label for="text">Nama Karyawan</label>
				<input type="text" name="karyawan_nama" disabled value="<?php echo $detail['karyawan_nama'] ?>"
					class="form-control" placeholder="Masukkan Nama Karyawan">
				<input type="hidden" value="<?php echo $detail['karyawan_nama'] ?>">
			</div>

			<div class="form-group">
				<label for="text">Nama Jabatan</label>
				<input type="text" name="nama_jabatan" value="" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Mulai Jabatan</label>
				<input type="date" name="tanggal_mulai_menjabat" value="" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Selesai Jabatan</label>
				<input type="date" name="tanggal_selesai_menjabat" value="" class="form-control">
			</div>

			

			<button type="submit" class="btn btn-md btn-success">Input</button>
			<?php echo form_close() ?>
		</div>
		<div class="table-responsive" style="margin-top: 20px;">
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama Jabatan</th>
						<th>Tanggal Mulai Jabatan</th>
						<th>Tanggal Selesai Jabatan</th>
						<th>Pilihan</th>			
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1; 
                    foreach($jenjang as $hasil){ 
                ?>

					<tr>
						<td><?php echo $hasil['nama_jabatan']?></td>
						<td><?php echo $hasil['tanggal_mulai_menjabat']?></td>
						<td><?php echo $hasil['tanggal_selesai_menjabat']?></td>
						<td>
							<a href="<?php echo base_url() ?>riwayatjabatan/edit/<?php echo $hasil['riwayat_jabatan_id'] ?>"
								class="btn btn-sm btn-success">Edit</a>
							<a href="<?php echo base_url() ?>riwayatjabatan/hapus/<?php echo $hasil['riwayat_jabatan_id'] ?>"
								class="btn btn-sm btn-danger">Hapus</a>
						</td>
					</tr>

					<?php } ?>

				</tbody>
			</table>
		</div>

	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>
