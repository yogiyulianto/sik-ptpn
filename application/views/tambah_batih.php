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
		<?php echo form_open_multipart('batih/simpan');?>

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
				<label for="text">Nama Batih</label>
				<input type="text" name="nama_batih" value="" class="form-control">
			</div>
		
			<div class="form-group">
				<label for="text">Status Batih</label>
				<select class="form-control" name="status_batih">
					<option>ISTRI</option>
					<option>ANAK</option>
					<option>SAUDARA KANDUNG</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Jenis Kelamin</label>
				<select class="form-control" name="jenis_kelamin">
					<option>Perempuan</option>
					<option>Laki-laki</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Tempat Lahir</label>
				<input type="text" name="tempat_lahir" value="" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" value="" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Golongan Darah</label>
				<select class="form-control" name="golongan_darah">
					<option>A</option>
					<option>B</option>
					<option>AB</option>
					<option>O</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Keterangan</label>
				<select class="form-control" name="keterangan">
					<option>DI TANGGUNG</option>
					<option>TIDAK DI TANGGUNG</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Foto</label>
				<input type="file" name="foto" value="" class="form-control">
			</div>

			<button type="submit" class="btn btn-md btn-success">Input</button>
			<?php echo form_close() ?>
		</div>
		<div class="table-responsive" style="margin-top: 20px;">
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama Batih</th>
						<th>Status Batih</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Golongan Darah</th>
						<th>Keterangan</th>
						<th>Foto</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1; 
                    foreach($batih as $hasil){ 
                ?>

					<tr>
						<td><?php echo $hasil['nama_batih']?></td>
						<td><?php echo $hasil['status_batih']?></td>
						<td><?php echo $hasil['jenis_kelamin']?></td>
						<td><?php echo $hasil['tempat_lahir']?></td>
						<td><?php echo $hasil['tanggal_lahir']?></td>
						<td><?php echo $hasil['golongan_darah']?></td>
						<td><?php echo $hasil['keterangan']?></td>
						<td><img width="100px" src="<?php echo base_url()."/upload/".$hasil['foto']?>"></img></td>
						<td>
							<a href="<?php echo base_url() ?>batih/edit/<?php echo $hasil['batih_id'] ?>"
								class="btn btn-sm btn-success">Edit</a>
							<a href="<?php echo base_url() ?>batih/hapus/<?php echo $hasil['batih_id'] ?>"
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
