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
			<?php echo form_open('karyawan/update') ?>

			<div class="form-group">
				<label for="text">NRK</label>
				<input type="text" name="karyawan_id" disabled value="<?php echo $data_karyawan->karyawan_id ?>"
					class="form-control" placeholder="Masukkan No. Karyawan">
				<input type="hidden" value="<?php echo $data_karyawan->karyawan_id ?>" name="karyawan_id">
			</div>

			<div class="form-group">
				<label for="text">Nama Karyawan</label>
				<input type="text" name="karyawan_jenis_kelamin" disabled value="<?php echo $data_karyawan->karyawan_nama ?>"
					class="form-control" placeholder="Masukkan Nama Karyawan">
			</div>

			<div class="form-group">
				<label for="text">Suku Bangsa</label>
				<input type="text" name="karyawan_suku" disabled value="<?php echo $data_karyawan->karyawan_suku ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tempat, Tanggal Lahir</label>
				<input type="text" name="karyawan_alamat" disabled
					value="<?php echo $data_karyawan->karyawan_tanggal_lahir ?>, <?php echo $data_karyawan->karyawan_tempat_lahir ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Golongan Darah</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_golongan_darah ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Status</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_status ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Bagian/Kebun</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_bagian_kebun ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Jabatan</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_jabatan ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Golongan</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_golongan ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Masuk Kerja</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_awal_masuk ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Pengangkatan</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_pengangakatan ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Pensiun</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_pengangakatan ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Status Perkawinan</label>
				<input type="text" name="karyawan_alamat" disabled
					value="<?php echo $data_karyawan->karyawan_status_perkawinan  ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">No Telepon</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_kontak  ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Susunan Keluarga</label>
				<input type="text" name="karyawan_alamat" disabled
					value="<?php echo $data_karyawan->karyawan_susunan_keluarga  ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Nomor Dapenbun</label>
				<input type="text" name="karyawan_alamat" disabled
					value="<?php echo $data_karyawan->karyawan_nomor_dapenbun  ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Nomor BPJS</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->karyawan_nomor_bpjs   ?>"
					class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Status</label>
				<input type="text" name="karyawan_alamat" disabled value="<?php echo $data_karyawan->keterangan?>"
					class="form-control">
			</div>
			<div class="table-responsive" style="margin-top: 20px;">
				<table id="table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="5">
								<center>Pendidikan Formal</center>
							</td>
						</tr>
						<tr>
							<th>Jenjang</th>
							<th>Institusi</th>
							<th>Jurusan</th>
							<th>Tempat</th>
							<th>Tahun Lulus</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1; 
                    foreach($jenjang as $hasil){ 
                ?>

						<tr>
							<td><?php echo $hasil['jenjang_pendidikan']?></td>
							<td><?php echo $hasil['institusi']?></td>
							<td><?php echo $hasil['jurusan']?></td>
							<td><?php echo $hasil['tempat']?></td>
							<td><?php echo $hasil['tahun_lulus']?></td>
						</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>

			<div class="table-responsive" style="margin-top: 20px;">
				<table id="table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="3">
								<center>Riwayat Jabatan</center>
							</td>
						</tr>
						<tr>
							<th>Nama Jabatan</th>
							<th>Tanggal Mulai Jabatan</th>
							<th>Tanggal Selesai Jabatan</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1; 
                    foreach($jabatan as $hasil){ 
                ?>

						<tr>
							<td><?php echo $hasil['nama_jabatan']?></td>
							<td><?php echo $hasil['tanggal_mulai_menjabat']?></td>
							<td><?php echo $hasil['tanggal_selesai_menjabat']?></td>
						</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>

			<div class="table-responsive" style="margin-top: 20px;">
				<table id="table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="4">
								<center>Kursus Umum</center>
							</td>
						</tr>
						<tr>
							<th>Nama Kursus</th>
							<th>Penyelenggara</th>
							<th>Tempat</th>
							<th>Tahun</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1; 
                    foreach($kursus as $hasil){ 
                ?>

						<tr>
							<td><?php echo $hasil['nama_kursus']?></td>
							<td><?php echo $hasil['penyelenggara']?></td>
							<td><?php echo $hasil['tempat']?></td>
							<td><?php echo $hasil['tahun']?></td>
						</tr>

						<?php } ?>

					</tbody>
				</table>

			</div>

			<div class="table-responsive" style="margin-top: 20px;">
				<table id="table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="4">
								<center>Rewards/Punisment</center>
							</td>
						</tr>
						<tr>
							<th>Kategori</th>
							<th>Keterangan</th>
							<th>Perihal</th>
							<th>Nomor Surat</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1; 
                    foreach($rewards as $hasil){ 
                ?>

						<tr>
							<td><?php echo $hasil['kategori']?></td>
							<td><?php echo $hasil['keterangan']?></td>
							<td><?php echo $hasil['perihal']?></td>
							<td><?php echo $hasil['nomor_surat']?></td>
						</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>

			<div class="table-responsive" style="margin-top: 20px;">
				<table id="table" class="table table-striped table-bordered table-hover">
					<thead>
						<td colspan="4">
							<center>Riwayat Golongan</center>
						</td>
						</tr>
						<tr>
							<th>Tahun</th>
							<th>Golongan</th>
							<th>Berkala</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1; 
                    foreach($golongan as $hasil){ 
                ?>

						<tr>
							<td><?php echo $hasil['tahun']?></td>
							<td><?php echo $hasil['golongan']?></td>
							<td><?php echo $hasil['berkala']?></td>
						</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>

			<div class="table-responsive" style="margin-top: 20px;">
				<table id="table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="5">
								<center>Riwayat Golongan</center>
							</td>
						</tr>
						<tr>
							<th>Organisasi</th>
							<th>Tahun Mulai</th>
							<th>Tahun Selesai</th>
							<th>Jabatan</th>
							<th>Tujuan Organisasi</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1; 
                    foreach($organisasi as $hasil){ 
                ?>

						<tr>
							<td><?php echo $hasil['organisasi']?></td>
							<td><?php echo $hasil['tahun_mulai']?></td>
							<td><?php echo $hasil['tahun_selesai']?></td>
							<td><?php echo $hasil['jabatan']?></td>
							<td><?php echo $hasil['tujuan_organisasi']?></td>
						</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>

			<div class="table-responsive" style="margin-top: 20px;">
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
							<td colspan="8">
								<center>Daftar Batih</center>
							</td>
						</tr>
					<tr>
						<th>Nama Batih</th>
						<th>Status Batih</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Golongan Darah</th>
						<th>Keterangan</th>
						<th>Foto</th>
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
					</tr>

					<?php } ?>

				</tbody>
			</table>
		</div>
			<!-- <button type="submit" class="btn btn-md btn-success">Update</button>
              <button type="reset" class="btn btn-md btn-warning">reset</button> -->
			<?php echo form_close() ?>
		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>
